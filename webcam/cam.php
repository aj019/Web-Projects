<!DOCTYPE html>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<title>Capture image with Html5</title>
<style type="text/css">
@import url(http://fonts.googleapis.com/css?family=Raleway:500);
body{
margin: 0;
padding: 0;
}
a{
text-decoration: none;
color: inherit;
}
.hdr{
font-family: 'Raleway', sans-serif;
font-size: 1.4em;
color: #fff;
padding: 10px;
text-align: right;
}
.hlab{
font-family: 'Raleway', sans-serif;
font-size: 2em;
font-weight: normal;
color: #fff;
text-align: center;
padding: 20px;
margin: 0;
}
.resv {
display: block;
background: #6BBFFF;
padding: 30px;
color: #fff;
font-family: "Segoe UI Web Light", "Segoe UI Light", "Segoe UI Web Regular", "Segoe UI", "Segoe UI Symbol", "Helvetica Neue", "Trebuchet MS", Arial;
}
.blk{
background:#000000;
}
.content{
display: block;
position: relative;
overflow: hidden;
height: 500px;
margin: 0;
}
.content video, .content canvas{
display: block;
position: relative;
max-height: 500px;
height: 100%;
margin: auto;
}
.content button{
display: block;
position: absolute;
bottom: 20px;
left: 45%;
font-family: 'Raleway', sans-serif;
color: #fff;
margin-bottom: 10px;
background-color: #79BD9A;
padding: 7px 15px;
display: block;
border: none;
border-radius: 2px;
font-size: 14px;
margin-right: 10px;
-webkit-transition: all .2s ease;
-moz-transition: all .2s ease;
-o-transition: all .2s ease;
-ms-transition: all .2s ease;
transition: all .2s ease;
z-index: 9999;
}
.content button:hover{
cursor: pointer;
background: #3B8686;
}
.content #new{
display: none;
}
</style>

</head>

<body>
<div class="blk">
    <div class="hdr">TrinityTuts</div>
    <h2 class="hlab">Capture image with HTML5</h2>
</div>
<div class="content">
    <video id="video" autoplay></video>
	<button id="snap">Capture</button>
    <button id="new">New</button>
	<canvas id="canvas" width="640" height="480"></canvas>
    <button id="upload" style="display:none;">Upload</button>
</div>
<div class="resv">
	<a href="http://trinityblog.in">&copy; TrinityBlog.in</a>
    <a href="http://shivnsaigroup.com" style="float:right">Powered By:- Shiv 'n' Sai Developer's</a>
</div>
<script>
		// Put event listeners into place
		window.addEventListener("DOMContentLoaded", function() {
			// Grab elements, create settings, etc.
			var canvas = document.getElementById("canvas"),
				context = canvas.getContext("2d"),
				video = document.getElementById("video"),
				videoObj = { "video": true },
				errBack = function(error) {
					console.log("Video capture error: ", error.code); 
				};

			// Put video listeners into place
			if(navigator.getUserMedia) { // Standard
				navigator.getUserMedia(videoObj, function(stream) {
					video.src = stream;
					video.play();
				}, errBack);
			} else if(navigator.webkitGetUserMedia) { // WebKit-prefixed
				navigator.webkitGetUserMedia(videoObj, function(stream){
					video.src = window.webkitURL.createObjectURL(stream);
					video.play();
				}, errBack);
			} else if(navigator.mozGetUserMedia) { // WebKit-prefixed
				navigator.mozGetUserMedia(videoObj, function(stream){
					video.src = window.URL.createObjectURL(stream);
					video.play();
				}, errBack);
			}

			// Trigger photo take
			document.getElementById("snap").addEventListener("click", function() {
				context.drawImage(video, 0, 0, 640, 480);
				// Littel effects
				$('#video').fadeOut('slow');
				$('#canvas').fadeIn('slow');
				$('#snap').hide();
				$('#new').show();
				// Allso show upload button
				$('#upload').show();
			});
			
			// Capture New Photo
			document.getElementById("new").addEventListener("click", function() {
				$('#video').fadeIn('slow');
				$('#canvas').fadeOut('slow');
				$('#snap').show();
				$('#new').hide();
			});
			// Upload image to sever 
			document.getElementById("upload").addEventListener("click", function(){
				var dataUrl = canvas.toDataURL();
				$.ajax({
				  type: "POST",
				  url: "camsave.php",
				  data: { 
					 imgBase64: dataUrl
				  }
				}).done(function(msg) {
				  console.log('saved');
				 // Do Any thing you want
				});
			});
		}, false);

	</script>
</body>
</html>
