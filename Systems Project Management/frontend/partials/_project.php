<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['join_project'])) {
        require '_connection.php';
        session_start();
        $c_id = $_SESSION['userId'];
        $project_key = $_POST['project_key'];

        $sql = "SELECT * FROM `project` WHERE `project_key`= '$project_key'";
        $res = mysqli_query($con, $sql);
        $records = mysqli_num_rows($res);
        if ($records == 1) {
            $data = mysqli_fetch_assoc($res);
            $temp = $data['project_id'];
            $sql = "SELECT * FROM `invite` WHERE `user_id_fk`= $c_id AND `project_id_fk`=$temp";
            $res = mysqli_query($con, $sql);
            $records = mysqli_num_rows($res);
            if ($records == 1) {
                $data2 = mysqli_fetch_assoc($res);
                $role = $data2['role'];
                $sql = "SELECT * FROM `project_users` WHERE `user_id_fk`= $c_id AND `project_id_fk`=$temp";
                $res = mysqli_query($con, $sql);
                $records = mysqli_num_rows($res);
                if ($records > 0) {
                    $data = array();
                    $data['status'] = "fail";
                    $data['msg'] = 'Already Joined the group!';
                    echo json_encode($data);
                } else {
                    $sql = "INSERT INTO `project_users` (`project_id_fk`, `user_id_fk`, `role`, `added_on`) VALUES ('$temp','$c_id', '$role', NOW())";
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
    if (isset($_POST['project_list'])) {
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
                $sql2 = "SELECT * FROM `project_users`
            INNER JOIN project on `project_users`.`project_id_fk`=`project`.`project_id`
            INNER JOIN `users` on `project`.`user_id_fk`=`users`.`user_id`
            INNER JOIN organization on `project`.`organization_id_fk`=`organization`.`organization_id`
            WHERE ((organization.organization_name LIKE '$search_text%' OR project.project_name LIKE '$search_text%' OR users.username LIKE '$search_text%')AND(project_users.user_id_fk=$c_id OR project.user_id_fk=$c_id))
            ORDER BY project.added_on";
            } else if ($c2 == '/') {
                $search_text = rtrim($search_text, '/');
                $sql2 = "SELECT * FROM `project_users`
            INNER JOIN project on `project_users`.`project_id_fk`=`project`.`project_id`
            INNER JOIN `users` on `project`.`user_id_fk`=`users`.`user_id`
            INNER JOIN organization on `project`.`organization_id_fk`=`organization`.`organization_id`
            WHERE ((organization.organization_name LIKE '%$search_text' OR project.project_name LIKE '%$search_text' OR users.username LIKE '%$search_text')AND(project_users.user_id_fk=$c_id OR project.user_id_fk=$c_id))
            ORDER BY project.added_on";
            } else {

                $sql2 = "SELECT * FROM `project_users`
            INNER JOIN project on `project_users`.`project_id_fk`=`project`.`project_id`
            INNER JOIN `users` on `project`.`user_id_fk`=`users`.`user_id`
            INNER JOIN organization on `project`.`organization_id_fk`=`organization`.`organization_id`
            WHERE ((organization.organization_name LIKE '%$search_text%' OR project.project_name LIKE '%$search_text%' OR users.username LIKE '%$search_text%')AND(project_users.user_id_fk=$c_id OR project.user_id_fk=$c_id))
            ORDER BY project.added_on";
            }
        } else {
            $sql2 = "SELECT * FROM `project_users`
            INNER JOIN project on `project_users`.`project_id_fk`=`project`.`project_id`
            INNER JOIN `users` on `project`.`user_id_fk`=`users`.`user_id`
            INNER JOIN organization on `project`.`organization_id_fk`=`organization`.`organization_id`
            WHERE project_users.user_id_fk=$c_id OR project.user_id_fk=$c_id
            ORDER BY organization_id";
        }
        $res2 = mysqli_query($con, $sql2);
        $rows = mysqli_num_rows($res2);
        if ($rows > 0) {
            while ($data = mysqli_fetch_assoc(($res2))) {
?>
                <li class="media mb-3">
                    <div class="media-body">
                        <h5 class="mt-0"><b class="text-primary">Created On: </b><?php echo $data['added_on'] ?></h5>
                        <h5 class="mt-0"><b class="text-primary">Project Id: </b><?php echo $data['project_id'] ?></h5>
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
                                                                                        $c_name = $data['project_name'];
                                                                                        $c_name = str_replace($temp, '<span style="color:red;">' . $temp . '</span>', $c_name);
                                                                                    } else {
                                                                                        $c_name = $data['project_name'];
                                                                                    }
                                                                                    echo $c_name;
                                                                                    ?></h5>
                        <p class="mb-0"><b class="text-primary">project Key: </b><?php echo $data['project_key'] ?></p>
                        <p class="mb-0"><b class="text-primary">Administrative: </b><?php
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
                                                                                    if ($data['user_id_fk'] == $_SESSION['userId']) {
                                                                                        echo $c_name  . "(YOU)";
                                                                                    } else {
                                                                                        echo $c_name;
                                                                                    }
                                                                                    ?></p>

                        <p class="mb-0"><b class="text-primary">Members: </b>
                            <?php
                            $id = $data['project_id'];
                            $sql = "SELECT * FROM `project_users` WHERE `project_id_fk`= $id";
                            $res = mysqli_query($con, $sql);
                            $users = mysqli_num_rows($res);
                            echo '<b>' . $users . '</b>';
                            ?>
                        </p>
                        <p class="mb-0"><b class="text-primary">organization: </b><?php
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
                                                                                        $c_name = $data['organization_name'];
                                                                                        $c_name = str_replace($temp, '<span style="color:red;">' . $temp . '</span>', $c_name);
                                                                                    } else {
                                                                                        $c_name = $data['organization_name'];
                                                                                    }
                                                                                    echo $c_name;
                                                                                    ?></p>
                        <a href="key_email_check.php?id=<?php echo $data['project_key'] ?>">+Add User Via Email</a><br>
                        <a href="project_detail.php?id=<?php echo $data['project_id'] ?>">See More --></a>
                        <hr><br>
                    </div>
                </li>
<?php
            }
        } else {
            echo '<li>
            <h3>No projects Found...!!!...</h3>
            <button type="button" class="btn btn-primary modal-btn" data-bs-toggle="modal" data-bs-target="#pop-up-1">
                        + Add New Project
                    </button>
                    <button type="button" class="btn btn-primary modal-btn" data-bs-toggle="modal" data-bs-target="#pop-up-2">
                        + join New Project
                    </button></li>';
        }
        mysqli_close($con);
        exit();
    }
}
?>


<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add_project'])) {
        include '_connection.php';
        $name = $_POST['project_name'];
        $id = $_POST['organization_id'];


        // Validate form data
        if (empty($name) || empty($id)) {
            http_response_code(400); // Bad request
            $data = array();
            $data['status'] = "failed";
            $data['msg'] = 'Please fill out all required fields.';
            echo json_encode($data);
            exit;
        }

        // Check if the email address is already in use
        $sql = "SELECT * FROM `project` WHERE project_name = '$name' && organization_id_fk=$id";
        $result = mysqli_query($con, $sql);
        if (mysqli_num_rows($result) > 0) {
            http_response_code(409); // Conflict
            $data = array();
            $data['status'] = "failed";
            $data['msg'] = 'Project is already created in this organization..';
            echo json_encode($data);
            exit;
        }

        $q = "SELECT * FROM `project` ORDER BY project_id DESC";
        $r = mysqli_query($con, $q);
        $d = mysqli_fetch_assoc(($r));
        $last_id = $d['project_id'] + 1;

        session_start();
        $current_user = $_SESSION['userId'];
        $p_key = "O" . $id . "-" . "P" . $last_id . "-" . "U" . $current_user;
        // Insert user information into the database
        $sql = "INSERT INTO `project` (`project_name`, `project_key`, `user_id_fk`,`organization_id_fk`, `added_on`,`proj_state`) VALUES ('$name','$p_key', '$current_user', '$id',NOW(),1)";
        if (!mysqli_query($con, $sql)) {
            http_response_code(500); // Internal server error
            $data = array();
            $data['status'] = "failed";
            $data['msg'] = 'Failed to insert user information into the database.';
            echo json_encode($data);
            exit;
        }

        $sql = "INSERT INTO `project_users` (`project_id_fk`, `user_id_fk`, `role`,`added_on`) VALUES ('$last_id', '$current_user', 'admin',NOW())";
        if (!mysqli_query($con, $sql)) {
            http_response_code(500); // Internal server error
            $data = array();
            $data['status'] = "failed";
            $data['msg'] = 'Failed to insert project_users information into the database.';
            echo json_encode($data);
            exit;
        }
        // Close database connection
        mysqli_close($con);

        // Return success message
        $data = array();
        $data['status'] = "success";
        $data['msg'] = 'Project Added successful!';
        echo json_encode($data);
        // echo json_encode(array('status' => "success", 'msg' => 'Registration successful!'));
        exit();
    }
}




?>