
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


		});

		