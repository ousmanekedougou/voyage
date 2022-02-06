<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User\Contact;
use App\Mail\ContactMessage;
use App\Models\User\Notify;
use Illuminate\Support\Facades\Mail;
use App\Notifications\ContactMailClient;
use Brian2694\Toastr\Facades\Toastr;

class ContactController extends Controller
{
     public function index(){
        return view('user.contact.index');
    }

    public function store(Request $request){
        $this->validate($request,[
            'name' => 'required|string',
            'email' => 'required|string|email',
            'msg' => 'required|string',
        ]);
        $mailable = new ContactMessage($request->name,$request->email,$request->msg);
        Mail::to(config('contact.contact_support_email'))
            ->send($mailable);
        Toastr::success('Votre message a ete envoyer', 'Message', ["positionClass" => "toast-top-right"]);
        return back();
    }

    public function post(Request $request){
        // dd($request->email);
        $this->validate($request,[
            'email' => 'required|string|email|unique:notifies',
        ]);
        Notify::create([
            'email' => $request->email
        ]);
        Toastr::success('Votre inscription a bien ete enregistre', 'Newsleter', ["positionClass" => "toast-top-right"]);
        return back();
    }
}


