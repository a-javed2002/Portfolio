<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Home</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <?php require 'partials/_head.php' ?>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />


</head>
<style>
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
        width: calc(33.33% - 20px);
        /* subtract margin */
        float: left;

        height: 1600px;
        overflow-y: auto;

        background-color: white;
        border-radius: 5px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    }

    .column::-webkit-scrollbar {
        width: 5px;
    }

    .column::-webkit-scrollbar-track {
        background: #f1f1f1;
    }

    .column::-webkit-scrollbar-thumb {
        background: #012970;
        border-radius: 5px;
    }

    .column::-webkit-scrollbar-thumb:hover {
        background: #012970;
    }

    .card {
        margin: 10px 0;
        padding: 5;
        width: 90%;
        background-color: #f6f9ff;
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

    .card-title {
        font-size: 14px;
        font-weight: 500;
        color: #012970;
        margin-bottom: 5px;
    }

    .column .card-text i {
        color: #198754;
    }

    .card-text {
        padding: 10px;
        border-radius: 0 0 5px 5px;
        font-size: 13px;
    }

    .card-text i {
        margin-right: 5px;
    }

    .card-body {
        display: flex;
        flex-direction: column;
    }

    .card-body div:not(.card-title) {
        margin-bottom: 10px;
    }

    .card-body div:last-child {
        margin-bottom: 0;
    }

    .card-header {

        background-color: #f6f9ff;
        font-size: 15px;
        font-weight: 550;
        color: #012970;

    }

    .card-title {

        padding: 0px;

        font-family: "Poppins", sans-serif;
    }
</style>

<body>



    <?php require 'partials/_header.php'; ?>




    <?php require 'partials/_sidebar.php';
    ?>
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


        <div class="row">
            <form action="partials/_board.php" method="post">
                <h4>Add Tasks</h4>
                <div class="col-12">
                    <label for="task_id" class="form-label">Task</label>
                    <select id="task_id" name="task_id" class="form-select">
                        <option value="0" selected>--Select--</option>
                        <?php
                        require 'partials/_connection.php';
                        $c_id = $_SESSION['userId'];
                        $query = "SELECT * FROM `task` WHERE assigned_id_fk=$c_id AND state=-2";
                        $result = mysqli_query($con, $query);
                        $row = mysqli_num_rows($result);
                        while ($data = mysqli_fetch_assoc($result)) {
                        ?>
                            <option value="<?php echo $data['task_id'] ?>"><?php echo $data['task_name']; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>

                <input type="submit" class="mt-2 btn btn-primary" value="Add" name="add_task">
            </form>
        </div>

        <hr>

        <div class="row">
            <form action="partials/_board.php" method="post">
                <h4>Add WorkItem</h4>
                <div class="col-12">
                    <label for="add_work_id" class="form-label">Task</label>
                    <select id="add_work_id" name="add_work_id" class="form-select">
                        <option value="0" selected>--Select--</option>
                        <?php
                        require 'partials/_connection.php';
                        $c_id = $_SESSION['userId'];
                        $query = "SELECT * FROM `work_items` WHERE assigned_id_fk=$c_id AND status=-2";
                        $result = mysqli_query($con, $query);
                        $row = mysqli_num_rows($result);
                        while ($data = mysqli_fetch_assoc($result)) {
                        ?>
                            <option value="<?php echo $data['wk_id'] ?>"><?php echo $data['title']; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>

                <input type="submit" class="mt-2 btn btn-primary" value="Add" name="add_work">
            </form>
        </div>

        <section class="section dashboard">

            <div class="row">
                <div class="container" id="my-work">
                    <div class="column myColumn " id="todo " data-id="todo">

                        <?php
                        require 'partials/_connection.php';
                        if (isset($_GET['id'])) {
                            $id = $_GET['id'];
                            $c_id = $_SESSION['userId'];
                            if ($id == $c_id) {
                                $query1 = "SELECT * FROM `work_items` WHERE assigned_id_fk='$id' && status='-1' ORDER BY updated_at DESC";
                                $query2 = "SELECT * FROM `work_items` WHERE assigned_id_fk='$id' && status='0' ORDER BY updated_at DESC";
                                $query3 = "SELECT * FROM `work_items` WHERE assigned_id_fk='$id' && status='1' ORDER BY updated_at DESC";
                                $query4 = "SELECT * FROM `task` WHERE assigned_id_fk='$id' && state='-1' ORDER BY updated_at DESC";
                                $query5 = "SELECT * FROM `task` WHERE assigned_id_fk='$id' && state='0' ORDER BY updated_at DESC";
                                $query6 = "SELECT * FROM `task` WHERE assigned_id_fk='$id' && state='1' ORDER BY updated_at DESC";
                            } else {
                        ?>
                                <script>
                                    location.replace("page-error-404.php");
                                </script>
                            <?php
                            }
                            ?>

                        <?php
                        } else if (isset($_GET['project'])) {
                            $project_id = $_GET['project'];
                            $c_id = $_SESSION['userId'];
                            $query1 = "SELECT * FROM `work_items` WHERE project_id_fk='$project_id'&& assigned_id_fk='$c_id' && status='-1' ORDER BY updated_at DESC";
                            $query2 = "SELECT * FROM `work_items` WHERE project_id_fk='$project_id'&& assigned_id_fk='$c_id' && status='0' ORDER BY updated_at DESC";
                            $query3 = "SELECT * FROM `work_items` WHERE project_id_fk='$project_id'&& assigned_id_fk='$c_id' && status='1' ORDER BY updated_at DESC";
                            $query4 = "SELECT * FROM `task` WHERE project_id_fk='$project_id' && assigned_id_fk='$id' && state='-1' ORDER BY updated_at DESC";
                            $query5 = "SELECT * FROM `task` WHERE project_id_fk='$project_id' && assigned_id_fk='$id' && state='0' ORDER BY updated_at DESC";
                            $query6 = "SELECT * FROM `task` WHERE project_id_fk='$project_id' && assigned_id_fk='$id' && state='1' ORDER BY updated_at DESC";
                        } else {
                        ?>
                            <script>
                                location.replace("page-error-404.php");
                            </script>
                            <?php
                        }

                        $result = mysqli_query($con, $query1);
                        if (mysqli_num_rows($result) > 0) {
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
                                            <br>
                                        </div>
                                    </div>
                                </div>

                            <?php
                            }
                        } else {
                            echo '<p>No Record Found,Create Work Item</p>';
                        }
                        $result = mysqli_query($con, $query4);
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
                        ?>
                    </div>
                    <div class="column myColumn" id="doing" data-id="doing">
                        <?php
                        require 'partials/_connection.php';

                        $result = mysqli_query($con, $query2);
                        $row = mysqli_num_rows($result);
                        if (mysqli_num_rows($result) > 0) {
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
                        $result = mysqli_query($con, $query5);
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
                        ?>
                    </div>
                    <div class="column myColumn" id="done" data-id="done">
                        <?php
                        require 'partials/_connection.php';

                        $result = mysqli_query($con, $query3);
                        $row = mysqli_num_rows($result);
                        if (mysqli_num_rows($result) > 0) {
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
                        $result = mysqli_query($con, $query6);
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
                        ?>
                    </div>

                    <?php
                    require 'partials/_dragndrop.php';
                    ?>

                    <?php
                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        $c_id = $_SESSION['userId'];
                        if ($id == $c_id) {
                    ?>
                            <script>
                                load_data_all(<?php echo $id ?>, 'null');
                            </script>
                        <?php
                        } else {
                        ?>
                            <script>
                                location.replace("page-error-404.php");
                                // alert("hi1")
                            </script>
                        <?php
                        }
                    } else if (isset($_GET['project'])) {
                        $project = $_GET['project'];
                        $id = $_SESSION['userId'];
                        ?>
                        load_data_all(<?php echo $id ?>, <?php echo $project ?>);
                    <?php
                    } else {
                        ?>
                        <script>
                            location.replace("page-error-404.php");
                            // alert("hi1")
                        </script>
                    <?php
                    } ?>
                </div>
            </div>

        </section>

    </main><!-- End #main -->
    <?php require 'partials/_footer.php' ?>





</body>

</html>