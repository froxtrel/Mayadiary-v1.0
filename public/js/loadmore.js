
function count() {

    return count.num = count.num + 10;
}

// initialize count number
count.num = 10;

$(function() {

    $('#load_more').click(function() {

        $("#post_feed").load(location.href + " #post_feed");

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


