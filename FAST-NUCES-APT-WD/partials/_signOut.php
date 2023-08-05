<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['btn_logout'])) {
        // require '_connection.php';
        session_start();

        session_unset();
        session_destroy();

        // header("location: log_in.php");
        $data = array();
        $data['status'] = 1;
        $data['msg'] = '<h2>SIGN OUT!!!</h2><br><h4>PLEASE WAIT...</h4>';
        echo json_encode($data);
        mysqli_close($con);
        exit();
    }
}
