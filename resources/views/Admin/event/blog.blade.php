<?php 


use App\Models\EvenCategory;
$events = EvenCategory::eventcategory();

?>

    
@extends('frontlayout.frontlayout')
@section('content')

<style>
  body{
    background:#fff;
    margin-top:20px;
}
.card-box {
    padding: 20px;
    border-radius: 10px;
    margin-bottom: 30px;
    background-color: #fff;
    box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;
}

.social-links li a {
    border-radius: 50%;
    color: rgba(121, 121, 121, .8);
    display: inline-block;
    height: 30px;
    line-height: 27px;
    border: 2px solid rgba(121, 121, 121, .5);
    text-align: center;
    width: 30px
}

.social-links li a:hover {
    color: #797979;
    border: 2px solid #797979
}
.thumb-lg {
    height: 88px;
    width: 88px;
}
.img-thumbnail {
    padding: .25rem;
    background-color: #fff;
    border: 1px solid #dee2e6;
    border-radius: .25rem;
    max-width: 100%;
    height: auto;
}
.text-pink {
    color: #ff679b!important;
}
.btn-rounded {
    border-radius: 2em;
}
.text-muted {
    color: #98a6ad!important;
}
h4 {
    line-height: 22px;
    font-size: 18px;
}
  

</style>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-sm-4"><a href="#custom-modal" class="btn btn-custom waves-effect waves-light mb-4" data-animation="fadein" data-plugin="custommodal" data-overlayspeed="200" data-overlaycolor="#36404a"><i class="mdi mdi-plus"></i> </a></div>
            <!-- end col -->
        </div>
        <!-- end row -->
<div class="row">
     @foreach($categoryProducts as $product)
    
    <div class="card mb-3" style="max-width: 540px; margin-left:50px">
       <div class="row g-0" style="padding: 10px; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; border-radius: 10px;">
           <div class="col-md-4">

                 <img src="{{ asset('admin/product_image/largeimage/' . $product['image']) }}" alt="{{ $product['title'] }}">

                            
                <button type="button" class="btn btn-primary mt-3 btn-rounded waves-effect w-md waves-light">
                    <a href="{{ url('view-event-details/' . $product->id) }}" role="button" style="color:white;">
                        More Details</a>
                </button>
           </div>
           <div class=" Divier" style="width: 1px; height: 100%; background-color: #000; margin: 0px 10px;"></div>
           <div class="col-md-6">
             <div class="card-body">

                <h5 class="card-title">Event name :- {{$product['title']}}</h5><br>
                <p class="card-text">Location :- {{$product['venue']}}</p><br>
                <p class="card-text">Mobile :- {{$product['contactforbookings']}}</p><br>
                <p class="card-text"><small class="text-muted">Email :- {{$product['emailforbookings']}}</small></p>
        
              </div>
           </div>
       </div>
    </div>
@endforeach
    <div>{{ $categoryProducts->links() }}</div>
    <!-- end col -->
</div>

        <!-- end row -->
        
        <!-- end row -->

    
</div>
        <!-- end row -->
    </div>
    <!-- container -->
</div>




                





       



@endsection   







