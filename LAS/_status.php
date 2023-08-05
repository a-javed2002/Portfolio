<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['btn_status_insert'])) {
        require 'partials/_connection.php';
        $status = $_POST['status_name'];
        $icon = $_POST['status_icon'];
        $color = $_POST['status_color'];
        if ($status != '') {
            $sql3 = "SELECT * FROM `status` where status_name='$status'";
            $res3 = mysqli_query($con, $sql3);
            if (mysqli_num_rows($res3) == 0) {
                // Sql query to be executed
                $sql = "INSERT INTO `status` (`status_name`,`color`,`fontawesome_icon`) VALUES ('$status','$color','$icon')";
                $res = mysqli_query($con, $sql);
                if ($res) {
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
                $data['msg'] = 'Already Inserted!!';
                echo json_encode($data);
            }
        } else {
            $data = array();
            $data['status'] = 0;
            $data['msg'] = 'Fill The Field "ADD ROLE"!!';
            echo json_encode($data);
        }
        unset($_POST['btn_status_insert']);
        mysqli_close($con);
        exit();
    }
}

?>

<?php
if (isset($_POST['btn_status_update_show'])) {
    require 'partials/_connection.php';
    $status_id = $_POST['id'];
    $sql = "SELECT * FROM `status` where status_id='$status_id'";
    $res = mysqli_query($con, $sql);
    $data = mysqli_fetch_assoc(($res));
?>
    <div class="mb-3 row">
        <label class="col-sm-3 col-form-label">Status</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" value="<?php echo $data['status_name'] ?>" id="status-name-update" placeholder="Enter Here">
        </div>
    </div>
    <div class="mb-3 row">
        <label class="col-sm-3 col-form-label">Font Awesome Icon</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="status-icon-update" value="<?php echo $data['fontawesome_icon'] ?>" placeholder="Enter Here">
        </div>
    </div>
    <div class="mb-3 row">
        <label class="col-sm-3 col-form-label">Color Picker</label>
        <div class="col-sm-9">
            <input type="text" class="gradient-colorpicker form-control" value="<?php echo $data['color'] ?>" id="status-color-update">
        </div>
    </div>
    <div class="mb-3 row">
        <label class="col-sm-3 col-form-label">Live Change</label>
        <td class="py-2 text-right">
            <span class="badge" style="background-color: <?php echo $data['color'] ?>;" id="color-change">
            <span id="name-change"><?php echo ucwords($data['status_name']) ?></span>
            <span class="ms-1 <?php echo $data['fontawesome_icon'] ?>"></span>
        </span>
        </td>
    </div>



    <div class="col-sm-9">
        <input type="hidden" class="form-control" value="<?php echo $data['status_id'] ?>" id="status-id">
    </div>

    <script src="public/assets/vendor/jquery-asColor/jquery-asColor.min.js"></script>
    <script src="public/assets/vendor/jquery-asGradient/jquery-asGradient.min.js"></script>
    <script src="public/assets/vendor/jquery-asColorPicker/js/jquery-asColorPicker.min.js"></script>
    <script src="public/assets/js/plugins-init/jquery-asColorPicker.init.js"></script>
<?php
    mysqli_close($con);
    exit();
}
?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['btn_status_update'])) {
        require 'partials/_connection.php';
        $status = $_POST['status_name'];
        $id = $_POST['status_id'];
        $icon = $_POST['status_icon'];
        $color = $_POST['status_color'];
        $sql3 = "SELECT * FROM `status` where status_name='$status'";
        $res3 = mysqli_query($con, $sql3);
        if (mysqli_num_rows($res3) <= 1) {
            // Sql query to be executed
            $sql = "UPDATE `status` SET `status_name` = '$status', `fontawesome_icon` = '$icon', `color` = '$color' WHERE `status`.`status_id` = '$id'";
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
            $data['msg'] = 'Status Already Exists!!';
            echo json_encode($data);
        }
        mysqli_close($con);
        exit();
    }
}
?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['btn_status_delete'])) {
        require 'partials/_connection.php';
        $id = $_POST['id'];
        $sql = "DELETE from `status` where status_id='$id'";
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
    $sql2 = "SELECT * FROM `status` ORDER BY status_id DESC";
    $res2 = mysqli_query($con, $sql2);
    while ($data = mysqli_fetch_assoc(($res2))) {
?>
        <tr>
            <td></td>
            <td><?php echo $data['status_id'] ?></td>
            <td class="py-2 text-right">
                <span class="badge" style="background-color: <?php echo $data['color'] ?>;"><?php echo ucwords($data['status_name']) ?><span class="ms-1 <?php echo $data['fontawesome_icon'] ?>"></span></span>
            </td>
            <td>
                <div class="d-flex">
                    <a href="#" onclick="updateFn(<?php echo $data['status_id'] ?>)" data-bs-toggle="modal" data-bs-target="#myModal" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                    <a href="#" onclick="deleteShow(<?php echo $data['status_id'] ?>)" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                </div>
            </td>
        </tr>
<?php
    }
    mysqli_close($con);
    exit();
}
?>