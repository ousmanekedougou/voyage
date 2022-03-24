<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Admin\Bagage;
use App\Models\Admin\BagageClient;
use App\Models\User\Client;
use Carbon\Carbon;
use App\Models\Admin\Bus;
use App\Models\Admin\ColiClient;
use App\Models\Admin\Colie;
use App\Models\Admin\DateDepart;
use App\Models\Admin\Historical;
use App\Models\Admin\Itineraire;
use App\Models\Admin\Siege;
use App\Models\User;
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
        
        if ($this->middleware(['IsAgent']) && Auth::user()->role == 1) {
            foreach ($buses as $buse) {
                $client_historiques = Client::where('bus_id',$buse->id)->where('siege_id',Auth::user()->siege_id)->where('amount','>',2)->where('registered_at','<',Carbon::today()->format('Y-m-d'))->get();
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
                Client::where('bus_id',$buse->id)->where('registered_at','<',Carbon::today()->format('Y-m-d'))->delete();
            }

            $date_today = Carbon::today();
            $dayOfweek = $date_today->dayOfWeek;
            if ($dayOfweek == 1) {
                Historical::where('registered_at','<',Carbon::today())->where('siege_id',Auth::user()->siege_id)->delete();
            }


            foreach ($itineraires as $itineraire) {
                // foreach ($itineraire->date_departs as $iti_date) {
                //     $delete_bus = Bus::where('itineraire_id',$iti_date->itineraire_id)->get();
                //     foreach ($delete_bus as $bus_delete) {
                //         if ($bus_delete->date_depart->depart_at < Carbon::today()->format('Y-m-d')) {
                //             Bus::where('id',$bus_delete->id)->delete();
                //         }
                //     }
                // }
                $dates = DateDepart::where('itineraire_id',$itineraire->id)->where('depart_at','<',Carbon::today())->delete();
                foreach ($dates as $date) {
                    Bus::where('date_depart_id',$date->id)->delete();
                }
                DateDepart::where('itineraire_id',$itineraire->id)->where('depart_at','<',Carbon::today())->delete();
            }
        }

        DateDepart::where('depart_at','<',Carbon::today()->format('Y-m-d'))->delete();

        if ($this->middleware(['IsAgent']) && Auth::user()->role == 2) {
            Bagage::where('created_at','<',Carbon::yesterday())->delete();
            BagageClient::where('created_at','<',Carbon::yesterday())->delete();
        }

        if ($this->middleware(['IsAgent']) && Auth::user()->role == 3) {
            Colie::where('created_at','<',Carbon::yesterday())->delete();
            ColiClient::where('created_at','<',Carbon::yesterday())->delete();
        }

        if ($this->middleware(['IsAgent']) && Auth::user()->role == 1) {
            $user = User::where('id',Auth::user()->id)->first() ; 
            $clientCount = Client::where('siege_id',Auth::user()->siege_id)->where('registered_at',carbon_today())->get();
            $busCount = Bus::where('siege_id',Auth::user()->siege_id)->get();
            return view('admin.homeAgent.index',compact('itineraires','user','clientCount','busCount'));
        }elseif ($this->middleware(['IsAgent']) && Auth::user()->role == 2) {
            $clients = Bagage::paginate(15);
            return view('admin.bagage.index',compact('clients'));
        }elseif ($this->middleware(['IsAgent']) && Auth::user()->role == 3) {
            $clients = Colie::paginate(15);
            return view('admin.coli.index',compact('clients'));
        }elseif (Auth::user()->is_admin == 2 && Auth::user()->role == null) {
            $sieges = Siege::where('user_id',Auth::user()->id)->get();
            $agents = User::where('user_id',Auth::user()->id)->get(); 
            $user = Auth::user();
            return view('admin.homeAgence.index',compact('sieges','agents','user'));
        }elseif ($this->middleware(['IsAdmin']) && Auth::user()->role == null) {
            $agences = User::where('is_admin',2)->orderBy('id','DESC')->paginate(10);
            $user = Auth::user();
            $siegeCount = Siege::all();
            $newCount = Notify::all();
            return view('admin.homeAdmin.index',compact('agences','user','siegeCount','newCount'));
        }else {
            Toastr::error('Vous n\'aviez pas le droit d\'acces sur cette page', 'Resultat Recherche', ["positionClass" => "toast-top-right"]);
            return back();
            // return view('admin.home',compact('itineraires','user'));
        }
    }
    
}
