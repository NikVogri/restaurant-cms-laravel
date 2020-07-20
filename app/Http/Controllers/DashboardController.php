<?php

namespace App\Http\Controllers;

use App\Category;
use App\Item;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //

    public function index()
    {
        return view('dashboard.index', [
            'orderCount' => 5,
            'categoryCount' => Category::get()->count(),
            'itemCount' => Item::get()->count()
        ]);
    }
}