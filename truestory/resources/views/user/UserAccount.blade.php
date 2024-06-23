@extends('frontlayout.frontlayout')
@section('content')
        

        <main class="main">
        	<div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        		<div class="container">
        			<h1 class="page-title">My Account<span>Shop</span></h1>
        		</div><!-- End .container -->
        	</div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active" aria-current="page">My Account</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
            	<div class="dashboard">
	                <div class="container">
	                	<div class="row">
	                		<aside class="col-md-4 col-lg-3">
	                			<ul class="nav nav-dashboard flex-column mb-3 mb-md-0" role="tablist">
								    <li class="nav-item">
								        <a class="nav-link active" id="tab-dashboard-link" data-toggle="tab" href="#tab-dashboard" role="tab" aria-controls="tab-dashboard" aria-selected="true">Dashboard</a>
								    </li>
								    <li class="nav-item">
								        <a class="nav-link" id="tab-orders-link" data-toggle="tab" href="#tab-orders" role="tab" aria-controls="tab-orders" aria-selected="false">Orders</a>
								    </li>
								    <li class="nav-item">
								        <a class="nav-link" id="tab-downloads-link" data-toggle="tab" href="#tab-downloads" role="tab" aria-controls="tab-downloads" aria-selected="false">Downloads</a>
								    </li>
								    <li class="nav-item">
								        <a class="nav-link" id="tab-address-link" data-toggle="tab" href="#tab-address" role="tab" aria-controls="tab-address" aria-selected="false">Adresses</a>
								    </li>
								    <li class="nav-item">
								        <a class="nav-link" id="tab-account-link" data-toggle="tab" href="#tab-account" role="tab" aria-controls="tab-account" aria-selected="false">Change Password</a>
								    </li>
								    <li class="nav-item">
								        <a class="nav-link" href="#">Sign Out</a>
								    </li>
								</ul>
	                		</aside><!-- End .col-lg-3 -->

	                		<div class="col-md-8 col-lg-9">
	                			<div class="tab-content">
								    <div class="tab-pane fade show active" id="tab-dashboard" role="tabpanel" aria-labelledby="tab-dashboard-link">
								    	<p>Hello <span class="font-weight-normal text-dark">User</span> (not <span class="font-weight-normal text-dark">User</span>? <a href="#">Log out</a>) 
								    	<br>
								    	From your account dashboard you can view your <a href="#tab-orders" class="tab-trigger-link link-underline">recent orders</a>, manage your <a href="#tab-address" class="tab-trigger-link">shipping and billing addresses</a>, and <a href="#tab-account" class="tab-trigger-link">edit your password and account details</a>.</p>
								    </div><!-- .End .tab-pane -->

								    <div class="tab-pane fade" id="tab-orders" role="tabpanel" aria-labelledby="tab-orders-link">
								    	<p>No order has been made yet.</p>
								    	<a href="category.html" class="btn btn-outline-primary-2"><span>GO SHOP</span><i class="icon-long-arrow-right"></i></a>
								    </div><!-- .End .tab-pane -->

								    <div class="tab-pane fade" id="tab-downloads" role="tabpanel" aria-labelledby="tab-downloads-link">
								    	<p>No downloads available yet.</p>
								    	<a href="category.html" class="btn btn-outline-primary-2"><span>GO SHOP</span><i class="icon-long-arrow-right"></i></a>
								    </div><!-- .End .tab-pane -->

								    <div class="tab-pane fade" id="tab-address" role="tabpanel" aria-labelledby="tab-address-link">
								    	<p>The following addresses will be used on the checkout page by default.</p>

								    	<div class="row">
								    	

								    		<div class="col-lg-6">
											<div class="form-group">

											       <p id="account-success"></p>
                                                </div>
											<form  id="accountform" action="javascript:;" method="post"> @csrf
											    
											    <div class="form-group">
                                                    <label for="username">Email</label>
                                                    <input class="form-control" value="{{Auth::user()->email}}" readonly="">
                                                    <p id="account-email"></p>
                                                </div>
                                                <div class="form-group">
                                                    <label for="accountname">Name</label>
                                                    <input type="text" class="form-control" id="accountname" name="name" value="{{Auth::user()->name}}">
                                                    <p id="account-name"></p>
                                                </div>
												<div class="form-group">
                                                    <label for="accountmobile">Mobile</label>
                                                    <input type="text" class="form-control" id="accountmobile" name="mobile" value="{{Auth::user()->mobile}}">
                                                    <p id="account-mobile"></p>
                                                </div>
												<div class="form-group">
                                                    <label for="accountaddress">Address</label>
                                                    <input type="text" class="form-control" id="accountaddress" name="address" value="{{Auth::user()->address}}">
                                                    <p id="account-address"></p>
                                                </div>
												<div class="form-group">
                                                    <label for="accountcity">City</label>
                                                    <input type="text" class="form-control" id="accountcity" name="city" value="{{Auth::user()->city}}">
                                                    <p id="account-city"></p>
                                                </div>
												<div class="form-group">
                                                    <label for="accountstate">State</label>
                                                    <input type="text" class="form-control" id="accountstate" name="state" value="{{Auth::user()->state}}">
                                                    <p id="account-state"></p>
                                                </div>
												<div class="form-group">
                                                    <label for="accountphone">country</label>
                                                    <input type="text" class="form-control" id="accountcountry" name="country" value="{{Auth::user()->country}}">
                                                    <p id="account-country"></p>
                                                </div>
												<div class="form-group">
                                                    <label for="accountpincode">Pincode</label>
                                                    <input type="text" class="form-control" id="accountphone" name="pincode" value="{{Auth::user()->pincode}}">
                                                    <p id="account-pincode"></p>
                                                </div>
												<div class="form-footer">
                                                    <button type="submit" name="submit" class="btn btn-outline-primary-2">
                                                        <span>SIGN UP</span>
                                                        <i class="icon-long-arrow-right"></i>
                                                    </button>
                                                </div>  
			                			    </form>
								    		</div><!-- End .col-lg-6 -->
								    	</div><!-- End .row -->
								    </div><!-- .End .tab-pane -->

								    <div class="tab-pane fade" id="tab-account" role="tabpanel" aria-labelledby="tab-account-link">
								    	<form action="#"  id="registerform" action="javascript:;" method="post">
                                        @csrf
			                				

		                					<label>Email address *</label>
		        							<input type="email" class="form-control" required>

		            						<label>Current password (leave blank to leave unchanged)</label>
		            						<input type="password" class="form-control">

		            						<label>New password (leave blank to leave unchanged)</label>
		            						<input type="password" class="form-control">

		            						<label>Confirm new password</label>
		            						<input type="password" class="form-control mb-2">

		                					<button type="submit" class="btn btn-outline-primary-2">
			                					<span>SAVE CHANGES</span>
			            						<i class="icon-long-arrow-right"></i>
			                				</button>
			                			</form>
								    </div><!-- .End .tab-pane -->
								</div>
	                		</div><!-- End .col-lg-9 -->
	                	</div><!-- End .row -->
	                </div><!-- End .container -->
                </div><!-- End .dashboard -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->

       
    </div><!-- End .page-wrapper -->
@endsection   
