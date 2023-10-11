<?php

namespace App\Http\Controllers\Agence\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

use App\Http\Controllers\Controller;
use App\Models\Admin\Agence;
use App\Notifications\ForgotAgencePassword;
use Brian2694\Toastr\Facades\Toastr;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    public function reset(){
        return view('agence.auth.passwords.email');
    }

    public function verify(Request $request){
        $validator = $this->validate($request , [
            'email' => 'required|email',
        ]);

        $admin_email = Agence::where('email',$request->email)->first();

        if ($admin_email) {
            $admin_email->notify(new ForgotAgencePassword());
            Toastr::success('Un email vous a ete envoyer merci de verifier', 'Notification Message', ["positionClass" => "toast-top-right"]);
            return redirect()->route('index');
        }else {
            return back()->with('error_email','Cet adresse email n\' existe');
        }
    }

    public function confirm($id,$email){
        $admin_confirm = Agence::where('id',$id)->where('email',$email)->first();
        $token= str_replace('/','',Hash::make(Str::random(40)));
        if($admin_confirm){
            return view('agence.auth.passwords.reset',compact('admin_confirm','id','token','email'));
        }
    }

    public function update(Request $request,$email){
        $this->validate($request,[
            'email' => 'required',
            'password' => 'required|string|confirmed',
        ]);
        $token = $request->token;
        if ($token) {
            $update_admin_email = Agence::where('email',$email)->first();
            
            if ($update_admin_email) {
                $update_admin_email->update(['password' => Hash::make($request->password)]);
                return redirect()->route('agence.agence.login')->with('message','Votre mot de passe a ete modifier avec success,veuillez vous connecter a nouveu');
            }else {
                return back()->with('Error email','Adress email ou mot de passe non valide');
            }
        }
        return back()->with('Error email','Cette requette semble plus valide');
    }
}
