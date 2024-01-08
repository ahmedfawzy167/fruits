<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        $users = User::count();
        $prices = Product::pluck('Price');
        $priceCount = $prices->sum();

        $orders = Order::where('status', 'pending')->get();

        $ordersCount= Order::where('status', 'pending')->count();
        Session::put('ordersCount', $ordersCount);

        $brandCount = Brand::count();

        $startDate = Carbon::now()->startOfMonth();
        $endDate = Carbon::now()->endOfMonth();
        $products= Product::whereBetween('created_at',[$startDate, $endDate])->get();

        return view('home', compact('users','orders', 'priceCount', 'brandCount','products','ordersCount'));
    }
    public function update(Order $order)
{
    $order->status = 'approved';
    $order->save();

    $ordersCount = Session::get('ordersCount', 0);
    $ordersCount--;
    Session::put('ordersCount', $ordersCount >= 0 ? $ordersCount : 0);
    Session::flash('success', 'order approved successfully.');
    return redirect()->back();

}

}
