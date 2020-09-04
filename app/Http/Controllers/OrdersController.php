<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Order;

use App\Orders;
use Illuminate\Http\Request;

class OrdersController extends Controller
{


    public function __construct()
    {
        $this->middleware(['role:admin|staff'])->except('store');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('orders.index', [
            'orders' => Order::orderBy('created_at', 'DESC')->with('customer')->with('paymentType')->get()
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
    public function store(Orders $orders)
    {
        $orders->create(1)->clearCart();
        return view('orders.successful-order');
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
            'order' => $order,
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
        $order->alert->complete();
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