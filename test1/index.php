<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
$query ="SELECT * FROM links";
$result = $db_handle->runQuery($query);
?>
<HTML>
<HEAD>
	<title></title>
<style>
body{width:610;}
.article-table {width: 100%;border-spacing: initial;margin: 20px 0px;word-break: break-word;table-layout: auto;line-height:1.8em;color:#333;}
.article-table th {background: #81CBFD;padding: 5px;text-align: left;color:#FFF;}
.article-table td {border-bottom: #f0f0f0 1px solid;background-color: #ffffff;padding: 5px;}
.article-table td div.feed_title{text-decoration: none;color:#333;font-weight:bold;}
.article-table ul{margin:0;padding:0;}
.article-table li{cursor:pointer;list-style-type: none;display: inline-block;color: #F0F0F0;text-shadow: 0 0 1px #666666;font-size:20px;}
.article-table .highlight, .article-table .selected {color:#F4B30A;text-shadow: 0 0 1px #F48F0A;}
.btn-votes {float:left; padding: 0px 5px;cursor:pointer;}
.btn-votes input[type="button"]{width:32px;height:32px;border:0;cursor:pointer;}
.up {background:url('upvote.png')}
.up:disabled {background:url('upvote_off.png')}
.down {background:url('downvote.png')}
.down:disabled {background:url('downvote_off.png')}
.label-votes {font-size:1.0em;color:#40CD22;width:32px;height:32px;text-align:center;font-weight:bold;}

</style>
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script src="vote.js" type="text/javascript"></script>

</HEAD>
<BODY>
<table class="article-table">
<tbody>

<?php
if(!empty($result)) {
$user_id = $_SESSION['user_id'];
foreach ($result as $links) {
?>
<tr>
<td valign="top">
<div class="feed_title"><?php echo $links["title"]; ?></div>
<div id="links-<?php echo $links["id"]; ?>">
<input type="hidden" id="votes-<?php echo $links["id"]; ?>" value="<?php echo $links["votes"]; ?>">
<?php
$vote_rank = 0;
$query ="SELECT SUM(vote_rank) as vote_rank FROM ipaddress_vote_map WHERE link_id = '" . $links["id"] . "' and user_id = '" . $user_id . "'";
$row = $db_handle->runQuery($query);
$up = "";
$down = "";

if(!empty($row[0]["vote_rank"])) {
	$vote_rank = $row[0]["vote_rank"];
	if($vote_rank == -1) {
	$up = "enabled";
	$down = "disabled";
	}
	if($vote_rank == 1) {
	$up = "disabled";
	$down = "enabled";
	}
}
?>
<input type="hidden" id="vote_rank_status-<?php echo $links["id"]; ?>" value="<?php echo $vote_rank; ?>">
<div class="btn-votes">
<input type="button" title="Up" disabled="true" class="up" onClick="addVote(<?php echo $links["id"]; ?>,'1')" <?php echo $up; ?> />
<div class="label-votes"><?php echo $links["votes"]; ?></div>
<input type="button" title="Down" class="down" onClick="addVote(<?php echo $links["id"]; ?>,'-1')" <?php echo $down; ?> />
</div>

</div>
</td>
</tr>
<?php		
}
}
?>
</tbody>
</table>
</BODY>
</HTML>