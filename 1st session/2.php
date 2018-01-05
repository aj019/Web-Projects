
<!DOCTYPE html>
<html>
<head>
	<style type="text/css">

 img{


 border-radius: 27px;
margin-top: -7px;
margin-left: -5px;
width: 63px;
height: 69px;
 }



.heading{

width:20px; 
height:20px;


}
.name{
	
margin-top: 2px;
width: 100px;
display: inline;
padding: 5px;
padding-top: 30px;
font-family: "Helvetica",sans-serif;
color: rgb(17, 16, 16);
font-size: 10px;
text-transform: uppercase;
text-decoration: none;
letter-spacing: 0px;
float: left;
}

	</style>
</head>
<body>

</body>
</html>


<?php
function name_card($i)
{
	echo "<div class='name'>  " ;
	echo"<div class='heading'>NAMECARD</div>" ;

	echo " <img src='resources/$i.jpg' >";
	echo "<br>";

	$keyval = array('Name' =>"ANUJ" , 'Batch'=>"1",'Year'=>"2014",'Age'=>"18",'Hobbies'=>"Cricket" );

	foreach ($keyval as $key => $value) {
		echo $key.":".$value;
		echo "<br>";
	}
	}


	for ($i=0; $i <5 ; $i++) { 
		name_card($i+1);# code...
	}
?>