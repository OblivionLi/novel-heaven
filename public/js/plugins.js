$(document).ready( function () {
    $('#novelCMSTD').DataTable();
} );

$(document).ready( function () {
    $('#novelCMST').DataTable({
        'columnDefs': [ {
            'targets': [4], /* column index */
            'orderable': false, /* true or false */
        }]
    });
} );

$(document).ready( function () {
    $('#chapterCMST').DataTable({
        'columnDefs': [ {
            'targets': [5], /* column index */
            'orderable': false, /* true or false */
        }],
        "oSearch": {"bSmart": false}
    });
} );

$(document).ready( function () {
    $('#userCMSTD').DataTable();
} );

$(document).ready( function () {
    $('#userCMST').DataTable({
        'columnDefs': [ {
            'targets': [5], /* column index */
            'orderable': false, /* true or false */
        }]
    });
} );

$(document).ready( function () {
    $('#chapterT').DataTable( {
        "oSearch": {"bSmart": false}
    } );
} );

$(document).ready(function(){
    $(window).scroll(function () {
        if ($(this).scrollTop() > 50) {
            $('#back-to-top').fadeIn();
        } else {
            $('#back-to-top').fadeOut();
        }
    });
    // scroll body to 0px on click
    $('#back-to-top').click(function () {
        $('#back-to-top').tooltip('hide');
        $('body,html').animate({
            scrollTop: 0
        }, 800);
        return false;
    });

    $('#back-to-top').tooltip.show;

});
