<?php

namespace App\Http\Controllers\web;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class BlogController extends Controller
{

    public function index()
    {
        $blogs =  Blog::paginate(2);
        return view('blog.index',compact('blogs'));
    }
    public function create()
    {
        $blogs = Blog::get();
        return view('blog.create',compact('blogs'));
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            'title' => 'required|string|between:2,100',
            'description' => 'required|string|max:5000',
            'image' => 'required|Image|mimes:png,jpg|max:2048',
            
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

         $imageName = time() . '.' . $request->image->extension();
         $request->image->move(public_path('images'), $imageName);

         
         $blog = new Blog();
         $blog->title = $request->title;
         $blog->description = $request->description;
         $blog->image = $imageName;
         $blog->save();

        Session::flash('message', 'Blog is created successfully');

        return redirect(route('blogs.create'))->withErrors(['message' => 'blog is Done!'])->withInput();
    }
    public function edit($id)
    {
        $blog = Blog::find($id);
        return view('blog.edit', compact('blog'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|between:2,100',
            'description' => 'required|string|max:8000',
            'image' => 'required|Image|mimes:png,jpg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $imageName = time() . '.' . $request->Image->extension();
        $request->Image->move(public_path('images'), $imageName);

          
        $blog = new Blog();
        $blog->title = $request->name;
        $blog->description = $request->description;
        $blog->image = $imageName;
        $blog->save();

        Session::flash('message', 'Blog is updated successfully!');

        return redirect(route('blogs.index'))->withInput();
    }
    public function destroy($id)
    {
        $blogs =Blog::find($id);
        $blogs->delete();
        Session::flash('message', 'Blog is Deleted !');

        return redirect(route('blogs.index'))->withInput();

    }


}