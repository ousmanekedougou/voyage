<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\Admin\Bus;
use App\Models\Admin\Itineraire;
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

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
    {
        $this->middleware(['isAgent'])->except('paiment');
    }
    public function index()
    {
        $client_todays = Client::all();
        $itineraires  = Itineraire::where('user_id',Auth::guard('agent')->user()->id)->where('siege_id',Auth::guard('agent')->user()->siege_id)->orderBy('id','ASC')->get();
        $buses  = Bus::where('user_id',Auth::guard('agent')->user()->id)->where('siege_id',Auth::guard('agent')->user()->siege_id)->orderBy('id','ASC')->get();
        return view('agent.client.index',compact('client_todays','itineraires','buses'));
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
                Toastr::success('Salut cher client votre billet a ete payer avec succes,accedez sur votre compte gmail', 'Paiement Ticker', ["positionClass" => "toast-top-right"]);
                return redirect()->route('index');
            }else{
                Toastr::error('Cette date de voyage est passer', 'Paiement Ticker', ["positionClass" => "toast-top-right"]);
                return redirect()->route('index');
            }

        }else {
            Toastr::error('Salut cher client il semble que ce ticker a deja ete payer', 'Paiement Ticker', ["positionClass" => "toast-top-right"]);
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

                Notification::route('mail',Auth::guard('agent')->user()->siege->email)
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
        $getBuse = Bus::where('id',$id)->first();
        $clients = Client::where('bus_id',$id)
            ->where('siege_id',Auth::guard('agent')->user()->siege_id)
            ->where('registered_at','>=',Carbon::today()->format('Y-m-d'))
            ->where('status',0)
            ->where('amount','!=',null)
            ->orderBy('id','ASC')
            ->paginate(10);
        return view('agent.client.show',compact('clients','getBuse'));
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
   

    public function presence(Request $request){
        Client::where('id',$request->client_id)
            ->where('siege_id',Auth::guard('agent')->user()->siege_id)
            ->where('registered_at','>=',Carbon::today()->format('Y-m-d'))
            ->where('status',0)
            ->where('amount','!=',null)
            ->update(['voyage_status' => $request->voyage_status]);
    }

    public function send_sms(){
        // dd('fjjjkf');
        $client = Client::where('siege_id',Auth::guard('agent')->user()->siege_id)
            // ->where('registered_at','>=',Carbon::today()->format('Y-m-d'))
            // ->where('voyage_status',0)
            // ->where('amount','!=',null)
            ->first();
        if ($client){
            if (Auth::guard('agent')->user()->agence->method_ticket == 0) {
                Notification::route('mail',Auth::guard('agent')->user()->siege->email)
                ->notify(new ClientAbsent($client));

                // Partie sms et notification sur son compte toucki
                $client->status = 1;
                $client->save(); 
                Toastr::success('Vos messages ont bien ete envoye', 'Error lien', ["positionClass" => "toast-top-right"]);
                return back();

            }
        }
    }

    public function ticker(Request $request , $id){
        $client_ticker = Client::where('id',$id)->first();
        return view('admin.print.index',compact('client_ticker')); 
    }

    public function annuler(){
        $clients = Client::where('siege_id',Auth::guard('agent')->user()->siege_id)
            // ->where('status',1)
            // ->where('voyage_status',0)
            // ->where('amount','!=',null)
            // ->orderBy('id','ASC')
            ->paginate(10);
        return view('agent.client.annuler',compact('clients'));
    }

     public function absent(){
        $clients = Client::where('siege_id',Auth::guard('agent')->user()->siege_id)
            // ->where('registered_at','<',Carbon::today()->format('Y-m-d'))
            // ->where('status',0)
            // ->where('voyage_status',0)
            // ->where('amount','!=',null)
            // ->orderBy('id','ASC')
            ->paginate(10);
        return view('agent.client.absent',compact('clients'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Client::where('id',$id)->where('siege_id',Auth::guard('agent')->user()->siege_id)->first();
        $montant_bus = Bus::where('id',$user->bus_id)->where('siege_id',Auth::guard('agent')->user()->siege_id)->where('plein',0)->first();
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
        Storage::delete($user->image);
        $user->delete();
        Toastr::success('Votre client a ete supprimer', 'Suppression Client', ["positionClass" => "toast-top-right"]);
        return back();
    }
}
