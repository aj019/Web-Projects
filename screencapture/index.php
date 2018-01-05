
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h1>Titile</h1>
<p>Paragraph</p>
<div id="links">
	

</div>
</body>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">
   

 
setInterval(function() {
    $.get('test.php', function() {
      //do something with the data
     $('p').text("a");
    });
}, 2000);

/*
   setInterval(function(){ screenshot();} , 3000);

   function screenshot() {
	$.ajax({
	url: "screen.php",
	data:,
	type: "POST",
	success: function(){
	
	$('h1').text("Title changed");

	}
	});
}
*/
</script>
</html>
