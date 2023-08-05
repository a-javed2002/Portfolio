<?php
$serverName = "localhost";
$username = "root";
$password = '';
$database = 'SPM';
$con = mysqli_connect($serverName, $username, $password, $database);
if ($con) {
    // echo "<script>alert('Connection Successful!!')</script>";
} else {
    echo "<script>alert('Connection Error!!')</script>";
}
