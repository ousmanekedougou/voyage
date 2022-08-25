<?php

namespace App\Http\Controllers\Client;

use App\Helpers\UserSystemInfoHelper;
use App\Http\Controllers\Controller;
use App\Models\Admin\Agence;
use App\Models\Admin\Bagage;
use App\Models\Admin\BagageClient;
use App\Models\User\Client;
use Carbon\Carbon;
use App\Models\Admin\Bus;
use App\Models\Admin\ColiClient;
use App\Models\Admin\Colie;
use App\Models\Admin\DateDepart;
use App\Models\Admin\Historical;
use App\Models\Admin\Itineraire;
use App\Models\Admin\Siege;
use App\Models\User;
use App\Models\User\Customer;
use App\Models\User\Notify;
use App\Models\User\Region;
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
        $this->middleware(['isClient']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $getip = UserSystemInfoHelper::get_ip();
        $get_user_geo = geoip()->getLocation($getip);
        // dd($get_user_geo->city,$get_user_geo->state_name);
        $region = Region::where('name',$get_user_geo->city)->orWhere('slug',$get_user_geo->state_name)->first();
        $autre_regions = Region::where('name','!=',$get_user_geo->city)->orWhere('slug','!=',$get_user_geo->state_name)->get();
        // dd($region);
        $agences = Agence::where('is_admin',0)
        ->where('is_active',1)
        // ->where('region_id',$region->id)
        ->orderBy('id','ASC')->paginate(12);
        $agenceAll = Agence::where('is_admin',0)->where('is_active',1)->orderBy('id','ASC')->get();
        $agenceCount = $agenceAll->count(); 
        return view('client.index',compact('agences','agenceCount','autre_regions'));
    }
    
}
