@extends('layouts.admin.master')

@section('title', 'Edit  Product - Ecommerce')

@section('custom_styles')
    <link rel="stylesheet" href="{{ asset('admin/css/summernote-lite.min.css') }}">
@endsection

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Product</h1>
        <a href="{{ url('/admin/products/') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> View All Products</a>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form action="{{ url('/admin/product/update/'.$product->id) }}" method="post" class="card shadow rounded p-3"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="">Category</label>
                        <select name="category_id" class="form-control">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{$product->category_id == $category->id ? "selected" : ""}}>{{ $category->title }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">Product Title</label>
                        <input class="form-control" type="text" name="title" value="{{$product->title}}">
                        @error('title')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">Short Description</label>
                        <input class="form-control" type="text" name="description" value="{{$product->description}}">
                        @error('description')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">Long Description</label>
                        <textarea name="long_description" id="course_summernote" cols="30" rows="10">
                            {{$product->long_description}}
                        </textarea>
                        @error('long_description')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">Video URL</label>
                        <input class="form-control" type="text" name="video" value="{{$product->video}}">
                    </div>
                    <div class="mb-3">
                        <label for="">Slug</label>
                        <input class="form-control" type="text" name="slug" value="{{$product->slug}}">
                        @error('slug')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">Price</label>
                        <input class="form-control" type="text" name="price" value="{{$product->price}}">
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="">Product Thumbnail</label>
                            <input class="form-control" type="file" name="image">
                        </div>
                        <div class="col-md-6">
                            <img src="{{asset('uploads/product/'.$product->image)}}" alt="" height="350">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="">Meta Product Title</label>
                        <input class="form-control" type="text" name="meta_title" value="{{$product->meta_title}}">
                    </div>
                    <div class="mb-3">
                        <label for="">Meta Product Description</label>
                        <input class="form-control" type="text" name="meta_description" value="{{$product->meta_description}}">
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary" type="submit">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('custom_scripts')
    <script src="{{ asset('admin/js/jquery-3.4.1.slim.min.js') }}"></script>
    <script src="{{ asset('admin/js/summernote-lite.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#course_summernote').summernote({
                placeholder: 'Write long description for product that will be shown in frontend...',
                tabsize: 2,
                height: 250,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });
        });
    </script>
@endsection