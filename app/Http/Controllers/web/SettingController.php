<?php

namespace App\Http\Controllers\web;
use App\Models\Setting;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\StartsWith;


class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::get();
        return view('setting.index', compact('settings'));
    }

    public function account()
{
    $user = Auth::user();

   return view('setting.account');
}

    public function updatePassword(Request $request)
{

     $user = Auth::user();

    // Validate the form input
    $request->validate([
        'password' => 'required',
        'new_password' => 'required|min:8',
        'confirm_password' => 'required|same:new_password',
    ]);

    // Check if the current password matches the user's actual password
    if (!Hash::check($request->password, $user->password)) {
        return redirect()->back()->withErrors(['password' => 'The password is incorrect.']);
    }

    // Update the user's password
    $user->password = Hash::make($request->new_password);
    $user->save();
    session()->flash('message','Password Updated Succesfully');
    return redirect()->back();
}

    public function create()
    {
        return view('setting.create');
    }

    public  function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,100',
            'description' => 'required|string|between:2,100',
            'logo' => 'required|Image|mimes:png,jpg|max:2040',
            'location' => 'required|string|between:5,100',
            'email' => 'required|string|email|max:100|unique:users',
            'lat' => 'required|string|between:4,100',
            'long' => 'required|string|between:3,100',

        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $logoName = time() . '.' . $request->logo->extension();
        $request->logo->move(public_path('images'), $logoName);

        $setting = new Setting();
        $setting->name= $request->name;
        $setting->description = $request->description;
        $setting->logo = $logoName;
        $setting->location = $request->location;
        $setting->email =$request->email;
        $setting->lat= $request->lat;
        $setting->long=$request->long;
        $setting ->save();
        Session::flash('message', 'Setting is Done!');

        return redirect(route('settings.create'))->withErrors(['message' => 'Setting is Done!'])->withInput();
    }
    public function edit($id)
    {
        $setting = Setting::find($id);
        return view('setting.edit', compact('setting'));
    }
    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,100',
            'description' => 'required|string|between:2,100',
            'logo' => 'required|Image|mimes:png,jpg|max:2040',
            'location' => 'required|string|between:5,100',
            'email' => 'required|string|email|max:100|unique:users',
            'lat' => 'required|string|between:4,100',
            'long' => 'required|string|between:3,100',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        $logoName = time() . '.' . $request->logo->extension();
        $request->logo->move(public_path('images'), $logoName);

        $setting = Setting::find($id);
        $setting->name= $request->name;
        $setting->description = $request->description;
        $setting->logo = $logoName;
        $setting->location = $request->location;
        $setting->email =$request->email;

        $setting->lat= $request->lat;
        $setting->long=$request->long;
        $setting ->save();
        Session::flash('message', 'Setting is Done!');

        return redirect(route('settings.index'))->withInput();
    }
    public function destory($id)
    {
        $setings= Setting::find($id);
        $setings->delete();
        Session::flash('message', 'Deleted Setting Done!');

        return redirect(route('settings.index'))->withInput();

    }
}
