<?php

namespace App\Http\Controllers\Client;

use App\Helpers\OrangeMoney;
use App\Http\Controllers\Controller;
use App\Models\Admin\Bagage;
use App\Models\Admin\BagageClient;
use App\Models\Admin\Bus;
use App\Models\Admin\ColiClient;
use App\Models\Admin\Colie;
use App\Models\Admin\Itineraire;
use App\Models\User\Client;
use App\Notifications\RegisteredClient;
use Illuminate\Support\Str;
use App\Models\Admin\DateDepart;
use App\Models\Admin\Siege;
use App\Models\User;
use App\Models\User\Contact;
use App\Models\User\Customer;
use App\Models\User\Region;
use App\Notifications\ContactSiegeEmail;
use App\Notifications\CustomerRegister;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{

     public function __construct()
    {
        $this->middleware(['isClient']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agences = User::where('is_admin',2)->where('is_active',1)->get();
        $sieges = Siege::all();
        return view('user.client.index',compact('agences','sieges'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $order = Str::random(4);
        $om = new OrangeMoney(500 , $order);
        $orangePayment = $om->getPaymentUrl('return_url_here');
        return redirect($orangePayment->payment_url);
    }

  

 

     public function confirm($id , $token){
        define('ACTIVE',1);
        $user = Customer::where('id',$id)->where('confirmation_token',$token)->first();
        if ($user) {
            $user->update(['confirmation_token' => null , 'is_active' => ACTIVE]);
            Toastr::success('Votre compte a bien ete confirmer', 'Compte Confirmer', ["positionClass" => "toast-top-right"]);
            return view('client.auth.login');
        }else {
            Toastr::success('Ce lien ne semble plus valide', 'Compte invalide', ["positionClass" => "toast-top-right"]);
            return redirect()->route('index');
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
            'ville' => 'required|numeric',
            'date' => 'required|string',
        ]);
        // $clients = Client::where('bus_id',$request->bus)->get();
        // $buse = Bus::where('id',$request->bus)->first();
        $date = DateDepart::where('id',$request->date)->first();
        // dd($date->itineraire_id);
        $buse = Bus::where('date_depart_id',$date->id)->where('itineraire_id',$date->itineraire_id)->where('plein',0)->first();
        
        $clients = Client::where('bus_id',$buse->id)->get();
        $info_user = Client::where('registered_at',$buse->date_depart->depart_at)
        ->where('customer_id',Auth::guard('client')->user()->id)
        ->where('voyage_status',0)
        ->first();
        if ($info_user) {
            Toastr::error('Vous etes deja inscrit pour cette date sur ce siege', 'Error date de voyage', ["positionClass" => "toast-top-right"]);
            return back();
        }else {
            if ($clients->count() < $buse->place) {

                $buse->update(['inscrit' => $buse->inscrit + 1]);
                $add_client = new Client();
                $add_client->ville_id = $request->ville;
                $add_client->bus_id = $buse->id;
                $add_client->siege_id = $buse->siege->id;
                $add_client->customer_id = Auth::guard('client')->user()->id;
                $add_client->position = $buse->inscrit;
                $add_client->registered_at = $buse->date_depart->depart_at;
                $add_client->heure = $buse->date_depart->rendez_vous;
                $add_client->reference = reference();
                $add_client->voyage_status = 0;
                $add_client->save();
                
                // Notification::route('mail',$buse->siege->email)
                // ->notify(new RegisteredClient($add_client,1));
                Toastr::success('Votre inscription a bien ete enregistre sur '.$add_client->siege->agence->name, 'Inscription', ["positionClass" => "toast-top-right"]);
                return back();
            }else if ($clients->count() == $buse->place){
                $buse->update(['plein' =>  1]);
                // $bus_plein = Bus::where('id',$buse->id)->first();
                // $bus_plein->plein = 1;
                // $bus_plein->save();
                Toastr::warning('Ce bus est plein', 'Inscription', ["positionClass" => "toast-top-right"]);
                return back();
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
        $siege = Siege::where('id',$id)->first();
        $tickets = Client::where('siege_id',$id)->where('customer_id',Auth::guard('client')->user()->id)->get();
        if ($tickets->count() > 0) {
            return view('client.siege.ticket',compact('tickets','siege'));
        }else {
            Toastr::warning('Vous n\'aviez pas de ticker sur ce siege', 'Inscription', ["positionClass" => "toast-top-right"]);
            return back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
    }

     public function ticket(Request $request)
    {
        $this->validate($request,[
            'phone' => 'required|numeric',
            'ref' => 'required|numeric',
        ]);
        
        $phoneFinale = '';
        $phoneComplet = '221'.$request->phone;
        if (strlen($request->phone) == 12 ) {
            $phoneFinale = $request->phone;
        }elseif (strlen($request->phone) == 9) {
            $phoneFinale = $phoneComplet;
        }else {
            Toastr::error('Votre numero de telephone est invalide', 'Error phone', ["positionClass" => "toast-top-right"]);
            return back();
        }

        $ref_final = '';
        $ref = $request->ref;

        if (strlen($ref) == 4) {
            $ref_final = $ref;
        }else{
            Toastr::error('Votre reference est invalide', 'Error Reference', ["positionClass" => "toast-top-right"]);
            return back();
        }

        $client = Client::where('phone',$phoneFinale)
            ->where('reference',$ref_final)
            ->where('siege_id',$request->siege)
            ->first();
        if ($client) {
            if ($client->siege_id == $request->siege) {
                if ($client->registered_at >= carbon_today()) {
                    if ($client->amount == $client->ville->amount) {
                        Toastr::error('Vous ne pouvez pas modifier apres le paiement du billet', 'Error Billet', 
                        ["positionClass" => "toast-top-right"]);
                        return back();
                    }elseif ($client->amount == 0) {
                        $siege = Siege::where('id',$client->siege_id)->first();
                        return view('user.agence.clientShow',compact('client','siege'));
                    }
                }else {
                    Toastr::error('La date de votre inscription est depasser', 'Error date', 
                    ["positionClass" => "toast-top-right"]);
                    return back();
                }
            }else {
                Toastr::error('Vous etes pas inscrit sur ce siege', 'Error inscription', 
                ["positionClass" => "toast-top-right"]);
                return back();
            }
        }else {
            Toastr::error('Vous etes pas inscrit', 'Error inscription', 
            ["positionClass" => "toast-top-right"]);
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
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'ville' => 'required|numeric',
            'date' => 'required|string',
        ]);
        $date = DateDepart::where('id',$request->date)->first();
        $buse = Bus::where('date_depart_id',$date->id)->where('itineraire_id',$date->itineraire_id)->where('plein',0)->first();
        
        $info_user = Client::where('registered_at',$buse->date_depart->depart_at)
        ->where('customer_id',Auth::guard('client')->user()->id)
        ->where('voyage_status',0)
        ->where('amount',null)
        ->first();
        if ($info_user) {
            Client::where('id',$id)->update([
                'ville_id' => $request->ville,
                'registered_at' => $buse->date_depart->depart_at,
                'heure' => $buse->date_depart->rendez_vous
            ]);
            Toastr::success('Votre ticket a bien ete modifier', 'Modification Ticket', ["positionClass" => "toast-top-right"]);
            return back();
        }else {
            Toastr::error('Vous avez effectuer ou annuler ce votage', 'Error date de voyage', ["positionClass" => "toast-top-right"]);
            return back();
        }
    }

    public function colis(){

        // $this->validate($request,[
        //     'phone' => 'required|numeric',
        //     'siege' => 'required|string',
        // ]);

        request()->validate([
            'phone' => 'required|numeric',
            'siege' => 'required|string',
        ]);
        $phone = request()->input('phone');
        $siege = request()->input('siege');

        $colie = Colie::where('phone',$phone)->where('siege_id',$siege)->orWhere('phone_recept',$phone)
        ->first();

        if ($colie) {
            if($colie->siege_id == $siege){
                $coli_clients = ColiClient::where('colie_id',$colie->id)->get();
                if ($coli_clients->count() > 0) {
                    return view('user.client.colie',compact('coli_clients','colie'));
                }else {
                    Toastr::error('Ce client n\'a pas de colie', 'Error Colie', ["positionClass" => "toast-top-right"]);
                    return back();
                }
            }else {
                Toastr::error('Votre colie n\'est de ce siege', 'Error Colie', ["positionClass" => "toast-top-right"]);
                return back();
            }
        }else {
            Toastr::error('Vous n\'aviez pas de colie', 'Error Colie', ["positionClass" => "toast-top-right"]);
            return back();
        }
    }

    public function bagage(){
        // $this->validate($request,[
        //     'phone' => 'required|numeric',
        //     'siege' => 'required|string',
        // ]);

        request()->validate([
            'phone' => 'required|numeric',
            'siege' => 'required|string',
        ]);
        $phone = request()->input('phone');
        $siege = request()->input('siege');

        $phoneFinale = '';
        $phoneComplet = '221'.$phone;
        if (strlen($phone) == 12 ) {
            $phoneFinale = $phone;
        }elseif (strlen($phone) == 9) {
            $phoneFinale = $phoneComplet;
        }else {
            Toastr::error('Votre numero de telephone est invalide', 'Error phone', ["positionClass" => "toast-top-right"]);
            return back();
        }

        $bagage = Bagage::where('client_phone',$phoneFinale)
        ->where('siege_id',$siege)
        ->first();

        if ($bagage) {
            if ($bagage->siege_id == $siege) {
                $bagage_clients = BagageClient::where('bagage_id',$bagage->id)->get();
                if ($bagage_clients->count() > 0) {
                    return view('user.client.bagage',compact('bagage_clients','bagage'));
                }else {
                    Toastr::error('Ce Client n\'a pas de bagages', 'Error Bagage', ["positionClass" => "toast-top-right"]);
                    return back();
                }
            }else {
                Toastr::error('Vous bagages ne sont pas de ce siege', 'Error Bagage', ["positionClass" => "toast-top-right"]);
                return back();
            }
        }else {
            Toastr::error('Vous n\'aviez pas de bagages', 'Error Bagage', ["positionClass" => "toast-top-right"]);
            return back();
        }
    }

   

    public function confirme($id){
        Colie::where('id',$id)->update([
            'status' => 1
        ]);
        Toastr::success('Votre confirmation de reception a bien ete enregistre', 'Reception Colie', ["positionClass" => "toast-top-right"]);
        return redirect()->route('client.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Client::where('id',$id)->delete();
        Toastr::success('Votre ticket a ete supprimer avec sucess', 'Error date de voyage', ["positionClass" => "toast-top-right"]);
        return back();
    }
}