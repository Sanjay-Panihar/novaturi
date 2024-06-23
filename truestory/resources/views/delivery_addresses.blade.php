
                     <!-- End .custom-checkbox -->
                    <div class="custom-control">
					
                        
                        
                        <h4 class="section-h4 newAddress">Ship to a different address?</h4>
                        <h4 class="section-h4 deliveryText"></h4>
                        
                       
                    </div>
                            <form id="addressAddEditForm" method="post" action="javascript:;"> @csrf
                                <input type="hidden" name="delivery_id">
                                       <div class="form-group">
                                          <label for="name">Name</label>
                                          <input type="text" class="form-control" id="delivery_name" name="delivery_name">
                                          <p id="delivery-delivery_name"></p>
                                       </div>
                                       <div class="form-group">
                                          <label for="address">Address</label>
                                          <input type="text" class="form-control" id="delivery_address" name="delivery_address">
                                          <p id="delivery-delivery_address"></p>
                                       </div>
                                       <div class="form-group">
                                          <label for="country">Country</label>
                                          <input type="text" class="form-control" id="delivery_Country" name="delivery_Country">
                                          <p id="delivery-delivery_Country"></p>
                                       </div>
                                       <div class="form-group">
                                          <label for="City">City</label>
                                          <input type="text" class="form-control" id="delivery_City" name="delivery_City">
                                          <p id="delivery-delivery_City"></p>
                                       </div>
                                       <div class="form-group">
                                          <label for="State">State</label>
                                          <input type="text" class="form-control" id="delivery_State" name="delivery_State">
                                          <p id="delivery-delivery_State"></p>
                                       </div>

                                       <div class="form-group">
                                          <label for="Pincode">Pincode</label>
                                          <input type="text" class="form-control" id="delivery_Pincode" name="delivery_Pincode">
                                          <p id="delivery-delivery_Pincode"></p>
                                       </div>

                                       <div class="form-group">
                                          <label for="Mobile">Mobile</label>
                                          <input type="text" class="form-control" id="delivery_Mobile" name="delivery_Mobile">
                                          <p id="delivery-delivery_Mobile"></p>
                                       </div>
                                       
                                       
                                       <!-- End .form-group -->
                                       <div class="form-footer">
                                          <button type="submit" name="submit" class="btn btn-outline-primary-2">
                                          <span>Add Address</span>
                                          <i class="icon-long-arrow-right"></i>
                                          </button>
                                          
                                          <!-- End .custom-checkbox -->
                                          
                                       </div>
                                       <!-- End .form-footer -->
                           </form>

            
                     <!-- End .custom-checkbox -->