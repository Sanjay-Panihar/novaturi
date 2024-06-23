@extends('frontlayout.frontlayout')
@section('content')
<main class="main">
   <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
      <div class="container">
      </div>
      <!-- End .container -->
   </nav>
   <!-- End .breadcrumb-nav -->
   <div>
      <div class="page-header page-header-big text-center" style="background-image: url('/img/banner/Feel Inspired.jpg')">
      </div>
      <!-- End .page-header -->
   </div>
   <!-- End .container -->
   <div class="row">
      <div class="col-12" style="background: rgb(98,212,221);background: linear-gradient(53deg, rgba(98,212,221,1) 0%, rgba(252,231,137,1) 74%);">
         <ol style="text-align: center; ">
            <li style="font-family: Playfair Display, serif;color: white;
               font-weight: 600;font-size: xx-large;">CELEBRATING EVERYDAY HEROES
            </li>
         </ol>
      </div>
   </div>
   <div class="container">
       <div class="row mt-5" >
           <div class="col-sm-6" >
               <div class="card" style="padding: 40px; border-radius: 20px; border: .1rem solid #000000; background:#feeee4;">
                   <div class="card-body"  style="padding:0px">
                      <img src="{{url("img/banner/Animal Welfare.jpg")}}" class="card-img-top" alt="..." style="height:150px">
                   </div>
               </div>
           </div>
           <div class="col-sm-6" style="">
               <div class="card" style="padding: 40px; border-radius: 20px; border: .1rem solid #000000; background:#DBAFCA;">
                   <div class="card-body"  style="padding:0px">
                      <img src="{{url("img/banner/Animal Welfare.jpg")}}" class="card-img-top" alt="..." style="height:150px">
                   </div>
               </div>
           </div>
       </div>
       <div class="row mt-2 mb-5" >
           <div class="col-sm-6" style="">
               <div class="card" style="padding: 40px; border-radius: 20px; border: .1rem solid #000000; background:#feeee4;">
                   <div class="card-body"  style="padding:0px">
                      <img src="{{url("img/banner/Animal Welfare.jpg")}}" class="card-img-top" alt="..." style="height:150px">
                   </div>
               </div>
           </div>
           <div class="col-sm-6" style="">
               <div class="card" style="padding: 40px; border-radius: 20px; border: .1rem solid #000000; background:#DBAFCA;">
                   <div class="card-body"  style="padding:0px">
                      <img src="{{url("img/banner/Animal Welfare.jpg")}}" class="card-img-top" alt="..." style="height:150px">
                   </div>
               </div>
           </div>
       </div>
       
   </div>
   
</main>
<!-- End .main -->
@endsection