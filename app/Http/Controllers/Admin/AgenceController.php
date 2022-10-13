<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Agence;
use App\Models\User;
use App\Models\User\Notify;
use App\Models\User\Region;
use App\Notifications\Newsleter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Notifications\RegisteredUser;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;

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
        $agences = Agence::where('is_admin',0)->orderBy('id','DESC')->paginate(10);
        $regions = Region::where('status',1)->get();
        return view('admin.agence.index',compact('agences','regions'));
    }


    // public function confirm($id , $token){
    //     define('ACTIVE',1);
    //     $user = User::where('id',$id)->where('confirmation_token',$token)->first();
    //     if ($user) {
    //         $user->update(['confirmation_token' => null , 'is_active' => ACTIVE]);
    //         $this->guard()->login($user);
    //         Toastr::success('Votre compte a bien ete confirmer', 'Confirmation de compte', ["positionClass" => "toast-top-right"]);
    //         return redirect($this->redirectPath());
    //     }else {
    //         Toastr::error('Ce lien ne semble plus valide', 'Error de connexion', ["positionClass" => "toast-top-right"]);
    //         return redirect()->route('login');
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
            // 'registre_commerce' => 'required|string|max:255|unique:users',
            'adress' => 'required|string',
            'slogan' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp',
            'region' => 'required|numeric'
        ]);

        $add_agence = new Agence();
        $imageName = '';
        if($request->hasFile('image'))
        {
            $imageName = $request->image->store('public/Agence');
        }

        
        $add_agence->name = $request->name;
        $add_agence->email = $request->email;
        $add_agence->phone = $request->phone;
        $add_agence->password = Hash::make('password');
        // $add_agence->registre_commerce = $request->registre_commerce;
        $add_agence->adress = $request->adress;
        $add_agence->slogan = $request->slogan;
        $add_agence->is_admin = 0;
        $add_agence->is_active = 0;
        $add_agence->logo = $imageName;
        $add_agence->confirmation_token = str_replace('/','',Hash::make(Str::random(40)));
        $add_agence->slug = str_replace('/','',Hash::make(Str::random(20).'agence'.$request->email));
        $add_agence->user_id = Auth::user()->id;
        $add_agence->region_id = $request->region;
        $add_agence->save();

        // Notification::route('mail',Auth::user()->email)
        //     ->notify(new RegisteredUser($add_agence));

        // $notifys = Notify::all();
        // foreach ($notifys as $notify) {
        //     Notification::route('mail','ousmanelaravel@gmail.com')
        //     ->notify(new Newsleter($notify));
        // }
        Toastr::success('Votre agence a bien ete creer', 'Ajout agence', ["positionClass" => "toast-top-right"]);
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
        $agence = Agence::where('id',$id)->first();
        return view('admin.order.index',compact('agence'));
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
        $update_agence = Agence::where('id',$id)->first();
        $agence_agents = Agence::where('user_id',$update_agence->id)->get();
        if ($request->is_active == 1) {
            $update_agence->is_active = DESACTIVEAGENCE;
            $update_agence->confirmation_token = str_replace('/','',Hash::make(Str::random(40)));
            $update_agence->user_id = Auth::user()->id;
            $update_agence->save();
            foreach ($agence_agents as $agent) {
                $agent->is_active = DESACTIVEAGENCE;
                $agent->save();
            }
            $notifys = Notify::all();
            foreach ($notifys as $notify) {
                Notification::route('mail','ousmanelaravel@gmail.com')
                    ->notify(new Newsleter($notify));
            }
            // $sendPhone = User::where('');
            // $config = array(
            //     'clientId' => config('app.clientId'),
            //     'clientSecret' =>  config('app.clientSecret'),
            // );
            // $osms = new Sms($config);

            // $data = $osms->getTokenFromConsumerKey();
            // // dd($data);
            // $token = array(
            //     'token' => $data['access_token']
            // );
            // $phone = intval($client->phone);
            // $message = "AEERK KEDOUGOU:\nSalut $client->prenom $client->nom les documents que vous avez deposés pour les codifications ont été rejetés\n\nMotif du rejet :\n$client->texmail.\nVeuiilez vous repprocher au-pres du bureau plus d'information. \nCordialement le Bureau de l'AEERK";
                
            // $response = $osms->sendSms(
            //     // sender
            //     'tel:+' . $sendPhone->sendPhone,
            //     // receiver
            //     'tel:+221782875971',
            //     // message
            //     $message,

            //     'TouCki'
            // );
            Toastr::success('Votre agence a bien ete desactiver', 'Desactivation', ["positionClass" => "toast-top-right"]);
            return back();
        }else{
            $update_agence->is_active = ACTIVEAGENCE;
            $update_agence->confirmation_token = null;
            $update_agence->user_id = Auth::user()->id;
            $update_agence->save();
            foreach ($agence_agents as $agent) {
                $agent->is_active = ACTIVEAGENCE;
                $agent->save();
            }
            $notifys = Notify::all();
            foreach ($notifys as $notify) {
                Notification::route('mail','ousmanelaravel@gmail.com')
                    ->notify(new Newsleter($notify));
            }
            Toastr::success('Votre agence a bien ete activer', 'Activation', ["positionClass" => "toast-top-right"]);
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
        $agencedele = Agence::find($id);
        $agenec_logo = $agencedele->logo;
        $img_ag = $agencedele->image_agence;
        Storage::delete($agenec_logo); 
        Storage::delete($img_ag);
        $agencedele->delete();  
        Toastr::success('Votre agence a bien ete supprimer', 'Suppression', ["positionClass" => "toast-top-right"]);
        return back();
    }
}
