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
				</tr>
			</thead>
			<tbody>
				@forelse($carts as $cart)
				<tr>
					
					<td>{{$cart->name}}</td>
					<td>$ {{$cart->price}}</td>
					<td>
						{!! Form::open(['route' => ['cart.update',$cart->rowId], 'method' => 'PUT']) !!}

						<input type="integer" name="qty" value="{{$cart->qty}}">
						<input type="submit" name="submit" value="ok" class="btn btn-default">

						{!!Form::close()!!}

						{!! Form::open(['route' => ['cart.destroy',$cart->rowId], 'method' => 'DELETE']) !!}

						<input type="submit" name="submit" value="DELETE" class="btn btn-danger">

						{!!Form::close()!!}

					</td>
					<td>{{$cart->size}}</td>

				</tr>
				@empty
				.....
				@endforelse

				<tr>
					<td></td>
					<td>Tax::{{ Cart::tax() }}
						Subtotal::{{ Cart::subtotal() }}
						<b>Total:::	</b>${{Cart::total()}}
					</td>
					<td>{{Cart::count()}}</td>
				</tr>

			</tbody>
		</table>
	</div>
</div>

@stop