<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

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
    <title></title>
    <!-- Favicon icon -->

    <link rel="icon" type="image/png" sizes="16x16" href="public/assets/images/favicon.png">


    <link href="public/assets/vendor/chartist/css/chartist.min.css" rel="stylesheet" type="text/css" />

    <link href="public/assets/vendor/owl-carousel/owl.carousel.css" rel="stylesheet" type="text/css" />

    <link href="public/assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet" type="text/css" />

    <link href="public/assets/css/style.css" rel="stylesheet" type="text/css" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />

    <link href="public/assets/css/image.css" rel="stylesheet" type="text/css" />

    <link href="public/assets/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />

</head>

<body>
    <?php require 'partials/_header.php'; ?>
    <?php require 'partials/_sidebar.php';
    if ($_GET) {
        // $x = $_GET('id');
        // echo "<script>alert('yes')</script>";
        echo `<script>document.getElementById("product-1").scrollIntoView();</script>`;
    }
    ?>


    <!-- The Form Modal Start -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title" id="form-modal-heading">Update Product</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="basic-form">
                                    <div class="mb-3 row" id="update">
                                        <!-- <label class="col-sm-3 col-form-label">Product</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="product-name" placeholder="Enter Here">
                                            </div> -->
                                    </div>
                                    <div class="mb-3 row">
                                        <div class="col-sm-10">
                                            <button type="submit" id="btn-product-update" class="btn btn-primary">update</button>
                                        </div>
                                    </div>
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

    <!-- The Alert Modal Start -->
    <div class="modal fade" id="modal-alert">
        <div class="modal-dialog">
            <div class="modal-content" id="modal-alert-body">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title" id="modal-alert-heading"></h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body text-center" id="modal-alert-msg">
                    <!-- Message here by php -->
                </div>

            </div>
        </div>
    </div>
    <!-- The Alert Modal End -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" id="modal-toggle" data-bs-target="#modal-alert"></button>

    <!--**********************************
	Content body start
***********************************-->
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Insert Product</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Component</label>
                                <div class="col-sm-9">
                                    <div class="input-group mb-3">
                                        <select class="wide" id="product-component">
                                            <option selected disabled>Choose Component</option>
                                            <?php
                                            require 'partials/_connection.php';
                                            $que = "SELECT * FROM `component`  ORDER BY component_name ASC";
                                            $res = mysqli_query($con, $que);
                                            while ($data = mysqli_fetch_assoc($res)) {
                                            ?>
                                                <option value="<?php echo $data['component_id'] ?>"><?php echo strtoupper($data['component_name']) ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Product Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="product-name" placeholder="Enter Here">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Product Code</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="product-code" placeholder="Enter Here">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Status</label>
                                <div class="col-sm-9">
                                    <div class="input-group mb-3">
                                        <select class="wide" id="product-status">
                                            <option selected disabled>Choose Status</option>
                                            <?php
                                            require 'partials/_connection.php';
                                            $que = "SELECT * FROM `status`  ORDER BY status_name ASC";
                                            $res = mysqli_query($con, $que);
                                            while ($data = mysqli_fetch_assoc($res)) {
                                            ?>
                                                <option value="<?php echo $data['status_id'] ?>"><?php echo strtoupper($data['status_name']) ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="file-upload">
                                <button class="btn btn-danger" type="button" style="float: right;display: none;" id="r_all" onclick="remove_all()">Remove All</button>
                                <button class="file-upload-btn" type="button" id="add-image" onclick="$('.file-upload-input').trigger( 'click' )">Add
                                    Image</button>

                                <div class="image-upload-wrap">
                                    <input class="file-upload-input" type='file' id="upload_file" accept="image/png,image/jpg,image/jpeg" multiple />
                                    <div class="drag-text">
                                        <h3>Drag and drop a file or select add Image</h3>
                                    </div>
                                </div>
                                <div class="file-upload-content" id="image_preview" style="display: flex;justify-content: space-around;flex-wrap: wrap;">
                                    <!-- <img class="file-upload-image" src="#" alt="your image" />
            <div class="image-title-wrap">
                <button type="button" onclick="removeUpload()" class="remove-image">Remove <span
                        class="image-title">Uploaded Image</span></button>
            </div> -->
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-sm-10">
                                    <button type="submit" id="btn-product-insert" class="btn btn-primary">Insert</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Products In Lab <a href="product_list.php">(SEE ALL)</a></h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Product Name</th>
                                        <th>Product Code</th>
                                        <th>Component</th>
                                        <th>Status</th>
                                        <th>Action</th>

                                        <!-- <th style="display: none;"></th>
                                        <th style="display: none;"></th>
                                        <th style="display: none;"></th> -->
                                    </tr>
                                </thead>
                                <tbody id="records">
                                    <?php
                                    require 'partials/_connection.php';
                                    $sql2 = "SELECT * FROM `product` join `component` on `product`.`component_id_FK`=`component`.`component_id` join `status` on `product`.status_id_FK=`status`.status_id join `user` on `product`.user_id_FK=`user`.user_id WHERE product_status='1' ORDER BY product_id DESC";
                                    $res2 = mysqli_query($con, $sql2);
                                    while ($data = mysqli_fetch_assoc(($res2))) { ?>
                                        <tr>
                                            <?php
                                            $id = $data['product_id'];
                                            $query = "SELECT * FROM `product` join image on `product`.`product_id`=`image`.`product_id_FK` where product_id_FK=$id and image_status=1";
                                            $result = mysqli_query($con, $query);;
                                            $record = mysqli_num_rows($result);
                                            $data2 = mysqli_fetch_assoc($result);
                                            if ($record != 0) {
                                                $img = $data2['image'];
                                            } else {
                                                $img = "public/assets/images/component.png";
                                            }
                                            ?>
                                            <!-- <td style="display: none;"><?php #echo $data['user_id'] 
                                                                            ?></td>
                                            <td style="display: none;"><?php #echo $data['user_name'] 
                                                                        ?></td>
                                            <td style="display: none;"><?php #echo $data['username'] 
                                                                        ?></td> -->
                                            <td><?php echo $data['product_id'] ?></td>
><a href="image_preview.php?id=<?php echo $data['product_id'] ?>&name=product" style="border-radius: 50%;"><img src="<?php echo $img ?>" alt="<?php echo $data['product_name'] ?>" width="50px" height="50px" style="border-radius: 50%;"></a> <a href="product_details.php?id=<?php echo $data['product_id'] ?>"> <?php echo mb_strimwidth(ucwords($data['product_name']), 0, 15, "...") ?></a>                                            <td id="product-<?php echo $data['product_id'] ?>"</td>
                                            <td><?php echo ucwords($data['product_code']) ?></td>
                                            <td><?php echo ucwords($data['component_name']) ?></td>
                                            <td class="py-2 text-right">
                                                <span class="badge" style="background-color: <?php echo $data['color'] ?>;"><?php echo ucwords($data['status_name']) ?><span class="ms-1 <?php echo $data['fontawesome_icon'] ?>"></span></span>
                                            </td>
                                            <td class="py-2 text-right">
                                                <div class="dropdown text-sans-serif"><button class="btn btn-primary tp-btn-light sharp" type="button" id="order-dropdown-5" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                                    <circle fill="#000000" cx="5" cy="12" r="2"></circle>
                                                                    <circle fill="#000000" cx="12" cy="12" r="2"></circle>
                                                                    <circle fill="#000000" cx="19" cy="12" r="2"></circle>
                                                                </g>
                                                            </svg></span></button>
                                                    <div class="dropdown-menu dropdown-menu-end border py-0" aria-labelledby="order-dropdown-5">
                                                        <div class="py-2">
                                                            <?php
                                                            require 'partials/_connection.php';
                                                            $que = "SELECT * FROM `status`  ORDER BY status_name ASC";
                                                            $res = mysqli_query($con, $que);
                                                            while ($data2 = mysqli_fetch_assoc($res)) {
                                                            ?>
                                                                <a class="dropdown-item" href="#!" onclick="updateFn(<?php echo $data['product_id'] . ',' . $data2['status_id'] ?>)"><?php echo strtoupper($data2['status_name']) ?></a>
                                                            <?php } ?>
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item text-info" href="#!" onclick="moreDetail(<?php echo $data['product_id'] ?>)" data-bs-toggle="modal" data-bs-target="#myModal">Info<i class="fa fa-info-circle" style="float: right;"></i></a>
                                                            <a class="dropdown-item text-danger" href="#!" onclick="deleteShow(<?php echo $data['product_id'] ?>)">Delete<i class="fa fa-trash" style="float: right;"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!--**********************************
	Content body end
***********************************-->

    <script src="public/assets/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="public/assets/js/plugins-init/datatables.init.js"></script>
    <script>
        $('document').ready(function() {
            $('#btn-product-insert').click(function() {
                var e = document.getElementById("product-component");
                var ctemp = e.options[e.selectedIndex].text;
                console.log(ctemp);
                var e = document.getElementById("product-status");
                var stemp = e.options[e.selectedIndex].text;
                console.log(stemp);
                var product_component = $('#product-component').val();
                var product_name = $('#product-name').val();
                var product_code = $('#product-code').val();
                var product_status = $('#product-status').val();
                console.log(product_component)
                console.log(product_name)
                console.log(product_code)
                console.log(product_status)
                if (total > 0) {
                    var present = 1;
                    var form_data = new FormData();
                    // Read selected files
                    for (var i = 0; i < total; i++) {
                        form_data.append("files[]", document.getElementById('upload_file').files[i]);
                    }
                    console.log(form_data);
                } else {
                    var present = 0;
                }
                $.ajax({
                    url: '_product.php',
                    type: "POST",
                    data: {
                        'product_component': product_component,
                        'product_name': product_name,
                        'product_code': product_code,
                        'product_status': product_status,
                        'user': <?php  echo $_SESSION['userId'] ?>,
                        'btn_product_insert': 1,
                    },
                    dataType: 'JSON',
                    success: function(data) {
                        if (data.status == 1) {
                            $('#modal-alert-body').css("background-color", "#a5fda5");
                            $('#modal-alert-heading').html("Successful");
                            $('#modal-alert-msg').html(data.msg);
                            $('#product-name').val('');
                            $('#product-code').val('');
                            loadData();
                        } else if (data.status == 0) {
                            $('#modal-alert-body').css("background-color", "#fda5a5");
                            $('#modal-alert-heading').html("Failed");
                            $('#modal-alert-msg').html(data.msg);
                        }
                    },
                    error: function(data) {
                        $('#modal-alert-heading').html("Failed");
                        $('#modal-alert-msg').html("Error in php");
                        $('#modal-alert-body').css("background-color", "#fda5a5");
                    }
                });
                if (present == 1) {
                    $.ajax({
                        <?php
                        if ((isset($_SESSION['image_id'])) == false) {
                            $_SESSION['image_id'] = $id;
                        }
                        ?>
                        url: '_image.php?id=<?php echo $_SESSION['image_id'] ?>&name=product&current_user=<?php echo $_SESSION['userId'] ?>',
                        type: "POST",
                        data: form_data,
                        dataType: 'JSON',
                        contentType: false,
                        processData: false,
                        success: function(data) {
                            files = [];
                            document.getElementById("image_preview").innerHTML = "";
                            total = 0;
                            $('.file-upload-content').hide();
                            $('.image-upload-wrap').show();
                            $('#add-image').show();
                            $('#r_all').hide();
                        },
                        error: function() {
                            $('#modal-alert-heading').html("Failed");
                            $('#modal-alert-msg').html("Error In Php Image");
                            $('#modal-alert-body').css("background-color", "#fda5a5");
                        }
                    });
                }
                
                document.getElementById("modal-toggle").click();
            });
        })
    </script>
    <script>
        $('.button').click(function() {
            var buttonId = $(this).attr('id');
            $('#modal-container').removeAttr('class').addClass(buttonId);
            $('body').addClass('modal-active');
        })

        $('#modal-container').click(function() {
            $(this).addClass('out');
            $('body').removeClass('modal-active');
            $('#product-name-update').val('');
        });
    </script>
    <script>
        function moreDetail(id) {
            document.getElementById("btn-product-update").style.display = "none";
            console.log("id is " + id);
            $(document).ready(function() {
                $.ajax({
                    url: '_product.php',
                    type: "POST",
                    data: {
                        'id': id,
                        'btn_user_info': 1
                    },
                    success: function(data) {
                        $('#update').html(data);
                        $('#form-modal-heading').html("Employee Information");
                    },
                    error: function() {
                        // alert("Failed");
                        $('#modal-alert-heading').html("Failed");
                        $('#modal-alert-msg').html("Error In Php");
                        $('#modal-alert-body').css("background-color", "#fda5a5");
                        document.getElementById("modal-toggle").click();
                    }
                });
            });
        }

        function updateFn(p_id, s_id) {
            $(document).ready(function() {
                console.log("product id is " + p_id);
                console.log("status id is " + s_id);
                $.ajax({
                    url: '_product.php',
                    type: "POST",
                    data: {
                        'product_id': p_id,
                        'status_id': s_id,
                        'btn_product_update': 1
                    },
                    success: function(data) {
                        if (data.status == 1) {
                            // $('#modal-alert-body').css("background-color", "#a5fda5");
                            // $('#modal-alert-heading').html("Successful");
                            // $('#modal-alert-msg').html(data.msg);
                            document.getElementById("modal-alert-heading").innerHTML = `abcdefg`;
                            document.getElementById("modal-alert-msg").innerHTML = `lorem`;
                        } else if (data.status == 0) {
                            $('#modal-alert-body').css("background-color", "#fda5a5");
                            $('#modal-alert-heading').html("Failed");
                            $('#modal-alert-msg').html(data.msg);
                        }
                        // alert(data.status);
                        loadData();
                    },
                    error: function() {
                        // alert("Failed");
                        $('#modal-alert-heading').html("Failed");
                        $('#modal-alert-msg').html("Error In Php");
                        $('#modal-alert-body').css("background-color", "#fda5a5");
                    }
                });
                // document.getElementById("modal-toggle").click();
            });
        }

        function deleteShow(id) {
            console.log("deleting id is " + id);
            $('#modal-alert-body').css("background-color", "#a5fda5");
            $('#modal-alert-heading').html("ARE YOU SURE!!!");
            $('#modal-alert-msg').html(`<h4>do you want to delete ${id}</h4>
                <div class="mb-3 row">
                    <div class="col-sm-10">
                    <button onclick="deleteFn(${id})" class="btn btn-primary">Yes</button>
                    </div>
                </div>`);
            document.getElementById("modal-toggle").click();
        }

        function deleteFn(id) {
            $(document).ready(function() {
                $.ajax({
                    url: '_product.php',
                    type: "POST",
                    data: {
                        'id': id,
                        'btn_product_delete': 1
                    },
                    success: function(data) {
                        if (data.status == 1) {
                            $('#modal-alert-body').css("background-color", "#a5fda5");
                            $('#modal-alert-heading').html("Successful");
                            $('#modal-alert-msg').html(data.msg);
                        } else if (data.status == 0) {
                            $('#modal-alert-body').css("background-color", "#fda5a5");
                            $('#modal-alert-heading').html("Failed");
                            $('#modal-alert-msg').html(data.msg);
                        }
                        alert("deleted");
                        loadData();
                    },
                    error: function() {
                        $('#modal-alert-heading').html("Failed");
                        $('#modal-alert-msg').html("Error In Php");
                        $('#modal-alert-body').css("background-color", "#fda5a5");
                    }
                });
                document.getElementById("modal-toggle").click();
            });
        }
    </script>
    <script>
        var input1 = document.getElementById("product-name");
        var input2 = document.getElementById("product-code");
        var input3 = document.getElementById("product-name-update");
        input1.addEventListener("keypress", function(event) {
            if (event.key === "Enter") {
                event.preventDefault();
                document.getElementById("btn-product-insert").click();
            }
        });
        input2.addEventListener("keypress", function(event) {
            if (event.key === "Enter") {
                event.preventDefault();
                document.getElementById("btn-product-insert").click();
            }
        });
        input3.addEventListener("keypress", function(event) {
            if (event.key === "Enter") {
                event.preventDefault();
                document.getElementById("btn-product-insert").click();
            }
        });
    </script>
    <script>
        function loadData() {
            console.log("loading....")
            $.ajax({
                url: '_product.php',
                type: "POST",
                data: {
                    'btn_show': 1
                },
                success: function(data) {
                    $('#records').html(data);
                },
                error: function() {
                    $('#modal-alert-heading').html("Failed");
                    $('#modal-alert-msg').html("Error In Php");
                    $('#modal-alert-body').css("background-color", "#fda5a5");
                    document.getElementById("modal-toggle").click();
                }
            });
        }
    </script>
    <script>
        /** Variables */
        let files = [],
            dragArea = document.querySelector(".image-upload-wrap"),
            input = document.querySelector(".image-upload-wrap input"),
            select = document.querySelector(".image-upload-wrap .drag-text"),
            container = document.querySelector(".file-upload-content");
        var total = 0;
        var img_arr = [];

        /** CLICK LISTENER */
        select.addEventListener("click", () => input.click());

        /* INPUT CHANGE EVENT */
        input.addEventListener("change", () => {
            let file = input.files;
            console.log(file)
            console.log(file.length)
            total = file.length;
            // if user select no image
            if (file.length == 0) {
                return;
            }

            for (let i = 0; i < file.length; i++) {
                if (file[i].type.split("/")[0] != "image") continue;
                if (!files.some((e) => e.name == file[i].name)) files.push(file[i]);
            }

            showImages();
        });

        /** SHOW IMAGES */

        function showImages() {
            container.innerHTML = files.reduce((prev, current, index) => {
                return `${prev}
				<div><img src="${URL.createObjectURL(current)}" width="200px" height="200px">
                        <div class="image-title-wrap">
                            <button type="button" class="btn" style="background-color:#6418c3;color:white;"> <span
                                class="image-title">${current.name}</span></button>
                        </div></div>`;
            }, "");
            if (total == 0) {
                $('.file-upload-content').hide();
                $('.image-upload-wrap').show();
                $('#add-image').show();
                $('#r_all').hide();
                return;
            } else {
                $('.file-upload-content').show();
                $('.image-upload-wrap').hide();
                $('#add-image').hide();
                $('#r_all').show();
            }
        }

        function remove_all() {
            $('.file-upload-content').hide();
            $('.image-upload-wrap').show();
            $('#add-image').show();
            $('#r_all').hide();
            files = [];
            document.getElementById("image_preview").innerHTML = "";
            total = 0;
        }

        /* DELETE IMAGE */
        function delImage(index) {
            total--;
            console.log(input.files)
            console.log((input.files).length)
            files.splice(index, 1);
            img_arr.push(index);
            showImages();
        }

        /* DRAG & DROP */
        dragArea.addEventListener("dragover", (e) => {
            e.preventDefault();
            dragArea.classList.add("dragover");
        });

        /* DRAG LEAVE */
        dragArea.addEventListener("dragleave", (e) => {
            e.preventDefault();
            dragArea.classList.remove("dragover");
        });

        /* DROP EVENT */
        dragArea.addEventListener("drop", (e) => {
            e.preventDefault();
            dragArea.classList.remove("dragover");

            let file = e.dataTransfer.files;
            for (let i = 0; i < file.length; i++) {
                /** Check selected file is image */
                if (file[i].type.split("/")[0] != "image") continue;

                if (!files.some((e) => e.name == file[i].name)) files.push(file[i]);
            }
            showImages();
        });
    </script>
    <?php require 'partials/_footer.php'; ?>
</body>

</html>