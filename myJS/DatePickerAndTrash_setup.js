/**
 *  Basic setups.
 *
 *  1) Pass date to trash link
 *  2) Crate datepicker
 */

$('#trash').click(function () {
    window.location.href = "trash.php?date=" + datepicker.val();
});

$( function() {
    $( "#datepicker" ).datepicker({
        showWeek: true,
        firstDay: 1,
        currentText: "Now",
        dateFormat: 'dd.mm.yy',
        showAnim: "show",
        defaultDate: new Date()
    }).datepicker("setDate", new Date());
} );

let datepicker = $('#datepicker');