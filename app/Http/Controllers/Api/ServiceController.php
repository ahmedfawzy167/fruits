<?php

namespace App\Http\Controllers\Api;
use App\Models\Service;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(){
        $services = Service::all();
        return response()->json($services);
    }

    public function store(Request $request){

        $request->validate([
            'Name' => 'required|string|max:250',
            'Description' => 'required|string|max:255',
        ]);

         $service = new Service();
         $service->Name = $request->Name;
         $service->Description = $request->Description;
         $service->save();


        return response()->json([
            'status' => 'success',
            'message' => 'Service created successfully',
            'service' => $service,
        ]);

    }

    public function show($id)
    {
        $service = Service::find($id);
        if($service != null){
            return response()->json($service);
         }
         else{
             return response()->json('this id not correct');
         }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Name' => 'required|string|max:250',
            'Description' => 'required|string|max:255',
        ]);

        $service  = Service::find($id);
        $service->Name = $request->Name;
        $service->Description= $request->Description;
        $service->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Service Updated successfully',
            'service' => $service,
        ]);

    }

    public function destroy($id)
    {
        $service = Service::find($id);
        $service->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Service Deleted successfully',
            'service' => $service,
        ]);
    }

}
