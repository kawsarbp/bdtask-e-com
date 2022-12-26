<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function create()
    {
        $categories = Category::where('status', 'active')->get();
        return view('admin.product.create', compact('categories'));
    }

    public function index()
    {
        $products = Product::all();
        return view('admin.product.manage', compact('products'));
    }

    public function store(Request $request)
    {

        $file = $request->file('photo');
        $file_name = uniqid() . date('dmyhis.') . $file->getClientOriginalExtension();
        $product = Product::create([
            'product_name' => $request->product_name,
            'product_category' => $request->product_category,
            'product_price' => $request->product_price,
            'discount_price' => $request->discount_price,
            'product_quantity' => $request->product_quantity,
            'product_description' => $request->product_description,
            'photo' => $file_name,
            'status' => $request->status,
        ]);
        if ($product) {
            $file->move('uploads/products', $file_name);
        }
        return redirect()->back()->with(['type' => 'success', 'message' => 'Product add success']);
    }

    /*delete*/
    public function destroy($id)
    {
        $product = Product::find($id);
        $originalPath = getcwd() . "/uploads/products/{$product->photo}";
        if (File::exists($originalPath)) {
            File::delete($originalPath);
        }
        $product->delete();
        return redirect()->back()->with(['type' => 'success', 'message' => 'Doctor Delete Success']);
    }

    /*edit*/
    public function edit($id)
    {
        $categories = Category::where('status', 'active')->get();
        $product = Product::find($id);
        return view('admin.product.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        $product->product_name = $request->product_name;
        $product->product_category = $request->product_category;
        $product->product_price = $request->product_price;
        $product->discount_price = $request->discount_price;
        $product->product_quantity = $request->product_quantity;
        $product->product_description = $request->product_description;

        $old_photo = $product->photo;
        $file = $request->file('photo');
        if ($file == null) {
            $product->photo = $old_photo;
        } else {
//            $file = $request->file('photo');
            if ($file) {
                $file_name = uniqid() . date('dmyhis.') . $file->getClientOriginalExtension();
                $product->photo = $file_name;
                $file->move('uploads/products', $file_name);
                File::delete(public_path('/uploads/products/' . $old_photo));
            }
        }


        $product->status = $request->status;
        $product->save();
        return redirect()->back()->with(['type' => 'success', 'message' => 'Product update Success']);

    }

    /*productDetails*/
    public function productDetails($id)
    {
        $product = Product::find($id);
        return view('home.product.details', compact('product'));
    }

    /*add to cart*/
    public function addToCart(Request $request, $id)
    {
        if (Auth::id()) {
            $user = Auth::user();
            $user_id = $user->id;
            $product = Product::find($id);



            $cart = Cart::where('product_id',$id)->where('user_id',$user_id)->first();
//            return Cart::find($product_exist_id);
            if($cart)
            {
                $quantity = $cart->product_quantity;
                $cart->product_quantity = $quantity + $request->quantity;

                $cart->save();
                return redirect()->route('showCart')->with(['type' => 'success', 'message' => 'Add to cart success']);

            }else{
                $cart = new Cart;

                $cart->user_id = $user->id;
                $cart->product_id = $product->id;
                $cart->name = $user->name;
                $cart->email = $user->email;
                $cart->phone = $user->phone;
                $cart->address = $user->address;
                $cart->product_name = $product->product_name;
                if ($product->discount_price) {
                    $cart->product_price = $product->discount_price * $request->quantity;
                } else {
                    $cart->product_price = $product->product_price * $request->quantity;
                }

                $cart->product_quantity = $request->quantity;
                $cart->photo = $product->photo;
                $cart->save();
                $product->product_quantity = $product->product_quantity - $request->quantity;
                $product->save();

                return redirect()->route('showCart')->with(['type' => 'success', 'message' => 'Add to cart success']);
            }



        } else {
            return redirect()->route('login');
        }
    }

    /*show cart*/
    public function showCart()
    {
        if (Auth::id()) {
            $id = Auth::user()->id;
            $carts = Cart::where('user_id', $id)->get();
            return view('home.product.show-cart', compact('carts'));
        } else {
            return redirect()->route('login');
        }
    }
    /*remove cart*/
    public function removeCart($id)
    {
        $cart = Cart::find($id);

        $product_id = $cart->product_id;
        $product = Product::find($product_id);
        $product->product_quantity = $product->product_quantity + $cart->product_quantity;
        $product->save();

        $cart->delete();
        return redirect()->back()->with(['type' => 'success', 'message' => 'cart remove success']);
    }


}
