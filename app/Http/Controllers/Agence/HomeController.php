<?php

namespace App\Http\Controllers\Agence;
use App\Http\Controllers\Controller;
use App\Models\Admin\Agence;
use App\Models\Admin\Agent;
use App\Models\Admin\Jour;
use App\Models\Admin\Siege;
use Carbon\Carbon;
use App\Models\User\Notify;
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
       $this->middleware(['isAgence'])->except('confirm');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $jours = Jour::all();
        $agents = Agent::where('agence_id',Auth::guard('agence')->user()->id)->orderBy('id','DESC')->get();
        $sieges = Siege::where('agence_id', Auth::guard('agence')->user()->id)->get();

        $paimentNotification = null;
        $today = date('d');
        $isPaymentDay = false;
        if (Carbon::now()->day <= Auth::guard('agence')->user()->payment_at) {
            $paimentNotification = "le paiment de vos agents doit ce faire le " .Auth::guard('agence')->user()->payment_at ." de ce mois";
        }else {
            $nextMonth = Carbon::now()->addMonth();
            $nextMonthName = $nextMonth->format('F');
            $paimentNotification = "le paiment de vos agents doit avoir lieu " .Auth::guard('agence')->user()->payment_at ." du mois de " .$nextMonthName;
        }
        if ($today == Auth::guard('agence')->user()->payment_at) {
            $isPaymentDay = true;
        }
        return view('agence.index',compact('agents','sieges','jours','paimentNotification','isPaymentDay'));
    }
    

    public function confirm($id , $token){
        define('ACTIVE',1);
        $agence = Agence::where('id',$id)->where('confirmation_token',$token)->first();
        if ($agence) {
            $agence->update(['confirmation_token' => null , 'is_active' => ACTIVE]);
            Toastr::success('Votre compte a bien ete confirmer', 'Compte Confirmer', ["positionClass" => "toast-top-right"]);
            return view('agence.auth.login');
        }else {
            Toastr::error('Ce lien ne semble plus valide', 'Error de connexion', ["positionClass" => "toast-top-right"]);
            return redirect()->route('agence.agence.login');
        }
    }
}
