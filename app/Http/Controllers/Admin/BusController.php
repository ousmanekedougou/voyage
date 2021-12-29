<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Bus;
use App\Models\Admin\Itineraire;
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
        $this->middleware(['auth','isAgent']);
    }

    public function index()
    {
        $itineraires = Itineraire::where('user_id',Auth::user()->id)->where('siege_id',Auth::user()->siege_id)->orderBy('id','ASC')->get();
        $buses = Bus::where('user_id',Auth::user()->id)->where('siege_id',Auth::user()->siege_id)->orderBy('id','ASC')->paginate(5);
        return view('admin.bus.index',compact('buses','itineraires'));
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
        ]);
        $add_bus = new Bus();
        $add_bus->matricule = $request->matricule;
        $add_bus->number = $request->numero;
        $add_bus->place = $request->place;
        $add_bus->status = 1;
        $add_bus->user_id = Auth::user()->id;
        $add_bus->siege_id = Auth::user()->siege_id;
        $add_bus->itineraire_id = $request->itineraire;
        $add_bus->date_depart_id = $request->date;
        $add_bus->save();
        return back()->with('success','Votre bus a bien ete creer');
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
        ]);
        $update_bus = Bus::where('id',$id)->first();
        $update_bus->number = $request->numero;
        $update_bus->place = $request->place;
        $update_bus->matricule = $request->matricule;
        $update_bus->status = 1;
        $update_bus->user_id = Auth::user()->id;
        $update_bus->siege_id = Auth::user()->siege_id;
        $update_bus->itineraire_id = $request->itineraire;
        $update_bus->date_depart_id = $request->date;
        $update_bus->save();
        return back()->with('success','Votre bus a bien ete modifier');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Bus::find($id)->delete();
        return back()->with('success','Votre bus a bien ete supprimer');
    }
}
