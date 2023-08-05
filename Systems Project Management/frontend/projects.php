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
                    <h5 class="modal-title" id="pop-up-1-Label">Add Project</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row g-3" id="project-form">
                            <div class="col-12">
                                <label for="project_name" class="form-label">Project Name</label>
                                <input type="text" class="form-control" name="project_name" id="project_name" placeholder="Enter Here">
                            </div>
                            <div class="col-12">
                                <label for="organization_id" class="form-label">Organization</label>
                                <select id="organization_id" name="organization_id" class="form-select">
                                    <option selected>--Select--</option>
                                    <?php
                                    require 'partials/_connection.php';
                                    $c_id = $_SESSION['userId'];
                                    $query = "SELECT * FROM `project_users`
            INNER JOIN project on `project_users`.`project_id_fk`=`project`.`project_id`
            INNER JOIN `users` on `project`.`user_id_fk`=`users`.`user_id`
            INNER JOIN organization on `project`.`organization_id_fk`=`organization`.`organization_id`
            WHERE project_users.user_id_fk=$c_id OR project.user_id_fk=$c_id OR organization.user_id_fk=$c_id
            ORDER BY organization_id";
                                    $result = mysqli_query($con, $query);
                                    $row = mysqli_num_rows($result);
                                    while ($data = mysqli_fetch_assoc($result)) {
                                    ?>
                                        <option value="<?php echo $data['organization_id'] ?>"><?php echo $data['organization_name']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="text-center">
                                <button type="submit" id="add-project" class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>



    <div class="modal fade mt-5" id="pop-up-2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="pop-up-2-Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="pop-up-2-Label">Join Project</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row g-3" method="post">
                            <div class="col-12">
                                <label for="project_key" class="form-label">Project key</label>
                                <input type="text" class="form-control" name="project_key" id="project_key" placeholder="Enter Here">
                            </div>

                            <div class="text-center">
                                <button type="submit" id="join-project" class="btn btn-primary">Submit</button>
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
                <!-- 
                <h2>saaray projects ki list...aur filter...that will gives your projects and others</h2>
                <br>
                <h3>option right hand side pay...to join project by entering the project key</h3>
                <br>
                <h3>My work items  gives info for all projects...work item name...related to which proj...when created and updated last time</h3>
                <h5>option to see all proj backlogs(unassigned work items)</h5> -->

                <div class="form-head d-flex  md-5 align-items-start">
                    <div class="input-group search-area d-inline-flex">
                        <input type="text" class="form-control" placeholder="Search here" id="search-bar-project">
                        <button type="button" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="search By organization name,Admin name,Project name...use '/' /startwith and can use endwith/ in your search...Give Result By Latest Created Project">
                            <i class="bi bi-info-circle"></i>
                        </button>
                    </div>
                </div>

                <div class="form-head d-flex mb-4 mb-md-5 align-items-start">
                    <?php
                    if(strtolower($_SESSION['userRole'])!="user"){
                        ?>
                        
                    <button type="button" class="btn btn-primary modal-btn" data-bs-toggle="modal" data-bs-target="#pop-up-1">
                        + Add New Project
                    </button>
                        <?php
                    }
                    ?>

                    &nbsp; &nbsp;
                    <button type="button" class="btn btn-primary modal-btn" data-bs-toggle="modal" data-bs-target="#pop-up-2">
                        + join New Project
                    </button>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Project list</h4>
                            </div>
                            <div class="card-body">
                                <div class="bootstrap-media mt-3">
                                    <ul class="list-unstyled" id="project-list">

                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <center style="display:none;">
            <div class="mt-5">
                <!-- Button trigger modal -->
                <button type="button" id="msg-modal" class="btn btn-primary modal-btn" data-bs-toggle="modal" data-bs-target="#pop-up">
                    Launch static backdrop modal
                </button>
            </div>
        </center>

    </main><!-- End #main -->
    <?php require 'partials/_footer.php' ?>

    <script>
        $(document).ready(function() {

            $('#join-project').click(function() {
                var project_key = $('#project_key').val();

                console.log(project_key)
                $.ajax({
                    url: 'partials/_project.php',
                    type: "POST",
                    data: {
                        'project_key': project_key,
                        'join_project': 1,
                    },
                    dataType: 'JSON',
                    success: function(data) {
                        if (data.status == 1) {
                            $('#modal-main-body').css("background-color", "#bccccb");
                            $('#modal-head').html(data.status);
                            $('#modal-body-msg').html(data.msg);
                            $('#search-bar-project').val('');
                            $('#project_key').val('');
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

            $('#add-project').click(function() {
                var project_name = $('#project_name').val();
                var organization_id = $('#organization_id').val();

                console.log(project_name)
                console.log(organization_id)
                $.ajax({
                    url: 'partials/_project.php',
                    type: "POST",
                    data: {
                        'project_name': project_name,
                        'organization_id': organization_id,
                        'add_project': 1,
                    },
                    dataType: 'JSON',
                    success: function(data) {
                        if (data.status == 1) {
                            $('#modal-main-body').css("background-color", "#bccccb");
                            $('#modal-head').html(data);
                            $('#modal-body-msg').html(data.msg);
                            $('#user-email').val('');
                            $('#user-password').val('');
                            setTimeout(function() {
                                location.replace("index.php");
                            }, 1000);
                        } else if (data.status == 0) {
                            $('#modal-main-body').css("background-color", "#bccccb");
                            $('#modal-head').html(data);
                            $('#modal-body-msg').html(data.msg);
                        }
                        load_data_all('null', 'null', 'null');
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
                    url: 'partials/_project.php',
                    type: "POST",
                    data: {
                        'search': search,
                        'project_list': 1,
                    },
                    success: function(data) {
                        $('#project-list').html(data);
                    },
                    error: function(xhr, status, error) {
                        alert("error " + xhr.response);
                    }
                });
            }
            $('#search-bar-project').keyup(function() {
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