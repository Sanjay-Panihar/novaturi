@extends('frontlayout.frontlayout')
@section('content')


<!-- Page Preloder -->




<script src="https://js.stripe.com/v3/"></script>
<link rel="stylesheet" href="{{ asset('css/style1.css') }}" />
<!-- Hero Section Begin -->

<!-- Hero Section End -->

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="{{ asset('img/banner-2.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Payment</h2>
                    <div class="breadcrumb__option">
                        <a href="/">Home</a>
                        <span>Payments</span>
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
                            <center>
                                <h3>Please Make payment for your order</h3>
                            </center>

                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog Section End -->
<center>
    <div class="page-content" style="margin-top:90px">
    <div class="checkout">
        <div class="container">
            <div class="">

            </div>

            <!-- End .checkout-discount -->



            <div class="row">
                <div class="col-lg-12">
                    <form name="amount" action="{{route('payment')}}" method="post" id="payment-form" style="border-radius: 5px;
    box-shadow: rgba(0, 0, 0, 0.25) 0px 14px 28px, rgba(0, 0, 0, 0.22) 0px 10px 10px;
    padding: 30px;
    width: 40%;"> @csrf

                        <div class="">
                            <div style="margin-bottom:15px">
                                <label for="card-element">
                                    Price
                                </label>
                                <p>
                                    <input type="text" name="amount"  style=" width: 290px; border-color: #f5f7f9; background-color: #f5f7f9; padding: 8px;box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px; border: none; color:#bec8d2;"
                                        value="{{round(Session::get('grand_total')/84,2)}}" readonly />
                                </p>
                            </div>
                            <div style="margin-bottom:15px">
                                <label for="card-element">
                                    Enter Email
                                </label>
                                <p><input type="email" name="email" placeholder=""  style=" width: 290px; color:#bec8d2; border-color: #f5f7f9; background-color: #f5f7f9; padding: 8px; box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px; border: none; "/></p>

                            </div>
                            <div>
                                <label for="card-element">
                                    Credit or debit card
                                </label>
                                <div id="card-element">
                                    <!-- A Stripe Element will be inserted here. -->
                                </div>

                            </div>



                            <!-- Used to display form errors. -->
                            <div id="card-errors" role="alert"></div>
                        </div>
                        <div style="margin-top:15px; "><p><button style="box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;
    padding: 8px 25px;
    border-radius: 5px;
    border: none;
    background-color: #5469d4;">Pay Now</button></p></div>
                        

                    </form>
                </div>
            </div>



        </div>
        <!-- End .container -->
    </div>
    <!-- End .checkout -->
</div>
</center>

<script>
    var publishable_key = 'pk_live_51KZZiqSEqxK4LNF303E9ctba0s2nOyEFi1U3icnPWpxpK4zuejW5pCHD0YLdgWSY6AYMcr6onx1GeTYT4KAKwPMU006anzhsZR';

</script>
<script src="{{ asset('js/card.js') }}"></script>


<!-- Footer Section Begin -->
@endsection