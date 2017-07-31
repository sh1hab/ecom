<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Order;
use Session;
use Nexmo;

class CheckoutController extends Controller
{

    public function step1()
    {
        return view('cart.OrderInfo');
    }

    public function shipping()
    {
        return view('front.paymentInfo');
    }

    public function storePayment(Request $request)
    {

       //dd($request);

        // Set your secret key: remember to change this to your live secret key in production
// See your keys here: https://dashboard.stripe.com/account/apikeys
        \Stripe\Stripe::setApiKey("sk_test_HTa7eifj9YwCb4Y5ULA08Y5W");

// Token is created using Stripe.js or Checkout!
// Get the payment token ID submitted by the form:
        $token = $request['stripeToken'];

// Charge the user's card:
        try {
            $charge = \Stripe\Charge::create(array(
                "amount" => Cart::total()*100, // Amount in cents
                "currency" => "usd",
                "source" => $token,
                "description" => "Example charge"
                ));
        } catch (\Stripe\Error\Card $e) {
            // The card has been declined
        }

        Order::CreateOrder();

        Session::flash('success','Success');

        Nexmo::message()->send([
            'to' => '8801632319334',
            'from' => '8801632319334',
            'text' => 'Using the facade to send a message.'
            ]);

        return redirect()->route('home');

    }
    
    public function index()
    {
        //
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }
}
