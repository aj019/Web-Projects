<?php
$email = $_POST['email'];

if(isset($email)){
	
	$to = $email;
    $message = 'New order'.'<br>';
    $message .= 'user_id : '.'<br>';
    $message .= 'payment : '.'<br>';
    $message .= 'address : '.'<br>';
    $message .= 'date : '.'<br>';

    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
    $headers .= 'From: Website <freshride.in>' . "\r\n";
    
    mail('junagupta19@gmail.com', 'Freshride New Order Imp', $message, $headers);
    mail('anujgupta019@gmail.com', 'Freshride New Order Imp', $message, $headers);
    
    
}

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="test.php" method="post">
	<input type="text" name="email" />
	<input type="submit" value="submit">
</form>
</body>
</html>