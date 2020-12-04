let draggable = $("#draggable");

let dateDiv = $('#date');

let dayBeforeNull = datepicker.datepicker('getDate');

// Update activity position we are moving with
draggable.on("mouseup", ".sticky", function() {
    callAJAXPositionUpdate($(this).position().left, $(this).position().top, $(this).attr('id'));
})


// Open dialog popup box when we click on pencil icon
draggable.on("click", ".fa-pencil", function() {

    console.log($(this).attr('id'));

    $('#tmp').text($(this).attr('id'));

    $("#dialog").dialog("open");

})

// Remove activity when we click on remove icon and play sound
draggable.on("click", ".fa-times", function() {

    // $('#sound')[0].play();

    let id = $(this).attr('id');


    callAJAXDeleteActivity(id);

})

// Add one day
dateDiv.on('click', '#arrowLeft', function () {

    let currentDate = datepicker.datepicker('getDate');

    checkDate();

    currentDate.setDate( currentDate.getDate() - 1 );
    dayBeforeNull = currentDate;


    datepicker.datepicker('setDate', currentDate);

    callAJAXSetAllActivities();
})

// Subtract on day
dateDiv.on('click', '#arrowRight', function () {
    let currentDate = datepicker.datepicker('getDate');

    checkDate();

    currentDate.setDate( currentDate.getDate() + 1 );
    dayBeforeNull = currentDate;

    datepicker.datepicker('setDate', currentDate);

    callAJAXSetAllActivities();
})