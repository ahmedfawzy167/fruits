<?php

namespace App\Http\Controllers\site;
use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class WishlistController extends Controller
{

    public function wishlist($id = null)
    {
        if ($id !== null) {
        $wishlistGet = Wishlist::where('product_id', $id)->where('user_id', Auth::user()->id)->first();
        if (!$wishlistGet) {
            $wishlist = new Wishlist();
            $wishlist->product_id = $id;
            $wishlist->user_id = Auth::user()->id;
            $wishlist->save();
        }
    }

        $wishlistGet = Wishlist::where('user_id', Auth::user()->id)->get();
        $prices = Wishlist::with('product', 'user')->where('user_id', Auth::user()->id)->get();
        return view('site.product.wishlist', compact('wishlistGet'));
    }

    public function destroy($id)
    {
        $wishlist= Wishlist::where('product_id', $id)->where('user_id', Auth::user()->id)->first();
       
       if ($wishlist) {
        $wishlist->delete();
        return redirect()->back();
    }
    }


    
    
    
}
