<?php
include 'partials/_connection.php';
$user_id=$_GET['id'];
$hash = password_hash(123, PASSWORD_DEFAULT);
$sql = "UPDATE `user` SET `user_password` = '$hash' WHERE `user`.`user_id` = '$user_id'";
$res = mysqli_query($con, $sql);
if ($res) {
    echo 'success';
}


//http://localhost/LAS/change_password_by_developer.php?id=71