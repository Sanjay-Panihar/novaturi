@extends('frontlayout.frontlayout')
@section('content')
<main class="main">
   <div class="intro-slider-container">
      <div class="intro-slider owl-carousel owl-simple owl-nav-inside" data-toggle="owl" data-owl-options='{
         "nav": false,
         "responsive": {
         "992": {
         "nav": true
         }
         }
         }'>
         <div class="intro-slide" style="background-image: url('img/banner/ban1.png');">
            <div class="container intro-content">
               <div class="row">
                  <div class="col-auto offset-lg-3 intro-col">
                     <h3 class="intro-subtitle"></h3>
                     <!-- End .h3 intro-subtitle -->
                     <h1 class="intro-title"><br><br>
                     </h1>
                     <!-- End .intro-title -->
                  </div>
                  <!-- End .col-auto offset-lg-3 -->
               </div>
               <!-- End .row -->
            </div>
            <!-- End .container intro-content -->
         </div>
         <!-- End .intro-slide -->
         <div class="intro-slide" style="background-image: url(img/banner/ban2.png);">
            <div class="container intro-content">
               <div class="row">
                  <div class="col-auto offset-lg-3 intro-col">
                     <h3 class="intro-subtitle"></h3>
                     <!-- End .h3 intro-subtitle -->
                     <h1 class="intro-title"><br>
                     </h1>
                     <!-- End .intro-title -->
                  </div>
                  <!-- End .col-auto offset-lg-3 -->
               </div>
               <!-- End .row -->
            </div>
            <!-- End .container intro-content -->
         </div>
         <!-- End .intro-slide -->
      </div>
      <!-- End .owl-carousel owl-simple -->
      <span class="slider-loader"></span><!-- End .slider-loader -->
   </div>
   <!-- End .intro-slider-container -->
   <h2 class="title title-border " style="margin-bottom: 0px; margin-top: 40px; background-image: url('img/banner/1.gif'); background-size: cover; text-align: center; padding: 10px;
   text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); color:white; font-size: xx-large; font-family: "Kosugi", sans-serif; ">SHOP WHOLESALE - SUPPLIERS & FACTORIES</h2><!-- End .title -->
   <div class="blog-posts" style="background-color:#fffeee; padding: 15px;">
      <div class="container">
         <div class="owl-carousel owl-simple carousel-with-shadow" data-toggle="owl" 
            data-owl-options='{
            "nav": false, 
            "dots": true,
            "items": 3,
            "margin": 20,
            "loop": false,
            "responsive": {
            "0": {
            "items":1
            },
            "600": {
            "items":3
            },
            "992": {
            "items":4
            }
            }
            }'>
            @foreach($featuredCategories as $category)
            <article class="entry entry-display">
               <figure class="entry-media">
                  <a href="{{url($category['url']) }}">
                  <img src="{{ asset('admin/category_image/' . $category['category_image']) }}" alt="{{ $category['category_name'] }}" style="border-radius: 10px;">
                  </a>
               </figure>
               <!-- End .entry-media -->
               <div class="banner-content">
                  <center><a href="{{url($category['url']) }}" class="banner-link">{{ $category['category_name']}}</a></center>
               </div>
               <!-- End .banner-content -->
            </article>
            <!-- End .entry -->
            @endforeach
         </div>
         <!-- End .owl-carousel -->
      </div>
      <!-- End .container -->
   </div>
   <h2 class="title title-border" style="margin-bottom: 0px; background-image: url('img/banner/2.gif'); background-size: cover; text-align: center; padding: 10px;
   text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); color:white; font-size: xx-large; font-family: "Kosugi", sans-serif;">FIND SUPPLIERS</h2>
   <!-- End .container -->
   <div style="background-color:#eff9ff; padding: 15px;">
      <div class="container">
         <!-- End .title -->
         <div class="owl-carousel  owl-simple" data-toggle="owl" 
            data-owl-options='{
            "nav": false, 
            "dots": true,
            "margin": 30,
            "loop": false,
            "responsive": {
            "0": {
            "items":2
            },
            "420": {
            "items":3
            },
            "600": {
            "items":4
            },
            "900": {
            "items":5
            },
            "1024": {
            "items":6
            },
            "1280": {
            "items":6,
            "nav": true,
            "dots": false
            }
            }
            }'>
            <a href="{{ route('suppliers', 'Brand Labels & Tags') }}" class="brand">
               <center><img src="{{asset('public/admin/category_image/97385.png')}}" alt="Brand Name"></center>
               <div>
                  <h4 style="font-size: 1.4rem; padding-top: 2rem;">Brand Labels & Tags</h4>
               </div>
            </a>
            <a href="{{ route('suppliers', 'Sustainble Packaging Suppliers') }}" class="brand">
               <center><img src="{{asset('public/admin/category_image/6 (2).png')}}" alt="Brand Name"></center>
               <div>
                  <h4 style="font-size: 1.4rem; padding-top: 2rem;">Sustainble Packaging Suppliers</h4>
               </div>
            </a>
            <a href="{{ route('suppliers', 'Knitted Apparel Manufacturers - T Shirt & Hoodies') }}" class="brand">
               <center><img src="{{asset('public/admin/category_image/7 (2).png')}}" alt="Brand Name"></center>
               <div>
                  <h4 style="font-size: 1.4rem; padding-top: 2rem;">Knitted Apparel Manufacturers - T Shirt & Hoodies</h4>
               </div>
            </a>
            <a href="{{ route('suppliers', 'Fabric Printers') }}" class="brand">
               <center><img src="{{asset('public/admin/category_image/8 (2).png')}}" alt="Brand Name"></center>
               <div>
                  <h4 style="font-size: 1.4rem; padding-top: 2rem;">Fabric Printers</h4>
               </div>
            </a>
            <a href="{{ route('suppliers', 'Fabric Dyer') }}" class="brand">
               <center><img src="{{asset('public/admin/category_image/9 (2).png')}}" alt="Brand Name"></center>
               <div>
                  <h4 style="font-size: 1.4rem; padding-top: 2rem;">Fabric Dyers</h4>
               </div>
            </a>
            <a href="{{ route('suppliers', 'Sustainable Fabric Suppliers') }}" class="brand">
               <center><img src="{{asset('public/admin/category_image/10 (3).png')}}" alt="Brand Name"></center>
               <div>
                  <h4 style="font-size: 1.4rem; padding-top: 2rem;">Sustainable Fabric Suppliers</h4>
               </div>
            </a>
            <a href="{{ route('suppliers', 'Embroiders & Craftsmen') }}" class="brand">
               <center><img src="{{asset('front/assets/images/supplier icon/Embroiders and Craftsmen.jpg')}}" alt="Brand Name"></center>
               <div>
                  <h4 style="font-size: 1.4rem; padding-top: 2rem;">Embroiders & Craftsmen</h4>
               </div>
            </a>
            <a href="{{ route('suppliers', 'Embroidery Material Suppliers') }}" class="brand">
               <center><img src="{{asset('front/assets/images/supplier icon/Embroidery material suppliers.jpg')}}" alt="Brand Name"></center>
               <div>
                  <h4 style="font-size: 1.4rem; padding-top: 2rem;">Embroidery Material Suppliers</h4>
               </div>
            </a>
            <a href="{{ route('suppliers', 'Trims Suppliers') }}" class="brand">
               <center><img src="{{asset('front/assets/images/supplier icon/Trims Supplier.jpg')}}" alt="Brand Name"></center>
               <div>
                  <h4 style="font-size: 1.4rem; padding-top: 2rem;">Trims Suppliers</h4>
               </div>
            </a>
            <a href="{{ route('suppliers', 'Apparel Manufacturers-Woven Garments') }}" class="brand">
               <center><img src="{{asset('front/assets/images/supplier icon/Apparel Manufacturers - Woven Garment.jpg')}}" alt="Brand Name"></center>
               <div>
                  <h4 style="font-size: 1.4rem; padding-top: 2rem;">Apparel Manufacturers - Woven Garments</h4>
               </div>
            </a>
            <a href="{{ route('suppliers', 'Machine Suppliers') }}" class="brand">
               <center><img src="{{asset('front/assets/images/supplier icon/sewing-machine.jpg')}}" alt="Brand Name"></center>
               <div>
                  <h4 style="font-size: 1.4rem; padding-top: 2rem;">Machine Suppliers</h4>
               </div>
            </a>
            <a href="{{ route('suppliers', 'Bespoke Attire Makers') }}" class="brand">
               <center><img src="{{asset('front/assets/images/supplier icon/Bespoke Attire Makers.jpg')}}" alt="Brand Name"></center>
               <div>
                  <h4 style="font-size: 1.4rem; padding-top: 2rem;">Bespoke Attire Makers</h4>
               </div>
            </a>
            <a href="{{ route('suppliers', 'DTG/DTF/Heat Sublimation Printers/Puff Print') }}" class="brand">
               <center><img src="{{asset('front/assets/images/supplier icon/dtg_dtf_heat sublimation printers_puff print.jpg')}}" alt="Brand Name"></center>
               <div>
                  <h4 style="font-size: 1.4rem; padding-top: 2rem;">DTG /DTF /Heat Sublimation Printers/Puff Print</h4>
               </div>
            </a>
            <a href="{{ route('suppliers', 'Swimwear Manufacturer') }}" class="brand">
               <center><img src="{{asset('front/assets/images/supplier icon/Swimwear Manufacturers.jpg')}}" alt="Brand Name"></center>
               <div>
                  <h4 style="font-size: 1.4rem; padding-top: 2rem;">Swimwear Manufacturers </h4>
               </div>
            </a>
            <a href="{{ route('suppliers', 'Athleisure/Sportswear Manufacturers') }}" class="brand">
               <center><img src="{{asset('front/assets/images/supplier icon/AtheliesureSportswear Manufacturers.jpg')}}" alt="Brand Name"></center>
               <div>
                  <h4 style="font-size: 1.4rem; padding-top: 2rem;">Athleisure / Sportswear Manufacturers</h4>
               </div>
            </a>
            <a href="{{ route('suppliers', 'Miscellaneous') }}" class="brand">
               <center><img src="{{asset('front/assets/images/supplier icon/Miscellaneous.jpg')}}" alt="Brand Name"></center>
               <div>
                  <h4 style="font-size: 1.4rem; padding-top: 2rem;">Miscellaneous</h4>
               </div>
            </a>
            <a href="{{ route('suppliers', 'Shoe Manufacturer') }}" class="brand">
               <center><img src="{{asset('front/assets/images/supplier icon/Shoe Manufacturers.jpg')}}" alt="Brand Name"></center>
               <div>
                  <h4 style="font-size: 1.4rem; padding-top: 2rem;">Shoe Manufacturers</h4>
               </div>
            </a>
            <a href="{{ route('suppliers', 'Lifestyle Sector Suppliers') }}" class="brand">
               <center><img src="{{asset('front/assets/images/supplier icon/Lifestyle sector suppliers.jpg')}}" alt="Brand Name"></center>
               <div>
                  <h4 style="font-size: 1.4rem; padding-top: 2rem;">Lifestyle Sector Suppliers</h4>
               </div>
            </a>
            
         </div>
         <!-- End .owl-carousel -->
      </div>
   </div>
   <h2 class="title title-border " style="margin-bottom: 0px; background-image: url('img/banner/3.gif'); background-size: cover; text-align: center; padding: 10px;
   text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); color:white; font-size: xx-large; font-family: "Kosugi", sans-serif;">SHOP PRODUCTIVITY COURSES & TEMPLATES</h2></h2>
   <div class="blog-posts" style="background-color:#fffeee; padding: 15px;">
      <div class="container">
         <div class="owl-carousel owl-simple carousel-with-shadow" data-toggle="owl" 
            data-owl-options='{
            "nav": false, 
            "dots": true,
            "items": 3,
            "margin": 20,
            "loop": false,
            "responsive": {
            "0": {
            "items":1
            },
            "600": {
            "items":3
            },
            "992": {
            "items":4
            }
            }
            }'>
            @foreach($allCategories as $category)
            <article class="entry entry-display">
               <figure class="entry-media">
                  <a href="{{url($category['url']) }}">
                  <img src="{{ asset('admin/category_image/' . $category['category_image']) }}" alt="{{ $category['category_name'] }}" style="border-radius: 10px;">
                  </a>
               </figure>
               <!-- End .entry-media -->
               <div class="banner-content">
                  <center><a href="{{url($category['url']) }}" class="banner-link">{{ $category['category_name']}}</a></center>
               </div>
               <!-- End .banner-content -->
            </article>
            <!-- End .entry -->
            @endforeach
         </div>
         <!-- End .owl-carousel -->
      </div>
      <!-- End .container -->
   </div>
   </div>
   <h2 class="title title-border " style=" margin-bottom: 0px; background-image: url('img/banner/5.gif'); background-size: cover; text-align: center; padding: 10px;
   text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); color:white; font-size: xx-large; font-family: "Kosugi", sans-serif;"> 
   CREATE MOCKUPS</h2>
   <div style=" padding: 15px; background: linear-gradient(to bottom, 
      #ffceb0 35%, #ffcd81 35%, #ffcd81 47%, #fffdaa 47%, #fffdaa 57%, white 57%, white 100% );">
      <div class="container clothing ">
         <div class="heading heading-flex heading-border " style="display:none;">
            <div class="heading-right">
               <ul class="nav nav-pills nav-border-anim justify-content-center" role="tablist">
                  <li class="nav-item">
                     <a class="nav-link active" id="clot-new-link" data-toggle="tab" href="#clot-new-tab" role="tab" aria-controls="clot-new-tab" aria-selected="true"></a>
                  </li>
               </ul>
            </div>
            <!-- End .heading-right -->
         </div>
         <!-- End .heading -->
         <div class="tab-content tab-content-carousel">
            <div class="tab-pane p-0 fade show active" id="clot-new-tab" role="tabpanel" aria-labelledby="clot-new-link">
               <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                  data-owl-options='{
                  "nav": false, 
                  "dots": true,
                  "margin": 20,
                  "loop": false,
                  "responsive": {
                  "0": {
                  "items":2
                  },
                  "480": {
                  "items":2
                  },
                  "768": {
                  "items":3
                  },
                  "992": {
                  "items":4
                  },
                  "1280": {
                  "items":5,
                  "nav": true
                  }
                  }
                  }'>
                  @foreach($allmockup as $product)
                  <div class="product">
                     <figure class="product-media">
                        <a href="{{url('mockupsproduct/'.$product['id'])}}">
                        <img src="{{ asset('admin/product_image/smallimage/' . $product['product_image']) }}" alt="{{ $product['product_image'] }}" style="border-radius: 140px;">
                        </a>
                     </figure>
                     <!-- End .product-media -->
                     <div class="product-body">
                        <h3 class="product-title"><a href="{{url('mockupsproduct/'.$product['id'])}}">{{ $product['product_name']}}</a></h3>
                        <!-- End .product-ti{{ $category['category_name']}}tle -->
                        
                        <div class="ratings-container">
                           <div class="ratings">
                              <div class="ratings-val" style="width: 80%;"></div>
                              <!-- End .ratings-val -->
                           </div>
                           <!-- End .ratings -->
                           <span class="ratings-text">( 12 Reviews )</span>
                        </div>
                        <!-- End .rating-container -->
                     </div>
                     <!-- End .product-body -->
                  </div>
                  <!-- End .product -->
                  @endforeach
               </div>
               <!-- End .owl-carousel -->
            </div>
            <!-- .End .tab-pane -->
         </div>
         <!-- End .tab-content -->
      </div>
      <!-- End .container -->
   </div>
   <h2 class="title title-border " style="margin-bottom: 0px; background-image: url('img/banner/4.gif'); background-size: cover; text-align: center; padding: 10px;
   text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); color:white; font-size: xx-large; font-family: "Kosugi", sans-serif;">FREELANCE SERVICE PROVIDER</h2></h2>
   <div style="background-color:#feece1; padding: 15px;">
      <div class="container">
         <div class="owl-carousel mb-5 owl-simple" data-toggle="owl" 
            data-owl-options='{
            "nav": false, 
            "dots": true,
            "margin": 30,
            "loop": false,
            "responsive": {
            "0": {
            "items":2
            },
            "420": {
            "items":3
            },
            "600": {
            "items":4
            },
            "900": {
            "items":5
            },
            "1024": {
            "items":6
            },
            "1280": {
            "items":6,
            "nav": true,
            "dots": false
            }
            }
            }'>
            <a href="{{ route('suppliers', 'Fashion Designer') }}" class="brand">
               <center><img src="{{asset('img/banner/11 (1).png')}}" alt="Brand Name"></center>
               <div>
                  <h4 style="font-size: 1.4rem; padding-top: 2rem;">Fashion Designer </h4>
               </div>
            </a>
            <a href="{{ route('suppliers', 'Graphic Designers') }}" class="brand">
               <center><img src="{{asset('img/banner/12.png')}}" alt="Brand Name"></center>
               <div>
                  <h4 style="font-size: 1.4rem; padding-top: 2rem;">Graphic Designers</h4>
               </div>
            </a>
            <a href="{{ route('suppliers', 'Graphic Design Agency') }}" class="brand">
               <center><img src="{{asset('front/assets/images/supplier icon/Graphic Design Agency.jpg')}}" alt="Brand Name"></center>
               <div>
                  <h4 style="font-size: 1.4rem; padding-top: 2rem;">Graphic Design Agency</h4>
               </div>
            </a>
            <a href="{{ route('suppliers', 'Performance & Digital Marketing Agency') }}" class="brand">
               <center><img src="{{asset('front/assets/images/supplier icon/Performace Marketing Agencies.jpg')}}" alt="Brand Name"></center>
               <div>
                  <h4 style="font-size: 1.4rem; padding-top: 2rem;">Performance & Digital Marketing  Agency</h4>
               </div>
            </a>
            <a href="{{ route('suppliers', 'Performance Marketer') }}" class="brand">
               <center><img src="{{asset('img/banner/14.png')}}" alt="Brand Name"></center>
               <div>
                  <h4 style="font-size: 1.4rem; padding-top: 2rem;">Performance Marketeer</h4>
               </div>
            </a>
            <a href="{{ route('suppliers', 'Photographer') }}" class="brand">
               <center><img src="{{asset('img/banner/Photographers.png')}}" alt="Brand Name"></center>
               <div>
                  <h4 style="font-size: 1.4rem; padding-top: 2rem;">Photographer</h4>
               </div>
            </a>
            <a href="{{ route('suppliers', 'Stylist') }}" class="brand">
               <center><img src="{{asset('img/banner/16.png')}}" alt="Brand Name"></center>
               <div>
                  <h4 style="font-size: 1.4rem; padding-top: 2rem;">Stylist </h4>
               </div>
            </a>
            <a href="{{ route('suppliers', 'Marketing & PR Agency') }}" class="brand">
               <center><img src="{{asset('front/assets/images/supplier icon/Marketing Agency.jpg')}}" alt="Brand Name"></center>
               <div>
                  <h4 style="font-size: 1.4rem; padding-top: 2rem;">Marketing & PR Agency</h4>
               </div>
            </a>
            <a href="{{ route('suppliers', 'Business Consultants') }}" class="brand">
               <center><img src="{{asset('front/assets/images/supplier icon/Business Consultants.jpg')}}" alt="Brand Name"></center>
               <div>
                  <h4 style="font-size: 1.4rem; padding-top: 2rem;">Business Consultants</h4>
               </div>
            </a>
           
            <a href="{{ route('suppliers', '3PL Marketing Agency') }}" class="brand">
               <center><img src="{{asset('front/assets/images/supplier icon/3pl marketing agency.jpg')}}" alt="Brand Name"></center>
               <div>
                  <h4 style="font-size: 1.4rem; padding-top: 2rem;">3PL Marketing Agency</h4>
               </div>
            </a>
            <a href="{{ route('suppliers', 'Website Developers') }}" class="brand">
               <center><img src="{{asset('front/assets/images/supplier icon/Website developers.jpg')}}" alt="Brand Name"></center>
               <div>
                  <h4 style="font-size: 1.4rem; padding-top: 2rem;">Website Developers</h4>
               </div>
            </a>
            <a href="{{ route('suppliers', 'Content Creators') }}" class="brand">
               <center><img src="{{asset('front/assets/images/supplier icon/Content Creators.jpg')}}" alt="Brand Name"></center>
               <div>
                  <h4 style="font-size: 1.4rem; padding-top: 2rem;">Content Creators</h4>
               </div>
            </a>
            <a href="{{ route('suppliers', 'NGO Tie Ups') }}" class="brand">
               <center><img src="{{asset('front/assets/images/supplier icon/NGO Tieups.jpg')}}" alt="Brand Name"></center>
               <div>
                  <h4 style="font-size: 1.4rem; padding-top: 2rem;">NGO Tie Ups</h4>
               </div>
            </a>
            <a href="{{ route('suppliers', 'Brand Collab Tie Ups') }}" class="brand">
               <center><img src="{{asset('front/assets/images/supplier icon/Brand Collabs and tieups.jpg')}}" alt="Brand Name"></center>
               <div>
                  <h4 style="font-size: 1.4rem; padding-top: 2rem;">Brand Collab Tie Ups</h4>
               </div>
            </a>
            <a href="{{ route('suppliers', 'Photoshoot Agency') }}" class="brand">
               <center><img src="{{asset('front/assets/images/supplier icon/Photoshoot agency.jpg')}}" alt="Brand Name"></center>
               <div>
                  <h4 style="font-size: 1.4rem; padding-top: 2rem;">Photoshoot Agency</h4>
               </div>
            </a>
         </div>
         <!-- End .owl-carousel -->
      </div>
   </div>
   <h2 class="title title-border " style=" margin-bottom: 0px; background-image: url('img/banner/5.gif'); background-size: cover; text-align: center; padding: 10px;
   text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); color:white; font-size: xx-large; font-family: "Kosugi", sans-serif;"> 
   SPOT LIGHT OF THE WEEK</h2>
   <div style=" padding: 15px; background: linear-gradient(to bottom, 
      #ffceb0 35%, #ffcd81 35%, #ffcd81 47%, #fffdaa 47%, #fffdaa 57%, white 57%, white 100% );">
      <div class="container clothing ">
         <div class="heading heading-flex heading-border " style="display:none;">
            <div class="heading-right">
               <ul class="nav nav-pills nav-border-anim justify-content-center" role="tablist">
                  <li class="nav-item">
                     <a class="nav-link active" id="clot-new-link" data-toggle="tab" href="#clot-new-tab" role="tab" aria-controls="clot-new-tab" aria-selected="true"></a>
                  </li>
               </ul>
            </div>
            <!-- End .heading-right -->
         </div>
         <!-- End .heading -->
         <div class="tab-content tab-content-carousel">
    <div class="tab-pane p-0 fade show active" id="clot-new-tab" role="tabpanel" aria-labelledby="clot-new-link">
        @if(count($allproduct) > 0)
            <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                data-owl-options='{
                    "nav": false, 
                    "dots": true,
                    "margin": 20,
                    "loop": false,
                    "responsive": {
                        "0": {
                            "items":2
                        },
                        "480": {
                            "items":2
                        },
                        "768": {
                            "items":3
                        },
                        "992": {
                            "items":4
                        },
                        "1280": {
                            "items":5,
                            "nav": true
                        }
                    }
                }'>
                @foreach($allproduct as $product)
                    <div class="product">
                        <figure class="product-media">
                            <a href="{{url('product/'.$product['id'])}}">
                                <img src="{{ asset('admin/product_image/smallimage/' . $product['product_image']) }}" alt="{{ $product['product_image'] }}" style="border-radius: 140px;">
                            </a>
                        </figure>
                        <!-- End .product-media -->
                        <div class="product-body">
                            <h3 class="product-title"><a href="{{url('product/'.$product['id'])}}">{{ $product['product_name'] }}</a></h3>
                            <!-- End .product-title -->
                            <center>
                                <h4>₹ {{ $product['product_price'] }}</h4>
                            </center>
                            <div class="ratings-container">
                                <div class="ratings">
                                    <div class="ratings-val" style="width: 80%;"></div>
                                    <!-- End .ratings-val -->
                                </div>
                                <!-- End .ratings -->
                                <span class="ratings-text">( 12 Reviews )</span>
                            </div>
                            <!-- End .rating-container -->
                        </div>
                        <!-- End .product-body -->
                    </div>
                    <!-- End .product -->
                @endforeach
            </div>
            <!-- End .owl-carousel -->
        @else
            <div class="alert alert-warning text-center" role="alert">
                No record found.
            </div>
        @endif
    </div>
    <!-- .End .tab-pane -->
</div>

         <!-- End .tab-content -->
      </div>
      <!-- End .container -->
   </div>
   <div class="cta cta-horizontal cta-horizontal-box" style="background-color:black;">
      <div class="container">
         <div class="row align-items-center">
            <div class="col-2xl-5col">
               <h3 class="cta-title text-white">Join Our Newsletter</h3>
               <!-- End .cta-title -->
               <p class="cta-desc text-white">Subcribe to get information about products and coupons</p>
               <!-- End .cta-desc -->
            </div>
            <!-- End .col-lg-5 -->
            <div class="col-3xl-5col">
               <form action="#">
                  <div class="input-group">
                     <input type="email" class="form-control form-control-white" placeholder="Enter your Email Address" aria-label="Email Adress" required>
                     <div class="input-group-append">
                        <button class="btn btn-outline-white-2" type="submit"><span>Subscribe</span><i class="icon-long-arrow-right"></i></button>
                     </div>
                     <!-- .End .input-group-append -->
                  </div>
                  <!-- .End .input-group -->
               </form>
            </div>
            <!-- End .col-lg-7 -->
         </div>
         <!-- End .row -->
      </div>
      <!-- End .container -->
   </div>
   <!-- End .cta -->
   <h2 class="title title-border" style=" margin-bottom: 0px; background-image: url('img/banner/6.gif'); background-size: cover; text-align: center; padding: 10px;
   text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); color:white; font-size: xx-large; font-family: "Kosugi", sans-serif;">EVENT</h2>
   <div style="background: linear-gradient(90deg, rgba(186,151,255,1) 0%, rgba(235,178,178,1) 83%, rgba(253,188,150,1) 100%); padding: 15px;">
      <div class="container ">
         <div class="row">
            @foreach($allevent as $event)
            <div class="col-sm-6 col-lg-3">
               <div class="banner banner-overlay">
                  <a href="#">
                  <img src="{{ asset('admin/product_image/largeimage/' . $event['image']) }}" alt="{{ $event['image'] }}">
                  </a>
                  <div class="banner-content">
                     <center><a href="{{ url('view-event-details/' . $event['id']) }}" class="banner-link">{{ $event['title'] }}</a></center>
                  </div>
                  <!-- End .banner-content -->
               </div>
               <!-- End .banner -->
            </div>
            <!-- End .col-lg-3 -->
            @endforeach
         </div>
         <!-- End .row -->
      </div>
   </div>
   <a href="https://novaturi.in/T-shirt">
       <div class="intro-slider-container">
      <div class="intro-slider owl-carousel owl-simple owl-nav-inside" data-toggle="owl" data-owl-options='{
         "nav": false,
         "responsive": {
         "992": {
         "nav": true
         }
         }
         }'>
         <div class="intro-slide" style="background-image: url('img/banner/ban1.png');">
            <div class="container intro-content">
               <div class="row">
                  <div class="col-auto offset-lg-3 intro-col">
                     
                     <h3 class="intro-subtitle"></h3>
                     <!-- End .h3 intro-subtitle -->
                     <h1 class="intro-title" ><br><br>
                     </h1>
                     <!-- End .intro-title -->
                  </div>
                  <!-- End .col-auto offset-lg-3 -->
               </div>
               <!-- End .row -->
            </div>
            <!-- End .container intro-content -->
         </div>
         <!-- End .intro-slide -->
      </div>
      <!-- End .owl-carousel owl-simple -->
      <span class="slider-loader"></span><!-- End .slider-loader -->
   </div>
       
   </a>
   
   <!-- End .icon-boxes-container --> 
   
</main>
@endsection