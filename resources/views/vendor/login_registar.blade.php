<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        /* === Google Font ===*/
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        /* === Variables Define ===*/
        :root {
            --primary-color: #3525D3;
            --white-color: #fff;
            --black-color: #3C4A57;
            --light-gray: #E4E8EE;
        }

        /* === Body CSS ===*/
        body {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        /* === Main Content CSS ===*/
        .wrapper {
            padding: 50px 25px 0;
            max-width: 668px;
            width: 100%;
            margin: auto;
        }

        .wrapper::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: url("images/bg-1.svg");
            background-position: center center;
            background-size: cover;
            background-repeat: no-repeat;
            min-height: 100vh;
            z-index: -1;
        }

        .wrapper .headline {
            text-align: center;
            padding-bottom: 48px;
        }

        .wrapper .headline h1 {
            font-size: 42px;
            font-weight: 700;
            line-height: 52px;
        }

        .wrapper .form {
            max-width: 350px;
            width: 100%;
            margin: auto;
        }

        .wrapper .form-group {
            margin-bottom: 15px;
        }

        .wrapper .form-group input {
            display: block;
            font-size: 16px;
            line-height: 24px;
            letter-spacing: -0.1px;
            padding: 11px 15px;
            height: 48px;
            border-radius: 5px;
            color: var(--black-color);
            border: 1px solid #e4e8ee;
            box-shadow: none;
            width: 100%;
        }

        .wrapper .form-group input:focus {
            outline: none;
        }

        .wrapper .form-group input::placeholder {
            color: var(--black-color);
            font-weight: 400;
            font-size: 14px;
        }

        .wrapper .btn {
            width: 100%;
            margin: 15px 0 30px;
            font-size: 14px;
            line-height: 22px;
            font-weight: 700;
            padding: 12px 29px;
            height: 48px;
            text-transform: uppercase;
            color: var(--white-color);
            background-color: #7ebfb7;
            border: none;
            border-radius: 2px;
            cursor: pointer;
            text-align: center;
        }

        .wrapper .btn:focus {
            outline: none;
        }

        .wrapper .account-exist {
            color: var(--black-color);
            border-top: 1px solid var(--light-gray);
            padding-top: 20px;
            text-align: center;
        }

        .wrapper .account-exist a {
            color: var(--primary-color);
        }

        .wrapper .forget-password {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 15px 0;
        }

        .wrapper .forget-password a {
            color: var(--primary-color);
        }

        .wrapper .forget-password .check-box {
            font-size: 15px;
            color: var(--black-color);
        }

        .signup.inActive {
            display: none;
        }

        .signin {
            display: none;
        }

        .signin.active {
            display: block;
        }

        @media (max-width:1030px) {
            .wrapper::before {
                left: -25%;
                min-height: 60vh;
                height: 500px;
            }
        }

        @media (max-width:767px) {
            .wrapper {
                max-width: 550px;
            }

            .wrapper .headline h1 {
                font-size: 22px;
                line-height: 25px;
            }
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="headline">
            <h1>Welcome. We exist to make entrepreneurship easier.</h1>
        </div>
        <form class="form" method="POST" action="{{url('Vendor/registration')}}">
            @csrf
            @if(Session::has('error_message'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <div> Error:{{Session::get('error_message')}}</div>
                </div>
            @endif
            @if(Session::has('success_message'))
                <div class="alert alert-primary d-flex align-items-center" role="alert">

                    <div> Success:{{Session::get('success_message')}}</div>
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-primary d-flex align-items-center" role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                        class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img"
                        aria-label="Warning:">
                        <path
                            d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                    </svg>
                    <div> Error:<?php    echo implode('', $errors->all('<div>:message</div>')); ?></div>
                </div>
            @endif
            <div class="signup">
                <div class="form-group">
                    <select class="form-select" aria-label="Default select example" name="vendorType" required>
                        <option value="" selected>Please Select Your Service Type</option>
                        <option value="Supplier">Supplier</option>
                        <option value="Freelancer" >Freelancer</option>
                    </select>
                    <div class="form-group">
                        <input type="text" name="name" placeholder="Full name">
                    </div>
                    <div class="form-group">
                        <input type="phone" name="mobile" placeholder="Mobile Number">
                    </div>

                    <div class="form-group">
                        <input type="email" name="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" placeholder="Create Password">
                    </div>

                    <!--<button type="submit" name="submit" value="registar" class="btn">SIGN UP</button>-->
                    <input type="submit" class="btn" value="register">
                    <div class="account-exist">
                        Already have an account? <a href="{{url('AdminLogin')}}" id="login">Login</a>
                    </div>
                </div>
                <!--  <div class="signin"> 
                <div class="form-group">
                    <input type="email" placeholder="Email" required="">
                </div>
                <div class="form-group">
                    <input type="password" placeholder="Password" required="">
                </div>
                <div class="forget-password">
                    <div class="check-box">
                        <input type="checkbox" id="checkbox">
                        <label for="checkbox">Remember me</label>
                    </div>
                    <a href="#">Forget password?</a>
                </div>
                <button type="submit" class="btn">LOGIN</button>
                <div class="account-exist">
                    Create New a account? <a href="#" id="signup">Signup</a>
                </div>
            </div> -->
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

    <script>
        let btnLogin = document.getElementById("login");
        let btnSignUp = document.getElementById("signup");

        let signIn = document.querySelector(".signin");
        let signUp = document.querySelector(".signup");

        btnLogin.onclick = function () {
            signIn.classList.add("active");
            signUp.classList.add("inActive");
        }

        btnSignUp.onclick = function () {
            signIn.classList.remove("active");
            signUp.classList.remove("inActive");
        }


    </script>
</body>

</html>