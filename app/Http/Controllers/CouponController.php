<?php

namespace App\Http\Controllers;

use App\Coupon;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\CouponStoreRequest;

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

    public function store(CouponStoreRequest $request)
    {
        Coupon::create($this->constructCouponAttributes($request));

        return redirect(route('coupons.index'))->with('message', 'Coupon Added Successfully');
    }

    protected function constructCouponAttributes($request)
    {
        $request['valid_until'] = $this->getDate($request['valid_for']);
        return collect($request)->except('valid_for')->toArray();
    }

    protected function getDate($time)
    {
        return $time == 'forever' ? Carbon::now()->addCenturies(1) :  Carbon::now()->addDays($time);
    }
}