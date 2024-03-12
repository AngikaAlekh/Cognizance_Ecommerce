@extends('layouts.client.master')

@section('title', $product->title . ' - ECommerce')

@section('content')
    <section class="section-padding section-bg">
        <div class="container">
            <h1>{{$product->title}}</h1>
            <p><span class="badge bg-secondary">{{$category->title}}</span></p>
            <div class="row">
                <div class="col-md-12">
                    <p>
                        {{$product->description}}
                    </p>
                </div>
                <div class="col-md-12">
                    {!! $product->long_description !!}
                </div>
                <div class="col-md-12 mb-5">
                    <h2 class="text-danger">₹ {{$product->price}}</h2>
                </div>
                <div class="col-md-12">
                    @guest
                    <a href="{{url('/enroll/'.$product->id)}}" class="btn btn-primary">Enroll</a>
                    @else
                        @php
                            $isEnrolled = App\Models\Enrollment::where("user_id", Auth::user()->id)
                                ->where("course_id", $course->id)
                                ->latest()
                                ->first();
                        @endphp
                        @if ($isEnrolled)
                        <button class="btn btn-primary" disabled>Enrolled</button>
                        @else
                        <a href="{{url('/enroll/'.$course->id)}}" class="btn btn-primary">Enroll</a>
                        @endif
                    @endguest
                </div>
            </div>
        </div>
    </section>
@endsection