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
    .file_submit{
      margin-top: 30px;
    }
</style>

<body>



    <?php require 'partials/_header.php' ?>
    <?php require 'partials/_sidebar.php' ?>

    <main id="main" class="main">

<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Submission</li>
        </ol>

<section class="section dashboard mt-5">
  <h1></h1>
  <form action="upload.php" method="post" enctype="multipart/form-data" class="mt-5 file_submit" >
                            <div class="col-12">
                                <label for="project_name" class="form-label">File</label>
                               <br>
                  <input type="file" name="files[]" multiple>
                             


                            </div>


                            
                     
                                    <?php
                                    require 'partials/_connection.php';
                                    $c_id = $_GET['task_id'];
?>
                                    
<input type="hidden" name="task_id_fk" value="<?php echo $t?>">
                            



    <?php
                                    require 'partials/_connection.php';
                                    $c_id = $_SESSION['userId'];
?>
<input type="hidden" name="student_id_fk" id=""  value="<?php echo $c_id?>">

                                
                            











                                                    <div class="text-center">
                                <button type="submit" id="btn" class="btn btn-primary">Submit</button>
                            </div>
</form> 
</section>

  </main>

   
<!--    
    <form action="upload.php" method="post" enctype="multipart/form-data" class="mt-5 file_submit" >
                            <div class="col-12">
                                <label for="project_name" class="form-label">File</label>
                               
                  <input type="file" name="files[]" multiple>
                             


                            </div>
                                                    <div class="text-center">
                                <button type="submit" id="add-project" class="btn btn-primary">Submit</button>
                            </div>
</form> -->
                 

    <?php require 'partials/_footer.php' ?>
  
   
</body>

</html>