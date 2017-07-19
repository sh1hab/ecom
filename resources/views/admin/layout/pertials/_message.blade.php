@if( count($errors) )

<div class="alert alert-danger">
	@foreach( $errors->all() as $error )
	<li>{{$error}}</li>
	@endforeach
</div>

@endif

@if(Session::has('success') )
<div class="alert alert-success">
	<p>{{ Session::get('success') }}</p>
</div>
@endif

@if(Session::has('message'))
<div class="alert alert-info">
	<p>{{ Session::get('message') }}</p>
</div>
@endif