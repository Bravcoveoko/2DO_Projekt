$(document).ready(function () {

    // Set all activities for logged user
    callAJAXSetAllActivities();

    // By pressing this button new note is going to be created
    $('#newNote2').click(function() {

        $.ajax({
            url : 'includes/create_new_activity.php',
            type : 'post',
            dataType: "json",
            data : {
                userName : 'Text'
            },
            success : function (data) {
                createActivity(data.id, 100, 100, "#ffffff", "New note");
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
