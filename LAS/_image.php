<?php
session_start();
// Count total files
$countFiles = count($_FILES['files']['name']);

// Upload Location
$upload_location = "uploads/";

// To store uploaded files path
$files_arr = array();

// Loop all files
for ($index = 0; $index < $countFiles; $index++) {

    if (isset($_FILES['files']['name'][$index]) && $_FILES['files']['name'][$index] != '') {
        // File name
        $filename = $_FILES['files']['name'][$index];

        // Get extension
        $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

        // Valid image extension
        $valid_ext = array("png", "jpeg", "jpg");

        // Check extension
        if (in_array($ext, $valid_ext)) {

            // File path
            $path = $upload_location . $filename;

            // Upload file
            if (move_uploaded_file($_FILES['files']['tmp_name'][$index], $path)) {
                $files_arr[] = $path;

                require 'partials/_connection.php';

                if (strtolower($_GET['name']) == "test") {
                    $id = $_SESSION['image_id'] + 1;
                    $current_user = $_GET['current_user'];
                    $query = "INSERT INTO `image` (`test_id_FK`, `image`,`image_status`,`user_id_FK`) VALUES ('$id', '$path', '1','$current_user')";
                } else if (strtolower($_GET['name']) == "user") {
                    $id = $_SESSION['image_id'] + 1;
                    $current_user = $_GET['current_user'];
                    $query = "INSERT INTO `image` (`user_id_FK`, `image`,`image_status`,`user_profile`) VALUES ('$id', '$path', '1','$current_user')";
                } else if (strtolower($_GET['name']) == "product") {
                    $id = $_SESSION['image_id'] + 1;
                    $current_user = $_GET['current_user'];
                    $query = "INSERT INTO `image` (`product_id_FK`, `image`,`image_status`,`user_id_FK`) VALUES ('$id', '$path', '1','$current_user')";
                } else if (strtolower($_GET['name']) == "component") {
                    $id = $_SESSION['image_id'] + 1;
                    $current_user = $_GET['current_user'];
                    $query = "INSERT INTO `image` (`component_id_FK`, `image`,`image_status`,`user_id_FK`) VALUES ('$id', '$path', '1','$current_user')";
                }
                $res = mysqli_query($con, $query);
                if (isset($_SESSION['image_id'])) {
                    unset($_SESSION['image_id']);
                }
            }
        }
    }
}

echo json_encode($files_arr);
die;
