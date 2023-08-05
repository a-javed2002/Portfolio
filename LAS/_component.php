<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['btn_component_insert'])) {
        require 'partials/_connection.php';
        $component = $_POST['component_name'];
        $detail = $_POST['component_detail'];
        $sql3 = "SELECT * FROM `component` where component_name='$component'";
        $res3 = mysqli_query($con, $sql3);
        if (mysqli_num_rows($res3) == 0) {
            // Sql query to be executed
            $component = str_replace('<', '&lt;', $component);
            $component = str_replace('>', '&gt;', $component);
            $detail = str_replace('<', '&lt;', $detail);
            $detail = str_replace('>', '&gt;', $detail);
            $sql = "INSERT INTO `component` (`component_name`,`component_detail`) VALUES ('$component','$detail')";
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
            $data['msg'] = 'Component Already Exists!!';
            echo json_encode($data);
        }
        mysqli_close($con);
        exit();
    }
}
?>


<?php
if (isset($_POST['btn_component_update_show'])) {
    require 'partials/_connection.php';
    $component_id = $_POST['id'];

    $sql = "SELECT * FROM `component` where component_id='$component_id'";
    $res = mysqli_query($con, $sql);
    $data = mysqli_fetch_assoc(($res));
?>
    <div class="mb-3 row">
        <label class="col-sm-3 col-form-label">Component</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" value="<?php echo $data['component_name'] ?>" id="component-name-update" placeholder="Enter Here">
        </div>
        <div class="col-sm-9">
            <input type="hidden" class="form-control" value="<?php echo $data['component_id'] ?>" id="component-id">
        </div>
        <div class="mb-3 row">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Component Detail</h4>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form>
                            <div class="mb-3">
                                <textarea class="form-control" rows="4" id="component-detail-update"><?php echo $data['component_detail'] ?></textarea>
                            </div>
                        </form>
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

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['btn_component_update'])) {
        require 'partials/_connection.php';
        $component = $_POST['component_name'];
        $detail = $_POST['component_detail'];
        $id = $_POST['component_id'];
        $sql3 = "SELECT * FROM `component` where component_name='$component'";
        $res3 = mysqli_query($con, $sql3);
        if (mysqli_num_rows($res3) <= 1) {
            // Sql query to be executed
            $sql = "UPDATE `component` SET `component_name` = '$component' ,`component_detail` = '$detail' WHERE `component`.`component_id` = '$id'";
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
            $data['msg'] = 'Component Already Exists!!';
            echo json_encode($data);
        }
        mysqli_close($con);
        exit();
    }
}
?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['btn_component_delete'])) {
        require 'partials/_connection.php';
        $id = $_POST['id'];
        $sql = "DELETE from `component` where component_id='$id'";
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
    $sql2 = "SELECT * FROM `component` ORDER BY component_id DESC";
    $res2 = mysqli_query($con, $sql2);
    while ($data = mysqli_fetch_assoc(($res2))) {
        $component_id = $data['component_id'];
        $query = "SELECT * FROM `image` WHERE component_id_FK='$component_id' ORDER BY image_id DESC";
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
            <td><?php echo $data['component_id'] ?></td>
            <td><a href="image_preview.php?id=<?php echo $data['component_id'] ?>&name=component" style="border-radius: 50%;"><img src="<?php echo $img ?>" alt="<?php echo $data['component_name'] ?>" width="50px" height="50px" style="border-radius: 50%;"></a><a href="component_details.php?id=<?php echo $data['component_id'] ?>"><?php echo $data['component_name'] ?></a></td>
            <td><?php echo mb_strimwidth($data['component_detail'], 0, 30, "...") ?></td>
            <td>
                <div class="d-flex">
                    <a href="#" onclick="updateFn(<?php echo $data['component_id'] ?>)" data-bs-toggle="modal" data-bs-target="#myModal" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                    <a href="#" onclick="deleteShow(<?php echo $data['component_id'] ?>)" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
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
                        $query = "INSERT INTO `image` (`component_id_FK`, `image`,`image_status`,`user_id_FK`) VALUES ('$id', '$path', '1','$current_user')";
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
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['component_list'])) {
        require 'partials/_connection.php';
        if (isset($_POST['name']) && $_POST['name'] != 'null') {
            $search_text = $_POST['name'];
            $c1 = $search_text[0];
            $c2 = $search_text[strlen($search_text) - 1];
            if ($c1 == '/') {
                // Or we can write ltrim($str, $str[0]);
                $search_text = ltrim($search_text, '/');
                $sql2 = "SELECT * FROM `component` WHERE component_name LIKE '$search_text%'";
            } else if ($c2 == '/') {
                $search_text = rtrim($search_text, '/');
                $sql2 = "SELECT * FROM `component` WHERE component_name LIKE '%$search_text'";
            } else {
                $sql2 = "SELECT * FROM `component` WHERE component_name LIKE '%$search_text%'";
            }
        } else if (isset($_POST['id']) && $_POST['id'] != 'null') {
            $id = $_POST['id'];
            $sql2 = "SELECT * FROM `component` WHERE component_id='$id'";
        } else {
            $sql2 = "SELECT * FROM `component` ORDER BY component_name DESC";
        }
        $res2 = mysqli_query($con, $sql2);
        $rows = mysqli_num_rows($res2);
        if ($rows > 0) {
            while ($data = mysqli_fetch_assoc(($res2))) {
                $component_id = $data['component_id'];
                $query = "SELECT * FROM `image` WHERE component_id_FK='$component_id' ORDER BY image_id DESC";
                $result = mysqli_query($con, $query);
                $temp = mysqli_fetch_assoc($result);
                $row = mysqli_num_rows($result);
                if ($row > 0) {
                    $img = $temp['image'];
                } else {
                    $img = 'public\assets\images\no-image-available.jpg';
                }
                if (isset($_POST['name'])) {
                    $temp = $_POST['name'];
                    $c1 = $temp[0];
                    $c2 = $temp[strlen($temp) - 1];
                    if ($c1 == '/') {
                        // Or we can write ltrim($str, $str[0]);
                        $temp = ltrim($temp, '/');
                    } else if ($c2 == '/') {
                        $temp = rtrim($temp, '/');
                    }
                    // echo json_encode($temp);
                    $c_name = $data['component_name'];
                    $c_name = str_replace($temp, '<span style="color:red;">' . $temp . '</span>', $c_name);
                } else {
                    $c_name = $data['component_name'];
                }
?>
                <li class="media mb-3">
                    <a href="image_preview.php?id=<?php echo $data['component_id'] ?>&name=component" style="border-radius: 50%;"><img class="me-3 " width="60" src="<?php echo $img; ?>" alt="<?php echo $data['component_name']; ?>"></a>
                    <div class="media-body">
                        <h5 class="mt-0"><b class="text-primary">NAME: </b><?php echo $c_name ?></h5>
                        <p class="mb-0"><b class="text-primary">DETAIL: </b><?php echo $data['component_detail']; ?>.</p>
                    </div>
                </li>

                <div class="profile-lang  mb-5" style="border-bottom: 2px dotted purple;padding-bottom: 45px;">
                    <?php
                    $que = "SELECT * FROM `product` WHERE `product`.component_id_FK='$component_id'";
                    $run = mysqli_query($con, $que);
                    $rec = mysqli_num_rows($run);
                    if ($rec > 0) {
                        echo '<h4 class="text-primary mb-2">Components Products (' . $rec . ')</h4>';
                    }
                    while ($a = mysqli_fetch_assoc($run)) {
                    ?>
                        <a href="product_details.php?id=<?php echo $a['product_id'] ?>" class="btn btn-primary light btn-xs mb-1"><?php echo mb_strimwidth($a['product_name'], 0, 13, "...") ?></a>
                    <?php }
                    ?>
                </div>
<?php
            }
        } else {
            echo '<li><h3>No Components Found...!!!</h3></li>';
        }
        mysqli_close($con);
        exit();
    }
}
?>