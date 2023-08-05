<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['btn-user-insert'])) {
        include 'partials/_connection.php';
        $user_gender = $_POST['user_gender'];
        $user_name = $_POST['first_name'] . ' ' . $_POST['last_name'];
        $user_education = $_POST['user_education'];
        $user_email = $_POST['user_email'];
        $user_role = $_POST['role_name'];
        $user_contact = $_POST['user_contact'];
        $user_address = $_POST['user_address'];
        $user_salary = $_POST['user_salary'];
        $sql3 = "SELECT * FROM `user` ORDER BY user_id DESC";
        $res3 = mysqli_query($con, $sql3);
        $x = mysqli_fetch_assoc($res3);
        $id = $x['user_id'];
        $username = $_POST['first_name'] .  ($id + 1);
        $user_password = $_POST['first_name'] .  ($id + 1);
        $hash = password_hash($user_password, PASSWORD_DEFAULT);
        // $sql3 = "SELECT * FROM `user` where user_name='$user_name'";
        // $res3 = mysqli_query($con, $sql3);
        // if (mysqli_num_rows($res3) == 0) {
        $sql3 = "SELECT * FROM `user` where user_email='$user_email'";
        $res3 = mysqli_query($con, $sql3);
        if (mysqli_num_rows($res3) == 0) {
            $sql3 = "SELECT * FROM `user` where user_contact='$user_contact'";
            $res3 = mysqli_query($con, $sql3);
            if (mysqli_num_rows($res3) == 0) {
                $query = "INSERT INTO `user` (`user_name`,`username`,`user_education`, `gender`, `user_email`, `user_contact`, `user_password`, `role_id_FK`, `user_address`, `creation_time`, `flag_id_FK`, `salary`) VALUES ('$user_name','$username','$user_education', '$user_gender', '$user_email', '$user_contact', '$hash', '$user_role', '$user_address', 'CURRENT_TIMESTAMP()', '1', '$user_salary');";
                // $query="INSERT INTO `user` (`user_name`,`username`,`user_education`, `gender`, `user_email`, `user_contact`, `user_password`, `role_id_FK`, `user_address`, `creation_time`, `flag_id_FK`, `salary`) VALUES ('$user_gender','username0','user_education0', 'user_gender', 'user_email10', '910', 'user_password', '9', 'user_address', 'CURRENT_TIMESTAMP()', '1', '2')";
                $result = mysqli_query($con, $query);
                if ($result) {
                    session_start();
                    $_SESSION['image_id'] = mysqli_insert_id($con);
                    $data = array();
                    $data['status'] = 1;
                    $data['msg'] = 'Insertion Successful!!';
                    echo json_encode($data);
                } else {
                    $data['status'] = 0;
                    $data = array();
                    $data['msg'] = 'Insert Error!!';
                    echo json_encode($data);
                }
            } else {
                $data = array();
                $data['status'] = 0;
                $data['msg'] = 'contact number exists Inserted!!';
                echo json_encode($data);
            }
        } else {
            $data = array();
            $data['status'] = 0;
            $data['msg'] = 'email exists Inserted!!';
            echo json_encode($data);
        }
        // } else {
        //     $data = array();
        //     $data['status'] = 0;
        //     $data['msg'] = 'user name exists Inserted!!';
        //     echo json_encode($data);
        // }
        mysqli_close($con);
        exit();
    }
}
?>


<?php
if (isset($_POST['btn_show'])) {
    require 'partials/_connection.php';
    $sql2 = "SELECT * FROM `user` join `role` on `user`.role_id_FK=`role`.role_id join `flag` on `user`.flag_id_FK=`flag`.flag_id WHERE (flag_id_FK!='3' AND flag_id_FK!='7') ORDER BY user_id DESC";
    $res2 = mysqli_query($con, $sql2);
    $css = '';
    while ($data = mysqli_fetch_assoc(($res2))) {
        if ($data['flag_id_FK'] == 2) {
            $css = 'style="background-color: yellow;"';
        } else if ($data['flag_id_FK'] == 3) {
            $css = 'style="background-color: red;"';
        } else if ($data['flag_id_FK'] == 4) {
            $css = 'style="background-color: blue;"';
        } else if ($data['flag_id_FK'] == 7) {
            $css = 'style="background-color: grey;"';
        }
?>
        <tr class="btn-reveal-trigger" <?php echo $css ?>>
            <?php
            $id = $data['user_id'];
            $query = "SELECT * FROM `user` join image on `user`.`user_id`=`image`.`user_id_FK` where user_id=$id and user_profile=$id and image_status=1";
            $result = mysqli_query($con, $query);;
            $record = mysqli_num_rows($result);
            $data2 = mysqli_fetch_assoc($result);
            $img = '';
            if ($record != 0) {
                // echo '<td><img class="rounded-circle" width="35" src="' . $data2['image'] . '" alt="' . $data['user_name'] . '"></td>';
                $img = $data2['image'];
            } else {
                if (strtolower($data['gender']) == 'male') {
                    // echo '<td><img class="rounded-circle" width="35" src="public/assets/images/profile/small/profile1.png" alt="' . $data['user_name'] . '"></td>';
                    $img = "public/assets/images/profile/small/profile1.png";
                } else if (strtolower($data['gender']) == 'female') {
                    // echo '<td><img class="rounded-circle" width="35" src="public/assets/images/profile/small/profile2.png" alt="' . $data['user_name'] . '"></td>';
                    $img = "public/assets/images/profile/small/profile2.png";
                }
            }
            ?>
            <td class="py-2"><?php echo $data['user_id'] ?></td>
            <td class="py-2"><?php echo $data['role_name'] ?></td>
            <td class="py-3" onclick="moreDetail(<?php echo $data['user_id'] ?>)" data-bs-toggle="modal" data-bs-target="#myModal">
                <a href="#">
                    <div class="media d-flex align-items-center">
                        <div class="avatar avatar-xl me-2">
                            <div class=""><img class="rounded-circle img-fluid" src="<?php echo $img ?>" width="30" alt="<?php echo $data['user_name'] ?>" />
                            </div>
                        </div>
                        <div class="media-body">
                            <h5 class="mb-0 fs--1"><?php echo $data['user_name'] ?></h5>
                        </div>
                    </div>
                </a>
            </td>
            <td class="py-2"><?php echo $data['username'] ?></td>
            <td class="py-2"><a href="mailto:<?php echo $data['user_email'] ?>"><?php echo $data['user_email'] ?></a></td>
            <td class="py-2"><a href="tel:<?php echo $data['user_contact'] ?>"><?php echo $data['user_contact'] ?></a></td>
            <td class="py-2"><?php echo $data['creation_time'] ?></td>
            <td class="py-2 text-end">
                <div class="dropdown"><button class="btn btn-primary tp-btn-light sharp" type="button" data-bs-toggle="dropdown"><span class="fs--1"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"></rect>
                                    <circle fill="#000000" cx="5" cy="12" r="2"></circle>
                                    <circle fill="#000000" cx="12" cy="12" r="2"></circle>
                                    <circle fill="#000000" cx="19" cy="12" r="2"></circle>
                                </g>
                            </svg></span></button>
                    <div class="dropdown-menu dropdown-menu-end border py-0">
                        <div class="py-2">
                            <a class="dropdown-item" style="cursor: pointer;" onclick="moreDetail(<?php echo $data['user_id'] ?>)" data-bs-toggle="modal" data-bs-target="#myModal">Info<i class="fa fa-info-circle" style="float: right;"></i></a>
                            <a class="dropdown-item" style="cursor: pointer;" onclick="updateFn(<?php echo $data['user_id'] ?>)" data-bs-toggle="modal" data-bs-target="#myModal">Edit<i class="fas fa-pencil-alt" style="float: right;"></i></a>
                            <a class="dropdown-item text-danger" style="cursor: pointer;" onclick="deleteShow(<?php echo $data['user_id'] ?>)">Remove<i class="fa fa-trash" style="float: right;"></i></a>
                        </div>
                    </div>
                </div>
            </td>

            <td class="py-2" style="display: none;"><?php echo $data['gender'] ?></td>
            <td class="py-2" style="display: none;"><?php echo $data['user_education'] ?></td>
            <td class="py-2" style="display: none;"><?php echo $data['user_address'] ?></td>
            <td class="py-2" style="display: none;"><?php echo $data['flag_name'] ?></td>
            <td class="py-2" style="display: none;"><?php echo $data['salary'] ?></td>
        </tr>
<?php
    }
    mysqli_close($con);
    exit();
}
?>

<?php
if (isset($_POST['btn_user_update_show'])) {
    require 'partials/_connection.php';
    $user_id = $_POST['id'];
    $sql = "SELECT * FROM `user` where user_id='$user_id'";
    $res = mysqli_query($con, $sql);
    $data = mysqli_fetch_assoc(($res));
?>
    <div class="col-sm-9">
        <input type="hidden" class="form-control" value="<?php echo $data['user_id'] ?>" id="user-id">
    </div>
    <div class="mb-3 row">
        <label class="col-sm-3 col-form-label">Role</label>
        <div class="col-sm-9">
            <div class="input-group mb-3">
                <select class="wide form-control" id="user-role-update">
                    <option selected disabled>Choose Role</option>
                    <?php
                    require 'partials/_connection.php';
                    $query = "SELECT * FROM `role`";
                    $res2 = mysqli_query($con, $query);
                    while ($data2 = mysqli_fetch_assoc($res2)) {
                    ?>
                        <option value="<?php echo $data2['role_id'] ?>" <?php if ($data['role_id_FK'] == $data2['role_id']) echo "selected"; ?>><?php echo strtoupper($data2['role_name']) ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
    </div>
    <div class="mb-3 row">
        <label class="col-sm-3 col-form-label">Name</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="user-name-update" value="<?php echo $data['user_name']; ?>">
        </div>
    </div>
    <div class="mb-3 row">
        <label class="col-sm-3 col-form-label">User Name</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="username-update" value="<?php echo $data['username']; ?>" disabled>
        </div>
    </div>
    <div class="mb-3 row">
        <label class="col-sm-3 col-form-label">Gender</label>
        <div class="col-sm-9">
            <div class="mb-3 mb-0">
                <label class="radio-inline me-3"><input id="gender1-update" value="male" type="radio" name="gender" <?php if (strtolower($data['gender']) == "male") echo "checked"; ?>>Male</label>
                <label class="radio-inline me-3"><input id="gender2-update" value="female" type="radio" name="gender" <?php if (strtolower($data['gender']) == "female") echo "checked"; ?>>Female</label>
            </div>
        </div>
    </div>
    <div class="mb-3 row">
        <label class="col-sm-3 col-form-label">Education</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="user-education-update" value="<?php echo $data['user_education']; ?>">
        </div>
    </div>
    <div class="mb-3 row">
        <label class="col-sm-3 col-form-label">Email</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="user-email-update" value="<?php echo $data['user_email']; ?>">
        </div>
    </div>
    <div class="mb-3 row">
        <label class="col-sm-3 col-form-label">Contact</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="user-contact-update" value="<?php echo $data['user_contact']; ?>">
        </div>
    </div>
    <div class="mb-3 row">
        <label class="col-sm-3 col-form-label">address</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="user-address-update" value="<?php echo $data['user_address'];; ?>">
        </div>
    </div>

    <div class="mb-3 row">
        <label class="col-sm-3 col-form-label">salary</label>
        <div class="col-sm-9">
            <div class="input-group mb-3">
                <span class="input-group-text" style="background-color: #6418c3;color:white;">$</span>
                <input type="text" class="form-control" id="user-salary-update" value="<?php echo $data['salary'];; ?>">
                <span class="input-group-text" style="background-color: #6418c3;color:white;">.00</span>
            </div>
        </div>
    </div>

    <div class="file-upload">
        <button class="file-upload-btn" type="button" id="add-image" onclick="$('.file-upload-input').trigger( 'click' )">Add
            Image</button>

        <div class="image-upload-wrap">
            <input class="file-upload-input" max="4" type='file' id="upload_file_update" accept="image/png,image/jpg,image/jpeg" multiple />
            <div class="drag-text">
                <h3>Drag and drop a file or select add Image</h3>
            </div>
        </div>
        <div class="file-upload-content" id="image_preview" style="display: flex;justify-content: space-around;  flex-wrap: wrap;">
            <!-- <img class="file-upload-image" src="#" alt="your image" />
            <div class="image-title-wrap">
                <button type="button" onclick="removeUpload()" class="remove-image">Remove <span
                        class="image-title">Uploaded Image</span></button>
            </div> -->
        </div>
    </div>


<?php
    mysqli_close($con);
    exit();
}
?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['btn_user_update'])) {
        require 'partials/_connection.php';
        $user_id = $_POST['user_id'];
        $username = $_POST['username'];
        $user_role = $_POST['user_role'];
        $user_name = $_POST['user_name'];
        $user_education =  $_POST['user_education'];
        $user_gender = $_POST['user_gender'];
        $user_email =  $_POST['user_email'];
        $user_contact =  $_POST['user_contact'];
        $user_address =  $_POST['user_address'];
        $user_salary =  $_POST['user_salary'];
        // $sql3 = "SELECT * FROM `user` where user_email='$email'";
        // $res3 = mysqli_query($con, $sql3);
        // if (mysqli_num_rows($res3) <= 1) {
        // Sql query to be executed
        $sql = "UPDATE `user` SET `user_name` = '$user_name' WHERE `user`.`user_id` = '$user_id' AND `user`.`username` = '$username'";
        $res = mysqli_query($con, $sql);
        if ($res) {
            $data = array();
            $data['status'] = 1;
            $data['msg'] = 'Updated Successfully!!';
            echo json_encode($data);
        } else {
            $data = array();
            $data['status'] = 0;
            $data['msg'] = 'Updating Error!!';
            echo json_encode($data);
        }
        // } else {
        //     $data = array();
        //     $data['status'] = 0;
        //     $data['msg'] = 'Email Already Exists!!';
        //     echo json_encode($data);
        // }
        mysqli_close($con);
        exit();
    }
}
?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['btn_user_delete'])) {
        require 'partials/_connection.php';
        $id = $_POST['id'];
        $status = $_POST['status'];
        $sql = "UPDATE `user` SET `flag_id_FK` = '$status' WHERE `user`.`user_id` = '$id';";
        $res = mysqli_query($con, $sql);
        if ($res) {
            $data = array();
            $data['status'] = 1;
            $data['msg'] = 'Removed Successfully!!';
            echo json_encode($data);
        } else {
            $data = array();
            $data['status'] = 0;
            $data['msg'] = 'Removing Error!! ' . mysqli_error($con);
            echo json_encode($data);
            // echo mysqli_error($con);
        }
        mysqli_close($con);
        exit();
    }
}
?>

<?php
if (isset($_POST['btn_user_info'])) {
    require 'partials/_connection.php';
    $user_id = $_POST['id'];
    $sql = "SELECT * FROM `user` join `role` on `user`.role_id_FK=`role`.role_id join `flag` on `user`.flag_id_FK=`flag`.flag_id WHERE user_id='$user_id'";
    $res = mysqli_query($con, $sql);
    $data = mysqli_fetch_assoc($res);
?>
    <div class="row">
        <div class="col-lg-12">
            <div class="profile card card-body px-3 pt-3 pb-0">
                <div class="profile-head">
                    <div class="photo-content">
                        <div class="cover-photo rounded"></div>
                    </div>
                    <div class="profile-info">
                        <div class="profile-photo">
                            <?php
                            $query = "SELECT * FROM `user` join image on `user`.`user_id`=`image`.`user_id_FK` where user_id=$user_id and user_profile=$user_id and image_status=1 ORDER BY image_id DESC";
                            $result = mysqli_query($con, $query);
                            $row = mysqli_num_rows($result);
                            $data2 = mysqli_fetch_assoc($result);
                            if ($row > 0) {
                                if ($data2['image'] != NULL) {
                                    $img = $data2['image'];
                                } else {
                                    if (strtolower($data2['gender']) == "male") {
                                        $img = '<img src="public/assets/images/profile/small/profile1.png';
                                    } else if (strtolower($data2['gender']) == "female") {
                                        $img = '<img src="public/assets/images/profile/small/profile2.png';
                                    }
                                }
                            } else {
                                $query = "SELECT * FROM `user` where user_id=$user_id";
                                $result = mysqli_query($con, $query);
                                $row = mysqli_num_rows($result);
                                $data2 = mysqli_fetch_assoc($result);
                                if (strtolower($data2['gender']) == "male") {
                                    $img = 'public/assets/images/profile/small/profile1.png';
                                } else if (strtolower($data2['gender']) == "female") {
                                    $img = 'public/assets/images/profile/small/profile2.png';
                                }
                            }
                            ?>
                            <a class="test-popup-link" href="<?php echo $img ?>"><img src="<?php echo $img ?>" class="img-fluid rounded-circle" alt="<?php echo $data2['user_name'] ?>"></a>
                        </div>
                        <div class="profile-details">
                            <div class="profile-name px-3 pt-2">
                                <h4 class="text-primary mb-0"><?php echo $data['user_name'] ?></h4>
                                <p><?php echo $data['role_name'] ?></p>
                            </div>
                            <div class="profile-email px-2 pt-2">
                                <h4 class="text-muted mb-0"><a href="mailto:<?php echo $data['user_email'] ?>"><?php echo $data['user_email'] ?></a></h4>
                                <h4 class="text-muted mb-0"><a href="tel:<?php echo $data['user_contact'] ?>"><?php echo $data['user_contact'] ?></a></h4>
                            </div>
                            <div class="profile-email px-2 pt-2">
                                <p>Status: <?php echo $data['flag_name'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="profile-tab">
                        <div class="profile-about-me">
                            <div class="pt-4 border-bottom-1 pb-3">
                                <h4 class="text-primary">Employee Bio</h4>
                                <?php
                                if ($data['user_bio'] != '') {
                                ?>
                                    <p class="mb-2"><?php echo $data['user_bio'] ?></p>
                                <?php
                                } else {
                                    echo '<p class="mb-2 text-danger">No Bio Yet...!!!</p>';
                                }
                                ?>
                            </div>
                        </div>
                        <div class="profile-skills mb-5">
                            <?php
                            $y = $data['user_id'];
                            $que = "SELECT * FROM `product` WHERE user_id_FK='$y'";
                            $run = mysqli_query($con, $que);
                            $rec = mysqli_num_rows($run);
                            if ($rec > 0) {
                                echo '<h4 class="text-primary mb-2">Products Added (' . $rec . ')</h4>';
                            }
                            while ($a = mysqli_fetch_assoc($run)) {
                            ?>
                                <a href="product_details.php?<?php echo $a['product_id'] ?>" class="btn btn-primary light btn-xs mb-1"><?php echo mb_strimwidth($a['product_name'], 0, 13, "...") ?></a>
                            <?php }
                            ?>
                        </div>
                        <div class="profile-lang  mb-5">
                            <?php
                            $y = $data['user_id'];
                            $que = "SELECT * FROM `performed` join `product` on `performed`.product_id_FK=`product`.product_id WHERE `performed`.user_id_FK='$y'";
                            $run = mysqli_query($con, $que);
                            $rec = mysqli_num_rows($run);
                            if ($rec > 0) {
                                echo '<h4 class="text-primary mb-2">Performed Products (' . $rec . ')</h4>';
                            }
                            while ($a = mysqli_fetch_assoc($run)) {
                            ?>
                                <a href="product_details.php?<?php echo $a['product_id'] ?>" class="btn btn-primary light btn-xs mb-1"><?php echo mb_strimwidth($a['product_name'], 0, 13, "...") ?></a>
                            <?php }
                            ?>
                        </div>
                        <div class="profile-personal-info">
                            <h4 class="text-primary mb-4">Personal Information</h4>
                            <div class="row mb-2">
                                <div class="col-sm-3 col-5">
                                    <h5 class="f-w-500">Employee ID<span class="pull-end">:</span>
                                    </h5>
                                </div>
                                <div class="col-sm-9 col-7"><span><?php echo $data['user_id']; ?></span>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-3 col-5">
                                    <h5 class="f-w-500">Role<span class="pull-end">:</span>
                                    </h5>
                                </div>
                                <div class="col-sm-9 col-7"><span><?php echo $data['role_name']; ?></span>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-3 col-5">
                                    <h5 class="f-w-500">Status<span class="pull-end">:</span>
                                    </h5>
                                </div>
                                <div class="col-sm-9 col-7"><span><?php echo $data['flag_name']; ?></span>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-3 col-5">
                                    <h5 class="f-w-500">Name<span class="pull-end">:</span>
                                    </h5>
                                </div>
                                <div class="col-sm-9 col-7"><span><?php echo $data['user_name']; ?></span>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-3 col-5">
                                    <h5 class="f-w-500">User Name<span class="pull-end">:</span>
                                    </h5>
                                </div>
                                <div class="col-sm-9 col-7"><span><?php echo $data['username']; ?></span>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-3 col-5">
                                    <h5 class="f-w-500">Gender<span class="pull-end">:</span>
                                    </h5>
                                </div>
                                <div class="col-sm-9 col-7"><span><?php echo strtoupper($data['gender']); ?></span>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-3 col-5">
                                    <h5 class="f-w-500">Education<span class="pull-end">:</span>
                                    </h5>
                                </div>
                                <div class="col-sm-9 col-7"><span><?php echo $data['user_education']; ?></span>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-3 col-5">
                                    <h5 class="f-w-500">Email <span class="pull-end">:</span>
                                    </h5>
                                </div>
                                <div class="col-sm-9 col-7"><span><?php echo $data['user_email']; ?></span>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-3 col-5">
                                    <h5 class="f-w-500">Contact <span class="pull-end">:</span>
                                    </h5>
                                </div>
                                <div class="col-sm-9 col-7"><span><?php echo $data['user_contact']; ?></span>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-3 col-5">
                                    <h5 class="f-w-500">Address <span class="pull-end">:</span>
                                    </h5>
                                </div>
                                <div class="col-sm-9 col-7"><span><?php echo $data['user_address']; ?></span>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-3 col-5">
                                    <h5 class="f-w-500">Salary<span class="pull-end">:</span></h5>
                                </div>
                                <div class="col-sm-9 col-7"><span>$<?php echo $data['salary']; ?></span>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-3 col-5">
                                    <h5 class="f-w-500">Join <span class="pull-end">:</span>
                                    </h5>
                                </div>
                                <div class="col-sm-9 col-7"><span><?php echo $data['creation_time']; ?></span>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-3 col-5">
                                    <h5 class="f-w-500">Status <span class="pull-end">:</span>
                                    </h5>
                                </div>
                                <div class="col-sm-9 col-7"><span><?php echo $data['user_status']; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
    mysqli_close($con);
    exit();
}
?>