$(function(event){


	// POST FEED HANDLER


		$(document).on('click','#sharez',function(event){
			
			  var id = $(this).siblings('#feed_id').attr('value');
			  $('#'+id).hide('slow');
	
		 });

		$(document).on('click','#like',function(event){
				
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

		$(document).on('click','#noti',function(event){
				
				var id = $(this).siblings('#feed_id').attr('value');
				alert(id);
			
		 });

		$(document).on('click','#whos',function(event){
				
				var id = $(this).siblings('#feed_id').attr('value');
				alert(id);
			
		 });

		$(document).on('click','#whol',function(event){
				
				var id = $(this).siblings('#feed_id').attr('value');
				alert(id);
			
		 });

		$(document).on('click','#submit',function(event){
				
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

		$(document).on('click','#comment',function(event){
				
				$(this).attr('rows', '4');

				$(this).mouseleave('rows', '1');
			
		 });

		$(document).on('click','#cancel',function(event){
				
			$("#post_feed").load(location.href + " #post_feed");
			
		 });

		$(document).on('click','#cancel_e',function(event){
				
			$("#post_feed").load(location.href + " #post_feed");
			
		 });

		$(document).on('click','#like_c',function(event){
				
			var id = $(this).siblings('#comm_id').attr('value');
				
				$.ajax({

				type:'POST',
				url :'http://localhost/Mayadiary-v1.0/comment_like/insertCommentLike',
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

		$(document).on('click','#done_e',function(event){
				
			var id = $(this).siblings('#comm_id').attr('value');
			var body = $(this).siblings('#edit_comment').val();

			 $.ajax({

				type:'POST',
				url :'http://localhost/Mayadiary-v1.0/comment/updateComment',
				data:{'id':id,'body':body},
				datatype:'json',
				success: function (data) {

			    $("#post_feed").load(location.href + " #post_feed");
	                 
	              },

	            error: function (data) {
	                  
	            alert('failed');

	              }
				});
		
		 });





		$(document).on('click','#edit_c',function(event){
				
			var id = $(this).siblings('#comm_id').attr('value');

			$('#'+id).toggle();
			$('#origin'+id).toggle();
			
		 });

	    $(document).on('click','#delete_com',function(event){
				
			var id = $(this).siblings('#comm_id').attr('value');
			// alert(id);
            var result =  window.confirm("Do you really want to delete this?");

            if(result == true){

            $.ajax({

			type:'POST',
			url :'http://localhost/Mayadiary-v1.0/comment/deleteComment',
			data:{'id':id},
			datatype:'json',
			success: function (data) {

			$("#post_feed").load(location.href + " #post_feed");
                 
              },

            error: function (data) {
                  
            alert('failed');

              }
			});


            }else{



            }
			
		 });


	    $(document).on('click','#option',function(event){
				
			var id = $(this).siblings('#feed_id').attr('value');
			
			$('#extra_m'+id).toggle();
			
		 });


	     $(document).on('click','#del_p',function(event){
				
			var id = $(this).siblings('#feed_id').attr('value');
            var result =  window.confirm("Do you really want to delete this?");

            if(result == true){

            $.ajax({

			type:'POST',
			url :'http://localhost/Mayadiary-v1.0/post/deletePost',
			data:{'id':id},
			datatype:'json',
			success: function (data) {

			$("#post_feed").load(location.href + " #post_feed");
                 
             },

            error: function (data) {
                  
            alert('failed');

              }
			});


            }else{



            }
			
		 });


	     $(document).on('click','#edit_post_button',function(event){
				
			var id = $(this).siblings('#feed_id').attr('value');
			
			$('#editpost'+id).slideToggle();
			
		 });

		 $(document).on('click','#post_e',function(event){
				
			var id = $(this).siblings('#feed_id').attr('value');
			var body = $(this).siblings('#edit_post').val();

			 $.ajax({

				type:'POST',
				url :'http://localhost/Mayadiary-v1.0/post/updatePost',
				data:{'id':id,'body':body},
				datatype:'json',
				success: function (data) {

			    $("#post_feed").load(location.href + " #post_feed");
	                 
	              },

	            error: function (data) {
	                  
	            alert('failed');

	              }
				});
		
		 });




		// END


	  //SUBMIT POST HANDLER

	  	$('#np_send').click(function(event){

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