<!doctype html>
<html class="no-js" lang="en" dir="ltr">
<head>
	@include('pertials._header')
	
	@yield('stylesheets')
</head>
<body>
	<div class="container">
		@include('pertials._nav')

		@include('pertials._message')

		@yield('content')

		@include('pertials._footer')

		@include('pertials._scripts')

		@yield('scripts')
	</div>
</body>
</html>
