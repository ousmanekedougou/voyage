<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\Admin\Agent;
use App\Models\Admin\Bagage;
use App\Models\Admin\Bus;
use App\Models\Admin\ColiClient;
use App\Models\Admin\Colie;
use App\Models\Admin\Itineraire;
use App\Models\User\Client;
use Carbon\Carbon;
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
        if ($this->middleware(['IsAgent'])) {
            $buses = Bus::where('siege_id', Auth::guard('agent')->user()->siege_id)->orderBy('id', 'ASC')->get();
            $itineraires = Itineraire::where('siege_id', Auth::guard('agent')->user()->siege_id)
            ->get();
            
            
            // Les bagages
            $clientBagages = Client::where('siege_id',Auth::guard('agent')->user()->siege_id)
                ->where('registered_at',carbon_yesterday())
                ->where('has_bagage',1)
                ->get();

            $clientBagageCount = Bagage::where('siege_id',Auth::guard('agent')->user()->siege_id)
                ->where('created_at',carbon_yesterday())
                ->get();

            $clientBagagePaye = Bagage::where('siege_id',Auth::guard('agent')->user()->siege_id)
                ->where('created_at',carbon_yesterday())
                ->where('prix','!=',null)
                ->get();

            $clientBagageNonPaye = Bagage::where('siege_id',Auth::guard('agent')->user()->siege_id)
                ->where('created_at',carbon_yesterday())
                ->where('prix','!=',null)
                ->get();
            
            $amountBagageTotal = Bagage::where('siege_id',Auth::guard('agent')->user()->siege_id)
                ->where('created_at',carbon_yesterday())
                ->where('prix','!=',null)
                ->sum('prix_total');
                $amountBagageTotal = number_format($amountBagageTotal,2, ',','.'). ' CFA';
            // Fin des bagages

            // Les colies
            $clientColie = Colie::where('siege_id',Auth::guard('agent')->user()->siege_id)
                ->orderBy('id','DESC')->get();

            $clientColieProduct = ColiClient::where('siege_id',Auth::guard('agent')->user()->siege_id)
                ->where('created_at',carbon_yesterday())
                ->orderBy('id','DESC')->get();

            $clientColieProductPaye = ColiClient::where('siege_id',Auth::guard('agent')->user()->siege_id)
                ->where('created_at',carbon_yesterday())
                ->orderBy('id','DESC')->get();

            $clientColieProductNonPaye = ColiClient::where('siege_id',Auth::guard('agent')->user()->siege_id)
                ->where('created_at',carbon_yesterday())
                ->orderBy('id','DESC')->get();
            
            $amountTotalColie = ColiClient::where('siege_id',Auth::guard('agent')->user()->siege_id)
                ->where('prix_total','!=',null)
                ->where('created_at',carbon_yesterday())
                ->sum('prix_total');
            $amountTotalColie = number_format($amountTotalColie,2, ',','.'). ' CFA';

            // Fin des colie
            
            // La listes des clients recents
            $clients =  Client::where('siege_id',Auth::guard('agent')->user()->siege_id)
                ->where('registered_at','>', Carbon::today()->format('d-m-Y'))
                ->orderBy('id','DESC')
                ->paginate(20);

            $clientToday = Client::where('siege_id',Auth::guard('agent')->user()->siege_id)
                ->where('registered_at', Carbon::today()->format('d-m-Y'))
                ->get();

            $clientAbsent = Client::where('siege_id',Auth::guard('agent')->user()->siege_id)
                ->where('registered_at','<',Carbon::today()->format('d-m-Y'))
                ->where('status',1)
                ->where('voyage_status',0)
                ->where('amount','!=',null)
                ->get();

            // Les tickets annuler
            $ticketAnnuler = Client::where('siege_id',Auth::guard('agent')->user()->siege_id)
                ->where('status','>',0)
                ->where('voyage_status',0)
                ->where('amount','!=',null)
                ->get();

            // Montan du jour
            $AmountToday = Client::where('siege_id',Auth::guard('agent')->user()->siege_id)
                ->where('registered_at', Carbon::today()->format('d-m-Y'))
                ->where('amount','!=',null)
                ->sum('amount');
            $AmountToday = number_format($AmountToday,2, ',','.'). ' CFA';

            return view('agent.index',compact(
                'itineraires','buses','clients','clientBagages','clientBagageCount',
                'clientBagagePaye','clientBagageNonPaye','clientColie','clientColieProduct','clientToday',
                'clientColieProductPaye','clientColieProductNonPaye','ticketAnnuler','clientAbsent',
                'AmountToday','amountTotalColie','amountBagageTotal'
            ));

        }
        // elseif ($this->middleware(['IsAgent']) && Auth::guard('agent')->user()->role == 2 || Auth::guard('agent')->user()->role == 4) {

        //     $clients = Client::where('siege_id',Auth::guard('agent')->user()->siege_id)
        //         ->where('registered_at',Carbon::today()->format('Y-m-d'))
        //         ->where('amount','!=',null)
        //     ->get();
        //     return view('agent.bagage.index',compact('clients'));

        // }elseif ($this->middleware(['IsAgent']) && Auth::guard('agent')->user()->role == 3 || Auth::guard('agent')->user()->role == 4) {
        //     $clients = Colie::where('siege_id',Auth::guard('agent')->user()->siege_id)
        //     ->orderBy('id','DESC')->paginate(15);
        //     return view('agent.coli.index',compact('clients'));
        // }

       

        if ($this->middleware(['IsAgent']) && Auth::guard('agent')->user()->role == 2 || Auth::guard('agent')->user()->role == 4) {
            Bagage::where('created_at','<',Carbon::yesterday())->delete();
        }

        if ($this->middleware(['IsAgent']) && Auth::guard('agent')->user()->role == 3 || Auth::guard('agent')->user()->role == 4) {
            Colie::where('created_at','<',Carbon::yesterday())->where('status',1)->delete();
            ColiClient::where('created_at','<',Carbon::yesterday())->where('status',1)->delete();
        }

        
    }

    public function confirm($id , $token){
        define('ACTIVE',1);
        $agent = Agent::where('id',$id)->where('confirmation_token',$token)->first();
        if ($agent) {
            $agent->update(['confirmation_token' => null , 'is_active' => ACTIVE]);
            $this->guard('agent')->login($agent);
            Toastr::success('Votre compte a bien ete confirmer', 'Confirmation de compte', ["positionClass" => "toast-top-right"]);
            return redirect($this->redirectPath());
        }else {
            Toastr::error('Ce lien ne semble plus valide', 'Error de connexion', ["positionClass" => "toast-top-right"]);
            return redirect()->route('agent.agent.login');
        }
    }
}
