<html>
<head>
    <link href='http://fonts.googleapis.com/css?family=Josefin+Sans' rel='stylesheet' type='text/css'>

<script type="text/javascript" src="jquery/jquery.js"></script>
	<style type="text/css">

    	/*----- Tabs -----*/
        .tabs {
            width: 50%;
            display:inline-block;
        }
         
        /*----- Tab Links -----*/
        /* Clearfix */
        .tab-links:after {
            display:block;
            clear:both;
            content:'';
        }

        .tab-links{
            margin: 0px;
            padding: 0;
        }

     
        .tab-links li {
            float:left;
            list-style:none;
        }
     
        .tab-links a {
            padding:9px 15px;
            display:inline-block;
            border-radius:3px 3px 0px 0px;
            background:#EEEEEE;
            font-size:16px;
            font-weight:600;
            color:#353535;
            font-family: 'Josefin Sans', sans-serif;
            transition:all linear 0.15s;
            text-decoration: none;
        }
 
        .tab-links a:hover {
            background:#6BB9F0;
            text-decoration:none;
        }
 
        li.active a, li.active a:hover {
            background:#81CFE0;
            color:#353535;
        }
     
        /*----- Content of Tabs -----*/
        .tab-content {
            padding:15px;
            border-top: 0;
            border: black solid 1px;
            border-bottom: black solid 1px;
            border-left: black solid 1px;
            border-right: black solid 1px;
            border-radius:3px;
            
            background:#fff;
        }
 
        .tab {
            display:none;
        }
 
        .tab.active {
            display:block;
        }

	</style>
	<title></title>
</head>
<body>

	<div class="tabs">
    <ul class="tab-links">
        <li class="active"><a href="#tab1">MEMES</a></li>
        <li><a href="#tab2">VIDEOS</a></li>

    </ul>
 
    <div class="tab-content">
        <div id="tab1" class="tab active">
            <form action="upload-image.php" method="POST">
                <p>
                <input type="file" name="meme" required>
                <br>
                <br>
                <input type="text" name="title" placeholder="Title" required>
                <br>
                <br>
                Tags:
                <table> 
                <tr>
                    <td><input type="text" name="tag1" value="#"></td>
                    <td><input type="text" name="tag2" value="#"></td>
                    <td><input type="text" name="tag3" value="#"></td>
                </tr>
                <tr>
                    <td>tag#1</td>
                    <td>tag#2</td>
                    <td>tag#3</td>
                </tr>
                </table>
                <br>
                <br>
                <input type="checkbox" name="nsfw" value="1">NSFW
                <br>
                <br>

                <input type="text" name="credit" placeholder="Credit Original Uploader">
                <br>
                <br>
                <input type="submit" name="submit" value="Submit">
                </p>
            </form>
        </div>
 
        <div id="tab2" class="tab">
            <p>
                <form action="upload-video.php" method="POST">
                <p>
                <input type="text" name="video" placeholder="Youtube URL" required>
                <br>
                <br>
                <input type="text" name="title" placeholder="Title" required>
                <br>
                <br>
                Tags:
                <table> 
                <tr>
                    <td><input type="text" name="tag1" value="#"></td>
                    <td><input type="text" name="tag2" value="#"></td>
                    <td><input type="text" name="tag3" value="#"></td>
                </tr>
                <tr>
                    <td>tag#1</td>
                    <td>tag#2</td>
                    <td>tag#3</td>
                </tr>
                </table>
                <br>
                <br>
                <input type="checkbox" name="nsfw" value="1">NSFW
                <br>
                <br>
                <input type="text" name="credit" placeholder="Credit Original Uploader">
                <br>
                <br>
                <input type="submit" value="Submit">
                </p>
            </form>
            </p>
        </div>
 
    </div>
	</div>

</body>

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