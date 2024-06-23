@extends('frontlayout.frontlayout')
@section('content')

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>TShirt Editor</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <!--[if IE]><script type="text/javascript" src="js/excanvas.js"></script><![endif]-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>	
	<script type="text/javascript" src="{{asset('design-part/old/js/fabric.js')}}"></script>
	
	
    <!-- Le styles -->
    <link type="text/css" rel="stylesheet" href="{{asset('design-part/old/css/jquery.miniColors.css')}}" />
    <link href="{{asset('design-part/old/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('design-part/old/css/bootstrap-responsive.min.css')}}" rel="stylesheet">
	 <script type="text/javascript">
	 </script>
	 <style type="text/css">
		/* main page css  */
		.well {
            min-height: 20px;
            padding: 19px;
            margin-bottom: 20px; 
            background-color: #f5f5f5;
            border: 1px solid #e3e3e3;
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            border-radius: 4px;
			box-shadow: 0px 3px 6px 0px rgba(0,0,0,0.16),
            0px 3px 6px 0px rgba(0,0,0,0.23);
        }    



		/* main page css end  */

		 .footer {
			padding: 70px 0;
			margin-top: 70px;
			border-top: 1px solid #E5E5E5;
			background-color: whiteSmoke;
			}			
	      body {
	        padding-top: 60px;	        
	      }
	      .color-preview {
	      	border: 1px solid #CCC;
	      	margin: 2px;
	      	zoom: 1;
	      	vertical-align: top;
	      	display: inline-block;
	      	cursor: pointer;
	      	overflow: hidden;
	      	width: 20px;
	      	height: 20px;
	      }
	      .rotate {  
		    -webkit-transform:rotate(90deg);
		    -moz-transform:rotate(90deg);
		    -o-transform:rotate(90deg);
		    /* filter:progid:DXImageTransform.Microsoft.BasicImage(rotation=1.5); */
		    -ms-transform:rotate(90deg);		   
		}		
		.Arial{font-family:"Arial";}
		.Helvetica{font-family:"Helvetica";}
		.MyriadPro{font-family:"Myriad Pro";}
		.Delicious{font-family:"Delicious";}
		.Verdana{font-family:"Verdana";}
		.Georgia{font-family:"Georgia";}
		.Courier{font-family:"Courier";}
		.ComicSansMS{font-family:"Comic Sans MS";}
		.Impact{font-family:"Impact";}
		.Monaco{font-family:"Monaco";}
		.Optima{font-family:"Optima";}
		.HoeflerText{font-family:"Hoefler Text";}
		.Plaster{font-family:"Plaster";}
		.Engagement{font-family:"Engagement";}

	 </style>
  </head>

  <body class="preview" data-spy="scroll" data-target=".subnav" data-offset="80">
  

  <!-- Navbar
    ================================================== -->

<!-- /container -->

    
<!-- Footer ================================================== -->
@include('Mockup')



    <script>
        $(document).ready(function(){
   $("#tshirttype").change(function(){
     $("img[name=tshirtview]").attr("src",$(this).val());

   });

});
    </script>
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster --> 
    <script>
        var valueSelect = $("#tshirttype").val();
        $("#tshirttype").change(function(){
            valueSelect = $(this).val();
        });
        $('#flipback').click(
		   function() {	
               if (valueSelect === "img/crew_front.png") {
                   if ($(this).attr("data-original-title") == "Show Back View") {
			   		$(this).attr('data-original-title', 'Show Front View');			        		       
			        $("#tshirtFacing").attr("src","img/crew_back.png");			        
			        a = JSON.stringify(canvas);
			        canvas.clear();
			        try
			        {
			           var json = JSON.parse(b);
			           canvas.loadFromJSON(b);
			        }
			        catch(e)
			        {}
			        
			    } else {
			    	$(this).attr('data-original-title', 'Show Back View');			    				    	
			    	$("#tshirtFacing").attr("src","img/crew_front.png");			    	
			    	b = JSON.stringify(canvas);
			    	canvas.clear();
			    	try
			        {
			           var json = JSON.parse(a);
			           canvas.loadFromJSON(a);			           
			        }
			        catch(e)
			        {}
			    }		
               }
               
               else if (valueSelect === "img/mens_longsleeve_front.png") {
                  if ($(this).attr("data-original-title") == "Show Back View") {
			   		$(this).attr('data-original-title', 'Show Front View');			        		       
			        $("#tshirtFacing").attr("src","img/mens_longsleeve_back.png");			        
			        a = JSON.stringify(canvas);
			        canvas.clear();
			        try
			        {
			           var json = JSON.parse(b);
			           canvas.loadFromJSON(b);
			        }
			        catch(e)
			        {}
			        
			    } else {
			    	$(this).attr('data-original-title', 'Show Back View');			    				    	
			    	$("#tshirtFacing").attr("src","img/mens_longsleeve_front.png");			    	
			    	b = JSON.stringify(canvas);
			    	canvas.clear();
			    	try
			        {
			           var json = JSON.parse(a);
			           canvas.loadFromJSON(a);			           
			        }
			        catch(e)
			        {}
			    }	
               }
               else if (valueSelect === "img/mens_tank_front.png") {
                  if ($(this).attr("data-original-title") == "Show Back View") {
			   		$(this).attr('data-original-title', 'Show Front View');			        		       
			        $("#tshirtFacing").attr("src","img/mens_tank_back.png");			        
			        a = JSON.stringify(canvas);
			        canvas.clear();
			        try
			        {
			           var json = JSON.parse(b);
			           canvas.loadFromJSON(b);
			        }
			        catch(e)
			        {}
			        
			    } else {
			    	$(this).attr('data-original-title', 'Show Back View');			    				    	
			    	$("#tshirtFacing").attr("src","img/mens_tank_front.png");			    	
			    	b = JSON.stringify(canvas);
			    	canvas.clear();
			    	try
			        {
			           var json = JSON.parse(a);
			           canvas.loadFromJSON(a);			           
			        }
			        catch(e)
			        {}
			    }	
               }
               else if (valueSelect === "img/mens_hoodie_front.png") {
                  if ($(this).attr("data-original-title") == "Show Back View") {
			   		$(this).attr('data-original-title', 'Show Front View');			        		       
			        $("#tshirtFacing").attr("src","img/mens_hoodie_back.png");			        
			        a = JSON.stringify(canvas);
			        canvas.clear();
			        try
			        {
			           var json = JSON.parse(b);
			           canvas.loadFromJSON(b);
			        }
			        catch(e)
			        {}
			        
			    } else {
			    	$(this).attr('data-original-title', 'Show Back View');			    				    	
			    	$("#tshirtFacing").attr("src","img/mens_hoodie_front.png");			    	
			    	b = JSON.stringify(canvas);
			    	canvas.clear();
			    	try
			        {
			           var json = JSON.parse(a);
			           canvas.loadFromJSON(a);			           
			        }
			        catch(e)
			        {}
			    }	
               }
			   /*	if ($(this).attr("data-original-title") == "Show Back View") {
			   		$(this).attr('data-original-title', 'Show Front View');			        		       
			        $("#tshirtFacing").attr("src","img/crew_back.png");			        
			        a = JSON.stringify(canvas);
			        canvas.clear();
			        try
			        {
			           var json = JSON.parse(b);
			           canvas.loadFromJSON(b);
			        }
			        catch(e)
			        {}
			        
			    } else {
			    	$(this).attr('data-original-title', 'Show Back View');			    				    	
			    	$("#tshirtFacing").attr("src","img/crew_front.png");			    	
			    	b = JSON.stringify(canvas);
			    	canvas.clear();
			    	try
			        {
			           var json = JSON.parse(a);
			           canvas.loadFromJSON(a);			           
			        }
			        catch(e)
			        {}
			    }		*/
			   	canvas.renderAll();
			   	setTimeout(function() {
			   		canvas.calcOffset();
			    },200);	   	
        });	
    </script>
    <script src="js/bootstrap.min.js"></script>  
<script type="text/javascript" src="{{asset('design-part/old/js/tshirtEditor.js')}}"></script>
	<script type="text/javascript" src="{{asset('design-part/old/js/jquery.miniColors.min.js')}}"></script>
    <script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-35639689-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
  </body>
</html>


@endsection   
