<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['btn_product_insert'])) {
        require 'partials/_connection.php';
        $p_name = $_POST['product_name'];
        $p_code = $_POST['product_code'];
        $p_component = $_POST['product_component'];
        $p_status = $_POST['product_status'];
        $user=$_POST['user'];
        // $sql3 = "SELECT * FROM `product` where product_name='$p_name' AND component_id_FK='$p_component'";
        // $res3 = mysqli_query($con, $sql3);
        // if (mysqli_num_rows($res3) == 0) {
        // Sql query to be executed
        $sql = "INSERT INTO `product` (`product_name`,`product_code`,`component_id_FK`,`status_id_FK`,`product_status`,`user_id_FK`) VALUES ('$p_name','$p_code','$p_component','$p_status','1','$user')";
        $res = mysqli_query($con, $sql);
        if ($res) {
            session_start();
            $_SESSION['image_id'] = mysqli_insert_id($con);
            $data = array();
            $data['status'] = 1;
            $data['msg'] = 'success';
            echo json_encode($data);
        } else {
            $data = array();
            $data['status'] = 0;
            $data['msg'] = 'error';
            echo json_encode($data);
        }
        // } else {
        //     $data = array();
        //     $data['status'] = 0;
        //     $data['msg'] = 'Product Name Already Exist!!';
        //     echo json_encode($data);
        // }
        mysqli_close($con);
        exit();
    }
}
?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['btn_product_update'])) {
        require 'partials/_connection.php';
        $p_id = $_POST['product_id'];
        $s_id = $_POST['status_id'];
        // Sql query to be executed
        $sql = "UPDATE `product` SET `status_id_FK` = '$s_id' WHERE `product`.`product_id` = '$p_id'";
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
        mysqli_close($con);
        exit();
    }
}
?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['btn_product_delete'])) {
        require 'partials/_connection.php';
        $id = $_POST['id'];
        $sql = "UPDATE `product` SET `product_status` = '0' WHERE `product`.`product_id` = '$id'";
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
    $sql2 = "SELECT * FROM `product` join `component` on `product`.`component_id_FK`=`component`.`component_id` join `status` on `product`.status_id_FK=`status`.status_id WHERE product_status='1' ORDER BY product_id DESC";
    $res2 = mysqli_query($con, $sql2);
    while ($data = mysqli_fetch_assoc(($res2))) {
?>
        <tr>
                                            <?php
                                            $id = $data['product_id'];
                                            $query = "SELECT * FROM `product` join image on `product`.`product_id`=`image`.`product_id_FK` where product_id_FK=$id and image_status=1";
                                            $result = mysqli_query($con, $query);;
                                            $record = mysqli_num_rows($result);
                                            $data2 = mysqli_fetch_assoc($result);
                                            if ($record != 0) {
                                                $img = $data2['image'];
                                            } else {
                                                $img = "public/assets/images/component.png";
                                            }
                                            ?>
                                            <!-- <td style="display: none;"><?php #echo $data['user_id'] 
                                                                            ?></td>
                                            <td style="display: none;"><?php #echo $data['user_name'] 
                                                                        ?></td>
                                            <td style="display: none;"><?php #echo $data['username'] 
                                                                        ?></td> -->
                                            <td><?php echo $data['product_id'] ?></td>
                                            <td id="product-<?php echo $data['product_id'] ?>"><a href="image_preview.php?id=<?php echo $data['product_id'] ?>&name=product" style="border-radius: 50%;"><img src="<?php echo $img ?>" alt="<?php echo $data['product_name'] ?>" width="50px" height="50px" style="border-radius: 50%;"></a> <a href="product_details.php?id=<?php echo $data['product_id'] ?>"> <?php echo mb_strimwidth(ucwords($data['product_name']), 0, 15, "...") ?></a></td>
                                            <td><?php echo ucwords($data['product_code']) ?></td>
                                            <td><?php echo ucwords($data['component_name']) ?></td>
                                            <td class="py-2 text-right">
                                                <span class="badge" style="background-color: <?php echo $data['color'] ?>;"><?php echo ucwords($data['status_name']) ?><span class="ms-1 <?php echo $data['fontawesome_icon'] ?>"></span></span>
                                            </td>
                                            <td class="py-2 text-right">
                                                <div class="dropdown text-sans-serif"><button class="btn btn-primary tp-btn-light sharp" type="button" id="order-dropdown-5" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                                    <circle fill="#000000" cx="5" cy="12" r="2"></circle>
                                                                    <circle fill="#000000" cx="12" cy="12" r="2"></circle>
                                                                    <circle fill="#000000" cx="19" cy="12" r="2"></circle>
                                                                </g>
                                                            </svg></span></button>
                                                    <div class="dropdown-menu dropdown-menu-end border py-0" aria-labelledby="order-dropdown-5">
                                                        <div class="py-2">
                                                            <?php
                                                            require 'partials/_connection.php';
                                                            $que = "SELECT * FROM `status`  ORDER BY status_name ASC";
                                                            $res = mysqli_query($con, $que);
                                                            while ($data2 = mysqli_fetch_assoc($res)) {
                                                            ?>
                                                                <a class="dropdown-item" href="#!" onclick="updateFn(<?php echo $data['product_id'] . ',' . $data2['status_id'] ?>)"><?php echo strtoupper($data2['status_name']) ?></a>
                                                            <?php } ?>
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item text-info" href="#!" onclick="moreDetail(<?php echo $data['product_id'] ?>)" data-bs-toggle="modal" data-bs-target="#myModal">Info<i class="fa fa-info-circle" style="float: right;"></i></a>
                                                            <a class="dropdown-item text-danger" href="#!" onclick="deleteShow(<?php echo $data['product_id'] ?>)">Delete<i class="fa fa-trash" style="float: right;"></i></a>
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
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['product_list'])) {
        require 'partials/_connection.php';
        if (isset($_POST['name'])) {
            $search_text = $_POST['name'];
            $c1 = $search_text[0];
            $c2 = $search_text[strlen($search_text) - 1];
            if ($c1 == '/') {
                // Or we can write ltrim($str, $str[0]);
                $search_text = ltrim($search_text, '/');
                $sql2 = "SELECT * FROM `product` WHERE product_name LIKE '$search_text%' ORDER BY product_name ASC";
            } else if ($c2 == '/') {
                $search_text = rtrim($search_text, '/');
                $sql2 = "SELECT * FROM `product` WHERE product_name LIKE '%$search_text' ORDER BY product_name ASC";
            } else {
                $sql2 = "SELECT * FROM `product` WHERE product_name LIKE '%$search_text%' ORDER BY product_name ASC";
            }
        } else {
            $sql2 = "SELECT * FROM `product` ORDER BY product_name ASC";
        }
        $res2 = mysqli_query($con, $sql2);
        $rows = mysqli_num_rows($res2);
        if ($rows > 0) {
            while ($data = mysqli_fetch_assoc(($res2))) {
                $product_id = $data['product_id'];
                $query = "SELECT * FROM `image` WHERE product_id_FK='$product_id' ORDER BY image_id DESC";
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
                    $c_name = $data['product_name'];
                    $c_name = str_replace($temp, '<span style="color:red;">' . $temp . '</span>', $c_name);
                } else {
                    $c_name = $data['product_name'];
                }
?>
                <li class="media mb-3">
                    <a href="image_preview.php?id=<?php echo $data['product_id'] ?>&name=product" style="border-radius: 50%;"><img class="me-3 " width="60" src="<?php echo $img; ?>" alt="<?php echo ucwords($data['product_name']); ?>"></a>
                    <div class="media-body">
                        <h5 class="mt-0"><b class="text-primary">NAME: </b><?php echo $c_name ?></h5>
                        <?php
                        $cId = $data['component_id_FK'];
                        $s = "SELECT * FROM `component` WHERE component_id = '$cId'";
                        $r = mysqli_query($con, $s);
                        $data3 = mysqli_fetch_assoc($r);
                        ?>
                        <p class="mb-0"><b class="text-primary">COMPONENT: </b><?php echo ucwords($data3['component_name']) ?>.</p>
                        <p class="mb-0"><b class="text-primary">COMPONENT DETAIL: </b><?php echo ucwords($data3['component_detail']); ?>.</p>
                    </div>
                    <form action="_export.php?id=<?php echo $data['product_id'] ?>" method="POST">
                    <button class="btn btn-warning">EXPORT</button>
                    </form>
                </li>

                <div class="profile-lang  mb-5" style="border-bottom: 2px dotted purple;padding-bottom: 45px;">
                    <?php
                    $que = "SELECT * FROM `performed` join `test` on `performed`.test_id_FK=`test`.test_id WHERE `performed`.product_id_FK='$cId' ORDER BY test_name ASC";
                    $run = mysqli_query($con, $que);
                    $rec = mysqli_num_rows($run);
                    if ($rec > 0) {
                        echo '<h4 class="text-primary mb-2">Test Performed (' . $rec . ')</h4>';
                    }
                    while ($a = mysqli_fetch_assoc($run)) {
                    ?>
                        <a href="test.php?id=<?php echo $a['test_id'] ?>" class="btn btn-primary light btn-xs mb-1"><?php echo ucwords(mb_strimwidth($a['test_name'], 0, 13, "...")) ?></a>
                    <?php }
                    ?>
                </div>

<?php
            }
        } else {
            echo '<li><h3>No products Found...!!!</h3></li>';
        }
        mysqli_close($con);
        exit();
    }
}
?>







<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['export_list_confirm'])) {
        require 'partials/_connection.php';
        $id = $_POST['id'];
        $sql2 = "SELECT * FROM `product` join `component` on `product`.`component_id_FK`=`component`.`component_id` join `status` on `product`.status_id_FK=`status`.status_id WHERE product_id='$id'";
        $res2 = mysqli_query($con, $sql2);
        $data = mysqli_fetch_assoc($res2);
?>
        <div class="mb-3 row">
            <table>
                <tr style="background-color:grey;">
                    <td>Id</td>
                    <td>Name</td>
                </tr>
                <tr>
                    <td style="background-color: pink;"><?php echo $data['product_id'] ?></td>
                    <td style="background-color: orange;"><?php echo $data['product_name'] ?></td>
                </tr>
            </table>
        </div>
        <div class="mb-3 row">
            <div class="col-sm-10">
                <a href="_export.php?id=<?php echo $data['product_id'] ?>" data-bs-toggle="modal" data-bs-target="#myModal" id="btn-product-update" class="btn btn-primary">Generate</a>
            </div>
        </div>
<?php
        mysqli_close($con);
        exit();
    }
}
?>