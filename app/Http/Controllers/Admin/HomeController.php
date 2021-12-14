<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\User\Client;
use Carbon\Carbon;
use App\Models\Admin\Bus;
use App\Models\Admin\DateDepart;
use App\Models\Admin\Itineraire;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $buses = Bus::where('siege_id',Auth::user()->siege_id)->orderBy('id','ASC')->get();
        $itineraires = Itineraire::where('siege_id',Auth::user()->siege_id)->where('user_id',Auth::user()->id)->orderBy('id','ASC')->get();
        foreach ($buses as $buse) {
            Client::where('bus_id',$buse->id)->where('registered_at','<',Carbon::yesterday())->delete();
        }

        foreach ($itineraires as $itineraire) {
            foreach ($itineraire->date_departs as $iti_date) {
               $delete_bus = Bus::where('itineraire_id',$iti_date->itineraire_id)->get();
               foreach ($delete_bus as $bus_delete) {
                   if ($bus_delete->date_depart->depart_at < Carbon::yesterday()) {
                        Bus::where('id',$bus_delete->id)->delete();
                   }
               }
            }
            DateDepart::where('itineraire_id',$itineraire->id)->where('depart_at','<',Carbon::yesterday())->delete();
        }

        return view('admin.home');
    }
}
