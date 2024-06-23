<?php use App\Models\Product; ?>
@extends('frontlayout.frontlayout')
@section('content')
<main class="main">
   <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
      <div class="container">
         <h1 class="page-title">Checkout<span>Shop</span></h1>
      </div>
      <!-- End .container -->
   </div>
   <!-- End .page-header -->
   <nav aria-label="breadcrumb" class="breadcrumb-nav">
      <div class="container">
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Shop</a></li>
            <li class="breadcrumb-item active" aria-current="page">Checkout</li>
         </ol>
      </div>
      <!-- End .container -->
   </nav>
   <!-- End .breadcrumb-nav -->
   <div class="page-content">
      <div class="checkout">
         <div class="container">
            <div class="">
               @if(Session::has('error_message'))
               <div class="alert alert-warning alert-dismissible fade show" role="alert">
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  <div>  Error:<?php echo Session::get('error_message'); ?></div>
               </div>
               @endif
            </div>
            <!-- End .checkout-discount -->
            <div class="row">
               <div class="col-lg-8" id="deliveryAddresses">
                  @include('delivery_addresses')
               </div>
               <!-- End .col-lg-9 -->
               <aside class="col-lg-4">
                  <form name="checkoutForm" id="checkoutForm" action="{{url('checkout')}}" method="post">@csrf 
                  <div>
                      @if(count($deliveryAddresses)>0)
                     <h4 class="section-h4">Delivery Addresses</h4>
                     <div class=""  style="background: blanchedalmond; padding: 3px 10px;">
                        @foreach($deliveryAddresses as $address)
                        <div class="custom-control ">
                           <div class="form-check">
                              @if(isset($address['id']))
                              <input class="form-check-input" name="address_id" type="checkbox" value="{{ $address['id']}}" id="address{{ $address['id']}}" style="margin-top: 0.6rem;">
                              @endif
                              <label class="form-check-label" for="flexCheckDefault"  style=" margin-left: 1rem;" >
                              @if(isset($address['name']) && isset($address['mobile']) && isset($address['address']) && isset($address['country']) && isset($address['pincode']) && isset($address['city']) && isset($address['state']))
                              {{ $address['name']}}, {{ $address['mobile']}}, {{ $address['address']}},
                              {{ $address['country']}}, {{ $address['pincode']}}, {{ $address['city']}}, {{ $address['state']}}
                              @else
                              Address information not available
                              @endif
                              </label>
                              @if(isset($address['id']))
                              <a href="javascript:;" data-addressid="{{$address['id']}}" class="removeDeliveryAddress"  style="float:right; ">Remove</a>
                              <a href="javascript:;" data-addressid="{{$address['id']}}" class="editAddress"  style="float:right; margin-right:10px; ">Edit</a> &nbsp;
                              @endif
                           </div>
                        </div>
                        @endforeach
                     </div>
                     @else 
                     <h4 class="section-h4">NO Delivery Address. Add new below </h4>
                     @endif
                      
                  </div>
                     
                     <div class="summary">
                        <h3 class="summary-title">Your Order</h3>
                        <!-- End .summary-title -->
                        <table class="table table-summary">
                           <thead>
                              <tr>
                                 <th>Product</th>
                                 <th>Total</th>
                              </tr>
                           </thead>
                           <tbody>
                              @php $total_price = 0 @endphp
                              @foreach($getCartItems as $item)
                              <?php  $getDiscountAttributePrice = Product::getDiscountAttributePrice($item['product_id'],$item['size']);?>
                              <tr>
                                 <td>
                                    <a href="{{url('product/'.$item['product_id'])}}" >
                                    <img src="{{asset('admin/product_image/smallimage/'.$item['product']['product_image'])}}"
                                       alt="Product image" style="height:40px;">
                                    </a>
                                    <a href="#">{{$item['product']['product_name']}}</a>
                                    <span>x{{$item['quantity']}}</span>
                                 </td>
                                 <td>Rs.{{$getDiscountAttributePrice['final_price']*$item['quantity']}}</td>
                              </tr>
                              @php $total_price = $total_price + ($getDiscountAttributePrice['final_price']*$item['quantity']) @endphp
                              @endforeach
                              <tr class="summary-subtotal">
                                 <td>Subtotal:</td>
                                 <td>Rs:{{ $total_price }}</td>
                              </tr>
                              <!-- End .summary-subtotal -->
                              <tr>
                                 <td>Shipping:</td>
                                 <td>Free shipping</td>
                              </tr>
                              <tr class="summary-total">
                                 <td>Total:</td>
                                 <td >Rs:{{ $total_price }}</td>
                              </tr>
                              <!-- End .summary-total -->
                           </tbody>
                        </table>
                        <!-- End .table table-summary -->
                        <div class="accordion-summary" id="accordion-payment">
                           <div class="form-check">
                              <input class="form-check-input" name="payment_gateway" type="checkbox" value="COD" id="cash-on-delivery" 
                                 style="margin-top: 0.6rem;">
                              <label class="form-check-label" for="flexCheckDefault"  style=" margin-left: 1rem;" >
                              COD (cash on Delivery)
                              </label>
                           </div>
                           <!-- End .card -->
                           <div class="form-check">
                              <input class="form-check-input" name="payment_gateway" type="checkbox" value="Stripe" id="Instamojo" style="margin-top: 0.6rem;">
                              <label class="form-check-label" for="flexCheckDefault"  style=" margin-left: 1rem;" >
                              Stripe
                              </label>
                           </div>
                           <div class="form-check">
                              <input class="form-check-input" name="payment_gateway" type="checkbox" value="PhonePe" id="Phonepe" style="margin-top: 0.6rem;">
                              <label class="form-check-label" for="flexCheckDefault"  style=" margin-left: 1rem;" >
                              PhonePe
                              </label>
                           </div>
                        </div>
                        <div class="form-check">
                           <input class="form-check-input" name="termsandconditions" type="checkbox" value="Yes"
                              id="accept"  checked="" style="margin-top: 0.6rem;" required="">
                           <label class="form-check-label" for="flexCheckDefault"  style=" margin-left: 1rem;" >
                           Accept Terms & Conditions
                           </label>
                        </div>
                        <!-- End .accordion -->
                        <button type="submit" class="btn btn-outline-primary-2 btn-order btn-block">
                        <span class="btn-text">Place Order</span>
                        <span class="btn-hover-text">Proceed to Checkout</span>
                        </button>
                     </div>
                     <!-- End .summary -->
                  </form>
               </aside>
               <!-- End .col-lg-3 -->
            </div>
         </div>
         <!-- End .container -->
      </div>
      <!-- End .checkout -->
   </div>
   <!-- End .page-content -->
</main>
<!---->
<!-- Footer Section End -->
@endsection