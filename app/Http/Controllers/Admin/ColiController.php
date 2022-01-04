<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\ColiClient;
use App\Models\Admin\Colie;
use Illuminate\Http\Request;

class ColiController extends Controller
{
     public function __construct()
    {
        $this->middleware(['auth','isAgent','isColis']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Colie::paginate(15);
        return view('admin.coli.index',compact('clients'));
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
            'phone' => 'required|numeric|unique:colies',
            'cni' => 'required|numeric|unique:colies',
            'name_recept' => 'required|string|max:255',
            'phone_recept' => 'required|numeric|unique:colies',
            'ville' => 'required|string|max:255',
        ]);
        $coli_client = new Colie();
        $coli_client->name = $request->name; 
        $coli_client->phone = $request->phone; 
        $coli_client->cni = $request->cni; 
        $coli_client->name_recept = $request->name_recept; 
        $coli_client->phone_recept = $request->phone_recept; 
        $coli_client->ville = $request->ville; 
        $coli_client->save();
        return back()->with('success','Votre client a ete ajouter');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = Colie::where('id',$id)->first();
        return view('admin.coli.show',compact('client'));
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
        $imageName = '';
        if($request->hasFile('image'))
        {
            $imageName = $request->image->store('public/Colis');
        }
         $client = new ColiClient();
         $client->image = $imageName;
         $client->name = $request->name;
         $client->prix = $request->prix;
         $client->desc = $request->desc;
         $client->colie_id = $id;
         $client->save();

         $client_p_t = Colie::where('id',$id)->first();
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
        Colie::where('id',$id)->delete();
        ColiClient::where('colie_id',$id)->delete();
        return back()->with('success','Votre client et ses bagages ont ete supprimer');
    }
}
