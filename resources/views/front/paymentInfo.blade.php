@extends('layouts.main')

@section('stylesheets')

<link rel="stylesheet" href="{{ asset('css/stripe.css') }}"/>

@endsection

@section('content')


<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<form action="/store-payment" method="POST" id="payment-form">
			{!! csrf_field() !!}
			<label>
				<span>Name</span>
				<input name="cardholder-name" class="field" placeholder="Jane Doe" />
			</label>
			<label>
				<span>Phone</span>
				<input class="field" placeholder="(123) 456-7890" type="tel" />
			</label>
			<label>
				<span>ZIP code</span>
				<input name="address-zip" class="field" placeholder="94110" />
			</label>
			<label>
				<span>Card</span>
				<div id="card-element" class="field"></div>
			</label>
			<button type="submit">Pay ${{Cart::total()}}</button>
			<div class="outcome">
				<div class="error" role="alert"></div>
				<div class="success">
					Success! Your Stripe token is <span class="token"></span>
				</div>
			</div>
		</form>
	</div>

</div>


@endsection

@section('scripts')

<script src="https://js.stripe.com/v3/"></script>

<script src="{{asset('js/stripe.js')}}"></script>

@endsection



