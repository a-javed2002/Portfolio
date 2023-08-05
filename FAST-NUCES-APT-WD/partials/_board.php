<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['drag-drop'])) {
        include '_connection.php';
        // Get data from AJAX request
        $cardId = $_POST['cardId'];
        $sourceColumn = strtolower($_POST['sourceColumn']);
        $destColumn = strtolower($_POST['destColumn']);
        $cardName = strtolower($_POST['cardName']);

        echo 'alert("only administrator of project can change state")';
        if ($sourceColumn == "done") {
            exit;
        }

        if ($destColumn == "todo") {
            $status = -1;
        } else if ($destColumn == "doing") {
            $status = 0;
        } else if ($destColumn == "done") {
            $status = 1;
        }

        // Update database

        if ($cardName == "work") {
            $sql = "UPDATE work_items SET status = '$status' , updated_at=NOW() WHERE wk_id = '$cardId'";
        } else {
            $sql = "UPDATE task SET state = '$status' , updated_at=NOW() WHERE wk_id = '$cardId'";
        }
        if ($con->query($sql) === TRUE) {
            // echo 'Card moved successfully';
        } else {
            echo 'Error updating card: ' . $con->error;
        }

        // Close database connection
        $con->close();
    }
}



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['my_work'])) {
        include '_connection.php';
        // Get data from AJAX request
        $id = $_POST['id'];
        $project_id = $_POST['project_id'];

        if ($project_id != 'null') {
            $query = "SELECT * FROM `work_items` WHERE project_id_fk='$project_id'&& assigned_id_fk='$id' && status='-1' ORDER BY updated_at DESC";
            $query2 = "SELECT * FROM `task` WHERE project_id_fk='$project_id' && assigned_id_fk='$id' && state='-1' ORDER BY updated_at DESC";
        } else {
            $query = "SELECT * FROM `work_items` WHERE assigned_id_fk='$id' && status='-1' ORDER BY updated_at DESC";
            $query2 = "SELECT * FROM `task` WHERE assigned_id_fk='$id' && state='-1' ORDER BY updated_at DESC";
        }
        $result = mysqli_query($con, $query);
        if (mysqli_num_rows($result) > 0) {
            echo '<div class="column myColumn " id="todo " data-id="todo">';
            echo '<div class="column-header">To Do(' . mysqli_num_rows($result) . ')</div>';

            while ($data = mysqli_fetch_assoc($result)) {
?>
                <div class="card" draggable="true" data-name="work" data-id="<?php echo $data['wk_id']; ?>">
                    <div class="card-header">
                        <i class="fas fa-id-card"></i> ID: <?php echo $data['wk_id']; ?>
                    </div>
                    <div class="card-body">
                        <div class="card-title">
                            <i class="fas fa-book"></i> Title: <?php echo $data['title']; ?>
                        </div>
                        <div class="card-text">



                            <i class="fas fa-calendar-alt"></i> Created at: <?php echo $data['created_at']; ?>
                            <br>
                            <i class="fas fa-calendar-check"></i> Updated at: <?php echo $data['updated_at']; ?>
                            <div class="row">
                                <div class="col-lg-6 col-sm-12">
                                    <i class="fas fa-folder"></i> Path: <?php echo $data['path']; ?>
                                </div>
                                <div class="col-lg-6 col-sm-12">
                                    <?php
                                    $id = $data['user_id_fk'];
                                    $q = "SELECT * FROM `users` WHERE user_id='$id'";
                                    $r = mysqli_query($con, $q);
                                    $d2 = mysqli_fetch_assoc($r)
                                    ?>
                                    <i class="fas fa-user"></i> User: <?php echo $d2['username']; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
        } else {
            echo '<p>No Record Found,Create Work Item</p>';
        }

        $result = mysqli_query($con, $query2);
        if (mysqli_num_rows($result) > 0) {
            while ($data = mysqli_fetch_assoc($result)) {
            ?>
                <div class="card" draggable="true" data-id="<?php echo $data['task_id']; ?>">
                    <div class="card-header">
                        <i class="fas fa-id-card"></i> ID: <?php echo $data['task_id']; ?>
                    </div>
                    <div class="card-body">
                        <div class="card-title">
                            <i class="fas fa-book"></i> Title: <?php echo $data['task_name']; ?>
                        </div>
                        <div class="card-title">
                            <i class="fas fa-book"></i> Title: <?php echo $data['task_nature']; ?>
                        </div>
                        <div class="card-text">
                            <i class="fas fa-calendar-alt"></i> Created at: <?php echo $data['create_at']; ?>
                            <br>
                            <i class="fas fa-calendar-check"></i> start at: <?php echo $data['start']; ?>
                            <br>
                            <i class="fas fa-calendar-check"></i> Updated at: <?php echo $data['updated_at']; ?>
                            <div class="row">
                                <div class="col-lg-6 col-sm-12">
                                    <?php
                                    $id = $data['project_id_fk'];
                                    $q = "SELECT * FROM `project` INNER JOIN `users` on `project`.`user_id_fk`=`users`.`user_id` WHERE project_id='$id'";
                                    $r = mysqli_query($con, $q);
                                    $d2 = mysqli_fetch_assoc($r)
                                    ?>
                                    <br>
                                    <div style="display: flex;justify-content: center;">
                                        <i class="fas fa-box"></i> Project: <?php echo $d2['project_name']; ?>
                                    </div>
                                    <div style="display: flex;justify-content: center;">
                                        <i class="fas fa-user"></i> Assigned By: <?php echo $d2['username']; ?>
                                    </div>

                                </div>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
            <?php
            }
        } else {
            echo 'no task todo';
        }

        echo '</div>';

        if ($project_id != 'null') {
            $query = "SELECT * FROM `work_items` WHERE project_id_fk='$project_id'&& assigned_id_fk='$id' && status='0' ORDER BY updated_at DESC";
            $query2 = "SELECT * FROM `task` WHERE project_id_fk='$project_id' && assigned_id_fk='$id' && state='0' ORDER BY updated_at DESC";
        } else {
            $query = "SELECT * FROM `work_items` WHERE assigned_id_fk='$id' && status='0' ORDER BY updated_at DESC";
            $query2 = "SELECT * FROM `task` WHERE assigned_id_fk='$id' && state='0' ORDER BY updated_at DESC";
        }
        $result = mysqli_query($con, $query);
        if (mysqli_num_rows($result) > 0) {
            echo '<div class="column myColumn" id="doing" data-id="doing">';
            echo '<div class="column-header">Doing(' . mysqli_num_rows($result) . ')</div>';

            while ($data = mysqli_fetch_assoc($result)) {
            ?>
                <div class="card" draggable="true" data-name="work" data-id="<?php echo $data['wk_id']; ?>">
                    <div class="card-header">
                        <i class="fas fa-id-card"></i> ID: <?php echo $data['wk_id']; ?>
                    </div>
                    <div class="card-body">
                        <div class="card-title">
                            <i class="fas fa-book"></i> Title: <?php echo $data['title']; ?>
                        </div>
                        <div class="card-text">
                            <i class="fas fa-calendar-alt"></i> Created at: <?php echo $data['created_at']; ?>
                            <br>
                            <i class="fas fa-calendar-check"></i> Updated at: <?php echo $data['updated_at']; ?>
                            <div class="row">
                                <div class="col-lg-6 col-sm-12">
                                    <i class="fas fa-folder"></i> Path: <?php echo $data['path']; ?>
                                </div>
                                <div class="col-lg-6 col-sm-12">
                                    <?php
                                    $id = $data['user_id_fk'];
                                    $q = "SELECT * FROM `users` WHERE user_id='$id'";
                                    $r = mysqli_query($con, $q);
                                    $d2 = mysqli_fetch_assoc($r)
                                    ?>
                                    <i class="fas fa-user"></i> User: <?php echo $d2['username']; ?>
                                </div>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
            <?php
            }
        } else {
            echo '<p>No Record Found,Drag and Drop here,to show others,you are working</p>';
        }

        $result = mysqli_query($con, $query2);
        if (mysqli_num_rows($result) > 0) {
            while ($data = mysqli_fetch_assoc($result)) {
            ?>
                <div class="card" draggable="true" data-id="<?php echo $data['task_id']; ?>">
                    <div class="card-header">
                        <i class="fas fa-id-card"></i> ID: <?php echo $data['task_id']; ?>
                    </div>
                    <div class="card-body">
                        <div class="card-title">
                            <i class="fas fa-book"></i> Title: <?php echo $data['task_name']; ?>
                        </div>
                        <div class="card-title">
                            <i class="fas fa-book"></i> Title: <?php echo $data['task_nature']; ?>
                        </div>
                        <div class="card-text">
                            <i class="fas fa-calendar-alt"></i> Created at: <?php echo $data['create_at']; ?>
                            <br>
                            <i class="fas fa-calendar-check"></i> start at: <?php echo $data['start']; ?>
                            <br>
                            <i class="fas fa-calendar-check"></i> Updated at: <?php echo $data['updated_at']; ?>
                            <div class="row">
                                <div class="col-lg-6 col-sm-12">
                                    <?php
                                    $id = $data['project_id_fk'];
                                    $q = "SELECT * FROM `project` INNER JOIN `users` on `project`.`user_id_fk`=`users`.`user_id` WHERE project_id='$id'";
                                    $r = mysqli_query($con, $q);
                                    $d2 = mysqli_fetch_assoc($r)
                                    ?>
                                    <br>
                                    <div style="display: flex;justify-content: center;">
                                        <i class="fas fa-box"></i> Project: <?php echo $d2['project_name']; ?>
                                    </div>
                                    <div style="display: flex;justify-content: center;">
                                        <i class="fas fa-user"></i> Assigned By: <?php echo $d2['username']; ?>
                                    </div>

                                </div>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
            <?php
            }
        } else {
            echo 'no task doing';
        }

        echo '</div>';



        if ($project_id != 'null') {
            $query = "SELECT * FROM `work_items` WHERE project_id_fk='$project_id'&& assigned_id_fk='$id' && status='1' ORDER BY updated_at DESC";
            $query2 = "SELECT * FROM `task` WHERE project_id_fk='$project_id' && assigned_id_fk='$id' && state='1' ORDER BY updated_at DESC";
        } else {
            $query = "SELECT * FROM `work_items` WHERE assigned_id_fk='$id' && status='1' ORDER BY updated_at DESC";
            $query2 = "SELECT * FROM `task` WHERE assigned_id_fk='$id' && state='1' ORDER BY updated_at DESC";
        }
        $result = mysqli_query($con, $query);
        if (mysqli_num_rows($result) > 0) {
            echo '<div class="column myColumn" id="done" data-id="done">';
            echo '<div class="column-header">Done(' . mysqli_num_rows($result) . ')</div>';

            while ($data = mysqli_fetch_assoc($result)) {
            ?>
                <div class="card" draggable="true" data-name="work" data-id="<?php echo $data['wk_id']; ?>">
                    <div class="card-header">
                        <i class="fas fa-id-card"></i> ID: <?php echo $data['wk_id']; ?>
                    </div>
                    <div class="card-body">
                        <div class="card-title">
                            <i class="fas fa-book"></i> Title: <?php echo $data['title']; ?>
                        </div>
                        <div class="card-text">
                            <i class="fas fa-calendar-alt"></i> Created at: <?php echo $data['created_at']; ?>
                            <br>
                            <i class="fas fa-calendar-check"></i> Updated at: <?php echo $data['updated_at']; ?>
                            <div class="row">
                                <div class="col-lg-6 col-sm-12">
                                    <i class="fas fa-folder"></i> Path: <?php echo $data['path']; ?>
                                </div>
                                <div class="col-lg-6 col-sm-12">
                                    <?php
                                    $id = $data['user_id_fk'];
                                    $q = "SELECT * FROM `users` WHERE user_id='$id'";
                                    $r = mysqli_query($con, $q);
                                    $d2 = mysqli_fetch_assoc($r)
                                    ?>
                                    <i class="fas fa-user"></i> User: <?php echo $d2['username']; ?>
                                </div>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
            <?php
            }
        } else {
            echo '<p>No Record Found,Drag and Drop here,to mark finish your first task</p>';
        }

        $result = mysqli_query($con, $query2);
        if (mysqli_num_rows($result) > 0) {
            while ($data = mysqli_fetch_assoc($result)) {
            ?>
                <div class="card" draggable="true" data-id="<?php echo $data['task_id']; ?>">
                    <div class="card-header">
                        <i class="fas fa-id-card"></i> ID: <?php echo $data['task_id']; ?>
                    </div>
                    <div class="card-body">
                        <div class="card-title">
                            <i class="fas fa-book"></i> Title: <?php echo $data['task_name']; ?>
                        </div>
                        <div class="card-title">
                            <i class="fas fa-book"></i> Title: <?php echo $data['task_nature']; ?>
                        </div>
                        <div class="card-text">
                            <i class="fas fa-calendar-alt"></i> Created at: <?php echo $data['create_at']; ?>
                            <br>
                            <i class="fas fa-calendar-check"></i> start at: <?php echo $data['start']; ?>
                            <br>
                            <i class="fas fa-calendar-check"></i> Updated at: <?php echo $data['updated_at']; ?>
                            <div class="row">
                                <div class="col-lg-6 col-sm-12">
                                    <?php
                                    $id = $data['project_id_fk'];
                                    $q = "SELECT * FROM `project` INNER JOIN `users` on `project`.`user_id_fk`=`users`.`user_id` WHERE project_id='$id'";
                                    $r = mysqli_query($con, $q);
                                    $d2 = mysqli_fetch_assoc($r)
                                    ?>
                                    <br>
                                    <div style="display: flex;justify-content: center;">
                                        <i class="fas fa-box"></i> Project: <?php echo $d2['project_name']; ?>
                                    </div>
                                    <div style="display: flex;justify-content: center;">
                                        <i class="fas fa-user"></i> Assigned By: <?php echo $d2['username']; ?>
                                    </div>

                                </div>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
<?php
            }
        } else {
            echo 'no task done';
        }

        echo '</div>';

        require '_dragndrop.php';
    }
}






if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add_task'])) {
        include '_connection.php';
        $task_id = $_POST['task_id'];
        session_start();
        $c_id=$_SESSION['userId'];
        if ($task_id == 0) {
            echo " <script>alert('Select task to add');window.location.hrefboard.php?id=$c_id'
  </script>";
        }
        $query = "UPDATE `task` SET `state` = '-1' WHERE `task`.`task_id` = '$task_id'";
        $res = mysqli_query($con, $query);
        if ($res) {
            echo " <script>alert('Task Added To Board');window.location.href='../board.php?id=$c_id'
  </script>";
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add_work'])) {
        include '_connection.php';
        $add_work_id = $_POST['add_work_id'];
        session_start();
        $c_id=$_SESSION['userId'];
        if ($add_work_id == 0) {
            echo " <script>alert('Select Work item to add');window.location.href='../board.php?id=$c_id'
  </script>";
        }
        $query = "UPDATE `work_items` SET `status` = '-1' WHERE `work_items`.`wk_id` = '$add_work_id'";
        $res = mysqli_query($con, $query);
        if ($res) {
            echo " <script>alert('Work Item Added To Board');window.location.href='../board.php?id=$c_id'
  </script>";
        }
    }
}
