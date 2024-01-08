<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::group(['middleware' => ['Check-Password'], 'namespace' => 'App\Http\Controllers\Api'], function () {
    Route::prefix('users')->group(function () {
        Route::get('/', 'UserController@index');
        Route::post('/store', 'UserController@store');
        Route::get('/show/{id}', 'UserController@show');
        Route::patch('/update/{id}', 'UserController@update');
        Route::delete('/delete/{id}', 'UserController@delete');
    });
});

Route::group(['middleware' => ['jwt-verfiy', 'Check-Password'], 'namespace' => 'App\Http\Controllers\Api'], function () {
    Route::prefix('products')->group(function () {
        Route::get('/', 'ProductController@index');
        Route::post('/store', 'ProductController@store');
        Route::get('/show/{id}', 'ProductController@show');
        Route::patch('/update/{id}', 'ProductController@update');
        Route::get('/delete/{id}', 'ProductController@delete');
    });
});

Route::group(['namespace' => 'App\Http\Controllers\Api'], function () {
    Route::post('/register', 'AuthController@register');
    Route::post('/login', 'AuthController@login');
    Route::post('/logout', 'AuthController@logout');
});


Route::group(['middleware' => ['Check-Password'], 'namespace' => 'App\Http\Controllers\Api'], function () {
    Route::prefix('blogs')->group(function () {
        Route::get('/', 'BlogController@index');
        Route::post('/store', 'BlogController@store');
        Route::get('/show/{id}', 'BlogController@show');
        Route::patch('/update/{id}', 'BlogController@update');
        Route::delete('/delete/{id}', 'BlogController@delete');
    });
});

Route::group(['middleware' => ['Check-Password'], 'namespace' => 'App\Http\Controllers\Api'], function () {
    Route::prefix('categories')->group(function () {
        Route::get('/', 'CategoryController@index');
        Route::post('/store', 'CategoryController@store');
        Route::get('/show/{id}', 'CategoryController@show');
        Route::patch('/update/{id}', 'CategoryController@update');
        Route::delete('/delete/{id}', 'CategoryController@delete');
    });
});


Route::group(['middleware' => ['Check-Password'], 'namespace' => 'App\Http\Controllers\Api'], function () {
    Route::prefix('brands')->group(function () {
        Route::get('/', 'BrandController@index');
        Route::post('/store', 'BrandController@store');
        Route::get('/show/{id}', 'BrandController@show');
        Route::patch('/update/{id}', 'BrandController@update');
        Route::delete('/delete/{id}', 'BrandController@delete');
    });
});


Route::group(['middleware' => ['Check-Password'], 'namespace' => 'App\Http\Controllers\Api'], function () {
    Route::prefix('services')->group(function () {
        Route::get('/', 'ServiceController@index');
        Route::post('/store', 'ServiceController@store');
        Route::get('/show/{id}', 'ServiceController@show');
        Route::patch('/update/{id}', 'ServiceController@update');
        Route::delete('/delete/{id}', 'ServiceController@delete');
    });
});



// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
