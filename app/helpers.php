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
        $today = Carbon::today();
        return $today;
    }
}

if(! function_exists('carbon_tomorrow')){
    function carbon_tomorrow()
    {
        $tomorrow = Carbon::tomorrow();
        return $tomorrow;
    }
}

if(! function_exists('carbon_yesterday')){
    function carbon_yesterday()
    {
        $yesterday = Carbon::yesterday();
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
        $historical = Historical::where('siege_id',Auth::user()->siege->id)->get();
        return $historical;
    }
}


