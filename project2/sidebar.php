<html>
<head>
	<title>Javascript at Work</title>
	<style type="text/css">
		*{
			margin: 0;
			padding: 0;
		}
		.topbar{
			background-color: #1abc9c;
			text-align: center;
			width: 100%;
			font-size: 22px;		
			color: white;
			padding: 8px 0px;	
			height: 40px;
		}
		.form-container{
			margin:20px auto;
			width: 170px;
			text-align: center;	
			display: none;	
		}		
		.form-container div{
			background-color: #2980b9;
			padding: 5px;
			width: 192px;
			margin-left: 5px;
			cursor: pointer;
		}
		.form-container	div:hover{
			background-color: #3498db;
		}
		input,textarea{
			border: 0;
			box-shadow: 0;
			margin: 5px;
			font-size: 18px;
		}		
		.topbar div{
			float:left;
			margin-left: 40%;
		}
		.topbar img{
			float: right;
			width: 24px;
			height: 24px;
			border: 1px solid white;
			border-radius: 50%;
			cursor: pointer;
			margin:4px 15px 0px 0px;
		}
		body{
			font-family: 'Open Sans';		
			background-color: #2c3e50;
			color: white;
			font-size: 18px;
		}
		.main-body{
			margin-top:50px;
		}
		.lists{
			width: 100%;
			text-align: center;
			padding: 7px;			
			border-bottom: 1px solid #34495e;
			cursor: pointer;		
			height: 25px;	
		}
		.top{
			border-top:  1px solid #34495e;
		}
		.lists:hover{
			background-color: #34495e;				
		}
		.note{
			margin:10px auto 10px auto;
			background-color: rgb(253,252,189);
			color: black;
			padding: 8px;
			width: 200px;
			min-height: 200px;
			display: none;
		}		
		.lists span{
			float: right;
			font-size: 9px;
			margin-right: 15px;
			padding-top: 6px;
		}
		.lists div{
			float:left;
			margin-left: 40%;

		}
	</style>
</head>
<body>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<div class="topbar">
		<div class="center-logo">Notes</div>	
		<img src="add.png" id='img'>
	</div>	
	<div class='form-container'>
		<form action="test3.php" metho0d="POST" id="form">
		<input type='text' id='name' placeholder='Name' name="name">
		<textarea id='note' cols=17 rows=6 placeholder='Note' name="note"	></textarea>
		<button id="create">Create</button>
		</form>
	</div>
	<div class="main-body" id="main">

		<div class="lists" id='list1'>
			<div>Test</div>		
		</div>
		<div class='note' id='note1' contenteditable=TRUE>
				Hi! This is great
		</div>
		
	</div>	
</body>
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
	$('.lists').click(function(){
		id = $(this).attr('id');		
		id = id.split('list');	
		id=id[1];				
		$('#note'+id).fadeToggle();
	});
	$('#img').click(function(){		
		$('.form-container').fadeToggle();
	});

	$('#create').click(function(){

		var data= $("#form :input").serializeArray();

		//$.post($"#form").attr("action"),data,function(info){
        //} );
		name = $('input').val();
		note = $('textarea').val();
		create(name,note);
		clearInput();

		
		$('.form-container').hide();


			
	});
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
		$(main_note).attr('id','note'+id);
		main_body.appendChild(list_element);
		main_body.appendChild(main_note);
		$(list_element).click(function(){
		id = $(this).attr('id');		
		id = id.split('list');	
		id=id[1];				
		$('#note'+id).fadeToggle();
	});
	}

    $("#form").submit(function(){

    	return false ;
    });

    function clearInput(){

    	$("#form :input").each(function(){

    		$(this).val('');
    	});
    }
	});
	
	
</script>
</html>