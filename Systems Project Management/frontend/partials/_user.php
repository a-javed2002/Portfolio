<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    array('status' => null, 'msg' => null);
    include '_connection.php';
    $username = $_POST['user_name'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $user_gender = $_POST['user_gender'];

    // Validate form data
    if (empty($username) || empty($user_email) || empty($user_password)) {
        http_response_code(400); // Bad request
        echo json_encode(array('status' => 0, 'msg' => 'Please fill out all required fields.'));
        exit;
    }

    // Check if the email address is already in use
    $sql = "SELECT * FROM `users` WHERE user_email = '$user_email'";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        http_response_code(409); // Conflict
        echo json_encode(array('status' => 0, 'msg' => 'Email address is already in use.'));
        exit;
    }

    $user_image_name = $_FILES['user_image']['name'];
    $user_image_tmp_name = $_FILES['user_image']['tmp_name'];
    // Generate a unique filename for the uploaded image
    $user_image_filename = uniqid() . '-' . $user_image_name;

    // Move uploaded image file to the images folder
    $target_dir = '../assets/uploads/';
    $target_file = $target_dir . $user_image_filename;
    if (!move_uploaded_file($user_image_tmp_name, $target_file)) {
        http_response_code(500); // Internal server error
        echo json_encode(array('status' => 0, 'msg' => 'Failed to upload image file.'));
        exit;
    }
    $user_image_filename = "assets/uploads/" . $user_image_filename;

    // Hash the password
    $user_password_hash = password_hash($user_password, PASSWORD_DEFAULT);

    // Insert user information into the database
    $sql = "INSERT INTO `users` (`username`, `user_email`, `user_password`,`user_gender`, `user_image`, `role_id_fk`,`created_at`) VALUES ('$username', '$user_email', '$user_password_hash','$user_gender', '$user_image_filename', '3',NOW())";
    if (!mysqli_query($con, $sql)) {
        http_response_code(500); // Internal server error
        echo json_encode(array('status' => 0, 'msg' => 'Failed to insert user information into the database.'));
        exit;
    }

    // Close database connection
    mysqli_close($con);

    // Return success message
    $data = array();
    $data['status'] = "success";
    $data['msg'] = 'Registration successful!';
    echo json_encode($data);
    // echo json_encode(array('status' => "success", 'msg' => 'Registration successful!'));
    exit();
}
