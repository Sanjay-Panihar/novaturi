@extends('Admin.dashboardlayout.layout')
@section('content')
<head>
    <meta charset="UTF-8">
    <title>AdminLTE 2 | Invoice</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
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
                <i class="fa fa-globe"></i>Vendor Details
                <small class="pull-right">Date: 2/10/2014</small>
              </h2>
            </div><!-- /.col -->
          </div>
          <!-- info row -->

          <!-- Table row -->
          <div class="row">
            <div class="col-xs-6 table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th></th>
                    <th>Personel Details</th>   
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Name</td>
                    <td>{{$vendorDetails['vendor_personal']['name']}}</td>
                  </tr>
                  <tr>
                    <td>Mobile</td>
                    <td>{{$vendorDetails['vendor_personal']['mobile']}}</td>
                  </tr>
                  <tr>
                    <td>Email</td>
                    <td>{{$vendorDetails['vendor_personal']['email']}}</td>
                  </tr>
                  <tr>
                    <td>Address</td>
                    <td>{{$vendorDetails['vendor_personal']['address']}}</td>
                  </tr>
                  <tr>
                    <td>City</td>
                    <td>{{$vendorDetails['vendor_personal']['city']}}</td>
                  </tr>
                  <tr>
                    <td>State</td>
                    <td>{{$vendorDetails['vendor_personal']['state']}}</td>
                  </tr>
                  <tr>
                    <td>Country</td>
                    <td>{{$vendorDetails['vendor_personal']['Country']}}</td>
                  </tr>
                  <tr>
                    <td>Pincode</td>
                    <td>{{$vendorDetails['vendor_personal']['pincode']}}</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="col-xs-6 table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th></th>
                    <th>Bank Details</th>   
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Account Holder Name</td>
                    <td>{{$vendorDetails['vendor_bank']['account_holder_name']}}</td>
                  </tr>
                  <tr>
                    <td>Bank Name</td>
                    <td>{{$vendorDetails['vendor_bank']['bank_name']}}</td>
                  </tr>
                  <tr>
                    <td>Account Number</td>
                    <td>{{$vendorDetails['vendor_bank']['account_number']}}</td> 
                  </tr>
                  <tr>
                    <td>Bank IFSC code</td>
                    <td>{{$vendorDetails['vendor_bank']['bank_ifsc_code']}}</td> 
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
                    <th></th>
                    <th>Business Details</th>   
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Business name</td>
                    <td>{{$vendorDetails['vendor_business']['Business_name']}}</td>
                  </tr>
                  <tr>
                    <td>Brand name</td>
                    <td>{{$vendorDetails['vendor_business']['Brand_name']}}</td>
                  </tr>
                  <tr>
                    <td>Business Category</td>
                    <td>{{$vendorDetails['vendor_business']['Business_Category']}}</td> 
                  </tr>
                  <tr>
                    <td>Gst Number</td>
                    <td>{{$vendorDetails['vendor_business']['Gst_number']}}</td> 
                  </tr>
                  <tr>
                    <td>Sell In Wholesale</td>
                    <td>{{$vendorDetails['vendor_business']['sell_in_wholesale']}}</td> 
                  </tr>
                  <tr>
                    <td>MOQ of Product</td>
                    <td>{{$vendorDetails['vendor_business']['moq_of_product']}}</td> 
                  </tr>
                  <tr>
                    <td>USP & Special Service</td>
                    <td>{{$vendorDetails['vendor_business']['usp_and_specialservice']}}</td> 
                  </tr>
                  <tr>
                    <td>Social facebook link</td>
                    <td>{{$vendorDetails['vendor_business']['facebook']}}</td> 
                  </tr>
                  <tr>
                    <td>Social instagram link</td>
                    <td>{{$vendorDetails['vendor_business']['instagram']}}</td> 
                  </tr>
                  <tr>
                    <td>Social twitter link</td>
                    <td>{{$vendorDetails['vendor_business']['twitter']}}</td> 
                  </tr>
                  <tr>
                    <td>Social linkedin link</td>
                    <td>{{$vendorDetails['vendor_business']['linkedin']}}</td> 
                  </tr>
                  <tr>
                    <td>Social youtube link</td>
                    <td>{{$vendorDetails['vendor_business']['youtube']}}</td> 
                  </tr>
                  <tr>
                    <td>Brand Brief</td>
                    <td>{{$vendorDetails['vendor_business']['brand']}}</td> 
                  </tr>
                  <tr>
                    <td>Service Details</td>
                    <td>{{$vendorDetails['vendor_business']['service']}}</td> 
                  </tr>
                  <tr>
                    <td>Website Link</td>
                    <td>{{$vendorDetails['vendor_business']['websitelink']}}</td> 
                  </tr>
                  <tr>
                    <td>Delivery Time</td>
                    <td>{{$vendorDetails['vendor_business']['delivery_time']}}</td> 
                  </tr>
                  <tr>
                    <td>Sustainability Practices</td>
                    <td>{{$vendorDetails['vendor_business']['sustainability_practices']}}</td> 
                  </tr>
                  <tr>
                    <td>Certificate</td>
                    <td>{{$vendorDetails['vendor_business']['certificate']}}</td> 
                  </tr>
                  <tr>
                    <td>Country</td>
                    <td>{{$vendorDetails['vendor_business']['Country']}}</td> 
                  </tr>
                  <tr>
                    <td>State</td>
                    <td>{{$vendorDetails['vendor_business']['state']}}</td> 
                  </tr>
                  <tr>
                    <td>City</td>
                    <td>{{$vendorDetails['vendor_business']['city']}}</td> 
                  </tr>
                  <tr>
                    <td>Email</td>
                    <td>{{$vendorDetails['vendor_business']['email']}}</td> 
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="col-xs-6 table-responsive">
              <table class="table table-striped">
              
              </table>
            </div>
          </div><!-- /.row -->

          <div class="row">
            <!-- accepted payments column -->
            
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