<?php

namespace App\Http\Controllers\User;

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
use App\Notifications\ContactSiegeEmail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Brian2694\Toastr\Facades\Toastr;
class ClientController extends Controller
{
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
            'email' => 'required|string|email|max:255',
            'phone' => 'required|string|max:255',
            'ville' => 'required|numeric',
            'date' => 'required|string',
            'cni' => 'required|numeric',
        ]);
        // $clients = Client::where('bus_id',$request->bus)->get();
        // $buse = Bus::where('id',$request->bus)->first();
        $date = DateDepart::where('id',$request->date)->first();
        // dd($date->itineraire_id);
        $buse = Bus::where('date_depart_id',$date->id)->where('itineraire_id',$date->itineraire_id)->where('plein',0)->first();
        
        $clients = Client::where('bus_id',$buse->id)->get();
        $info_email = Client::where('registered_at',$buse->date_depart->depart_at)->where('email',$request->email)->first();
        $info_phone = Client::where('registered_at',$buse->date_depart->depart_at)->where('phone',$request->phone)->first();
        $info_cni = Client::where('registered_at',$buse->date_depart->depart_at)->where('cni',$request->cni)->first();
        if ($info_email == true) {
            Toastr::error('Cette adresse email est utiliser pour cette date', 'Error email adress', ["positionClass" => "toast-top-right"]);
            return back();
        }elseif ($info_phone == true) {
            Toastr::error('Ce numero de telephone est utiliser pour cette date', 'Error phone', ["positionClass" => "toast-top-right"]);
            return back();
        }elseif ($info_cni == true) {
             Toastr::error('Ce numero d\'identite est utiliser pour cette date', 'Error identite', ["positionClass" => "toast-top-right"]);
            return back();
        }else {
            if ($clients->count() < $buse->place) {

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
                $cni_final = '';
                $r_cni = intval($request->cni);

                if (strlen($r_cni) == 13) {
                    $cni_final = $r_cni;
                }else{
                    Toastr::error('Votre numero d\'identite est invalide', 'Error CNI', ["positionClass" => "toast-top-right"]);
                    return back();
                }

                // $pl = $buse->inscrit;
                // $buse->inscrit = $pl + 1;
                // $buse->save();

                $buse->update(['inscrit' => $buse->inscrit + 1]);

                $add_client = new Client();
                $add_client->name = $request->name;
                $add_client->email = $request->email;
                $add_client->phone = $phoneFinale;
                $add_client->cni = $cni_final;
                $add_client->ville_id = $request->ville;
                $add_client->bus_id = $buse->id;
                $add_client->siege_id = $buse->siege->id;
                $add_client->position = $buse->inscrit;
                $add_client->registered_at = $buse->date_depart->depart_at;
                $add_client->heure = $buse->date_depart->rendez_vous;
                $add_client->confirmation_token = str_replace('/','',Hash::make(Str::random(40)));
                $add_client->agence = $buse->user->agence_name;
                $add_client->agence_logo = $buse->user->image_agence;
                $add_client->reference = reference();
                $add_client->save();
                
                Notification::route('mail',$buse->siege->email)
                ->notify(new RegisteredClient($add_client,1));
                Toastr::success('Votre inscription a bien ete enregistre sur '.$add_client->agence, 'Inscription', ["positionClass" => "toast-top-right"]);
                return back();
            }else if ($clients->count() == $buse->place){
                $bus_plein = Bus::where('id',$buse->id)->first();
                $bus_plein->plein = 1;
                $bus_plein->save();
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
    public function show(Request $request , $id)
    {
        $this->validate($request,[
            'phone' => 'required|numeric',
            'ref' => 'required|string',
        ]);
        $siege = Siege::where('id',$id)->first();
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

        if (strlen($ref) == 5) {
            $ref_final = $ref;
        }else{
            Toastr::error('Votre reference est invalide', 'Error Reference', ["positionClass" => "toast-top-right"]);
            return back();
        }

        $client = Client::where('phone',$phoneFinale)
            ->where('reference',$ref_final)
            ->where('siege_id',$id)
            ->first();
        if ($client) {
            if ($client->registered_at >= carbon_today()) {
                if ($client->amount == $client->ville->amount) {
                    Toastr::error('Vous ne pouvez pas modifier apres le paiement du billet', 'Error Billet', 
                    ["positionClass" => "toast-top-right"]);
                    return back();
                }elseif ($client->amount == 0) {
                    return view('user.agence.clientShow',compact('client','siege'));
                }
            }else {
                Toastr::error('La date de votre inscription est depasser', 'Error date', 
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        // dd($request->all());
        // $siege = Siege::where('id',$id)->first();
        // Notification::route('mail',$request->email)
        //         ->notify(new ContactSiegeEmail($siege->email,$request->name,$request->email,$request->sub,$request->sms));
        $this->validate($request,[
            'name' => 'required|string',
            'email' => 'required|string|email|max:255',
            'sub' => 'required|string',
            'sms' => 'required|string',
        ]);
        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->sub,
            'msg' => $request->sms,
            'status' => false,
            'siege_id' => $id
        ]);
        Toastr::success('Votre message a ete envoyer', 'Message', ["positionClass" => "toast-top-right"]);
        return back();
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
        'name' => 'required|string',
        'email' => 'required|string|email|max:255',
        'phone' => 'required|string|max:255',
        'ville' => 'required|numeric',
        'date' => 'required|string',
        'cni' => 'required|numeric',
        ]);
        // $clients = Client::where('bus_id',$request->bus)->get();
        // $buse = Bus::where('id',$request->bus)->first();
        $date = DateDepart::where('id',$request->date)->first();
        // dd($date->itineraire_id);
        $buse = Bus::where('date_depart_id',$date->id)->where('itineraire_id',$date->itineraire_id)->where('plein',0)->first();
        
        $clients = Client::where('bus_id',$buse->id)->get();
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
        $cni_final = '';
        $r_cni = intval($request->cni);

        if (strlen($r_cni) == 13) {
            $cni_final = $r_cni;
        }else{
            Toastr::error('Votre numero d\'identite est invalide', 'Error phone', ["positionClass" => "toast-top-right"]);
            return back();
        }
        
        $update_client = Client::where('id',$id)->first();
        if ($update_client->amount == 0) {
            $update_client->name = $request->name;
            $update_client->email = $request->email;
            $update_client->phone = $phoneFinale;
            $update_client->cni = $cni_final;
            $update_client->ville_id = $request->ville;
            $update_client->bus_id = $buse->id;
            $update_client->siege_id = $buse->siege->id;
            $update_client->position = $buse->inscrit;
            $update_client->registered_at = $buse->date_depart->depart_at;
            $update_client->heure = $buse->date_depart->rendez_vous;
            $update_client->confirmation_token = str_replace('/','',Hash::make(Str::random(40)));
            $update_client->agence = $buse->user->agence_name;
            $update_client->agence_logo = $buse->user->image_agence;
            $update_client->save();
            // dd($update_client->email);
            
            Notification::route('mail',$buse->siege->email)
            ->notify(new RegisteredClient($update_client,2));
            Toastr::success('Votre inscription a bien ete modifier sur '.$update_client->agence, 'Inscription', ["positionClass" => "toast-top-right"]);
            return redirect()->route('index');
        }else {
            Toastr::error('Vous ne pouvez pas modifier apres le paiement du billet', 'Error Billet', 
            ["positionClass" => "toast-top-right"]);
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
        //
    }
}
