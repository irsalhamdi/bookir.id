@extends('frontend.main_master')

@section('title')
    {{ $product->name }} | Product Detail
@endsection

@section('content')

    <style>
        .checked {
            color: orange;
        }
    </style>
        
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Clothing</a></li>
                    <li class='active'>{{ $product->name }}</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="body-content outer-top-xs">
        <div class='container'>
            <div class='row single-product'>

                <div class='col-md-3 sidebar'>
                    <div class="sidebar-module-container">

                        @include('frontend.common.hot_deals')

                    </div>
                </div>

                <div class='col-md-9'>

                    <div class="detail-block">
                        <div class="row  wow fadeInUp">
                        
                                <div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
                                    <div class="product-item-holder size-big single-product-gallery small-gallery">

                                        <div id="owl-single-product">

                                            @foreach ($images as $image)
                                                <div class="single-product-gallery-item" id="slide{{ $image->id }}">
                                                    <a data-lightbox="image-1" data-title="Gallery" href="{{ asset($image->name) }}">
                                                        <img class="img-responsive" alt="" src="{{ asset($image->name) }}" data-echo="{{ asset($image->name) }}" />
                                                    </a>
                                                </div>
                                            @endforeach


                                        </div>

                                        <div class="single-product-gallery-thumbs gallery-thumbs">
                                            <div id="owl-single-product-thumbnails">

                                                @foreach ($images as $image)
                                                    
                                                    <div class="item">
                                                        <a class="horizontal-thumb active" data-target="#owl-single-product" data-slide="1" href="#slide{{ $image->id }}">
                                                            <img class="img-responsive" width="85" alt="" src="{{ asset($image->name) }}" data-echo="{{ asset($image->name) }}" />
                                                        </a>
                                                    </div>

                                                @endforeach

                                            </div>
                                        </div>

                                    </div>
                                </div>    

                                @php 
                                    $reviewcount = App\Models\Review::where('product_id', $product->id)->where('status',1)->latest()->get();
                                    $avarage = App\Models\Review::where('product_id', $product->id)->where('status',1)->avg('rating');
                                @endphp

                                <div class='col-sm-6 col-md-7 product-info-block'>
                                    <div class="product-info">
                                        <h1 class="name" id="name">{{ $product->name }}</h1>
                                        
                                        <div class="rating-reviews m-t-20">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    @if($avarage == 0)
                                                        No Rating Yet 
                                                    @elseif($avarage == 1 || $avarage < 2)
                                                        <span class="fa fa-star checked"></span>
                                                        <span class="fa fa-star"></span>
                                                        <span class="fa fa-star"></span>
                                                        <span class="fa fa-star"></span>
                                                        <span class="fa fa-star"></span>
                                                    @elseif($avarage == 2 || $avarage < 3)
                                                        <span class="fa fa-star checked"></span>
                                                        <span class="fa fa-star checked"></span>
                                                        <span class="fa fa-star"></span>
                                                        <span class="fa fa-star"></span>
                                                        <span class="fa fa-star"></span>
                                                    @elseif($avarage == 3 || $avarage < 4)
                                                        <span class="fa fa-star checked"></span>
                                                        <span class="fa fa-star checked"></span>
                                                        <span class="fa fa-star checked"></span>
                                                        <span class="fa fa-star"></span>
                                                        <span class="fa fa-star"></span>
                                                    @elseif($avarage == 4 || $avarage < 5)
                                                        <span class="fa fa-star checked"></span>
                                                        <span class="fa fa-star checked"></span>
                                                        <span class="fa fa-star checked"></span>
                                                        <span class="fa fa-star checked"></span>
                                                        <span class="fa fa-star"></span>
                                                    @elseif($avarage == 5 || $avarage < 5)
                                                        <span class="fa fa-star checked"></span>
                                                        <span class="fa fa-star checked"></span>
                                                        <span class="fa fa-star checked"></span>
                                                        <span class="fa fa-star checked"></span>
                                                        <span class="fa fa-star checked"></span>
                                                    @endif
                                                </div>
                                                <div class="col-sm-8">
                                                    <div class="reviews">
                                                        <a href="#" class="lnk">( {{ count($reviewcount) }} Reviews) </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="stock-container info-container m-t-10">
                                            <div class="row">
                                                <div class="col-sm-2">
                                                    <div class="stock-box">
                                                        <span class="label">Availability :</span>
                                                    </div>	
                                                </div>
                                                <div class="col-sm-9">
                                                    <div class="stock-box">
                                                        <span class="value">In Stock</span>
                                                    </div>	
                                                </div>
                                            </div>	
                                        </div>

                                        <div class="description-container m-t-20">
                                            {!! $product->short_description !!}
                                        </div>

                                        <div class="price-container info-container m-t-20">
                                            <div class="row">

                                                <div class="col-sm-6">
                                                    <div class="price-box">
                                                        @if ($product->discount == NULL)
                                                            <span class="price">${{ $product->price }}</span>                                                
                                                        @else    
                                                            <span class="price">${{ $product->discount }}</span>
                                                            <span class="price-strike">${{ $product->price }}</span>                                                
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="favorite-button m-t-10">
                                                        <a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Wishlist" href="#">
                                                            <i class="fa fa-heart"></i>
                                                        </a>
                                                        <a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Add to Compare" href="#">
                                                        <i class="fa fa-signal"></i>
                                                        </a>
                                                        <a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="E-mail" href="#">
                                                            <i class="fa fa-envelope"></i>
                                                        </a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="info-title control-label">Choose Color</label>
                                                    <select class="form-control unicase-form-control selectpicker" id="color">
                                                        <option selected disabled>--Choose Color--</option>
                                                            @foreach ($colors as $color)
                                                                <option value="{{ $color }}">{{ ucwords($color) }}</option>
                                                            @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">

                                                    @if ($product->size == NULL)

                                                    @else    

                                                    <label class="info-title control-label">Choose Size</label>
                                                    <select class="form-control unicase-form-control selectpicker" id="size">                                             <option selected disabled>--Choose Size--</option>
                                                            @foreach ($sizes as $size)
                                                                <option value="{{ $size }}">{{ ucwords($size) }}</option>
                                                            @endforeach
                                                    </select>

                                                    @endif

                                                </div>
                                            </div>
                                        </div>

                                        <div class="quantity-container info-container">
                                            <div class="row">
                                                
                                                <div class="col-sm-2">
                                                    <span class="label">Qty :</span>
                                                </div>
                                                
                                                <div class="col-sm-2">
                                                    <div class="cart-quantity">
                                                        <div class="quant-input">
                                                            <div class="arrows">
                                                            <div class="arrow plus gradient"><span class="ir"><i class="icon fa fa-sort-asc"></i></span></div>
                                                            <div class="arrow minus gradient"><span class="ir"><i class="icon fa fa-sort-desc"></i></span></div>
                                                            </div>
                                                            <input type="text" id="qty" value="1" min="1">
                                                    </div>
                                                    </div>
                                                </div>

                                                <input type="hidden" id="product_id" value="{{ $product->id }}" min="1">

                                                <div class="col-sm-7">
                                                    <button type="submit" onclick="addToCart()" class="btn btn-primary">
                                                        <i class="fa fa-shopping-cart inner-right-vs"></i> 
                                                        ADD TO CART
                                                    </button>
                                                </div>

                                            </div>
                                        </div>
                                        
                                        <div class="addthis_inline_share_toolbox"></div>
                
                                    </div>
                                </div>
                        </div>
                    </div>
                        
                    <div class="product-tabs inner-bottom-xs  wow fadeInUp">

                        <div class="row">

                            <div class="col-sm-3">
                                <ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
                                    <li class="active"><a data-toggle="tab" href="#description">DESCRIPTION</a></li>
                                    <li><a data-toggle="tab" href="#review">REVIEW</a></li>
                                </ul>
                            </div>

                            <div class="col-sm-9">
                                <div class="tab-content">

                                    <div id="description" class="tab-pane in active">
                                        <div class="product-tab">
                                            <p class="text">
                                                {!! $product->description !!}
                                            </p>
                                        </div>	
                                    </div>

                                    <div id="review" class="tab-pane">
                                        <div class="product-tab">
                                                                                        
                                            <div class="product-reviews">

                                                <h4 class="title">Customer Reviews</h4>

                                                <div class="reviews">
                                                    @php
                                                        $reviews = App\Models\Review::where('product_id',$product->id)->latest()->limit(5)->get();
                                                    @endphp			

                                                    @foreach($reviews as $item)
                                                            @if($item->status == 0)
                                                            @else
                                                                <div class="review">
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <img style="border-radius: 50%" src="{{ (!empty($item->user->profile_photo_path)) ? url('upload/user_images/' .$item->user->profile_photo_path):url('upload/default.jpg') }}" width="40px;" height="40px;"><b> {{ $item->user->name }}</b>
                                                                            @if($item->rating == NULL)

                                                                            @elseif($item->rating == 1)
                                                                                <span class="fa fa-star checked"></span>
                                                                                <span class="fa fa-star"></span>
                                                                                <span class="fa fa-star"></span>
                                                                                <span class="fa fa-star"></span>
                                                                                <span class="fa fa-star"></span>
                                                                            @elseif($item->rating == 2)
                                                                                <span class="fa fa-star checked"></span>
                                                                                <span class="fa fa-star checked"></span>
                                                                                <span class="fa fa-star"></span>
                                                                                <span class="fa fa-star"></span>
                                                                                <span class="fa fa-star"></span>

                                                                            @elseif($item->rating == 3)
                                                                                <span class="fa fa-star checked"></span>
                                                                                <span class="fa fa-star checked"></span>
                                                                                <span class="fa fa-star checked"></span>
                                                                                <span class="fa fa-star"></span>
                                                                                <span class="fa fa-star"></span>

                                                                            @elseif($item->rating == 4)
                                                                                <span class="fa fa-star checked"></span>
                                                                                <span class="fa fa-star checked"></span>
                                                                                <span class="fa fa-star checked"></span>
                                                                                <span class="fa fa-star checked"></span>
                                                                                <span class="fa fa-star"></span>
                                                                            @elseif($item->rating == 5)
                                                                                <span class="fa fa-star checked"></span>
                                                                                <span class="fa fa-star checked"></span>
                                                                                <span class="fa fa-star checked"></span>
                                                                                <span class="fa fa-star checked"></span>
                                                                                <span class="fa fa-star checked"></span>
                                                                            @endif

                                                                        </div>  
                                                                        <div class="col-md-6">
                                                                        </div>			
                                                                    </div>
                                                                    <div class="review-title">
                                                                        <span class="summary">
                                                                            {{ $item->summary }}
                                                                        </span>
                                                                        <span class="date">
                                                                            <i class="fa fa-calendar"></i>
                                                                        <span> 
                                                                            {{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }} 
                                                                        </span>
                                                                    </div>
                                                                    <div class="text">"
                                                                        {{ $item->comment }}"
                                                                    </div>
                                                                </div>
                                                            @endif
                                                    @endforeach
                                                </div>
                                            </div>    
                                            <div class="product-add-review">
                                                <h4 class="title">Write your own review</h4>
                                                <div class="review-table">
                                                </div>
                                                    
                                                <div class="review-form">
                                                    @guest
                                                        <p> 
                                                            <b> For Add Product Review. You Need to Login First 
                                                                <a href="{{ route('login') }}">
                                                                    Login Here
                                                                </a> 
                                                            </b> 
                                                        </p>
                                                    @else    
                                                        <div class="form-container">
                                                            <form role="form" class="cnt-form" method="post" action="{{ route('add.review') }}">
                                                                @csrf
                                                                <input type="hidden" name="product_id" value="{{ $product->id }}">  

                                                                <table class="table">	
                                                                    <thead>
                                                                        <tr>
                                                                            <th class="cell-label">&nbsp;</th>
                                                                            <th>1 star</th>
                                                                            <th>2 stars</th>
                                                                            <th>3 stars</th>
                                                                            <th>4 stars</th>
                                                                            <th>5 stars</th>
                                                                        </tr>
                                                                    </thead>	
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="cell-label">Quality</td>
                                                                            <td><input type="radio" name="quality" class="radio" value="1"></td>
                                                                            <td><input type="radio" name="quality" class="radio" value="2"></td>
                                                                            <td><input type="radio" name="quality" class="radio" value="3"></td>
                                                                            <td><input type="radio" name="quality" class="radio" value="4"></td>
                                                                            <td><input type="radio" name="quality" class="radio" value="5"></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                                
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label for="exampleInputSummary">Summary <span class="astk">*</span></label>
                                                                            <input type="text" name="summary" class="form-control txt" id="exampleInputSummary" placeholder="">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="exampleInputReview">Review <span class="astk">*</span></label>
                                                                        <textarea class="form-control txt txt-review" name="comment" id="exampleInputReview" rows="4" placeholder=""></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                    
                                                                <div class="action text-right">
                                                                    <button type="submit" class="btn btn-primary btn-upper">SUBMIT REVIEW</button>
                                                                </div>

                                                            </form>
                                                        </div>
                                                    @endguest
                                                </div>

                                            </div>										
                                                
                                        </div>
                                    </div>

                                    </div>
                                </div>
                            </div>

                        </div>

                        <section class="section featured-product wow fadeInUp">
                            <h3 class="section-title">upsell products</h3>
                            <div class="owl-carousel home-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs">
                                    
                                @foreach ($relates as $relate)
                                    
                                    <div class="item item-carousel">
                                        <div class="products">
                                            
                                            <div class="product">		

                                                <div class="product-image">

                                                    <div class="image">
                                                        <a href="{{ route('product.details', $relate->id) }}">
                                                            <img  src="{{ asset($relate->thumbnail) }}" >
                                                        </a>
                                                    </div>	

                                                    <div class="tag sale"><span>sale</span></div>  

                                                </div>
                                                
                                                <div class="product-info text-left">

                                                    <h3 class="name">
                                                        <a href="{{ route('product.details', $relate->id) }}">{{ $relate->name }}</a>
                                                    </h3>
                                                    <div class="rating rateit-small"></div>
                                                    <div class="description"></div>

                                                    @if ($relate->discount == NULL)
                                                        <div class="product-price">	
                                                            <span class="price">
                                                                ${{ relate->price }}
                                                            </span>
                                                        </div>
                                                    @else
                                                        <div class="product-price">	
                                                            <span class="price">
                                                                ${{ $relate->discount }}
                                                            </span>
                                                            <span class="price-before-discount">
                                                                $ {{ $relate->price }}
                                                            </span>
                                                        </div>
                                                    @endif

                                                    
                                                </div>

                                                <div class="cart clearfix animate-effect">
                                                        <div class="action">
                                                            <ul class="list-unstyled">
                                                                <li class="add-cart-button btn-group">
                                                                    <button class="btn btn-primary icon" data-toggle="dropdown" type="button">
                                                                        <i class="fa fa-shopping-cart"></i>													
                                                                    </button>
                                                                    <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                                                                            
                                                                </li>
                                                            
                                                                <li class="lnk wishlist">
                                                                    <a class="add-to-cart" href="detail.html" title="Wishlist">
                                                                        <i class="icon fa fa-heart"></i>
                                                                    </a>
                                                                </li>

                                                                <li class="lnk">
                                                                    <a class="add-to-cart" href="detail.html" title="Compare">
                                                                        <i class="fa fa-signal"></i>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                </div>

                                            </div>
                                
                                        </div>
                                    </div>

                                @endforeach

                            </div>
                        </section>
                    
                    </div>

                    <div class="clearfix"></div>

                </div>
                
            </div>    
        </div>
    </div>
    
@endsection

<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-61b6c1917fce2298"></script>
