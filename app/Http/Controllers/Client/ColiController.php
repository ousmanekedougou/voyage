<?php

namespace App\Http\Controllers\Client;

use App\Helpers\Sms;
use App\Http\Controllers\Controller;
use App\Models\Admin\ColiClient;
use App\Models\Admin\Colie;
use App\Models\Admin\Siege;
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
        $getColi = Colie::where('phone',Auth::guard('client')->user()->phone)->OrWhere('customer_id',Auth::guard('client')->user()->id)->first();
        
        if(!$getColi){
            Toastr::warning('Vous n\'etes pas iscrit pour ce service ', 'Error Colis', ["positionClass" => "toast-top-right"]);
            return back();
        }else{

            $colis = ColiClient::where('colie_id',$getColi->id)
            ->where('siege_id',$getColi->siege_id)
            ->where('status',0)
            ->get();

            // dd($getColi);

            $amountTotalColi = ColiClient::where('colie_id',$getColi->id)
                ->where('siege_id',$getColi->siege_id)
                ->where('status',0)->sum('prix_total');

            $quantiteTotalColi = ColiClient::where('colie_id',$getColi->id)
                ->where('siege_id',$getColi->siege_id)
                ->where('status',0)->sum('quantity');

            if ($colis->count() > 0) {
                return view('client.colis.index',compact('colis','getColi','amountTotalColi','quantiteTotalColi'));
            }else {
                Toastr::warning('Vous n\'aviez pas reçu  colis', 'Error Colis', ["positionClass" => "toast-top-right"]);
                return back();
            }
        }
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
     * Display the specified resource.
     *La methode pour lister les colis envoyer
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $getColi = Colie::where('id',$id)->where('customer_id',Auth::guard('client')->user()->id)->first();
        if(!$getColi){
            Toastr::warning('Vous n\'etes pas iscrit pour ce service ', 'Error Colis', ["positionClass" => "toast-top-right"]);
            return back();
        }else{
            $colis = ColiClient::where('colie_id',$getColi->id)
            ->where('siege_id',$getColi->siege_id)
            ->where('status',0)
            ->get();

            $amountTotalColi = ColiClient::where('colie_id',$getColi->id)
                ->where('siege_id',$getColi->siege_id)
                ->where('status',0)->sum('prix_total');

            $quantiteTotalColi = ColiClient::where('colie_id',$getColi->id)
                ->where('siege_id',$getColi->siege_id)
                ->where('status',0)->sum('quantity');

            if ($colis->count() > 0) {
                return view('client.colis.show',compact('colis','getColi','amountTotalColi','quantiteTotalColi'));
            }else {
                Toastr::warning('Vous n\'aviez pas envoyer de colis', 'Error Colis', ["positionClass" => "toast-top-right"]);
                return back();
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * Lister les colis recue
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $getColi = Colie::where('siege_id',$id)->first();
        
        $colis = ColiClient::where('siege_id',$id)
        ->where('customer_id',Auth::guard('client')->user()->id)
        ->where('phone_recept',Auth::guard('client')->user()->phone)
        ->where('status',0)
        ->get();
        
        $Onpayer = ColiClient::where('siege_id',$id)
        ->where('customer_id',Auth::guard('client')->user()->id)
        ->where('phone_recept',Auth::guard('client')->user()->phone)
        ->where('status',0)
        ->where('recepteurPay',1)
        ->get();

        $amountTotalColi = ColiClient::where('siege_id',$id)
            ->where('customer_id',Auth::guard('client')->user()->id)
            ->where('phone_recept',Auth::guard('client')->user()->phone)
            ->where('status',0)->sum('prix_total');

        $quantiteTotalColi = ColiClient::where('siege_id',$id)
            ->where('customer_id',Auth::guard('client')->user()->id)
            ->where('phone_recept',Auth::guard('client')->user()->phone)
            ->where('status',0)->sum('quantity');
        
        if ($colis->count() > 0) {
            return view('client.colis.recue',compact('colis','getColi','Onpayer','amountTotalColi','quantiteTotalColi'));
        }else {
            Toastr::warning('Vous n\'aviez pas reçue de colis enregistre', 'Error Colis', ["positionClass" => "toast-top-right"]);
            return back();
        }
        
    }
}
