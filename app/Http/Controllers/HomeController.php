<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $req)
    {
        $req->session()->put('role',Auth::user()->role);
        $req->session()->put('name',Auth::user()->name);
        if (Auth::user()->role == 'admin'){
          $users=User::all();
            return view('home')->with('users',$users);
        }



        return view('home');
    }
}
