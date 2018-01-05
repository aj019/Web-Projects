<?php

setcookie('userid2','24',time()+(24*60*60),'/');
session_destroy();
//unset($_SESSION['userid']);
//unset($_COOKIE['userid2']);
?>