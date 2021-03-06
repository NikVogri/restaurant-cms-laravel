<?php

namespace App\Http\Controllers;

use App\Category;
use App\Item;
use App\Order;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:admin|staff']);
    }

    public function index()
    {
        return view('dashboard.index', [
            'orderCount' => Order::count(),
            'categoryCount' => Category::count(),
            'itemCount' => Item::count()
        ]);
    }
}