<?php

namespace App\Http\Controllers\Api;
use App\Models\Blog;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::get();
        return response()->json($blogs);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:250',
            'description' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
        ]);

        $image = $request->file('image');
        $imageName = time() . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);

        $blog = new Blog();
        $blog->title = $request->title;
        $blog->description = $request->description;
        $blog->image = $imageName;
        $blog->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Blog created successfully',
            'blog' => $blog,
        ]);
    }

    public function show($id){
        $blog = Blog::find($id);
        if($blog != null){
           return response()->json($blog);
        }
        else{
            return response()->json('this id not correct');
        }
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'title' => 'required|string|max:250',
            'description' => 'required|string|max:255',
        ]);

        $blog = Blog::find($id);
        $blog->title = $request->title;
        $blog->description = $request->description;
        $blog->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Blog is updated successfully',
            'blog' => $blog ,
        ]);
    }

    public function delete($id){
        $blog = Blog::find($id);
        $blog->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Blog is deleted successfully',
            'blog' => $blog ,
        ]);
    }
}
