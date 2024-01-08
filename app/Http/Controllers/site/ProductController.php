<?php

namespace App\Http\Controllers\site;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Carbon\Carbon;


class ProductController extends Controller
{

    public function all()
    {
        $categories = Category::get();
        $products = Product::get();
        return view('site.product.index', compact('categories','products'));
    }

    public function oneCat($catId)
    {
        $categories= Category::get();
        $products = Product::where('category_id', $catId)->get();
        return view('site.product.index', compact('categories','products'));
    }
}
