// Create Activity (used to create new one or set from DB)
// Id => New ID which is generated in DB
// xPod => Default is 100px
// yPos => Default is 100px
// color => Default is #ffffff
// content => Default is empty string
function createActivity(id, xPos, yPos, color, content) {

    // Main activity
    let note = $('<div class="sticky"><b>Note:</b><p></p></div>').draggable({containment: "#draggable"});

    let pin = $('<div class="pin"></div>');

    // Create colorpicker with options
    let colorPicker = $('<input type="text" class="my_color_picker" data-toggle="tooltip" title="Change color">').colorpicker({ok: function () {

            // TODO: remove replace console log with something different
            if (jQuery.isEmptyObject($(this).val())) {
                console.log("null");
            }else {
                callAJAXColorUpdate($(this), "#" + $(this).val());
                console.log("daco");
            }

            note.css('background-color', "#" + $(this).val());
        }});

    // Create icons (edit & remove)
    let editTextIcon = $('<i class="fa fa-pencil" aria-hidden="true" style="font-size: 20px" data-toggle="tooltip" title="Edit note"></i>');
    let removeIcon = $('<i class="fa fa-times" aria-hidden="true" style="font-size: 20px; left: 130px;" data-toggle="tooltip" title="Remove note"></i>');

    // Set to all their specific ID
    note.attr('id', ("noteID-" + id));
    colorPicker.attr('id', ("colorID-" + id));
    editTextIcon.attr('id', ("editID-" + id));
    removeIcon.attr('id', ("removeID-" + id));

    // Append all elements to activity
    note.append(pin);
    note.append(colorPicker);
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