@extends('layouts.client.master')

@section('title', $category->title . ' - ECommerce')

@section('content')
    <section class="section-padding section-bg">
        <div class="container">
            <div class="row my-5">
                <div class="col-md-12">
                    <form action="{{ url('/search') }}" method="post"
                        class="d-flex align-items-center bg-white rounded p-2 shadow-sm">
                        @csrf
                        <input type="text" name="title" class="form-control me-3" placeholder="Search a course...">
                        <label for="">Free</label>
                        <input type="checkbox" name="free" class="me-3">
                        <label for="">Paid</label>
                        <input type="checkbox" name="paid" class="me-3">
                        <button class="btn btn-primary">Search</button>
                    </form>
                </div>
            </div>
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="card" style="width: 18rem;">
                            <img src="{{ asset('uploads/product/' . $product->image) }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->title }}</h5>
                                <p class="card-text"></p>
                                <a href="{{ url('/category/' . $category->slug . '/' . $course->slug) }}"
                                    class="btn btn-primary">Browse</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="d-flex justify-content-center">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </section>
@endsection