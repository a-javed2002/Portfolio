<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['btn_performed_insert'])) {
        require 'partials/_connection.php';
        $test_id = $_POST['test_id'];
        $product_id = $_POST['product_id'];
        $user_id = $_POST['user_id'];
        $remarks = $_POST['remarks'];
        $query = "SELECT * FROM `performed` join `product` on `performed`.product_id_FK = `product`.product_id where product_id='$product_id'";
        $res2 = mysqli_query($con, $query);
        $count = mysqli_num_rows($res2);
        $data = mysqli_fetch_assoc(($res2));
        if ($count == 0) {
            $s = "SELECT * FROM `product` WHERE product_id='$product_id'";
            $r = mysqli_query($con, $s);
            $x = mysqli_fetch_assoc($r);
            $product_name = $x['product_name'];
            $test_code = $product_name . '-' . 1 . '-' . $test_id;
        } else {
            $product_name = $data['product_name'];
            $test_code = $product_name . '-' . $count + 1 . '-' . $test_id;
        }
        // Sql query to be executed
        $sql = "INSERT INTO `performed` (`test_code`, `product_id_FK`, `test_id_FK`, `user_id_FK`, `remarks`) VALUES ('$test_code', '$product_id', '$test_id', '$user_id', '$remarks')";
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
        mysqli_close($con);
        exit();
    }
}
?>

<?php
if (isset($_POST['btn_performed_update_show'])) {
    require 'partials/_connection.php';
    $performed_id = $_POST['id'];
    $sql = "SELECT * FROM `performed` join `product` on `performed`.product_id_FK = `product`.product_id where performed_id='$performed_id'";
    $res = mysqli_query($con, $sql);
    $data = mysqli_fetch_assoc(($res));
?>
    <label class="col-sm-3 col-form-label">Performed</label>
    <div class="col-sm-9">
        <input type="text" class="form-control" value="<?php echo $data['performed_id'] ?>" id="performed-name-update" placeholder="Enter Here">
    </div>
    <div class="col-sm-9">
        <input type="hidden" class="form-control" value="<?php echo $data['performed_id'] ?>" id="performed-id">
    </div>
<?php
    mysqli_close($con);
    exit();
}
?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['btn_performed_update'])) {
        require 'partials/_connection.php';
        $performed_gender = $_POST['performed_gender'];
        $performed_performed = $_POST['performed_performed'];
        $performed_name = $_POST['performed_name'];
        $performed_email = $_POST['performed_email'];
        $performed_contact = $_POST['performed_contact'];
        $performed_password = $_POST['performed_password'];
        $performed_address = $_POST['performed_address'];
        $performed_salary = $_POST['performed_salary'];
        $sql3 = "SELECT * FROM `performed` where performed_name='$performed'";
        $res3 = mysqli_query($con, $sql3);
        if (mysqli_num_rows($res3) <= 1) {
            // Sql query to be executed
            $sql = "UPDATE `performed` SET `performed_name` = '$performed' WHERE `performed`.`performed_id` = '$id'";
            $res = mysqli_query($con, $sql);
            if ($res) {
                // echo "<script>alert('Updated Successfully!!');window.location.href='performed.php'</script>";
                $data = array();
                $data['status'] = 'Updated Successfully!!';
                echo json_encode($data);
            } else {
                // echo "<script>alert('Updating Error!!')</script>";
                $data = array();
                $data['status'] = 'Updating Error!!';
                echo json_encode($data);
            }
        } else {
            // echo "<script>alert('Performed Already Exists!!')</script>";
            $data = array();
            $data['status'] = 'Performed Already Exists!!';
            echo json_encode($data);
        }
        mysqli_close($con);
        exit();
    }
}
?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['btn_performed_delete'])) {
        require 'partials/_connection.php';
        $id = $_POST['id'];
        $sql = "DELETE from `performed` where performed_id='$id'";
        $res = mysqli_query($con, $sql);
        if ($res) {
            $data = array();
            $data['status'] = 'Deleted Successfully!!';
            echo json_encode($data);
        } else {
            $data = array();
            $data['status'] = 'Deleted Error!! ' . mysqli_error($con);
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
    $sql2 = "SELECT * FROM `performed` join `product` on `performed`.`product_id_FK`=`product`.`product_id` join `user` on `performed`.user_id_FK=`user`.user_id join `test` on `performed`.test_id_FK=`test`.test_id ORDER BY performed_id DESC";
    $res2 = mysqli_query($con, $sql2);
    while ($data = mysqli_fetch_assoc(($res2))) {
?>
        <tr>
            <td></td>
            <td><?php echo $data['performed_id'] ?></td>
            <td><a href="product_details.php?id=<?php echo $data['product_id'] ?>"><?php echo ucwords($data['product_name']) ?></a></td>
            <td><?php echo $data['test_code'] ?></td>
            <td><a href="test.php?id=<?php echo $data['test_id'] ?>"><?php echo ucwords($data['test_name']) ?></a></td>
            <?php
            if (strtolower($_SESSION['userRole']) == 'admin') {
            ?>
                <td><a href="user.php?id=<?php echo $data['user_id'] ?>"><?php echo ucwords($data['username']) ?></a></td>
            <?php
            } else {
            ?>
                <td><?php echo ucwords($data['username']) ?></td>
            <?php
            }
            ?>
            <td><?php echo mb_strimwidth($data['remarks'], 0, 15, "...") ?></td>
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
                            <a class="dropdown-item" style="cursor: pointer;" onclick="moreDetail(<?php echo $data['product_id'] ?>)" data-bs-toggle="modal" data-bs-target="#myModal">Info<i class="fa fa-info-circle" style="float: right;"></i></a>
                            <a class="dropdown-item" style="cursor: pointer;" onclick="updateFn(<?php echo $data['product_id'] ?>)" data-bs-toggle="modal" data-bs-target="#myModal">Edit<i class="fas fa-pencil-alt" style="float: right;"></i></a>
                            <a class="dropdown-item text-danger" style="cursor: pointer;" onclick="deleteShow(<?php echo $data['product_id'] ?>)">Delete<i class="fa fa-trash" style="float: right;"></i></a>
                        </div>
                    </div>
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
if (isset($_POST['btn_product_show'])) {
    require 'partials/_connection.php';
    $component_id = $_POST['id'];
    $sql = "SELECT * FROM `product` WHERE component_id_FK = '$component_id' ORDER BY product_name ASC";
    $res = mysqli_query($con, $sql);
?>
    <label class="col-sm-3 col-form-label">Product</label>
    <div class="col-sm-9">
        <div class="input-group mb-3">
            <select class="wide" id="product-id-value">
                <option selected disabled>Choose Product</option>
                <?php
                while ($data = mysqli_fetch_assoc($res)) {
                ?>
                    <option value="<?php echo $data['product_id'] ?>"><?php echo strtoupper($data['product_name']) ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
<?php
    mysqli_close($con);
    exit();
}
?>