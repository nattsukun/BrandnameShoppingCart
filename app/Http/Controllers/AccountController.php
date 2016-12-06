<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use DB;
use Input;
use Hash;
use Validator;
use Auth;


class AccountController extends BaseController
{




    public function show()
    {
        $system = DB::table('system')->first();
        $user = Auth::user();
        $user_email = $user->email;
        $orders = DB::table('orders')->where('client',$user_email)->get();
        return view('/frontend/account', ['orders' => $orders,'system' => $system]);
    }

}

