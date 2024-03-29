<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Notifications\RegisteredUser;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('confirm');
    }

    public function confirm($id , $token){
       
        define('ACTIVE',1);
        $user = User::where('id',$id)->where('confirmation_token',$token)->first();
        if ($user) {
            $user->update(['confirmation_token' => null , 'is_active' => ACTIVE]);
            $this->guard()->login($user);
            Toastr::success('Votre compte a bien ete confirmer', 'Compte Confirmer', ["positionClass" => "toast-top-right"]);
            return redirect($this->redirectPath());
        }else {
            Toastr::success('Ce lien ne semble plus valide', 'Compte invalide', ["positionClass" => "toast-top-right"]);
            return redirect()->route('login');
        }
    }

     public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        Notification::route('mail',Auth::user()->email)
            ->notify(new RegisteredUser($user));
        return back();
        Toastr::success('Votre compte a bien ete creer', 'Creation de compte', ["positionClass" => "toast-top-right"]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        // dd($data);
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $imageName = '';
        if(request()->hasFile('image'))
        {
            $imageName = $data['image']->store('public/Agence');
        }
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => Hash::make('password'),
            'adress' => $data['adress'],
            'logo' =>  $imageName,
            'is_admin' => 1,
            'status' => 0,
            'is_active' => 0,
            'confirmation_token' => str_replace('/','',Hash::make(Str::random(40))), 
            'slug' =>  str_replace('/','',Hash::make(Str::random(20).'admin'.$data['email'])),
        ]);
    }


   
}
