<?php
session_start();
if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] != true) {
    if (isset($_COOKIE["username"])) {
        header("location: lock_screen.php");
        exit;
    } else {
        header("location: login.php");
        exit;
    }
}
?>
<html lang="en">

<head>
    <title>Whatsapp Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Font Awesome File -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="icon" type="image/png" sizes="16x16" href="public/assets/images/favicon.png">

</head>
<style>
    html,
    body,
    div,
    span {
        /* height: 100%; */
        width: 100%;
        overflow: hidden;
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }

    body {
        background: url("public/assets/images/profile/small/profile1.png") no-repeat fixed center;
        background-size: cover;
    }

    .fa-2x {
        font-size: 1.5em !important;
    }

    .app {
        position: relative;
        overflow: hidden;
        top: 19px;
        height: calc(100% - 38px);
        margin: auto !important;
        padding: 0 !important;
        box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .06), 0 2px 5px 0 rgba(0, 0, 0, .2);
    }

    .app-one {
        background-color: #f7f7f7;
        height: 100%;
        overflow: hidden;
        margin: 0 !important;
        padding: 0 !important;
        box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .06), 0 2px 5px 0 rgba(0, 0, 0, .2);
    }

    .side {
        padding: 0 !important;
        margin: 0 !important;
        height: 100%;
    }

    .side-one {
        padding: 0;
        margin: 0;
        height: 100%;
        width: 100%;
        z-index: 1;
        position: relative;
        display: block;
        top: 0;
    }

    .side-two {
        padding: 0 !important;
        margin: 0 !important;
        height: 100%;
        width: 100%;
        z-index: 2;
        position: relative;
        top: -100%;
        left: -100%;
        -webkit-transition: left 0.3s ease;
        transition: left 0.3s ease;

    }


    .heading {
        padding: 10px 16px 10px 15px;
        margin: 0 !important;
        height: 60px;
        width: 100%;
        background-color: #eee;
        z-index: 1000;
    }

    .heading-avatar {
        padding: 0 !important;
        cursor: pointer;

    }

    .heading-avatar-icon img {
        border-radius: 50%;
        height: 40px;
        width: 40px;
    }

    .heading-name {
        padding: 0 !important;
        cursor: pointer;
    }

    .heading-name-meta {
        font-weight: 700;
        font-size: 100%;
        padding: 5px;
        padding-bottom: 0;
        text-align: left;
        text-overflow: ellipsis;
        white-space: nowrap;
        color: #000;
        display: block;
    }

    .heading-online {
        display: none;
        padding: 0 5px;
        font-size: 12px;
        color: #93918f;
    }

    .heading-compose {
        padding: 0;
    }

    .heading-compose i {
        text-align: center;
        padding: 5px;
        color: #93918f;
        cursor: pointer;
    }

    .heading-dot {
        padding: 0;
        margin-left: 10px;
    }

    .heading-dot i {
        text-align: right;
        padding: 5px;
        color: #93918f;
        cursor: pointer;
    }

    .searchBox {
        padding: 0 !important;
        margin: 0 !important;
        height: 60px;
        width: 100%;
    }

    .searchBox-inner {
        height: 100%;
        width: 100%;
        padding: 10px !important;
        background-color: #fbfbfb;
    }


    /*#searchBox-inner input {
        box-shadow: none;
    }*/

    .searchBox-inner input:focus {
        outline: none;
        border: none;
        box-shadow: none;
    }

    .sideBar {
        padding: 0 !important;
        margin: 0 !important;
        background-color: #fff;
        overflow-y: auto;
        border: 1px solid #f7f7f7;
        height: calc(100% - 120px);
    }

    .sideBar-body {
        position: relative;
        padding: 10px !important;
        border-bottom: 1px solid #f7f7f7;
        height: 72px;
        margin: 0 !important;
        cursor: pointer;
    }

    .sideBar-body:hover {
        background-color: #f2f2f2;
    }

    .sideBar-avatar {
        text-align: center;
        padding: 0 !important;
    }

    .avatar-icon img {
        border-radius: 50%;
        height: 49px;
        width: 49px;
    }

    .sideBar-main {
        padding: 0 !important;
    }

    .sideBar-main .row {
        padding: 0 !important;
        margin: 0 !important;
    }

    .sideBar-name {
        padding: 10px !important;
    }

    .name-meta {
        font-size: 100%;
        padding: 1% !important;
        text-align: left;
        text-overflow: ellipsis;
        white-space: nowrap;
        color: #000;
    }

    .sideBar-time {
        padding: 10px !important;
    }

    .time-meta {
        text-align: right;
        font-size: 12px;
        padding: 1% !important;
        color: rgba(0, 0, 0, .4);
        vertical-align: baseline;
    }

    /*New Message*/

    .newMessage {
        padding: 0 !important;
        margin: 0 !important;
        height: 100%;
        position: relative;
        left: -100%;
    }

    .newMessage-heading {
        padding: 10px 16px 10px 15px !important;
        margin: 0 !important;
        height: 100px;
        width: 100%;
        background-color: #00bfa5;
        z-index: 1001;
    }

    .newMessage-main {
        padding: 10px 16px 0 15px !important;
        margin: 0 !important;
        height: 60px;
        margin-top: 30px !important;
        width: 100%;
        z-index: 1001;
        color: #fff;
    }

    .newMessage-title {
        font-size: 18px;
        font-weight: 700;
        padding: 10px 5px !important;
    }

    .newMessage-back {
        text-align: center;
        vertical-align: baseline;
        padding: 12px 5px !important;
        display: block;
        cursor: pointer;
    }

    .newMessage-back i {
        margin: auto !important;
    }

    .composeBox {
        padding: 0 !important;
        margin: 0 !important;
        height: 60px;
        width: 100%;
    }

    .composeBox-inner {
        height: 100%;
        width: 100%;
        padding: 10px !important;
        background-color: #fbfbfb;
    }

    .composeBox-inner input:focus {
        outline: none;
        border: none;
        box-shadow: none;
    }

    .compose-sideBar {
        padding: 0 !important;
        margin: 0 !important;
        background-color: #fff;
        overflow-y: auto;
        border: 1px solid #f7f7f7;
        height: calc(100% - 160px);
    }

    /*Conversation*/

    .conversation {
        padding: 0 !important;
        margin: 0 !important;
        height: 100%;
        /*width: 100%;*/
        border-left: 1px solid rgba(0, 0, 0, .08);
        /*overflow-y: auto;*/
    }

    .message {
        padding: 0 !important;
        margin: 0 !important;
        background: url("w.jpg") no-repeat fixed center;
        background-size: cover;
        overflow-y: auto;
        border: 1px solid #f7f7f7;
        height: calc(100% - 120px);
    }

    .message-previous {
        margin: 0 !important;
        padding: 0 !important;
        height: auto;
        width: 100%;
    }

    .previous {
        font-size: 15px;
        text-align: center;
        padding: 10px !important;
        cursor: pointer;
    }

    .previous a {
        text-decoration: none;
        font-weight: 700;
    }

    .message-body {
        margin: 0 !important;
        padding: 0 !important;
        width: auto;
        height: auto;
    }

    .message-main-receiver {
        /*padding: 10px 20px;*/
        max-width: 60%;
    }

    .message-main-sender {
        padding: 3px 20px !important;
        margin-left: 40% !important;
        max-width: 60%;
    }

    .message-text {
        margin: 0 !important;
        padding: 5px !important;
        word-wrap: break-word;
        font-weight: 200;
        font-size: 14px;
        padding-bottom: 0 !important;
    }

    .message-time {
        margin: 0 !important;
        margin-left: 50px !important;
        font-size: 12px;
        text-align: right;
        color: #9a9a9a;

    }

    .receiver {
        width: auto !important;
        padding: 4px 10px 7px !important;
        border-radius: 10px 10px 10px 0;
        background: #ffffff;
        font-size: 12px;
        text-shadow: 0 1px 1px rgba(0, 0, 0, .2);
        word-wrap: break-word;
        display: inline-block;
    }

    .sender {
        float: right;
        width: auto !important;
        background: #dcf8c6;
        border-radius: 10px 10px 0 10px;
        padding: 4px 10px 7px !important;
        font-size: 12px;
        text-shadow: 0 1px 1px rgba(0, 0, 0, .2);
        display: inline-block;
        word-wrap: break-word;
    }


    /*Reply*/

    .reply {
        height: 60px;
        width: 100%;
        background-color: #f5f1ee;
        padding: 10px 5px 10px 5px !important;
        margin: 0 !important;
        z-index: 1000;
    }

    .reply-emojis {
        padding: 5px !important;
    }

    .reply-emojis i {
        text-align: center;
        padding: 5px 5px 5px 5px !important;
        color: #93918f;
        cursor: pointer;
    }

    .reply-recording {
        padding: 5px !important;
    }

    .reply-recording i {
        text-align: center;
        padding: 5px !important;
        color: #93918f;
        cursor: pointer;
    }

    .reply-send {
        padding: 5px !important;
    }

    .reply-send i {
        text-align: center;
        padding: 5px !important;
        color: #93918f;
        cursor: pointer;
    }

    .reply-main {
        padding: 2px 5px !important;
    }

    .reply-main textarea {
        width: 100%;
        resize: none;
        overflow: hidden;
        padding: 5px !important;
        outline: none;
        border: none;
        text-indent: 5px;
        box-shadow: none;
        height: 100%;
        font-size: 16px;
    }

    .reply-main textarea:focus {
        outline: none;
        border: none;
        text-indent: 5px;
        box-shadow: none;
    }

    @media screen and (max-width: 700px) {
        .app {
            top: 0;
            height: 100%;
        }

        .heading {
            height: 70px;
            background-color: #009688;
        }

        .fa-2x {
            font-size: 2.3em !important;
        }

        .heading-avatar {
            padding: 0 !important;
        }

        .heading-avatar-icon img {
            height: 50px;
            width: 50px;
        }

        .heading-compose {
            padding: 5px !important;
        }

        .heading-compose i {
            color: #fff;
            cursor: pointer;
        }

        .heading-dot {
            padding: 5px !important;
            margin-left: 10px !important;
        }

        .heading-dot i {
            color: #fff;
            cursor: pointer;
        }

        .sideBar {
            height: calc(100% - 130px);
        }

        .sideBar-body {
            height: 80px;
        }

        .sideBar-avatar {
            text-align: left;
            padding: 0 8px !important;
        }

        .avatar-icon img {
            height: 55px;
            width: 55px;
        }

        .sideBar-main {
            padding: 0 !important;
        }

        .sideBar-main .row {
            padding: 0 !important;
            margin: 0 !important;
        }

        .sideBar-name {
            padding: 10px 5px !important;
        }

        .name-meta {
            font-size: 16px;
            padding: 5% !important;
        }

        .sideBar-time {
            padding: 10px !important;
        }

        .time-meta {
            text-align: right;
            font-size: 14px;
            padding: 4% !important;
            color: rgba(0, 0, 0, .4);
            vertical-align: baseline;
        }

        /*Conversation*/
        .conversation {
            padding: 0 !important;
            margin: 0 !important;
            height: 100%;
            /*width: 100%;*/
            border-left: 1px solid rgba(0, 0, 0, .08);
            /*overflow-y: auto;*/
        }

        .message {
            height: calc(100% - 140px);
        }

        .reply {
            height: 70px;
        }

        .reply-emojis {
            padding: 5px 0 !important;
        }

        .reply-emojis i {
            padding: 5px 2px !important;
            font-size: 1.8em !important;
        }

        .reply-main {
            padding: 2px 8px !important;
        }

        .reply-main textarea {
            padding: 8px !important;
            font-size: 18px;
        }

        .reply-recording {
            padding: 5px 0 !important;
        }

        .reply-recording i {
            padding: 5px 0 !important;
            font-size: 1.8em !important;
        }

        .reply-send {
            padding: 5px 0 !important;
        }

        .reply-send i {
            padding: 5px 2px 5px 0 !important;
            font-size: 1.8em !important;
        }
    }
</style>

<body>

    <div class="container app">
        <div class="row app-one">

            <div class="col-sm-4 side">
                <div class="side-one">
                    <!-- Heading -->
                    <div class="row heading">
                        <div class="col-sm-3 col-xs-3 heading-avatar">
                            <div class="heading-avatar-icon" style="display: flex;justify-content: center;align-items: center;">
                                <?php
                                if ($_SESSION['userImage'] != NULL) {
                                    echo '<img src="' . $_SESSION['userImage'] . '" width="20" alt="" />';
                                } else {
                                    if (strtolower($_SESSION['userGender']) == "male") {
                                        echo '<img src="public/assets/images/profile/small/profile1.png" width="20" alt="' . $_SESSION['username'] . '" />';
                                    } else if (strtolower($_SESSION['userGender']) == "female") {
                                        echo '<img src="public/assets/images/profile/small/profile2.png" width="20" alt="' . $_SESSION['username'] . '" />';
                                    }
                                }
                                ?>
                                <div><?php echo strtoupper($_SESSION['username']) ?></div>
                                <!-- <img src="public/assets/images/profile/small/profile1.png"> -->
                            </div>
                        </div>
                        <div class="col-sm-1 col-xs-1  heading-dot  pull-right">
                            <i class="fa fa-ellipsis-v fa-2x  pull-right" aria-hidden="true"></i>
                        </div>
                        <div class="col-sm-2 col-xs-2 heading-compose  pull-right">
                            <i class="fa fa-comments fa-2x  pull-right" aria-hidden="true"></i>
                        </div>
                    </div>
                    <!-- Heading End -->

                    <!-- SearchBox -->
                    <div class="row searchBox">
                        <div class="col-sm-12 searchBox-inner">
                            <div class="form-group has-feedback">
                                <input id="search-contacted" type="text" class="form-control" name="searchText" placeholder="Search">
                                <span class="glyphicon glyphicon-search form-control-feedback"></span>
                            </div>
                        </div>
                    </div>

                    <!-- Search Box End -->
                    <!-- sideBar -->
                    <div class="row sideBar" id="contacted-users">
                        <?php
                        require 'partials/_connection.php';
                        $users = [];
                        $friend_id = '';
                        $currentUser = $_SESSION['userId'];
                        $sql = "SELECT * FROM `chats` WHERE sender_id_FK = '$currentUser' OR receiver_id_FK = '$currentUser' ORDER BY comment_id DESC";
                        $res = mysqli_query($con, $sql);
                        // $row = mysqli_num_rows($res);
                        #echo "<script>alert('$row')</script>";
                        while ($data = mysqli_fetch_assoc($res)) {
                            if ($data['sender_id_FK'] != $currentUser) {
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
                        ?>
                                <div class="row sideBar-body">
                                    <div class="col-sm-3 col-xs-3 sideBar-avatar">
                                        <div class="avatar-icon">
                                            <img src="public/assets/images/profile/small/profile1.png">
                                        </div>
                                    </div>
                                    <div class="col-sm-9 col-xs-9 sideBar-main">
                                        <div class="row">
                                            <div class="col-sm-8 col-xs-8 sideBar-name">
                                                <span class="name-meta"><?php echo $data2['user_name'] ?></span>
                                            </div>
                                            <div class="col-sm-4 col-xs-4 pull-right sideBar-time">
                                                <span class="time-meta pull-right">18:
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <?php $friend_id = '';
                            }
                        } ?>
                    </div>
                    <!-- Sidebar End -->
                </div>
                <div class="side-two">

                    <!-- Heading -->
                    <div class="row newMessage-heading">
                        <div class="row newMessage-main">
                            <div class="col-sm-2 col-xs-2 newMessage-back">
                                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                            </div>
                            <div class="col-sm-10 col-xs-10 newMessage-title">
                                New Chat
                            </div>
                        </div>
                    </div>
                    <!-- Heading End -->

                    <!-- ComposeBox -->
                    <div class="row composeBox">
                        <div class="col-sm-12 composeBox-inner">
                            <div class="form-group has-feedback">
                                <input id="search-bar" type="text" class="form-control" name="searchText" placeholder="Search People">
                                <span class="glyphicon glyphicon-search form-control-feedback"></span>
                            </div>
                        </div>
                    </div>
                    <!-- ComposeBox End -->

                    <!-- sideBar -->
                    <div class="row compose-sideBar" id="all-users">
                        <?php
                        $currentUser = $_SESSION['userId'];
                        $sql = "SELECT * FROM `user`";
                        $res = mysqli_query($con, $sql);
                        // $row = mysqli_num_rows($res);
                        #echo "<script>alert('$row')</script>";
                        while ($data = mysqli_fetch_assoc($res)) {
                        ?>
                            <div class="row sideBar-body">
                                <div class="col-sm-3 col-xs-3 sideBar-avatar">
                                    <div class="avatar-icon">
                                        <img src="public/assets/images/profile/small/profile1.png">
                                    </div>
                                </div>
                                <div class="col-sm-9 col-xs-9 sideBar-main">
                                    <div class="row">
                                        <div class="col-sm-8 col-xs-8 sideBar-name">
                                            <span class="name-meta"><?php echo $data['user_name']; ?></span>
                                        </div>
                                        <div class="col-sm-4 col-xs-4 pull-right sideBar-time">
                                            <span class="time-meta pull-right">18:20
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <!-- Sidebar End -->
            </div>


            <!-- New Message Sidebar End -->

            <!-- Conversation Start -->
            <div class="col-sm-8 conversation" style="background-color: #00bfa5;display: none;" id="chat-platform">
                <!-- Heading -->
                <div class="row heading">
                    <div class="col-sm-2 col-md-1 col-xs-3 heading-avatar">
                        <div class="heading-avatar-icon">
                            <img src="public/assets/images/profile/small/profile1.png">
                        </div>
                    </div>
                    <div class="col-sm-8 col-xs-7 heading-name">
                        <a class="heading-name-meta">Ankit Jain12
                        </a>
                        <span class="heading-online">Online</span>
                    </div>
                    <div class="col-sm-1 col-xs-1  heading-dot pull-right">
                        <i class="fa fa-ellipsis-v fa-2x  pull-right" aria-hidden="true"></i>
                    </div>
                </div>
                <!-- Heading End -->

                <!-- Message Box -->
                <div class="row message" id="conversation">

                </div>
                <!-- Message Box End -->

                <!-- Reply Box -->
                <div class="row reply">
                    <div class="col-sm-1 col-xs-1 reply-emojis">
                        <i class="fa fa-smile-o fa-2x"></i>
                    </div>
                    <div class="col-sm-9 col-xs-9 reply-main">
                        <textarea class="form-control" rows="1" id="user-comment"></textarea>
                    </div>
                    <div class="col-sm-1 col-xs-1 reply-recording">
                        <i class="fa fa-microphone fa-2x" aria-hidden="true"></i>
                    </div>
                    <div class="col-sm-1 col-xs-1 reply-send" id="send-msg">
                        <i class="fa fa-send fa-2x" aria-hidden="true"></i>
                    </div>
                </div>
                <!-- Reply Box End -->
            </div>
            <!-- Conversation End -->
        </div>
        <!-- App One End -->
    </div>

    <!-- App End -->
    <script>
        $(".heading-compose").click(function() {
            $(".side-two").css({
                "left": "0"
            });
        });

        $(".newMessage-back").click(function() {
            $(".side-two").css({
                "left": "-100%"
            });
        });
    </script>
    <script>
        // $('document').ready(function() {
        //     $('#search-bar').change(function() {
        //         var name = $('#search-bar').val();
        //         console.log(name);
        //         $.ajax({
        //             url: 'chat.php',
        //             type: "POST",
        //             data: {
        //                 'name': name,
        //                 'btn_all_users_show': 1,
        //             },
        //             dataType: 'JSON',
        //             success: function(data) {
        //                 alert("success")
        //                 $('#all-users').html(data);
        //                 // if (data.status == 1) {
        //                 //     $('#modal-alert-body').css("background-color", "#a5fda5");
        //                 //     $('#modal-alert-heading').html("Successful");
        //                 //     $('#modal-alert-msg').html(data.msg);
        //                 //     $('#product-id').val();
        //                 //     $('#test-id').val();
        //                 //     $('#remarks').html('');
        //                 // } else if (data.status == 0) {
        //                 //     $('#modal-alert-body').css("background-color", "#fda5a5");
        //                 //     $('#modal-alert-heading').html("Failed");
        //                 //     $('#modal-alert-msg').html(data.msg);
        //                 // }
        //                 // loadData();
        //             },
        //             error: function(data) {
        //                 $('#modal-alert-heading').html("Failed");
        //                 $('#modal-alert-msg').html("Error in php");
        //                 $('#modal-alert-body').css("background-color", "#fda5a5");
        //                 document.getElementById("modal-toggle").click();
        //             }
        //         });
        //     });
        // })

        $(document).ready(function() {
            load_data_all();

            function load_data_all(name) {
                $.ajax({
                    url: '_chat.php',
                    type: "POST",
                    data: {
                        'name': name,
                        'current': <?php echo $_SESSION['userId'] ?>,
                        'btn_all_users_show': 1,
                    },
                    success: function(data) {
                        // data=data.replace(query,"<span style='color:red;'>"+query+"</span>");
                        $('#all-users').html(data);
                    },
                });
            }

            $('#search-bar').keyup(function() {
                var text = $(this).val();
                if (text != '') {
                    load_data_all(text);
                } else {
                    load_data_all();
                }

            });

        });
    </script>
    <script>
        $(document).ready(function() {
            setInterval(load_data_contacted, 1000);
            // load_data_contacted();

            function load_data_contacted(name) {
                console.log("contacted")
                $.ajax({
                    url: '_chat.php',
                    type: "POST",
                    data: {
                        'name': name,
                        'current': <?php echo $_SESSION['userId'] ?>,
                        'btn_contacted_users_show': 1,
                    },
                    success: function(data) {
                        // data=data.replace(query,"<span style='color:red;'>"+query+"</span>");
                        $('#contacted-users').html(data);
                    },
                });
            }

            $('#search-contacted').keyup(function() {
                var text = $(this).val();
                if (text != '') {
                    console.log("hi1")
                    load_data_contacted(text);
                } else {
                    console.log("hi2")
                    load_data_contacted();
                }

            });

        });
    </script>

    <script>
        function userMessages(id) {
            document.getElementById("chat-platform").style.display = "block";
            $(document).ready(function() {
                console.log("hi");
                var intervalId = setInterval(function() {
                    $.ajax({
                        url: '_chat.php',
                        type: "POST",
                        data: {
                            'id': id,
                            'current': <?php echo $_SESSION['userId'] ?>,
                            'btn_messages': 1
                        },
                        success: function(data) {
                            $('#conversation').html(data);
                        },
                    });
                });
            }, 1000)
        }
    </script>
    <script>
        $('document').ready(function() {
            $('#send-msg').click(function() {
                var user_comment = $('#user-comment').val();
                if (user_comment != '') {
                    var friend_id = $('#friend-id').val();
                    console.log(user_comment)
                    console.log(friend_id)
                    $.ajax({
                        url: '_chat.php',
                        type: "POST",
                        data: {
                            'user_comment': user_comment,
                            'friend_id': friend_id,
                            'current': <?php echo $_SESSION['userId'] ?>,
                            'send_msg': 1,
                        },
                        dataType: 'JSON',
                        success: function(data) {
                            $('#user-comment').val('');
                            userMessages(friend_id);
                            alert("hi")
                        },
                    });
                } else {
                    alert('enter something')
                }
                $('#user-comment').val('');
                userMessages(friend_id);
            });
        })
    </script>
</body>

</html>