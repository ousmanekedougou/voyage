<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User\Client;
use Carbon\Carbon;
use App\Models\Admin\Bus;
use Illuminate\Http\Request;

class HistoriqueController extends Controller
{
    public function index(){
        $buses = Bus::where('siege_id',Auth::user()->siege_id)->orderBy('id','ASC')->get();
        foreach ($buses as $buse) {
            $clients = Client::where('bus_id',$buse->id)->where('registered_at','<',Carbon::today())->get();
            return view('admin.historique.index',compact('clients'));
        }
    }

    public function search(Request $request){
        if ($request->hidden_date == 1) {
            $buses = Bus::where('siege_id',Auth::user()->siege_id)->orderBy('id','ASC')->get();
            foreach ($buses as $buse) {
                $clients = Client::where('bus_id',$buse->id)->where('registered_at',$request->search)->get();
                return view('admin.historique.index',compact('clients'));
            }
        }elseif ($request->hidden_date == 2) {
             $buses = Bus::where('siege_id',Auth::user()->siege_id)->orderBy('id','ASC')->get();
            foreach ($buses as $buse) {
                $clients = Client::where('bus_id',$buse->id)->where('phone',$request->phone)->get();
                return view('admin.historique.index',compact('clients'));
            }
        }
    }

}
