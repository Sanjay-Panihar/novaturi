@extends('frontlayout.frontlayout')
@section('content')

<style>
    p {
    padding: 10px;
    margin-bottom: 0px;
    font-size: 1.4rem;
    font-weight: 500;
    font-family: 'Poppins';
    letter-spacing: 0;
    color: #777;
  }
  .card:last-child {
    border-radius: 10px;
    border: 1px solid #d5d5d5;
    /* border-bottom: .1rem solid #ebebeb; */
}
</style>

<div class="container">
   <div class="row mt-3">
      <div class="col-10">
         @foreach($suppliers as $supplier)
         <div class="card mb-3">
            <div class="row g-0">
               <div class="col-md-4">
                  <img src="{{ asset('admin/product_image/' . $supplier->logo) }}" class="img-fluid rounded-start" alt="..." style="border-radius: 10px;">
               </div>
               <div class="col-md-8">
                  <div class="card-body">
                     <h5 class="card-title">{{ $supplier->Business_name }}</h5>
                     <img src="{{asset('img/banner/verified.jpg')}}" class="img-fluid" alt="..." style="height: 30px;">
                     <p class="card-text">{{ $supplier->city }}</p>
                     <p class="card-text"><small class="text-muted">{{ $supplier->mobile }}</small></p>
                     <p class="card-text"><small class="text-muted">{{ $supplier->email }}</small></p>
                     <button type="button" class="btn btn-primary mt-3 btn-rounded waves-effect w-md waves-light">
                        <a href="{{ url('view-supliers-details/' . $supplier->id) }}" role="button" style="color:white;">
                         More Details</a>
                     </button>
                     <button type="button" class="btn btn-primary mt-3 btn-rounded waves-effect w-md waves-light">
                        <a href=" " role="button" style="color:white;">
                         Call Now</a>
                     </button>
                     <button type="button" class="btn btn-primary mt-3 btn-rounded waves-effect w-md waves-light">
                        <a href=" " role="button" style="color:white;">
                         Send Enquiry</a>
                     </button>
                  </div>
               </div>
            </div>
         </div>
         @endforeach
      </div>
      <div class="col-2"></div>
   </div>
</div>
<div class="pagination justify-content-center">
   {{ $suppliers->links() }}
</div>
@endsection