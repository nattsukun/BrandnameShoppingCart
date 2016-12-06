<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use DB;
use Input;
use Hash;
use Validator;
use Auth;


class SubCategoryController extends BaseController
{

    public function dropDown(){

        if(Auth::user()->role=='Administrator' || Auth::user()->role=='Manager' )
        {

        $categories = DB::table('parent_categories')->get();

        return view('/create_subcategory', ['categories' => $categories]);
        }
        else
        {

            return redirect('/administrator/orders');


        }


    }


    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|',
            'description' => 'required',
            'parent' => 'required'

        ]);

        if ($validator->fails()) {
            return redirect('/administrator/create_subcategory')
                ->withErrors($validator)
                ->withInput();
        }

        $subcategory_name = Input::get('name');
        $subcategory_description = Input::get('description');
        $subcategory_parent = Input::get('parent');


        DB::table('sub_categories')->insert(
            ['name' => $subcategory_name, 'description' => $subcategory_description,'parent'=>$subcategory_parent]
        );

        $subcategories = DB::table('sub_categories')->get();
        $categories = DB::table('parent_categories')->get();

        \Session::flash('success-msg', 'Successfully Added');

        return view('/create_subcategory', ['subcategories' => $subcategories],['categories'=>$categories]);

    }

    public function show()
    {
        if(Auth::user()->role=='Administrator' || Auth::user()->role=='Manager' ) {

            $subcategories = DB::table('sub_categories')->get();

            return view('/subcategories', ['subcategories' => $subcategories]);
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
        $subcategories = DB::table('sub_categories')->where('id', '=', $id)->first();
        $categories = DB::table('parent_categories')->get();


        return view('edit_subcategory', ['subcategories' => $subcategories],['categories'=>$categories]);
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
            'parent' => 'required'


        ]);

        if ($validator->fails()) {
            return redirect('/administrator/edit_subcategory/' . $id)
                ->withErrors($validator)
                ->withInput();
        }

        $subcategory_name = Input::get('name');
        $subcategory_description = Input::get('description');
        $subcategory_parent = Input::get('parent');


        DB::table('sub_categories')->where('id', $id)->update(
            ['name' => $subcategory_name, 'description' => $subcategory_description,'parent'=>$subcategory_parent]
        );
        $categories = DB::table('parent_categories')->get();
        $subcategories = DB::table('sub_categories')->where('id', '=', $id)->first();
        \Session::flash('success-msg', 'Successfully Edited');
        return view('edit_subcategory', ['subcategories' => $subcategories],['categories'=>$categories]);




    }
    public function delete($id)
    {

        if(Auth::user()->role=='Administrator' || Auth::user()->role=='Manager' )
        {
        DB::table('sub_categories')->where('id', '=', $id)->delete();


        $subcategories = DB::table('sub_categories')->get();

        return view('/subcategories', ['subcategories' => $subcategories]);

        }
        else
        {

            return redirect('/administrator/orders');


        }


    }
}

