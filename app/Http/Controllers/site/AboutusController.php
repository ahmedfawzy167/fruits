<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\Aboutus;

class AboutusController extends Controller
{
    public function index()
    {
       $aboutus = Aboutus::get();
       return view('site.aboutus.index',compact('aboutus'));
    }
}
