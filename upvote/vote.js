function addVote(id,vote_rank) {
	$.ajax({
	url: "add_vote.php",
	data:'id='+id+'&vote_rank='+vote_rank,
	type: "POST",
	success: function(error){
	var valueElement = $('#upvotes');
	$('.button').text(error);
		switch(vote_rank) {
		case "-2":
		
		 $(".down").attr("src", "resources/down2.png");
	    	    $(".up").attr("src", "resources/up2.png");
	    	   valueElement.text(Math.max(parseInt(valueElement.text()) -1, 0));
		break;

		case "-1":
			$(".down").attr("src", "resources/down2.png");
			$(".up").attr("src", "resources/up2.png");
			valueElement.text(Math.max(parseInt(valueElement.text()), 0));
		break;
		
		case "0.1":
		$(".up").attr("src", "resources/up0.png");
		valueElement.text(Math.max(parseInt(valueElement.text())-1, 0));
		break;
		
		case "0.2":
		
		$(".down").attr("src", "resources/down0.png");
		valueElement.text(Math.max(parseInt(valueElement.text()), 0));
		break;

		case "1":
		$(".up").attr("src", "resources/up1.png");
		$(".down").attr("src", "resources/down1.png");
		valueElement.text(Math.max(parseInt(valueElement.text()) + 1, 0));
		//vote_rank_status = vote_rank_status+1;
		break;
		
		case "2":
		$(".up").attr("src", "resources/up1.png");
		$(".down").attr("src", "resources/down1.png");
		valueElement.text(Math.max(parseInt(valueElement.text()) +1, 0));
		break;

       
	}
	
	}
	});
}