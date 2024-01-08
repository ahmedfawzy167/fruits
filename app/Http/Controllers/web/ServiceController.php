<?php

namespace App\Http\Controllers\web;
use App\Models\Service;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class ServiceController extends Controller
{
    public function index(){
        $services = Service::paginate(4);
        return view('service.index',compact('services'));
    }

    public function create()
    {
        $services = Service::get();
        return view('service.create',compact('services'));
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            'Name' => 'required|string|between:2,100',
            'Description' => 'required|string|max:400',
            
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

         $service = new Service();
         $service->Name = $request->Name;
         $service->Description = $request->Description;
         $service->save();

        Session::flash('message', 'Service is created successfully');

        return redirect(route('services.create'))->withErrors(['message' => 'service Done!'])->withInput();
    }

    public function edit($id)
    {
        $service = Service::find($id);
        return view('service.edit', compact('service'));
    }
    public function show($id)
    {
        $service = Service::find($id);
        return view('service.show', compact('service'));
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
        
        $service  = Service::find($id);
        $service->Name = $request->Name;
        $service->Description= $request->Description;
        $service->save();

        Session::flash('message', 'service updated successfully!');

        return redirect(route('services.index'))->withInput();
    }

    public function destroy($id)
    {
        $services = Service::find($id);
        $services->delete();
        Session::flash('message', 'Service is Deleted !');

        return redirect(route('services.index'))->withInput();

    }

}

