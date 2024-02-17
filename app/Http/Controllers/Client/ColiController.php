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
        $clients = Colie::where('customer_id',Auth::guard('client')->user()->id)->paginate(10);
        if ($clients->count() > 0) {
            return view('client.colis.index',compact('clients'));
        }else {
           Toastr::warning('Vous n\'aviez pas de colis enregistre', 'Error Colis', ["positionClass" => "toast-top-right"]);
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
        $getColi = Colie::where('id',$id)->where('customer_id',Auth::guard('client')->user()->id)->first();
        $colis = ColiClient::where('colie_id',$getColi->id)
        ->where('siege_id',$getColi->siege_id)
        ->where('status',0)
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
        if ($colis->count() > 0) {
            return view('client.colis.recue',compact('colis','getColi','Onpayer'));
        }else {
            Toastr::warning('Vous n\'aviez pas reçue de colis enregistre', 'Error Colis', ["positionClass" => "toast-top-right"]);
            return back();
        }
        
    }
}
