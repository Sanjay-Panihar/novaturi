@extends('frontlayout.frontlayout')
@section('content')

       <main class="main">
            <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
                <div class="container">
                    
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->
            <div>
	        	<div class="page-header page-header-big text-center" style="background-image: url('/img/banner/Contact Us.jpg')">
        			
	        	</div><!-- End .page-header -->
            </div><!-- End .container -->
            <div class="container mb-5 mt-2">
               <div class="row">
                    <div class="col-5 d-flex justify-content-end">
                        <img src="{{url('img/banner/instagram (2).png')}}" alt="" style="height:80px">
                    </div>
                    <div class="col-2 d-flex justify-content-center">
                        <img src="{{url('img/banner/whatsapp.png')}}" alt="" style="height:80px">
                    </div>
                    <div class="col-5 d-flex justify-content-start">
                        <img src="{{url('img/banner/email.png')}}" alt="" style="height:80px">
                    </div>

                    
                </div>
            </div>
            <div class="page-content pb-0">
                <div class="container">
                	<div class="row">
                		<div class="col-lg-6 mb-2 mb-lg-0" style="padding:30px;">
                			
                			<div class="row">
                			    <img src="{{url('img/banner/Contact Us (1).jpg')}}" alt="" style="">
                				
                			</div><!-- End .row -->
                		</div><!-- End .col-lg-6 -->
                		<div class="col-lg-6" style="padding:30px;">
                			<h2 class="title mb-1">Got Any Questions?</h2><!-- End .title mb-2 -->
                			<p class="mb-2">Use the form below to get in touch with the sales team</p>

                			<form action="#" class="contact-form mb-3">
                				<div class="row">
                					<div class="col-sm-12">
                                        <label for="cname" class="sr-only">Name</label>
                						<input type="text" class="form-control" id="cname" placeholder="Name *" required   style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                					</div><!-- End .col-sm-6 -->

                					<div class="col-sm-12">
                                        <label for="cemail" class="sr-only">Email</label>
                						<input type="email" class="form-control" id="cemail" placeholder="Email *" required  style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                					</div><!-- End .col-sm-6 -->
                				</div><!-- End .row -->


                                <label for="cmessage" class="sr-only">Message</label>
                				<textarea class="form-control" cols="30" rows="4" id="cmessage" required placeholder="Message *" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;"></textarea>

                				<button type="submit" class="btn btn-outline-primary-2 btn-minwidth-sm" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                					<span>SUBMIT</span>
            						<i class="icon-long-arrow-right"></i>
                				</button>
                			</form><!-- End .contact-form -->
                		</div><!-- End .col-lg-6 -->
                	</div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .page-content -->
            
            <div class="container">
               <div class="row">
                   <div class="col d-flex justify-content-center">
                    <img src="{{url('img/banner/whytruestory.jpg')}}" alt="" style="height:400px">
                </div>
                   <div class="col ">
                    
                        <div class="row" style="margin-top:150px">
                            <div class="col" style="display:flex;">
                                <img src="{{url('img/banner/email (1).png')}}" alt="" style="height:40px"><h4 style="margin: 8px;">info@truestory.in</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col" style="display:flex;">
                                <img src="{{url('img/banner/whatsapp.png')}}" alt="" style="height:40px"><h4 style="margin: 8px;">+91 75065 26252</h4>
                            </div>
                        </div>
                  
                </div>
                </div>
            </div>
            
            <div style="background-color:#010101; padding: 15px;">    
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
                                "items":7
                            },
                            "1280": {
                                "items":7,
                                "nav": true,
                                "dots": false
                            }
                        }
                    }'>
                    <a href="" class="brand">
                         <div>
                            <h4 style="font-size: 1.4rem; padding-top: 2rem; color: white;">TRULY CURATED </h4>   
                        </div>
                       <center><img src="{{asset('img/banner/icon/1 (2).jpg')}}" alt="Brand Name" style="height: 100px;"></center> 
                       
                        
                    </a>
                                      
                    <a href="" class="brand">
                         <div>
                            <h4 style="font-size: 1.4rem; padding-top: 2rem; color: white;">CUSTOMER SUPPORT </h4>   
                        </div>
                       <center><img src="{{asset('img/banner/icon/2 (1).jpg')}}" alt="Brand Name" style="height: 100px;"></center> 

                        
                    </a>                  

                    <a href="" class="brand">
                         <div>
                            <h4 style="font-size: 1.4rem; padding-top: 2rem;     color: white;">GLOBAL SHIPPING </h4>   
                        </div>
                       <center><img src="{{asset('img/banner/icon/3.jpg')}}" alt="Brand Name" style="height: 100px;"></center> 
                        
                        
                    </a>
                    <a href="" class="brand">
                         <div>
                            <h4 style="font-size: 1.4rem; padding-top: 2rem;     color: white;">RETURNS & EXCHANGE </h4>   
                        </div>
                       <center><img src="{{asset('img/banner/icon/4.jpg')}}" alt="Brand Name" style="height: 100px;"></center> 

                        
                    </a> 
                    <a href="" class="brand">
                         <div>
                            <h4 style="font-size: 1.4rem; padding-top: 2rem;     color: white;">VERIFIED NGO’S </h4>   
                        </div>
                       <center><img src="{{asset('img/banner/icon/5.jpg')}}" alt="Brand Name" style="height: 100px;"></center> 
                        
                        
                    </a>
                    <a href="" class="brand">
                         <div>
                            <h4 style="font-size: 1.4rem; padding-top: 2rem;     color: white;">CIRCULAR LIFESTYLE </h4>   
                        </div>
                       <center><img src="{{asset('img/banner/icon/6.jpg')}}" alt="Brand Name"style="height: 100px;"></center> 

                        
                    </a> 
                    <a href="" class="brand">
                         <div>
                            <h4 style="font-size: 1.4rem; padding-top: 2rem;     color: white;">REAL STORIES </h4>   
                        </div>
                       <center><img src="{{asset('img/banner/icon/7 (1).jpg')}}" alt="Brand Name" style="height: 100px;"></center> 
                        
                        
                    </a>                    
                    
                </div><!-- End .owl-carousel -->
            </div>
            </div>
        </main><!-- End .main -->


@endsection