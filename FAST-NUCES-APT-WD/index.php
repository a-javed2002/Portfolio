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



  <?php require 'partials/_header.php' ?>
  <?php require 'partials/_sidebar.php' ?>
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

        <!-- Left side columns -->
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <!-- <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul> -->
                </div>

                <div class="card-body">
                  <h5 class="card-title">Classes <span>|
                      <?php
                      $c_id = $_SESSION['userId'];
                      if ($_SESSION['userRoleId'] == 2) {
                        $sql = "SELECT * from Class WHERE teacher_id_fk=$c_id";
                      } else {
                        $sql = "SELECT * from class_students WHERE student_id_fk=$c_id";
                      }
                      $res = mysqli_query($con, $sql);
                      $row = mysqli_num_rows($res);
                      ?>
                    </span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $row; ?></h6>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->
            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <!-- <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul> -->
                </div>

                <div class="card-body">
                  <h5 class="card-title">TASKS <span>|
                      
                    </span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    </div>
                    <div class="ps-3">
                      <h6>
                      <?php
                      $c_id = $_SESSION['userId'];
                      if ($_SESSION['userRoleId'] == 2) {
                        $sql = "SELECT * from task";
                      } else {
                        $sql = "SELECT * from student_files WHERE student_id_fk=$c_id";
                      }
                      $res = mysqli_query($con, $sql);
                      $row = mysqli_num_rows($res);
                      ?><?php echo $row; ?></h6>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->
            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <!-- <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul> -->
                </div>

                <div class="card-body">
                  <h5 class="card-title">JOINED <span>|
                      <?php
                      $c_id = $_SESSION['userId'];
                        $sql = "SELECT * from users WHERE user_id=$c_id";
                      $res = mysqli_query($con, $sql);
                      $data = mysqli_fetch_assoc($res);
                      ?>
                    </span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $data['created_at']; ?></h6>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->




          </div>
        </div><!-- End Left side columns -->


      </div>
    </section>

  </main><!-- End #main -->
  <?php require 'partials/_footer.php' ?>

  <?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['upgrade_role'])) {
      $id = $_POST['manager_id'];
      $new = $_POST['upgrade'];
      $sql = "UPDATE users set role_id_fk=$new WHERE user_id=$id";
      $res = mysqli_query($con, $sql);
      if ($res) {
        echo '<script>location.reload();</script>';
      } else {
        echo '<script>alert("fails")</script>';
      }
    }
  }
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['upgrade_role_new'])) {
      $id = $_POST['manager_id_new'];
      $new = $_POST['upgrade_new'];
      $sql = "UPDATE users set role_id_fk=$new WHERE user_id=$id";
      $res = mysqli_query($con, $sql);
      if ($res) {
        echo '<script>location.reload();</script>';
      } else {
        echo '<script>alert("fails")</script>';
      }
    }
  }
  ?>


</body>

</html>