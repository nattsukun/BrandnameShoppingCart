<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use DB;
use Input;
use Hash;
use Validator;
use Gloudemans\Shoppingcart\Facades\Cart;


class CouponController extends BaseController
{

    public function show()
    {
        $coupons = DB::table('coupons')->get();

        return view('coupons', ['coupons' => $coupons]);


    }

public function createCoupon()
{
    return view('create_coupon');

}

    public function store()
    {

        $value=Input::get('value');
        $code=Input::get('code');

        DB::table('coupons')->insert(
            [ 'value' => $value,'code' => $code]
        );
        \Session::flash('success-msg', 'Coupon Successfully Added.');
        return redirect()->back();
    }

    public function verify()
    {

        if(sizeof(Cart::content())>0) {
    $code = Input::get('code');
    $size = DB::table('coupons')->where('code', $code)->first();
    if (sizeof($size) == 0) {
        \Session::flash('success-msg', 'Invalid Coupon Code ');
        return redirect()->back();
    } else {
        if (sizeof(\Session::get('coupon_value')) > 0) {
            \Session::flash('success-msg', 'Coupon Already Applied.');
            return redirect()->back();
        } else {
            \Session::flash('success-msg', 'Coupon Successfully Applied.');
            \Session::set('coupon_value', $size->value);
            return redirect()->back();
        }
    }
}
        else{
            \Session::flash('success-msg', 'Cart Is Empty');
            \Session::forget('coupon_value');
            return redirect()->back();

        }
    }

    public function delete($id)
    {
        DB::table('coupons')->where('id',$id)->delete();
        \Session::flash('success-msg', 'Coupon Successfully Deleted.');
        return redirect()->back();
    }

}

