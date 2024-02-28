<?php

namespace App\Http\Controllers\Agence;

use App\Http\Controllers\Controller;
use App\Models\Admin\Agent;
use Illuminate\Http\Request;
use App\Models\Admin\Siege;
use App\Notifications\AgentRegietsred;
use Illuminate\Support\Str;
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
        $this->middleware(['isAgence'])->except('confirm');
    }
    public function index()
    {
       
    }

  

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
            'siege' => 'required|numeric',
            'role' => 'required|numeric',
            'montant' => 'required|numeric',
        ]);
        // dd($request->all());
        $add_agent = new Agent();
        $add_agent->name = $request->name;
        $add_agent->email = $request->email;
        $add_agent->phone = $request->phone;
        $add_agent->password = Hash::make('password');
        $add_agent->is_admin = 0;
        $add_agent->is_active = 0;
        $add_agent->role = $request->role;
        $add_agent->montant_journaliere = $request->montant;
        $add_agent->confirmation_token = str_replace('/','',Hash::make(Str::random(40)));
        $add_agent->slug = str_replace('/','',Hash::make(Str::random(20).'agent'.$request->email));
        $add_agent->siege_id = $request->siege;
        $add_agent->agence_id = Auth::guard('agence')->user()->id;
        $add_agent->save();

        Notification::route('mail',Auth::guard('agence')->user()->email)
            ->notify(new AgentRegietsred($add_agent));

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
        $siege = Siege::where('id',$id)->where('agence_id',Auth::guard('agence')->user()->id)->first();
        $sieges = Siege::where('agence_id',Auth::guard('agence')->user()->id)->get();;
        $agents = Agent::where('siege_id',$id)->where('agence_id',Auth::guard('agence')->user()->id)->get();
        return view('agence.agent.index',compact('agents','siege','sieges'));
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
        $user = Agent::where('id',$id)->where('agence_id',Auth::guard('agence')->user()->id)->first();
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
        $update_agent = Agent::where('id',$id)->first();
        if ($request->is_active == 1) {
            $update_agent->is_active = DESACTIVEAGENCE;
            $update_agent->confirmation_token = str_replace('/','',Hash::make(Str::random(40)));
            $update_agent->save();
            Toastr::success('Votre agent a bien ete desactiver', 'Desactivation', ["positionClass" => "toast-top-right"]);
            return back();
        }else{
            $update_agent->is_active = ACTIVEAGENCE;
            $update_agent->confirmation_token = null;
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
        $agent = Agent::where('id',$id)->where('agence_id',Auth::guard('agence')->user()->id)->first();
        $imgag = $agent->logo;
        Storage::delete($imgag);
        $agent->delete();
        Toastr::success('Votre agent a bien ete supprimer', 'Suppression agent', ["positionClass" => "toast-top-right"]);
        return back();
    }
}
