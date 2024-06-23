<?php use App\Models\Product; ?>

   
            
<!---------------------------------------------------------------------------------------------------------------------------->

        <main class="main">
        	<!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Wislist</a></li>
                       
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
            	<div class="cart">
	                <div class="container">
	                	<div class="row">
	                		<div class="col-lg-9">
	                			<table class="table table-cart table-mobile">
									<thead>
										<tr>
											<th>Product</th>
											<th>Price</th>
                                            <th>Description</th>
											<th>View/Delete</th>
										</tr>
									</thead>

									<tbody>
										@php $total_price = 0 @endphp
                                        @foreach($userWishlistItems as $item)
										
										<tr>
											<td class="product-col">
												<div class="product">
													<figure class="product-media">
														<a href="{{url('product/'.$item['product_id'])}}">
														
															<img src="{{asset('admin/product_image/smallimage/'.$item['product']['product_image'])}}" alt="Product image">
														</a>
													</figure>

													<h3 class="product-title">
														<a href="{{url('product/'.$item['product_id'])}}">{{$item['product']['product_name']}}</a>
													</h3>
												</div><!-- End .product -->
											</td>
											
											<td class="price-col">color: {{$item['product']['product_price']}}</td>

											
                                        
											
											<td class="remove-col">
												<button class="btn-remove"><i class="icon-close"></i></button>
												
											
											</td>
										</tr>

										@endforeach
										
									</tbody>
								</table><!-- End .table table-wishlist -->

	                			
	                		</div><!-- End .col-lg-9 -->
	                		
	                	</div><!-- End .row -->
	                </div><!-- End .container -->
                </div><!-- End .cart -->
            </div><!-- End .page-content -->
        </main>

   
    