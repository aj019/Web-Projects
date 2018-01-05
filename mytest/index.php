<?php

require('init.php');

$id = 15;
		
		//get the users id from the session id
		$user_id = 10;
		
		//see if item has already been "liked" by the user
		$sql = "Select * FROM favorites WHERE user_id = '$user_id' AND item_id = '$id'";
		$res = mysql_query($sql, $conn);
		$num_rows = mysql_num_rows($res);
																																
		if ($num_rows == 0) {
			echo "<button href='#' class='like-button' onclick='favorite(".$id.")'>Like</button>";
		}
		elseif ($num_rows == 1) {
			echo "<button href='#' class='unlike-button' onclick='favorite(".$id.")'>Unlike</button>";
		}

?>

<!DOCTYPE html>
		<html>
		<head>
			<title></title>
			<script type="text/javascript" src="jquery/jquery.js"></script>
			<script type="text/javascript" >

	 $('.like-button').click(function(){
    
        var obj = $(this);
        if( obj.data('liked') ){
            obj.data('liked', false);
            obj.html('Like');
        }
        else{
            obj.data('liked', true);
            obj.html('Unlike');
        }
         
		});

        $('.unlike-button').click(function(){

		var obj = $(this);
        if( obj.data('unlike') ){
            obj.data('unlike', false);
            obj.html('Unlike');
        }
        else{
            obj.data('unlike', true);
            obj.html('Like');
        }
		});
		
		function favorite(str) { 
			xmlHttp=GetXmlHttpObject();
			if (xmlHttp==null) {
				alert ("Browser does not support HTTP Request");
				return;
			}
			
		//enter the location of your AJAX/PHP file below	
		var url= "favorite.php";
		//adds the id onto your url so the you can "GET" it
		url=url+"?id="+str;
		url=url+"&sid="+Math.random();
		xmlHttp.onreadystatechange=stateChanged;
		xmlHttp.open("GET",url ,true);
		xmlHttp.send(null);
		}
		
		function GetXmlHttpObject() {
			var xmlHttp=null;
			try
		{
		
			xmlHttp=new XMLHttpRequest();
		}
		//catch the error
		catch (e)
		{
		try
		{
		xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
		}
		catch (e)
		{
		xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		}
		return xmlHttp;
		}
		

			</script>
		</head>
		<body>
		
		</body>
		</html>		