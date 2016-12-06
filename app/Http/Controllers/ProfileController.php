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


class ProfileController extends BaseController
{




    public function show()
    {


        $system = DB::table('system')->first();


        return view('/frontend/profile', ['system' => $system]);    }

}

