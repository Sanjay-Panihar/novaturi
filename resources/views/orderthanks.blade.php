@extends('frontlayout.frontlayout')
@section('content')


    <!-- Page Preloder -->
   



    <!-- Hero Section Begin -->

    <!-- Hero Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('img/banner-2.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Thanks</h2>
                        <div class="breadcrumb__option">
                            <a href="/">Home</a>
                            <span>Thanks</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
  
    <!-- Breadcrumb Section End -->

    <!-- Blog Section Begin -->
    <section class="blog spad">
        <div class="container">
            <div class="row">
                
                <div class="col-lg-12 col-md-12">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="blog__item">
                                <h3>YOUR ORDER HAS BEEN PLACED SUCCESSFULLY</h3>
                                <p>Your order number is {{Session::get('order_id')}}
                                    and Total amount is INR {{Session::get('grand_total')}}</p>
                            </div>
                        </div>
                        
                       
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->

    <!-- Footer Section Begin -->
    @endsection   