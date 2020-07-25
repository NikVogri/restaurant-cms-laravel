<?php

namespace App\Http\Controllers;

use App\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:admin|staff|guest']);
    }
    public function index()
    {

        $cart = Cart::firstOrCreate(['user_id' => auth()->user()->id]);

        return view('cart.index', [
            'cartItems' => $cart->items,
            'totalPrice' => $cart->totalPrice()
        ]);
    }

    public function store($itemId)
    {
        // check if cart already exists
        $cart = Cart::firstOrCreate(['user_id' => auth()->user()->id]);

        // add item to cart
        $cart->items()->create(['item_id' => $itemId]);

        return back()->with('message', 'Item added to cart');
    }
}