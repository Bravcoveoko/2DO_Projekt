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

<div style="display: none;" id="tmp"></div>

<audio id="sound">
    <source src="pokrcenie.mp3" type="audio/ogg">
</audio>

<p id="text">asiaisasiajsa</p>
<div>
    <p><input type="text" id="datepicker"></p>
</div>

<div id="dialog" title="Basic dialog">
    <textarea id="myArea" style="width: 260px; height: 100px;"></textarea>
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
<!--            <p class="dr">Hello5</p>-->
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

    function foo(id, xPos, yPos, color, content) {
        var setNote, setColorPicker;

        setNote = $('<div class="sticky" id="0"><b>Note:</b><p></p></div>').draggable({containment: "#draggable"});
        var editTextIcon = $('<i class="fa fa-pencil" aria-hidden="true" style="font-size: 20px"></i>');

        var removeIcon = $('<i class="fa fa-times" aria-hidden="true" style="font-size: 20px; left: 130px;"></i>');
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

        setNote.attr('id', ("noteID-" + id));
        setColorPicker.attr('id', ("colorID-" + id));
        editTextIcon.attr('id', ("editID-" + id));
        removeIcon.attr('id', ("removeID-" + id));

        setNote.append(setColorPicker);
        setNote.append(editTextIcon);
        setNote.append(removeIcon);
        setNote.find('p').text(content);

        setNote.css('background-color', color);

        setNote.css({"top" : (yPos + "px"), "left" : (xPos + "px"), "position": "absolute"}).appendTo("#draggable");
    }

    function callAJAXDeleteActivity(id) {
        var parts = id.match(/[a-zA-z]*-(\d+)/);

        $.ajax({
            url : 'includes/activity_remove.php',
            type : 'post',
            dataType: "json",
            data : {
                id : parts[1],
            },

            success : function () {
                console.log('Vymazany');
            },

            error : function () {
                console.log("neni vymazany");
            }

        });

        $(("#" + id)).remove();
    }

    function setActivities(data) {
        var len = data.length;


        for(let i = 0; i < len; i++) {

            (function () {
                var id = data[i]['id'];
                var xPos = data[i]['x_position'];
                var yPos = data[i]['y_position'];
                var color = data[i]['color'];
                var content = data[i]['content'];
                console.log(id + " " + xPos + " " + yPos + " " + color);

                foo(id, xPos, yPos, color, content);

                console.log("set");
            })();



        }
    }

    function callAJAXSetAllActivities() {
        $.ajax({
            url : 'includes/activity_setup.php',
            type : 'post',
            dataType: "json",

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

        var parts = id.match(/[a-zA-z]*-(\d+)/);

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

    function callAJAXContentUpdate(id) {
        var parts = id.match(/[a-zA-z]*-(\d+)/);

        $.ajax({
            url : 'includes/acitivity_update_content.php',
            type : 'post',
            dataType: "json",
            data : {
                id : parts[1],
                content : $('#myArea').val()
            },

            success : function () {
                console.log('Je content');

            },

            error : function () {
                console.log("neni content");
            }

        });

    }


    function callAJAXColorUpdate(that, color) {
        console.log(that);
        var parts = that.attr('id').match(/[a-zA-z]*-(\d+)/);


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

    // HHeewehwuehwuehwuehuehuehwuehuwheuwheuwheuweuweuwheuwheuwehuaaaaaaaaaaaa

    function createActivity(newID) {

        var newNote = $('<div class="sticky" id="myid"><b>Note</b><p>HHeewehwuehwuehwuehuehuehwuehuwheuwheuwheuweuweuwheuwheuwehu</p></div>').draggable({containment: "#draggable"});

        var editTextIcon = $('<i class="fa fa-pencil" aria-hidden="true" style="font-size: 20px"></i>');

        var removeIcon = $('<i class="fa fa-times" aria-hidden="true" style="font-size: 20px; left: 130px;"></i>');

        var newColorPicker = $('<input type="text" class="my_color_picker" id="0">').colorpicker({ok: function () {
                //newNote.css('background', rgb())

                if (jQuery.isEmptyObject($(this).val())) {
                    console.log("null");
                }else {
                    callAJAXColorUpdate($(this), "#" + $(this).val());
                }

                newNote.css('background-color', "#" + $(this).val());
            }});

        newNote.attr('id', ("noteID-" + newID));
        newColorPicker.attr('id', ("colorID-" + newID));
        editTextIcon.attr('id', ("editID-" + newID));
        removeIcon.attr('id', ("removeID-" + newID));

        newNote.append(newColorPicker);
        newNote.append(editTextIcon);
        newNote.append(removeIcon);

        newNote.css({"top" : "100px", "left" : "100px", "position": "absolute"}).appendTo("#draggable");

    }

    let newID = 0;

    // var arr = [];

    $(document).ready(function () {

        callAJAXSetAllActivities();


        $('#newNote2').click(function(e) {

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
                    console.log('dsdsds');
                    console.log(status);
                    console.log(error);
                },

            });

        });
    });
</script>

<script>

    function updateContent(id) {
        var parts = id.match(/[a-zA-z]*-(\d+)/);

        var noteId = "noteID-" +  parts[1];
        var newContent = $('#myArea').val();

        console.log("ID: " + noteId);
        console.log("content: " + newContent);
        console.log($("#" + noteId).find('p').text());
        $("#" + noteId).find('p').text(newContent);
        $('#myArea').val('');
    }

    $( function() {
        console.log();
        $( "#dialog" ).dialog({
            autoOpen: false,
            modal: true,
            title: "Edit your activity",
            show: { effect: "blind", duration: 600 },

            buttons: [
                {
                    text: "OK",
                    click: function() {
                        var id = $("#tmp").text();
                        callAJAXContentUpdate(id);
                        updateContent(id);
                        $( this ).dialog( "close" );
                    }
                },
                {
                    text: "Close",
                    click: function() {
                        $( this ).dialog( "close" );
                    }
                }

            ]
        });
    } );

</script>

<script>
    $("#draggable").on("mouseup", ".sticky", function() {
        callAJAXPositionUpdate($(this).position().left, $(this).position().top, $(this).attr('id'));
    })

    $("#draggable").on("click", ".fa-pencil", function() {

        $('#tmp').text($(this).attr('id'));

        $("#dialog").dialog("open");

        //$("#tbIntervalos").find("td").attr("id", horaInicial);

        //callAJAXContentUpdate($(this).attr('id'));

    })

    $("#draggable").on("click", ".fa-times", function() {
        // console.log($(this).attr('id'));

        // $(document).on('submit', '#sample', function()  {
        //     buzzer.play();
        //     return false;
        // });

        $('#sound')[0].play();
        var id = $(this).attr('id');


        callAJAXDeleteActivity(id);

        console.log("#" + id);



        // var strId = "#" + id;
        // $('#draggable').remove($(strId));
        //
        // console.log("done");

    })

</script>


</body>