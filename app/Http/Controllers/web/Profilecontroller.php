<?php

namespace App\Http\Controllers\web;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class Profilecontroller extends Controller
{
    public function show()
    {
        return view('profile.show');
    }
    
    public function update(Request $request, $id)
{
    $user = User::findOrFail($id); // Assuming your User model is named "User"

    // Validate the form data
    $validator = Validator::make($request->all(), [
        'name' => 'required|string',
        'Image' => 'required|Image',
        'company' => 'required|string',
        'job' => 'required|string',
        'country' => 'required|string',
        'address' => 'required|string',
        'phone' => 'required|string',
    ]);
    
    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // Delete the old profile image if it exists
    if ($user->Image) {
        Storage::delete('images/' . $user->Image);
    }

  // Store the new profile image
   $imageName = time() . '.' . $request->Image->extension();
   $request->Image->move(public_path('images'), $imageName);


    // Update the user's profile data
    $user->name = $request->name;
    $user->Image = $imageName;
    $user->company = $request->company;
    $user->job = $request->job;
    $user->country = $request->country;
    $user->address = $request->address;
    $user->phone = $request->phone;
    $user->save();

    return redirect()->route('profile.show')->with('success', 'Profile updated successfully.');
}



public function deleteImage()
{
    $user = auth()->user();

    // Delete the profile image if it exists
    if ($user->Image) {
        Storage::delete('images/' . $user->Image);
        $user->Image = null;
        $user->save();
    }
    return redirect()->back()->with('success', 'Profile image deleted successfully.');
}

   
}
