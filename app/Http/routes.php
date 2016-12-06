<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
//administrators



Route::group(['middleware' => 'auth_admin'], function () {

    //Admin Routes
    Route::get('/administrator', 'AdminController@show');
    Route::get('/administrator/create_admin', 'AdminController@createAdmin');
    Route::get('/administrator/edit_admin/{id}', 'AdminController@edit');
    Route::get('/administrator/delete_admin/{id}', 'AdminController@delete');

    Route::post('/administrator/create_admin', 'AdminController@store');
    Route::post('/administrator/edit_admin/{id}', 'AdminController@update');

    //Category Routes
    Route::get('/administrator/categories', 'CategoryController@show');
    Route::get('/administrator/create_category', 'CategoryController@createCategory');
    Route::get('/administrator/edit_category/{id}', 'CategoryController@edit');
    Route::get('/administrator/delete_category/{id}', 'CategoryController@delete');

    Route::post('/administrator/categories', 'CategoryController@store');
    Route::post('/administrator/edit_category/{id}', 'CategoryController@update');


    //Subcategories Routes

    Route::get('/administrator/subcategories', 'SubCategoryController@show');
    Route::get('/administrator/edit_subcategory/{id}', 'SubCategoryController@edit');
    Route::get('/administrator/create_subcategory', 'SubCategoryController@dropDown');
    Route::get('/administrator/delete_subcategory/{id}', 'SubCategoryController@delete');

    Route::post('/administrator/subcategories', 'SubCategoryController@store');
    Route::post('/administrator/edit_subcategory/{id}', 'SubCategoryController@update');


    //Clients Routes
    Route::get('/administrator/clients', 'ClientsController@show');
    Route::get('/administrator/create_client', 'ClientsController@createClient');
    Route::get('/administrator/edit_client/{id}', 'ClientsController@edit');
    Route::get('/administrator/delete_client/{id}', 'ClientsController@delete');

    Route::post('/administrator/create_client', 'ClientsController@store');
    Route::post('/administrator/edit_client/{id}', 'ClientsController@update');

    //Orders Controller
    Route::get('/administrator/orders', function () {
        return view('orders');
    });

    //system
    Route::get('/administrator/system', 'SystemController@show');

    Route::post('/administrator/system', 'SystemController@store');

    //coupons
    Route::get('/administrator/coupons', 'CouponController@show');
    Route::get('/administrator/create_coupon', 'CouponController@createCoupon');
    Route::post('/administrator/create_coupon', 'CouponController@store');
    Route::get('/administrator/delete_coupon/{id}', 'CouponController@delete');





//seo
    Route::get('/administrator/seo', 'SeoController@show');

    Route::post('/administrator/seo', 'SeoController@store');





});

//orders

Route::get('/administrator/orders', 'OrdersController@show');
Route::post('/administrator/order/update/{id}', 'OrdersController@update');
Route::get('/administrator/orders/{id}', 'OrdersController@delete');


//products
Route::get('/administrator/products', 'ProductController@show');
Route::get('/administrator/reviews', 'ReviewController@show');
Route::get('/administrator/delete_review/{id}', 'ReviewController@delete');


Route::post('/administrator/create_product', 'ProductController@store');
Route::get('/administrator/create_product', 'ProductController@dropDown');
Route::get('/administrator/edit_product/{id}', 'ProductController@edit');
Route::post('/administrator/edit_product/{id}', 'ProductController@update');
Route::get('/administrator/delete_product/{id}', 'ProductController@delete');

//payments
Route::get('/administrator/payments', 'PaypalController@show');

Route::post('/administrator/payments', 'PaypalController@store');

Route::get('/payment', array(
    'middleware' => 'auth',
    'as' => 'payment',
    'uses' => 'PaypalController@postPayment',
));

Route::get('/cod',  ['middleware' => 'auth', 'uses' => 'PaypalController@cod']);

//stripe
Route::post('/stripe', 'StripeController@process');




// this is after make the payment, PayPal redirect back to your site
Route::get('payment/status', array(
    'as' => 'payment.status',
    'uses' => 'PaypalController@getPaymentStatus',
));


//login

Route::get('administrator/auth/login', 'Auth\AuthController@getLogin');
Route::get('administrator/auth/logout', 'Auth\AuthController@getLogout');
Route::post('administrator/auth/login', 'Auth\AuthController@postLogin');

//frontend


Route::get('/cart', 'CartController@show');
Route::post('/edit_client/{id}', 'ClientsController@update');
Route::get('/account',  ['middleware' => 'auth', 'uses' => 'AccountController@show']);
Route::post('/login', 'LoginController@login');
Route::get('/logout', 'LoginController@logout');
Route::post('/register', 'ClientsController@store');
Route::get('/login', 'LoginController@show');
Route::post('/price_filter', 'FrontendController@priceFilter');
Route::get('/register/verify/{confirmationCode}', [
    'as' => 'confirmation_path',
    'uses' => 'ClientsController@confirm'
]);

// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');


Route::get('/contact',  'ContactController@show');
Route::post('/contact',  'ContactController@contact');


Route::get('/product_details/{id}', 'FrontendController@showDetails');
Route::post('/product_details/{id}', 'FrontendController@cart');

Route::get('/', 'FrontendController@show');
Route::get('/profile',  ['middleware' => 'auth', 'uses' => 'ProfileController@show']);

Route::post('/', 'FrontendController@search');
Route::post('/cart_update/{id}', 'FrontendController@update');
Route::get('/product/{id}', 'FrontendController@cart');
Route::get('/cart_delete/{id}', 'FrontendController@delete');
Route::post('/review/{id}', 'FrontendController@review');
Route::post('/coupons', 'CouponController@verify');











