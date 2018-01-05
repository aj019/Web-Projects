
<?php ob_start(); session_start();

$_SESSION['authstation'] = (isset($_SESSION['authstation']) ? $_SESSION['authstation'] : null);
if ( !isset($_SESSION['authstation']) ) {
	$_SESSION['authstation'] = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
}
	
	require_once '../init1.php';
	$search = $_REQUEST['search_bar'];

	if (substr($search, 0, 1) === '#') {

		$searchtagquery = $db->query( "SELECT articles.*
					     FROM articles 
					     INNER JOIN tag_used ON articles.article_id = tag_used.article_id 
					     WHERE tag LIKE '%".$search."%' 
					     GROUP BY articles.article_id " );
	
		while ($row= $searchtagquery->fetch_object()) {
	  		$articles[]= $row;
	  	}

	  	$search_count = $searchtagquery->num_rows;

	}

	else{

		$searchallquery = $db->query( "SELECT DISTINCT articles.*
					     FROM articles 
					     INNER JOIN tag_used ON articles.article_id = tag_used.article_id 
					     WHERE tag LIKE '%".$search."%' OR title LIKE '%".$search."%'
					     GROUP BY articles.article_id " );
	
		while ($row= $searchallquery->fetch_object()) {
	  		$articles[]= $row;
	  	}

	  	$search_count = $searchallquery->num_rows;

	}
	

	$trendingquery=$db->query("
		SELECT tag from `trending_tags` ORDER BY TRIM(current_score) DESC LIMIT 5
  	");

  while ($row3= $trendingquery->fetch_object()) {
  	
  	$trending[]= $row3;

  }  

  $notification=$db->query("
		SELECT * from `notification` WHERE uploader_id='".$_SESSION['userprofile']['id']."' AND status='1' ORDER BY TRIM(article_id) DESC LIMIT 5 
  	");

  while ($row4= $notification->fetch_object()) {
  	
  	$notifications[]= $row4;

  }  
  ?>

<!DOCTYPE html>
<html>
<head>
	<title>Memeveme | Search Results for “ “</title>
	<meta name="description" content="Laugh it off with the most trending collection of memes, images, GIFs and youtube videos on the web.">
	<meta name="keywords" content="funny, gif, funny pics, images, lol, happy, jokes, memes, trolls, awesome, fun, cute, memeveme, hilarious">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="text/javascript"></script>
	<link rel="shortcut icon" href="../resources/favicon.ico">
	<link href='http://fonts.googleapis.com/css?family=Droid+Serif' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Slabo+27px' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Lora' rel='stylesheet' type='text/css'>
	<script type="text/javascript" src="../jquery/jquery.js"></script>
	<script type="text/javascript" src="../jquery-1.2.6.pack.js"></script>

	
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
	<link rel="stylesheet" href="../search/jquery-ui-1.10.3.custom.min.css" />

	<link rel="stylesheet" type="text/css" href="../upload/upload.css">
  	<script type="text/javascript" src="../upload/upload.js"></script>
	<style type="text/css">
	
	body{

		background-color: #f6f5f6;
		font-family: Verdana,tahoma,Arial,sans-serif;
		font-size: 18px;
		overflow: auto;
		margin: 2px;
		z-index: 100;
		
	}

	  hr{

	  	background-color: #efefef;
		border: 0;
		margin: 0;
		height: 2px;
		clear: both;
	  }

	  ul{
	  	list-style: none;
	  }

	  #wrapper{
		width: 100%;
		background:  #f6f5f6;
		margin: -2px;
		}

     /*Top bar begins*/
     .menu-container{
			width: 100%;
			height: 50px;
			position: fixed;
			background-color: white;
			box-shadow: 0px 1px #BDC3C7;
		}

		.navigation-menu{
			width: 44.5%;
			height: 100%;
			display: inline-block;
		}

		.memeveme-logo-container{
			height: 100%;
			width: 10%;
			display: inline-block;
		}

		.memeveme-logo-container img{
		width: 50px;
		}


		.right-menu{
			display: inline-block;
			width: 44.5%;
			height: 100%;
			float: right;
		}



		/*Search Bar*/
		@import url(http://fonts.googleapis.com/css?family=Open+Sans:300);

		.search-bar-container{
			margin-top: 10px;
		  	width: 40%;
		    direction: rtl;
		    display: inline-block;

		}
		
		input#search_bar{
		    border: none; outline: none;
		   	font: 300 16px 'Open Sans', 'Helvetica Neue', Arial, sans-serif; 
		   	color: #666;
		    width: 30px;
		    border-radius: 55px;
		    margin: 0 auto;
		    font-size: 16px; color: #0d2840;
		    padding: 6px 24px 6px 6px;
		    transition: all .3s linear;
		    background: rgb(255, 255, 255) url(http://i.imgur.com/seveWIw.png) no-repeat center center;
		    direction: ltr;
		}
		
		input#search_bar:focus{
			width: 100%; 
			background-position: calc(100% - 15px) center;
			background-color:#f6f5f6;
		}

		  /*Removes default x in search fields*/
		input[type=search]::-webkit-search-cancel-button{
			-webkit-appearance: none;
		}
		  /*Changes the color of the placeholder*/
		::-webkit-input-placeholder{
			color: #0d2840; 
			opacity: .5;
		}
		::-moz-placeholder{
			color: #0d2840; 
			opacity: .5;
		}
		:-ms-input-placeholder{
			color: #0d2840; 
			opacity: .5;
		}




		/*right menu*/
		.right-menu-buttons{
			width: 55%;
			height: 100%;
			float: right;
		}

		.right-menu-buttons button{
			width: 33%;
			height: 30px;
			margin-top: 10px;
			border-radius: 55px;
			margin-right: 7%;
		   	font: 300 16px 'Open Sans', 'Helvetica Neue', Arial, sans-serif; 
		   	cursor: pointer;
		   	float: right;
		}

		.right-menu-buttons button:focus{
			outline: none;
		}

		.upload-right-menu-button{
			color: #3a7aa7;
			border: 2px solid #3a7aa7;
			background: transparent;
			width: 30% !important;
		}

		.upload-right-menu-button:hover{
			background-color: #3a7aa7;
			color:white;
		}


		/*---------Drop down menu------------*/
   	 @import url(http://fonts.googleapis.com/css?family=Ubuntu:300,500);

		
		.nav-bar {
		  	list-style: none;
		  	font-size: 20px;
			font-family: 'Ubuntu', sans-serif !important;
		  	font-weight: 300;
		  	margin: 0;
		  	height: 100%;
		}

		.nav-bar li {
			float: left; 
			position: relative; 
			height: 20px;
			padding-left: 6%;
			padding-right: 6%;
			padding-top: 15px;
			padding-bottom: 15px;
		}

		.nav-bar li a {
		  display: block;
		  text-decoration: none; 		  
		  color: #354147;
		}

		.nav-bar:hover li a {
		  opacity: .5;
		}

		.nav-bar li:hover a {
		  opacity: 1;
		}

		.nav-bar-submenu {
		  position: absolute;
		  display: none;
		  left: 0px;
		  padding-left: 0px;
		  margin-top: 12px;
		  width: 170px;
		  background-color: white;	
		}

		/*border-top: 15px solid transparent;*/

		.nav-bar li:hover > .nav-bar-submenu {
			display: block;
		}

		.has-submenu:after {
		   	position: relative;
		   	content: "";
		   	top: 15px;
		   	margin: 0 -5px 4px 5px;
		   	/* borders to make down arrow */
			border-left: 7px solid transparent;
			border-right: 7px solid transparent;
			border-top: 7px solid #89C4F4;
		   	opacity: .7;
		}

		
		.nav-bar > li:hover .has-submenu:after {
		  opacity: 1;
		} 

		

		.nav-bar-submenu li {
		  width: 150px;
		}

		
		.nav-bar > li:hover  {
		  background: #f6f5f6;
		} 

		
		.nav-bar-submenu a {
		  font-size: 85%; 
		  margin: 0px; 
		}

		
		.nav-bar-submenu li:hover {
		  background: #89C4F4;
		}


		/*connect popup*/

		#light{
	        display: none;
	        position: absolute;
	        top: 15%;
	        left: 37.5%;
	        width: 23%;
	        height: 400px;
	        background-color: #fff;
	        background-size: 100% 100%;
	        z-index:1002;
	        border-radius: 10px;
	        overflow:visible;
  	  }

	    #fade{
	        display: none;
	        position: fixed;
	        top: 0%;
	        left: 0%;
	        width: 100%;
	        height: 100%;
	        background-color: #404040;
	        z-index:1001;
	        -moz-opacity: 0.7;
	        opacity:.70;
	        filter: alpha(opacity=70);

	        -webkit-filter: blur(100%);
	        -moz-filter: blur(100%);
	        -o-filter: blur(100%);
	        -ms-filter: blur(100%);
	        filter: blur(100%);
	    }


	    .ribbon{
	      width: 100%;
	      height: 10px;
	      background-image: -webkit-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
	      background-image: -moz-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
	      background-image: -o-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
	      background-image: linear-gradient(to right, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);

	      border-top-right-radius: 10px;
	      border-top-left-radius: 10px;
	    }

	    .top-connect{
	      height: 20%;
	      width: 100%;
	     
	      background: #f7f7f7;
	      font-family: 'Raleway', sans-serif;
	      font-size: 30px; 
	      color: #aaa;
	    }


	    .top-connect p {
	      text-align: center;
	      padding-top: 20px;
	      margin: 18px;
	    }

	    .bottom-connect{
	      height: 78%;
	      width: 100%;
	    }


	    .connect-button{
	      border-radius: 5px;
	      border: 0;
	      height: 45px;
	      width: 90%;
	      cursor: pointer;
	      margin-bottom: 35px;    
	    }

	    .connect-button:focus{
	      outline: 0;
	    }

	    #fb{
	      background-color: #3b5998;
	      box-shadow: 0 5px 0 #4B77BE;
	      transition: all .1s linear;
	      margin-top: 35px;
	    }

	    #fb:active{
	        box-shadow: 0 2px 0 #4B77BE;
	          transform: translateY(3px);
	      }

	    #twitter{
	      background-color: #9AE4E8;
	      box-shadow: 0 5px 0 #b5ecf7;
	      transition: all .1s linear;
	    }

	    #twitter:active{
	      box-shadow: 0 2px 0 #b5ecf7;
	        transform: translateY(3px);
	    }


	    #gplus{
	      background-color: #d34836;
	      box-shadow: 0 5px 0 #ef7775;
	      transition: all .1s linear;
	    }

	    #gplus:active{
	      box-shadow: 0 2px 0 #ef7775;
	        transform: translateY(3px);
	    }

	    .connect-button-img{
	      height: 90%;
	    }

    /*connect popup*/
    /*notification and profile pic icon */
    	 #notification{
	    	height: 100%;
	    	display: inline-block;
	    	margin-right: 5%;
	    	margin-left: 5%;
	    }

	    #notification img{
	    	height: 34px;
	    	margin-top: 9px;
	    }

	    .user-profile-icon{
	    	height: 100%;
	    	width: 40px;
	    	display: inline-block;
	    	margin-right: 5%;
	    	margin-left: 5%;
	    }

	    .user-profile-icon img{
	    	height: 34px;
	    	margin-top: 9px;
	    	background-color: #f6f5f6;
	    	border-radius: 55px;
	    }


	    #user-profile-icon-nav{
	      list-style: none;
	    }
	    
	    #user-profile-icon-nav ul.user-profile-icon-sub-nav {
	      display: none;
	      list-style: none;
	    }

	    #user-profile-icon-nav ul.visible {
	      display: block;
	    }

	    #click-nav {
		    display:inline-block;
		    text-align:left;
		    list-style-type:none;
		    padding-left: 0px;
		   	font-family: 'Ubuntu', sans-serif !important;

		    margin-top: 7px;
		}
		#click-nav > li {
		    float:left;
		    padding:0;
		    position:relative;
		}
		#click-nav > li > a {
		    border:1px solid transparent;
		    color:#4F4F4F;
		    display:block;
		    font-size:90%;
		    padding:3px 10px;
		    position:relative;
		    text-decoration:none;
		}
	/*	#click-nav > li > a:hover {
		    background-color:#e4ecf4;
		    border-color:#999
		}*/
		#click-nav > li.selected  > a {
		    background-color:#FFFFFF;
		    border-color:#999999 #999999 #FFFFFF;
		    z-index:2;
		}
		#click-nav li div {
		    position:relative;
		}
		#click-nav li div div {
		    background-color:#FFFFFF;
		    border:1px solid #999999;
		    padding-top:12px;
		    display:none;
		    font-size:0.90em;
		    margin:0;
		    position:absolute;
		    top:-1px;
		    z-index:1;
		    width:190px;
		}

		#click-nav li div ul {
		    padding-left:0px;
		    padding-right:0px;
		    position:relative;
		    width:190px;
		    float:left;
		    list-style-type:none;
		}
		#click-nav li div ul li {
		    margin:0;
		    padding:10px;
		}

		#click-nav li ul ul {
		}
		#click-nav li ul ul li {
		    margin:0;
		    padding:0;
		}
		#click-nav li ul ul li a {
		    color:#354147;
		    display:block;
		    padding:10px 5px;
		    text-decoration:none;
		    font-size:1em;
		}
		#click-nav li ul ul li a:hover{
		    background-color:#89C4F4;
		    color:#354147;
		}

		.user-profile-icon {
			height: 30px;
			width: 30px;
			margin: 0;

		}

		.user-notification-icon{
			height: 30px;
		}

		.upload-button{
			display: none;
		}

		/* ------------------------*/



/*   Left col begins  */

     .left-col{

		    	
		  width: 14%;
		  float: left;
		  position:fixed;
		  z-index: 0;
		  margin-top: 120px;
		  text-align: center;
		  background-color: white;
		  margin-left: 5%;

}

    .left-col #trending{

    	width: 100.5%;
		height: 15%;
		background-color: rgb(246, 245, 246);
  		margin-top: -34px;
}


	.left-col #trending h4{
	  font-size: 16px;
	  color: rgb(123, 129, 127);
	  text-align: left;
	  margin-left: 20px;
	}

	.left-col img{

		  float: left;
  		width: 11%;
	}	

	.left-col ul{
	
		  width: 100%;
		  list-style: none;
		  font-size: 16px;
		  text-align: left;
		  margin-left: -40px;
	}

	.left-col ul li {

		padding: 5% 5%;
 	    margin-left: 16px;

	}
	

	.left-col ul li a{

		text-decoration: none;
		color: rgb(118, 128, 125);
	}
		}
		
	}

	.left-col ul li a:hover{

	}	

	/*   Left col ends  */
	/*   search results start  */	
		.search{

			  width: 691px;
			  height: 53px;
			  border-bottom: 1px solid rgb(161, 154, 154);
			  margin-left: 60px;

		}

		#results-for{
			font-family: Ã¢â‚¬ËœMetrophobicÃ¢â‚¬â„¢, Arial, serif;
			color: rgb(102, 101, 113);
			float: left;
			padding: 10px;
			font-size: 25px;
			font-weight: 400;
	
		}

		#searched{

		font-size: 23px;
		float: left;
		color: rgb(102, 101, 113);
		font-family: 'Lato', sans-serif;
		padding: 9px;
		margin-top: 9px;
		}
	/*   search result ends  */
	
	/*   right col starts  */
    


    .right-col{

		width: 65%;
		float: right;
		margin-right: 15%;
		margin-top: 67px;
		text-align: center;
	}

	.right-col #container{
		width: 90%;
		float: right;
		
		}

	#segment{

		padding: 10px;
		width: 64%;
		height: 567px;
		margin-top: 32px;
		background-color: white;
		border-radius: 8px;
		border: 1px solid rgb(218, 214, 214);
		}


		/* Uploader Starts*/


  		#uploader{

  			height: 7%;
  		}

  		#uploader img{
  			float: left;
			width: 32px;
			border-radius: 50%;
  		}

  		#uploader p{
  			float: left;
			padding: 7px;
			font-size: 15px;
			margin-top: 0;	
			margin-left: 15px;
  		}
  		/* Uploader Ends*/

  		h1 {
	
		font-weight: 400;
		font-size: 26px;
		margin-top: 6px;
		word-wrap: break-word;
	  }

	  h1 a {
	  	text-decoration: none;
	  	color: black;
	  }
	  
  		#meme {

		 height: 358px;
		margin-left: -10px;
		max-width: 104%;
	 		}

   .upvote-downvote{

   	height: 42px;
   }

	 .upvotes{
	float: left;
	margin-left: 20px;
	margin-top: 12px;
	font-family: 'Lora', serif;
	font-weight: 400;
	padding: 0px;
	padding-right: 6px;
	font-size: 13px;
	color: rgb(178, 178, 178);
} 

	 .up{
	height: 20px;
	float: left;
	display: inline-block;
	padding: 10px;
	margin-left: -7px;
	
	
	 }

	 .down{

	 	height: 20px;
		float: left;
		display: inline-block;
		padding: 10px;
		margin-left: -7px;
	
	 }

	 

   .facebook-share{
   	height:18px;
   	padding: 10px;
   	
   }

   .twitter-share{
   	width:21px;
   	padding: 10px;
   
   }

   .google-share{
   	width:16px;
   	padding: 10px;
   	
   }

     .report{

   	float: right;
	height: 39px;
	margin-left: 10px;
   }


   .report_popup{
  		  position: absolute;
		  top: 25%;
		  left: 37.5%;
		  width: 327px;
		  height: 345px;
		  background-color: #fff;
		  background-size: 100% 100%;
		  z-index: 1002;
		  border-radius: 10px;
		  overflow: visible;
		  display: none;
}

	.report_popup ul{
	
		  width: 100%;
		  list-style: none;
		  font-size: 16px;
		  text-align: left;
		  margin-left: -40px;
	}

	.report_popup ul li {

		padding: 5% 5%;
 	    margin-left: 16px;

	}
	

	.report_popup ul li a{

		text-decoration: none;
		color: rgb(118, 128, 125);
	}
	

	.report_popup ul li a:hover{

	}

	.report-fade{
	        display: none;
	        position: fixed;
	        top: 0%;
	        left: 0%;
	        width: 100%;
	        height: 100%;
	        background-color: #404040;
	        z-index:1001;
	        -moz-opacity: 0.7;
	        opacity:.70;
	        filter: alpha(opacity=70);

	        -webkit-filter: blur(100%);
	        -moz-filter: blur(100%);
	        -o-filter: blur(100%);
	        -ms-filter: blur(100%);
	        filter: blur(100%);
	    }

   .tags{
		
			margin-left: 10%;
			
		}

		.tags table{
			width: 60%;
			text-align: center;
			padding: 1.5%;

		}

		.tags table a{
			text-decoration: none;
			color: rgb(15, 182, 176);
			font-size: 20px;	
		    padding-right: 28px;
		}

		@media(max-width: 600px){   /*                       Media Queries                               */

 		.menu-container{

 			width: 100%;
 		}

 		.right-col{

 			  width: 100%;
			  margin-left: 3px;
			  float: left;
			  display: block;
 		}

	 	.right-col #container{

 			width: 100%;
 		}

 		 #faq-result{

 			width: 100%;
 		}



 		 #segment{

 			width: 100%;
 		}

 		.left-col{

 			display: none;
 			margin-right: 0;
 		}

 		.sidebar{
 			display: none;
 		}

 		.navigation-menu{
 			float:left;
 			width: 35%;
 		}
 		.nav-bar li{
 			
 			width: 88%;
 			display: none;
 			background-color: white;
 		}
 		.nav-bar-submenu{
 			width:100%;

 		}

 		.nav-button{

 			  display: block;
			  text-align: left;
			  color: black;
			  font-size: 20px;
			  margin-left: 10px;
			  margin-top: 10px;
			  height: 39px;
			  background: url('../resources/menu.png');
			  background-repeat: no-repeat;
			  background-size: 27px;
 		}

 		.nav-button:before{

 			
 		}

 		.right-menu{

 			width: 50%;
 		}
 		.right-menu-buttons{
			width: 90%;
			height: 100%;
			
		}

		.right-menu-buttons button{
			
			
		  border-radius: 55px;
		  width: 72px;
		  margin-left: 10px;
		  font: 300 16px 'Open Sans', 'Helvetica Neue', Arial, sans-serif;
		  cursor: pointer;
		  float: right;
		  margin-top: -6px;
		}

		.right-menu-buttons button:focus{
			outline: none;
		}

		.search-bar-container{
			display: none;
		}

		#click-nav{

			display: block;
		}

		#click-nav > li > a {
		  border: 1px solid transparent;
		  color: #4F4F4F;
		  display: block;
		  font-size: 90%;
		  padding: 3px 7px;
		  position: relative;
		  text-decoration: none;
		}
		.user-notification-icon{
			margin-left: 10px;
		}
		
		.upload-right-menu-button{
			display:none;
		}

		.upload-button{
			display: block;
			float: right;
	      width: 22%;
	      cursor: pointer;
	      margin-bottom: 35px; 
		}

		.upload-button img{
		  width: 15px;
		  border: 1px solid blue;
		  padding: 3px;
		  border-radius: 50px;
		  margin-top: -6px;
		}

		.search{
			width: 100%;
		}

		#results-for{

 		font-size: 20px;
 	}

 	#searched{
 		font-size: 20px;
 	}

 	} 	

 	@media screen and (max-width: 600px){   /*                       Media Queries                               */

 		.menu-container{

 			width: 100%;
 		}

 		.right-col{

 			  width: 93%;
			  margin-left: 3px;
			  float: left;
			  display: block;
 		}

 		#container{

 			width: 100%;
 		}

 		 #faq-result{

 			width: 100%;
 		}



 		 #segment{

 			width: 100%;
 		}

 		.left-col{

 			display: none;
 			margin-right: 0;
 		}

 		.sidebar{
 			display: none;
 		}

 		.navigation-menu{
 			float:left;
 			width: 35%;
 		}
 		.nav-bar li{
 			
 			width: 88%;
 			display: none;
 			background-color: white;
 		}
 		.nav-bar-submenu{
 			width:100%;

 		}

 		.nav-button{

 			  display: block;
			  text-align: left;
			  color: black;
			  font-size: 20px;
			  margin-left: 10px;
			  margin-top: 10px;
			  height: 39px;
			  background: url('resources/menu.png');
			  background-repeat: no-repeat;
			  background-size: 27px;
 		}

 		.nav-button:before{

 			
 		}

 		.right-menu{

 			width: 50%;
 		}
 		.right-menu-buttons{
			width: 88%;
			height: 100%;
			
		}

		.right-menu-buttons button{
			
			
		  border-radius: 55px;
		  width: 72px;
		  margin-left: 10px;
		  font: 300 13px 'Open Sans', 'Helvetica Neue', Arial, sans-serif;
		  cursor: pointer;
		  float: right;
		  margin-top: -6px;
		}

		.right-menu-buttons button:focus{
			outline: none;
		}

		.search-bar-container{
			display: none;
		}

		#click-nav{

			display: block;
		}
		.user-notification-icon{
			margin-left: 10px;
		}
		
		.upload-right-menu-button{
			display:none;
		}

		.upload-button{
			display: block;
			float: right;
	      width: 22%;
	      cursor: pointer;
	      margin-bottom: 35px; 
		}

		.upload-button img{
		  width: 15px;
		  border: 1px solid blue;
		  padding: 3px;
		  border-radius: 50px;
		  margin-top: -6px;
		}

		.tags{
			margin-left: 4%;
		}

		.tags table a{
			font-size: 17px;
			padding-right: 10px;
		}

		.search{

			width: 100%;
			margin-left: 10px;
		}

		#results-for{

 		font-size: 20px;
 	}

 	#searched{
 		font-size: 20px;
 	}
 	} 	


 	@media screen and (min-width:600px ) and (max-width: 1000px ) {

 	.sidebar{

 		display: none;

 	}

 	.left-col{

 		width:20%;
 	}

 	.right-col{

 		width: 50%;
 	}

 	.right-col #container{

 		width: 96%;
 	}

 	#segment{

 		width: 100%;
 	}

 	.nav-bar{

 		font-size: 15px;
 	}

 	.nav-bar li{

 		padding-left:3%; 
 	}

 	.navigation-menu{

 		width: 51.5%;
 	}
 	
 	.right-menu{

 		width: 36.5%;
 	}

 	.search-bar-container{

 		width:36%;
 	}

 	.right-menu-buttons{
 		width: 62%;
 	}

 	.upload-right-menu-button{
			display:none;
		}

		.upload-button{
			display: block;
			float: right;
	      width: 22%;
	      cursor: pointer;
	      margin-top: 12px; 
		}

		.upload-button img{
		  width: 15px;
		  border: 1px solid blue;
		  padding: 3px;
		  border-radius: 50px;
		  margin-top: 0px;
		}

		.search{

			width: 80%;
		}

 }
		
	</style>
</head>

<body>
<?php
if ( isset($_SESSION["userprofile"]) ) {
?>
<div id="wrapper">

	<div class="menu-container">
			<div class="navigation-menu">
				<nav role="navigation">
					
					<span class="nav-button"></span>

					<ul class="nav-bar" style="padding-left:5%;">
		                <li><a href="../pages/top1.php">Top</a></li>
		                <li><a href="../pages/popular1.php">Popular</a></li>
		              	<li><a href="../index1.php">New</a></li>
		                <li><a href="" class="has-submenu">More</a>
                  <ul class="nav-bar-submenu">
                      <center>
                        <li><a href="../pages/memes1.php">Memes</a></li>
                        <li><a href="../pages/gif1.php">Gif</a></li>
                        <li><a href="../pages/videos1.php">Videos</a></li>
                        <li><a href="../pages/nsfw1.php">NSFW</a></li>
                      </center>
                  </ul>
                </li>  
            </ul>

				</nav>	
			</div>
			
			<div class="memeveme-logo-container">
				<center>	
					<img src="../resources/memeveme_logo.png">
				</center>
			</div>

			<div class="right-menu">
					<div class="search-bar-container">
						<form method="GET" action="index_searchresults1.php" style="margin:0;"> 
	  						<input id="search_bar" name="search_bar" type="search" placeholder="Search Memeveme">
						</form>
					</div>
				
				<div class="right-menu-buttons">
					<ul id="click-nav">
		                <li><a href="javascript:void(0);"><img class="user-notification-icon" src = "../resources/memeveme_notification_bell.png"></a>
		                    <div class="subs">
		                        <div>
		                               <ul>

		                            		<?php 
		                            		if(!empty($notifications)){
				       							foreach ($notifications as $notifications):
				       							$articlesquery2=
				       								"SELECT *
												     FROM login
												     WHERE user_id='$notifications->user_id'";

												$result = mysqli_query($db, $articlesquery2);
												$row2 = mysqli_fetch_assoc($result);
											?>

											<li><?php echo $row2['username'] ?> upvoted your post</li>
											<hr>
											<?php endforeach; } else {?>
											<li>No New Notifications</li>
											<?php }?>

		                            	</ul>
		                        </div>
		                    </div>
		                </li>
		                	<?php 
		                	$articlesquery2="

												    SELECT *
												     FROM login
												     WHERE user_id= '".$_SESSION['userprofile']['id']."'
												     
												  	";

												  $result = mysqli_query($db, $articlesquery2);
													$row2 = mysqli_fetch_assoc($result);
					 
												?>
		                <li><a href="javascript:void(0);"><img class="user-profile-icon" src="<?php echo $row2['profile_pic_url'];?>"></a>
		                    <div class="subs">
		                        <div class="wrp2">
		                            <ul>
		                                    <ul>
		                                        <li><a href="../profile/profile1.php?id=<?php echo $_SESSION['userprofile']['id'] ?>" target="_blank">Profile</a></li>
		                                        <li><a href="../auth/auth/logout.php">Log out</a></li>
		                                    </ul>
		                            </ul>
		                        </div>
		                    </div>
		                </li>
	            	</ul>
	            	<a><span class="upload-button" onClick="uploadbox_open()"><img src="../resources/upload.png"></span></a>
		          	<a><button class="upload-right-menu-button" onClick="uploadbox_open()">Upload</button></a>
				</div>
			</div>
		</div>

		<div id="upload_popup">
			<div class="tabs">
		    <ul class="tab-links">
		        <li class="active"><a href="#tab1">Memes</a></li>
		        <li><a href="#tab2">Videos</a></li>

		    </ul>

		    <div class="tab-content">
		    <div id="tab1" class="tab active">
		            <form action="upload-image.php" method="post" enctype="multipart/form-data" autocomplete="off">
		                <p>
		                <input type="file" name="meme" class="meme-upload" required>
		                <br>
		                <br>
		                <input type="text" name="title" class="title" placeholder="Title" required>
		                <br>
		                <br>
		                <table class="tag-table"> 
		                <tr>
		                    <center>
		                    <td>#<input type="text" name="tag1" class="tags" placeholder = "Tag 1" required></td>
		                    <td>#<input type="text" name="tag2" class="tags" placeholder = "Tag 2"></td>
		                    <td>#<input type="text" name="tag3" class="tags" placeholder = "Tag 3"></td>
		                    </center>
		                </tr>
		                </table>
		                <br>
		                <input type="text" name="credit" class="credit" placeholder="Credit Original Uploader">
		                <br>
		                <br>
		                <input type="checkbox" name="nsfw" id="nsfw" value="1"><label for="nsfw">NSFW</label>
		                <br>
		                <br>
		                <center>
		                <input type="submit" name="submit" class="submit-content" value="Submit">
		                </center>
		                </p>
		            </form>
		        </div>
		        <div id="tab2" class="tab">
		            <p>
		                <form action="upload-video.php" method="POST" enctype="multipart/form-data" autocomplete="off">
		                <p>
		                <input type="text" name="video_url" placeholder="Youtube URL" class="video-url" required>
		                <br>
		                <br>
		                <input type="text" name="title" class="title" placeholder="Title" required>
		                <br>
		                <br>
		                <table class="tag-table"> 
		                <tr>
		                    <center>
		                    <td># <input type="text" name="tag1" class="tags" placeholder = "Tag 1" required></td>
		                    <td># <input type="text" name="tag2" class="tags" placeholder = "Tag 2 "></td>
		                    <td># <input type="text" name="tag3" class="tags" placeholder = "Tag 3"></td>
		                    </center>
		                </tr>
		                </table>
		                <br>
		                <input type="text" name="credit" class="credit" placeholder="Credit Original Uploader">
		                <br>
		                <br>
		                <input type="checkbox" name="nsfw" id="nsfw" value="1"><label for="nsfw">NSFW</label>
		                <br>
		                <br>
		                <center>
		                <input type="submit" name="submit" class="submit-content" value="Submit">
		                </center>
		                </p>
		            </form>
		            </p>
		        </div>
		 
		    </div>
			</div>
		</div> <!--upload popup ends-->

		<div id="upload_background" onClick="uploadbox_close();"></div>

	  <div class="clear-fix"></div>	
	     <div class="left-col">
			  <div id="trending">
				  <img src="../resources/trending.png" style="float:left">
				  <h4 >Trending Tags</h4>
			 </div>
					<ul>
					<?php 
				        foreach ($trending as $trending): 
					?>
					<li><a href="index_searchresults1.php?search_bar=%23<?php $tag_w_hash = str_replace('#', '' , $trending->tag); echo $tag_w_hash; ?>">
						<?php echo $trending->tag;?> </a></li>
					<?php endforeach;?>
					</ul>
			
		</div>		
	<div class ="right-col">
		<div class="search">
	      	 <h1 id="results-for">Results For : </h1>
	      	 <p id="searched"><?php echo $search; ?></p>
	      </div>

		<div id="container">
		 
			<?php 
			if($search_count !== 0){

	        foreach ($articles as $articles): 
	        	if($articles->mv==1) {?>
	        		
				<div id="segment">
					<div id="uploader">
					<?php
					$articlesquery1="

					    SELECT login.*
					     FROM login 
					     INNER JOIN articles ON login.user_id=articles.user_id 
					     WHERE articles.article_id=$articles->article_id
					     GROUP BY login.user_id
					  	
					  	";

					  $result = mysqli_query($db, $articlesquery1);
						$row2 = mysqli_fetch_assoc($result);
						
						?>
						<a href="../profile/profile1.php?id=<?php echo $row2['user_id'] ?>"><img  src="<?php echo $row2['profile_pic_url'] ?>"></a>
						<a href="../profile/profile1.php?id=<?php echo $row2['user_id'] ?>"><p ><?php echo $row2['username'] ?></p></a>
									
					</div>	<hr>
					<div class="clear-fix"></div>
						<h1><a href="../post1.php?id=<?php echo $articles->article_id ?>" target ="_blank"><?php echo $articles->title ?></a></h1>
						
						<a href="../post1.php?id=<?php echo $articles->article_id ?>" target ="_blank"><img type="submit" src='<?php echo "../upload/" .$articles->url?>' id="meme"></a>
						 <div class="clear-fix"></div>
						 <div class="tags">
						  <table>
						    <tr>
						  	 <td><a href="index_searchresults1.php?search_bar=%23<?php $tag_w_hash = str_replace('#', '' , $articles->tag1); echo $tag_w_hash; ?>">
						  	 	<?php echo $articles->tag1 ?></a></td>
						  	 <td><a href="index_searchresults1.php?search_bar=%23<?php $tag_w_hash = str_replace('#', '' , $articles->tag2); echo $tag_w_hash; ?>">
						  	 	<?php echo $articles->tag2 ?></a></td>
						  	 <td><a href="index_searchresults1.php?search_bar=%23<?php $tag_w_hash = str_replace('#', '' , $articles->tag3); echo $tag_w_hash; ?>">
						  	 	<?php echo $articles->tag3 ?></a></td>
						    </tr>
						  </table>
						 </div>

						 <div class="clear-fix"></div>

						 <hr>
						 <div class="upvote-downvote">
						 <?php
					          $articlesquery1="

					              SELECT *
					               FROM votes
					               WHERE article_id='$articles->article_id' AND user_id= '".$_SESSION['userprofile']['id']."'
					              
					              ";

					            $result = mysqli_query($db, $articlesquery1);
					            $row1 = mysqli_fetch_assoc($result);
					            
					       ?>

					       <?php if($articles->user_id==$_SESSION['userprofile']['id']){ ?>
						 <p  class="upvotes" id="upvotes<?php echo $articles->article_id ?>"><?php echo $articles->total_upvotes?></p>
						 <img class="up"   id="up<?php echo $articles->article_id ?>" src="../resources/up3.png">
						<img  class="down"   id="down<?php echo $articles->article_id ?>" src="../resources/down.png">
							<?php } else {?>
						<p  class="upvotes" id="upvotes<?php echo $articles->article_id ?>"><?php echo $articles->total_upvotes?></p>
						 <img class="up" onclick="upvotes(<?php echo $articles->article_id ?>)"  id="up<?php echo $articles->article_id ?>" src="../resources/up<?php echo $row1['status']; ?>.png">
						<img  class="down" onclick="downvotes(<?php echo $articles->article_id ?>)"  id="down<?php echo $articles->article_id ?>" src="../resources/down<?php echo $row1['status']; ?>.png">	
						<?php }?>
						<div id="report<?php echo $articles->article_id ?>" class="report_popup">
							<form method="post" action="report/report.php">
								<ul>
									<li><input type="radio" name="comment" value="nudity">Nudity</li>
									<li><input type="radio" name="comment" value="copyright">Copyright Content</li>
									<li><input type="radio" name="comment" value="nsfw">Nsfw</li>
									<li><input type="radio" name="comment" value="notfunny">Not Funny</li>
									<input type="hidden" name="article_id" value="<?php echo $articles->article_id ?>">
									<li><input type="submit" name="submit" value="Report"></li>
								</ul>
							</form>	
						</div>
						<div id="report-fade<?php echo $articles->article_id ?>" class="report-fade" onClick="report_close(<?php echo $articles->article_id ?>);"></div>
						<img style="float:right;" class="report" onClick='report_open(<?php echo $articles->article_id ?>);' src="../resources/report.png">
						<a href="https://plus.google.com/share?url=http%3A%2F%2Fmemeveme.com%2Fpost.php%3Fid%3D$articles->article_id" target="_blank"><img style="float:right;" class="google-share" src="../resources/g1.png"></a>
						<a href="https://twitter.com/intent/tweet?url=http%3A%2F%2Fmemeveme.com%2Fpost.php%3Fid%3D$articles->article_id&text=$articles->title&via=Memeveme" target="_blank"><img style="float:right;" class="twitter-share" src="../resources/t1.png"></a>
						<a href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fmemeveme.com%2Fpost.php%3Fid%3D$articles->article_id" target="_blank"><img style="float:right;" class="facebook-share" src="../resources/f1.png"></a>
					
						</div>
						<hr>
						
						 <div class="clear-fix"></div>
				
				</div>

				<?php } else{ ?>

					<div id="segment">
					<div id="uploader">
					<?php
					$articlesquery1="

					    SELECT login.*
					     FROM login 
					     INNER JOIN articles ON login.user_id=articles.user_id 
					     WHERE articles.article_id=$articles->article_id
					     GROUP BY login.user_id
					  	
					  	";

					  $result = mysqli_query($db, $articlesquery1);
						$row2 = mysqli_fetch_assoc($result);
						
						?>
						<a href="../profile/profile1.php?id=<?php echo $row2['user_id'] ?>"><img  src="<?php echo $row2['profile_pic_url'] ?>"></a>
						<a href="../profile/profile1.php?id=<?php echo $row2['user_id'] ?>"><p ><?php echo $row2['username'] ?></p></a>
					</div>	<hr>
					<div class="clear-fix"></div>
						<h1><a href="../post1.php?id=<?php echo $articles->article_id ?>" target ="_blank"><?php echo $articles->title ?></a></h1>
						
						<?php

							$url = $articles->url;

							preg_match('/[\\?\\&]v=([^\\?\\&]+)/',$url,$matches);

							$id = $matches[1];

							echo '<div class="youtube-article"><iframe class="dt-youtube" width="100%" height="358" src="//www.youtube.com/embed/'.$id
							.'" frameborder="0" allowfullscreen></iframe></div>';

							?>

						 <div class="clear-fix"></div>
						 <div class="tags">
						  <table>
						    <tr>
						  	 <td><a href="index_searchresults1.php?search_bar=%23<?php $tag_w_hash = str_replace('#', '' , $articles->tag1); echo $tag_w_hash; ?>">
						  	 	<?php echo $articles->tag1 ?></a></td>
						  	 <td><a href="index_searchresults1.php?search_bar=%23<?php $tag_w_hash = str_replace('#', '' , $articles->tag2); echo $tag_w_hash; ?>">
						  	 	<?php echo $articles->tag2 ?></a></td>
						  	 <td><a href="index_searchresults1.php?search_bar=%23<?php $tag_w_hash = str_replace('#', '' , $articles->tag3); echo $tag_w_hash; ?>">
						  	 	<?php echo $articles->tag3 ?></a></td>
						    </tr>
						  </table>
						 </div>

						 <div class="clear-fix"></div>

						 <hr>
						 <div class="upvote-downvote">
						 <?php
					          $articlesquery1="

					              SELECT *
					               FROM votes
					               WHERE article_id='$articles->article_id' AND user_id= '".$_SESSION['userprofile']['id']."'
					              
					              ";

					            $result = mysqli_query($db, $articlesquery1);
					            $row1 = mysqli_fetch_assoc($result);
					            
					       ?>
						
						 <?php if($articles->user_id==$_SESSION['userprofile']['id']){ ?>
						 <p  class="upvotes" id="upvotes<?php echo $articles->article_id ?>"><?php echo $articles->total_upvotes?></p>
						 <img class="up"   id="up<?php echo $articles->article_id ?>" src="../resources/up3.png">
						<img  class="down"   id="down<?php echo $articles->article_id ?>" src="../resources/down1.png">
							<?php } else {?>
						<p  class="upvotes" id="upvotes<?php echo $articles->article_id ?>"><?php echo $articles->total_upvotes?></p>
						 <img class="up" onclick="upvotes(<?php echo $articles->article_id ?>)"  id="up<?php echo $articles->article_id ?>" src="../resources/up<?php echo $row1['status']; ?>.png">
						<img  class="down" onclick="downvotes(<?php echo $articles->article_id ?>)"  id="down<?php echo $articles->article_id ?>" src="../resources/down<?php echo $row1['status']; ?>.png">	
						<?php }?>

							<div id="report<?php echo $articles->article_id ?>" class="report_popup">
							<form method="post" action="../report/report.php">
								<ul>
									<li><input type="radio" name="comment" value="nudity">Nudity</li>
									<li><input type="radio" name="comment" value="copyright">Copyright Content</li>
									<li><input type="radio" name="comment" value="nsfw">Nsfw</li>
									<li><input type="radio" name="comment" value="notfunny">Not Funny</li>
									<input type="hidden" name="article_id" value="<?php echo $articles->article_id ?>">
									<li><input type="submit" name="submit" value="Report"></li>
								</ul>
							</form>	
						</div>
						<div id="report-fade<?php echo $articles->article_id ?>" class="report-fade" onClick="report_close(<?php echo $articles->article_id ?>);"></div>
						<img style="float:right;" class="report" onClick='report_open(<?php echo $articles->article_id ?>);' src="../resources/report.png">		
						<a href="https://plus.google.com/share?url=http%3A%2F%2Fmemeveme.com%2Fpost.php%3Fid%3D$articles->article_id" target="_blank"><img style="float:right;" class="google-share" src="../resources/g1.png"></a>
						<a href="https://twitter.com/intent/tweet?url=http%3A%2F%2Fmemeveme.com%2Fpost.php%3Fid%3D$articles->article_id&text=$articles->title&via=Memeveme" target="_blank"><img style="float:right;" class="twitter-share" src="../resources/t1.png"></a>
						<a href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fmemeveme.com%2Fpost.php%3Fid%3D$articles->article_id" target="_blank"><img style="float:right;" class="facebook-share" src="../resources/f1.png"></a>
					
						</div>
						<hr>
						
						 <div class="clear-fix"></div>
				
				</div>



			<?php } endforeach; }?>
			<br>
			<?php
			if($search_count!==0)
				echo "<p id='searched'>THATS ALL FOLKS!!!</p>";
			

			else
				echo "<p id='searched'>No Results</p>";
			?>	
		</div>
	</div>
</div>

<?php } else { 

	header('Location:index.php');
	}
	
	?>
</body>
<script type="text/javascript">
            $(document).ready(function(){
           	    $("#search_bar").autocomplete({
                    source:'../search/getautocomplete.php',
                    minLength:1
                });
            });
</script>
<script type="text/javascript">
$(document).ready(function(){
                $(".tags").autocomplete({
                    source:'../search/tag_getautocomplete.php',
                    minLength:1
                });
            });



jQuery(document).ready(function() {
    jQuery('.tabs .tab-links a').on('click', function(e)  {
        var currentAttrValue = jQuery(this).attr('href');
 
        // Show/Hide Tabs
jQuery('.tabs ' + currentAttrValue).siblings().slideUp(400);
jQuery('.tabs ' + currentAttrValue).delay(400).slideDown(400);        // Change/remove current tab to active
        jQuery(this).parent('li').addClass('active').siblings().removeClass('active');
 
        e.preventDefault();
    });
});

</script>

<script type="text/javascript">
	function uploadbox_open(){
		document.getElementById('upload_popup').style.display='block';
		document.getElementById('upload_background').style.display='block';  

			$(function() {
	   			$('body').scrollTop(0);
			}); 
	}

	function uploadbox_close(){
      document.getElementById('upload_popup').style.display='none';
      document.getElementById('upload_background').style.display='none';
     
  }
</script>

<script type="text/javascript">

var main=function(){	

  $('.google-share').click(function(){

    $(this).attr("src", "../resources/g2.png");

     });
  

  $('.facebook-share').click(function(){

    $(this).attr("src", "../resources/f2.png");

     });
 

  $('.twitter-share').click(function(){

    $(this).attr("src", "../resources/t2.png");

     });
  };

  $(document).ready(main);
</script>
<script src="vote.js" type="text/javascript"></script>
<script>


      function upvotes(article_id)
      {
     
      	
      addVote(article_id,'1');
      $("#down"+article_id).attr("src", "../resources/down1.png");
	    	    $("#up"+article_id).attr("src", "../resources/up3.png");
 
    };

	

       
       function downvotes(article_id)
       {
        	addVote(article_id,'2');
        	$("#down"+article_id).attr("src", "../resources/down2.png");
	    	    $("#up"+article_id).attr("src", "../resources/up2.png");
        	 
    };
    
    
  
</script>
<script type="text/javascript">
  
  function report_open(article_id){
      y=window.pageYOffset+100;
  	  $(".report_popup").attr("style","top:"+y+"px"); 
      document.getElementById('report'+article_id).style.display='block';
      document.getElementById('report-fade'+article_id).style.display='block';  
  }

  function report_close(article_id){
     
      document.getElementById('report'+article_id).style.display='none';
      document.getElementById('report-fade'+article_id).style.display='none';
  }


  window.document.onkeydown = function (e)
  {
      if (!e){
          e = event;
      }
      if (e.keyCode == 27){
          report_close();
      }
  }

  
</script>
<script type="text/javascript">
  $(document).ready(function() {
    $('.parent').click(function() {
        $('.user-profile-icon-sub-nav').toggleClass();
    });
});
</script>

<script type="text/javascript">
jQuery(window).load(function() {

    $("#click-nav > li > a").click(function (e) { // binding onclick
        if ($(this).parent().hasClass('selected')) {
            $("#click-nav .selected div div").slideUp(100); // hiding popups
            $("#click-nav .selected").removeClass("selected");
        } else {
            $("#click-nav .selected div div").slideUp(100); // hiding popups
            $("#click-nav .selected").removeClass("selected");

            if ($(this).next(".subs").length) {
                $(this).parent().addClass("selected"); // display popup
                $(this).next(".subs").children().slideDown(200);
            }
        }
        e.stopPropagation();
    }); 

    $("body").click(function () { // binding onclick to body
        $("#click-nav .selected div div").slideUp(100); // hiding popups
        $("#click-nav .selected").removeClass("selected");
    }); 

});
</script>
<script type="text/javascript">
	$(".nav-button").click(function(){

		$(".nav-bar li").toggle();
	});

</script>
</html>

