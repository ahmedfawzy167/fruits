<?php

namespace App\Http\Controllers\web;

use App\Models\User;
use App\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Flash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class Usercontroller extends Controller
{
    public function index()
    {
        $users = User::paginate(4);
        return view('user.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::get();
        return view('user.create',compact('roles'));
    }
    
    public  function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,100',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|min:6',
            'Image' => 'required|Image|mimes:png,jpg|max:6000',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        $imageName = time() . '.' . $request->Image->extension();
        $request->Image->move(public_path('images'), $imageName);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role_id = $request->role_id;
        $user->password = Hash::make($request->password);
        $user->Image = $imageName;
        $user->save();
        Session::flash('message', 'User Done!');

        return redirect(route('users.create'))->withErrors(['message' => 'User Done!'])->withInput();
    }
    public function edit($id)
    {
        $user = User::find($id);
        return view('user.edit', compact('user'));
    }
    public function show($id)
    {
        $user = User::find($id);
        return view('user.show', compact('user'));
    }
    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,100',
            'password' => 'required|string|min:6',
            'Image' => 'required|Image|mimes:png,jpg|max:6000',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $imageName = time() . '.' . $request->Image->extension();
        $request->Image->move(public_path('images'), $imageName);

        $user = User::find($id);
        $user->name = $request->name;
        // $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->Image = $imageName;
        $user->save();
        Session::flash('message', 'User Done!');

        return redirect(route('users.index'))->withInput();
    }
    public function destory($id)
    {
        $user = User::find($id);
        $user->delete();
        Session::flash('message', 'Deleted User Done!');

        return redirect(route('users.index'))->withInput();

    }
}
