<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Admin\Bus;
use App\Models\Admin\Itineraire;
use App\Models\User\Client;
use App\Notifications\RegisteredClient;
use Illuminate\Support\Str;
use App\Models\Admin\DateDepart;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'name' => 'required|string',
            'email' => 'required|string|email|max:255',
            'phone' => 'required|string|max:255',
            'ville' => 'required|numeric',
            'date' => 'required|string',
            'cni' => 'required|numeric',
        ]);
        // $clients = Client::where('bus_id',$request->bus)->get();
        // $buse = Bus::where('id',$request->bus)->first();
        $date = DateDepart::where('id',$request->date)->first();
        // dd($date->itineraire_id);
        $buse = Bus::where('date_depart_id',$date->id)->where('itineraire_id',$date->itineraire_id)->where('plein',0)->first();
        $clients = Client::where('bus_id',$buse->id)->get();
        $info_email = Client::where('registered_at',$buse->date_depart->depart_at)->where('email',$request->email)->first();
        $info_phone = Client::where('registered_at',$buse->date_depart->depart_at)->where('phone',$request->phone)->first();
        $info_cni = Client::where('registered_at',$buse->date_depart->depart_at)->where('cni',$request->cni)->first();
        if ($info_email == true) {
            return back()->with('error','Cette adresse email est utiliser pour cette date');
        }elseif ($info_phone == true) {
            return back()->with('error','Ce numero de telephone est utiliser pour cette date');
        }elseif ($info_cni == true) {
            return back()->with('error','Ce numero de CNI est utiliser pour cette date');
        }else {
            if ($clients->count() < $buse->place) {
                $pl = $buse->inscrit;
                $buse->inscrit = $pl + 1;
                $buse->save();

                $phoneFinale = '';
                $phoneComplet = '221'.$request->phone;
                if (strlen($request->phone) == 13 ) {
                    $phoneFinale = $request->phone;
                }elseif (strlen($request->phone) == 9) {
                    $phoneFinale = $phoneComplet;
                }else {
                    return back()->with('error','votre numero de telephone est invalid');
                }

                $cni_final = '';

                if (strlen($request->cni == 13)) {
                    $cni_final = $request->cni;
                }else{
                    return back()->with('error','votre numero de piece est invalide');
                }
                
                $add_client = new Client();
                $add_client->name = $request->name;
                $add_client->email = $request->email;
                $add_client->phone = $phoneFinale;
                $add_client->cni = $cni_final;
                $add_client->ville_id = $request->ville;
                $add_client->bus_id = $buse->id;
                $add_client->position = $buse->inscrit;
                $add_client->registered_at = $buse->date_depart->depart_at;
                $add_client->confirmation_token = str_replace('/','',Hash::make(Str::random(40)));
                $add_client->agence = $request->agence_name;
                $add_client->save();
                $add_client->notify(new RegisteredClient());
                    return back()->with(
                    [
                        "success" => "Salut $add_client->name votre instcription sur $add_client->agence a bien ete enregistre.
                        <br/> Veuillez ouvrire votre compte gmail pour pouvoir payer votre billet",

                    ]
                );
            }else if ($clients->count() == $buse->place){
                $bus_plein = Bus::where('id',$buse->id)->first();
                $bus_plein->plein = 1;
                $bus_plein->save();
                return back()->with('error','Ce bus est pelin');
            }
        }
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
