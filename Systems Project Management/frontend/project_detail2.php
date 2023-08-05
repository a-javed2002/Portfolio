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

                <h2>single project detail aur sidebar may uskay effects</h2>
                <h3>show all workitems related to this proj and gives option to add...edit..delete them</h3>
                <h4>workitem --> id,title,assign(user),status,path</h4>
                <h5>option to see proj related backlogs(unassigned work items)</h5>
                <h5>Add user/people</h5>


                <?php
                require 'partials/_connection.php';
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $c_id=$_SESSION['userId'];
                    $sql="SELECT * FROM project_users WHERE user_id_fk=$c_id AND project_id_fk=$id";
                    $r = mysqli_query($con, $sql);
                    $a = mysqli_num_rows($r);
                    if ($a==0) {
                        echo '<script>location.replace("page-error-404.php");</script>';
                    }
                } else {
                    echo '<script>location.replace("page-error-404.php");</script>';
                }
                $query = "SELECT * FROM `project` INNER JOIN `users` on `project`.`user_id_fk`=`users`.`user_id` INNER JOIN `organization`on `project`.`organization_id_fk`=`organization`.`organization_id` WHERE `project`.`project_id`=$id";
                $result = mysqli_query($con, $query);
                $data = mysqli_fetch_assoc($result);
                ?>
                <a href="board.php?project=<?php echo $data['project_id'];?>">See Board</a>
                <p class="mb-0"><b class="text-primary">organization: </b><?php echo $data['organization_name'] ?></p>
                <h5 class="mt-0"><b class="text-primary">Created On: </b><?php echo $data['added_on'] ?></h5>
                <h5 class="mt-0"><b class="text-primary">Project Id: </b><?php echo $data['project_id'] ?></h5>
                <h5 class="mt-0"><b class="text-primary">project Name: </b><?php echo $data['project_name'] ?></h5>
                <p class="mb-0"><b class="text-primary">project Key: </b><?php echo $data['project_key'] ?></p>
                <p class="mb-0"><b class="text-primary">Administrative: </b><?php
                                                                            if ($data['user_id_fk'] == $_SESSION['userId']) {
                                                                                echo $data['username'] . "(YOU)";
                                                                            } else {
                                                                                echo $data['username'] . " " . $data['user_id_fk'] . " " . $_SESSION['userId'];
                                                                            }
                                                                            ?></p>

                <p class="mb-0"><b class="text-primary">Members: </b>
                    <?php
                    $id = $data['project_id'];
                    $sql = "SELECT * FROM `project_users` INNER JOIN `users` on `project_users`.`user_id_fk`=`users`.`user_id` WHERE `project_id_fk`= $id";
                    $res = mysqli_query($con, $sql);
                    $users = mysqli_num_rows($res);
                    echo '<b>' . $users . '</b>';
                    if ($users > 0) {
                        while ($data2 = mysqli_fetch_assoc($res)) {
                            echo '<ul>
                        <li>' . $data2['username'] . '</li>
                        <hr>
                        </ul>';
                        }
                    }
                    ?>
                </p>

                <br>
                <?php
                $current_user = $_SESSION['userId'];
                $proj_admin = $data["user_id"];
                if ($current_user == $proj_admin) {
                    echo'<h5>delete project</h5>
                    <a href="partials/_project_delete.php?id='.$data['project_id'].'">Delete icon</a>';
                    $q = "SELECT * FROM TASK WHERE project_id_fk=$id";
                    $r = mysqli_query($con, $q);
                    $t = mysqli_num_rows($r);
                    if ($t > 0) {
                    echo '<b>total tasks:' . $t . '</b>';
                        while ($d = mysqli_fetch_assoc($r)) {
                            echo '<ul>
                        <li>' . $d['task_id'] . '</li>
                        <li>' . $d['task_name'] . '</li>
                        <li>' . $d['task_nature'] . '</li>
                        <li>' . $d['start'] . '</li>
                        <li>' . $d['end'] . '</li>
                        <hr>
                        </ul>';
                        }
                    } else {
                        echo 'no task yet...!!!<br>';
                    }
                } else {
                    echo 'project does not belong to you,you can not create task';
                }
                ?>

                <br>

                <?php

                $q2 = "SELECT * FROM work_items WHERE project_id_fk=$id";
                $r2 = mysqli_query($con, $q2);
                $t2 = mysqli_num_rows($r2);
                if ($t2 > 0) {
                    while ($d2 = mysqli_fetch_assoc($r2)) {
                    echo '<b>total work items:' . $t2 . '</b>';
                        echo '<ul>
                        <li>ID:' . $d2['wk_id'] . '</li>
                        <li>Title:' . $d2['title'] . '</li>
                        <li>Status:' . $d2['status'] . '</li>
                        <li>Path:' . $d2['path'] . '</li>
                        <li>Created at:' . $d2['created_at'] . '</li>
                        <li>updated at:' . $d2['updated_at'] . '</li>
                        <hr>
                        </ul>';
                    }
                } else {
                    echo 'no work items yet...!!!<br>';
                }

                ?>

                
            </div>
        </section>

    </main><!-- End #main -->
    <?php require 'partials/_footer.php' ?>



</body>

</html>