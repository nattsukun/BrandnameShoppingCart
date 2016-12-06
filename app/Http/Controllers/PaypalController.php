<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;
use Config;
use URL;
use Session;
use Input;
use Validator;
use DB;
use Gloudemans\Shoppingcart\Facades\Cart;
use Auth;
use Mail;


class PaypalController extends BaseController
{

    private $_api_context;

    public function __construct()
    {


        // setup PayPal api context
        $paypal_conf = Config::get('paypal');
        $row = DB::table('paypal')->first();
        if (empty($row)) {
            $client_id = 0;
            $secret = 0;
            $this->_api_context = new ApiContext(new OAuthTokenCredential($client_id, $secret));
            $this->_api_context->setConfig($paypal_conf['settings']);
        } else {
            $client_id = $row->client_id;
            $secret = $row->secret;

            $this->_api_context = new ApiContext(new OAuthTokenCredential($client_id, $secret));
            $this->_api_context->setConfig($paypal_conf['settings']);
        }
    }

    public function show()
    {
        if (Auth::user()->role == 'Administrator') {
            $row = DB::table('paypal')->first();
            return view('/payments', ['row' => $row]);
        } else {
            return redirect('/administrator/categories');


        }


    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'client_id' => 'required',
            'secret' => 'required',

        ]);

        if ($validator->fails()) {
            return redirect('payments')
                ->withErrors($validator)
                ->withInput();
        }
        $client_id = Input::get('client_id');
        $secret = Input::get('secret');
        $rows = DB::table('paypal')->first();

        if (sizeof($rows) > 0) {
            DB::table('paypal')->update(
                ['client_id' => $client_id, 'secret' => $secret]
            );
            \Session::flash('success-msg', 'Successfully updated');

        } else {
            DB::table('paypal')->insert(
                ['client_id' => $client_id, 'secret' => $secret]
            );
            \Session::flash('success-msg', 'Successfully Added');

        }
        $row = DB::table('paypal')->first();


        return view('/payments', ['row' => $row]);

    }

    public function postPayment()
    {


        $payer = new Payer();
        $payer->setPaymentMethod('paypal');
        $cart = Cart::content();

        $items = [];

        foreach ($cart as $index => $item) {
            $item_1 = new Item();
            $item_1->setName($item->name)// item name
            ->setCurrency('USD')
                ->setQuantity($item->qty)
                ->setPrice($item->price); // unit price

            $items[] = $item_1;

        }

        $item_dis = new Item();
        $item_dis->setName("Discount")// item name
        ->setCurrency('USD')
            ->setQuantity(1)
            ->setPrice(-\Session::get('coupon_value', 0)); // unit price

        $items[] = $item_dis;


        $cart_total = Cart::total() - \Session::get('coupon_value', 0);

        $amount = new Amount();
        $amount->setCurrency('USD')
            ->setTotal($cart_total);

        // add item to list
        $item_list = new ItemList();
        $item_list->setItems($items);

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('Your transaction description');

        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::route('payment.status'))
            ->setCancelUrl(URL::route('payment.status'));

        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));


        try {
            $payment->create($this->_api_context);
        } catch (\PayPal\Exception\PayPalConnectionException $ex) {
            if (\Config::get('app.debug')) {

                echo "Exception: " . $ex->getMessage() . PHP_EOL;

                $err_data = json_decode($ex->getData(), true);
                exit;
            } else {
                die('Some error occur, sorry for inconvenient');
            }
        }

        foreach ($payment->getLinks() as $link) {
            if ($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }

        // add payment ID to session
        Session::put('paypal_payment_id', $payment->getId());

        if (isset($redirect_url)) {
            // redirect to paypal
            return redirect()->away($redirect_url);
        }

        return redirect()->route('original.route')
            ->with('error', 'Unknown error occurred');
    }

    public function cod()
    {
        $cart = Cart::content();
        $user = Auth::user();
        $user_email = $user->email;
        $user_phone = $user->phone;
        $user_address = $user->address;
        $user_zip = $user->zip;
        $user_city = $user->city;

        foreach ($cart as $row) {
            DB::table('orders')->insert(
                ['product' => $row->name, 'client' => $user_email, 'total' => $row->price, 'Address' => $user_address, 'phone' => $user_phone, 'zip' => $user_zip, 'city' => $user_city]
            );
        }
/*
        Mail::send('frontend.order_mail', [], function ($message) use ($user_email) {
            $message->to($user_email)
                ->subject('Order Successfully Made');
        });
*/
        Cart::destroy();
        \Session::forget('coupon_value');
        \Session::flash('paid-msg', 'Order Success');
        return redirect('/account');


    }


    public function getPaymentStatus()
    {
        $cart = Cart::content();
        $user = Auth::user();
        $user_email = $user->email;
        $user_phone = $user->phone;
        $user_address = $user->address;
        $user_zip = $user->zip;
        $user_city = $user->city;

        // Get the payment ID before session clear
        $payment_id = Input::get('paymentId');

        if (!Input::has('PayerID') || !Input::has('token')) {
            Session::flash('error_msg', 'An unknown error occurred. We are sorry for the inconvenience.');
            return redirect()->back()->withInput(Input::all());
        }

        $payment = \PayPal\Api\Payment::get($payment_id, $this->_api_context);

        $execution = new PaymentExecution();
        $execution->setPayerId(Input::get('PayerID'));

        //Execute the payment
        try {
            $result = $payment->execute($execution, $this->_api_context);
        } catch (\Exception $e) {
            Session::flash('error_msg', 'An unknown error occurred. We are sorry for the inconvenience.');
            return redirect()->back()->withInput(Input::all());
        }


        if ($result->getState() == 'approved') { // payment made


            foreach ($cart as $row) {
                DB::table('orders')->insert(
                    ['product' => $row->name, 'client' => $user_email, 'total' => $row->price, 'Address' => $user_address, 'phone' => $user_phone, 'zip' => $user_zip, 'city' => $user_city]
                );
            }

            Mail::send('frontend.order_mail', [], function ($message) use ($user_email) {
                $message->to($user_email)
                    ->subject('Order Successfully Made');
            });

            Cart::destroy();
            \Session::forget('coupon_value');
            \Session::flash('paid-msg', 'Order Success');
            return redirect('/account');


        }

        Session::flash('error_msg', 'An unknown error occurred. We are sorry for the inconvenience.');
        return redirect()->back()->withInput(Input::all());


    }

}