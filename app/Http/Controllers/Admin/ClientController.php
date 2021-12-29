<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Bus;
use App\Models\Admin\DateDepart;
use App\Models\Admin\Itineraire;
use App\Models\User\Client;
use App\Notifications\PaymentTicker;
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
                if ($user->registered_at >= Carbon::today()) {
                    $user->update([
                    'confirmation_token' => null,
                    'amount' =>  $user->ville->amount,
                    'payment_at' => new DateTime()
                ]);

                Notification::route('mail','ousmanelaravel@mail.com')
                    ->notify(new PaymentTicker($user));
                return redirect('http://localhost:8000')->with('success',"Salut votre billet a ete payer avec succes.<br>Veuillez ouvrire votre comptre gmail pour voir votre ticker electronique et ses instruction");
            }else{
                return redirect('http://localhost:8000')->with('error',"Cette date de voyage est passer");
            }

        }else {
            return redirect('http://localhost:8000')->with('error',"Salut chere clien il semble que ce ticker a deja ete payer");
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
                Notification::route('mail',Auth::user()->siege->email)
                ->notify(new PaymentTicker($user));
                return back()->with('success','Votre billet a ete payer');
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
                'error',"Il y'a $nombre resultat(s) pour la recherche $search"        
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
        if ($buse) {
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
                    
                    $phoneFinale = '';
                    $phoneComplet = '221'.$request->phone;
                    if (strlen($request->phone) == 13 ) {
                        $phoneFinale = $request->phone;
                    }elseif (strlen($request->phone) == 9) {
                        $phoneFinale = $phoneComplet;
                    }else {
                        return back()->with('error','votre numero de telephone est invalid');
                    }

                    //  $cni_final = '';

                    // if (strlen($request->cni == 13)) {
                    //     $cni_final = $request->cni;
                    // }else{
                    //     return back()->with('error','votre numero de piece est invalide');
                    // }

                    // dd($phoneFinale);
                    
                    $add_client = new Client();
                    $add_client->name = $request->name;
                    $add_client->email = $request->email;
                    $add_client->phone = $phoneFinale;
                    $add_client->cni = $request->cni;
                    $add_client->ville_id = $request->ville;
                    $add_client->bus_id = $buse->id;
                    $add_client->position = $buse->inscrit;
                    $add_client->registered_at = $buse->date_depart->depart_at;
                    $add_client->heure = $buse->date_depart->rendez_vous;
                    $add_client->confirmation_token = str_replace('/','',Hash::make(Str::random(40)));
                    $add_client->agence = Auth::user()->agence_name;
                    $add_client->agence_logo = Auth::user()->image_agence;
                    $add_client->save();
                    // $add_client->notify(new RegisteredClient());
                    return back()->with('success','Votre client a ete bien ete ajoute');
                }else if ($clients->count() == $buse->place){
                    $bus_plein = Bus::where('id',$buse->id)->first();
                    $bus_plein->plein = 1;
                    $bus_plein->save();
                    return back()->with('error','Ce bus est pelin');
                }
            }
         }else{
             return back()->with('error','Ce bus est plein');
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
        $clients = Client::where('bus_id',$id)->orderBy('id','ASC')->paginate(10);
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
        if ($client_present->amount == $client_present->ville->amount) {
            $client_present->voyage_status = $request->presence;
            $client_present->save();
            return back()->with('success','Votre client a ete attribuer');
        }else {
            return back()->with('error','Vous ne pouvez pas modifier un client qui n\'a pas payer son ticker');
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
        Client::find($id)->delete();
        return back()->with('success','Votre client a ete supprimer');
    }
}
