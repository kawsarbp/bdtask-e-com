<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if(Auth::id())
        {
            if(Auth::user()->role == '0')
            {
                return 'user';
            }else
            {
                return view('admin.dashboard');
            }
        }else
        {
            return redirect()->back();
        }
    }
}
