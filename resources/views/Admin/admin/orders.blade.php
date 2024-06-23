@extends('Admin.dashboardlayout.layout')
@section('content')
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Products List</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- DATA TABLES -->
    <link href="../../plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
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
      
     
      <!-- Left side column. contains the logo and sidebar -->
     

      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Data Tables
            <small>Product List</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Data tables</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">


              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">All Products</h3>

                  
                  
                </div><!-- /.box-header -->
             
                <div class="box-body">
                    
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Order Id</th>
                        <th>Order Date</th>
                        <th>Customer Name</th>
                        <th>Customer Email</th>
                        <th>Ordered Products</th>
                        <th>Order Amount</th>
                        <th>Order Status</th>
                        <th>Payment Method</th>
                        <th>Actions</th>
                        
                      </tr>
                    </thead>
                    
                    <tbody>
                     @foreach($orders as $order) 
                     @if($order['order_products'])
                      <tr>
                        <td>{{ $order['id'] }}</td>
                        <td>{{date('y-m-d h:i:s',strtotime($order['created_at']));}}</td>
                        <td>{{ $order['name'] }}</td>
                        <td>{{ $order['email'] }}</td>
                        <td>@foreach($order['order_products'] as $product)
                            {{$product['product_code']}} , <br>(qty-{{$product['product_qty']}})

                            @endforeach
                        </td>
                        <td>{{ $order['grand_total'] }}</td>
                        <td>{{ $order['order_status'] }}</td>
                        <td>{{ $order['payment_method'] }}</td>
                        <td>
                          <a href="{{url('view/orders/'.$order['id'])}}" target="_blank" rel="">View Orders</a>
                           
                        </td>
                        
                        
                     @endif
                     @endforeach
                    </tbody>
                   
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
     
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.3 -->

 
  </body>
</html>

@endsection