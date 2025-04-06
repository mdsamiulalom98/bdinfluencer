@extends('frontEnd.layouts.master') 
@section('title', 'All Products') 
@push('css')
<link rel="stylesheet" href="{{asset('public/frontEnd/css/jquery-ui.css')}}" />
@endpush 
@push('seo')
<meta name="app-url" content="{{route('home')}}" />
<meta name="robots" content="index, follow" />
<meta name="description" content="" />
<meta name="keywords" content="" />

<!-- Twitter Card data -->
<meta name="twitter:card" content="product" />
<meta name="twitter:site" content="" />
<meta name="twitter:title" content="" />
<meta name="twitter:description" content="" />
<meta name="twitter:creator" content="Kenakatar" />
<meta property="og:url" content="{{route('home')}}" />
<meta name="twitter:image" content="" />

<!-- Open Graph data -->
<meta property="og:title" content="" />
<meta property="og:type" content="product" />
<meta property="og:url" content="" />
<meta property="og:image" content="" />
<meta property="og:description" content="" />
<meta property="og:site_name" content="" />
@endpush 
@section('content')
<section class="clearfix page-header-title">
    <div class="overlay">
       <h1 class="page-title">Product</h1>
    </div>
 </section>


 <section class="product-page py-55 pt-0 overflow-hidden">
    <div class="container">

       <div class="row">
          <div class="col-12">
            <form  class="product-search-form d-flex align-items-center">
                 <select name="category" id="">
                   <option value="">---Select Category---</option>
                   @foreach($menucategories as $category)
                   <option value="{{ $category->id }}" @if(request()->get('category') == $category->id) selected @endif>{{ $category->name }}</option>
                   @endforeach
                </select>
                <input type="text" name="keyword" value="{{ request()->keyword }}" placeholder="search keyword">
                <input type="submit" value="Search">
             </form>
          </div>
       </div>
    @if ($products->count() > 0)
       <div class="row" style="transform: translate3d(0px, 0px, 0px);">
             @foreach($products as $key=>$value)
              <div class="col-md-6 col-lg-4 col-xl-3 mb-3">
                 <div class="productCard">
                    <div class="productCard_sliderSpace">
                        <div class="radius-lg" style="background: rgb(253, 241, 206);">
                            <div class="productCard_top d-flex align-item-start justify-content-center">
                                <div class="centerImg">
                                    <a href="{{ route('product',$value->slug) }}">
                                        <img src="{{ asset($value->image ? $value->image->image : '') }}" alt="{{$value->name}}" class="img-fluid" />
                                    </a>
                                </div>
                                <img src="/IconLike-9bG.svg" class="WishlistButton-productActionIcon-d5T" alt="" />
                            </div>
                            <div class="productCard_center text-center">
                                <div class="productCard-productReviewSpace-iHv">
                                    <div class="review-star">
                                        @php
                                            // Assuming $value->reviews is the collection of reviews for the current item
                                            $reviews = $value->reviews;
                                            $averageRating = $reviews->isEmpty() ? 0 : $reviews->avg('ratting');
                                    
                                            $filledStars = floor($averageRating);
                                            $emptyStars = 5 - $filledStars;
                                        @endphp
                                    
                                        @if ($averageRating >= 0 && $averageRating <= 5)
                                            @for ($i = 1; $i <= $filledStars; $i++)
                                                <i class="fas fa-star"></i>
                                            @endfor
                                    
                                            @if (is_int($averageRating)) 
                                                @for ($i = 1; $i <= $emptyStars; $i++)
                                                    <i class="far fa-star"></i>
                                                @endfor
                                            @else
                                                <i class="far fa-star-half-alt"></i>
                                                @for ($i = 1; $i < $emptyStars; $i++)
                                                    <i class="far fa-star"></i>
                                                @endfor
                                            @endif
                                    
                                            <span>{{ round($averageRating, 1) }}/5</span>
                                        @else
                                            <span>Invalid rating range</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="DscountOfr"></div>
                                <ul class="d-flex list-unstyled justify-content-center mb-0 category">
                                    <li><a href="{{ route('category', $value->category->slug) }}">{{ $value->category->name }}</a></li>
                                    <li>{{ $value->size->size->sizeName }}</li>
                                    <li>@if($value->gender == 1) Male @elseif($value->gender == 2) Female @elseif($value->gender == 3) Unisex @else NA @endif </li>
                                </ul>

                                <h3 class="product-title">{{Str::limit($value->name,80)}}</h3>
                                <span class="price">AED {{ $value->new_price}}</span>
                            </div>
                            <div class="productCard_bottom">
                                <div class="viewProduct">
                                    <ul class="list-unstyled d-flex justify-content-between mb-0 px-3 pb-3">
                                        @foreach ($value->flavors as $flavor)
                                        <li class="text-center">
                                            <img src="{{ asset($flavor->image) }}" class="img-fluid" alt="rose-img" />
                                            <span class="fz-12">{{ $flavor->flavorName }}</span>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>

                                <div class="addProduct" style="background: rgb(253, 241, 206);">
                                    <ul class="d-flex list-unstyled">
                                        <li>
                                            <form action="{{route('cart.store')}}" method="POST">
                                                @csrf
                                                <input type="hidden" name="id" value="{{$value->id}}" />
                                                <input type="hidden" name="qty" value="1" />
                                                <button type="submit" class="btn btn-theme-outline mr-2">Buy Now</button>
                                            </form>
                                        </li>
                                        <li>
                                            <a data-id="{{$value->id}}" class="addcartbutton btn btn-theme">Add to Cart</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
              @endforeach
                   

       </div>
       <div class="row my-4">
          <div class="col-12">
             <nav class="d-flex justify-content-center align-items center">
                <ul class="pagination">
                    {{$products->links('pagination::bootstrap-4')}}
                   {{-- <li class="page-item">
                      <a class="page-link" href="#">
                         <i class="fa-solid fa-chevron-left"></i>
                      </a>
                   </li>
                   <li class="page-item">
                      <a class="page-link" href="#">1</a>
                   </li>
                   <li class="page-item">
                      <a class="page-link" href="#">2</a>
                   </li>
                   <li class="page-item">
                      <a class="page-link" href="#">3</a>
                   </li>
                   <li class="page-item">
                      <a class="page-link" href="#">
                         <i class="fa-solid fa-chevron-right"></i>
                      </a>
                   </li> --}}
                </ul>
             </nav>
          </div>
       </div>
    @else
        <div class="row">
            <div class="col-sm-12">
                <div class="no-product-image">
                    <img src="{{ asset('public/frontEnd/images/no-product.png') }}" alt="">
                </div>
            </div>
        </div>
        @endif
    </div>
 </section>

@endsection
@push('script')
<script>
    $(".sort").change(function(){
       $('#loading').show();
       $(".sort-form").submit();
    })
</script>
@endpush