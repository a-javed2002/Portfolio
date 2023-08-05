<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from chrev.dexignzone.com/codeigniter/demo/lightgallery by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 25 Oct 2022 09:49:38 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="robots" content="" />
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="Chrev - Crypto Codeigniter Admin Dashboard" />
    <meta property="og:title" content="Chrev - Crypto Codeigniter Admin Dashboard" />
    <meta property="og:description" content="Chrev - Crypto Codeigniter Admin Dashboard" />
    <meta property="og:image" content="../social-image.html" />
    <meta name="format-detection" content="telephone=no">
    <title>Chrev - Crypto Codeigniter Admin Dashboard </title>
    <!-- Favicon icon -->

    <link rel="icon" type="image/png" sizes="16x16" href="public/assets/images/favicon.png">


    <link href="public/assets/vendor/lightgallery/css/lightgallery.min.css" rel="stylesheet" type="text/css" />

    <link href="public/assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet" type="text/css" />

    <link href="public/assets/css/style.css" rel="stylesheet" type="text/css" />

</head>

<body>

    <?php require 'partials/_header.php' ?>
    <?php require 'partials/_sidebar.php' ?>
    <!--**********************************
	Content body start
***********************************-->
    <div class="content-body">
        <div class="container-fluid">

            <div class="page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Advanced</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Light Gallery</a></li>
                </ol>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Gallery</h4>
                        </div>
                        <div class="card-body pb-1">
                            <div id="lightgallery" class="row">
                                <?php
                                require 'partials/_connection.php';
                                $id = $_GET['id'];
                                if (strtolower($_GET['name']) == "test") {
                                    $query = "SELECT * FROM `image` WHERE test_id_FK='$id' ORDER BY image_id DESC";
                                } else if (strtolower($_GET['name']) == "user") {
                                    $query = "SELECT * FROM `image` WHERE user_id_FK='$id' ORDER BY image_id DESC";
                                } else if (strtolower($_GET['name']) == "product") {
                                    $query = "SELECT * FROM `image` WHERE product_id_FK='$id' ORDER BY image_id DESC";
                                } else if (strtolower($_GET['name']) == "component") {
                                    $query = "SELECT * FROM `image` WHERE component_id_FK='$id' ORDER BY image_id DESC";
                                }
                                $result = mysqli_query($con, $query);
                                $row = mysqli_num_rows($result);
                                if ($row > 0) {
                                    while ($data = mysqli_fetch_assoc(($result))) {
                                        $img = $data['image'];
                                ?>
                                        <a href="<?php echo $img; ?>" data-exthumbimage="<?php echo $img; ?>" data-src="<?php echo $img; ?>" class="col-lg-3 col-md-6 mb-4">
                                            <img src="<?php echo $img; ?>" alt="" style="width:100%;" />
                                        </a>
                                <?php }
                                } else{?>
                                <h4>No Images Available For This <b>"<?php echo ucwords($_GET['name'])?>"</b></h4>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                    <!-- /# card -->
                </div>
            </div>
        </div>
    </div>
    <!--**********************************
	Content body end
***********************************-->
    <script src="public/assets/vendor/lightgallery/js/lightgallery-all.min.js"></script>
    <?php require 'partials/_footer.php'; ?>
</body>


</html>