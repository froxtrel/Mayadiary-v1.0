
$(function(){

	// VISIBILITY

$('#visib')
    .click(function (event) {

        $('#btn-list')
            .slideToggle();
    });

$('#fr')
    .click(function (event) {

        event.preventDefault();
        $('#value')
            .html('Friends');
        $('#sett_v')
            .val('friends');

    });

$('#pub')
    .click(function (event) {

        event.preventDefault();
        $('#value')
            .html('Public');
        $('#sett_v')
            .val('public');

    });

$('#onl')
    .click(function (event) {

        event.preventDefault();
        $('#value')
            .html('Only me');
        $('#sett_v')
            .val('onlyme');

    });

$('#cus')
    .click(function (event) {

        event.preventDefault();
        $('#value')
            .html('Custom');
        $('#sett_v')
            .val('custom');

    });

$('#edit_pro')
    .click(function (event){

        event.preventDefault();
        $('#profile_setting').slideToggle('slow');
    });

$('#hideinfo')
    .click(function (event){

        event.preventDefault();
        $('#profile_setting').slideToggle('slow');
    });



	// END

	// BEGIN INDEX JS

	$('#register').click(function(event){

			$('#login_show').slideToggle('slow');
			$('#signup_show').slideToggle('slow');

	});

	$('#profile_menu > div ').mouseenter(function(){

			$(this).css({'background-color':'rgba(255,255,255,0.5)','color':'inherit'});	
			$('#profile_menu > div ').not(this).css({"background-color":"inherit",'color':"inherit"});

	});

	// END

    //UPDATE INFO

    $('#update_info')
    .click(function (event){

        var u_name  = $('#username').val();
        var bio     = $('#bio').val();
        var loc     = $('#location').val();
        var web     = $('#websites').val();
        var fb      = $('#facebook').val();
        var go      = $('#google').val();
        var twit    = $('#twitter').val();

       $.ajax({

                type:'POST',
                url :'http://localhost/Mayadiary-v1.0/info/updateInfo',
                data:{'u_name':u_name,'bio':bio,'loc':loc,'web':web,'fb':fb,'go':go,'twit':twit},
                datatype:'json',
                success: function (data) {

               $("#refresh_info").load(location.href + " #refresh_info");            
             
                     
                },

                error: function (data) {
                      
                alert('failed');

                }
         });

    });



    // END

    // ACCOUNT SETTINGS


    $('#account_up').click(function(event){

      var user    = $('#a_user').val();
      var email   = $('#a_email').val();
      var lang    = $('#a_lang').val();
      var country = $('#country').val();
      var video   = $('#video_set').val();

      $.ajax({

                type:'POST',
                url :'http://localhost/Mayadiary-v1.0/info/account',
                data:{'user':user,'email':email,'lang':lang,'country':country,'video':video},
                datatype:'json',
                success: function (data) {

               // $("#refresh_info").load(location.href + " #refresh_info"); 
               alert(data);           
             
                     
                },

                error: function (data) {
                      
                alert('failed');

                }
         });

    });


    // END

  // PRIVACY SETTING

    $('#up_privacy').click(function(event){

     var w_profile = $('#w_profile').val();
     var w_follow = $('#w_follow').val();
     var w_contact = $('#w_contact').val();
     var w_photos = $('#w_photos').val();
     var w_video = $('#w_video').val();
     var w_music = $('#w_music').val();
     var w_bday = $('#w_bday').val();
     var w_timeline = $('#w_timeline').val();
     var off_follow = $('#off_follow').val();

      $.ajax({

                type:'POST',
                url :'http://localhost/Mayadiary-v1.0/info/privacy',
                data:{'wp':w_profile,'wf':w_follow,'wc':w_contact,'wph':w_photos,'wv':w_video,'wm':w_music,'wbd':w_bday,'wt':w_timeline,'off':off_follow},
                datatype:'json',
                success: function (data) {

               // $("#refresh_info").load(location.href + " #refresh_info"); 
               alert(data);           
             
                     
                },

                error: function (data) {
                      
                alert('failed');

                }
         });

    });


    // END

  // EMAIL NOTIFICATION

  $('#up_emailn').click(function(event){

      var fol_y    = $('#fol_y').val();
      var men_y    = $('#men_y').val();
      var sms_n    = $('#sms_n').val();
      var com_y    = $('#com_y').val();
      var like_y   = $('#like_y').val();

      $.ajax({

                type:'POST',
                url :'http://localhost/Mayadiary-v1.0/info/emailn',
                data:{'fol':fol_y,'men':men_y,'sms':sms_n,'com':com_y,'like':like_y},
                datatype:'json',
                success: function (data) {

               // $("#refresh_info").load(location.href + " #refresh_info"); 
               alert(data);           
             
                     
                },

                error: function (data) {
                      
                alert('failed');

                }
         });

    });

  // END

  // WEB NOTIFICATION

  $('#web_up').click(function(event){

      var fol_s    = $('#fol_s').val();
      var men_s    = $('#men_s').val();
      var sms_s    = $('#sms_s').val();
      var com_s    = $('#com_s').val();
      var like_s   = $('#like_s').val();
      var share_s   = $('#share_s').val();

      $.ajax({

                type:'POST',
                url :'http://localhost/Mayadiary-v1.0/info/webn',
                data:{'fol':fol_s,'men':men_s,'sms':sms_s,'com':com_s,'like':like_s,'share':share_s},
                datatype:'json',
                success: function (data) {

               // $("#refresh_info").load(location.href + " #refresh_info"); 
               alert(data);           
             
                     
                },

                error: function (data) {
                      
                alert('failed');

                }
         });

    });

  // END


	// TEXTAREA HANDLER

		var txt = $('#n_post'),
	    hiddenDiv = $(document.createElement('div')),
	    content = null;

			txt.addClass('txtstuff');
			hiddenDiv.addClass('hiddendiv common');

			$('body').append(hiddenDiv);

			txt.on('keyup', function () {

			    content = $(this).val();

			    content = content.replace(/\n/g, '<br>');
			    hiddenDiv.html(content + '<br class="lbr">');

			    $(this).css('height', hiddenDiv.height());

		 });

		// END


       $(".b_color")
             .keyup(function () {

                 var background = $("#b_color")
                     .val();


                 $("body")
                     .css("background-color", background);
             });

         $(".f_color")
             .keyup(function () {

                 var background = $("#f_color")
                     .val();


                 $("body")
                     .css("color", background);
             });

         $(".l_color")
             .keyup(function () {

                 var background = $("#l_color")
                     .val();


                 $("a")
                     .css("color", background);
             });


         $(".b_position")
             .keyup(function () {

                 var background = $("#b_position")
                     .val();


                 $("body")
                     .css("background-position", background);
             });

         $('#attach')
             .on('change', function () {

                 var attach = $(this)
                     .val();

                 $("body")
                     .css("background-attachment", attach);
             });

         $('#repeat')
             .on('change', function () {

                 var repeat = $(this)
                     .val();

                 $("body")
                     .css("background-repeat", repeat);
             });

         $('#enable_design')
             .on('change', function () {

                 var enable = $('#enable_design')
                     .val();

                 if (enable == 'Enable') {

                     $('#s_custom')
                         .show();
                     $('#s_themes')
                         .hide();

                 } else if (enable == 'Disable') {

                     $('#s_custom')
                         .hide();
                     $('#s_themes')
                         .show();

                 } else {

                     $('#s_custom')
                         .hide();
                     $('#s_themes')
                         .show();

                 }

             });


      
       $('#upload_bg')
         .submit(function (e) {

             e.preventDefault();
             $.ajaxFileUpload({
                 url: "http://localhost/Mayadiary-v1.0/upload/upload_bg"
                 , secureuri: false
                 , fileElementId: 'userfile'
                 , dataType: 'JSON'
                 , success: function (img) {

                     $('#files')
                         .html("<img src=\"" + img + "\" ... width='100%' height='100'>");
                     $('body')
                         .css('background-image', 'url(' + img + ')');

                 }
             });
             return false;
         });

  

      $('#s_themes')
          .click(function (event) {

              var bg = $('body')
                  .css('background-image');
              bg = bg.replace('url(', '')
                  .replace(')', '');

              $.ajax({

                  type: 'POST'
                  , url: 'http://localhost/Mayadiary-v1.0/Themes/changeThemes'
                  , data: {
                      'bg': bg
                  }
                  , datatype: 'json'
                  , success: function (data) {

                      // alert(data);
                      $('#themes_status')
                          .html('success')
                          .css('color', 'green');

                  }
                  , error: function (data) {

                      alert('error');

                  }

              });
          });

      $('#s_custom')
          .click(function (event) {

              var bg_color = $('#b_color')
                  .val();
              var bg_position = $('#b_position')
                  .val();
              var bg_attach = $('#attach')
                  .val();
              var bg_repeat = $('#repeat')
                  .val();
              var link_color = $('#l_color')
                  .val();
              var page_color = $('#f_color')
                  .val();

              $.ajax({

                  type: 'POST'
                  , url: 'http://localhost/Mayadiary-v1.0/Themes/changeCustom'
                  , data: {
                      'bg_color': bg_color
                      , 'bg_position': bg_position
                      , 'bg_attach': bg_attach
                      , 'bg_repeat': bg_repeat
                      , 'link_color': link_color
                      , 'page_color': page_color
                  }
                  , datatype: 'json'
                  , success: function (data) {

                      alert(data);

                  }
                  , error: function (data) {

                      alert('error');

                  }

              });
          });
       
       
                $('#acc').click(function(){

                        $('#privacy_set').hide();
                        $('#email_set').hide();
                        $('#web_set').hide();
                        $('#find_set').hide();
                        $('#verify_set').hide();
                        $('#blocked_set').hide();
                        $('#part_1').hide();   
                        $('#account_set').show();               

                });

                  $('#pri').click(function(){

                        $('#account_set').hide();
                        $('#email_set').hide();
                        $('#web_set').hide();
                        $('#find_set').hide();
                        $('#verify_set').hide();
                        $('#blocked_set').hide();
                        $('#part_1').hide();  
                        $('#privacy_set').show();                

                });

                    $('#em').click(function(){

                        $('#privacy_set').hide();
                        $('#account_set').hide();
                        $('#web_set').hide();
                        $('#find_set').hide();
                        $('#verify_set').hide();
                        $('#blocked_set').hide();
                        $('#part_1').hide();  
                        $('#email_set').show();                

                });

                      $('#web').click(function(){

                        $('#privacy_set').hide();
                        $('#email_set').hide();
                        $('#account_set').hide();
                        $('#find_set').hide();
                        $('#verify_set').hide();
                        $('#blocked_set').hide();
                        $('#part_1').hide();  
                        $('#web_set').show();                

                });

                        $('#find').click(function(){

                        $('#privacy_set').hide();
                        $('#email_set').hide();
                        $('#web_set').hide();
                        $('#account_set').hide();
                        $('#verify_set').hide();
                        $('#blocked_set').hide();
                        $('#part_1').hide(); 
                        $('#find_set').show();                 

                });

                        $('#veri').click(function(){

                        $('#privacy_set').hide();
                        $('#email_set').hide();
                        $('#web_set').hide();
                        $('#find_set').hide();
                        $('#account_set').hide();
                        $('#blocked_set').hide();
                        $('#part_1').hide();  
                        $('#verify_set').show();                

                });


                        $('#block').click(function(){

                        $('#privacy_set').hide();
                        $('#email_set').hide();
                        $('#web_set').hide();
                        $('#find_set').hide();
                        $('#verify_set').hide();
                        $('#account_set').hide();
                        $('#part_1').hide();  
                        $('#blocked_set').show();                

                });


                        $('#part').click(function(){

                        $('#privacy_set').hide();
                        $('#email_set').hide();
                        $('#web_set').hide();
                        $('#find_set').hide();
                        $('#verify_set').hide();
                        $('#blocked_set').hide();
                        $('#account_set').hide();   
                        $('#part_1').show();               

                });

        // FOLLOW HANDLER

            $('#follow_u').click(function(event){

              event.preventDefault();
              
              var to   = $('#to').val();
              var from = $('#from').val();


               $.ajax({

                type:'POST',
                url :'http://localhost/Mayadiary-v1.0/follow/addLink',
                data:{'to':to,'from':from },
                datatype:'json',
                success: function (data) {

                $('#follow_u').toggle();          
                $('#unfollow_u').toggle();
                     
                },

                error: function (data) {
                      
                alert('failed');

                }
         });
      });

        // END

     // UNFOLLOW HANDLER

            $('#unfollow_u').click(function(event){

              event.preventDefault();
              
              var target   = $('#to').val();

               $.ajax({

                type:'POST',
                url :'http://localhost/Mayadiary-v1.0/follow/remove',
                data:{'target':target},
                datatype:'json',
                success: function (data) {

                $('#follow_u').toggle();          
                $('#unfollow_u').toggle();          
             
                     
                },

                error: function (data) {
                      
                alert('failed');

                }
         });
      });

        // END

    // MESSAGES HANDLER

         $('#open_sms').click(function(event){

              event.preventDefault();
              $('#click_me').click();

        });
    // END

    // SEND MESSAGES HANDELR

            $('#send_sms').click(function(event){

              event.preventDefault();
              
              var to   = $('#to').val();
              var from = $('#from').val();
              var body = $('#sms_box').val();

               $.ajax({

                type:'POST',
                url :'http://localhost/Mayadiary-v1.0/inbox/addInbox',
                data:{'to':to,'from':from,'body':body},
                datatype:'json',
                success: function (data) {

                $('#close_modal').click(); 
                $('#sms_box').val('');      
                $('#success').click(); 
                     
                },

                error: function (data) {
                      
                alert('failed');

                }
         });
      });

        // END

});

		