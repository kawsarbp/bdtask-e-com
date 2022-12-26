<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
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
                $totalProduct = Product::all()->count();
                $totalOrder = Order::all()->count();
                $totalUser = User::all()->count();
//                $orders = Order::sum('product_price');
                $orders = Order::all();
                $toalRevenue = 0;
                foreach ($orders as $order)
                {
                    $toalRevenue = $toalRevenue + $order->product_price;
                }
                $totalDelivery = Order::where('delivery_status','delivered')->get()->count();
                $totalprocessing = Order::where('delivery_status','Processing')->get()->count();

                return view('admin.dashboard',compact('totalProduct','totalOrder','totalUser','toalRevenue','totalDelivery','totalprocessing'));
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
