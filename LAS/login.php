<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from chrev.dexignzone.com/codeigniter/demo/page_login by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 25 Oct 2022 09:49:08 GMT -->
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
	<title>Chrev - Crypto Admin Dashboard </title>
	<!-- Favicon icon -->
	<link rel="icon" type="image/png" sizes="16x16" href="public/assets/images/favicon.png">
	<link href="public/assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
	<link href="public/assets/css/style.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />


</head>
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
<button type="button" class="btn btn-primary" data-bs-toggle="modal" id="modal-toggle" data-bs-target="#modal-alert" style="visibility: hidden;"></button>

<body class="vh-100">
	<div class="authincation h-100">
		<div class="container h-100">
			<div class="row justify-content-center h-100 align-items-center">
				<div class="col-md-6">
					<div class="authincation-content">
						<div class="row no-gutters">
							<div class="col-xl-12">
								<div class="auth-form">
									<h4 class="text-center mb-4">Sign in your account</h4>
									<div class="mb-3">
										<label class="text-label form-label" for="username">Username</label>
										<div class="input-group">
											<span class="input-group-text"> <i class="fa fa-user"></i> </span>
											<input type="text" class="form-control" id="username" placeholder="Enter a username.." required>
											<div class="invalid-feedback">
												Please Enter a username.
											</div>
										</div>
									</div>
									<div class="mb-3">
										<label class="text-label form-label" for="dz-password">Password *</label>
										<div class="input-group transparent-append">
											<span class="input-group-text"> <i class="fa fa-lock"></i> </span>
											<input type="password" class="form-control" id="user-password"  placeholder="Choose a safe one.." required>
											<span class="input-group-text show-pass">
												<i class="bi bi-eye-slash" id="togglePassword" style="cursor: pointer;color: black;"></i>
												<!-- <i class="fa fa-eye"></i> -->
											</span>
											<div class="invalid-feedback">
												Please Enter a username.
											</div>
										</div>
									</div>
									<div class="form-row d-flex justify-content-between mt-4 mb-2">
										<div class="form-group">
											<div class="custom-control custom-checkbox ms-1">
												<input type="checkbox" class="form-check-input" id="btn-remember">
												<label class="form-check-label" for="btn-remember">Remember my
													preference</label>
											</div>
										</div>
										<div class="form-group">
											<a href="forgot_password.php">Forgot Password?</a>
										</div>
									</div>
									<div class="text-center" id="special-btn" style="margin: 10px;padding: 10px;cursor: pointer;">
										<button type="submit" class="btn btn-primary btn-block" id="btn-login">Log
											Me In</button>
									</div>
									<!-- <div class="new-account mt-3">
										<p>Don't have an account? <a class="text-primary" href="page_register.html">Sign
												up</a></p>
									</div> -->
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

	<script src="public/assets/vendor/jquery-validation/jquery.validate.min.js"></script>
	<script src="public/assets/js/plugins-init/jquery.validate-init.js"></script>

	<script src="public/assets/js/deznav-init.js"></script>
	<script src="public/assets/js/custom.js"></script>
	<script src="public/assets/js/demo.js"></script>
	<script src="public/assets/js/styleSwitcher.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

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
				var username = $('#username').val();
				var user_password = $('#user-password').val();
				if (document.getElementById("btn-remember").checked == true) {
					var remember = 1;
				} else {
					var remember = 0;
				}
				console.log(username)
				console.log(user_password)
				console.log(remember)
				$.ajax({
					url: '_login.php',
					type: "POST",
					data: {
						'username': username,
						'user_password': user_password,
						'btn_login': 1,
						'btn_remember': remember,
					},
					dataType: 'JSON',
					success: function(data) {
						if (data.status == 1) {
							$('#modal-alert-body').css("background-color", "#a5fda5");
							$('#modal-alert-heading').html("Successful");
							$('#modal-alert-msg').html(data.msg);
							$('#username').val('');
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
		var input1 = document.getElementById("username");
		var input2 = document.getElementById("user-password");
		input1.addEventListener("keypress", function(event) {
			if (event.key === "Enter") {
				event.preventDefault();
				document.getElementById("btn-login").click();
			}
		});
		input1.addEventListener("keypress", function(event) {
			if (event.key === "Enter") {
				event.preventDefault();
				document.getElementById("btn-login").click();
			}
		});
	</script>

	<!-- <script>
		$('document').ready(function () {
			console.log("hi");
			$('#special-btn').hover(function () {
				var username = document.getElementById("username").value;
				var password = document.getElementById("password").value;
				var position = document.getElementById("btn-submit").style.float;
				// console.log(position);
				if (username=='' && password=='') {
					if (position=="left") {
						document.getElementById("btn-submit").style.float = "right";
					}
					else{
						document.getElementById("btn-submit").style.float = "left";
					}
				}
				else{
					document.getElementById("btn-submit").style.float = "auto";
				}
			});
		});
	</script> -->




<script>
	function ConData() {
            console.log("loading...!!!");
            $.ajax({
                type: "POST",
                url: '/Home/ConData',
                success: function (response) {
                    console.log(response);
                    var dropdown = $("<select></select>").attr("id", "con-val").addClass("form-control");
                    dropdown.append($("<option></option>").attr("value", "0").prop("disabled", true).prop("selected", true).text("-- Select Country --"));
                    $.each(response, function (index, option) {
                        dropdown.append($("<option></option>").attr("value", option.value).text(option.text));
                    });
                    dropdown.append(`<script>
                $('#con-val').change(function () {
                        var selectedCountry = $(this).val(); // Get the selected country value
                        $.ajax({
                            type: "POST",
                            url: '/Home/ProData',
                            data: {
                                countryId: selectedCountry // Send the selected country ID to the server
                            },
                            success: function (response) {
                                console.log(response);
                                var dropdown = $("<select></select>").attr("id", "pro-val").addClass("form-control");
                                dropdown.append($("<option></option>").attr("value", "0").prop("disabled", true).prop("selected", true).text("-- Select Province --"));
                                $.each(response, function (index, option) {
                                    dropdown.append($("<option></option>").attr("value", option.value).text(option.text));
                                });
                                $("#pro-show").empty().append(dropdown);
                            },
                            error: function () {
                                alert("Failed to fetch province data");
                            }
                        });
                    });
    </script>`);
                    $("#con-show").empty().append(dropdown);
                },
                error: function () {
                    alert("Failed to fetch data");
                }
            });
        }
		$("#pro-show").after(`
		$('#con-val').change(function () {
                var selectedCountry = $(this).val();
                $.ajax({
                    type: "POST",
                    url: '/Home/ProData',
                    data: {
                        countryId: selectedCountry
                    },
                    success: function (response) {
                        console.log(response);
                        var dropdown = $("<select></select>").attr("id", "pro-val").addClass("form-control");
                        dropdown.append($("<option></option>").attr("value", "0").prop("disabled", true).prop("selected", true).text("-- Select Province --"));
                        $.each(response, function (index, option) {
                            dropdown.append($("<option></option>").attr("value", option.value).text(option.text));
                        });
                        $("#pro-show").empty().append(dropdown);
                    },
                    error: function () {
                        alert("Failed to fetch province data");
                    }
                });
            });
		`)
</script>






</body>


</html>