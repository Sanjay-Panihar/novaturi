
@extends('Admin.dashboardlayout.layout')
@section('content')
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>admins List</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
            <small>admin List</small>
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
                  <h3 class="box-title">{{$title}}</h3>
                </div><!-- /.box-header -->
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
                <div class="box-body">
                    
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Admin Id</th>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Mobile</th>
                        <th>Email/th>
                        <th>Status</th>
                        <th>Details</th>
                        
                      </tr>
                    </thead>
                    
                    <tbody>
                     @foreach($admins as $admin) 
                     <tr>
                      <td>{{ $admin['id'] }}</td>
                      <td>{{ $admin['name'] }}</td>
                      <td>{{ $admin['type'] }}</td>
                      <td>{{ $admin['mobile'] }}</td>
                      <td>{{ $admin['email'] }}</td>
                      <td>
                      @if($admin['admin_status'] == 1)
                      <a class="updateAdminStatus" id="admin-{{$admin['id']}}"
                      admin_id="{{$admin['id']}}" href="javascript:void(0)">
                        <i class="fa fa-bookmark" status="Active"></i>
                      </a>
                       
                      @else
                      <a class="updateAdminStatus" id="admin-{{$admin['id']}}"
                      admin_id="{{$admin['id']}}" href="javascript:void(0)">
                        <i class="fa fa-bookmark-o" status="Inactive"></i>
                      </a>
                      @endif
                      </td>
                      <td>
                        @if($admin['type']=="vendor")
                         <a href="{{url('view-vendor-details/'.$admin['id'])}}" role="button">
                          <i class="fa fa-bars"></i></a>
                        @endif 
                      </td>
                      </tr>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <script>
         $(document).ready(function(){
               $(document).on("click",".updateAdminStatus",function(){
    var status = $(this).children("i").attr("status");
    var admin_id = $(this).attr("admin_id");
    //console.log('CSRF Token:', $('meta[name="csrf-token"]').attr('content'));
    ///alert(admin_id);
    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},

        type:'POST',
        url:'/admin/update-admin-status',
        data:{status:status,admin_id:admin_id},
        success: function(resp) {
           // alert(resp);  
           if (resp['status']==0) {
             $("#admin-"+admin_id).html("<i class='fa fa-bookmark-o' status='Inactive'></i>")
           }
           else if(resp['status']==1) {
            $("#admin-"+admin_id).html("<i class='fa fa-bookmark' status='Active'></i>")
           }

        },
        error:function() {
            alert("Error");
        }
        
    })
});
});
        
        
    </script>

 
  </body>
</html>

@endsection
