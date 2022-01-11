<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\TransactionDetail;
use App\Models\TransactionHeader;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function show(){
        $is_user_logged_in = UserController::checkUserHasLogIn();
        $role = null;
        if($is_user_logged_in){
            $role = UserController::getAuthenticatedUserRole();
        }

        $headers = TransactionHeader::all();
        if($headers != null){
            $is_empty = false;
        }else {
            $is_empty = true;
        }

        return view("transaction", ["is_empty" => $is_empty, "login_token" => $is_user_logged_in, "role" => $role, "headers" => $headers]);
    }

    public function addToTransaction(){
        $carts = Cart::all();
        $header = new TransactionHeader();
        $header->transaction_date = now();
        $total = 0;
        foreach($carts as $cart){
            $total += $cart->quantity * $cart->product->price;
        }
        $header->total = $total;
        $header->save();
        
        foreach($carts as $cart){
            $detail = new TransactionDetail();
            $detail->header_id = $header->id;
            $detail->product_id = $cart->product_id;
            $detail->quantity = $cart->quantity;
            $detail->save();
            $total += $cart->quantity * $cart->product->price;
        }
        
        Cart::truncate();

        return redirect()->route("transaction");
    }
}
