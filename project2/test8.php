
<?php

$link = mysql_connect('localhost','root','');
			mysql_select_db('souvenir');
			$query =mysql_query("SELECT note FROM note where nid='24'");
		
			echo mysql_error($link);
	while($rows= mysql_fetch_assoc($query))
{
	//echo $rows['note'];
     $note = $rows['note'];

    // echo "<div class='note' id='note1'>$note</div>";}
}
       


?>

<html>
<head>

	<style type="text/css">


		body{
			margin:0px;
		}

		.left_bar{

			background-color: dimgrey;
			width: 50%;
			height: 800px;
			display: inline-block;
		}

		.right_bar{
			float: right;
		display: inline-block;
		width: 49%;
		}

		.background{
			width: 1500px;
			height: 1000px;
			clear: both;
		}

		.add-img{
			width: 40px;
			height:40px;
			display: inline;
			float: right;
			margin-right: 100px;
		}
		.note{

			height: 50px;
			border: 1px solid black;
		}

		.searchbar{
		height: 30px;
		width: 350px;
		float: left;
		}



		.search-icon{
			display: inline;
			width: 40px; 
			height: 38px;
			background-color: white;
			float: left;
			border-bottom-left-radius: 25px;
			border-top-left-radius: 25px;
			background-image: url('mag.png');
			background-repeat: no-repeat;
			background-position: center;
			background-size: 22px;
			border: 1px solid black;
		}

		.search-block{
			height: 50px;
			width: 310px;
			margin-left: 10px;
			margin-top: 10px;
		}

		input
		{


			border:1px solid black;
			outline:none;
			color:#9e9e9e;
			font-size: 18px;
			margin-bottom: 20px;
			width: 200px;
			height: 40px;
			border-radius: 25px;
			padding-left: 5px;
			border-top-left-radius: 0;
			border-bottom-left-radius: 0;
			float: left;
		}

		.top-bar{
			height: 50px;
			padding-top: 10px;
			padding-left: 20px;	
		}

		.header{
			height: 50px;
			background-color: blue;
			padding: 0px;
		}

		.lists{

			border:1px solid black;
		}


		#name{


			width: 250px;
			height: 40px;
			border:1px solid black;
			border-radius: 0px;
		}

		.note{

			margin: 10px auto 10px auto;
			background-color: rgb(253,252,189);
			color: black;
			padding: 8px;
			width: 200px;
			min-height: 200px;
			display: none;

		}

	</style>
	<title></title>
</head>
<body>


	<div class="background">
		
		<div class="header">

		</div>


		<div class="top-bar">

				<div class="searchbar">

					<div class="search-icon">	
					</div>	
					<input type="Text" placeholder="Search">
	
				</div>			

		</div>
	<div class="left_bar">
		<div class="form-container">

			<div class="note">
				<p style="display: inline; ">NOTES</p>
				<img src="add.png" class="add-img">
			</div>

			<div class="main-body" id="main">

			<div class="lists" id='list1'>
			<div>Test</div>		
			<span>10.15pm</span>	
			</div>
			
			<div class='note' id='note1' contenteditable=TRUE>
				hajhdgshfd f
			</div>
		
	</div>	

		</div>


	</div>

	<div class="right_bar" id='rbar'>
		<form method="POST" action="test3.php"> 
		
				<input type='text' id='name' placeholder="Title"><br><br><br>
	
		<textarea cols="50" rows="20" id="ckeditor" name="editor1" placeholder='NOTE'>
         <?php echo $note ?>
		</textarea><br>
		

		<button id="button">CREATE</button>
	</form>
	</div>
	</div>		

</body>
<!--
<?php




?>
-->
<script type="text/javascript" src="jquery.js"></script>
		
<script type="text/javascript">


$(document).ready(function(){
		
		$(".lists").click(function(){
			id = $(this).attr('id');		
		id = id.split('list');	
		id=id[1];

		$('#ckeditor').hide();			
  		  $('#ckeditor').slideToggle();   
  		  $('#name').hide();
  		  $('#button').hide();
  		//   $('#note'+id).slideToggle();     
     $("#ckeditor").append('<span id="text" style="float:left; font-weight: bold; font-size: 18px; color: red;"> Description text</span>');
	//note = $('#note'+id).html();
	//$('textarea').val()=note;
});

	$("#button").click(function(){
    
		name = $('#name').val();
		note = $('#ckeditor').val();
		alert(note);
		alert(name);
     create(name,note);

	})	;

function create(name,note){
		
		main_body = document.getElementById('main');

		list_element = document.createElement('div');
		
		list_div = document.createElement('div');
		list_div_text=document.createTextNode(name);
		list_div.appendChild(list_div_text);
		list_element.appendChild(list_div);
		$(list_element).attr('class','lists');

		$(list_element).attr('id','list4');

		
		main_note = document.createElement('div');
		main_note_text = document.createTextNode(note);
		main_note.appendChild(main_note_text);
		$(main_note).attr('class','note');
		$(main_note).attr('id','note4');
		main_body.appendChild(list_element);
		main_body.appendChild(main_note);
		$(list_element).click(function(){
		id = $(this).attr('id');		
		id = id.split('list');	
		id=id[1];				
		$('#note'+id).fadeToggle();
	});
	}
	


});



</script>

</html>