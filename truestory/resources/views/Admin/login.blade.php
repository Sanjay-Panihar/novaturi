<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-login</title>
    <style>
    *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body{
    font-size: 1em;
}

.login_form{
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.form{
    width: 23em;
    padding:2em;
    border-radius: 1em;
    box-shadow: 0 10px 25px rgba(90,100,100,.2);
}

.form_title{
    font-weight: 300;
    margin-bottom: 1.3em;
}

.form_div{
    position: relative;
    height: 3em;
    margin-bottom: 1.6em;
}


.form_input{
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

.form_label{
    position: absolute;
    left: 1em;
    top: 1em;
    padding: 0 .25em;
    background-color: #fff;
    color: #80868b;
    font-size: 1em;
    transition: .4s;
}

.form_button{
    width: 100%;
    display: block;
    margin-left: auto;
    padding: 1em 2em;;
    outline: none;
    border: none;
    background-color:#7ebfb7;
    color: #fff;
    font-size: 1em;

    cursor: pointer;
    transition: .4s;
    margin-top: 6.3em;
}

.form_button:hover{
    transform: scale(0.90);
    box-shadow: 0 5px 5px rgba(0,0,0,0.20);
}

.form_input:focus + .form_label{
    top: -.5em;
    left: .8em;
    color: rgb(28,164,248);
    font-size: .80em;
    font-weight: 600;
    z-index: 5;
}

.form_input:not(:placeholder-shown).form_input:not(:focus) + .form_label{
    top: -.5em;
    left: .8em;
    font-size: .80em;
    font-weight: 600;
    z-index: 5;
}

.form_input:focus{
    border: .1em solid rgb(28,164,248);
}

.login_form #captcha{
    margin: 15px 0px;
}

.login_form #captcha .preview{
    color: #555;
    width: 100%;
    text-align: center;
    height: 40px;
    line-height: 40px;
    letter-spacing: 8px;
    border: 1px dashed #888;
    border-radius: 0.5em;
    margin-bottom: 1.6em;

}

.form_input_captcha {
    position: relative;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    font-size: 1em;
    border: 0.1em solid #dadce0;
    border-radius: 0.5em;
    outline: none;
    padding: 1em;
    z-index: 1;
    background: none;
} 


.form_label_captcha{
    position: absolute;
    left: 1em;
    top: 5.2em;
    padding: 0 .25em;
    background-color: #fff;
    color: #80868b;
    font-size: 1em;
    transition: .4s;
}

.form_input_captcha:focus + .form_label_captcha{
    top: 4.7em;
    left: .8em;
    color: rgb(28,164,248);
    font-size: .80em;
    font-weight: 600;
    z-index: 5;
}

.form_input_captcha:not(:placeholder-shown).form_input_captcha:not(:focus) + .form_label_captcha{
    top: 4.6em;;
    left: .8em;
    font-size: .80em;
    font-weight: 600;
    z-index: 5;
}

.form_input_captcha:focus{
    border: .1em solid rgb(28,164,248);
}

.login_form #captcha .preview span{
    display: inline-block;
    user-select: none;
}

.login_form #captcha .captcha_form{
    display: flex;
}

.login_form #captcha .captcha_form input{
    width: 100%;
    font-size: 1em;
    border-radius: 0.5em;
    outline: none; 
    padding: 1em;
    z-index: 1;
    background: none;
}


.login_form #captcha .captcha_form .captcha_refersh{
    width: 40px;
    border: none;
    outline: none;
    background: #888;
    color: #eee;
    cursor: pointer;
    border-radius: 0.5em;
    margin-left: 5px;
}
.captcha_refersh{
    transition: .4s;

}

.captcha_refersh:hover{
    transition: .4s;

    transform: scale(0.90);
}
    </style>
</head>
<body>
<div class="login_form">
<form action="{{url('AdminLogin')}}" method="POST" class="form">
        @csrf
            <center><h1 class="form_title"> Login </h1></center>
            @if(Session::has('error_message'))
            <div class="alert alert-primary d-flex align-items-center" role="alert">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" 
                class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
              </svg>
               <div> Error:{{Session::get('error_message')}}</div>
            </div>
            @endif
            <div class="form_div">
                <input type="text" name="email" id="email" class ="form_input" placeholder=" " required="">
                <label class="form_label">Email</label>
            </div>

            <div class="form_div">
                <input type="password" name="password" id="password" class="form_input" placeholder=" " required="">
                <label class="form_label">Password</label>
            </div>

           <!-- <div id="captcha" class="form_div">
                <div class="preview"></div>
                <div class="captcha_form"> 
                    <input type="text" id="captcha_form" class="form_input_captcha" placeholder=" " >
                    <label class="form_label_captcha">Enter Captcha</label>
                    <button class="captcha_refersh">
                        <img src=".\images\rotate.png" alt="">
                    </button>
                </div>
            </div> -->

            <input type="submit" class="form_button" value="Log In">
        </form>
    </div>
    
</body>
<script>
    /*(function(){
    const fonts = ["cursive"];
    let captchaValue = "";
    function gencaptcha()
    {
        let value = btoa(Math.random()*1000000000);
        value = value.substr(0,5 + Math.random()*5);
        captchaValue = value;
    }

    function setcaptcha()
    {
        let html = captchaValue.split("").map((char)=>{
            const rotate = -20 + Math.trunc(Math.random()*30);
            const font = Math.trunc(Math.random()*fonts.length);
            return`<span
            style="
            transform:rotate(${rotate}deg);
            font-family:${font[font]};
            "
           >${char} </span>`;
        }).join("");
        document.querySelector(".login_form #captcha .preview").innerHTML = html;
    }

    function initCaptcha()
    {
        document.querySelector(".login_form #captcha .captcha_refersh").addEventListener("click",function(){
            gencaptcha();
            setcaptcha();
        });

        gencaptcha();
        setcaptcha();
    }
    initCaptcha();

    document.querySelector(".login_form .form_button").addEventListener("click",function(){
        let inputcaptchavalue = document.querySelector(".login_form #captcha input").value;

        if (inputcaptchavalue != captchaValue) 
        {
            // swal("","Log in","success");
            alert("invalid captcha");
        }
        else
        {
            // swal("Invalid Captcha");
            //alert("Invalid Captcha");
        }
    });
})();
</script>
</html>