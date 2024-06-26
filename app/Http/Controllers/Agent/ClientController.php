<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\Admin\Bus;
use App\Models\Admin\Itineraire;
use App\Models\Admin\Ville;
use App\Models\User\Client;
use App\Notifications\ClientAbsent;
use App\Notifications\PaymentTicker;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;
use PDF;
class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
    {
        $this->middleware(['isAgent']);
    }

    public function index()
    {
        $itineraires = Itineraire::where('siege_id', Auth::guard('agent')->user()->siege_id)->get();

        $clients = Client::where('siege_id',Auth::guard('agent')->user()->siege_id)
            ->where('registered_at',Carbon::today()->format('d-m-Y'))->get();

        $clientCount = Client::where('siege_id',Auth::guard('agent')->user()->siege_id)
        ->where('registered_at',carbon_today())
        ->count();

        $ticketPaye = Client::where('siege_id',Auth::guard('agent')->user()->siege_id)
            ->where('registered_at',carbon_today())
            ->count();

        $ticketNonPaye = Client::where('siege_id',Auth::guard('agent')->user()->siege_id)
            ->where('registered_at',carbon_today())
            ->count();
        
        $montant = Client::where('siege_id',Auth::guard('agent')->user()->siege_id)
            ->where('registered_at',carbon_today())
            ->sum('amount');

        $montant = number_format($montant,2, ',','.'). ' CFA';
        return view('agent.client.all_today',compact('clients','clientCount','ticketPaye','ticketNonPaye','montant','itineraires'));
    }


    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request,[
            'name' => 'required|string|max:255',
            'phone' => 'required|numeric|unique:clients',
            'cni' => 'required|numeric|unique:clients',
            'ville' => 'required|numeric',
            'date' => 'required|date',
        ]);
        $ville = Ville::where('id',$request->ville)->first();

        $buse = Bus::where('siege_id',Auth::guard('agent')->user()->siege_id)
        ->where('itineraire_id',$ville->itineraire_id)
        ->where('plein',0)->first();

        $date=date_create($request->date);
        $datef = (date_format($date,'d-m-Y H:i:s'));
        $time_input = strtotime($datef) ; 
        $date_input = getDate($time_input); 
        // dd($date_input['wday']); 
        
        $userialize_buse = unserialize($buse->siege->jours);

        $clients = Client::where('bus_id',$buse->id)->where('registered_at',$request->date)->where('amount','!=',null)->get();

        $info_user = Client::where('registered_at',$request->date)
            ->where('phone',$request->phone)
            ->where('voyage_status',0)
            ->first();
        if ($info_user) {
            Toastr::error('Vous etes deja inscrit pour cette date sur ce siege', 'Error date de voyage', ["positionClass" => "toast-top-right"]);
            return back();
        }else {
            // dd(date('d-m-Y H:i:s' ,strtotime($request->date)));
            if ($clients->count() < $buse->place) {
                if (in_array($date_input['wday'] , $userialize_buse)) {

                    if ($request->date >= Carbon::today()) {

                        $email = '';
                        if ($request->email != null) {
                            $email = $request->email;
                        }else {
                            $email = null;
                        }
                        
                        $buse->update(['inscrit' => $buse->inscrit + 1]);
                        $add_client = new Client();
                        $add_client->name = $request->name;
                        $add_client->phone = $request->phone;
                        $add_client->email = $email;
                        $add_client->cni = $request->cni;
                        $add_client->ville_id = $request->ville;
                        $add_client->bus_id = $buse->id;
                        $add_client->siege_id = Auth::guard('agent')->user()->siege_id;
                        $add_client->position = $buse->inscrit;
                        $add_client->registered_at = date('Y-m-d',strtotime($request->date));
                        $add_client->voyage_status = 0;
                        $add_client->status = 0;
                        $add_client->save();

                        /* 
                            Envoi automatique du lien de paiment par Orange Money ou par Wave via mail ou sms
                        */

                        Toastr::success('Votre inscription a bien ete enregistre sur '.$add_client->siege->agence->name, 'Inscription', ["positionClass" => "toast-top-right"]);
                        return back();

                    }else{
                        Toastr::warning('Votre date doit etre aujourdhuit ou demain','Error Inscription', ["positionClass" => "toast-top-right"]);
                        return back();
                    }
                }else {
                    Toastr::warning('Ce siege ne voyage pas a cette date','Error Date', ["positionClass" => "toast-top-right"]);
                    return back();
                }
            }else if ($clients->count() == $buse->place){

                $buse->update(['plein' =>  1]);

                Toastr::warning('Ce bus est plein', 'Inscription', ["positionClass" => "toast-top-right"]);
                return back();
            }
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
            $itineraires  = Itineraire::where('user_id',Auth::guard('agent')->user()->id)->where('siege_id',Auth::guard('agent')->user()->siege_id)->orderBy('id','ASC')->get();
            $buses  = Bus::where('user_id',Auth::guard('agent')->user()->id)->where('siege_id',Auth::guard('agent')->user()->siege_id)->orderBy('id','ASC')->get();
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
  

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $getBuse = Bus::where('id',$id)->where('siege_id',Auth::guard('agent')->user()->siege_id)->first();
        $clients = Client::where('bus_id',$getBuse->id)
            ->where('siege_id',Auth::guard('agent')->user()->siege_id)
            // ->where('registered_at','>=',Carbon::today()->format('d-m-Y'))
            ->where('status',0)
            ->orderBy('id','DESC')
            ->get();

        $ticketPaye = Client::where('bus_id',$getBuse->id)
            ->where('siege_id',Auth::guard('agent')->user()->siege_id)
            ->where('status',0)
            ->where('amount','!=',null)
            ->count();

        $ticketNonPaye = Client::where('bus_id',$getBuse->id)
            ->where('siege_id',Auth::guard('agent')->user()->siege_id)
            ->where('status',0)
            ->where('amount',null)
            ->count();
        
        $montant = Client::where('bus_id',$getBuse->id)
            ->where('siege_id',Auth::guard('agent')->user()->siege_id)
            ->where('status',0)
            ->sum('amount');
        $montant = number_format($montant,2, ',','.'). ' CFA';

        return view('agent.client.show',compact('clients','getBuse','ticketPaye','ticketNonPaye','montant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function jour($id)
    {
       $getBuse = Bus::where('id',$id)->where('siege_id',Auth::guard('agent')->user()->siege_id)->first();

        $clients = Client::where('bus_id',$getBuse->id)
            ->where('siege_id',Auth::guard('agent')->user()->siege_id)
            ->where('registered_at',carbon_today())
            ->where('status',0)
            ->where('amount','!=',null)
            ->orderBy('id','DESC')
            ->paginate(10);

        $clientCount = Client::where('bus_id',$getBuse->id)
            ->where('siege_id',Auth::guard('agent')->user()->siege_id)
            ->where('registered_at',carbon_today())
            ->where('status',0)
            ->where('amount','!=',null)
            ->count();

        $ticketPaye = Client::where('bus_id',$getBuse->id)
            ->where('siege_id',Auth::guard('agent')->user()->siege_id)
            ->where('registered_at',carbon_today())
            ->where('status',0)
            ->where('amount','!=',null)
            ->count();

        $ticketNonPaye = Client::where('bus_id',$getBuse->id)
            ->where('siege_id',Auth::guard('agent')->user()->siege_id)
            ->where('registered_at',carbon_today())
            ->where('status',0)
            ->where('amount',null)
            ->count();
        
        $montant = Client::where('bus_id',$getBuse->id)
            ->where('siege_id',Auth::guard('agent')->user()->siege_id)
            ->where('registered_at',carbon_today())
            ->where('status',0)
            ->sum('amount');

        $montant = number_format($montant,2, ',','.'). ' CFA';
        return view('agent.client.jour',compact('clients','clientCount','getBuse','ticketPaye','ticketNonPaye','montant'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required|string|max:255',
            'phone' => 'required|numeric',
            'cni' => 'required|numeric',
            'ville' => 'required|numeric',
        ]);
        
        $ville = Ville::where('id',$request->ville)->first();
        $buse = Bus::where('siege_id',Auth::guard('agent')->user()->siege_id)
        ->where('itineraire_id',$ville->itineraire_id)
        ->where('plein',0)->first();
        

        $date=date_create($request->date);
        $datef = (date_format($date,'d-m-Y H:i:s'));
        $time_input = strtotime($datef) ; 
        $date_input = getDate($time_input); 
        // dd($date_input['wday']); 
        $userialize_buse = unserialize($buse->siege->jours);

        $clients = Client::where('bus_id',$buse->id)->where('registered_at',$request->date)->where('amount','!=',null)->get();
        
        $info_user = Client::where('id',$id)
            ->where('voyage_status',0)
            ->where('phone',$request->phone)
            ->where('customer_id',null)
            ->where('amount',null)
            ->first();
        if ($info_user) {
            if ($clients->count() < $buse->place) {
                if (in_array($date_input['wday'] , $userialize_buse)) {

                    if ($date->format('d-m-Y') >= carbon_today()) {
                        $client = Client::where('id',$id)->first();
                        $registered_at = null;
                        if($request->date != $client->registered_at){
                            $registered_at = $request->date;
                        }else{
                            $registered_at =  $client->registered_at;
                        }
                        Client::where('id',$id)->update([
                            'name' => $request->name,
                            'email' => $request->email,
                            'phone' => $request->phone,
                            'siege_id' => Auth::guard('agent')->user()->siege_id,
                            'cni' => $request->cni,
                            'ville_id' => $request->ville,
                            'registered_at' =>  date('d-m-Y',strtotime($registered_at)),
                        ]);
                        Toastr::success('Votre ticket a bien ete modifier', 'Modification Ticket', ["positionClass" => "toast-top-right"]);
                        return back();

                    }else{
                        Toastr::warning('Votre date doit etre aujourdhuit ou demain','Error Inscription', ["positionClass" => "toast-top-right"]);
                        return back();
                    }
                }else {
                    Toastr::warning('Ce siege ne voyage pas a cette date','Error Date', ["positionClass" => "toast-top-right"]);
                    return back();
                }
            }else if ($clients->count() == $buse->place){

                $buse->update(['plein' =>  1]);

                Toastr::warning('Ce bus est plein', 'Inscription', ["positionClass" => "toast-top-right"]);
                return back();
            }

        }else {
            Toastr::error('Vous avez effectuer ou annuler ce votage', 'Error date de voyage', ["positionClass" => "toast-top-right"]);
            return back();
        }
    }


   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   

    public function presence(Request $request){
        $client = Client::where('id',$request->client_id)
            ->where('siege_id',Auth::guard('agent')->user()->siege_id)
            ->where('registered_at',Carbon::today()->format('d-m-Y'))
            ->where('status',0)
            ->where('amount',$request->amount)
            ->first();
            
        if ($client) {
            if ($request->voyage_status == 1) {
                if (Auth::guard('agent')->user()->agence->method_ticket == 0) {
                    $client->update([
                        'voyage_status' => 0,
                        'status' => 1
                    ]);
                    return back();
                }elseif (Auth::guard('agent')->user()->agence->method_ticket == 1) {
                    $client->update([
                        'voyage_status' => 0,
                        'status' => 2
                    ]);
                    return back();
                }
            }elseif ($request->voyage_status == 0) {
                $client->update([
                    'voyage_status' => 1,
                    'status' => 0
                ]);
                return back();
            }
        }else {
            Toastr::warning('Ce client n\'est pas pour aujourd\'hui', 'Error lien', ["positionClass" => "toast-top-right"]);
            return back();
        }
            
    }

    public function send_sms(){
        $clients = Client::where('siege_id',Auth::guard('agent')->user()->siege_id)
            ->where('registered_at',Carbon::today()->format('d-m-Y'))
            ->where('voyage_status',0)
            ->where('status',0)
            ->where('amount','!=',null)
            ->get();
        if ($clients->count() > 0) {
            foreach ($clients as $client){

                if (Auth::guard('agent')->user()->agence->method_ticket == 0) {
                    $client->update(['status' => 1]);
                    // Partie sms et notification sur son compte toucki
                }elseif(Auth::guard('agent')->user()->agence->method_ticket == 1) {
                    $client->update(['status' => 2]);
                    // Partie sms et notification sur son compte toucki
                }

                Notification::route('mail',Auth::guard('agent')->user()->siege->email)
                ->notify(new ClientAbsent($client));
                Toastr::success('Vos messages ont bien ete envoye', 'Error lien', ["positionClass" => "toast-top-right"]);
                return back();
            }
        }else {
            Toastr::warning('Vous n\'aviez pas de clients absent', 'Error lien', ["positionClass" => "toast-top-right"]);
            return back();
        }
    }

    

    public function annuler(){
        $clients = 
            Client::where('siege_id',Auth::guard('agent')->user()->siege_id)
                ->where('status','>',0)
                ->where('voyage_status',0)
                ->where('amount','!=',null)
                ->orderBy('id','ASC')
            ->paginate(10);
        return view('agent.client.annuler',compact('clients'));
    }

    public function absent(){
        $clients = Client::where('siege_id',Auth::guard('agent')->user()->siege_id)
            ->where('registered_at','<',Carbon::today()->format('d-m-Y'))
            ->where('status',1)
            ->where('voyage_status',0)
            ->where('amount','!=',null)
            ->orderBy('id','ASC')
            ->paginate(10);
        return view('agent.client.absent',compact('clients'));
    }

    public function createPDF($id){


        $getBuse = Bus::where('id',$id)->where('siege_id',Auth::guard('agent')->user()->siege_id)->first();

        $clients = Client::where('bus_id',$getBuse->id)
            ->where('siege_id',Auth::guard('agent')->user()->siege_id)
            ->where('registered_at','>=',Carbon::today()->format('d-m-Y'))
            ->where('status',0)
            ->where('amount','!=',null)
            ->orderBy('id','ASC')->get();
        if ($clients->count() > 0) {
            return view('agent.client.client_pdf', compact('clients', 'getBuse'));
            // $pdf = PDF::loadView('agent.client.client_pdf',compact('clients', 'getBuse'));
            // return $pdf->download('facture_' . Auth::guard('agent')->user()->agence->name . '.pdf');
        }else{
            Toastr::warning('Vous n\'aviez pas de clients', 'Pas de clients', ["positionClass" => "toast-top-right"]);
            return back();
        }
        

    }


    public function rembourser(){
        return 'true';
    }





    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $client =  Client::where('id',$id)
        ->where('customer_id',null)
        ->where('amount',null)
        ->first();
        if ($client) {
            $client->delete();
            Toastr::success('Ce client a bien ete supprimer', 'Suppression Client', ["positionClass" => "toast-top-right"]);
            return back();
        }else {
            Toastr::error('Vous ne pouvez pas supprimer ce client', 'Suppression Client', ["positionClass" => "toast-top-right"]);
            return back();
        }
    }
}
