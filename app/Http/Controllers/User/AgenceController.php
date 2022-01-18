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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class AgenceController extends Controller
{
     public function index(){
        $agences = User::where('is_admin',2)->where('is_active',1)->orderBy('id','ASC')->get();
        return view('user.agence.index',compact('agences'));
    }

    public function create(){
        return view('user.agence.create');
    }

     public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'registre_commerce' => 'required|string|max:255|unique:users',
            'adress' => 'required|string',
            'slogan' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp',
        ]);
        // dd($request->all());
         $imageName = '';
        $add_agence = new User();
          if($request->hasFile('image'))
        {
            $imageName = $request->image->store('public/Agence');
        }
        define('AGENCE',2);
        $add_agence->name = $request->name;
        $add_agence->email = $request->email;
        $add_agence->phone = $request->phone;
        $add_agence->password = Hash::make($request->password);
        $add_agence->registre_commerce = $request->registre_commerce;
        $add_agence->adress = $request->adress;
        $add_agence->slogan = $request->slogan;
        $add_agence->is_admin = AGENCE;
        $add_agence->logo = $imageName;
        $add_agence->confirmation_token = str_replace('/','',Hash::make(Str::random(40)));
        $add_agence->slug = str_replace('/','',Hash::make(Str::random(20).'agence'.$request->email));
        $add_agence->save();
         Notification::route('mail','ousmanelaravel@mail.com')
                ->notify(new RegisteredUser($add_agence));
        return back()->with('success','Votre agence a bien ete creer');
    }

      public function show($slug)
    {
        $buses  = Bus::orderBy('id','ASC')->get();
        $agence = User::where('slug',$slug)->first();
        $sieges = Siege::where('user_id',$agence->id)->get();
        if($sieges->count() > 0){
            return view('user.agence.show',compact('sieges','agence','buses'));
        }else {
            return back()->with('error',"L'agence $agence->name_agence n'a pas encore de siège");
        }
    }
}
