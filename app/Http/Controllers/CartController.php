<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Coupon;
use App\CartItem;
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


        if (request('coupon')) {
            if (!$cart->addCoupon()) {
                return view('cart.index', [
                    'cart' => $cart,
                ])->with('message', 'Coupond could not be found');
            }
        }

        if ($cart->coupon) {
            $cart->applyCoupon();
        }

        return view('cart.index', [
            'cart' => $cart,
        ]);
    }

    public function store($itemId)
    {

        // check if cart already exists
        $cart = Cart::firstOrCreate(['user_id' => auth()->user()->id]);

        // create item / update quantity
        if ($item = $cart->items()->where('item_id', $itemId)->first()) {
            $item->increment('quantity');
        } else {
            $cart->items()->create(['item_id' => $itemId]);
        }

        // update total price of cart
        $cart->update(['total_price' => $cart->calculateTotalPrice()]);

        return back()->with('message', 'Item added to cart');
    }

    public function destroy($itemId)
    {
        // dd(auth()->user()->cart->items);
        $cart  = auth()->user()->cart;

        $cart->items()->whereId($itemId)->delete();
        $cart->update(['total_price' => $cart->calculateTotalPrice()]);


        return back()->with('message', 'Item removed from cart');
    }
}