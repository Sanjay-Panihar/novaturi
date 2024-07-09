@extends('frontlayout.frontlayout')
@section('content')
<style>
   p {
      padding: 2px;
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

   .card-body {
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 8px;
      margin-bottom: 20px;
   }

   .card-title {
      font-size: 1.5rem;
      margin-bottom: 10px;
      display: flex;
      align-items: center;
   }

   .img-fluid {
      max-width: 100%;
      height: auto;
   }

   .service-tags {
      margin-bottom: 10px;
   }

   .service-tags .badge {
      margin-right: 5px;
   }

   .location {
      display: flex;
      align-items: center;
      margin-bottom: 10px;
   }

   .location .icon {
      width: 20px;
      height: 20px;
      margin-right: 5px;
   }

   .rating {
      display: flex;
      align-items: center;
      margin-bottom: 10px;
   }

   .rating .rating-stars {
      color: #ffc107;
   }

   .rating .text-muted {
      margin-left: 5px;
   }
</style>
<div class="container">
   <div class="row mt-3">
      <div class="col-9">
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
                        <h5 class="card-title">{{ $supplier->Business_name }}
                           <img src="{{ asset('img/banner/verified.jpg') }}" class="img-fluid" alt="Verified" style="height: 30px; margin-left: 10px;">
                        </h5>
                        <div style="display:flex;">
                           <p class="card-text"><small class="text-muted" style="font-weight: 600;background: #f7f7f7;border-radius: 5px;border: 1px solid #cdcdcd;padding: 5px;">{{ $supplier->keyservice1 ?? 'N/A' }}</small></p>
                           <p class="card-text"><small class="text-muted" style="font-weight: 600;background: #f7f7f7;border-radius: 5px;border: 1px solid #cdcdcd;padding: 5px;">{{ $supplier->keyservice2 ?? 'N/A' }}</small></p>
                           <p class="card-text"><small class="text-muted" style="font-weight: 600;background: #f7f7f7;border-radius: 5px;border: 1px solid #cdcdcd;padding: 5px;">{{ $supplier->keyservice3 ?? 'N/A' }}</small></p>
                        </div>
                        <div class="rating">
                           @if ($supplier->total_ratings > 0)
                              @php
                              $averageRating = $supplier->average_rating;
                              $fullStars = floor($averageRating);
                              $halfStar = $averageRating - $fullStars >= 0.5 ? 1 : 0;
                              $emptyStars = 5 - $fullStars - $halfStar;
                              @endphp
                              <div class="rating-stars">
                                 @for ($i = 0; $i < $fullStars; $i++)
                                    <i class="fas fa-star"></i>
                                 @endfor
                                 @if ($halfStar)
                                    <i class="fas fa-star-half-alt"></i>
                                 @endif
                                 @for ($i = 0; $i < $emptyStars; $i++)
                                    <i class="far fa-star"></i>
                                 @endfor
                              </div>
                              <span class="text-muted">({{ number_format($supplier->average_rating, 1) }})</span>
                           @else
                              <span class="text-muted">No ratings yet</span>
                           @endif
                        </div>
                        <p class="card-text">{{ $supplier->city }}</p>
                        <p class="card-text"><small class="text-muted">{{ $supplier->mobile }}</small></p>
                        <p class="card-text"><small class="text-muted">{{ $supplier->email }}</small></p>
                        <div class="buttons">
                           <a href="{{ route('viewsupliersdetails', ['id' => $supplier->id, 'category_name' => Request::segment(2)]) }}" class="btn btn-primary btn-rounded waves-effect waves-light" style="color: white;">More Details</a>
                           <a href="tel:{{ $supplier->mobile }}" class="btn btn-primary btn-rounded waves-effect waves-light" style="color: white;">Call Now</a>
                           <a href="mailto:{{ $supplier->email }}" class="btn btn-primary btn-rounded waves-effect waves-light" style="color: white;">Send Enquiry</a>
                        </div>
                  </div>
               </div>
            </div>
         @endforeach
      </div>
   </div>
   <div class="pagination justify-content-center">
      {{ $suppliers->links() }}
   </div>
</div>
@endsection
