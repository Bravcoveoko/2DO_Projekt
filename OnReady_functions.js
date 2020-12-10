$(document).ready(function () {

    // Set all activities for logged user
    callAJAXSetAllActivities();

    // By pressing this button new note is going to be created
    $('#newNote').click(function() {

        $.ajax({
            url : 'includes/create_new_activity.php',
            type : 'post',
            dataType: "json",
            data : {
                date : datepicker.val()
            },
            success : function (data) {
                createActivity(data.id, 100, 100, "#bec32f", "New note");
            },

            error : function(xhr, status, error) {
                // var err = JSON.parse(xhr.responseText);
                console.log('dsdsds');
                console.log(status);
                console.log(error);
            },

        });

    });
});
