<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Home</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <?php require 'partials/_head.php' ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .see-board-btn {
            background-color: blue;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        .see-board-btn:hover {
            background-color: darkblue;
        }

        .see-board-btn i {
            margin-right: 10px;
        }

        .project-card-top {
            background-color: #f6f9ff !important;
        }

        .project-card-top h5 .main {
            background-color: #f6f9ff !important;
            color: #012970 !important;
        }

        .project-card-top span {
            color: black !important;
            font-weight: 600 !important;
            font-size: 15px !important;
        }

        .detail-main h5 {
            color: #012970;
            font-weight: 630;
            font-size: 17px;
            padding: 10px;


        }

        .detail-main div {
            margin-top: 10px;
        }

        .detail-main p {
            margin-top: 5px !important;
        }

        .detail-main p .text-primary {
            color: #198754 !important;
            font-weight: 550 !important;
            font-size: 16px !important;
        }

        .detail-main p span {
            color: black !important;
            font-weight: 500 !important;
            font-size: 14px !important;
        }
    </style>
</head>

<body>



    <?php require 'partials/_header.php' ?>
    <?php require 'partials/_sidebar.php' ?>

    <!-- Modal -->
    <div class="modal fade mt-5" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Add Task</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <form class="row g-3" action="partials/_task.php" method="post">
                            <div class="col-12">
                                <label for="inputNanme4" class="form-label">Task Name</label>
                                <input type="text" class="form-control" name="task_name" id="inputNanme4" placeholder="Enter Here">
                            </div>
                            <div class="col-12">
                                <label for="inputNanme4" class="form-label">Task Nature</label>
                                <input type="text" class="form-control" name="nature" id="inputNanme4" placeholder="Enter Here">
                            </div>
                            <?php
                            $p_id = $_GET['id']; ?>
                            <input type="hidden" name="project_id" value="<?php echo $p_id ?>" id="">
                            <div class="col-12">
                                <label for="user_id" class="form-label">Project User</label>
                                <select id="user_id" name="user_id" class="form-select">
                                    <option value="0" selected>--Select--</option>
                                    <?php
                                    require 'partials/_connection.php';
                                    $c_id = $_SESSION['userId'];
                                    $query = "
                                    select * from project_users join users on project_users.user_id_fk=users.user_id where project_id_fk='$p_id' AND user_id!='$c_id'
                                    ";
                                    $result = mysqli_query($con, $query);
                                    $row = mysqli_num_rows($result);
                                    while ($data = mysqli_fetch_assoc($result)) {
                                    ?>
                                        <option value="<?php echo $data['user_id'] ?>"><?php echo $data['username']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="text-center">
                                <button type="submit" name="btn" class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="modal fade mt-5" id="pop-up-2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="pop-up-2-Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="pop-up-2-Label">Add Work Item</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <form class="row g-3" action="partials/_item.php" method="post">

                            <div class="col-12">
                                <label for="project_key" class="form-label">Title</label>
                                <input type="text" class="form-control" name="title" id="project_key" placeholder="Enter Here">
                            </div>
                            <div class="col-12" style="display:none;">
                                <label for="project_key" class="form-label">Status</label>
                                <input type="number" class="form-control" max="1" name="status" id="project_key" placeholder="Enter Here">
                            </div>
                            <div class="col-12">
                                <label for="w_type" class="form-label">Type</label>
                                <input type="text" class="form-control" max="1" name="w_type" id="w_type" placeholder="Enter Here">
                            </div>
                            <?php
                            $p_id = $_GET['id'];
                            $c_id = $_SESSION['userId'];
                            ?>
                            <input type="hidden" name="project_id" value="<?php echo $p_id ?>" id="">
                            <div class="col-12" style="display:none;">
                                <label for="w_path" class="form-label">Path</label>
                                <input type="text" class="form-control" name="w_path" id="w_path" placeholder="Enter Here">
                            </div>
                            <div class="col-12">
                                <label for="user_id" class="form-label">Project User</label>
                                <select id="user_id" name="user_id" class="form-select">
                                    <option value="0" selected>--Select--</option>
                                    <?php
                                    require 'partials/_connection.php';
                                    $c_id = $_SESSION['userId'];
                                    $query = "
                                    select * from project_users join users on project_users.user_id_fk=users.user_id where project_id_fk='$p_id' AND user_id!='$c_id'
                                    ";
                                    $result = mysqli_query($con, $query);
                                    $row = mysqli_num_rows($result);
                                    while ($data = mysqli_fetch_assoc($result)) {
                                    ?>
                                        <option value="<?php echo $data['user_id'] ?>"><?php echo $data['username']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="text-center">
                                <button type="submit" id="join-project" name="btn" class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                    </div>
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
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">

                <!-- <h2>single project detail aur sidebar may uskay effects</h2>
                <h3>show all workitems related to this proj and gives option to add...edit..delete them</h3>
                <h4>workitem id,title,assign(user),status,path</h4>
                <h5>option to see proj related backlogs(unassigned work items)</h5>
                <h5>Add user/people</h5> -->


                <?php
                require 'partials/_connection.php';
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $c_id = $_SESSION['userId'];
                    $sql = "SELECT * FROM project_users WHERE user_id_fk=$c_id AND project_id_fk=$id";
                    $r = mysqli_query($con, $sql);
                    $a = mysqli_num_rows($r);
                    if ($a == 0) {
                        echo '<script>location.replace("page-error-404.php");</script>';
                    }
                } else {
                    echo '<script>location.replace("page-error-404.php");</script>';
                }
                $query = "SELECT * FROM `project` INNER JOIN `users` on `project`.`user_id_fk`=`users`.`user_id` INNER JOIN `organization`on `project`.`organization_id_fk`=`organization`.`organization_id` WHERE `project`.`project_id`=$id";
                $result = mysqli_query($con, $query);
                $data = mysqli_fetch_assoc($result);
                ?>

                <div class="detail-main">
                    <div class="project-card-top">
                        <i class="fa fa-gg" style="font-size: 30px; color: red; display: inline-block;"></i>
                        <h5 class="mt-0" style="display: inline-block;"><b class="main">Project Name : </b> <span><?php echo $data['project_name'] ?> </span>
                    </div>



                    <div class="row">
                        <div class="col-lg-6 col-sm-12">




                            <p class="mb-0"><b class="text-primary">Administrative: </b> <span> <?php
                            $c_id=$_SESSION['userId'];
                                                                                                if ($data['user_id_fk'] == $c_id) {
                                                                                                    echo $data['username'] . "(YOU)";
                                                                                                } else {
                                                                                                    echo $data['username'] . " " . $data['user_id_fk'] . " " . $_SESSION['userId'];
                                                                                                }
                                                                                                ?> </span></p>

                        </div>
                        <div class="col-lg-6  col-sm-12">



                            <p class="mb-0"><b class="text-primary">organization: </b><span><?php echo $data['organization_name'] ?></p>





                        </div>
                    </div>



                    <div class="row">
                        <div class="col-lg-6 col-sm-12">




                            <p class="mb-0"><b class="text-primary">project Key: </b><span><?php echo $data['project_key'] ?> </span></p>


                        </div>
                        <div class="col-lg-6 col-sm-12">



                            <a href="key_email_check.php?id=<?php echo $data['project_id'] ?>">Add User --></a>


                        </div>
                        <div class="col-lg-6  col-sm-12">




                            <p class=""><b class="text-primary">Members: </b> <span>
                                    <?php
                                    $id = $data['project_id'];
                                    $sql = "SELECT * FROM `project_users` INNER JOIN `users` on `project_users`.`user_id_fk`=`users`.`user_id` WHERE `project_id_fk`= $id";
                                    $res = mysqli_query($con, $sql);
                                    $users = mysqli_num_rows($res);
                                    //  echo '<b>' . $users . '</b>';
                                    if ($users > 0) {
                                        while ($data2 = mysqli_fetch_assoc($res)) {
                                            echo  $data2['username'];
                                        }
                                    }
                                    ?> </span>
                            </p>





                        </div>
                    </div>











                    <p class=""><b class="text-primary">Created On: </b><span><?php echo $data['added_on'] ?>
                        </span></p>







                </div>
                <div class="row">
                    <div class="col">
                        <button class="see-board-btn" onclick="window.location.href='board.php?project=<?php echo $data['project_id']; ?>'">
                            <i class="fa fa-eye"></i>
                            See Board
                        </button>
                    </div>




                    <div class="col">
                        <button type="button" class="btn btn-primary modal-btn see-board-btn" data-bs-toggle="modal" data-bs-target="#pop-up-2">
                            +Add Work Item
                        </button>
                    </div>
                    <?php $current_user = $_SESSION['userId'];
                    $proj_admin = $data["user_id"]; ?>







                    <?php

                    if ($current_user == $proj_admin) {
                        echo '

                    <div class="col">
    <button type="button" class="btn btn-primary modal-btn see-board-btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                    +Add Task
                                </button>
    </div>

                    <div class="col mt-1">
                    <button class="see-board-btn" onclick="window.location.href=\'partials/_project_delete.php?project=' . $data['project_id'] . '\'">
                    <i class="fa fa-trash"></i> Delete
                  </button>     </div> </div>';;
                        $q = "SELECT * FROM TASK WHERE project_id_fk=$id";
                        $r = mysqli_query($con, $q);
                        $t = mysqli_num_rows($r);
                        if ($t > 0) {
                            echo '<div class="project-card-top mt-4">
                    <i class="fa fa-tasks" style="font-size: 30px; color: red; display: inline-block;"></i>
                    
                    <h5 class="mt-0" style="display: inline-block;"><b class="main">Task : </b> <span> ' . $t . '</span>
                              </div> <div class="row">';

                            while ($d = mysqli_fetch_assoc($r)) {
                                echo '
                            
                            <div class="col-lg-6 col-sm-12">
                        <p>' . $d['task_id'] . '</p>
                        <p>' . $d['task_name'] . '</p>
                        <p>' . $d['task_nature'] . '</p>
                        <p>' . $d['created_at'] . '</p>
                        <p>implementation required</p>
                        
                        </div>
                    
                      ';
                            }

                    ?>
                </div>
                <hr> <?php
                        } else {
                            echo 'no task yet...!!!<br>';
                        }
                    } else {
                        echo '<span style="color:red;" class="mt-4">project does not belong to you,you can not create task</span>';
                    }
                        ?>

        <br>

        <?php

        $q2 = "SELECT * FROM work_items WHERE project_id_fk=$id";
        $r2 = mysqli_query($con, $q2);
        $t2 = mysqli_num_rows($r2);
        if ($t2 > 0) {
        ?> <div class="row"> <?php
                                while ($d2 = mysqli_fetch_assoc($r2)) {
                                    echo '<div class="col-lg-6 col-sm-12">
                        <div class="project-card-top mt-4">
                        <i class="fa fa-check-square-o" style="font-size: 30px; color: red; display: inline-block;"></i>                      
                        <h5 class="mt-0" style="display: inline-block;"><b class="main">Total Work Item : </b> <span> ' . $t2 . '</span>
                                  </div> ';
                                    echo '   
                        <p>ID:' . $d2['wk_id'] . '</p>
                        <p>Title:' . $d2['title'] . '</p>
                        <p>Status:' . $d2['status'] . '</p>
                        <p>Path:' . $d2['path'] . '</p>
                        <p>Created at:' . $d2['created_at'] . '</p>
                        <p>updated at:' . $d2['updated_at'] . '</p>
                        
                        </div>';
                                }
                                ?> </div>
            <hr> <?php
                } else {
                    echo 'no work items yet...!!!<br>';
                }

                    ?>


            </div>
        </section>

    </main><!-- End #main -->
    <?php require 'partials/_footer.php' ?>



</body>

</html>