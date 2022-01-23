<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Bagage;
use App\Models\Admin\BagageClient;
use App\Models\User\Client;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BagageController extends Controller
{
     public function __construct()
    {
        $this->middleware(['auth','isAgent','isBagage']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Bagage::where('siege_id',Auth::user()->siege_id)->paginate(15);
        return view('admin.bagage.index',compact('clients'));
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
            'phone' => 'required|string|max:255',
        ]);
        $client = Client::where('phone','221'.$request->phone)->where('registered_at',Carbon::today()->format('Y-m-d'))->first();
        if ($client->amount == $client->ville->amount) {
            $ad_bagage = new Bagage();
            $ad_bagage->client_name = $client->name;
            $ad_bagage->client_phone = $client->phone;
            $ad_bagage->client_ville = $client->ville->name;
            $ad_bagage->client_id = $client->id;
            $ad_bagage->siege_id = Auth::user()->siege_id;
            $ad_bagage->save();
            return back()->with('success','Votre client a ete cree');
        }else {
            return back()->with('error','Votre client n\'existe pas');
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
        $client = Bagage::where('id',$id)->first();
        return view('admin.bagage.show',compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
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
         $imageName = '';
        if($request->hasFile('image'))
        {
            $imageName = $request->image->store('public/Bagages');
        }
         $client = new BagageClient();
         $client->image = $imageName;
         $client->name = $request->name;
         $client->prix = $request->prix;
         $client->desc = $request->desc;
         $client->bagage_id = $id;
         $client->siege_id = Auth::user()->siege_id;
         $client->save();
         $client_p_t = Bagage::where('id',$id)->first();
        if ($client_p_t->prix_total == 0) {
            $client_p_t->prix_total = $request->prix;
        }elseif ($client_p_t->prix_total > 0) {
            $client_p_t->prix_total = $client_p_t->prix_total + $request->prix;
        }
        $client_p_t->save();
         return back()->with('success','Vos bagage ont ete ajouter');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Bagage::where('id',$id)->where('siege_id',Auth::user()->siege_id)->delete();
        BagageClient::where('bagage_id',$id)->delete();
        return back()->with('success','Votre client et ses bagages ont ete supprimer');
    }
}


