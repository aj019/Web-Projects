<?php
session_start();

require('../init1.php');
$query="UPDATE notification SET status=0  WHERE uploader_id='".$_SESSION['userprofile']['id']."' AND status=1 ";
if ($db->query($query) === TRUE) {
    echo "query updated successfully";
} else {
    echo "Error: " . $query . "<br>" . $db->error;
}

?>