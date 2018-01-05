<?php echo $case_id;?>
<div>
	<div class="container">
		<div class="row">
			<div class="col-md-8 question_container pull-left">
				<div class="input-group">
				  <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
				  <input type="search" class="form-control" placeholder="Search Question" id="search_question" name="search_question" aria-describedby="basic-addon1">
				</div>

				<div class="question_list" style="height:65%;">
					<select multiple class="form-control" style="height:100%;" id="question_select">
						<?php
						foreach($question as $question):
						?>
					  		<option value="<?php echo $question->id; ?>" onclick="showAnswer(<?php echo $question->id; ?>);"><?php echo $question->question_text; ?></option>';
					  	<?php
					  	endforeach;
					  	?>
					</select>
				</div>

			</div>

			<div class="col-md-4 answer_container pull-left">
				<div class="answer_list">
					<select multiple class="form-control" id="answer_select">
						
					<select>
				</div>
				<br>
				<div class="">
					<button type="button" class="form-control btn btn-primary" onclick="addqa()">Add Q/A</button>
				</div>
			</div>		
		</div>
		<br>
		<div class="row">
			<div class="col-md-12" id="selected_qa_container">
			</div>
		</div>
	</div>
	<br>
	<hr>
	<br>
	<div class="container">
		<div class="row">
			<div class="col-md-4 pull-left userdata_column_container" style="height:40%;">
					<select multiple class="form-control" style="height:100%;" id="userdata_column_select" onchange="showData(this.value)">
						<option value="1">District</option>
						<option value="2">City</option>
						<option value="3">State</option>
						<option value="4">Country</option>
						<option value="5">School</option>
						<option value="6">Education Status</option>
						<option value="7">Stream</option>
						<option value="8">Career</option>
						<option value="9">Trait</option>
					</select>
			</div>
			<div class="col-md-4 pull-left userdata_column_response_container" style="height:40%;">
				<select multiple class="form-control" id="userdata_column_response_select" style="height:100%;">
				</select>
			</div>
			<div class="col-md-4">
				<button type="button" class="form-control btn btn-primary" onclick="adduserdata()">Add Userdata</button>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-12" id="selected_cr_container">
				
			</div>
		</div>
	</div>
	<br>
	<hr>
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<button type="button" onclick="final();" class="btn btn-success" style="width:100%;">Finalize</button>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	function final(){
		var case_id = <?php echo $case_id; ?>;
		$.ajax({
			type: "POST",
			url: "<?=site_url('case_question/check_final')?>",
			dataType: "html",
			data: "case_id="+case_id,
			success: function(response){
				if(response === "Yes"){
					window.location.href = "<?=site_url('case_question/index')?>";
				}
				else{
					alert("Please Select a question");
				}
			}
		});
	}
</script>

<script type="text/javascript">
	
	$('#search_question').on('input', function() {
		var str = $(this).val();
	
		$.ajax({
			type: "POST",
			url: "<?=site_url('case_question/search_question')?>",
			dataType: "html",
			data: "str="+str,
			success:function(response){
				$('.question_list').html(response);
			}
		});

	});	
	
</script>

<script type="text/javascript">
	function showAnswer(q_id){
		$.ajax({
			type: "POST",
			url: "<?=base_url()?>case_question/list_answer",
			dataType: "html",
			data:"que_id="+q_id,
			success: function(response){
				$('.answer_list').html(response);
			}
		});

	}
</script>
<script type="text/javascript">
	function addqa(){
		var qid = $('#question_select').val();
		var aid = $('#answer_select').val();
		var case_id = <?php echo $case_id; ?>;

		if( ( !($("#question_select option:selected").length) ) || ( !($("#answer_select option:selected").length) ) ){
			alert("Please select a question and its answer");
		}

		else{
			//alert("qid="+qid+" aid="+aid+" case="+case_id);
			$.ajax({
				type: "POST",
				url: "<?=base_url()?>case_question/addqa",
				dataType: "html",
				data: "question_id="+qid+"&answer_id="+aid+"&case_id="+case_id,
				success: function(response){
					var el = document.getElementById('selected_qa_container');
					el.innerHTML += response;
				}
			});
		}

	}
</script>
<script type="text/javascript">
	function showData(col_id){
		$.ajax({
			type: "POST",
			url: "<?=base_url()?>case_question/userdata_column",
			dataType: "html",
			data: "col_id="+col_id,
			success:function(response){
				$('.userdata_column_response_container').html(response);
			}
		});
	}
</script>
<script type="text/javascript">
	function adduserdata(){
		var udc = $('#userdata_column_select').val();
		var udcr = $('#userdata_column_response_select').val();
		var case_id = <?php echo $case_id; ?>

		if( ( !($("#userdata_column_select option:selected").length) ) || ( !($("#userdata_column_response_select option:selected").length) ) ){
			alert ('Please select a column and its value ');
		}

		else{
			$.ajax({
				type:"POST",
				url: "<?=base_url()	?>case_question/save_case_userdata",
				dataType:"html",
				data:"udc="+udc+"&udcr="+udcr+"&case_id="+case_id,
				success:function(response){
					//alert(response);
					var el = document.getElementById('selected_cr_container');
					el.innerHTML += response;
				}
			});
		}
	}

</script>