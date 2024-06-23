@extends('frontlayout.frontlayout')
@section('content')


        <main class="main">
            <div class="intro-slider-container">
                <div class="intro-slider owl-carousel owl-simple owl-nav-inside" data-toggle="owl" data-owl-options='{
                        "nav": false,
                        "responsive": {
                            "992": {
                                "nav": true
                            }
                        }
                    }'>
                    <div class="intro-slide" style="background-image: url('img/banner/Primary Banner 1.png');">
                        <div class="container intro-content">
                            <div class="row">
                                <div class="col-auto offset-lg-3 intro-col">
                                    <h3 class="intro-subtitle"></h3><!-- End .h3 intro-subtitle -->
                                    <h1 class="intro-title"><br><br>
                                        
                                    </h1><!-- End .intro-title -->

                                    
                                </div><!-- End .col-auto offset-lg-3 -->
                            </div><!-- End .row -->
                        </div><!-- End .container intro-content -->
                    </div><!-- End .intro-slide -->

                    <div class="intro-slide" style="background-image: url(img/banner/Primary Banner 2.png);">
                        <div class="container intro-content">
                            <div class="row">
                                <div class="col-auto offset-lg-3 intro-col">
                                    <h3 class="intro-subtitle"></h3><!-- End .h3 intro-subtitle -->
                                    <h1 class="intro-title"><br>
                                        
                                    </h1><!-- End .intro-title -->

                                    
                                </div><!-- End .col-auto offset-lg-3 -->
                            </div><!-- End .row -->
                        </div><!-- End .container intro-content -->
                    </div><!-- End .intro-slide -->

                    
                </div><!-- End .owl-carousel owl-simple -->

                <span class="slider-loader"></span><!-- End .slider-loader -->
            </div><!-- End .intro-slider-container -->

            <h2 class="title title-border " style="margin-bottom: 0px; margin-top: 40px;  background-image: url('img/banner/ban-9.jpg'); background-size: cover; text-align: center;
            padding: 30px;
                 font-size: larger; font-family: "Kosugi", sans-serif; "></h2><!-- End .title -->
            
            <div class="blog-posts" style="background-color:#ffffff; padding: 15px;">
                <div class="container">
                    

                    <div class="owl-carousel owl-simple carousel-with-shadow" data-toggle="owl" 
                        data-owl-options='{
                            "nav": false, 
                            "dots": true,
                            "items": 3,
                            "margin": 20,
                            "loop": false,
                            "responsive": {
                                "0": {
                                    "items":1
                                },
                                "600": {
                                    "items":3
                                },
                                "992": {
                                    "items":4
                                }
                            }
                        }'>
                        @foreach($featuredCategories as $category)
                        <article class="entry entry-display">
                            <figure class="entry-media">
                                <a href="{{url($category['url']) }}">
                                    <img src="{{ asset('admin/category_image/' . $category['category_image']) }}" alt="{{ $category['category_name'] }}" style="border-radius: 10px;">
                                </a>
                            </figure><!-- End .entry-media -->

                             <div class="banner-content">
                                
                                <center><a href="{{url($category['url']) }}" class="banner-link">{{ $category['category_name']}}</a></center>
                                
                                
                            </div><!-- End .banner-content -->
                        </article><!-- End .entry -->
                         @endforeach
                    </div><!-- End .owl-carousel -->

                    
                </div><!-- End .container -->
            </div>
               

            
             <h2 class="title title-border" style="margin-bottom: 0px; background-image: url('img/banner/ban-1.jpg'); background-size: cover; text-align: center; padding: 30px;
                text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);  font-size: xx-large; font-family: "Kosugi", sans-serif;"></h2>
            <!-- End .container -->
            <div style="background-color:#ffffff; padding: 15px;">
               <div class="container">
                
                <!-- End .title -->
                <div class="owl-carousel  owl-simple" data-toggle="owl" 
                    data-owl-options='{
                        "nav": false, 
                        "dots": true,
                        "margin": 30,
                        "loop": false,
                        "responsive": {
                            "0": {
                                "items":2
                            },
                            "420": {
                                "items":3
                            },
                            "600": {
                                "items":4
                            },
                            "900": {
                                "items":5
                            },
                            "1024": {
                                "items":5
                            },
                            "1280": {
                                "items":5,
                                "nav": true,
                                "dots": false
                            }
                        }
                    }'>
                    <a href="#" class="brand">
                       <center><img src="{{asset('img/banner/product/1.png')}}" alt="Brand Name"></center> 
                        <div>
                            <h4 style="font-size: 1.4rem; padding-top: 2rem;">100millionartfields</h4>   
                        </div>
                        
                    </a>
                    <a href="#" class="brand">
                       <center><img src="{{asset('img/banner/product/2.png')}}" alt="Brand Name"></center> 
                        <div>
                            <h4 style="font-size: 1.4rem; padding-top: 2rem;">The Odd Factory</h4>   
                        </div>
                        
                    </a>
                    <a href="#" class="brand">
                       <center><img src="{{asset('img/banner/product/3.png')}}" alt="Brand Name"></center> 
                        <div>
                            <h4 style="font-size: 1.4rem; padding-top: 2rem;">True Story Originals</h4>   
                        </div>
                        
                    </a>
                    <a href="#" class="brand">
                       <center><img src="{{asset('img/banner/product/4.png')}}" alt="Brand Name"></center> 
                        <div>
                            <h4 style="font-size: 1.4rem; padding-top: 2rem;">OnO</h4>   
                        </div>
                        
                    </a>
                    <a href="#" class="brand">
                       <center><img src="{{asset('img/banner/product/5.png')}}" alt="Brand Name"></center> 
                        <div>
                            <h4 style="font-size: 1.4rem; padding-top: 2rem;">BRAND 2</h4>   
                        </div>
                        
                    </a>                    
                

                    
                </div><!-- End .owl-carousel -->
            </div>
            
            </div>
            <h2 class="title title-border " style="margin-bottom: 0px; background-image: url('img/banner/ban-2.jpg'); background-size: cover; text-align: center; padding: 30px;
                text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); color:white; font-size: xx-large; font-family: "Kosugi", sans-serif;"></h2>
            
            
            <div style="background-color:#ffffff; padding: 15px;">
               <div class="container">
                
                <!-- End .title -->
                <div class="owl-carousel  owl-simple" data-toggle="owl" 
                    data-owl-options='{
                        "nav": false, 
                        "dots": true,
                        "margin": 30,
                        "loop": false,
                        "responsive": {
                            "0": {
                                "items":2
                            },
                            "420": {
                                "items":3
                            },
                            "600": {
                                "items":4
                            },
                            "900": {
                                "items":5
                            },
                            "1024": {
                                "items":5
                            },
                            "1280": {
                                "items":5,
                                "nav": true,
                                "dots": false
                            }
                        }
                    }'>
                    <a href="#" class="brand">
                       <center><img src="{{asset('img/banner/product/6.png')}}" alt="Brand Name"></center> 
                        <div>
                            <h4 style="font-size: 1.4rem; padding-top: 2rem;">HAND PAINTED</h4>   
                        </div>
                        
                    </a>  
                    <a href="#" class="brand">
                       <center><img src="{{asset('img/banner/product/7.png')}}" alt="Brand Name"></center> 
                        <div>
                            <h4 style="font-size: 1.4rem; padding-top: 2rem;">HAND MADE</h4>   
                        </div>
                        
                    </a>
                    <a href="#" class="brand">
                       <center><img src="{{asset('img/banner/product/8.png')}}" alt="Brand Name"></center> 
                        <div>
                            <h4 style="font-size: 1.4rem; padding-top: 2rem;">HAND MADE</h4>   
                        </div>
                        
                    </a>
                    <a href="#" class="brand">
                       <center><img src="{{asset('img/banner/product/9.png')}}" alt="Brand Name"></center> 
                        <div>
                            <h4 style="font-size: 1.4rem; padding-top: 2rem;">BESPOKE</h4>   
                        </div>
                        
                    </a>
                    <a href="#" class="brand">
                       <center><img src="{{asset('img/banner/product/10.png')}}" alt="Brand Name"></center> 
                        <div>
                            <h4 style="font-size: 1.4rem; padding-top: 2rem;">CUSTOMISED</h4>   
                        </div>
                        
                    </a>
                    

                    
                </div><!-- End .owl-carousel -->
            </div>
            
            </div>

            <h2 class="title title-border " style="margin-bottom: 0px; background-image: url('img/banner/ban3.jpg'); background-size: cover; text-align: center; padding: 30px;
                text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); color:white; font-size: xx-large; font-family: "Kosugi", sans-serif;"></h2>
              
            <div style="background-color:#ffffff; padding: 15px;">    
               <div class="container">
                
                
                <div class="owl-carousel mb-5 owl-simple" data-toggle="owl" 
                    data-owl-options='{
                        "nav": false, 
                        "dots": true,
                        "margin": 30,
                        "loop": false,
                        "responsive": {
                            "0": {
                                "items":2
                            },
                            "420": {
                                "items":3
                            },
                            "600": {
                                "items":4
                            },
                            "900": {
                                "items":5
                            },
                            "1024": {
                                "items":6
                            },
                            "1280": {
                                "items":6,
                                "nav": true,
                                "dots": false
                            }
                        }
                    }'>
                    <a href="" class="brand">
                       <center><img src="{{asset('img/banner/cat/11.png')}}" alt="Brand Name"></center> 
                        <div>
                            <h4 style="font-size: 1.4rem; padding-top: 2rem;">CLOTHING </h4>   
                        </div>
                        
                    </a>
                    
                    <a href="{{ route('suppliers', 'Graphic Designers') }}" class="brand">
                       <center><img src="{{asset('img/banner/cat/12.png')}}" alt="Brand Name"></center> 
                        <div>
                            <h4 style="font-size: 1.4rem; padding-top: 2rem;">JEWELERY & CRYSTALS </h4>   
                        </div>
                        
                    </a>
                    <a href="{{ route('suppliers', 'Graphic Design Agency') }}" class="brand">
                       <center><img src="{{asset('img/banner/cat/13.png')}}" alt="Brand Name"></center> 
                        <div>
                            <h4 style="font-size: 1.4rem; padding-top: 2rem;">  HOME DECOR</h4>   
                        </div>
                        
                    </a>
                    
                    <a href="{{ route('suppliers', 'Performance Marketer') }}" class="brand">
                       <center><img src="{{asset('img/banner/cat/14.png')}}" alt="Brand Name"></center> 
                        <div>
                            <h4 style="font-size: 1.4rem; padding-top: 2rem;"> STATIONARY</h4>   
                        </div>
                        
                    </a>
                    <a href="{{ route('suppliers', 'Photographer') }}" class="brand">
                       <center><img src="{{asset('img/banner/cat/Photographers.png')}}" alt="Brand Name"></center> 
                        <div>
                            <h4 style="font-size: 1.4rem; padding-top: 2rem;">SHOES</h4>   
                        </div>
                        
                    </a>
                    

                    
                </div><!-- End .owl-carousel -->
            </div>
            </div>
            <div style="background-color:#ffffff; padding: 15px;">    
               <div class="container">
                
                
                <div class="owl-carousel mb-5 owl-simple" data-toggle="owl" 
                    data-owl-options='{
                        "nav": false, 
                        "dots": true,
                        "margin": 30,
                        "loop": false,
                        "responsive": {
                            "0": {
                                "items":2
                            },
                            "420": {
                                "items":3
                            },
                            "600": {
                                "items":4
                            },
                            "900": {
                                "items":5
                            },
                            "1024": {
                                "items":6
                            },
                            "1280": {
                                "items":6,
                                "nav": true,
                                "dots": false
                            }
                        }
                    }'>
                    <a href="{{ route('suppliers', 'Fashion Designer') }}" class="brand">
                       <center><img src="{{asset('img/banner/cat/11.png')}}" alt="Brand Name"></center> 
                        <div>
                            <h4 style="font-size: 1.4rem; padding-top: 2rem;">ART PRINTS </h4>   
                        </div>
                        
                    </a>
                    
                    <a href="{{ route('suppliers', 'Graphic Designers') }}" class="brand">
                       <center><img src="{{asset('img/banner/cat/12.png')}}" alt="Brand Name"></center> 
                        <div>
                            <h4 style="font-size: 1.4rem; padding-top: 2rem;">ORGANIC SKIN CARE</h4>   
                        </div>
                        
                    </a>
                    <a href="{{ route('suppliers', 'Graphic Design Agency') }}" class="brand">
                       <center><img src="{{asset('img/banner/cat/13.png')}}" alt="Brand Name"></center> 
                        <div>
                            <h4 style="font-size: 1.4rem; padding-top: 2rem;">UPCYCLED PRODUCTS</h4>   
                        </div>
                        
                    </a>
                    
                    <a href="{{ route('suppliers', 'Performance Marketer') }}" class="brand">
                       <center><img src="{{asset('img/banner/cat/14.png')}}" alt="Brand Name"></center> 
                        <div>
                            <h4 style="font-size: 1.4rem; padding-top: 2rem;">Performance Marketeer</h4>   
                        </div>
                        
                    </a>
                    <a href="{{ route('suppliers', 'Photographer') }}" class="brand">
                       <center><img src="{{asset('img/banner/cat/Photographers.png')}}" alt="Brand Name"></center> 
                        <div>
                            <h4 style="font-size: 1.4rem; padding-top: 2rem;">HANDMADE PRODUCTS</h4>   
                        </div>
                        
                    </a>
                    <a href="{{ route('suppliers', 'Stylist') }}" class="brand">
                       <center><img src="{{asset('img/banner/cat/16.png')}}" alt="Brand Name"></center> 
                        <div>
                            <h4 style="font-size: 1.4rem; padding-top: 2rem;">BAGS </h4>   
                        </div>
                        
                    </a>
                    

                    
                </div><!-- End .owl-carousel -->
            </div>
            </div>
            
            <h2 class="title title-border " style=" margin-bottom: 0px; background-image: url('img/banner/ban-4.jpg'); background-size: cover; text-align: center; padding: 30px;
                    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); color:white; font-size: xx-large; font-family: "Kosugi", sans-serif;"> </h2>
            <div style=" padding: 15px; background: #ffffff;">        
                <div class="container clothing ">
                
                <div class="heading heading-flex heading-border " style="display:none;">
                   <div class="heading-right">
                        <ul class="nav nav-pills nav-border-anim justify-content-center" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="clot-new-link" data-toggle="tab" href="#clot-new-tab" role="tab" aria-controls="clot-new-tab" aria-selected="true"></a>
                            </li>
                            
                        </ul>
                   </div><!-- End .heading-right -->
                </div><!-- End .heading -->

                <div class="tab-content tab-content-carousel">
                    <div class="tab-pane p-0 fade show active" id="clot-new-tab" role="tabpanel" aria-labelledby="clot-new-link">
                        <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                            data-owl-options='{
                                "nav": false, 
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":2
                                    },
                                    "480": {
                                        "items":2
                                    },
                                    "768": {
                                        "items":3
                                    },
                                    "992": {
                                        "items":4
                                    },
                                    "1280": {
                                        "items":4,
                                        "nav": true
                                    }
                                }
                            }'>
                            
                            <div class="product">
                                <figure class="product-media">
                                    <a href="#">
                                        <img src="{{ asset('img/banner/20.png') }}" alt=" " style="border-radius: 140px;">
                                    </a>
                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    
                                    <h3 class="product-title"><a href="#">Karishma Kapur</a></h3><!-- End .product-ti{{ $category['category_name']}}tle -->
                                    <center><h6>The Odd Factory</h6></center>

                                </div><!-- End .product-body -->
                            </div><!-- End .product -->
                            <div class="product">
                                <figure class="product-media">
                                    <a href="#">
                                        <img src="{{ asset('img/banner/21.png') }}" alt=" " style="border-radius: 140px;">
                                    </a>
                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    
                                    <h3 class="product-title"><a href="#">Arpana Subramaniam</a></h3><!-- End .product-ti{{ $category['category_name']}}tle -->
                                    <center><h6>The Odd factory</h6></center>

                                </div><!-- End .product-body -->
                            </div><!-- End .product -->
                            <div class="product">
                                <figure class="product-media">
                                    <a href="#">
                                        <img src="{{ asset('img/banner/22.png') }}" alt=" " style="border-radius: 140px;">
                                    </a>
                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    
                                    <h3 class="product-title"><a href="#">Turiya Kapur</a></h3><!-- End .product-ti{{ $category['category_name']}}tle -->
                                    <center><h6>Novaturient & Co</h6></center>

                                </div><!-- End .product-body -->
                            </div><!-- End .product -->
                            <div class="product">
                                <figure class="product-media">
                                    <a href="#">
                                        <img src="{{ asset('img/banner/23.png') }}" alt=" " style="border-radius: 140px;">
                                    </a>
                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    
                                    <h3 class="product-title"><a href="#">Maitreyi </a></h3><!-- End .product-ti{{ $category['category_name']}}tle -->
                                    <center><h6>OnO</h6></center>

                                </div><!-- End .product-body -->
                            </div><!-- End .product -->
                           
                            

                            
                        </div><!-- End .owl-carousel -->
                    </div><!-- .End .tab-pane -->
                    
                </div><!-- End .tab-content -->
            </div><!-- End .container -->
            </div>
            
            <h2 class="title title-border " style=" margin-bottom: 0px; background-image: url('img/banner/ban-5.jpg'); background-size: cover; text-align: center; padding: 30px;
                    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); color:white; font-size: xx-large; font-family: "Kosugi", sans-serif;"> </h2>
            <div style="background-color:#ffffff; padding: 15px;">    
               <div class="container">
                
                
                <div class="owl-carousel mb-5 owl-simple" data-toggle="owl" 
                    data-owl-options='{
                        "nav": false, 
                        "dots": true,
                        "margin": 30,
                        "loop": false,
                        "responsive": {
                            "0": {
                                "items":2
                            },
                            "420": {
                                "items":3
                            },
                            "600": {
                                "items":4
                            },
                            "900": {
                                "items":5
                            },
                            "1024": {
                                "items":6
                            },
                            "1280": {
                                "items":6,
                                "nav": true,
                                "dots": false
                            }
                        }
                    }'>
                    <a href=" " class="brand">
                       <center><img src="{{asset('img/banner/product/24.png')}}" alt="Brand Name"></center> 
                        <div>
                            <h4 style="font-size: 1.4rem; padding-top: 2rem;">TRUESTORY ORIGINAL </h4>   
                        </div>
                        
                    </a>
                    <a href=" " class="brand">
                       <center><img src="{{asset('img/banner/product/25.png')}}" alt="Brand Name"></center> 
                        <div>
                            <h4 style="font-size: 1.4rem; padding-top: 2rem;">100MILLIONARTFIELDS  </h4>   
                        </div>
                        
                    </a>
                    <a href=" " class="brand">
                       <center><img src="{{asset('img/banner/product/26.png')}}" alt="Brand Name"></center> 
                        <div>
                            <h4 style="font-size: 1.4rem; padding-top: 2rem;">THE ODD FACTORY  </h4>   
                        </div>
                        
                    </a>
                    <a href=" " class="brand">
                       <center><img src="{{asset('img/banner/product/27.png')}}" alt="Brand Name"></center> 
                        <div>
                            <h4 style="font-size: 1.4rem; padding-top: 2rem;">NIDHI  </h4>   
                        </div>
                        
                    </a>
                    <a href=" " class="brand">
                       <center><img src="{{asset('img/banner/product/28.png')}}" alt="Brand Name"></center> 
                        <div>
                            <h4 style="font-size: 1.4rem; padding-top: 2rem;">ONO  </h4>   
                        </div>
                        
                    </a>
                    <a href=" " class="brand">
                       <center><img src="{{asset('img/banner/product/29.png')}}" alt="Brand Name"></center> 
                        <div>
                            <h4 style="font-size: 1.4rem; padding-top: 2rem;">ILLAYA  </h4>   
                        </div>
                        
                    </a>
                   
                    
                </div><!-- End .owl-carousel -->
            </div>
            </div>
            
             <h2 class="title title-border " style=" margin-bottom: 0px; background-image: url('img/banner/ban6.jpg'); background-size: cover; text-align: center; padding: 30px;
                    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); color:white; font-size: xx-large; font-family: "Kosugi", sans-serif;"> </h2>
                    
            <div style="background-color:#ffffff; padding: 15px;">    
               <div class="container">
                
                
                <div class="owl-carousel mb-5 owl-simple" data-toggle="owl" 
                    data-owl-options='{
                        "nav": false, 
                        "dots": true,
                        "margin": 30,
                        "loop": false,
                        "responsive": {
                            "0": {
                                "items":2
                            },
                            "420": {
                                "items":3
                            },
                            "600": {
                                "items":4
                            },
                            "900": {
                                "items":5
                            },
                            "1024": {
                                "items":5
                            },
                            "1280": {
                                "items":5,
                                "nav": true,
                                "dots": false
                            }
                        }
                    }'>
                    <a href="#" class="brand">
                       <center><img src="{{asset('img/banner/cat/heart.png')}}" alt="Brand Name"></center> 
                        <div>
                            <h4 style="font-size: 1.4rem; padding-top: 2rem;">SOCIETY WELFARE</h4>   
                        </div>
                        
                    </a>
                    
                    <a href="#" class="brand">
                       <center><img src="{{asset('img/banner/cat/31.png')}}" alt="Brand Name" style="width:128px; height:128px;"></center> 
                        <div>
                            <h4 style="font-size: 1.4rem; padding-top: 2rem;">HUMAN WELFARE</h4>   
                        </div>
                        
                    </a>
                    <a href="#" class="brand">
                       <center><img src="{{asset('img/banner/cat/sun.png')}}" alt="Brand Name"></center> 
                        <div>
                            <h4 style="font-size: 1.4rem; padding-top: 2rem;">EDUCATIONL</h4>   
                        </div>
                        
                    </a>
                    
                    <a href="#" class="brand">
                       <center><img src="{{asset('img/banner/cat/paw.png')}}" alt="Brand Name"></center> 
                        <div>
                            <h4 style="font-size: 1.4rem; padding-top: 2rem;">ANIMAL WELFAREL</h4>   
                        </div>
                        
                    </a>
                    <a href="#" class="brand">
                       <center><img src="{{asset('img/banner/cat/34.png')}}" alt="Brand Name" style="width:128px; height:128px;"></center> 
                        <div>
                            <h4 style="font-size: 1.4rem; padding-top: 2rem;">OTHERS</h4>   
                        </div>
                        
                    </a>


                    
                </div><!-- End .owl-carousel -->
            </div>
            </div>   
            <h2 class="title title-border" style=" margin-bottom: 0px; background-image: url('img/banner/ban-7.jpg'); background-size: cover; text-align: center; padding: 30px;
                text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); color:white; font-size: xx-large; font-family: "Kosugi", sans-serif;"></h2>
            <div style="background-color:#ffffff; padding: 15px;">    
               <div class="container">
                
                
                <div class="owl-carousel mb-5 owl-simple" data-toggle="owl" 
                    data-owl-options='{
                        "nav": false, 
                        "dots": true,
                        "margin": 30,
                        "loop": false,
                        "responsive": {
                            "0": {
                                "items":2
                            },
                            "420": {
                                "items":3
                            },
                            "600": {
                                "items":4
                            },
                            "900": {
                                "items":5
                            },
                            "1024": {
                                "items":6
                            },
                            "1280": {
                                "items":6,
                                "nav": true,
                                "dots": false
                            }
                        }
                    }'>
                    <a href="{{ route('suppliers', 'Fashion Designer') }}" class="brand">
                       <center><img src="{{asset('img/banner/cat/11.png')}}" alt="Brand Name"></center> 
                        <div>
                            <h4 style="font-size: 1.4rem; padding-top: 2rem;">Fashion Designer </h4>   
                        </div>
                        
                    </a>
                    
                    <a href="{{ route('suppliers', 'Graphic Designers') }}" class="brand">
                       <center><img src="{{asset('img/banner/cat/12.png')}}" alt="Brand Name"></center> 
                        <div>
                            <h4 style="font-size: 1.4rem; padding-top: 2rem;">Graphic Designers</h4>   
                        </div>
                        
                    </a>
                    <a href="{{ route('suppliers', 'Graphic Design Agency') }}" class="brand">
                       <center><img src="{{asset('img/banner/cat/13.png')}}" alt="Brand Name"></center> 
                        <div>
                            <h4 style="font-size: 1.4rem; padding-top: 2rem;">Graphic Design Agency</h4>   
                        </div>
                        
                    </a>
                    
                    <a href="{{ route('suppliers', 'Performance Marketer') }}" class="brand">
                       <center><img src="{{asset('img/banner/cat/14.png')}}" alt="Brand Name"></center> 
                        <div>
                            <h4 style="font-size: 1.4rem; padding-top: 2rem;">Performance Marketeer</h4>   
                        </div>
                        
                    </a>
                    <a href="{{ route('suppliers', 'Photographer') }}" class="brand">
                       <center><img src="{{asset('img/banner/cat/Photographers.png')}}" alt="Brand Name"></center> 
                        <div>
                            <h4 style="font-size: 1.4rem; padding-top: 2rem;">Photographer</h4>   
                        </div>
                        
                    </a>
                    <a href="{{ route('suppliers', 'Stylist') }}" class="brand">
                       <center><img src="{{asset('img/banner/cat/16.png')}}" alt="Brand Name"></center> 
                        <div>
                            <h4 style="font-size: 1.4rem; padding-top: 2rem;">Stylist </h4>   
                        </div>
                        
                    </a>
                    <a href="{{ route('suppliers', 'Marketing & PR Agency') }}" class="brand">
                       <center><img src="{{asset('img/banner/cat/17.png')}}" alt="Brand Name"></center> 
                        <div>
                            <h4 style="font-size: 1.4rem; padding-top: 2rem;">Marketing & PR Agency</h4>   
                        </div>
                        
                    </a>
                    <a href="{{ route('suppliers', 'Business Consultants') }}" class="brand">
                       <center><img src="{{asset('img/banner/cat/18.png')}}" alt="Brand Name"></center> 
                        <div>
                            <h4 style="font-size: 1.4rem; padding-top: 2rem;">Business Consultants</h4>   
                        </div>
                        
                    </a>
                    <a href="{{ route('suppliers', 'Performance & Digital Marketing  Agency') }}" class="brand">
                       <center><img src="{{asset('img/banner/cat/19.png')}}" alt="Brand Name"></center> 
                        <div>
                            <h4 style="font-size: 1.4rem; padding-top: 2rem;">Performance & Digital Marketing  Agency</h4>   
                        </div>
                        
                    </a>
                    <a href="{{ route('suppliers', '3PL Marketing Agency') }}" class="brand">
                       <center><img src="{{asset('front/assets/images/supplier icon/wardrobe.png')}}" alt="Brand Name"></center> 
                        <div>
                            <h4 style="font-size: 1.4rem; padding-top: 2rem;">3PL Marketing Agency</h4>   
                        </div>
                        
                    </a>
                    <a href="{{ route('suppliers', 'Website Developers') }}" class="brand">
                       <center><img src="{{asset('front/assets/images/supplier icon/sewing-machine.png')}}" alt="Brand Name"></center> 
                        <div>
                            <h4 style="font-size: 1.4rem; padding-top: 2rem;">Website Developers</h4>   
                        </div>
                        
                    </a>
                    
                    <a href="{{ route('suppliers', 'Content Creators') }}" class="brand">
                       <center><img src="{{asset('front/assets/images/supplier icon/mannequin.png')}}" alt="Brand Name"></center> 
                        <div>
                            <h4 style="font-size: 1.4rem; padding-top: 2rem;">Content Creators</h4>   
                        </div>
                        
                    </a>
                    <a href="{{ route('suppliers', 'NGO Tie Ups') }}" class="brand">
                       <center><img src="{{asset('front/assets/images/supplier icon/heat.png')}}" alt="Brand Name"></center> 
                        <div>
                            <h4 style="font-size: 1.4rem; padding-top: 2rem;">NGO Tie Ups</h4>   
                        </div>
                        
                    </a>
                    <a href="{{ route('suppliers', 'Brand Collab Tie Ups') }}" class="brand">
                       <center><img src="{{asset('front/assets/images/supplier icon/swimwear.png')}}" alt="Brand Name"></center> 
                        <div>
                            <h4 style="font-size: 1.4rem; padding-top: 2rem;">Brand Collab Tie Ups</h4>   
                        </div>
                        
                    </a>
                    <a href="{{ route('suppliers', 'Photoshoot Agency') }}" class="brand">
                       <center><img src="{{asset('front/assets/images/supplier icon/workout-clothes.png')}}" alt="Brand Name"></center> 
                        <div>
                            <h4 style="font-size: 1.4rem; padding-top: 2rem;">Photoshoot Agency</h4>   
                        </div>
                        
                    </a>

                    
                </div><!-- End .owl-carousel -->
            </div>
            </div>
            

            

            <div class="cta cta-horizontal cta-horizontal-box" style="background-color:black;">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-2xl-5col">
                            <h3 class="cta-title text-white">Join Our Newsletter</h3><!-- End .cta-title -->
                            <p class="cta-desc text-white">Subcribe to get information about products and coupons</p><!-- End .cta-desc -->
                        </div><!-- End .col-lg-5 -->
                        
                        <div class="col-3xl-5col">
                            <form action="#">
                                <div class="input-group">
                                    <input type="email" class="form-control form-control-white" placeholder="Enter your Email Address" aria-label="Email Adress" required>
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-white-2" type="submit"><span>Subscribe</span><i class="icon-long-arrow-right"></i></button>
                                    </div><!-- .End .input-group-append -->
                                </div><!-- .End .input-group -->
                            </form>
                        </div><!-- End .col-lg-7 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .cta -->
            <h2 class="title title-border" style=" margin-top: 7rem;  margin-bottom: 7rem; background-image: url('img/banner/ban-8.jpg'); background-size: cover; text-align: center; padding: 30px;
                text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); color:white; font-size: xx-large; font-family: "Kosugi", sans-serif;"></h2>
            <div style="background-color:#010101; padding: 15px;">    
               <div class="container">
                
                
                <div class="owl-carousel mb-5 owl-simple" data-toggle="owl" 
                    data-owl-options='{
                        "nav": false, 
                        "dots": true,
                        "margin": 30,
                        "loop": false,
                        "responsive": {
                            "0": {
                                "items":2
                            },
                            "420": {
                                "items":3
                            },
                            "600": {
                                "items":4
                            },
                            "900": {
                                "items":5
                            },
                            "1024": {
                                "items":7
                            },
                            "1280": {
                                "items":7,
                                "nav": true,
                                "dots": false
                            }
                        }
                    }'>
                    <a href="" class="brand">
                         <div>
                            <h4 style="font-size: 1.4rem; padding-top: 2rem; color: white;">Fashion Designer </h4>   
                        </div>
                       <center><img src="{{asset('img/banner/icon/1 (2).jpg')}}" alt="Brand Name" style="height: 100px;"></center> 
                       
                        
                    </a>
                                      
                    <a href="" class="brand">
                         <div>
                            <h4 style="font-size: 1.4rem; padding-top: 2rem;     color: white;">Fashion Designer </h4>   
                        </div>
                       <center><img src="{{asset('img/banner/icon/2 (1).jpg')}}" alt="Brand Name" style="height: 100px;"></center> 

                        
                    </a>                  

                    <a href="" class="brand">
                         <div>
                            <h4 style="font-size: 1.4rem; padding-top: 2rem;     color: white;">Fashion Designer </h4>   
                        </div>
                       <center><img src="{{asset('img/banner/icon/3.jpg')}}" alt="Brand Name" style="height: 100px;"></center> 
                        
                        
                    </a>
                    <a href="" class="brand">
                         <div>
                            <h4 style="font-size: 1.4rem; padding-top: 2rem;     color: white;">Fashion Designer </h4>   
                        </div>
                       <center><img src="{{asset('img/banner/icon/4.jpg')}}" alt="Brand Name" style="height: 100px;"></center> 

                        
                    </a> 
                    <a href="" class="brand">
                         <div>
                            <h4 style="font-size: 1.4rem; padding-top: 2rem;     color: white;">Fashion Designer </h4>   
                        </div>
                       <center><img src="{{asset('img/banner/icon/5.jpg')}}" alt="Brand Name" style="height: 100px;"></center> 
                        
                        
                    </a>
                    <a href="" class="brand">
                         <div>
                            <h4 style="font-size: 1.4rem; padding-top: 2rem;     color: white;">Fashion Designer </h4>   
                        </div>
                       <center><img src="{{asset('img/banner/icon/6.jpg')}}" alt="Brand Name"style="height: 100px;"></center> 

                        
                    </a> 
                    <a href="" class="brand">
                         <div>
                            <h4 style="font-size: 1.4rem; padding-top: 2rem;     color: white;">Fashion Designer </h4>   
                        </div>
                       <center><img src="{{asset('img/banner/icon/7 (1).jpg')}}" alt="Brand Name" style="height: 100px;"></center> 
                        
                        
                    </a>                    
                    
                </div><!-- End .owl-carousel -->
            </div>
            </div>
            
            
        </main>      
@endsection       
    
    


















                    