<?php

namespace App\Http\Controllers\Web;

use App\Models\Product;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(2);
        return view('product.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::get();
        return view('product.create', compact('categories'));
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'Name' => 'required|string|between:2,100',
            'Description' => 'required|string|max:100',
            'Image' => 'required|Image|mimes:png,jpg,jpeg|max:2048',
            'Price' => 'required|numeric|gt:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $imageName = time() . '.' . $request->Image->extension();
        $request->Image->move(public_path('images'), $imageName);


        $product = new Product();
        $product->Name = $request->Name;
        $product->Description = $request->Description;
        $product->Image = $imageName;
        $product->Price = $request->Price;
        $product->category_id = $request->category_id;
        $product->save();

        Session::flash('message', 'Product is created successfully');

        return redirect(route('products.create'))->withErrors(['message' => 'Product Done!'])->withInput();
    }
    public function edit($id)
    {
        $product = Product::find($id);
        return view('product.edit', compact('product'));
    }
    public function show($id)
    {
        $product = Product::find($id);
        return view('product.show', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'Name' => 'required|string|between:2,100',
            'Description' => 'required|string|max:100',
            'Image' => 'nullable|Image|mimes:png,jpg,jpeg|max:2048',
            'Price' => 'required|numeric|gt:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $product = Product::find($id);
        $product->Name = $request->Name;
        $product->Description = $request->Description;
        if ($request->Image != null) {
            $imageName = time() . '.' . $request->Image->extension();
            $request->Image->move(public_path('images'), $imageName);
            $product->Image = $imageName;
        }
        $product->Price = $request->Price;
        $product->save();

        Session::flash('message', 'Product updated successfully!');

        return redirect(route('products.index'))->withInput();
    }


    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        Session::flash('message', 'Product Deleted !');

        return redirect(route('products.index'))->withInput();
    }
}


 // $product = Product::find(1); // Retrieve the product with id 1
        //  $product->category()->associate($category); // Assign the category to the product
        //  $product->save();
