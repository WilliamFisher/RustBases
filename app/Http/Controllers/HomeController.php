<?php

namespace App\Http\Controllers;

use Auth;
use App\User as User;

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
        $bases = User::find(Auth::user()->id)->bases()->orderBy('view_count', 'desc')->paginate(15);

        return view('home', ['bases' => $bases]);
    }
}
