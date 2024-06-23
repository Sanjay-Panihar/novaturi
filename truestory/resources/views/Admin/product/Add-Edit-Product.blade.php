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
               
               <div class="box box-warning  col-md-12">
                  <div class="box-header">
                     <h3 class="box-title">{{$title}}</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body ">
                     <form role="form" @if(empty($product['id'])) 
                     action="{{url('Add-Edit-Product')}}" @else action="{{url('Add-Edit-Product/'
                        .$product['id'])}}  @endif method="post" enctype="multipart/form-data">
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
                          <label>Select</label>
                          <select class="form-control" name="category_id" id="category_id">
                           <option>Select Options</option>
                           @foreach($categories as $section)
                             <optgroup label="{{$section['name']}}"></optgroup>
                             @foreach($section['categories'] as $category)
                              <option value="{{$category['id']}}">
                              &nbsp;&nbsp;&nbsp;--&nbsp;&nbsp;{{$category['category_name']}}
                              </option>
                             @endforeach
                            @endforeach 
                          </select>
                        </div>
                      
                        <div class="form-group col-md-6">
                           <label>Product name</label>
                           <input type="Name" name="product_name"   placeholder="Enter Product Name"
                           class="form-control" @if(!empty($product['product_name'] ))
                           value="{{$product['product_name']}}"   @else value="{{old('product_name')}}" @endif/>
                        </div>
                        <div class="form-group col-md-6">
                           <label>Product code</label>
                           <input type="Name" name="product_code"   placeholder="Enter Product Code"
                           class="form-control" @if(!empty($product['product_code'] ))
                           value="{{$product['product_code']}}"   @else value="{{old('product_code')}}" @endif/>
                        </div>
                       
                        <div class="form-group col-md-6">
                           <label>Product Color</label>
                           <input type="Name" name="product_color"   placeholder="Enter Product Color"
                           class="form-control" @if(!empty($product['product_color'] ))
                           value="{{$product['product_color']}}"   @else value="{{old('product_color')}}" @endif/>
                        </div>
                        
                        <div class="form-group col-md-6">
                           <label>Product Price</label>
                           <input type="Name" name="product_price"   placeholder="Enter Product Price"
                           class="form-control" @if(!empty($product['product_price'] ))
                           value="{{$product['product_price']}}"   @else value="{{old('product_price')}}" @endif/>
                        </div>

                        <div class="form-group col-md-6">
                           <label>Product Discount</label>
                           <input type="Name" name="product_discount"   placeholder="Enter Product Discount"
                           class="form-control" @if(!empty($product['product_discount'] ))
                           value="{{$product['product_discount']}}"   @else value="{{old('product_discount')}}" @endif/>
                        </div>

                        <div class="form-group col-md-6">
                           <label>Product Weight</label>
                           <input type="Name" name="product_weight"   placeholder="Enter Product weight"
                           class="form-control" @if(!empty($product['product_weight'] ))
                           value="{{$product['product_weight']}}"   @else value="{{old('product_weight')}}" @endif/>
                        </div>

                       
                        <div class="form-group">
                         <label>Description</label>
                          <textarea class="form-control" rows="3"name="description" placeholder="Enter Product description"
                          @if(!empty($product['description'] ))
                           value="{{$product['description']}}"   @else value="{{old('description')}}" @endif></textarea>
                       </div>
                       <div class="form-group">
                         <label>Short description</label>
                          <textarea class="form-control" rows="3"name="shortdescription" placeholder="Enter Short description"
                          @if(!empty($product['shortdescription'] ))
                           value="{{$product['shortdescription']}}"   @else value="{{old('shortdescription')}}" @endif></textarea>
                       </div>
                       

                       <div class="form-group col-md-6">
                           <label>Group Code</label>
                           <input type="Name" name="group_code"   placeholder="Group Code"
                           class="form-control" @if(!empty($product['group_code'] ))
                           value="{{$product['group_code']}}"   @else value="{{old('group_code')}}" @endif/>
                        </div>

                        <div class="form-group col-md-6">
                           <label>Meta Title</label>
                           <input type="Name" name="meta_title"   placeholder="Enter Product meta title"
                           class="form-control" @if(!empty($product['meta_title'] ))
                           value="{{$product['meta_title']}}"   @else value="{{old('meta_title')}}" @endif/>
                        </div>
                        <div class="form-group col-md-6">
                           <label>Meta Description</label>
                           <input type="Name" name="meta_description"   placeholder="Enter Product meta description"
                           class="form-control" @if(!empty($product['meta_description'] ))
                           value="{{$product['meta_description']}}"   @else value="{{old('meta_description')}}" @endif/>
                        </div>


                        
                        

                        <div class="form-group col-md-6">
                         <label>Set featured Product</label>
                          <select class="form-control"   name="is_featured"   placeholder="Enter Product is_featured"
                           class="form-control" @if(!empty($product['is_featured'] ))
                           value="{{$product['is_featured']}}"   @else value="{{old('is_featured')}}" @endif />
                           <option>Yes</option>
                           <option>No</option>
                         </select>
                        </div>
                        <div class="form-group">
                         <label>Refund&Return</label>
                          <textarea class="form-control" rows="3"name="refund_return" placeholder="Enter refund & return"
                          @if(!empty($product['refund_return'] ))
                           value="{{$product['refund_return']}}"   @else value="{{old('refund_return')}}" @endif></textarea>
                       </div>
                        
                        <div class="form-group col-md-6">
                           <label for="product_image">Product image</label>
                           <input type="file" name="product_image" id="product_image">
                           <p class="help-block">Image size must be 1000x1000</p>
                           @if(!empty($product['product_image']))
                           <a target="_blank" href=" ">View Image</a>
                           <input type="hidden" name="product_image" value="{{$product['product_image']}}">
                           @endif
                        </div>
                        <div class="form-group col-md-6">
                           <label>Meta Keywords</label>
                           <input type="Name" name="meta_keywords"   placeholder="Enter Product meta description"
                           class="form-control" @if(!empty($product['meta_keywords'] ))
                           value="{{$product['meta_keywords']}}"   @else value="{{old('meta_keywords')}}" @endif/>
                        </div>
                        
                        
                                              
                        <button type="submit"  class="btn btn-block btn-success btn-lg">Submit</button>
                     </form>
                  </div>
                  <!-- /.box-body -->
               </div>
            
              
            </div>
            <!--/.col (right) -->
         </div>
         <!-- /.row -->
      </section>
      <!-- /.content -->
   </div>
</body>
</head>
@endsection