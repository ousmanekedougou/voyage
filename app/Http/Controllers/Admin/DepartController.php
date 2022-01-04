<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Itineraire;
use App\Models\Admin\DateDepart;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class DepartController extends Controller
{
      public function __construct()
    {
        $this->middleware(['auth','isAgent','isClient']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $itineraires = Itineraire::all();
        return view('admin.depart.index',compact('itineraires'));
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
            'date_depart' => 'required|string',
            'heure_rv' => 'required|string',
            'heure_dep' => 'required|string',
        ]);
      
        if ($request->date_depart <= Carbon::today()) {
            return back()->with('error','La date de votre date doit commencer a partire de demain'); 
        }else {
            if ($request->heure_rv >= $request->heure_dep ) {
                return back()->with('error','L\'heure du rendez-vous doit etre inferieur a votre here de depart');
            }else {
                $add_date = new DateDepart();
                $add_date->depart_at = $request->date_depart;
                $add_date->rendez_vous = $request->heure_rv;
                $add_date->depart_time = $request->heure_dep;
                $add_date->itineraire_id = $request->itineraire;
                $add_date->save();
                return back()->with('success','Votre date a bien ete creer');
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
        $this->validate($request,[
            'date_depart' => 'required|string',
        ]);
      
        if ($request->date_depart <= Carbon::today()) {
            return back()->with('error','La date de votre date doit commencer a partire de demain'); 
        }else {
            if ($request->heure_rv >= $request->heure_dep ) {
                return back()->with('error','L\'heure du rendez-vous doit etre inferieur a votre here de depart');
            }else {
                $add_date = DateDepart::where('id',$id)->first();
                $add_date->depart_at = $request->date_depart;
                $add_date->rendez_vous = $request->heure_rv;
                $add_date->depart_time = $request->heure_dep;
                $add_date->itineraire_id = $request->itineraire;
                $add_date->save();
                return back()->with('success','Votre date a bien ete creer');
            }
           
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DateDepart::find($id)->delete();
        return back()->with('success','Votre date a ete supprimer');
    }
}
