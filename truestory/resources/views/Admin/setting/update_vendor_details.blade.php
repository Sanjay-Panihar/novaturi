@extends('Admin.dashboardlayout.layout')
@section('content')
<head>
   <style>
      @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
      *{
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins',sans-serif;
      }
      body{
      justify-content: center;
      align-items: center;
      }
      .container{
      max-width: 700px;
      width: 100%;
      background-color: #fff;
      padding: 25px 30px;
      border-radius: 5px;
      box-shadow: 0 5px 10px rgba(0,0,0,0.15);
      }
      .container .title{
      font-size: 25px;
      font-weight: 500;
      position: relative;
      }
      .container .title::before{
      content: "";
      position: absolute;
      left: 0;
      bottom: 0;
      height: 3px;
      width: 30px;
      border-radius: 5px;
      background: linear-gradient(135deg, #71b7e6, #9b59b6);
      }
      .content form .user-details{
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      margin: 20px 0 12px 0;
      }
      form .user-details .input-box{
      margin-bottom: 15px;
      width: calc(100% / 2 - 20px);
      }
      form .input-box span.details{
      display: block;
      font-weight: 500;
      margin-bottom: 5px;
      }
      .user-details .input-box input{
      height: 45px;
      width: 100%;
      outline: none;
      font-size: 16px;
      border-radius: 5px;
      padding-left: 15px;
      border: 1px solid #ccc;
      border-bottom-width: 2px;
      transition: all 0.3s ease;
      }
      .user-details .input-box input:focus,
      .user-details .input-box input:valid{
      border-color: #9b59b6;
      }
      form .gender-details .gender-title{
      font-size: 20px;
      font-weight: 500;
      }
      form .category{
      display: flex;
      width: 80%;
      margin: 14px 0 ;
      justify-content: space-between;
      }
      form .category label{
      display: flex;
      align-items: center;
      cursor: pointer;
      }
      form .category label .dot{
      height: 18px;
      width: 18px;
      border-radius: 50%;
      margin-right: 10px;
      background: #d9d9d9;
      border: 5px solid transparent;
      transition: all 0.3s ease;
      }
      #dot-1:checked ~ .category label .one,
      #dot-2:checked ~ .category label .two,
      #dot-3:checked ~ .category label .three{
      background: #9b59b6;
      border-color: #d9d9d9;
      }
      form input[type="radio"]{
      display: none;
      }
      form .button{
      height: 45px;
      margin: 35px 0
      }
      form .button input{
      height: 100%;
      width: 100%;
      border-radius: 5px;
      border: none;
      color: #fff;
      font-size: 18px;
      font-weight: 500;
      letter-spacing: 1px;
      cursor: pointer;
      transition: all 0.3s ease;
      background: linear-gradient(135deg, #71b7e6, #9b59b6);
      }
      form .button input:hover{
      /* transform: scale(0.99); */
      background: linear-gradient(-135deg, #71b7e6, #9b59b6);
      }
      @media(max-width: 584px){
      .container{
      max-width: 100%;
      }
      form .user-details .input-box{
      margin-bottom: 15px;
      width: 100%;
      }
      form .category{
      width: 100%;
      }
      .content form .user-details{
      max-height: 300px;
      overflow-y: scroll;
      }
      .user-details::-webkit-scrollbar{
      width: 5px;
      }
      }
      @media(max-width: 459px){
      .container .content .category{
      flex-direction: column;
      }
      }
   </style>
</head>   
<body>
   <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
         <h1>
            General Form Elements
            <small>Preview</small>
         </h1>
         <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Forms</a></li>
            <li class="active">General Elements</li>
         </ol>
      </section>
      <!-- Main content -->
      <section class="content">
         <div class="row">
            <!-- left column --><!--/.col (left) -->
            <!-- right column -->
            <div class="col-md-6">
               <!-- general form elements disabled -->
               @if($slug=="personal")
               <div class="box box-warning">
                  <div class="box-header">
                     <h3 class="box-title">Personel Details</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                     <form role="form" action="{{url('update-vendor-details/personal')}}" method="post">
                        @csrf
                        @if(Session::has('error_message'))
                        <div class="alert alert-primary d-flex align-items-center" role="alert">
                           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" 
                              class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                              <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                           </svg>
                           <div> Error:{{Session::get('error_message')}}</div>
                        </div>
                        @endif
                        @if(Session::has('success_message'))
                        <div class="alert alert-primary d-flex align-items-center" role="alert">
                           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" 
                              class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                              <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                           </svg>
                           <div> Success:{{Session::get('success_message')}}</div>
                        </div>
                        @endif
                        <div class="form-group">
                           <label>Vendor email</label>
                           <input type="email" name="email" class="form-control" 
                              value="{{Auth::guard('admin')->user()->email}}" />
                        </div>
                        <div class="form-group">
                           <label for="exampleInputFile">Photo</label>
                           <input type="file" name="vendor_image" id="vendor_image">
                           <p class="help-block"></p>
                           
                        </div>
                        
                        <div class="form-group">
                           <label>Vendor Name</label>
                           <input type="Name" name="vendor_name"  class="form-control"
                              value="{{Auth::guard('admin')->user()->name}}" />
                        </div>
                        <div class="form-group">
                           <label>Phone</label>
                           <input type="number" name="vendor_mobile"  class="form-control" 
                              value="{{$vendorDetails['mobile']}}" />
                        </div>
                        <div class="form-group">
                           <label>Address</label>
                           <input type="text" name="vendor_address"  class="form-control"
                              value="{{$vendorDetails['address']}}" />
                        </div>
                        <div class="form-group">
                           <label>City</label>
                           <input type="text" name="vendor_city"  class="form-control" 
                              value="{{$vendorDetails['city']}}" />
                        </div>
                        
                        <div class="form-group">
                          <label>Country</label>
                           <select class="form-control" name="vendor_country">
                            <option>India</option>
                            <option>Nepal</option>
                            <option>Bangladesh </option>
                            
                            
                           </select>
                        </div>
                        <div class="form-group">
                           <label>State</label>
                           <input type="text" name="vendor_state" class="form-control" 
                              value="{{$vendorDetails['state']}}" />
                        </div>
                        <div class="form-group">
                           <label>Pin Code</label>
                           <input type="text" name="vendor_pincode"  class="form-control"
                              value="{{$vendorDetails['pincode']}}" />
                        </div>
                        <button type="submit"  class="btn btn-block btn-success btn-lg">Submit</button>
                     </form>
                  </div>
                  <!-- /.box-body -->
               </div>
               @endif 

               @if($slug=="business")
               
               <div class="box box-warning  col-md-12">
                  <div class="box-header">
                     <h3 class="box-title">Business Details</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body ">
                     <form role="form" action="{{url('update-vendor-details/business')}}" 
                     method="post"  enctype="multipart/form-data">
                        @csrf
                         @if(Session::has('error_message'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                           <div> Error:{{Session::get('error_message')}}</div>
                        </div>
                        @endif
                        @if(Session::has('success_message'))
                        <div class="alert alert-priflexmary d- align-items-center" role="alert">
                           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" 
                              class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                              <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                           </svg>
                           <div> Success:{{Session::get('success_message')}}</div>
                        </div>
                        @endif

                        <div class="form-group col-md-6">
                           <label>Vendor email</label>
                           <input type="email" name="email" class="form-control" 
                              value="{{Auth::guard('admin')->user()->email}}" />
                        </div>
                       
                        <div class="form-group col-md-6">
                           <label>Business name</label>
                           <input type="Name" name="Business_name"  class="form-control"
                           value="{{ $vendorDetails['Business_name']  }}"  />
                           
                        </div>
                        
                        <div class="form-group col-md-6">
                           <label>Brand name</label>
                           <input type="Name" name="Brand_name"  class="form-control"
                              value="{{$vendorDetails['Brand_name']}} " />
                        </div>

                        
                        <div class="form-group col-md-6">
                           <label>Select Vendor Type</label>
                              <select class="form-control" id="vendorType" name="vendorType">
                                 <option value="Supplier">Supplier</option>
                                 <option value="Freelancer">Freelancer</option>
                              </select>
                        </div>
                        <div class="form-group">
                           <label>Select Business Category</label>
                              <select class="form-control" name="Business_Category[]" multiple>
                                 <!-- Optionsbe will  dynamically added here -->
                              </select>
                        </div>
                        <div class="form-group">


                       
                         
                        <div class="form-group">
                           <label for="Business_catalogue">Business catalogue</label>
                           <input type="file" name="Business_catalogue" id="Business_catalogue">
                           <p class="help-block">Example block-level help text here.</p>
                           @if(!empty($vendorDetails['Business_catalogue']))
                           <a target="_blank" href="{{url('admin/Businesscatalogue/'.$vendorDetails['Business_catalogue'])}}">View Image</a>
                           <input type="hidden" name="Businesscatalogue" value="{{$vendorDetails['Business_catalogue']?? ''}}">
                           @endif
                        </div>
                        
                        
                        <div class="form-group">
                          <label for="product_sample">Product sample</label>
                          <input type="file" id="product_sample" name="product_sample[]" multiple>
                          <p class="help-block">Upload product image (multiple)</p>
                        </div>
                        
                        <div class="form-group">
                          <label for="product_sample">Logo</label>
                          <input type="file" id="logo" name="logo" multiple>
                          <p class="help-block">Upload logo image</p>
                        </div>

                        <div class="form-group col-md-6">
                           <label>GST Number</label>
                           <input type="text" name="Gst_number"  class="form-control" 
                              value="{{$vendorDetails['Gst_number']}}" />
                        </div>
                        
                        
                        <div class="form-group col-md-6">
                           <label>City</label>
                           <input type="text" name="city"  class="form-control" 
                              value="{{$vendorDetails['city']}}" />
                        </div>
                        <div class="form-group col-md-6">
                           <label>Country</label>
                           <input type="text"  name="Country" class="form-control" 
                              value="{{$vendorDetails['Country']?? ''}}"/>
                        </div>
                        <div class="form-group col-md-6">
                           <label>State</label>
                           <input type="text" name="state" class="form-control" 
                              value="{{$vendorDetails['state']?? ''}}" />
                        </div>
                        
                        <div class="form-group col-md-6">
                           <label> Sell in wholesale</label>
                              <select class="form-control" name="sell_in_wholesale">
                                 <option>Yes</option>
                                 <option>No</option>
                              </select>
                        </div>
                        <div class="form-group col-md-6">
                          <label>MOQ for your product </label>
                           <select class="form-control" name="moq_of_product">
                            <option>0-10</option>
                            <option>10-20</option>
                            <option>20-50</option>
                            <option>100-500</option>
                            <option>500-1000</option>
                            <option>1000 and above</option>
                            
                           </select>
                        </div>
                        
                        <div class="form-group col-md-6">
                           <label>website link</label>
                           <input type="text" name="websitelink"  class="form-control"
                              value="{{$vendorDetails['websitelink']?? ''}}" />
                        </div>
                        <div class="form-group col-md-6">
                           <label>Facebook link</label>
                           <input type="text" name="facebook"  class="form-control"
                              value="{{$vendorDetails['facebook']?? ''}}" />
                        </div>
                        <div class="form-group col-md-6">
                           <label>Instagram link</label>
                           <input type="text" name="instagram"  class="form-control"
                              value="{{$vendorDetails['instagram']?? ''}}" />
                        </div>
                        <div class="form-group col-md-6">
                           <label>Twitter link</label>
                           <input type="text" name="twitter"  class="form-control"
                              value="{{$vendorDetails['twitter']?? ''}}" />
                        </div>
                        <div class="form-group col-md-6">
                           <label>Linkedin link</label>
                           <input type="text" name="linkedin"  class="form-control"
                              value="{{$vendorDetails['linkedin']?? ''}}" />
                        </div>
                        <div class="form-group col-md-6">
                           <label>Youtube link</label>
                           <input type="text" name="youtube"  class="form-control"
                              value="{{$vendorDetails['youtube']?? ''}}" />
                        </div>
                        <div class="form-group col-md-6">
                           <label>Delivery time</label>
                           <input type="text" name="delivery_time"  class="form-control"
                              value="{{$vendorDetails['delivery_time']?? ''}}" />
                        </div>
                        <div class="form-group col-md-6">
                           <label>certificate</label>
                           <input type="text" name="certificate"  class="form-control"
                              value="{{$vendorDetails['certificate']?? ''}}" />
                        </div>
                        
                        <div class="form-group">
                         <label>Brand Brief</label>
                          <textarea class="form-control" rows="3"name="brand" placeholder="Enter Brand Brief"
                          ></textarea>
                       </div>
                       
                       <div class="form-group">
                         <label>Service Details</label>
                          <textarea class="form-control" rows="3"name="service" placeholder="Enter Service Details"
                          ></textarea>
                       </div>
                        

                        
                        

                                              
                        <button type="submit"  class="btn btn-block btn-success btn-lg">Submit</button>
                     </form>
                  </div>
                  <!-- /.box-body -->
               </div>
            
               @endif 
               @if($slug=="bank")
               <div class="box box-warning  col-md-12">
                  <div class="box-header">
                     <h3 class="box-title">Business Details</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body ">
                     <form role="form" action="{{url('update-vendor-details/bank')}}" method="post">
                        @csrf
                         @if(Session::has('error_message'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                           <div> Error:{{Session::get('error_message')}}</div>
                        </div>
                        @endif
                        @if(Session::has('success_message'))
                        <div class="alert alert-primary d-flex align-items-center" role="alert">
                           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" 
                              class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                              <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                           </svg>
                           <div> Success:{{Session::get('success_message')}}</div>
                        </div>
                        @endif



                        <div class="form-group">
                           <label>Account holder name</label>
                           <input type="Name" name="account_holder_name"  class="form-control"
                           value="{{$vendorDetails['account_holder_name']}}"  />
                        </div>
                        <div class="form-group">
                           <label>Bank name</label>
                           <input type="Name" name="bank_name"  class="form-control"
                              value="{{$vendorDetails['bank_name']}} " />
                        </div>
                        <div class="form-group">
                           <label>Account number</label>
                           <input type="Name" name="account_number"  class="form-control"
                              value="{{$vendorDetails['account_number']}} " />
                        </div>
                          
                        
                        <div class="form-group">
                           <label>Bank IFSC code</label>
                           <input type="text" name="bank_ifsc_code"  class="form-control"
                              value="{{$vendorDetails['bank_ifsc_code']}}" />
                        </div>
                        <button type="submit"  class="btn btn-block btn-success btn-lg">Submit</button>
                        </form>
                  </div>
                  <!-- /.box-body -->
               </div>
               
               @endif 
            </div>
            <!--/.col (right) -->
         </div>
         <!-- /.row -->
      </section>
      <!-- /.content -->
   </div>
</body>

@endsection