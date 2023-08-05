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
	<!--**********************************
	Content body start
***********************************-->
	<div class="content-body">
		<div class="container-fluid">
			<div class="page-titles">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="javascript:void(0)">Shop</a></li>
					<li class="breadcrumb-item active"><a href="javascript:void(0)">Product Details</a></li>
				</ol>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-xl-3 col-lg-6  col-md-6 col-xxl-5 ">
									<!-- Tab panes -->
									<?php
									if (!(isset($_GET['id']))) {
										echo '<script>window.location.href="page_error_400.php"</script>';
									}
									?>
									<?php
									require 'partials/_connection.php';
									$x = $_GET['id'];
									$query = "SELECT * FROM `image` join product on `image`.product_id_FK=`product`.product_id WHERE product_id_FK='$x' AND image_status='1' ORDER BY image_id DESC";
									$res = mysqli_query($con, $query);
									$row = mysqli_num_rows($res);
									if ($row == 0) {
									?>
										<div class="tab-content">
											<div role="tabpanel" class="tab-pane fade show active <?php if ($i == 1) echo 'class="show"' ?>" id="p-1">
												<img class="img-fluid" src="public\assets\images\no-image-available.jpg" alt="no-img" width="100%" height="100%">
											</div>
										</div>
										<div class="tab-slide-content new-arrival-product mb-4 mb-xl-0">
											<!-- Nav tabs -->
											<ul class="nav slide-item-list mt-3" role="tablist">
												<li role="presentation" class="show">
													<a href="#p-1" role="tab" data-bs-toggle="tab">
														<img class="img-fluid" src="public\assets\images\no-image-available.jpg" alt="no-img" width="50">
													</a>
												</li>
											</ul>
										</div>
									<?php
									} else { ?>
									<h4><a href="image_preview.php?id=<?php echo $_GET['id'] ?>&name=product">View Images In Gallery</a></h4>
										<div class="tab-content">
											<?php $i = 1;
											while ($data = mysqli_fetch_assoc($res)) {
											?>
												<div role="tabpanel" class="tab-pane fade show <?php if ($i == 1) echo 'active' ?>" id="<?php echo 'p-' . $i ?>">
													<img class="img-fluid" src="<?php echo $data['image'] ?>" alt="<?php echo $data['product_name'] ?>" width="100%" height="100%">
												</div>
											<?php
												if ($i == 4) {
													break;
												}
												$i++;
											}
											?>
										</div>
										<div class="tab-slide-content new-arrival-product mb-4 mb-xl-0">
											<!-- Nav tabs -->
											<ul class="nav slide-item-list mt-3" role="tablist">
												<?php
												$query = "SELECT * FROM `image` join product on `image`.product_id_FK=`product`.product_id WHERE product_id_FK='$x' AND image_status='1' ORDER BY image_id DESC";
												$res = mysqli_query($con, $query);
												$i = 1;
												while ($data = mysqli_fetch_assoc($res)) {
												?>
													<li role="presentation" <?php if ($i == 1) echo 'class="show"' ?>>
														<a href="#<?php echo 'p-' . $i ?>" role="tab" data-bs-toggle="tab">
															<img class="img-fluid" src="<?php echo $data['image'] ?>" alt="<?php echo $data['product_name'] ?>" width="50">
														</a>
													</li>
												<?php
													if ($i == 4) {
														break;
													}
													$i++;
												} ?>
											</ul>
										</div>
									<?php
									} ?>
								</div>
								<!--Tab slider End-->
								<div class="col-xl-9 col-lg-6  col-md-6 col-xxl-7 col-sm-12">
									<div class="product-detail-content">
										<?php
										$query = "SELECT * FROM `product` join `status` on `product`.status_id_FK=`status`.status_id WHERE product_id='$x'";
										$res = mysqli_query($con, $query);
										$row = mysqli_num_rows($res);
										$data = mysqli_fetch_assoc($res);
										?>
										<!--Product details-->
										<div class="new-arrival-content pr">
											<?php
											$c_id=$data['component_id_FK'];
											$sql2="SELECT * FROM `component` WHERE component_id='$c_id'";
											$r=mysqli_query($con,$sql2);
											$c=mysqli_fetch_assoc($r);
											?>
											<h4><?php echo $data['product_name'] ?> <sub> (<a href="component_details.php?id=<?php echo $c['component_id'] ?>"><?php echo $c['component_name'] ?></a>)</sub></h4>
											<div class="comment-review star-rating">
												<ul>
													<li><i class="fa fa-star"></i></li>
													<li><i class="fa fa-star"></i></li>
													<li><i class="fa fa-star"></i></li>
													<li><i class="fa fa-star-half-empty"></i></li>
													<li><i class="fa fa-star-half-empty"></i></li>
												</ul>
												<span class="review-text">(34 reviews) / </span><a class="product-review" href="#" data-bs-toggle="modal" data-bs-target="#reviewModal">Write a review?</a>
											</div>
											<div class="d-table mb-2">
												<p class="price float-start d-block">$325.00</p>
											</div>
											<p>
												<b>Status: </b>
												<span class="badge" style="background-color: <?php echo $data['color'] ?>;"><?php echo ucwords($data['status_name']) ?><span class="ms-1 <?php echo $data['fontawesome_icon'] ?>"></span></span>
											</p>
											<p><b>Product code:</b> <span class="item"><?php echo $data['product_code'] ?></span> </p>
											<?php
											$query = "SELECT * FROM `performed` join user on `performed`.user_id_FK=`user`.user_id join test on `performed`.test_id_FK=`test`.test_id WHERE product_id_FK='$x'  ORDER BY performed_id DESC";
											$result2 = mysqli_query($con, $query);
											$row = mysqli_num_rows($result2);

											if ($row == 0) {
											?>
												<p><b><b>NO TESTS PERFORMED YET...</b></p>
											<?php
											} else { ?>
												<p><b>Total Tests:</b> <span class="item"><?php echo $row ?></span> </p>
											<?php }
											?>
											<p>Product tags:&nbsp;&nbsp;
												<?php
												$id = $data['component_id_FK'];
												$sql = "SELECT * FROM `product` WHERE component_id_FK='$id' AND product_id!='$x'";
												$res = mysqli_query($con, $sql);
												$i = 0;
												while ($y = mysqli_fetch_assoc($res)) {
													if ($i == 5) {
														break;
													}
												?>
													<span class="badge badge-success light">
														<a href="product_details.php?id=<?php echo mb_strimwidth($y['product_id'], 0, 10, "...") ?>"><?php echo $y['product_name'] ?></a>
													</span>
												<?php
													$i++;
												}
												?>
											</p>

											<div class="accordion accordion-primary" id="accordion-one">
												<?php
												$i = 1;
												while ($data = mysqli_fetch_assoc($result2)) {
												?>
													<div class="accordion-item">
														<div class="accordion-header <?php if ($i != 1) echo 'collapse' ?>  rounded-lg" id="<?php echo 'heading-' . $i ?>" data-bs-toggle="collapse" data-bs-target="#<?php echo 'collapse-' . $i ?>" aria-controls="<?php echo 'collapse-' . $i ?>" aria-expanded="true" role="button">
															<?php
															if ($i == 1) {
																echo '
															<span class="accordion-header-icon"></span>
															';
															}
															?>
															<span class="accordion-header-text">Test-<?php echo $i ?></span>
															<span class="accordion-header-indicator"></span>
														</div>
														<div id="<?php echo 'collapse-' . $i ?>" class="collapse <?php if ($i == 1) echo 'show' ?>" aria-labelledby="<?php echo 'heading-' . $i ?>" data-bs-parent="#accordion-one">
															<div class="accordion-body-text">
																<p><b>Performed Id:</b> <span class="item"><?php echo $data['performed_id'] ?></span> </p>
																<p><b>Test Id:</b> <span class="item"><?php echo $data['test_id'] ?></span> </p>
																<p><b>Test Name:</b> <a href="test.php?id=<?php echo $data['test_id'] ?>"><span class="item"><?php echo $data['test_name'] ?></span></a> </p>
																<p><b>Test Remarks:</b> <span class="item"><?php echo $data['remarks'] ?></span> </p>
																<?php
		if (strtolower($_SESSION['userRole'])=='admin') {
			?>
			<p><b>User Name:</b> <a href="user.php?id=<?php echo $data['user_id'] ?>"><span class="item"><?php echo $data['user_name'] ?></a></span> </p>
            <?php
		}else{
            ?>
			<p><b>User Name:</b><span class="item"><?php echo $data['user_name'] ?></span> </p>
            <?php
        }
		?>
															</div>
														</div>
													</div>
												<?php $i++;
												}
												?>
											</div>

										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- review -->
				<div class="modal fade" id="reviewModal">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Review</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal">
								</button>
							</div>
							<div class="modal-body">
								<form>
									<div class="text-center mb-4">
										<img class="img-fluid rounded" width="78" src="public/assets/images/avatar/1.jpg" alt="DexignZone">
									</div>
									<div class="form-group">
										<div class="rating-widget mb-4 text-center">
											<!-- Rating Stars Box -->
											<div class="rating-stars">
												<ul id="stars">
													<li class="star" title="Poor" data-value="1">
														<i class="fa fa-star fa-fw"></i>
													</li>
													<li class="star" title="Fair" data-value="2">
														<i class="fa fa-star fa-fw"></i>
													</li>
													<li class="star" title="Good" data-value="3">
														<i class="fa fa-star fa-fw"></i>
													</li>
													<li class="star" title="Excellent" data-value="4">
														<i class="fa fa-star fa-fw"></i>
													</li>
													<li class="star" title="WOW!!!" data-value="5">
														<i class="fa fa-star fa-fw"></i>
													</li>
												</ul>
											</div>
										</div>
									</div>
									<div class="form-group">
										<textarea class="form-control" placeholder="Comment" rows="5"></textarea>
									</div>
									<button class="btn btn-success btn-block">RATE</button>
								</form>
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
	<?php require 'partials/_footer.php'; ?>

</body>

</html>