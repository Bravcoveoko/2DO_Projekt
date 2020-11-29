<?php include 'includes/config.php' ?>
<?php require 'includes/head_section.php' ?>
<?php include 'includes/navbar.php' ?>

<body>

<!--Div for keep id when content is change-->
<div style="display: none;" id="tmp"></div>

<!-- Crease paper audio-->
<audio id="sound">
    <source src="pokrcenie.mp3" type="audio/ogg">
</audio>

<!-- Choose date TODO-->
<div>
    <p><input type="text" id="datepicker"></p>
</div>

<!-- Popup box-->
<div id="dialog" title="Basic dialog">
    <textarea id="myArea" style="width: 260px; height: 100px;"></textarea>
</div>

<!-- Button to create new activity TODO-->
<a href="#" id="newNote2">Create a new note and get id</a><br>

<!-- Place where are all activities-->
<div id="draggable"></div>

<script>
    $( function() {
        $( "#datepicker" ).datepicker({
            showWeek: true,
            firstDay: 1
        });
    } );
</script>

<!-- Helpers -->
<script src="myJS/Help_functions.js"></script>
<!-- All AJAX functions -->
<script src="myJS/AJAX_functions.js"></script>
<!-- Triggering functions -->
<script src="myJS/Trigger_functions.js"></script>
<!-- Dialog functions-->
<script src="myJS/Dialog_Note_functions.js"></script>
<!-- On ready -->
<script src="myJS/OnReady_functions.js"></script>

</body>