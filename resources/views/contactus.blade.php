@extends('frontlayout.frontlayout')
@section('content')

<main class="main">
            <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
                <div class="container">
                    
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->
            <div class="container">
	        	<div class="page-header page-header-big text-center" style="background-image: url('assets/images/contact-header-bg.jpg')">
        			<h1 class="page-title text-white">Contact us<span class="text-white">keep in touch with us</span></h1>
	        	</div><!-- End .page-header -->
            </div><!-- End .container -->

            <div class="page-content pb-0">
                <div class="container">
                	<div class="row">
                		<div class="col-lg-6 mb-2 mb-lg-0">
                			<h2 class="title mb-1">Contact Information</h2><!-- End .title mb-2 -->
                			<p class="mb-3">Thank you for visiting our site.  If you have questions about our company, services, 
                                or want to know more about how we can help you, please use the form below to contact us or send us an email. 
                                You can also Connect with Us on Instagram</p>
                			<div class="row">
                				<div class="col-sm-7">
                					<div class="contact-info">
                						<h3>The Office</h3>

                						<ul class="contact-list">
                							<li>
                								<i class="bi bi-instagram"></i>
                								<a href="https://www.instagram.com/novaturi.in/">novaturi.in</a>
	                							
	                						</li>
                							<li>
                								
                								<i class="bi bi-whatsapp"></i>
                								<a href="#">+91-7506922569</a>
                							</li>
                							<li>
                								<i class="bi bi-envelope"></i>
                								<a href="mailto:#">info@novaturi.in</a>
                							</li>
                							<li>
                								<i class="bi bi-house"></i>
                								<a href="">NR Jay Coach Stop, GR FLR, 13, Guru Gobind Singh Industrial Ltd, Off W E Highway, Goregaon East, Mumbai, Mumbai Suburban, Maharashtra, 400063</a>
                							</li>
                							
                						</ul><!-- End .contact-list -->
                					</div><!-- End .contact-info -->
                				</div><!-- End .col-sm-7 -->

                				
                			</div><!-- End .row -->
                		</div><!-- End .col-lg-6 -->
                		<div class="col-lg-6">
                			<h2 class="title mb-1">Got Any Questions?</h2><!-- End .title mb-2 -->
                			<p class="mb-2">Use the form below to get in touch with our team</p>

                			<form action="#" class="contact-form mb-3">
                				<div class="row">
                					<div class="col-sm-6">
                                        <label for="cname" class="sr-only">Name</label>
                						<input type="text" class="form-control" id="cname" placeholder="Name *" required>
                					</div><!-- End .col-sm-6 -->

                					<div class="col-sm-6">
                                        <label for="cemail" class="sr-only">Email</label>
                						<input type="email" class="form-control" id="cemail" placeholder="Email *" required>
                					</div><!-- End .col-sm-6 -->
                				</div><!-- End .row -->

                				<div class="row">
                					<div class="col-sm-6">
                                        <label for="cphone" class="sr-only">Phone</label>
                						<input type="tel" class="form-control" id="cphone" placeholder="Phone">
                					</div><!-- End .col-sm-6 -->

                					<div class="col-sm-6">
                                        <label for="cwebsite" class="sr-only">Website </label>
                						<input type="text" class="form-control" id="cwebsite" placeholder="Website link">
                					</div><!-- End .col-sm-6 -->
                				</div><!-- End .row -->

                                <label for="cmessage" class="sr-only">Message</label>
                				<textarea class="form-control" cols="30" rows="4" id="cmessage" required placeholder="Message *"></textarea>

                				<button type="submit" class="btn btn-outline-primary-2 btn-minwidth-sm">
                					<span>SUBMIT</span>
            						<i class="icon-long-arrow-right"></i>
                				</button>
                			</form><!-- End .contact-form -->
                		</div><!-- End .col-lg-6 -->
                	</div><!-- End .row -->

                	<hr class="mt-4 mb-5">
                </div><!-- End .container -->
            	
            </div><!-- End .page-content -->
        </main><!-- End .main -->


@endsection