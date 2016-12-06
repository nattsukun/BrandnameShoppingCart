<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use DB;
use Input;
use Hash;
use Validator;
use Mail;
use App\User;
use Exception;
use Redirect;
use Auth;





class ClientsController extends BaseController
{

    public function createClient(){
        if(Auth::user()->role=='Administrator' || Auth::user()->role=='Manager' )
        {
        return view('create_client');
        }
        else
        {

            return redirect('/administrator/orders');


        }
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'phone' => 'required',
            'address' => 'required',
            'zip' => 'required',
            'city' => 'required',

        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $client_name = Input::get('name');
        $client_email = Input::get('email');
        $client_password = Input::get('password');
        $client_phone = Input::get('phone');
        $client_address = Input::get('address');
        $client_zip = Input::get('zip');
        $client_city = Input::get('city');
        $confirmation_code = str_random(30);

        $hashed = Hash::make($client_password);

        $role="client";


       DB::table('users')->insert(
            ['name' => $client_name, 'role'=>$role,'email' => $client_email, 'password' => $hashed, 'phone' => $client_phone, 'address' => $client_address, 'zip' => $client_zip, 'city' => $client_city]
        );
/*
        Mail::send('frontend.verify', ['confirmation_code'=>$confirmation_code], function($message) {
            $message->to(Input::get('email'))
                ->subject('Verify your email address');
        });
*/
       \Session::flash('success-msg-registered', 'Thanks for signing up! Please check your email.');

        return redirect()->back();

    }

    public function confirm($confirmation_code)
    {
        if( ! $confirmation_code)
        {
            throw new Exception('invalid confirmation code');
        }

        $user = User::whereConfirmationCode($confirmation_code)->first();

        if ( ! $user)
        {
            throw new Exception('invalid confirmation code');
        }

        $user->confirmed = 1;
        $user->confirmation_code = null;
        $user->save();

        \Session::flash('success-msg-registered', 'Successfully Registered');

        return redirect('/login');
    }

    public function show()
    {
        if(Auth::user()->role=='Administrator' || Auth::user()->role=='Manager' )
        {
        $clients = DB::table('users')->where('role',"client")->get();

        return view('clients', ['clients' => $clients]);
        }
        else
        {

            return redirect('/administrator/orders');


        }



    }

    public function edit($id)
    {
        if(Auth::user()->role=='Administrator' || Auth::user()->role=='Manager' )
        {
        $clients = DB::table('users')->where('id', '=', $id)->first();



        return view('edit_client', ['client' => $clients]);
        }
        else
        {

            return redirect('/administrator/orders');


        }

    }

    public function update($id)
    {

        $validator = Validator::make(Input::all(), [
            'name' => 'required',
            'email' => 'required|email|',
            'password' => 'required|min:6',
            'phone' => 'required',
            'address' => 'required',
            'zip' => 'required',
            'city' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $client_name = Input::get('name');
        $client_email = Input::get('email');
        $client_password = Input::get('password');
        $client_phone = Input::get('phone');
        $client_address = Input::get('address');
        $client_zip = Input::get('zip');
        $client_city = Input::get('city');
        $hashed = Hash::make($client_password);

        $client_count = DB::table('users')->where('email', '=', $client_email)->where('id', '!=', $id)->get();



        if(sizeof($client_count) >0){

            $validator = Validator::make(Input::all(), [

                'email' => 'required|email|unique:users'
                ,

            ]);

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }
        }
        else {
            DB::table('users')->where('id', $id)->update(
                ['name' => $client_name, 'email' => $client_email, 'password' => $hashed, 'phone' => $client_phone, 'address' => $client_address, 'zip' => $client_zip, 'city' => $client_city]
            );

            \Session::flash('success-msg', 'Successfully Edited');
            return redirect()->back();
        }


    }

    public function delete($id)
    {
        if(Auth::user()->role=='Administrator' || Auth::user()->role=='Manager' )
        {
        DB::table('users')->where('id', '=', $id)->delete();




        return redirect()->back();
        }
        else
        {

            return redirect('/administrator/orders');


        }


    }
}

