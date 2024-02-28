<?php

use App\Helpers\UserSystemInfoHelper;
use App\Models\Admin\Agence;
use App\Models\Admin\Bus;
use App\Models\Admin\Historical;
use App\Models\Admin\Itineraire;
use App\Models\Admin\Part;
use App\Models\Admin\Siege;
use App\Models\Admin\ColiClient;
use App\Models\Admin\Bagage;
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

if (!function_exists('set_active_roote_bottom_bar')) {
    function set_active_roote_bottom_bar($route)
    {
        return Route::is($route) ? 'activeButton' : '';
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
        $today = Carbon::today()->format('d-m-Y');
        return $today;
    }
}

if (!function_exists('carbon_tomorrow')) {
    function carbon_tomorrow()
    {
        $tomorrow = Carbon::tomorrow()->format('d-m-Y');
        return $tomorrow;
    }
}

if (!function_exists('carbon_after_tomorrow')) {
    function carbon_after_tomorrow()
    {
        $after_tomorrow = Carbon::tomorrow()->addDay(1)->format('d-m-Y');
        return $after_tomorrow;
    }
}


if (!function_exists('carbon_yesterday')) {
    function carbon_yesterday()
    {
        $yesterday = Carbon::yesterday()->format('d-m-Y');
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
        $historical_hiere = Historical::where('siege_id',  Auth::guard('agent')->user()->siege_id)->where('registered_at', '<', carbon_yesterday())->first();
        return $historical_hiere;
    }
}

if (!function_exists('historical_avant_hiere')) {
    function historical_avant_hiere()
    {
        $historical_avant_hiere = Historical::where('siege_id',  Auth::guard('agent')->user()->siege_id)->where('registered_at', '<', carbon_yesterday())->first();
        return $historical_avant_hiere;
    }
}

// if (! function_exists('historical')) {
//     function historical(){
//         $historical = Historical::where('siege_id',Auth::user()->siege_id)->where('registered_at','<',Carbon::today()->format('d-m-Y'))->get();
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

if (!function_exists('coliClientRefe')) {
    function coliClientRefe()
    {
        $codeValidation = random_int(0000, 9999);
        $receptCode = '';
        $coli_client_ref = coliClient::where('code_validation', $codeValidation)->first();
        if ($coli_client_ref) {
            $receptCode = random_int(0000, 9999);
        } else {
            $receptCode = $codeValidation;
        }
        return $receptCode;
    }
}

if (!function_exists('bagageClientRefe')) {
    function bagageClientRefe()
    {
        $codeValidationBagage = random_int(0000, 9999);
        $receptCodeBagage = '';
        $coli_client_ref = Bagage::where('reference', $codeValidationBagage)->first();
        if ($coli_client_ref) {
            $receptCodeBagage = random_int(0000, 9999);
        } else {
            $receptCodeBagage = $codeValidationBagage;
        }
        return $receptCodeBagage;
    }
}

if (!function_exists('montant_today')) {
    function montant_today()
    {
        $montant = Client::where('siege_id',Auth::guard('agent')->user()->siege_id)
            ->where('registered_at',carbon_today())
            ->where('amount','!=',null)
            ->get();
        $montant = $montant->sum('amount');

        return $montant;
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



if (!function_exists('logoutUser')) {
    function logoutUser()
    {
        $redirect = '';
        if(Auth::guard('web')->user()){
            $redirect = route('logout') ;
        }
        elseif(Auth::guard('agence')->user()){
            $redirect = route('agence.agence.logout');
        }
        elseif(Auth::guard('agent')->user()){
            $redirect = route('agent.agent.logout');
        }
        elseif(Auth::guard('client')->user()){
            $redirect = route('customer.customer.logout');
        }
        return $redirect;
    }
}

if (!function_exists('UserProfile')) {
    function UserProfile()
    {
        $redirectUserProfile = '';
        if(Auth::guard('web')->user()){
            $redirectUserProfile = route('admin.profil.show',Auth::guard('web')->user()->slug) ;
        }
        elseif(Auth::guard('agence')->user()){
            $redirectUserProfile = route('agence.profil.show',Auth::guard('agence')->user()->slug);
        }
        elseif(Auth::guard('agent')->user()){
            $redirectUserProfile = route('agent.profil.show',Auth::guard('agent')->user()->slug);
        }
        elseif(Auth::guard('client')->user()){
            $redirectUserProfile = route('customer.profil.show',Auth::guard('client')->user()->slug);
        }
        return $redirectUserProfile;
    }
}



