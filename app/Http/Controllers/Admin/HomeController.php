<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        if ($this->middleware(['IsAdmin'])) {
            $agences = User::where('is_admin',2)->orderBy('id','DESC')->paginate(9);
            $user = Auth::user();
            $siegeCount = Siege::all();
            $newCount = Notify::all();
            $regions = Region::where('status',1)->get();
            return view('admin.homeAdmin.index',compact('agences','user','siegeCount','newCount','regions'));
        }else {
            Toastr::error('Vous n\'aviez pas le droit d\'acces sur cette page', 'Resultat Recherche', ["positionClass" => "toast-top-right"]);
            return back();
            // return view('admin.home',compact('itineraires','user'));
        }
    }
    
}
