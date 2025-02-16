

<div class="container">
		<section id="typography">
		  <div class="page-header">
		    <h1>Customize T-Shirt</h1>
		  </div>
		
		  <!-- Headings & Paragraph Copy -->
		  <div class="row">			
		    <div class="span3">
		    	
		    	<div class="tabbable"> <!-- Only required for left/right tabs -->
				  <ul class="nav nav-tabs">
				  	<li class="active"><a href="#tab1" data-toggle="tab">T-Shirt Options</a></li>				    
				    <li><a href="#tab2" data-toggle="tab">Add Image</a></li>
				  </ul>
				  <div class="tab-content">
				     <div class="tab-pane active" id="tab1">
				     	<div class="well">
<!--					      	<h3>Tee Styles</h3>-->
<!--						      <p>-->
						      	<select id="tshirttype">                        
				                    <option value="img/crew_front.png" selected="selected">Short Sleeve Shirts</option>
				                    <option value="img/mens_longsleeve_front.png">Long Sleeve Shirts</option>                                        
				                    <option value="img/mens_hoodie_front.png">Hoodies</option>                    
				                    <option value="img/mens_tank_front.png">Tank tops</option>
								</select>	
<!--						      </p>-->								
					      </div>
					      <div class="well">
							<ul class="nav">
								<li class="color-preview" title="White" style="background-color:#ffffff;"></li>
								<li class="color-preview" title="Dark Heather" style="background-color:#616161;"></li>
								<li class="color-preview" title="Gray" style="background-color:#f0f0f0;"></li>
								<li class="color-preview" title="Charcoal" style="background-color:#5b5b5b;"></li>
								<li class="color-preview" title="Black" style="background-color:#222222;"></li>
								<li class="color-preview" title="Heather Orange" style="background-color:#fc8d74;"></li>
								<li class="color-preview" title="Heather Dark Chocolate" style="background-color:#432d26;"></li>
								<li class="color-preview" title="Salmon" style="background-color:#eead91;"></li>
								<li class="color-preview" title="Chesnut" style="background-color:#806355;"></li>
								<li class="color-preview" title="Dark Chocolate" style="background-color:#382d21;"></li>
								<li class="color-preview" title="Citrus Yellow" style="background-color:#faef93;"></li>
								<li class="color-preview" title="Avocado" style="background-color:#aeba5e;"></li>
								<li class="color-preview" title="Kiwi" style="background-color:#8aa140;"></li>
								<li class="color-preview" title="Irish Green" style="background-color:#1f6522;"></li>
								<li class="color-preview" title="Scrub Green" style="background-color:#13afa2;"></li>
								<li class="color-preview" title="Teal Ice" style="background-color:#b8d5d7;"></li>
								<li class="color-preview" title="Heather Sapphire" style="background-color:#15aeda;"></li>
								<li class="color-preview" title="Sky" style="background-color:#a5def8;"></li>
								<li class="color-preview" title="Antique Sapphire" style="background-color:#0f77c0;"></li>
								<li class="color-preview" title="Heather Navy" style="background-color:#3469b7;"></li>							
								<li class="color-preview" title="Cherry Red" style="background-color:#c50404;"></li>
							</ul>
						</div>			      
				     </div>				   
				    <div class="tab-pane" id="tab2">
				    	<div class="well">
				    		<div class="input-append">
							  <input class="span2" id="text-string" type="text" placeholder="add text here...">
							  <button id="add-text" class="btn" title="Add text"><i class="icon-share-alt"></i></button>
							  <hr>
							</div>
							
                            <div>
                                <hr>
							     <form action="" method="post" enctype="multipart/form-data">
                                     <input type="file" name="fileToUpload" id="fileToUpload">
                                     <input class="btn btn-primary" type="submit" value="Upload Custom Image" name="submit">
                                </form>
								
							  
							</div>
                            
				    	</div>				      
				    </div>
                      
				  </div>
				</div>				
		    </div>		
		    <div class="span6">		    
		    		<div align="center" style="min-height: 32px;">
		    			<div class="clearfix">
							<div class="btn-group inline pull-left" id="texteditor" style="display:none">						  
								<button id="font-family" class="btn dropdown-toggle" data-toggle="dropdown" title="Font Style"><i class="icon-font" style="width:19px;height:19px;"></i></button>		                      
							    <ul class="dropdown-menu" role="menu" aria-labelledby="font-family-X">
								    <li><a tabindex="-1" href="#" onclick="setFont('Arial');" class="Arial">Arial</a></li>
								    <li><a tabindex="-1" href="#" onclick="setFont('Helvetica');" class="Helvetica">Helvetica</a></li>
								    <li><a tabindex="-1" href="#" onclick="setFont('Myriad Pro');" class="MyriadPro">Myriad Pro</a></li>
								    <li><a tabindex="-1" href="#" onclick="setFont('Delicious');" class="Delicious">Delicious</a></li>
								    <li><a tabindex="-1" href="#" onclick="setFont('Verdana');" class="Verdana">Verdana</a></li>
								    <li><a tabindex="-1" href="#" onclick="setFont('Georgia');" class="Georgia">Georgia</a></li>
								    <li><a tabindex="-1" href="#" onclick="setFont('Courier');" class="Courier">Courier</a></li>
								    <li><a tabindex="-1" href="#" onclick="setFont('Comic Sans MS');" class="ComicSansMS">Comic Sans MS</a></li>
								    <li><a tabindex="-1" href="#" onclick="setFont('Impact');" class="Impact">Impact</a></li>
								    <li><a tabindex="-1" href="#" onclick="setFont('Monaco');" class="Monaco">Monaco</a></li>
								    <li><a tabindex="-1" href="#" onclick="setFont('Optima');" class="Optima">Optima</a></li>
								    <li><a tabindex="-1" href="#" onclick="setFont('Hoefler Text');" class="Hoefler Text">Hoefler Text</a></li>
								    <li><a tabindex="-1" href="#" onclick="setFont('Plaster');" class="Plaster">Plaster</a></li>
								    <li><a tabindex="-1" href="#" onclick="setFont('Engagement');" class="Engagement">Engagement</a></li>
				                </ul>
							    <button id="text-bold" class="btn" data-original-title="Bold"><img src="img/font_bold.png" height="" width=""></button>
							    <button id="text-italic" class="btn" data-original-title="Italic"><img src="img/font_italic.png" height="" width=""></button>
							    <button id="text-strike" class="btn" title="Strike" style=""><img src="img/font_strikethrough.png" height="" width=""></button>
							 	<button id="text-underline" class="btn" title="Underline" style=""><img src="img/font_underline.png"></button>
							 	<a class="btn" href="#" rel="tooltip" data-placement="top" data-original-title="Font Color"><input type="hidden" id="text-fontcolor" class="color-picker" size="7" value="#000000"></a>
						 		<a class="btn" href="#" rel="tooltip" data-placement="top" data-original-title="Font Border Color"><input type="hidden" id="text-strokecolor" class="color-picker" size="7" value="#000000"></a>
								  <!--- Background <input type="hidden" id="text-bgcolor" class="color-picker" size="7" value="#ffffff"> --->
							</div>							  
							<div class="pull-right" align="" id="imageeditor" style="display:none">
							  <div class="btn-group">										      
							      <button class="btn" id="bring-to-front" title="Bring to Front"><i class="icon-fast-backward rotate" style="height:19px;"></i></button>
							      <button class="btn" id="send-to-back" title="Send to Back"><i class="icon-fast-forward rotate" style="height:19px;"></i></button>
							      <button id="flip" type="button" class="btn" title="Show Back View"><i class="icon-retweet" style="height:19px;"></i></button>
							      <button id="remove-selected" class="btn" title="Delete selected item"><i class="icon-trash" style="height:19px;"></i></button>
							  </div>
							</div>			  
						</div>												
					</div>					  		
				<!--	EDITOR      -->	
                <button id="flipback" type="button" class="btn" title="Rotate View"><i class="icon-retweet" style="height:19px;"></i></button>
					<div id="shirtDiv" class="page" style="width: 530px; height: 630px; position: relative; background-color: rgb(255, 255, 255);">
						<img name="tshirtview" id="tshirtFacing" src="{{asset('design-part/old/img/crew_front.png')}}">
						<div id="drawingArea" style="position: absolute;top: 100px;left: 160px;z-index: 10;width: 200px;height: 400px;">					
							<canvas id="tcanvas" width=200 height="400" class="hover" style="-webkit-user-select: none;"></canvas>
						</div>

						<center><button id="downloadButton" class="btn btn-primary">Download Design</button></center>
					</div>

		

		    </div>
		
		    
		
		  </div>
		
		</section>
    </div>
     