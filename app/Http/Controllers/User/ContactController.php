<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User\Contact;
use App\Mail\ContactMessage;
use Illuminate\Support\Facades\Mail;
use App\Notifications\ContactMailClient;
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

        // Mail::to('ousmanelaravel@gmail.com')
        //     ->send(new ContactMessage($request->name,$request->email,$request->msg));

        return back()->with('success','Votre message a bien ete envoyer');
    }
}


