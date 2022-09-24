<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Agence;
use App\Models\User;
use App\Models\User\Customer;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
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
        $admins = User::where('is_admin',1)->orderBy('id','DESC')->get();
        return view('admin.admin.index',compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = Customer::paginate(9);
        return view('admin.admin.customer',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        
    }

       public function updateCustomer(Request $request,$id)
    {
        $update_admin = Customer::where('id',$id)->first();
        $update_admin->is_active = $request->is_active;
        $update_admin->confirmation_token = null;
        $update_admin->save();
        Toastr::success('Cet administrateur a ete modifier', 'Modification admin', ["positionClass" => "toast-top-right"]);
        return back();
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
        $update_admin = User::where('id',$id)->first();
        $update_admin->is_active = $request->radio;
        $update_admin->save();
        Toastr::success('Cet administrateur a ete modifier', 'Modification admin', ["positionClass" => "toast-top-right"]);
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
        $admin = User::find($id)->delete();
        $img = $admin->logo;
        Storage::delete($img);
        $admin->delete();
        Toastr::success('Cet administrateur a ete supprimer', 'Modification admin', ["positionClass" => "toast-top-right"]);
        return back();
    }
}
