let draggable = $("#draggable");

// Update activity position we are moving with
draggable.on("mouseup", ".sticky", function() {
    callAJAXPositionUpdate($(this).position().left, $(this).position().top, $(this).attr('id'));
})

// Open dialog popup box when we click on pencil icon
draggable.on("click", ".fa-pencil", function() {

    $('#tmp').text($(this).attr('id'));

    $("#dialog").dialog("open");

})

// Remove activity when we click on remove icon and play sound
draggable.on("click", ".fa-times", function() {

    // $('#sound')[0].play();

    let id = $(this).attr('id');


    callAJAXDeleteActivity(id);

})