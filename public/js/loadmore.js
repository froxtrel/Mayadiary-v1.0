
function count() {

    return count.num = count.num + 3;
}

// initialize count number
count.num = 3;


$(window).scroll(function() {

    if ($(window).scrollTop() + $(window).height() == $(document).height()) {


        var lim = count();

        $.ajax({

            type: 'POST',
            url: 'http://localhost/Mayadiary-v1.0/limit/increaseLimit',
            data: {
                'lim': lim
            },
            success: function(data) {

                // alert(data);

            },

            error: function(data) {

                alert('failed');

            }
        });

    }
});

$(function() {

    $('#load_more').click(function() {

        $("#post_feed").load(location.href + " #post_feed");
 });

    $.ajax({

        type: 'POST',
        url: 'http://localhost/Mayadiary-v1.0/limit/resetLimit',
        success: function(data) {

            // alert(data);

        },

        error: function(data) {

            alert('failed');

        }
    });
});


