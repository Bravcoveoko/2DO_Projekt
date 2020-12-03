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

            createActivity(id, xPos, yPos, color, content);

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