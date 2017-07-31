@extends('layouts.main')

@section('content')

<div class="row">

    @foreach($tshirts as $tshirt)
    <div class="small-3 columns">
        <div class="item-wrapper">
            <div class="img-wrapper">
                <a class="button expanded add-to-cart">
                    Add to Cart
                </a>
                <div class="">
                    <div class="">
                        <a href="#">
                        <img src="{{ asset('/images/'.$tshirt->image) }}"/>
                        </a>
                    </div>
                </div>
            </div>
            <a href="shirt.html">
                <h3>
                    {{ $tshirt->name }}
                </h3>
            </a>
            <h5>
                $19.99
            </h5>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin posuere sem enim, accumsan convallis risus semper.
            </p>
        </div>
    </div>
    @endforeach
</div>
@endsection