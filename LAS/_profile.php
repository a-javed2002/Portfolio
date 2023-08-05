<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['btn_c_password'])) {
        require 'partials/_connection.php';
        $old_password = $_POST['old_password'];
        $password = $_POST['password'];
        $id = $_POST['id'];
        $sql3 = "SELECT * FROM `user` where user_id='$id'";
        $res3 = mysqli_query($con, $sql3);
        $x = mysqli_fetch_assoc($res3);
        $temp = $x['user_password'];
        // if ($old_password == $temp) {
            if (password_verify($old_password, $temp)) {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "UPDATE `user` SET `user_password` = '$hash' WHERE `user`.`user_id` = '$id'";
            $res = mysqli_query($con, $sql);
            if ($res) {
                $data = array();
                $data['status'] = 1;
                $data['msg'] = 'Password Updated Successful!!';
                echo json_encode($data);
            } else {
                $data['status'] = 0;
                $data = array();
                $data['msg'] = 'update Error!!';
                echo json_encode($data);
            }
        } else {
            $data['status'] = 0;
            $data = array();
            $data['msg'] = 'Old password Does NOt Match!!';
            echo json_encode($data);
        }
        mysqli_close($con);
        exit();
    }
}
?>


<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['btn_c_bio'])) {
        require 'partials/_connection.php';
        $bio = $_POST['bio'];
        $id = $_POST['id'];
        $sql = "UPDATE `user` SET `user_bio` = '$bio' WHERE `user`.`user_id` = '$id'";
        $res = mysqli_query($con, $sql);
        if ($res) {
            $data = array();
            $data['status'] = 1;
            $data['msg'] = 'Bio Updated Successful!!';
            echo json_encode($data);
        } else {
            $data['status'] = 0;
            $data = array();
            $data['msg'] = 'update Error!!';
            echo json_encode($data);
        }
        mysqli_close($con);
        exit();
    }
}
?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['btn_c_status'])) {
        require 'partials/_connection.php';
        $status = $_POST['status'];
        $id = $_POST['id'];
        $sql = "UPDATE `user` SET `user_status` = '$status' WHERE `user`.`user_id` = '$id'";
        $res = mysqli_query($con, $sql);
        if ($res) {
            $data = array();
            $data['status'] = 1;
            $data['msg'] = 'Status Updated Successful!!';
            echo json_encode($data);
        } else {
            $data['status'] = 0;
            $data = array();
            $data['msg'] = 'update Error!!';
            echo json_encode($data);
        }
        mysqli_close($con);
        exit();
    }
}
?>




<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['btn_c_info'])) {
        require 'partials/_connection.php';
        $name = $_POST['name'];
        $education = $_POST['education'];
        $email = $_POST['email'];
        $contact = $_POST['contact'];
        $Address = $_POST['address'];
        $id = $_POST['id'];
        $sql = "UPDATE `user` SET `user_name` = '$name',`user_education` = '$education',`user_email` = '$email',`user_contact` = '$contact',`user_address` = '$address' WHERE `user`.`user_id` = '$id'";
        $res = mysqli_query($con, $sql);
        if ($res) {
            $data = array();
            $data['status'] = 1;
            $data['msg'] = 'Info Updated Successful!!';
            echo json_encode($data);
        } else {
            $data['status'] = 0;
            $data = array();
            $data['msg'] = 'update Error!!';
            echo json_encode($data);
        }
        mysqli_close($con);
        exit();
    }
}
?>






<?php
if (isset($_POST['btn_profile_edit'])) {
    require 'partials/_connection.php';
    $user_id = $_POST['id'];
    $sql = "SELECT * FROM `user` WHERE user_id='$user_id'";
    $res = mysqli_query($con, $sql);
    $data = mysqli_fetch_assoc($res);
?>
    <div class="pt-3">
        <div class="settings-form">
            <h4 class="text-primary mb-3 mt-3">Account Setting</h4>
            <div class="mb-3 row">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-primary">Change Password</h4>
                        <button class="btn btn-primary" id="btn-c-password">Update</button>
                    </div>
                    <div class="mb-3">
                        <label class="text-label form-label" for="dz-password">Old Password *</label>
                        <div class="input-group transparent-append">
                            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                            <input type="password" class="form-control" id="old-password" placeholder="Choose a safe one.." required>
                            <span class="input-group-text show-pass">
                                <i class="bi bi-eye-slash" id="togglePassword1" style="cursor: pointer;color: black;"></i>
                                <!-- <i class="fa fa-eye"></i> -->
                            </span>
                            <div class="invalid-feedback">
                                Please Enter a username.
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="text-label form-label" for="dz-password">New Password *</label>
                        <div class="input-group transparent-append">
                            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                            <input type="password" class="form-control" id="user-password" placeholder="Choose a safe one.." required>
                            <span class="input-group-text show-pass">
                                <i class="bi bi-eye-slash" id="togglePassword2" style="cursor: pointer;color: black;"></i>
                                <!-- <i class="fa fa-eye"></i> -->
                            </span>
                            <div class="invalid-feedback">
                                Please Enter a username.
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="text-label form-label" for="dz-password">Confirm Password *</label>
                        <div class="input-group transparent-append">
                            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                            <input type="password" class="form-control" id="user-password-confirm" placeholder="Choose a safe one.." required>
                            <span class="input-group-text show-pass">
                                <i class="bi bi-eye-slash" id="togglePassword-confirm" style="cursor: pointer;color: black;"></i>
                                <!-- <i class="fa fa-eye"></i> -->
                            </span>
                            <div class="invalid-feedback">
                                Please Enter a username.
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="mb-3 row">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-primary">Employee Status <i class="fa fa-question-circle" aria-hidden="true" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="For Others,Your Mood For Chat" title="What Is User Status"></i></h4>
                        <button class="btn btn-primary" id="btn-c-status">Update</button>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <div class="row mb-2">
                                <div class="col-sm-3 col-5">
                                    <h5 class="f-w-500">Status<span class="pull-end">:</span>
                                    </h5>
                                </div>
                                <div class="col-sm-9 col-7">
                                    <input type="text" placeholder="Enter Here..." id="user-status" class="form-control" value="<?php echo $data['user_status']; ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-3 row">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-primary">Employee Bio <i class="fa fa-question-circle" aria-hidden="true" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="Your Experience,Daily Life..." title="What Is User Bio"></i></h4>
                        <button class="btn btn-primary" id="btn-c-bio">Update</button>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <div class="mb-3">
                                <textarea class="form-control" rows="4" id="user-bio">
																			<?php
                                                                            if ($data['user_bio'] != '') {
                                                                                echo $data['user_bio'];
                                                                            } else {
                                                                                echo 'Add Bio...';
                                                                            }
                                                                            ?>
																			</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="profile-personal-info">
                <div class="card-header">
                    <h4 class="text-primary mb-4">Personal Information</h4>
                    <button class="btn btn-primary" id="btn-c-info">Update</button>
                </div>

                <div class="row mb-2">
                    <div class="col-sm-3 col-5">
                        <h5 class="f-w-500">Name<span class="pull-end">:</span>
                        </h5>
                    </div>
                    <div class="col-sm-9 col-7">
                        <input type="text" placeholder="Enter Here..." id="user-name" class="form-control" value="<?php echo $data['user_name']; ?>">
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-sm-3 col-5">
                        <h5 class="f-w-500">Education<span class="pull-end">:</span>
                        </h5>
                    </div>
                    <div class="col-sm-9 col-7">
                        <input type="text" placeholder="Enter Here..." id="user-education" class="form-control" value="<?php echo $data['user_education']; ?>">
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-sm-3 col-5">
                        <h5 class="f-w-500">Email <span class="pull-end">:</span>
                        </h5>
                    </div>
                    <div class="col-sm-9 col-7">
                        <input type="text" placeholder="Enter Here..." id="user-email" class="form-control" value="<?php echo $data['user_email']; ?>">
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-sm-3 col-5">
                        <h5 class="f-w-500">Contact <span class="pull-end">:</span>
                        </h5>
                    </div>
                    <div class="col-sm-9 col-7">
                        <input type="text" placeholder="Enter Here..." id="user-contact" class="form-control" value="<?php echo $data['user_contact']; ?>">
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-sm-3 col-5">
                        <h5 class="f-w-500">Address <span class="pull-end">:</span>
                        </h5>
                    </div>
                    <div class="col-sm-9 col-7">
                        <input type="text" placeholder="Enter Here..." id="user-address" class="form-control" value="<?php echo $data['user_address']; ?>">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="public/assets/js/custom.js"></script>
    
<?php
    mysqli_close($con);
    exit();
}
?>





<?php
if (isset($_POST['btn_user_info_profile'])) {
    require 'partials/_connection.php';
    $user_id = $_POST['id'];
    $sql = "SELECT * FROM `user` join `role` on `user`.role_id_FK=`role`.role_id join `flag` on `user`.flag_id_FK=`flag`.flag_id WHERE user_id='$user_id'";
    $res = mysqli_query($con, $sql);
    $data = mysqli_fetch_assoc($res);
?>

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
                                    <h5 class="f-w-500"><i class="fa fa-question-circle" aria-hidden="true" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="bottom" data-bs-content="Unique ID For Each user" title="What Is User ID"></i>User ID<span class="pull-end">:</span>
                                    </h5>
                                </div>
                                <div class="col-sm-9 col-7"><span><?php echo $data['user_id']; ?></span>
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
                                    <h5 class="f-w-500"><i class="fa fa-question-circle" aria-hidden="true" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="bottom" data-bs-content="For Others,Your Mood For Chat" title="What Is User Status"></i>User Status <span class="pull-end">:</span>
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
    <script src="public/assets/js/custom.js"></script>
<?php
    mysqli_close($con);
    exit();
}
?>