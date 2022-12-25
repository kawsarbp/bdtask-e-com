<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function create()
    {
        $categories = Category::where('status','active')->get();
        return view('admin.product.create',compact('categories'));
    }
    public function index()
    {
        $products = Product::all();
        return view('admin.product.manage',compact('products'));
    }

    public function store(Request $request)
    {

        $file = $request->file('photo');
        $file_name = uniqid() . date('dmyhis.') . $file->getClientOriginalExtension();
        $product = Product::create([
            'product_name'=>$request->product_name,
            'product_category'=>$request->product_category,
            'product_price'=>$request->product_price,
            'discount_price'=>$request->discount_price,
            'product_quantity'=>$request->product_quantity,
            'product_description'=>$request->product_description,
            'photo'=>$file_name,
            'status'=>$request->status,
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
        $categories = Category::where('status','active')->get();
        $product = Product::find($id);
        return view('admin.product.edit',compact('product','categories'));
    }

    public function update(Request $request,$id)
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
                File::delete(public_path('/uploads/products/'.$old_photo));
            }
        }



        $product->status = $request->status;
        $product->save();
        return redirect()->back()->with(['type' => 'success', 'message' => 'Product update Success']);

    }
}
