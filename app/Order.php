<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Auth;
use Cart;

class Order extends Model
{
    //

	protected $fillable=['total','delivered'];

	public function OrderItems()
	{
		return $this->belongsToMany('App\Products','order_product','order_id','product_id')->withPivot('qty','total');
	}

	public static function  CreateOrder()
	{

		$usr=Auth::user();
		$order=$usr->Orders()->create(
			[
			'total'=>Cart::total(),
			'delivered'=>0
			]);

		//dd($order);
		$cartItems=Cart::content();
		foreach ($cartItems as $cartItem) {
	# code...

			$order->OrderItems()->attach($cartItem->id,
				[
				'qty'=>$cartItem->qty,
				'total'=>$cartItem->qty*$cartItem->price

				]
				);
		}
	}


}

