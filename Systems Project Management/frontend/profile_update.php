
<?php
require 'partials/_connection.php';
if(isset($_POST['btn'])){
   
    $id=$_POST['id'];
    $a=$_POST['name'];
    $b=$_POST['email'];
    
    $image_name=$_FILES['image']['name'];
    $image_tname=$_FILES['image']['tmp_name'];
    $image_type=$_FILES['image']['type'];
    $image_size=$_FILES['image']['size'];


if(is_uploaded_file($_FILES['image']['tmp_name'])){
if( $image_type=="image/png" || $image_type=="image/jpg" || $image_type=="image/jpeg"){

if($image_size<=10000000){
    $folder="assets/uploads/";
    $path=$folder.$image_name;
    move_uploaded_file($image_tname,$path);


    $qq="UPDATE `users` SET `username`='$a',`user_email`='$b',`user_image`='$path' WHERE user_id=' $id'";
$ress=mysqli_query($con,$qq);

          

if($ress){
    echo"<script>alert('updated');window.location.href='users-profile.php'</script>";
}
else{
    echo mysqli_error($con);
}

}

else{
    echo"<script>alert('image size');window.location.href='users-profile.php'</script>";
}

}

else{
    echo"<script>alert('image format');window.location.href='users-profile.php'</script>";
}


    }

    else {
        $qq="UPDATE `users` SET `username`='$a',`user_email`='$b' WHERE user_id=' $id'";
        $ress=mysqli_query($con,$qq);
              if($ress){
                  echo "<script>alert('updated');window.location.href='users-profile.php'</script>";
              }
              else{
                  echo mysqli_error($con);
              }
    }
}
?>