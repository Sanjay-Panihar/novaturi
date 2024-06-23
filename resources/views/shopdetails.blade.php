<?php use App\Models\Product; 
use App\Models\Wishlist; ?>

@extends('frontlayout.frontlayout')
@section('content')

<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
        <div class="container d-flex align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Products</a></li>
                <li class="breadcrumb-item active" aria-current="page">Default</li>
            </ol>


        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="container">
            <div class="product-details-top">
                <div class="row">
                    <div class="col-md-6">
                        <div class="product-gallery product-gallery-vertical">
                            <div class="row">
                                <figure class="product-main-image">
                                    <img id="product-zoom"
                                        src="{{ asset('admin/product_image/largeimage/'.$productDetails['product_image']) }}"
                                        data-zoom-image="{{ asset('admin/product_image/largeimage/'.$productDetails['product_image']) }}"
                                        alt="product image">

                                    <a href="#" id="btn-product-gallery" class="btn-product-gallery">
                                        <i class="icon-arrows"></i>
                                    </a>
                                </figure><!-- End .product-main-image -->

                                <div        id="product-zoom-gallery" class="product-image-gallery">
                                    <a class="product-gallery-item active" href="#"
                                        data-image="{{ asset('admin/product_image/largeimage/'.$productDetails['product_image']) }}"
                                        data-zoom-image="{{ asset('admin/product_image/largeimage/'.$productDetails['product_image']) }}">
                                        <img src="{{ asset('admin/product_image/largeimage/'.$productDetails['product_image']) }}"
                                            alt="product side">
                                    </a>
                                    @foreach($productDetails['images'] as $image)
                                    <a class="product-gallery-item" href="#"
                                        data-image="{{ asset('admin/product_image/smallimage/' . $image['image']) }}"
                                        data-zoom-image="{{ asset('admin/product_image/smallimage/' . $image['image']) }}">
                                        <img src="{{ asset('admin/product_image/smallimage/' . $image['image']) }}"
                                            alt="product cross">
                                    </a>
                                    @endforeach


                                </div><!-- End .product-image-gallery -->
                            </div><!-- End .row -->
                        </div><!-- End .product-gallery -->
                    </div><!-- End .col-md-6 -->

                    <div class="col-md-6">
                        @if(Session::has('error_message'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            <div> Error:
                                <?php echo Session::get('error_message'); ?>
                            </div>
                        </div>
                        @endif
                        @if(Session::has('success_message'))
                        <div class="alert alert-primary d-flex align-items-center" role="alert">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16"
                                role="img" aria-label="Warning:">
                                <path
                                    d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                            </svg>
                            <div> Success:
                                <?php echo Session::get('success_message'); ?>
                            </div>
                        </div>
                        @endif
                        <div class="product-details">
                            <h1 class="product-title">{{$productDetails['product_name']}}</h1>
                            <!-- End .product-title -->

                            <div class="ratings-container">
                                <div class="ratings">
                                    <div class="ratings-val" style="width: 80%;"></div><!-- End .ratings-val -->
                                </div><!-- End .ratings -->
                                <a class="ratings-text" href="#product-review-link" id="review-link">( 2 Reviews )</a>
                            </div><!-- End .rating-container -->

                            <div class="product-price">
                                <?php $getDiscountPrice = Product::getDiscountPrice($productDetails['id']); ?>

                                <span class="getAttributePrice">
                                    @if($getDiscountPrice>0)
                                    <div class="price">₹ {{$getDiscountPrice}}</div>
                                    <div class="Original-price">
                                        <label>Original Price: ₹ {{$productDetails['product_price']}}</label>

                                    </div>
                                    @else
                                    <div class="price">
                                        Rs:{{$productDetails['product_price']}}

                                    </div>

                                    @endif

                                </span>
                            </div><!-- End .product-price -->

                            <div class="product-content">
                                <p style="    margin: 20px; text-align: center;">{{$productDetails['shortdescription']}}</p>
                            </div><!-- End .product-content -->
                            @if(count($groupProducts)> 0)
                            <div class="details-filter-row details-row-size">
                                <label>Color:</label>
                                <div class="product-nav product-nav-thumbs">
                                    @foreach($groupProducts as $product)
                                    <a href="{{url('product/'.$product['id'])}}">
                                        <img src="{{ asset('admin/product_image/smallimage/'.$product['product_image']) }}"
                                            alt="product desc">
                                    </a>
                                    @endforeach
                                </div><!-- End .product-nav -->
                            </div><!-- End .details-filter-row -->
                            @endif

                            <!--<form action="{{ url('cart/add')}}" class="post-form" method="post">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $productDetails['id']}}">


                                <div class="details-filter-row details-row-size">
                                    <label for="size">Size:</label>
                                    <div class="select-custom">
                                        <select name="size" id="getPrice" product-id="{{$productDetails['id']}}"
                                            class="form-control">
                                            <option value="#" selected="selected">Select a size</option>
                                            @foreach($productDetails['attributes'] as $attribute)
                                            <option value="{{$attribute['Size']}}">{{$attribute['Size'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    
                                    <label for="qty">Qty:</label>
                                    <div class="product-details-quantity">
                                        <input type="number" id="qty" class="form-control" name="quantity" value="1"
                                            min="1" max="10" step="1" data-decimals="0" required>
                                    </div>


                                    
                                </div>

                               

                                <div class="product-details-action">

                                    <button class=" btn-product btn-cart " style=" border: none;">add to cart</button>


                                    <div class="details-action-wrapper">

                                    </div>
                                </div>
                            </form>-->
                            <!--<div class="product-details-action " style="margin-right: 210px;margin-left: 170px;">
                                @php $countWishlist = 0 @endphp
                                @if(Auth::check())
                                @php $countWishlist = Wishlist::countWishlist($productDetails['id'])
                                @endphp
                                <button class=" btn-product updateWishlist" style=" background: linear-gradient(180deg, rgba(144,206,196,1) 0%, rgba(225,231,240,1) 50%); border: none;"
                                    data-product_id="{{$productDetails['id']}}">
                                    Wishlist <i
                                        class="@if($countWishlist>0) bi bi-heart-fill @else  bi bi-heart  @endif"></i>
                                </button>
                                @else
                                <button class=" userLogin btn-product" style="background: linear-gradient(180deg, rgba(144,206,196,1) 0%, rgba(225,231,240,1) 50%); border: none; color: #818181;
                                    font-weight: 500;">
                                    <i class="bi bi-heart" style="margin-right:5px;"></i>Wishlist
                                </button>
                                @endif

                                
                            </div>-->
                            
                            <div class="product-details-action " style="margin-right: 210px;margin-left: 170px;">
                                
                                <button class=" btn-product updateWishlist" style=" background: linear-gradient(180deg, rgba(144,206,196,1) 0%, rgba(225,231,240,1) 50%); border: none;"
                                    data-product_id="">
                                    Call Vendor <i
                                        class="bi bi-heart-fill"></i>
                                </button>
                                
                                
                            </div>
                            
                            <div class="product-details-footer">
                                <div class="product-cat">
                                    <li><b>Availability</b>
                                        @if($totalStock>0)
                                        <span>In Stock</span>
                                        @else
                                        <span style="color:red;">Out Of Stock</span>
                                        @endif
                                    </li>
                                    <li><b>Stock Left</b>
                                        @if($totalStock>0)
                                        <span style="color:green;">{{$totalStock}} left</span>

                                        @endif
                                    </li>
                                </div>


                            </div>
                        </div>
                    </div>
                </div><!-- End .row -->
            </div><!-- End .product-details-top -->

            <div class="product-details-tab">
                <ul class="nav nav-pills justify-content-center" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="product-desc-link" data-toggle="tab" href="#product-desc-tab"
                            role="tab" aria-controls="product-desc-tab" aria-selected="true">Description</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="product-info-link" data-toggle="tab" href="#product-info-tab" role="tab"
                            aria-controls="product-info-tab" aria-selected="false">Additional information</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="product-shipping-link" data-toggle="tab" href="#product-shipping-tab"
                            role="tab" aria-controls="product-shipping-tab" aria-selected="false">Return & Refund</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="product-review-link" data-toggle="tab" href="#product-review-tab"
                            role="tab" aria-controls="product-review-tab" aria-selected="false">Reviews (2)</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="product-desc-tab" role="tabpanel"
                        aria-labelledby="product-desc-link">
                        <div class="product-desc-content">
                            <h3>Product Information</h3>
                            <p>{{$productDetails['description']}} </p>
                            

                            
                        </div><!-- End .product-desc-content -->
                    </div><!-- .End .tab-pane -->
                    <div class="tab-pane fade" id="product-info-tab" role="tabpanel"
                        aria-labelledby="product-info-link">
                        <div class="product-desc-content">
                            <h3>Product Weight</h3>
                            <p>{{$productDetails['product_weight']}} </p>

                            <h3></h3>
                            <ul>
                                <li></li>
                                
                            </ul>
                        </div><!-- End .product-desc-content -->
                    </div><!-- .End .tab-pane -->
                    <div class="tab-pane fade" id="product-shipping-tab" role="tabpanel"
                        aria-labelledby="product-shipping-link">
                        <div class="product-desc-content">
                            <h3>Delivery & returns</h3>
                            <p>{{$productDetails['refund_return']}}</p>
                        </div><!-- End .product-desc-content -->
                    </div><!-- .End .tab-pane -->
                    <div class="tab-pane fade" id="product-review-tab" role="tabpanel"
                        aria-labelledby="product-review-link">
                        <div class="reviews">
                            <h3>Reviews (2)</h3>
                            <div class="review">
                                <div class="row no-gutters">
                                    <div class="col-auto">
                                        <h4><a href="#">Samanta J.</a></h4>
                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 80%;"></div>
                                                <!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                        </div><!-- End .rating-container -->
                                        <span class="review-date">6 days ago</span>
                                    </div><!-- End .col -->
                                    <div class="col">
                                        <h4>Good, perfect size</h4>

                                        <div class="review-content">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus cum
                                                dolores assumenda asperiores facilis porro reprehenderit animi culpa
                                                atque blanditiis commodi perspiciatis doloremque, possimus, explicabo,
                                                autem fugit beatae quae voluptas!</p>
                                        </div><!-- End .review-content -->

                                        <div class="review-action">
                                            <a href="#"><i class="icon-thumbs-up"></i>Helpful (2)</a>
                                            <a href="#"><i class="icon-thumbs-down"></i>Unhelpful (0)</a>
                                        </div><!-- End .review-action -->
                                    </div><!-- End .col-auto -->
                                </div><!-- End .row -->
                            </div><!-- End .review -->

                            <div class="review">
                                <div class="row no-gutters">
                                    <div class="col-auto">
                                        <h4><a href="#">John Doe</a></h4>
                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 100%;"></div>
                                                <!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                        </div><!-- End .rating-container -->
                                        <span class="review-date">5 days ago</span>
                                    </div><!-- End .col -->
                                    <div class="col">
                                        <h4>Very good</h4>

                                        <div class="review-content">
                                            <p>Sed, molestias, tempore? Ex dolor esse iure hic veniam laborum blanditiis
                                                laudantium iste amet. Cum non voluptate eos enim, ab cumque nam, modi,
                                                quas iure illum repellendus, blanditiis perspiciatis beatae!</p>
                                        </div><!-- End .review-content -->

                                        <div class="review-action">
                                            <a href="#"><i class="icon-thumbs-up"></i>Helpful (0)</a>
                                            <a href="#"><i class="icon-thumbs-down"></i>Unhelpful (0)</a>
                                        </div><!-- End .review-action -->
                                    </div><!-- End .col-auto -->
                                </div><!-- End .row -->
                            </div><!-- End .review -->
                        </div><!-- End .reviews -->
                    </div><!-- .End .tab-pane -->
                </div><!-- End .tab-content -->
            </div><!-- End .product-details-tab -->

            
        </div><!-- End .container -->
    </div><!-- End .page-content -->
</main>






@endsection