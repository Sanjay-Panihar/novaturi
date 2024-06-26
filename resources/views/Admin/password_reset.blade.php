<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset</title>
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-size: 1em;
    }

    .login_form {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .form {
        width: 23em;
        padding: 2em;
        border-radius: 1em;
        box-shadow: 0 10px 25px rgba(90, 100, 100, .2);
    }

    .form_title {
        font-weight: 300;
        margin-bottom: 1.3em;
    }

    .form_div {
        position: relative;
        height: 3em;
        margin-bottom: 1.6em;
    }

    .form_input {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        font-size: 1em;
        border: .1em solid #dadce0;
        border-radius: .5em;
        outline: none;
        padding: 1em;
        z-index: 1;
        background: none;
    }

    .form_label {
        position: absolute;
        left: 1em;
        top: 1em;
        padding: 0 .25em;
        background-color: #fff;
        color: #80868b;
        font-size: 1em;
        transition: .4s;
    }

    .form_button {
        width: 100%;
        display: block;
        margin-left: auto;
        padding: 1em 2em;;
        outline: none;
        border: none;
        background-color: #7ebfb7;
        color: #fff;
        font-size: 1em;
        cursor: pointer;
        transition: .4s;
        margin-top: 6.3em;
    }

    .form_button:hover {
        transform: scale(0.90);
        box-shadow: 0 5px 5px rgba(0, 0, 0, 0.20);
    }

    .form_input:focus + .form_label {
        top: -.5em;
        left: .8em;
        color: rgb(28, 164, 248);
        font-size: .80em;
        font-weight: 600;
        z-index: 5;
    }

    .form_input:not(:placeholder-shown).form_input:not(:focus) + .form_label {
        top: -.5em;
        left: .8em;
        font-size: .80em;
        font-weight: 600;
        z-index: 5;
    }

    .form_input:focus {
        border: .1em solid rgb(28, 164, 248);
    }
    </style>
</head>
<body>
<div class="login_form">
    <form method="POST" action="{{ route('password.update') }}" class="form">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <center><h1 class="form_title">Reset Password</h1></center>
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="form_div">
            <input id="email" type="email" name="email" class="form_input" value="{{ old('email', $email) }}" required autocomplete="email" autofocus>
            <label for="email" class="form_label">Email</label>
        </div>

        <div class="form_div">
            <input id="password" type="password" name="password" class="form_input" required autocomplete="new-password">
            <label for="password" class="form_label">New Password</label>
        </div>

        <div class="form_div">
            <input id="password-confirm" type="password" name="password_confirmation" class="form_input" required autocomplete="new-password">
            <label for="password-confirm" class="form_label">Confirm New Password</label>
        </div>

        <input type="submit" class="form_button" value="Reset Password">
    </form>
</div>
</body>
</html>
