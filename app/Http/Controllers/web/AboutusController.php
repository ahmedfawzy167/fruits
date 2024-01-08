<?php

namespace App\Http\Controllers\web;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Models\Aboutus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class AboutusController extends Controller
{
    public function index(){
        $aboutus = Aboutus::get();
        return view('about.index',compact('aboutus'));
    }

    public function create()
    {
        $aboutus = Aboutus::get();
        return view('about.create',compact('aboutus'));
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            'Name' => 'required|string|between:2,100',
            'Description' => 'required|string|max:100',
            
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $about = new Aboutus();
        $about->Name = $request->Name;
        $about->Description = $request->Description;
        $about->save();

        Session::flash('message', 'About is created successfully');

        return redirect(route('aboutus.create'))->withErrors(['message' => 'Done!'])->withInput();
    }

    public function edit($id)
    {
        $about = Aboutus::find($id);
        return view('about.edit', compact('about'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'Name' => 'required|string|between:2,100',
            'Description' => 'required|string|max:100',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        $about  = Aboutus::find($id);
        $about->Name = $request->Name;
        $about->Description= $request->Description;
        $about->save();

        Session::flash('message', 'Aboutus updated successfully!');

        return redirect(route('aboutus.index'))->withInput();
    }

    public function destroy($id)
    {
        $about = Aboutus::find($id);
        $about->delete();
        Session::flash('message', 'Aboutus is Deleted !');

        return redirect(route('aboutus.index'))->withInput();

    }

}
