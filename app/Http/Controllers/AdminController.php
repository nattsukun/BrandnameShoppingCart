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


class AdminController extends BaseController
{



    public function createAdmin(){
        if(Auth::user()->role=='Administrator') {
            return view('create_admin');

        }
        else{
            return redirect('/administrator/categories');


        }

    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role' => 'required',


        ]);

        if ($validator->fails()) {
            return redirect('/administrator/create_admin')
                ->withErrors($validator)
                ->withInput();
        }

        $user = new User();
        $user->name = Input::get('name');
        $user->email = Input::get('email');
        $user->password = Hash::make(Input::get('password'));
        $user->role = Input::get('role');
        $user->save();

        \Session::flash('success-msg', 'Successfully Added');

        return redirect('/administrator/create_admin');


    }

    public function show()
    {
        if(Auth::user()->role=='Administrator') {
            $admins = DB::table('users')->whereIn('role', ['role', 'Administrator', 'Accountant', 'Manager'])->get();
            return view('index', ['admins' => $admins]);
        }
        else{
            return redirect('/administrator/categories');


        }

    }

    public function edit($id)
    {
        if(Auth::user()->role=='Administrator') {
        $admins = DB::table('users')->where('id', '=', $id)->first();
        return view('edit_admin', ['admin' => $admins]);
        }
        else{
            return redirect('/administrator/categories');


        }
    }

    public function update($id)
    {

        $validator = Validator::make(Input::all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'role' => 'required',


        ]);

        if ($validator->fails()) {
            return redirect('administrator/edit_admin/' . $id)
                ->withErrors($validator)
                ->withInput();
        }

        $admin_name = Input::get('name');
        $admin_email = Input::get('email');

        $admin_password = Input::get('password');
        $hashed = Hash::make($admin_password);

        $admin_count = DB::table('users')->where('email', '=', $admin_email)->where('id', '!=', $id)->get();

        if (sizeof($admin_count) > 0) {

            $validator = Validator::make(Input::all(), [
                'email' => 'required|email|unique:users'
            ]);

            if ($validator->fails()) {
                return redirect('/administrator/edit_admin/' . $id)
                    ->withErrors($validator)
                    ->withInput();
            }
        } else {

            $admin = User::find($id);
            $admin->name = $admin_name;
            $admin->email = $admin_email;
            $admin->password = $hashed;
            $admin->role = Input::get('role');

            $admin->save();

            \Session::flash('success-msg', 'Successfully Edited');
            return redirect()->back();
        }

    }

    public function delete($id)
    {
        if(Auth::user()->role=='Administrator') {
        DB::table('users')->where('id', '=', $id)->delete();
        return redirect()->back();
        }
        else{
            return redirect('/administrator/categories');


        }
    }
}

