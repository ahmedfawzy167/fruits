<?php

namespace App\Http\Controllers\web;
use App\Models\Brand;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class BrandController extends Controller
{
    public function index(){
        $brands = Brand::paginate(3);
        return view('brand.index',compact('brands'));
    }
    public function create()
    {
        $brands = Brand::get();
        return view('brand.create',compact('brands'));
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            'Image' => 'required|Image|mimes:png,jpg|max:2048',

        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

         $imageName = time() . '.' . $request->Image->extension();
         $request->Image->move(public_path('images'), $imageName);


         $brand = new Brand();
         $brand->Image = $imageName;
         $brand->save();

        Session::flash('message', 'Brand is created successfully');

        return redirect(route('brands.create'))->withErrors(['message' => 'brand Done!'])->withInput();
    }
    public function edit($id)
    {
        $brand = Brand::find($id);
        return view('brand.edit', compact('brand'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'Image' => 'required|Image|mimes:png,jpg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $imageName = time() . '.' . $request->Image->extension();
        $request->Image->move(public_path('images'), $imageName);

        $brand = Brand::find($id);
        $brand->Image = $imageName;
        $brand->save();

        Session::flash('message', 'Brand updated successfully!');

        return redirect(route('brands.index'))->withInput();
    }
    public function destroy($id)
    {
        $brand =Brand::find($id);
        $brand->delete();
        Session::flash('message', 'Brand is Deleted !');

        return redirect(route('brands.index'))->withInput();

    }


}
