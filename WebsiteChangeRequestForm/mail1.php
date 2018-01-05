<!DOCTYPE html>

<?php
require_once ('mysqlconnect.php');

$text="Working";

$trip_type = (int)$_POST['trip_type'];

if($trip_type == 3){ //Hourly Rentals

  $to = $_POST['to'];
  $name = $_POST['name'];
  $invoice_no = $_POST['invoice_no'];
  $invoice_date = $_POST['invoice_date'];
    $invoice_date = date('Y-m-d' , strtotime($invoice_date));

  $pickup_location = $_POST['pickup_location'];

  $pickup_date = $_POST['pickup_date'];
    $pickup_date = date('Y-m-d' , strtotime($pickup_date));

  $drop_location = '';
  $drop_date = '';

  $car_name = $_POST['car_name'];
  $operator_details = $_POST['operator_details'];
  $car_type = $_POST['car_type'];

  $package_type = $_POST['package_type'];
  $package_rate = (float)$_POST['package_rate'];

  $extra_km_charges = (float)$_POST['extra_km_charges'];
  $extra_hour_charges = (float)$_POST['extra_hour_charges'];
  $driver_night_charges = (float)$_POST['driver_night_charges'];

  $discount = (float)$_POST['discount'];

  $misc_1 = $_POST['misc_1'];
  $misc_value_1 = $_POST['misc_value_1'];

  $misc_2 = $_POST['misc_2'];
  $misc_value_2 = $_POST['misc_value_2'];

  $tdr = (float)$_POST['tdr'];
  $total_fare = (float)$_POST['total_fare'];

  $invoice_query="INSERT INTO `invoice` VALUES ('".$to."' , '".$name."' , '".$invoice_no."' , '".$invoice_date."' , '".$pickup_location."' , '".$pickup_date."' , '".$drop_location."' , '".$drop_date."' , '".$car_name."' , '".$operator_details."' , '".$car_type."' , 'Hourly Rentals')";
  mysql_query($invoice_query) or die("Error in Query".mysql_error());


  $fare_details_query = "INSERT INTO `fare_details` VALUES ('".$invoice_no."' , '0' , '0' , '0' , '0' , '0' , '".$package_type."' , '".$package_rate."' , '".$extra_km_charges."' , '".$extra_hour_charges."' , '".$driver_night_charges."', '".$discount."' , '".$misc_1."', '".$misc_value_1."' , '".$misc_2."', '".$misc_value_2."' , '".$tdr."', '".$total_fare."')";

  mysql_query($fare_details_query) or die("Error in Query".mysql_error());

$invoice_date = date('d-m-Y' , strtotime($invoice_date));
$pickup_date = date('d-m-Y' , strtotime($pickup_date));


$message = '<html>
			<head>
			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <title>Demystifying Email Design</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
  <link href="http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet" type="text/css">
  <link href="http://fonts.googleapis.com/css?family=Grand+Hotel" rel="stylesheet" type="text/css">
</head>
				<body style="margin: 0; padding: 0; overflow:auto; font-family:Trebuchet MS,Arial,Helvetica,sans-serif;">

<div class="header" width="100%" style="background-color:black; height:100px;">
  <div class="logo" style="width:22%;">
  <img src="resources/rutogo.png" alt="Creating Email Magic" width="100%" height="92px" style="display: block; float:left; padding: 4px 0px 4px 13px;" />
  </div>
    <div class="invoice" style="width:52%;margin-top:4%; float:right;  margin-right: 2%;">
          <p align="right" style="color:white;  margin:0px; padding:0px; font-family:Trebuchet MS,Arial,Helvetica,sans-serif;">Invoice No : '.$invoice_no.'</p>
          <p align="right" style="color:white; margin: 0px; padding:0px; font-family:Trebuchet MS,Arial,Helvetica,sans-serif;">'.$invoice_date.'</p>
       </div>
</div>
    
 <div style="width:98%;margin-left:1%;"> 
 <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="margin:0 auto; table-layout:fixed; background-image:url(\'http://memeveme.com/resources/background.png\');background-repeat: no-repeat;">
  <tr>
   <td  width="100%" align="center">
     <table align="center" border="0" cellpadding="0" cellspacing="0"  style=" border-collapse: collapse; width:75%;">
       
       <tr>
         <td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
           <table border="0" cellpadding="0" cellspacing="0" width="100%">
            
            <tr>
             <td>
              <h1 align="left" style="margin:0;font-family:Trebuchet MS,Arial,Helvetica,sans-serif;">Hi '.$name.'</h1>
              <p style="font-family:Trebuchet MS,Arial,Helvetica,sans-serif;font-size: 17px;">(Thanks for choosing Rutugo.com)</p>
             </td>
            </tr>
            
            <tr>
             <td align="center" style="padding: 5px 0 5px 0;">
               <h1 style="font-family:Trebuchet MS,Arial,Helvetica,sans-serif; margin-bottom:0px; padding:0px;">Total Fare</h1>
               <h1 style="font-family:Trebuchet MS,Arial,Helvetica,sans-serif;  margin:0px; padding:0px;font-size:47px;">Rs '.$total_fare.'</h1> 
             </td>
            </tr>
            
            <tr>
             <td align="center" style="padding: 5px 0 5px 0;">
               <h1 style="font-family:Trebuchet MS,Arial,Helvetica,sans-serif; margin-bottom:0px; padding:0px; font-size:47px;">'.$pickup_location.'</h1>
               <p style="font-family:Trebuchet MS,Arial,Helvetica,sans-serif;font-size: 17px;">(Local City Travel)</p> 
             </td>
            </tr>

            <tr>
             <td style="padding: 5px 0 5px 0;">
               <p style="float:left;font-family:Trebuchet MS,Arial,Helvetica,sans-serif;"><b>'.$pickup_date.'</b></p>
               <p  style="float:right;font-family:Trebuchet MS,Arial,Helvetica,sans-serif;"><b>'.$car_type.', '.$car_name.'</b></p> 
             </td>
            </tr>
            
             <tr>
             <td align="center" style="padding: 5px 0 5px 0;">
               <p style="font-family:Trebuchet MS,Arial,Helvetica,sans-serif;"><b>YOU RODE WITH '.$operator_details.'</b></p>
               <h2 style="font-family:Trebuchet MS,Arial,Helvetica,sans-serif;">RATE THIS TRIP</h2> 
                <table style="border-collapse: collapse;border-spacing: 0;width: 275px; margin: 0 auto; font-size: 50px; direction: rtl;" dir="rtl">
                                                                                            <tr>
                                                                                                <td style="padding: 0;vertical-align: top;" width="55" class="star-wrapper" lang="star-wrapper">
                                                                                                    <div style="display: block; text-align: center; float: left;width: 55px;overflow: hidden;line-height: 60px;">
                                                                                                        <a href="rating.php?rating=5&invoice_no='.$invoice_no.'" class="star" target="_blank" lang="star-divbox" style="color: #FFCC00; text-decoration: none; display: inline-block;height: 50px;width: 55px;overflow: hidden;line-height: 60px;" tabindex="1">
                                                                                                            <div lang="empty-star" style="margin: 0;display: inline-block;">&#9734;</div>
                                                                                                            <div lang="full-star" style="margin: 0;display: inline-block; width:0; overflow:hidden;float:left; display:none; height: 0; max-height: 0;">&#9733;</div>
                                                                                                        </a>
                                                                                                       
                                                                                                    </div>
                                                                                                </td>
                                                                                                <td style="padding: 0;vertical-align: top" width="55" class="star-wrapper" lang="star-wrapper">
                                                                                                    <div style="display: block; text-align: center; float: left;width: 55px;overflow: hidden;line-height: 60px;">
                                                                                                        <a href="rating.php?rating=4&invoice_no='.$invoice_no.'" class="star" target="_blank" lang="star-divbox" style="color: #FFCC00; text-decoration: none; display: inline-block;height: 50px;width: 55px;overflow: hidden;line-height: 60px;" tabindex="2">
                                                                                                            <div lang="empty-star" style="margin: 0;display: inline-block;">&#9734;</div>
                                                                                                            <div lang="full-star" style="margin: 0;display: inline-block; width:0; overflow:hidden;float:left; display:none; height: 0; max-height: 0;">&#9733;</div>
                                                                                                        </a>
                                                                                                        
                                                                                                    </div>
                                                                                                </td>
                                                                                                <td style="padding: 0;vertical-align: top" width="55" class="star-wrapper" lang="star-wrapper">
                                                                                                    <div style="display: block; text-align: center; float: left;width: 55px;overflow: hidden;line-height: 60px;">
                                                                                                        <a href="rating.php?rating=3&invoice_no='.$invoice_no.'" class="star" target="_blank" lang="star-divbox" style="color: #FFCC00; text-decoration: none; display: inline-block;height: 50px;width: 55px;overflow: hidden;line-height: 60px;" tabindex="3">
                                                                                                            <div lang="empty-star" style="margin: 0;display: inline-block;">&#9734;</div>
                                                                                                            <div lang="full-star" style="margin: 0;display: inline-block; width:0; overflow:hidden;float:left; display:none; height: 0; max-height: 0;">&#9733;</div>
                                                                                                        </a>
                                                                                                        
                                                                                                    </div>
                                                                                                </td>
                                                                                                <td style="padding: 0;vertical-align: top" width="55" class="star-wrapper" lang="star-wrapper">
                                                                                                    <div style="display: block; text-align: center; float: left;width: 55px;overflow: hidden;line-height: 60px;">
                                                                                                        <a href="rating.php?rating=2&invoice_no='.$invoice_no.'" class="star" target="_blank" lang="star-divbox" style="color: #FFCC00; text-decoration: none; display: inline-block;height: 50px;width: 55px;overflow: hidden;line-height: 60px;" tabindex="4">
                                                                                                            <div lang="empty-star" style="margin: 0;display: inline-block;">&#9734;</div>
                                                                                                            <div lang="full-star" style="margin: 0;display: inline-block; width:0; overflow:hidden;float:left; display:none; height: 0; max-height: 0;">&#9733;</div>
                                                                                                        </a>
                                                                                                        
                                                                                                    </div>
                                                                                                </td>
                                                                                                <td style="padding: 0;vertical-align: top" width="55" class="star-wrapper" lang="star-wrapper">
                                                                                                    <div style="display: block; text-align: center; float: left;width: 55px;overflow: hidden;line-height: 60px;">
                                                                                                        <a href="rating.php?rating=1&invoice_no='.$invoice_no.'" class="star" target="_blank" lang="star-divbox" style="color: #FFCC00; text-decoration: none; display: inline-block;height: 50px;width: 55px;overflow: hidden;line-height: 60px;" tabindex="5">
                                                                                                            <div lang="empty-star" style="margin: 0;display: inline-block;">&#9734;</div>
                                                                                                            <div lang="full-star" style="margin: 0;display: inline-block; width:0; overflow:hidden;float:left; display:none; height: 0; max-height: 0;">&#9733;</div>
                                                                                                        </a>
                                                                                                        
                                                                                                    </div>
                                                                                                </td>
                                                                                            </tr>
                                                                             </table>
              
             </td>
            </tr>

            <tr>
              <td align="center" style="width:90%; height:40px;  ">
               </td>
            </tr>

            <tr>
              <td align="center" style="width:90%; background-color:black; height:40px;  ">
               <h1 style="color:white;   margin: 0;  padding: 1px 0 1px 0; font-size: 24px;font-family:Trebuchet MS,Arial,Helvetica,sans-serif;">Fare Details</h1>
              </td>
            </tr>

            <tr>
             <td style="">
               <p style="float:left;font-family:Trebuchet MS,Arial,Helvetica,sans-serif;"><b>Package Type</p>
               <p  style="float:right;font-family:Trebuchet MS,Arial,Helvetica,sans-serif;"><b>'.$package_type.'</p> 
             </td>
            </tr>

            <tr>
             <td style="">
               <p style="float:left;font-family:Trebuchet MS,Arial,Helvetica,sans-serif;"><b>Package Cost</p>
               <p  style="float:right;font-family:Trebuchet MS,Arial,Helvetica,sans-serif;"><b>'.$package_rate.'</p> 
             </td>
            </tr>

            <tr>
             <td style="">
               <p style="float:left;font-family:Trebuchet MS,Arial,Helvetica,sans-serif;"><b>Extra Km</p>
               <p  style="float:right;font-family:Trebuchet MS,Arial,Helvetica,sans-serif;"><b>Rs '.$extra_km_charges.'</p> 
             </td>
            </tr>


            <tr>
             <td style="">
               <p style="float:left;font-family:Trebuchet MS,Arial,Helvetica,sans-serif;"><b>Extra Hour Charges</p>
               <p  style="float:right;font-family:Trebuchet MS,Arial,Helvetica,sans-serif;"><b>Rs '.$extra_hour_charges.'</p> 
             </td>
            </tr>


            <tr>
             <td style="">
               <p style="float:left;font-family:Trebuchet MS,Arial,Helvetica,sans-serif;"><b>Driver Night Charges</b></p>
               <p  style="float:right;font-family:Trebuchet MS,Arial,Helvetica,sans-serif;"><b>Rs '.$driver_night_charges.'</b></p> 
             </td>
            </tr>

            <tr>
             <td style="">
               <p style="float:left;font-family:Trebuchet MS,Arial,Helvetica,sans-serif;"><b>Discount</b></p>
               <p  style="float:right;font-family:Trebuchet MS,Arial,Helvetica,sans-serif;"><b> -'.$discount.'</b></p> 
             </td>
            </tr>

            <tr>
             <td style="">
               <p style="float:left;font-family:Trebuchet MS,Arial,Helvetica,sans-serif;"><b>'.$misc_1.'</b></p>
               <p  style="float:right;font-family:Trebuchet MS,Arial,Helvetica,sans-serif;"><b>'.$misc_value_1.'</b></p> 
             </td>
            </tr>

            <tr>
             <td style="">
               <p style="float:left;font-family:Trebuchet MS,Arial,Helvetica,sans-serif;"><b>'.$misc_2.'</b></p>
               <p  style="float:right;font-family:Trebuchet MS,Arial,Helvetica,sans-serif;"><b>'.$misc_value_2.'</b></p> 
             </td>
            </tr>

            <tr>
             <td style="">
               <p style="float:left;font-family:Trebuchet MS,Arial,Helvetica,sans-serif;"><b>TDR(valid for online payments)</b></p>
               <p  style="float:right;font-family:Trebuchet MS,Arial,Helvetica,sans-serif;"><b>'.$tdr.'</b></p> 
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
</div>
     <footer>
    <div class="header" width="100%" style="background-color:black;">
         <img src="resources/address.png" style="width:67%; "> 
          <div style="float:right; padding-top:18px;padding-right:1px;width:29%;">
              <a href=""  style="float:right; text-decoration:none; width:22%; "><img style="width:65%; " src="resources/facebook.png"></a>
              <a href="" style="float:right; text-decoration:none; width:22%;"><img style="width:65%; " src="resources/gplus.png"></a>
              <a href="" style="float:right; text-decoration:none; width:22%; "><img style="width:65%; " src="resources/twitter.png"></a>
              <a href="" style="float:right; text-decoration:none; width:22%;"><img style="width:65%; " src="resources/instagram.png"></a>
          </div>
    </div>
  </footer>
</body>

			</html>';
}

else if($trip_type == 1){ // Round Trip

  $to = $_POST['to'];
  $name = $_POST['name'];
  $invoice_no = $_POST['invoice_no'];
  $invoice_date = $_POST['invoice_date'];
    $invoice_date = date('Y-m-d' , strtotime($invoice_date));

  $pickup_location = $_POST['pickup_location'];
  $drop_location = $_POST['drop_location'];

  $pickup_date = $_POST['pickup_date'];
    $pickup_date = date('Y-m-d' , strtotime($pickup_date));

  $drop_date = $_POST['drop_date'];
    $drop_date = date('Y-m-d' , strtotime($drop_date));

  $car_name = $_POST['car_name'];
  $operator_details = $_POST['operator_details'];
  $car_type = $_POST['car_type'];

  $billed_km = (float)$_POST['billed_km'];
  $fare_per_km = (float)$_POST['fare_per_km'];
  $no_of_days = (int)$_POST['no_of_days'];

  $da = (float)$_POST['da'];
  $discount = (float)$_POST['discount'];

  $misc_1 = $_POST['misc_1'];
  $misc_value_1 = $_POST['misc_value_1'];

  $misc_2 = $_POST['misc_2'];
  $misc_value_2 = $_POST['misc_value_2'];

  $tdr = (float)$_POST['tdr'];
  $total_fare = (float)$_POST['total_fare'];


    $invoice_query="INSERT INTO `invoice` VALUES ('".$to."' , '".$name."' , '".$invoice_no."' , '".$invoice_date."' , '".$pickup_location."' , '".$pickup_date."' , '".$drop_location."' , '".$drop_date."' , '".$car_name."' , '".$operator_details."' , '".$car_type."' , 'Round Trip')";
    mysql_query($invoice_query) or die("Error in Query".mysql_error());


    $fare_details_query = "INSERT INTO `fare_details` VALUES ('".$invoice_no."' , '".$billed_km."' , '".$fare_per_km."' , '".$no_of_days."' , '".$da."' , '0' , '' , '0' , '0' , '0' , '0', '".$discount."' , '".$misc_1."', '".$misc_value_1."' , '".$misc_2."', '".$misc_value_2."' , '".$tdr."', '".$total_fare."')";

    mysql_query($fare_details_query) or die("Error in Query".mysql_error());

  $invoice_date = date('d-m-Y' , strtotime($invoice_date));
  $pickup_date = date('d-m-Y' , strtotime($pickup_date));
  $drop_date = date('d-m-Y' , strtotime($drop_date));


$message='<html>
			<head>
			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <title>Demystifying Email Design</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
  <link href="http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet" type="text/css">
  <link href="http://fonts.googleapis.com/css?family=Grand+Hotel" rel="stylesheet" type="text/css">
</head>
			<body style="margin: 0; padding: 0; overflow:auto; font-family:Open Sans,sans-serif;">

<div class="header" width="100%" style="background-color:black; height:100px;">
  <div class="logo" style="width:22%;">
  <img src="resources/rutogo.png" alt="Creating Email Magic" width="100%" height="92px" style="display: block; float:left; padding: 4px 0px 4px 13px;" />
  </div>
    <div class="invoice" style="width:52%;margin-top:4%; float:right;  margin-right: 2%;">
          <p align="right" style="color:white;  margin:0px; padding:0px; font-family:Trebuchet MS,Arial,Helvetica,sans-serif;">Invoice No : '.$invoice_no.'</p>
          <p align="right" style="color:white; margin: 0px; padding:0px; font-family:Trebuchet MS,Arial,Helvetica,sans-serif;">'.$invoice_date.'</p>
       </div>
</div>
   
 <div style="width:98%;margin-left:1%;"> 
 <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="margin:0 auto; table-layout:fixed; background-image:url(\'http://memeveme.com/resources/background.png\');background-repeat: no-repeat;">
  <tr>
   <td  width="100%" align="center">
     <table align="center" border="0" cellpadding="0" cellspacing="0"  style=" border-collapse: collapse; width:75%;">
        <tr>
         <td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
           <table border="0" cellpadding="0" cellspacing="0" width="100%">
            
            <tr>
             <td>
              <h1 align="left" style="margin:0;font-family:Trebuchet MS,Arial,Helvetica,sans-serif;">Hi '.$name.'</h1>
              <p style="font-family:Trebuchet MS,Arial,Helvetica,sans-serif;font-size: 17px;">(Thanks for choosing Rutugo.com)</p>
             </td>
            </tr>
            
            <tr>
             <td align="center" style="padding: 5px 0 5px 0;">
               <h1 style="font-family:Trebuchet MS,Arial,Helvetica,sans-serif; margin-bottom:0px; padding:0px;">Total Fare</h1>
               <h2 style="font-family:Trebuchet MS,Arial,Helvetica,sans-serif; font-size:47px; margin:0px; padding:0px;">Rs '.$total_fare.'</h2> 
             </td>
            </tr>
            
            <tr>
          
            <td align="left" style="padding: 5px 0 5px 0; float:left;">
               <h1 style="font-family:Trebuchet MS,Arial,Helvetica,sans-serif; font-size:47px; margin-bottom:0px; padding:0px;">'.$pickup_location.'</h1>
               <p style="font-family:Trebuchet MS,Arial,Helvetica,sans-serif;font-size: 17px;"><b>'.$pickup_date.'</b></p> 
             </td>
          
            <td align="center" style="  padding: 45px 0 5px 0; float: left;  margin-left: 13%;">
               <img src="http://memeveme.com/resources/arrow-right.png" style="width:50px;" ></img>
               <p style="font-family:Trebuchet MS,Arial,Helvetica,sans-serif;font-size: 17px;"><b>'.$car_type.', '.$car_name.'</b></p> 
             </td>


            <td align="right" style="padding: 5px 0 5px 0; float:right;">
               <h1 style="font-family:Trebuchet MS,Arial,Helvetica,sans-serif; font-size:47px; margin-bottom:0px; padding:0px;">'.$drop_location.'</h1>
               <p style="font-family:Trebuchet MS,Arial,Helvetica,sans-serif;font-size: 17px;"><b>'.$drop_date.'</b></p> 
             </td> 

            </tr>

             <tr>
             <td align="center" style="padding: 5px 0 5px 0;">
               <p style="font-family:Trebuchet MS,Arial,Helvetica,sans-serif;font-size: 17px;"><b>YOU RODE WITH '.$operator_details.'</b></p>
               <h2 style="font-family:Trebuchet MS,Arial,Helvetica,sans-serif;">RATE THIS TRIP</h2> 
              <table style="border-collapse: collapse;border-spacing: 0;width: 275px; margin: 0 auto; font-size: 50px; direction: rtl;" dir="rtl">
                                                                                            <tr>
                                                                                                <td style="padding: 0;vertical-align: top;" width="55" class="star-wrapper" lang="star-wrapper">
                                                                                                    <div style="display: block; text-align: center; float: left;width: 55px;overflow: hidden;line-height: 60px;">
                                                                                                        <a href="rating.php?rating=5&invoice_no='.$invoice_no.'" class="star" target="_blank" lang="star-divbox" style="color: #FFCC00; text-decoration: none; display: inline-block;height: 50px;width: 55px;overflow: hidden;line-height: 60px;" tabindex="1">
                                                                                                            <div lang="empty-star" style="margin: 0;display: inline-block;">&#9734;</div>
                                                                                                            <div lang="full-star" style="margin: 0;display: inline-block; width:0; overflow:hidden;float:left; display:none; height: 0; max-height: 0;">&#9733;</div>
                                                                                                        </a>
                                                                                                       
                                                                                                    </div>
                                                                                                </td>
                                                                                                <td style="padding: 0;vertical-align: top" width="55" class="star-wrapper" lang="star-wrapper">
                                                                                                    <div style="display: block; text-align: center; float: left;width: 55px;overflow: hidden;line-height: 60px;">
                                                                                                        <a href="rating.php?rating=4&invoice_no='.$invoice_no.'" class="star" target="_blank" lang="star-divbox" style="color: #FFCC00; text-decoration: none; display: inline-block;height: 50px;width: 55px;overflow: hidden;line-height: 60px;" tabindex="2">
                                                                                                            <div lang="empty-star" style="margin: 0;display: inline-block;">&#9734;</div>
                                                                                                            <div lang="full-star" style="margin: 0;display: inline-block; width:0; overflow:hidden;float:left; display:none; height: 0; max-height: 0;">&#9733;</div>
                                                                                                        </a>
                                                                                                        
                                                                                                    </div>
                                                                                                </td>
                                                                                                <td style="padding: 0;vertical-align: top" width="55" class="star-wrapper" lang="star-wrapper">
                                                                                                    <div style="display: block; text-align: center; float: left;width: 55px;overflow: hidden;line-height: 60px;">
                                                                                                        <a href="rating.php?rating=3&invoice_no='.$invoice_no.'" class="star" target="_blank" lang="star-divbox" style="color: #FFCC00; text-decoration: none; display: inline-block;height: 50px;width: 55px;overflow: hidden;line-height: 60px;" tabindex="3">
                                                                                                            <div lang="empty-star" style="margin: 0;display: inline-block;">&#9734;</div>
                                                                                                            <div lang="full-star" style="margin: 0;display: inline-block; width:0; overflow:hidden;float:left; display:none; height: 0; max-height: 0;">&#9733;</div>
                                                                                                        </a>
                                                                                                        
                                                                                                    </div>
                                                                                                </td>
                                                                                                <td style="padding: 0;vertical-align: top" width="55" class="star-wrapper" lang="star-wrapper">
                                                                                                    <div style="display: block; text-align: center; float: left;width: 55px;overflow: hidden;line-height: 60px;">
                                                                                                        <a href="rating.php?rating=2&invoice_no='.$invoice_no.'" class="star" target="_blank" lang="star-divbox" style="color: #FFCC00; text-decoration: none; display: inline-block;height: 50px;width: 55px;overflow: hidden;line-height: 60px;" tabindex="4">
                                                                                                            <div lang="empty-star" style="margin: 0;display: inline-block;">&#9734;</div>
                                                                                                            <div lang="full-star" style="margin: 0;display: inline-block; width:0; overflow:hidden;float:left; display:none; height: 0; max-height: 0;">&#9733;</div>
                                                                                                        </a>
                                                                                                        
                                                                                                    </div>
                                                                                                </td>
                                                                                                <td style="padding: 0;vertical-align: top" width="55" class="star-wrapper" lang="star-wrapper">
                                                                                                    <div style="display: block; text-align: center; float: left;width: 55px;overflow: hidden;line-height: 60px;">
                                                                                                        <a href="rating.php?rating=1&invoice_no='.$invoice_no.'" class="star" target="_blank" lang="star-divbox" style="color: #FFCC00; text-decoration: none; display: inline-block;height: 50px;width: 55px;overflow: hidden;line-height: 60px;" tabindex="5">
                                                                                                            <div lang="empty-star" style="margin: 0;display: inline-block;">&#9734;</div>
                                                                                                            <div lang="full-star" style="margin: 0;display: inline-block; width:0; overflow:hidden;float:left; display:none; height: 0; max-height: 0;">&#9733;</div>
                                                                                                        </a>
                                                                                                        
                                                                                                    </div>
                                                                                                </td>
                                                                                            </tr>
                                                                             </table>
              
             </td>
            </tr>

            <tr>
              <td align="center" style="width:90%; height:40px;  ">
               </td>
            </tr>

            <tr>
              <td align="center" style="width:90%; background-color:black; height:40px;  ">
               <h1 style="color:white; font-family:Trebuchet MS,Arial,Helvetica,sans-serif;  margin: 0; padding: 1px 0 1px 0; font-size: 24px;">Fare Details</h1>
              </td>
            </tr>

            <tr>
             <td style="">
               <p style="float:left;font-family:Trebuchet MS,Arial,Helvetica,sans-serif;"><b>Billed Km</b></p>
               <p  style="float:right;font-family:Trebuchet MS,Arial,Helvetica,sans-serif;"><b>'.$billed_km.'</b></p> 
             </td>
            </tr>

            <tr>
             <td style="">
               <p style="float:left;font-family:Trebuchet MS,Arial,Helvetica,sans-serif;"><b>Days</b></p>
               <p  style="float:right;font-family:Trebuchet MS,Arial,Helvetica,sans-serif;"><b>'.$no_of_days.'</b></p> 
             </td>
            </tr>

            <tr>
             <td style="">
               <p style="float:left;font-family:Trebuchet MS,Arial,Helvetica,sans-serif;"><b>Fare per Km</b></p>
               <p  style="float:right;font-family:Trebuchet MS,Arial,Helvetica,sans-serif;"><b>Rs '.$fare_per_km.'</b></p> 
             </td>
            </tr>


            <tr>
             <td style="">
               <p style="float:left;font-family:Trebuchet MS,Arial,Helvetica,sans-serif;"><b>Driver Alowance</b></p>
               <p  style="float:right;font-family:Trebuchet MS,Arial,Helvetica,sans-serif;"><b>Rs '.$da.'</b></p> 
             </td>
            </tr>

            <tr>
             <td style="">
               <p style="float:left;font-family:Trebuchet MS,Arial,Helvetica,sans-serif;"><b>Discount</b></p>
               <p  style="float:right;font-family:Trebuchet MS,Arial,Helvetica,sans-serif;"><b> -'.$discount.'</b></p> 
             </td>
            </tr>

            <tr>
             <td style="">
               <p style="float:left;font-family:Trebuchet MS,Arial,Helvetica,sans-serif;"><b>'.$misc_1.'</b></p>
               <p  style="float:right;font-family:Trebuchet MS,Arial,Helvetica,sans-serif;"><b>'.$misc_value_1.'</b></p> 
             </td>
            </tr>


            <tr>
             <td style="">
               <p style="float:left;font-family:Trebuchet MS,Arial,Helvetica,sans-serif;"><b>'.$misc_2.'</b></p>
               <p  style="float:right;font-family:Trebuchet MS,Arial,Helvetica,sans-serif;"><b>'.$misc_value_2.'</b></p> 
             </td>
            </tr>

            <tr>
             <td style="">
               <p style="float:left;font-family:Trebuchet MS,Arial,Helvetica,sans-serif;"><b>TDR(valid for online payments)</b></p>
               <p  style="float:right;font-family:Trebuchet MS,Arial,Helvetica,sans-serif;"><b>'.$tdr.'</b></p> 
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
 </div>

    <footer>
    <div class="header" width="100%" style="background-color:black;">
         <img src="resources/address.png" style="width:67%; "> 
          <div style="float:right; padding-top:18px;padding-right:1px;width:29%;">
              <a href=""  style="float:right; text-decoration:none; width:22%; "><img style="width:65%; " src="resources/facebook.png"></a>
              <a href="" style="float:right; text-decoration:none; width:22%;"><img style="width:65%; " src="resources/gplus.png"></a>
              <a href="" style="float:right; text-decoration:none; width:22%; "><img style="width:65%; " src="resources/twitter.png"></a>
              <a href="" style="float:right; text-decoration:none; width:22%;"><img style="width:65%; " src="resources/instagram.png"></a>
          </div>
    </div>
  </footer>
</body>
</html>';


}


else if($trip_type == 2){ //One Way Trip

  $to = $_POST['to'];
  $name = $_POST['name'];
  $invoice_no = $_POST['invoice_no'];
  $invoice_date = $_POST['invoice_date'];
    $invoice_date = date('Y-m-d' , strtotime($invoice_date));

  $pickup_location = $_POST['pickup_location'];
  $drop_location = $_POST['drop_location'];

  $pickup_date = $_POST['pickup_date'];
    $pickup_date = date('Y-m-d' , strtotime($pickup_date));

  $drop_date = $_POST['drop_date'];
    $drop_date = date('Y-m-d' , strtotime($drop_date));

  $car_name = $_POST['car_name'];
  $operator_details = $_POST['operator_details'];
  $car_type = $_POST['car_type'];

  $fare = (float)$_POST['fare'];

  $discount = (float)$_POST['discount'];

  $misc_1 = $_POST['misc_1'];
  $misc_value_1 = $_POST['misc_value_1'];

  $misc_2 = $_POST['misc_2'];
  $misc_value_2 = $_POST['misc_value_2'];

  $tdr = (float)$_POST['tdr'];
  $total_fare = (float)$_POST['total_fare'];

    $invoice_query="INSERT INTO `invoice` VALUES ('".$to."' , '".$name."' , '".$invoice_no."' , '".$invoice_date."' , '".$pickup_location."' , '".$pickup_date."' , '".$drop_location."' , '".$drop_date."' , '".$car_name."' , '".$operator_details."' , '".$car_type."' , 'One Way Trip')";
    mysql_query($invoice_query) or die("Error in Query".mysql_error());


    $fare_details_query = "INSERT INTO `fare_details` VALUES ('".$invoice_no."' , '0' , '0' , '0' , '0' , '".$fare."' , '' , '0' , '0' , '0' , '0', '".$discount."' , '".$misc_1."', '".$misc_value_1."' , '".$misc_2."', '".$misc_value_2."' , '".$tdr."', '".$total_fare."')";

    mysql_query($fare_details_query) or die("Error in Query".mysql_error());

  $invoice_date = date('d-m-Y' , strtotime($invoice_date));
  $pickup_date = date('d-m-Y' , strtotime($pickup_date));
  $drop_date = date('d-m-Y' , strtotime($drop_date));





$message='<html>
			<head>
			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <title>Demystifying Email Design</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
  <link href="http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet" type="text/css">
  <link href="http://fonts.googleapis.com/css?family=Grand+Hotel" rel="stylesheet" type="text/css">
		</head>
			<body style="margin: 0; padding: 0;  overflow:auto; font-family:Open Sans,sans-serif;">

<div class="header" width="100%" style="background-color:black; height:100px;">
  <div class="logo" style="width:22%;">
  <img src="resources/rutogo.png" alt="Creating Email Magic" width="100%" height="92px" style="display: block; float:left; padding: 4px 0px 4px 13px;" />
  </div>
    <div class="invoice" style="width:52%;margin-top:4%; float:right;  margin-right: 2%;">
          <p align="right" style="color:white;  margin:0px; padding:0px; font-family:Trebuchet MS,Arial,Helvetica,sans-serif;">Invoice No : '.$invoice_no.'</p>
          <p align="right" style="color:white; margin: 0px; padding:0px; font-family:Trebuchet MS,Arial,Helvetica,sans-serif;">'.$invoice_date.'</p>
       </div>
</div>
   
 <div style="width:98%;margin-left:1%;"> 
 <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="margin:0 auto; table-layout:fixed; background-image:url(\'http://memeveme.com/resources/background.png\');background-repeat: no-repeat;">
  <tr>
   <td  width="100%" align="center">
     <table align="center" border="0" cellpadding="0" cellspacing="0"  style=" border-collapse: collapse; width:75%;">
        <tr>
         <td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
           <table border="0" cellpadding="0" cellspacing="0" width="100%">
            
            <tr>
             <td>
              <h1 align="left" style="margin:0;font-family:Trebuchet MS,Arial,Helvetica,sans-serif;">Hi '.$name.'</h1>
              <p style="font-family:Trebuchet MS,Arial,Helvetica,sans-serif;font-size: 17px;">(Thanks for choosing Rutugo.com)</p>
             </td>
            </tr>
            
            <tr>
             <td align="center" style="padding: 5px 0 5px 0;">
               <h1 style="font-family:Trebuchet MS,Arial,Helvetica,sans-serif; margin-bottom:0px; padding:0px;">Total Fare</h1>
               <h2 style="font-family:Trebuchet MS,Arial,Helvetica,sans-serif; font-size:47px; margin:0px; padding:0px;">Rs '.$total_fare.'</h2> 
             </td>
            </tr>
            
            <tr>
          
            <td align="left" style="padding: 5px 0 5px 0; float:left;">
               <h1 style="font-family:Trebuchet MS,Arial,Helvetica,sans-serif; font-size:47px; margin-bottom:0px; padding:0px;">'.$pickup_location.'</h1>
               <p style="font-family:Trebuchet MS,Arial,Helvetica,sans-serif;font-size: 17px;"><b>'.$pickup_date.'</b></p> 
             </td>
          
            <td align="center" style="  padding: 45px 0 5px 0; float: left;  margin-left: 13%;">
               <img src="http://memeveme.com/resources/arrow-right.png" style="width:50px;" ></img>
               <p style="font-family:Trebuchet MS,Arial,Helvetica,sans-serif;font-size: 17px;"><b>'.$car_type.', '.$car_name.'</b></p> 
             </td>


            <td align="right" style="padding: 5px 0 5px 0; float:right;">
               <h1 style="font-family:Trebuchet MS,Arial,Helvetica,sans-serif; font-size:47px; margin-bottom:0px; padding:0px;">'.$drop_location.'</h1>
               <p style="font-family:Trebuchet MS,Arial,Helvetica,sans-serif;font-size: 17px;"><b>'.$drop_date.'</b></p> 
             </td> 

            </tr>

             <tr>
             <td align="center" style="padding: 5px 0 5px 0;">
               <p style="font-family:Trebuchet MS,Arial,Helvetica,sans-serif;font-size: 17px;"><b>YOU RODE WITH '.$operator_details.'</b></p>
               <h2 style="font-family:Trebuchet MS,Arial,Helvetica,sans-serif;">RATE THIS TRIP</h2> 
               <table style="border-collapse: collapse;border-spacing: 0;width: 275px; margin: 0 auto; font-size: 50px; direction: rtl;" dir="rtl">
                                                                                            <tr>
                                                                                                <td style="padding: 0;vertical-align: top;" width="55" class="star-wrapper" lang="star-wrapper">
                                                                                                    <div style="display: block; text-align: center; float: left;width: 55px;overflow: hidden;line-height: 60px;">
                                                                                                        <a href="rating.php?rating=5&invoice_no='.$invoice_no.'" class="star" target="_blank" lang="star-divbox" style="color: #FFCC00; text-decoration: none; display: inline-block;height: 50px;width: 55px;overflow: hidden;line-height: 60px;" tabindex="1">
                                                                                                            <div lang="empty-star" style="margin: 0;display: inline-block;">&#9734;</div>
                                                                                                            <div lang="full-star" style="margin: 0;display: inline-block; width:0; overflow:hidden;float:left; display:none; height: 0; max-height: 0;">&#9733;</div>
                                                                                                        </a>
                                                                                                       
                                                                                                    </div>
                                                                                                </td>
                                                                                                <td style="padding: 0;vertical-align: top" width="55" class="star-wrapper" lang="star-wrapper">
                                                                                                    <div style="display: block; text-align: center; float: left;width: 55px;overflow: hidden;line-height: 60px;">
                                                                                                        <a href="rating.php?rating=4&invoice_no='.$invoice_no.'" class="star" target="_blank" lang="star-divbox" style="color: #FFCC00; text-decoration: none; display: inline-block;height: 50px;width: 55px;overflow: hidden;line-height: 60px;" tabindex="2">
                                                                                                            <div lang="empty-star" style="margin: 0;display: inline-block;">&#9734;</div>
                                                                                                            <div lang="full-star" style="margin: 0;display: inline-block; width:0; overflow:hidden;float:left; display:none; height: 0; max-height: 0;">&#9733;</div>
                                                                                                        </a>
                                                                                                        
                                                                                                    </div>
                                                                                                </td>
                                                                                                <td style="padding: 0;vertical-align: top" width="55" class="star-wrapper" lang="star-wrapper">
                                                                                                    <div style="display: block; text-align: center; float: left;width: 55px;overflow: hidden;line-height: 60px;">
                                                                                                        <a href="rating.php?rating=3&invoice_no='.$invoice_no.'" class="star" target="_blank" lang="star-divbox" style="color: #FFCC00; text-decoration: none; display: inline-block;height: 50px;width: 55px;overflow: hidden;line-height: 60px;" tabindex="3">
                                                                                                            <div lang="empty-star" style="margin: 0;display: inline-block;">&#9734;</div>
                                                                                                            <div lang="full-star" style="margin: 0;display: inline-block; width:0; overflow:hidden;float:left; display:none; height: 0; max-height: 0;">&#9733;</div>
                                                                                                        </a>
                                                                                                        
                                                                                                    </div>
                                                                                                </td>
                                                                                                <td style="padding: 0;vertical-align: top" width="55" class="star-wrapper" lang="star-wrapper">
                                                                                                    <div style="display: block; text-align: center; float: left;width: 55px;overflow: hidden;line-height: 60px;">
                                                                                                        <a href="rating.php?rating=2&invoice_no='.$invoice_no.'" class="star" target="_blank" lang="star-divbox" style="color: #FFCC00; text-decoration: none; display: inline-block;height: 50px;width: 55px;overflow: hidden;line-height: 60px;" tabindex="4">
                                                                                                            <div lang="empty-star" style="margin: 0;display: inline-block;">&#9734;</div>
                                                                                                            <div lang="full-star" style="margin: 0;display: inline-block; width:0; overflow:hidden;float:left; display:none; height: 0; max-height: 0;">&#9733;</div>
                                                                                                        </a>
                                                                                                        
                                                                                                    </div>
                                                                                                </td>
                                                                                                <td style="padding: 0;vertical-align: top" width="55" class="star-wrapper" lang="star-wrapper">
                                                                                                    <div style="display: block; text-align: center; float: left;width: 55px;overflow: hidden;line-height: 60px;">
                                                                                                        <a href="rating.php?rating=1&invoice_no='.$invoice_no.'" class="star" target="_blank" lang="star-divbox" style="color: #FFCC00; text-decoration: none; display: inline-block;height: 50px;width: 55px;overflow: hidden;line-height: 60px;" tabindex="5">
                                                                                                            <div lang="empty-star" style="margin: 0;display: inline-block;">&#9734;</div>
                                                                                                            <div lang="full-star" style="margin: 0;display: inline-block; width:0; overflow:hidden;float:left; display:none; height: 0; max-height: 0;">&#9733;</div>
                                                                                                        </a>
                                                                                                        
                                                                                                    </div>
                                                                                                </td>
                                                                                            </tr>
                                                                             </table>
              
             </td>
            </tr>

            <tr>
              <td align="center" style="width:90%; height:40px;  ">
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
               <p  style="float:right;font-family:Trebuchet MS,Arial,Helvetica,sans-serif;"><b>Rs '.$fare.'</b></p> 
             </td>
            </tr>

            <tr>
             <td style="">
               <p style="float:left;font-family:Trebuchet MS,Arial,Helvetica,sans-serif;"><b>Discount</b></p>
               <p  style="float:right;font-family:Trebuchet MS,Arial,Helvetica,sans-serif;"><b>'.$discount.'</b></p> 
             </td>
            </tr>


            <tr>
             <td style="">
               <p style="float:left;font-family:Trebuchet MS,Arial,Helvetica,sans-serif;"><b>'.$misc_1.'</b></p>
               <p  style="float:right;font-family:Trebuchet MS,Arial,Helvetica,sans-serif;"><b>'.$misc_value_1.'</b></p> 
             </td>
            </tr>

            <tr>
             <td style="">
               <p style="float:left;font-family:Trebuchet MS,Arial,Helvetica,sans-serif;"><b>'.$misc_2.'</b></p>
               <p  style="float:right;font-family:Trebuchet MS,Arial,Helvetica,sans-serif;"><b>'.$misc_value_2.'</b></p> 
             </td>
            </tr>

            <tr>
             <td style="">
               <p style="float:left;font-family:Trebuchet MS,Arial,Helvetica,sans-serif;"><b>TDR(valid for online payments)</b></p>
               <p  style="float:right;font-family:Trebuchet MS,Arial,Helvetica,sans-serif;"><b>'.$tdr.'</b></p> 
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
 </div>

    <footer>
    <div class="header" width="100%" style="background-color:black;">
         <img src="resources/address.png" style="width:67%; "> 
          <div style="float:right; padding-top:18px;padding-right:1px;width:29%;">
              <a href=""  style="float:right; text-decoration:none; width:22%; "><img style="width:65%; " src="resources/facebook.png"></a>
              <a href="" style="float:right; text-decoration:none; width:22%;"><img style="width:65%; " src="resources/gplus.png"></a>
              <a href="" style="float:right; text-decoration:none; width:22%; "><img style="width:65%; " src="resources/twitter.png"></a>
              <a href="" style="float:right; text-decoration:none; width:22%;"><img style="width:65%; " src="resources/instagram.png"></a>
          </div>
    </div>
  </footer>
</body>
</html>';
}

$sub="Invoice No. - ".$invoice_no;

$headers = "From:Rutugo.com";
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

</body>
</html>