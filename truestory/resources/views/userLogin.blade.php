@extends('frontlayout.frontlayout')
@section('content')

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
                            <a class="nav-link active" id="signin-tab" data-toggle="tab" href="#signin" role="tab"
                                aria-controls="signin" aria-selected="true">Sign In</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="register-tab" data-toggle="tab" href="#register" role="tab"
                                aria-controls="register" aria-selected="false">Register</a>
                        </li>
                        @if(Session::has('error_message'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            <div> Error:{{Session::get('error_message')}}</div>
                        </div>
                        @endif
                        @if(Session::has('success_message'))
                        <div class="alert alert-primary d-flex align-items-center" role="alert">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16"
                                role="img" aria-label="Warning:">
                                <path
                                    d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                            </svg>
                            <div> Success:{{Session::get('success_message')}}</div>
                        </div>
                        @endif

                        @if($errors->any())
                        <div class="alert alert-primary d-flex align-items-center" role="alert">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16"
                                role="img" aria-label="Warning:">
                                <path
                                    d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                            </svg>
                            <div> Error:
                                <?php echo implode('', $errors->all('<div>:message</div>')); ?>
                            </div>
                        </div>
                        @endif
                    </ul>
                    <div class="tab-content" id="tab-content-5">
                        <div class="tab-pane fade show active" id="signin" role="tabpanel" aria-labelledby="  -tab">
                            <form id="loginform" action="javascript:;" method="post"> @csrf
                                <div>

                                    <p id="login-error"></p>
                                </div>
                                <div class="form-group">
                                    <label for="singin-email">Username or email address *</label>
                                    <input type="email" class="form-control" id="singin-email" name="email">
                                    <p id="login-email"></p>
                                </div><!-- End .form-group -->


                                <div class="form-group">
                                    <label for="singin-password">Password *</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="singin-password"
                                            name="password">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button"
                                                id="toggle-password">Show</button>
                                        </div>
                                    </div>
                                    <p id="login-password"></p>
                                </div><!-- End .form-group -->


                                <div class="form-footer">
                                    <button type="submit" name="submit" class="btn btn-outline-primary-2">
                                        <span>LOG IN</span>
                                        <i class="icon-long-arrow-right"></i>
                                    </button>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="signin-remember">
                                        <label class="custom-control-label" for="signin-remember">Remember Me</label>
                                    </div><!-- End .custom-checkbox -->

                                    <div class="custom-control ">
                                        <a href="{{url('user/forgot-password')}}" class="forgot-link">Forgot Your
                                            Password?</a>

                                    </div><!-- End .custom-checkbox -->


                                </div><!-- End .form-footer -->
                            </form>

                        </div><!-- .End .tab-pane -->
                        <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                            <form id="registerform" action="javascript:;" method="post">
                                @csrf
                                @if(Session::has('error_message'))
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                    <div> Error:{{Session::get('error_message')}}</div>
                                </div>
                                @endif
                                @if(Session::has('success_message'))
                                <div class="alert alert-primary d-flex align-items-center" role="alert">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                        class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16"
                                        role="img" aria-label="Warning:">
                                        <path
                                            d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                    </svg>
                                    <div> Success:{{Session::get('success_message')}}</div>
                                </div>
                                @endif

                                @if($errors->any())
                                <div class="alert alert-primary d-flex align-items-center" role="alert">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                        class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16"
                                        role="img" aria-label="Warning:">
                                        <path
                                            d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                    </svg>
                                    <div> Error:
                                        <?php echo implode('', $errors->all('<div>:message</div>')); ?>
                                    </div>
                                </div>
                                @endif
                                <div class="form-group">
                                    <label for="username">Name</label>
                                    <input type="text" class="form-control" id="username" name="name">
                                    <p id="user-name"></p>
                                </div>
                                <div class="form-group">
                                    <label for="userphone">Phone</label>
                                    <input type="text" class="form-control" id="userphone" name="mobile">
                                    <p id="user-mobile"></p>
                                </div>
                                <div class="form-group">
                                    <label for="useremail">Your email address *</label>
                                    <input type="email" class="form-control" id="useremail" name="email">
                                    <p id="user-email"></p>
                                </div><!-- End .form-group -->

                                <div class="form-group">
                                    <label for="userpassword">Password *</label>
                                    <input type="password" class="form-control" id="userpassword" name="password">
                                    <p id="user-password"></p>
                                </div><!-- End .form-group -->

                                <div class="form-footer">
                                    <button type="submit" name="submit" class="btn btn-outline-primary-2">
                                        <span>SIGN UP</span>
                                        <i class="icon-long-arrow-right"></i>
                                    </button>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="accept"
                                            id="userpolicy">
                                        <label class="custom-control-label" for="userpolicy">I agree to the <a
                                                href="#">privacy policy</a> *</label>
                                        <p id="user-accept"></p>
                                    </div><!-- End .custom-checkbox -->
                                </div><!-- End .form-footer -->
                            </form>

                        </div><!-- .End .tab-pane -->
                    </div><!-- End .tab-content -->
                </div><!-- End .form-tab -->
            </div><!-- End .form-box -->
        </div><!-- End .modal-body -->
    </div><!-- End .modal-content -->
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const passwordInput = document.getElementById('singin-password');
        const togglePasswordButton = document.getElementById('toggle-password');

        togglePasswordButton.addEventListener('click', function () {
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                togglePasswordButton.textContent = 'Hide';
            } else {
                passwordInput.type = 'password';
                togglePasswordButton.textContent = 'Show';
            }
        });
    });
</script>




@endsection