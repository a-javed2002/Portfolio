<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['btn_all_users_show'])) {
        require 'partials/_connection.php';
        $current_user = $_POST['current'];
        if (isset($_POST['name'])) {
            $search_text = $_POST['name'];
            $c1 = $search_text[0];
            $c2 = $search_text[strlen($search_text) - 1];
            if ($c1 == '/') {
                // Or we can write ltrim($str, $str[0]);
                $search_text = ltrim($search_text, '/');
                $sql = "SELECT * FROM `user` WHERE user_name LIKE '$search_text%' AND user_id!='$current_user' AND (flag_id_FK!=3 AND flag_id_FK!=7) ORDER BY user_name ASC";
            } else if ($c2 == '/') {
                $search_text = rtrim($search_text, '/');
                $sql = "SELECT * FROM `user` WHERE user_name LIKE '%$search_text' AND user_id!='$current_user' AND (flag_id_FK!=3 AND flag_id_FK!=7) ORDER BY user_name ASC";
            } else {
                $sql = "SELECT * FROM `user` WHERE user_name LIKE '%$search_text%' AND user_id!='$current_user' AND (flag_id_FK!=3 AND flag_id_FK!=7) ORDER BY user_name ASC";
            }
        } else {
            $sql = "SELECT * FROM `user` WHERE user_id!='$current_user' AND (flag_id_FK!=3 AND flag_id_FK!=7) ORDER BY user_name ASC";
        }
        $res = mysqli_query($con, $sql);
        $rows = mysqli_num_rows($res);
        $alphabet = [];
        while ($data = mysqli_fetch_assoc($res)) {
            $name = $data['user_name'];
            $alpha = $name[0];
            if (!(in_array($alpha, $alphabet))) {
                echo '<li class="name-first-letter">' . ucwords($alpha) . '</li>';
                array_push($alphabet, $alpha);
            }
            $q = "SELECT * FROM `login` WHERE user_id_FK='" . $data['user_id'] . "'";
            $r = mysqli_query($con, $q);
            $d = mysqli_num_rows($r);
            $id = $data['user_id'];
            $q2 = "SELECT * FROM `image` where user_profile=$id and image_status=1";
            $r2 = mysqli_query($con, $q2);
            $rec2 = mysqli_num_rows($r2);
            if ($rec2 > 0) {
                $data2 = mysqli_fetch_assoc($r2);
                $img = $data2['image'];
            } else {
                if (strtolower($data['gender']) == "male") {
                    $img = 'public/assets/images/profile/small/profile1.png';
                } else if (strtolower($data['gender']) == "female") {
                    $img = 'public/assets/images/profile/small/profile2.png';
                }
            }
            // if (isset($_POST['name'])) {
            //     $temp = $_POST['name'];
            //     $c1 = $temp[0];
            //     $c2 = $temp[strlen($temp) - 1];
            //     if ($c1 == '/') {
            //         // Or we can write ltrim($str, $str[0]);
            //         $temp = ltrim($temp, '/');
            //     } else if ($c2 == '/') {
            //         $temp = rtrim($temp, '/');
            //     }
            //     // echo json_encode($temp);
            //     $c_name = $data['user_name'];
            //     $c_name = str_replace($temp, '<span style="color:red;">' . $temp . '</span>', $c_name);
            // } else {
            //     $c_name = $data['user_name'];
            // }
            $c_name = $data['user_name'];
?>
            <li class="active dz-chat-user" <?php if ($data['role_id_FK'] == 9) echo 'style="background-color:#9ad064;"' ?> onclick="userMessages(<?php echo $data['user_id'] ?>,'<?php echo $data['user_name'] ?>')">
                <div class="d-flex bd-highlight">
                    <div class="img_cont">
                        <img src="<?php echo $img ?>" class="rounded-circle user_img" alt="" />
                        <span class="online_icon <?php if ($d == 0) echo 'offline' ?>"></span>
                    </div>
                    <div class="user_info">
                        <span><?php echo $c_name ?></span>
                        <p><?php echo ucwords($data['user_status']); ?></p>
                    </div>
                </div>
            </li>
        <?php
        }
        ?>

        <script src="public/assets/js/custom.js"></script>
<?php
        mysqli_close($con);
        exit();
    }
}
?>



<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['btn_messages'])) {
        require 'partials/_connection.php';
        $currentUser = $_POST['current'];
        $friend_id = $_POST['id'];
        $q = "UPDATE `chats` SET `status` = '1' WHERE receiver_id_FK='$currentUser' && sender_id_FK='$friend_id'";
        $run = mysqli_query($con, $q);
        $sql = "SELECT * FROM `chats` WHERE (sender_id_FK = '$currentUser' AND receiver_id_FK = '$friend_id') OR (sender_id_FK = '$friend_id' AND receiver_id_FK = '$currentUser') ";
        $res = mysqli_query($con, $sql);
        $row = mysqli_num_rows($res);
        #echo "<script>alert('$row')</script>";
        echo '
        <input type="hidden" name="" id="friend-id" value="' . $friend_id . '">
        ';
        if ($row > 0) {
?>
            <div class="row message-previous mb-3">
                <div class="col-sm-12 previous text-center">
                    <a id="" name="20">
                        End-to-end encryption
                    </a>
                </div>
            </div>
            <?php
            while ($data = mysqli_fetch_assoc($res)) {
                if ($data['sender_id_FK'] == $currentUser) {
                    $id = $currentUser;
                    $q2 = "SELECT * FROM `image` where user_profile=$id and image_status=1";
                    $r2 = mysqli_query($con, $q2);
                    $rec2 = mysqli_num_rows($r2);
                    if ($rec2 > 0) {
                        $data3 = mysqli_fetch_assoc($r2);
                        $img = $data3['image'];
                    } else {
                        $q = "SELECT * FROM `user` WHERE user_id='$id'";
                        $r = mysqli_query($con, $q);
                        $data2 = mysqli_fetch_assoc($r);
                        if (strtolower($data2['gender']) == "male") {
                            $img = 'public/assets/images/profile/small/profile1.png';
                        } else if (strtolower($data2['gender']) == "female") {
                            $img = 'public/assets/images/profile/small/profile2.png';
                        }
                    }
            ?>
                    <div class="d-flex justify-content-start mb-4">
                        <div class="img_cont_msg">
                            <a href="<?php echo $img ?>"><img src="<?php echo $img ?>" class="rounded-circle user_img_msg" /></a>
                        </div>
                        <div class="msg_cotainer">
                            <?php echo $data['comment_message'] ?>
                            <span class="msg_time"><?php echo $data['tstamp'] ?></span>
                        </div>
                    </div>
                <?php } else if ($data['receiver_id_FK'] == $currentUser) {
                    $id = $friend_id;
                    $q2 = "SELECT * FROM `image` where user_profile=$id and image_status=1";
                    $r2 = mysqli_query($con, $q2);
                    $rec2 = mysqli_num_rows($r2);
                    if ($rec2 > 0) {
                        $data3 = mysqli_fetch_assoc($r2);
                        $img = $data3['image'];
                    } else {
                        $q = "SELECT * FROM `user` WHERE user_id='$id'";
                        $r = mysqli_query($con, $q);
                        $data2 = mysqli_fetch_assoc($r);
                        if (strtolower($data2['gender']) == "male") {
                            $img = 'public/assets/images/profile/small/profile1.png';
                        } else if (strtolower($data2['gender']) == "female") {
                            $img = 'public/assets/images/profile/small/profile2.png';
                        }
                    }
                ?>
                    <div class="d-flex justify-content-end mb-4">
                        <div class="msg_cotainer_send">
                            <?php echo $data['comment_message'] ?>
                            <span class="msg_time_send"><?php echo $data['tstamp'] ?></span>
                        </div>
                        <div class="img_cont_msg">
                            <a href="<?php echo $img ?>"><img src="<?php echo $img ?>" class="rounded-circle user_img_msg" /></a>
                        </div>
                    </div>
<?php }
            }
        } else {
            echo '
            <div class="row message-previous">
                <div class="col-sm-12 previous">
                    <a id="" name="20" class="text-danger">
                        No Chats..Lets Start!
                    </a>
                </div>
                <input type="hidden" name="" id="friend-id" value="<?php echo $friend_id ?>">
            </div>
            ';
        }
    }
} ?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['send_msg'])) {
        require 'partials/_connection.php';
        $user_comment = $_POST['user_comment'];
        $friend_id = $_POST['friend_id'];
        $current = $_POST['current'];
        // Sql query to be executed
        $user_comment = str_replace('<', '&lt;', $user_comment);
        $user_comment = str_replace('>', '&gt;', $user_comment);
        $sql = "INSERT INTO `chats` (`comment_message`, `sender_id_FK`, `receiver_id_FK`, `tstamp`,`status`) VALUES ('$user_comment', '$current', '$friend_id', '2022-11-08 18:55:45.000000','0')";
        $res = mysqli_query($con, $sql);
        mysqli_close($con);
        exit();
    }
}
?>




<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['btn_unseen_messages'])) {
        require 'partials/_connection.php';
        $currentUser = $_POST['current'];
        $sql = "SELECT * FROM `chats` WHERE receiver_id_FK='$currentUser' AND status=0";
        $res = mysqli_query($con, $sql);
        $row = mysqli_num_rows($res);
        echo json_encode($row);
        mysqli_close($con);
        exit();
    }
} ?>


<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['btn_contacted_users_show'])) {
        echo '<li class="name-first-letter text-center">Recently Contacted</li>';
        require 'partials/_connection.php';
        $users = [];
        $friend_id = '';
        $current_user = $_POST['current'];
        $sql = "SELECT * FROM `chats` WHERE (sender_id_FK = '$current_user' OR receiver_id_FK = '$current_user') ORDER BY comment_id DESC";
        $res = mysqli_query($con, $sql);
        $a = 0;
        while ($data = mysqli_fetch_assoc(($res))) {
            if ($data['sender_id_FK'] != $current_user) {
                $temp = $data['sender_id_FK'];
                if (!(in_array($temp, $users))) {
                    array_push($users, $temp);
                    $friend_id = $temp;
                }
            } else {
                $temp = $data['receiver_id_FK'];
                if (!(in_array($temp, $users))) {
                    array_push($users, $temp);
                    $friend_id = $temp;
                }
            }
            $query = "SELECT * FROM `user` WHERE user_id='$friend_id'";
            $result = mysqli_query($con, $query);
            $data2 = mysqli_fetch_assoc($result);
            if ($friend_id != '') {
                $q = "SELECT * FROM `login` WHERE user_id_FK='" . $data2['user_id'] . "'";
                $r = mysqli_query($con, $q);
                $d = mysqli_num_rows($r);
                $id = $data2['user_id'];
                $q2 = "SELECT * FROM `image` where user_profile=$id and image_status=1";
                $r2 = mysqli_query($con, $q2);
                $rec2 = mysqli_num_rows($r2);
                if ($rec2 > 0) {
                    $data3 = mysqli_fetch_assoc($r2);
                    $img = $data3['image'];
                } else {
                    if (strtolower($data2['gender']) == "male") {
                        $img = 'public/assets/images/profile/small/profile1.png';
                    } else if (strtolower($data2['gender']) == "female") {
                        $img = 'public/assets/images/profile/small/profile2.png';
                    }
                }
                if ($a == 3) {
                    echo '<li class="name-first-letter"></li>';
                }
                $sql2 = "SELECT * FROM `chats` WHERE receiver_id_FK='$current_user' AND sender_id_FK='$friend_id' AND status=0";
                $running = mysqli_query($con, $sql2);
                $msg = mysqli_num_rows($running);
?>
                <li class="active dz-chat-user" <?php if ($data2['role_id_FK'] == 9) echo 'style="background-color:#9ad064;"' ?> onclick="userMessages(<?php echo $data2['user_id'] ?>,'<?php echo $data2['user_name'] ?>')">
                    <?php
                    if ($msg > 0) {
                    ?>
                        <span style="background-color: red;color: white;float: right;padding: 5px;font-size: 15px;border-radius: 50%;font-weight: bolder;"><?php echo $msg ?></span>
                    <?php
                    }
                    ?>

                    <div class="d-flex bd-highlight">
                        <div class="img_cont">
                            <img src="<?php echo $img ?>" class="rounded-circle user_img" alt="" />
                            <span class="online_icon <?php if ($d == 0) echo 'offline' ?>"></span>
                        </div>
                        <div class="user_info">
                            <span><?php echo ucwords($data2['user_name']); ?></span>
                            <p><?php echo mb_strimwidth($data['comment_message'], 0, 30, "...") ?></p>
                        </div>
                    </div>
                </li>
<?php
                $friend_id = '';
                $a++;
            }
        }
    }
} ?>



<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['btn_online_users_show'])) {
        require 'partials/_connection.php';
        $current_user = $_POST['current'];
        $query = "SELECT * FROM `user` WHERE user_id!='$current_user'";
        $result = mysqli_query($con, $query);
        while ($data = mysqli_fetch_assoc($result)) {
            $name = $data['user_name'];
            $rec = mysqli_num_rows($result);
            if ($rec > 0) {
                $q = "SELECT * FROM `login` WHERE user_id_FK='" . $data['user_id'] . "'";
                $r = mysqli_query($con, $q);
                $d = mysqli_num_rows($r);
                if ($d > 0) {
                    $id = $data['user_id'];
                    $q2 = "SELECT * FROM `image` where user_profile=$id and image_status=1";
                    $r2 = mysqli_query($con, $q2);
                    $rec2 = mysqli_num_rows($r2);
                    if ($rec2 > 0) {
                        $data2 = mysqli_fetch_assoc($r2);
                        $img = $data2['image'];
                    } else {
                        if (strtolower($data['gender']) == "male") {
                            $img = 'public/assets/images/profile/small/profile1.png';
                        } else if (strtolower($data['gender']) == "female") {
                            $img = 'public/assets/images/profile/small/profile2.png';
                        }
                    }
?>
                    <li class="active dz-chat-user" <?php if ($data['role_id_FK'] == 9) echo 'style="background-color:#9ad064;"' ?> onclick="userMessages(<?php echo $data['user_id'] ?>,'<?php echo $data['user_name'] ?>')">
                        <div class="d-flex bd-highlight">
                            <div class="img_cont">
                                <img src="<?php echo $img ?>" class="rounded-circle user_img" alt="" />
                                <span class="online_icon <?php if ($d == 0) echo 'offline' ?>"></span>
                            </div>
                            <div class="user_info">
                                <span><?php echo ucwords($name); ?></span>
                                <p><?php echo ucwords($data['user_status']); ?></p>
                            </div>
                        </div>
                    </li>
                <?php
                }
            } else { ?>
                <li class="name-first-letter text-center">
                    <h4>NO ONE IS ONLINE</h4>
                </li>
<?php
            }
        }
    }
} ?>