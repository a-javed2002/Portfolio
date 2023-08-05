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

<body>



    <?php require 'partials/_header.php'; ?>
    <?php require 'partials/_sidebar.php';
    if (strtolower($_SESSION['userRole']) == "user") {
    ?>
        <script>
            location.replace("page-error-404.php");
        </script>
    <?php
    }
    ?>

    <!-- Modal -->
    <div class="modal fade mt-5" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Add Organization</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <form class="row g-3" action="partials/_organization.php" method="post">
                            <div class="col-12">
                                <label for="inputNanme4" class="form-label">Organization Name</label>
                                <input type="text" class="form-control" name="organization_name" id="inputNanme4" placeholder="Enter Here">
                            </div>
                            <div class="text-center">
                                <button type="submit" name="add_organization" class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>

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
                    <li class="breadcrumb-item active">Organization</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <?php
                            if ((strtolower($_SESSION['userRole']) != "user" && $_SESSION['userRoleId'] != 3)) {
                            ?>
                                <h5 class="card-title">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary modal-btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                        +New Organization
                                    </button>
                                </h5>
                            <?php
                            }
                            ?>
                            <p>
                                organization --> managing on bigger platforms...
                            </p>

                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Belongs To</th>
                                        <th scope="col">No.Of Projects</th>
                                        <th scope="col">See Details</th>
                                        <th scope="col">Created</th>
                                    </tr>
                                </thead>
                                <tbody id="organization-data">
                                    <?php
                                    require 'partials/_connection.php';
                                    $query = "SELECT * FROM `organization` INNER JOIN `users` on `organization`.`user_id_fk`=`users`.`user_id`";
                                    $c_id = $_SESSION['userId'];
                                    if (strtolower($_SESSION['userRole']) == "admin") {
                                        $query = "SELECT * FROM `project_users` 
					INNER JOIN project on `project_users`.`project_id_fk`=`project`.`project_id` 
					INNER JOIN organization on `project`.`organization_id_fk`=`organization`.`organization_id` 
                    INNER JOIN `users` on `organization`.`user_id_fk`=`users`.`user_id`
					ORDER BY organization_id";
                                    } else {
                                        $query = "SELECT * FROM `project_users` 
					INNER JOIN project on `project_users`.`project_id_fk`=`project`.`project_id` 
					INNER JOIN organization on `project`.`organization_id_fk`=`organization`.`organization_id` 
                    INNER JOIN `users` on `organization`.`user_id_fk`=`users`.`user_id`
					WHERE project_users.user_id_fk=$c_id OR project.user_id_fk=$c_id OR organization.user_id_fk=$c_id 
					ORDER BY organization_id";
                                    }
                                    $result = mysqli_query($con, $query);
                                    $row = mysqli_num_rows($result);
                                    if ($row > 0) {
                                        while ($data = mysqli_fetch_assoc($result)) {
                                    ?>
                                            <tr>
                                                <th scope="row"><?php echo $data['organization_id']; ?></th>
                                                <td><?php echo $data['organization_name']; ?></td>
                                                <td><?php if ($data['user_id_fk'] == $_SESSION['userId']) {
                                                        echo '<b>YOU</b>';
                                                    } else {
                                                        echo $data['username'];
                                                    } ?></td>
                                                <td>
                                                    <?php
                                                    $id = $data['organization_id'];
                                                    $sql = "SELECT * FROM `project` WHERE `organization_id_fk`= $id";
                                                    $res = mysqli_query($con, $sql);
                                                    $projects = mysqli_num_rows($res);
                                                    echo '<b>' . $projects . '</b>'
                                                    ?>
                                                </td>
                                                <td>
                                                    <a href="project?id=<?php $data['organization_id']; ?>">Let's Go Pic</a>
                                                </td>
                                                <td><?php echo $data['created_at']; ?></td>
                                            </tr>
                                    <?php }
                                    } else {
                                        echo '<tr><th colspan="6" class="text-center">No records found</th></tr>';
                                    } ?>
                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->
    <?php require 'partials/_footer.php' ?>



</body>

</html>