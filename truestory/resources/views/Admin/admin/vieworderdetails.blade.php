<?php use App\Models\Product; ?>
@extends('Admin.dashboardlayout.layout')
@section('content')

<head>
    <meta charset="UTF-8">
    <title>AdminLTE 2 | Invoice</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet"
        type="text/css" />
    <!-- Ionicons -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="../../dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="../../dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>

<body class="skin-blue">
    <div class="wrapper">




        <!-- Right side column. Contains the navbar and content of the page -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    <a href="{{url('AdminDashboard')}}">Back To Dashboard</a>
                    <small></small>
                </h1>
               

            </section>
            <!-- Main content -->
            <section class="invoice">
                <!-- title row -->
                <div class="row">
                    <div class="col-xs-12">
                        <h2 class="page-header">
                            Order Id :- {{$ordersDetails['id']}}

                        </h2>
                        <h4>{{date('y-m-d h:i:s',strtotime($ordersDetails['created_at']));}}</h4>
                        @if(Session::has('error_message'))
            <div class="alert alert-primary d-flex align-items-center" role="alert">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" 
                class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
              </svg>
               <div> Error:{{Session::get('error_message')}}</div>
            </div>
            @endif
            @if(Session::has('Success_message'))
            <div class="alert alert-primary d-flex align-items-center" role="alert">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" 
                class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
              </svg>
               <div> Success:{{Session::get('Success_message')}}</div>
            </div>
            @endif
                    </div><!-- /.col -->
                </div>
                <!-- info row -->

                <!-- Table row -->
                <div class="row">
                    <div class="col-xs-6 table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>

                                    <th>Order Details</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Order Status</td>
                                    <td>{{$ordersDetails['order_status']}}</td>
                                </tr>

                                <tr>
                                    <td>Order Total</td>
                                    <td>{{$ordersDetails['grand_total']}}</td>
                                </tr>
                                <tr>
                                    <td>shipping charges</td>
                                    <td>{{$ordersDetails['shipping_charges']}}</td>
                                </tr>
                                <tr>
                                    <td>payment method</td>
                                    <td>{{$ordersDetails['payment_method']}}</td>
                                </tr>
                                <tr>
                                    <td>payment Gateway </td>
                                    <td>{{$ordersDetails['payment_gateway']}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-xs-6 table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>

                                    <th>Customer Details</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Name</td>
                                    <td>{{$userDetails['name']}}</td>
                                </tr>
                                @if(!empty($userDetails['address']))
                                <tr>
                                    <td>Address</td>
                                    <td>{{$userDetails['address']}}</td>
                                </tr>
                                @endif
                                @if(!empty($userDetails['city']))
                                <tr>
                                    <td>city</td>
                                    <td>{{$userDetails['city']}}</td>
                                </tr>
                                @endif
                                @if(!empty($userDetails['state']))
                                <tr>
                                    <td>state</td>
                                    <td>{{$userDetails['state']}}</td>
                                </tr>
                                @endif
                                @if(!empty($userDetails['country']))
                                <tr>
                                    <td>country</td>
                                    <td>{{$userDetails['country']}}</td>
                                </tr>
                                @endif
                                @if(!empty($userDetails['pincode']))
                                <tr>
                                    <td>pincode</td>
                                    <td>{{$userDetails['pincode']}}</td>
                                </tr>
                                @endif
                                <tr>
                                    <td>mobile</td>
                                    <td>{{$userDetails['mobile']}}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>{{$userDetails['email']}}</td>
                                </tr>


                            </tbody>
                        </table>
                    </div>

                </div><!-- /.row -->

                <div class="row">
                    <!-- accepted payments column -->

                    <div class="col-xs-6 table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>

                                    <th>Delivery Details</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Name</td>
                                    <td>{{$ordersDetails['name']}}</td>
                                </tr>
                                @if(!empty($ordersDetails['address']))
                                <tr>
                                    <td>Address</td>
                                    <td>{{$ordersDetails['address']}}</td>
                                </tr>
                                @endif
                                @if(!empty($ordersDetails['city']))
                                <tr>
                                    <td>city</td>
                                    <td>{{$ordersDetails['city']}}</td>
                                </tr>
                                @endif
                                @if(!empty($ordersDetails['state']))
                                <tr>
                                    <td>state</td>
                                    <td>{{$ordersDetails['state']}}</td>
                                </tr>
                                @endif
                                @if(!empty($ordersDetails['country']))
                                <tr>
                                    <td>country</td>
                                    <td>{{$ordersDetails['country']}}</td>
                                </tr>
                                @endif
                                @if(!empty($ordersDetails['pincode']))
                                <tr>
                                    <td>pincode</td>
                                    <td>{{$ordersDetails['pincode']}}</td>
                                </tr>
                                @endif



                            </tbody>
                        </table>
                    </div>
                    <div class="col-xs-6 table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>

                                    <th>Order Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><form action="{{url('update-order-status')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="order_id" value="{{$ordersDetails['id']}}">
                                        <select name="order_status" required="">
                                        <option value="">Select</option>
                                        @foreach($orderStatuses as  $status)
                                        <option value="{{$status['name']}}">{{$status['name']}}</option>
                                        @endforeach
                                        </select>
                                        <button class="btn btn-primary" type="submit">
                                        Update</button>
                                    </form></td>
                                   
                                </tr>
               
                            </tbody>
                        </table>
                    </div>
                    
                </div><!-- /.row -->

                <div class="row">
                    <!-- accepted payments column -->
                    <div class="col-xs-12 table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Product Image</th>
                                    <th>Product code</th>
                                    <th>Product name</th>
                                    <th>Product Size</th>
                                    <th>Product color</th>
                                    <th>Product Qty</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($ordersDetails['order_products'] as $product)
                                <tr>
                                    <td>
                                        @php $getProductImage = Product::getProductImage($product['product_id']) @endphp
                                        <a target="_blank" href="{{url('product/'.$product['product_id'])}}">
                                            <img style="height: 70px;"
                                                src="{{ asset('admin/product_image/smallimage/' .$getProductImage) }}">
                                        </a>
                                    </td>
                                    <td>{{$product['product_code']}}</td>
                                    <td>{{$product['product_name']}}</td>
                                    <td>{{$product['product_size']}}</td>
                                    <td>{{$product['product_color']}}</td>
                                    <td>{{$product['product_qty']}}</td>
                                </tr>
                                @endforeach

                            </tbody>


                        </table>
                    </div>
                    <div class="col-xs-12 table-responsive">
                        <table class="table table-striped">
                            <button class="btn btn-primary pull-right" style="margin-right: 5px;">
                                <i class="fa fa-download"></i> Generate PDF</button>
                        </table>
                    </div>
                </div>


            </section><!-- /.content -->
            <div class="clearfix"></div>
        </div><!-- /.content-wrapper -->

    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.3 -->
    <script src="../../plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="../../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='../../plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/app.min.js" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js" type="text/javascript"></script>
</body>

@endsection