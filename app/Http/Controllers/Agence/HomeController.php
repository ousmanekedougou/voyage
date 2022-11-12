<?php

namespace App\Http\Controllers\Agence;
use App\Http\Controllers\Controller;
use App\Models\Admin\Agence;
use App\Models\Admin\Agent;
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
        $agents = Agent::where('agence_id',Auth::guard('agence')->user()->id)->orderBy('id','DESC')->get();
        $sieges = Siege::where('agence_id', Auth::guard('agence')->user()->id)->get();
        return view('agence.index',compact('agents','sieges'));
    }
    

    public function confirm($id , $token){
        define('ACTIVE',1);
        $agence = Agence::where('id',$id)->where('confirmation_token',$token)->first();
        if ($agence) {
            $agence->update(['confirmation_token' => null , 'is_active' => ACTIVE]);
            $this->guard()->login($agence);
            Toastr::success('Votre compte a bien ete confirmer', 'Confirmation de compte', ["positionClass" => "toast-top-right"]);
            return redirect($this->redirectPath());
        }else {
            Toastr::error('Ce lien ne semble plus valide', 'Error de connexion', ["positionClass" => "toast-top-right"]);
            return redirect()->route('login');
        }
    }
}
