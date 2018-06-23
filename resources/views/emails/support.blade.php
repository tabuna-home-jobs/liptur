<html>
<head>
    <meta charset="utf-8">
    <style>
        body {
            padding: 0;
            margin: 0;
        }

        html {
            -webkit-text-size-adjust: none;
            -ms-text-size-adjust: none;
        }

        @media only screen and (max-device-width: 680px), only screen and (max-width: 680px) {
            *[class="table_width_100"] {
                width: 96% !important;
            }

            *[class="border-right_mob"] {
                border-right: 1px solid #dddddd;
            }

            *[class="mob_100"] {
                width: 100% !important;
            }

            *[class="mob_center"] {
                text-align: center !important;
            }

            *[class="mob_center_bl"] {
                float: none !important;
                display: block !important;
                margin: 0px auto;
            }

            .iage_footer a {
                text-decoration: none;
                color: #929ca8;
            }

            img.mob_display_none {
                width: 0px !important;
                height: 0px !important;
                display: none !important;
            }

            img.mob_width_50 {
                width: 40% !important;
                height: auto !important;
            }
        }

        .table_width_100 {
            width: 680px;
        }
    </style>


</head>

<body>


<div id="mailsub" class="notification" align="center">

    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="min-width: 320px;">
        <tr>
            <td align="center" bgcolor="#f0f3f4" style="    width: 100vw;
    height: 100vh;
}">


                <!--[if gte mso 10]>
                <table width="680" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td>
                <![endif]-->

                <table border="0" cellspacing="0" cellpadding="0" class="table_width_100" width="100%"
                       style="max-width: 680px; min-width: 300px;">
                    <tr>
                        <td>
                            <!-- padding -->
                            <div style="height: 40px; line-height: 80px; font-size: 10px;"></div>
                        </td>
                    </tr>
                    <!--header -->
                    <tr>
                        <td align="center" style="    background-color: rgba(255,255,255,0.95)">
                            <!-- padding -->
                            <table width="90%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td align="left"><!--

				Item -->
                                        <div class="mob_center_bl"
                                             style="float: left; display: inline-block; width: 100%;">
                                            <table class="mob_center" width="100%" border="0" cellspacing="0"
                                                   cellpadding="0" align="left" style="border-collapse: collapse;">
                                                <tr>
                                                    <td align="left" valign="middle">
                                                        <!-- padding -->
                                                        <div style="height: 20px; line-height: 20px; font-size: 10px;"></div>
                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                            <tr>
                                                                <td align="center" valign="top" class="mob_center">
                                                                    <a href="http://liptur.ru/" target="_blank"
                                                                       style="color: #596167; font-family: Arial, Helvetica, sans-serif; font-size: 13px;">
                                                                        <font face="Arial, Helvetica, sans-seri; font-size: 13px;"
                                                                              size="3" color="#596167">
                                                                            <img src="http://liptur.ru/img/tour/logo.png"
                                                                                 width="66"
                                                                                 alt="Липецкий туристический портал"
                                                                                 border="0"
                                                                                 style="display: block;"/></font></a>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            <!-- padding -->
                            <div style="height: 20px; line-height: 20px; font-size: 10px; border-bottom: 1px solid #dee5e7;"></div>
                        </td>
                    </tr>
                    <!--header END-->

                    <!--content 1 -->
                    <tr>
                        <td align="center" bgcolor="#fbfcfd">
                            <table width="90%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td align="center">
                                        <!-- padding -->
                                        <div style="height: 60px; line-height: 60px; font-size: 10px;"></div>
                                        <div style="line-height: 44px;">
                                            <font face="Arial, Helvetica, sans-serif" size="5" color="#57697e"
                                                  style="font-size: 34px;">
					<span style="font-family: Arial, Helvetica, sans-serif; font-size: 26px; color: #57697e;">
					Cообщение
					</span></font>
                                        </div>
                                        <!-- padding -->
                                        <div style="height: 40px; font-size: 10px;">
                        <span style="font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: #57697e;">
					</span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="justify">
                                        <div style="line-height: 24px;">
                                            <font face="Arial, Helvetica, sans-serif" size="4" color="#57697e"
                                                  style="font-size: 15px;">
					<span style="font-family: Arial, Helvetica, sans-serif; font-size: 15px; color: #57697e;">



                                <p>
                                    {!! nl2br(e($request['message'])) !!}
                                </p>




                            <p style="font-family: Arial, Helvetica, sans-serif; font-size: 14px; color: #98a7b9;">
                                <small>Контактные данные</small>
                                <br>Имя : {{$request['name']}}
                                <br>Email : {{$request['email']}}
                                <br>Телефон : {{$request['phone']}}
                            </p>


                    </span></font>
                                        </div>
                                        <!-- padding -->
                                        <div style="height: 40px; line-height: 40px; font-size: 10px; border-top: 1px solid #dee5e7;"></div>


                                    </td>
                                </tr>

                            </table>
                        </td>
                    </tr>
                    <!--content 1 END-->


                    <!--footer -->
                    <tr>
                        <td class="iage_footer" align="center" bgcolor="#ffffff"
                            style="background-color: rgba(255,255,255,0.95)">
                            <!-- padding -->
                            <div style="height: 40px; line-height: 40px; font-size: 10px;"></div>

                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td align="center">
                                        <font face="Arial, Helvetica, sans-serif" size="3" color="#96a5b5"
                                              style="font-size: 13px;">
				<span style="font-family: Arial, Helvetica, sans-serif; font-size: 13px; color: #96a5b5;">
					© 2015 - 2017 <br> Липецкий туристический портал
				</span></font>
                                    </td>
                                </tr>
                            </table>

                            <!-- padding -->
                            <div style="    line-height: 30px;
    font-size: 10px;
    height: 12px;
    width: 100%; margin-top: 15px"></div>
                        </td>
                    </tr>
                    <!--footer END-->
                    <tr>
                        <td>
                            <!-- padding -->
                            <div style="height: 40px; line-height: 80px; font-size: 10px;"></div>
                        </td>
                    </tr>
                </table>
                <!--[if gte mso 10]>
                </td></tr>
                </table>
                <![endif]-->

            </td>
        </tr>
    </table>

</div>


</body>
</html>