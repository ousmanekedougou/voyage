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
            'quantity' => 'required|numeric',
            'desc' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp',
        ]);
         $imageName = '';
        if($request->hasFile('image'))
        {
            $imageName = $request->image->store('public/Bagages');
        }

        $clientPrix = Client::where('id',$request->clientId)
        ->where('siege_id',Auth::guard('agent')->user()->siege_id)
        ->first();
        
        if($clientPrix->registered_at == Carbon::today()){
            Toastr::error('Ce client n\'est pas de d\'aujourduit', 'Ajout Bagages', ["positionClass" => "toast-top-right"]);
            return back();
        }else {
            $clientBagage = new Bagage();
            $clientBagage->image = $imageName;
            $clientBagage->name = $request->name;
            $clientBagage->quantity = $request->quantity;
            $clientBagage->prix = $request->prix;
            $clientBagage->prix_total = $request->prix * $request->quantity;
            $clientBagage->detail = $request->desc;
            $clientBagage->client_id = $clientPrix->id;
            $clientBagage->reference =  bagageClientRefe();
            $clientBagage->siege_id = Auth::guard('agent')->user()->siege_id;
            $clientBagage->save();
            
            
            
            Toastr::success('Vos bagages ont bien ete ajouter', 'Ajout Bagages', ["positionClass" => "toast-top-right"]);
            return back();
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
        $client = Client::where('id',$id)->where('siege_id',Auth::guard('agent')->user()->siege_id)->first();
        $bagages = Bagage::where('client_id',$client->id)->where('siege_id',Auth::guard('agent')->user()->siege_id)->get();
        $amountTotalClient = Bagage::where('client_id',$client->id)->where('siege_id',Auth::guard('agent')->user()->siege_id)->sum('prix_total');
        $quantiteTotalBagage = Bagage::where('client_id',$client->id)->where('siege_id',Auth::guard('agent')->user()->siege_id)->sum('quantity');
        if ($bagages->count() > 0) {
            return view('agent.bagage.show',compact('bagages','client','amountTotalClient','quantiteTotalBagage'));
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
        $bagUpdate->quantity = $request->quantity;
        $bagUpdate->prix = $request->prix;
        $bagUpdate->prix_total = $request->prix * $request->quantity;
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
            
            
        $bagedDelete->prix_total = $bagedDelete->prix_total - $bagedDelete->prix;
        $bagedDelete->save();

        Storage::delete($bagedDelete->image);
        
        $bagedDelete->delete();

        Toastr::success('Ce bagages a bien ete supprimer', 'Suppression Bagages', ["positionClass" => "toast-top-right"]);
        return back();
    }
}


