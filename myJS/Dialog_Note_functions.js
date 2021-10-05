// Create Activity (used to create new one or set from DB)
// Id => New ID which is generated in DB
// xPod => Default is 100px
// yPos => Default is 100px
// color => Default is #ffffff
// content => Default is empty string
function createActivity(id, xPos, yPos, color, content) {

    // Main activity
    let note = $('<div class="sticky"><b>Note:</b><p></p></div>').draggable({containment: "#draggable"});

    // Create colorpicker with options
    let colorPicker = $('<input type="color" class="my_color_picker" data-toggle="tooltip" title="Change color" style="opacity: 0">')

    // Create icons (edit & remove)
    let colorPickerIcon = $('<i class="fa fa-paint-brush" aria-hidden="true" style="font-size: 20px; left: 40px; cursor: pointer" data-toggle="tooltip" title="Edit note"></i>');
    let editTextIcon = $('<i class="fa fa-pencil" aria-hidden="true" style="font-size: 20px; cursor: pointer" data-toggle="tooltip" title="Edit note"></i>');
    let removeIcon = $('<i class="fa fa-times" aria-hidden="true" style="font-size: 20px; left: 150px; cursor: pointer" data-toggle="tooltip" title="Remove note"></i>');

    // Set to all their specific ID
    note.attr('id', ("noteID-" + id));
    colorPicker.attr('id', ("colorID-" + id));
    colorPickerIcon.attr('id', ("colorPickID-" + id));
    editTextIcon.attr('id', ("editID-" + id));
    removeIcon.attr('id', ("removeID-" + id));


    // Append all elements to activity
    note.append(colorPicker);
    note.append(colorPickerIcon);
    note.append(editTextIcon);
    note.append(removeIcon);

    // Some CSS settings
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