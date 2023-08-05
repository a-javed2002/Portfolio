<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from chrev.dexignzone.com/codeigniter/demo/app_profile by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 25 Oct 2022 09:49:05 GMT -->
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

	<link href="public/assets/vendor/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css" />

	<link href="public/assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet" type="text/css" />

	<link href="public/assets/css/style.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

</head>

<body onload="moreDetail()">

	<?php require 'partials/_header.php' ?>
	<?php require 'partials/_sidebar.php' ?>
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
		<div class="container-fluid">
			<div class="row page-titles mx-0">
				<div class="col-sm-6 p-md-0">
					<div class="welcome-text">
						<h4>Hi, welcome back!</h4>
						<p class="mb-0">Your business dashboard template</p>
					</div>
				</div>
				<div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">App</a></li>
						<li class="breadcrumb-item active"><a href="javascript:void(0)">Profile</a></li>
					</ol>
				</div>
			</div>
			<!-- row -->
			<?php
			require 'partials/_connection.php';
			$user_id = $_SESSION['userId'];
			$sql = "SELECT * FROM `user` join `role` on `user`.role_id_FK=`role`.role_id join `flag` on `user`.flag_id_FK=`flag`.flag_id WHERE user_id='$user_id'";
			$res = mysqli_query($con, $sql);
			$data = mysqli_fetch_assoc($res);
			?>
			<div class="row">
				<div class="col-lg-12">
					<div class="profile card card-body px-3 pt-3 pb-0">
						<div class="profile-head">
							<div class="photo-content">
								<div class="cover-photo rounded"></div>
							</div>
							<div class="profile-info">
								<div class="profile-photo">
									<?php
									$query = "SELECT * FROM `user` join image on `user`.`user_id`=`image`.`user_id_FK` where user_id=$user_id and user_profile=$user_id and image_status=1 ORDER BY image_id DESC";
									$result = mysqli_query($con, $query);
									$row = mysqli_num_rows($result);
									$data2 = mysqli_fetch_assoc($result);
									if ($row > 0) {
										if ($data2['image'] != NULL) {
											$img = $data2['image'];
										} else {
											if (strtolower($data2['gender']) == "male") {
												$img = '<img src="public/assets/images/profile/small/profile1.png';
											} else if (strtolower($data2['gender']) == "female") {
												$img = '<img src="public/assets/images/profile/small/profile2.png';
											}
										}
									} else {
										$query = "SELECT * FROM `user` where user_id=$user_id";
										$result = mysqli_query($con, $query);
										$row = mysqli_num_rows($result);
										$data2 = mysqli_fetch_assoc($result);
										if (strtolower($data2['gender']) == "male") {
											$img = 'public/assets/images/profile/small/profile1.png';
										} else if (strtolower($data2['gender']) == "female") {
											$img = 'public/assets/images/profile/small/profile2.png';
										}
									}
									?>
									<a class="test-popup-link" href="<?php echo $img ?>"><img src="<?php echo $img ?>" class="img-fluid rounded-circle" alt="<?php echo $data2['user_name'] ?>"></a>
								</div>
								<div class="profile-details">
									<div class="profile-name px-3 pt-2">
										<h4 class="text-primary mb-0"><?php echo $data['user_name'] ?></h4>
										<p><?php echo $data['role_name'] ?></p>
									</div>
									<div class="profile-email px-2 pt-2">
										<h4 class="text-muted mb-0"><a href="mailto:<?php echo $data['user_email'] ?>"><?php echo $data['user_email'] ?></a></h4>
										<h4 class="text-muted mb-0"><a href="tel:<?php echo $data['user_contact'] ?>"><?php echo $data['user_contact'] ?></a></h4>
									</div>
									<div class="profile-email px-2 pt-2">
										<p>Status: <?php echo $data['flag_name'] ?></p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xl-4">
					<div class="row">
						<div class="col-xl-12">
							<div class="card">
								<div class="card-body">
									<div class="profile-statistics">
										<div class="text-center">
											<div class="row">
												<div class="col">
													<?php
													$q = "SELECT * FROM `product` WHERE user_id_FK='$user_id'";
													$r = mysqli_query($con, $q);
													$rec = mysqli_num_rows($r);
													?>
													<h3 class="m-b-0"><?php echo $rec ?></h3><span>Products</span>
												</div>
												<div class="col">
													<?php
													$q = "SELECT * FROM `performed` WHERE user_id_FK='$user_id'";
													$r = mysqli_query($con, $q);
													$rec = mysqli_num_rows($r);
													?>
													<h3 class="m-b-0"><?php echo $rec ?></h3><span>Performed</span>
												</div>
												<div class="col mt-3">
													<?php
													$q = "SELECT * FROM `product` WHERE user_id_FK='$user_id' AND status_id_FK='1'";
													$r = mysqli_query($con, $q);
													$rec = mysqli_num_rows($r);
													?>
													<h3 class="m-b-0"><?php echo $rec ?></h3><span>Successful</span>
												</div>
												<div class="col mt-3">
													<?php
													$q = "SELECT * FROM `product` WHERE user_id_FK='$user_id' AND status_id_FK='2'";
													$r = mysqli_query($con, $q);
													$rec = mysqli_num_rows($r);
													?>
													<h3 class="m-b-0"><?php echo $rec ?></h3><span>Failed</span>
												</div>
											</div>
											<!-- <div class="mt-4">
												<a href="javascript:void(0);" class="btn btn-primary mb-1 me-1">Follow</a>
												<a href="javascript:void(0);" class="btn btn-primary mb-1" data-bs-toggle="modal" data-bs-target="#sendMessageModal">Send Message</a>
											</div> -->
										</div>
										<!-- Modal -->
										<div class="modal fade" id="sendMessageModal">
											<div class="modal-dialog modal-dialog-centered" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title">Send Message</h5>
														<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
													</div>
													<div class="modal-body">
														<form class="comment-form">
															<div class="row">
																<div class="col-lg-6">
																	<div class="mb-3">
																		<label class="text-black font-w600 form-label">Name <span class="required">*</span></label>
																		<input type="text" class="form-control" value="Author" name="Author" placeholder="Author">
																	</div>
																</div>
																<div class="col-lg-6">
																	<div class="mb-3">
																		<label class="text-black font-w600 form-label">Email <span class="required">*</span></label>
																		<input type="text" class="form-control" value="Email" placeholder="Email" name="Email">
																	</div>
																</div>
																<div class="col-lg-12">
																	<div class="mb-3">
																		<label class="text-black font-w600 form-label">Comment</label>
																		<textarea rows="8" class="form-control" name="comment" placeholder="Comment"></textarea>
																	</div>
																</div>
																<div class="col-lg-12">
																	<div class="mb-3 mb-0">
																		<input type="submit" value="Post Comment" class="submit btn btn-primary" name="submit">
																	</div>
																</div>
															</div>
														</form>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-12">
							<div class="card">
								<div class="card-body">
									<div class="profile-blog">
										<h5 class="text-primary d-inline">Latest Performed</h5>
										<?php
										$q = "SELECT * FROM `performed` WHERE user_id_FK='$user_id' ORDER BY performed_id DESC";
										$r = mysqli_query($con, $q);
										$rec = mysqli_num_rows($r);
										$data = mysqli_fetch_assoc($r);
										if ($rec > 0) {
											$id = $data['product_id_FK'];
											$query = "SELECT * FROM `image` where product_id_FK=$id and image_status=1";
											$result = mysqli_query($con, $query);;
											$record = mysqli_num_rows($result);
											$data2 = mysqli_fetch_assoc($result);
											if ($record != 0) {
												$img = $data2['image'];
											} else {
												$img = "public/assets/images/component.png";
											}
											$sql = "SELECT * FROM `product` where product_id=$id";
											$run = mysqli_query($con, $sql);;
											$data3 = mysqli_fetch_assoc($run);
										?>
											<a href="product_details.php?id=<?php echo $id ?>">
												<img src="<?php echo $img ?>" alt="<?php echo $data3['product_name'] ?>" class="img-fluid mt-4 mb-4 w-100">
												<h4><a href="post_details.html" class="text-black"><span class="text-primary">Product Name:</span><?php echo $data3['product_name'] ?></a></h4>
												<p class="mb-0"><span class="text-primary">Test Remarks:</span><?php echo $data['remarks'] ?></p>
											</a>
										<?php
										} else {
											echo 'NoT performed Any';
										}
										?>
									</div>
								</div>
							</div>
						</div>
						<!-- <div class="col-xl-12">
							<div class="card">
								<div class="card-body">
									<div class="profile-interest">
										<h5 class="text-primary d-inline">Interest</h5>
										<div class="row mt-4 sp4" id="lightgallery">
											<a href="public/assets/images/profile/2.jpg" data-exthumbimage="https://chrev.dexignzone.com/codeigniter/demo/public/assets/images/profile/2.jpg" data-src="https://chrev.dexignzone.com/codeigniter/demo/public/assets/images/profile/2.jpg" class="mb-1 col-lg-4 col-xl-4 col-sm-4 col-6">
												<img src="public/assets/images/profile/2.jpg" alt="" class="img-fluid">
											</a>
											<a href="public/assets/images/profile/3.jpg" data-exthumbimage="https://chrev.dexignzone.com/codeigniter/demo/public/assets/images/profile/3.jpg" data-src="https://chrev.dexignzone.com/codeigniter/demo/public/assets/images/profile/3.jpg" class="mb-1 col-lg-4 col-xl-4 col-sm-4 col-6">
												<img src="public/assets/images/profile/3.jpg" alt="" class="img-fluid">
											</a>
											<a href="public/assets/images/profile/4.jpg" data-exthumbimage="https://chrev.dexignzone.com/codeigniter/demo/public/assets/images/profile/4.jpg" data-src="" class="mb-1 col-lg-4 col-xl-4 col-sm-4 col-6">
												<img src="public/assets/images/profile/4.jpg" alt="" class="img-fluid">
											</a>
											<a href="public/assets/images/profile/3.jpg" data-exthumbimage="https://chrev.dexignzone.com/codeigniter/demo/public/assets/images/profile/3.jpg" data-src="https://chrev.dexignzone.com/codeigniter/demo/public/assets/images/profile/3.jpg" class="mb-1 col-lg-4 col-xl-4 col-sm-4 col-6">
												<img src="public/assets/images/profile/3.jpg" alt="" class="img-fluid">
											</a>
											<a href="public/assets/images/profile/4.jpg" data-exthumbimage="https://chrev.dexignzone.com/codeigniter/demo/public/assets/images/profile/4.jpg" data-src="https://chrev.dexignzone.com/codeigniter/demo/public/assets/images/profile/4.jpg" class="mb-1 col-lg-4 col-xl-4 col-sm-4 col-6">
												<img src="public/assets/images/profile/4.jpg" alt="" class="img-fluid">
											</a>
											<a href="public/assets/images/profile/2.jpg" data-exthumbimage="https://chrev.dexignzone.com/codeigniter/demo/public/assets/images/profile/2.jpg" data-src="https://chrev.dexignzone.com/codeigniter/demo/public/assets/images/profile/2.jpg" class="mb-1 col-lg-4 col-xl-4 col-sm-4 col-6">
												<img src="public/assets/images/profile/2.jpg" alt="" class="img-fluid">
											</a>
										</div>
									</div>
								</div>
							</div>
						</div> -->
						<!-- <div class="col-xl-12">
							<div class="card">
								<div class="card-body">
									<div class="profile-news">
										<h5 class="text-primary d-inline">Our Latest News</h5>
										<div class="media pt-3 pb-3">
											<img src="public/assets/images/profile/5.jpg" alt="image" class="me-3 rounded" width="75">
											<div class="media-body">
												<h5 class="m-b-5"><a href="post_details.html" class="text-black">Collection of textile samples</a></h5>
												<p class="mb-0">I shared this on my fb wall a few months back, and I thought.</p>
											</div>
										</div>
										<div class="media pt-3 pb-3">
											<img src="public/assets/images/profile/6.jpg" alt="image" class="me-3 rounded" width="75">
											<div class="media-body">
												<h5 class="m-b-5"><a href="post_details.html" class="text-black">Collection of textile samples</a></h5>
												<p class="mb-0">I shared this on my fb wall a few months back, and I thought.</p>
											</div>
										</div>
										<div class="media pt-3 pb-3">
											<img src="public/assets/images/profile/7.jpg" alt="image" class="me-3 rounded" width="75">
											<div class="media-body">
												<h5 class="m-b-5"><a href="post_details.html" class="text-black">Collection of textile samples</a></h5>
												<p class="mb-0">I shared this on my fb wall a few months back, and I thought.</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div> -->
					</div>
				</div>
				<div class="col-xl-8">
					<div class="card">
						<div class="card-body">
							<div class="profile-tab">
								<div class="custom-tab-1">
									<ul class="nav nav-tabs">
										<!-- <li class="nav-item"><a href="#my-posts" data-bs-toggle="tab" class="nav-link active show">Posts</a>
										</li> -->
										<li class="nav-item"><a href="#about-me" data-bs-toggle="tab" class="nav-link active show" onclick="moreDetail()">About Me</a>
										</li>
										<li class="nav-item"><a href="#profile-settings" data-bs-toggle="tab" class="nav-link">Setting</a>
										</li>
									</ul>
									<div class="tab-content">
										<div id="my-posts" class="tab-pane fade">
											<div class="my-post-content pt-3">
												<div class="post-input">
													<textarea name="textarea" id="textarea" cols="30" rows="5" class="form-control bg-transparent" placeholder="Please type what you want...."></textarea>
													<a href="javascript:void(0);" class="btn btn-primary light me-1 px-3" data-bs-toggle="modal" data-bs-target="#linkModal"><i class="fa fa-link m-0"></i> </a>
													<!-- Modal -->
													<div class="modal fade" id="linkModal">
														<div class="modal-dialog modal-dialog-centered" role="document">
															<div class="modal-content">
																<div class="modal-header">
																	<h5 class="modal-title">Social Links</h5>
																	<button type="button" class="btn-close" data-bs-dismiss="modal">
																	</button>
																</div>
																<div class="modal-body">
																	<a class="btn-social facebook" href="javascript:void(0)"><i class="fab fa-facebook-f"></i></a>
																	<a class="btn-social google-plus" href="javascript:void(0)"><i class="fab fa-google-plus-g"></i></a>
																	<a class="btn-social linkedin" href="javascript:void(0)"><i class="fab fa-linkedin"></i></a>
																	<a class="btn-social instagram" href="javascript:void(0)"><i class="fab fa-instagram"></i></a>
																	<a class="btn-social twitter" href="javascript:void(0)"><i class="fab fa-twitter"></i></a>
																	<a class="btn-social youtube" href="javascript:void(0)"><i class="fab fa-youtube"></i></a>
																	<a class="btn-social whatsapp" href="javascript:void(0)"><i class="fab fa-whatsapp"></i></a>
																</div>
															</div>
														</div>
													</div>
													<a href="javascript:void(0);" class="btn btn-primary light me-1 px-3" data-bs-toggle="modal" data-bs-target="#cameraModal"><i class="fa fa-camera m-0"></i> </a>
													<!-- Modal -->
													<div class="modal fade" id="cameraModal">
														<div class="modal-dialog modal-dialog-centered" role="document">
															<div class="modal-content">
																<div class="modal-header">
																	<h5 class="modal-title">Upload images</h5>
																	<button type="button" class="btn-close" data-bs-dismiss="modal">
																	</button>
																</div>
																<div class="modal-body">
																	<div class="input-group mb-3">
																		<span class="input-group-text">Upload</span>
																		<div class="form-file">
																			<input type="file" class="form-file-input form-control">
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<a href="javascript:void(0);" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#postModal">Post</a>
													<!-- Modal -->
													<div class="modal fade" id="postModal">
														<div class="modal-dialog modal-dialog-centered" role="document">
															<div class="modal-content">
																<div class="modal-header">
																	<h5 class="modal-title">Post</h5>
																	<button type="button" class="btn-close" data-bs-dismiss="modal">
																	</button>
																</div>
																<div class="modal-body">
																	<textarea name="textarea" id="textarea2" cols="30" rows="5" class="form-control bg-transparent" placeholder="Please type what you want...."></textarea>
																	<a class="btn btn-primary btn-rounded" href="javascript:void(0)">Post</a>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="profile-uoloaded-post border-bottom-1 pb-5">
													<img src="public/assets/images/profile/8.jpg" alt="" class="img-fluid w-100 rounded">
													<a class="post-title" href="post_details.html">
														<h3 class="text-black">Collection of textile samples lay spread</h3>
													</a>
													<p>A wonderful serenity has take possession of my entire soul like these sweet morning of spare which enjoy whole heart.A wonderful serenity has take possession of my entire soul like these sweet morning
														of spare which enjoy whole heart.</p>
													<button class="btn btn-primary me-2"><span class="me-2"><i class="fa fa-heart"></i></span>Like</button>
													<button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#replyModal"><span class="me-2"><i class="fa fa-reply"></i></span>Reply</button>
												</div>
												<div class="profile-uoloaded-post border-bottom-1 pb-5">
													<img src="public/assets/images/profile/9.jpg" alt="" class="img-fluid w-100 rounded">
													<a class="post-title" href="post_details.html">
														<h3 class="text-black">Collection of textile samples lay spread</h3>
													</a>
													<p>A wonderful serenity has take possession of my entire soul like these sweet morning of spare which enjoy whole heart.A wonderful serenity has take possession of my entire soul like these sweet morning
														of spare which enjoy whole heart.</p>
													<button class="btn btn-primary me-2"><span class="me-2"><i class="fa fa-heart"></i></span>Like</button>
													<button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#replyModal"><span class="me-2"><i class="fa fa-reply"></i></span>Reply</button>
												</div>
												<div class="profile-uoloaded-post pb-3">
													<img src="public/assets/images/profile/8.jpg" alt="" class="img-fluid w-100 rounded">
													<a class="post-title" href="post_details.html">
														<h3 class="text-black">Collection of textile samples lay spread</h3>
													</a>
													<p>A wonderful serenity has take possession of my entire soul like these sweet morning of spare which enjoy whole heart.A wonderful serenity has take possession of my entire soul like these sweet morning
														of spare which enjoy whole heart.</p>
													<button class="btn btn-primary me-2"><span class="me-2"><i class="fa fa-heart"></i></span>Like</button>
													<button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#replyModal"><span class="me-2"><i class="fa fa-reply"></i></span>Reply</button>
												</div>
											</div>
										</div>
										<div id="about-me" class="tab-pane fade active show">

										</div>
										<div id="profile-settings" class="tab-pane fade">
											<?php
											require 'partials/_connection.php';
											$user_id = $_SESSION['userId'];
											$sql = "SELECT * FROM `user` WHERE user_id='$user_id'";
											$res = mysqli_query($con, $sql);
											$data = mysqli_fetch_assoc($res);
											?>
											<div class="pt-3">
												<div class="settings-form">
													<h4 class="text-primary mb-3 mt-3">Account Setting</h4>
													<div class="mb-3 row">
														<div class="card">
															<div class="card-header">
																<h4 class="card-title text-primary">Change Password</h4>
																<button class="btn btn-primary" id="btn-c-password">Update</button>
															</div>
															<div class="mb-3">
																<label class="text-label form-label" for="dz-password">Old Password *</label>
																<div class="input-group transparent-append">
																	<span class="input-group-text"> <i class="fa fa-lock"></i> </span>
																	<input type="password" class="form-control" id="old-password" placeholder="Choose a safe one.." required>
																	<span class="input-group-text show-pass">
																		<i class="bi bi-eye-slash" id="togglePassword1" style="cursor: pointer;color: black;"></i>
																		<!-- <i class="fa fa-eye"></i> -->
																	</span>
																	<div class="invalid-feedback">
																		Please Enter a username.
																	</div>
																</div>
															</div>
															<div class="mb-3">
																<label class="text-label form-label" for="dz-password">New Password *</label>
																<div class="input-group transparent-append">
																	<span class="input-group-text"> <i class="fa fa-lock"></i> </span>
																	<input type="password" class="form-control" id="user-password" placeholder="Choose a safe one.." required>
																	<span class="input-group-text show-pass">
																		<i class="bi bi-eye-slash" id="togglePassword2" style="cursor: pointer;color: black;"></i>
																		<!-- <i class="fa fa-eye"></i> -->
																	</span>
																	<div class="invalid-feedback">
																		Please Enter a username.
																	</div>
																</div>
															</div>
															<div class="mb-3">
																<label class="text-label form-label" for="dz-password">Confirm Password *</label>
																<div class="input-group transparent-append">
																	<span class="input-group-text"> <i class="fa fa-lock"></i> </span>
																	<input type="password" class="form-control" id="user-password-confirm" placeholder="Choose a safe one.." required>
																	<span class="input-group-text show-pass">
																		<i class="bi bi-eye-slash" id="togglePassword-confirm" style="cursor: pointer;color: black;"></i>
																		<!-- <i class="fa fa-eye"></i> -->
																	</span>
																	<div class="invalid-feedback">
																		Please Enter a username.
																	</div>
																</div>
															</div>

														</div>
													</div>
													<div class="mb-3 row">
														<div class="card">
															<div class="card-header">
																<h4 class="card-title text-primary">Employee Status <i class="fa fa-question-circle" aria-hidden="true" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="For Others,Your Mood For Chat" title="What Is User Status"></i></h4>
																<button class="btn btn-primary" id="btn-c-status">Update</button>
															</div>
															<div class="card-body">
																<div class="basic-form">
																	<div class="row mb-2">
																		<div class="col-sm-3 col-5">
																			<h5 class="f-w-500">Status<span class="pull-end">:</span>
																			</h5>
																		</div>
																		<div class="col-sm-9 col-7">
																			<input type="text" placeholder="Enter Here..." id="user-status" class="form-control" value="<?php echo $data['user_status']; ?>">
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="mb-3 row">
														<div class="card">
															<div class="card-header">
																<h4 class="card-title text-primary">Employee Bio <i class="fa fa-question-circle" aria-hidden="true" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="Your Experience,Daily Life..." title="What Is User Bio"></i></h4>
																<button class="btn btn-primary" id="btn-c-bio">Update</button>
															</div>
															<div class="card-body">
																<div class="basic-form">
																	<div class="mb-3">
																		<textarea class="form-control" rows="4" id="user-bio">
																			<?php
																			if ($data['user_bio'] != '') {
																				echo $data['user_bio'];
																			} else {
																				echo 'Add Bio...';
																			}
																			?>
																			</textarea>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="profile-personal-info">
														<div class="card-header">
															<h4 class="text-primary mb-4">Personal Information</h4>
															<button class="btn btn-primary" id="btn-c-info">Update</button>
														</div>

														<div class="row mb-2">
															<div class="col-sm-3 col-5">
																<h5 class="f-w-500">Name<span class="pull-end">:</span>
																</h5>
															</div>
															<div class="col-sm-9 col-7">
																<input type="text" placeholder="Enter Here..." id="user-name" class="form-control" value="<?php echo $data['user_name']; ?>">
															</div>
														</div>
														<div class="row mb-2">
															<div class="col-sm-3 col-5">
																<h5 class="f-w-500">Education<span class="pull-end">:</span>
																</h5>
															</div>
															<div class="col-sm-9 col-7">
																<input type="text" placeholder="Enter Here..." id="user-education" class="form-control" value="<?php echo $data['user_education']; ?>">
															</div>
														</div>
														<div class="row mb-2">
															<div class="col-sm-3 col-5">
																<h5 class="f-w-500">Email <span class="pull-end">:</span>
																</h5>
															</div>
															<div class="col-sm-9 col-7">
																<input type="text" placeholder="Enter Here..." id="user-email" class="form-control" value="<?php echo $data['user_email']; ?>">
															</div>
														</div>
														<div class="row mb-2">
															<div class="col-sm-3 col-5">
																<h5 class="f-w-500">Contact <span class="pull-end">:</span>
																</h5>
															</div>
															<div class="col-sm-9 col-7">
																<input type="text" placeholder="Enter Here..." id="user-contact" class="form-control" value="<?php echo $data['user_contact']; ?>">
															</div>
														</div>
														<div class="row mb-2">
															<div class="col-sm-3 col-5">
																<h5 class="f-w-500">Address <span class="pull-end">:</span>
																</h5>
															</div>
															<div class="col-sm-9 col-7">
																<input type="text" placeholder="Enter Here..." id="user-address" class="form-control" value="<?php echo $data['user_address']; ?>">
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- Modal -->
								<div class="modal fade" id="replyModal">
									<div class="modal-dialog modal-dialog-centered" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title">Post Reply</h5>
												<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
											</div>
											<div class="modal-body">
												<form>
													<textarea class="form-control" rows="4">Message</textarea>
												</form>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-danger light" data-bs-dismiss="modal">btn-close</button>
												<button type="button" class="btn btn-primary">Reply</button>
											</div>
										</div>
									</div>
								</div>
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


	<script src="public/assets/vendor/lightgallery/js/lightgallery-all.min.js"></script>
	<script src="public/assets/vendor/magnific-popup/jquery.magnific-popup.js"></script>

	<script>
		// const togglePassword = document.querySelector("#togglePassword");
		// const password = document.querySelector("#user-password");

		// togglePassword.addEventListener("click", function() {
		// 	// toggle the type attribute
		// 	const type = password.getAttribute("type") === "password" ? "text" : "password";
		// 	password.setAttribute("type", type);

		// 	// toggle the icon
		// 	this.classList.toggle("bi-eye");
		// });

		// // prevent form submit
		// const form = document.querySelector("form");
		// form.addEventListener('submit', function(e) {
		// 	e.preventDefault();
		// });


		function moreDetail() {
			$(document).ready(function() {
				$.ajax({
					url: '_profile.php',
					type: "POST",
					data: {
						'id': <?php echo $_SESSION['userId'] ?>,
						'btn_user_info_profile': 1
					},
					success: function(data) {
						$('#about-me').html(data);
					},
					error: function() {
						alert("Failed");
					}
				});
			});
		}

		function moreDetail2() {
			$(document).ready(function() {
				$.ajax({
					url: '_profile.php',
					type: "POST",
					data: {
						'id': <?php echo $_SESSION['userId'] ?>,
						'btn_profile_edit': 1
					},
					success: function(data) {
						$('#profile-settings').html(data);
					},
					error: function() {
						alert("Failed");
					}
				});
			});
		}
	</script>

	<script>
		$('document').ready(function() {
			$('#btn-c-password').click(function() {
				console.log("hi");
				var old_password = $('#old-password').val();
				var password = $('#user-password').val();
				var password_confirm = $('#user-password-confirm').val();
				if (password == password_confirm) {
					$.ajax({
						url: '_profile.php',
						type: "POST",
						data: {
							'id': <?php echo $_SESSION['userId'] ?>,
							'old_password': old_password,
							'password': password,
							'btn_c_password': 1,
						},
						dataType: 'JSON',
						success: function(data) {
							if (data.status == 1) {
								$('#modal-alert-body').css("background-color", "#a5fda5");
								$('#modal-alert-heading').html("Successful");
								$('#modal-alert-msg').html(data.msg);
								$('#old-password').val('');
								$('#user-password').val('');
								$('#user-password-confirm').val('');
							} else if (data.status == 0) {
								$('#modal-alert-body').css("background-color", "#fda5a5");
								$('#modal-alert-heading').html("Failed");
								$('#modal-alert-msg').html(data.msg);
							}
							document.getElementById("modal-toggle").click();
						},
						error: function() {
							alert("FAIL")
							$('#modal-alert-heading').html("Failed");
							$('#modal-alert-msg').html("Error In Php");
							$('#modal-alert-body').css("background-color", "#fda5a5");
							document.getElementById("modal-toggle").click();
						}
					});
				} else {
					$('#modal-alert-heading').html("Failed");
					$('#modal-alert-msg').html("New Password Did not match");
					$('#modal-alert-body').css("background-color", "#fda5a5");
					document.getElementById("modal-toggle").click();
				}
			});
		})

		$('document').ready(function() {
			$('#btn-c-bio').click(function() {
				console.log("bio");
				var bio = $.trim($('#user-bio').val());
				if (bio != '' && bio != 'Add Bio...') {
					$.ajax({
						url: '_profile.php',
						type: "POST",
						data: {
							'id': <?php echo $_SESSION['userId'] ?>,
							'bio': bio,
							'btn_c_bio': 1,
						},
						dataType: 'JSON',
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
							document.getElementById("modal-toggle").click();
						},
						error: function() {
							alert("FAIL")
							$('#modal-alert-heading').html("Failed");
							$('#modal-alert-msg').html("Error In Php");
							$('#modal-alert-body').css("background-color", "#fda5a5");
							document.getElementById("modal-toggle").click();
						}
					});
				} else {
					$('#modal-alert-heading').html("Failed");
					$('#modal-alert-msg').html("Enter Something In Bio Field");
					$('#modal-alert-body').css("background-color", "#fda5a5");
					document.getElementById("modal-toggle").click();
				}
			});
		})

		$('document').ready(function() {
			$('#btn-c-status').click(function() {
				var status = $('#user-status').val();
				$.ajax({
					url: '_profile.php',
					type: "POST",
					data: {
						'id': <?php echo $_SESSION['userId'] ?>,
						'status': status,
						'btn_c_status': 1,
					},
					dataType: 'JSON',
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
						document.getElementById("modal-toggle").click();
					},
					error: function() {
						alert("FAIL")
						$('#modal-alert-heading').html("Failed");
						$('#modal-alert-msg').html("Error In Php");
						$('#modal-alert-body').css("background-color", "#fda5a5");
						document.getElementById("modal-toggle").click();
					}
				});
			});
		})

		$('document').ready(function() {
			$('#btn-c-info').click(function() {
				console.log("info");
				var name = $('#user-name').val();
				var education = $('#user-education').val();
				var email = $('#user-email').val();
				var contact = $('#user-contact').val();
				var address = $('#user-address').val();
				console.log(name)
				console.log(education)
				console.log(email)
				console.log(contact)
				console.log(address)
				$.ajax({
					url: '_profile.php',
					type: "POST",
					data: {
						'id': <?php echo $_SESSION['userId'] ?>,
						'name': name,
						'education': education,
						'email': email,
						'contact': contact,
						'address': address,
						'btn_c_info': 1,
					},
					dataType: 'JSON',
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
						document.getElementById("modal-toggle").click();
					},
					error: function() {
						alert("FAIL");
						$('#modal-alert-heading').html("Failed");
						$('#modal-alert-msg').html("Error In Php");
						$('#modal-alert-body').css("background-color", "#fda5a5");
						document.getElementById("modal-toggle").click();
					}
				});
			});
		})
	</script>
	<?php require 'partials/_footer.php' ?>
</body>

</html>