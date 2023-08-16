<?php

namespace App\Http\Controllers\Client;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use DateTime;
use App\Models\Admin\Bus;
use Illuminate\Http\Request;
use App\Models\User\Client;
class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware(['isClient']);
    }



    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $order = Str::random(4);
        // $om = new OrangeMoney(500 , $order);
        // $orangePayment = $om->getPaymentUrl('return_url_here');
        // return redirect($orangePayment->payment_url);
        $user = Client::where('id',$id)->where('customer_id',Auth::guard('client')->user()->id)->first();
        if ($user) {
            if ($user->registered_at >= carbon_today()) {
                $user->update([
                    'amount' =>  $user->ville->amount,
                    'payment_at' => new DateTime(),
                    'payment_methode' => 1
                ]);
                $montant_bus = Bus::where('id',$user->bus_id)->where('plein',0)->first();
                $montan = $montant_bus->montant + $user->ville->amount;
                $montant_bus->montant = $montan;
                $montant_bus->valider = $montant_bus->valider + 1;
                $montant_bus->save();
                Toastr::success('Votre ticket a ete paye avec success', 'Paiement Ticket', ["positionClass" => "toast-top-right"]);
                return back();
            }else{
                Toastr::error('Cette date de voyage est passer', 'Paiement Ticker', ["positionClass" => "toast-top-right"]);
                return back();
            }

        }else {
            Toastr::error('Salut cher client il semble que ce ticker a deja ete payer', 'Paiement Ticker', ["positionClass" => "toast-top-right"]);
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
       // $order = Str::random(4);
        // $om = new OrangeMoney(500 , $order);
        // $orangePayment = $om->getPaymentUrl('return_url_here');
        // return redirect($orangePayment->payment_url);
        $user = Client::where('id',$id)->where('customer_id',Auth::guard('client')->user()->id)->first();
        if ($user) {
            if ($user->registered_at >= carbon_today()) {
                $user->update([
                    'amount' =>  $user->ville->amount,
                    'payment_at' => new DateTime(),
                    'payment_methode' => 2
                ]);
                $montant_bus = Bus::where('id',$user->bus_id)->where('plein',0)->first();
                $montan = $montant_bus->montant + $user->ville->amount;
                $montant_bus->montant = $montan;
                $montant_bus->valider = $montant_bus->valider + 1;
                $montant_bus->save();
                Toastr::success('Votre ticket a ete paye avec success', 'Paiement Ticket', ["positionClass" => "toast-top-right"]);
                return back();
            }else{
                Toastr::error('Cette date de voyage est passer', 'Paiement Ticker', ["positionClass" => "toast-top-right"]);
                return back();
            }

        }else {
            Toastr::error('Salut cher client il semble que ce ticker a deja ete payer', 'Paiement Ticker', ["positionClass" => "toast-top-right"]);
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
        //
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
