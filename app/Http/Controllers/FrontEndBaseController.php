<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use DB;

class FrontEndBaseController extends BaseController
{

    public $data = [];

    public function __construct(){

        $categories = DB::table('parent_categories')->get();

        foreach ($categories as $category) {
            $subcategories = DB::table('sub_categories')
                ->where('parent', $category->name)
                ->get();

            $category->subcategories = $subcategories;
        }

        $this->data['system'] = DB::table('system')->first();
        $this->data['categories'] = $categories;
        $this->data['seo'] = DB::table('seo')->first();
    }
}
