<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Item;

class WelcomeController extends Controller
{

    public function index()
    {
        return view('index', [
            'items' => Item::orderBy('created_at')->get(),
            'categories' => Category::get()
        ]);
    }
}