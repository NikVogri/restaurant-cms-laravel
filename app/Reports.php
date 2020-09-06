<?php


namespace App;

use App\Order;
use Carbon\Carbon;

class Reports
{


  protected $orders = [];
  protected $report_types = ['orders_earnings', 'orders_count', 'items_count', 'coupons_count', 'chart_data'];



  public function __construct()
  {
    $this->orders = method_exists($this, request('range')) ? $this->{request('range')}() : $this->week();

    foreach ($this->report_types as $types) {
      $this->{$types}();
    }
  }


  protected function chart_data()
  {
    $this->chart_data = $this->orders->groupBy(function ($date) {
      return Carbon::parse($date->created_at)->format($this->getDateType());
    })->map(function ($date) {
      return $date->count();
    })->toArray();
  }


  protected function getDateType()
  {

    if (request('range') == 'week' || empty(request('range'))) {
      return 'D';
    }

    if (request('range') == 'month' || request('range') == 'last_month') {
      return 'd M';
    }

    if (request('range') == 'year') {
      return 'm';
    }
  }



  protected function orders_count()
  {
    $this->orders_count =  $this->orders->count();
  }

  protected function coupons_count()
  {
    $this->coupons_count = $this->orders->filter(function ($order) {
      return $order->coupon_id;
    })->count();
  }

  protected function items_count()
  {
    $itemsCount = 0;

    foreach ($this->orders as $order) {
      $itemsCount += $order->orderItems->count();
    }

    $this->items_count = 0;
  }


  protected function orders_earnings()
  {
    $orderEarnings = 0;

    foreach ($this->orders as $order) {
      $orderEarnings += $order->total_price;
    }
    $this->orders_earnings = $orderEarnings;
  }

  public static function week()
  {
    return static::getOrdersBetween([Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
  }

  public static function month()
  {
    return static::getOrdersBetween([Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()]);
  }

  public static function last_month()
  {
    return  static::getOrdersBetween([Carbon::now()->subMonth(1)->startOfMonth(), Carbon::now()->subMonth(1)->endOfMonth()]);
  }

  public static function year()
  {
    return static::getOrdersBetween([Carbon::now()->startOfYear(), Carbon::now()]);
  }


  private static function getOrdersBetween($arguments)
  {
    return static::ordersQuery()->whereBetween('created_at', $arguments)->get();
  }

  private static function ordersQuery()
  {
    return Order::query()->orderBy('created_at');
  }
}