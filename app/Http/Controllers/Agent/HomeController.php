<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\Admin\Agent;
use App\Models\Admin\Bagage;
use App\Models\Admin\BagageClient;
use App\Models\Admin\Bus;
use App\Models\Admin\ColiClient;
use App\Models\Admin\Colie;
use App\Models\Admin\DateDepart;
use App\Models\Admin\Historical;
use App\Models\Admin\Itineraire;
use App\Models\Admin\Siege;
use App\Models\User\Client;
use Carbon\Carbon;
use App\Models\User\Notify;
use Brian2694\Toastr\Facades\Toastr;
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
        $this->middleware(['isAgent'])->except('confirm');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return view('agent.index');
        if ($this->middleware(['IsAgent']) && Auth::guard('agent')->user()->role == 1) {
            $buses = Bus::where('siege_id', Auth::guard('agent')->user()->siege_id)->orderBy('id', 'ASC')->get();
            $itineraires = Itineraire::where('siege_id', Auth::guard('agent')->user()->siege_id)->where('user_id', Auth::guard('agent')->user()->id)->orderBy('id', 'ASC')->get();

            foreach ($buses as $buse) {
                $client_historiques = Client::where('bus_id', $buse->id)->where('siege_id', Auth::guard('agent')->user()->siege_id)->where('amount', '>', 2)->where('registered_at', '<', Carbon::today()->format('Y-m-d'))->get();
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
                    $add_client_htsto->siege_id = Auth::guard('agent')->user()->siege_id;
                    $add_client_htsto->save();
                }
                Client::where('bus_id', $buse->id)->where('registered_at', '<', Carbon::today()->format('Y-m-d'))->delete();
            }

            $date_today = Carbon::today();
            $dayOfweek = $date_today->dayOfWeek;
            if ($dayOfweek == 1) {
                Historical::where('registered_at', '<', Carbon::today())->where('siege_id', Auth::guard('agent')->user()->siege_id)->delete();
            }

            $dates = DateDepart::where('siege_id', Auth::guard('agent')->user()->siege_id)->where('depart_at', '<', Carbon::today())->get();
            foreach ($dates as $date) {
                Bus::where('date_depart_id', $date->id)->delete();
            }

            // foreach ($itineraires as $itineraire) {
            //     $dates = DateDepart::where('itineraire_id',$itineraire->id)->where('depart_at','<',Carbon::today())->get();
            //     foreach ($dates as $date) {
            //         Bus::where('date_depart_id',$date->id)->delete();
            //     }
            //     DateDepart::where('itineraire_id',$itineraire->id)->where('depart_at','<',Carbon::today())->delete();
            // }
        }

        DateDepart::where('depart_at','<',Carbon::today()->format('Y-m-d'))->delete();

        if ($this->middleware(['IsAgent']) && Auth::guard('agent')->user()->role == 2) {
            Bagage::where('created_at','<',Carbon::yesterday())->delete();
            BagageClient::where('created_at','<',Carbon::yesterday())->delete();
        }

        if ($this->middleware(['IsAgent']) && Auth::guard('agent')->user()->role == 3) {
            Colie::where('created_at','<',Carbon::yesterday())->delete();
            ColiClient::where('created_at','<',Carbon::yesterday())->delete();
        }

        if ($this->middleware(['IsAgent']) && Auth::guard('agent')->user()->role == 1) {
            $user = Agent::where('id',Auth::guard('agent')->user()->id)->first() ; 
            $clientCount = Client::where('siege_id',Auth::guard('agent')->user()->siege_id)->where('registered_at',carbon_today())->get();
            $busCount = Bus::where('siege_id',Auth::guard('agent')->user()->siege_id)->get();
            return view('agent.index',compact('itineraires','user','clientCount','busCount'));
        }elseif ($this->middleware(['IsAgent']) && Auth::guard('agent')->user()->role == 2) {
            $clients = Client::where('siege_id',Auth::guard('agent')->user()->siege_id)
            ->where('registered_at',Carbon::today()->format('Y-m-d'))
            ->paginate(15);
            return view('agent.bagage.index',compact('clients'));
        }elseif ($this->middleware(['IsAgent']) && Auth::guard('agent')->user()->role == 3) {
            $clients = Colie::orderBy('id','DESC')->paginate(15);
            return view('agent.coli.index',compact('clients'));
        }
    }

      public function confirm($id , $token){
        define('ACTIVE',1);
        $user = Agent::where('id',$id)->where('confirmation_token',$token)->first();
        if ($user) {
            $user->update(['confirmation_token' => null , 'is_active' => ACTIVE]);
            $this->guard('agent')->login($user);
            return redirect($this->redirectPath())->with('success','Votre compte a bien ete confirmer');
        }else {
            return redirect('/agent/login')->with('error','Ce lien ne semble plus valide');
        }
    }
}
