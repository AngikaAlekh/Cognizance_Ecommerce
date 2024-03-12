@extends('layouts.client.master')

@section('title', 'Ecommerce')

@section('content')

    <div class="container py-5">
        <div class="row mb-5">
            <div class="col-md-12" >
                <h1 class="text-center">Categories</h1>
            </div>
        </div>
        <div class="row">

            @foreach ($categories as $category)
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset('uploads/category/' . $category->image) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $category->title }}</h5>
                            <p class="card-text"></p>
                            <a href="{{url('/category/'.$category->slug)}}" class="btn btn-primary">Browse</a>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="d-flex justify-content-center">
                {{$categories->links()}}
            </div>
        </div>
    </div>

@endsection