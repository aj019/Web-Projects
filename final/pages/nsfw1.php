<?php 
	ob_start(); session_start();

	$_SESSION['authstation'] = (isset($_SESSION['authstation']) ? $_SESSION['authstation'] : null);
	if ( !isset($_SESSION['authstation']) ) {
		$_SESSION['authstation'] = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	}

?>

<?php
	require_once('../init1.php');
	require_once('../dbcontroller.php');

	$trendingquery=$db->query("SELECT tag from `trending_tags` ORDER BY TRIM(current_score) DESC LIMIT 5");
  	
  	while ($row3 = $trendingquery->fetch_object()) {
  		$trending[]= $row3;
	}  

  	$notification=$db->query(
  		"SELECT * from `notification` WHERE uploader_id='".$_SESSION['userprofile']['id']."' AND status='1' ORDER BY TRIM(article_id) DESC LIMIT 5");

  	while ($row4= $notification->fetch_object()) {
  		$notifications[]= $row4;
  	}  

  	$featured_query = $db->query("SELECT * from `articles` WHERE total_upvotes > 5 ORDER BY TRIM(article_id) LIMIT 5");
  							
  	while($row11 = $featured_query->fetch_object()){							
  		$featured[] = $row11;
  	}
?>



<html>
<head>
	<title>Memeveme | NSFW</title>
	<meta name="description" content="The funniest NSFW content featuring memes, funny youtube videos and GIFs that are not safe for work.">
	<meta name="keywords" content="funny, gif, youtube videos, nsfw, funny pics, images, lol, happy, jokes, memes, trolls, awesome, fun, hilarious">
	<meta property = "og:title" content="Memeveme"/>
	<meta property = "og:type" content="website"/>
	<meta property = "og:url" content="http://memeveme.com/pages/nsfw.php"/>
	<meta property = "og:image" content="http://memeveme.com/resources/nsfw.png"/>
	<meta property = "og:description" content="Memeveme is home of the funniest content from India and the world."/>
	<meta property = "og:site_name" content="http://memeveme.com"/>
	<meta name="twitter:card" content="photo"/>
	<meta name="twitter:url" content="http://memeveme.com/pages/nsfw.php"/>
	<meta name="twitter:title" content="Memeveme"/>
	<meta name="twitter:description" content="Memeveme is home of the funniest content from India and the world."/>
	<meta name="twitter:image" content="http://memeveme.com/resources/nsfw.png"/>
	<meta name="twitter:creator" value="Memeveme" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="../resources/favicon.ico">
	<script type="text/javascript"></script>
	<link href='http://fonts.googleapis.com/css?family=Droid+Serif' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Slabo+27px' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Lora' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="../style1.css" />
	<script type="text/javascript" src="../jquery/jquery.js"></script>
	<script type="text/javascript" src="../jquery-1.2.6.pack.js"></script>

	
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
	<link rel="stylesheet" href="../search/jquery-ui-1.10.3.custom.min.css" />

	<link rel="stylesheet" type="text/css" href="../upload/upload.css">
	<script type="text/javascript" src="../upload/upload.js"></script>

	<script>
		$(document).ready(function(){
			function getresult(url) {
				$.ajax({
					url: url,
					type: "GET",
					data:  {rowcount:$("#rowcount").val()},
					beforeSend: function(){
					$('#loader-icon').show();
					},
					complete: function(){
					$('#loader-icon').hide();
					},
					success: function(data){
					$("#faq-result").append(data);
					},
					error: function(){} 	        
			   });
			}
			$(window).scroll(function(){
				if ($(window).scrollTop() == $(document).height() - $(window).height()){
					if($(".pagenum:last").val() <= $(".total-page").val()) {
						var pagenum = parseInt($(".pagenum:last").val()) + 1;
						getresult('getresult_nsfw1.php?page='+pagenum);
					}
				}
			}); 
		});
	</script>
</head>

<body>
	<?php if ( isset($_SESSION["userprofile"]) )
	{ 
	?>
		<div id="wrapper">
			<div class="menu-container">
				<div class="navigation-menu">
					<nav role="navigation">
					<span class="nav-button"></span>
						<ul class="nav-bar" style="padding-left:5%;">
			                <li><a href="top1.php">Top</a></li>
			                <li><a href="popular1.php">Popular</a></li>
			              	<li><a href="../index1.php">New</a></li>
			                <li><a href="javascript:void(0);" class="has-submenu">More</a>
					         <ul class="nav-bar-submenu">
			                      <center>
			                        <li><a href="memes1.php">Memes</a></li>
			                        <li><a href="gif1.php">Gif</a></li>
			                        <li><a href="videos1.php">Videos</a></li>
			                        <li><a href="#">NSFW</a></li>
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
						<form method="GET" action="../search/index_searchresults1.php" style="margin:0;"> 
	  						<input id="search_bar" name="search_bar" type="search" placeholder="Search Memeveme" autocomplete="off">
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
		                	$articlesquery2=
		                		"SELECT *
							     FROM login
							     WHERE user_id= '".$_SESSION['userprofile']['id']."' ";
												  
								$result = mysqli_query($db, $articlesquery2);
								$row2 = mysqli_fetch_assoc($result);
							?>

							<li><a href="javascript:void(0);"><img class="user-profile-icon" src="<?php echo $row2['profile_pic_url'];?>"></a>
			                    <div class="subs">
			                        <div class="wrp2">
			                            <ul>
		                                    <ul>
		                                        <li><a href="../profile/profile1.php?id=<?php echo $_SESSION['userprofile']['id']?>" target="_blank">Profile</a></li>
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
			            <form action="../upload/upload-image.php" method="post" enctype="multipart/form-data" autocomplete="off">
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
			                <form action="../upload/upload-video.php" method="POST" enctype="multipart/form-data" autocomplete="off">
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
					<li><a href="../search/index_searchresults1.php?search_bar=%23<?php $tag_w_hash = str_replace('#', '' , $trending->tag); echo $tag_w_hash; ?>">
						<?php echo $trending->tag;?> </a></li>
					<?php endforeach;?>
				</ul>
			</div>		
	
			<div class ="right-col">
				<div id="container">
					<div id="faq-result">
					<?php include('getresult_nsfw1.php'); ?>
				</div>
				<div id="loader-icon"><img src="../resources/LoaderIcon.gif" /></div>
			</div>
		</div>

		<div class="sidebar">
					<div class="about">
						<h2>About</h2>
						<p>Memeveme is home of the funniest content from India and the world.<br> The funniest memes, gifs and
						 youtube videos guaranteed to make you laugh.<br>Brighten up your day and Share some fun right now
						</p><hr>
						<ul>
							<li><a href = "https://www.facebook.com/memeveme?fref=ts" target = "_blank"><img src="../resources/Facebook.png"></a></li>
							<li><a href = "https://twitter.com/memeveme" target = "_blank"><img src="../resources/Twitter.png"></a></li>
							<li><a href = "https://plus.google.com/wm/1/113162534283767659967/posts" target = "_blank"><img src="../resources/Google+.png"></a></li>
							<li><a href = "https://instagram.com/memeveme/" target = "_blank"><img src="../resources/Instgram.png"></a></li>
							<li><a href = "https://www.youtube.com/channel/UCfNW6HCGgUagUdNszXB4Zmg" target = "_blank"><img src="../resources/Youtube.png"></a></li>
						</ul>	
					</div>
					<hr>
					<div id="copyright"><p>COPYRIGHT &copy 2015 memeveme.com</p></div>
					<div id="featured">
						<br>
						<h1>Featured</h1>
						<?php
							if(!empty($featured)){
								foreach ($featured as $featured):
									if($featured->mv == 1){
										?>
										<div class="featured-segment">
											<div clas="featured-title">
												<h3><?php echo "$featured->title"; ?></h3>
											</div>
											<a href="../post1.php?id=<?php echo "$featured->article_id";?>" target="_blank">
											<div class="featured-post" style = "background-image:url('../upload/<?php echo "$featured->url"; ?>');">
												
											</div>
											</a>	
										</div>
										<?php
									}
									else{

									}

										
								endforeach;
							}
						?>

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

<?php ob_end_flush(); ?>