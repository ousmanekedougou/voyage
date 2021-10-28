<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Admin\Siege;
use App\Models\Admin\Bus;
use App\Models\User;
use App\Models\User\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\Hash;
use App\Notifications\RegisteredClient;

class HomeController extends Controller
{
    public function index()
    {
        define('Is_Admin',2);
        $agences = User::where('is_admin',Is_Admin)->orderBy('id','ASC')->get();
        return view('user.index',compact('agences'));
    }

    public function show($slug)
    {
        $buses  = Bus::orderBy('id','ASC')->get();
        $agence = User::where('slug',$slug)->first();
        $sieges = Siege::where('user_id',$agence->id)->get();
        if($sieges->count() > 0){
            return view('user.agence.show',compact('sieges','agence','buses'));
        }else {
            return back()->with('error','Cette agence n\'a pas de siege');
        }
    }

     public function store(Request $request)
    {
         $this->validate($request,[
            'name' => 'required|string',
            'email' => 'required|string|email|max:255|unique:clients',
            'phone' => 'required|string|max:255|unique:clients',
            'ville' => 'required|numeric',
            'bus' => 'required|numeric',
        ]);
        $clients = Client::where('bus_id',$request->bus)->where('registered_at',Carbon::today())->get();
        $buse = Bus::where('id',$request->bus)->first();
        if ($clients->count() < $buse->place) {
            $pl = $buse->inscrit;
            $buse->inscrit = $pl + 1;
            $buse->save();
            
            $add_client = new Client();
            $add_client->name = $request->name;
            $add_client->email = $request->email;
            $add_client->phone = $request->phone;
            $add_client->ville_id = $request->ville;
            $add_client->bus_id = $request->bus;
            $add_client->registered_at = $request->date;
            $add_client->confirmation_token = str_replace('/','',Hash::make(Str::random(40)));
            $add_client->save();
            $add_client->notify(new RegisteredClient());
            return back()->with('success','Votre client a ete bien ete ajoute');
        }else if ($clients->count() == $buse->place){
            $bus_plein = Bus::where('id',$request->bus)->first();
            $bus_plein->plein = 1;
            $bus_plein->save();
            return back()->with('error','Ce bus est pelin');
        }
    }
}
