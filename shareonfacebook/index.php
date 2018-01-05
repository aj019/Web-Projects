<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">

	#fb-root{

		width: 500px;
		height: 200px;

	}
	</style>
</head>
<body>
<div id="fb-root"></div>

<div class="fb-share-button" data-href="http://localhost/crastle/post.php?id=1" data-layout="button"></div>
</body>
<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
		</script>
</html>