@extends('frontlayout.frontlayout')
@section('content')

        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    

                    <div class="form-box">
                        <div class="form-tab">
                          
                            <ul class="nav nav-pills nav-fill" role="tablist">
                                

                                @if(Session::has('error_message'))
                                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            <div> Error:{{Session::get('error_message')}}</div>
                                        </div>
                                        @endif
                                        @if(Session::has('success_message'))
                                        <div class="alert alert-primary d-flex align-items-center" role="alert">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" 
                                            class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                                            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                            </svg>
                                            <div> Success:{{Session::get('success_message')}}</div>
                                        </div>
                                        @endif
            
                                        @if($errors->any())
                                        <div class="alert alert-primary d-flex align-items-center" role="alert">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" 
                                            class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                                            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                            </svg>
                                            <div> Error:<?php echo implode('', $errors->all('<div>:message</div>')); ?></div>
                                        </div>
                                        @endif
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade show active"  role="tabpanel" aria-labelledby="  -tab">
                                    <form  id="forgotpassword" action="javascript:;" method="post"> @csrf
                                        <div>
                                            
                                            <p id="forgot-error"></p>
                                        </div>
                                        <div class="form-group">
                                            <label for="singin-email">Username or email address *</label>
                                            <input type="email" class="form-control" id="email" name="email" >
                                            <p id="forgot-email"></p>
                                        </div><!-- End .form-group -->
                                       

                                        <div class="form-footer">
                                            <button type="submit" name="submit" class="btn btn-outline-primary-2">
                                                <span>Submit</span>
                                                <i class="icon-long-arrow-right"></i>
                                            </button>
                                        </div><!-- End .form-footer -->
                                    </form>
                                    
                                </div><!-- .End .tab-pane -->
                                
                            </div><!-- End .tab-content -->
                        </div><!-- End .form-tab -->
                    </div><!-- End .form-box -->
                </div><!-- End .modal-body -->
            </div><!-- End .modal-content -->
        </div>    
       


@endsection   