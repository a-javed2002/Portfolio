<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script>
    // Get the element
</script>
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
                    if (confirm("Are you sure.?<br>once one  to done,only administrative user of project can undo>")) {
                        $.ajax({
                            url: "partials/_board.php",
                            type: "POST",
                            data: {
                                cardId: cardId,
                                cardName: cardName,
                                sourceColumn: sourceColumn,
                                destColumn: destColumn,
                                'drag-drop': 1,
                            },
                            success: function(response) {
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
                    $.ajax({
                            url: "partials/_board.php",
                            type: "POST",
                            data: {
                                cardId: cardId,
                                cardName: cardName,
                                sourceColumn: sourceColumn,
                                destColumn: destColumn,
                                'drag-drop': 1,
                            },
                            success: function(response) {
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

        


        function load_data_all(id, project_id) {
            console.log("loading...!!!")
            $.ajax({
                url: 'partials/_board.php',
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