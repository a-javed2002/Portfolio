<!DOCTYPE html>
<html lang="en">

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


    <link href="public/assets/vendor/star-rating/star-rating-svg.css" rel="stylesheet" type="text/css" />

    <link href="public/assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet" type="text/css" />

    <link href="public/assets/css/style.css" rel="stylesheet" type="text/css" />

</head>

<body>

    <?php require 'partials/_header.php'; ?>
    <?php require 'partials/_sidebar.php'; ?>
    <!-- The Form Modal Start -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title" id="form-modal-heading">Update Component</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="basic-form" id="update">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
    <!-- The Form Modal End -->

    <!--**********************************
	Content body start
***********************************-->
    <div class="content-body">
        <div class="container-fluid">
            <div class="page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Component Details</a></li>
                </ol>
            </div>



            <div class="form-head d-flex mb-4 mb-md-5 align-items-start">
                <div class="input-group search-area d-inline-flex">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fas fa-search"></i></span>
                    </div>
                    <input type="text" class="form-control" placeholder="Search here" id="search-bar-component">
                    <sup><i style="font-size: 15px;padding: 25px 10px 10px 15px;" class="fa fa-question-circle" aria-hidden="true" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="bottom" data-bs-content="Starts With a '/a',Ends With a '/a',For Random Just Type" title="Hot To Use"></i></sup>
                </div>
                <a href="product.php" class="btn btn-primary ms-auto">+ Add New Product</a>
            </div>



            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Product list</h4>
                        </div>
                        <div class="card-body">
                            <div class="bootstrap-media mt-3">
                                <ul class="list-unstyled" id="product-lists">

                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--**********************************
	Content body end
	***********************************-->
    <script src="public/assets/vendor/star-rating/jquery.star-rating-svg.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        $('.button').click(function() {
            var buttonId = $(this).attr('id');
            $('#modal-container').removeAttr('class').addClass(buttonId);
            $('body').addClass('modal-active');
        })

        $('#modal-container').click(function() {
            $(this).addClass('out');
            $('body').removeClass('modal-active');
            $('#component-name-update').val('');
        });
    </script>
    <script>
        $(document).ready(function() {
            load_data_all3();

            function load_data_all3(name) {
                console.log("loading...!!!")
                $.ajax({
                    url: '_product.php',
                    type: "POST",
                    data: {
                        'name': name,
                        'product_list': 1,
                    },
                    success: function(data) {
                        $('#product-lists').html(data);
                    },
                    error: function() {
                        alert("fail")
                    }
                });
            }

            $('#search-bar-component').keyup(function() {
                var text = $(this).val();
                if (text != '') {
                    load_data_all3(text);
                } else {
                    load_data_all3();
                }
            });
        });

        function exportFile(id) {
            console.log("id is " + id)
            $('document').ready(function() {
                $.ajax({
                    url: '_export.php',
                    type: "POST",
                    data: {
                        'id': id,
                        'product_list': 1,
                    },
                    dataType: 'JSON',
                    success: function(data) {
                        alert("success")
                        $('#modal-alert-body').css("background-color", "#a5fda5");
                        $('#modal-alert-heading').html("Successful");
                        $('#modal-alert-msg').html(data);
                    },
                    error: function() {
                        alert("fail");
                    }
                });
            })
        }
    </script>
    <?php require 'partials/_footer.php'; ?>

</body>

</html>