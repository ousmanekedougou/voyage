<?php

namespace App\Http\Controllers\Agence\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Agence;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo =  RouteServiceProvider::HOMEAGENCE;

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('guest:agence')->except('logout');
    }

     public function showLoginForm()
     {
        if (Auth::guard('agence')->check()) {
            return redirect()->route('agence.index');
        } else {
            return view('agence.auth.login');
        }
        //  return view('agence.login');
     }

     public function login(Request $request)
     {
        // dd($request->all());
         $this->validateLogin($request);
 
         if ($this->attemptLogin($request)) {
             return $this->sendLoginResponse($request);
         }
 
         return $this->sendFailedLoginResponse($request);
     }


     protected function credentials(Request $request)
     {
         $admin = Agence::where('email',$request->email)->first(); 
         if($admin)
         {
             if($admin->is_active == 0 || $admin->confirmation_token != null)
             {
                 return ['email' => 'inactive','password' => 'Votre Compte n\'est pas actif veillez contacter le President de l\'AEERK  '];
             }
             else
                {
                    return ['email' => $request->email,'password' => $request->password,'is_active' => 1,'confirmation_token' => null];
                }
        }
        return $request->only($this->username(), 'password');
     }


     protected function sendFailedLoginResponse(Request $request)
     {
 
         $fields = $this->credentials($request);
         if($fields['email'] == 'inactive')
         {
             $errors = $fields['password'];
 
         }else{
 
             $errors =  [$this->username() => trans('auth.failed')];
 
            }
            
            return redirect()->back()->withInput($request->only($this->username()))->withErrors($errors);
 
     }



     public function logout(Request $request)
     {
         $this->guard('agence')->logout();
 
         $request->session()->invalidate();
 
         $request->session()->regenerateToken();
 
         return $this->loggedOut($request) ?: redirect('/');
     }


    protected function guard()
    {
        return Auth::guard('agence');
    }

}
