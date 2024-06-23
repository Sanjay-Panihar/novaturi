@extends('frontlayout.frontlayout')
@section('content')
<main class="main">
   <div class="page-header text-center" style="background-image: url('img/banner/Shipping Policy.gif');background-size: cover; text-align: center; padding: 20px;">
      <div class="container">
         <h1 class="page-title" style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); color:white; font-size: xx-large; font-family: "Kosugi", sans-serif;"> SHIPPING POLICY</h1>
      </div>
      <!-- End .container -->
   </div>
   <!-- End .page-header -->
   <div class="row justify-content-center mt-4">
      <div class="col-md-10 col-lg-10">
         <div class="banner banner-overlay text-white">
            <a href="#">
            <img src="{{asset('img/banner/Shipping Policy.jpg')}}" alt="Banner">
            </a>
         </div>
         <!-- End .banner -->
      </div>
      <!-- End .col-lg-4 -->
      <!-- End .col-lg-4 -->
   </div>
   <div class="page-content">

      <div class="container">
          <h2 class="title text-center mb-2">Shipping Information</h2>
                  <!-- End .title text-center mb-2 -->
                  <p style="text-align:left;">
                    Welcome to the Shipping Information page of Ownyourtruestory, your go-to ecommerce marketplace featuring a diverse collection of unique, handcrafted items from multiple vendors. Our mission is to bring you closer to the world of artisanal beauty, offering products that are handmade, hand-embroidered, or hand-painted, ensuring you receive a piece that is truly one-of-a-kind.<br>
                     <b>Shipping Timeframe:
                     </b> <br>At Ownyourtruestory, we understand the excitement and anticipation that comes with each order. We aim to ensure that your treasures reach you in a timely manner. Our standard shipping timeframe is 10-12 business days. If your order surpasses the designated delivery time, please don’t hesitate to get in touch with us at customerservice@ownyourtruestory.com for assistance.<br>
                  </p>
         <h2 class="title text-center mb-3">Orders and Returns</h2>
         <!-- End .title -->
         <div class="accordion accordion-rounded" id="accordion-1">
            <div class="card card-box card-sm bg-light">
               <div class="card-header" id="heading-1">
                  <h2 class="card-title">
                     <a role="button" data-toggle="collapse" href="#collapse-1" aria-expanded="true" aria-controls="collapse-1">
                     Orders & Tracking
                     </a>
                  </h2>
               </div>
               <!-- End .card-header -->
               <div id="collapse-1" class="collapse show" aria-labelledby="heading-1" data-parent="#accordion-1">
                  <div class="card-body">
    <b>When will my order be delivered?</b><br>
    Since most items are handmade, hand-embroidered, or hand-painted and made to order by artisans, it may take slightly longer to dispatch them. The dispatch time for each product is mentioned in the product's description. Once dispatched, your order will be delivered within 4 - 8 business days depending on your location. 
    Please note, if you have more than one item in your order, you may receive the order in multiple boxes. <br>
    <b>Why is my order taking so long?</b><br>
    Due to the nature of small creative businesses and the unique products they create, some items are made to order and may have different processing times. Please check the Product Description on the Product’s Page for the expected dispatch time.<br>
    <b>How can I track my order?</b><br>
    To track your order, go to the ‘Orders’ section under 'My Account.' Click on 'Track Order' for the order you wish to track. You shall receive the tracking link on your registered phone number via SMS if the order has been shipped. 
    Additionally, you can enter your order details here to check the status of your order. <br>
    <b>What if I'm unavailable during delivery?</b><br>
    Our logistics partners will make three delivery attempts. If you're unavailable all three times, the order will be returned to us. If you still want the order or need to update the shipping details, please email your request to customerservice@ownyourtruestory.com<br>
    <b>Can I change the Shipping Address after placing an order?</b><br>
    You can change the Shipping Address only if the order has not been shipped. Please email your request to customerservice@ownyourtruestory.com, and we will do our best to assist you.<br>
</div>

                  <!-- End .card-body -->
               </div>
               <!-- End .collapse -->
            </div>
            <!-- End .card -->
            
            <!-- End .card -->
         </div>
         <!-- End .accordion -->
         
         <!-- End .accordion -->
      </div>
      <!-- End .container -->
   </div>
   <!-- End .page-content -->
   
   <!-- End .cta -->
</main>
<!-- End .main -->
@endsection