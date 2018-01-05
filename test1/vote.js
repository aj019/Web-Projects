function addVote(id,vote_rank) {
	$.ajax({
	url: "add_vote.php",
	data:'id='+id+'&vote_rank='+vote_rank,
	type: "POST",
	success: function(vote_rank_status){
	var votes = parseInt($('#votes-'+id).val());
	var vote_rank_status;// = parseInt($('#vote_rank_status-'+id).val());
	switch(vote_rank) {
		case "1":
		votes = votes+1;
		//vote_rank_status = vote_rank_status+1;
		break;
		case "-1":
		votes = votes-1;
		//vote_rank_status = vote_rank_status-1;
		break;
	}
	$('#votes-'+id).val(votes);
	$('#vote_rank_status-'+id).val(vote_rank_status);
	
	var up,down;
	
	if(vote_rank_status == 1) {
		up="disabled";
		down="enabled";
	}
	if(vote_rank_status == -1) {
		up="enabled";
		down="disabled";
	}	
	var vote_button_html = '<input type="button" title="Up" class="up" onClick="addVote('+id+',\'1\')" '+up+' /><div class="label-votes">'+votes+'</div><input type="button" title="Down" class="down"  onClick="addVote('+id+',\'-1\')" '+down+' />';	
	$('#links-'+id+' .btn-votes').html(vote_button_html);
	}
	});
}