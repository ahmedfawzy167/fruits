<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckRole;

//Dashboard Routes//

Route::middleware(['Check-Auth','LanguageMiddleware'])
    ->namespace('App\Http\Controllers\Web')
    ->prefix('admin')
    ->group(function () {

    Route::get('/welcome', function () {
        return view('welcome');
    });

        Route::get('/users', 'UserController@index')->name('users.index');
        Route::get('/users/create', 'UserController@create')->name('users.create');
        Route::post('/users/store', 'UserController@store')->name('users.store');
        Route::get('/users/edit/{id}', 'UserController@edit')->name('users.edit');
        Route::get('/users/show/{id}', 'UserController@show')->name('users.show');
        Route::post('/users/update/{id}', 'UserController@update')->name('users.update');
        Route::get('/users/destroy/{id}', 'UserController@destory')->name('users.destroy');

        Route::get('/products', 'ProductController@index')->name('products.index');
        Route::get('/products/create', 'ProductController@create')->name('products.create');
        Route::post('/products/store', 'ProductController@store')->name('products.store');
        Route::get('/products/edit/{id}', 'ProductController@edit')->name('products.edit');
        Route::get('/products/show/{id}', 'ProductController@show')->name('products.show');
        Route::post('/products/update/{id}', 'ProductController@update')->name('products.update');
        Route::get('/products/destroy/{id}', 'ProductController@destroy')->name('products.destroy');

        Route::get('/services', 'ServiceController@index')->name('services.index');
        Route::get('/services/create',  'ServiceController@create')->name('services.create');
        Route::post('/services/store',  'ServiceController@store')->name('services.store');
        Route::get('/services/edit/{id}',  'ServiceController@edit')->name('services.edit');
        Route::get('/services/show/{id}', 'ServiceController@show')->name('services.show');
        Route::post('/services/update/{id}',  'ServiceController@update')->name('services.update');
        Route::get('/services/destroy/{id}',  'ServiceController@destroy')->name('services.destroy');

        Route::get('/categories', 'CategoryController@index')->name('categories.index');
        Route::get('/categories/create', 'CategoryController@create')->name('categories.create');
        Route::post('/categories/store', 'CategoryController@store')->name('categories.store');
        Route::get('/categories/edit/{id}', 'CategoryController@edit')->name('categories.edit');
        Route::get('/categories/show/{id}', 'CategoryController@show')->name('categories.show');
        Route::post('/categories/update/{id}', 'CategoryController@update')->name('categories.update');
        Route::get('/categories/destroy/{id}', 'CategoryController@destroy')->name('categories.destroy');

         Route::get('/settings', 'SettingController@index')->name('settings.index');
         Route::get('/settings/account', 'SettingController@account')->name('settings.account');
         Route::post('settings/password', 'SettingController@updatePassword')->name('update.password');
         Route::get('/settings/create', 'SettingController@create')->name('settings.create');
         Route::post('/settings/store', 'SettingController@store')->name('settings.store');
         Route::get('/settings/edit/{id}', 'SettingController@edit')->name('settings.edit');
         Route::post('/settings/update/{id}', 'SettingController@update')->name('settings.update');
         Route::get('/settings/destroy/{id}', 'SettingController@destroy')->name('settings.destroy');

        Route::get('/brands', 'BrandController@index')->name('brands.index');
        Route::get('/brands/create', 'BrandController@create')->name('brands.create');
        Route::post('/brands/store', 'BrandController@store')->name('brands.store');
        Route::get('/brands/edit/{id}', 'BrandController@edit')->name('brands.edit');
        Route::post('/brands/update/{id}', 'BrandController@update')->name('brands.update');
        Route::get('/brands/destroy/{id}', 'BrandController@destroy')->name('brands.destroy');

        Route::get('/teams', 'TeamController@index')->name('teams.index');
        Route::get('/teams/create', 'TeamController@create')->name('teams.create');
        Route::post('/teams/store', 'TeamController@store')->name('teams.store');
        Route::get('/teams/edit/{id}', 'TeamController@edit')->name('teams.edit');
        Route::post('/teams/update/{id}', 'TeamController@update')->name('teams.update');
        Route::get('/teams/destroy/{id}', 'TeamController@destroy')->name('teams.destroy');

        Route::get('/aboutus', 'AboutusController@index')->name('aboutus.index');
        Route::get('/aboutus/create', 'AboutusController@create')->name('aboutus.create');
        Route::post('/aboutus/store', 'AboutusController@store')->name('aboutus.store');
        Route::get('/aboutus/edit/{id}', 'AboutusController@edit')->name('aboutus.edit');
        Route::post('/aboutus/update/{id}', 'AboutusController@update')->name('aboutus.update');
        Route::get('/aboutus/destroy/{id}', 'AboutusController@destroy')->name('aboutus.destroy');

        Route::get('/profile/show', 'ProfileController@show')->name('profile.show');
        Route::post('/profile/update/{id}', 'ProfileController@update')->name('profile.update');
        Route::get('/profile/delete-image', 'ProfileController@deleteImage')->name('profile.deleteImage');

        Route::get('/blogs', 'BlogController@index')->name('blogs.index');
        Route::get('/blogs/create', 'BlogController@create')->name('blogs.create');
        Route::post('/blogs/store', 'BlogController@store')->name('blogs.store');
        Route::get('/blogs/edit/{id}', 'BlogController@edit')->name('blogs.edit');
        Route::post('/blogs/update/{id}', 'BlogController@update')->name('blogs.update');
        Route::get('/blogs/destroy/{id}', 'BlogController@destroy')->name('blogs.destroy');

        Route::get('/language/{locale}', 'LanguageController@changeLanguage')->name('change.language');
    });

    Route::namespace('App\Http\Controllers')->group(function () {
    Route::patch('/orders/{order}', 'HomeController@update')->name('orders.update');

});


Auth::routes();

Route::middleware([CheckRole::class])->group(function () {
   Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

//Website Routes//

Route::namespace('App\Http\Controllers\site')->group(function () {

        Route::get('/', 'HomeController@index')->name('home.site');
        Route::get('/blog', 'BlogController@index')->name('blog.index');
        Route::get('/aboutus', 'AboutusController@index')->name('site.aboutus.index');
        Route::get('/product/{id}', 'ProductController@oneCat')->name('site.product.oneCat');
        Route::get('/product', 'ProductController@all')->name('site.product.all');
        Route::get('blog/show/{id}', 'BlogController@show')->name('blog.show');
        Route::get('/registeration', 'RegisterController@create')->name('register.create');
        Route::post('/registeration/store', 'RegisterController@store')->name('register.store');
        Route::get('/cart/{id?}', 'CartController@cart')->name('site.cart');
        Route::get('/cart/destroy/{id}', 'CartController@destroy')->name('cart.destroy');
        Route::match(['get', 'post'], '/coupon', 'CartController@applyCoupon')->name('apply.cart');
        Route::get('/signin', 'LoginController@index')->name('signin.index');
        Route::post('/signin/store', 'LoginController@store')->name('signin.store');
        Route::get('/wishlist/{id?}', 'WishlistController@wishlist')->name('site.wishlist');
        Route::get('/wishlist/destroy/{id}', 'WishlistController@destroy')->name('wishlist.destroy');
        Route::post('/signout', 'LoginController@logout')->name('signout');
        Route::post('/orders/{id}', 'OrderController@store')->name('orders.store');

 });

