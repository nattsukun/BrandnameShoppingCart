<?php

namespace App\Http\Controllers;

use DB;
use Input;
use Validator;
use Gloudemans\Shoppingcart\Facades\Cart;
use Session;

class FrontendController extends FrontEndBaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function show()
    {

        $query = DB::table('products')->where('status', 'Active');

        if (Input::has('filter_subcategory', 'filter_category')) {
            $query->where('subcategory', Input::get('filter_subcategory'))->where('category', Input::get('filter_category'));
        }

        $products = $query->paginate(10);

        foreach ($products as $product) {
            $product_images = DB::table('product_images')
                ->where('product_id', $product->id)
                ->get();

            $product->images = $product_images;
        }

        $this->data['products'] = $products;

        return view('frontend.index', $this->data);

    }

    public function priceFilter()
    {

        $max_price = input::get('max');
        $min_price = input::get('min');

        $query = DB::table('products')->where('status', 'Active')->whereBetween('offer_price', [$max_price, $min_price]);

        if (Input::has('filter_subcategory', 'filter_category')) {
            $query->where('subcategory', Input::get('filter_subcategory'))->where('category', Input::get('filter_category'));

        }

        $products = $query->paginate(10);


        foreach ($products as $product) {
            $product_images = DB::table('product_images')
                ->where('product_id', $product->id)
                ->get();

            $product->images = $product_images;
        }

        $this->data['products'] = $products;

        return view('frontend.index', $this->data);

    }

    public function cart($id)
    {

        $products = DB::table('products')
            ->where('id', $id)
            ->first();
        $quantity = input::get('quantity');
        $product_name = $products->name;
        $product_price = $products->offer_price;


        if (sizeof($quantity) > 0 && $quantity != 0) {

            Cart::add($id, $product_name, $quantity, $product_price);

        } else {

            Cart::add($id, $product_name, 1, $product_price);

        }

        Session::flash('success-msg', 'Successfully Added to Cart');

        return redirect()->back();

    }

    public function search()
    {
        $q = Input::get('search');

        $searchTerms = explode(' ', $q);

        $query = DB::table('products')->where('status', 'Active');

        if (Input::has('filter_subcategory')) {
            $query->where('subcategory', Input::get('filter_subcategory'));
        }

        foreach ($searchTerms as $term) {
            $query->where('name', 'LIKE', '%' . $term . '%');
        }

        $products = $query->paginate(10);
        foreach ($products as $product) {
            $product_images = DB::table('product_images')
                ->where('product_id', $product->id)
                ->get();

            $product->images = $product_images;
        }

        $this->data['products'] = $products;

        return view('frontend.index', $this->data);
    }

    public function update($id)
    {
        $rowId = $id;
        $quantity = input::get('quantity');
        Cart::update($rowId, $quantity);
        Session::flash('success-msg', 'Successfully Updated');
        return redirect()->back();
    }

    public function delete($id)
    {
        $rowId = $id;
        Cart::remove($rowId);
        \Session::flash('success-msg', 'Successfully Removed');
        return redirect()->back();
    }


    public function showDetails($id)
    {
        $products = DB::table('products')->where('id', $id)->get();
        $reviews = DB::table('reviews')->where('product_id', $id)->get();

        foreach ($products as $product) {
            $product_images = DB::table('product_images')
                ->where('product_id', $product->id)
                ->get();

            $product->images = $product_images;

        }

        $this->data['products'] = $products;
        $this->data['reviews'] = $reviews;

        return view('frontend.product_details', $this->data);
    }

    public function review($id)
    {

        $name = input::get('name');
        $email = input::get('email');
        $review = input::get('review');

        $v = Validator::make(['name' => $name, 'email' => $email, 'review' => $review], ['name' => 'required', 'email' => 'required|email', 'review' => 'required']);

        if ($v->fails()) {
            return redirect()->back()->withErrors($v)->withInput(Input::all());
        }
        $product_id = $id;

        DB::table('reviews')->insert(
            ['product_id' => $product_id, 'name' => $name, 'email' => $email, 'review' => $review]
        );

        Session::flash('success-msg-review', 'Successfully Added');

        return redirect()->back();

    }

}

