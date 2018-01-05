<?php
session_start();

if (!isset($_SESSION['username'])) {
header('Location: index.php');
}

?>
<html>

<head>
<title>Profile Page</title>
</head>

<body>

<p><a href="logout.php">Logout</a></p>

</body>

</html>