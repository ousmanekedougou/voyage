<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Ville;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class VilleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(['auth','isAgent']);
    }

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
            'name' => 'required|string|max:255|unique:itineraires',
            'prix' => 'required|string',
        ]);
        $add_ville = new Ville();
        $add_ville->name = $request->name;
        $add_ville->amount = $request->prix;
        $add_ville->itineraire_id = $request->itineraire;
        $add_ville->save();
        return back()->with('success','Votre ville a bien ete creer');
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
         $this->validate($request,[
            'name' => 'required|string',
            'prix' => 'required|string',
        ]);
        $update_ville = Ville::where('id',$id)->first();
        $update_ville->name = $request->name;
        $update_ville->amount = $request->prix;
        $update_ville->itineraire_id = $update_ville->itineraire->id;
        $update_ville->save();
        return back()->with('success','Votre ville a bien ete creer');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         Ville::find($id)->delete();
        return back()->with('success','Votre ville a bien ete supprimer');
    }
}
