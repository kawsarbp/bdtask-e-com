<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /*redirect admin and user*/
    public function redirect()
    {
        if(Auth::id())
        {
            if(Auth::user()->role == '0')
            {
                return view('home.home');
            }else
            {
                return view('admin.dashboard');
            }
        }else
        {
            return redirect()->back();
        }
    }
    /*show index view*/
    public function index()
    {
        return view('home.home');
    }


}
