<?php

namespace App\Http\Controllers\Api;
use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::get();
        return response()->json($products);
    }

    public function store(Request $request)
    {
        $request->validate([
                'Name' => 'required|string|max:250',
                'Description' => 'required|string|max:255',
            ]);

            $product = Product::create([
                'Name' => $request->Name,
                'Description' => $request->Description,
            ]);
      return response()->json([
        'status' => 'success',
        'message' => 'product is created successfully',
        'product' => $product,
    ]);
  }

public function show($id){
    $product = Product::find($id);
    if($product != null){
        return response()->json($product);
    }
    else{
        return response()->json('this id not correct');
    }
}
public function delete($id){
    $product = Product::find($id);
    $product->delete();
    return response()->json([
        'status' => 'success',
        'message' => 'Product is deleted successfully',
        'product' => $product,
    ]);
}
public function update(Request $request,$id)
    {
        $request->validate([
            'Name' => 'required|string|max:250',
            'Description' => 'required|string|max:255',
        ]);

        $product= Product::find($id);
        $product->Name = $request->Name;
        $product->Description = $request->Description;
        $product->save();

            return response()->json([
                'status' => 'success',
                'message' => 'product is updated successfully',
                'product' => $product,
            ]);
    }
}


