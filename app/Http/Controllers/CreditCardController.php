<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Http\Requests\CreditCardPaymentRequest;
use App\Orders;
use Illuminate\Http\Request;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Cartalyst\Stripe\Exception\CardErrorException;

class CreditCardController extends Controller
{

    public function index()
    {
        return view('cart.credit-card-checkout');
    }

    public function store(Orders $orders, CreditCardPaymentRequest $request)
    {
        try {
            $this->sendPayment($request);
            $orders->create(2)->clearCart();
        } catch (CardErrorException $e) {
            return view('cart.credit-card-checkout')->with('card_decline', $e->getMessage());
        }

        return view('orders.successful-order');
    }

    protected function sendPayment($request)
    {
        return Stripe::charges()->create([
            'metadata' => [
                'contents' => json_encode(auth()->user()->cart)
            ],
            'source' => $request->stripeToken,
            'name' => $request->card_holder,
            'receipt_email' => auth()->user()->email,
            'currency' => 'EUR',
            'amount'   => auth()->user()->cart->coupon ? auth()->user()->cart->applyCoupon() : auth()->user()->cart->total_price,
        ]);
    }
}