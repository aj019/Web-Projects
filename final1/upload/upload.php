<?php
session_start();
?>
<html>
<head>
    <lin<link href='http://fonts.googleapis.com/css?family=Josefin+Sans' rel='stylesheet' type='text/css'>

    <script type="text/javascript" src="../jquery/jquery.js"></script>
    <script type="text/javascript" src="../jquery-1.2.6.pack.js"></script>

    
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="../search/jquery-ui-1.10.3.custom.min.css" />

    <link rel="stylesheet" type="text/css" href="upload.css">

	<title></title>
</head>
<body>

	<div class="tabs">
    <ul class="tab-links">
        <li class="active"><a href="#tab1">Memes</a></li>
        <li><a href="#tab2">Videos</a></li>

    </ul>

    <div class="tab-content">
    <div id="tab1" class="tab active">
            <form action="upload-image.php" method="post" enctype="multipart/form-data" autocomplete="off">
                <p>
                <input type="file" name="meme" class="meme-upload" required>
                <br>
                <br>
                <input type="text" name="title" class="title" placeholder="Title" required>
                <br>
                <br>
                <table class="tag-table"> 
                <tr>
                    <center>
                    <td>#<input type="text" name="tag1" class="tags" placeholder = "Tag 1" required></td>
                    <td>#<input type="text" name="tag2" class="tags" placeholder = "Tag 2"></td>
                    <td>#<input type="text" name="tag3" class="tags" placeholder = "Tag 3"></td>
                    </center>
                </tr>
                </table>
                <br>
                <input type="text" name="credit" class="credit" placeholder="Credit Original Uploader">
                <br>
                <br>
                <input type="checkbox" name="nsfw" id="nsfw" value="1"><label for="nsfw">NSFW</label>
                <br>
                <br>
                <center>
                <input type="submit" name="submit" class="submit-content" value="Submit">
                </center>
                </p>
            </form>
        </div>
        <div id="tab2" class="tab">
            <p>
                <form action="upload-video.php" method="POST" enctype="multipart/form-data" autocomplete="off">
                <p>
                <input type="text" name="video_url" placeholder="Youtube URL" class="video-url" required>
                <br>
                <br>
                <input type="text" name="title" class="title" placeholder="Title" required>
                <br>
                <br>
                <table class="tag-table"> 
                <tr>
                    <center>
                    <td># <input type="text" name="tag1" class="tags" placeholder = "Tag 1" required></td>
                    <td># <input type="text" name="tag2" class="tags" placeholder = "Tag 2 "></td>
                    <td># <input type="text" name="tag3" class="tags" placeholder = "Tag 3"></td>
                    </center>
                </tr>
                </table>
                <br>
                <input type="text" name="credit" class="credit" placeholder="Credit Original Uploader">
                <br>
                <br>
                <input type="checkbox" name="nsfw" id="nsfw" value="1"><label for="nsfw">NSFW</label>
                <br>
                <br>
                <center>
                <input type="submit" name="submit" class="submit-content" value="Submit">
                </center>
                </p>
            </form>
            </p>
        </div>
 
    </div>
	</div>

</body>

<script type="text/javascript">
            $(document).ready(function(){
                $(".tags").autocomplete({
                    source:'../search/tag_getautocomplete.php',
                    minLength:1
                });
            });
</script>
<script type="text/javascript">
	
	jQuery(document).ready(function() {
    jQuery('.tabs .tab-links a').on('click', function(e)  {
        var currentAttrValue = jQuery(this).attr('href');
 
        // Show/Hide Tabs
jQuery('.tabs ' + currentAttrValue).siblings().slideUp(400);
jQuery('.tabs ' + currentAttrValue).delay(400).slideDown(400);        // Change/remove current tab to active
        jQuery(this).parent('li').addClass('active').siblings().removeClass('active');
 
        e.preventDefault();
    });
});

</script>
</html>
