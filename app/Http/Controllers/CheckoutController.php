<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {

        $cart = auth()->user()->cart;
        return $cart->items()->count() ? view('cart.checkout', compact('cart')) : redirect('/');
    }
}