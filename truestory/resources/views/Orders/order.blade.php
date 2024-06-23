@extends('frontlayout.frontlayout')
@section('content')





<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="{{ asset('img/banner-2.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Orders</h2>
                    <div class="breadcrumb__option">
                        <a href="{{url('/')}}">Home</a>
                        <span>Orders</span>
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

       
        <section class="h-100 gradient-custom">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-lg-12 col-xl-8">
                        <div class="card" style="border-radius: 10px;">

                            <div class="card-body p-4">
                                @foreach($orders as $order)
                                <div class="card shadow-0 border mb-4">
                                    <div class="card-body">
                                        
                                        <div class="row">
                                            <div class="col-md-2">
                                                <a href="{{url('user/orders/'.$order['id'])}}">{{$order['id']}}</a>
                                            </div>
                                            <div
                                                class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <p class="text-muted mb-0">@foreach($order['order_products'] as $product)
                                                      {{$product['product_code']}} ,

                                                        @endforeach
                                                </p>
                                            </div>
                                            <div
                                                class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <p class="text-muted mb-0 small">{{$order['payment_method']}}</p>
                                            </div>
                                            <div
                                                class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <p class="text-muted mb-0 small">{{$order['grand_total']}}</p>
                                            </div>
                                            <div
                                                class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <p class="text-muted mb-0 small">{{$order['created_at']}}</p>
                                            </div>
                                            <div
                                                class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <p class="text-muted mb-0 small"></p>
                                            </div>
                                        </div>
                                        
                                        <hr class="mb-4" style="background-color: #e0e0e0; opacity: 1;">
                                        <div class="row d-flex align-items-center">
                                            <div class="col-md-2">
                                                <p class="text-muted mb-0 small">Track Order</p>
                                            </div>
                                            <div class="col-md-10">
                                                <div class="progress" style="height: 6px; border-radius: 16px;">
                                                    <div class="progress-bar" role="progressbar"
                                                        style="width: 65%; border-radius: 16px; background-color: #a8729a;"
                                                        aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <div class="d-flex justify-content-around mb-1">
                                                    <p class="text-muted mt-1 mb-0 small ms-xl-5">Out for delivary</p>
                                                    <p class="text-muted mt-1 mb-0 small ms-xl-5">Delivered</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
</section>


<!-- Shoping Cart Section End -->

<!-- Footer Section Begin -->

<!-- Footer Section End -->

@endsection