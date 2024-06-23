@extends('frontlayout.frontlayout')
@section('content')



<style>
    .card {
    box-shadow: 0 20px 27px 0 rgb(0 0 0 / 5%);
}
.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid rgba(0,0,0,.125);
    border-radius: 1rem;
}
.text-reset {
    --bs-text-opacity: 1;
    color: inherit!important;
}
a {
    color: #5465ff;
    text-decoration: none;
}
</style>

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="{{ asset('img/banner-2.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Orders Details</h2>
                    <div class="breadcrumb__option">
                        <a href="{{url('/')}}">Home</a>
                        <span>Order Details</span>
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
        <div class="container-fluid">

            <div class="container">
                <!-- Title -->
                <div class="d-flex justify-content-between align-items-center py-3">
                    <h2 class="h5 mb-0"><a href="#" class="text-muted"></a> Order #{{$orderDetails['id']}}</h2>
                </div>

                <!-- Main content -->
                <div class="row">
                    <div class="col-lg-8">
                        <!-- Details -->
                        <div class="card mb-4">
                            <div class="card-body">
                                
                                <div class="mb-3 d-flex justify-content-between">
                                    <div>
                                        <span class="me-3">{{date('y-m-d h:i:s',strtotime($orderDetails['created_at']));}}</span>
                                        
                                    </div>
                                    <div class="d-flex">
                                        
                                        <button class="btn btn-link p-0 me-3 d-none d-lg-block btn-icon-text"><i
                                                class=""></i> <span class="text">Order Status :- {{$orderDetails['order_status']}}</span></button>

                                        
                                    </div>
                                </div> 
                                <table class="table table-borderless">
                                    <tbody>
                                        @foreach($orderDetails['order_products'] as $product)
                                        <tr>
                                            <td>
                                                <div class="d-flex mb-2">
                                                    <div class="flex-shrink-0">
                                                        <img src="https://www.bootdey.com/image/280x280/87CEFA/000000"
                                                            alt="" width="35" class="img-fluid">
                                                    </div>
                                                    <div class="flex-lg-grow-1 ms-3">
                                                        <h6 class=" mb-0"><a href="#" class="text-reset">{{$product['product_name']}}</a></h6>
                                                        <span class="small">Color: {{$product['product_color']}}</span>    <span class="small">Size: {{$product['product_size']}}</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>Qty :-  {{$product['product_qty']}}</td> 
                                            <td class="text-end"> Product Code:-{{$product['product_code']}}</td>
                                        </tr>
                                        @endforeach
                                        
                                    </tbody>
                                    <tfoot>
                                       
                                            <td colspan="2">Shipping</td>
                                            <td class="text-end">{{$orderDetails['shipping_charges']}}</td>
                                        </tr>
                                        
                                        <tr class="fw-bold">
                                            <td colspan="2">TOTAL</td>
                                            <td class="text-end">{{$orderDetails['grand_total']}}</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <!-- Payment -->
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <h3 class="h6">Payment Method</h3>
                                        <p>{{$orderDetails['payment_method']}}<br></p>
                                    </div>
                                    <div class="col-lg-6">
                                        <h3 class="h6">Billing address</h3>
                                        <address>
                                            <strong>{{$orderDetails['name']}}</strong><br>
                                            {{$orderDetails['address']}},{{$orderDetails['city']}}<br>
                                            {{$orderDetails['state']}}, {{$orderDetails['country']}}<br>
                                            {{$orderDetails['pincode']}}
                                            <br>
                                            <abbr title="Phone">P:</abbr> {{$orderDetails['mobile']}}<br>
                                            <abbr title="Email">E:</abbr> {{$orderDetails['email']}}
                                        </address>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <!-- Customer Notes -->
                        <div class="card mb-4">
                            <div class="card-body">
                                <h3 class="h6">Customer Notes</h3>
                                <p>Thank you for choosing for your online shopping needs. We appreciate your trust and are delighted to have you as a part of our community.</p>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <!-- Shipping information -->
                            <div class="card-body">
                                <h3 class="h6">Shipping Information</h3>
                                <strong>ShipRocket</strong>
                                <span><a href="#" class="text-decoration-underline" target="_blank">FF1234567890</a> <i
                                        class="bi bi-box-arrow-up-right"></i> </span>
                                <hr>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




    </div>
</section>


<!-- Shoping Cart Section End -->

<!-- Footer Section Begin -->

<!-- Footer Section End -->

@endsection