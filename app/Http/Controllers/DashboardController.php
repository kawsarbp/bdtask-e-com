<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /*redirect admin and user*/
    public function redirect()
    {
        if (Auth::id()) {
            if (Auth::user()->role == '0') {
                $products = Product::where('status', 'active')->simplePaginate(9);
                return view('home.home', compact('products'));
            } else {
                return view('admin.dashboard');
            }
        } else {
            return redirect()->back();
        }
    }

    /*show index view*/
    public function index()
    {
        if (Auth::id()) {
            return redirect()->route('dashboard');
        } else {
            $products = Product::where('status', 'active')->simplePaginate(9);
            return view('home.home', compact('products'));
        }

    }


}
