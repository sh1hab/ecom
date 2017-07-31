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
			

			{!! Form::model($product,[ 'route'=>['products.update',$product->id ],'method'=>'PUT' ,'files'=>true ] ) !!}
			
			<!-- {{csrf_field()}} -->
			<legend class="">Add Products</legend>
			<div class="form-group">

				{!! Form::text('name',null,[ 'class'=>'form-control','required'=>'required']) !!}
			</div>

			<div class="form-group">
				{!! Form::textarea('descreption',null,["class" => "form-control"] ) !!}
			</div>
			
			<div class="form-group">
				<label>Size</label>
				{!! Form::select('size',['small','medium'],null,["class"=>"form-control"]) !!}
			</div>

			<div class=" input-group">
				
				<span class="input-group-addon">$</span>
				<input type="integer" name="price" class="form-control" placeholder="price" value="{{$product->price}}">
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

				<img src="/images/{{ $product->image }}" class="img-responsive" id="preview">

				<input type="file" name="image" class="form-control" 
				onchange="document.getElementById('preview').src=
				window.URL.createObjectURL(this.files[0])">

			</div>

			<input type="submit" name="submit" class="btn btn-success">
			
			{!!Form::close()!!}
			<!-- </form> -->
		</fieldset>



	</div>
</div>

@stop