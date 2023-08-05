<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Home</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <?php require 'partials/_head.php' ?>
</head>
<style>
    .modal-btn {
        margin-top: 30px;
    }

    .container {
        display: flex;
        flex-direction: row;
        justify-content: space-around;
        align-items: center;
        height: 100%;
        background-color: #f2f2f2;
        padding: 20px;
    }

    .column {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 10px;
        width: 30%;
        min-height: 400px;
        background-color: white;
        border-radius: 5px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    }

    .card {
        margin: 10px 0;
        padding: 10px;
        width: 90%;
        background-color: #cce5ff;
        border-radius: 5px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        cursor: grab;
        user-select: none;
        transition: transform 0.2s ease;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
    }

    .card:active {
        cursor: grabbing;
        transform: translateY(-10px);
        box-shadow: 0 12px 24px 0 rgba(0, 0, 0, 0.2);
        z-index: 1;
    }

    .column-header {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .column-hovered {
        background-color: #d9d9d9;
    }
</style>

<body>



    <?php require 'partials/_header.php' ?>
    <?php require 'partials/_sidebar.php' ?>


    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">

                <div class="container" id="my-work">
                    <!-- <div class="column" id="todo">
                        <div class="column-header">To Do</div>
                        <div class="card" draggable="true">Task 1</div>
                        <div class="card" draggable="true">Task 2</div>
                        <div class="card" draggable="true">Task 3</div>
                    </div>
                    <div class="column" id="doing">
                        <div class="column-header">Doing</div>
                    </div>
                    <div class="column" id="done">
                        <div class="column-header">Done</div>
                    </div> -->
                    <img src="assets/img/loader.gif" alt="">
                </div>
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



                <script>
                    $(document).ready(function() {
                        $(document).ready(function() {
                            let draggedCard = null;
                            let sourceColumn = null;

                            // Add event listeners to cards
                            $(".card").on("dragstart", function() {
                                draggedCard = this;
                                sourceColumn = $(this).closest('.column').data('id');
                                setTimeout(() => (this.style.display = "none"), 0);
                            });

                            $(".card").on("dragend", function() {
                                draggedCard.style.display = "block";
                                draggedCard = null;
                                sourceColumn = null;
                            });

                            // Add event listeners to columns
                            $(".column").on("dragover", function(event) {
                                event.preventDefault();
                            });

                            $(".column").on("dragenter", function(event) {
                                event.preventDefault();
                                $(this).addClass("column-hovered");
                            });

                            $(".column").on("dragleave", function() {
                                $(this).removeClass("column-hovered");
                            });

                            $(".column").on("drop", function() {
                                $(this).removeClass("column-hovered");
                                $(this).append(draggedCard);

                                // Store changes in the database
                                let cardId = $(draggedCard).data("id");
                                let cardName = $(draggedCard).data("name");
                                let destColumn = $(this).data("id");
                                console.log(cardId);
                                console.log(cardName);
                                console.log(sourceColumn);
                                console.log(destColumn);
                                if (destColumn.toLowerCase() == "done") {
                                    console.log("here-1a");
                                    if (confirm("Are you sure.?<br>once one  to done,only administrative user of project can undo>")) {
                                    console.log("here-1b");
                                        $.ajax({
                                            url: "partials/_z.php",
                                            type: "POST",
                                            data: {
                                                cardId: cardId,
                                                cardName: cardName,
                                                sourceColumn: sourceColumn,
                                                destColumn: destColumn,
                                                'drag-drop': 1,
                                            },
                                            success: function(response) {
                                            console.log("suc--1")
                                                $("#msg").html(response);

                                                <?php
                                                if (isset($_GET['id'])) {
                                                    $id = $_GET['id'];
                                                    $c_id = $_SESSION['userId'];
                                                    if ($id == $c_id) {
                                                ?>
                                                        load_data_all(<?php echo $id ?>, 'null');
                                                    <?php
                                                    } else {
                                                    ?>
                                                        // location.replace("page-error-404.php");
                                                        alert("one")
                                                    <?php
                                                    }
                                                    ?>

                                                <?php
                                                } else if (isset($_GET['project'])) {
                                                    $project = $_GET['project'];
                                                    $id = $_SESSION['userId'];
                                                ?>
                                                    load_data_all(<?php echo $id ?>, <?php echo $project ?>);
                                                <?php
                                                } ?>
                                            },
                                            error: function(xhr, status, error) {
                                                $("#msg").html(xhr.responseText);
                                                // alert(xhr.responseText);
                                            }
                                        });
                                    }
                                } else {
                                    console.log("here-2");
                                    $.ajax({
                                        url: "partials/_z.php",
                                        type: "POST",
                                        data: {
                                            cardId: cardId,
                                            cardName: cardName,
                                            sourceColumn: sourceColumn,
                                            destColumn: destColumn,
                                            'drag-drop': 1
                                        },
                                        success: function(response) {
                                            console.log("suc--2")
                                            $("#msg").html(response);

                                            <?php
                                            if (isset($_GET['id'])) {
                                                $id = $_GET['id'];
                                                $c_id = $_SESSION['userId'];
                                                if ($id == $c_id) {
                                            ?>
                                                    load_data_all(<?php echo $id ?>, 'null');
                                                <?php
                                                } else {
                                                ?>
                                                    // location.replace("page-error-404.php");
                                                    alert("one")
                                                <?php
                                                }
                                                ?>

                                            <?php
                                            } else if (isset($_GET['project'])) {
                                                $project = $_GET['project'];
                                                $id = $_SESSION['userId'];
                                            ?>
                                                load_data_all(<?php echo $id ?>, <?php echo $project ?>);
                                            <?php
                                            } ?>
                                        },
                                        error: function(xhr, status, error) {
                                            $("#msg").html(xhr.responseText);
                                            // alert(xhr.responseText);
                                        }
                                    });
                                }
                            });
                        });

<?php
if (!isset($_GET['project_id'])) {
    ?>
    load_data_all(<?php echo $_SESSION['userId']?>,'null');
    <?php
}
?>


                        function load_data_all(id, project_id) {
                            console.log("loading...!!!")
                            $.ajax({
                                url: 'partials/_z.php',
                                type: "POST",
                                data: {
                                    'id': id,
                                    'project_id': project_id,
                                    'my_work': 1,
                                },
                                success: function(data) {
                                    $('#my-work').html(data);
                                },
                                error: function(xhr, status, error) {
                                    alert("error " + xhr.response);
                                }
                            });
                        }
                    });
                </script>


            </div>
        </section>


    </main><!-- End #main -->
    <?php require 'partials/_footer.php' ?>



</body>

</html>