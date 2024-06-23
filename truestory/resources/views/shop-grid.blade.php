@extends('frontlayout.frontlayout')
@section('content')
    <!-- Hero Section End -->

    <main class="main">
        	<div class="page-header text-center" style="background-image: url('img/banner/1.gif')">
        		<div class="container">
        			<h1 class="page-title" style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); color:white; font-size: xx-large; font-family: "Kosugi", sans-serif; ">SHOP</h1>
        		</div><!-- End .container -->
        	</div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active" aria-current="page"></li>




                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
                <div class="container">
                	<div class="row">
                		<div class="col-lg-9">
                			<div class="toolbox">
                				<div class="toolbox-left">
                					<div class="toolbox-info">
                						Showing <span>9 of 56</span> Products
                					</div><!-- End .toolbox-info -->
                				</div><!-- End .toolbox-left -->

                				<div class="toolbox-right">
                					<div class="toolbox-sort">
                						<label for="sortby">Sort by:</label>
                						<div class="select-custom">
											<select name="sortby" id="sortby" class="form-control">
												<option value="popularity" selected="selected">Most Popular</option>
												<option value="rating">Most Rated</option>
												<option value="date">Date</option>
											</select>
										</div>
                					</div><!-- End .toolbox-sort -->
                					
                				</div><!-- End .toolbox-right -->
                			</div><!-- End .toolbox -->

                            <div class="products mb-3">
                                <div class="row justify-content-center">
                                    <!-- End .col-sm-6 col-lg-4 col-xl-3 -->
                                    @foreach($categoryProducts as $product)
                                    <div class="col-6 col-md-4 col-lg-4 col-xl-3">
                                        <div class="product product-7 text-center">
                                            <figure class="product-media">
                                                <a href="{{url('product/'.$product['id'])}}"> 
                                                    
                                                    <?php $product_image_path = 'admin/product_image/smallimage/' . $product['product_image']; ?>
                                                      @if(!empty($product['product_image']) && file_exists($product_image_path))
                                                        <img src="{{ asset('admin/product_image/smallimage/' . $product['product_image']) }}" alt="">
                                                      @else
                                                        <img src="admin/img-not-found.png" alt="">
                                                      @endif 
                                                </a>

                                                <div class="product-action-vertical">
                                                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                                    
                                                </div><!-- End .product-action-vertical -->

                                                <div class="product-action">
                                                    <a href="{{url('product/'.$product['id'])}}" class="btn-product btn-cart"><span>View Details</span></a>
                                                </div><!-- End .product-action -->
                                            </figure><!-- End .product-media -->

                                            <div class="product-body">
                    
                                                   <h3 class="product-title"><a href="">{{$product['product_name']}}</a></h3><!-- End .product-title -->
                                                <div class="product-price">
                                                    <h5>₹ {{$product['product_price']}}</h5>
                                                </div><!-- End .product-price -->
                                                <div class="ratings-container">
                                                    <div class="ratings">
                                                        <div class="ratings-val" style="width: 0%;"></div><!-- End .ratings-val -->
                                                    </div><!-- End .ratings -->
                                                    <span class="ratings-text">( 0 Reviews )</span>
                                                </div><!-- End .rating-container -->
                                            </div><!-- End .product-body -->
                                        </div><!-- End .product -->
                                    </div><!-- End .col-sm-6 col-lg-4 col-xl-3 -->
                                    @endforeach
                                </div><!-- End .row -->
                            </div><!-- End .products -->


                		<div>{{ $categoryProducts->links() }}</div>
                		</div><!-- End .col-lg-9 -->
                		<aside class="col-lg-3 order-lg-first">
                			@include('frontlayout/filters')
                		</aside><!-- End .col-lg-3 -->
                	</div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .page-content -->
        </main>
    <!-- Product Section End -->
@endsection   