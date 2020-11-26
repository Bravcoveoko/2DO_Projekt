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
<div>
    <p><input type="text" id="datepicker"></p>
</div>


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
    $( function() {
        $( "#datepicker" ).datepicker({
            showWeek: true,
            firstDay: 1
        });
    } );
</script>



<script>

    function foo(id, xPos, yPos, color) {
        var setNote, setColorPicker;

        setNote = $('<div class="sticky" id="0"><b>Note:</b>This is new</div>').draggable({containment: "#draggable"});
        setColorPicker = $('<input type="text" class="my_color_picker" id="0">').colorpicker({ok: function () {
                //newNote.css('background', rgb())

                if (jQuery.isEmptyObject($(this).val())) {
                    console.log("null");
                }else {
                    callAJAXColorUpdate($(this), "#" + $(this).val());
                    console.log("daco");
                }

                setNote.css('background-color', "#" + $(this).val());
            }});

        setNote.attr('id', ("uuid-" + id));
        setColorPicker.attr('id', ("uuid-" + id));

        setNote.append(setColorPicker);

        setNote.css('background-color', color);

        setNote.css({"top" : (yPos + "px"), "left" : (xPos + "px"), "position": "absolute"}).appendTo("#draggable");
    }

    function setActivities(data) {
        var len = data.length;


        for(let i = 0; i < len; i++) {

            (function () {
                var id = data[i]['id'];
                var xPos = data[i]['x_position'];
                var yPos = data[i]['y_position'];
                var color = data[i]['color'];
                console.log(id + " " + xPos + " " + yPos + " " + color);

                foo(id, xPos, yPos, color);

                console.log("set");
            })();



        }
    }

    function callAJAXSetAllActivities() {
        $.ajax({
            url : 'includes/activity_setup.php',
            type : 'post',
            dataType: "json",
            // data : {
            //     id : parts[1],
            //     xPos : xPos,
            //     yPos : yPos
            // },

            success : function (data) {
                console.log(data);
                setActivities(data);
            },

            error : function () {
                // console.log("neni updatnuty");
            }

        });

    }

    function callAJAXPositionUpdate(xPos, yPos, id) {

        var parts = id.match(/uuid-(\d+)/);

        $.ajax({
            url : 'includes/activity_update_position.php',
            type : 'post',
            dataType: "json",
            data : {
                id : parts[1],
                xPos : xPos,
                yPos : yPos
            },

            success : function (data) {
                // console.log('Je updatnuty');
            },

            error : function () {
                // console.log("neni updatnuty");
            }

        });
    }

    function callAJAXColorUpdate(that, color) {
        console.log(that);
        var parts = that.attr('id').match(/uuid-(\d+)/);


        $.ajax({
            url : 'includes/activity_update_color.php',
            type : 'post',
            dataType: "json",
            data : {
                id : parts[1],
                color : color
            },

            success : function (data) {
                // console.log('Je updatnuty');
            },

            error : function () {
                // console.log("neni updatnuty");
            }

        });
    }

    function createActivity(newID) {

        var newNote = $('<div class="sticky" id="myid"><b>Note:</b>This is new</div>').draggable({containment: "#draggable"});
        var newColorPicker = $('<input type="text" class="my_color_picker" id="0">').colorpicker({ok: function () {
                //newNote.css('background', rgb())

                if (jQuery.isEmptyObject($(this).val())) {
                    console.log("null");
                }else {
                    callAJAXColorUpdate($(this), "#" + $(this).val());
                }

                newNote.css('background-color', "#" + $(this).val());
            }});

        newNote.attr('id', ("uuid-" + newID));
        newColorPicker.attr('id', ("uuid-" + newID));

        newNote.append(newColorPicker);

        newNote.css({"top" : "100px", "left" : "100px", "position": "absolute"}).appendTo("#draggable");

    }

    let newID = 0;

    // var arr = [];

    $(document).ready(function () {

        callAJAXSetAllActivities();


        $('#newNote2').click(function(e) {
            // var newNote = $('<div class="sticky"><b>Note:</b>This is new</div>');
            // newNote.draggable ({
            //     containment: "#draggable"
            // })
            // $("#draggable").append(newNote);

             $.ajax({
                url : 'includes/create_new_activity.php',
                type : 'post',
                dataType: "json",
                data : {
                    userName : 'Text'
                },
                success : function (data) {
                    // $('#text').html(data['filename']
                    // console.log(data);
                    newID = data.id;
                    // console.log("nove id: " + newID);

                    createActivity(newID);

                },

                error : function(xhr, status, error) {
                    // var err = JSON.parse(xhr.responseText);
                    console.log(status);
                    console.log(error);
                },

                complete : function (data) {
                    console.log(data);
                }

            });

             // console.log("KONECNE: " + newID);





            // $.post('includes/activity_update.php', {username : "text"}, function() {
            //     console.log('ajax maybe');
            // });




        });
    });
</script>

<script>
    $("#draggable").on("mouseup", ".sticky", function() {
        //console.log($(this).position().left, $(this).position().top);
        //console.log($(this).attr('id'));
        //console.log($(this).css("background-color"));

        callAJAXPositionUpdate($(this).position().left, $(this).position().top, $(this).attr('id'));
    })
</script>




<script>
    $( ".sticky" ).draggable({
        containment: "#draggable"
    });

    $(".my_color_picker").colorpicker({
        ok: function (event) {
            console.log("ok");
        }
    });
</script>

<script>
    $('#draggable').on("click", '.my_color_picker', function () {
        var color = $(this).val();
        if (jQuery.isEmptyObject(color)) {
            //console.log("null");
        }else {
           // console.log("neni");
        }
        // $.ajax({
        //         url : 'includes/activity_update.php',
        //         type : 'post',
        //         dataType: "json",
        //         data : {
        //             color : $(this).val();
        //         },
        //     });
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

