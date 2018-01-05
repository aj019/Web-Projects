<?php ob_start(); session_start();

$_SESSION['authstation'] = (isset($_SESSION['authstation']) ? $_SESSION['authstation'] : null);
if ( !isset($_SESSION['authstation']) ) {
	$_SESSION['authstation'] = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
}
  $id= $_REQUEST['id'];

  require_once '../init1.php';
  require_once 'mysqlconnect.php';

  $notification=$db->query("
		SELECT * from `notification` WHERE uploader_id='".$_SESSION['userprofile']['id']."' AND status='1' ORDER BY TRIM(article_id) DESC LIMIT 5 
  	");

  while ($row4= $notification->fetch_object()) {
  	
  	$notifications[]= $row4;

  }

 

  $query = "SELECT  * FROM login WHERE user_id = '$id' ";
  $result = mysqli_query($db, $query);
  $row1 = mysqli_fetch_assoc($result);  

  ?>
<!DOCTYPE html>
<html>
<head>
	<title>Memeveme |<?php echo $row1['username'] ?> </title>
    <meta name="description" content="Mememveme is the best collection of hilariously funny memes, GIFs, pictures and youtube video online">
	<meta name="keywords" content="funny, gif, youtube videos, top funny content, funniest, nsfw, funny pics, images, lol, happy, jokes, memes, trolls, fun, hilarious">
	<meta name="keywords" content="funny, gif, youtube videos, pictures, images, popular, lol, happy, jokes, memes, trolls, awesome, fun, hilarious">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="../resources/favicon.ico">
	<script type="text/javascript"></script>
	<link href='http://fonts.googleapis.com/css?family=Droid+Serif' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Slabo+27px' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Lora' rel='stylesheet' type='text/css'>
	<script type="text/javascript" src="../jquery/jquery.js"></script>
	<script type="text/javascript" src="../jquery-1.2.6.pack.js"></script>

	
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
	<link rel="stylesheet" href="../search/jquery-ui-1.10.3.custom.min.css" />
	<link rel="stylesheet" href="profile.css" />

	<link rel="stylesheet" type="text/css" href="../upload/upload.css">


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
                <li><a href="javascript:void(0);" class="has-submenu">More</a>
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
						<form method="GET" action="../search/index_searchresults.php" style="margin:0;"> 
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
					<a target="_blank"><span class="upload-button" onClick="uploadbox_open()"><img src="../resources/upload.png"></span></a>
					<a target="_blank"><button class="upload-right-menu-button" onClick="uploadbox_open()">Upload</button></a>
				</div>
			</div>
		</div>


	  <div class="clear-fix"></div>
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


	     <div class="left-col">
	       <div class="user">
	       	  <img id="profile-pic" src="<?php echo $row1['profile_pic_url'].'?type=large' ?>" alt="Profile Picture">
	      
	       	  <h2><?php echo $row1['username'] ?></h2>
	       	  </div>
	       	  

	       	  <div class="laughs">
				<div class="delievered">	       	  
	       	   		<img src="resources/smiley1active.png">
	       	    	<p>Delieverd | </p>
	       	    </div>
	       	    <?php 
	       	    	$total_laughs_query = mysql_query("SELECT sum(total_upvotes) AS total_laughs_delivered FROM `articles` WHERE user_id = '".$_SESSION['userprofile']['id']."' ",$conn)
	       	    	or die("Error in query".mysql_error());
	       	    	while($row10 = mysql_fetch_assoc($total_laughs_query) ){
	       	    		$total_laughs_delivered = $row10['total_laughs_delivered'];
	       	    	}
	       	    ?>	
	       	    <p id="total-laughs"><?php echo "$total_laughs_delivered"; ?></p>
			</div>
	       
	       	<?php
	       		$total_uploads_query = mysql_query("SELECT count(article_id) AS total_uploads FROM `articles` WHERE user_id ='".$_SESSION['userprofile']['id']."' ",$conn)
	       		or die("Error in query".mysql_error());

	       		while($row10 = mysql_fetch_assoc($total_uploads_query)){
	       			$total_uploads = $row10['total_uploads'];
	       		}

	       		$total_upvoted_query = mysql_query(
	       		"SELECT count(article_id) AS total_upvoted FROM articles WHERE article_id IN (SELECT article_id FROM votes WHERE user_id='".$_SESSION['userprofile']['id']."' AND status='1')",$conn)
	       		or die("Error in Query".mysql_error());

	       		while($row10 = mysql_fetch_assoc($total_upvoted_query)){
	       			$total_upvoted = $row10['total_upvoted'];
	       		} 	
	       	?>
	       
			<div class="pages">
			   
				 <table>
				 		
						    <tr>
						  	 <td><a href="#">Uploads</a></td>
						  	 <td><a href="#">Upvoted</a></td>
								    </tr>
						
						    <tr style="margin-top:-10px;">
						  	 <td><a href="#"><?php echo "$total_uploads"; ?></a></td>
						  	 <td><a href="#"><?php echo "$total_upvoted"; ?></a></td>

						    </tr>
						   
				 </table>
			  </div>
			</div>
		
	<div class ="right-col">
		<div id="container">
		<!-- Tabs -->
		    <div class="tabs-profile">
			    <ul class="tab-links-profile">
			        <li class="active-profile"><a href="#tab1-profile">All Activity</a></li>
			        <li><a href="profile2.php?id=<?php echo $id ?>">Uploads</a></li>
			        <li><a href="profile3.php?id=<?php echo $id ?>">Upvoted</a></li>
			        
			       
			    </ul>
				<div class="tab-content-profile">
			        <!-- Tab 1 -->
			        <div id="tab1-profile" class="tab-profile active-profile">	 

						<?php  
						$articlesquery=$db->query("

						    SELECT *
						    FROM articles
						    WHERE user_id= '$id' 
						    UNION 
						    SELECT *
						    FROM articles
							WHERE article_id IN (SELECT article_id FROM votes WHERE user_id='$id' AND status='1' )
						   ORDER BY date_creation DESC

						  	");

						  while ($row= $articlesquery->fetch_object()) {
						  	
						  	$articles[]= $row;

						  }  
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
										<a href="profile1.php?id=<?php echo $row2['user_id'] ?>"><img  src="<?php echo $row2['profile_pic_url'] ?>"></a>
										<a href="profile1.php?id=<?php echo $row2['user_id'] ?>"><p ><?php echo $row2['username'] ?></p></a>
									
									</div>	<hr>
									<div class="clear-fix"></div>
										<h1><a href="../post1.php?id=<?php echo $articles->article_id ?>" target ="_blank"><?php echo $articles->title ?></a></h1>
										
										<a href="../post1.php?id=<?php echo $articles->article_id ?>" target ="_blank"><img type="submit" src='<?php echo "../upload/" .$articles->url?>' id="meme"></a>
										 <div class="clear-fix"></div>
										 <div class="tags">
										  <table>
										    <tr>
										  	 <td><a href="#"><?php echo $articles->tag1 ?></a></td>
										  	 <td><a href="#"><?php echo $articles->tag2 ?></a></td>
										  	 <td><a href="#"><?php echo $articles->tag3 ?></a></td>
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
										<a href="profile1.php?id=<?php echo $row2['user_id'] ?>"><img  src="<?php echo $row2['profile_pic_url'] ?>"></a>
										<a href="profile1.php?id=<?php echo $row2['user_id'] ?>"><p ><?php echo $row2['username'] ?></p></a>
									
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
										  	 <td><a href="#"><?php echo $articles->tag1 ?></a></td>
										  	 <td><a href="#"><?php echo $articles->tag2 ?></a></td>
										  	 <td><a href="#"><?php echo $articles->tag3 ?></a></td>
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
										<img style="float:right;" class="google-share" src="../resources/g1.png"></a>
										<img style="float:right;" class="twitter-share" src="../resources/t1.png">
										<img style="float:right;" class="facebook-share" src="../resources/f1.png">
										</div>
										<hr>
										
										 <div class="clear-fix"></div>
								
								</div>
							<?php } endforeach;  ?>	
					</div>

					<!-- Tab 2 -->
					<div id="tab2-profile" class="tab-profile">
           				
			        </div>
			 


			 <!-- Tab3 -->


			        <div id="tab3-profile" class="tab-profile">
			        
			        </div>
			 
			        <div id="tab4-profile" class="tab-profile">		
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

