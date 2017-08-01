<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Order;

class OrderController extends Controller
{
    //

	public function showOrders($type='')
	{

		//dd($type);

		

		if( $type=="delivered" )
			$orders=Order::where('delivered','=','1')->get();
		else if( $type=="pending" )
			$orders=Order::where('delivered','=','0')->get();
		else
			$orders=Order::all();



		return view('admin.orders')->withOrders($orders);

	}

	public function toggleOrders(Request $request,  $id)
	{

		//dd($request->delivered);

		$order=Order::find($id);
		$order->delivered=$request->delivered;
		$order->save();

		return back();

	}



}
