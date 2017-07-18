@extends('admin.layout.admin')

@section('stylesheets')

@stop

@section('content')

<div class="row">
	<div class="col-md-4 col-md-offset-4">
		
		<fieldset class="">
			<form action="{{Route('admin.store')}}" method="POST" enctype="multipart/form-data">

				{{csrf_field()}}
				<legend class="">Add Products</legend>
				<div class="form-group">
					<label>Name</label>
					<input type="text" name="name" class="form-control">
				</div>
				<div class="form-group">
					<label>Descreption</label>
					<textarea cols="" rows="5" name="descreption" class="form-control"></textarea>
				</div>
				<div class="form-group">
					<label>Size</label>
					<select class="form-control">
						<option value="small">Small</option>
						<option value="medium">Medium</option>
					</select>
				</div>

				<div class="form-group">
					<input type="file" name="image" class="form-control">
				</div>

				<input type="submit" name="submit" class="btn btn-success">
				

			</form>
		</fieldset>



	</div>
</div>

@stop