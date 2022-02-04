<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin\Siege;
use Illuminate\Support\Str;
use App\Notifications\RegisteredUser;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(['auth','isAgence'])->except('confirm');
    }
    public function index()
    {
       
    }

    // public function confirm($id , $token){
    //     define('ACTIVE',1);
    //     $user = User::where('id',$id)->where('confirmation_token',$token)->first();
    //     if ($user) {
    //         $user->update(['confirmation_token' => null , 'is_active' => ACTIVE]);
    //         $this->guard()->login($user);
    //         return redirect($this->redirectPath())->with('success','Votre compte a bien ete confirmer');
    //     }else {
    //         return redirect('/login')->with('error','Ce lien ne semble plus valide');
    //     }
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'siege' => 'required|numeric',
        ]);
        $add_agent = new User();
        define('AGENT',3);
        $add_agent->name = $request->name;
        $add_agent->email = $request->email;
        $add_agent->email_agence = Auth::user()->email_agence;
        $add_agent->phone = $request->phone;
        $add_agent->password = Hash::make($request->password);
        $add_agent->is_admin = AGENT;
        $add_agent->confirmation_token = str_replace('/','',Hash::make(Str::random(40)));
        $add_agent->slug = str_replace('/','',Hash::make(Str::random(20).'agent'.$request->email));
        $add_agent->siege_id = $request->siege;
        $add_agent->user_id = Auth::user()->id;
        $add_agent->image_agence = Auth::user()->image_agence;
        $add_agent->agence_name = Auth::user()->name_agence;
        $add_agent->save();
        Notification::route('mail',Auth::user()->email_agence)
                ->notify(new RegisteredUser($add_agent));
        Toastr::success('Votre agent a bien ete creer', 'Ajout agence', ["positionClass" => "toast-top-right"]);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $siege = Siege::where('id',$id)->where('user_id',Auth::user()->id)->first();
         $sieges = Siege::where('user_id',Auth::user()->id)->get();
         
        return view('admin.agent.index',compact('siege','sieges'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request , $id)
    {

    }

    public function edite(Request $request , $id)
    {
        // dd($request->role);
        $user = User::where('id',$id)->first();
        $user->role = $request->role;
        $user->save();
        Toastr::success('Votre role a bien ete assigne', 'Ajout de role', ["positionClass" => "toast-top-right"]);
        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        define('DESACTIVEAGENCE',0);
        define('ACTIVEAGENCE',1);
        $update_agent = User::where('id',$id)->first();
        if ($request->is_active == 1) {
            $update_agent->is_active = DESACTIVEAGENCE;
            $update_agent->confirmation_token = str_replace('/','',Hash::make(Str::random(40)));
            $update_agent->image_agence = Auth::user()->image_agence;
            $update_agent->agence_name = Auth::user()->name_agence;
            $update_agent->email_agence = Auth::user()->email_agence;
            $update_agent->save();
            Toastr::success('Votre agent a bien ete desactiver', 'Desactivation', ["positionClass" => "toast-top-right"]);
            return back();
        }else{
            $update_agent->is_active = ACTIVEAGENCE;
            $update_agent->confirmation_token = null;
            $update_agent->image_agence = Auth::user()->image_agence;
            $update_agent->agence_name = Auth::user()->name_agence;
            $update_agent->email_agence = Auth::user()->email_agence;
            $update_agent->save();
            Toastr::success('Votre agent a bien ete activer', 'Activation', ["positionClass" => "toast-top-right"]);
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $agent = User::find($id)->delete();
        $imgag = $agent->logo;
        Storage::delete($imgag);
        $agent->delete();
        Toastr::success('Votre agent a bien ete supprimer', 'Suppression agent', ["positionClass" => "toast-top-right"]);
        return back();
    }
}
