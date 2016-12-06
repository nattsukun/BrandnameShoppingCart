<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use DB;
use Input;
use Hash;
use Validator;
use Gloudemans\Shoppingcart\Facades\Cart;


class CartController extends BaseController
{

    public function show()
    {
        $system = DB::table('system')->first();

        $cart = Cart::content();

        if (sizeof($cart) == 0) {
            \Session::forget('coupon_value');
            \Session::flash('success-msg', 'Cart Is Empty');
        }

        $cart_total = Cart::total();

        return view('frontend.cart', ['system' => $system, 'cart' => $cart, 'cart_total' => $cart_total]);


    }


}

