

$(function(event) {



	 $(document).on('click','#upload_logo',function(event){
				
				$('#userphoto').click();
			
	});


	  $(document).on('change','#userphoto',function(event){
				
				$('#profile_update').click();
			
	});

	 $(document).on('click','#cover_logo',function(event){
				
	 			$('#usercover').click();
			
	});


	 $(document).on('change','#usercover',function(event){
				
				$('#cover_update').click();
			
	});
 

	// PROFILE PICTURES
   $('#upload_photoz')
        .submit(function (e) {

            e.preventDefault();
            $.ajaxFileUpload({
                url: "http://localhost/Mayadiary-v1.0/upload/upload_photo"
                , secureuri: false
                , fileElementId: 'userphoto'
                , dataType: 'JSON'
                , success: function (data) {

                    $("#photos")
                        .load(location.href + " #photos>*", "");
                    $("#post_feed")
                            .load(location.href + " #post_feed>*", "");


                }
            });
            return false;
        });

     // COVER PHOto
   $('#upload_coverz')
        .submit(function (e) {

            e.preventDefault();
            $.ajaxFileUpload({
                url: "http://localhost/Mayadiary-v1.0/upload/upload_cover"
                , secureuri: false
                , fileElementId: 'usercover'
                , dataType: 'JSON'
                , success: function (data) {

                     $("#covers")
                         .load(location.href + " #covers>*", "");
                    $("#post_feed")
                             .load(location.href + " #post_feed>*", "");


                }
            });
            return false;
        });



    // PHOTO POST
    $('#upload_file')
        .submit(function (e) {

                e.preventDefault();
                $.ajaxFileUpload({
                    url: "http://localhost/Mayadiary-v1.0/upload/upload_file"
                    , secureuri: false
                    , fileElementId: 'userfile'
                    , dataType: 'JSON'
                    , data: {


                        'title': $('#n_post')
                            .val()
                        , 'receiver': $('#receiver')
                            .val()
                        , 'mood': $("#emo")
                            .val()
                        , 'feel': $('#emo_f')
                            .val(),


                    }
                    , success: function () {

                        $("#post_feed")
                            .load(location.href + " #post_feed>*", "");
                        $("#photo_pr")
                            .load(location.href + " #photo_pr>*", "");
                        $('#n_post')
                            .val('');


                    }
                });
                return false;
           });


});

        