<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use DB;
use Input;
use Hash;
use Validator;
use Gloudemans\Shoppingcart\Facades\Cart;
use Auth;


class LoginController extends BaseController
{


    public function show()
    {

        $system = DB::table('system')->first();
        $categories = DB::table('parent_categories')->get();


        foreach ($categories as $category) {
            $subcategories = DB::table('sub_categories')
                ->where('parent', $category->name)
                ->get();

            $category->subcategories = $subcategories;
        }

        return view('frontend.login', ['system' => $system, 'categories' => $categories]);

    }


    /**
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
public function login()
{


    $email = Input::get('email');
    $password = Input::get('password');
    $v = Validator::make(['email'=>$email,'password'=>$password],['email'=>'required|email','password'=>'required']);

    if($v->fails()){
        return redirect()->back()->withErrors($v)->withInput(Input::all());}



    if (Auth::attempt(['email' => $email, 'password' => $password]))
    {
        return redirect()->intended('/cart');
    }
    else{
        \Session::flash('success-msg', 'Invalid Credentials');
        return redirect()->back();


    }
}

    public function logout()
    {
        Auth::logout();
        return redirect()->back();

    }

}

