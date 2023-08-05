<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Home</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <?php require 'partials/_head.php' ?>
    <link href="assets/vendor/nestable2/css/jquery.nestable.min.css" rel="stylesheet" type="text/css" />
</head>

<body>



    <?php require 'partials/_header.php'; ?>
    <?php require 'partials/_sidebar.php'; ?>

    <!-- Modal -->
    <div class="modal fade mt-5" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Add task</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <form class="row g-3" action="partials/_task.php" method="post">
                            <div class="col-12">
                                <label for="inputNanme4" class="form-label">task Name</label>
                                <input type="text" class="form-control" name="task_name" id="inputNanme4" placeholder="Enter Here">
                            </div>
                            <div class="text-center">
                                <button type="submit" name="add_task" class="btn btn-primary">Submit</button>
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
            <h1>Backlogs</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-md-12 bg-info">
                    <div class="card-content">
                        <div class="nestable">
                            <div class="dd" id="nestable">
                                <ol class="dd-list">
                                    <li class="dd-item" data-id="2">
                                        <div class="bg-warning">Project 1</div>
                                        <ol class="dd-list">
                                            <!-- <li class="dd-item" data-id="3">
                                                <div class="">Item 3</div>
                                            </li> -->
                                            <li class="dd-item" data-id="5">
                                                <div class="">u-task</div>
                                                <ol class="dd-list">
                                                    <li class="dd-item" data-id="15">
                                                        <div class="">task-1</div>
                                                        <ol class="dd-list">
                                                            <li class="dd-item" data-id="16">
                                                                <div class="">Item 16</div>
                                                            </li>
                                                        </ol>
                                                    </li>
                                                    <li class="dd-item" data-id="15">
                                                        <div class="">task-2</div>
                                                        <ol class="dd-list">
                                                            <li class="dd-item" data-id="16">
                                                                <div class="">Item 16</div>
                                                            </li>
                                                        </ol>
                                                    </li>
                                                </ol>
                                            </li>
                                        </ol>
                                    </li>
                                    <li class="dd-item" data-id="2">
                                        <div class="bg-warning">Project 2</div>
                                        <ol class="dd-list">
                                            <!-- <li class="dd-item" data-id="3">
                                                <div class="">Item 3</div>
                                            </li> -->
                                            <li class="dd-item" data-id="5">
                                                <div class="">u-task</div>
                                                <ol class="dd-list">
                                                    <li class="dd-item" data-id="15">
                                                        <div class="">task-1</div>
                                                        <ol class="dd-list">
                                                            <li class="dd-item" data-id="16">
                                                                <div class="">Item 16</div>
                                                            </li>
                                                        </ol>
                                                    </li>
                                                    <li class="dd-item" data-id="15">
                                                        <div class="">task-2</div>
                                                        <ol class="dd-list">
                                                            <li class="dd-item" data-id="16">
                                                                <div class="">Item 16</div>
                                                            </li>
                                                        </ol>
                                                    </li>
                                                </ol>
                                            </li>
                                        </ol>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-md-6 bg-warning">
                    <div class="card-content">
                        <div class="nestable">
                            <div class="dd" id="nestable2">
                                <ol class="dd-list">
                                    <li class="dd-item" data-id="13">
                                        <div class="dd-handle">Item 13</div>
                                    </li>
                                    <li class="dd-item" data-id="14">
                                        <div class="dd-handle">Item 14</div>
                                    </li>
                                    <li class="dd-item" data-id="15">
                                        <div class="dd-handle">Item 15</div>
                                        <ol class="dd-list">
                                            <li class="dd-item" data-id="16">
                                                <div class="dd-handle">Item 16</div>
                                            </li>
                                            <li class="dd-item" data-id="17">
                                                <div class="dd-handle">Item 17</div>
                                            </li>
                                            <li class="dd-item" data-id="18">
                                                <div class="dd-handle">Item 18</div>
                                            </li>
                                            <li class="dd-item" data-id="18">
                                                <div class="dd-handle">Item 19</div>
                                            </li>
                                            <li class="dd-item" data-id="18">
                                                <div class="dd-handle">Item 20</div>
                                            </li>
                                            <li class="dd-item" data-id="18">
                                                <div class="dd-handle">Item 21</div>
                                            </li>
                                        </ol>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div> -->

                <div>
                    <?php
                    $s = "SELECT * FROM project";
                    $r = mysqli_query($con, $s);
                    $rec = mysqli_num_rows($r);
                    if ($rec > 0) {
                        while ($d = mysqli_fetch_assoc($r)) {
                            $proj_id = $d['project_id'];
                            echo '<br>For project --> '.$proj_id."</br>";
                    ?>
                            <div>
                                <?php
                                require 'partials/_connection.php';
                                $c_id = $_SESSION['userId'];
                                $query = "
                    SELECT * from `task` LEFT OUTER JOIN `assigned_task` ON `task`.`task_id`=`assigned_task`.`task_id_fk` 
                    WHERE `task`.`project_id_fk`=$proj_id AND `assigned_task`.`assigned_task_id` IS NULL
                    ";
                                $result = mysqli_query($con, $query);
                                $row = mysqli_num_rows($result);
                                if ($row > 0) {
                                    echo '<br>Tasks:</br>';
                                    while ($data = mysqli_fetch_assoc($result)) {
                                ?>
                                        <tr>
                                            <th><?php echo $data['task_id'] ?></th>
                                            <th><?php echo $data['task_name'] ?></th>
                                            <th><?php echo $data['task_nature'] ?></th>
                                            <th><?php echo $data['created_at'] ?></th>
                                        </tr>
                                        <br>
                                <?php
                                    }
                                }
                                else{
                                    echo 'No task Available';
                                }
                                ?>
                            </div>
                            <br>
                            <hr><br>
                            <div>
                <?php
                $c_id = $_SESSION['userId'];
                $query = "
                    SELECT * from work_items LEFT OUTER JOIN assigned_work_items ON work_items.wk_id=assigned_work_items.assigned_work_items_id WHERE work_items.project_id_fk=$proj_id AND assigned_work_items.assigned_work_items_id IS NULL
                    ";
                $result = mysqli_query($con, $query);
                $row = mysqli_num_rows($result);
                if ($row > 0) {
                    echo '<br>Work Items:</br>';
                    while ($data = mysqli_fetch_assoc($result)) {
                ?>
                        <tr>
                            <th><?php echo $data['wk_id'] ?></th>
                            <th><?php echo $data['title'] ?></th>
                            <th><?php echo $data['type'] ?></th>
                            <th><?php echo $data['path'] ?></th>
                            <th><?php echo $data['created_at'] ?></th>
                        </tr>
                        <br>
                <?php
                    }
                }else{
                    echo 'No Work Item Available';
                }
                ?>
            </div>
                    <?php
                        }
                    }
                    ?>

                </div>
            </div>



        </section>

    </main><!-- End #main -->
    <?php require 'partials/_footer.php' ?>
    <!-- <script src="assets/vendor/global/global.min.js"></script> -->

    <script src="assets/vendor/nestable2/js/jquery.nestable.min.js"></script>
    <script src="assets/js/plugins-init/nestable-init.js"></script>

    <script src="assets/js/custom.js"></script>


</body>

</html>