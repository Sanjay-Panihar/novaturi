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
      <div class="page-header page-header-big text-center" style="background-image: url('/img/banner/Share The Joy.jpg')">
      </div>
      <!-- End .page-header -->
   </div>
   <!-- End .container -->
   <div class="row">
      <div class="col-12" style="background: rgb(252,134,138); background: linear-gradient(53deg, rgba(252,134,138,1) 0%, rgba(174,130,251,1) 86%);">
         <ol style="text-align: center; ">
            <li style="font-family: Playfair Display, serif;color: white;
               font-weight: 600;font-size: xx-large;">BE GOOD DO GOOD
            </li>
         </ol>
      </div>
   </div>
   <div class="container mb-5">
      <div class="row mt-5" >
         
         <div class="col-sm-3 d-flex flex-column align-items-center">
            <div class="card" style="border-radius: 20px; width: 100%;">
               <div class="card-body" style="padding: 0px; display: flex; flex-direction: column; align-items: center;">
                  <img src="{{url('img/banner/Animal Welfare.jpg')}}" class="card-img-top" alt="..." style="width: 250px; height: 250px; border-radius: 50%;">
               </div>
            </div>
            <button type="button" class="btn btn-primary" style="margin-top: 15px; background:#ff9faa; border: none;
    border-radius: 15px; color:black;">Animal Welfare</button>
         </div>
         
         <div class="col-sm-3 d-flex flex-column align-items-center">
            <div class="card" style="border-radius: 20px; width: 100%;">
               <div class="card-body" style="padding: 0px; display: flex; flex-direction: column; align-items: center;">
                  <img src="{{url('img/banner/Education.jpg')}}" class="card-img-top" alt="..." style="width: 250px; height: 250px; border-radius: 50%;">
               </div>
            </div>
            <button type="button" class="btn btn-primary" style="margin-top: 15px; background:#ffc7a5; border: none;
    border-radius: 15px; color:black;">Education</button>
         </div>
         <div class="col-sm-3 d-flex flex-column align-items-center">
            <div class="card" style="border-radius: 20px; width: 100%;">
               <div class="card-body" style="padding: 0px; display: flex; flex-direction: column; align-items: center;">
                  <img src="{{url('img/banner/Human Welfare.jpg')}}" class="card-img-top" alt="..." style="width: 250px; height: 250px; border-radius: 50%;">
               </div>
            </div>
            <button type="button" class="btn btn-primary" style="margin-top: 15px; background:#ccc7fc; border: none;
    border-radius: 15px; color:black;">Human Welfare</button>
         </div>
         <div class="col-sm-3 d-flex flex-column align-items-center">
            <div class="card" style="border-radius: 20px; width: 100%;">
               <div class="card-body" style="padding: 0px; display: flex; flex-direction: column; align-items: center;">
                  <img src="{{url('img/banner/Others.jpg')}}" class="card-img-top" alt="..." style="width: 250px; height: 250px; border-radius: 50%;">
               </div>
            </div>
            <button type="button" class="btn btn-primary" style="margin-top: 15px; background:#feeee4; border: none;
    border-radius: 15px; color:black;">Others</button>
         </div>
         
      </div>
   </div>
</main>
<!-- End .main -->
@endsection