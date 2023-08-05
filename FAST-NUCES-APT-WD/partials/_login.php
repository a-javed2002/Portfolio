<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require '_connection.php';
    $user_email = $_POST['user_email'];
    $password = $_POST['user_password'];
    $query = "SELECT * FROM `users` join `role` on `users`.role_id_FK=`role`.role_id WHERE `user_email`='$user_email'";
    $res = mysqli_query($con, $query);
    $row = mysqli_num_rows($res);
    if ($row == 1) {
        $data = mysqli_fetch_assoc($res);
        if (password_verify($password, $data['user_password'])) {
            if (true) {
                // setcookie("user_email", $user_email, time() + 3600); //sec
                setrawcookie("user_email", $user_email, time() + 3600);
            } else {
                setcookie("user_email", "");
            }
            if ($data['user_image'] != null) {
                $user_image = $data['user_image'];
            } else {
                $gender=$data['user_gender'];
                if (strtolower($gender)=="male") {
                    $user_image = "assets/img/messages-3.jpg";
                }
                else{
                    $user_image = "assets/img/messages-1.jpg";
                }
            }
            $current_user = $data['user_id'];
            // $q="INSERT INTO `login` (`user_id_FK`) VALUES ('$current_user');";
            // $r=mysqli_query($con,$q);
            session_start();
            $_SESSION['loggedIn'] = true;
            $_SESSION['userId'] = $current_user;
            $_SESSION['username'] = $data['username'];
            $_SESSION['userEmail'] = $user_email;
            $_SESSION['userRole'] = $data['role_name'];
            $_SESSION['userRoleId'] = $data['role_id'];
            $_SESSION['userImage'] = $user_image;
            $_SESSION['userGender'] = $data['user_gender'];
            // $_SESSION['image_id']='';
            // header("location: main.php");
            $data = array();
            $data['status'] = 1;
            $data['msg'] = '<h2>LOADING!!!</h2><br><h4>PLEASE WAIT...</h4><br><img src="assets/img/loader.gif" alt="loading" width=100>';
            echo json_encode($data);
        } else {
            $data = array();
            $data['status'] = 0;
            $data['msg'] = 'INVALID USERNAME OR PASSWORD';
            echo json_encode($data);
        }
        // }
    } else {
        $data = array();
        $data['status'] = 0;
        $data['msg'] = 'MORE THEN 1 RECORDS';
        echo json_encode($data);
    }
    mysqli_close($con);
    exit();
}
