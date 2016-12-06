<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use DB;
use Input;
use Hash;
use Validator;

class SeoController extends BaseController{

    public function show()
    {
        $seo = DB::table('seo')->first();

        return view('seo',compact('seo'));
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'keyword' => 'required',
            'description' => 'required',
            'google_analytics' => 'required',


        ]);

        if ($validator->fails()) {
            return redirect('/administrator/seo')
                ->withErrors($validator)
                ->withInput();
        }
        $keyword=Input::get('keyword');
        $description=Input::get('description');
        $google_analytics=Input::get('google_analytics');



        $row = DB::table('seo')->get();
        if(sizeof($row)>0)
        {
            DB::table('seo')->update(
                ['keyword' => $keyword, 'description' => $description, 'google_analytics' => $google_analytics]
            );
            \Session::flash('success-msg', 'Successfully updated');

        }
        else {
            DB::table('seo')->insert(
                ['keyword' => $keyword, 'description' => $description, 'google_analytics' => $google_analytics]
            );
            \Session::flash('success-msg', 'Successfully Added');

        }

        return redirect('/administrator/seo');

    }

}