<?php

namespace App\Http\Controllers\Api;
use App\Models\Brand;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index(){
        $brands = Brand::all();
        return response()->json($brands);
    }

    public function store(Request $request)
    {
        $request->validate([
            'Image' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
        ]);

        $image = $request->file('image');
        $imageName = time() . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);

        $brand = new Brand();
        $brand->image = $imageName;
        $brand->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Brand created successfully',
            'brand' => $brand,
        ]);
    }

    public function show($id){
        $brand = Brand::find($id);
        if($brand != null){
           return response()->json($brand);
        }
        else{
            return response()->json('this id not correct');
        }
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'Image' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
        ]);

        $image = $request->file('image');
        $imageName = time() . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);

        $brand = Brand::find($id);
        $brand->image = $imageName;
        $brand->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Brand is updated successfully',
            'brand' => $brand ,
        ]);
    }

    public function delete($id){
        $brand = Brand::find($id);
        $brand->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Brand is deleted successfully',
            'brand' => $brand ,
        ]);
    }







}
