<?php

namespace App\Http\Controllers\site;
use App\Models\Service;
use App\Models\Team;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Blog;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends Controller
{

    public function index()
    {
        $services= Service::all();
        $teams= Team::all();
        $blogs= Blog::paginate(3);
        $brands= Brand::all();
        $products= Product::paginate(3);
        return view('site.home', compact('services', 'teams','brands','products','blogs'));
    }
}
