<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\User\Client;
use Carbon\Carbon;
use App\Models\Admin\Bus;
use App\Models\Admin\DateDepart;
use App\Models\Admin\Historical;
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
            $client_historiques = Client::where('bus_id',$buse->id)->where('amount','>',0)->where('registered_at','<',Carbon::today()->format('Y-m-d'))->get();
            foreach ($client_historiques as $client_hsto) {
                $add_client_htsto = new Historical();
                $add_client_htsto->name = $client_hsto->name;
                $add_client_htsto->email = $client_hsto->email;
                $add_client_htsto->phone = $client_hsto->phone;
                $add_client_htsto->cni = $client_hsto->cni;
                $add_client_htsto->ville_name = $client_hsto->ville->name;
                $add_client_htsto->bus_matricule = $client_hsto->bus->matricule;
                $add_client_htsto->position = $client_hsto->bus->inscrit;
                $add_client_htsto->registered_at = $client_hsto->registered_at;
                $add_client_htsto->heure = $client_hsto->heure;
                $add_client_htsto->amount = $client_hsto->amount;
                $add_client_htsto->payment_at = $client_hsto->payment_at;
                $add_client_htsto->voyage_status = $client_hsto->voyage_status;
                $add_client_htsto->agence = $client_hsto->agence;
                $add_client_htsto->agence_logo = $client_hsto->agence_logo;
                $add_client_htsto->siege_id = Auth::user()->siege_id;
                $add_client_htsto->save();
            }
            Client::where('bus_id',$buse->id)->where('registered_at','<',Carbon::today()->format('Y-m-d'))->where('amount',null)->delete();
        }
        
        $h = Historical::all();
        $date_today = Carbon::today();
        $dayOfweek = $date_today->dayOfWeek;
        foreach ($h as $history) {
            if ($dayOfweek == 1) {
                if ($history->registered_at->dayOfWeek == $dayOfweek) {
                    $history->delete();
                }
            }
        }


        foreach ($itineraires as $itineraire) {
            foreach ($itineraire->date_departs as $iti_date) {
               $delete_bus = Bus::where('itineraire_id',$iti_date->itineraire_id)->get();
               foreach ($delete_bus as $bus_delete) {
                   if ($bus_delete->date_depart->depart_at < Carbon::today()->format('Y-m-d')) {
                        Bus::where('id',$bus_delete->id)->delete();
                   }
               }
            }
            DateDepart::where('itineraire_id',$itineraire->id)->where('depart_at','<',Carbon::today())->delete();
        }

        $client_today = Client::where('confirmation_token','!=',null)->where('amount',0)->where('registered_at',Carbon::today())->get();
        $client_today_payer = Client::where('confirmation_token',null)->where('amount','>',0)->where('registered_at',Carbon::today())->get();
        $client_total = Client::where('confirmation_token',null)->where('amount','>',0)->where('registered_at',Carbon::today())->sum('amount');
        
        return view('admin.home',compact('itineraires','client_today','client_today_payer','client_total'));
    }
    
}
