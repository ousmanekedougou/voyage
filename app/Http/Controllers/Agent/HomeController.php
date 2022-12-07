<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\Admin\Agent;
use App\Models\Admin\Bagage;
use App\Models\Admin\BagageClient;
use App\Models\Admin\Bus;
use App\Models\Admin\ColiClient;
use App\Models\Admin\Colie;
use App\Models\Admin\DateDepart;
use App\Models\Admin\Historical;
use App\Models\Admin\Itineraire;
use App\Models\Admin\Siege;
use App\Models\User\Client;
use Carbon\Carbon;
use App\Models\User\Notify;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['isAgent'])->except('confirm');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return view('agent.index');
        if ($this->middleware(['IsAgent']) && Auth::guard('agent')->user()->role == 1) {
            $buses = Bus::where('siege_id', Auth::guard('agent')->user()->siege_id)->orderBy('id', 'ASC')->get();
            $itineraires = Itineraire::where('siege_id', Auth::guard('agent')->user()->siege_id)->where('user_id', Auth::guard('agent')->user()->id)->get();
            $user = Agent::where('id',Auth::guard('agent')->user()->id)->first() ; 
            $clientCount = Client::where('siege_id',Auth::guard('agent')->user()->siege_id)->where('registered_at',carbon_today())->get();
            $busCount = Bus::where('siege_id',Auth::guard('agent')->user()->siege_id)->get();
            
            // Suppression des clients qui n'ont pas payer dans les 24h
            Client::where('siege_id',Auth::guard('agent')->user()->siege_id)
            ->where('registered_at','<',Carbon::today()->format('Y-m-d'))
            ->where('status',0)
            ->where('amount',null)
            ->delete();

            // Suppresion des clients dont le voyage est effectuer avec success
            Client::where('siege_id',Auth::guard('agent')->user()->siege_id)
            ->where('registered_at','<',Carbon::today()->format('Y-m-d'))
            ->where('status',0)
            ->where('voyage_status',1)
            ->where('amount','!=',null)
            ->delete();
           
            $date_today = Carbon::today();
            $dayOfweek = $date_today->dayOfWeek;
            if ($dayOfweek == 1) {
                Historical::where('registered_at', '<', Carbon::today()->format('Y-m-d'))->where('siege_id', Auth::guard('agent')->user()->siege_id)->delete();
            }

            return view('agent.index',compact('itineraires','user','clientCount','busCount'));

        }elseif ($this->middleware(['IsAgent']) && Auth::guard('agent')->user()->role == 2) {

            $clients = Client::where('siege_id',Auth::guard('agent')->user()->siege_id)
            ->where('registered_at',Carbon::today()->format('Y-m-d'))
            ->where('amount','!=',null)
            ->paginate(15);
            return view('agent.bagage.index',compact('clients'));

        }elseif ($this->middleware(['IsAgent']) && Auth::guard('agent')->user()->role == 3) {

            $clients = Colie::orderBy('id','DESC')->paginate(15);
            return view('agent.coli.index',compact('clients'));
        }

       

        if ($this->middleware(['IsAgent']) && Auth::guard('agent')->user()->role == 2) {
            Bagage::where('created_at','<',Carbon::yesterday())->delete();
            BagageClient::where('created_at','<',Carbon::yesterday())->delete();
        }

        if ($this->middleware(['IsAgent']) && Auth::guard('agent')->user()->role == 3) {
            Colie::where('created_at','<',Carbon::yesterday())->delete();
            ColiClient::where('created_at','<',Carbon::yesterday())->delete();
        }

        
    }

    public function confirm($id , $token){
        define('ACTIVE',1);
        $user = Agent::where('id',$id)->where('confirmation_token',$token)->first();
        if ($user) {
            $user->update(['confirmation_token' => null , 'is_active' => ACTIVE]);
            $this->guard('agent')->login($user);
            return redirect($this->redirectPath())->with('success','Votre compte a bien ete confirmer');
        }else {
            return redirect('/agent/login')->with('error','Ce lien ne semble plus valide');
        }
    }
}
