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
</head>

<body>
    <?php require 'partials/_header.php' ?>
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
                                            <button type="submit" id="btn-role-update" class="btn btn-primary">update</button>
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
                        <h4 class="card-title">Insert Role</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Role</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="role-name" placeholder="Enter Here">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <div class="col-sm-10">
                                    <button type="submit" id="btn-role-insert" class="btn btn-primary">Insert</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Roles In Lab</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>ID</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="records">
                                    <?php
                                    require 'partials/_connection.php';
                                    $sql2 = "SELECT * FROM `role` ORDER BY role_id DESC";
                                    $res2 = mysqli_query($con, $sql2);
                                    while ($data = mysqli_fetch_assoc(($res2))) { ?>
                                        <tr>
                                            <td></td>
                                            <td><?php echo $data['role_id'] ?></td>
                                            <td><?php echo $data['role_name'] ?></td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="#" onclick="updateFn(<?php echo $data['role_id'] ?>)" data-bs-toggle="modal" data-bs-target="#myModal" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                                    <a href="#" onclick="deleteShow(<?php echo $data['role_id'] ?>)" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                                </div>
                                            </td>
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
            $('#btn-role-insert').click(function() {
                var role_name = $('#role-name').val();
                if (role_name != '') {
                    var testing_reg = /^[a-zA-Z\s]{3,}$/;
                    if (testing_reg.test(role_name) == true) {
                        $.ajax({
                            url: '_role.php',
                            type: "POST",
                            data: {
                                'role_name': role_name,
                                'btn_role_insert': 1,
                            },
                            dataType: 'JSON',
                            success: function(data) {
                                // alert(data.status);
                                if (data.status == 1) {
                                    $('#modal-alert-body').css("background-color", "#a5fda5");
                                    $('#modal-alert-heading').html("Successful");
                                    $('#modal-alert-msg').html(data.msg);
                                    $('#role-name').val('');
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
                    } else {
                        $('#modal-alert-heading').html("Failed");
                        $('#modal-alert-msg').html("Only Alphabets Are Allowed And More The Three Characters");
                        $('#modal-alert-body').css("background-color", "#fda5a5");
                    }
                } else {
                    $('#modal-alert-heading').html("Failed");
                    $('#modal-alert-msg').html("Fill The Field 'ADD ROLE'!!");
                    $('#modal-alert-body').css("background-color", "#fda5a5");
                }
                document.getElementById("modal-toggle").click();
            });
        })
    </script>
    <script>
        $('document').ready(function() {
            $('#btn-role-update').click(function() {
                var role_name = $('#role-name-update').val();
                var role_id = $('#role-id').val();
                if (role_name != '') {
                    var testing_reg = /^[a-zA-Z\s]{3,}$/;
                    if (testing_reg.test(role_name) == true) {
                        $.ajax({
                            url: '_role.php',
                            type: "POST",
                            data: {
                                'role_name': role_name,
                                'role_id': role_id,
                                'btn_role_update': 1,
                            },
                            dataType: 'JSON',
                            success: function(data) {
                                // alert(data.status);
                                if (data.status == 1) {
                                    $('#role-name-update').val('');
                                    $('#role-id').val('');
                                    $('#modal-container').click(function() {
                                        $(this).addClass('out');
                                        $('body').removeClass('modal-active');
                                        $('#role-name-update').val('');
                                    });
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
                    } else {
                        $('#modal-alert-heading').html("Failed");
                        $('#modal-alert-msg').html("Only Alphabets Are Allowed And More The Three Characters");
                        $('#modal-alert-body').css("background-color", "#fda5a5");
                    }
                } else {
                    $('#modal-alert-heading').html("Failed");
                    $('#modal-alert-msg').html("Fill The Field 'ADD ROLE'!!");
                    $('#modal-alert-body').css("background-color", "#fda5a5");
                }
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
            $('#role-name-update').val('');
        });
    </script>
    <script>
        function updateFn(id) {
            $(document).ready(function() {
                $.ajax({
                    url: '_role.php',
                    type: "POST",
                    data: {
                        'id': id,
                        'btn_role_update_show': 1
                    },
                    success: function(data) {
                        $('#update').html(data);
                        $('#form-modal-heading').html("Updating Record");
                        document.getElementById("btn-role-update").style.display = "block";
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
            $('#modal-alert-body').css("background-color", "#a5fda5");
            $('#modal-alert-heading').html("ARE YOU SURE!!!");
            $('#modal-alert-msg').html(`<h4>do you want to delete ${id}</h4>
                <div class="mb-3 row">
                    <div class="col-sm-10">
                    <button onclick="deleteFn(${id})" class="btn btn-primary">Yes</button>
                    </div>
                </div>`);
            document.getElementById("modal-toggle").click();
        }

        function deleteFn(id) {
            $(document).ready(function() {
                $.ajax({
                    url: '_role.php',
                    type: "POST",
                    data: {
                        'id': id,
                        'btn_role_delete': 1
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
        var input1 = document.getElementById("role-name");
        var input2 = document.getElementById("role-name-update");
        input1.addEventListener("keypress", function(event) {
            if (event.key === "Enter") {
                event.preventDefault();
                document.getElementById("btn-role-insert").click();
            }
        });
        input2.addEventListener("keypress", function(event) {
            if (event.key === "Enter") {
                event.preventDefault();
                document.getElementById("btn-role-update").click();
            }
        });
    </script>
    <script>
        function loadData() {
            $(document).ready(function() {
                $.ajax({
                    url: '_role.php',
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
                    }
                });
                document.getElementById("modal-toggle").click();
            });
        }
    </script>
    <?php require 'partials/_footer.php'; ?>
</body>

</html>