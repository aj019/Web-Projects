<?php
if(!isset($_SESSION)){
    session_start();
}
require_once("../dbcontroller.php");
require_once('../init1.php');
$db_handle = new DBController();
$perPage = 10;

$sql = "SELECT * from `articles` where mv='1' ORDER BY article_id DESC ";
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
					$row2 = mysqli_fetch_assoc($result);

					$profile_pic_url = $row2['profile_pic_url'];
					$username = $row2['username'];
					$user_id= $row2['user_id'];
					$tag_w_hash1 = str_replace('#', '' , $articles->tag1);
					$tag_w_hash2 = str_replace('#', '' , $articles->tag2);
					$tag_w_hash3 = str_replace('#', '' , $articles->tag3);

			echo<<<LIST2
						<a href="../profile/profile1.php?id=$user_id"><img  src="$profile_pic_url"></a>
						<a href="../profile/profile1.php?id=$user_id"><p>$username</p></a>
					</div>		
					<hr>
					<div class="clear-fix"></div>
					<h1><a href="../post1.php?id=$articles->article_id" target ="_blank">$articles->title</a></h1>
					<a href="../post1.php?id=$articles->article_id" target ="_blank"><img type="submit" src="../upload/$articles->url" id="meme"></a>
					<div class="clear-fix"></div>
					<div class="tags">
						<table>
							<tr>
						  	 	<td><a href="../search/index_searchresults1.php?search_bar=%23$tag_w_hash1">$articles->tag1</a></td>
							  	<td><a href="../search/index_searchresults1.php?search_bar=%23$tag_w_hash2">$articles->tag2</a></td>
							  	<td><a href="../search/index_searchresults1.php?search_bar=%23$tag_w_hash3">$articles->tag3</a></td>
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
					         WHERE article_id='$articles->article_id' AND user_id= '".$_SESSION['userprofile']['id']."' ";

				        $result = mysqli_query($db, $articlesquery1);
						$row1 = mysqli_fetch_assoc($result);

						if($articles->user_id==$_SESSION['userprofile']['id']){
			echo<<<LIST3
						<p class="upvotes" id="upvotes$articles->article_id">$articles->total_upvotes</p>
						<img class="up" id="up$articles->article_id" src="../resources/up3.png">
						<img class="down" id="down$articles->article_id" src="../resources/down.png">
LIST3;
						}
						else{
							$status = $row1['status']; 
			echo<<<LIST4
							<p  class="upvotes" id="upvotes$articles->article_id">$articles->total_upvotes</p>
							<img class="up" onclick="upvotes($articles->article_id)" id="up$articles->article_id" src="../resources/up$status.png">
							<img class="down" onclick="downvotes($articles->article_id)" id="down$articles->article_id" src="../resources/down$status.png">

LIST4;
						}
			echo<<<LIST5
						<div id="report$articles->article_id" class="report_popup">
							<form method="post" action="report/report.php">
								<ul>
									<li><input type="radio" name="comment" value="nudity">Nudity</li>
									<li><input type="radio" name="comment" value="copyright">Copyright Content</li>
									<li><input type="radio" name="comment" value="nsfw">Nsfw</li>
									<li><input type="radio" name="comment" value="notfunny">Not Funny</li>
									<input type="hidden" name="article_id" value="$articles->article_id">
									<li><input type="submit" name="submit" value="Report"></li>
								</ul>
							</form>	
						</div>
						<div id="report-fade$articles->article_id" class="report-fade" onClick="report_close($articles->article_id)"></div>
						<img style="float:right;" class="report" onClick='report_open($articles->article_id);' src="../resources/report.png">
						<a href="https://plus.google.com/share?url=http%3A%2F%2Fmemeveme.com%2Fpost.php%3Fid%3D$articles->article_id" target="_blank"><img style="float:right;" class="google-share" src="../resources/g1.png"></a>
						<a href="https://twitter.com/intent/tweet?url=http%3A%2F%2Fmemeveme.com%2Fpost.php%3Fid%3D$articles->article_id&text=$articles->title&via=Memeveme" target="_blank"><img style="float:right;" class="twitter-share" src="../resources/t1.png"></a>
						<a href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fmemeveme.com%2Fpost.php%3Fid%3D$articles->article_id" target="_blank"><img style="float:right;" class="facebook-share" src="../resources/f1.png"></a>
					
					</div>
					<hr>
						
					<div class="clear-fix"></div>
				</div>					
LIST5;
		} //if part ends (check for meme)

		else{

			echo<<<LIST6
				<div id="segment">
					<div id="uploader">
LIST6;

						$articlesquery1=
						"SELECT login.*
						 FROM login 
						 INNER JOIN articles ON login.user_id=articles.user_id 
					     WHERE articles.article_id=$articles->article_id
					     GROUP BY login.user_id";

						$result = mysqli_query($db, $articlesquery1);
						$row2 = mysqli_fetch_assoc($result);
						$profile_pic_url = $row2['profile_pic_url'];
					$username = $row2['username'];
					$user_id= $row2['user_id'];
					$tag_w_hash1 = str_replace('#', '' , $articles->tag1);
					$tag_w_hash2 = str_replace('#', '' , $articles->tag2);
					$tag_w_hash3 = str_replace('#', '' , $articles->tag3);

			echo<<<LIST7
						<a href="../profile/profile1.php?id=$user_id"><img  src="$profile_pic_url"></a>
						<a href="../profile/profile1.php?id=$user_id"><p>$username</p></a>
					</div>	
					<hr>
					<div class="clear-fix"></div>
					<h1><a href="../post1.php?id=$articles->article_id" target ="_blank">$articles->title</a></h1>
LIST7;

					$url = $articles->url;
					preg_match('/[\\?\\&]v=([^\\?\\&]+)/',$url,$matches);
					$id = $matches[1];
					echo '<div class="youtube-article"><iframe class="dt-youtube" width=" 400" height="358" src="//www.youtube.com/embed/'.$id
						.'" frameborder="0" allowfullscreen></iframe></div>';

					$tag_w_hash1 = str_replace('#', '' , $articles->tag1);
					$tag_w_hash2 = str_replace('#', '' , $articles->tag2);
					$tag_w_hash3 = str_replace('#', '' , $articles->tag3);

			echo<<<LIST8
					<div class="clear-fix"></div>
					<div class="tags">
						<table>
						    <tr>
							  	<td><a href="../search/index_searchresults1.php?search_bar=%23$tag_w_hash1">$articles->tag1</a></td>
							  	<td><a href="../search/index_searchresults1.php?search_bar=%23$tag_w_hash2">$articles->tag2</a></td>
							  	<td><a href="../search/index_searchresults1.php?search_bar=%23$tag_w_hash3">$articles->tag3</a></td>
						    </tr>
						</table>
					</div>
					<div class="clear-fix"></div>
				 	<hr>
					<div class="upvote-downvote">
LIST8;
					
						$articlesquery1=
							"SELECT *
					         FROM votes
					         WHERE article_id='$articles->article_id' AND user_id= '".$_SESSION['userprofile']['id']."' ";

					    $result = mysqli_query($db, $articlesquery1);
				        $row1 = mysqli_fetch_assoc($result);

				        if($articles->user_id==$_SESSION['userprofile']['id']){ 
			echo<<<LIST9
							<p  class="upvotes" id="upvotes$articles->article_id">$articles->total_upvotes</p>
						 	<img class="up" id="up$articles->article_id" src="../resources/up3.png">
							<img  class="down" id="down$articles->article_id" src="../resources/down1.png">
LIST9;
						}
						else{
							$status = $row1['status'];
			echo<<<LIST10
							<p class="upvotes" id="upvotes$articles->article_id">$articles->total_upvotes</p>
						 	<img class="up" onclick="upvotes($articles->article_id)"  id="up$articles->article_id" src="../resources/up$status.png">
							<img  class="down" onclick="downvotes($articles->article_id)"  id="down$articles->article_id" src="../resources/down$status.png">
LIST10;
						}

			echo<<<LIST11
						<div id="report$articles->article_id" class="report_popup">
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
						
						<div id="report-fade$articles->article_id" class="report-fade" onClick="report_close($articles->article_id);"></div>
						<img style="float:right;" class="report" onClick='report_open($articles->article_id);' src="../resources/report.png">
						<a href="https://plus.google.com/share?url=http%3A%2F%2Fmemeveme.com%2Fpost.php%3Fid%3D$articles->article_id" target="_blank"><img style="float:right;" class="google-share" src="../resources/g1.png"></a>
						<a href="https://twitter.com/intent/tweet?url=http%3A%2F%2Fmemeveme.com%2Fpost.php%3Fid%3D$articles->article_id&text=$articles->title&via=Memeveme" target="_blank"><img style="float:right;" class="twitter-share" src="../resources/t1.png"></a>
						<a href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fmemeveme.com%2Fpost.php%3Fid%3D$articles->article_id" target="_blank"><img style="float:right;" class="facebook-share" src="../resources/f1.png"></a>
					
					</div>
					<hr>
					 <div class="clear-fix"></div>
				</div>


LIST11;

		} //else part ends (check for video)
	endforeach;
}
print $output;
?>
