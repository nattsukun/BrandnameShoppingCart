<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use DB;
use Input;
use Hash;
use Validator;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\User;
use Auth;
use Mail;





class StripeController extends BaseController
{








    public function process(user $user)
    {


        $amount=Cart::total();
        $total=($amount*100)-(\Session::get('coupon_value')*100);
        $token=Input::get('stripeToken');


        $user->charge( $total,[
            'source' => $token,
        ]);

        $cart = Cart::content();
        $user = Auth::user();
        $user_email = $user->email;
        $user_phone = $user->phone;
        $user_address = $user->address;
        $user_zip = $user->zip;
        $user_city = $user->city;


        foreach ($cart as $row) {
            DB::table('orders')->insert(
                ['product' => $row->name, 'client' => $user_email, 'total' => $row->price, 'Address' => $user_address, 'phone' => $user_phone, 'zip' => $user_zip, 'city' => $user_city]
            );
        }

        Mail::send('frontend.order_mail',[], function($message) use($user_email) {
            $message->to($user_email)
                ->subject('Order Successfully Made');
        });
        \Session::forget('coupon_value');
        Cart::destroy();
        \Session::flash('paid-msg', 'Order Success');
        return redirect('/account');

    }


}

