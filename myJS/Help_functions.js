// Get ID from given string.
// str => Is in format colorID-##, noteID-##.
function getIdFromString(str) {
    let parts = str.match(/[a-zA-z]*-(\d+)/);
    return parts[1];
}

// When user log in all activities have to be set on.
// data => All user's from DB
function setActivities(data) {
    let len = data.length;


    for(let i = 0; i < len; i++) {

        (function () {
            let id = data[i]['id'];
            let xPos = data[i]['x_position'];
            let yPos = data[i]['y_position'];
            let color = data[i]['color'];
            let content = data[i]['content'];
            let importance = data[i]['is_important'];

            createActivity(id, xPos, yPos, color, content, importance);

        })();
    }
}

// Change content of activity we are editing
// id => which activity has to be edited
function updateContent(id) {
    let parsedID = getIdFromString(id);

    let textArea = $('#myArea');
    let noteId = "noteID-" +  parsedID;
    let newContent = textArea.val().substr(0, 90);

    $("#" + noteId).find('p').text(newContent);
    textArea.val('');
}

// Remove all notes. Used to recreate activity board when user chooses new date
function deleteALlNotes() {
    $('.sticky').remove();
}

// If picked date is null has to be set to today date
function checkDate() {
    if ( datepicker.datepicker('getDate') == null) {
        datepicker.datepicker('setDate', new Date());
    }

    if (!leftTrigger && !rightTrigger) {
        callAJAXSetAllActivities();
    }

}