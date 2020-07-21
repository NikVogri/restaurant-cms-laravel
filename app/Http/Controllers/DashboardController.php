<?php

namespace App\Http\Controllers;

use App\Category;
use App\Item;
use App\Order;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //

    public function index()
    {
        return view('dashboard.index', [
            'orderCount' => Order::get()->count(),
            'categoryCount' => Category::get()->count(),
            'itemCount' => Item::get()->count()
        ]);
    }
}