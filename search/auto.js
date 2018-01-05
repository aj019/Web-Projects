		      $('#search_bar').autocomplete({
		      	source: function( request, response ) {
		      		$.ajax({
		      			url : 'search/ajax.php',
		      			dataType: "json",
						data: {
						   name_startsWith: request.term,
						   type: 'search-sugg'
						},
						 success: function( data ) {
							 response( $.map( data, function( item ) {
								return {
									label: item,
									value: item
								}
							}));
						}
		      		});
		      	},
		      	autoFocus: true,
		      	minLength: 1		      	
		      });
		     