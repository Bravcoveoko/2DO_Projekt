<?php include 'includes/config.php' ?>
<?php require 'includes/head_section.php' ?>
<?php include 'includes/navbar.php' ?>

<body>

<style>
    .dr { width: 50px; height: 20px; padding: 0.5em; background-color: red;}
    /*#draggable {width: 100%; height: 500px; background-color: #bada55;}*/
    /*.sticky {*/
    /*    position: relative;*/
    /*    top: 100px;*/
    /*    left: 100px;*/
    /*}*/
</style>

<p id="text">asiaisasiajsa</p>

<a href="#" id="newNote2">Create a new note and get id</a><br>
<!--<a href="#" id="printArr">printArr</a>-->
<!--<input type="text" id="my_color_picker">-->


<!--<div class="container">-->
    <div id="draggable">
<!--        <p class="dr">Hello1</p>-->
<!--        <p class="dr">Hello2</p>-->
<!--        <p class="dr">Hello3</p>-->
<!--        <p class="dr">Hello4</p>-->
<!--        <p class="dr">Hello5</p>-->
    </div>
<!--</div>-->

<!--<div id="draggable">-->
<!--</div>-->




<script>
    $(document).ready(function () {
        $('#newNote2').click(function(e) {
            // var newNote = $('<div class="sticky"><b>Note:</b>This is new</div>');
            // newNote.draggable ({
            //     containment: "#draggable"
            // })
            // $("#draggable").append(newNote);
            var newNote = $('<div class="sticky"><b>Note:</b>This is new</div>').draggable({containment: "#draggable"});
            var newColorPicker = $('<input type="text" class="my_color_picker" id="my_color_picker">').colorpicker({ok: function () {
                    //newNote.css('background', rgb())
                    newNote.css('background', "#" + $(this).val());
                }});

            newNote.append(newColorPicker);

            newNote.css({"top" : "100px", "left" : "100px", "position": "absolute"}).appendTo("#draggable");


            // $.post('includes/activity_update.php', {username : "text"}, function() {
            //     console.log('ajax maybe');
            // });

            $.ajax({
                url : 'includes/create_new_activity.php',
                type : 'post',
                dataType: "JSON",
                data : {
                    userName : 'Text'
                },
                success : function (data) {
                    $('#text').html(data['filename'])
                },
                error : function () {
                    console.log("ajax error");
                }

            });





        });
    });
</script>

<script>
    $("#draggable").on("mouseup", ".sticky", function() {
        console.log($(this).position().left, $(this).position().top);
    })
</script>




<script>
    $( ".sticky" ).draggable({
        containment: "#draggable"
    });

    $("#my_color_picker").colorpicker({
        open: function (event) {
            console.log(event);
        }
    });
</script>

<script>
    $('#draggable').on("click", '#my_color_picker', function () {
        console.log("klikol som na color pikcer");
    });

</script>



<script>
    // $(document).ready(function() {
    //     $(function() {
    //         $("#my_color_picker").colorpicker();
    //     });
    // });
</script>

</body>

