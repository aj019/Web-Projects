<?php
	 

	session_start();	

	if($_SESSION){
	
	$number_founders = $_POST['founders'];

	$industry = $_POST['industry'];

	$type = $_POST['type']; // IT \ Non-IT

	$knowledge = $_POST['toggle_option']; // Knowedge of Industry

	$business_type = $_POST['business_type'];	

	$startup_stage = $_POST['startup_stage']; 

	$funding = $_POST['funding']; // Funding Stage

	$city = $_POST['city'];

	$res = 0;
	//-------Number of Founders------

	$dedicated = array();

	if($number_founders === '1'){
		$res += 5*20;
		$college1 = $_POST['college1'];
		$dedicated1 = $_POST['dedicated1'];			
		
		$dedicated[0] = $dedicated1; 

		

	}

	else if($number_founders === '2'){
		$res += 5*75;
		$college1 = $_POST['college1'];
		$dedicated1 = $_POST['dedicated1'];

		$college2 = $_POST['college2'];
		$dedicated2 = $_POST['dedicated2'];

		$dedicated[0] = $dedicated1; 
		$dedicated[1] = $dedicated2;
	}

	else if($number_founders === "3"){
		$res += 5*100;
		$college1 = $_POST['college1'];
		$dedicated1 = $_POST['dedicated1'];

		$college2 = $_POST['college2'];
		$dedicated2 = $_POST['dedicated2'];

		$college3 = $_POST['college3'];
		$dedicated3 = $_POST['dedicated3'];

		$dedicated[0] = $dedicated1; 
		$dedicated[1] = $dedicated2; 
		$dedicated[2] = $dedicated3; 

	}


	else if($number_founders === "4"){
		$res += 5*50;
		$college1 = $_POST['college1'];
		$dedicated1 = $_POST['dedicated1'];

		$college2 = $_POST['college2'];
		$dedicated2 = $_POST['dedicated2'];

		$college3 = $_POST['college3'];
		$dedicated3 = $_POST['dedicated3'];

		$college4 = $_POST['college4'];
		$dedicated4 = $_POST['dedicated4'];
	
		$dedicated[0] = $dedicated1; 
		$dedicated[1] = $dedicated2; 
		$dedicated[2] = $dedicated3; 
		$dedicated[3] = $dedicated4; 


	}

	else{
		$res += 5*30;
		$college1 = $_POST['college1'];
		$dedicated1 = $_POST['dedicated1'];

		$college2 = $_POST['college2'];
		$dedicated2 = $_POST['dedicated2'];

		$college3 = $_POST['college3'];
		$dedicated3 = $_POST['dedicated3'];

		$college4 = $_POST['college4'];
		$dedicated4 = $_POST['dedicated4'];

		$dedicated[0] = $dedicated1; 
		$dedicated[1] = $dedicated2; 
		$dedicated[2] = $dedicated3; 
		$dedicated[3] = $dedicated4;
	}


	//--------Dedication--------
	$temp = 0;

	for($i =0 ; $i<$number_founders ; $i++ ){
		
		if($dedicated[$i] === "Part Time"){
			$temp += 10*30;
		} 

		else if ($dedicated[$i] === "Full Time"){
			$temp += 10*100;
		}
	}

	$temp = ($temp/$number_founders);
	$res += $temp;


	//--------Industry-----------
	

	if($industry === "Analytics"){
		$res += 10*15.4;
	}

	else if($industry === "Consumer Internet"){
		$res += 10*100;
	}

	else if($industry === "E-Commerce"){
		$res += 10*50;
	}

	else if($industry === "Education"){
		$res += 10*42.3;
	}

	else if($industry === "Energy"){
		$res += 10*3.8;
	}

	else if($industry === "Hardware"){
		$res += 10*11.5;
	}

	else if($industry === "Mobile App"){
		$res += 10*46.2;
	}

	else if($industry === "Healthcare"){
		$res += 10*34.6;
	}

	else if($industry === "Payment"){
		$res += 10*7.7;
	}

	else if($industry === "Service"){
		$res += 10*53.8;
	}

	else if($industry === "Technology"){
		$res += 10*38.5;
	}

	else if($industry === "Others"){
		$res += 10*30.8;
	}


	//-----Type of Startup--------

	if($type === "IT"){
		$product_development = $_POST['product_development'];

		if($product_development === "Inhouse"){
			$res += (8*100*100)/100;
		}

		else if($product_development === "Outsourced"){
			$res += (8*100*70)/100;
		}

		else{
			$res += (8*100*5)/100;
		}
	}

	else if($type === "Non IT"){
		$setup = $_POST['setup']; // Ready \ Not Ready

		if($setup === "Ready"){
			$res += (8*60*100)/100;
		}

		else if($setup === "Not Ready"){
			$res += (8*60*30)/100;
		}
	}


	//-----Knowledge of Industry------

	$res += 3*$knowledge*10;


	//-----Type of Business------

	if($business_type === "B2B"){
		$res += 3*40;
	}

	else if($business_type === "B2C"){
		$res += 3*100;
	}


	//-----Startup Stage and Funding------


	if($startup_stage === "Ideation"){
		$res += 60*10; 
	}

	else if($startup_stage === "Concept"){
		if($funding === "Bootstraping"){
			$res += 60*15;
		}
		else if($funding === "Incubator"){
			$res += 60*35;
		}
		else if($funding === "Angel"){
			$res += 60*45;
		}
		else{
			$res += 60*20;
		}
	}

	else if($startup_stage === "Beta Launch"){
		if($funding === "Bootstraping"){
			$res += 60*20;
		}

		else if($funding === "Incubator"){
			$res += 60*40;
		}

		else if($funding === "Angel"){
			$res += 60*50;
		}
		else{
			$res += 60*25;
		}
	}

	else if($startup_stage === "Traction"){
		if($funding === "Angel"){
			$res += 60*70;
		}
		else if($funding === "Seed Investor"){
			$res += 60*100;
		}
	}

	else if($startup_stage === "Growth"){
		if($funding === "Angel"){
			$res += 60*140;
		}
		else if($funding === "Seed Investor"){
			$res += 60*200;
		}
	}



	//-------City--------

	if($city === "Bangalore"){
		$res += 1*100;
	}

	else if($city === "New Delhi"){
		$res += 1*84.6;
	}

	else if($city === "Mumbai"){
		$res += 1*64.6;
	}

	else if($city === "Hyderabad"){
		$res += 1*18.5;
	}

	else if($city === "Pune"){
		$res += 1*12.3;
	}

	else if($city === "Chennai"){
		$res += 1*12.3;
	}

	else if($city === "Ahmedabad"){
		$res += 1*6.2;
	}

	else if($city === "Kochi"){
		$res += 1*6.2;
	}

	else if($city === "Others"){
		$res += 1*3.1;
	}




	$res = $res/10000;




	if($industry === "Analytics"){
		$res = $res * 12.2357142857143;
	}

	else if($industry === "Consumer Internet"){
		$res = $res * 14.7626373626374 ;
	}

	else if($industry === "E-Commerce"){
		$res = $res * 15.7054945054945;
	}

	else if($industry === "Education"){
		$res = $res * 26.025974025974;
	}

	else if($industry === "Energy"){
		$res = $res * 5.14285714285714;
	}

	else if($industry === "Hardware"){
		$res = $res * 6.09142857142857;
	}

	else if($industry === "Mobile App"){
		$res = $res * 10.95;
	}

	else if($industry === "Healthcare"){
		$res = $res * 14.9009523809524;
	}

	else if($industry === "Payment"){
		$res = $res * 23.1428571428571;
	}

	else if($industry === "Service"){
		$res = $res * 44.5102040816327;
	}

	else if($industry === "Technology"){
		$res = $res * 34.9028571428571;
	}

	else if($industry === "Others"){
		$res = $res * 18.9428160584005;
	}
	//----end ifelse-----

	if($dedicated1 === "Others" && $dedicated2 === "Others" && $dedicated3 === "Others" && $dedicated4 === "Others"){

	}

	else{
		$res = $res + 0.30;
	}



?>


<html>
<head>
	<title></title>
	<meta name="description" content="The latest funny images, memes, GIFs, youtube videos from India and the world. Share your fun here.">
	<meta name="keywords" content="funny,youtube videos, gif, funny pics, images, lol, rofl, indian, bollywood memes, trolls, awesome, fun, cute, memeveme, hilarious">
	<meta property = "og:title" content="Startup Valuation"/>
	<meta property = "og:type" content="website"/>
	<meta property = "og:url" content="http://startupvaluation.co/evaluate.php"/>
	<meta property = "og:image" content="http://startupvaluation.co/invoice/resources/startup_valuation.png"/>
	<meta property = "og:description" content="My Pre money valuation is Rs <?php echo round($res,2); ?> Crore ."/>
	<meta property = "og:site_name" content="http://startupvaluation.co"/>
	<meta name="twitter:card" content="photo"/>
	<meta name="twitter:url" content="http://startupvaluation.co/evaluate.php"/>
	<meta name="twitter:title" content="Startup Valuation"/>
	<meta name="twitter:description" content="My Pre money valuation is Rs <?php echo round($res,2); ?> Crore ."/>
	<meta name="twitter:image" content="http://startupvaluation.co/invoice/resources/startup_valuation.png"/>
	<meta name="twitter:creator" value="Startup Valuation" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="text/javascript" src="jquery.js"></script>

	<link rel="stylesheet" type="text/css" href="style.css">
    <style type="text/css">

    *{
    	margin: 0 !important;
    	padding: 0 !important;
    }	

    html, body {
  width: 100% !important;
  height: 100% !important;
}
	
	#outer-wrapper{

		height: 100%;
	}

	.slides{

		display: block;
		height: 100%;
	}

	h1{
			font-size: 553% !important;

			margin-top: 4% !important;
		}

	p{

			font-size: 330% !important;
		}
		

		@media screen and (max-width: 700px ) {

		/*----------Anuj----------*/

		/*----------H1 tag styling for alll h1 tags----------*/
		#slide1 #content h1 {

			font-size: 477% !important;

			margin-top: 12% !important;
		}

		/*----------p tag styling for all p tags----------*/

		p{

			font-size: 350% !important;
		}
	}
			
	.kit_text{
		font-size: 220% !important;
		font-family: sans-serif !important;
	}
		
	.share{
		width: 100%;
		height: 5%;
	}

	.kit_text_spec{
		font-size: 100% !important;
		font-family: sans-serif !important;
	}

	.download{
		height: 7%;
		width: 20%;
		background-color: transparent;
		border:2px solid white;
		font-size: 150%;
		color: white;
		font-family: sans-serif;
		
	}

	.download:hover{
		background-color: white;
		color: #db2027;
		-webkit-transition: 1s;
		transition:1s;
	
	}

	
	
	</style>
	
	
    
</head>
<body>
<div id="outer-wrapper">

		<div id="top-bar">
			<div id="logo-container">
				<img src="resources/startup_valuation_logo.png">
			</div>
		</div>
		
		<div id="clear-fix"></div>


		
		<a name="slide1"></a>
		<section class="slides" id="slide1">		
			<aside class="adds" id="add1">
			</aside>

			<div id="content">
				<h1>Your Pre-Money Valuation is</h1>
				<br><br><br>
				<p>Rs <?php echo round($res,2); ?> Crores</p>
				<br><br>
				<div class="share">
				<center>	
					<h2 style="display:inline-block;">Share with your friends</h2>				
				    <a href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fstartupvaluation.co%2Fevaluate.php" target="_blank"><img style="width:14%; margin-left:5% !important;" class="facebook-share" src="resources/FB.png"></a>
					<a href="https://twitter.com/intent/tweet?url=http%3A%2F%2Fstartupvaluation.co%2Fevaluate.php&via=Memeveme" target="_blank"><img style="width:14%; margin-left:5% !important;" class="twitter-share" src="resources/twitter.png" ></a>
				</center>
				</div>
				<br>
				<br>
				<br>
				<center>
					<p class="kit_text">Want to get investors' confidence, be prepared with our startup kit.</p>
					<p class="kit_text_spec"><i>(Includes:Pitchdeck format, Financial(P&L), List of Investors with their contact, India Startup Funding Scenario & Various other Startup Tools)</i></p>
				</center>
				<br>
				<br>
				<center>
					<button type="button" class="download">Get Startup Kit</button>
				</center>
			</div>

			<aside class="adds" id="add2">
			</aside>
		</section>
	</div>	
</body>
</html>

<?php }



else{
 
 header('Location: index.php');
 exit();
}
 ?>
