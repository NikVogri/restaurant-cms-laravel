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

    public function update(CartItem $item)
    {

        if (request()->has('count')) {

            if (request('count') == 'decrement' && $item->quantity == 1) {
                $item->delete();
            } else {
                request('count') == 'increment' ? $item->increment('quantity') : $item->decrement('quantity');
            }

            $item->cart->updatePrice();
        }



        return back();
    }

    public function destroy($itemId)
    {
        $cart  = auth()->user()->cart;
        $cart->items()->whereId($itemId)->delete();
        $cart->update(['total_price' => $cart->calculateTotalPrice()]);


        return back()->with('message', 'Item removed from cart');
    }

    public function removeCoupon()
    {
        $cart = auth()->user()->cart;

        $cart->update(['coupon_id' => null]);

        return back();
    }

    public function success()
    {
        return view('orders.successful-order');
    }
}