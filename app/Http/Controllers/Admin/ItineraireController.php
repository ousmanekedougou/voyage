<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Itineraire;
use App\Models\Admin\Ville;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ItineraireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(['auth','isAgent','isClient']);
    }

    public function index()
    {
        $villes = Ville::all();
        $itineraires = Itineraire::where('siege_id',Auth::user()->siege_id)->orderBy('id','ASC')->paginate(5);
        return view('admin.itineraire.index',compact('itineraires','villes'));
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
        ]);
        $add_itineraire = new Itineraire();
        $add_itineraire->name = $request->name;
        // $add_itineraire->user_id = Auth::user()->id;
        $add_itineraire->siege_id = Auth::user()->siege_id;
        $add_itineraire->save();
        Toastr::success('Votre itineraire a bien ete creer', 'Ajout Itineraire', ["positionClass" => "toast-top-right"]);
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
        ]);
        $update_itineraire = Itineraire::where('id',$id)->first();
        $update_itineraire->name = $request->name;
        // $update_itineraire->user_id = Auth::user()->id;
        $update_itineraire->siege_id = Auth::user()->siege_id;
        $update_itineraire->save();
        Toastr::success('Votre itineraire a bien ete modifier', 'Modifier Itineraire', ["positionClass" => "toast-top-right"]);
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
        Itineraire::find($id)->delete();
        Toastr::success('Votre itineraire a bien ete supprimer', 'Suppression Itineraire', ["positionClass" => "toast-top-right"]);
        return back();
    }
}
