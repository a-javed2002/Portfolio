<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add_organization'])) {
        include '_connection.php';
        $name = $_POST['organization_name'];
        $id = $_SESSION['userId'];
        $query = "INSERT INTO `organization`( `organization_name`, `created_at`, `user_id_fk`) VALUES ('$name',NOW(),'$id')";
        $res = mysqli_query($con, $query);
        if ($res) {
            echo " <script>alert('New Organization Succesfully Added');window.location.href='../organization.php'
  </script>";
        }
    }
}
