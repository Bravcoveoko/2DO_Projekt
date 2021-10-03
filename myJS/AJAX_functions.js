// Call AJAX to remove note with 'id' variable from DB
function callAJAXDeleteActivity(id) {
    let parsedId = getIdFromString(id);

    $.ajax({
        url : 'includes/activity_remove.php',
        type : 'post',
        dataType: "json",
        data : {
            id : parsedId,
        },

        success : function () {
        },

        error : function () {
        }

    });

    let noteID = "#noteID-" + parsedId;

    $(noteID).remove();
}



// *************************************************

// AJAX to get all user's activities
function callAJAXSetAllActivities() {

    deleteALlNotes();

    $.ajax({
        url : 'includes/activity_setup.php',
        type : 'post',
        dataType: "json",
        data : {
            date : datepicker.val()
        },

        success : function (data) {
            setActivities(data);
        },

        error : function() {
        },

    });

}

// *******************************************

// AJAX to update position of activity we are moving with
// xPos => new x position
// yPos => new y position
// id => number of activity
function callAJAXPositionUpdate(xPos, yPos, id) {

    let parsedID = getIdFromString(id);

    $.ajax({
        url : 'includes/activity_update_position.php',
        type : 'post',
        dataType: "json",
        data : {
            id : parsedID,
            xPos : xPos,
            yPos : yPos
        },

        success : function () {
        },

        error : function () {
            window.location.href = 'http://localhost/stickers/index.php'
        }

    });
}

// ****************************************************

// AJAX to update content od activity
// id => number id of activity
function callAJAXContentUpdate(id) {
    let parsedID = getIdFromString(id);

    $.ajax({
        url : 'includes/acitivity_update_content.php',
        type : 'post',
        dataType: "json",
        data : {
            id : parsedID,
            content : $('#myArea').val().substr(0, 90)
        },

        success : function () {
        },

        error : function () {
        }

    });

}

// ***************************************************

// AJAX to update color
// that => Object that has to be changed
// color => which color has to be set
function callAJAXColorUpdate(that, color) {

    let parsedID = getIdFromString(that.attr('id'));

    $.ajax({
        url : 'includes/activity_update_color.php',
        type : 'post',
        dataType: "html",
        data : {
            id : parsedID,
            color : color
        },

        success : function () {
        },

        error : function () {
        }

    });
}