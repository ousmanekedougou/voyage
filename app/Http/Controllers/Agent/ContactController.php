<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\User\Contact;
use App\Models\User\Notify;
use App\Notifications\ReponseAdminContact;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
      public function __construct()
    {
        // $this->middleware(['auth','isAdmin','isAgent',]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd('dhdh');
        $contacts = '';
       if (Auth::user()->is_admin == 3) {
           $contacts = Contact::where('siege_id',Auth::user()->siege_id)->paginate(10);
           return view('admin.contact.index',compact('contacts'));
       }elseif (Auth::user()->is_admin == 0) {
           $contacts = Contact::where('siege_id',null)->paginate(10);
           return view('admin.contact.index',compact('contacts'));
       }else{
        Toastr::error('Vous n\'aviez pas acces a cette page', 'Message', ["positionClass" => "toast-top-right"]);
        return back();
       }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'msg' => 'required|string'
        ]);
        // dd($request->image);
        Notification::route('mail',Auth::user()->email)->notify(new ReponseAdminContact($request->name,$request->msg,$request->image));
        Toastr::success('Votre reponse a bien ete envoyer', 'Reponse', ["positionClass" => "toast-top-right"]);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $show = Contact::where('id',$id)->first();
        $show->update([
            'status' => 1
        ]);
        return view('admin.contact.show',compact('show'));
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
    public function update(Request $request, $id)
    {
        //
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

