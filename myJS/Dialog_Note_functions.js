// Create Activity (used to create new one or set from DB)
// Id => New ID which is generated in DB
// xPod => Default is 100px
// yPos => Default is 100px
// color => Default is #ffffff
// content => Default is empty string
function createActivity(id, xPos, yPos, color, content, importance) {

    console.log('importance: ' + importance);

    // Main activity
    let note = $('<div class="sticky"><b>Note:</b><p></p></div>').draggable({containment: "#draggable"});

    // Create colorpicker with options
    let colorPicker = $('<input type="color" class="my_color_picker" data-toggle="tooltip" title="Change color">')

    // Create icons (edit & remove)
    let editTextIcon = $('<i class="fa fa-pencil" aria-hidden="true" style="font-size: 20px; cursor: pointer" data-toggle="tooltip" title="Edit note"></i>');
    let removeIcon = $('<i class="fa fa-times" aria-hidden="true" style="font-size: 20px; left: 130px; cursor: pointer" data-toggle="tooltip" title="Remove note"></i>');

    // Check added
    let check = $('<i class="fa fa-exclamation" aria-hidden="true" style="font-size: 20px; left: 160px; cursor: pointer" data-toggle="tooltip" title="Set to important"></i>');

    // Set to all their specific ID
    note.attr('id', ("noteID-" + id));
    colorPicker.attr('id', ("colorID-" + id));
    editTextIcon.attr('id', ("editID-" + id));
    removeIcon.attr('id', ("removeID-" + id));

    // check added
    check.attr('id', ("checkID-" + id));

    // Append all elements to activity
    note.append(colorPicker);
    note.append(editTextIcon);
    note.append(removeIcon);
    note.append(check);

    // Some CSS settings
    if (importance === '1') {
        check.css({'color' : 'red'});
    }else {
        check.css({'color' : 'black'});
    }
    note.find('p').text(content);
    note.css('background-color', color);
    note.css({"top" : (yPos + "px"), "left" : (xPos + "px"), "position": "absolute"}).appendTo("#draggable");
}

// Set up dialog popup box
$( function() {
    $( "#dialog" ).dialog({
        autoOpen: false,
        modal: true,
        title: "Edit your activity",
        show: { effect: "blind", duration: 600 },

        buttons: [
            {
                text: "OK",
                click: function() {

                    let id = $("#tmp").text();

                    console.log("OK: " + id);

                    callAJAXContentUpdate(id);
                    updateContent(id);

                    $( this ).dialog( "close" );
                }
            },
            {
                text: "Close",
                click: function() {
                    $( this ).dialog( "close" );
                }
            }

        ]
    });
} );