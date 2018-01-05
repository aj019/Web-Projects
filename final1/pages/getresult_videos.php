<?php
require_once("../dbcontroller.php");
require_once('../init1.php');
$db_handle = new DBController();
$perPage = 10;

$sql = "SELECT * from `articles` where mv='2' ORDER BY article_id DESC";
$page = 1;
if(!empty($_GET["page"])) {
	$page = $_GET["page"];
}

$start = ($page-1)*$perPage;
if($start < 0) 
	$start = 0;

$query =  $sql . " limit " . $start . "," . $perPage; 
$articles = $db_handle->runQuery($query);

if(empty($_GET["rowcount"])) {
	$_GET["rowcount"] = $db_handle->numRows($sql);
}

$pages  = ceil($_GET["rowcount"]/$perPage);
$output = '';

if(!empty($articles)) {
	$output .= '<input type="hidden" class="pagenum" value="' . $page . '" /><input type="hidden" class="total-page" value="' . $pages . '" />';
	
	foreach($articles as $articles):
		if($articles->mv == 1){
			echo<<<LIST1
				<div id="segment">
					<div id="uploader">
LIST1;
				
					$articlesquery1=
					    "SELECT login.*
					     FROM login 
					     INNER JOIN articles ON login.user_id=articles.user_id 
					     WHERE articles.article_id=$articles->article_id
					     GROUP BY login.user_id";

					$result = mysqli_query($db, $articlesquery1);
					$row1 = mysqli_fetch_assoc($result);
					$profile_pic_url = $row1['profile_pic_url'];
					$username = $row1['username'];

					$tag_w_hash1 = str_replace('#', '' , $articles->tag1);
					$tag_w_hash2 = str_replace('#', '' , $articles->tag2);
					$tag_w_hash3 = str_replace('#', '' , $articles->tag3);

			echo<<<LIST2
						<img  src="$profile_pic_url">
						<p>$username</p>
					</div>	
					<hr>
					<div class="clear-fix"></div>
					<h1><a href="../post.php?id=$articles->article_id" target ="_blank">$articles->title</a></h1>
					<a href="../post.php?id=$articles->article_id" target ="_blank"><img type="submit" src="../upload/$articles->url" id="meme"></a>
					<div class="clear-fix"></div>
					<div class="tags">
						<table>
							<tr>
						  	 	<td><a href="../search/index_searchresults.php?search_bar=%23$tag_w_hash1">$articles->tag1</a></td>
							  	<td><a href="../search/index_searchresults.php?search_bar=%23$tag_w_hash2">$articles->tag2</a></td>
							  	<td><a href="../search/index_searchresults.php?search_bar=%23$tag_w_hash3">$articles->tag3</a></td>
						    </tr>
						</table>
					</div>
					<div class="clear-fix"></div>
					<hr>
					<div class="upvote-downvote">
LIST2;

						$articlesquery1=
							"SELECT *
						     FROM votes
						     WHERE article_id='$articles->article_id'";

						$result = mysqli_query($db, $articlesquery1);
			            $row2 = mysqli_fetch_assoc($result);

			echo<<<LIST3
						<p id="upvotes">$articles->total_upvotes</p>
						<img class="up" onClick="lightbox_open();" id="up1" src="../resources/up2.png">
						<img  class="down" onClick="lightbox_open();" id="down1" src="../resources/down1.png">
						<div id="report">
							<ul>
								<li>Nudity</li>
								<li>Copyright Content</li>
								<li>Nsfw</li>
							</ul>
						</div>
						<div id="report-fade" onClick="report_close();"></div>
						<img style="float:right;" class="report" onClick='lightbox_open();' src="../resources/report.png">
						<a href="https://plus.google.com/share?url=http%3A%2F%2Fmemeveme.com%2Fpost.php%3Fid%3D$articles->article_id" target="_blank"><img style="float:right;" class="google-share" src="../resources/g1.png"></a>
						<a href="https://twitter.com/intent/tweet?url=http%3A%2F%2Fmemeveme.com%2Fpost.php%3Fid%3D$articles->article_id&text=$articles->title&via=Memeveme" target="_blank"><img style="float:right;" class="twitter-share" src="../resources/t1.png"></a>
						<a href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fmemeveme.com%2Fpost.php%3Fid%3D$articles->article_id" target="_blank"><img style="float:right;" class="facebook-share" src="../resources/f1.png"></a>
					</div>
					<hr>						
					<div class="clear-fix"></div>
				</div>
LIST3;
		} //if part ends (check for meme)

		else{

			echo<<<LIST4
				<div id="segment">
					<div id="uploader">
LIST4;

						$articlesquery1=
						"SELECT login.*
						 FROM login 
						 INNER JOIN articles ON login.user_id=articles.user_id 
					     WHERE articles.article_id=$articles->article_id
					     GROUP BY login.user_id";

						$result = mysqli_query($db, $articlesquery1);
						$row1 = mysqli_fetch_assoc($result);
						$profile_pic_url = $row1['profile_pic_url'];
						$username = $row1['username'];

			echo<<<LIST5
						<img src="$profile_pic_url">
						<p>$username</p>
					</div>
					<hr>
					<div class="clear-fix"></div>
					<h1><a href="../post.php?id=$articles->article_id" target ="_blank">$articles->title</a></h1>
LIST5;

					$url = $articles->url;
					preg_match('/[\\?\\&]v=([^\\?\\&]+)/',$url,$matches);
					$id = $matches[1];
					echo '<div class="youtube-article"><iframe class="dt-youtube" width=" 100%" height="358" src="//www.youtube.com/embed/'.$id
						.'" frameborder="0" allowfullscreen></iframe></div>';

					$tag_w_hash1 = str_replace('#', '' , $articles->tag1);
					$tag_w_hash2 = str_replace('#', '' , $articles->tag2);
					$tag_w_hash3 = str_replace('#', '' , $articles->tag3);

			echo<<<LIST6
					<div class="clear-fix"></div>
					<div class="tags">
						<table>
						    <tr>
							  	<td><a href="../search/index_searchresults.php?search_bar=%23$tag_w_hash1">$articles->tag1</a></td>
							  	<td><a href="../search/index_searchresults.php?search_bar=%23$tag_w_hash2">$articles->tag2</a></td>
							  	<td><a href="../search/index_searchresults.php?search_bar=%23$tag_w_hash3">$articles->tag3</a></td>
						    </tr>
						</table>
					</div>
					<div class="clear-fix"></div>
				 	<hr>
					<div class="upvote-downvote">
LIST6;
					
						$articlesquery1=
							"SELECT *
						   	 FROM votes
						   	 WHERE article_id='$articles->article_id'";

						$result = mysqli_query($db, $articlesquery1);
			            $row2 = mysqli_fetch_assoc($result);

			echo<<<LIST7
						<p id="upvotes">$articles->total_upvotes</p>
						<img class="up" onClick="lightbox_open();" id="up1" src="../resources/up2.png">
						<img  class="down" onClick="lightbox_open();" id="down1" src="../resources/down1.png">
						<div id="report">
							<ul>
								<li>Nudity</li>
								<li>Copyright Content</li>
								<li>Nsfw</li>
							</ul>
						</div>
						<div id="report-fade" onClick="report_close();"></div>
						<img style="float:right;" class="report" onClick='lightbox_open();' src="../resources/report.png">
						<a href="https://plus.google.com/share?url=http%3A%2F%2Fmemeveme.com%2Fpost.php%3Fid%3D$articles->article_id" target="_blank"><img style="float:right;" class="google-share" src="../resources/g1.png"></a>
						<a href="https://twitter.com/intent/tweet?url=http%3A%2F%2Fmemeveme.com%2Fpost.php%3Fid%3D$articles->article_id&text=$articles->title&via=Memeveme" target="_blank"><img style="float:right;" class="twitter-share" src="../resources/t1.png"></a>
						<a href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fmemeveme.com%2Fpost.php%3Fid%3D$articles->article_id" target="_blank"><img style="float:right;" class="facebook-share" src="../resources/f1.png"></a>
					</div>
					<hr>
					<div class="clear-fix"></div>
				</div>
LIST7;
		} //else part ends (check for video)
	endforeach;
}
print $output;
?>
