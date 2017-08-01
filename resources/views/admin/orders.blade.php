@extends('admin.layout.admin')

@section('content')


<ul style="list-style-type: none;">
	@foreach( $orders as $order )
	<li>
		<h3>Order By {{	$order->user->name	}}</h3>
		<h3>Total {{	$order->total	}}</h3>

		<form action="/admin/toggle/{{ $order->id }}" class="pull-right" method="post" >
			{{csrf_field()}}
			<input type="hidden" name="_method" value="post">

			<label>Delivered</label>
			<input type="checkbox" name="delivered" value="1">

			<input type="submit" name="" value="submit">
		</form>

		<table class="table-responsive table table-bordered">
			<tr>
				<th>Name</th>
				<th>Qty</th>
				<th>$ Price</th>

				<tr>
					@foreach( $order->OrderItems as $item )
					<td>{{ $item->name}}</td>
					<td>{{ $item->pivot->quantity}}</td>
					<td>{{ $item->pivot->price}}</td>
					@endforeach
				</tr>
			</tr>
		</table>
	</li>
	@endforeach
</ul>

@stop

