@extends('frontlayout.frontlayout')
@section('content')

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('img/banner/1.gif') }}">
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
    <div class="page-header text-center">
                <img src="{{ asset('img/banner/thanks.jpg') }}" class="img-fluid rounded-start" alt="Banner Image">
            </div>


            <div style="background-color:#e5e1e1; padding: 15px;">
                <div class="container">
                <div class="row">
                    <div class="col text-center">
                        <button class="btn btn-primary" style="border-radius: 25px;">
                            <a href="#signin-modal" data-toggle="modal" style="color:white;">Checkout Order Details</a>
                        </button>
                        <a href="/"  style="color:white;">
                            <button class="btn btn-primary" style="border-radius: 25px;">
                                 Continue Shopping
                            </button>
                        </a>
                           
                        

                    </div>
                </div>
                </div>   
            </div>

    

    <!-- Footer Section Begin -->
    @endsection   