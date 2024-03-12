 @extends('layouts.client.master')
 @section('title', 'ECommerce')
 @section('content')
     <!-- Categories Section Begin -->
     <section class="categories">
         <div class="container">
             <div class="row">
                 <div class="categories__slider owl-carousel">
                    @foreach ($featured_categories as $item)
                     <div class="col-lg-3">
                         <div class="categories__item set-bg" data-setbg="{{asset('uploads/category/'.$item->category->image)}}">
                             <h5><a href="{{ route('shop.cart.add', $item->category->id) }}">{{$item->category->title}}</a></h5>
                         </div>
                     </div>
                    @endforeach
                     
                 </div>
             </div>
         </div>
     </section>
     <!-- Categories Section End -->

     <!-- Featured Section Begin -->
     <section class="featured spad">
         <div class="container">
             <div class="row">
                 <div class="col-lg-12">
                     <div class="section-title">
                         <h2>Featured Product</h2>
                     </div>
                     {{-- <div class="featured__controls">
                         <ul>
                             <li class="active" data-filter="*">All</li>
                             <li data-filter=".oranges">Oranges</li>
                             <li data-filter=".fresh-meat">Fresh Meat</li>
                             <li data-filter=".vegetables">Vegetables</li>
                             <li data-filter=".fastfood">Fastfood</li>
                         </ul>
                     </div> --}}
                 </div>
             </div>
             <div class="row featured__filter">
                @foreach ($featured_products as $item)
                    
                 <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                     <div class="featured__item">
                         <div class="featured__item__pic set-bg" data-setbg="{{asset('uploads/product/'.$item->product->image)}}">
                             <ul class="featured__item__pic__hover">
                                 <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                 <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                 <li><a href="{{ route('shop.cart.add', $item->product->id) }}"><i class="fa fa-shopping-cart"></i></a></li>
                             </ul>
                         </div>
                         <div class="featured__item__text">
                             <h6><a href="#">{{$item->product->title}}</a></h6>
                             <h5>{{$item->product->price}}</h5>
                         </div>
                     </div>
                 </div>
                @endforeach

             </div>
         </div>
     </section>
     <!-- Featured Section End -->


 @endsection
