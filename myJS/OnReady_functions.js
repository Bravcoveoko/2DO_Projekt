$(document).ready(function () {

    // Set all activities for logged user
    callAJAXSetAllActivities();

    // By pressing this button new note is going to be created
    $('#newNote2').click(function() {

        // Avoid to create note for not set day
        // if (datepicker.datepicker('getDate') == null) {
        //     alert("Choose date first");
        //     return;
        // }


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
