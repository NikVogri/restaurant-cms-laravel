<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderItem;
use App\Cart;
use App\Item;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('orders.index', [
            'orders' => Order::orderBy('created_at', 'DESC')->get()
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function new()
    {
        return view('orders.new', [
            'orders' => Order::orderBy('created_at', 'DESC')->where('completed', false)->get()
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function completed()
    {
        return view('orders.completed', [
            'orders' => Order::orderBy('created_at', 'DESC')->where('completed', true)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        // 1) Get all cart items
        $cartItems = Cart::where('user_id', auth()->user()->id)->get();

        ///// calculate total price & get order items ID's
        $totalPrice = 0;
        $orderItems = [];

        foreach ($cartItems as $cartItem) {
            $totalPrice += $cartItem->item->price;
            $orderItems[] = $cartItem->item->id;
        }


        // 2) Create order
        $order =  Order::create([
            'customer_id' => auth()->user()->id,
            'price' => $totalPrice,
            'completed' => false
        ]);

        // 3) Create order items and attach them to order
        foreach ($orderItems as $orderItem) {
            $item = Item::where('id', $orderItem)->first();
            OrderItem::create([
                'order_id' => $order->id,
                'item_id' => $orderItem,
                'quantity' => 1, // hardcoded for now
                'price' => $item->price
            ]);
        }

        // 4) Clear cart
        Cart::where('user_id', auth()->user()->id)->delete();

        return redirect('/')->with('message', 'Your order has been sent');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('orders.show', [
            'order' => $order
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function complete(Order $order)
    {
        $order->complete();
        // Optional Send email to customer

        return back()->with('message', 'Order Marked as Completed');
    }

    public function undoComplete(Order $order)
    {
        $order->complete(false);
        return redirect(route('orders.index'))->with('message', 'Order Marked as Uncompleted');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}