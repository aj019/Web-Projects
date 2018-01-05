<?php

require_once('init.php');
$query = $conn->query("SELECT DISTINCT case_id from `client_requirement` where client_id='1' ");
							
	while($row = $query->fetch_object()){							
		$result[] = $row;
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<div class="case">
	
	<input type='search' name="search_case" id="search_case" >

	<div class="case_list"> 

		
		<?php foreach ($result as $result) { 

		$articlesquery1=
								"SELECT analytics_case.*
							     FROM analytics_case 
							     INNER JOIN client_requirement ON analytics_case.id=client_requirement.case_id 
							     WHERE client_requirement.case_id=$result->case_id
							     GROUP BY analytics_case.id";

							$result3 = mysqli_query($conn, $articlesquery1);
							$row2 = mysqli_fetch_assoc($result3);
							

				    	?>

		<input type="radio"  value="<?php echo $row2['id'] ?>" name="case_choose" onclick="showCustomer(<?php echo $row2['id'] ?>);"><?php echo $row2['case_name'] ?>	

		<?php } ?>

     </div>

</div>

<button onclick="newdraft();">Create a new Draft</button>

<div id="result">
	
	<input type='search' name="search_user" id="search_user" >

	<div class="user_list"> 

		
		
     </div>
	

</div>

<div id="result2"></div>
<div id="result3"></div>

<div id="result1" style="display:none;">
	<input type="text" id="draft_title"><br>
	<textarea rows="20" cols="50" id="new_draft">
		
	</textarea>
	<br>

	<button onclick="save();">Save</button>
	<button onclick="show();">Show</button>
	<button class="close" onclick="close();">Close</button>
	<button></button>
</div>

<div id="result4" style="display:none;">
	<input type="text" id="draft_title1"><br>
	<textarea rows="20" cols="50" id="new_draft1">
		
	</textarea>
	<br>

	<button onclick="savenew();">Save</button>
	<button class="close" onclick="close();">Close</button>
	

</div>
<div class="user_personal">
	<h2>User_personal</h2>
</div>

<script type="text/javascript" src="jquery/jquery.js"></script>
<script type="text/javascript">
	
	function show(){

		var draft_id = document.getElementById('draft_id').value;
		alert(draft_id);
	}
</script>
<script type="text/javascript">
	
	function save(){

		var cleanText = document.getElementById('new_draft').value;
		var draft_title =document.getElementById('draft_title').value;
		var draft_id = document.getElementById('draft_id').value;
		alert(draft_id+1);
		$.ajax({
	url: "save.php",
	data:'cleanText='+cleanText+'&draft_title='+draft_title+'&draft_id='+draft_id,
	type: "POST",
	success: function(){
	
		$('#result2').text("Save successfull");
	}
	});
	}
</script>
<script type="text/javascript">
	
	function savenew(){

		var cleanText = document.getElementById('new_draft1').value;
		var draft_title =document.getElementById('draft_title1').value;
		
		$.ajax({
	url: "save.php",
	data:'cleanText='+cleanText+'&draft_title='+draft_title,
	type: "POST",
	success: function(){
	
		$('#result2').text("Save successfull");
	}
	});
	}
</script>
<script type="text/javascript">
	function showCustomer(case_id){
		
		$.ajax({
	url: "getdraft.php",
	data:'case_id='+case_id,
	type: "POST",
	success: function(response){
	
		$('#result3').html(response);

	}
	});

		

	/*$.ajax({
	url: "showuser.php",
	data:'case_id='+case_id,
	type: "POST",
	success: function(response){
	
		$('.user_list').html(response);

	}
	});

	*/


	$.ajax({
	url: "showuserpersonal.php",
	data:'case_id='+case_id,
	type: "POST",
	success: function(response){
	
		$('.user_personal').html(response);

	}
	});


}

</script>
<script type="text/javascript">
	function showdraft(draft_id){
		alert(draft_id);
		$.ajax({
	url: "showdraft.php",
	data:'draft_id='+draft_id,
	type: "POST",
	success: function(response){
		
		$('#result1').show();
		var data = response.split(",");
		$('#result3').html(data[0]);
		var text =$(data[1]).text();
		$('#new_draft').text(text);

	}
	});	
}

</script>
<script type="text/javascript">
	$(".close").click(function(){
    $("#result4").hide();
    $("#result1").hide();
});
</script>
<script type="text/javascript">
	function newdraft(){

		$('#result4').show();
	}
</script>
<script type="text/javascript">
	
	$('#search_case').on('input',function(){

		var str = $(this).val();

		$.ajax({

			url:"search_case.php",
			data:'str='+str,
			type:'POST',

			success:function(response){

				$('.case_list').html(response);
			}

		});

	});
</script>
<script type="text/javascript">
	
	$('#search_user').on('input',function(){

		var str = $(this).val();
		var case_id = $('input[name=case_choose]:checked').val();

		$.ajax({

			url:"search_user.php",
			data:'str='+str+'&case_id='+case_id,
			type:'POST',

			success:function(response){

				$('.user_list').html(response);
			}

		});

	});
</script>
</body>
</html>