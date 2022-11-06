<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\Admin\Bus;
use App\Models\Admin\Itineraire;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
class BusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
    {
        $this->middleware(['isAgent']);
    }

    public function index()
    {
        $itineraires = Itineraire::where('siege_id',Auth::guard('agent')->user()->siege_id)->orderBy('id','ASC')->get();
        $buses = Bus::where('siege_id',Auth::guard('agent')->user()->siege_id)->orderBy('id','ASC')->get();
        return view('agent.bus.index',compact('buses','itineraires'));
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
            'matricule' => 'required|string|max:255|unique:buses',
            'place' => 'required|string',
            'itineraire' => 'required|numeric',
            'rv_time' => 'required|date_format:H:i',
            'depart_time' => 'required|date_format:H:i|after:rv_time'
        ]);
        $add_bus = new Bus();
        $add_bus->matricule = $request->matricule;
        $add_bus->number = $request->numero;
        $add_bus->place = $request->place;
        $add_bus->status = 1;
        $add_bus->siege_id = Auth::guard('agent')->user()->siege_id;
        $add_bus->itineraire_id = $request->itineraire;
        $add_bus->heure_rv = $request->rv_time;
        $add_bus->heure_depart = $request->depart_time;
        $add_bus->save();
        Toastr::success('Votre bus a bien ete creer', 'Ajout Bus', ["positionClass" => "toast-top-right"]);
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
            'matricule' => 'required|string',
            'place' => 'required|string',
            'itineraire' => 'required|numeric',
            'rv_time' => 'required|date_format:H:i:s',
            'depart_time' => 'required|date_format:H:i:s|after:rv_time'
        ]);
        $update_bus = Bus::where('id',$id)->first();
        $update_bus->number = $request->numero;
        $update_bus->place = $request->place;
        $update_bus->matricule = $request->matricule;
        $update_bus->status = 1;
        $update_bus->siege_id = Auth::guard('agent')->user()->siege_id;
        $update_bus->itineraire_id = $request->itineraire;
        $update_bus->heure_rv = $request->rv_time;
        $update_bus->heure_depart = $request->depart_time;
        $update_bus->save();
        Toastr::success('Votre bus a bien ete modifier', 'Modifier Bus', ["positionClass" => "toast-top-right"]);
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
        Bus::where('id',$id)->where('siege_id',Auth::guard('agent')->user()->siege_id)->delete();
        Toastr::success('Votre bus a bien ete suppremer', 'Suppression Bus', ["positionClass" => "toast-top-right"]);
        return back();
    }
}
