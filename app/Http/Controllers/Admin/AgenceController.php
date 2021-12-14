<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Agence;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Notifications\RegisteredUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class AgenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

      public function __construct()
    {
        $this->middleware(['auth','isAdmin'])->except('confirm');
    }

      public function index()
    {
        $agences = User::where('is_admin',2)->orderBy('id','DESC')->get();
        return view('admin.agence.index',compact('agences'));
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
            'name' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'registre_commerce' => 'required|string|max:255|unique:users',
            'adress' => 'required|string',
            'slogan' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp',
        ]);

        $imageName = '';
        $add_agence = new User();
          if($request->hasFile('image'))
        {
            $imageName = $request->image->store('public/Agence');
        }
        define('AGENCE',2);
        $add_agence->name = $request->name;
        $add_agence->email = $request->email;
        $add_agence->phone = $request->phone;
        $add_agence->password = Hash::make($request->password);
        $add_agence->registre_commerce = $request->registre_commerce;
        $add_agence->adress = $request->adress;
        $add_agence->slogan = $request->slogan;
        $add_agence->is_admin = AGENCE;
        $add_agence->logo = $imageName;
        $add_agence->confirmation_token = str_replace('/','',Hash::make(Str::random(40)));
        $add_agence->slug = str_replace('/','',Hash::make(Str::random(20).'agence'.$request->email));
        $add_agence->user_id = Auth::user()->id;
        $add_agence->save();
        Notification::route('mail',Auth::user()->email)
                ->notify(new RegisteredUser($add_agence));
        return back()->with('success','Votre agence a bien ete creer');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $update_agence = User::where('id',$id)->first();
        $agence_agents = User::where('user_id',$update_agence->id)->get();
        if ($request->is_active == 1) {
            $update_agence->is_active = DESACTIVEAGENCE;
            $update_agence->confirmation_token = str_replace('/','',Hash::make(Str::random(40)));
            $update_agence->user_id = Auth::user()->id;
            $update_agence->save();
            foreach ($agence_agents as $agent) {
                $agent->is_active = DESACTIVEAGENCE;
                $agent->save();
            }
            return back()->with('success','Cette agence a ete desactiver');
        }else{
            $update_agence->is_active = ACTIVEAGENCE;
            $update_agence->confirmation_token = null;
            $update_agence->user_id = Auth::user()->id;
            $update_agence->save();
            foreach ($agence_agents as $agent) {
                $agent->is_active = ACTIVEAGENCE;
                $agent->save();
            }
            return back()->with('success','Cette agence a ete activer');
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
        User::find($id)->delete();
        return back()->with('success','Votre agence a bien ete supprimer');
    }
}
