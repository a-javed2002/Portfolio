<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['btn_test_insert'])) {
        require 'partials/_connection.php';
        $test = $_POST['test_name'];
        $description = $_POST['test_description'];
        $sql3 = "SELECT * FROM `test` where test_name='$test'";
        $res3 = mysqli_query($con, $sql3);
        if (mysqli_num_rows($res3) == 0) {
            // Sql query to be executed
            $sql = "INSERT INTO `test` (`test_name`,`test_description`) VALUES ('$test','$description')";
            $res = mysqli_query($con, $sql);
            if ($res) {
                session_start();
                $_SESSION['image_id'] = mysqli_insert_id($con);
                $data = array();
                $data['status'] = 1;
                $data['msg'] = 'Insertion Successful!!';
                echo json_encode($data);
            } else {
                $data = array();
                $data['status'] = 0;
                $data['msg'] = 'Insert Error!!';
                echo json_encode($data);
            }
        } else {
            $data = array();
            $data['status'] = 0;
            $data['msg'] = 'Test Already Exists!!';
            echo json_encode($data);
        }
        mysqli_close($con);
        exit();
    }
}
?>


<?php
if (isset($_POST['btn_test_update_show'])) {
    require 'partials/_connection.php';
    $test_id = $_POST['id'];
    $sql = "SELECT * FROM `test` where test_id='$test_id'";
    $res = mysqli_query($con, $sql);
    $data = mysqli_fetch_assoc(($res));
?>
    <div class="mb-3 row">
        <label class="col-sm-3 col-form-label">test</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" value="<?php echo $data['test_name'] ?>" id="test-name-update" placeholder="Enter Here">
        </div>
        <div class="col-sm-9">
            <input type="hidden" class="form-control" value="<?php echo $data['test_id'] ?>" id="test-id">
        </div>
    </div>
    <div class="mb-3 row">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Test Description</h4>
            </div>
            <div class="card-body">
                <div class="basic-form">
                    <form>
                        <div class="mb-3">
                            <textarea class="form-control" rows="4" id="test-description-update"><?php echo $data['test_description'] ?>"</textarea>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php
    mysqli_close($con);
    exit();
}
?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['btn_test_update'])) {
        require 'partials/_connection.php';
        $test = $_POST['test_name'];
        $id = $_POST['test_id'];
        $sql3 = "SELECT * FROM `test` where test_name='$test'";
        $res3 = mysqli_query($con, $sql3);
        if (mysqli_num_rows($res3) <= 1) {
            // Sql query to be executed
            $sql = "UPDATE `test` SET `test_name` = '$test' WHERE `test`.`test_id` = '$id'";
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
        } else {
            $data = array();
            $data['status'] = 0;
            $data['msg'] = 'Test Already Exists!!';
            echo json_encode($data);
        }
        mysqli_close($con);
        exit();
    }
}
?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['btn_test_delete'])) {
        require 'partials/_connection.php';
        $id = $_POST['id'];
        $sql = "DELETE from `test` where test_id='$id'";
        $res = mysqli_query($con, $sql);
        if ($res) {
            $data = array();
            $data['status'] = 1;
            $data['msg'] = 'Deleted Successfully!!';
            echo json_encode($data);
        } else {
            $data = array();
            $data['status'] = 0;
            $data['msg'] = 'Deleted Error!! ' . mysqli_error($con);
            echo json_encode($data);
            // echo mysqli_error($con);
        }
        mysqli_close($con);
        exit();
    }
}
?>

<?php
if (isset($_POST['btn_show'])) {
    require 'partials/_connection.php';
    $sql2 = "SELECT * FROM `test` ORDER BY test_id DESC";
    $res2 = mysqli_query($con, $sql2);
    while ($data = mysqli_fetch_assoc(($res2))) {
        $test_id = $data['test_id'];
        $query = "SELECT * FROM `image` WHERE test_id_FK='$test_id' ORDER BY image_id DESC";
        $result = mysqli_query($con, $query);
        $temp = mysqli_fetch_assoc($result);
        $row = mysqli_num_rows($result);
        if ($row > 0) {
            $img = $temp['image'];
        } else {
            $img = 'public\assets\images\no-image-available.jpg';
        } 
?>
        <tr>
            <td></td>
            <td><?php echo $data['test_id'] ?></td>
            <td><a href="<?php echo $img ?>" style="border-radius: 50%;"><img src="<?php echo $img ?>" alt="<?php echo $data['test_name'] ?>" width="50px" height="50px" style="border-radius: 50%;"></a><a href="#" onclick="moreDetail(<?php echo $data['test_id'] ?>)" data-bs-toggle="modal" data-bs-target="#myModal"><?php echo $data['test_name'] ?></a></td>
            <td><?php echo mb_strimwidth($data['test_description'], 0, 30, "...") ?></td>
            <td>
                <div class="d-flex">
                    <a href="#" onclick="moreDetail(<?php echo $data['test_id'] ?>)" data-bs-toggle="modal" data-bs-target="#myModal" class="btn btn-info shadow btn-xs sharp me-1"><i class="fas fa-eye"></i></a>
                    <a href="#" onclick="updateFn(<?php echo $data['test_id'] ?>)" data-bs-toggle="modal" data-bs-target="#myModal" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                    <a href="#" onclick="deleteShow(<?php echo $data['test_id'] ?>)" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                </div>
            </td>
        </tr>
<?php
    }
    mysqli_close($con);
    exit();
}
?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_GET['name'])) {
        require 'partials/_connection.php';

        $id = $_GET['id'];
        $current_user = $_GET['current_user'];
        // Count total files
        $countFiles = count($_FILES['files']['name']);

        // Upload Location
        $upload_location = "uploads/";

        // To store uploaded files path
        $files_arr = array();

        // Loop all files
        for ($index = 0; $index < $countFiles; $index++) {

            if (isset($_FILES['files']['name'][$index]) && $_FILES['files']['name'][$index] != '') {
                // File name
                $filename = $_FILES['files']['name'][$index];

                // Get extension
                $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

                // Valid image extension
                $valid_ext = array("png", "jpeg", "jpg");

                // Check extension
                if (in_array($ext, $valid_ext)) {

                    // File path
                    $path = $upload_location . $filename;

                    // Upload file
                    if (move_uploaded_file($_FILES['files']['tmp_name'][$index], $path)) {
                        $files_arr[] = $path;
                        $query = "INSERT INTO `image` (`test_id_FK`, `image`,`image_status`,`user_id_FK`) VALUES ('$id', '$path', '1','$current_user')";
                        $res = mysqli_query($con, $query);
                    }
                }
            }
        }

        echo json_encode($files_arr);
        die;
    }
}
?>




<?php
if (isset($_POST['btn_test_info'])) {
    require 'partials/_connection.php';
    $test_id = $_POST['id'];
    $sql = "SELECT * FROM `test` WHERE test_id='$test_id'";
    $res = mysqli_query($con, $sql);
    $data = mysqli_fetch_assoc($res);
?>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="profile-tab">
                        <div class="profile-about-me">
                            <?php
                            $query = "SELECT * FROM `image` WHERE test_id_FK='$test_id' ORDER BY image_id DESC";
                            $run = mysqli_query($con, $query);
                            $rows = mysqli_num_rows($run);
                            if ($rows > 0) {
                                $image = mysqli_fetch_assoc($run);
                                $img = $image['image'];
                            } else {
                                $img = "public/assets/images/component.png";
                            }
                            ?>
                            <a href="image_preview.php?id=<?php echo $data['test_id']; ?>&name=test"><img style="float: right;" src="<?php echo $img; ?>" alt="<?php echo $data['test_name']; ?>" width="100px" height="100px"></a>
                            <div class="pt-4 border-bottom-1 pb-3">
                                <h4 class="text-primary"><b>TEST NAME: <?php echo $data['test_name'] ?></b></h4>
                                <p class="mb-2"><b><span class="text-primary">TEST DESCRIPTION:</span></b> <?php echo $data['test_description'] ?></p>
                            </div>
                        </div>
                        <?php
                        $sql = "SELECT * FROM `performed` join `test` on `performed`.test_id_FK=`test`.test_id join `user` on `performed`.user_id_FK=`user`.user_id  WHERE test_id='$test_id'";
                        $res2 = mysqli_query($con, $sql);
                        $row = mysqli_num_rows($res2);
                        if ($row > 0) {
                        ?>
                            <h4 class="text-primary mb-4">Performed On Products <?php echo $row; ?></h4>
                            <div class="profile-personal-info">
                                <?php
                                while ($data = mysqli_fetch_assoc($res2)) {
                                    $product_id = $data['product_id_FK'];
                                    $sql = "SELECT * FROM `product`  WHERE product_id='$product_id'";
                                    $res3 = mysqli_query($con, $sql);
                                    $data2 = mysqli_fetch_assoc($res3);
                                ?>
                                    <div style="border-right: 2px solid purple;">
                                        <div class="row mb-2">
                                            <div class="col-sm-3 col-5">
                                                <h5 class="f-w-500">Performed ID<span class="pull-end">:</span>
                                                </h5>
                                            </div>
                                            <div class="col-sm-9 col-7"><span><?php echo $data['performed_id']; ?></span>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-sm-3 col-5">
                                                <h5 class="f-w-500">Product ID<span class="pull-end">:</span>
                                                </h5>
                                            </div>
                                            <div class="col-sm-9 col-7"><span><?php echo $data2['product_id']; ?></span>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-sm-3 col-5">
                                                <h5 class="f-w-500">Product Code<span class="pull-end">:</span>
                                                </h5>
                                            </div>
                                            <div class="col-sm-9 col-7"><span><?php echo $data2['product_code']; ?></span>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <a href="product_details.php?id=<?php echo $data2['product_id']; ?>" class="row mb-2">
                                                <div class="col-sm-3 col-5">
                                                    <h5 class="f-w-500">product Name<span class="pull-end">:</span>
                                                    </h5>
                                                </div>
                                                <div class="col-sm-9 col-7"><span><?php echo $data2['product_name']; ?></span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-sm-3 col-5">
                                                <h5 class="f-w-500">User ID<span class="pull-end">:</span>
                                                </h5>
                                            </div>
                                            <div class="col-sm-9 col-7"><span><?php echo $data['user_id']; ?></span>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <a href="user.php?id=<?php echo $data['user_id']; ?>" class="row mb-2">
                                                <div class="col-sm-3 col-5">
                                                    <h5 class="f-w-500">user Name<span class="pull-end">:</span>
                                                    </h5>
                                                </div>
                                                <div class="col-sm-9 col-7"><span><?php echo $data['user_name']; ?></span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        <?php
                        } else {
                            echo '
                            <div class="profile-personal-info">
                                <h4 class="text-primary mb-4">Test Not Performed On Any Products</h4>
                            </div>
                            ';
                        }
                        ?>
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