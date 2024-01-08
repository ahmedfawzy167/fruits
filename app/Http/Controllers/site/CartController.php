<?php

namespace App\Http\Controllers\site;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CartController extends Controller
{
    public function cart($id = null)
    {
        if ($id !== null) {
        $cartGet = Cart::where('product_id', $id)->where('user_id', Auth::user()->id)->first();
        if (!$cartGet) {
        $cart = new Cart();
        $cart->user_id = Auth::user()->id;
        $cart->product_id = $id;
        $cart->save();
      }
    }
        $cartGet = Cart::where('user_id', Auth::user()->id)->get();
        $prices = Cart::with('product', 'user')->where('user_id', Auth::user()->id)->get();
        $subtotal = 0;
    
      foreach ($prices as $cart) {
        if ($cart->product != null) {
       $subtotal += $cart->product->Price;
    }
    }

   $shipping = 10;
   $pricesum = $subtotal + $shipping;
   

    return view('site.product.cart', compact('cartGet','subtotal','pricesum','shipping'));

}

public function applyCoupon(Request $request)
{
    $couponCode = $request->input('code');
    $subtotal = 0;
    $discount = 0;

    $cartItems = Cart::with('product', 'user')->where('user_id', Auth::user()->id)->get();

    foreach ($cartItems as $cart) {
        if ($cart->product != null) {
            $subtotal += $cart->product->Price;
        }
    }

    if ($couponCode) {
        $coupon = Cart::where('coupon_code', $couponCode)->first();
        $discount = $subtotal * 0.2;
    }

    

    $shipping = 10;
    $pricesum = $subtotal + $shipping - $discount;
    $cartGet = $cartItems;

    return view('site.product.cart', compact('cartGet','subtotal', 'pricesum', 'shipping', 'discount'));
}

    public function destroy($id)
    {
        $cart= Cart::where('product_id', $id)->where('user_id', Auth::user()->id)->first();
       
       if ($cart) {
        $cart->delete();
        return redirect()->back();
    }
    }
    
}
