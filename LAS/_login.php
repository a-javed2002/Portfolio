<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['btn_login'])) {
        require 'partials/_connection.php';
        $name = $_POST['username'];
        $password = $_POST['user_password'];
        $query = "SELECT * FROM `user` join `role` on `user`.role_id_FK=`role`.role_id WHERE `username`='$name'";
        $res = mysqli_query($con, $query);
        $row = mysqli_num_rows($res);
        if ($row == 1) {
            // while ($data = mysqli_fetch_assoc($res)) {
            $data = mysqli_fetch_assoc($res);
            if (password_verify($password, $data['user_password'])) {
                // if ($password == $data['user_password']) {
                if (isset($_POST['btn_remember'])) {
                    setcookie("username", $name, time() + 3600);
                } else {
                    setcookie("username", "");
                }
                $user_id = $data['user_id'];
                $sql = "SELECT * FROM `image` join `user` on `image`.user_id_FK=`user`.user_id WHERE user_id_FK='$user_id' and user_profile=$user_id and image_status=1";
                $result = mysqli_query($con, $sql);
                $row = mysqli_num_rows($result);
                $data2 = mysqli_fetch_assoc($result);;
                if ($row != 0 && $data2['image_status'] == 1) {
                    $user_image = $data2['image'];
                } else {
                    $user_image = NULL;
                }
                $current_user=$data['user_id'];
                $q="INSERT INTO `login` (`user_id_FK`) VALUES ('$current_user');";
                $r=mysqli_query($con,$q);
                session_start();
                $_SESSION['loggedIn'] = true;
                $_SESSION['userId'] = $current_user;
                $_SESSION['username'] = $name;
                $_SESSION['userRole'] = $data['role_name'];
                $_SESSION['userImage'] = $user_image;
                $_SESSION['userGender'] = $data['gender'];
                $_SESSION['image_id']='';
                // header("location: main.php");
                $data = array();
                $data['status'] = 1;
                $data['msg'] = '<h2>LOADING!!!</h2><br><h4>PLEASE WAIT...</h4>';
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
}
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['btn_remove'])) {
        setcookie("username", "");
        setcookie("password", "");
        $data = array();
        $data['status'] = 1;
        $data['msg'] = '<h2>REMOVING!!!</h2><br><h4>PLEASE WAIT...</h4>';
        echo json_encode($data);
    }
}

?>

