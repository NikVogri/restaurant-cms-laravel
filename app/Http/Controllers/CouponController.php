<?php

namespace App\Http\Controllers;

use App\Coupon;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index()
    {
        $coupons = Coupon::latest()->get();
        return view('coupons.index', compact('coupons'));
    }

    public function create()
    {
        return view('coupons.create');
    }

    public function store()
    {

        $attributes =  request()->validate([
            'name' => ['required', 'string'],
            'coupon' => ['required', 'string'],
            'valid_for' => ['required'],
            'type' => ['required', 'string'],
            'value' => ['required'],
        ]);

        $attributes['valid_until'] = $this->getDate($attributes['valid_for']);

        Coupon::create(collect($attributes)->except('valid_for')->toArray());

        return back()->with('Coupon added successfully.');
    }

    public function getDate($time)
    {
        return $time == 'forever' ? Carbon::now()->addCenturies(1) :  Carbon::now()->addDays($time);
    }
}