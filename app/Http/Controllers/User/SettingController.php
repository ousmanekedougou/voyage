<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index(){
        return view('user.setting.index');
    }

    public function condition(){
        return view('user.setting.condition');
    }
}
