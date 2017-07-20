@extends('admin.layout.admin')

@section('content')

<div class="navbar">
	<a class="navbar-brand">Categories -</a>
	<ul class="nav navbar-nav">
		@forelse($categories as $cat)
		<li><a href="/admin/categories/{{$cat->id}}">{{ $cat->name }}</a></li>
		@empty
		<li>Null</li>
		@endforelse
	</ul>

	<!-- Trigger the modal with a button -->
	<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#category">
		Add Category
	</button>

	<!-- Modal -->
	<div id="category" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Add New Category</h4>
				</div>

				<form action="/admin/categories" method="POST">
					<div class="modal-body">

						{{csrf_field()}}
						<div class="form-group">
							<label>Name:</label>
							<input type="text" name="name" class="form-control">	
						</div>

						


					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="submit" value="save changes" class="btn btn-success">save changes</button>
					</div>
				</form>
			</div>

		</div>
	</div>
</div>

@if(isset($products))

<section>
	<h3>Products</h3>
	<table class="table table-hover table-responsive">
		<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
			</tr>
		</thead>
		<tbody>
			@forelse($products as $prd)
			<tr class="">
				<td>{{ $prd['id'] }}</td>
				<td>{{ $prd['name'] }}</td>
			</tr>
			@empty
			<tr>Null</tr>
			@endforelse
		</tbody>
	</table>
</section>
@endif
@stop