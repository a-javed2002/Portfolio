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


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <link href="public/assets/vendor/jquery-asColorPicker/css/asColorPicker.min.css" rel="stylesheet" type="text/css" />
    <link href="public/assets/css/style.css" rel="stylesheet" type="text/css" />

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
                    <h4 class="modal-title" id="form-modal-heading">Update Status</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="basic-form">
                                    <div class="mb-3 row" id="update">
                                        <!-- <label class="col-sm-3 col-form-label">Status</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="status-name" placeholder="Enter Here">
                                            </div> -->
                                    </div>
                                    <div class="mb-3 row">
                                        <div class="col-sm-10">
                                            <button type="submit" id="btn-status-update" class="btn btn-primary">update</button>
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
            <div class="page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Components</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Sweet Alert</a></li>
                </ol>
            </div>
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Insert Status</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Status</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="status-name" placeholder="Enter Here">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Font Awesome Icon</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="status-icon" placeholder="Enter Here">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Color Picker</label>
                                <div class="col-sm-9">
                                    <input type="text" class="gradient-colorpicker form-control" value="#bee0ab" id="status-color">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-sm-10">
                                    <button type="submit" id="btn-status-insert" class="btn btn-primary">Insert</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Statuss In Lab</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>ID</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="records">
                                    <?php
                                    require 'partials/_connection.php';
                                    $sql2 = "SELECT * FROM `status` ORDER BY status_id DESC";
                                    $res2 = mysqli_query($con, $sql2);
                                    while ($data = mysqli_fetch_assoc(($res2))) { ?>
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
    <script src="public/assets/vendor/jquery-asColor/jquery-asColor.min.js"></script>
    <script src="public/assets/vendor/jquery-asGradient/jquery-asGradient.min.js"></script>
    <script src="public/assets/vendor/jquery-asColorPicker/js/jquery-asColorPicker.min.js"></script>
    <script src="public/assets/js/plugins-init/jquery-asColorPicker.init.js"></script>
    <script>
        function statusName() {
            var name = document.getElementById("status-name-update").value;
            console.log(name);
            document.getElementById("name-change").innerHTML = name;

            // var icon = document.getElementById("status-icon-update").value;
            // console.log(icon);
            // document.getElementById("icon-change").innerHTML = name;

            var color = document.getElementById("status-color-update").value;
            console.log(color);
            document.getElementById("color-change").style.backgroundColor = color;
        }
        $(document).ready(function() {
            $('#status-name-update').keyup(function() {
                console.log("working...!!");
                $('#name-change').val() = $('#status-name-update').val();
            });
        });
    </script>
    <script>
        $('document').ready(function() {
            $('#btn-status-insert').click(function() {
                var status_name = $('#status-name').val();
                var status_icon = $('#status-icon').val();
                var status_color = $('#status-color').val();
                console.log(status_name);
                console.log(status_icon);
                console.log(status_color);
                if (status_name != '') {
                    var testing_reg = /^[a-zA-Z\s]{3,15}$/;
                    if (testing_reg.test(status_name) == true) {
                        $.ajax({
                            url: '_status.php',
                            type: "POST",
                            data: {
                                'status_name': status_name,
                                'status_icon': status_icon,
                                'status_color': status_color,
                                'btn_status_insert': 1,
                            },
                            dataType: 'JSON',
                            success: function(data) {
                                // alert(data.status);
                                if (data.status == 1) {
                                    $('#modal-alert-body').css("background-color", "#a5fda5");
                                    $('#modal-alert-heading').html("Successful");
                                    $('#modal-alert-msg').html(data.msg);
                                    $('#status-name').val('');
                                    $('#status-icon').val('');
                                    $('#status-color').val('');
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
                        $('#modal-alert-msg').html("Only Alphabets Are Allowed And Between 3 To 15 Characters");
                        $('#modal-alert-body').css("background-color", "#fda5a5");
                    }
                } else {
                    $('#modal-alert-heading').html("Failed");
                    $('#modal-alert-msg').html("Fill The Field 'ADD STATUS'!!");
                    $('#modal-alert-body').css("background-color", "#fda5a5");
                }
                document.getElementById("modal-toggle").click();
            });
        })
    </script>
    <script>
        $('document').ready(function() {
            $('#btn-status-update').click(function() {
                var status_name = $('#status-name-update').val();
                var status_id = $('#status-id').val();
                var status_icon = $('#status-icon-update').val();
                var status_color = $('#status-color-update').val();
                if (status_name != '') {
                    var testing_reg = /^[a-zA-Z\s]{3,}$/;
                    if (testing_reg.test(status_name) == true) {
                        $.ajax({
                            url: '_status.php',
                            type: "POST",
                            data: {
                                'status_id': status_id,
                                'status_name': status_name,
                                'status_color': status_color,
                                'status_color': status_color,
                                'btn_status_update': 1,
                            },
                            dataType: 'JSON',
                            success: function(data) {
                                // alert(data.status);
                                if (data.status == 1) {
                                    $('#status-name-update').val('');
                                    $('#status-id').val('');
                                    $('#modal-container').click(function() {
                                        $(this).addClass('out');
                                        $('body').removeClass('modal-active');
                                        $('#status-name-update').val('');
                                        $('#status-icon-update').val('');
                                        $('#status-color-update').val('');
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
                    $('#modal-alert-msg').html("Fill The Field 'ADD STATUS'!!");
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
            $('#status-name-update').val('');
        });
    </script>
    <script>
        function updateFn(id) {
            $(document).ready(function() {
                $.ajax({
                    url: '_status.php',
                    type: "POST",
                    data: {
                        'id': id,
                        'btn_status_update_show': 1
                    },
                    success: function(data) {
                        $('#update').html(data);
                        $('#form-modal-heading').html("Updating Record");
                        document.getElementById("btn-status-update").style.display = "block";
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
                    url: '_status.php',
                    type: "POST",
                    data: {
                        'id': id,
                        'btn_status_delete': 1
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
        var input1 = document.getElementById("status-name");
        var input2 = document.getElementById("status-name-update");
        input1.addEventListener("keypress", function(event) {
            if (event.key === "Enter") {
                event.preventDefault();
                document.getElementById("btn-status-insert").click();
            }
        });
        input2.addEventListener("keypress", function(event) {
            if (event.key === "Enter") {
                event.preventDefault();
                document.getElementById("btn-status-update").click();
            }
        });
    </script>
    <script>
        function loadData() {
            $(document).ready(function() {
                $.ajax({
                    url: '_status.php',
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