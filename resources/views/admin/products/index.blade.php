@extends('admin.layout.admin')

@section('content')


<table class="table table-hover">
	<thead >
		<tr>
			<th>#</th>
			<th>Id</th>
			<th>Name</th>
			<th>Descreption</th>
			<th>Category</th>
			<th>Action</th>
		</tr>
	</thead>

	<tbody>
		<?php $sl=1; ?>

		@foreach($products as $product)
		<tr>
			<td>{{$sl++}}</td>
			<td>{{$product->id}}</td>
			<td>{{$product->name}}</td>
			<td>{{$product->descreption}}</td>
			<td>{{$product->category->name}}</td>
			<td>
				<a href="/admin/products/{{$product->id}}/edit" class="btn btn-default">Edit</a>
				<!-- Trigger the modal with a button -->
				<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal">Delete</button>

				<!-- Modal -->
				<div id="myModal" class="modal fade" role="dialog">
					<div class="modal-dialog">

						<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Delete Product</h4>
							</div>
							{!!Form::open([ 'route'=>['products.destroy',$product->id ],'method'=>'DELETE'] )!!}
							<div class="modal-body">
								<p>Are You Sure ?</p>
							</div>
							<div class="modal-footer">
								<input type="submit" class="btn btn-danger" value="Yes">
								<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
							</div>
							{!!Form::close()!!}
						</div>

					</div>
				</div>
			</td>
		</tr>

		@endforeach
		
	</tbody>
</table>



@endsection


