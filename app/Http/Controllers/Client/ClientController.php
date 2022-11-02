<?php

namespace App\Http\Controllers\Client;
use App\Http\Controllers\Controller;
use App\Models\Admin\Bus;
use App\Models\Admin\Colie;
use App\Models\User\Client;
use App\Models\Admin\Siege;
use App\Models\Admin\Ville;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
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
        
    }

  

   

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request,[
            'ville' => 'required|numeric',
            'date' => 'required|date',
        ]);
        $ville = Ville::where('id',$request->ville)->first();
        $buse = Bus::where('itineraire_id',$ville->itineraire_id)->where('plein',0)->first();

        // dd($request->date);

        $time = Carbon::today();

        // dd($time->dayOfWeek);

        // $userialize_buse = unserialize($buse->itineraire->jours);

        // $date_today = $request->date;
        
        // $dayOfweek = $date_today->dayOfWeek;

        // dd($dayOfweek);
        
        // dd($userialize_buse);

        $clients = Client::where('bus_id',$buse->id)->where('registered_at',$request->date)->get();
        $info_user = Client::where('registered_at',$request->date)
        ->where('customer_id',Auth::guard('client')->user()->id)
        ->where('voyage_status',0)
        ->first();
        if ($info_user) {
            Toastr::error('Vous etes deja inscrit pour cette date sur ce siege', 'Error date de voyage', ["positionClass" => "toast-top-right"]);
            return back();
        }else {
            if ($clients->count() < $buse->place) {

                if ($request->date == Carbon::today() || $request->date > Carbon::today()) {

                    $buse->update(['inscrit' => $buse->inscrit + 1]);
                    $add_client = new Client();
                    $add_client->ville_id = $request->ville;
                    $add_client->bus_id = $buse->id;
                    $add_client->siege_id = $buse->siege->id;
                    $add_client->customer_id = Auth::guard('client')->user()->id;
                    $add_client->position = $buse->inscrit;
                    $add_client->registered_at = $request->date;
                    $add_client->voyage_status = 0;
                    $add_client->save();
                    
                    // Notification::route('mail',$buse->siege->email)
                    // ->notify(new RegisteredClient($add_client,1));

                    Toastr::success('Votre inscription a bien ete enregistre sur '.$add_client->siege->agence->name, 'Inscription', ["positionClass" => "toast-top-right"]);
                    return back();

                }else{
                    Toastr::warning('Votre date doit etre aujourdhuit ou demain','Error Inscription', ["positionClass" => "toast-top-right"]);
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        // $siege = Siege::where('id',$id)->first();
        $tickets = Client::where('customer_id',Auth::guard('client')->user()->id)->get();
        if ($tickets->count() > 0) {
            return view('client.siege.ticket',compact('tickets'));
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

    public function paiment(){
        // $order = Str::random(4);
        // $om = new OrangeMoney(500 , $order);
        // $orangePayment = $om->getPaymentUrl('return_url_here');
        // return redirect($orangePayment->payment_url);

        $siege = request()->siege;
        $ville = request()->ville;
        Client::where('customer_id',Auth::guard('client')->user()->id)->where('siege_id',$siege)
        ->update([
            'amount' => $ville
        ]);
        Toastr::success('Votre ticket a ete paye avec success', 'Paiement Ticket', ["positionClass" => "toast-top-right"]);
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
        $this->validate($request,[
            'ville' => 'required|numeric',
            'date' => 'required|string',
        ]);
        $ville = Ville::where('id',$request->ville)->first();
        $buse = Bus::where('itineraire_id',$ville->itineraire_id)->where('plein',0)->first();
        
        $info_user = Client::where('registered_at',$request->date)
        ->where('customer_id',Auth::guard('client')->user()->id)
        ->where('voyage_status',0)
        ->where('amount',null)
        ->first();
        if ($info_user) {
            Client::where('id',$id)->update([
                'ville_id' => $request->ville,
                'registered_at' => $request->date,
                // 'heure' => $buse->date_depart->rendez_vous
            ]);
            Toastr::success('Votre ticket a bien ete modifier', 'Modification Ticket', ["positionClass" => "toast-top-right"]);
            return back();
        }else {
            Toastr::error('Vous avez effectuer ou annuler ce votage', 'Error date de voyage', ["positionClass" => "toast-top-right"]);
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
