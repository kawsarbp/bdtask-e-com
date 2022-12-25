<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Exception;

class CategoryController extends Controller
{
    public function create()
    {
        return view('admin.category.create');
    }
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.manage',compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string|unique:categories',
            'status' => 'required'
        ]);

        try {
            Category::create([
                'category_name'=>$request->category_name,
                'status'=>$request->status,
            ]);
            return redirect()->back()->with(['type' => 'success', 'message' => 'Category Add success']);
        } catch (Exception $exception) {
            return redirect()->back()->with(['type' => 'danger', 'message' => $exception->getMessage()]);
        }
    }
    //delete
    public function destroy($id)
    {
        try {

            $catDelete = Category::find($id);
            $catDelete->delete();
            return redirect()->back()->with(['type' => 'success', 'message' => 'Category Delete success']);
        } catch (Exception $exception) {
            return redirect()->back()->with(['type' => 'danger', 'message' => 'Category Not Delete success']);
        }
    }
//    edit
    public function edit($id)
    {
        $category = Category::find($id);
        if ($category)
            return view('admin.category.edit', compact('category'));
        else
            return redirect()->back();
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'category_name' => 'required|string|unique:categories,id,'.$id,
            'status' => 'required'
        ]);

        try {
            $category = Category::find($id);
            $category->category_name = $request->category_name;
            $category->status = $request->status;
            $category->save();
            return redirect()->back()->with(['type' => 'success', 'message' => 'Category Update success']);
        } catch (Exception $exception) {
            return redirect()->back()->with(['type' => 'danger', 'message' => $exception->getMessage()]);
        }

    }
}
