@extends('frontlayout.frontlayout')
@section('content')


<style>
    * {
        margin: 0%;
        padding: 0px;
    }

    .slider {
        width: 100%;
        height: 400px;
        background-image: url("./img/banner/AboutUs.jpg");
        background-repeat: no-repeat;
        background-size: cover;
    }

    .fist-colum {
        width: 100%;
        text-align: center;
        height: 400px;
        display: flex;
    }

    .about-text {
        /* background-color:linear-gradient(f88298, b481f7); */
        background-image: linear-gradient(to right, rgba(248, 130, 152), rgba(131, 46, 242));
    }

    .about-text h3 {
        word-spacing: 0px;
        letter-spacing: 3px;

    }

    .about-text .text {
        padding: 10px 0px 10px 0px;
        text-align: center;
        color: #fff;
    }

    .main-box {
        padding: 40px 0px 40px 0px;
    }

    .fist-colum-box-1 {
        padding: 20px 0px 20px 0px;
        /* background-color: red; */
        height: 350px;
    }

    .fist-colum-box-1 img {
        width: 100%;
        height: 350px;
        padding: 0px 40px 0px 40px;
    }

    .fist-colum-box-2 {
        padding: 5px 0px 5px 0px;
        background-image: linear-gradient(to right, rgba(140, 84, 255), rgba(98, 213, 232));
        border-radius: 40px 0px 0px 40px;
        height: 46px;
        color: #fff;
    }

    .fist-colum-box-3 {
        padding: 5px 0px 5px 0px;
        background-image: linear-gradient(to right, rgba(148, 82, 244), rgba(249, 142, 86));
        border-radius: 0px 40px 40px 0px;
        height: 46px;
        color: #fff;
    }

    .fist-colum-box-4 {
        padding: 5px 0px 5px 0px;
        background-image: linear-gradient(to right, rgba(255, 85, 94), rgba(148, 82, 244));
        border-radius: 40px 0px 0px 40px;
        height: 46px;
        color: #fff;
    }

    .fist-colum-box-5 {
        padding: 5px 0px 5px 0px;
        background-image: linear-gradient(to right, rgba(255, 111, 188), rgba(255, 220, 92));
        border-radius: 0px 40px 40px 0px;
        height: 46px;
        color: #fff;
    }

    .fist-colum h3 {
        font-weight: 700;
        color: white;
        word-spacing: 0px;
        letter-spacing: 3px;
    }

    .story-text {
        height: 300px;
        text-align: justify;
        border-radius: 0px 0px 0px 40px;
        margin: 0% 0% 0% 3%;
        padding-top: 20px;
        background-color: #ffebed;
        color: black;
    }

    .our-mission-text {
        height: 300px;
        text-align: justify;
        border-radius: 0px 0px 40px 0px;
        padding-top: 20px;
        margin: 0% 2% 0% 0%;
        background-color: #ffebed;
        color: black;
    }

    .fist-colum-box-2 span {
        width: 100%;
        background-color: antiquewhite;
        color: #fff;
    }
</style>



<!--------------------slider start------------------------------>
<div class="container-fluid slider">
    <div class="row">
        <div class="col-md-sm-12">

        </div>
    </div>
</div>
<!--------------------slider and------------------------------>
<div class="container-fluid about-text">
    <div class="container">
        <div class="text">
            <h3 style="color:white; font-weight: 700; padding-top: 15px;"> YOUR GO TO HAPPY MARKETPLACE</h3>
        </div>
    </div>
</div>

<section>
        
    <div class="container-fluid main-box">
        <div class="row">
            <div class="col-md-sm-12 fist-colum">
                <div class="col-md-4 fist-colum-box-1"><img src="{{url("img/banner/whytruestory.jpg")}}"
                        alt=""> </div>
                <div class="col-md-8 fist-colum-box-2">
                    <h3> WHY TRUE STORY</h3>
                    <div class="col-md-sm-12 story-text">
                        <p></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid main-box">
        <div class="row">
            <div class="col-md-sm-12 fist-colum">
                <div class="col-md-8 fist-colum-box-3">
                    <h3>OUR MISSION</h3>
                    <div class="col-md-sm-12 our-mission-text">
                        <p></p>
                    </div>
                </div>
                <div class="col-md-4 fist-colum-box-1"><img src="{{url("img/banner/ourvission.png")}}"
                        alt=""> </div>

            </div>
        </div>
    </div>
    <!--------------------new section2 and ------------------------------>
    <!--------------------new section3 start ------------------------------>
    <div class="container-fluid main-box">
        <div class="row">
            <div class="col-md-sm-12 fist-colum">
                <div class="col-md-4 fist-colum-box-1"><img src="{{url("img/banner/ourmission.png")}}"
                        alt=""> </div>
                <div class="col-md-8 fist-colum-box-4">
                    <h3>OUR VISION</h3>
                    <div class="col-md-sm-12 story-text">
                        <p></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--------------------new section3 and ------------------------------>
    <!--------------------new section2 start ------------------------------>
    <div class="container-fluid main-box">
        <div class="row">
            <div class="col-md-sm-12 fist-colum">
                <div class="col-md-8 fist-colum-box-5">
                    <h3>OUR SISTER CONCERN BRANDS</h3>
                    <div class="col-md-sm-12 our-mission-text">
                        <p></p>
                    </div>
                </div>
                <div class="col-md-4 fist-colum-box-1"><img src="{{url("img/banner/alllogo.jpg")}}"
                        alt=""> </div>

            </div>
        </div>
    </div>
    
</section>





@endsection