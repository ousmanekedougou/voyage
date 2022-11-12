<?php

namespace App\Http\Controllers\Agence;

use App\Http\Controllers\Controller;
use App\Models\Admin\About;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AboutController extends Controller
{
    public function __construct()
    {
        $this->middleware(['isAgence']);
    }

    public function index(){
        $agence = About::where('agence_id',Auth::guard('agence')->user()->id)->first();
        return view('agence.about.index',compact('agence'));
    }

    public function about(Request $request){

        $this->validate($request,[
            'abaout' => 'required|string'
        ]);

        About::where('agence_id',Auth::guard('agence')->user()->id)->update([
            'abaout' => $request->about
        ]);

        Toastr::success('Votre presentation a ete mise a jour', 'Presentation', ["positionClass" => "toast-top-right"]);
        return back();
    }


    public function motivation(Request $request){

        $this->validate($request,[
            'motivation' => 'required|string'
        ]);

        About::where('agence_id',Auth::guard('agence')->user()->id)->update([
            'motivation' => $request->motivation
        ]);

        Toastr::success('Votre motivation a ete mise a jour', 'Motivation', ["positionClass" => "toast-top-right"]);
        return back();
    }

     public function ticket(Request $request){

        $this->validate($request,[
            'politic_ticket' => 'required|string'
        ]);

        About::where('agence_id',Auth::guard('agence')->user()->id)->update([
            'politic_ticket' => $request->politic_ticket
        ]);

        Toastr::success('Votre systeme de ticket a ete mise a jour', 'Systeme Ticket', ["positionClass" => "toast-top-right"]);
        return back();
    }

      public function bagagec(Request $request){

        $this->validate($request,[
            'politic_bc' => 'required|string'
        ]);

        About::where('agence_id',Auth::guard('agence')->user()->id)->update([
            'politic_bc' => $request->politic_bc
        ]);

        Toastr::success('Votre systeme de bagage et colis a ete mise a jour', 'Systeme Bagages et colis', ["positionClass" => "toast-top-right"]);
        return back();
    }


      public function presonne(Request $request){

        $this->validate($request,[
            'politic_apte' => 'required|string'
        ]);

        About::where('agence_id',Auth::guard('agence')->user()->id)->update([
            'politic_apte' => $request->politic_apte
        ]);

        Toastr::success('Votre systeme de personnes aptent a ete mise a jour', 'Personnes Aptent', ["positionClass" => "toast-top-right"]);
        return back();
    }

       public function villeArret(Request $request){

        $this->validate($request,[
            'ville_arret' => 'required|string'
        ]);

        About::where('agence_id',Auth::guard('agence')->user()->id)->update([
            'ville_arret' => $request->ville_arret
        ]);

        Toastr::success('Votre systeme d\'arret a ete mise a jour', 'Arret Villes', ["positionClass" => "toast-top-right"]);
        return back();
    }
}
