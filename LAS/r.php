<?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['btn_logout'])) {
                require 'partials/_connection.php';
                session_start();
                $current_user = $_SESSION['userId'];
                $sql = "DELETE from `login` where user_id_FK='$current_user'";
                $res = mysqli_query($con, $sql);

                session_unset();
                session_destroy();

                // header("location: log_in.php");
                // $data = array();
                // $data['status'] = 1;
                // $data['msg'] = '<h2>SIGN OUT!!!</h2><br><h4>PLEASE WAIT...</h4>';
                // echo json_encode($data);
                echo '<script>window.location=window.location</script>';
                mysqli_close($con);
                exit();
            }
        }
        ?>

		<form action="" method="POST">
		<button name="btn_logout">ksdoa</button>
		</form>