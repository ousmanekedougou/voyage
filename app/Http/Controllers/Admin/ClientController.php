<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Bus;
use App\Models\Admin\DateDepart;
use App\Models\Admin\Itineraire;
use App\Models\User\Client;
use App\Notifications\PaymentTicker;
use App\Notifications\RegisteredClient;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
    {
        $this->middleware(['auth','isAgent'])->except('paiment');
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
            $user->update([
                'confirmation_token' => null,
                'amount' =>  $user->ville->amount,
                'payment_at' => new DateTime()
            ]);

            $user->notify(new PaymentTicker());

            return redirect('http://localhost:8000')->with('success',"Salut $user->name votre billet a ete payer avec succes.<br>Veuillez ouvrire votre comptre gmail pour voir votre ticker electronique et ses instruction");
        }else {
            return redirect('http://localhost:8000')->with('error',"Salut $user->name ce lien ne semble plus valide.<br>Veillez contacter l'agence de transport dont vous etes inscrit");
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
                return back()->with('success','Votre billet a ete payer');
            }elseif ($user->amount == $user->ville->amount) {
                $user->update([
                    'amount' =>  2,
                    'voyage_status' => 2
                ]);
                return back()->with('success','Votre client a bien ete rembourser');
            }elseif ($user->amount == 2) {
                $user->update([
                    'amount' => $user->ville->amount,
                    'voyage_status' => 0
                ]);
                return back()->with('success','Le remboursement de ce client a ete anuller');
            }
        }
        else {
            return back()->with('error','Ce client ne semble plus valide');
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
                'error',"Il $nombre resultat(s) pour la recherche $search"        
                ]);
        }else{
            return back()->with('error',"Il n'y a pas de resultat pour la recherche $search");
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
        $buse = Bus::where('date_depart_id',$date->id)->where('plein',0)->first();
        $clients = Client::where('bus_id',$buse->id)->get();
         $info_email = Client::where('registered_at',$buse->date_depart->depart_at)->where('email',$request->email)->first();
        $info_phone = Client::where('registered_at',$buse->date_depart->depart_at)->where('phone',$request->phone)->first();
        $info_cni = Client::where('registered_at',$buse->date_depart->depart_at)->where('cni',$request->cni)->first();
        if ($info_email == true) {
            return back()->with('error','Cette adresse email est utiliser pour cette date');
        }elseif ($info_phone == true) {
            return back()->with('error','Ce numero de telephone est utiliser pour cette date');
        }elseif ($info_cni == true) {
            return back()->with('error','Ce numero de CNI est utiliser pour cette date');
        }else {
            if ($clients->count() < $buse->place) {
                $pl = $buse->inscrit;
                $buse->inscrit = $pl + 1;
                $buse->save();
                
                $add_client = new Client();
                $add_client->name = $request->name;
                $add_client->email = $request->email;
                $add_client->phone = $request->phone;
                $add_client->cni = $request->cni;
                $add_client->ville_id = $request->ville;
                $add_client->bus_id = $buse->id;
                $add_client->position = $buse->inscrit;
                $add_client->registered_at = $buse->date_depart->depart_at;
                $add_client->confirmation_token = str_replace('/','',Hash::make(Str::random(40)));
                $add_client->agence = $buse->siege->user->name;
                $add_client->save();
                $add_client->notify(new RegisteredClient());
                return back()->with('success','Votre client a ete bien ete ajoute');
            }else if ($clients->count() == $buse->place){
                $bus_plein = Bus::where('id',$buse->id)->first();
                $bus_plein->plein = 1;
                $bus_plein->save();
                return back()->with('error','Ce bus est pelin');
            }
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
        $itineraires  = Itineraire::where('user_id',Auth::user()->id)->where('siege_id',Auth::user()->siege_id)->orderBy('id','ASC')->get();
        $buses  = Bus::where('user_id',Auth::user()->id)->where('siege_id',Auth::user()->siege_id)->orderBy('id','ASC')->get();
        $clients = Client::where('bus_id',$id)->orderBy('id','ASC')->get();
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
        $buse = Bus::where('date_depart_id',$date->id)->where('itineraire_id',$date->itineraire_id)->where('plein',0)->first();
        $clients = Client::where('bus_id',$buse->id)->get();
        $info_update_email = Client::where('registered_at',$buse->date_depart->depart_at)->where('email',$request->email)->first();
        $info_update_phone = Client::where('registered_at',$buse->date_depart->depart_at)->where('phone',$request->phone)->first();
        $info_update_cni = Client::where('registered_at',$buse->date_depart->depart_at)->where('cni',$request->cni)->first();
        if ($info_update_email == true) {
            return back()->with('error','Cette adresse email est utiliser pour cette date');
        }elseif ($info_update_phone == true) {
            return back()->with('error','Ce numero de telephone est utiliser pour cette date');
        }elseif ($info_update_cni == true) {
            return back()->with('error','Ce numero de CNI est utiliser pour cette date');
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
                $update_client->save();
                // $update_client->notify(new RegisteredClient());
                return back()->with('success','Votre client a ete bien ete mise a jour');
            }else if ($clients->count() == $buse->place){
                $bus_plein = Bus::where('id',$request->bus)->first();
                $bus_plein->plein = 1;
                $bus_plein->save();
                return back()->with('error','Ce bus est pelin');
            }
        }
    }

    public function presence(Request $request ,$id){
        $client_present = Client::where('id',$id)->first();
        $client_present->voyage_status = $request->presence;
        $client_present->save();
        return back()->with('success','Votre client a ete attibuer');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Client::find($id)->delete();
        return back()->with('success','Votre client a ete supprimer');
    }
}
