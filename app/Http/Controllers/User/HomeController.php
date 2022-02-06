<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Admin\Siege;
use App\Models\Admin\Bus;
use App\Models\User;
use App\Models\User\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\Hash;
use App\Notifications\RegisteredClient;

class HomeController extends Controller
{
    // public function index()
    // {
    //     define('Is_Admin',2);
    //     $agences = User::where('is_admin',Is_Admin)->orderBy('id','ASC')->get();
    //     return view('user.index',compact('agences'));
    // }

    public function index(){
         return view('auth.login');
    }

   

     public function store(Request $request)
    {
        
    }
}
