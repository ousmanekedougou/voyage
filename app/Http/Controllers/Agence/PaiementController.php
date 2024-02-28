<?php

namespace App\Http\Controllers\Agence;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\Payment;
use App\Models\Admin\Agent;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Brian2694\Toastr\Facades\Toastr;
class PaiementController extends Controller
{
    public function index(){
        $payments = Payment::latest()->orderBy('id','desc')->paginate(10);

        $today = date('d');
        $isPaymentDay = false;

        if ($today == Auth::guard('agence')->user()->payment_at) {
            $isPaymentDay = true;
        }
        return view('agence.paiements.paiement_agent',compact('payments','isPaymentDay'));
    }

    public function initPayment(){
        $monthMapping = [
            'JANUARY'  =>  'JANVIER', 
            'FEBRUARY' =>  'FEVRIER' , 
            'MARCH'    =>  'MARS' , 
            'APRIL'    =>  'AVRIL' , 
            'MAY'      =>  'MAI' , 
            'JUNE'     =>  'JUIN' , 
            'JULY'     =>  'JUILLET' , 
            'AUGUST'   =>  'AOUT',
            'SEPTEMBER'=>  'SEPTEMBRE' , 
            'OCTOBER'  =>  'OCTOBRE' , 
            'NOVEMBER' =>  'NOVEMBRE' , 
            'DECEMBER' => 'DECEMBRE'
        ];

        $currentMonth = strtoupper(Carbon::now()->formatLocalized('%B'));
        // Mois en cours
        $currentMonthInFrench = $monthMapping[$currentMonth] ?? '';

        // Annee en cour
        $currentYear = Carbon::now()->format('Y');

        // Simuler des paiement des agents n'ont paye dans le mois en cours

        // la liste des agents qui n'ont pas ete paye de ce mois
        $agents = Agent:: where('agence_id',Auth::guard('agence')->user()->id)->whereDoesntHave('payments' , function($query) use($currentMonthInFrench , $currentYear){
            $query->where('month',$currentMonthInFrench)->where('year',$currentYear);
        })->get();
        $notificationPaiment = null; 
        // Faire le  paiement pour ces agents
        if ($agents->count() == 0) {
            Toastr::error('Attention : Tous vos employer ont ete payer pour ce mois ' .$currentMonthInFrench, 'Paiement des salaire', ["positionClass" => "toast-top-right"]);
            return back();
        }else{
            foreach ($agents as $agent) {
                $aEtePayer = $agent->payments()->where('month',$currentMonthInFrench)->where('year',$currentYear)->exists();
                
                if (!$aEtePayer) {
                    $salaire = $agent->montant_journaliere * 31;

                    Payment::create([
                        'reference' => strtoupper(Str::random(6)),
                        'agent_id' => $agent->id,
                        'amount' => $salaire,
                        'launch_date' => now(),
                        'done_time' => now(),
                        'status' => 'SUCCESS',
                        'month' => $currentMonthInFrench,
                        'year' => $currentYear
                    ]);
                }
            }
            Toastr::success('Le paiement des employer pour le mois ' .$currentMonthInFrench. ' a ete effectuer avec succes', 'Paiement des salaire', ["positionClass" => "toast-top-right"]);
            return back();
        }
    }
}
