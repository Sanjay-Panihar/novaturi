@extends('frontlayout.frontlayout')
@section('content')


<main class="main">
     @foreach ($events as $event)
        	<div class="page-header text-center">
                <img src="{{ isset($event) && $event->banner_image ? asset('admin/product_image/largeimage/' . $event->banner_image) : '' }}" class="img-fluid rounded-start" alt="Banner Image">
            </div>


            <div style="background-color:#e5e1e1; padding: 15px;">
                <div class="container">
                <div class="row">
                    <div class="col text-center">
                        <button class="btn btn-primary" style="border-radius: 25px;">
                            <a href="#signin-modal" data-toggle="modal" style="color:white;"  >Event Photos</a>
                        </button>
                        <button class="btn btn-primary" style="border-radius: 25px;">
                            <a href="#highlight-modal" data-toggle="modal" style="color:white;"  >Highlights</a>
                        </button>
                           
                        

                    </div>
                </div>
                </div>   
            </div>
            



            <div class="page-content pb-3">
                <div class="">
                    <div class="row justify-content-center" style="padding: 25px;">
                        <div class="col-lg-4 col-sm-6">
                            <div class="icon-box icon-box-sm text-center">
                                
                                <div class="icon-box-content">
                                    <h3 class="icon-box-title"><span style="border-radius: 20px; padding: 0px 10px; background-color: #7ebfb7; margin-right: 10px; font-weight: 600; font-size: x-large;">Event Name</span>{{ $event->title }}</h3><!-- End .icon-box-title -->
                                </div><!-- End .icon-box-content -->
                            </div><!-- End .icon-box -->
                        </div><!-- End .col-lg-4 col-sm-6 -->

                        <div class="col-lg-4 col-sm-6">
                            <div class="icon-box icon-box-sm text-center">
                                <div class="icon-box-content">
                                    <h3 class="icon-box-title"><span style="border-radius: 20px; padding: 0px 10px; background-color: #7ebfb7; margin-right: 10px; font-weight: 600; font-size: x-large;">Location</span>{{ $event->venue }}</h3><!-- End .icon-box-title -->
                                </div><!-- End .icon-box-content -->
                            </div><!-- End .icon-box -->
                        </div><!-- End .col-lg-4 col-sm-6 -->

                        <div class="col-lg-4 col-sm-6">
                            <div class="icon-box icon-box-sm text-center">
                                
                                <div class="icon-box-content">
                                    <h3 class="icon-box-title"><span style="border-radius: 20px; padding: 0px 10px; background-color: #7ebfb7; margin-right: 10px; font-weight: 600; font-size: x-large;">Listed by</span>{{$event->listedby }}</h3><!-- End .icon-box-title --> 
                                </div><!-- End .icon-box-content -->
                            </div><!-- End .icon-box -->
                        </div><!-- End .col-lg-4 col-sm-6 -->
                    </div><!-- End .row -->
                    <h2 class="title text-center" style="padding: 15px; background: #fff2c1;">Event Brief</h2><!-- End .title text-center mb-2 -->
                    <div class="row">
                        <div class="col-lg-12 offset-lg-1" style="margin:0px; padding: 30px;">
                            <div class="about-text text-center ">
                                
                                <p>{{$event->description }}</p>

                            </div><!-- End .about-text -->
                        </div><!-- End .col-lg-10 offset-1 -->
                    </div><!-- End .row -->
                    <h2 class="title text-center " style="padding: 15px; background: #beefd8;">Terms and Conditions</h2><!-- End .title text-center mb-2 -->
                    <div class="row">
                        <div class="col-lg-12 offset-lg-1" style="margin:0px; padding: 30px;">
                            <div class="about-text text-center">
                                
                                <p>{{$event->tandc }}</p>

                            </div><!-- End .about-text -->
                        </div><!-- End .col-lg-10 offset-1 -->
                    </div><!-- End .row -->
                    <h2 class="title text-center " style="padding: 15px; background: #faafc6;">Event Details</h2><!-- End .title text-center mb-2 -->
                    <div class="row justify-content-center" style="padding: 25px;">
                        <div class="col-lg-4 col-sm-6">
                            <div class="icon-box icon-box-sm text-center">
                                
                                <div class="icon-box-content">
                                    <h3 class="icon-box-title"><span style="border-radius: 20px; padding: 0px 10px;  margin-right: 10px; font-weight: 600; ">Date -</span>{{$event->date}}</h3><!-- End .icon-box-title -->
                                </div><!-- End .icon-box-content -->
                            </div><!-- End .icon-box -->
                        </div><!-- End .col-lg-4 col-sm-6 -->

                        <div class="col-lg-4 col-sm-6">
                            <div class="icon-box icon-box-sm text-center">
                                <div class="icon-box-content">
                                    <h3 class="icon-box-title"><span style="border-radius: 20px; padding: 0px 10px;  margin-right: 10px; font-weight: 600; ">Timings -</span>{{$event->time}}</h3><!-- End .icon-box-title -->
                                </div><!-- End .icon-box-content -->
                            </div><!-- End .icon-box -->
                        </div><!-- End .col-lg-4 col-sm-6 -->

                        <div class="col-lg-4 col-sm-6">
                            <div class="icon-box icon-box-sm text-center">
                                
                                <div class="icon-box-content">
                                    <h3 class="icon-box-title"><span style="border-radius: 20px; padding: 0px 10px;  margin-right: 10px; font-weight: 600;">Location -</span>{{$event->venue}}</h3><!-- End .icon-box-title --> 
                                </div><!-- End .icon-box-content -->
                            </div><!-- End .icon-box -->
                        </div><!-- End .col-lg-4 col-sm-6 -->
                    </div><!-- End .row -->
                    <h2 class="title text-center " style="padding: 15px; background: #f6b186;">Booking For The Event</h2><!-- End .title text-center mb-2 -->
                    <div class="row justify-content-center" style="padding: 25px;">
                        <div class="col-lg-6 col-sm-6">
                            <div class="icon-box icon-box-sm text-center">
                                 <div class="icon-box-content">
                                     <h3 class="icon-box-title">
                                        <span style="border-radius: 20px; padding: 0px 10px; margin-right: 10px; font-weight: 600;">Email -</span>
                                         <a href="mailto:{{$event->emailforbookings}}">{{$event->emailforbookings}}</a>
                                     </h3>
                                      <!-- End .icon-box-title -->
                                 </div>
                              <!-- End .icon-box-content -->
                            </div>
                            <!-- End .icon-box -->
                        </div>
                        <!-- End .col-lg-6 col-sm-6 -->


                        <div class="col-lg-6 col-sm-6">
                            <div class="icon-box icon-box-sm text-center">
                                <div class="icon-box-content">
                                    <h3 class="icon-box-title">
                                        <span style="border-radius: 20px; padding: 0px 10px; margin-right: 10px; font-weight: 600;">Contact -</span>
                                        <a href="tel:{{$event->contactforbookings}}">{{$event->contactforbookings}}</a>
                                    </h3>
                                    <!-- End .icon-box-title -->
                                </div>
                                <!-- End .icon-box-content -->
                            </div>
                        </div>


                        
                    </div><!-- End .row -->
                    
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
                                    <a class="nav-link active" id="signin-tab" data-toggle="tab" href="#signin" role="tab" aria-controls="signin" aria-selected="true">Event Photos</a>
                                </li>

                            </ul>
                            <div class="tab-content" id="tab-content-5">
                                <div class="tab-pane fade show active" id="signin" role="tabpanel" aria-labelledby="signin-tab">
                                    <div class="row">
                                     @foreach (json_decode($event->event_images) as $eventImage)
		                              <div class="col-lg-4 col-sm-6">
		                                <div class="thumbnail">
				                            <img src="{{ asset('admin/product_image/largeimage/' . $eventImage) }}" alt="Event Image">
 
			                            </div>
		                              </div>
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
        <div class="modal fade" id="highlight-modal" tabindex="-1" role="dialog" aria-hidden="true">
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
                                <a class="nav-link active" id="signin-tab" data-toggle="tab" href="#signin" role="tab" aria-controls="signin" aria-selected="true">Highlights</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="tab-content-5">
                            <div class="tab-pane fade show active" id="signin" role="tabpanel" aria-labelledby="signin-tab">
                                <div class="row">
                                    @if(isset($event) && isset($event->highlight))
                                        @foreach (json_decode($event->highlight) as $highlightImage)
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="thumbnail">
                                                    <img src="{{ asset('admin/product_image/largeimage/' . $highlightImage) }}" alt="Highlight Image">
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
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