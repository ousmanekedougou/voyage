<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\Admin\Bagage;
use App\Models\Admin\BagageClient;
use App\Models\User\Client;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BagageController extends Controller
{
     public function __construct()
    {
        $this->middleware(['isAgent','isBagage']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::where('siege_id',Auth::guard('agent')->user()->siege_id)
        // ->where('registered_at',Carbon::today()->format('Y-m-d'))
        // ->where('amount','!=',null)
        // ->where('status',0)
        ->get();
        // dd($clients);
        return view('agent.bagage.index',compact('clients'));
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
            'prix' => 'required|numeric',
            'desc' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp',
        ]);
         $imageName = '';
        if($request->hasFile('image'))
        {
            $imageName = $request->image->store('public/Bagages');
        }
         $client = new Bagage();
         $client->image = $imageName;
         $client->name = $request->name;
         $client->prix = $request->prix;
         $client->detail = $request->desc;
         $client->client_id = $request->clientId;
         $client->siege_id = Auth::guard('agent')->user()->siege_id;
         $client->save();

        $clientPrix = Client::where('id',$request->clientId)
        ->where('siege_id',Auth::guard('agent')->user()->siege_id)
        ->first();
        $clientPrix->prix_total = $clientPrix->prix_total + $request->prix;
        $clientPrix->save();
        Toastr::success('Vos bagages ont bien ete ajouter', 'Ajout Bagages', ["positionClass" => "toast-top-right"]);
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
        $client = Client::where('id',$id)->where('siege_id',Auth::guard('agent')->user()->siege_id)->first();
        $bagages = Bagage::where('client_id',$client->id)->where('siege_id',Auth::guard('agent')->user()->siege_id)->get();
        if ($bagages->count() > 0) {
            return view('agent.bagage.show',compact('bagages','client'));
        }else {
            Toastr::error('Ce client n\'a pas de bagages', 'Error Bagages', ["positionClass" => "toast-top-right"]);
            return back();
        }
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
        $bagUpdate = Bagage::where('id',$id)
            ->where('siege_id',Auth::guard('agent')->user()->siege_id)
            ->where('client_id',request()->clientId)
            ->first();

        $client_p_t = Client::where('siege_id',Auth::guard('agent')->user()->siege_id)
            ->where('id',request()->clientId)
            ->first();
            if ($request->prix != $bagUpdate->prix) {
                $prixMoins = $client_p_t->prix_total - $bagUpdate->prix;
                $client_p_t->prix_total = $prixMoins + $request->prix;
            }else {
                $client_p_t->prix_total = $client_p_t->prix_total;
            }

        $client_p_t->save();

        $imageName = '';
        if ($request->image == '') {
            $imageName = $bagUpdate->image;
        }else {
            if($request->hasFile('image'))
            {
                $imageName = $request->image->store('public/Bagages');
                Storage::delete($bagUpdate->image);
            }
        }

        $bagUpdate->image = $imageName;
        $bagUpdate->name = $request->name;
        $bagUpdate->prix = $request->prix;
        $bagUpdate->detail = $request->desc;
        $bagUpdate->save();

        Toastr::success('Ce bagage a bien ete modifier', 'Modification Bagages', ["positionClass" => "toast-top-right"]);
        return back();
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bagedDelete = Bagage::where('id',$id)
            ->where('siege_id',Auth::guard('agent')->user()->siege_id)
            ->where('client_id',request()->clientId)
            ->first();
        Storage::delete($bagedDelete->image);

        $clientPrix = Client::where('id',request()->clientId)
        ->where('siege_id',Auth::guard('agent')->user()->siege_id)
        ->first();
        $clientPrix->prix_total = $clientPrix->prix_total - $bagedDelete->prix;
        $clientPrix->save();
        
        $bagedDelete->delete();
        if($bagedDelete->count() == 0){
            $clientPrix->prix_total = 0;
            $clientPrix->save();
            Toastr::success('Ce bagages a bien ete supprimer', 'Suppression Bagages', ["positionClass" => "toast-top-right"]);
            return redirect()->route('agent.home');
        }else{
            Toastr::success('Votre client n\'a plus de bagages', 'Suppression Bagages', ["positionClass" => "toast-top-right"]);
            return back();
        }
    }
}


