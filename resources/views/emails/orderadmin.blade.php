<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">  <!-- utf-8 works for most cases -->
    <meta name="viewport" content="width=device-width"> <!-- Forcing initial-scale shouldn't be necessary -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- Use the latest (edge) version of IE rendering engine -->
    <meta name="x-apple-disable-message-reformatting">  <!-- Disable auto-scale in iOS 10 Mail entirely -->
    <title></title> <!-- The title tag shows in email notifications, like Android 4.4. -->

                           <!-- Web Font / @font-face : BEGIN -->
                           <!-- NOTE: If web fonts are not required, lines 10 - 27 can be safely removed. -->

                           <!-- Desktop Outlook chokes on web font references and defaults to Times New Roman, so we force a safe fallback font. -->
                           <!--[if mso]>
    <style>
        * {
            font-family: sans-serif !important;
        }
    </style>
                           <![endif]-->

                           <!-- All other clients get the webfont reference; some will render the font and others will silently fail to the fallbacks. More on that here: http://stylecampaign.com/blog/2015/02/webfont-support-in-email/ -->
                           <!--[if !mso]><!-->
                           <!-- insert web font reference, eg: <link href='https://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'> -->
                           <!--<![endif]-->

                           <!-- Web Font / @font-face : END -->

    <!-- CSS Reset -->
    <style>

        /* What it does: Remove spaces around the email design added by some email clients. */
        /* Beware: It can remove the padding / margin and add a background color to the compose a reply window. */
        html,
        body {
            margin:  0 auto !important;
            padding: 0 !important;
            height:  100% !important;
            width:   100% !important;
        }

        /* What it does: Stops email clients resizing small text. */
        * {
            -ms-text-size-adjust:     100%;
            -webkit-text-size-adjust: 100%;
        }

        /* What is does: Centers email on Android 4.4 */
        div[style*="margin: 16px 0"] {
            margin: 0 !important;
        }

        /* What it does: Stops Outlook from adding extra spacing to tables. */
        table,
        td {
            mso-table-lspace: 0pt !important;
            mso-table-rspace: 0pt !important;
        }

        /* What it does: Fixes webkit padding issue. Fix for Yahoo mail table alignment bug. Applies table-layout to the first 2 tables then removes for anything nested deeper. */
        table {
            border-spacing:  0 !important;
            border-collapse: collapse !important;
            table-layout:    fixed !important;
            margin:          0 auto !important;
        }

        table table table {
            table-layout: auto;
        }

        /* What it does: Uses a better rendering method when resizing images in IE. */
        img {
            -ms-interpolation-mode: bicubic;
        }

        /* What it does: A work-around for iOS meddling in triggered links. */
        *[x-apple-data-detectors] {
            color:           inherit !important;
            text-decoration: none !important;
        }

        /* What it does: A work-around for Gmail meddling in triggered links. */
        .x-gmail-data-detectors,
        .x-gmail-data-detectors *,
        .aBn {
            border-bottom: 0 !important;
            cursor:        default !important;
        }

        /* What it does: Prevents Gmail from displaying an download button on large, non-linked images. */
        .a6S {
            display: none !important;
            opacity: 0.01 !important;
        }

        /* If the above doesn't work, add a .g-img class to any image in question. */
        img.g-img + div {
            display: none !important;
        }

        /* What it does: Prevents underlining the button text in Windows 10 */
        .button-link {
            text-decoration: none !important;
        }

        /* What it does: Removes right gutter in Gmail iOS app: https://github.com/TedGoas/Cerberus/issues/89  */
        /* Create one of these media queries for each additional viewport size you'd like to fix */
        /* Thanks to Eric Lepetit for help troubleshooting */
        @media only screen and (min-device-width: 375px) and (max-device-width: 413px) {
            /* iPhone 6 and 6+ */
            .email-container {
                min-width: 375px !important;
            }
        }

    </style>

                           <!-- Progressive Enhancements -->
    <style>

        /* What it does: Hover styles for buttons */
        .button-td,
        .button-a {
            transition: all 100ms ease-in;
        }

        .button-td:hover,
        .button-a:hover {
            background:   #f05050 !important;
            border-color: #f05050 !important;
        }

    </style>

</head>
<body width="100%" bgcolor="#f0f3f4" style="margin: 0; mso-line-height-rule: exactly;">
<center style="width: 100%; background-image: url('http://localhost:8000/img/email-background.png');background-repeat: repeat-x; background-color: #eeefef; text-align: left;">


    <!--
        Set the email width. Defined in two places:
        1. max-width for all clients except Desktop Windows Outlook, allowing the email to squish on narrow but never go wider than 600px.
        2. MSO tags for Desktop Windows Outlook enforce a 600px width.
    -->
    <div style="max-width: 600px; margin: auto;" class="email-container">
        <!--[if mso]>
        <table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0" width="600"
               align="center">
            <tr>
                <td>
        <![endif]-->

        <!-- Email Header : BEGIN -->
        <table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0" align="center"
               width="100%" style="max-width: 600px;">
            <tr>
                <td style="padding: 20px 0; text-align: center">
                    <img src="http://liptur.ru/img/new-logo.png" aria-hidden="true" width="240px" alt="alt_text"
                         border="0"
                         style="height: auto; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;">
                </td>
            </tr>
        </table>
        <!-- Email Header : END -->

        {{-- 
        <!-- Email Body : BEGIN -->
        <table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0" align="center"
               width="100%"
               style="max-width: 600px;margin: 40px 0!important;">


            <!-- 2 Even Columns : BEGIN -->
            <tr>
                <td bgcolor="" align="center" height="100%" valign="top" width="100%">
                    <!--[if mso]>
                    <table role="presentation" aria-hidden="true" border="0" cellspacing="0" cellpadding="0"
                           align="center" width="660">
                        <tr>
                            <td align="center" valign="top" width="660">
                    <![endif]-->
                    <table role="presentation" aria-hidden="true" border="0" cellpadding="0" cellspacing="0"
                           align="center" width="100%" style="max-width:660px;">
                        <tbody>

                        <tr>
                            <td style="margin-top: 40px; text-align: center;">

                                <p style="
                                        color: #401b21;
                                        font-family: 'William Text Pro';
                                        font-size: 20px;
                                        font-weight: 700;
                                        margin-bottom: 10px;
                                      ">
                                    {{$order->user()->first()->name}} оформил заказ.</p>

                                <p style="
                                margin-top: 0;
                                color: #52494a;
                                font-family: Roboto;
                                font-size: 13px;
                                font-weight: 400;
                                "

                                >
                                    Номер заказа: {{$order->slug}}
                                </p>

                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <!--[if mso]>
                    </td>
                    </tr>
                    </table>
                    <![endif]-->
                </td>
            </tr>
            <!-- 2 Even Columns : END -->

        </table>
        --}}


        <!-- Email Body : BEGIN -->
        <table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0" align="center"
                width="100%"
                style="max-width: 600px;
                border: 1px dashed #8ea256;
                margin: 40px 0!important;">

            <!-- 2 Even Columns : BEGIN -->
            <tr>
                <td bgcolor="#f8eb94" align="center" height="100%" valign="top" width="100%">
                    <!--[if mso]>
                    <table role="presentation" aria-hidden="true" border="0" cellspacing="0" cellpadding="0"
                           align="center" width="660">
                        <tr>
                            <td align="center" valign="top" width="660">
                    <![endif]-->
                    <table role="presentation" aria-hidden="true" border="0" cellpadding="0" cellspacing="0"
                           align="center" width="100%" style="max-width:660px;">
                        <tbody>
                            <tr>
                                <td style="margin-top: 40px; text-align: center;">
                                    <p style="
                                            color: #401b21;
                                            font-family: 'William Text Pro';
                                            font-size: 20px;
                                            font-weight: 700;
                                            margin-bottom: 10px;
                                          ">
                                        {{$order->user()->first()->name}} оформил заказ.</p>

                                    <p style="
                                    margin-top: 0;
                                    color: #52494a;
                                    font-family: Roboto;
                                    font-size: 13px;
                                    font-weight: 400;
                                    ">
                                        Номер заказа: {{$order->slug}}
                                    </p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <!--[if mso]>
                    </td>
                    </tr>
                    </table>
                    <![endif]-->
                </td>
            </tr>
            <!-- 2 Even Columns : END -->
        </table>


        <!-- Email Body : BEGIN -->
        <table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0" align="center"
               width="100%"
               style="max-width: 600px; border: 1px solid rgba(0,0,0,.05); box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);">
            <!-- 2 Even Columns : BEGIN -->
            <tr>
                <td bgcolor="#ffffff" align="center" height="100%" valign="top" width="100%">
                    <!--[if mso]>
                    <table role="presentation" aria-hidden="true" border="0" cellspacing="0" cellpadding="0"
                           align="center" width="660">
                        <tr>
                            <td align="center" valign="top" width="660">
                    <![endif]-->
                    <table role="presentation" aria-hidden="true" border="0" cellpadding="0" cellspacing="0"
                           align="center" width="100%" style="max-width:660px;">
                        <tbody>

                        <tr>
                            <td style="padding: 20px 10px; text-align: justify; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;    border-bottom: 1px solid #eee; padding-bottom: 10px;">
                                <span style="color: #52494a;
                                    font-family: Roboto;
                                    font-size: 16px;
                                    font-weight: 700;">Были выбраны:</span><br>

                                <span style="color: #52494a;
                                    font-family: Roboto;
                                    font-size: 13px;
                                    min-width: 170px;
                                    display: block;
                                    float: left;
                                    font-weight: 700;">Способ получения заказа:</span>	
                                
                                <span style="color: #52494a;
                                    font-family: 'William Text Pro';
                                    font-style: italic;
                                    font-size: 13px;
                                    font-weight: 700;">{{$order->ordervar['delivery'][$order->options['delivery']]}}</span><br>
                                    
                                <span style="color: #52494a;
                                    font-family: Roboto;
                                    font-size: 13px;
                                    min-width: 170px;
                                    display: block;
                                    float: left;
                                    font-weight: 700;">Способ оплаты:</span> 			

                                <span style="color: #52494a;
                                    font-family: 'William Text Pro';
                                    font-style: italic;
                                    font-size: 13px;
                                    font-weight: 700;">{{$order->ordervar['payment'][$order->options['payment']]}}</span>
                                <br><br>
                                
                                <span style="color: #52494a;
                                    font-family: Roboto;
                                    font-size: 16px;
                                    font-weight: 700;">Заказ:</span>
                            </td>
                        </tr>
                    @foreach ($order->options['content'] as $item)
                        <tr>
                            <td align="center" valign="top"
                                style="font-size:13px; padding: 20px 0; border-top: 1px solid #eee">

                                <table role="presentation" aria-hidden="true" border="0" cellspacing="0" cellpadding="0"
                                       align="center" width="660">

                                    <tr>
                                        <td style="width: 60px;">
                                            <a href="{{$item['options']['url']}}" target="_blank">
                                            <img style="margin: 0 auto;width: 100%" src="{{url('/')}}{{$item['options']['image']}}" height="50px" width="60px">
                                            </a>
                                        </td>
                                        <td style="width: 250px;">
                                            <span style="
                                                color: #a5b526;
                                                font-family: 'William Text Pro';
                                                font-size: 14px;
                                                font-weight: 700;
                                                font-weight: 400;">{{$item['name']}}</span><br>
                                        
                                            <span style="color: #52494a;
                                                font-family: Roboto;
                                                font-size: 12px;
                                                    font-weight: 400;">Цена: <b>{{$item['price']}} руб.</b></span><br>
                                        

                                            <span style="color: #52494a;
                                                font-family: Roboto;
                                                font-size: 12px;
                                                font-weight: 400;">Колличество: <b>{{$item['qty']}} шт.</b></span>
                                        </td>
                                        <td style="width: 100px">
                                            <span style="color: #401b21;
                                                font-weight: 400;
                                                font-style: italic;
                                                font-size: 16px;">{{$item['subtotal']}} руб.</span>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    @endforeach
                        
                        </tbody>
                    </table>
                    <!--[if mso]>
                    </td>
                    </tr>
                    </table>
                    <![endif]-->
                </td>
            </tr>
            <!-- 2 Even Columns : END -->



            <!-- 3 Even Columns : BEGIN -->
            <tr>
                <td bgcolor="#ffffff" align="center" height="100%" valign="top" width="100%" style="padding: 10px 0;">
                    <!--[if mso]>
                    <table role="presentation" aria-hidden="true" border="0" cellspacing="0" cellpadding="0"
                           align="center" width="660">
                        <tr>
                            <td align="center" valign="top" width="660">
                    <![endif]-->
                    <table role="presentation" aria-hidden="true" border="0" cellpadding="0" cellspacing="0"
                           align="center" width="100%" style="max-width:660px;">
                        <tbody>

                        <tr>
                            <td style="padding: 0 10px; text-align: justify; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;     border-bottom: 1px solid #eee; padding-bottom: 10px;">
                            </td>
                        </tr>

                        <tr>
                            <td align="center" valign="top" style="font-size:0;">
                                <!--[if mso]>
                                <table role="presentation" aria-hidden="true" border="0" cellspacing="0" cellpadding="0"
                                       align="center" width="660">


                                    <tr>

                                        <td align="left" valign="top" width="220">
                                <![endif]-->


                                <div style=" max-width:100%;  vertical-align:center; width:100%; text-align: center"
                                     class="stack-column">
                                    <table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0"
                                           border="0" width="100%">
                                        <tbody>
                                        <tr>
                                            <td style="padding: 40px 10px;">
                                                <span style="color: #401b21;
                                                    font-family: Roboto;
                                                    font-size: 12px;
                                                    min-width: 170px;
                                                    display: block;
                                                    float: left;
                                                    font-weight: 400;">Сумма заказа:</span> 			

                                                <span style="
                                                    color: #52494a;
                                                    font-weight: 700;
                                                    font-family: 'William Text Pro';
                                                    font-size: 35px;
                                                    letter-spacing: -1.75px;">{{$order->options['total']}} руб.</span><br>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!--[if mso]>
                                </td>

                                </tr>
                                </table>
                                <![endif]-->
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <!--[if mso]>
                    </td>
                    </tr>
                    </table>
                    <![endif]-->
                </td>
            </tr>
            <!-- 3 Even Columns : END -->

            <!-- 3 Even Columns : BEGIN -->
            <tr>
                <td bgcolor="#ffffff" align="center" height="100%" valign="top" width="100%" style="padding: 10px 0;">
                    <!--[if mso]>
                    <table role="presentation" aria-hidden="true" border="0" cellspacing="0" cellpadding="0"
                           align="center" width="660">
                        <tr>
                            <td align="center" valign="top" width="660">
                    <![endif]-->
                    <table role="presentation" aria-hidden="true" border="0" cellpadding="0" cellspacing="0"
                           align="center" width="100%" style="max-width:660px;">
                        <tbody>

                        <tr>
                            <td style="padding: 0 10px; text-align: justify; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;     border-bottom: 1px solid #eee;
    padding-bottom: 10px;">
                            </td>
                        </tr>


                        <tr>
                            <td align="center" valign="top" style="font-size:0;">
                                <!--[if mso]>
                                <table role="presentation" aria-hidden="true" border="0" cellspacing="0" cellpadding="0"
                                       align="center" width="660">


                                    <tr>

                                        <td align="left" valign="top" width="220">
                                <![endif]-->

                                {{--
                                <div style=" max-width:100%;  vertical-align:center; width:100%; text-align: center"
                                     class="stack-column">
                                    <table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0"
                                           border="0" width="100%">
                                        <tbody>
                                        <tr>
                                            <td style="padding: 40px 10px;">
                                                <span style="color: #52494a;
                                                    font-family: Roboto;
                                                    font-size: 13px;
                                                    font-weight: 400;">Есть вопрос? Мы с радостью на него ответим.<br>
                                                    Воспользуйтесь функционалом «Мои Обращения» в Личном Кабинете.</span>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                
                                --}}
                                <!--[if mso]>
                                </td>


                                </tr>
                                </table>
                                <![endif]-->
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <!--[if mso]>
                    </td>
                    </tr>
                    </table>
                    <![endif]-->
                </td>
            </tr>
            <!-- 3 Even Columns : END -->


        </table>
        <!-- Email Body : END -->

        <!-- Email Footer : BEGIN -->
        <table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0" align="center"
               width="100%" style="max-width: 680px;">
            <tr>
                <td style="padding: 40px 10px;width: 100%;font-size: 12px; font-family: sans-serif; line-height:18px; text-align: left; color: #888888;"
                    class="x-gmail-data-detectors">

                    <span style="color: #52494a;
                        font-family: Roboto;
                        font-size: 11px;
                        font-weight: 400;
                        line-height: 13px;">
                        ОКУ «Центр кластерного развития туризма Липецкой области»
                    </span><br>
                    <span style="
                        color: #52494a;
                        font-family: Roboto;
                        font-size: 16px;
                        font-weight: 700;
                        line-height: 13px;
                        ">{{setting('shop_phone','8-800-200-81-20')}}</span><br>
                    <a href="http://liptur.ru/" style="
                        color: #a5b526;
                        font-weight: 400;
                        font-family: Roboto;
                        font-size: 11px;
                        line-height: 13px;
                        ">www.liptur.ru</a>
                </td>
            </tr>
        </table>
        <!-- Email Footer : END -->

        <!--[if mso]>
        </td>
        </tr>
        </table>
        <![endif]-->
    </div>
</center>
</body>
</html>