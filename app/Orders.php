<?php

namespace App;

class Orders
{

  protected $cart;

  public function __construct()
  {
    $this->cart = $this->getCart();
  }

  public function create($paymentId)
  {
    $order = auth()->user()
      ->orders()
      ->create(
        [
          'payment_id' => $paymentId,
          'total_price' => $this->cart->coupon ? $this->cart->applyCoupon() : $this->cart->total_price,
          'coupon_id' => $this->cart->coupon ? $this->cart->coupon->id : null
        ]
      );

    $this->createItems($order);
    return $this;
  }


  protected function createItems($order)
  {
    $this->cart->items->each(function ($item) use ($order) {
      $order->orderItems()->create(['item_id' => $item->item_id, 'quantity' => $item->quantity]);
    });
  }

  public function clearCart()
  {
    $this->cart->items()->delete();
    $this->cart->delete();
    return $this;
  }

  protected function getCart()
  {
    return auth()->user()->cart;
  }
}