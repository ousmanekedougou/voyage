<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Siege;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class SiegeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
    {
        $this->middleware(['auth','isAgence'])->except('confirm');
    }
    public function index()
    {
        $sieges = Siege::where('user_id',Auth::user()->id)->orderBy('id','DESC')->get(); 
        return view('admin.siege.index',compact('sieges'));
        
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
            'name' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:255|unique:users',
            'adress' => 'required|string',
        ]);
        $add_siege = new Siege();
        $add_siege->name = $request->name;
        $add_siege->email = $request->email;
        $add_siege->phone = $request->phone;
        $add_siege->adress = $request->adress;
        $add_siege->user_id = Auth::user()->id;
        $add_siege->save();
        Toastr::success('Votre siege a bien ete creer', 'Ajout Siege', ["positionClass" => "toast-top-right"]);
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
            'name' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:255|unique:users',
            'adress' => 'required|string',
        ]);
        $update_siege = Siege::where('id',$id)->first();
        $update_siege->name = $request->name;
        $update_siege->email = $request->email;
        $update_siege->phone = $request->phone;
        $update_siege->adress = $request->adress;
        $update_siege->agence_id = Auth::user()->id;
        $update_siege->save();
        Toastr::success('Votre siege a bien ete modifier', 'Modifier Siege', ["positionClass" => "toast-top-right"]);
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
        Siege::find($id)->delete();
        Toastr::success('Votre siege a bien ete supprimer', 'Suppression Siege', ["positionClass" => "toast-top-right"]);
        return back();
    }
}
