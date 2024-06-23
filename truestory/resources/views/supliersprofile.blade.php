@extends('frontlayout.frontlayout')
@section('content')


<main class="main">
      @foreach($suppliers as $suplier)
        	@php
        // Decode the JSON array of categories
        $categories = json_decode($suplier->Business_Category);
        
        // Define default banner image
        $defaultBanner = 'default-banner.png';

        // Define mapping between categories and banner images
        $bannerImages = [
            'Brand Labels & Tags' => 'Brand Labels & Tags (1).jpg',
            'Sustainble Packaging Suppliers' => 'Sustainable Fabric Suppliers.jpg',
            'Knitted Apparel Manufacturers - T Shirt & Hoodies' => 'Knitted Apparel Manufacturers - T Shirt & Hoodies.jpg',
            'Fabric Printers' => 'Fabric Printers.jpg',
            'Fabric Dyer' => 'Fabric Dyers.jpg',
            'Sustainable Fabric Suppliers' => 'Sustainable Packaging Suppliers.jpg',
            'Embroiders & Craftsmen' => 'Embroiders & Craftsmen.jpg',
            'Embroidery Material Suppliers' => 'Embroidery Material Suppliers.jpg',
            'Trims Suppliers' => 'Trims Suppliers.jpg',
            'Apparel Manufacturers-Woven Garments' => 'Apparel Manufacturers - Woven Garments (1).jpg',
            'Machine Suppliers' => 'machines.jpg',
            'Bespoke Attire Makers' => 'bespoke attire makers.jpg',
            'DTG/DTF/Heat Sublimation Printers/Puff Print' => 'banner1.png',
            'Swimwear Manufacturer' => 'swimwear manufactures.jpg',
            'Miscellaneous' => 'Miscellaneous.jpg',
            'Shoe Manufacturer' => 'Shoe Manufacturers.jpg',
            'Lifestyle Sector Suppliers' => 'Lifestyle Sector Suppliers.jpg',
            // freelancer////
            'Fashion Designer' => 'Fashion Designer.jpg',
            'Graphic Designers' => 'Graphic Designers.jpg',
            'Graphic Design Agency' => 'Graphic Design Agency.jpg',
            'Performance & Digital Marketing Agency' => 'Performance & Digital Marketing  Agency.jpg',
            'Performance Marketer' => 'Performance Marketer.jpg',
            'Photographer' => 'Photographer.jpg',
            'Marketing & PR Agency' => 'Marketing & PR Agency.jpg',
            'Business Consultants' => 'Business Consultants.jpg',
            '3PL Marketing Agency' => '',
            'Website Developers' => 'website developers.jpg',
            'NGO Tie Ups' => 'ngo tie Ups.jpg',
            'Brand Collab Tie Ups' => 'brand collab ties ups.jpg',
            'Photoshoot Agency' => 'photoshoot agency.jpg',
           
            
        ];

        // Iterate over each category to find a matching banner image
        foreach ($categories as $category) {
            if (isset($bannerImages[$category])) {
                $bannerImage = $bannerImages[$category];
                // Break out of the loop once a matching banner image is found
                break;
            }
        }

        // If no matching banner image is found, use the default one
        $bannerImage = $bannerImage ?? $defaultBanner;
    @endphp

    <div class="page-header text-center">
        <img src="{{ asset('img/banner/cat/' . $bannerImage) }}" class="img-fluid rounded-start" alt="...">
    </div><!-- End .page-header -->

            <div style="background-color:#e5e1e1; padding: 15px;">
                <div class="container">
                <div class="row">
                    <div class="col text-center">

                        <button class="btn btn-primary" style="border-radius: 25px;">
                         @if($suplier->Business_catalogue)
                            <a class=""
                                href="{{ asset('admin/Businesscatalogue/' . $suplier->Business_catalogue) }}"
                                target="_blank" style="color:white; ">
                                View Catalogue
                            </a>
                            @endif
                        </button>    
                        <button class="btn btn-primary" style="border-radius: 25px;">
                            <a href="#signin-modal" data-toggle="modal" style="color:white;"  >Highlights</a></button>

                    </div>
                </div>
                </div>   
            </div>
            



            <div class="page-content pb-3">
                <div class="">
                    <div class="row justify-content-center" style="padding-top: 45px;">
                        <div class="col-lg-4 col-sm-6">
                            <div class="icon-box icon-box-sm text-center">
                                
                                <div class="icon-box-content">
                                    <h3 class="icon-box-title"><span style="border-radius: 20px; padding: 0px 10px; background-color: #7ebfb7; margin-right: 10px; font-weight: 600; font-size: x-large;">Brand</span>{{$suplier->Business_name}}</h3><!-- End .icon-box-title -->
                                </div><!-- End .icon-box-content -->
                            </div><!-- End .icon-box -->
                        </div><!-- End .col-lg-4 col-sm-6 -->

                        <div class="col-lg-4 col-sm-6">
                            <div class="icon-box icon-box-sm text-center">
                                <div class="icon-box-content">
                                    <h3 class="icon-box-title"><span style="border-radius: 20px; padding: 0px 10px; background-color: #7ebfb7; margin-right: 10px; font-weight: 600; font-size: x-large;">Location</span>{{$suplier->city}}</h3><!-- End .icon-box-title -->
                                </div><!-- End .icon-box-content -->
                            </div><!-- End .icon-box -->
                        </div><!-- End .col-lg-4 col-sm-6 -->

                        <div class="col-lg-4 col-sm-6">
                            <div class="icon-box icon-box-sm text-center">
                                
                                <div class="icon-box-content">
                                    <h3 class="icon-box-title"><span style="border-radius: 20px; padding: 0px 10px; background-color: #7ebfb7; margin-right: 10px; font-weight: 600; font-size: x-large;">GST</span>{{$suplier->Gst_number}}</h3><!-- End .icon-box-title --> 
                                </div><!-- End .icon-box-content -->
                            </div><!-- End .icon-box -->
                        </div><!-- End .col-lg-4 col-sm-6 -->
                    </div><!-- End .row -->
                    <h2 class="title text-center" style="padding: 15px; background: #fff2c1;">Brand Brief</h2><!-- End .title text-center mb-2 -->
                    <div class="row">
                        <div class="col-lg-12 offset-lg-1">
                            <div class="about-text text-center mt-3">
                                
                                <p>{{$suplier->brand}}</p>

                            </div><!-- End .about-text -->
                        </div><!-- End .col-lg-10 offset-1 -->
                    </div><!-- End .row -->
                    <h2 class="title text-center " style="padding: 15px; background: #beefd8;">Service Details</h2><!-- End .title text-center mb-2 -->
                    <div class="row">
                        <div class="col-lg-12 offset-lg-1">
                            <div class="about-text text-center mt-3">
                                
                                <p>{{$suplier->service}}</p>

                            </div><!-- End .about-text -->
                        </div><!-- End .col-lg-10 offset-1 -->
                    </div><!-- End .row -->
                    <h2 class="title text-center " style="padding: 15px; background: #faafc6;">Key Attributes</h2><!-- End .title text-center mb-2 -->
                    <div class="row justify-content-center" style="padding: 25px;">
                        <div class="col-lg-4 col-sm-6">
                            <div class="icon-box icon-box-sm text-center">
                                
                                <div class="icon-box-content">
                                    <h3 class="icon-box-title"><span style="border-radius: 20px; padding: 0px 10px;  margin-right: 10px; font-weight: 600; ">Sell in Wholesale</span>{{$suplier->sell_in_wholesale }}</h3><!-- End .icon-box-title -->
                                </div><!-- End .icon-box-content -->
                            </div><!-- End .icon-box -->
                        </div><!-- End .col-lg-4 col-sm-6 -->

                        <div class="col-lg-4 col-sm-6">
                            <div class="icon-box icon-box-sm text-center">
                                <div class="icon-box-content">
                                    <h3 class="icon-box-title"><span style="border-radius: 20px; padding: 0px 10px;  margin-right: 10px; font-weight: 600; ">Delivery Time</span>{{$suplier->delivery_time}}</h3><!-- End .icon-box-title -->
                                </div><!-- End .icon-box-content -->
                            </div><!-- End .icon-box -->
                        </div><!-- End .col-lg-4 col-sm-6 -->

                        <div class="col-lg-4 col-sm-6">
                            <div class="icon-box icon-box-sm text-center">
                                
                                <div class="icon-box-content">
                                    <h3 class="icon-box-title"><span style="border-radius: 20px; padding: 0px 10px;  margin-right: 10px; font-weight: 600;">MOQ</span>{{$suplier->moq_of_product}}</h3><!-- End .icon-box-title --> 
                                </div><!-- End .icon-box-content -->
                            </div><!-- End .icon-box -->
                        </div><!-- End .col-lg-4 col-sm-6 -->
                    </div><!-- End .row -->
                    <h2 class="title text-center " style="padding: 15px; background: #f6b186;">Placing An Order</h2><!-- End .title text-center mb-2 -->
                    <div class="row justify-content-center" style="padding: 25px;">
                        <div class="col-lg-4 col-sm-6">
                            <div class="icon-box icon-box-sm text-center">
                                
                                <div class="icon-box-content">
                                    <h3 class="icon-box-title">
                                        <span style="border-radius: 20px; padding: 0px 10px; margin-right: 10px; font-weight: 600;">WebSite</span>
                                        <a href="{{$suplier->websitelink}}" target="_blank">{{$suplier->websitelink}}</a>
                                    </h3><!-- End .icon-box-title -->
                                </div>
<!-- End .icon-box-content -->
                            </div><!-- End .icon-box -->
                        </div><!-- End .col-lg-4 col-sm-6 -->

                        <div class="col-lg-4 col-sm-6">
                            <div class="icon-box icon-box-sm text-center">
                                <div class="icon-box-content">
                                    <h3 class="icon-box-title">
                                        <span style="border-radius: 20px; padding: 0px 10px;margin-left: 60px; font-weight: 600; display:flex;">
                                          <!-- Facebook Icon -->
                                          
                                         
                                          Social Media :-  &nbsp;
                                          <a href="{{$suplier->facebook}}">
                                             <img src="{{asset('logo/facebook (1).png')}}" alt="Facebook" style="width: 20px; height: 20px; margin-right: 5px;">
                                          </a>
                                          <a href="{{$suplier->instagram}}">
                                             <img src="{{asset('logo/instagram (1).png')}}" alt="instagram" style="width: 20px; height: 20px; margin-right: 5px;">
                                          </a>
                                          <a href="{{$suplier->linkedin}}">
                                             <img src="{{asset('logo/linkedin (1).png')}}" alt="linkedin" style="width: 20px; height: 20px; margin-right: 5px;">
                                          </a>
                                          <a href="{{$suplier->twitter}}">
                                             <img src="{{asset('logo/twitter.png')}}" alt="twitter" style="width: 20px; height: 20px; margin-right: 5px;">
                                          </a>
                                          <a href="{{$suplier->youtube}}">
                                             <img src="{{asset('logo/youtube.png')}}" alt="youtube" style="width: 20px; height: 20px; margin-right: 5px;">
                                          </a>
                                          <!-- Instagram Icon -->
                                          
                                          
                                        </span>
                                          
                                    </h3><!-- End .icon-box-title -->
                                </div><!-- End .icon-box-content -->
                            </div><!-- End .icon-box -->
                        </div>
                           <!-- End .col-lg-4 col-sm-6 -->

                        <div class="col-lg-4 col-sm-6">
                            <div class="icon-box icon-box-sm text-center">
                                
                                <div class="icon-box-content">
                                    <h3 class="icon-box-title"><span style="border-radius: 20px; padding: 0px 10px;  margin-right: 10px; font-weight: 600;">Mail:-
                                        <a href="mailto:{{$suplier->email}}" style="color:black;"> {{$suplier->email}}</a> </h3>
                                    
                                </div><!-- End .icon-box-content -->
                            </div><!-- End .icon-box -->
                        </div><!-- End .col-lg-4 col-sm-6 -->
                    </div><!-- End .row -->
                    <div class="row">
                     <div class="col text-center">

                        <a href="mailto:{{$suplier->email}}">
                           <button class="btn btn-primary" style="border-radius: 25px;">Request a Quote</button>
                        </a>

                        
                        
                        <button class="btn btn-primary" style="border-radius: 25px;" onclick="window.location.href='tel:{{$suplier->mobile}}';">Call the Vendor</button>


                    </div>
                </div>
                </div><!-- End .container -->
            </div><!-- End .page-content -->
            
            
        <div class="modal fade" id="signin-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="icon-close"></i></span>
                    </button>

                    <div class="form-box">
                        <div class="form-tab">
                            <ul class="nav nav-pills nav-fill" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="signin-tab" data-toggle="tab" href="#signin"
                                        role="tab" aria-controls="signin" aria-selected="true">Gallery</a>
                                </li>

                            </ul>
                            <div class="tab-content" id="tab-content-5">
                                <div class="tab-pane fade show active" id="signin" role="tabpanel"
                                    aria-labelledby="signin-tab">
                                    <div class="row">
                                        @foreach ($suppliers as $supplier)
                                        @if ($supplier->product_sample)
                                        @php
                                        $sampleImages = explode(',', $supplier->product_sample);
                                        @endphp
                                        @foreach ($sampleImages as $imageName)
                                        <div class="col-lg-4 col-sm-6">
                                            <div class="thumbnail">
                                                <img src="{{ asset('admin/product_image/' . $imageName) }}">
                                            </div>
                                        </div>
                                        @endforeach
                                        @endif
                                        @endforeach
                                    </div>
                                </div><!-- .End .tab-pane -->


                            </div><!-- End .tab-content -->


                        </div><!-- End .form-tab -->
                    </div><!-- End .form-box -->
                </div><!-- End .modal-body -->
            </div><!-- End .modal-content -->
        </div><!-- End .modal-dialog -->
        </div>
            
            
      @endforeach        
        </main><!-- End .main -->




@endsection