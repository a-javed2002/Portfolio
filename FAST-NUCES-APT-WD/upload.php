<?php

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
      echo 'Error: Only JPG, JPEG, PNG, and GIF files are allowed.';
      echo '<script>alert("Check Your Email For Password!"); window.location.href="given_password.php";</script>';
      exit;
    }

    // Set the maximum file size
    $max_size = 5000000; // 5MB

    // Check if the file size is within the limit
    if ($_FILES['files']['size'][$i] > $max_size) {
      echo 'Error: File size exceeds the limit of 5MB.';
      exit;
    }

    // Generate a unique filename
    $filename = uniqid() . '.' . $ext;

    // Upload the file
    if (move_uploaded_file($_FILES['files']['tmp_name'][$i], $upload_dir . $filename)) {
      echo 'File uploaded successfully: ' . $name . '<br>';
    } else {
      echo 'Error uploading file: ' . $name . '<br>';
    }
  }
}




?>