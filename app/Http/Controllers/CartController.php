<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function addToCart(Product $product, Request $request){
        $validated = $request->validate([
            "quantity" => "required|gt:0"
        ]);

        $cart = Cart::where("product_id", "=", $product->id)
                    ->first();

        if($cart == null){
            $cart = new Cart();
            $cart->product_id = $product->id;
            $cart->quantity = $request->quantity;
            $cart->save();
            $msg = "item has been added to cart";
        }else {
            $cart->quantity = $request->quantity;
            $cart->save();
            $msg = "item has been updated";
        }

        return back()->with("success", $msg);
    }

    public function show(){
        $is_user_logged_in = UserController::checkUserHasLogIn();
        $role = null;
        if($is_user_logged_in){
            $role = UserController::getAuthenticatedUserRole();
        }
        $carts = Cart::all();

        if($carts == null){
            $is_empty = true;
        }else {
            $is_empty= false;
            $total_price = 0;
            foreach ($carts as $cart) {
                $total_price += $cart->quantity * $cart->product->price;
            }
        }

        return view("cart", ["carts" => $carts, "is_empty" => $is_empty, "login_token" => $is_user_logged_in, "role" => $role, "total_price" => $total_price]);
    }

    public function delete(Cart $cart){
        $cart->delete();
        return redirect()->route("cart");
    }

    public function showUpdate(Cart $cart){
        $is_user_logged_in = UserController::checkUserHasLogIn();
        $role = null;
        if($is_user_logged_in){
            $role = UserController::getAuthenticatedUserRole();
        }
        return view("cart-update", ["product" => $cart->product, "login_token" => $is_user_logged_in, "role" => $role, "cart_id" => $cart->id]);
    }

    public function update(Cart $cart, Request $request){
        $validated = $request->validate([
            "quantity" => "required|gt:0"
        ]);

        $cart->quantity = $request->quantity;
        $cart->save();
        return redirect()->route("cart");
    }
}
