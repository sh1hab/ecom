@extends('layouts.main')

@section('content')

<section class="hero text-center">
    <br/>
    <br/>
    <br/>
    <br/>
    <h2 >
        <strong>
            Hey! Welcome to MC- Mykey's Store
        </strong>
    </h2>
    <br>
    <a href="/shirts"><button class="button large">Check out My Shirts</button></a>
</section>
<br/>
<div class="subheader text-center">
 <h2>
    MyKey&rsquo;s Latest Shirts
</h2>
</div>

<!-- Latest SHirts -->
<div class="row">
    @forelse($shirts as $dt)
    <div class="small-3 columns">
        <div class="item-wrapper">
            <div class="img-wrapper">
                <a class="button expanded add-to-cart" href="/cart/{{$dt->id}}/edit" >
                    Add to Cart
                </a>
                <a href="#">
                    <img src="{{url('/images/',$dt->image)}}"/>
                </a>
            </div>
            <a href="#">
                <h3>
                    {{ $dt->name }}
                </h3>
            </a>
            <h5>
                ${{ $dt->price }}
            </h5>
            <p>
                
                {{ $dt->descreption }}
            </p>
        </div>
    </div>
    @empty
    <p>No T-shirt Available</p>
    @endforelse
</div>
<br>
@endsection
