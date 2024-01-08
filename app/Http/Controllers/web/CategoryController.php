<?php

namespace App\Http\Controllers\web;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    public function index(){

        $categories = Category::get();
        return view('category.index',compact('categories'));
    }

    public function create()
    {
        $categories = Category::get();
        return view('category.create',compact('categories'));
    }
    public function show($id)
    {
        $category = Category::find($id);
        return view('category.show', compact('category'));
    }
    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            'Name' => 'required|string|between:2,100',
            'Image' => 'required|Image|mimes:png,jpg,jpeg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

         $imageName = time() . '.' . $request->Image->extension();
         $request->Image->move(public_path('images'), $imageName);


         $category = new Category();
         $category->Name = $request->Name;
         $category->Image = $imageName;
         $category->save();

        Session::flash('message', 'Category is created successfully');

        return redirect(route('categories.create'))->withErrors(['message' => 'category Done!'])->withInput();
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'Name' => 'required|string|between:2,100',
            'Image' => 'required|Image|mimes:png,jpg,jpeg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $imageName = time() . '.' . $request->Image->extension();
        $request->Image->move(public_path('images'), $imageName);

        $category = Category::find($id);
        $category->Name = $request->Name;
        $category->Image = $imageName;
        $category->save();

        Session::flash('message', 'Category updated successfully!');

        return redirect(route('categories.index'))->withInput();
    }

    public function destroy($id)
    {
        $categories = Category::find($id);
        $categories->delete();
        Session::flash('message', 'Category is Deleted !');

        return redirect(route('categories.index'))->withInput();

    }


}
