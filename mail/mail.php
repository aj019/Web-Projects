<!DOCTYPE html>

<?php
$to = $_POST['email_id'];
$sub="first mail";
$text="Working";
$message = '<html>
			<head>
			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <title>Demystifying Email Design</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
  <link href="http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet" type="text/css">
  <link href="http://fonts.googleapis.com/css?family=Grand+Hotel" rel="stylesheet" type="text/css">
</head>
				<body style="margin: 0; padding: 0; background-color:rgb(250, 250, 135); overflow:auto; font-family:Geneva,sans-serif;">

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
          <p align="right" style="color:white;  margin: 0; padding: 8px 17px 4px 0px;">Invoice No : RGL11548866</p>
          <p align="right" style="color:white; margin: 0; padding: 0px 17px 4px 0px;">30 Apr,2015 </p>
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
              <h1 align="left" style="margin:0;">Hi Venus</h1>
              <p>(Thanks for choosing Rutugo.com)</p>
             </td>
            </tr>
            
            <tr>
             <td align="center" style="padding: 5px 0 5px 0;">
               <h1>Total Fare</h1>
               <h1>Rs 1250</h1> 
             </td>
            </tr>
            
            <tr>
             <td align="center" style="padding: 5px 0 5px 0;">
               <h1>DELHI</h1>
               <p>(Local city Travel)</p> 
             </td>
            </tr>

            <tr>
             <td style="padding: 5px 0 5px 0;">
               <p style="float:left;"><b>29 March 2015</b></p>
               <p  style="float:right;"><b>SEDAN INDIGO</b></p> 
             </td>
            </tr>
            
             <tr>
             <td align="center" style="padding: 5px 0 5px 0;">
               <p><b>You rode with Ak travels</b></p>
               <h2>Rate this Trip</h2> 
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
               <button style="  width: 137px;height: 30px;background-color: yellow;border: 1px solid black; margin-top:20px; margin-bottom:20px; font-family: Opan Sans, sans-serif;font-size: 19px;">Submit</button>
             </td>
            </tr>

            <tr>
              <td align="center" style="width:90%; background-color:black; height:40px;  ">
               <h1 style="color:white;   margin: 0;  padding: 1px 0 1px 0; font-size: 24px;">Fare Details</h1>
              </td>
            </tr>

            <tr>
             <td style="">
               <p style="float:left;"><b>Package Type</p>
               <p  style="float:right;"><b>4hr & 40 min</p> 
             </td>
            </tr>

            <tr>
             <td style="">
               <p style="float:left;"><b>Package Cost</p>
               <p  style="float:right;"><b>900</p> 
             </td>
            </tr>

            <tr>
             <td style="">
               <p style="float:left;"><b>Extra Km</p>
               <p  style="float:right;"><b>Rs 9</p> 
             </td>
            </tr>


            <tr>
             <td style="">
               <p style="float:left;"><b>Extra Hour Charges</p>
               <p  style="float:right;"><b>Rs 70</p> 
             </td>
            </tr>


            <tr>
             <td style="">
               <p style="float:left;"><b>Driver Night Charges</b></p>
               <p  style="float:right;"><b>Rs 9</b></p> 
             </td>
            </tr>


            <tr>
             <td style="">
               <p style="float:left;"><b></b></p>
               <p  style="float:right;"><b></b></p> 
             </td>
            </tr>

            <tr>
             <td style="">
               <p style="float:left;"><b></b></p>
               <p  style="float:right;"><b></b></p> 
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

			</html>';

$headers = "From:Youni.co.in";
$headers .= "MIME-Version: 1.0\r\n";

$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

if($_POST){

	mail($to, $sub, $message,$headers);
	echo "Successful";
}

?>
<html>
<head>
</head>
<body>
<form action="?" method="post">
<input type="text" name="email_id">
<input type="submit" name="submit">
</form>
</body>
</html>