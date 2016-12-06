<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use DB;
use Input;
use Hash;
use Validator;
use Auth;


class ReviewController extends BaseController
{



    public function show()
    {
        if(Auth::user()->role=='Administrator' || Auth::user()->role=='Manager' )
        {
        $reviews = DB::table('reviews')->get();

foreach($reviews as $review) {

    $product_names = DB::table('products')->where('id', $review->product_id)->first();

    $review->product_name =  $product_names;

}
        return view('reviews', ['reviews' => $reviews]);
        
      //  return Response()->json($reviews);

        }
        else
        {

            return redirect('/administrator/orders');


        }


    }

    public function delete($id)
    {
        if(Auth::user()->role=='Administrator' || Auth::user()->role=='Manager' )
        {
        DB::table('reviews')->where('id', '=', $id)->delete();



        return redirect()->back();
        }
        else
        {

            return redirect('/administrator/orders');


        }



    }


}

