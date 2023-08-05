<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="robots" content="" />
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="Chrev - Crypto Codeigniter Admin Dashboard" />
    <meta property="og:title" content="Chrev - Crypto Codeigniter Admin Dashboard" />
    <meta property="og:description" content="Chrev - Crypto Codeigniter Admin Dashboard" />
    <meta property="og:image" content="../social-image.html" />
    <meta name="format-detection" content="telephone=no">
    <title></title>
    <!-- Favicon icon -->

    <link rel="icon" type="image/png" sizes="16x16" href="public/assets/images/favicon.png">


    <link href="public/assets/vendor/chartist/css/chartist.min.css" rel="stylesheet" type="text/css" />

    <link href="public/assets/vendor/owl-carousel/owl.carousel.css" rel="stylesheet" type="text/css" />

    <link href="public/assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet" type="text/css" />

    <link href="public/assets/css/style.css" rel="stylesheet" type="text/css" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />

    <link href="public/assets/css/image.css" rel="stylesheet" type="text/css" />

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">

    <link href="public/assets/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />


</head>

<body>
    <?php require 'partials/_header.php'; ?>
    <?php require 'partials/_sidebar.php' ?>

    <!-- The Form Modal Start -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title" id="form-modal-heading">Update Role</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="basic-form">
                                    <div class="mb-3 row" id="update">
                                        <!-- <label class="col-sm-3 col-form-label">Role</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="role-name" placeholder="Enter Here">
                                            </div> -->
                                    </div>
                                    <div class="mb-3 row">
                                        <div class="col-sm-10">
                                            <button type="submit" id="btn-user-update" class="btn btn-primary">update</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
    <!-- The Form Modal End -->

    <!-- The Alert Modal Start -->
    <div class="modal fade" id="modal-alert">
        <div class="modal-dialog">
            <div class="modal-content" id="modal-alert-body">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title" id="modal-alert-heading"></h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body text-center" id="modal-alert-msg">
                    <!-- Message here by php -->
                </div>

            </div>
        </div>
    </div>
    <!-- The Alert Modal End -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" id="modal-toggle" data-bs-target="#modal-alert"></button>

    <!--**********************************
	Content body start
***********************************-->
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Insert User</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Role</label>
                                <div class="col-sm-9">
                                    <div class="input-group mb-3">
                                        <select class="wide" id="user-role">
                                            <option selected disabled value="null">Choose Role</option>
                                            <?php
                                            require 'partials/_connection.php';
                                            $que = "SELECT * FROM `role`";
                                            $res = mysqli_query($con, $que);
                                            while ($data = mysqli_fetch_assoc($res)) {
                                            ?>
                                                <option value="<?php echo $data['role_id'] ?>"><?php echo strtoupper($data['role_name']) ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">First Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="first-name" placeholder="Enter Here">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Last Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="last-name" placeholder="Enter Here">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Gender</label>
                                <div class="col-sm-9">
                                    <div class="mb-3 mb-0">
                                        <label class="radio-inline me-3"><input id="gender1" value="male" type="radio" name="gender">Male</label>
                                        <label class="radio-inline me-3"><input id="gender2" value="female" type="radio" name="gender">Female</label>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Education</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="user-education" placeholder="Enter Here">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="user-email" placeholder="Enter Here">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Contact</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="user-contact" placeholder="Enter Here">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">address</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="user-address" placeholder="Enter Here">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">salary</label>
                                <div class="col-sm-9">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" style="background-color: #6418c3;color:white;">$</span>
                                        <input type="text" class="form-control" id="user-salary" placeholder="Enter Here">
                                        <span class="input-group-text" style="background-color: #6418c3;color:white;">.00</span>
                                    </div>
                                </div>
                            </div>

                            <div class="file-upload">
                                <button class="file-upload-btn" type="button" id="add-image" onclick="$('.file-upload-input').trigger( 'click' )">Add
                                    Image</button>

                                <div class="image-upload-wrap">
                                    <input class="file-upload-input" max="4" type='file' id="upload_file" accept="image/png,image/jpg,image/jpeg" />
                                    <div class="drag-text">
                                        <h3>Drag and drop a file or select add Image</h3>
                                    </div>
                                </div>
                                <div class="file-upload-content" id="image_preview" style="display: flex;justify-content: space-around;flex-wrap: wrap;">
                                    <!-- <img class="file-upload-image" src="#" alt="your image" />
            <div class="image-title-wrap">
                <button type="button" onclick="removeUpload()" class="remove-image">Remove <span
                        class="image-title">Uploaded Image</span></button>
            </div> -->
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-sm-10">
                                    <button type="submit" id="btn-user-insert" class="btn btn-primary">Insert</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Users In Lab</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example4" class="table table-sm mb-0" style="min-width: 845px;">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Role</th>
                                        <th>Name</th>
                                        <th>UserName</th>
                                        <th>Email</th>
                                        <th>Contact</th>
                                        <th>Created</th>
                                        <th></th>

                                        <!-- display is none -->
                                        <th style="display: none;"></th>
                                        <th style="display: none;"></th>
                                        <th style="display: none;"></th>
                                        <th style="display: none;"></th>
                                        <th style="display: none;"></th>
                                        <!-- till here -->
                                    </tr>
                                </thead>
                                <tbody id="records">
                                    <?php
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
                                        <tr class="bg-primary">
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
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!--**********************************
	Content body end
***********************************-->

    <script src="public/assets/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="public/assets/js/plugins-init/datatables.init.js"></script>

    <script>
        $('document').ready(function() {
            
            $('#btn-user-insert').click(function() {
                var user_role = $('#user-role').val();
                var first_name = $('#first-name').val();
                var last_name = $('#last-name').val();
                var user_education = $('#user-education').val();
                var user_email = $('#user-email').val();
                var user_contact = $('#user-contact').val();
                var user_address = $('#user-address').val();
                var user_salary = $('#user-salary').val();
                if (document.getElementById("gender1").checked == true) {
                    var user_gender = document.getElementById("gender1").value;
                } else if (document.getElementById("gender2").checked == true) {
                    var user_gender = document.getElementById("gender2").value;
                }
                console.log(user_role);
                console.log(first_name);
                console.log(last_name);
                console.log(user_education);
                console.log(user_gender);
                console.log(user_email);
                console.log(user_contact);
                console.log(user_address);
                console.log(user_salary);
                if (total > 0) {
                    var present = 1;
                    var form_data = new FormData();
                    // Read selected files
                    for (var i = 0; i < total; i++) {
                        form_data.append("files[]", document.getElementById('upload_file').files[i]);
                    }
                    console.log(form_data);
                } else {
                    var present = 0;
                }
                console.log(present)
                if (chking()) {
                    $.ajax({
                        url: '_user.php',
                        type: "POST",
                        data: {
                            'user_role': user_role,
                            'first_name': first_name,
                            'user_gender': user_gender,
                            'user_email': user_email,
                            'user_contact': user_contact,
                            'user_address': user_address,
                            'user_salary': user_salary,
                            'user_education': user_education,
                            'last_name': last_name,
                            'role_name': user_role,
                            'btn-user-insert': 1,
                        },
                        dataType: 'JSON',
                        success: function(data) {
                            // alert(data.status);
                            if (data.status == 1) {
                                $('#modal-alert-body').css("background-color", "#a5fda5");
                                $('#modal-alert-heading').html("Successful");
                                $('#modal-alert-msg').html(data.msg);
                                $('#first-name').val('');
                                $('#last-name').val('');
                                $('#user-education').val('');
                                $('#user-email').val('');
                                $('#user-contact').val('');
                                $('#user-address').val('');
                                $('#user-salary').val('');
                                $("#gender1").prop("checked", false);
                                $("#gender2").prop("checked", false);
                                // $("#user-role").prop("selectedIndex", 0).val();
                                loadData();
                            } else if (data.status == 0) {
                                $('#modal-alert-body').css("background-color", "#fda5a5");
                                $('#modal-alert-heading').html("Failed");
                                $('#modal-alert-msg').html(data.msg);
                            }
                            loadData();
                        },
                        error: function() {
                            $('#modal-alert-body').css("background-color", "#fda5a5");
                            $('#modal-alert-heading').html("Failed");
                            $('#modal-alert-msg').html("Error In Php");
                        }
                    });
                    if (present == 1) {
                        $.ajax({
                            <?php
                            if ((isset($_SESSION['image_id'])) == false) {
                                $_SESSION['image_id'] = $id;
                            }
                            ?>
                            url: '_image.php?id=<?php echo $_SESSION['image_id'] ?>&name=user&current_user=<?php echo $_SESSION['userId'] ?>',
                            type: "POST",
                            data: form_data,
                            dataType: 'JSON',
                            contentType: false,
                            processData: false,
                            success: function(data) {
                                files = [];
                                document.getElementById("image_preview").innerHTML = "";
                                total = 0;
                                $('.file-upload-content').hide();
                                $('.image-upload-wrap').show();
                                $('#add-image').show();
                                $('#r_all').hide();
                            },
                            error: function() {
                                $('#modal-alert-heading').html("Failed");
                                $('#modal-alert-msg').html("Error In Php Image");
                                $('#modal-alert-body').css("background-color", "#fda5a5");
                            }
                        });
                    }
                    
                }
                document.getElementById("modal-toggle").click();
            })
        })
    </script>
    <script>
        $('document').ready(function() {
            $('#btn-user-update').click(function() {
                console.log("hi");
                var user_id = $('#user-id').val();
                var user_role = $('#user-role-update').val();
                var user_name = $('#user-name-update').val();
                var user_education = $('#user-education-update').val();
                var user_email = $('#user-email-update').val();
                var user_contact = $('#user-contact-update').val();
                var user_address = $('#user-address-update').val();
                var user_salary = $('#user-salary-update').val();
                var username = $('#username-update').val();
                if (document.getElementById("gender1-update").checked == true) {
                    var user_gender = document.getElementById("gender1-update").value;
                } else if (document.getElementById("gender2-update").checked == true) {
                    var user_gender = document.getElementById("gender2-update").value;
                }
                console.log(user_id);
                console.log(username);
                console.log(user_role);
                console.log(user_name);
                console.log(user_education);
                console.log(user_gender);
                console.log(user_email);
                console.log(user_contact);
                console.log(user_address);
                console.log(user_salary);
                $.ajax({
                    url: '_user.php',
                    type: "POST",
                    data: {
                        'user_id': user_id,
                        'username': username,
                        'user_role': user_role,
                        'user_name': user_name,
                        'user_education': user_education,
                        'user_gender': user_gender,
                        'user_email': user_email,
                        'user_contact': user_contact,
                        'user_address': user_address,
                        'user_salary': user_salary,
                        'btn_user_update': 1,
                    },
                    dataType: 'JSON',
                    success: function(data) {
                        if (data.status == 1) {
                            $('#modal-container').click(function() {
                                $(this).addClass('out');
                                $('body').removeClass('modal-active');
                            });
                            $('#modal-alert-body').css("background-color", "#a5fda5");
                            $('#modal-alert-heading').html("Successful");
                            $('#modal-alert-msg').html(data.msg);
                            loadData();
                        } else if (data.status == 0) {
                            $('#modal-alert-body').css("background-color", "#fda5a5");
                            $('#modal-alert-heading').html("Failed");
                            $('#modal-alert-msg').html(data.msg);
                        }
                    },
                    error: function() {
                        $('#modal-alert-heading').html("Failed");
                        $('#modal-alert-msg').html("Error In Php");
                        $('#modal-alert-body').css("background-color", "#fda5a5");
                    }
                });
                document.getElementById("modal-toggle").click();
            });
        })
    </script>
    <script>
        $('.button').click(function() {
            var buttonId = $(this).attr('id');
            $('#modal-container').removeAttr('class').addClass(buttonId);
            $('body').addClass('modal-active');
        })

        $('#modal-container').click(function() {
            $(this).addClass('out');
            $('body').removeClass('modal-active');
        });
    </script>
    <script>
        <?php
        if (isset($_GET['id'])) {
        ?>
            $(document).ready(function() {
                $("#myModal").modal('show');
            });
            moreDetail(<?php echo $_GET['id'] ?>);
        <?php
        }
        ?>

        function moreDetail(id) {
            document.getElementById("btn-user-update").style.display = "none";
            console.log("id is " + id);
            $(document).ready(function() {
                $.ajax({
                    url: '_user.php',
                    type: "POST",
                    data: {
                        'id': id,
                        'btn_user_info': 1
                    },
                    success: function(data) {
                        $('#update').html(data);
                        $('#form-modal-heading').html("Employee Information");
                    },
                    error: function() {
                        // alert("Failed");
                        $('#modal-alert-heading').html("Failed");
                        $('#modal-alert-msg').html("Error In Php");
                        $('#modal-alert-body').css("background-color", "#fda5a5");
                        document.getElementById("modal-toggle").click();
                    }
                });
            });
        }

        function updateFn(id) {
            document.getElementById("btn-user-update").style.display = "block";
            console.log("id is " + id);
            $(document).ready(function() {
                $.ajax({
                    url: '_user.php',
                    type: "POST",
                    data: {
                        'id': id,
                        'btn_user_update_show': 1
                    },
                    success: function(data) {
                        $('#update').html(data);
                        $('#form-modal-heading').html("Updating Record");
                    },
                    error: function() {
                        // alert("Failed");
                        $('#modal-alert-heading').html("Failed");
                        $('#modal-alert-msg').html("Error In Php");
                        $('#modal-alert-body').css("background-color", "#fda5a5");
                        document.getElementById("modal-toggle").click();
                    }
                });
            });
        }

        function deleteShow(id) {
            console.log("id is " + id);
            $('#modal-alert-body').css("background-color", "#a5fda5");
            $('#modal-alert-heading').html("ARE YOU SURE!!!");
            $('#modal-alert-msg').html(`<h4>do you want to Remove ${id}</h4>
                <div class="mb-3 row">
                    <div class="col-sm-10">
                    <button onclick="deleteFn(${id},3)" class="btn btn-primary">Yes,Fired...!!!</button>
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-sm-10">
                    <button onclick="deleteFn(${id},7)" class="btn btn-primary">Yes...User Resigned...!!!</button>
                    </div>
                </div>
                `);
            document.getElementById("modal-toggle").click();
        }

        function deleteFn(id, status) {
            $(document).ready(function() {
                console.log("deleting...");
                $.ajax({
                    url: '_user.php',
                    type: "POST",
                    data: {
                        'id': id,
                        'status': status,
                        'btn_user_delete': 1
                    },
                    success: function(data) {
                        if (data.status == 1) {
                            $('#modal-alert-body').css("background-color", "#a5fda5");
                            $('#modal-alert-heading').html("Successful");
                            $('#modal-alert-msg').html(data.msg);
                        } else if (data.status == 0) {
                            $('#modal-alert-body').css("background-color", "#fda5a5");
                            $('#modal-alert-heading').html("Failed");
                            $('#modal-alert-msg').html(data.msg);
                        }
                        loadData();
                    },
                    error: function() {
                        $('#modal-alert-heading').html("Failed");
                        $('#modal-alert-msg').html("Error In Php");
                        $('#modal-alert-body').css("background-color", "#fda5a5");
                    }
                });
                document.getElementById("modal-toggle").click();
            });
        }
    </script>
    <script>
        var input1 = document.getElementById("first-name");
        var input2 = document.getElementById("last-name");
        var input3 = document.getElementById("user-email");
        var input4 = document.getElementById("user-contact");
        var input5 = document.getElementById("user-education");
        var input6 = document.getElementById("user-address");
        var input7 = document.getElementById("user-salary");
        input1.addEventListener("keypress", function(event) {
            if (event.key === "Enter") {
                event.preventDefault();
                document.getElementById("btn-user-insert").click();
            }
        });
        input2.addEventListener("keypress", function(event) {
            if (event.key === "Enter") {
                event.preventDefault();
                document.getElementById("btn-user-insert").click();
            }
        });
        input3.addEventListener("keypress", function(event) {
            if (event.key === "Enter") {
                event.preventDefault();
                document.getElementById("btn-user-insert").click();
            }
        });
        input4.addEventListener("keypress", function(event) {
            if (event.key === "Enter") {
                event.preventDefault();
                document.getElementById("btn-user-insert").click();
            }
        });
        input5.addEventListener("keypress", function(event) {
            if (event.key === "Enter") {
                event.preventDefault();
                document.getElementById("btn-user-insert").click();
            }
        });
        input6.addEventListener("keypress", function(event) {
            if (event.key === "Enter") {
                event.preventDefault();
                document.getElementById("btn-user-insert").click();
            }
        });
        input7.addEventListener("keypress", function(event) {
            if (event.key === "Enter") {
                event.preventDefault();
                document.getElementById("btn-user-insert").click();
            }
        });
    </script>
    <script>
        function loadData() {
            console.log("loading data...")
            $(document).ready(function() {
                $.ajax({
                    url: '_user.php',
                    type: "POST",
                    data: {
                        'btn_show': 1
                    },
                    success: function(data) {
                        $('#records').html(data);
                    },
                    error: function() {
                        $('#modal-alert-heading').html("Failed");
                        $('#modal-alert-msg').html("Error In Php");
                        $('#modal-alert-body').css("background-color", "#fda5a5");
                        document.getElementById("modal-toggle").click();
                    }
                });
            });
        }
    </script>
    <script>
        /** Variables */
        let files = [],
            dragArea = document.querySelector(".image-upload-wrap"),
            input = document.querySelector(".image-upload-wrap input"),
            select = document.querySelector(".image-upload-wrap .drag-text"),
            container = document.querySelector(".file-upload-content");
        var total = 0;
        var img_arr = [];

        /** CLICK LISTENER */
        select.addEventListener("click", () => input.click());

        /* INPUT CHANGE EVENT */
        input.addEventListener("change", () => {
            let file = input.files;
            console.log(file)
            console.log(file.length)
            total = file.length;
            // if user select no image
            if (file.length == 0) {
                return;
            }

            for (let i = 0; i < file.length; i++) {
                if (file[i].type.split("/")[0] != "image") continue;
                if (!files.some((e) => e.name == file[i].name)) files.push(file[i]);
            }

            showImages();
        });

        /** SHOW IMAGES */

        function showImages() {
            container.innerHTML = files.reduce((prev, current, index) => {
                return `${prev}
				<div><img src="${URL.createObjectURL(current)}" width="200px" height="200px">
                        <div class="image-title-wrap">
                            <button type="button" onclick="delImage(${index})" class="remove-image">Remove <span
                                class="image-title">${current.name}</span></button>
                        </div></div>`;
            }, "");
            if (total == 0) {
                $('.file-upload-content').hide();
                $('.image-upload-wrap').show();
                $('#add-image').show();
                return;
            } else {
                $('.file-upload-content').show();
                $('.image-upload-wrap').hide();
                $('#add-image').hide();
            }
        }

        /* DELETE IMAGE */
        function delImage(index) {
            total--;
            console.log(input.files)
            console.log((input.files).length)
            files.splice(index, 1);
            img_arr.push(index);
            showImages();
        }

        /* DRAG & DROP */
        dragArea.addEventListener("dragover", (e) => {
            e.preventDefault();
            dragArea.classList.add("dragover");
        });

        /* DRAG LEAVE */
        dragArea.addEventListener("dragleave", (e) => {
            e.preventDefault();
            dragArea.classList.remove("dragover");
        });

        /* DROP EVENT */
        dragArea.addEventListener("drop", (e) => {
            e.preventDefault();
            dragArea.classList.remove("dragover");

            let file = e.dataTransfer.files;
            for (let i = 0; i < file.length; i++) {
                /** Check selected file is image */
                if (file[i].type.split("/")[0] != "image") continue;

                if (!files.some((e) => e.name == file[i].name)) files.push(file[i]);
            }
            showImages();
        });
    </script>
    <?php require 'partials/_footer.php'; ?>
</body>

</html>