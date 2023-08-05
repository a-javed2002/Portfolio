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
                    <h4 class="modal-title" id="form-modal-heading">Update Role</h4>
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
                                            <button type="submit" id="btn-performed-update" class="btn btn-primary">update</button>
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
                        <h4 class="card-title">Insert Performed Product</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">

                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Component</label>
                                <div class="col-sm-9">
                                    <div class="input-group mb-3">
                                        <select class="wide" id="component-id">
                                            <option selected disabled>Choose Component</option>
                                            <?php
                                            require 'partials/_connection.php';
                                            $que = "SELECT DISTINCT component_id_FK,component_id,component_name FROM `component` join product on `product`.component_id_FK=`component`.component_id ORDER BY component_name ASC";
                                            $res = mysqli_query($con, $que);
                                            while ($data = mysqli_fetch_assoc($res)) {
                                            ?>
                                                <option value="<?php echo $data['component_id'] ?>"><?php echo strtoupper($data['component_name']) ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3 row" id="products-show">
                            </div>

                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Test</label>
                                <div class="col-sm-9">
                                    <div class="input-group mb-3">
                                        <select class="wide" id="test-id">
                                            <option selected disabled>Choose Test</option>
                                            <?php
                                            require 'partials/_connection.php';
                                            $que = "SELECT * FROM `test`  ORDER BY test_name ASC";
                                            $res = mysqli_query($con, $que);
                                            while ($data = mysqli_fetch_assoc($res)) {
                                            ?>
                                                <option value="<?php echo $data['test_id'] ?>"><?php echo strtoupper($data['test_name']) ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Remarks</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="basic-form">
                                            <form>
                                                <div class="mb-3">
                                                    <textarea class="form-control" rows="4" id="remarks"></textarea>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-sm-10">
                                    <button type="submit" id="btn-performed-insert" class="btn btn-primary">Insert</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Performed Products In Lab</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>ID</th>
                                        <th>Product Name</th>
                                        <th>Test Code</th>
                                        <th>Test</th>
                                        <th>User</th>
                                        <th>Remarks</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody id="records">
                                    <?php
                                    require 'partials/_connection.php';
                                    $sql2 = "SELECT * FROM `performed` join `product` on `performed`.`product_id_FK`=`product`.`product_id` join `user` on `performed`.user_id_FK=`user`.user_id join `test` on `performed`.test_id_FK=`test`.test_id ORDER BY performed_id DESC";
                                    $res2 = mysqli_query($con, $sql2);
                                    while ($data = mysqli_fetch_assoc(($res2))) { ?>
                                        <tr>
                                            <td></td>
                                            <td><?php echo $data['performed_id'] ?></td>
                                            <td><a href="product_details.php?id=<?php echo $data['product_id'] ?>"><?php echo ucwords($data['product_name']) ?></a></td>
                                            <td><?php echo $data['test_code'] ?></td>
                                            <td><a href="test.php?id=<?php echo $data['test_id'] ?>"><?php echo ucwords($data['test_name']) ?></a></td>
                                            <?php
		if (strtolower($_SESSION['userRole'])=='admin') {
			?>
            <td><a href="user.php?id=<?php echo $data['user_id'] ?>"><?php echo ucwords($data['username']) ?></a></td>
            <?php
		}else{
            ?><td><?php echo ucwords($data['username']) ?></td>
            <?php
        }
		?>
                                            <td><?php echo mb_strimwidth($data['remarks'], 0, 15, "...") ?></td>
                                            <td class="py-2 text-end">
                                                <div class="dropdown"><button class="btn btn-primary tp-btn-light sharp" type="button" data-bs-toggle="dropdown"><span class="fs--1"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                                    <circle fill="#000000" cx="5" cy="12" r="2"></circle>
                                                                    <circle fill="#000000" cx="12" cy="12" r="2"></circle>
                                                                    <circle fill="#000000" cx="19" cy="12" r="2"></circle>
                                                                </g>
                                                            </svg></span></button>
                                                    <div class="dropdown-menu dropdown-menu-end border py-0">
                                                        <div class="py-2">
                                                            <a class="dropdown-item" style="cursor: pointer;" onclick="moreDetail(<?php echo $data['product_id'] ?>)" data-bs-toggle="modal" data-bs-target="#myModal">Info<i class="fa fa-info-circle" style="float: right;"></i></a>
                                                            <a class="dropdown-item" style="cursor: pointer;" onclick="updateFn(<?php echo $data['product_id'] ?>)" data-bs-toggle="modal" data-bs-target="#myModal">Edit<i class="fas fa-pencil-alt" style="float: right;"></i></a>
                                                            <a class="dropdown-item text-danger" style="cursor: pointer;" onclick="deleteShow(<?php echo $data['product_id'] ?>)">Delete<i class="fa fa-trash" style="float: right;"></i></a>
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
        jQuery('#component-id').on('change', function() {

            jQuery.ajax({
                url: "_performed.php",
                method: 'post',
                data: {
                    id: $(this).val(),
                    'btn_product_show': 1
                },
                success: function(data) {
                    $('#products-show').html(data);
                },
                error: function() {
                    $('#modal-alert-heading').html("Failed");
                    $('#modal-alert-msg').html("Error In Php");
                    $('#modal-alert-body').css("background-color", "#fda5a5");
                    document.getElementById("modal-toggle").click();
                }
            });

        });
    </script>
    <script>
        $('document').ready(function() {
            $('#btn-performed-insert').click(function() {
                var product_id = $('#product-id-value').val();
                var test_id = $('#test-id').val();
                var user_id = "<?php echo $_SESSION['userId']; ?>";
                var remarks = $('#remarks').val();
                console.log(product_id);
                console.log(test_id);
                console.log(user_id);
                console.log(remarks);
                $.ajax({
                    url: '_performed.php',
                    type: "POST",
                    data: {
                        'product_id': product_id,
                        'test_id': test_id,
                        'user_id': user_id,
                        'remarks': remarks,
                        'btn_performed_insert': 1,
                    },
                    dataType: 'JSON',
                    success: function(data) {
                        if (data.status == 1) {
                            $('#modal-alert-body').css("background-color", "#a5fda5");
                            $('#modal-alert-heading').html("Successful");
                            $('#modal-alert-msg').html(data.msg);
                            $('#product-id').val();
                            $('#test-id').val();
                            $('#remarks').val('');
                        } else if (data.status == 0) {
                            $('#modal-alert-body').css("background-color", "#fda5a5");
                            $('#modal-alert-heading').html("Failed");
                            $('#modal-alert-msg').html(data.msg);
                        }
                        loadData();
                    },
                    error: function(data) {
                        $('#modal-alert-heading').html("Failed");
                        $('#modal-alert-msg').html("Error in php");
                        $('#modal-alert-body').css("background-color", "#fda5a5");
                    }
                });
                document.getElementById("modal-toggle").click();
            });
        })
    </script>
    <script>
        $('document').ready(function() {
            $('#btn-performed-update').click(function() {
                var role_name = $('#role-name-update').val();
                var role_id = $('#role-id').val();
                $.ajax({
                    url: '_performed.php',
                    type: "POST",
                    data: {
                        'role_name': role_name,
                        'role_id': role_id,
                        'btn_role_update': 1,
                    },
                    dataType: 'JSON',
                    success: function(data) {
                        // alert(data.status);
                        if (data.status == 1) {
                            $('#role-name-update').val('');
                            $('#role-id').val('');
                            $('#modal-container').click(function() {
                                $(this).addClass('out');
                                $('body').removeClass('modal-active');
                                $('#role-name-update').val('');
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
            $('#role-name-update').val('');
        });
    </script>
    <script>
        function updateFn(id) {
            $(document).ready(function() {
                $.ajax({
                    url: '_performed.php',
                    type: "POST",
                    data: {
                        'id': id,
                        'btn_performed_update_show': 1
                    },
                    success: function(data) {
                        $('#update').html(data);
                        $('#form-modal-heading').html("Updating Record");
                        document.getElementById("btn-performed-update").style.display = "block";
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
                    url: '_performed.php',
                    type: "POST",
                    data: {
                        'id': id,
                        'btn_role_delete': 1
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
        const togglePassword = document.querySelector("#togglePassword");
        const password = document.querySelector("#user-password");

        togglePassword.addEventListener("click", function() {
            // toggle the type attribute
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);

            // toggle the icon
            this.classList.toggle("bi-eye");
        });

        // prevent form submit
        const form = document.querySelector("form");
        form.addEventListener('submit', function(e) {
            e.preventDefault();
        });
    </script>
    <script>
        var input1 = document.getElementById("remarks");
        input1.addEventListener("keypress", function(event) {
            if (event.key === "Enter") {
                event.preventDefault();
                document.getElementById("btn-performed-insert").click();
            }
        });
    </script>
    <script>
        function loadData() {
            $(document).ready(function() {
                $.ajax({
                    url: '_performed.php',
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
    <?php require 'partials/_footer.php'; ?>
</body>

</html>