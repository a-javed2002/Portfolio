<?php
session_start();


if (isset($_POST['btn'])) {
    include '_connection.php';
    $name = $_POST['task_name'];
    $n = $_POST['nature'];
    $id = $_POST['project_id'];
    $user_id = $_POST['user_id'];

    $s = "SELECT * FROM task WHERE task_name='$name'";
    $r = mysqli_query($con, $s);
    $rec = mysqli_num_rows($r);
    if ($rec > 0) {
        if ($r) {
            echo "<script>alert('Task With Name \'$name\' is Already Created'); window.history.back();</script>";
            exit;
        }
    }

    $query = "INSERT INTO task ( task_name, task_nature, created_at, project_id_fk) 
        VALUES ('$name', '$n', NOW(), '$id')
        ";
    $res = mysqli_query($con, $query);



    if ($res) {
        if ($user_id == 0) {
            // echo " <script>alert('New Task Succesfully Added');window.location.href='../projects.php'
            // </script>";
            echo "<script>alert('New Task Successfully Added...'); window.history.back();</script>";
        } else {
            $test_id = mysqli_insert_id($con);
            $query = "INSERT INTO assigned_task (task_id_fk, assigned_user_id_fk, status, started_at,updated_at) 
        VALUES ('$test_id', '$user_id','-2', NOW(),NOW())";
            $res = mysqli_query($con, $query);
            if ($res) {
                $query = "SELECT username FROM users WHERE user_id='$user_id'";
                $res = mysqli_query($con, $query);
                if ($res) {
                    $data = mysqli_fetch_assoc($res);
                    $name = $data['username'];
                    // echo " <script>alert('New Task Succesfully Added And Assigned to $name');window.location.href='../projects.php'
                    // </script>";
                    echo "<script>alert('New Task Successfully Added And Assigned to \'$name\''); window.history.back();</script>";
                }
            }
        }
    }
}
