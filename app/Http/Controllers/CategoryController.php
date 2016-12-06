<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use DB;
use Input;
use Hash;
use Validator;
use Auth;


class CategoryController extends BaseController
{

    public function createCategory(){
        if(Auth::user()->role=='Administrator' || Auth::user()->role=='Manager' )
        {
        return view('create_category');
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
            'description' => 'required'

        ]);

        if ($validator->fails()) {
            return redirect('/administrator/create_category')
                ->withErrors($validator)
                ->withInput();
        }

        $category_name = Input::get('name');
        $category_description = Input::get('description');


        DB::table('parent_categories')->insert(
            ['name' => $category_name, 'description' => $category_description]
        );
        \Session::flash('success-msg', 'Successfully Added');
        return view('create_category');

    }

    public function show()
    {
        if(Auth::user()->role=='Administrator' || Auth::user()->role=='Manager' )
        {
            $categories = DB::table('parent_categories')->get();

            return view('/categories', ['categories' => $categories]);
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
        $categories = DB::table('parent_categories')->where('id', '=', $id)->first();


        return view('edit_category', ['categories' => $categories]);

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
            'description' => 'required',


        ]);

        if ($validator->fails()) {
            return redirect('/administrator/edit_category/' . $id)
                ->withErrors($validator)
                ->withInput();
        }

        $category_name = Input::get('name');
        $category_description = Input::get('description');


        DB::table('parent_categories')->where('id', $id)->update(
            ['name' => $category_name, 'description' => $category_description]
        );

        \Session::flash('success-msg', 'Successfully Edited');
            return redirect()->back();


    }
    public function delete($id)
    {
        if(Auth::user()->role=='Administrator' || Auth::user()->role=='Manager' )
        {
        DB::table('parent_categories')->where('id', '=', $id)->delete();


        $categories = DB::table('parent_categories')->get();

        return view('/categories', ['categories' => $categories]);

        }
        else
        {

            return redirect('/administrator/orders');


        }


    }
}

