<?php

namespace App\Http\Controllers\site;
use App\Http\Controllers\Controller;
use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function index()
    {
        return view('site.layouts.header');
    }

    public function store(Request $request){

        $validatedData = $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:8',
        ]);

        if (Auth::attempt($validatedData)) {
            $user = Auth::user();
            if ($user->role_id == 1 || $user->role_id == 2) {
              session()->flash('message','Welcome ' .$user->name);
              return redirect(route('home.site'))->with('success',true);
            } else {
                $message = 'You are not authorized to Login';
            }     

    } else{
        return redirect()->back()->withErrors(['password' => 'Incorrect password.'])->withInput();
    } 
        
    }
  
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->back()->with('success');

}



}

