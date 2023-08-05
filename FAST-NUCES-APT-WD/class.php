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

    <div class="modal fade mt-5" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Add Task</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <form class="row g-3" action="task_add.php" method="post" enctype="multipart/form-data" >
                            <div class="col-12">
                                <label for="inputNanme4" class="form-label">Task Name</label>
                                <input type="text" class="form-control" name="task_name" id="inputNanme4" placeholder="Enter Here">
                            </div>
                            <div class="col-12">
                                <label for="inputNanme4" class="form-label">Task Description</label>
                                <input type="text" class="form-control" name="task_desc" id="inputNanme4" placeholder="Enter Here">
                            </div>
                            <div class="col-12">
                                <label for="project_name" class="form-label">File</label>
                               <br>
                  <input type="file" class="form-control" name="files[]" multiple>
                             


                            </div>
                            <?php
                            $p_id = $_GET['id']; ?>
                            <input type="hidden" name="class_id" value="<?php echo $p_id ?>" id="">
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


                <?php
                require 'partials/_connection.php';
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $c_id = $_SESSION['userId'];
                    if ($_SESSION['userRoleId']==3) {
                        $sql = "SELECT * FROM class_students WHERE (student_id_fk=$c_id AND class_id_fk=$id)";
                    }
                    else{
                        $sql = "SELECT * FROM class WHERE (teacher_id_fk=$c_id AND class_id=$id)";
                    }
                    $r = mysqli_query($con, $sql);
                    $a = mysqli_num_rows($r);
                    if ($a == 0) {

                        echo '<script>alert("hello-1")</script>';
                        // echo '<script>location.replace("page-error-404.php");</script>';
                    }
                } else {
                    echo '<script>alert("hello-2")</script>';
                    // echo '<script>location.replace("page-error-404.php");</script>';
                }
                $query = "SELECT * FROM `class` INNER JOIN `users` on `class`.`teacher_id_fk`=`users`.`user_id` 
                WHERE `class`.`class_id`=$id";
                $result = mysqli_query($con, $query);
                $data = mysqli_fetch_assoc($result);
                ?>

                <div class="detail-main">
                    <div class="project-card-top">
                        <i class="fa fa-gg" style="font-size: 30px; color: red; display: inline-block;"></i>
                        <h5 class="mt-0" style="display: inline-block;"><b class="main">Project Name : </b> <span><?php echo $data['class_name'] ?> </span>
                    </div>



                    <div class="row">
                        <div class="col-lg-6 col-sm-12">




                            <p class="mb-0"><b class="text-primary">Administrative: </b> <span> <?php
                            $c_id=$_SESSION['userId'];
                                                                                                if ($data['teacher_id_fk'] == $c_id) {
                                                                                                    echo $data['username'] . "(YOU)";
                                                                                                } else {
                                                                                                    echo $data['username'];
                                                                                                }
                                                                                                ?> </span></p>

                        </div>
                        <div class="col-lg-6  col-sm-12">








                        </div>
                    </div>



                    <div class="row">
                        <div class="col-lg-6 col-sm-12">




                            <p class="mb-0"><b class="text-primary">unique_code: </b><span><?php echo $data['unique_code'] ?> </span></p>


                        </div>
                        <div class="col-lg-6 col-sm-12">



                            <a href="key_email_check.php?id=<?php echo $data['unique_code'] ?>&class=<?php echo $data['class_id'] ?>">Add Student --></a>


                        </div>
                        <div class="col-lg-6  col-sm-12">




                            
                                    <?php
                                    $id = $data['class_id'];
                                    $sql = "SELECT * FROM `class_students` INNER JOIN `users` on `class_students`.`student_id_fk`=`users`.`user_id` WHERE `class_id_fk`= $id";
                                    $res = mysqli_query($con, $sql);
                                    $t_students = mysqli_num_rows($res);
                                    echo'<p class=""><b class="text-primary">Students('.$t_students.'): </b> <span>';
                                    //  echo '<b>' . $users . '</b>';
                                    if ($t_students > 0) {
                                        while ($data2 = mysqli_fetch_assoc($res)) {
                                            echo  $data2['username'].'('.$data2['user_id'].')';
                                            echo '<a href="partials/_remove_student?id='.$data2['user_id'].'">Remove</a>';
                                        }
                                    }
                                    ?> </span>
                            </p>





                        </div>
                    </div>











                    <p class=""><b class="text-primary">Created On: </b><span><?php echo $data['created_at'] ?>
                        </span></p>







                </div>
                <div class="row">
                    <div class="col">
                        <button class="see-board-btn" onclick="window.location.href='board.php?project=<?php echo $data['class_id']; ?>'">
                            <i class="fa fa-eye"></i>
                            See Board
                        </button>
                    </div>



                    <?php $current_user = $_SESSION['userId'];
                    $proj_admin = $data["user_id"]; ?>







                    <?php

                    if ($_SESSION['userRoleId'] != 3) {
                        echo '

                    <div class="col">
    <button type="button" class="btn btn-primary modal-btn see-board-btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                    +Add Task
                                </button>
    </div>

                    <div class="col mt-1">
                    <button class="see-board-btn" onclick="window.location.href=\'partials/_class_delete.php?class=' . $data['class_id'] . '\'">
                    <i class="fa fa-trash"></i> Delete
                  </button>     </div> </div>';;
                        $q = "SELECT * FROM TASK WHERE class_id_fk=$id";
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
                        <p>' . $d['task_description'] . '</p>
                        
                        <p>' . $d['created_at'] . '</p>
                        
                        
                        </div>
                    
                      ';
                      $x1=$d['task_id'];
                      $s="SELECT * from task_files WHERE task_id_fk=$x1";
                      $run=mysqli_query($con,$s);
                      while ($d2 = mysqli_fetch_assoc($run)) {
                        ?>
                        Link:<a  href="uploads<?php echo $d2['file_path'];?>"><?php echo $d2['file_path'];?></a>
                        <br><hr>
                        <?php
                      }
                            }

                    ?>
                </div>
                <hr> <?php
                        } else {
                            echo 'no task yet...!!!<br>';
                        }
                    } else {
                        echo '<span style="color:red;" class="mt-4">class does not belong to you,you can not create task</span>';
                    }
                        ?>

        <br>

        


            </div>
        </section>

    </main><!-- End #main -->
    <?php require 'partials/_footer.php' ?>



</body>

</html>