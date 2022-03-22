<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Bus;
use App\Models\Admin\DateDepart;
use App\Models\Admin\Itineraire;
use App\Models\User\Client;
use App\Notifications\PaymentTicker;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Notification;
class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
    {
        $this->middleware(['auth','isAgent','isClient'])->except('paiment');
    }
    public function index()
    {
        $client_todays = Client::all();
        $itineraires  = Itineraire::where('user_id',Auth::user()->id)->where('siege_id',Auth::user()->siege_id)->orderBy('id','ASC')->get();
        $buses  = Bus::where('user_id',Auth::user()->id)->where('siege_id',Auth::user()->siege_id)->orderBy('id','ASC')->get();
        return view('admin.client.index',compact('client_todays','itineraires','buses'));
    }


    public function paiment($id , $token){
        define('ACTIVE',1);
        $user = Client::where('id',$id)->where('confirmation_token',$token)->first();
        if ($user) {
                if ($user->registered_at >= Carbon::today()) {
                    $user->update([
                        'confirmation_token' => null,
                        'amount' =>  $user->ville->amount,
                        'payment_at' => new DateTime()
                    ]);
                    $montant_bus = Bus::where('id',$user->bus_id)->where('plein',0)->first();
                    $montan = $montant_bus->montant + $user->ville->amount;
                    $montant_bus->montant = $montan;
                    $montant_bus->valider = $montant_bus->valider + 1;
                    $montant_bus->save();

                Notification::route('mail',$user->bus->siege->email)
                    ->notify(new PaymentTicker($user));
                Toastr::success('Salut votre billet a ete payer avec succes,accedez sur votre compte gmail', 'Paiement Ticker', ["positionClass" => "toast-top-right"]);
                return redirect()->route('index');
            }else{
                Toastr::error('Cette date de voyage est passer', 'Paiement Ticker', ["positionClass" => "toast-top-right"]);
                return redirect()->route('index');
            }

        }else {
            Toastr::error('Salut chere client il semble que ce ticker a deja ete payer', 'Paiement Ticker', ["positionClass" => "toast-top-right"]);
            return redirect()->route('index');
        }
    }

    public function payer(Request $request, $id)
    {
        $user = Client::where('id',$id)->where('confirmation_token',$request->confirmation_token)->first();
        if ($user->confirmation_token == $request->confirmation_token) {
            if ($user->amount == null) {
                $user->update([
                    'confirmation_token' => null,
                    'amount' =>  $user->ville->amount,
                    'payment_at' => new DateTime()
                ]);

                $montant_bus = Bus::where('id',$user->bus_id)->where('plein',0)->first();
                $montan = $montant_bus->montant + $user->ville->amount;
                $montant_bus->montant = $montan;
                $montant_bus->valider = $montant_bus->valider + 1;
                $montant_bus->save();

                Notification::route('mail',Auth::user()->siege->email)
                ->notify(new PaymentTicker($user));
                Toastr::success('Salut votre billet a ete payer avec succes', 'Paiement Ticker', ["positionClass" => "toast-top-right"]);
                return back();
            }
        }
        else {
            Toastr::error('Ce client ne semble plus valide', 'Error lien', ["positionClass" => "toast-top-right"]);
            return back();
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        request()->validate([
            'search' => 'required|min:9'
        ]);
        $search = request()->input('search');
        $clients = Client::where('phone','like',"$search")
        ->orWhere('cni','like',"$search")
        ->orWhere('email','like',"$search")->paginate(6);
        $nombre = $clients->count();
        if ($nombre > 0) {
            $itineraires  = Itineraire::where('user_id',Auth::user()->id)->where('siege_id',Auth::user()->siege_id)->orderBy('id','ASC')->get();
            $buses  = Bus::where('user_id',Auth::user()->id)->where('siege_id',Auth::user()->siege_id)->orderBy('id','ASC')->get();
            return view('admin.client.search')->with(['clients' => $clients,
                'itineraires' => $itineraires,
                'buses' => $buses,
                'error',"Il y'a $nombre resultat(s) pour la recherche $search"        
                ]);
        }else{
            Toastr::error('Il n\'y a pas de resultat pour la recherche '.$search, 'Error search', ["positionClass" => "toast-top-right"]);
            return back();
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request,[
            'name' => 'required|string',
            'email' => 'required|string|email|max:255|unique:clients',
            'phone' => 'required|string|max:255|unique:clients',
            'cni' => 'required|string|max:255|unique:clients',
            'ville' => 'required|numeric',
            'date' => 'required|string',
        ]);
       
        // $buse = Bus::where('id',$request->bus)->first();
        $date = DateDepart::where('id',$request->date)->first();
        $buse = Bus::where('date_depart_id',$date->id)->where('siege_id',Auth::user()->siege_id)->where('plein',0)->first();
        if ($buse) {
            $clients = Client::where('bus_id',$buse->id)->get();
            $info_email = Client::where('registered_at',$buse->date_depart->depart_at)->where('email',$request->email)->first();
            $info_phone = Client::where('registered_at',$buse->date_depart->depart_at)->where('phone',$request->phone)->first();
            $info_cni = Client::where('registered_at',$buse->date_depart->depart_at)->where('cni',$request->cni)->first();
            if ($info_email == true) {
                Toastr::error('Cette adresse email est utiliser pour cette date', 'Error email', ["positionClass" => "toast-top-right"]);
                return back();
            }elseif ($info_phone == true) {
                Toastr::error('Ce numero de telephone est utiliser pour cette date', 'Error phone', ["positionClass" => "toast-top-right"]);
                return back();
            }elseif ($info_cni == true) {
                Toastr::error('Ce numero de CNI est utiliser pour cette date', 'Error CNI', ["positionClass" => "toast-top-right"]);
                return back();
            }else {
                if ($clients->count() < $buse->place) {
                    $pl = $buse->inscrit;
                    $buse->inscrit = $pl + 1;
                    $buse->save();
                    
                    $phoneFinale = '';
                    $phoneComplet = '221'.$request->phone;
                    if (strlen($request->phone) == 12 ) {
                        $phoneFinale = $request->phone;
                    }elseif (strlen($request->phone) == 9) {
                        $phoneFinale = $phoneComplet;
                    }else {
                        Toastr::error('votre numero de telephone est invalid', 'Error CNI', ["positionClass" => "toast-top-right"]);
                        return back();
                    }

                     $cni_final = '';

                    if (strlen($request->cni) == 13) {
                        $cni_final = $request->cni;
                    }else{
                        return back()->with('error','votre numero de piece est invalide');
                    }
                    
                    $add_client = new Client();
                    $add_client->name = $request->name;
                    $add_client->email = $request->email;
                    $add_client->phone = $phoneFinale;
                    $add_client->cni = $cni_final;
                    $add_client->ville_id = $request->ville;
                    $add_client->bus_id = $buse->id;
                    $add_client->position = $buse->inscrit;
                    $add_client->registered_at = $buse->date_depart->depart_at;
                    $add_client->heure = $buse->date_depart->rendez_vous;
                    $add_client->confirmation_token = str_replace('/','',Hash::make(Str::random(40)));
                    $add_client->agence = Auth::user()->agence_name;
                    $add_client->agence_logo = Auth::user()->image_agence;
                    $add_client->siege_id = Auth::user()->siege_id;
                    $add_client->reference = reference();
                    $add_client->save();
                    // $add_client->notify(new RegisteredClient());
                    Toastr::success('Votre client a ete bien ete ajoute', 'Ajout Client', ["positionClass" => "toast-top-right"]);
                    return back();
                }else if ($clients->count() == $buse->place){
                    $bus_plein = Bus::where('id',$buse->id)->first();
                    $bus_plein->plein = 1;
                    $bus_plein->save();
                    Toastr::error('Ce bus est pelin', 'Bus Plein', ["positionClass" => "toast-top-right"]);
                    return back();
                }
            }
         }else{
            Toastr::error('Ce bus n\'existe pas', 'Error Bus', ["positionClass" => "toast-top-right"]);
            return back();
         }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $itineraires = Itineraire::where('siege_id',Auth::user()->siege_id)->orderBy('id','ASC')->get();
        $buses  = Bus::where('siege_id',Auth::user()->siege_id)->orderBy('id','ASC')->get();
        $clients = Client::where('bus_id',$id)->where('siege_id',Auth::user()->siege_id)->orderBy('id','ASC')->paginate(10);
        return view('admin.client.show',compact('clients','itineraires','buses'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
    }


   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
           $this->validate($request,[
            'name' => 'required|string',
            'email' => 'required|string',
            'phone' => 'required|string',
            'ville' => 'required|numeric',
            'date' => 'required|string',
            'cni' => 'required|numeric',
        ]);

        // $clients = Client::where('bus_id',$request->bus)->get();
        // $buse = Bus::where('id',$request->bus)->first();
        $date = DateDepart::where('id',$request->date)->first();
        $buse = Bus::where('date_depart_id',$date->id)->where('itineraire_id',$date->itineraire_id)->where('siege_id',Auth::user()->siege_id)->where('plein',0)->first();
        $clients = Client::where('bus_id',$buse->id)->get();
        $info_update_email = Client::where('registered_at',$buse->date_depart->depart_at)->where('email',$request->email)->first();
        $info_update_phone = Client::where('registered_at',$buse->date_depart->depart_at)->where('phone',$request->phone)->first();
        $info_update_cni = Client::where('registered_at',$buse->date_depart->depart_at)->where('cni',$request->cni)->first();
        if ($info_update_email == true) {
            Toastr::error('Cette adresse email est utiliser pour cette date', 'Error email', ["positionClass" => "toast-top-right"]);
            return back();
        }elseif ($info_update_phone == true) {
            Toastr::error('Ce numero de telephone est utiliser pour cette date', 'Error phone', ["positionClass" => "toast-top-right"]);
            return back();
        }elseif ($info_update_cni == true) {
            Toastr::error('Ce numero de CNI est utiliser pour cette date', 'Error CNI', ["positionClass" => "toast-top-right"]);
            return back();
        }else {
            if ($clients->count() < $buse->place) {
                $update_client = Client::where('id',$id)->first();
                $update_client->name = $request->name;
                $update_client->email = $request->email;
                $update_client->phone = $request->phone;
                $update_client->cni = $request->cni;
                $update_client->ville_id = $request->ville;
                $update_client->bus_id = $request->bus;
                $update_client->registered_at = $buse->date_depart->depart_at;
                $update_client->agence = $buse->siege->user->name;
                $update_client->siege_id = Auth::user()->siege_id;
                $update_client->save();
                // $update_client->notify(new RegisteredClient());
                Toastr::success('Votre client a ete bien ete mise a jour', 'Modification Client', ["positionClass" => "toast-top-right"]);
                return back();
            }else if ($clients->count() == $buse->place){
                $bus_plein = Bus::where('id',$request->bus)->first();
                $bus_plein->plein = 1;
                $bus_plein->save();
                Toastr::error('Ce bus est plein', 'Error Bus', ["positionClass" => "toast-top-right"]);
                return back();
            }
        }
    }

    public function presence(Request $request ,$id){
        $client_present = Client::where('id',$id)->first();
        if ($client_present->amount == $client_present->ville->amount) {
            $client_present->voyage_status = $request->presence;
            $client_present->save();
            Toastr::success('Votre client a ete attribuer', 'Presence Client', ["positionClass" => "toast-top-right"]);
            return back();
        }else {
            Toastr::error('Vous ne pouvez pas modifier un client qui n\'a pas payer son ticker', 'Presence Client', ["positionClass" => "toast-top-right"]);
            return back();
        }
    }

    public function ticker(Request $request , $id){
        $client_ticker = Client::where('id',$id)->first();
        return view('admin.print.index',compact('client_ticker')); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Client::where('id',$id)->where('siege_id',Auth::user()->siege_id)->first();
        $montant_bus = Bus::where('id',$user->bus_id)->where('siege_id',Auth::user()->siege_id)->where('plein',0)->first();
        if ($montant_bus->montant >= $user->ville->amount) {
            $montan = $montant_bus->montant - $user->ville->amount;
        }else {
            $montan = $user->ville->amount - $montant_bus->montant;
        }
        $montant_bus->montant = $montan;

        if ($montant_bus->inscrit >= 1) {
            $montant_bus->inscrit = $montant_bus->inscrit - 1;
        }else {
            $montant_bus->inscrit = 0;
        }

        if ($montant_bus->valider >= 1) {
            $montant_bus->valider = $montant_bus->valider - 1;
        }else {
            $montant_bus->valider = 0;
        }
        $montant_bus->save();
        $user->delete();
        Toastr::success('Votre client a ete supprimer', 'Suppression Client', ["positionClass" => "toast-top-right"]);
        return back();
    }
}
