
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
    <title>Chrev - Crypto Admin Dashboard </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="public/assets/images/favicon.png">
    <link href="public/assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="public/assets/css/style.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />


</head>

<body class="vh-100">

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
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" id="modal-toggle" style="visibility: hidden;" data-bs-target="#modal-alert"></button>

    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <span style="float: right;" class="text-center"><button type="button" class="btn-sm btn-danger btn-block" id="btn-remove">Remove Account</button></span>
                                <div class="auth-form">
                                    <h4 class="text-center mb-4">Account Locked <?php if (isset($_COOKIE["username"])) {
                                                                                    echo $_COOKIE["username"];
                                                                                } ?></h4>
                                    <div class="mb-3">
                                        <label class="text-label form-label" for="dz-password">Password *</label>
                                        <div class="input-group transparent-append">
                                            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                                            <input type="password" class="form-control" id="user-password" placeholder="Choose a safe one.." required>
                                            <span class="input-group-text show-pass">
                                                <i class="bi bi-eye-slash" id="togglePassword" style="cursor: pointer;color: black;"></i>
                                                <!-- <i class="fa fa-eye"></i> -->
                                            </span>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary btn-block" id="btn-login">Unlock</button>
                                    </div>
                                    <span style="float: right;"><sub><a href="login.php">Not You?</a></sub></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--**********************************
	Scripts
***********************************-->
    <!-- Required vendors -->
    <script src="public/assets/vendor/global/global.min.js"></script>
    <script src="public/assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="public/assets/js/deznav-init.js"></script>
    <script src="public/assets/js/custom.js"></script>
    <script src="public/assets/js/demo.js"></script>
    <script src="public/assets/js/styleSwitcher.js"></script>
    <script>
        $('document').ready(function() {
            $('#btn-remove').click(function() {
                console.log("here");
                $.ajax({
                    url: '_login.php',
                    type: "POST",
                    data: {
                        'btn_remove': 1,
                    },
                    dataType: 'JSON',
                    success: function(data) {
                        if (data.status == 1) {
                            $('#modal-alert-body').css("background-color", "#a5fda5");
                            $('#modal-alert-heading').html("Successful");
                            $('#modal-alert-msg').html(data.msg);
                            setTimeout(function() {
                                location.replace("index.php");
                            }, 1000);
                        } else if (data.status == 0) {
                            $('#modal-alert-body').css("background-color", "#fda5a5");
                            $('#modal-alert-heading').html("Failed");
                            $('#modal-alert-msg').html(data.msg);
                        }
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
        $('document').ready(function() {
            $('#btn-login').click(function() {
                var username = "<?php echo $_COOKIE["username"]; ?>";
                var user_password = $('#user-password').val();
                console.log(username)
                console.log(user_password)
                $.ajax({
                    url: '_login.php',
                    type: "POST",
                    data: {
                        'username': username,
                        'user_password': user_password,
                        'btn_login': 1,
                        'btn_remember': 1,
                    },
                    dataType: 'JSON',
                    success: function(data) {
                        if (data.status == 1) {
                            $('#modal-alert-body').css("background-color", "#a5fda5");
                            $('#modal-alert-heading').html("Successful");
                            $('#modal-alert-msg').html(data.msg);
                            $('#user-password').val('');
                            setTimeout(function() {
                                location.replace("index.php");
                            }, 1000);
                        } else if (data.status == 0) {
                            $('#modal-alert-body').css("background-color", "#fda5a5");
                            $('#modal-alert-heading').html("Failed");
                            $('#modal-alert-msg').html(data.msg);
                        }
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
        var input1 = document.getElementById("user-password");
        input1.addEventListener("keypress", function(event) {
            if (event.key === "Enter") {
                event.preventDefault();
                document.getElementById("btn-login").click();
            }
        });
    </script>

</body>


</html>