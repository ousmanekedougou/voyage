<?php

namespace App\Http\Controllers\Agence;

use App\Http\Controllers\Controller;
use App\Models\Admin\Agence;
use App\Models\User\Region;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
      public function __construct()
    {
        $this->middleware(['isAgence']);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $admin = Agence::where('slug',$slug)->first();
        $regions = Region::where('status',1)->get();
        return view('agence.profile.index',compact('admin','regions'));
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
   public function update(Request $request, $slug)
    {
           if ($request->hidden == 1) 
           {
                $this->validate($request,[
                    'name' => 'required|string',
                    'email' => 'required|string',
                    'phone' => 'required|string',
                ]);
                $update_admin = Agence::Where('slug',Auth::guard('agence')->user()->slug)->first();
                $update_admin->name = $request->name;
                $update_admin->email = $request->email;
                $update_admin->phone = $request->phone;
                
                $update_admin->save();
                Toastr::success('Vos informations ont bien ete mise a jour', 'Modifier Profile', ["positionClass" => "toast-top-right"]);
                return back();
           }else if ($request->hidden == 2) {
                $this->validate($request,[
                    'password' => 'required|string|confirmed',
                ]);
                $update_admin = Agence::Where('slug',Auth::guard('agence')->user()->slug)->first();
                $update_admin->password = Hash::make($request->password);
                $update_admin->save();
                Toastr::success('Votre mot de passe a bien ete mise a jour', 'Modifier Profile', ["positionClass" => "toast-top-right"]);
                return back();
           }elseif ($request->hidden == 3) {
                $this->validate($request,[
                   'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp',
                ]);
               $update_admin = Agence::Where('slug',Auth::guard('agence')->user()->slug)->first();
                $imageName = '';
                if($request->image == '')
                {
                    $imageName = $update_admin->logo;
                }else{

                    if($request->hasFile('image'))
                    {
                        $imageName = $request->image->store('public/Agence');
                        Storage::delete($update_admin->image);
                    }
                }
                $update_admin->logo = $imageName;
                $update_admin->save();
                Toastr::success('Votre image a bien ete mise a jour', 'Modifier Profile', ["positionClass" => "toast-top-right"]);
                return back();
           }elseif ($request->hidden == 4) {
               $this->validate($request,[
                    'slogan' => 'required|string',
                    'adress' => 'required|string',
                    'method_ticket' => 'required|boolean',
                    'payment_at' => 'required|numeric',
                ]);
                $update_admin = Agence::Where('slug',Auth::guard('agence')->user()->slug)->first();
                $update_admin->slogan = $request->slogan;
                $update_admin->adress = $request->adress;
                $update_admin->method_ticket = $request->method_ticket;
                $update_admin->payment_at = $request->payment_at;
                $update_admin->save();
                Toastr::success('Vos informations ont bien ete mise a jour', 'Modifier Profile', ["positionClass" => "toast-top-right"]);
                return back();
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
        //
    }
}
