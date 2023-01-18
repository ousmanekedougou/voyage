<?php

namespace App\Http\Controllers\Client;

use App\Helpers\UserSystemInfoHelper;
use App\Http\Controllers\Controller;
use App\Models\Admin\Agence;
use App\Models\Admin\Agent;
use App\Models\Admin\Bus;
use App\Models\Admin\Siege;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\User\Notify;
use App\Models\User\Region;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Notifications\RegisteredUser;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class AgenceController extends Controller
{

     public function __construct()
    {
        $this->middleware(['isClient'])->except('confirm');
    }
    
    public function index(){
     
    }


    public function about(){
        $agence = Agence::where('slug',request()->slug)->first();
        return view('client.agence.about',compact('agence'));
    }

      public function show($slug)
    {

        $getip = UserSystemInfoHelper::get_ip();
        $get_user_geo = geoip()->getLocation($getip);
        $autre_regions = Region::where('name','!=',$get_user_geo->city)->orWhere('slug','!=',$get_user_geo->state_name)->get();
        // dd($region);

        $buses  = Bus::orderBy('id','ASC')->get();
        $agence = Agence::where('slug',$slug)->first();
        $sieges = Siege::where('agence_id',$agence->id)->get();
        if($sieges->count() > 0){
            return view('client.siege.index',compact('sieges','agence','buses','autre_regions'));
        }else {
            Toastr::warning('L\'agence '.$agence->name_agence.' n\'a pas encore de siège', 'Sieges', ["positionClass" => "toast-top-right"]);
            return back();
        }
    }

    public function region($slug){
        $region = Region::where('slug',$slug)->first();
        $newsletters = Notify::all();
        $agences = Agence::where('is_admin',0)
        ->where('is_active',1)
        ->where('region_id',$region->id)
        ->orderBy('id','ASC')->paginate(12);
        if ($agences->count() > 0) {
            $agenceAll = Agence::where('is_admin',0)->where('is_active',1)->orderBy('id','ASC')->get();
            $agenceCount = $agenceAll->count(); 
            $getip = UserSystemInfoHelper::get_ip();
            $get_user_geo = geoip()->getLocation($getip);
            $siege_all = Siege::all();
            $autre_regions = Region::where('name','!=',$get_user_geo->city)->orWhere('slug','!=',$get_user_geo->state_name)->get();

            return view('client.index',compact('agences','siege_all','agenceCount','newsletters'));
        }else {
            Toastr::warning('Il n\'y a pas d\'agence de transport pour la region de '.$region->name, 'Pas d\'agence', ["positionClass" => "toast-top-right"]);
            return back();
        }

    }

    public function search(){
        request()->validate([
            'recherche' => 'required|min:3'
        ]);
        $q = request()->input('recherche');
        if ($q != null ) {
            $agence = User::where('name_agence',$q)->where('is_admin',2)->where('is_active',1)->first();
            if ($agence != null) {
                return redirect()->route('agence.show',$agence->slug);
            }else {
                Toastr::warning('Il n\'y a pas de resultat pour cette recherche', 'Resultat Recherche', ["positionClass" => "toast-top-right"]);
                return back();
            }
        }else {
           Toastr::warning('Il n\'y a pas de resultat pour cette recherche', 'Resultat Recherche', ["positionClass" => "toast-top-right"]);
            return back();
        }
    }
}
