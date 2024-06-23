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
      <div class="col-9" >
         @foreach($suppliers as $supplier)
         <div class="card mb-3" style="border: 1px solid #d5d5d5; border-radius: 10px; padding-top: 5px; padding-left: 5px;">
            <div class="row g-0">
               <div class="col-md-4">
                  <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" style="border-radius: 10px;">
                     <div class="carousel-indicators">
                        @php
                        $active = 'active';
                        @endphp
                        @foreach ($suppliers as $index => $supplier)
                        @if ($supplier->product_sample)
                        @php
                        $sampleImages = explode(',', $supplier->product_sample);
                        @endphp
                        @foreach ($sampleImages as $imageIndex => $imageName)
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $index * count($sampleImages) + $imageIndex }}" class="{{ $active }}" aria-current="true" aria-label="Slide {{ $index * count($sampleImages) + $imageIndex + 1 }}" style="display: none;"></button>
                        @php
                        $active = '';
                        @endphp
                        @endforeach
                        @endif
                        @endforeach
                     </div>
                     <div class="carousel-inner">
                        @php
                        $active = 'active';
                        @endphp
                        @foreach ($suppliers as $supplier)
                        @if ($supplier->product_sample)
                        @php
                        $sampleImages = explode(',', $supplier->product_sample);
                        @endphp
                        @foreach ($sampleImages as $imageName)
                        <div class="carousel-item {{ $active }}">
                           <img src="{{ asset('admin/product_image/' . $imageName) }}" class="d-block w-100 img-fluid" alt="..." style="border-radius: 10px; height:276px;">
                        </div>
                        @php
                        $active = '';
                        @endphp
                        @endforeach
                        @endif
                        @endforeach
                     </div>
                  </div>
               </div>
               <div class="col-md-8">
                  <div class="card-body">
                     <h5 class="card-title">{{ $supplier->Business_name }}</h5>
                     <img src="{{asset('img/banner/verified.jpg')}}" class="img-fluid" alt="..." style="height: 30px;">
                     <div style="display:flex;">
                        <p class="card-text">
                           <small class="text-muted" style="font-weight: 600;background: #f7f7f7;border-radius: 5px;border: 1px solid #cdcdcd;padding: 5px;">
                           {{ $supplier->keyservice1 ?? 'N/A' }}
                           </small>
                        </p>
                        <p class="card-text">
                           <small class="text-muted" style="font-weight: 600;background: #f7f7f7;border-radius: 5px;border: 1px solid #cdcdcd;padding: 5px;">
                           {{ $supplier->keyservice2 ?? 'N/A' }}
                           </small>
                        </p>
                        <p class="card-text">
                           <small class="text-muted" style="font-weight: 600;background: #f7f7f7;border-radius: 5px;border: 1px solid #cdcdcd;padding: 5px;">
                           {{ $supplier->keyservice3 ?? 'N/A' }}
                           </small>
                        </p>
                     </div>
                     <p class="card-text">{{ $supplier->city }}</p>
                     <p class="card-text"><small class="text-muted">{{ $supplier->mobile }}</small></p>
                     <p class="card-text"><small class="text-muted">{{ $supplier->email }}</small></p>
                     <button type="button" class="btn btn-primary mt-3 btn-rounded waves-effect w-md waves-light">
                     <a href="{{ url('view-supliers-details/' . $supplier->id) }}" role="button" style="color:white;">
                     More Details</a>
                     </button>
                     <button type="button" class="btn btn-primary mt-3 btn-rounded waves-effect w-md waves-light">
                     <a href="tel:{{ $supplier->mobile }}" role="button" style="color:white;">
                     Call Now</a>
                     </button>
                     <button type="button" class="btn btn-primary mt-3 btn-rounded waves-effect w-md waves-light">
                     <a href="mailto:{{ $supplier->email }}" role="button" style="color:white;">
                     Send Enquiry</a>
                     </button>
                  </div>
               </div>
            </div>
         </div>
         <!-- Include Bootstrap JS -->
         <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
         @endforeach
      </div>
      <div class="col-3" style="border-radius: 10px;
         border: 1px solid #d5d5d5;"></div>
   </div>
</div>
<div class="pagination justify-content-center">
   {{ $suppliers->links() }}
</div>
@endsection