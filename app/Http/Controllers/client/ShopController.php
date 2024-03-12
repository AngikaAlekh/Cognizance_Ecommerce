<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Category;
use App\Models\Product;

class ShopController extends Controller
{
    public function index(){
        $products = Product::all();
        $categories = Category::all();
        return view("client.shop",compact("products","categories"));
    }

    public function add_to_cart($id){
        $product = Product::find($id);
        if($product){
            $cart = new Cart;
            $cart->user_id = Auth::user()->id;
            $cart->title = $product->title;
            $cart->image = $product->image;
            $cart->price = $product->price;
            
            $cart->product_id = $product->id;
            $cart->save();
            return redirect()->route('cart')->with("success","Product added to cart successfully!");
        }
        else{
            return redirect()->back()->with("error","Something went wrong!");
        }
    }

    public function update_cart(Request $request, $user_id){
        $carts = Cart::where('user_id', $user_id)->get();
        if($carts){
            $cartIndex=0;
            foreach($carts as $cart){
                $cartName = 'cartIndex'.$cartIndex;
                $cart->quantity = $request->$cartName;
                $cartIndex += 1;
                $cart->update();
            }
            return redirect()->route('cart');
        }
        else{
            return redirect()->back()->with("error","Something went wrong!");
        }
    }
}
