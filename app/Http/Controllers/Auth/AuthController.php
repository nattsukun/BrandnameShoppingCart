<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Input;
use Session;

class AuthController extends Controller
{

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */


    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function getLogout(){
        \Auth::logout();
        Session::flush();
        return redirect('/administrator/auth/login');
    }

    public function getLogin(){

        if(\Auth::check()){
            return redirect('/administrator');
        }

        return view('login');
    }

    public function postLogin(){
        // validator - email , password
        // auth::attempt(['email'=>$email,'password'=>$password]) response 1 / 0

        $email = Input::get('email');
        $password = Input::get('password');
        $role = Input::get('role');


        $v = Validator::make(['email'=>$email,'password'=>$password,'role'=>$role],['email'=>'required|email','password'=>'required','role'=>'required']);

        if($v->fails()){
            return redirect()->back()->withErrors($v)->withInput(Input::all());
        }else{
            if(\Auth::attempt(['email'=>$email,'password'=>$password,'role'=>$role])){
                return redirect('/administrator');
            }else{
                Session::flash('error_msg','Invalid credentials');
                return redirect()->back();
            }
        }

    }
}
