<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0;">
    <meta name="format-detection" content="telephone=no" />


    <style>
        /* Reset styles */
        body {
            margin: 0;
            padding: 0;
            min-width: 100%;
            width: 100% !important;
            height: 100% !important;
        }

        body,
        table,
        td,
        div,
        p,
        a {
            -webkit-font-smoothing: antialiased;
            text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
            line-height: 100%;
        }

        table,
        td {
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
            border-collapse: collapse !important;
            border-spacing: 0;
        }

        img {
            border: 0;
            line-height: 100%;
            outline: none;
            text-decoration: none;
            -ms-interpolation-mode: bicubic;
        }

        #outlook a {
            padding: 0;
        }

        .ReadMsgBody {
            width: 100%;
        }

        .ExternalClass {
            width: 100%;
        }

        .ExternalClass,
        .ExternalClass p,
        .ExternalClass span,
        .ExternalClass font,
        .ExternalClass td,
        .ExternalClass div {
            line-height: 100%;
        }

        /* Rounded corners for advanced mail clients only */
        @media all and (min-width: 560px) {
            .container {
                border-radius: 8px;
                -webkit-border-radius: 8px;
                -moz-border-radius: 8px;
                -khtml-border-radius: 8px;
            }
        }

        /* Set color for auto links (addresses, dates, etc.) */
        a,
        a:hover {
            color: #127DB3;
        }

        .footer a,
        .footer a:hover {
            color: #999999;
        }
    </style>

    <!-- MESSAGE SUBJECT -->
    <title>Vendor confirmation</title>

</head>

<!-- BODY -->
<!-- Set message background color (twice) and text color (twice) -->

<body topmargin="0" rightmargin="0" bottommargin="0" leftmargin="0" marginwidth="0" marginheight="0" width="100%" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; width: 100%; height: 100%; -webkit-font-smoothing: antialiased; text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; line-height: 100%;
	background-color: #F0F0F0;
	color: #000000;" bgcolor="#F0F0F0" text="#000000">

    <!-- SECTION / BACKGROUND -->
    <!-- Set message background color one again -->
    <table width="100%" align="center" border="0" cellpadding="0" cellspacing="0"
        style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; width: 100%;" class="background">
        <tr>
            <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0;"
                bgcolor="#F0F0F0">

               
                <table border="0" cellpadding="0" cellspacing="0" align="center" bgcolor="#FFFFFF" width="560" style="border-collapse: collapse; border-spacing: 0; padding: 0; width: inherit;
	                max-width: 560px;" class="container">

                    <tr>
                        <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0;
			                    padding-top: 20px;" class="hero"><a target="_blank" style="text-decoration: none;"
                                href=" "><img border="0" vspace="0" hspace="0"
                                    src="{{asset('logo/logomail.jpeg')}}"
                                    alt="Please enable images to view this content" title="Hero Image" width="560"
                                    style="width: 100%; max-width: 560px; color: #000000; font-size: 13px; margin: 0; padding: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: block;" /></a>
                        </td>
                    </tr>

                    
                    <tr>
                        <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 17px; font-weight: 400; line-height: 160%;
			                padding-top: 25px; 
			                color: #000000;
			                font-family: sans-serif;" class="paragraph">
                             Hi {{$name}}
                        </td>
                        
                    </tr>
                    <tr>
                        <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 17px; font-weight: 400; line-height: 160%;
			                padding-top: 25px; 
			                color: #000000;
			                font-family: sans-serif;" class="paragraph">
                            In Order to start using your new account, you need to confirm your email address. You can tap on the link below to verify your account
                        </td>
                        
                    </tr>

                   
                    <tr>
                        <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%;
			padding-top: 25px;
			padding-bottom: 5px;" class="button"><a href="https://github.com/konsav/email-templates/" target="_blank"
                                style="text-decoration: underline;">
                                <table border="0" cellpadding="0" cellspacing="0" align="center"
                                    style="max-width: 240px; min-width: 120px; border-collapse: collapse; border-spacing: 0; padding: 0;">
                                    <tr>
                                        <td align="center" valign="middle"
                                            style="padding: 12px 24px; margin: 0; background: black; border-collapse: collapse; border-spacing: 0; border-radius: 4px; -webkit-border-radius: 4px; -moz-border-radius: 4px; -khtml-border-radius: 4px;"
                                            bgcolor="#E9703E"><a target="_blank" style="text-decoration: underline;
					color: #FFFFFF; font-family: sans-serif; font-size: 17px; font-weight: 400; line-height: 120%;"
                                                href="{{ url('vendor/confirm/'.$code) }}">Verify Now
                                                
                                            </a>
                                        </td>
                                    </tr>
                                </table>
                            </a>
                        </td>
                    </tr>

                    
                    

                    <tr>
                        <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0;
			                    padding-top: 20px;" class="hero"><a target="_blank" style="text-decoration: none;"
                                href=" "><img border="0" vspace="0" hspace="0"
                                    src="{{asset('logo/footermail.jpeg')}}"
                                    alt="Please enable images to view this content" title="Hero Image" width="560"
                                    style="width: 100%; max-width: 560px; color: #000000; font-size: 13px; margin: 0; padding: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: block;" /></a>
                        </td>
                    </tr>

                    <tr>
                        <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0;
                        margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 17px;
                        font-weight: 400; line-height: 160%;
			            padding-top: 20px;
			            padding-bottom: 25px;
			            color:white;
                        background-color: #000000;
			            font-family: sans-serif;" class="paragraph">
                            Copyrighted by <a href="" target="_blank"
                                style="color: #127DB3; font-family: sans-serif; font-size: 17px; font-weight: 400; line-height: 160%;">Novaturi</a>
                        </td>
                    </tr>

                </table>

                

                
            </td>
        </tr>
    </table>

</body>

</html>