@extends('layouts.main')

@section('content')

<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<table class="table table-responsive" style="margin-top: 30px">
			<thead>
				<tr>
					<th>Name</th>
					<th>Price</th>
					<th>Quantity</th>
					<th>Size</th>
					<th>Action</th>
				</tr>
			</thead>

			@if( isset($carts) )
			<tbody>
				@foreach($carts as $cart)
				<tr>
					
					<td>{{$cart->name}}</td>
					<td>$ {{$cart->price}}</td>

					{!! Form::open(['route' => ['cart.update',$cart->rowId], 'method' => 'PUT']) !!}
					<td>
						<input type="integer" name="qty" value="{{$cart->qty}}" >
					</td>
					<td>
						<input type="integer" name="size" value="{{$cart->size}}" >
					</td>
					<td>
						<input type="submit" name="submit" value="ok" class="btn btn-primary">

						{!!Form::close()!!}

						{!! Form::open(['route' => ['cart.destroy',$cart->rowId], 'method' => 'DELETE']) !!}

						<input type="submit" name="submit" value="DELETE" class="btn btn-danger">

						{!!Form::close()!!}

					</td>


				</tr>
				@endforeach
				<tr>
					<td></td>
					<td>Tax::{{ Cart::tax() }}<br>
						Subtotal::{{ Cart::subtotal() }}<br>
						<b>Total:::	</b>${{Cart::total()}}<br>
					</td>
					<td>{{Cart::count()}}</td>
				</tr>
				
			</tbody>	

			@endif

		</table>
		<a href="/checkout"  class="btn btn-success">Checkout</a>
	</div>
</div>

@stop