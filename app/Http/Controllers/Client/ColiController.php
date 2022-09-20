<?php

namespace App\Http\Controllers\Client;

use App\Helpers\Sms;
use App\Http\Controllers\Controller;
use App\Models\Admin\ColiClient;
use App\Models\Admin\Colie;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ColiController extends Controller
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
        $clients = Colie::where('customer_id',Auth::guard('client')->user()->id)->paginate(10);
        return view('client.colis.index',compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'name' => 'required|string|max:255',
            'phone' => 'required|numeric|unique:colies',
            'cni' => 'required|numeric|unique:colies',
            'name_recept' => 'required|string|max:255',
            'phone_recept' => 'required|numeric|unique:colies',
            'ville' => 'required|string|max:255',
        ]);
        // dd($request->all());
         $cni_final = '';
        $r_cni = intval($request->cni);

        if (strlen($r_cni) == 13) {
            $cni_final = $r_cni;
        }else{
            Toastr::error('Votre numero d\'identite est invalide', 'Error phone', ["positionClass" => "toast-top-right"]);
            return back();
        }
        $coli_client = new Colie();
        $coli_client->name = $request->name; 
        $coli_client->phone = $request->phone; 
        $coli_client->cni = $cni_final; 
        $coli_client->name_recept = $request->name_recept; 
        $coli_client->phone_recept = $request->phone_recept; 
        $coli_client->ville = $request->ville; 
        $coli_client->siege_id = Auth::user()->siege_id;
        $coli_client->save();
        Toastr::success('Votre client ont bien ete ajouter', 'Ajout Client', ["positionClass" => "toast-top-right"]);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $getColi = Colie::where('id',$id)->first();
        $colis = ColiClient::where('colie_id',$getColi->id)
        ->where('siege_id',$getColi->siege_id)
        ->where('customer_id',$getColi->customer_id)
        ->get();
        if ($colis->count() > 0) {
            return view('client.colis.show',compact('colis','getColi'));
        }else {
            Toastr::warning('Vous n\'aviez pas de colis enregistre', 'Error Colis', ["positionClass" => "toast-top-right"]);
            return back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $getColi = Colie::where('siege_id',$id)->where('customer_id',Auth::guard('client')->user()->id)->first();
        if ($getColi) {
            $colis = ColiClient::where('siege_id',$id)->where('colie_id',$getColi->id)
            ->where('customer_id',Auth::guard('client')->user()->id)
            ->get();
            return view('client.colis.recue',compact('colis','getColi'));
        }else {
            Toastr::warning('Ce siege n\'a pas de colis', 'Absence de colis', ["positionClass" => "toast-top-right"]);
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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp',
        ]);
        $imageName = '';
        if($request->hasFile('image'))
        {
            $imageName = $request->image->store('public/Colis');
        }

        $client = new ColiClient();
        $client->image = $imageName;
        $client->name = $request->name;
        $client->prix = $request->prix;
        $client->desc = $request->desc;
        $client->colie_id = $id;
        $client->siege_id = Auth::user()->siege_id;
        $client->save();

        // $sendPhone = User::where('');
        // $config = array(
        //     'clientId' => config('app.clientId'),
        //     'clientSecret' =>  config('app.clientSecret'),
        // );
        // $osms = new Sms($config);

        // $data = $osms->getTokenFromConsumerKey();
        // // dd($data);
        // $token = array(
        //     'token' => $data['access_token']
        // );
        // $phone = intval($client->phone);
        // $message = "AEERK KEDOUGOU:\nSalut $client->prenom $client->nom les documents que vous avez deposés pour les codifications ont été rejetés\n\nMotif du rejet :\n$client->texmail.\nVeuiilez vous repprocher au-pres du bureau plus d'information. \nCordialement le Bureau de l'AEERK";
            
        // $response = $osms->sendSms(
        //     // sender
        //     'tel:+' . $sendPhone->sendPhone,
        //     // receiver
        //     'tel:+221782875971',
        //     // message
        //     $message,

        //     'TouCki'
        // );

        $client_p_t = Colie::where('id',$id)->first();
        if ($client_p_t->prix_total == 0) {
            $client_p_t->prix_total = $request->prix;
        }elseif ($client_p_t->prix_total > 0) {
            $client_p_t->prix_total = $client_p_t->prix_total + $request->prix;
        }
        $client_p_t->save();

        Toastr::success('Vos colies ont bien ete ajouter', 'Ajout Bagages', ["positionClass" => "toast-top-right"]);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bag_clients = ColiClient::where('colie_id',$id)->get();
        if ($bag_clients->count() > 0) {
            foreach ($bag_clients as $bag) {
            Storage::delete($bag->image);
            $bag->delete();
            }
        }
        Colie::where('id',$id)->where('siege_id',Auth::user()->siege_id)->delete();
        Toastr::success('Votre client et ses colies ont ete supprimer', 'Suppression Bagages', ["positionClass" => "toast-top-right"]);
        return back();
    }
}
