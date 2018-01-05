<?php

session_start();

  require_once 'init.php';

  $articlesquery= $conn->query("

    SELECT *
    FROM articles

  	");


  while ($row= $articlesquery->fetch_object()) {
  	
  	$articles[]= $row;

  }

   $id= $_SESSION['userprofile']['id'];

  $query = "SELECT  * FROM login WHERE user_id = '$id' ";
  $result = mysqli_query($conn, $query);
  $row1 = mysqli_fetch_assoc($result);
//  echo"<pre>" ,print_r($articles,true),"</pre>";

  ?>


<!DOCTYPE html>
<html>
<head>
	<title>Memeveme</title>
	<script type="text/javascript"></script>
	<link href='http://fonts.googleapis.com/css?family=Droid+Serif' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Slabo+27px' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Lora' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Dancing+Script' rel='stylesheet' type='text/css'>
	<script type="text/javascript" src= "jquery.js"> </script>
	<style type="text/css">
		
	body{

		background-color: #f6f5f6;
		font-family: Verdana,tahoma,Arial,sans-serif;
		font-size: 18px;
		overflow: auto;
		margin: 0;
		
	}

	hr{

		background-color: #efefef;
		border: 0;
		margin: 0;
		height: 2px;
		clear: both;
	}

	.clear-fix{

		clear: both;
	}
	.outer-wrapper{
			width: 100%;
			height: 100%;
			background-color: #f6f5f6;
			
		}

		.menu-container{
			width: 100%;
			height: 12%;

		}

		.menu-items{
			width: 100%;
			height: 100%;
		}

		.first-bar{
			height: 50px;
			background-color: #354147;
		}


		.second-bar{
			height: 49px;
			background-color: #FFFFFF;
			box-shadow: 0px 2px #BDC3C7;

		}

		.logo-container{
		height: 95px;
		width: 95px;
		float: left;
		margin-left: 2%;
		}

		#memeveme-logo{
			width: 110%;
			
		}

		.name-container{

			height:80%;
			width: 30%;
			display: inline-block;
		}
		#name{
			height: 100%;
			margin-left: 40px;
			padding: 3px;
		}

		.first-bar-table{
			display: inline-block;
			height: 100%;
			width: 50%;
		}
		

		.first-bar-table table{
			width: 100%;
			height: 100%;
			font-family: 'Lato', sans-serif;
			color: #D2D7D3;
			font-size: 16px;
			text-align: center;
		}

		.first-bar-table table a{
			text-decoration: none;
			color: #D2D7D3;
		}

		.first-bar-table table a:hover{
			color: black;
		}

		.first-bar-table table td{
			padding-left: 10%;
		}

		.first-bar-table table button{
			background-color: #33688E;
			border: 0;
			color: #D2D7D3;
			cursor: pointer;
			border: #33688E solid 1px;
			font-family: 'Lato', sans-serif;
			border-radius: 3px;
			font-size: 16px;
			width: 100%;
			height: 95%;
		}

		.first-bar-table table button:hover{
			background-color: #169e80;
			border: #169e80 solid 1px;
			color: black;
		}
		
		.second-bar-table{
			height: 100%;
			margin-left: 15%;
			
		}

		.second-bar-table table{
			width: 60%;
			text-align: center;
			padding: 1.5%;

		}

		.second-bar-table table a{
			text-decoration: none;
			color: #6C7A89;
			font-size: 20px;
			font-family: 'Expletus Sans', cursive;	
			font-family: 'Montserrat', sans-serif;
		}

		.second-bar-table table td a:hover{
			color: #282828;
		}


		.second-bar-table table td{
		}


/*Styling for left coloumn begins */

.left-col{

	width: 241px;
	background-color: white;
	margin: 18px;
	box-shadow: 1px 1px 1px rgb(187, 186, 186);
	border: 1px solid rgb(221, 210, 210);
	float: left;
}

.user{

	width: 100%;
	height: 24%;
	text-align: center;
	
}

.user #profile-pic{

width: 50%;
margin-top: 5%;
border: 1px solid rgb(247, 245, 245);
border-radius: 50%;
box-shadow: 1px 1px 17px rgb(208, 195, 195);

}

.user h2{

	font-family: 'Lato', sans-serif;
	font-size: 21px;
	font-weight: 200;

}

.laughs{

		width: 92%;
height: 38px;
text-align: center;
font-weight: 300;
color: white;
background-color: rgb(234, 138, 138);
padding: 10px;
}

.laughs p{

  font-size: 18px;
float: left;
font-family: 'Lato', sans-serif;
margin-top: 8px;

}

 #upvote{

font-size: 13px;
margin-top: 15px;
float: right;
padding-right: 3px;
}

.laughs .up{

	height: 22px;
	float: left;
	display: inline-block;
	padding: 10px;
	margin-left: -7px;
}
.pages{


}

.pages ul{

	list-style: none;
margin-left: -41px;
margin-top: -1px;
}

.pages ul li{

	
		width: 100%;
}

.pages ul li a{

	  background-color: transparent;
	display: block;
	width: 94.5%;
	font-weight: bold;
	padding-left: 3%;
	padding-right: 3%;
	font-size: 18px;
	float: left;
	color: black;
	font-family: 'Montserrat', sans-serif;
	text-decoration: none;
	text-align: center;
	color:rgb(41, 123, 148)
	}

.pages ul li a:hover{

	background-color: #4CC89F;
		color: #f0f0d1;

}	

.pages ul li a p{

   float: right;
   font-family: "Lato",sans-serif;
	font-weight: 100;

	font-size: 17px;
	}

.pages ul li a h3{

   float: left;
   font-family: "Lato",sans-serif;
  font-weight: 100;

  font-size: 18px;
	}	

h1 {
	font-family: â€˜Metrophobicâ€™, Arial, serif;
color: black;
font-size: 25px;
font-weight: 400;
margin-left: 16%;
}

/* left col ends*/
/* main content*/

.main-content{
	width: 50%;
	
	margin-left: 30px;
	float: left;
}

  	/*----- Tabs -----*/
	.tabs {
	    width:100%;
	    display:inline-block;
	}
 
    /*----- Tab Links -----*/
    /* Clearfix */
    .tab-links:after {
        display:block;
        clear:both;
        content:'';
    }
 
    .tab-links li {
        margin:0px 5px;
        float:left;
	font-family: 'Montserrat', sans-serif;
        list-style:none;
    }
 
        .tab-links a {
            padding:9px 15px;
            display:inline-block;
            border-radius:3px 3px 0px 0px;
           
            font-size:16px;
             text-decoration: none;
            font-weight:600;
            color:#909098;
            transition:all linear 0.15s;
        }
 
        .tab-links a:hover {
            background:#a7cce5;
            text-decoration:none;
        }
	 
	    li.active a, li.active a:hover {
	    	/* background: #fff; */
			color: #4c4c4c;
			font-size: 18px;
			/* border-left: 1px solid black; */
			/* border-right: 1px solid black; */
			/* border-top: 1px solid black; */
			box-shadow: 0px -1px 2px grey;
	    }
	 
	    /*----- Content of Tabs -----*/
	    .tab-content {
	       padding: 15px;
			
			border-top: 1px solid rgba(0,0,0,0.15);
			margin-top: -18px;
	    }
	 
        .tab {
            display:none;
        }
 
        .tab.active {
            display:block;
        }

   /*Tabs styling ended*/
   /*Segment styling starts*/
    .upvote-downvote{

   	height: 42px;
   }

	 #upvotes{
	
	float: left;
	margin-left: 20px;
	margin-top: 14px;
	font-family: 'Lora', serif;
	font-weight: 400;
	padding: 0px;
	padding-right: 6px;
	font-size: 13px;
	color: rgb(178, 178, 178);
	
	} 

	 .up{
	height: 22px;
	float: left;
	display: inline-block;
	padding: 10px;
	margin-left: -7px;
	
	
	 }

	 .down{

	 	height: 22px;
		float: left;
		display: inline-block;
		padding: 10px;
		margin-left: -7px;
	
	 }

	 #meme {

	 	height: 400px;
	 	max-width: 100%;
	 }

	 
	#segment{

				padding: 10px;
		width: 91%;
		height: 600px;
		margin-top: 32px;
		background-color: white;
		border-radius: 8px;
		border: 1px solid rgb(218, 214, 214);
		}

	}

	
   #memeveme{

	   	height: 66px;
	margin-left: 29px;
	margin-top: -18px;
   }

   .facebook-share{
   	height:22px;
   	padding: 10px;
   	
   }

   .twitter-share{
   	width:26px;
   	padding: 10px;
   
   }

   .google-share{
   	width:20px;
   	padding: 10px;
   	
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
			font-family: 'Expletus Sans', cursive;	
		    padding-right: 28px;
		} 

</style>
</head>
<body>
<div class="outer-wrapper">
		<div class="menu-container">
			<div class="logo-container">
				<img id="memeveme-logo" src="resources/mv.png">
			</div>

			<div class="first-bar">
				<div class="name-container">
				<img src="resources/mve.png" id="name">
				</div>
				<div class="first-bar-table">
				<table>
					<tr>
						<td>SEARCH</td>
						<td><a href="#">BADGES</a></td>
						<td><a href="#">CONNECT</a></td>
						<td><button>UPLOAD</button></td>
					</tr>
				</table>
				</div>
			</div>
			
			<div class="second-bar">
				<div class="second-bar-table">
					<table>
						<tr>
							<td style="width: 25%;"><a href="#">Top</a></td>
							<td style="width: 25%;"><a href="#">Popular</a></td>
							<td style="width: 25%;"><a href="#">New</a></td>
							<td style="width: 25%;"><a href="#">More</a></td>
						</tr>
					</table>
				</div>
			</div>
			</span>
		</div>
		<!--    Menu end -->
		<!--   Left col -->

		<div class="left-col">
	       <div class="user">
	       
	       	  <img id="profile-pic" src="<?php echo $row1['profile_pic_url'] ?>">
	       	  
	       	  <h2><?php echo $row1['username']?></h2>
	       	  <div class="laughs">
	       	    <p>Laughs delieverd</p>
	       	    <p id="upvote">21</p>
				 	
	       	  </div>
	      
	       </div>

			<div class="pages">
			   
				<ul>
					<li><a><h3>Uploads</h3><p>21</p></a></li><hr>
					<li><a><h3>Upvoted</h3><p>34</p></a></li><hr>
					<li><a></a></li>
					
				</ul>
			</div>
		</div>

	<!-- Main content Starts -->
	
	  <div class="main-content">
	  	  <div class="tabs">
    <ul class="tab-links">
        <li class="active"><a href="#tab1">All Activity</a></li>
        <li><a href="#tab2">Uploads</a></li>
        <li><a href="#tab3">Upvoted</a></li>
       
    </ul>
 
    <div class="tab-content">
        <div id="tab1" class="tab active">
       		<?php    
	        foreach ($articles as $articles): ?>
				<div id="segment">
						<h1><?php echo $articles->title ?></h1>
						<img src="<?php echo $articles->images ?>" id="meme">
						 <div class="clear-fix"></div>
						 <div class="tags">
						  <table>
						    <tr>
						  	 <td><a href="#">#<?php echo $articles->tag1 ?></a></td>
						  	 <td><a href="#">#<?php echo $articles->tag2 ?></a></td>
						  	 <td><a href="#">#<?php echo $articles->tag3 ?></a></td>
						    </tr>
						  </table>
						 </div>

						 <div class="clear-fix"></div>

						 <hr>
						 <div class="upvote-downvote">
						 <p id="upvotes"><?php echo $articles->upvotes ." "?></p>
						 <img class="up" id="up1" src="resources/up1.png">
						<img  class="down" id="down1" src="resources/down1.png">
						<img style="float:right;" class="google-share" src="resources/g1.png">
						<img style="float:right;" class="twitter-share" src="resources/t1.png">
						<img style="float:right;" class="facebook-share" src="resources/f1.png">
						</div>
						<hr>
				</div>
			<?php endforeach;  ?>	     
        </div>
 
        <div id="tab2" class="tab">
           
        </div>
 
        <div id="tab3" class="tab">
        
        </div>
 
        <div id="tab4" class="tab">
        

        </div>
    </div>
</div>
	  </div>	
	  
</div>	
</body>
<script type="text/javascript">
	jQuery(document).ready(function() {
    jQuery('.tabs .tab-links a').on('click', function(e)  {
        var currentAttrValue = jQuery(this).attr('href');
 
        // Show/Hide Tabs
        jQuery('.tabs ' + currentAttrValue).show().siblings().hide();
 
        // Change/remove current tab to active
        jQuery(this).parent('li').addClass('active').siblings().removeClass('active');
 
        e.preventDefault();
    });
});
</script>
</html>