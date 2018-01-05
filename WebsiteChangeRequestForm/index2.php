<!-- Os-1Way-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <title>Demystifying Email Design</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
</head><body style="margin: 0; padding: 0; background-color:rgb(250, 250, 135); overflow:auto; font-family:Open Sans,sans-serif;">
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
<div class="header" width="100%" style="background-color:black; height:100px;">
  <img src="resources/rutogo.png" alt="Creating Email Magic" width="155px" height="92px" style="display: block; float:left; padding: 4px 0px 4px 13px;" />
          <p align="right" style="color:white;  margin: 0; padding: 8px 17px 4px 0px;font-family:Trebuchet MS,Arial,Helvetica,sans-serif;">Invoice No : RGL11548866</p>
          <p align="right" style="color:white; margin: 0; padding: 0px 17px 4px 0px;font-family:Trebuchet MS,Arial,Helvetica,sans-serif;">30 Apr,2015 </p>
</div>
 <table border="0" cellpadding="0" cellspacing="0" width="100%">
  <tr>
   <td>
     <table align="center" border="1" cellpadding="0" cellspacing="0" width="600" style="border-collapse: collapse;">
       
       <tr>
         <td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
           <table border="0" cellpadding="0" cellspacing="0" width="100%">
            
            <tr>
             <td>
              <h1 align="left" style="margin:0;font-family:Trebuchet MS,Arial,Helvetica,sans-serif;">Hi Venus</h1>
              <p style="font-family:Trebuchet MS,Arial,Helvetica,sans-serif;">(Thanks for choosing Rutugo.com)</p>
             </td>
            </tr>
            
            <tr>
             <td align="center" style="padding: 5px 0 5px 0;">
               <h1 style="font-family:Trebuchet MS,Arial,Helvetica,sans-serif;">Total Fare</h1>
               <h2 style="font-family:Trebuchet MS,Arial,Helvetica,sans-serif;">Rs 1250</h2> 
             </td>
            </tr>
            
            <tr>
          
            <td align="left" style="padding: 5px 0 5px 0; float:left;">
               <h1 style="font-family:Trebuchet MS,Arial,Helvetica,sans-serif;">DELHI</h1>
               <p style="font-family:Trebuchet MS,Arial,Helvetica,sans-serif;"><b>29 Mar 2015</b></p> 
             </td>
          
            <td align="center" style="padding: 20px 0 5px 0;   float: left; margin-left: 23%;">
               <img src="resources/arrow-right.png" style="width:50px;" ></img>
               <p style="font-family:Trebuchet MS,Arial,Helvetica,sans-serif;"><b>Sedan, Indigo</b></p> 
             </td>


            <td align="right" style="padding: 5px 0 5px 0; float:right;">
               <h1 style="font-family:Trebuchet MS,Arial,Helvetica,sans-serif;">Jaipur</h1>
               <p style="font-family:Trebuchet MS,Arial,Helvetica,sans-serif;"><b>03 Apr 2015</b></p> 
             </td> 

            </tr>

             <tr>
             <td align="center" style="padding: 5px 0 5px 0;">
               <p style="font-family:Trebuchet MS,Arial,Helvetica,sans-serif;"><b>You rode with Ak travels</b></p>
               <h2 style="font-family:Trebuchet MS,Arial,Helvetica,sans-serif;">Rate this Trip</h2> 
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
               
               <button style="  width: 137px;height: 30px;background-color: yellow;border: 1px solid black;font-family:Trebuchet MS,Arial,Helvetica,sans-serif;font-size: 19px; margin-top:20px; margin-bottom:20px;">Submit</button>
             </td>
            </tr>

            <tr>
              <td align="center" style="width:90%; background-color:black; height:40px;  ">
               <h1 style="color:white; font-family:Trebuchet MS,Arial,Helvetica,sans-serif;  margin: 0; padding: 1px 0 1px 0; font-size: 24px;">Fare Details</h1>
              </td>
            </tr>

            <tr>
             <td style="">
               <p style="float:left;font-family:Trebuchet MS,Arial,Helvetica,sans-serif;"><b>Fare</b></p>
               <p  style="float:right;font-family:Trebuchet MS,Arial,Helvetica,sans-serif;"><b>Rs 405</b></p> 
             </td>
            </tr>

            <tr>
             <td style="">
               <p style="float:left;font-family:Trebuchet MS,Arial,Helvetica,sans-serif;"><b></b></p>
               <p  style="float:right;font-family:Trebuchet MS,Arial,Helvetica,sans-serif;"><b></b></p> 
             </td>
            </tr>


            <tr>
             <td style="">
               <p style="float:left;font-family:Trebuchet MS,Arial,Helvetica,sans-serif;"><b></b></p>
               <p  style="float:right;font-family:Trebuchet MS,Arial,Helvetica,sans-serif;"><b></b></p> 
             </td>
            </tr>

            <tr>
             <td style="">
               <p style="float:left;font-family:Trebuchet MS,Arial,Helvetica,sans-serif;"><b></b></p>
               <p  style="float:right;font-family:Trebuchet MS,Arial,Helvetica,sans-serif;"><b></b></p> 
             </td>
            </tr>

            <tr style="width:100%;">
             <td style="">
               <img src="resources/terms.png" style="width:100%;"> 
             </td>
            </tr>

            
       
     </table>
   </td>
  </tr>
 </table>

  <footer>
    <div class="header" width="100%" style="background-color:black; height:100px;">
         <img src="resources/address.png" style="width:500px;"> 
          <div style="float:right; padding:20px;">
              <a href=""  style="float:right; text-decoration:none; "><img style="width:50px; margin-right:8px;" src="resources/facebook.png"></a>
              <a href="" style="float:right; text-decoration:none; "><img style="width:50px; margin-right:8px;" src="resources/gplus.png"></a>
              <a href="" style="float:right; text-decoration:none; "><img style="width:50px; margin-right:8px;" src="resources/twitter.png"></a>
              <a href="" style="float:right; text-decoration:none; "><img style="width:50px; margin-right:8px;" src="resources/instagram.png"></a>
          </div>
    </div>
  </footer>
</body>
</html>