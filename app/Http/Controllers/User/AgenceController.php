<?php

namespace App\Http\Controllers\User;

use App\Helpers\UserSystemInfoHelper;
use App\Http\Controllers\Controller;
use App\Models\Admin\Agence;
use App\Models\Admin\Agent;
use App\Models\Admin\Bus;
use App\Models\Admin\Siege;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\User\Notify;
use App\Models\User\Region;
use App\Notifications\Newsleter;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Notifications\RegisteredUser;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class AgenceController extends Controller
{
     public function index(){
        $getip = UserSystemInfoHelper::get_ip();
        $get_user_geo = geoip()->getLocation($getip);
        // dd($get_user_geo->city,$get_user_geo->state_name);
        $region = Region::where('name',$get_user_geo->city)->orWhere('slug',$get_user_geo->state_name)->first();
        $autre_regions = Region::where('name','!=',$get_user_geo->city)->orWhere('slug','!=',$get_user_geo->state_name)->get();
        // dd($region);
        $agences = Agence::where('is_admin',0)
        ->where('is_active',1)
        // ->where('region_id',$region->id)
        ->orderBy('id','ASC')->paginate(9);
        $agenceAll = Agence::where('is_admin',0)->where('is_active',1)->orderBy('id','ASC')->get();
        $agenceCount = $agenceAll->count(); 
        return view('user.agence.index',compact('agences','agenceCount','autre_regions'));
    }

    public function create(){
        $regions = Region::where('status',1)->get();
        return view('user.agence.create',compact('regions'));
    }

    public function about($sluge){
        $slug = Agence::where('slug',$sluge)->first();
        return view('user.agence.about',compact('slug'));
    }

     public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:255|unique:users',
            // 'registre_commerce' => 'required|string|max:255|unique:users',
            'adress' => 'required|string',
            'slogan' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp',
            'region' => 'required|numeric',
            'password' => 'required|string|min:6|confirmed',
        ]);
         $add_agence = new Agence();
        $imageName = '';
        if($request->hasFile('image'))
        {
            $imageName = $request->image->store('public/Agence');
        }

        
        $add_agence->name = $request->name;
        $add_agence->email = $request->email;
        $add_agence->phone = $request->phone;
        // $add_agence->registre_commerce = $request->registre_commerce;
        $add_agence->adress = $request->adress;
        $add_agence->slogan = $request->slogan;
        $add_agence->is_admin = 0;
        $add_agence->is_active = 0;
        $add_agence->logo = $imageName;
        $add_agence->confirmation_token = str_replace('/','',Hash::make(Str::random(40)));
        $add_agence->slug = str_replace('/','',Hash::make(Str::random(20).'agence'.$request->email));
        // $add_agence->user_id = Auth::user()->id;
        $add_agence->region_id = $request->region;
        $add_agence->password = Hash::make($request->password);
        $add_agence->save();

        Notification::route('mail',Auth::user()->email)
            ->notify(new RegisteredUser($add_agence));

        $notifys = Notify::all();
        foreach ($notifys as $notify) {
            Notification::route('mail','ousmanelaravel@gmail.com')
            ->notify(new Newsleter($notify));
        }
         Toastr::success('Votre agence a bien ete creer', 'Ajout agence', ["positionClass" => "toast-top-right"]);
        return back();
    }

      public function show($slug)
    {
        $buses  = Bus::orderBy('id','ASC')->get();
        $agence = Agence::where('slug',$slug)->first();
        $sieges = Siege::where('agence_id',$agence->id)->get();
        if($sieges->count() > 0){
            return view('user.agence.show',compact('sieges','agence','buses'));
        }else {
            Toastr::warning('L\'agence '.$agence->name.' n\'a pas encore de siège', 'Sieges', ["positionClass" => "toast-top-right"]);
            return back();
        }
    }

    public function region($slug){
        $region = Region::where('slug',$slug)->first();
        $agences = Agence::where('is_active',1)
        ->where('region_id',$region->id)
        ->orderBy('id','ASC')->paginate(12);
        if ($agences->count() > 0) {
            $agenceAll = Agence::where('is_active',1)->orderBy('id','ASC')->get();
            $agenceCount = $agenceAll->count(); 

            $getip = UserSystemInfoHelper::get_ip();
            $get_user_geo = geoip()->getLocation($getip);
            $autre_regions = Region::where('name','!=',$get_user_geo->city)->orWhere('slug','!=',$get_user_geo->state_name)->get();

            return view('user.agence.index',compact('agences','agenceCount','autre_regions'));
        }else {
            Toastr::warning('Il n\'y a pas d\'agence de transport pour la region de '.$region->name, 'Pas d\'agence', ["positionClass" => "toast-top-right"]);
            return back();
        }

    }

    public function search(){
        request()->validate([
            'recherche' => 'required|min:3'
        ]);
        $q = request()->input('recherche');
        if ($q != null ) {
            $agence = Agence::where('name',$q)->where('is_active',1)->first();
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
