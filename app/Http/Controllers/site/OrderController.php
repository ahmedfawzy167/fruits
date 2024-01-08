<?php

namespace App\Http\Controllers\site;
use App\Models\Product;
use App\Models\Order;
use App\Models\Cart;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class OrderController extends Controller
{

public function store(Request $request,$id)
{
    $orderPlaced = true;
    $productId = $id;
    $order = Order::where('product_id', $id)->where('user_id', Auth::user()->id)->first();

    if (!$order) {
        $order = new Order;
        $order->user_id = Auth::user()->id;
        $order->product_id = $id;
        $order->save();
    }

   $cart = Cart::where('user_id', Auth::id())->where('product_id', $id) ->first();

  if($cart) {
    $cart->delete();
  }

  session()->flash('message','Order Placed Succesfully');
  return redirect(route('site.product.all'))->with('orderPlaced', true)->with('productId', $productId);;
}

}
