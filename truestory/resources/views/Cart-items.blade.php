<?php use App\Models\Product; ?>

   
            
<!---------------------------------------------------------------------------------------------------------------------------->

        <main class="main">
        	<!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
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
                                            <th>Color</th>
											<th>Quantity</th>
											<th>Total</th>
											<th></th>
										</tr>
									</thead>

									<tbody>
										@php $total_price = 0 @endphp
                                        @foreach($getCartItems as $item)
										<?php  $getDiscountAttributePrice = Product::getDiscountAttributePrice($item['product_id'],$item['size']);?>
										<tr>
											<td class="product-col">
												<div class="product">
													<figure class="product-media">
														<a href="{{url('product/'.$item['product_id'])}}">
														
															<img src="{{asset('admin/product_image/smallimage/'.$item['product']['product_image'])}}" alt="Product image">
														</a>
													</figure>

													<h3 class="product-title">
														<a href="#">{{$item['product']['product_name']}}</a>
													</h3><br>
                                                    
													<br>
                                                    <h3 class="product-title">
														<a href="#">Size: {{$item['size']}}</a>
													</h3><!-- End .product-title -->
												</div><!-- End .product -->
											</td>
											<td class="price-col">
											    @if($getDiscountAttributePrice['discount']>0)
                                                    <div class="price">
                                                        Rs.{{$getDiscountAttributePrice['final_price']}}
                                                    </div>
                                                    <div class="Original-price">
                                                        <label >Original Price: Rs.{{$getDiscountAttributePrice['product_price']}}</label>
                                              
                                                    </div>
                                                @else
                                                    <div class="price">
													   Rs.{{$getDiscountAttributePrice['final_price']}}
                                              
                                                    </div>

                                                @endif  
											
											</td>
											<td class="price-col">color: {{$item['product']['product_color']}}</td>
                                            
											<td class="quantity-col">
                                                <div class="cart-product-quantity">
                                                    <input type="number" class="form-control" value="1" min="1" max="10" step="1" data-decimals="0" required>
                                                </div><!-- End .cart-product-quantity -->
                                            </td>
											<td class="total-col">
												
												
                                                    <div class="price">
                                                        Rs.{{$getDiscountAttributePrice['final_price']*$item['quantity']}}
                                                    </div>
                                                     
											
											</td>
                                           <td class="remove-col"><button class="btn-remove deleteCartItem"  data-cartid="{{$item['id']}}"><i class="icon-close"></i></button></td>
										</tr>
										@php $total_price = $total_price + ($getDiscountAttributePrice['final_price']*$item['quantity']) @endphp
										@endforeach
									</tbody>
								</table><!-- End .table table-wishlist -->

	                			<div class="cart-bottom">
			            			

			            			<a href="#" class="btn btn-outline-dark-2"><span>UPDATE CART</span><i class="icon-refresh"></i></a>
		            			</div><!-- End .cart-bottom -->
	                		</div><!-- End .col-lg-9 -->
	                		<aside class="col-lg-3">
	                			<div class="summary summary-cart">
	                				<h3 class="summary-title">Cart Total</h3><!-- End .summary-title -->
									
	                				<table class="table table-summary">
	                					<tbody>
	                						<tr class="summary-subtotal">
	                							<td>Subtotal:</td>
	                							<td>Rs:{{ $total_price }}</td>
	                						</tr><!-- End .summary-subtotal -->
	                						

	                						<tr class="summary-total">
	                							<td>Total:</td>
	                							<td>Rs:{{ $total_price }}</td>
	                						</tr><!-- End .summary-total -->
	                					</tbody>
	                				</table><!-- End .table table-summary -->
									
	                				<a href="{{ url('checkout') }}" class="btn btn-outline-primary-2 btn-order btn-block">PROCEED TO CHECKOUT</a>
	                			</div><!-- End .summary -->

		            			<a href="/" class="btn btn-outline-dark-2 btn-block mb-3"><span>CONTINUE SHOPPING</span><i class="icon-refresh"></i></a>
	                		</aside><!-- End .col-lg-3 -->
	                	</div><!-- End .row -->
	                </div><!-- End .container -->
                </div><!-- End .cart -->
            </div><!-- End .page-content -->
        </main>

   
    