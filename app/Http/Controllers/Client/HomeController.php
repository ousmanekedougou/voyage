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
        $this->middleware(['isClient'])->except('confirm');
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


        $newsletters = Notify::all();

        $siege_all = Siege::all();

        $NotificationTravelDay = null;

        $getClientDate = Client::where('customer_id',Auth::guard('client')->user()->id)
            // ->where('amount','!=',null)
            // ->where('status',0)
            ->first();
        if (!$getClientDate) {
            $NotificationTravelDay = null;
        }else {
            $getClientregistered_at =  date( 'd-m-Y', strtotime( $getClientDate->registered_at ) );

            if (date( 'd-m-Y', strtotime( 'today' ) ) == $getClientregistered_at) {
                $NotificationTravelDay = "aujourdhui";
            }elseif (date( 'd-m-Y', strtotime( '+1 day')) == $getClientregistered_at ) {
                $NotificationTravelDay = "demain";
            }elseif (date( 'd-m-Y', strtotime( '+3 day')) == $getClientregistered_at) {
                $NotificationTravelDay = "dans 3 jours";
            }elseif (date( 'd-m-Y', strtotime('+7 day')) == $getClientregistered_at) {
                $NotificationTravelDay = "dans une semaine";
            }else{
                $NotificationTravelDay = null;
            }
            
        }
        return view('client.index',compact('agences','agenceCount','autre_regions','newsletters','siege_all','getClientDate','NotificationTravelDay'));
    }
    

     public function confirm($id , $token){
        define('ACTIVE',1);
        $customer = Customer::where('id',$id)->where('confirmation_token',$token)->first();
        if ($customer) {
            $customer->update(['confirmation_token' => null , 'is_active' => ACTIVE]);
            // $this->guard('client')->login($customer);
            // Toastr::success('Votre compte a bien ete confirmer', 'Confirmation de compte', ["positionClass" => "toast-top-right"]);
            // return redirect($this->redirectPath());
            Toastr::success('Votre compte a bien ete confirmer', 'Compte Confirmer', ["positionClass" => "toast-top-right"]);
            return view('client.auth.login');
        }else {
            Toastr::success('Ce lien ne semble plus valide', 'Compte invalide', ["positionClass" => "toast-top-right"]);
            return redirect()->route('customer.customer.login');
        }
    }
}
