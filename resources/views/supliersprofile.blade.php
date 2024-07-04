@extends('frontlayout.frontlayout')
@section('content')
<style>
    


.reviews {
    border-radius: 10px;
    padding: 30px;
    box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    margin-bottom: 10%;
}

.review {
  display: flex;
  justify-content: center;
  align-items: center;
  text-align: center;
  width: 80%;
  padding: 0 50px;
  font-size: 1.7rem;
  overflow: hidden;
}

.reviewstuff{
  width: 80%;
}

.input {
  display: flex;
  justify-content: space-between;
  align-items: center;
  width: 100%;
}

.reviewinp {
  width: 300px;
  height: 70px;
  outline: none;
  border-radius: 5px;
  border: none;
  background-color: #f5f5f5; 
  resize: none;
  padding: 10px 5px 10px 10px;
  font-family: 'Sulphur Point', sans-serif;
  font-size: 1.4rem;
}

.stars {
  display: flex;
  padding: 0 20px;
}

.star1, .star2, .star3, .star4, .star5 {
  margin-right: 5px;
  font-size: 1.3rem;
  cursor: pointer;
}

.submit {
  color: white;
  background-color: #036bfc;
  border: none;
  padding: 10px 20px;
  border-radius: 5px;
  outline: none;
  cursor: pointer;
  font-family: 'Sulphur Point', sans-serif;
  font-size: 1.4rem;
  transition: all .2s ease-in-out;
}

.submit:hover {
  background-color: #4592ff;
}

.arrows {
  font-size: 1.8rem;
  cursor: pointer;
}

.input-container {
  box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;
  margin-bottom: 10%;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  background-color: white;
  padding: 30px;
  border-radius: 10px;
  border: 1.5px solid #d1d1d1;
  width: 100%;
}

.names {
  display: flex;
  justify-content: center;
  align-items: center;
  width: 100%;
  margin-bottom: 20px;
}

.firstname, .lastname {
  width: 100%;
  padding: 10px 0 10px 10px;
  outline: none;
  border-radius: 5px;
  border: none;
  background-color: #f5f5f5;
  font-family: 'Sulphur Point', sans-serif;
  font-size: 1.4rem;
}

.firstname {
  margin-right: 10px;
}

.lastname {
  margin-left: 10px;
}

.reviewstuff {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}

.rname {
  display: flex;
  justify-content: center;
  margin-right: 30px;
}

.rfname {
  margin-right: 2.5px;
  white-space: nowrap;
}

.rlname {
  margin-left: 2.5px;
  white-space: nowrap;
}

.bottomreview {
  font-size: larger;
  display: flex;
  width: 40%;
  justify-content: center;
  align-items: center;
  margin-top: 20px;
}

.stars2 {
  display: flex;
}

.errorcontainer {
  width: 85%;
  justify-content: center;
  align-items: center;
  margin-bottom: 50px;
  position: absolute;
  background-color: #ff4242;
  color: white;
  padding: 10px 75px;
  text-align: center;
  display: flex;
  opacity: 0;
  transition: opacity, .5s;
}

.display {
  opacity: 1;
}

.exc {
  margin-right: 20px;
  font-size: 1.3rem;
}

.thank-you-container {
  font-size: 2rem;
  color: #919191;
  display: none;
  visibility: hidden;
  justify-content: center;
  align-items: center;
  transition: all .7s;
  opacity: 0;
}

.thank-you {
  white-space: nowrap;
}

.fa-kiss-wink-heart{
  color: #ff429a;
  margin-left: 10px;
}
</style>
<main class="main">
   @foreach($suppliers as $suplier)
   @php
   $coverImage = $suplier->categories ? $suplier->categories->cover_image : 'default-banner.jpg';
   $vendorType = $suplier->vendorType;
   $defaultBanner = 'default-banner.jpg';

   $coverImage = $coverImage ?? $defaultBanner;
   @endphp
   <div class="page-header text-center">
      <img src="{{ asset('admin/'.$vendorType.'/cover_image/smallimage/' . $coverImage) }}" class="img-fluid rounded-start" alt="...">
   </div>
   <!-- End .page-header -->
   <div style="background-color:#e5e1e1; padding: 15px;">
      <div class="container">
         <div class="row">
            <div class="col text-center">
               @if($suplier->Business_catalogue)
               <button class="btn btn-primary" style="border-radius: 25px;">
               <a class=""
                  href="{{ asset('admin/Businesscatalogue/' . $suplier->Business_catalogue) }}"
                  target="_blank" style="color:white; ">
               View Catalogue
               </a>
               @endif
               </button>    
               <button class="btn btn-primary" style="border-radius: 25px;">
               <a href="#signin-modal" data-toggle="modal" style="color:white;"  >Highlights</a></button>
            </div>
         </div>
      </div>
   </div>
   <div class="page-content pb-3">
      <div class="">
         <div class="row justify-content-center" style="padding-top: 45px;">
            <div class="col-lg-4 col-sm-6">
               <div class="icon-box icon-box-sm text-center">
                  <div class="icon-box-content">
                     <h3 class="icon-box-title"><span style="border-radius: 20px; padding: 0px 10px; background-color: #7ebfb7; margin-right: 10px; font-weight: 600; font-size: x-large;">Brand</span>{{$suplier->Business_name}}</h3>
                     <!-- End .icon-box-title -->
                  </div>
                  <!-- End .icon-box-content -->
               </div>
               <!-- End .icon-box -->
            </div>
            <!-- End .col-lg-4 col-sm-6 -->
            <div class="col-lg-4 col-sm-6">
               <div class="icon-box icon-box-sm text-center">
                  <div class="icon-box-content">
                     <h3 class="icon-box-title"><span style="border-radius: 20px; padding: 0px 10px; background-color: #7ebfb7; margin-right: 10px; font-weight: 600; font-size: x-large;">Location</span>{{$suplier->city}}</h3>
                     <!-- End .icon-box-title -->
                  </div>
                  <!-- End .icon-box-content -->
               </div>
               <!-- End .icon-box -->
            </div>
            <!-- End .col-lg-4 col-sm-6 -->
            <div class="col-lg-4 col-sm-6">
               <div class="icon-box icon-box-sm text-center">
                  <div class="icon-box-content">
                     <h3 class="icon-box-title"><span style="border-radius: 20px; padding: 0px 10px; background-color: #7ebfb7; margin-right: 10px; font-weight: 600; font-size: x-large;">GST</span>{{$suplier->Gst_number}}</h3>
                     <!-- End .icon-box-title --> 
                  </div>
                  <!-- End .icon-box-content -->
               </div>
               <!-- End .icon-box -->
            </div>
            <!-- End .col-lg-4 col-sm-6 -->
         </div>
         <!-- End .row -->
         <h2 class="title text-center" style="padding: 15px; background: #fff2c1;">Brand Brief</h2>
         <!-- End .title text-center mb-2 -->
         <div class="row">
            <div class="col-lg-12 offset-lg-1">
               <div class="about-text text-center mt-3">
                  <p>{{$suplier->brand}}</p>
               </div>
               <!-- End .about-text -->
            </div>
            <!-- End .col-lg-10 offset-1 -->
         </div>
         <!-- End .row -->
         <h2 class="title text-center " style="padding: 15px; background: #beefd8;">Service Details</h2>
         <!-- End .title text-center mb-2 -->
         <div class="row">
            <div class="col-lg-12 offset-lg-1">
               <div class="about-text text-center mt-3">
                  <p>{{$suplier->service}}</p>
               </div>
               <!-- End .about-text -->
            </div>
            <!-- End .col-lg-10 offset-1 -->
         </div>
         <!-- End .row -->
         <h2 class="title text-center " style="padding: 15px; background: #beefd8;">Key Services</h2>
         <!-- End .title text-center mb-2 -->
         <div class="row justify-content-center" style="padding: 25px;">
            <div class="col-lg-4 col-sm-6">
               <div class="icon-box icon-box-sm text-center">
                  <div class="icon-box-content">
                     <h3 class="icon-box-title"><span style="border-radius: 20px; padding: 0px 10px;  margin-right: 10px; font-weight: 600; ">Key Service1</span>{{$suplier->keyservice1 ?? 'Not Available' }}</h3>
                     <!-- End .icon-box-title -->
                  </div>
                  <!-- End .icon-box-content -->
               </div>
               <!-- End .icon-box -->
            </div>
            <!-- End .col-lg-4 col-sm-6 -->
            <div class="col-lg-4 col-sm-6">
               <div class="icon-box icon-box-sm text-center">
                  <div class="icon-box-content">
                     <h3 class="icon-box-title"><span style="border-radius: 20px; padding: 0px 10px;  margin-right: 10px; font-weight: 600; ">Key Service2</span>{{$suplier->keyservice2 ?? 'Not Available'}}</h3>
                     <!-- End .icon-box-title -->
                  </div>
                  <!-- End .icon-box-content -->
               </div>
               <!-- End .icon-box -->
            </div>
            <!-- End .col-lg-4 col-sm-6 -->
            <div class="col-lg-4 col-sm-6">
               <div class="icon-box icon-box-sm text-center">
                  <div class="icon-box-content">
                     <h3 class="icon-box-title"><span style="border-radius: 20px; padding: 0px 10px;  margin-right: 10px; font-weight: 600;">Key Service3</span>{{$suplier->keyservice3 ?? 'Not Available'}}</h3>
                     <!-- End .icon-box-title --> 
                  </div>
                  <!-- End .icon-box-content -->
               </div>
               <!-- End .icon-box -->
            </div>
            <!-- End .col-lg-4 col-sm-6 -->
         </div>
         <h2 class="title text-center " style="padding: 15px; background: #faafc6;">Key Attributes</h2>
         <!-- End .title text-center mb-2 -->
         <div class="row justify-content-center" style="padding: 25px;">
            <div class="col-lg-4 col-sm-6">
               <div class="icon-box icon-box-sm text-center">
                  <div class="icon-box-content">
                     <h3 class="icon-box-title"><span style="border-radius: 20px; padding: 0px 10px;  margin-right: 10px; font-weight: 600; ">Sell in Wholesale</span>{{$suplier->sell_in_wholesale }}</h3>
                     <!-- End .icon-box-title -->
                  </div>
                  <!-- End .icon-box-content -->
               </div>
               <!-- End .icon-box -->
            </div>
            <!-- End .col-lg-4 col-sm-6 -->
            <div class="col-lg-4 col-sm-6">
               <div class="icon-box icon-box-sm text-center">
                  <div class="icon-box-content">
                     <h3 class="icon-box-title"><span style="border-radius: 20px; padding: 0px 10px;  margin-right: 10px; font-weight: 600; ">Delivery Time</span>{{$suplier->delivery_time}}</h3>
                     <!-- End .icon-box-title -->
                  </div>
                  <!-- End .icon-box-content -->
               </div>
               <!-- End .icon-box -->
            </div>
            <!-- End .col-lg-4 col-sm-6 -->
            <div class="col-lg-4 col-sm-6">
               <div class="icon-box icon-box-sm text-center">
                  <div class="icon-box-content">
                     <h3 class="icon-box-title"><span style="border-radius: 20px; padding: 0px 10px;  margin-right: 10px; font-weight: 600;">MOQ</span>{{$suplier->moq_of_product}}</h3>
                     <!-- End .icon-box-title --> 
                  </div>
                  <!-- End .icon-box-content -->
               </div>
               <!-- End .icon-box -->
            </div>
            <!-- End .col-lg-4 col-sm-6 -->
         </div>
         <!-- End .row -->
         <h2 class="title text-center " style="padding: 15px; background: #f6b186;">Placing An Order</h2>
         <!-- End .title text-center mb-2 -->
         <div class="row justify-content-center" style="padding: 25px;">
            <div class="col-lg-4 col-sm-6">
               <div class="icon-box icon-box-sm text-center">
                  <div class="icon-box-content">
                     <h3 class="icon-box-title">
                        <span style="border-radius: 20px; padding: 0px 10px; margin-right: 10px; font-weight: 600;">WebSite</span>
                        <a href="{{$suplier->websitelink}}" target="_blank">{{$suplier->websitelink}}</a>
                     </h3>
                     <!-- End .icon-box-title -->
                  </div>
                  <!-- End .icon-box-content -->
               </div>
               <!-- End .icon-box -->
            </div>
            <!-- End .col-lg-4 col-sm-6 -->
            <div class="col-lg-4 col-sm-6">
               <div class="icon-box icon-box-sm text-center">
                  <div class="icon-box-content">
                     <h3 class="icon-box-title">
                        <span style="border-radius: 20px; padding: 0px 10px;margin-left: 60px; font-weight: 600; display:flex;">
                           <!-- Facebook Icon -->
                           Social Media :-  &nbsp;
                           <a href="{{$suplier->facebook}}">
                           <img src="{{asset('logo/facebook (1).png')}}" alt="Facebook" style="width: 20px; height: 20px; margin-right: 5px;">
                           </a>
                           <a href="{{$suplier->instagram}}">
                           <img src="{{asset('logo/instagram (1).png')}}" alt="instagram" style="width: 20px; height: 20px; margin-right: 5px;">
                           </a>
                           <a href="{{$suplier->linkedin}}">
                           <img src="{{asset('logo/linkedin (1).png')}}" alt="linkedin" style="width: 20px; height: 20px; margin-right: 5px;">
                           </a>
                           <a href="{{$suplier->twitter}}">
                           <img src="{{asset('logo/twitter.png')}}" alt="twitter" style="width: 20px; height: 20px; margin-right: 5px;">
                           </a>
                           <a href="{{$suplier->youtube}}">
                           <img src="{{asset('logo/youtube.png')}}" alt="youtube" style="width: 20px; height: 20px; margin-right: 5px;">
                           </a>
                           <!-- Instagram Icon -->
                        </span>
                     </h3>
                     <!-- End .icon-box-title -->
                  </div>
                  <!-- End .icon-box-content -->
               </div>
               <!-- End .icon-box -->
            </div>
            <!-- End .col-lg-4 col-sm-6 -->
            <div class="col-lg-4 col-sm-6">
               <div class="icon-box icon-box-sm text-center">
                  <div class="icon-box-content">
                     <h3 class="icon-box-title"><span style="border-radius: 20px; padding: 0px 10px;  margin-right: 10px; font-weight: 600;">Mail:-
                        <a href="mailto:{{$suplier->email}}" style="color:black;"> {{$suplier->email}}</a> 
                     </h3>
                  </div>
                  <!-- End .icon-box-content -->
               </div>
               <!-- End .icon-box -->
            </div>
            <!-- End .col-lg-4 col-sm-6 -->
         </div>
         <!-- End .row -->
         <div class="row">
            <div class="col text-center">
               <a href="mailto:{{$suplier->email}}">
               <button class="btn btn-primary" style="border-radius: 25px;">Request a Quote</button>
               </a>
               <button class="btn btn-primary" style="border-radius: 25px;" onclick="window.location.href='tel:{{$suplier->mobile}}';">Call the Vendor</button>
            </div>
         </div>
      </div>
      <!-- End .container -->
   </div>
   <!-- End .page-content -->
   <!---------------------------------------------------------------------------------------------------->
    <h2 class="title text-center " style="padding: 15px; background: #AE82FB;">Reviews</h2>
   <div class="container" style="margin-top: 50px;">
      <div class="reviews">
         <div class="arrow1 arrows">
            <i class="fas fa-chevron-left"></i>
         </div>
         <div class="reviewstuff">
            <p class="review">Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse cumque totam quisquam iusto neque quibusdam sapiente fuga. Et fugit culpa, error delectus ullam nesciunt in quas, fuga corrupti facilis tempora.</p>
            <div class="bottomreview">
               <div class="rname">
                  <div class="rfname">John</div>
                  <div class="rlname">Smith</div>
               </div>
               <div class="stars2">
                  <div><i class="far fa-star rstar1"></i></div>
                  <div><i class="far fa-star rstar2"></i></div>
                  <div><i class="far fa-star rstar3"></i></div>
                  <div><i class="far fa-star rstar4"></i></div>
                  <div><i class="far fa-star rstar5"></i></div>
               </div>
            </div>
         </div>
         <div class="arrow2 arrows">
            <i class="fas fa-chevron-right"></i>
         </div>
      </div>
      <div class="errorcontainer">
         <i class="fas fa-exclamation-circle exc"></i>
         <div class="error">Your review must be legible! Try again!</div>
      </div>
      <div class="input-container">
         <div class="thank-you-container">
            <div class="thank-you">Thank you for your review!</div>
            <i class="fas fa-kiss-wink-heart"></i>
         </div>
         <div class="names">
            <input type="text" class="firstname" placeholder="First name">
            <input type="text" class="lastname" placeholder="Last name">
         </div>
         <div class="input">
            <div class="inputbox">
               <textarea type="text" class="reviewinp" placeholder="Write a review"></textarea>
            </div>
            <div class="stars">
               <div class="star1"><i class="far fa-star starj1"></i></div>
               <div class="star2"><i class="far fa-star starj2"></i></div>
               <div class="star3"><i class="far fa-star starj3"></i></div>
               <div class="star4"><i class="far fa-star starj4"></i></div>
               <div class="star5"><i class="far fa-star starj5"></i></div>
            </div>
            <div class="submitbtn">
               <button class="submit">Submit Review</button>
            </div>
         </div>
      </div>
   </div>
   <script src="https://kit.fontawesome.com/850830ed04.js" crossorigin="anonymous"></script>
   <div class="modal fade" id="signin-modal" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
         <div class="modal-content">
            <div class="modal-body">
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true"><i class="icon-close"></i></span>
               </button>
               <div class="form-box">
                  <div class="form-tab">
                     <ul class="nav nav-pills nav-fill" role="tablist">
                        <li class="nav-item">
                           <a class="nav-link active" id="signin-tab" data-toggle="tab" href="#signin"
                              role="tab" aria-controls="signin" aria-selected="true">Gallery</a>
                        </li>
                     </ul>
                     <div class="tab-content" id="tab-content-5">
                        <div class="tab-pane fade show active" id="signin" role="tabpanel"
                           aria-labelledby="signin-tab">
                           <div class="row">
                              @foreach ($suppliers as $supplier)
                              @if ($supplier->product_sample)
                              @php
                              $sampleImages = explode(',', $supplier->product_sample);
                              @endphp
                              @foreach ($sampleImages as $imageName)
                              <div class="col-lg-4 col-sm-6">
                                 <div class="thumbnail">
                                    <img src="{{ asset('admin/product_image/' . $imageName) }}">
                                 </div>
                              </div>
                              @endforeach
                              @endif
                              @endforeach
                           </div>
                        </div>
                        <!-- .End .tab-pane -->
                     </div>
                     <!-- End .tab-content -->
                  </div>
                  <!-- End .form-tab -->
               </div>
               <!-- End .form-box -->
            </div>
            <!-- End .modal-body -->
         </div>
         <!-- End .modal-content -->
      </div>
      <!-- End .modal-dialog -->
   </div>
   @endforeach        
</main>


<script>
var star1 = document.querySelector('.starj1');
var star2 = document.querySelector('.starj2');
var star3 = document.querySelector('.starj3');
var star4 = document.querySelector('.starj4');
var star5 = document.querySelector('.starj5');

//making the star system work

star1.addEventListener('click', function(){
  if(star1.classList.contains('far')){
    star1.classList.remove('far')
    star1.classList.add('fas')
  }else if(star2.classList.contains('far') && star3.classList.contains('far') && star4.classList.contains('far') && star5.classList.contains('far')){
    star1.classList.remove('fas')
    star1.classList.add('far')
  }
  if(star2.classList.contains('fas')){
    star2.classList.remove('fas')
    star2.classList.add('far')
  }
  if(star3.classList.contains('fas')){
    star3.classList.remove('fas')
    star3.classList.add('far')
  }
  if(star4.classList.contains('fas')){
    star4.classList.remove('fas')
    star4.classList.add('far')
  }
  if(star5.classList.contains('fas')){
    star5.classList.remove('fas')
    star5.classList.add('far')
  }
})

star2.addEventListener('click', function(){
  if(star2.classList.contains('far')){
    star2.classList.remove('far')
    star2.classList.add('fas')
    star1.classList.remove('far')
    star1.classList.add('fas')
  }
  if(star3.classList.contains('fas')){
    star3.classList.remove('fas')
    star3.classList.add('far')
  }
  if(star4.classList.contains('fas')){
    star4.classList.remove('fas')
    star4.classList.add('far')
  }
  if(star5.classList.contains('fas')){
    star5.classList.remove('fas')
    star5.classList.add('far')
  }
})

star3.addEventListener('click', function(){
  if(star3.classList.contains('far')){
    star3.classList.remove('far')
    star3.classList.add('fas')
    star2.classList.remove('far')
    star2.classList.add('fas')
    star1.classList.remove('far')
    star1.classList.add('fas')
  }
  if(star4.classList.contains('fas')){
    star4.classList.remove('fas')
    star4.classList.add('far')
  }
  if(star5.classList.contains('fas')){
    star5.classList.remove('fas')
    star5.classList.add('far')
  }
})

star4.addEventListener('click', function(){
  if(star4.classList.contains('far')){
    star4.classList.remove('far')
    star4.classList.add('fas')
    star3.classList.remove('far')
    star3.classList.add('fas')
    star2.classList.remove('far')
    star2.classList.add('fas')
    star1.classList.remove('far')
    star1.classList.add('fas')
  }
  if(star5.classList.contains('fas')){
    star5.classList.remove('fas')
    star5.classList.add('far')
  }
})

star5.addEventListener('click', function(){
  if(star5.classList.contains('far')){
    star5.classList.remove('far')
    star5.classList.add('fas')
    star4.classList.remove('far')
    star4.classList.add('fas')
    star3.classList.remove('far')
    star3.classList.add('fas')
    star2.classList.remove('far')
    star2.classList.add('fas')
    star1.classList.remove('far')
    star1.classList.add('fas')
  }else{
    star5.classList.remove('fas')
    star5.classList.add('far')
  }
})

//making the submit button push the input from the user to the html content

var submitBtn = document.querySelector('.submitbtn')
var firstNameInp = document.querySelector('.firstname');
var lastNameInp = document.querySelector('.lastname');
var reviewInp = document.querySelector('.reviewinp');
var review = document.querySelector('.review');
var lastName = document.querySelector('.rlname');
var firstName = document.querySelector('.rfname');
var error = document.querySelector('.errorcontainer')

//check for no spaces

function hasNoSpaces(string){
  return string.indexOf(' ') === -1;
}

function displayNone(){
  error.style.opacity = 0;
}

function displayThanks(){
  thankYou.style.visibility = "visible";
  thankYou.style.opacity = 1;
}


//submit button event

var rstar1 = document.querySelector('.rstar1');
var rstar2 = document.querySelector('.rstar2');
var rstar3 = document.querySelector('.rstar3');
var rstar4 = document.querySelector('.rstar4');
var rstar5 = document.querySelector('.rstar5');

var thankYou = document.querySelector('.thank-you-container');

var names = document.querySelector('.names');
var input = document.querySelector('.input');

submitBtn.addEventListener('click', function(){
  if(hasNoSpaces(reviewInp.value) == true){
    error.style.opacity = 1;
    setTimeout(displayNone, 5000);
  }else{
    error.style.display = "none";
    review.innerHTML = '"' + reviewInp.value + '"';
    lastName.innerHTML = lastNameInp.value;
    firstName.innerHTML = firstNameInp.value;
    names.style.display = "none";
    input.style.display = "none";
    thankYou.style.display = "flex";
    setTimeout(displayThanks, 25);
    if(star1.classList.contains('fas')){
      rstar1.classList.remove('far');
      rstar1.classList.add('fas');
    }
    if(star1.classList.contains('fas') && star2.classList.contains('fas')){
      rstar1.classList.remove('far');
      rstar1.classList.add('fas');
      rstar2.classList.remove('far');
      rstar2.classList.add('fas');
    }
    if(star1.classList.contains('fas') && star2.classList.contains('fas') && star3.classList.contains('fas')){
      rstar1.classList.remove('far');
      rstar1.classList.add('fas');
      rstar2.classList.remove('far');
      rstar2.classList.add('fas');
      rstar3.classList.remove('far');
      rstar3.classList.add('fas');
    }
    if(star1.classList.contains('fas') && star2.classList.contains('fas') && star3.classList.contains('fas') && star4.classList.contains('fas')){
      rstar1.classList.remove('far');
      rstar1.classList.add('fas');
      rstar2.classList.remove('far');
      rstar2.classList.add('fas');
      rstar3.classList.remove('far');
      rstar3.classList.add('fas');
      rstar4.classList.remove('far');
      rstar4.classList.add('fas');
    }
    if(star1.classList.contains('fas') && star2.classList.contains('fas') && star3.classList.contains('fas') && star4.classList.contains('fas') && star5.classList.contains('fas')){
      rstar1.classList.remove('far');
      rstar1.classList.add('fas');
      rstar2.classList.remove('far');
      rstar2.classList.add('fas');
      rstar3.classList.remove('far');
      rstar3.classList.add('fas');
      rstar4.classList.remove('far');
      rstar4.classList.add('fas');
      rstar5.classList.remove('far');
      rstar5.classList.add('fas');
    }
  }
})</script>
<!-- End .main -->
@endsection