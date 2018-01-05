<div class="container">
	
	<!--Row 1 starts -->
	<div class="row">
		<!--Col-1 starts -->
		<div class="col-md-5">
			<div class="case">	
		
				<!--    Case    Search               -->
				 <div class="input-group">
			      <input type="search" class="form-control" name="search_case" id="search_case" placeholder="Search for...">
			      <span class="input-group-btn">
			        <button class="btn btn-default" type="button">Go!</button>
			      </span>
			     </div>
			     <!-- Cases Search end-->

			     <!-- Case Select Star-->
				 <div class="case_list" style="20%;">	
					<select multiple class="form-control" id="case_select">
						<?php foreach($cases as $cases) {?>
					         <option name='case_choose' onclick='showUsers(<?php echo $cases->case_id ?>);'  value="<?php echo $cases->case_id ?>"><?php echo $cases->case_name;?></option><br>   
					     <?php }?>
					</select>
				</div>	
				<!--Case Select End-->
			</div>	
			<!-- Div class case end  -->
		</div>
		<!-- Col -1 ends    -->


		<!-- Col 2 starts  -->
		<div class="col-md-5">
			<div class="user">
				<!--User search starts -->
				<div class="input-group">
				      <input type="search" class="form-control" name="search_user" id="search_user" placeholder="Search for...">
				      <span class="input-group-btn">
				        <button class="btn btn-default" type="button">Go!</button>
				      </span>
				 </div>	
				<!--User search ends --> 	

				<!-- Case Select Star-->
				 <div class="user_list">	
					
				</div>	
				<!--Case Select End-->

			</div>
			<!-- User class ends-->	
		</div> 
		<!-- col 2 ends-->
	</div><br>
	<!-- row end  -->

	<!-- Row 2 starts -->
	<div class="row">
		<div class="col-md-5">
			<div class="draft">
				<!--    draft Search end          -->
				 <div class="input-group">
			      <input type="search" class="form-control" name="search_draft" id="search_draft" placeholder="Search for...">
			      <span class="input-group-btn">
			        <button class="btn btn-default" type="button">Go!</button>
			      </span>
			     </div>
			     <!-- draft Search end-->

			     <!-- draft Select Star-->
				 <div class="draft_list">	
					<select multiple class="form-control">
						
					</select>
				</div><br>	
				<!--Draft Select End-->
				<!-- Create New Draft Button-->
				<div class="creat_new_draft">
					  <div class="create_new_draft_button" style="display:none;">	
						<button class="btn btn-primary" onclick="create_new_draft();">Create New Draft</button>
					  </div><br>	

					  <div class="new_draft" style="display:none;">
						  <form role='form'>
							    <div class='form-group'>
							      <input type='hidden' placeholder='' id='' value='' />
							      <input type='text' class='form-control' name='' id='new_draft_title' placeholder='Title' value=''>
							      <textarea class='form-control' rows='5' cols='62' id='new_draft_content'></textarea>
							    </div>
						  </form>
						  <div class='draft_update_button'>
								<button class='btn btn-primary' onclick='save_new_draft();'>Save</button>
								<button class='btn btn-primary' onclick='save_submit_new_draft();'>Submit</button>
								<button class='btn btn-primary' onclick='close_new_draft();' >Close</button>
						  </div>							  	
					  </div>
				</div>
			</div>
		</div>
		<!-- Col1 Ends -->
		<!-- Col 2 Starts -->
		<div class="col-md-5">
			<div class="draft_sent_list">
				<select multiple class="form-control">
						
				</select>
			</div>
		</div>
	
		<!-- Col 2 Ends -->
	</div>	<br>

	<!-- Row 2 ends -->
	<!-- Row 3 starts -->
	<div class="row">
		<div class="col-md-5">
			<div class="draft_content">
				  
			</div>
		</div>


	</div>
</div>


<script type="text/javascript">
	
	$('#search_case').on('input',function(){

		var str = $(this).val();

		$.ajax({

			url:"<?=site_url('home/searchCases'); ?>",
			data:'str='+str,
			type:'POST',

			success:function(response){

				$('.case_list').html(response);
			}

		});

	});
</script>
<script type="text/javascript">
	
	function showUsers(case_id){


		$.ajax({
				url:"<?=site_url('home/showUsers'); ?>",
				data:'case_id='+case_id,
				type: "POST",
				success: function(response){
				
					$('.user_list').html(response);

				}
		});

		$.ajax({
				url:"<?=site_url('home/showDrafts'); ?>",
				data:'case_id='+case_id,
				type: "POST",
				success: function(response){
				
					$('.draft_list').html(response);
					$('.create_new_draft_button').show();	
				}
		});

		$.ajax({

			url:"<?=site_url('home/showSentDrafts');?>",
			data:'case_id='+case_id,
			type:"POST",

			success:function(response){

				$('.draft_sent_list').html(response);
			}
		});
	}	

</script>
<script type="text/javascript">
	function showdraft(draft_id){
	
		$.ajax({
	url: "<?=site_url('home/showDraftContent'); ?>",
	data:'draft_id='+draft_id,
	type: "POST",
	success: function(response){
		
		$('.new_draft').hide();
		$('.draft_content').html(response);
		$('.draft_content').show();

	}
	});	
}

</script>

<script type="text/javascript">
	
	function update_draft(){

		var draft_content = document.getElementById('draft_content').value;
		var draft_title =document.getElementById('draft_title').value;
		var draft_id = document.getElementById('draft_id').value;

		alert(draft_content+''+draft_title+''+draft_id);
	
		$.ajax({
	url: "<?=site_url('home/updateDraft'); ?>",
	data:'draft_content='+draft_content+'&draft_title='+draft_title+'&draft_id='+draft_id,
	type: "POST",
	success: function(){
		
				
	}
	});
	}
</script>
<script>
  function close_draft(){
  	
  	$('.draft_content').hide();
  }
</script>
<script>
  function create_new_draft(){
  	
  	$('.draft_content').hide();
  	$('.new_draft').show();
  }
</script>
<script type="text/javascript">
	
	function save_new_draft(){

		var draft_content = document.getElementById('new_draft_content').value;
		var draft_title =document.getElementById('new_draft_title').value;
		var case_id = $('#case_select').val();

		if(!draft_title){
		alert("Please enter a draft title");
		}
		else{
				$.ajax({
			url: "<?=site_url('home/saveNewDraft'); ?>",
			data:'draft_content='+draft_content+'&draft_title='+draft_title+'&case_id='+case_id,
			type: "POST",
			success: function(){
				
					$('.new_draft').hide();
					location.reload();
			}
			});
	    }	
	}
</script>


<script type="text/javascript">
	
	function save_submit_new_draft(){

		var draft_content = document.getElementById('new_draft_content').value;
		var draft_title =document.getElementById('new_draft_title').value;
		var case_id = $('#case_select').val();		
		var checkboxes = document.getElementsByName('check');
	    var vals = "";
		for (var i=0, n=checkboxes.length;i<n;i++) {
		  if (checkboxes[i].checked) 
		  {
		  vals += checkboxes[i].value +",";
		  }
		}
		
		if(!draft_title){
			alert("Please enter a draft_title");
		}
		
		else{	
				if(vals===""){

					alert("Please selct a user");
				}
				else{
				$.ajax({

					url:"<?=site_url('home/saveSubmitNewDraft')?>",
					data:'draft_content='+draft_content+'&draft_title='+draft_title+'&case_id='+case_id+'&users_id='+vals,
					type:"POST" ,

					success:function(){

						location.reload();
					}
				});
			  }

			 } 	
	}
</script>
<script>

	function close_new_draft(){

		$('.new_draft').hide();
	}
</script>
<script>

	function submit(){

		var case_id = $('#case_select').val();		
		var draft_id = document.getElementById('draft_id').value;
		var checkboxes = document.getElementsByName('check');
	    var vals = "";
		for (var i=0, n=checkboxes.length;i<n;i++) {
		  if (checkboxes[i].checked) 
		  {
		  vals += checkboxes[i].value +",";
		  }
		}
		
		if(vals===""){

			alert("Please selct a user");
		}
		else{
		$.ajax({

			url:"<?=site_url('home/submitDraft')?>",
			data:'case_id='+case_id+'&draft_id='+draft_id+'&users_id='+vals,
			type:"POST" ,

			success:function(){

				$('.draft_content').hide();
				location.reload();
			}
		});
	  }	
	}
</script>
<script type="text/javascript">
 function selectAll(){
  $('.user').prop('checked', true);
 }

 function unselectAll(){
  $('.user').prop('checked', false);
 }
</script>