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
        return auth()->user()->cart->items()->count() ? view('cart.credit-card-checkout') : redirect('/');
    }

    public function store(Orders $orders, CreditCardPaymentRequest $request)
    {

        try {
            $this->sendPayment($request);
            $orders->create(2)->clearCart();
        } catch (CardErrorException $e) {
            return view('cart.credit-card-checkout')->with('card_decline', $e->getMessage());
        }

        return redirect(route('cart.success'));
    }

    protected function sendPayment($request)
    {
        return Stripe::charges()->create([
            'source' => $request->stripeToken,
            'receipt_email' => auth()->user()->email,
            'currency' => 'EUR',
            'amount'   => auth()->user()->cart->coupon ? auth()->user()->cart->applyCoupon() : auth()->user()->cart->total_price,
        ]);
    }
}