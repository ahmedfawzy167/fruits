<?php

namespace App\Http\Controllers\Api;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $blogs = Category::get();
        return response()->json($blogs);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:250',
            'image' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
        ]);

        $image = $request->file('image');
        $imageName = time() . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);

        $category = new Category();
        $category->name = $request->name;
        $category->image = $imageName;
        $category->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Category created successfully',
            'category' => $category,
        ]);
    }

    public function show($id){
        $category = Category::find($id);
        if($category != null){
           return response()->json($category);
        }
        else{
            return response()->json('this id not correct');
        }
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required|string|max:250',
        ]);

        $category = Category::find($id);
        $category->name = $request->name;
        $category->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Category is updated successfully',
            'category' => $category ,
        ]);
    }

    public function delete($id){
        $category = Category::find($id);
        $category->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Category is deleted successfully',
            'Category' => $category ,
        ]);
    }





}
