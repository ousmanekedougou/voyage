<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User\Client;
use Carbon\Carbon;
use App\Models\Admin\Bus;
use App\Models\Admin\Historical;
use Illuminate\Http\Request;

class HistoriqueController extends Controller
{
      public function __construct()
    {
        $this->middleware(['auth','isAgent','isClient']);
    }
    // public function index(){
    //     $buses = Bus::where('siege_id',Auth::user()->siege_id)->orderBy('id','ASC')->get();
    //     foreach ($buses as $buse) {
    //         $clients = Client::where('bus_id',$buse->id)->where('registered_at','<',Carbon::today())->get();
    //         return view('admin.historique.index',compact('clients'));
    //     }
    // }

    public function search(Request $request){
        if ($request->hidden_date == 1) {
            if ($request->search != null) {
                    $clients = Historical::where('siege_id',Auth::user()->siege_id)->where('registered_at',$request->search)->paginate(15);
                    return view('admin.historique.show',compact('clients'));
            }else {
                return back();
            }
        }
        
        if ($request->hidden_date == 2) {
        // dd($request->phone);
            if ($request->phone != null) {
                    $clients = Historical::where('siege_id',Auth::user()->siege_id)->where('phone',$request->phone)->paginate(15);
                    return view('admin.historique.show',compact('clients'));
            }else {
                return back();
            }
        }
    }

    public function show($id){
        $clients = Historical::where('siege_id',$id)->paginate(15);
        return view('admin.historique.show',compact('clients'));
    }

    public function rembourser(Request $request, $id)
    {
        $user = Historical::where('id',$id)->where('amount',$request->client_amount)->first();
        if ($user) {
                $user->update([
                    'amount' =>  0,
                    'voyage_status' => 3
                ]);
                return back()->with('success','Votre client a bien ete rembourser');
        }
        else {
            return back()->with('error','Ce client ne semble plus valide');
        }
    }

}
