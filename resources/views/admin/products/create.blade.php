@extends('admin.layout.admin')

@section('stylesheets')
<style type="text/css">
	.input-group-addon
	{
		background-color:#FFF;
	}
	.input-group .input-group-addon + .form-control
	{
		border-left:none;
	}
</style>
@stop

@section('content')

<div class="row">
	<div class="col-md-4 col-md-offset-4">
		
		<fieldset class="">
			<form action="{{Route('products.store')}}" method="POST" enctype="multipart/form-data">

				{{csrf_field()}}
				<legend class="">Add Products</legend>
				<div class="form-group">
					
					<input type="text" name="name" class="form-control" placeholder="name" required >
				</div>
				<div class="form-group">
					<textarea cols="" rows="5" name="descreption" class="form-control" placeholder="add product descreption here ..."></textarea>
				</div>
				<div class="form-group">
					<label>Size</label>
					<select class="form-control" name="size" required>
						<option value="small">Small</option>
						<option value="medium">Medium</option>
					</select>
				</div>

				<div class=" input-group">
					
					<span class="input-group-addon">$</span>
					<input type="integer" name="price" class="form-control" placeholder="price">
				</div>

				<div class="form-group">
					<label>Category</label>
					<select class="form-control" name="category_id">
						@foreach($category as $key => $cat)
						<option value="{{$cat}}">{{$key}}</option>
						@endforeach
					</select>
				</div>

				<div></div>

				<div class="form-group">

					<img src="" class="img-responsive" id="preview">

					<input type="file" name="image" class="form-control" 
					onchange="document.getElementById('preview').src=
					window.URL.createObjectURL(this.files[0])">

				</div>

				<input type="submit" name="submit" class="btn btn-success">
				

			</form>
		</fieldset>



	</div>
</div>

@stop