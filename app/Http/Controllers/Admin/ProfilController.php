<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
      public function __construct()
    {
        $this->middleware(['auth']);
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
        $admin = User::where('slug',$slug)->first();
        return view('admin.profile.index',compact('admin'));
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
                
                $update_admin = User::Where('slug',Auth::user()->slug)->first();
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
                $update_admin = User::Where('slug',Auth::user()->slug)->first();
                $update_admin->password = Hash::make($request->password);
                $update_admin->save();
                Toastr::success('Votre mot de passe a bien ete mise a jour', 'Modifier Profile', ["positionClass" => "toast-top-right"]);
                return back();
           }elseif ($request->hidden == 3) {
                $this->validate($request,[
                   'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp',
                ]);
               $update_admin = User::Where('slug',Auth::user()->slug)->first();
                $imageName = '';
                if($request->image == '')
                {
                    $imageName = $update_admin->logo;
                }else{

                    if($request->hasFile('image'))
                    {
                        $imageName = $request->image->store('public/Admins');
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
                ]);
                $update_admin = User::Where('slug',Auth::user()->slug)->first();
                $update_admin->slogan = $request->slogan;
                $update_admin->adress = $request->adress;
                $update_admin->save();
                Toastr::success('Vos informations ont bien ete mise a jour', 'Modifier Profile', ["positionClass" => "toast-top-right"]);
                return back();
           }elseif ($request->hidden == 5) {
               $this->validate($request,[
                    'name_agence' => 'required|string',
                    'email_agence' => 'required|email|string',
                    'image_agence' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp',
                ]);
                $image_agence = '';
                 if($request->hasFile('image_agence'))
                {
                    $image_agence = $request->image_agence->store('public/Agence');
                }
                $update = User::Where('slug',Auth::user()->slug)->first();
                $update->agence_name = $request->name_agence;
                $update->email_agence = $request->email_agence;
                $update->image_agence = $image_agence;
                $update->save();
                Toastr::success('Votre profile a bien ete mise a jour', 'Modifier Profile', ["positionClass" => "toast-top-right"]);
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
