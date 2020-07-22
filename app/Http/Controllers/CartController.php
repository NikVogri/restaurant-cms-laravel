<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Item;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:admin|staff|guest']);
    }
    public function index()
    {

        // calculate total price
        $cartItems = Cart::where('user_id', auth()->user()->id)->get();
        $totalPrice = 0;

        foreach ($cartItems as $cartItem) {
            $totalPrice += $cartItem->item->price;
        }

        // return view with all items in cart
        return view('cart.index', [
            'cartItems' => Cart::where('user_id', auth()->user()->id)->get(),
            'totalPrice' => $totalPrice
        ]);
    }

    public function store($item_id)
    {
        Cart::create([
            'user_id' => auth()->user()->id,
            'item_id' => $item_id
        ]);

        return back()->with('message', 'Item added to cart');
    }
}