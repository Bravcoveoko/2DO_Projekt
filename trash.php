<?php include 'includes/config.php' ?>
<?php require 'includes/head_section.php' ?>
<?php include 'includes/navbar.php' ?>



<div class="list-group">
    <?php include 'includes/get_from_trash.php' ?>

    <h1 style="color: #723CB4; font-size: 30px; font-weight: bolder">Trash</h1>
    <hr>

    <?php if(count($activitiesInTrash) == 0) : ?>
        <h2> Nothing in trash :) </h2>
    <?php else : ?>
        <?php foreach($activitiesInTrash as $activity): ?>
            <a href="#" class="list-group-item list-group-item-action" style="margin-bottom: 10px; cursor:default; box-shadow: 2px 3px grey; border: solid #723CB4" id=" <?php echo "trash-" . $activity['id'] ?> ">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1"><b>Note:</b></h5>
                    <small><?php

                        $newDate = date("d-m-Y", strtotime($activity['created_at']));

                        echo $newDate

                        ?></small>
                </div>

                <b><p class="mb-1"> <?php echo $activity['content'] ?> </p></b>
                <p class="trashButtons reset" style="cursor: pointer">Reset</p>
                <p class="trashButtons remove" style="cursor: pointer">Remove</p>
                <p> </p>
            </a>
        <?php endforeach; ?>
    <?php endif; ?>
</div>


<!-- Dialog functions-->
<script src="myJS/Dialog_Note_functions.js"></script>
<!-- Helpers -->
<script src="myJS/Help_functions.js"></script>

<script>

    function callAJAXResetActivity(id) {
        $.ajax({
            url : 'includes/reset_activity.php',
            type : 'post',
            dataType: "json",
            data : {
                id : id
            },

            success : function (data) {
                console.log(data);
            },

            error : function () {
                // console.log("neni updatnuty");
            }
        });
    }

    function callAJAXRemoveActivity(id) {
        $.ajax({
            url : 'includes/remove_activity_from_db.php',
            type : 'post',
            dataType: "json",
            data : {
                id : id
            },

            success : function (data) {
                console.log(data);
            },

            error : function () {
                // console.log("neni updatnuty");
            }
        });
    }

    // Reset note and remove from trash
    $('.reset').click(function () {

        let parsedID = getIdFromString($(this).parent().attr('id'));


        callAJAXResetActivity(parsedID);
        $(this).parent().remove();

    });

    // Removing from trash and from db as well
    $('.remove').click(function () {
        let parsedID = getIdFromString($(this).parent().attr('id'));

        callAJAXRemoveActivity(parsedID);
        $(this).parent().remove();

    })
</script>
