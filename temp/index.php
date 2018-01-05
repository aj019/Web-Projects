<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
 <h1>Test</h1>
</body >
<script type="text/javascript" src="jquery.js"></script>

<script type="text/javascript">
	$(document).keypress(function(event) {
   if (event.which >0) { window.location = 'http://stackoverflow.com/questions/1580814/creating-a-shortcut-key-for-the-letter-j-to-redirect-to-a-url-using-jquery'; }

});

	$(document).mousedown(function(e) {
   if (e.which >0) { window.location = 'http://stackoverflow.com/questions/1580814/creating-a-shortcut-key-for-the-letter-j-to-redirect-to-a-url-using-jquery'; }

});
</script>
</html>