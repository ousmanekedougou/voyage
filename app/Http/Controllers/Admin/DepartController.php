<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Itineraire;
use App\Models\Admin\DateDepart;
use Brian2694\Toastr\Facades\Toastr;
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
            Toastr::error('Votre date doit commencer a partire de demain', 'Error date', ["positionClass" => "toast-top-right"]);
            return back();
        }else {
            if ($request->heure_rv >= $request->heure_dep ) {
                Toastr::error('L\'heure du rendez-vous doit etre inferieur a votre here de depart', 'Error time', ["positionClass" => "toast-top-right"]);
                return back();
            }else {
                $add_date = new DateDepart();
                $add_date->depart_at = $request->date_depart;
                $add_date->rendez_vous = $request->heure_rv;
                $add_date->depart_time = $request->heure_dep;
                $add_date->itineraire_id = $request->itineraire;
                $add_date->siege_id = Auth::user()->siege_id;
                $add_date->save();
                Toastr::success('Votre date a bien ete creer', 'Ajout date', ["positionClass" => "toast-top-right"]);
                return back();
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
            Toastr::error('Votre date doit commencer a partire de demain', 'Error date', ["positionClass" => "toast-top-right"]);
            return back();
        }else {
            if ($request->heure_rv >= $request->heure_dep ) {
                Toastr::error('L\'heure du rendez-vous doit etre inferieur a votre here de depart', 'Error time', ["positionClass" => "toast-top-right"]);
                return back();
            }else {
                $update_date = DateDepart::where('id',$id)->first();
                $update_date->depart_at = $request->date_depart;
                $update_date->rendez_vous = $request->heure_rv;
                $update_date->depart_time = $request->heure_dep;
                $update_date->itineraire_id = $request->itineraire;
                $update_date->siege_id = Auth::user()->siege_id;
                $update_date->save();
                Toastr::success('Votre date a bien ete creer', 'Modifier date', ["positionClass" => "toast-top-right"]);
                return back();
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
        Toastr::success('Votre date a bien ete supprimer', 'Suppression date', ["positionClass" => "toast-top-right"]);
        return back();
    }
}
