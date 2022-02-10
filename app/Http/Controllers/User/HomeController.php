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
         return view('user.index');
    }

   

     public function store(Request $request)
    {
           // The plain text password to be hashed
        $plaintext_password = "Password@123";
        
        // The hash of the password that
        // can be stored in the database
        $hash = password_hash($plaintext_password,PASSWORD_DEFAULT);


        // Plaintext password entered by the user
        $plaintext_password = "Password@123";
        
        // The hashed password retrieved from database
        $hash = 
        "$2y$10$8sA2N5Sx/1zMQv2yrTDAaOFlbGWECrrgB68axL.hBb78NhQdyAqWm";
        
        // Verify the hash against the password entered
        $verify = password_verify($plaintext_password, $hash);
        
        // Print the result depending if they match
        if ($verify) {
            dd($verify);
            echo 'Password Verified!';
        } else {
            echo 'Incorrect Password!';
        }
    }
}
