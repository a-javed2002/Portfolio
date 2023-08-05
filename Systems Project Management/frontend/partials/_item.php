<?php
session_start();


if (isset($_POST['btn'])) {
    include '_connection.php';
    $title = $_POST['title'];
    $path = $_POST['w_path'];
    $status = $_POST['status'];
    $w_type = $_POST['w_type'];
    $id = $_POST['project_id'];
    $user_id = $_POST['user_id'];

    $s = "SELECT * FROM work_items INNER JOIN `users` on `users`.`user_id`=`work_items`.`user_id_fk` WHERE title='$title'";
    $r = mysqli_query($con, $s);
    $rec = mysqli_num_rows($r);
    if ($rec > 0) {
        if ($r) {
            $data = mysqli_fetch_assoc($r);
            $name = $data['username'];
            echo "<script>alert('Work Item With Title \'$title\' is Already Created By \'$name\''); window.history.back();</script>";
            exit;
        }
        echo "<script>alert('Work Item With Title \'$title\' is Already Created'); window.history.back();</script>";
        exit;
    }

    $s = "SELECT project_name FROM project WHERE project_id='$id'";
    $r = mysqli_query($con, $s);
    $d = mysqli_fetch_assoc($r);
    $path = $d['project_name'] . "/";

    $c_id = $_SESSION['userId'];
    $query = "INSERT INTO `work_items`(`title`,`type`, `user_id_fk`, `path`, `project_id_fk`, `created_at`)
    VALUES ('$title','$w_type','$c_id','$path','$id',NOW())";
    $res = mysqli_query($con, $query);


    if ($res) {
        if ($user_id == 0) {
            // echo " <script>alert('New Task Succesfully Added');window.location.href='../projects.php'
            // </script>";
            echo "<script>alert('New Work Item Successfully Added...'); window.history.back();</script>";
        } else {
            $w_id = mysqli_insert_id($con);
            $query = "INSERT INTO assigned_work_items (work_item_id_fk, assigned_user_id_fk, status, started_at,updated_at) 
            VALUES ('$w_id', '$user_id','-2', NOW(),NOW())";
            $res = mysqli_query($con, $query);
            if ($res) {
                $query = "SELECT username FROM users WHERE user_id='$user_id'";
                $res = mysqli_query($con, $query);
                if ($res) {
                    $data = mysqli_fetch_assoc($res);
                    $name = $data['username'];
                    // echo " <script>alert('New Task Succesfully Added And Assigned to $name');window.location.href='../projects.php'
                    // </script>";
                    echo "<script>alert('New Work Item Successfully Added And Assigned to \'$name\''); window.history.back();</script>";
                }
            }
        }
    }
}
