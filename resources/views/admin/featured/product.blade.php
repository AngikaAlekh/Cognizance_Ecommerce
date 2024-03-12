@extends('layouts.admin.master')

@section('title', 'Featured Products - Ecommerce')

@section('content')
    <div class="container py-3">
        <div class="row">
            <div class="col-md-12">
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{session('success')}}
                    </div>
                @endif
    
                @if (session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{session('error')}}
                    </div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form action="{{url('/admin/featured/products/store')}}" method="post" class="d-flex">
                    @csrf
                    <select name="product_id" class="form-control me-3">
                        @foreach ($products as $item)
                        <option value="{{$item->id}}">{{$item->title}}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-primary">Add</button>
                </form>
            </div>
        </div>

        <div class="row pt-5">
            <div class="col-md-12 card rounded shadow">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Category Title</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    @foreach ($featured_products as $fcat)
                    <tr>
                        <td>{{$fcat->product->title}}</td>
                        <td>
                            <a href="{{url('/admin/featured/product/delete/'.$fcat->id)}}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection