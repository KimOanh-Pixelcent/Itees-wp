jQuery(function($){ 
	$('.project_loadmore').click(function(){
 
		var button = $(this),
		    data = {
			'action': 'projectloadmore',
			'query': project_loadmore_params.posts, 
			'page' : project_loadmore_params.current_page
		};
 
		$.ajax({ // you can also use $.post here
			url : project_loadmore_params.ajaxurl, // AJAX handler
			data : data,
			type : 'POST',
			beforeSend : function ( xhr ) {
				button.text('Loading...'); // change the button text, you can also add a preloader image
			},
			success : function( data ){
				if( data ) { 
					button.text( 'Load More' ).prev().before(data); // insert new posts
					project_loadmore_params.current_page++;
 
					if ( project_loadmore_params.current_page == project_loadmore_params.max_page ) 
						button.remove(); 

					$('.append-more-project').append(data);
					if ( project_loadmore_params.current_page == project_loadmore_params.max_page ) {
						button.remove(); 
					}
				} else {
					button.remove(); // if no data, remove the button as well
				}

			}
		});
	});
});