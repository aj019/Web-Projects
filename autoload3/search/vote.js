function addVote(article_id,vote_rank) {
	$.ajax({
	url: "vote.php",
	data:'article_id='+article_id+'&vote_rank='+vote_rank,
	type: "POST",
	success: function(value){
		$('h4').text(value);

		var data = value.split(",");
            $('#upvotes'+article_id).text(data[1]);

         var status=data[0];

         if (status==0) {

         	 $("#down"+article_id).attr("src", "../resources/down1.png");
	    	    $("#up"+article_id).attr("src", "../resources/up2.png");
         }
         else if(status==1){

         	$("#down"+article_id).attr("src", "../resources/down1.png");
	    	    $("#up"+article_id).attr("src", "../resources/up3.png");

         }
         else if(status==2){

         	 $("#down"+article_id).attr("src", "../resources/down2.png");
	    	    $("#up"+article_id).attr("src", "../resources/up2.png");
         }
	}
	});
}