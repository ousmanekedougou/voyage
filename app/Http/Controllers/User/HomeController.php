<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Admin\Agence;
use App\Models\Admin\Siege;
use App\Models\Admin\Part;
use App\Models\User\Customer;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HomeController extends Controller
{

    public function index(){

        $agences = Agence::where('is_admin',0)
        ->where('is_active',1)->get();
        $sieges = Siege::all();
        $users = Customer::where('is_active',1)->get();
        $partenaires = Part::where('is_active', 1)->get();
        return view('user.index',compact('agences','sieges','users','partenaires'));
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
