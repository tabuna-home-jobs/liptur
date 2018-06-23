<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"> <!-- utf-8 works for most cases -->
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
            margin: 0 auto !important;
            padding: 0 !important;
            height: 100% !important;
            width: 100% !important;
        }

        /* What it does: Stops email clients resizing small text. */
        * {
            -ms-text-size-adjust: 100%;
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
            border-spacing: 0 !important;
            border-collapse: collapse !important;
            table-layout: fixed !important;
            margin: 0 auto !important;
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
            color: inherit !important;
            text-decoration: none !important;
        }

        /* What it does: A work-around for Gmail meddling in triggered links. */
        .x-gmail-data-detectors,
        .x-gmail-data-detectors *,
        .aBn {
            border-bottom: 0 !important;
            cursor: default !important;
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
        /* Thanks to Eric Lepetit
        @ericlepetitsf)  for help troubleshooting */
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
            background: #f05050 !important;
            border-color: #f05050 !important;
        }

    </style>

</head>
<body width="100%" bgcolor="#f0f3f4" style="margin: 0; mso-line-height-rule: exactly;">
<center style="width: 100%; background: #f0f3f4; text-align: left;">


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
                    <img src="https://liptur.ru/img/tour/logo.png" aria-hidden="true" height="50" alt="alt_text"
                         border="0"
                         style="height: auto; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;">
                </td>
            </tr>
        </table>
        <!-- Email Header : END -->

        <!-- Email Body : BEGIN -->
        <table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0" align="center"
               width="100%"
               style="max-width: 600px; border: 1px solid rgba(0,0,0,.05); box-shadow: 5px 5px 10px rgba(0,0,0,.05);">

            <!-- Hero Image, Flush : BEGIN -->
            <tr>
                <td bgcolor="#ffffff">
                    <img src="https://liptur.ru/img/tour/email/main.jpg" aria-hidden="true" width="600" height=""
                         alt="alt_text" border="0" align="center"
                         style="width: 100%; max-width: 600px; height: auto; background: #dddddd; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;"
                         class="g-img">
                </td>
            </tr>
            <!-- Hero Image, Flush : END -->

            <!-- 1 Column Text + Button : BEGIN -->
            <tr>
                <td bgcolor="#ffffff">
                    <table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0"
                           width="100%">
                        <tr>
                            <td style="padding: 40px; text-align: justify; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;">

                                <p style="font-size: 16px; text-align: center">Вы успешно зарегистрировались на портале
                                    <br> <strong>"{{config('app.name')}}"</strong></p>

                                Здравствуйте {{ $user->name }} ! <br><br>
                                Поздравляем Вас с успешной регистрацией на сайте Liptur.ru<br><br><br>

                                Для комфортного пользования порталом, заполните свой профиль укажите в профиле свои
                                контактные данные <br><br>
                                <small>Если у Вас возникнут вопросы, обратитесь в службу поддержки.</small>

                                <br>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <!-- 1 Column Text + Button : BEGIN -->


        </table>
        <!-- Email Body : END -->

        <!-- Email Footer : BEGIN -->
        <table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0" align="center"
               width="100%" style="max-width: 680px;">
            <tr>
                <td style="padding: 40px 10px;width: 100%;font-size: 12px; font-family: sans-serif; line-height:18px; text-align: center; color: #888888;"
                    class="x-gmail-data-detectors">
                    
                    <span style="color: #888888">ОКУ «Центр кластерного развития туризма Липецкой области»<br>

                    398059 г. Липецк,
                    улица Фрунзе, 10

                    <br>8-800-100-30-48
                    </span>
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