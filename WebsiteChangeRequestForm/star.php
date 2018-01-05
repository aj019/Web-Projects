<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
    
<style type="text/css">
/* Star hover using lang hack in its own style wrapper, otherwise Gmail will strip it out */
    * [lang~="star-wrapper"]:hover *[lang~="star-number"]{
        color: #119da2 !important;
    }

    * [lang~="star-wrapper"]:hover *[lang~="full-star"],
    * [lang~="star-wrapper"]:hover ~ *[lang~="star-wrapper"] *[lang~="full-star"] {
      display : block !important;
      width : auto !important;
      overflow : visible !important;
      float : none !important;
      margin-top: -1px !important;
    }

    * [lang~="star-wrapper"]:hover *[lang~="empty-star"],
    * [lang~="star-wrapper"]:hover ~ *[lang~="star-wrapper"] *[lang~="empty-star"] {
      display : block !important;
      width : 0 !important;
      overflow : hidden !important;
      float : left !important;
      height: 0 !important;
    }
</style>


<style type="text/css">
/* Normal email CSS */
    @-ms-viewport {
        width: device-width;
    }
    *[class=rating] {
      unicode-bidi: bidi-override;
      direction: rtl;
    }
    *[class=rating] > *[class=star] {
      display: inline-block;
      position: relative;
      text-decoration: none;
    }

    @media (max-width: 621px) {
        * {
            box-sizing: border-box;
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
            -o-box-sizing: border-box;
        }
        table {
            min-width: 0 !important;
            width: 100% !important;
        }
        *[class=body-copy] {
            padding: 0 10px !important;
        }
        *[class=main-wrapper],
        *[class=main-content]{
            min-width: 0 !important;
            width: 320px !important;
            margin: 0 auto !important;
        }
        *[class=ms-sixhundred-table] {
            width: 100% !important;
            display: block !important;
            float: left !important;
            clear: both !important;
        }
        *[class=content-padding] {
            padding-left: 10px !important;
            padding-right: 10px !important;
        }
       
        *[class=top-padding] {
            display: none !important;
        }
        *[class=hide-mobile] {
            display: none !important;
        }
        

        /* Prevent hover effects so double click issue doesn't happen on mobile devices */
        * [lang~="star-wrapper"]:hover *[lang~="star-number"]{
            color: #AEAEAE !important;
            border-color: #FFFFFF !important;
        }
        * [lang~="star-wrapper"]{
            pointer-events: none !important;
        }
        * [lang~="star-divbox"]{
            pointer-events: auto !important;
        }
        *[class=rating] *[class="star-wrapper"] a div:nth-child(2),
        *[class=rating] *[class="star-wrapper"]:hover a div:nth-child(2),
        *[class=rating] *[class="star-wrapper"] ~ *[class="star-wrapper"] a div:nth-child(2){
          display : none !important;
          width : 0 !important;
          height: 0 !important;
          overflow : hidden !important;
          float : left !important;
        }
        *[class=rating] *[class="star-wrapper"] a div:nth-child(1),
        *[class=rating] *[class="star-wrapper"]:hover a div:nth-child(1),
        *[class=rating] *[class="star-wrapper"] ~ *[class="star-wrapper"] a div:nth-child(1){
          display : block !important;
          width : auto !important;
          overflow : visible !important;
          float : none !important;
        }
    }
</style>

<body style="margin-top: 0;margin-bottom: 0;margin-left: 0;margin-right: 0;padding-top: 0;padding-bottom: 0;padding-left: 0;padding-right: 0;min-width: 100%;background-color: #f5f5f5">
    <table class="main-wrapper" style="border-collapse: collapse;border-spacing: 0;display: table;table-layout: fixed; margin: 0 auto; -webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;text-rendering: optimizeLegibility;background-color: #f5f5f5; width: 100%;">
        <tbody>
            <tr style="display:none;">
                <td style="padding: 0;vertical-align: top">
                    <div class="bottom-padding" style="margin-bottom: 0px; line-height: 30px; font-size: 30px;">&nbsp;</div>
                </td>
            </tr>
            <tr>
                <td style="padding: 0;vertical-align: top; width: 100%;">
                    <center>
                        <!--[if gte mso 11]>
 <center>
 <table><tr><td class="ms-sixhundred-table" width="600">
<![endif]-->

                        <table class="main-content" style="width: 100%; max-width: 600px; border-collapse: separate;border-spacing: 0;margin-left: auto;margin-right: auto; border-radius: 4px; -webkit-border-radius: 4px; -moz-border-radius: 4px; background-color: #ffffff; overflow: hidden;" width="600">
                            <tbody>
                                <tr>
                                    <td style="padding: 0;vertical-align: top;">
                                        <table class="main-content" style="border-collapse: collapse;border-spacing: 0;margin-left: auto;margin-right: auto;width: 100%; max-width: 600px;">
                                            <tbody>
                                                <tr>
                                                    <td style="padding: 0;vertical-align: top;text-align: left">
                                                        <table class="contents" style="border-collapse: collapse;border-spacing: 0;width: 100%;">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="content-padding" style="padding: 0;vertical-align: top">
                                                                       
                                                                                <div style="width: 100%; text-align: center; float: left;">
                                                                                    <div class="rating" style="text-align: center; margin: 0; font-size: 50px; width: 275px; margin: 0 auto; margin-top: 10px;">

                                                                                        <table style="border-collapse: collapse;border-spacing: 0;width: 275px; margin: 0 auto; font-size: 50px; direction: rtl;" dir="rtl">
                                                                                            <tr>
                                                                                                <td style="padding: 0;vertical-align: top;" width="55" class="star-wrapper" lang="star-wrapper">
                                                                                                    <div style="display: block; text-align: center; float: left;width: 55px;overflow: hidden;line-height: 60px;">
                                                                                                        <a href="http://example.com/?rating=5" class="star" target="_blank" lang="star-divbox" style="color: #FFCC00; text-decoration: none; display: inline-block;height: 50px;width: 55px;overflow: hidden;line-height: 60px;" tabindex="1">
                                                                                                            <div lang="empty-star" style="margin: 0;display: inline-block;">&#9734;</div>
                                                                                                            <div lang="full-star" style="margin: 0;display: inline-block; width:0; overflow:hidden;float:left; display:none; height: 0; max-height: 0;">&#9733;</div>
                                                                                                        </a>
                                                                                                       
                                                                                                    </div>
                                                                                                </td>
                                                                                                <td style="padding: 0;vertical-align: top" width="55" class="star-wrapper" lang="star-wrapper">
                                                                                                    <div style="display: block; text-align: center; float: left;width: 55px;overflow: hidden;line-height: 60px;">
                                                                                                        <a href="http://example.com/?rating=4" class="star" target="_blank" lang="star-divbox" style="color: #FFCC00; text-decoration: none; display: inline-block;height: 50px;width: 55px;overflow: hidden;line-height: 60px;" tabindex="2">
                                                                                                            <div lang="empty-star" style="margin: 0;display: inline-block;">&#9734;</div>
                                                                                                            <div lang="full-star" style="margin: 0;display: inline-block; width:0; overflow:hidden;float:left; display:none; height: 0; max-height: 0;">&#9733;</div>
                                                                                                        </a>
                                                                                                        
                                                                                                    </div>
                                                                                                </td>
                                                                                                <td style="padding: 0;vertical-align: top" width="55" class="star-wrapper" lang="star-wrapper">
                                                                                                    <div style="display: block; text-align: center; float: left;width: 55px;overflow: hidden;line-height: 60px;">
                                                                                                        <a href="http://example.com/?rating=3" class="star" target="_blank" lang="star-divbox" style="color: #FFCC00; text-decoration: none; display: inline-block;height: 50px;width: 55px;overflow: hidden;line-height: 60px;" tabindex="3">
                                                                                                            <div lang="empty-star" style="margin: 0;display: inline-block;">&#9734;</div>
                                                                                                            <div lang="full-star" style="margin: 0;display: inline-block; width:0; overflow:hidden;float:left; display:none; height: 0; max-height: 0;">&#9733;</div>
                                                                                                        </a>
                                                                                                        
                                                                                                    </div>
                                                                                                </td>
                                                                                                <td style="padding: 0;vertical-align: top" width="55" class="star-wrapper" lang="star-wrapper">
                                                                                                    <div style="display: block; text-align: center; float: left;width: 55px;overflow: hidden;line-height: 60px;">
                                                                                                        <a href="http://example.com/?rating=2" class="star" target="_blank" lang="star-divbox" style="color: #FFCC00; text-decoration: none; display: inline-block;height: 50px;width: 55px;overflow: hidden;line-height: 60px;" tabindex="4">
                                                                                                            <div lang="empty-star" style="margin: 0;display: inline-block;">&#9734;</div>
                                                                                                            <div lang="full-star" style="margin: 0;display: inline-block; width:0; overflow:hidden;float:left; display:none; height: 0; max-height: 0;">&#9733;</div>
                                                                                                        </a>
                                                                                                        
                                                                                                    </div>
                                                                                                </td>
                                                                                                <td style="padding: 0;vertical-align: top" width="55" class="star-wrapper" lang="star-wrapper">
                                                                                                    <div style="display: block; text-align: center; float: left;width: 55px;overflow: hidden;line-height: 60px;">
                                                                                                        <a href="http://example.com/?rating=1" class="star" target="_blank" lang="star-divbox" style="color: #FFCC00; text-decoration: none; display: inline-block;height: 50px;width: 55px;overflow: hidden;line-height: 60px;" tabindex="5">
                                                                                                            <div lang="empty-star" style="margin: 0;display: inline-block;">&#9734;</div>
                                                                                                            <div lang="full-star" style="margin: 0;display: inline-block; width:0; overflow:hidden;float:left; display:none; height: 0; max-height: 0;">&#9733;</div>
                                                                                                        </a>
                                                                                                        
                                                                                                    </div>
                                                                                                </td>
                                                                                            </tr>
                                                                                        </table>




                                                                                    </div>
                                                                                </div>
                                                                               
                                                                            </div>

                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <!--[if gte mso 11]>
 </td></tr></table>
 </center>
<![endif]-->
                    </center>
                </td>
            </tr>
        </tbody>
    </table>
</body>
</body>
</html>