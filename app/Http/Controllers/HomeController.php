<?php

namespace App\Http\Controllers;

use App\Users;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Users::find(\Auth::id());

        if($user->city_id){
            return redirect()->route('show-profile');

        }else{
            return redirect()->route('slider');

        }
    }
}
