<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use DB;
use Input;
use Hash;
use Validator;
use Gloudemans\Shoppingcart\Facades\Cart;


class ContactController extends BaseController
{

    public function show()
    {
        $system = DB::table('system')->first();

        return view('frontend.contact', ['system'=>$system]);



    }

    public function contact(request $request)
    {

$email=Input::get('email');
        $subject=Input::get('subject');


        \Mail::send('frontend.contact_mail',
            array(
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'subject' => $request->get('subject'),
                'user_message' => $request->get('message')
            ), function($message)
            use($email,$subject)

            {
                $message->from(\Config::get('mail.from.address'));
                $message->to(\Config::get('mail.from.address'), 'Admin')->subject($subject);
            });

        \Session::flash('success-msg', 'Thanks For Contacting us');
        return Redirect()->back();




    }


}

