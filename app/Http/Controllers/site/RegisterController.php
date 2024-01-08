<?php

namespace App\Http\Controllers\site;
use App\Http\Controllers\Controller;
use App\Models\user;
use App\Models\role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
class RegisterController extends Controller
{

    public function create()
    {
        return view('site.register.create');
    }
    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,100',
            'email' => 'required|string|email|max:100',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

         $user = new User();
         $user->name = $request->name;
         $user->email = $request->email;
         $user->password = Hash:: make($request->password);
         $user->role_id = 2;
         $user->save();
         

         return redirect()->back()->with('success', 'Registration is Done!');
      
    }
}
