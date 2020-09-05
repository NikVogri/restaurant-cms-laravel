<?php

namespace App\Http\Controllers;

use App\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {

        $range = request('range');
        $orders = Order::query();


        if ($range == 'today' || empty($range)) {
            $orders->whereDate('created_at', '>=', Carbon::today());
        }

        if ($range == 'week') {
            $orders->whereDate('created_at', '>=', Carbon::today()->subDays(7));
        }

        if ($range == 'month') {
            $orders->whereDate('created_at', '>=', Carbon::today()->subMonth(1));
        }

        if ($range == 'year') {
            $orders->whereDate('created_at', '>=', Carbon::today()->subYear(1));
        }


        $ordersInPeriod = $orders->orderBy('created_at')->get();

        return view('reports.index', [
            'orders_count' => $ordersInPeriod->count(),
            'orders_earnings' => $this->getEarnings($ordersInPeriod),
            'items_count' => $this->getTotalItems($ordersInPeriod),
            'data' => $this->getChartData($ordersInPeriod, $range),
            'coupon_count' => $this->getCouponsUsed($ordersInPeriod)
        ]);
    }


    protected function getCouponsUsed($orders)
    {
        return $orders->filter(function ($order) {
            return $order->coupon_id;
        })->count();
    }

    protected function getTotalItems($orders)
    {
        $items = 0;

        foreach ($orders as $order) {

            $items += $order->orderItems->count();
        }

        return $items;
    }


    protected function getEarnings($orders)
    {
        $earnings = 0;

        foreach ($orders as $order) {
            $earnings += $order->total_price;
        }

        return $earnings;
    }

    protected function getChartData($orders, $range)
    {
        return $orders->groupBy(function ($date) use ($range) {
            return Carbon::parse($date->created_at)->format($this->getDateType($range));
        })->toArray();
    }

    protected function getDateType($range)
    {

        if ($range == 'today' || empty($range)) {
            return 'H';
        }

        if ($range == 'week') {
            return 'D';
        }

        if ($range == 'month') {
            return 'd M';
        }

        if ($range == 'year') {
            return 'M';
        }
    }
}