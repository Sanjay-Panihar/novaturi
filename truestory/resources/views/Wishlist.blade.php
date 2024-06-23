@extends('frontlayout.frontlayout')
@section('content')


   
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
   
    <!-- Hero Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('img/banner-2.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Wishlist</h2>
                        <div class="breadcrumb__option">
                            <a href="{{url('/')}}">Home</a>
                            <span>Wishlist</span>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">  
       
            <div id="appendCartItems">
                @include('Wishlist-items')
            </div>
                
        </div>
    </section>
    <!-- Shoping Cart Section End -->

    <!-- Footer Section Begin -->

    <!-- Footer Section End -->
    
    @endsection   