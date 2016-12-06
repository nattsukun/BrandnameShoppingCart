<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use DB;
use Input;
use Hash;
use Validator;

class SystemController extends BaseController{

    public function show()
    {
        $system = DB::table('system')->first();

        return view('system')->with('system',$system);
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'url' => 'required',
            'email' => 'required|email',
      //      'tel' => 'required|tel'

        ]);

        if ($validator->fails()) {
            return redirect('/administrator/system')
                ->withErrors($validator)
                ->withInput();
        }

        $title=Input::get('title');
        $url=Input::get('url');
        $email=Input::get('email');
       $tel=Input::get('tel');

        $row = DB::table('system')->get();
        if(sizeof($row)>0)
        {
            DB::table('system')->update(
                ['title' => $title, 'url' => $url, 'email' => $email ,'tel' => $tel]
            );
            \Session::flash('success-msg', 'Successfully updated');

        }
        else {
            DB::table('system')->insert(
                ['title' => $title, 'url' => $url, 'email' => $email ,'tel' => $tel]
            );
            \Session::flash('success-msg', 'Successfully Added');

        }

        return redirect('/administrator/system');

    }

}