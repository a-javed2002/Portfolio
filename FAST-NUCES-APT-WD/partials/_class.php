<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['join_class'])) {
        require '_connection.php';
        session_start();
        $c_id = $_SESSION['userId'];
        $unique_code = $_POST['unique_code'];

        $sql = "SELECT * FROM `class` WHERE `unique_code`= '$unique_code'";
        $res = mysqli_query($con, $sql);
        $records = mysqli_num_rows($res);
        if ($records == 1) {
            $data = mysqli_fetch_assoc($res);
            $class_id = $data['class_id'];
            $sql = "SELECT * FROM `invite` WHERE `student_id_fk`= $c_id AND `class_id_fk`=$class_id";
            $res = mysqli_query($con, $sql);
            $records = mysqli_num_rows($res);
            if ($records == 1) {
                $data2 = mysqli_fetch_assoc($res);
                $role = $data2['role'];
                $sql = "SELECT * FROM `class_students` WHERE `student_id_fk`= $c_id AND `class_id_fk`=$class_id";
                $res = mysqli_query($con, $sql);
                $records = mysqli_num_rows($res);
                if ($records > 0) {
                    $data = array();
                    $data['status'] = "fail";
                    $data['msg'] = 'Already Joined the group!';
                    echo json_encode($data);
                } else {
                    $sql = "INSERT INTO `class_students` (`class_id_fk`, `student_id_fk`, `joined_on`) VALUES ('$class_id','$c_id', NOW())";
                    $res = mysqli_query($con, $sql);
                    if ($res) {
                        $data = array();
                        $data['status'] = "Success";
                        $data['msg'] = 'Joined Successfully';
                        echo json_encode($data);
                    }
                }
            } else {
                $data = array();
                $data['status'] = "fail";
                $data['msg'] = 'Not Invited!';
                echo json_encode($data);
            }
        } else {
            $data = array();
            $data['status'] = "fail";
            $data['msg'] = 'Project key invalid!';
            echo json_encode($data);
        }
        echo json_encode($data);
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['class_list'])) {
        require '_connection.php';
        session_start();

        $c_id = $_SESSION['userId'];

        if (isset($_POST['search']) && $_POST['search'] != 'null') {
            $search_text = $_POST['search'];
            $c1 = $search_text[0];
            $c2 = $search_text[strlen($search_text) - 1];
            if ($c1 == '/') {
                // Or we can write ltrim($str, $str[0]);
                $search_text = ltrim($search_text, '/');
                $sql2 = "SELECT * FROM `class` INNER JOIN `users` on `users`.`user_id`=`class`.`teacher_id_fk` WHERE class.teacher_id_fk=$c_id AND class.class_name LIKE '$search_text%''";
            } else if ($c2 == '/') {
                $search_text = rtrim($search_text, '/');
                $sql2 = "SELECT * FROM `class` INNER JOIN `users` on `users`.`user_id`=`class`.`teacher_id_fk` WHERE class.teacher_id_fk=$c_id AND class.class_name LIKE '%$search_text'";
            } else {
                $sql2 = "SELECT * FROM `class` INNER JOIN `users` on `users`.`user_id`=`class`.`teacher_id_fk` WHERE class.teacher_id_fk=$c_id AND class.class_name LIKE '%$search_text%'";
            }
        } else {
            $sql2 = "SELECT * FROM `class` INNER JOIN `users` on `users`.`user_id`=`class`.`teacher_id_fk` WHERE class.teacher_id_fk=$c_id";
        }
        $res2 = mysqli_query($con, $sql2);
        $rows = mysqli_num_rows($res2);
        if ($rows > 0) {
            while ($data = mysqli_fetch_assoc(($res2))) {
?>
                <li class="media mb-3">
                    <div class="media-body">
                        <h5 class="mt-0"><b class="text-primary">Created On: </b><?php echo $data['created_at'] ?></h5>
                        <h5 class="mt-0"><b class="text-primary">Class Id: </b><?php echo $data['class_id'] ?></h5>
                        <h5 class="mt-0"><b class="text-primary">project Name: </b><?php
                                                                                    if (isset($_POST['search'])) {
                                                                                        $temp = $_POST['search'];
                                                                                        $c1 = $temp[0];
                                                                                        $c2 = $temp[strlen($temp) - 1];
                                                                                        if ($c1 == '/') {
                                                                                            // Or we can write ltrim($str, $str[0]);
                                                                                            $temp = ltrim($temp, '/');
                                                                                        } else if ($c2 == '/') {
                                                                                            $temp = rtrim($temp, '/');
                                                                                        }
                                                                                        // echo json_encode($temp);
                                                                                        $c_name = $data['class_name'];
                                                                                        $c_name = str_replace($temp, '<span style="color:red;">' . $temp . '</span>', $c_name);
                                                                                    } else {
                                                                                        $c_name = $data['class_name'];
                                                                                    }
                                                                                    echo $c_name;
                                                                                    ?></h5>
                        <p class="mb-0"><b class="text-primary">Unique Key: </b><?php echo $data['unique_code'] ?></p>
                        <p class="mb-0"><b class="text-primary">Class Teacher: </b><?php
                                                                                    if (isset($_POST['search'])) {
                                                                                        $temp = $_POST['search'];
                                                                                        $c1 = $temp[0];
                                                                                        $c2 = $temp[strlen($temp) - 1];
                                                                                        if ($c1 == '/') {
                                                                                            // Or we can write ltrim($str, $str[0]);
                                                                                            $temp = ltrim($temp, '/');
                                                                                        } else if ($c2 == '/') {
                                                                                            $temp = rtrim($temp, '/');
                                                                                        }
                                                                                        // echo json_encode($temp);
                                                                                        $c_name = $data['username'];
                                                                                        $c_name = str_replace($temp, '<span style="color:red;">' . $temp . '</span>', $c_name);
                                                                                    } else {
                                                                                        $c_name = $data['username'];
                                                                                    }
                                                                                        echo $c_name;
                                                                                    ?></p>

                        <p class="mb-0"><b class="text-primary">Students: </b>
                            <?php
                            $id = $data['class_id'];
                            $sql = "SELECT * FROM `class_students` WHERE `class_id_fk`= $id";
                            $res = mysqli_query($con, $sql);
                            $users = mysqli_num_rows($res);
                            echo '<b>' . $users . '</b>';
                            ?>
                        </p>
                        <a href="key_email_check.php?id=<?php echo $data['unique_code'] ?>&class=<?php echo $data['class_id'] ?>">+Add Student Via Email</a><br>
                        <a href="class.php?id=<?php echo $data['class_id'] ?>">See More --></a>
                        <hr><br>
                    </div>
                </li>
<?php
            }
        } else {
            $r=$_SESSION['userRoleId'];
            if ($_SESSION['userRoleId'] != 3) {

                echo '<li>
                <h3>No Class Found...!!!...</h3>
                <button type="button" class="btn btn-primary modal-btn" data-bs-toggle="modal" data-bs-target="#pop-up-2">
                + join New Class
                </button></li>';
            }
            else{
                echo '<li>
                <h3>No Class Found...!!!...</h3>
                <button type="button" class="btn btn-primary modal-btn" data-bs-toggle="modal" data-bs-target="#pop-up-2">
                + join New Class Now
                </button></li>';
            }
        }
        mysqli_close($con);
        exit();
    }
}
?>


<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add_class'])) {
        include '_connection.php';
        $class_name = $_POST['class_name'];
        $class_uc = $_POST['class_uc'];
        session_start();
        $c_id = $_SESSION['userId'];


        

        $sql = "SELECT * FROM `class` WHERE class_name = '$class_name' && unique_code='$class_uc' && teacher_id_fk='$c_id'";
        $result = mysqli_query($con, $sql);
        if (mysqli_num_rows($result) > 0) {
            http_response_code(409); 
            $data = array();
            $data['status'] = "failed";
            $data['msg'] = 'class is already created with same unique code..';
            echo json_encode($data);
            exit;
        }

        $sql = "INSERT INTO `class` (`class_name`, `unique_code`, `teacher_id_fk`, `created_at`) VALUES ('$class_name','$class_uc', '$c_id', NOW())";
        if (!mysqli_query($con, $sql)) {
            http_response_code(500); 
            $data = array();
            $data['status'] = "failed";
            $data['msg'] = 'Failed to insert user information into the database.';
            echo json_encode($data);
            exit;
        }

        mysqli_close($con);

        $data = array();
        $data['status'] = "success";
        $data['msg'] = 'Class Added successful!';
        echo json_encode($data);
        exit();
    }
}




?>