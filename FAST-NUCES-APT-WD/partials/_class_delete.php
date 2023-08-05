<?php
session_start();
if (isset($_GET['id']) && $_SESSION['loggedIn'] == true) {
    include '_connection.php';
    $id = $_GET['id'];
    $current = $_SESSION['userId'];
    $sql = "SELECT * FROM project WHERE project_id=$id AND user_id_fk=$current";
    $res = mysqli_query($con, $sql);
    $row = mysqli_num_rows($res);
    if ($row > 0) {
        $sql = "UPDATE project set proj_state=0 WHERE project_id=$id";
        $res = mysqli_query($con, $sql);
        echo '<script>location.replace("projects.php");</script>';
    }
} else {
    echo '<script>location.replace("page-error-404.php");</script>';
}
