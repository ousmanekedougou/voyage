<?php

namespace App\Http\Controllers\Agence;
use App\Http\Controllers\Controller;
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
       $this->middleware(['isAgence']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $agents = Agent::orderBy('id','DESC')->get();
        $sieges = Siege::where('agence_id', Auth::guard('agence')->user()->id)->get();
        return view('agence.index',compact('agents','sieges'));
    }
    
}
