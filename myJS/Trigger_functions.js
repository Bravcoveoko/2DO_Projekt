let draggable = $("#draggable");

let dateDiv = $('#date');
let rightTrigger = false;
let leftTrigger = false;
let dayBeforeNull = datepicker.datepicker('getDate');


// Update activity position we are moving with
draggable.on("mouseup", ".sticky", function() {
    callAJAXPositionUpdate($(this).position().left, $(this).position().top, $(this).attr('id'));
})


// Open dialog popup box when we click on pencil icon
draggable.on("click", ".fa-pencil", function() {

    console.log($('#myModal'));

    $('#tmp').text($(this).attr('id'));

    $('#myArea').val($(this).parent().find('p').text());

    $("#myModal").css('display', 'block');

})

// ************** CHECK *********************
draggable.on("click", ".fa-exclamation", function () {
    console.log($(this).attr('id'));

    if ( $(this).css('color') === "rgb(255, 0, 0)" ) {

        $(this).css({"color": "black"});
        callAJAXImportanceUpdate($(this).attr('id'), false);

    }else {

        $(this).css({"color": "red"});
        callAJAXImportanceUpdate($(this).attr('id'), true);
    }

})

// Remove activity when we click on remove icon and play sound
draggable.on("click", ".fa-times", function() {

    // Play sound
    // $('#sound')[0].play();

    let id = $(this).attr('id');

    callAJAXDeleteActivity(id);

})

// Add one day
dateDiv.on('click', '#arrowLeft', function () {

    let currentDate = datepicker.datepicker('getDate');
    dayBeforeNull = currentDate;

    leftTrigger = true;

    checkDate();

    currentDate.setDate( currentDate.getDate() - 1 );

    datepicker.datepicker('setDate', currentDate);

    callAJAXSetAllActivities();
})

dateDiv.on('change', '#datepicker', function () {
    let newDate = datepicker.datepicker('getDate');

    datepicker.datepicker('setDate', newDate);

    callAJAXSetAllActivities();
})

// Open dialog popup box when we click on pencil icon
draggable.on("click", ".fa-pencil", function() {

    $('#tmp').text($(this).attr('id'));

    $('#myArea').val($(this).parent().find('p').text());

    $("#dialog").dialog("open");

})

// Subtract on day
dateDiv.on('click', '#arrowRight', function () {

    let currentDate = datepicker.datepicker('getDate');
    dayBeforeNull = currentDate;

    rightTrigger = true;

    checkDate();

    currentDate.setDate( currentDate.getDate() + 1 );

    datepicker.datepicker('setDate', currentDate);

    callAJAXSetAllActivities();
})

draggable.on('change', '.my_color_picker', function () {
    let color = $(this).val();
    callAJAXColorUpdate($(this), color);

    $(this).parent().css('background-color', color);
})




