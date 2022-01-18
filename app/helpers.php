<?php

use App\Models\Admin\Bus;
use App\Models\Admin\Historical;
use App\Models\Admin\Itineraire;
use App\Models\Admin\Part;
use App\Models\Admin\Siege;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


if(! function_exists('page_title')){
    function page_title($title)
    {
        $base_title = 'TouCki';
        if($title === ''){
            return  $base_title;
        }else{
            return $title . ' | ' . $base_title;
        }
    }
}

if(! function_exists('set_active_roote')){
    function set_active_roote($route)
    {
        return Route::is($route) ? 'active' : '';
    }
}

if(! function_exists('all_siege')){
    function all_siege()
    {
        $siege = Siege::where('user_id',Auth::user()->id)->get();
        return $siege;
    }
}

if(! function_exists('itineraire_all')){
    function itineraire_all()
    {
        $itineraire_all = Itineraire::where('user_id',Auth::user()->id)->where('siege_id',Auth::user()->siege_id)->orderBy('id','ASC')->get();
        return $itineraire_all;
    }
}

if(! function_exists('buse_all')){
    function buse_all()
    {
        $buse_all = Bus::where('user_id',Auth::user()->id)->where('siege_id',Auth::user()->siege_id)->orderBy('id','ASC')->get();
        return $buse_all;
    }
}


if(! function_exists('carbon_today')){
    function carbon_today()
    {
        $today = Carbon::today()->format('Y-m-d');
        return $today;
    }
}

if(! function_exists('carbon_tomorrow')){
    function carbon_tomorrow()
    {
        $tomorrow = Carbon::tomorrow()->format('Y-m-d');
        return $tomorrow;
    }
}

if(! function_exists('carbon_yesterday')){
    function carbon_yesterday()
    {
        $yesterday = Carbon::yesterday()->format('Y-m-d');
        return $yesterday;
    }
}

if (! function_exists('part')) {
    function part(){
        define('ACTIVE',1);
        $part = Part::where('is_active',ACTIVE)->get();
        return $part;
    }
}

if (! function_exists('historical')) {
    function historical(){
        $historical = Historical::where('siege_id',Auth::user()->siege->id)->where('registered_at','<',Carbon::today()->format('Y-m-d'))->first();
        return $historical;
    }
}

if (! function_exists('montant_today')) {
    function montant_today(){
        $itineraires = Itineraire::where('siege_id',Auth::user()->siege_id)->where('user_id',Auth::user()->id)->orderBy('id','ASC')->get();
         foreach ($itineraires as $itineraire) {
            foreach ($itineraire->date_departs as $iti_date) {
               $somme_buse = Bus::where('itineraire_id',$iti_date->itineraire_id)->get();
               foreach ($somme_buse as $buse_som) {
                    if ($buse_som->date_depart->depart_at == Carbon::today()->format('Y-m-d')) {
                      $somme_total_today =  Bus::where('id',$buse_som->id)->sum('montant');
                      return $somme_total_today;
                    }
               }
            }
        }
    }
}


