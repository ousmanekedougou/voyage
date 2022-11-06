<?php

use App\Helpers\UserSystemInfoHelper;
use App\Models\Admin\Agence;
use App\Models\Admin\Bus;
use App\Models\Admin\Historical;
use App\Models\Admin\Itineraire;
use App\Models\Admin\Part;
use App\Models\Admin\Siege;
use App\Models\User\Client;
use App\Models\User\Region;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


if (!function_exists('page_title')) {
    function page_title($title)
    {
        $base_title = 'TouCki';
        if ($title === '') {
            return  $base_title;
        } else {
            return $title . ' | ' . $base_title;
        }
    }
}

if (!function_exists('set_active_roote')) {
    function set_active_roote($route)
    {
        return Route::is($route) ? 'active' : '';
    }
}

if (!function_exists('all_siege')) {
    function all_siege()
    {
        $siege = Siege::where('agence_id', Auth::guard('agence')->user()->id)->get();
        return $siege;
    }
}

if (!function_exists('all_siege_user')) {
    function all_siege_user()
    {
        $siege = Siege::all();
        return $siege;
    }
}

if (!function_exists('all_agence_user')) {
    function all_agence_user()
    {
        $agences = Agence::where('is_admin',0)->where('is_active',1)->get();
        return $agences;
    }
}

if (!function_exists('itineraire_all')) {
    function itineraire_all()
    {
        $itineraire_all = Itineraire::where('siege_id', Auth::guard('agent')->user()->siege_id)->orderBy('id', 'ASC')->get();
        return $itineraire_all;
    }
}

if (!function_exists('buse_all')) {
    function buse_all()
    {
        $buse_all = Bus::where('user_id',  Auth::guard('agent')->user()->id)->where('siege_id',  Auth::guard('agent')->user()->siege_id)->orderBy('id', 'ASC')->get();
        return $buse_all;
    }
}


if (!function_exists('carbon_today')) {
    function carbon_today()
    {
        $today = Carbon::today()->format('Y-m-d');
        return $today;
    }
}

if (!function_exists('carbon_tomorrow')) {
    function carbon_tomorrow()
    {
        $tomorrow = Carbon::tomorrow()->format('Y-m-d');
        return $tomorrow;
    }
}

if (!function_exists('carbon_after_tomorrow')) {
    function carbon_after_tomorrow()
    {
        $after_tomorrow = Carbon::tomorrow()->addDay(1)->format('Y-m-d');
        return $after_tomorrow;
    }
}


if (!function_exists('carbon_yesterday')) {
    function carbon_yesterday()
    {
        $yesterday = Carbon::yesterday()->format('Y-m-d');
        return $yesterday;
    }
}

if (!function_exists('part')) {
    function part()
    {
        define('ACTIVE', 1);
        $part = Part::where('is_active', ACTIVE)->get();
        return $part;
    }
}

if (!function_exists('historical_hiere')) {
    function historical_hiere()
    {
        $historical_hiere = Historical::where('siege_id',  Auth::guard('agent')->user()->siege_id)->where('registered_at', '<', Carbon::yesterday()->format('Y-m-d'))->first();
        return $historical_hiere;
    }
}

if (!function_exists('historical_avant_hiere')) {
    function historical_avant_hiere()
    {
        $historical_avant_hiere = Historical::where('siege_id',  Auth::guard('agent')->user()->siege_id)->where('registered_at', '<', Carbon::yesterday()->format('Y-m-d'))->first();
        return $historical_avant_hiere;
    }
}

// if (! function_exists('historical')) {
//     function historical(){
//         $historical = Historical::where('siege_id',Auth::user()->siege_id)->where('registered_at','<',Carbon::today()->format('Y-m-d'))->get();
//         return $historical;
//     }
// }

if (!function_exists('reference')) {
    function reference()
    {
        $ref = random_int(0000, 9999);
        $ref_finale = '';
        $client_ref = Client::where('reference', $ref)->first();
        if ($client_ref) {
            $ref_finale = random_int(0000, 9999);
        } else {
            $ref_finale = $ref;
        }
        return $ref_finale;
    }
}

if (!function_exists('montant_today')) {
    function montant_today()
    {
        // $itineraires = Itineraire::where('siege_id',  Auth::guard('agent')->user()->siege_id)->where('user_id',  Auth::guard('agent')->user()->id)->orderBy('id', 'ASC')->get();
        // foreach ($itineraires as $itineraire) {
        //     foreach ($itineraire->date_departs as $iti_date) {
        //         $somme_buse = Bus::where('itineraire_id', $iti_date->itineraire_id)->get();
        //         foreach ($somme_buse as $buse_som) {
        //             if ($buse_som->date_depart->depart_at == Carbon::today()->format('Y-m-d')) {
        //                 $somme_total_today =  Bus::where('id', $buse_som->id)->sum('montant');
        //                 return $somme_total_today;
        //             }
        //         }
        //     }
        // }
    }
}

if (!function_exists('region')) {
    function region()
    {
        $getip = UserSystemInfoHelper::get_ip();
        $get_user_geo = geoip()->getLocation($getip);
        // dd($get_user_geo->city,$get_user_geo->state_name);
        $autre_regions = Region::where('name','!=',$get_user_geo->city)->orWhere('slug','!=',$get_user_geo->state_name)->get();
        return $autre_regions;

    }
}
