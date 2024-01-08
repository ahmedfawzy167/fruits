<?php

namespace App\Http\Controllers\Api;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class UserController extends Controller
{
    public function index()
    {
        $users = User::get();
        return response()->json($users);
    }

    public function store(Request $request)
    {

    $validator = Validator::make($request->all(), [
        'name' => 'required|string|between:2,100',
        'email' => 'required|string|email|max:100|unique:users',
        'password' => 'required|string|min:6',
    ]);
    if ($validator->fails()) {
        return response()->json($validator->errors()->toJson(), 400);
    }

    $user = new User();
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = Hash::make($request->password);
    $user->save();
    return response()->json($user);
}

public function show($id){
    $user = User::find($id);
    if($user != null){
        return response()->json($user);
    }else{
        return response()->json('this id not correct');
    }
}
public function delete($id){
    $user = User::find($id);
    if($user != null){
        $user->delete();
        return response()->json('true');
    }else{
        return response()->json('this id not correct');
    }
}
public function update(Request $request,$id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,100',
            'email' => 'required|unique:users,email,'.$id,
            'password' => 'required|string|min:6',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();

        return response()->json($user);
    }
}
