<?php include 'includes/config.php' ?>
<?php require 'includes/head_section.php' ?>
<?php include 'includes/navbar.php' ?>

<body>

<!--Div for keep id when content is change-->
<div style="display: none;" id="tmp"></div>

<!-- Crease paper audio-->
<!--<audio id="sound">-->
<!--    <source src="pokrcenie.mp3" type="audio/ogg">-->
<!--</audio>-->

<!-- Choose date TODO-->
<div id="date">
    <p>
        <i class="fa fa-arrow-left" id="arrowLeft" aria-hidden="true" style="color: #723CB4;"></i>
        <input type="text" id="datepicker" placeholder="Pick your date.." onchange="checkDate();">
        <i class="fa fa-arrow-right" id="arrowRight" aria-hidden="true" style="color: #723CB4;"></i>
    </p>
</div>

<!-- Popup box-->
<div id="dialog" title="Basic dialog">
    <textarea id="myArea" style="width: 260px; height: 100px;"></textarea>
</div>

<!-- Button to create new activity TODO-->
<a href="#" id="newNote2">Create a new note and get id</a><br>

<!-- Place where are all activities-->
<div id="draggable" ></div>

<!-- Prepare datepicker -->
<script>

    $( function() {
        $( "#datepicker" ).datepicker({
            showWeek: true,
            firstDay: 1,
            currentText: "Now",
            dateFormat: 'dd.mm.yy',
            showAnim: "show",
            defaultDate: new Date()
        }).datepicker("setDate", new Date());
    } );

    let datepicker = $('#datepicker');
</script>

<!-- All AJAX functions -->
<script src="myJS/AJAX_functions.js"></script>
<!-- On ready -->
<script src="myJS/OnReady_functions.js"></script>
<!-- Triggering functions -->
<script src="myJS/Trigger_functions.js"></script>
<!-- Dialog functions-->
<script src="myJS/Dialog_Note_functions.js"></script>
<!-- Helpers -->
<script src="myJS/Help_functions.js"></script>



</body>