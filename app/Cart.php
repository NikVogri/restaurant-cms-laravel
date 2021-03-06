<?php

namespace App;

use App\Item;
use App\User;
use App\Coupon;
use App\CartItem;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $guarded = [];

    protected $with = ['items'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(CartItem::class);
    }

    public function coupon()
    {
        return $this->belongsTo(Coupon::class);
    }

    public function calculateTotalPrice()
    {
        $totalPrice = 0;

        foreach ($this->fresh()->items as $item) {
            $totalPrice += $item->item->price * $item->quantity;
        }

        return $totalPrice;
    }

    public function applyCoupon()
    {
        return $this->attributes['total_price'] = $this->calculatePriceWithCoupon($this->coupon);
    }

    public function addCoupon()
    {
        $coupon = Coupon::whereCoupon(request('coupon'))->first();

        if (!$coupon || !$coupon->isValid()) {
            return false;
        }

        $this->update([
            'coupon_id' => $coupon->id
        ]);

        return true;
    }

    protected function calculatePriceWithCoupon($coupon)
    {
        return $coupon->type === 'percentage' ? $this->total_price *  (1 - ($coupon->value / 100)) :  $this->total_price - $coupon->value;
    }
    public function updatePrice()
    {
        $this->update(['total_price' => $this->calculateTotalPrice()]);
    }
}