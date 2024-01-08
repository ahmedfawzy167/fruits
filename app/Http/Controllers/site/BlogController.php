<?php

namespace App\Http\Controllers\site;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BlogController extends Controller
{

    public function index()
    {
        $blogs =  Blog::paginate(3);
        foreach ($blogs as $blog) {
            $description_words = str_word_count($blog->description, 1);
            $short_description = implode(' ', array_slice($description_words, 0, 10));
            $blog->short_description = $short_description;
        }
        return view('site.blog.index',compact('blogs'));
    }
 
   public function show($id){
   $blog= Blog::find($id);
   return view('site.blog.change', compact('blog'));
  }

  
}