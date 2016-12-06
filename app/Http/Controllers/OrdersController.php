<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use DB;
use Input;
use Hash;
use Validator;


class OrdersController extends BaseController
{




    public function show()
    {
        $orders = DB::table('orders')->get();
        return view('orders', ['orders' => $orders]);
    }


    public function update($id)
    {
        $order_status=input::get('status');

        DB::table('orders')->where('id', $id)->update(
            ['status' => $order_status]
        );
        return redirect()->back();
    }



    public function delete($id)
    {
        DB::table('orders')->where('id', '=', $id)->delete();
        return redirect()->back();
    }
}

