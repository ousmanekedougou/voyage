<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Admin\Bus;
use App\Models\Admin\Siege;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Notifications\RegisteredUser;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class AgenceController extends Controller
{
     public function index(){
        $agences = User::where('is_admin',2)->where('is_active',1)->orderBy('id','ASC')->paginate(12);
        $agenceAll = User::where('is_admin',2)->where('is_active',1)->orderBy('id','ASC')->get();
        $agenceCount = $agenceAll->count(); 
        return view('user.agence.index',compact('agences','agenceCount'));
    }

    public function create(){
        return view('user.agence.create');
    }

     public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string|max:255',
            'name_agence' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'email_agence' => 'required|string|email|unique:users',
            'phone' => 'required|numeric|unique:users',
            'agence_phone' => 'required|numeric|unique:users',
            'password' => 'required|string|min:6|confirmed',
            // 'registre_commerce' => 'required|string|max:255|unique:users',
            'adress' => 'required|string',
            'slogan' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp',
            'image_agence' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp',
        ]);
        // dd($request->agence_phone);
           $imageName = '';
        $imageAgenceName = '';
        $add_agence = new User();
          if($request->hasFile('image'))
        {
            $imageName = $request->image->store('public/Agence');
        }
          if($request->hasFile('image_agence'))
        {
            $imageAgenceName = $request->image_agence->store('public/Agence');
        }
        define('AGENCE',2);
        $add_agence->name = $request->name;
        $add_agence->agence_name = $request->name_agence;
        $add_agence->email = $request->email;
        $add_agence->phone = $request->phone;
        $add_agence->agence_phone = $request->agence_phone;
        $add_agence->password = Hash::make($request->password);
        // $add_agence->registre_commerce = $request->registre_commerce;
        $add_agence->email_agence = $request->email_agence;
        $add_agence->adress = $request->adress;
        $add_agence->slogan = $request->slogan;
        $add_agence->is_admin = AGENCE;
        $add_agence->logo = $imageName;
        $add_agence->image_agence = $imageAgenceName;
        $add_agence->confirmation_token = str_replace('/','',Hash::make(Str::random(40)));
        $add_agence->slug = str_replace('/','',Hash::make(Str::random(20).'agence'.$request->email));
        $add_agence->save();
        Notification::route('mail','ousmanelaravel@gmail.com')
            ->notify(new RegisteredUser($add_agence));
        Toastr::success('Votre agence a bien ete creer', 'Inscription', ["positionClass" => "toast-top-right"]);
        return back();
    }

      public function show($slug)
    {
        $buses  = Bus::orderBy('id','ASC')->get();
        $agence = User::where('slug',$slug)->first();
        $sieges = Siege::where('user_id',$agence->id)->get();
        if($sieges->count() > 0){
            return view('user.agence.show',compact('sieges','agence','buses'));
        }else {
            Toastr::warning('L\'agence '.$agence->name_agence.' n\'a pas encore de siège', 'Sieges', ["positionClass" => "toast-top-right"]);
            return back();
        }
    }

    public function search(){
        request()->validate([
            'q' => 'required|min:3'
        ]);
        $q = request()->input('q');
        if ($q != null ) {
            $agence = User::where('name_agence',$q)->where('is_admin',2)->where('is_active',1)->first();
            if ($agence != null) {
                return redirect()->route('agence.show',$agence->slug);
            }else {
                Toastr::warning('Il n\'y a pas de resultat pour cette recherche', 'Resultat Recherche', ["positionClass" => "toast-top-right"]);
                return back();
            }
        }else {
           Toastr::warning('Il n\'y a pas de resultat pour cette recherche', 'Resultat Recherche', ["positionClass" => "toast-top-right"]);
            return back();
        }
    }
}
