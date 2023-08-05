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

    <link href="public/assets/css/image.css" rel="stylesheet" type="text/css" />

</head>

<body>
    <?php require 'partials/_header.php' ?>
    <?php require 'partials/_sidebar.php' ?>

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
                                <div class="basic-form">
                                    <div class="mb-3 row" id="update">
                                        <!-- <label class="col-sm-3 col-form-label">Role</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="role-name" placeholder="Enter Here">
                                            </div> -->
                                    </div>
                                    <div class="mb-3 row">
                                        <div class="col-sm-10">
                                            <button type="submit" id="btn-component-update" class="btn btn-primary">update</button>
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
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" id="modal-toggle" data-bs-target="#modal-alert"></button>
    <!-- The Alert Modal End -->

    <!--**********************************
	Content body start
***********************************-->
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Insert Component</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Component</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="component-name" placeholder="Enter Here">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Component Detail</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="basic-form">
                                            <form>
                                                <div class="mb-3">
                                                    <textarea class="form-control" rows="4" id="component-detail" placeholder="Enter Here"></textarea>
                                                </div>
                                            </form>
                                        </div>
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
                                    <button type="submit" id="btn-component-insert" class="btn btn-primary">Insert</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Components In Lab <a href="component_details.php">(SEE ALL)</a></h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>ID</th>
                                        <th>Component Name</th>
                                        <th>Component Detail</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="records">
                                    <?php
                                    require 'partials/_connection.php';
                                    $sql2 = "SELECT * FROM `component` ORDER BY component_id DESC";
                                    $res2 = mysqli_query($con, $sql2);
                                    while ($data = mysqli_fetch_assoc(($res2))) {
                                        $component_id = $data['component_id'];
                                        $query = "SELECT * FROM `image` WHERE component_id_FK='$component_id' ORDER BY image_id DESC";
                                        $result = mysqli_query($con, $query);
                                        $temp = mysqli_fetch_assoc($result);
                                        $row = mysqli_num_rows($result);
                                        if ($row > 0) {
                                            $img = $temp['image'];
                                        } else {
                                            $img = 'public\assets\images\no-image-available.jpg';
                                        }
                                    ?>
                                        <tr>
                                            <td></td>
                                            <td><?php echo $data['component_id'] ?></td>
                                            <td><a href="image_preview.php?id=<?php echo $data['component_id'] ?>&name=component" style="border-radius: 50%;"><img src="<?php echo $img ?>" alt="<?php echo $data['component_name'] ?>" width="50px" height="50px" style="border-radius: 50%;"></a><a href="component_details.php?id=<?php echo $data['component_id'] ?>"><?php echo $data['component_name'] ?></a></td>
                                            <td><?php echo mb_strimwidth($data['component_detail'], 0, 30, "...") ?></td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="#" onclick="updateFn(<?php echo $data['component_id'] ?>)" data-bs-toggle="modal" data-bs-target="#myModal" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                                    <a href="#" onclick="deleteShow(<?php echo $data['component_id'] ?>)" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
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
            $('#btn-component-insert').click(function() {
                var component_name = $('#component-name').val();
                var component_detail = $('#component-detail').val();
                if (component_name != '') {
                    var testing_reg = /^[a-zA-Z\s]{3,}$/;
                    if (testing_reg.test(component_name) == true) {
                        if (component_detail != '') {
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
                            console.log("present is " + present);
                            $.ajax({
                                url: '_component.php',
                                type: "POST",
                                data: {
                                    'component_name': component_name,
                                    'component_detail': component_detail,
                                    'btn_component_insert': 1,
                                },
                                dataType: 'JSON',
                                success: function(data) {
                                    // alert(data.status);
                                    if (data.status == 1) {
                                        $('#modal-alert-body').css("background-color", "#a5fda5");
                                        $('#modal-alert-heading').html("Successful");
                                        $('#modal-alert-msg').html(data.msg);
                                        $('#component-name').val('');
                                        $('#component-detail').val('');
                                    } else if (data.status == 0) {
                                        $('#modal-alert-body').css("background-color", "#fda5a5");
                                        $('#modal-alert-heading').html("Failed");
                                        $('#modal-alert-msg').html(data.msg);
                                    }
                                    loadData();
                                },
                                error: function() {
                                    $('#modal-alert-heading').html("Failed");
                                    $('#modal-alert-msg').html("Error In Php");
                                    $('#modal-alert-body').css("background-color", "#fda5a5");
                                }
                            });
                            <?php
                                $x = 1;
                                    $sql = "SELECT * FROM `component` ORDER BY component_id DESC";
                                    $res = mysqli_query($con, $sql);
                                    $data = mysqli_fetch_assoc(($res));
                                    $id = $data['component_id'] + 1;
                                ?>
                            if (present == 1) {
                                $.ajax({
                                    <?php
                                    if ((isset($_SESSION['image_id'])) == false) {
                                        $_SESSION['image_id'] = $id;
                                    }
                                    ?>
                                    url: '_image.php?id=<?php echo $id ?>&name=component&current_user=<?php echo $_SESSION['userId'] ?>',
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
                            
                        } else {
                            $('#modal-alert-heading').html("Failed");
                            $('#modal-alert-msg').html("Enter Component Detail");
                            $('#modal-alert-body').css("background-color", "#fda5a5");
                        }
                    } else {
                        $('#modal-alert-heading').html("Failed");
                        $('#modal-alert-msg').html("Only Alphabets Are Allowed And More The Three Characters");
                        $('#modal-alert-body').css("background-color", "#fda5a5");
                    }
                } else {
                    $('#modal-alert-heading').html("Failed");
                    $('#modal-alert-msg').html("Fill The Field 'ADD COMPONENT'!!");
                    $('#modal-alert-body').css("background-color", "#fda5a5");
                }
                document.getElementById("modal-toggle").click();
            });
        })
    </script>
    <script>
        $('document').ready(function() {
            $('#btn-component-update').click(function() {
                var component_name = $('#component-name-update').val();
                var component_detail = $('#component-detail-update').val();
                var component_id = $('#component-id').val();
                console.log(component_id);
                console.log(component_name);

                if (component_name != '') {
                    var testing_reg = /^[a-zA-Z\s]{3,}$/;
                    if (testing_reg.test(component_name) == true) {
                        $.ajax({
                            url: '_component.php',
                            type: "POST",
                            data: {
                                'component_name': component_name,
                                'component_detail': component_detail,
                                'component_id': component_id,
                                'btn_component_update': 1,
                            },
                            dataType: 'JSON',
                            success: function(data) {
                                // alert(data.status);
                                if (data.status == 1) {
                                    $('#component-name-update').val('');
                                    $('#component-id').val('');
                                    $('#modal-container').click(function() {
                                        $(this).addClass('out');
                                        $('body').removeClass('modal-active');
                                        $('#component-name-update').val('');
                                        $('#component-detail-update').val('');
                                    });
                                    $('#modal-alert-body').css("background-color", "#a5fda5");
                                    $('#modal-alert-heading').html("Successful");
                                    $('#modal-alert-msg').html(data.msg);
                                } else if (data.status == 0) {
                                    $('#modal-alert-body').css("background-color", "#fda5a5");
                                    $('#modal-alert-heading').html("Failed");
                                    $('#modal-alert-msg').html(data.msg);
                                }
                                loadData();
                            },
                            error: function() {
                                $('#modal-alert-heading').html("Failed");
                                $('#modal-alert-msg').html("Error In Php");
                                $('#modal-alert-body').css("background-color", "#fda5a5");
                            }
                        });

                    } else {
                        $('#modal-alert-heading').html("Failed");
                        $('#modal-alert-msg').html("Only Alphabets Are Allowed And More The Three Characters");
                        $('#modal-alert-body').css("background-color", "#fda5a5");
                    }
                } else {
                    $('#modal-alert-heading').html("Failed");
                    $('#modal-alert-msg').html("Fill The Field 'ADD COMPONENT'!!");
                    $('#modal-alert-body').css("background-color", "#fda5a5");
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
            $('#component-name-update').val('');
        });
    </script>
    <script>
        function updateFn(id) {
            $(document).ready(function() {
                $.ajax({
                    url: '_component.php',
                    type: "POST",
                    data: {
                        'id': id,
                        'btn_component_update_show': 1
                    },
                    success: function(data) {
                        $('#update').html(data);
                        $('#form-modal-heading').html("Updating Record");
                        document.getElementById("btn-component-update").style.display = "block";
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

        function deleteShow(id) {
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
                    url: '_component.php',
                    type: "POST",
                    data: {
                        'id': id,
                        'btn_component_delete': 1
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
        var input1 = document.getElementById("component-name");
        var input2 = document.getElementById("component-name-update");
        input1.addEventListener("keypress", function(event) {
            if (event.key === "Enter") {
                event.preventDefault();
                document.getElementById("btn-component-insert").click();
            }
        });
        input2.addEventListener("keypress", function(event) {
            if (event.key === "Enter") {
                event.preventDefault();
                document.getElementById("btn-component-update").click();
            }
        });
    </script>
    <script>
        function loadData() {
            $(document).ready(function() {
                $.ajax({
                    url: '_component.php',
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
                    }
                });
                document.getElementById("modal-toggle").click();
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

        /* DELETE IMAGE */
        function delImage(index) {
            total--;
            console.log(input.files)
            console.log((input.files).length)
            files.splice(index, 1);
            img_arr.push(index);
            showImages();
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