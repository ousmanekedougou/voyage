<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Part;
use Illuminate\Http\Request;

class PartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware(['auth','isAdmin'])->except('confirm');
    }

    public function index()
    {
        $admins = Part::all();
        return view('admin.part.index',compact('admins'));;
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
            'name' => 'required|string|max:255|unique:parts',
            'email' => 'required|string|email|max:255|unique:parts',
            'phone' => 'required|string|max:255|unique:parts',
            'adress' => 'required|string',
            'lien' => 'required|string',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp',
        ]);
        $ad_part = new Part();
        if($request->hasFile('logo'))
        {
            $imageName = $request->logo->store('public/Parts');
        }
        define('ACTIVE',1);
        $ad_part->name = $request->name;
        $ad_part->email = $request->email;
        $ad_part->phone = $request->phone;
        $ad_part->address = $request->adress;
        $ad_part->lien = $request->lien;
        $ad_part->logo = $imageName;
        $ad_part->is_active = ACTIVE;
        $ad_part->save();
        return back()->with('success','Votre partenaire a ete ajoute et activer');
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
    {   if ($request->hidden == 1) {
            $this->validate($request,[
                'name' => 'required|string',
                'email' => 'required|string|email',
                'phone' => 'required|string',
                'adress' => 'required|string',
                'lien' => 'required|string',
            ]);
            $update_part = Part::where('id',$id)->first();
            if ($request->logo == '') {
                $imageName = $update_part->logo;
            }
            else if($request->hasFile('logo'))
            {
                $imageName = $request->logo->store('public/Parts');
            }
            $update_part->name = $request->name;
            $update_part->email = $request->email;
            $update_part->phone = $request->phone;
            $update_part->address = $request->adress;
            $update_part->lien = $request->lien;
            $update_part->logo = $imageName;
            $update_part->is_active = $update_part->is_active;
            $update_part->save();
            return back()->with('success','Votre partenaire a ete modifier');
        }
        else if ($request->hidden == 2) {
            $update_admin = Part::where('id',$id)->first();
            $update_admin->is_active = $request->radio;
            $update_admin->save();
            return back()->with('success','Votre partenaire a ete active');
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
        Part::find($id)->delete();
        return back()->with('success','Votre partenaire a ete supprimer');
    }
}
