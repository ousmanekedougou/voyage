<?php

namespace App\Http\Controllers\Agent;

use App\Helpers\Sms;
use App\Http\Controllers\Controller;
use App\Models\Admin\ColiClient;
use App\Models\Admin\Colie;
use App\Models\Admin\Itineraire;
use App\Models\User;
use App\Models\User\Customer;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ColiController extends Controller
{
     public function __construct()
    {
        $this->middleware(['isAgent','isColis']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Colie::where('siege_id',Auth::guard('agent')->user()->siege_id)->orderBy('id','DESC')->paginate(15);
        return view('agent.coli.index',compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function customer(Request $request)
    {
        $this->validate($request,[
            'phone' => 'required|numeric|unique:colies',
        ]);
        $customer = Customer::where('phone',$request->phone)->first();
        if ($customer) {
            Colie::Create([
                'name' => $customer->name,
                'phone' => $customer->phone,
                'cni' => $customer->cni,
                'siege_id' => Auth::guard('agent')->user()->siege_id,
                'customer_id' => $customer->id
            ]);
            Toastr::success('Votre client colis ont bien ete ajouter', 'Ajout Client', ["positionClass" => "toast-top-right"]);
            return back();
        }else {
            Toastr::error('Ce client n\'a pas de compte', 'Absence de compte', ["positionClass" => "toast-top-right"]);
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
            'name' => 'required|string|max:255',
            'phone' => 'required|numeric|unique:colies',
            'cni' => 'required|numeric|unique:colies',
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
        $customer = Customer::where('phone',$request->phone)
            ->where('cni',$cni_final)
            ->first();
        if ($customer) {
            Colie::Create([
                'name' => $customer->name,
                'phone' => $customer->phone,
                'cni' => $customer->cni,
                'siege_id' => Auth::guard('agent')->user()->siege_id,
                'customer_id' => $customer->id
            ]);
            Toastr::success('Votre client colis ont bien ete ajouter', 'Ajout Client', ["positionClass" => "toast-top-right"]);
            return back();
        }else {
            $coli_client = new Colie();
            $coli_client->name = $request->name; 
            $coli_client->phone = $request->phone; 
            $coli_client->cni = $cni_final;  
            $coli_client->siege_id = Auth::guard('agent')->user()->siege_id;
            $coli_client->save();
            Toastr::success('Votre client ont bien ete ajouter', 'Ajout Client', ["positionClass" => "toast-top-right"]);
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
        // dd('jduud');
        $coli = Colie::where('id',$id)->where('siege_id',Auth::guard('agent')->user()->siege_id)->first();
        if ($coli) {
            return view('agent.coli.show',compact('coli'));
        }else {
            Toastr::warning('Ce client n\'existe pas', 'Error Client', ["positionClass" => "toast-top-right"]);
            return back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function post(Request $request)
    {
        $this->validate($request,[
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp',
            'name' => 'required|string|max:255',
            'prix' => 'required|numeric',
            'ville' => 'required|string|max:255',
            'desc' => 'required|string|max:255',
            'name_recept' => 'required|string|max:255',
            'phone_recept' => 'required|numeric|unique:coli_clients',
        ]);
        $imageName = '';
        if($request->hasFile('image'))
        {
            $imageName = $request->image->store('public/Colis');
        }

        $getCustomer = Customer::where('phone',$request->phone_recept)->first();
        $newColie = new ColiClient();
        $newColie->image = $imageName;
        $newColie->name = $request->name;
        $newColie->prix = $request->prix;
        $newColie->detail = $request->desc;
        $newColie->colie_id = $request->clientId;
        $newColie->ville_id = $request->ville; 
        $newColie->siege_id = Auth::guard('agent')->user()->siege_id;
        if ($getCustomer) {
            $newColie->name_recept = $getCustomer->name;
            $newColie->phone_recept = $getCustomer->phone;
            $newColie->customer_id = $getCustomer->id;
        }else {
            $newColie->name_recept = $request->name_recept;
            $newColie->phone_recept = $request->phone_recept;
        }
        $newColie->save();

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

        $client_p_t = Colie::where('id',$request->clientId)->first();
        if ($client_p_t->prix_total == 0) {
            $client_p_t->prix_total = $request->prix;
        }elseif ($client_p_t->prix_total > 0) {
            $client_p_t->prix_total = $client_p_t->prix_total + $request->prix;
        }
        $client_p_t->save();

        Toastr::success('Vos colies ont bien ete ajouter', 'Ajout Bagages', ["positionClass" => "toast-top-right"]);
        return back();
    }

    public function updateColi(Request $request, $id)
    {
        $coliClient = ColiClient::where('id',$id)->first();
        $imageName = '';
        if ($request->image == '') {
            $imageName = $coliClient->image;
        }else {
            if($request->hasFile('image'))
            {
                $imageName = $request->image->store('public/Colis');
                Storage::delete($coliClient->image);
            }
        }

        $client_p_t = Colie::where('id',$request->coliId)->first();
        if ($request->prix != $coliClient->prix) {
            $prixMoins = $client_p_t->prix_total - $coliClient->prix;
            $client_p_t->prix_total = $prixMoins + $request->prix;
        }else {
           $client_p_t->prix_total = $client_p_t->prix_total;
        }

        $coliClient->image = $imageName;
        $coliClient->name = $request->name;
        $coliClient->prix = $request->prix;
        $coliClient->detail = $request->desc;
        $coliClient->colie_id = $request->coliId;
        $coliClient->ville_id = $request->ville; 
        $coliClient->siege_id = Auth::guard('agent')->user()->siege_id;
        $coliClient->name_recept = $request->name_recept;
        $coliClient->phone_recept = $request->phone_recept;

       
        $coliClient->save();

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

       

        $client_p_t->save();

        Toastr::success('Vos colies ont bien ete ajouter', 'Ajout Bagages', ["positionClass" => "toast-top-right"]);
        return back();
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
          $cni_final = '';
        $r_cni = intval($request->cni);

        if (strlen($r_cni) == 13) {
            $cni_final = $r_cni;
        }else{
            Toastr::error('Votre numero d\'identite est invalide', 'Error phone', ["positionClass" => "toast-top-right"]);
            return back();
        }

        Colie::where('id',$id)->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'cni' => $cni_final,
            'siege_id' => Auth::guard('agent')->user()->siege_id
        ]);
        Toastr::success('Votre client a bien ete modifier', 'Modification Client', ["positionClass" => "toast-top-right"]);
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
        Colie::where('id',$id)->where('siege_id',Auth::guard('agent')->user()->siege_id)->delete();
        Toastr::success('Votre client et ses colies ont ete supprimer', 'Suppression Bagages', ["positionClass" => "toast-top-right"]);
        return back();
    }

    public function delete($id)
    {
        $coliDelete = ColiClient::where('id',$id)->first();
        Storage::delete($coliDelete->image);
        $Coliprix = Colie::where('id',request()->colId)->where('siege_id',Auth::guard('agent')->user()->siege_id)->first();
        $Coliprix->prix_total = $Coliprix->prix_total - $coliDelete->prix;
        $Coliprix->save();
        $coliDelete->delete();
        Toastr::success('Votre client et ses colies ont ete supprimer', 'Suppression Bagages', ["positionClass" => "toast-top-right"]);
        return back();
    }
}
