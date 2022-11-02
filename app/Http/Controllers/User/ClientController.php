<?php

namespace App\Http\Controllers\User;

use App\Helpers\OrangeMoney;
use App\Http\Controllers\Controller;
use App\Models\Admin\Agence;
use App\Models\Admin\ColiClient;
use App\Models\Admin\Colie;
use Illuminate\Support\Str;
use App\Models\Admin\Siege;
use App\Models\User\Customer;
use App\Models\User\Region;
use App\Notifications\CustomerRegister;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Brian2694\Toastr\Facades\Toastr;

class ClientController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agences = Agence::where('is_admin',0)->where('is_active',1)->get();
        $sieges = Siege::all();
        // dd($sieges);
        return view('user.client.index',compact('agences','sieges'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $order = Str::random(4);
        $om = new OrangeMoney(500 , $order);
        $orangePayment = $om->getPaymentUrl('return_url_here');
        return redirect($orangePayment->payment_url);
    }

    public function register(){
        $regions = Region::where('status',1)->get();
        return view('user.client.register',compact('regions'));
    }

    public function store(Request $request){

        $this->validate($request,[
            'name' => 'required|string',
            'email' => 'required|string|email|max:255',
            'phone' => 'required|string|max:255',
            'password' => 'required|string|min:6|confirmed',
            'region' => 'required|numeric',
            'cni' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp',
        ]);
        
        $imageName = '';
        if($request->hasFile('image'))
        {
            $imageName = $request->image->store('public/Customers');
        }
        // dd($request->all());
        $Customer = Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'confirmation_token' => str_replace('/','',Hash::make(Str::random(40))),
            'slug' => str_replace('/','',Hash::make(Str::random(20).'customers'.$request->email)),
            'cni' => $request->cni,
            'image' => $imageName,
            'region_id' => $request->region,
            'is_admin' => 1 
        ]);
         Notification::route('mail','ousmanelaravel@gmail.com')
        ->notify(new CustomerRegister($Customer));
        Toastr::success('Votre compte client a bien ete creer', 'Inscription', ["positionClass" => "toast-top-right"]);
        return redirect()->route('index');
    }

    public function confirm($id , $token){
        define('ACTIVE',1);
        $user = Customer::where('id',$id)->where('confirmation_token',$token)->first();
        if ($user) {
            $user->update(['confirmation_token' => null , 'is_active' => ACTIVE]);
            Toastr::success('Votre compte a bien ete confirmer', 'Compte Confirmer', ["positionClass" => "toast-top-right"]);
            return view('client.auth.login');
        }else {
            Toastr::success('Ce lien ne semble plus valide', 'Compte invalide', ["positionClass" => "toast-top-right"]);
            return redirect()->route('index');
        }
    }

    public function colis(){
        request()->validate([
            'phone' => 'required|numeric',
            'siege' => 'required|string',
        ]);
        $phone = request()->input('phone');
        $siege = request()->input('siege');
        $coli_clients = ColiClient::where('phone_recept',$phone)->where('siege_id',$siege)->get();

        if ($coli_clients->count() > 0) {
            return view('user.client.colie',compact('coli_clients'));
        }else {
            Toastr::error('Vous n\'aviez pas de colie', 'Error Colie', ["positionClass" => "toast-top-right"]);
            return back();
        }
    }

   
    public function confirme($id){
        Colie::where('id',$id)->update([
            'status' => 1
        ]);
        Toastr::success('Votre confirmation de reception a bien ete enregistre', 'Reception Colie', ["positionClass" => "toast-top-right"]);
        return redirect()->route('client.index');
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
