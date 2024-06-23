@extends('frontlayout.frontlayout')
@section('content')


   
<section class="breadcrumb-section set-bg" data-setbg="{{ asset('img/banner-2.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Shopping Cart</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Shopping Cart</span>
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
                @include('Cart-items')
            </div>
                
        </div>
    </section>
    
    @endsection   