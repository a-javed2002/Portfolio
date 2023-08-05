<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['btn_flag_insert'])) {
        require 'partials/_connection.php';
        $flag = $_POST['flag_name'];
        if ($flag != '') {
            $sql3 = "SELECT * FROM `flag` where flag_name='$flag'";
            $res3 = mysqli_query($con, $sql3);
            if (mysqli_num_rows($res3) == 0) {
                // Sql query to be executed
                $sql = "INSERT INTO `flag` (`flag_name`) VALUES ('$flag')";
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
        unset($_POST['btn_flag_insert']);
        mysqli_close($con);
        exit();
    }
}

?>

<?php
if (isset($_POST['btn_flag_update_show'])) {
    require 'partials/_connection.php';
    $flag_id = $_POST['id'];
    $sql = "SELECT * FROM `flag` where flag_id='$flag_id'";
    $res = mysqli_query($con, $sql);
    $data = mysqli_fetch_assoc(($res));
?>
    <div class="mb-3 row">
        <label class="col-sm-3 col-form-label">Flag</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" value="<?php echo $data['flag_name'] ?>" id="flag-name-update" placeholder="Enter Here">
        </div>
        <div class="col-sm-9">
            <input type="hidden" class="form-control" value="<?php echo $data['flag_id'] ?>" id="flag-id">
        </div>
    </div>
<?php
    mysqli_close($con);
    exit();
}
?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['btn_flag_update'])) {
        require 'partials/_connection.php';
        $flag = $_POST['flag_name'];
        $id = $_POST['flag_id'];
        $sql3 = "SELECT * FROM `flag` where flag_name='$flag'";
        $res3 = mysqli_query($con, $sql3);
        if (mysqli_num_rows($res3) <= 1) {
            // Sql query to be executed
            $sql = "UPDATE `flag` SET `flag_name` = '$flag' WHERE `flag`.`flag_id` = '$id'";
            $res = mysqli_query($con, $sql);
            if ($res) {
                // echo "<script>alert('Updated Successfully!!');window.location.href='flag.php'</script>";
                $data = array();
                $data['status'] = 1;
                $data['msg'] = 'Updated Successfully!!';
                echo json_encode($data);
            } else {
                // echo "<script>alert('Updating Error!!')</script>";
                $data = array();
                $data['status'] = 0;
                $data['msg'] = 'Updating Error!!';
                echo json_encode($data);
            }
        } else {
            // echo "<script>alert('Flag Already Exists!!')</script>";
            $data = array();
            $data['status'] = 0;
            $data['msg'] = 'Flag Already Exists!!';
            echo json_encode($data);
        }
        mysqli_close($con);
        exit();
    }
}
?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['btn_flag_delete'])) {
        require 'partials/_connection.php';
        $id = $_POST['id'];
        $sql = "DELETE from `flag` where flag_id='$id'";
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
    $sql2 = "SELECT * FROM `flag` ORDER BY flag_id DESC";
    $res2 = mysqli_query($con, $sql2);
    while ($data = mysqli_fetch_assoc(($res2))) {
?>
        <tr>
            <td></td>
            <td><?php echo $data['flag_id'] ?></td>
            <td><?php echo $data['flag_name'] ?></td>
            <td>
                <div class="d-flex">
                    <a href="#" onclick="updateFn(<?php echo $data['flag_id'] ?>)" data-bs-toggle="modal" data-bs-target="#myModal" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                    <a href="#" onclick="deleteShow(<?php echo $data['flag_id'] ?>)" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                </div>
            </td>
        </tr>
<?php
    }
    mysqli_close($con);
    exit();
}
?>