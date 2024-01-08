<?php

namespace App\Http\Controllers\web;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function changeLanguage($locale){

      $supportedlocales= ['en','ar'];
      if(!in_array($locale, $supportedlocales)){
        abort(404);
    }
    session()-> put('locale',$locale);
    return Redirect::back();

}

}