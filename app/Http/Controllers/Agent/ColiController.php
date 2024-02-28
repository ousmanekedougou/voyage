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
     * Ajouter un client colis qui est a un compte toucki
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * Modification du client colis
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $coli = Colie::where('id',$id)->where('siege_id',Auth::guard('agent')->user()->siege_id)->first();
        $amountTotalColi = ColiClient::where('colie_id',$coli->id)->where('siege_id',Auth::guard('agent')->user()->siege_id)->sum('prix_total');
        $quantiteTotalColi = ColiClient::where('colie_id',$coli->id)->where('siege_id',Auth::guard('agent')->user()->siege_id)->sum('quantity');
        if ($coli) {
            if ($coli->coli_clients->count() > 0) {
                return view('agent.coli.show',compact('coli','amountTotalColi','quantiteTotalColi'));
            }else{
                Toastr::warning('Ce client n\'a pas de colis', 'Error Client', ["positionClass" => "toast-top-right"]);
                return back();
            }
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
            'quantity' => 'required|numeric',
            'ville' => 'required|numeric',
            'desc' => 'required|string|max:255',
            'name_recept' => 'required|string|max:255',
            'phone_recept' => 'required|numeric',
        ]);
        
        $imageName = '';
        $recepteur = '';
        if($request->hasFile('image'))
        {
            $imageName = $request->image->store('public/Colis');
        }

        $getCustomer = Customer::where('phone',$request->phone_recept)->first();
        $newColie = new ColiClient();
        $newColie->image = $imageName;
        $newColie->name = $request->name;
        $newColie->quantity = $request->quantity;
        $newColie->prix = $request->prix;
        $newColie->prix_total = $request->prix * $request->quantity;
        $newColie->detail = $request->desc;
        $newColie->colie_id = $request->clientId;
        $newColie->ville_id = $request->ville; 
        $newColie->siege_id = Auth::guard('agent')->user()->siege_id;
        $newColie->code_validation  = coliClientRefe(); 
        if ($getCustomer) {
            $newColie->name_recept = $getCustomer->name;
            $newColie->phone_recept = $getCustomer->phone;
            $newColie->customer_id = $getCustomer->id;
        }else {
            $newColie->name_recept = $request->name_recept;
            $newColie->phone_recept = $request->phone_recept;
        }
        if ($request->arriver == 1) {
            $recepteur = 1;
        }else{
            $recepteur = 0;
        }

        $newColie->recepteurPay = $recepteur;

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

        $coliClient->image = $imageName;
        $coliClient->name = $request->name;
        $coliClient->prix = $request->prix;
        $coliClient->quantity = $request->quantity;
        $coliClient->prix_total = $request->prix * $request->quantity;
        $coliClient->detail = $request->desc;
        $coliClient->colie_id = $request->coliId;
        $coliClient->ville_id = $request->ville; 
        $coliClient->siege_id = Auth::guard('agent')->user()->siege_id;
        $coliClient->name_recept = $request->name_recept;
        $coliClient->phone_recept = $request->phone_recept;

        if ($request->arriver == 1) {
            $coliClient->recepteurPay = 1;
        }else{
            $coliClient->recepteurPay = 0;
        }

       
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

        

        Toastr::success('Votre colies a bien ete modifier', 'Modification colis', ["positionClass" => "toast-top-right"]);
        return back();
    }

   

    public function reception(Request $request,$id)
    {
        $this->validate($request,[
            'name_recept' => 'required|string',
            'phone_recept' => 'required|numeric',
            'code_ref' => 'required|numeric',
        ]);

        $coli_client = ColiClient::where('id',$id)
        ->where('siege_id',Auth::guard('agent')->user()->siege_id)
        ->where('code_validation',$request->code_ref)
        ->where('status',0)
        ->first();

        // dd($coli_client->phone_recept .' | '. $request->phone_recept);

        $infos = '';
        $name = $request->name_recept;
        $phone = intval($request->phone_recept);
        $infos = $name.' : '.$phone;
        if ($coli_client->recepteurPay == 0) {
            if($coli_client->code_validation == $request->code_ref){
                if($coli_client->phone_recept == $request->phone_recept){

                    $coli_client->status = 1;
                    $coli_client->save();

                    Toastr::success('Colis reçu avec success', 'Reception colis', ["positionClass" => "toast-top-right"]);
                    return back();

                }else{

                    $coli_client->status = 1;
                    $coli_client->recepteur_info = $infos;
                    $coli_client->save();

                    // dd($coli_client);

                    Toastr::success('Colis reçu avec success', 'Reception colis', ["positionClass" => "toast-top-right"]);
                    return back();
                }
            }else{
                Toastr::error('Mauvaise code de reference', 'Error code', ["positionClass" => "toast-top-right"]);
                return back();
            }
            
        }elseif($coli_client->recepteurPay == 1){

            $this->validate($request,[
                'canal' => 'required|numeric',
            ]);
            if($coli_client->code_validation == $request->code_ref){
                if($request->canal == 1){
                    return back();
                }elseif($request->canal == 2){
                    return back();
                }elseif($request->canal == 3){
                    if($coli_client->phone_recept == $request->phone_recept){

                        $coli_client->recepteurPayAmount = $coli_client->prix;
                        $coli_client->status = 1;
                        $coli_client->save();

                        Toastr::success('Colis reçu avec success', 'Reception colis', ["positionClass" => "toast-top-right"]);
                        return back();
                    }else{
                        $coli_client->recepteurPayAmount = $coli_client->prix;
                        $coli_client->status = 1;
                        $coli_client->recepteur_info = $infos;
                        $coli_client->recepteurPay = 0;
                        $coli_client->save();

                        Toastr::success('Colis reçu avec success', 'Reception colis', ["positionClass" => "toast-top-right"]);
                        return back();
                    }
                }
            }else{
                Toastr::error('Mauvaise code de reference', 'Error code', ["positionClass" => "toast-top-right"]);
                return back();
            }
            
            
        }

        // dd($request->all());
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
        $Coliprix = Colie::where('id',request()->colId)->where('siege_id',Auth::guard('agent')->user()->siege_id)->first();
        
        if ($coliDelete->recepteurPay == 0) {
            $Coliprix->prix_total = $Coliprix->prix_total - $coliDelete->prix;
        }elseif($coliDelete->recepteurPay == 1){
            $Coliprix->prix_total = $Coliprix->prix_total;
        }

        Storage::delete($coliDelete->image);
        $coliDelete->delete();

        $Coliprix->save();

        if ($Coliprix->coli_clients->count() == 0) {

            $Coliprix->prix_total = 0;
            $Coliprix->save();
            Toastr::success('Votre client et ses colies ont ete supprimer', 'Suppression Bagages', ["positionClass" => "toast-top-right"]);
            return redirect()->route('agent.home');
        }
        Toastr::success('Votre client et ses colies ont ete supprimer', 'Suppression Bagages', ["positionClass" => "toast-top-right"]);
        return back();
    }
}
