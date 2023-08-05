<?php






require 'partials/_connection.php';


if(isset($_POST['btn'])){



    $task=$_POST['task_name'];
    $desc=$_POST['task_desc'];
    $fk=$_POST['class_id'];
    // Set the upload folder path
    $upload_dir = 'uploads/';

    // Check if files were uploaded
    if(isset($_FILES['files'])) {
        // Loop through each uploaded file
        foreach ($_FILES['files']['name'] as $i => $name) {
            // Get the file extension
            $ext = pathinfo($name, PATHINFO_EXTENSION);

            // Set the allowed file types
            $allowed_types = array('jpg', 'jpeg', 'png','html','css', 'js',
             'php', 'txt', 'pdf', 'doc', 'docx','xlsx','pptx','rar','json','asp','aspx','c');
          
            // Check if the file type is allowed
            if (!in_array($ext, $allowed_types)) {
                echo '<script>alert(" Only JPG, JPEG, PNG,html,css, js,
                php, txt, pdf, doc are allowed"); window.location.href="student_post.php.php";</script>';
                exit;
            }

            // Set the maximum file size
            $max_size = 5000000; // 5MB

            // Check if the file size is within the limit
            if ($_FILES['files']['size'][$i] > $max_size) {
                echo '<script>alert(" Error: File size exceeds the limit of 5MB."); window.location.href="student_post.php.php";</script>';

                exit;
            }

            // Generate a unique filename
            $filename = uniqid() . '.' . $ext;

            // Upload the file
            if (move_uploaded_file($_FILES['files']['tmp_name'][$i], $upload_dir . $filename)) {
              

                // Construct the SQL query
                $sql = "INSERT INTO `task`( `task_name`, `task_description`, `class_id_fk`, `created_at`)  VALUES ('$task', '$desc', '$fk',NOW())";
$res=mysqli_query($con, $sql);

                $last_id = mysqli_insert_id($con);
                $sql2="INSERT INTO `task_files`( `task_id_fk`, `file_path`) VALUES ('$last_id','$filename')";
                // Execute the query
                if ($res) {
                    echo '<script>alert("Task Added Succesfully "); window.location.href="student_post.phpinser.php";</script>';

                } else {
                    echo '<script>alert("Error : file not submit "); window.location.href="student_post.phpinser.php";</script>';
                }
            } else {
                echo '<script>alert("Error uploading file: "); window.location.href="student_post.phpinser.php";</script>';
            }
        }
    }
    else{
        $sql = "INSERT INTO `task`( `task_name`, `task_description`, `class_id_fk`, `created_at`)  VALUES ('$task', '$desc', '$fk',NOW())";
        $res=mysqli_query($con, $sql);
        if ($res) {
            echo '<script>alert("Task Added Succesfully "); window.location.href="student_post.phpinser.php";</script>';

        } else {
            echo '<script>alert("Error : file not submit "); window.location.href="student_post.phpinser.php";</script>';
        }
    }
}
?> 

