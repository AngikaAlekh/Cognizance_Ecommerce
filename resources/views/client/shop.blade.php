@extends('layouts.client.master')

@section('title', 'Shop - ECommerce')

@section('content')
    <div class="untree_co-section product-section before-footer-section">
        <div class="container">
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-12 col-md-4 col-lg-3 mb-5">
                        <a class="product-item" href="{{ route('shop.cart.add', $product->id) }}">
                            <img src="{{ asset('uploads/product/' . $product->image) }}" class="img-fluid product-thumbnail">
                            <h3 class="product-title">{{ $product->title }}</h3>
                            <strong class="product-price">₹{{ $product->price }}</strong>

                            <span class="icon-cross">
                                <img src="{{ asset('client/images/cross.svg') }}" class="img-fluid">
                            </span>
                        </a>
                    </div>
                @endforeach


                

            </div>
        </div>
    </div>
@endsection
