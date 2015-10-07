$(function(){


	// POST FEED HANDLER


		$(document).on('click','#sharez',function(){
			
			  var id = $(this).siblings('#feed_id').attr('value');
			  $('#'+id).hide('slow');
	
		 });

		$(document).on('click','#like',function(){
				
				var id = $(this).siblings('#feed_id').attr('value');
				
				$.ajax({

				type:'POST',
				url :'http://localhost/Mayadiary-v1.0/like/insertLike',
				data:{'id':id},
				datatype:'json',
				success: function (data) {

				 $("#post_feed").load(location.href + " #post_feed");
	                 
	              },

	            error: function (data) {
	                  
	            alert('failed');

	              }
				});
			
		 });

		$(document).on('click','#noti',function(){
				
				var id = $(this).siblings('#feed_id').attr('value');
				alert(id);
			
		 });

		$(document).on('click','#whos',function(){
				
				var id = $(this).siblings('#feed_id').attr('value');
				alert(id);
			
		 });

		$(document).on('click','#whol',function(){
				
				var id = $(this).siblings('#feed_id').attr('value');
				alert(id);
			
		 });

		$(document).on('click','#submit',function(){
				
				var id  = $(this).siblings('#feed_id').attr('value');
				var body = $(this).siblings('#comment').val();
				
				$.ajax({

				type:'POST',
				url :'http://localhost/Mayadiary-v1.0/comment/insertComment',
				data:{'body':body,'id':id},
				datatype:'json',
				success: function (data) {

				 $("#post_feed").load(location.href + " #post_feed");
	                 
	              },

	            error: function (data) {
	                  
	            alert('failed');

	              }
				});
			
		 });

		$(document).on('click','#comment',function(){
				
				$(this).attr('rows', '4');

				$(this).mouseleave('rows', '1');
			
		 });

		$(document).on('click','#cancel',function(){
				
			$("#post_feed").load(location.href + " #post_feed");
			
		 });


		// END


	  //SUBMIT POST HANDLER

	  	$('#np_send').click(function(){

		var body = $('#n_post').val();
		var from = $('#user_from').val();
		var to = $('#user_to').val();

		$.ajax({

			type:'POST',
			url :'http://localhost/Mayadiary-v1.0/post/insertPost',
			data:{'body':body,'from':from,'to':to},
			datatype:'json',
			success: function (data) {

			$("#post_feed").load(location.href + " #post_feed");
			$('#n_post').val('');
                 
              },

            error: function (data) {
                  
            alert('failed');

              }
			});

		});

	  // END


});