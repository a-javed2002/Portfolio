<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Home</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <?php require 'partials/_head.php' ?>
</head>
<style>
    .modal-btn {
        margin-top: 30px;
    }
</style>

<body>



    <?php require 'partials/_header.php' ?>
    <?php require 'partials/_sidebar.php' ?>

    <!-- Modal -->
    <div class="modal fade mt-5" id="pop-up-1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="pop-up-1-Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="pop-up-1-Label">Add Class</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row g-3" id="project-form">
                            <div class="col-12">
                                <label for="class_name" class="form-label">Class Name</label>
                                <input type="text" class="form-control" name="class_name" id="class_name" placeholder="Enter Here">
                            </div>
                            <div class="col-12">
                                <label for="class_uc" class="form-label"></label>
                                <input type="text" class="form-control" name="class_uc" id="class_uc" placeholder="Enter Here">
                            </div>

                            <div class="text-center">
                                <button type="submit" id="add-class" class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <center style="display:none;">
        <div class="mt-5">
            <!-- Button trigger modal -->
            <button type="button" id="msg-modal" class="btn btn-primary modal-btn" data-bs-toggle="modal" data-bs-target="#pop-up">
                Launch static backdrop modal
            </button>
        </div>
    </center>

    <div class="modal fade mt-5" id="pop-up-2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="pop-up-2-Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="pop-up-2-Label">Join Class</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row g-3" method="post">
                            <div class="col-12">
                                <label for="unique_code" class="form-label">Unique Class Code</label>
                                <input type="text" class="form-control" name="unique_code" id="unique_code" placeholder="Enter Here">
                            </div>

                            <div class="text-center">
                                <button type="submit" id="join-class" class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="pop-up" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="pop-up-Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" id="modal-main-body">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-head">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modal-body-msg">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <!-- <button type="button" class="btn btn-primary">Understood</button> -->
                </div>
            </div>
        </div>
    </div>

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">

                <div class="form-head d-flex  md-5 align-items-start">
                    <div class="input-group search-area d-inline-flex">
                        <input type="text" class="form-control" placeholder="Search here" id="search-bar-class">
                        <button type="button" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="search By organization name,Admin name,Project name...use '/' /startwith and can use endwith/ in your search...Give Result By Latest Created Project">
                            <i class="bi bi-info-circle"></i>
                        </button>
                    </div>
                </div>

                <div class="form-head d-flex mb-4 mb-md-5 align-items-start">
                    <?php
                    if (strtolower($_SESSION['userRoleId']) == 2) {
                    ?>

                        <button type="button" class="btn btn-primary modal-btn" data-bs-toggle="modal" data-bs-target="#pop-up-1">
                            + Add New Class
                        </button>
                    <?php
                    }
                    ?>

                    &nbsp; &nbsp;
                    <?php
                    if (strtolower($_SESSION['userRoleId']) == 3) {
                    ?>
                        <button type="button" class="btn btn-primary modal-btn" data-bs-toggle="modal" data-bs-target="#pop-up-2">
                            + join New Class
                        </button>
                    <?php
                    }
                    ?>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">ALL CLASSES</h4>
                            </div>
                            <div class="card-body">
                                <div class="bootstrap-media mt-3">
                                    <ul class="list-unstyled" id="class-list">

                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>



    </main><!-- End #main -->
    <?php require 'partials/_footer.php' ?>

    <script>
        $(document).ready(function() {

            $('#join-class').click(function() {
                var unique_code = $('#unique_code').val();

                console.log(unique_code)
                $.ajax({
                    url: 'partials/_class.php',
                    type: "POST",
                    data: {
                        'unique_code': unique_code,
                        'join_class': 1,
                    },
                    dataType: 'JSON',
                    success: function(data) {
                        if (data.status == 1) {
                            $('#modal-main-body').css("background-color", "#bccccb");
                            $('#modal-head').html(data.status);
                            $('#modal-body-msg').html(data.msg);
                            $('#search-bar-class').val('');
                            $('#unique_code').val('');
                        } else if (data.status == 0) {
                            $('#modal-main-body').css("background-color", "#bccccb");
                            $('#modal-head').html(data);
                            $('#modal-body-msg').html(data.msg);
                        }
                        load_data_all();
                    },
                    error: function(xhr, textStatus, errorThrown) {
                        // Handle error
                        $('#modal-main-body').css("background-color", "#ffcccb");
                        $('#modal-head').html("Failed");
                        $('#modal-body-msg').html(xhr.responseText);
                    }
                });

                document.getElementById("msg-modal").click();
            });

            $('#add-class').click(function() {
                var class_name = $('#class_name').val();
                var class_uc = $('#class_uc').val();

                console.log(class_name)
                console.log(class_uc)
                $.ajax({
                    url: 'partials/_class.php',
                    type: "POST",
                    data: {
                        'class_name': class_name,
                        'class_uc': class_uc,
                        'add_class': 1,
                    },
                    dataType: 'JSON',
                    success: function(data) {
                        if (data.status == 1) {
                            $('#modal-main-body').css("background-color", "#bccccb");
                            $('#modal-head').html("success");
                            $('#modal-body-msg').html("added");
                            $('#user-email').val('');
                            $('#user-password').val('');
                            setTimeout(function() {
                                location.replace("index.php");
                            }, 1000);
                            document.getElementById("msg-modal").click();
                        } else if (data.status == 0) {
                            $('#modal-main-body').css("background-color", "#bccccb");
                            $('#modal-head').html(data);
                            $('#modal-body-msg').html(data.msg);
                            document.getElementById("msg-modal").click();
                        }

                        load_data_all('null', 'null', 'null');
                    },
                    error: function(xhr, textStatus, errorThrown) {
                        // Handle error
                        $('#modal-main-body').css("background-color", "#ffcccb");
                        $('#modal-head').html("Failed");
                        $('#modal-body-msg').html(xhr.responseText);
                        document.getElementById("msg-modal").click();
                    }
                });
                document.getElementById("msg-modal").click();

            });

            <?php
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                echo "load_data_all('null','null','$id')";
            ?>
            <?php
            } else {
            ?>
                load_data_all('null', 'null', 'null');
            <?php
            }
            ?>

            function load_data_all(search) {
                console.log("loading...!!!")
                $.ajax({
                    url: 'partials/_class.php',
                    type: "POST",
                    data: {
                        'search': search,
                        'class_list': 1,
                    },
                    success: function(data) {
                        $('#class-list').html(data);
                    },
                    error: function(xhr, status, error) {
                        alert("error " + xhr.response);
                    }
                });
            }
            $('#search-bar-class').keyup(function() {
                var text = $(this).val();
                if (text != '') {
                    load_data_all(text);
                    console.log("ok1")
                } else {
                    console.log("ok2")
                    load_data_all('null')
                }
            });
        });
    </script>

</body>

</html>