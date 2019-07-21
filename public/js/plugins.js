/*function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft = "0";
}*/

/*document.getElementById('tab-0').addEventListener('click', function () {

    document.querySelector('#tab-0').classList.add('tab-0-active');
    document.querySelector('#tab-1').classList.remove('tab-0-active');
    document.querySelector('#tab-2').classList.remove('tab-0-active');

});


document.getElementById('tab-1').addEventListener('click', function () {

    document.querySelector('#tab-1').classList.add('tab-0-active');
    document.querySelector('#tab-2').classList.remove('tab-0-active');
    document.querySelector('#tab-0').classList.remove('tab-0-active');

});

document.getElementById('tab-2').addEventListener('click', function () {

    document.querySelector('#tab-2').classList.add('tab-0-active');
    document.querySelector('#tab-0').classList.remove('tab-0-active');
    document.querySelector('#tab-1').classList.remove('tab-0-active');

});*/


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



