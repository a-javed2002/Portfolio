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
	<title>Chrev - Crypto Codeigniter Admin Dashboard </title>
	<!-- Favicon icon -->

	<link rel="icon" type="image/png" sizes="16x16" href="public/assets/images/favicon.png">


	<link href="public/assets/vendor/chartist/css/chartist.min.css" rel="stylesheet" type="text/css" />

	<link href="public/assets/vendor/owl-carousel/owl.carousel.css" rel="stylesheet" type="text/css" />

	<link href="public/assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet" type="text/css" />

	<link href="public/assets/css/style.css" rel="stylesheet" type="text/css" />

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

</head>

<body>
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
		<!-- row -->
		<div class="container-fluid">
			<div class="form-head d-flex mb-4 mb-md-5 align-items-start">
				<!-- <div class="input-group search-area d-inline-flex">
					<div class="input-group-append">
						<span class="input-group-text"><i class="fas fa-search"></i></span>
					</div>
					<input type="text" class="form-control" placeholder="Search here">
				</div> -->
				<a href="product.php" class="btn btn-primary ms-auto">+ Add Product</a>
			</div>
			<div class="row">
				<div class="col-xl-3 col-xxl-3 col-lg-6 col-sm-6">
					<div class="card overflow-hidden">
						<div class="card-header border-0 pb-0 card-bx">
							<div class="me-auto">
								<?php
								require 'partials/_connection.php';
								$query = "SELECT * FROM `user`";
								$result = mysqli_query($con, $query);
								$row = mysqli_num_rows($result);
								?>
								<h2 class="text-black mb-2 font-w600"><?php echo $row ?> Users</h2>
								<p class="mb-1 fs-13">
									<svg width="21" height="15" viewBox="0 0 21 15" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M1 13.5C1.91797 12.4157 4.89728 9.22772 6.5 7.5L12.5 10.5L19.5 1.5" stroke="#2BC155" stroke-width="2" />
										<path d="M6.5 7.5C4.89728 9.22772 1.91797 12.4157 1 13.5H19.5V1.5L12.5 10.5L6.5 7.5Z" />
										<defs>
											<linearGradient x1="10.25" y1="3" x2="11" y2="13.5" gradientUnits="userSpaceOnUse">
												<stop stop-color="#2BC155" offset="1" stop-opacity="0.73" />
												<stop offset="1" stop-color="#2BC155" stop-opacity="0" />
											</linearGradient>
										</defs>
									</svg>
									4%(30 days)
								</p>
							</div>
							<img src="public/assets/images/svg/bitcoin-1.svg" alt="">
						</div>
						<div class="card-body p-0">
							<canvas id="widgetChart1" height="75"></canvas>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-xxl-3 col-lg-6 col-sm-6">
					<div class="card overflow-hidden">
						<div class="card-header border-0 pb-0 card-bx">
							<div class="me-auto">
								<?php
								require 'partials/_connection.php';
								$query = "SELECT * FROM `product`";
								$result = mysqli_query($con, $query);
								$row = mysqli_num_rows($result);
								?>
								<h2 class="text-black mb-2 font-w600"><?php echo $row ?> Products</h2>
								<p class="mb-1 fs-13">
									<svg width="21" height="15" viewBox="0 0 21 15" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M1 13.5C1.91797 12.4157 4.89728 9.22772 6.5 7.5L12.5 10.5L19.5 1.5" stroke="#2BC155" stroke-width="2" />
										<path d="M6.5 7.5C4.89728 9.22772 1.91797 12.4157 1 13.5H19.5V1.5L12.5 10.5L6.5 7.5Z" />
										<defs>
											<linearGradient x1="10.25" y1="3" x2="11" y2="13.5" gradientUnits="userSpaceOnUse">
												<stop stop-color="#2BC155" offset="1" stop-opacity="0.73" />
												<stop offset="1" stop-color="#2BC155" stop-opacity="0" />
											</linearGradient>
										</defs>
									</svg>
									4%(30 days)
								</p>
							</div>
							<img src="public/assets/images/svg/ethereum-1.svg" alt="">
						</div>
						<div class="card-body p-0">
							<canvas id="widgetChart2" height="75"></canvas>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-xxl-3 col-lg-6 col-sm-6">
					<div class="card overflow-hidden">
						<div class="card-header border-0 pb-0 card-bx">
							<div class="me-auto">
								<?php
								require 'partials/_connection.php';
								$query = "SELECT * FROM `test`";
								$result = mysqli_query($con, $query);
								$row = mysqli_num_rows($result);
								?>
								<h2 class="text-black mb-2 font-w600"><?php echo $row ?> Tests</h2>
								<p class="mb-1 fs-13">
									<svg width="21" height="15" viewBox="0 0 21 15" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M1 13.5C1.91797 12.4157 4.89728 9.22772 6.5 7.5L12.5 10.5L19.5 1.5" stroke="#2BC155" stroke-width="2" />
										<path d="M6.5 7.5C4.89728 9.22772 1.91797 12.4157 1 13.5H19.5V1.5L12.5 10.5L6.5 7.5Z" />
										<defs>
											<linearGradient x1="10.25" y1="3" x2="11" y2="13.5" gradientUnits="userSpaceOnUse">
												<stop stop-color="#2BC155" offset="1" stop-opacity="0.73" />
												<stop offset="1" stop-color="#2BC155" stop-opacity="0" />
											</linearGradient>
										</defs>
									</svg>
									4%(30 days)
								</p>
							</div>
							<img src="public/assets/images/svg/ripple-1.svg" alt="">
						</div>
						<div class="card-body p-0">
							<canvas id="widgetChart3" height="75"></canvas>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-xxl-3 col-lg-6 col-sm-6">
					<div class="card overflow-hidden">
						<div class="card-header border-0 pb-0 card-bx">
							<div class="me-auto">
								<?php
								require 'partials/_connection.php';
								$query = "SELECT * FROM `performed`";
								$result = mysqli_query($con, $query);
								$row = mysqli_num_rows($result);
								?>
								<h2 class="text-black mb-2 font-w600"><?php echo $row ?> Performed</h2>
								<p class="mb-1 fs-13">
									<svg width="21" height="15" viewBox="0 0 21 15" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M1 13.5C1.91797 12.4157 4.89728 9.22772 6.5 7.5L12.5 10.5L19.5 1.5" stroke="#2BC155" stroke-width="2" />
										<path d="M6.5 7.5C4.89728 9.22772 1.91797 12.4157 1 13.5H19.5V1.5L12.5 10.5L6.5 7.5Z" />
										<defs>
											<linearGradient x1="10.25" y1="3" x2="11" y2="13.5" gradientUnits="userSpaceOnUse">
												<stop stop-color="#2BC155" offset="1" stop-opacity="0.73" />
												<stop offset="1" stop-color="#2BC155" stop-opacity="0" />
											</linearGradient>
										</defs>
									</svg>
									4%(30 days)
								</p>
							</div>
							<img src="public/assets/images/svg/litecoin-1.svg" alt="">
						</div>
						<div class="card-body p-0">
							<canvas id="widgetChart4" height="75"></canvas>
						</div>
					</div>
				</div>
				<!-- <div class="col-xl-6 col-xxl-6 col-lg-12">
					<div class="card">
						<div class="card-header d-sm-flex d-block pb-0 border-0">
							<div>
								<h4 class="text-black fs-20">Market Overview</h4>
								<p class="fs-13 mb-0">Lorem ipsum dolor sit amet, consectetur</p>
							</div>
							<select class="form-control default-select style-1 mt-sm-0 mt-3">
								<option>Monthly (2020)</option>
								<option>Weekly (2020)</option>
								<option>Daily (2020)</option>
							</select>

						</div>
						<div class="card-body" id="user-activity">
							<div class="d-flex flex-wrap justify-content-between mb-5">
								<div class="card-action card-tabs icontabs mt-3 mt-sm-0">
									<ul class="nav nav-tabs" role="tablist">
										<li class="nav-item">
											<a class="nav-link active" data-bs-toggle="tab" href="#user" role="tab" aria-selected="true">
												ALL
											</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" data-bs-toggle="tab" href="#bounce" role="tab" aria-selected="false">
												<i class="fab fa-btc"></i>
											</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" data-bs-toggle="tab" href="#session-duration" role="tab" aria-selected="false">
												<i class="lab la-ethereum"></i>
											</a>
										</li>
									</ul>
								</div>
								<div class="d-flex align-items-center mt-3 mt-sm-0">
									<p class="mb-0 fs-13 me-3">Average</p>
									<h2 class="mb-0 text-black font-w600">45%</h2>
								</div>
							</div>
							<div class="tab-content" id="myTabContent">
								<div class="tab-pane fade show active" id="user" role="tabpanel">
									<canvas id="activityLine" height="350"></canvas>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-6 col-xxl-6 col-lg-12">
					<div class="card">
						<div class="card-header d-block d-sm-flex border-0 pb-0">
							<div>
								<h4 class="text-black fs-20">Cards</h4>
								<p class="fs-13 mb-0">Lorem ipsum dolor sit amet, consectetur</p>
							</div>
							<div class="dropdown custom-dropdown mb-0 mt-3 mt-sm-0">
								<div class="btn text-black bgl-light rounded-0" data-bs-toggle="dropdown">
									Settings
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<rect x="0" y="0" width="24" height="24"></rect>
											<circle fill="#000000" cx="12" cy="5" r="2"></circle>
											<circle fill="#000000" cx="12" cy="12" r="2"></circle>
											<circle fill="#000000" cx="12" cy="19" r="2"></circle>
										</g>
									</svg>
								</div>
								<div class="dropdown-menu dropdown-menu-end">
									<a class="dropdown-item" href="javascript:void(0);">Details</a>
									<a class="dropdown-item text-danger" href="javascript:void(0);">Cancel</a>
								</div>
							</div>
						</div>
						<div class="card-body">
							<div class="owl-bank-wallet owl-carousel owl-loaded owl-drag mb-sm-4 mb-0">
								<div class="items">
									<div class="card-bx bg-primary">
										<img class="pattern-img" src="public/assets/images/pattern/pattern1.png" alt="">
										<div class="card-info text-white">
											<div class="d-flex align-items-center mb-3">
												<img class="cr-logo me-auto" src="public/assets/images/svg/crypto-logo.svg" alt="">
												<p class="mb-0">**** **** **** 1234</p>
											</div>
											<div class="mb-3">
												<p class="fs-10 mb-2">Main Balance</p>
												<h3 class="text-white">$673,412.66</h3>
											</div>
											<div class="d-flex align-items-center">
												<div class="me-4">
													<p class="fs-10 mb-0 op6">VALID THRU</p>
													<span class="fs-11">08/21</span>
												</div>
												<div>
													<p class="fs-10 mb-0 op6">CARD HOLDER</p>
													<span class="fs-11">Franklin Jr.</span>
												</div>
												<img src="public/assets/images/dot.svg" class="dots-img ms-auto" alt="">
											</div>
										</div>
									</div>
								</div>
								<div class="items">
									<div class="card-bx bg-info">
										<img class="pattern-img" src="public/assets/images/pattern/pattern1.png" alt="">
										<div class="card-info text-white">
											<div class="d-flex align-items-center mb-3">
												<img class="cr-logo me-auto" src="public/assets/images/svg/crypto-logo.svg" alt="">
												<p class="mb-0">**** **** **** 1234</p>
											</div>
											<div class="mb-3">
												<p class="fs-10 mb-2">Main Balance</p>
												<h3 class="text-white">$673,412.66</h3>
											</div>
											<div class="d-flex align-items-center">
												<div class="me-4">
													<p class="fs-10 mb-0 op6">VALID THRU</p>
													<span class="fs-11">08/21</span>
												</div>
												<div>
													<p class="fs-10 mb-0 op6">CARD HOLDER</p>
													<span class="fs-11">Franklin Jr.</span>
												</div>
												<img src="public/assets/images/dot.svg" class="dots-img ms-auto" alt="">
											</div>
										</div>
									</div>
								</div>
								<div class="items">
									<div class="card-bx bg-secondary">
										<img class="pattern-img" src="public/assets/images/pattern/pattern1.png" alt="">
										<div class="card-info text-white">
											<div class="d-flex align-items-center mb-3">
												<img class="cr-logo me-auto" src="public/assets/images/svg/crypto-logo.svg" alt="">
												<p class="mb-0">**** **** **** 1234</p>
											</div>
											<div class="mb-3">
												<p class="fs-10 mb-2">Main Balance</p>
												<h3 class="text-white">$673,412.66</h3>
											</div>
											<div class="d-flex align-items-center">
												<div class="me-4">
													<p class="fs-10 mb-0 op6">VALID THRU</p>
													<span class="fs-11">08/21</span>
												</div>
												<div>
													<p class="fs-10 mb-0 op6">CARD HOLDER</p>
													<span class="fs-11">Franklin Jr.</span>
												</div>
												<img src="public/assets/images/dot.svg" class="dots-img ms-auto" alt="">
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="media align-items-center d-none d-sm-flex">
								<div class="d-inline-block relative donut-chart-sale me-4">
									<span class="donut" data-peity='{ "fill": ["rgb(60, 75, 165)", "rgba(236, 236, 236, 1)"],   "innerRadius": 32, "radius": 10}'>7/8</span>
									<small class="text-primary">71%</small>
								</div>
								<div class="media-body">
									<p class="mb-2">Monthly Limits</p>
									<h4 class="mb-0 text-black font-w600 fs-20">$20,000 of $100,000</h4>
								</div>
								<a class="btn btn-link ms-auto font-w700" href="javascript:void(0);">View details</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-6 col-xxl-8 col-lg-12">
					<div class="card">
						<div class="card-header d-block d-sm-flex flex-wrap border-0 pb-1">
							<div class="mb-3">
								<h4 class="fs-20 text-black">Recent Trading Activities</h4>
								<p class="mb-0 fs-13">Lorem ipsum dolor sit amet, consectetur</p>
							</div>
							<div class="card-action card-tabs mb-3">
								<ul class="nav nav-tabs" role="tablist">
									<li class="nav-item">
										<a class="nav-link active" data-bs-toggle="tab" href="#monthly" role="tab">
											Monthly
										</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" data-bs-toggle="tab" href="#Weekly" role="tab">
											Weekly
										</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" data-bs-toggle="tab" href="#Today" role="tab">
											Today
										</a>
									</li>
								</ul>
							</div>
						</div>
						<div class="card-body tab-content p-0">
							<div class="tab-pane active show fade" id="monthly" role="tabpanel">
								<div class="table-responsive">
									<table class="table shadow-hover card-table">
										<tbody>
											<tr>
												<td>
													<span class="bgl-success p-3 d-inline-block">
														<svg width="29" height="29" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg">
															<path d="M23.6186 15.7207L23.6186 15.7207L23.6353 22.6289C23.6354 22.6328 23.6354 22.6363 23.6353 22.6396M23.6186 15.7207L23.1353 22.6341L23.6353 22.635C23.6353 22.6481 23.6347 22.6583 23.6345 22.6627L23.6344 22.6642C23.6346 22.6609 23.6351 22.652 23.6353 22.6407C23.6353 22.6403 23.6353 22.64 23.6353 22.6396M23.6186 15.7207C23.6167 14.9268 22.9717 14.2847 22.1777 14.2866C21.3838 14.2885 20.7417 14.9336 20.7436 15.7275L20.7436 15.7275L20.7519 19.1563M23.6186 15.7207L20.7519 19.1563M23.6353 22.6396C23.6329 23.4282 22.9931 24.0705 22.2017 24.0726C22.2 24.0726 22.1983 24.0727 22.1965 24.0727L22.1944 24.0727L22.1773 24.0726L15.2834 24.056L15.2846 23.556L15.2834 24.056C14.4897 24.054 13.8474 23.4091 13.8494 22.615C13.8513 21.8211 14.4964 21.179 15.2903 21.1809L15.2903 21.1809L18.719 21.1892L5.53639 8.0066C4.975 7.44521 4.975 6.53505 5.53639 5.97367C6.09778 5.41228 7.00793 5.41228 7.56932 5.97367L20.7519 19.1563M23.6353 22.6396C23.6353 22.6376 23.6353 22.6356 23.6353 22.6336L20.7519 19.1563M22.1964 24.0726C22.1957 24.0726 22.1951 24.0726 22.1944 24.0726L22.1964 24.0726Z" fill="#2BC155" stroke="#2BC155" />
														</svg>
													</span>
												</td>
												<td>
													<div class="font-w600 wspace-no">
														<span class="me-1">
															<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																<path d="M16 9.50011C15.9992 8.67201 15.216 8.00092 14.2501 8H9V11H14.2501C15.216 10.9993 15.9992 10.328 16 9.50011Z" fill="#FFAB2D" />
																<path d="M9 16H14.2501C15.2165 16 16 15.3285 16 14.5001C16 13.6715 15.2165 13 14.2501 13H9V16Z" fill="#FFAB2D" />
																<path d="M12 0C5.3726 0 0 5.3726 0 12C0 18.6274 5.3726 24 12 24C18.6274 24 24 18.6274 24 12C23.9924 5.37574 18.6243 0.00758581 12 0ZM18.0001 14.5713C17.9978 16.4641 16.4641 17.9978 14.5716 17.9999V18.8571C14.5716 19.3305 14.1876 19.7143 13.7144 19.7143C13.2409 19.7143 12.8572 19.3305 12.8572 18.8571V17.9999H11.1431V18.8571C11.1431 19.3305 10.7591 19.7143 10.2859 19.7143C9.8124 19.7143 9.42866 19.3305 9.42866 18.8571V17.9999H6.85733C6.38387 17.9999 6.00013 17.6161 6.00013 17.1429C6.00013 16.6695 6.38387 16.2857 6.85733 16.2857H7.71427V7.71427H6.85733C6.38387 7.71427 6.00013 7.33053 6.00013 6.85707C6.00013 6.38361 6.38387 5.99987 6.85733 5.99987H9.42866V5.14293C9.42866 4.66947 9.8124 4.28573 10.2859 4.28573C10.7593 4.28573 11.1431 4.66947 11.1431 5.14293V5.99987H12.8572V5.14293C12.8572 4.66947 13.2409 4.28573 13.7144 4.28573C14.1879 4.28573 14.5716 4.66947 14.5716 5.14293V5.99987C16.4571 5.99202 17.992 7.5139 18.0001 9.39937C18.0043 10.3978 17.5714 11.3481 16.8152 12C17.5643 12.6445 17.9967 13.5828 18.0001 14.5713Z" fill="#FFAB2D" />
															</svg>
														</span>
														Bitcoin
													</div>
												</td>
												<td class="font-w500">06:24:45 AM</td>
												<td class="font-w600 text-center">+$5,553</td>
												<td><a class="btn-link text-success float-end" href="javascript:void(0);">Completed</a></td>
											</tr>
											<tr>
												<td>
													<span class="bgl-danger p-3 d-inline-block">
														<svg width="29" height="29" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg">
															<path d="M5.13185 13.9043L5.13185 13.9043L5.11515 6.99607C5.11511 6.99224 5.11513 6.98868 5.11517 6.98542M5.13185 13.9043L5.61517 6.99089L5.11517 6.99005C5.11519 6.97692 5.11575 6.96665 5.116 6.96234L5.11608 6.96082C5.11588 6.96411 5.11535 6.97298 5.11519 6.98431C5.11518 6.98468 5.11517 6.98505 5.11517 6.98542M5.13185 13.9043C5.13378 14.6982 5.77881 15.3403 6.57281 15.3384C7.36672 15.3365 8.00877 14.6914 8.00689 13.8975L8.00689 13.8975L7.99856 10.4687M5.13185 13.9043L7.99856 10.4687M5.11517 6.98542C5.11755 6.19684 5.75739 5.55451 6.54875 5.55238C6.55044 5.55236 6.5522 5.55235 6.554 5.55234L6.55606 5.55234L6.57321 5.55239L13.4671 5.56905L13.4658 6.06905L13.4671 5.56905C14.2608 5.57098 14.903 6.21593 14.9011 7.01004C14.8992 7.80394 14.2541 8.44597 13.4602 8.44409L13.4602 8.4441L10.0315 8.43582L23.2141 21.6184C23.7755 22.1798 23.7755 23.0899 23.2141 23.6513C22.6527 24.2127 21.7426 24.2127 21.1812 23.6513L7.99856 10.4687M5.11517 6.98542C5.11516 6.98743 5.11517 6.98943 5.11517 6.99144L7.99856 10.4687M6.5541 5.55237C6.55474 5.55237 6.5554 5.55237 6.55606 5.55238L6.5541 5.55237Z" fill="#FF2E2E" stroke="#FF2E2E" />
														</svg>
													</span>
												</td>
												<td>
													<div class="font-w600  wspace-no">
														<span class="me-1">
															<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																<path d="M12.3181 13.6532C12.1138 13.7348 11.8862 13.7348 11.6819 13.6532L9.48938 12.7761L12 17.7974L14.5107 12.7761L12.3181 13.6532Z" fill="#DC3CCC" />
																<path d="M12 11.9341L15.0155 10.7279L12 5.90306L8.9845 10.7279L12 11.9341Z" fill="#DC3CCC" />
																<path d="M12 0C5.3726 0 0 5.3726 0 12C0 18.6274 5.3726 24 12 24C18.6274 24 24 18.6274 24 12C23.9927 5.37574 18.6243 0.00732425 12 0ZM17.0524 11.5263L12.7667 20.0977C12.5551 20.5212 12.04 20.6928 11.6168 20.4812C11.4507 20.3983 11.3162 20.2638 11.2333 20.0977L6.94757 11.5263C6.81443 11.2589 6.8296 10.9416 6.9876 10.6882L11.2733 3.83111C11.5582 3.42984 12.114 3.33515 12.5153 3.62001C12.5972 3.67808 12.6686 3.74923 12.7267 3.83111L17.0121 10.6882C17.1704 10.9416 17.1856 11.2589 17.0524 11.5263Z" fill="#DC3CCC" />
															</svg>
														</span>
														Ethereum
													</div>
												</td>
												<td class="font-w500">06:24:45 AM</td>
												<td class="font-w600 text-center">-$542</td>
												<td>
													<a class="btn-link text-dark float-end" href="javascript:void(0);">Pending</a>
												</td>
											</tr>
											<tr>
												<td>
													<span class="bgl-danger p-3 d-inline-block ">
														<svg width="29" height="29" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg">
															<path d="M5.13185 13.9043L5.13185 13.9043L5.11515 6.99607C5.11511 6.99224 5.11513 6.98868 5.11517 6.98542M5.13185 13.9043L5.61517 6.99089L5.11517 6.99005C5.11519 6.97692 5.11575 6.96665 5.116 6.96234L5.11608 6.96082C5.11588 6.96411 5.11535 6.97298 5.11519 6.98431C5.11518 6.98468 5.11517 6.98505 5.11517 6.98542M5.13185 13.9043C5.13378 14.6982 5.77881 15.3403 6.57281 15.3384C7.36672 15.3365 8.00877 14.6914 8.00689 13.8975L8.00689 13.8975L7.99856 10.4687M5.13185 13.9043L7.99856 10.4687M5.11517 6.98542C5.11755 6.19684 5.75739 5.55451 6.54875 5.55238C6.55044 5.55236 6.5522 5.55235 6.554 5.55234L6.55606 5.55234L6.57321 5.55239L13.4671 5.56905L13.4658 6.06905L13.4671 5.56905C14.2608 5.57098 14.903 6.21593 14.9011 7.01004C14.8992 7.80394 14.2541 8.44597 13.4602 8.44409L13.4602 8.4441L10.0315 8.43582L23.2141 21.6184C23.7755 22.1798 23.7755 23.0899 23.2141 23.6513C22.6527 24.2127 21.7426 24.2127 21.1812 23.6513L7.99856 10.4687M5.11517 6.98542C5.11516 6.98743 5.11517 6.98943 5.11517 6.99144L7.99856 10.4687M6.5541 5.55237C6.55474 5.55237 6.5554 5.55237 6.55606 5.55238L6.5541 5.55237Z" fill="#FF2E2E" stroke="#FF2E2E" />
														</svg>
													</span>
												</td>
												<td>
													<div class="font-w600  wspace-no">
														<span class="me-1">
															<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																<path d="M12 0C5.3726 0 0 5.3726 0 12C0 18.6274 5.3726 24 12 24C18.6274 24 24 18.6274 24 12C23.9924 5.37574 18.6243 0.00758581 12 0ZM17.8879 10.6801C17.4417 11.0743 16.9263 11.3824 16.3679 11.5885C15.9726 11.7164 15.6111 11.9312 15.3098 12.2174C14.9098 13.1698 15.1554 14.2713 15.9227 14.9637C15.9488 14.9899 15.9734 15.0179 15.9962 15.0474C16.9614 16.2842 16.8633 18.0438 15.7668 19.1657C14.5528 20.3776 12.5865 20.3776 11.3722 19.1657C10.6039 18.2437 10.3528 16.9962 10.7044 15.8486C10.7894 15.1855 10.5626 14.5201 10.0899 14.0471C9.62093 13.5951 8.97064 13.383 8.32532 13.4711C7.17777 13.8222 5.93055 13.5703 5.009 12.8017C3.79553 11.5898 3.79448 9.6238 5.00639 8.41059C5.00717 8.40955 5.00822 8.40876 5.009 8.40798C6.1304 7.31065 7.89083 7.21256 9.12732 8.17857C9.99289 9.03394 11.2752 9.32194 11.9566 8.86339C12.2438 8.56283 12.4588 8.20107 12.5859 7.8053C12.7921 7.24735 13.0997 6.73256 13.4934 6.28682C14.7068 5.07335 16.6739 5.07335 17.8874 6.28656C19.1011 7.50003 19.1011 9.46712 17.8879 10.6806V10.6801Z" fill="#2B98D6" />
																<path d="M14.6784 7.39816C14.4502 7.69123 14.2697 8.01851 14.1441 8.368C13.9151 9.05703 13.4924 9.66563 12.9269 10.1211C11.3324 10.9773 9.36089 10.6462 8.13349 9.31614C7.59153 8.95261 6.86908 9.01592 6.39859 9.4683C5.8676 9.99853 5.86709 10.8591 6.39732 11.3901C6.39783 11.3904 6.39808 11.3909 6.39859 11.3911C6.71872 11.71 7.17465 11.7605 8.1483 11.5823C8.34563 11.5466 8.54577 11.5285 8.74643 11.5285C9.72186 11.5443 10.6549 11.9298 11.3572 12.6068C12.2081 13.4577 12.6027 14.6632 12.4194 15.8526C12.2382 16.8239 12.2887 17.2814 12.6091 17.6023C13.1404 18.1326 14.0007 18.1326 14.5319 17.6023C14.9909 17.1119 15.0363 16.3647 14.6399 15.8224C13.3436 14.5927 13.0316 12.6469 13.8786 11.0736C14.3341 10.5083 14.9426 10.0861 15.6317 9.85787C15.9816 9.73175 16.3092 9.55024 16.602 9.32048C17.1327 8.78948 17.1327 7.92865 16.6017 7.3979C16.0705 6.86715 15.2099 6.86741 14.6792 7.39841L14.6784 7.39816Z" fill="#2B98D6" />
															</svg>
														</span>
														Ripple
													</div>
												</td>
												<td class="font-w500">06:24:45 AM</td>
												<td class="font-w600 text-center">-$912</td>
												<td>
													<a class="btn-link text-danger float-end" href="javascript:void(0);">Canceled</a>
												</td>
											</tr>
											<tr>
												<td>
													<span class="bgl-success p-3 d-inline-block">
														<svg width="29" height="29" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg">
															<path d="M23.6186 15.7207L23.6186 15.7207L23.6353 22.6289C23.6354 22.6328 23.6354 22.6363 23.6353 22.6396M23.6186 15.7207L23.1353 22.6341L23.6353 22.635C23.6353 22.6481 23.6347 22.6583 23.6345 22.6627L23.6344 22.6642C23.6346 22.6609 23.6351 22.652 23.6353 22.6407C23.6353 22.6403 23.6353 22.64 23.6353 22.6396M23.6186 15.7207C23.6167 14.9268 22.9717 14.2847 22.1777 14.2866C21.3838 14.2885 20.7417 14.9336 20.7436 15.7275L20.7436 15.7275L20.7519 19.1563M23.6186 15.7207L20.7519 19.1563M23.6353 22.6396C23.6329 23.4282 22.9931 24.0705 22.2017 24.0726C22.2 24.0726 22.1983 24.0727 22.1965 24.0727L22.1944 24.0727L22.1773 24.0726L15.2834 24.056L15.2846 23.556L15.2834 24.056C14.4897 24.054 13.8474 23.4091 13.8494 22.615C13.8513 21.8211 14.4964 21.179 15.2903 21.1809L15.2903 21.1809L18.719 21.1892L5.53639 8.0066C4.975 7.44521 4.975 6.53505 5.53639 5.97367C6.09778 5.41228 7.00793 5.41228 7.56932 5.97367L20.7519 19.1563M23.6353 22.6396C23.6353 22.6376 23.6353 22.6356 23.6353 22.6336L20.7519 19.1563M22.1964 24.0726C22.1957 24.0726 22.1951 24.0726 22.1944 24.0726L22.1964 24.0726Z" fill="#2BC155" stroke="#2BC155" />
														</svg>
													</span>
												</td>
												<td>
													<div class="font-w600 wspace-no">
														<span class="me-1">
															<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																<path d="M12 0C5.3726 0 0 5.3726 0 12C0 18.6274 5.3726 24 12 24C18.6274 24 24 18.6274 24 12C23.9924 5.37574 18.6243 0.00758581 12 0ZM16.2857 18.0001H9.42866C8.9552 18.0001 8.57147 17.6164 8.57147 17.1429C8.57147 17.1024 8.57434 17.0618 8.5801 17.0216L9.22515 12.5054L7.92222 12.8313C7.85421 12.8486 7.78437 12.8572 7.71427 12.8572C7.24081 12.8567 6.85759 12.4727 6.85785 11.9992C6.85838 11.6063 7.12571 11.2642 7.50683 11.1684L9.48674 10.6735L10.2942 5.0213C10.3612 4.55254 10.7954 4.22714 11.2642 4.2941C11.7329 4.36107 12.0583 4.79529 11.9914 5.26404L11.2825 10.2247L14.3636 9.4543C14.8222 9.33737 15.2886 9.61439 15.4053 10.0729C15.5222 10.5315 15.2452 10.9979 14.7866 11.1148C14.784 11.1153 14.7814 11.1161 14.7788 11.1166L11.0204 12.0562L10.4164 16.2857H16.2857C16.7592 16.2857 17.1429 16.6695 17.1429 17.1429C17.1429 17.6161 16.7592 18.0001 16.2857 18.0001Z" fill="#5F5F5F" />
															</svg>
														</span>
														Litecoin
													</div>
												</td>
												<td class="font-w500">06:24:45 AM</td>
												<td class="font-w600 text-center">+$7,762</td>
												<td>
													<a class="btn-link text-success float-end" href="javascript:void(0);">Completed</a>
												</td>
											</tr>
											<tr>
												<td>
													<span class="bgl-success p-3 d-inline-block">
														<svg width="29" height="29" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg">
															<path d="M23.6186 15.7207L23.6186 15.7207L23.6353 22.6289C23.6354 22.6328 23.6354 22.6363 23.6353 22.6396M23.6186 15.7207L23.1353 22.6341L23.6353 22.635C23.6353 22.6481 23.6347 22.6583 23.6345 22.6627L23.6344 22.6642C23.6346 22.6609 23.6351 22.652 23.6353 22.6407C23.6353 22.6403 23.6353 22.64 23.6353 22.6396M23.6186 15.7207C23.6167 14.9268 22.9717 14.2847 22.1777 14.2866C21.3838 14.2885 20.7417 14.9336 20.7436 15.7275L20.7436 15.7275L20.7519 19.1563M23.6186 15.7207L20.7519 19.1563M23.6353 22.6396C23.6329 23.4282 22.9931 24.0705 22.2017 24.0726C22.2 24.0726 22.1983 24.0727 22.1965 24.0727L22.1944 24.0727L22.1773 24.0726L15.2834 24.056L15.2846 23.556L15.2834 24.056C14.4897 24.054 13.8474 23.4091 13.8494 22.615C13.8513 21.8211 14.4964 21.179 15.2903 21.1809L15.2903 21.1809L18.719 21.1892L5.53639 8.0066C4.975 7.44521 4.975 6.53505 5.53639 5.97367C6.09778 5.41228 7.00793 5.41228 7.56932 5.97367L20.7519 19.1563M23.6353 22.6396C23.6353 22.6376 23.6353 22.6356 23.6353 22.6336L20.7519 19.1563M22.1964 24.0726C22.1957 24.0726 22.1951 24.0726 22.1944 24.0726L22.1964 24.0726Z" fill="#2BC155" stroke="#2BC155" />
														</svg>
													</span>
												</td>
												<td>
													<div class="font-w600 wspace-no">
														<span class="me-1">
															<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																<path d="M16 9.50011C15.9992 8.67201 15.216 8.00092 14.2501 8H9V11H14.2501C15.216 10.9993 15.9992 10.328 16 9.50011Z" fill="#FFAB2D" />
																<path d="M9 16H14.2501C15.2165 16 16 15.3285 16 14.5001C16 13.6715 15.2165 13 14.2501 13H9V16Z" fill="#FFAB2D" />
																<path d="M12 0C5.3726 0 0 5.3726 0 12C0 18.6274 5.3726 24 12 24C18.6274 24 24 18.6274 24 12C23.9924 5.37574 18.6243 0.00758581 12 0ZM18.0001 14.5713C17.9978 16.4641 16.4641 17.9978 14.5716 17.9999V18.8571C14.5716 19.3305 14.1876 19.7143 13.7144 19.7143C13.2409 19.7143 12.8572 19.3305 12.8572 18.8571V17.9999H11.1431V18.8571C11.1431 19.3305 10.7591 19.7143 10.2859 19.7143C9.8124 19.7143 9.42866 19.3305 9.42866 18.8571V17.9999H6.85733C6.38387 17.9999 6.00013 17.6161 6.00013 17.1429C6.00013 16.6695 6.38387 16.2857 6.85733 16.2857H7.71427V7.71427H6.85733C6.38387 7.71427 6.00013 7.33053 6.00013 6.85707C6.00013 6.38361 6.38387 5.99987 6.85733 5.99987H9.42866V5.14293C9.42866 4.66947 9.8124 4.28573 10.2859 4.28573C10.7593 4.28573 11.1431 4.66947 11.1431 5.14293V5.99987H12.8572V5.14293C12.8572 4.66947 13.2409 4.28573 13.7144 4.28573C14.1879 4.28573 14.5716 4.66947 14.5716 5.14293V5.99987C16.4571 5.99202 17.992 7.5139 18.0001 9.39937C18.0043 10.3978 17.5714 11.3481 16.8152 12C17.5643 12.6445 17.9967 13.5828 18.0001 14.5713Z" fill="#FFAB2D" />
															</svg>
														</span>
														Bitcoin
													</div>
												</td>
												<td class="font-w500">06:24:45 AM</td>
												<td class="font-w600 text-center">+$5,553</td>
												<td>
													<a class="btn-link text-success float-end" href="javascript:void(0);">Completed</a>
												</td>
											</tr>
											<tr>
												<td>
													<span class="bgl-danger p-3  d-inline-block">
														<svg width="29" height="29" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg">
															<path d="M5.13185 13.9043L5.13185 13.9043L5.11515 6.99607C5.11511 6.99224 5.11513 6.98868 5.11517 6.98542M5.13185 13.9043L5.61517 6.99089L5.11517 6.99005C5.11519 6.97692 5.11575 6.96665 5.116 6.96234L5.11608 6.96082C5.11588 6.96411 5.11535 6.97298 5.11519 6.98431C5.11518 6.98468 5.11517 6.98505 5.11517 6.98542M5.13185 13.9043C5.13378 14.6982 5.77881 15.3403 6.57281 15.3384C7.36672 15.3365 8.00877 14.6914 8.00689 13.8975L8.00689 13.8975L7.99856 10.4687M5.13185 13.9043L7.99856 10.4687M5.11517 6.98542C5.11755 6.19684 5.75739 5.55451 6.54875 5.55238C6.55044 5.55236 6.5522 5.55235 6.554 5.55234L6.55606 5.55234L6.57321 5.55239L13.4671 5.56905L13.4658 6.06905L13.4671 5.56905C14.2608 5.57098 14.903 6.21593 14.9011 7.01004C14.8992 7.80394 14.2541 8.44597 13.4602 8.44409L13.4602 8.4441L10.0315 8.43582L23.2141 21.6184C23.7755 22.1798 23.7755 23.0899 23.2141 23.6513C22.6527 24.2127 21.7426 24.2127 21.1812 23.6513L7.99856 10.4687M5.11517 6.98542C5.11516 6.98743 5.11517 6.98943 5.11517 6.99144L7.99856 10.4687M6.5541 5.55237C6.55474 5.55237 6.5554 5.55237 6.55606 5.55238L6.5541 5.55237Z" fill="#FF2E2E" stroke="#FF2E2E" />
														</svg>
													</span>
												</td>
												<td>
													<div class="font-w600 wspace-no">
														<span class="me-1">
															<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																<path d="M12 0C5.3726 0 0 5.3726 0 12C0 18.6274 5.3726 24 12 24C18.6274 24 24 18.6274 24 12C23.9924 5.37574 18.6243 0.00758581 12 0ZM17.8879 10.6801C17.4417 11.0743 16.9263 11.3824 16.3679 11.5885C15.9726 11.7164 15.6111 11.9312 15.3098 12.2174C14.9098 13.1698 15.1554 14.2713 15.9227 14.9637C15.9488 14.9899 15.9734 15.0179 15.9962 15.0474C16.9614 16.2842 16.8633 18.0438 15.7668 19.1657C14.5528 20.3776 12.5865 20.3776 11.3722 19.1657C10.6039 18.2437 10.3528 16.9962 10.7044 15.8486C10.7894 15.1855 10.5626 14.5201 10.0899 14.0471C9.62093 13.5951 8.97064 13.383 8.32532 13.4711C7.17777 13.8222 5.93055 13.5703 5.009 12.8017C3.79553 11.5898 3.79448 9.6238 5.00639 8.41059C5.00717 8.40955 5.00822 8.40876 5.009 8.40798C6.1304 7.31065 7.89083 7.21256 9.12732 8.17857C9.99289 9.03394 11.2752 9.32194 11.9566 8.86339C12.2438 8.56283 12.4588 8.20107 12.5859 7.8053C12.7921 7.24735 13.0997 6.73256 13.4934 6.28682C14.7068 5.07335 16.6739 5.07335 17.8874 6.28656C19.1011 7.50003 19.1011 9.46712 17.8879 10.6806V10.6801Z" fill="#2B98D6" />
																<path d="M14.6784 7.39816C14.4502 7.69123 14.2697 8.01851 14.1441 8.368C13.9151 9.05703 13.4924 9.66563 12.9269 10.1211C11.3324 10.9773 9.36089 10.6462 8.13349 9.31614C7.59153 8.95261 6.86908 9.01592 6.39859 9.4683C5.8676 9.99853 5.86709 10.8591 6.39732 11.3901C6.39783 11.3904 6.39808 11.3909 6.39859 11.3911C6.71872 11.71 7.17465 11.7605 8.1483 11.5823C8.34563 11.5466 8.54577 11.5285 8.74643 11.5285C9.72186 11.5443 10.6549 11.9298 11.3572 12.6068C12.2081 13.4577 12.6027 14.6632 12.4194 15.8526C12.2382 16.8239 12.2887 17.2814 12.6091 17.6023C13.1404 18.1326 14.0007 18.1326 14.5319 17.6023C14.9909 17.1119 15.0363 16.3647 14.6399 15.8224C13.3436 14.5927 13.0316 12.6469 13.8786 11.0736C14.3341 10.5083 14.9426 10.0861 15.6317 9.85787C15.9816 9.73175 16.3092 9.55024 16.602 9.32048C17.1327 8.78948 17.1327 7.92865 16.6017 7.3979C16.0705 6.86715 15.2099 6.86741 14.6792 7.39841L14.6784 7.39816Z" fill="#2B98D6" />
															</svg>
														</span>
														Ripple
													</div>
												</td>
												<td class="font-w500">06:24:45 AM</td>
												<td class="font-w600 text-center">-$912</td>
												<td>
													<a class="btn-link text-danger float-end" href="javascript:void(0);">Canceled</a>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
							<div class="tab-pane" id="Weekly" role="tabpanel">
								<div class="table-responsive">
									<table class="table shadow-hover  card-table">
										<tbody>
											<tr>
												<td>
													<span class="bgl-success p-3  d-inline-block">
														<svg width="29" height="29" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg">
															<path d="M23.6186 15.7207L23.6186 15.7207L23.6353 22.6289C23.6354 22.6328 23.6354 22.6363 23.6353 22.6396M23.6186 15.7207L23.1353 22.6341L23.6353 22.635C23.6353 22.6481 23.6347 22.6583 23.6345 22.6627L23.6344 22.6642C23.6346 22.6609 23.6351 22.652 23.6353 22.6407C23.6353 22.6403 23.6353 22.64 23.6353 22.6396M23.6186 15.7207C23.6167 14.9268 22.9717 14.2847 22.1777 14.2866C21.3838 14.2885 20.7417 14.9336 20.7436 15.7275L20.7436 15.7275L20.7519 19.1563M23.6186 15.7207L20.7519 19.1563M23.6353 22.6396C23.6329 23.4282 22.9931 24.0705 22.2017 24.0726C22.2 24.0726 22.1983 24.0727 22.1965 24.0727L22.1944 24.0727L22.1773 24.0726L15.2834 24.056L15.2846 23.556L15.2834 24.056C14.4897 24.054 13.8474 23.4091 13.8494 22.615C13.8513 21.8211 14.4964 21.179 15.2903 21.1809L15.2903 21.1809L18.719 21.1892L5.53639 8.0066C4.975 7.44521 4.975 6.53505 5.53639 5.97367C6.09778 5.41228 7.00793 5.41228 7.56932 5.97367L20.7519 19.1563M23.6353 22.6396C23.6353 22.6376 23.6353 22.6356 23.6353 22.6336L20.7519 19.1563M22.1964 24.0726C22.1957 24.0726 22.1951 24.0726 22.1944 24.0726L22.1964 24.0726Z" fill="#2BC155" stroke="#2BC155" />
														</svg>
													</span>
												</td>
												<td>
													<div class="font-w600">
														<span class="me-1">
															<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																<path d="M16 9.50011C15.9992 8.67201 15.216 8.00092 14.2501 8H9V11H14.2501C15.216 10.9993 15.9992 10.328 16 9.50011Z" fill="#FFAB2D" />
																<path d="M9 16H14.2501C15.2165 16 16 15.3285 16 14.5001C16 13.6715 15.2165 13 14.2501 13H9V16Z" fill="#FFAB2D" />
																<path d="M12 0C5.3726 0 0 5.3726 0 12C0 18.6274 5.3726 24 12 24C18.6274 24 24 18.6274 24 12C23.9924 5.37574 18.6243 0.00758581 12 0ZM18.0001 14.5713C17.9978 16.4641 16.4641 17.9978 14.5716 17.9999V18.8571C14.5716 19.3305 14.1876 19.7143 13.7144 19.7143C13.2409 19.7143 12.8572 19.3305 12.8572 18.8571V17.9999H11.1431V18.8571C11.1431 19.3305 10.7591 19.7143 10.2859 19.7143C9.8124 19.7143 9.42866 19.3305 9.42866 18.8571V17.9999H6.85733C6.38387 17.9999 6.00013 17.6161 6.00013 17.1429C6.00013 16.6695 6.38387 16.2857 6.85733 16.2857H7.71427V7.71427H6.85733C6.38387 7.71427 6.00013 7.33053 6.00013 6.85707C6.00013 6.38361 6.38387 5.99987 6.85733 5.99987H9.42866V5.14293C9.42866 4.66947 9.8124 4.28573 10.2859 4.28573C10.7593 4.28573 11.1431 4.66947 11.1431 5.14293V5.99987H12.8572V5.14293C12.8572 4.66947 13.2409 4.28573 13.7144 4.28573C14.1879 4.28573 14.5716 4.66947 14.5716 5.14293V5.99987C16.4571 5.99202 17.992 7.5139 18.0001 9.39937C18.0043 10.3978 17.5714 11.3481 16.8152 12C17.5643 12.6445 17.9967 13.5828 18.0001 14.5713Z" fill="#FFAB2D" />
															</svg>
														</span>
														Bitcoin
													</div>
												</td>
												<td class="font-w500">06:24:45 AM</td>
												<td class="font-w600 text-center">+$5,553</td>
												<td><a class="btn-link text-success float-end" href="#">Completed</a></td>
											</tr>
											<tr>
												<td>
													<span class="bgl-danger p-3  d-inline-block">
														<svg width="29" height="29" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg">
															<path d="M5.13185 13.9043L5.13185 13.9043L5.11515 6.99607C5.11511 6.99224 5.11513 6.98868 5.11517 6.98542M5.13185 13.9043L5.61517 6.99089L5.11517 6.99005C5.11519 6.97692 5.11575 6.96665 5.116 6.96234L5.11608 6.96082C5.11588 6.96411 5.11535 6.97298 5.11519 6.98431C5.11518 6.98468 5.11517 6.98505 5.11517 6.98542M5.13185 13.9043C5.13378 14.6982 5.77881 15.3403 6.57281 15.3384C7.36672 15.3365 8.00877 14.6914 8.00689 13.8975L8.00689 13.8975L7.99856 10.4687M5.13185 13.9043L7.99856 10.4687M5.11517 6.98542C5.11755 6.19684 5.75739 5.55451 6.54875 5.55238C6.55044 5.55236 6.5522 5.55235 6.554 5.55234L6.55606 5.55234L6.57321 5.55239L13.4671 5.56905L13.4658 6.06905L13.4671 5.56905C14.2608 5.57098 14.903 6.21593 14.9011 7.01004C14.8992 7.80394 14.2541 8.44597 13.4602 8.44409L13.4602 8.4441L10.0315 8.43582L23.2141 21.6184C23.7755 22.1798 23.7755 23.0899 23.2141 23.6513C22.6527 24.2127 21.7426 24.2127 21.1812 23.6513L7.99856 10.4687M5.11517 6.98542C5.11516 6.98743 5.11517 6.98943 5.11517 6.99144L7.99856 10.4687M6.5541 5.55237C6.55474 5.55237 6.5554 5.55237 6.55606 5.55238L6.5541 5.55237Z" fill="#FF2E2E" stroke="#FF2E2E" />
														</svg>
													</span>
												</td>
												<td>
													<div class="font-w600">
														<span class="me-1">
															<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																<path d="M12.3181 13.6532C12.1138 13.7348 11.8862 13.7348 11.6819 13.6532L9.48938 12.7761L12 17.7974L14.5107 12.7761L12.3181 13.6532Z" fill="#DC3CCC" />
																<path d="M12 11.9341L15.0155 10.7279L12 5.90306L8.9845 10.7279L12 11.9341Z" fill="#DC3CCC" />
																<path d="M12 0C5.3726 0 0 5.3726 0 12C0 18.6274 5.3726 24 12 24C18.6274 24 24 18.6274 24 12C23.9927 5.37574 18.6243 0.00732425 12 0ZM17.0524 11.5263L12.7667 20.0977C12.5551 20.5212 12.04 20.6928 11.6168 20.4812C11.4507 20.3983 11.3162 20.2638 11.2333 20.0977L6.94757 11.5263C6.81443 11.2589 6.8296 10.9416 6.9876 10.6882L11.2733 3.83111C11.5582 3.42984 12.114 3.33515 12.5153 3.62001C12.5972 3.67808 12.6686 3.74923 12.7267 3.83111L17.0121 10.6882C17.1704 10.9416 17.1856 11.2589 17.0524 11.5263Z" fill="#DC3CCC" />
															</svg>
														</span>
														Ethereum
													</div>
												</td>
												<td class="font-w500">06:24:45 AM</td>
												<td class="font-w600 text-center">-$542</td>
												<td>
													<a class="btn-link text-dark float-end" href="#">Pending</a>
												</td>
											</tr>
											<tr>
												<td>
													<span class="bgl-danger p-3  d-inline-block">
														<svg width="29" height="29" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg">
															<path d="M5.13185 13.9043L5.13185 13.9043L5.11515 6.99607C5.11511 6.99224 5.11513 6.98868 5.11517 6.98542M5.13185 13.9043L5.61517 6.99089L5.11517 6.99005C5.11519 6.97692 5.11575 6.96665 5.116 6.96234L5.11608 6.96082C5.11588 6.96411 5.11535 6.97298 5.11519 6.98431C5.11518 6.98468 5.11517 6.98505 5.11517 6.98542M5.13185 13.9043C5.13378 14.6982 5.77881 15.3403 6.57281 15.3384C7.36672 15.3365 8.00877 14.6914 8.00689 13.8975L8.00689 13.8975L7.99856 10.4687M5.13185 13.9043L7.99856 10.4687M5.11517 6.98542C5.11755 6.19684 5.75739 5.55451 6.54875 5.55238C6.55044 5.55236 6.5522 5.55235 6.554 5.55234L6.55606 5.55234L6.57321 5.55239L13.4671 5.56905L13.4658 6.06905L13.4671 5.56905C14.2608 5.57098 14.903 6.21593 14.9011 7.01004C14.8992 7.80394 14.2541 8.44597 13.4602 8.44409L13.4602 8.4441L10.0315 8.43582L23.2141 21.6184C23.7755 22.1798 23.7755 23.0899 23.2141 23.6513C22.6527 24.2127 21.7426 24.2127 21.1812 23.6513L7.99856 10.4687M5.11517 6.98542C5.11516 6.98743 5.11517 6.98943 5.11517 6.99144L7.99856 10.4687M6.5541 5.55237C6.55474 5.55237 6.5554 5.55237 6.55606 5.55238L6.5541 5.55237Z" fill="#FF2E2E" stroke="#FF2E2E" />
														</svg>
													</span>
												</td>
												<td>
													<div class="font-w600">
														<span class="me-1">
															<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																<path d="M12 0C5.3726 0 0 5.3726 0 12C0 18.6274 5.3726 24 12 24C18.6274 24 24 18.6274 24 12C23.9924 5.37574 18.6243 0.00758581 12 0ZM17.8879 10.6801C17.4417 11.0743 16.9263 11.3824 16.3679 11.5885C15.9726 11.7164 15.6111 11.9312 15.3098 12.2174C14.9098 13.1698 15.1554 14.2713 15.9227 14.9637C15.9488 14.9899 15.9734 15.0179 15.9962 15.0474C16.9614 16.2842 16.8633 18.0438 15.7668 19.1657C14.5528 20.3776 12.5865 20.3776 11.3722 19.1657C10.6039 18.2437 10.3528 16.9962 10.7044 15.8486C10.7894 15.1855 10.5626 14.5201 10.0899 14.0471C9.62093 13.5951 8.97064 13.383 8.32532 13.4711C7.17777 13.8222 5.93055 13.5703 5.009 12.8017C3.79553 11.5898 3.79448 9.6238 5.00639 8.41059C5.00717 8.40955 5.00822 8.40876 5.009 8.40798C6.1304 7.31065 7.89083 7.21256 9.12732 8.17857C9.99289 9.03394 11.2752 9.32194 11.9566 8.86339C12.2438 8.56283 12.4588 8.20107 12.5859 7.8053C12.7921 7.24735 13.0997 6.73256 13.4934 6.28682C14.7068 5.07335 16.6739 5.07335 17.8874 6.28656C19.1011 7.50003 19.1011 9.46712 17.8879 10.6806V10.6801Z" fill="#2B98D6" />
																<path d="M14.6784 7.39816C14.4502 7.69123 14.2697 8.01851 14.1441 8.368C13.9151 9.05703 13.4924 9.66563 12.9269 10.1211C11.3324 10.9773 9.36089 10.6462 8.13349 9.31614C7.59153 8.95261 6.86908 9.01592 6.39859 9.4683C5.8676 9.99853 5.86709 10.8591 6.39732 11.3901C6.39783 11.3904 6.39808 11.3909 6.39859 11.3911C6.71872 11.71 7.17465 11.7605 8.1483 11.5823C8.34563 11.5466 8.54577 11.5285 8.74643 11.5285C9.72186 11.5443 10.6549 11.9298 11.3572 12.6068C12.2081 13.4577 12.6027 14.6632 12.4194 15.8526C12.2382 16.8239 12.2887 17.2814 12.6091 17.6023C13.1404 18.1326 14.0007 18.1326 14.5319 17.6023C14.9909 17.1119 15.0363 16.3647 14.6399 15.8224C13.3436 14.5927 13.0316 12.6469 13.8786 11.0736C14.3341 10.5083 14.9426 10.0861 15.6317 9.85787C15.9816 9.73175 16.3092 9.55024 16.602 9.32048C17.1327 8.78948 17.1327 7.92865 16.6017 7.3979C16.0705 6.86715 15.2099 6.86741 14.6792 7.39841L14.6784 7.39816Z" fill="#2B98D6" />
															</svg>
														</span>
														Ripple
													</div>
												</td>
												<td class="font-w500">06:24:45 AM</td>
												<td class="font-w600 text-center">-$912</td>
												<td>
													<a class="btn-link text-danger float-end" href="#">Canceled</a>
												</td>
											</tr>

											<tr>
												<td>
													<span class="bgl-danger p-3  d-inline-block">
														<svg width="29" height="29" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg">
															<path d="M5.13185 13.9043L5.13185 13.9043L5.11515 6.99607C5.11511 6.99224 5.11513 6.98868 5.11517 6.98542M5.13185 13.9043L5.61517 6.99089L5.11517 6.99005C5.11519 6.97692 5.11575 6.96665 5.116 6.96234L5.11608 6.96082C5.11588 6.96411 5.11535 6.97298 5.11519 6.98431C5.11518 6.98468 5.11517 6.98505 5.11517 6.98542M5.13185 13.9043C5.13378 14.6982 5.77881 15.3403 6.57281 15.3384C7.36672 15.3365 8.00877 14.6914 8.00689 13.8975L8.00689 13.8975L7.99856 10.4687M5.13185 13.9043L7.99856 10.4687M5.11517 6.98542C5.11755 6.19684 5.75739 5.55451 6.54875 5.55238C6.55044 5.55236 6.5522 5.55235 6.554 5.55234L6.55606 5.55234L6.57321 5.55239L13.4671 5.56905L13.4658 6.06905L13.4671 5.56905C14.2608 5.57098 14.903 6.21593 14.9011 7.01004C14.8992 7.80394 14.2541 8.44597 13.4602 8.44409L13.4602 8.4441L10.0315 8.43582L23.2141 21.6184C23.7755 22.1798 23.7755 23.0899 23.2141 23.6513C22.6527 24.2127 21.7426 24.2127 21.1812 23.6513L7.99856 10.4687M5.11517 6.98542C5.11516 6.98743 5.11517 6.98943 5.11517 6.99144L7.99856 10.4687M6.5541 5.55237C6.55474 5.55237 6.5554 5.55237 6.55606 5.55238L6.5541 5.55237Z" fill="#FF2E2E" stroke="#FF2E2E" />
														</svg>
													</span>
												</td>
												<td>
													<div class="font-w600">
														<span class="me-1">
															<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																<path d="M12 0C5.3726 0 0 5.3726 0 12C0 18.6274 5.3726 24 12 24C18.6274 24 24 18.6274 24 12C23.9924 5.37574 18.6243 0.00758581 12 0ZM17.8879 10.6801C17.4417 11.0743 16.9263 11.3824 16.3679 11.5885C15.9726 11.7164 15.6111 11.9312 15.3098 12.2174C14.9098 13.1698 15.1554 14.2713 15.9227 14.9637C15.9488 14.9899 15.9734 15.0179 15.9962 15.0474C16.9614 16.2842 16.8633 18.0438 15.7668 19.1657C14.5528 20.3776 12.5865 20.3776 11.3722 19.1657C10.6039 18.2437 10.3528 16.9962 10.7044 15.8486C10.7894 15.1855 10.5626 14.5201 10.0899 14.0471C9.62093 13.5951 8.97064 13.383 8.32532 13.4711C7.17777 13.8222 5.93055 13.5703 5.009 12.8017C3.79553 11.5898 3.79448 9.6238 5.00639 8.41059C5.00717 8.40955 5.00822 8.40876 5.009 8.40798C6.1304 7.31065 7.89083 7.21256 9.12732 8.17857C9.99289 9.03394 11.2752 9.32194 11.9566 8.86339C12.2438 8.56283 12.4588 8.20107 12.5859 7.8053C12.7921 7.24735 13.0997 6.73256 13.4934 6.28682C14.7068 5.07335 16.6739 5.07335 17.8874 6.28656C19.1011 7.50003 19.1011 9.46712 17.8879 10.6806V10.6801Z" fill="#2B98D6" />
																<path d="M14.6784 7.39816C14.4502 7.69123 14.2697 8.01851 14.1441 8.368C13.9151 9.05703 13.4924 9.66563 12.9269 10.1211C11.3324 10.9773 9.36089 10.6462 8.13349 9.31614C7.59153 8.95261 6.86908 9.01592 6.39859 9.4683C5.8676 9.99853 5.86709 10.8591 6.39732 11.3901C6.39783 11.3904 6.39808 11.3909 6.39859 11.3911C6.71872 11.71 7.17465 11.7605 8.1483 11.5823C8.34563 11.5466 8.54577 11.5285 8.74643 11.5285C9.72186 11.5443 10.6549 11.9298 11.3572 12.6068C12.2081 13.4577 12.6027 14.6632 12.4194 15.8526C12.2382 16.8239 12.2887 17.2814 12.6091 17.6023C13.1404 18.1326 14.0007 18.1326 14.5319 17.6023C14.9909 17.1119 15.0363 16.3647 14.6399 15.8224C13.3436 14.5927 13.0316 12.6469 13.8786 11.0736C14.3341 10.5083 14.9426 10.0861 15.6317 9.85787C15.9816 9.73175 16.3092 9.55024 16.602 9.32048C17.1327 8.78948 17.1327 7.92865 16.6017 7.3979C16.0705 6.86715 15.2099 6.86741 14.6792 7.39841L14.6784 7.39816Z" fill="#2B98D6" />
															</svg>
														</span>
														Ripple
													</div>
												</td>
												<td class="font-w500">06:24:45 AM</td>
												<td class="font-w600 text-center">-$912</td>
												<td>
													<a class="btn-link text-danger float-end" href="#">Canceled</a>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
							<div class="tab-pane" id="Today" role="tabpanel">
								<div class="table-responsive">
									<table class="table shadow-hover card-table">
										<tbody>
											<tr>
												<td>
													<span class="bgl-success p-3  d-inline-block">
														<svg width="29" height="29" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg">
															<path d="M23.6186 15.7207L23.6186 15.7207L23.6353 22.6289C23.6354 22.6328 23.6354 22.6363 23.6353 22.6396M23.6186 15.7207L23.1353 22.6341L23.6353 22.635C23.6353 22.6481 23.6347 22.6583 23.6345 22.6627L23.6344 22.6642C23.6346 22.6609 23.6351 22.652 23.6353 22.6407C23.6353 22.6403 23.6353 22.64 23.6353 22.6396M23.6186 15.7207C23.6167 14.9268 22.9717 14.2847 22.1777 14.2866C21.3838 14.2885 20.7417 14.9336 20.7436 15.7275L20.7436 15.7275L20.7519 19.1563M23.6186 15.7207L20.7519 19.1563M23.6353 22.6396C23.6329 23.4282 22.9931 24.0705 22.2017 24.0726C22.2 24.0726 22.1983 24.0727 22.1965 24.0727L22.1944 24.0727L22.1773 24.0726L15.2834 24.056L15.2846 23.556L15.2834 24.056C14.4897 24.054 13.8474 23.4091 13.8494 22.615C13.8513 21.8211 14.4964 21.179 15.2903 21.1809L15.2903 21.1809L18.719 21.1892L5.53639 8.0066C4.975 7.44521 4.975 6.53505 5.53639 5.97367C6.09778 5.41228 7.00793 5.41228 7.56932 5.97367L20.7519 19.1563M23.6353 22.6396C23.6353 22.6376 23.6353 22.6356 23.6353 22.6336L20.7519 19.1563M22.1964 24.0726C22.1957 24.0726 22.1951 24.0726 22.1944 24.0726L22.1964 24.0726Z" fill="#2BC155" stroke="#2BC155" />
														</svg>
													</span>
												</td>
												<td>
													<div class="font-w600">
														<span class="me-1">
															<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																<path d="M16 9.50011C15.9992 8.67201 15.216 8.00092 14.2501 8H9V11H14.2501C15.216 10.9993 15.9992 10.328 16 9.50011Z" fill="#FFAB2D" />
																<path d="M9 16H14.2501C15.2165 16 16 15.3285 16 14.5001C16 13.6715 15.2165 13 14.2501 13H9V16Z" fill="#FFAB2D" />
																<path d="M12 0C5.3726 0 0 5.3726 0 12C0 18.6274 5.3726 24 12 24C18.6274 24 24 18.6274 24 12C23.9924 5.37574 18.6243 0.00758581 12 0ZM18.0001 14.5713C17.9978 16.4641 16.4641 17.9978 14.5716 17.9999V18.8571C14.5716 19.3305 14.1876 19.7143 13.7144 19.7143C13.2409 19.7143 12.8572 19.3305 12.8572 18.8571V17.9999H11.1431V18.8571C11.1431 19.3305 10.7591 19.7143 10.2859 19.7143C9.8124 19.7143 9.42866 19.3305 9.42866 18.8571V17.9999H6.85733C6.38387 17.9999 6.00013 17.6161 6.00013 17.1429C6.00013 16.6695 6.38387 16.2857 6.85733 16.2857H7.71427V7.71427H6.85733C6.38387 7.71427 6.00013 7.33053 6.00013 6.85707C6.00013 6.38361 6.38387 5.99987 6.85733 5.99987H9.42866V5.14293C9.42866 4.66947 9.8124 4.28573 10.2859 4.28573C10.7593 4.28573 11.1431 4.66947 11.1431 5.14293V5.99987H12.8572V5.14293C12.8572 4.66947 13.2409 4.28573 13.7144 4.28573C14.1879 4.28573 14.5716 4.66947 14.5716 5.14293V5.99987C16.4571 5.99202 17.992 7.5139 18.0001 9.39937C18.0043 10.3978 17.5714 11.3481 16.8152 12C17.5643 12.6445 17.9967 13.5828 18.0001 14.5713Z" fill="#FFAB2D" />
															</svg>
														</span>
														Bitcoin
													</div>
												</td>
												<td class="font-w500">06:24:45 AM</td>
												<td class="font-w600 text-center">+$5,553</td>
												<td><a class="btn-link text-success float-end" href="#">Completed</a></td>
											</tr>
											<tr>
												<td>
													<span class="bgl-danger p-3  d-inline-block">
														<svg width="29" height="29" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg">
															<path d="M5.13185 13.9043L5.13185 13.9043L5.11515 6.99607C5.11511 6.99224 5.11513 6.98868 5.11517 6.98542M5.13185 13.9043L5.61517 6.99089L5.11517 6.99005C5.11519 6.97692 5.11575 6.96665 5.116 6.96234L5.11608 6.96082C5.11588 6.96411 5.11535 6.97298 5.11519 6.98431C5.11518 6.98468 5.11517 6.98505 5.11517 6.98542M5.13185 13.9043C5.13378 14.6982 5.77881 15.3403 6.57281 15.3384C7.36672 15.3365 8.00877 14.6914 8.00689 13.8975L8.00689 13.8975L7.99856 10.4687M5.13185 13.9043L7.99856 10.4687M5.11517 6.98542C5.11755 6.19684 5.75739 5.55451 6.54875 5.55238C6.55044 5.55236 6.5522 5.55235 6.554 5.55234L6.55606 5.55234L6.57321 5.55239L13.4671 5.56905L13.4658 6.06905L13.4671 5.56905C14.2608 5.57098 14.903 6.21593 14.9011 7.01004C14.8992 7.80394 14.2541 8.44597 13.4602 8.44409L13.4602 8.4441L10.0315 8.43582L23.2141 21.6184C23.7755 22.1798 23.7755 23.0899 23.2141 23.6513C22.6527 24.2127 21.7426 24.2127 21.1812 23.6513L7.99856 10.4687M5.11517 6.98542C5.11516 6.98743 5.11517 6.98943 5.11517 6.99144L7.99856 10.4687M6.5541 5.55237C6.55474 5.55237 6.5554 5.55237 6.55606 5.55238L6.5541 5.55237Z" fill="#FF2E2E" stroke="#FF2E2E" />
														</svg>
													</span>
												</td>
												<td>
													<div class="font-w600">
														<span class="me-1">
															<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																<path d="M12.3181 13.6532C12.1138 13.7348 11.8862 13.7348 11.6819 13.6532L9.48938 12.7761L12 17.7974L14.5107 12.7761L12.3181 13.6532Z" fill="#DC3CCC" />
																<path d="M12 11.9341L15.0155 10.7279L12 5.90306L8.9845 10.7279L12 11.9341Z" fill="#DC3CCC" />
																<path d="M12 0C5.3726 0 0 5.3726 0 12C0 18.6274 5.3726 24 12 24C18.6274 24 24 18.6274 24 12C23.9927 5.37574 18.6243 0.00732425 12 0ZM17.0524 11.5263L12.7667 20.0977C12.5551 20.5212 12.04 20.6928 11.6168 20.4812C11.4507 20.3983 11.3162 20.2638 11.2333 20.0977L6.94757 11.5263C6.81443 11.2589 6.8296 10.9416 6.9876 10.6882L11.2733 3.83111C11.5582 3.42984 12.114 3.33515 12.5153 3.62001C12.5972 3.67808 12.6686 3.74923 12.7267 3.83111L17.0121 10.6882C17.1704 10.9416 17.1856 11.2589 17.0524 11.5263Z" fill="#DC3CCC" />
															</svg>
														</span>
														Ethereum
													</div>
												</td>
												<td class="font-w500">06:24:45 AM</td>
												<td class="font-w600 text-center">-$542</td>
												<td>
													<a class="btn-link text-dark float-end" href="#">Pending</a>
												</td>
											</tr>
											<tr>
												<td>
													<span class="bgl-danger p-3  d-inline-block">
														<svg width="29" height="29" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg">
															<path d="M5.13185 13.9043L5.13185 13.9043L5.11515 6.99607C5.11511 6.99224 5.11513 6.98868 5.11517 6.98542M5.13185 13.9043L5.61517 6.99089L5.11517 6.99005C5.11519 6.97692 5.11575 6.96665 5.116 6.96234L5.11608 6.96082C5.11588 6.96411 5.11535 6.97298 5.11519 6.98431C5.11518 6.98468 5.11517 6.98505 5.11517 6.98542M5.13185 13.9043C5.13378 14.6982 5.77881 15.3403 6.57281 15.3384C7.36672 15.3365 8.00877 14.6914 8.00689 13.8975L8.00689 13.8975L7.99856 10.4687M5.13185 13.9043L7.99856 10.4687M5.11517 6.98542C5.11755 6.19684 5.75739 5.55451 6.54875 5.55238C6.55044 5.55236 6.5522 5.55235 6.554 5.55234L6.55606 5.55234L6.57321 5.55239L13.4671 5.56905L13.4658 6.06905L13.4671 5.56905C14.2608 5.57098 14.903 6.21593 14.9011 7.01004C14.8992 7.80394 14.2541 8.44597 13.4602 8.44409L13.4602 8.4441L10.0315 8.43582L23.2141 21.6184C23.7755 22.1798 23.7755 23.0899 23.2141 23.6513C22.6527 24.2127 21.7426 24.2127 21.1812 23.6513L7.99856 10.4687M5.11517 6.98542C5.11516 6.98743 5.11517 6.98943 5.11517 6.99144L7.99856 10.4687M6.5541 5.55237C6.55474 5.55237 6.5554 5.55237 6.55606 5.55238L6.5541 5.55237Z" fill="#FF2E2E" stroke="#FF2E2E" />
														</svg>
													</span>
												</td>
												<td>
													<div class="font-w600">
														<span class="me-1">
															<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																<path d="M12 0C5.3726 0 0 5.3726 0 12C0 18.6274 5.3726 24 12 24C18.6274 24 24 18.6274 24 12C23.9924 5.37574 18.6243 0.00758581 12 0ZM17.8879 10.6801C17.4417 11.0743 16.9263 11.3824 16.3679 11.5885C15.9726 11.7164 15.6111 11.9312 15.3098 12.2174C14.9098 13.1698 15.1554 14.2713 15.9227 14.9637C15.9488 14.9899 15.9734 15.0179 15.9962 15.0474C16.9614 16.2842 16.8633 18.0438 15.7668 19.1657C14.5528 20.3776 12.5865 20.3776 11.3722 19.1657C10.6039 18.2437 10.3528 16.9962 10.7044 15.8486C10.7894 15.1855 10.5626 14.5201 10.0899 14.0471C9.62093 13.5951 8.97064 13.383 8.32532 13.4711C7.17777 13.8222 5.93055 13.5703 5.009 12.8017C3.79553 11.5898 3.79448 9.6238 5.00639 8.41059C5.00717 8.40955 5.00822 8.40876 5.009 8.40798C6.1304 7.31065 7.89083 7.21256 9.12732 8.17857C9.99289 9.03394 11.2752 9.32194 11.9566 8.86339C12.2438 8.56283 12.4588 8.20107 12.5859 7.8053C12.7921 7.24735 13.0997 6.73256 13.4934 6.28682C14.7068 5.07335 16.6739 5.07335 17.8874 6.28656C19.1011 7.50003 19.1011 9.46712 17.8879 10.6806V10.6801Z" fill="#2B98D6" />
																<path d="M14.6784 7.39816C14.4502 7.69123 14.2697 8.01851 14.1441 8.368C13.9151 9.05703 13.4924 9.66563 12.9269 10.1211C11.3324 10.9773 9.36089 10.6462 8.13349 9.31614C7.59153 8.95261 6.86908 9.01592 6.39859 9.4683C5.8676 9.99853 5.86709 10.8591 6.39732 11.3901C6.39783 11.3904 6.39808 11.3909 6.39859 11.3911C6.71872 11.71 7.17465 11.7605 8.1483 11.5823C8.34563 11.5466 8.54577 11.5285 8.74643 11.5285C9.72186 11.5443 10.6549 11.9298 11.3572 12.6068C12.2081 13.4577 12.6027 14.6632 12.4194 15.8526C12.2382 16.8239 12.2887 17.2814 12.6091 17.6023C13.1404 18.1326 14.0007 18.1326 14.5319 17.6023C14.9909 17.1119 15.0363 16.3647 14.6399 15.8224C13.3436 14.5927 13.0316 12.6469 13.8786 11.0736C14.3341 10.5083 14.9426 10.0861 15.6317 9.85787C15.9816 9.73175 16.3092 9.55024 16.602 9.32048C17.1327 8.78948 17.1327 7.92865 16.6017 7.3979C16.0705 6.86715 15.2099 6.86741 14.6792 7.39841L14.6784 7.39816Z" fill="#2B98D6" />
															</svg>
														</span>
														Ripple
													</div>
												</td>
												<td class="font-w500">06:24:45 AM</td>
												<td class="font-w600 text-center">-$912</td>
												<td>
													<a class="btn-link text-danger float-end" href="#">Canceled</a>
												</td>
											</tr>
											<tr>
												<td>
													<span class="bgl-success p-3  d-inline-block">
														<svg width="29" height="29" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg">
															<path d="M23.6186 15.7207L23.6186 15.7207L23.6353 22.6289C23.6354 22.6328 23.6354 22.6363 23.6353 22.6396M23.6186 15.7207L23.1353 22.6341L23.6353 22.635C23.6353 22.6481 23.6347 22.6583 23.6345 22.6627L23.6344 22.6642C23.6346 22.6609 23.6351 22.652 23.6353 22.6407C23.6353 22.6403 23.6353 22.64 23.6353 22.6396M23.6186 15.7207C23.6167 14.9268 22.9717 14.2847 22.1777 14.2866C21.3838 14.2885 20.7417 14.9336 20.7436 15.7275L20.7436 15.7275L20.7519 19.1563M23.6186 15.7207L20.7519 19.1563M23.6353 22.6396C23.6329 23.4282 22.9931 24.0705 22.2017 24.0726C22.2 24.0726 22.1983 24.0727 22.1965 24.0727L22.1944 24.0727L22.1773 24.0726L15.2834 24.056L15.2846 23.556L15.2834 24.056C14.4897 24.054 13.8474 23.4091 13.8494 22.615C13.8513 21.8211 14.4964 21.179 15.2903 21.1809L15.2903 21.1809L18.719 21.1892L5.53639 8.0066C4.975 7.44521 4.975 6.53505 5.53639 5.97367C6.09778 5.41228 7.00793 5.41228 7.56932 5.97367L20.7519 19.1563M23.6353 22.6396C23.6353 22.6376 23.6353 22.6356 23.6353 22.6336L20.7519 19.1563M22.1964 24.0726C22.1957 24.0726 22.1951 24.0726 22.1944 24.0726L22.1964 24.0726Z" fill="#2BC155" stroke="#2BC155" />
														</svg>
													</span>
												</td>
												<td>
													<div class="font-w600">
														<span class="me-1">
															<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																<path d="M12 0C5.3726 0 0 5.3726 0 12C0 18.6274 5.3726 24 12 24C18.6274 24 24 18.6274 24 12C23.9924 5.37574 18.6243 0.00758581 12 0ZM16.2857 18.0001H9.42866C8.9552 18.0001 8.57147 17.6164 8.57147 17.1429C8.57147 17.1024 8.57434 17.0618 8.5801 17.0216L9.22515 12.5054L7.92222 12.8313C7.85421 12.8486 7.78437 12.8572 7.71427 12.8572C7.24081 12.8567 6.85759 12.4727 6.85785 11.9992C6.85838 11.6063 7.12571 11.2642 7.50683 11.1684L9.48674 10.6735L10.2942 5.0213C10.3612 4.55254 10.7954 4.22714 11.2642 4.2941C11.7329 4.36107 12.0583 4.79529 11.9914 5.26404L11.2825 10.2247L14.3636 9.4543C14.8222 9.33737 15.2886 9.61439 15.4053 10.0729C15.5222 10.5315 15.2452 10.9979 14.7866 11.1148C14.784 11.1153 14.7814 11.1161 14.7788 11.1166L11.0204 12.0562L10.4164 16.2857H16.2857C16.7592 16.2857 17.1429 16.6695 17.1429 17.1429C17.1429 17.6161 16.7592 18.0001 16.2857 18.0001Z" fill="#5F5F5F" />
															</svg>
														</span>
														Litecoin
													</div>
												</td>
												<td class="font-w500">06:24:45 AM</td>
												<td class="font-w600 text-center">+$7,762</td>
												<td>
													<a class="btn-link text-success float-end" href="#">Completed</a>
												</td>
											</tr>
											<tr>
												<td>
													<span class="bgl-success p-3  d-inline-block">
														<svg width="29" height="29" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg">
															<path d="M23.6186 15.7207L23.6186 15.7207L23.6353 22.6289C23.6354 22.6328 23.6354 22.6363 23.6353 22.6396M23.6186 15.7207L23.1353 22.6341L23.6353 22.635C23.6353 22.6481 23.6347 22.6583 23.6345 22.6627L23.6344 22.6642C23.6346 22.6609 23.6351 22.652 23.6353 22.6407C23.6353 22.6403 23.6353 22.64 23.6353 22.6396M23.6186 15.7207C23.6167 14.9268 22.9717 14.2847 22.1777 14.2866C21.3838 14.2885 20.7417 14.9336 20.7436 15.7275L20.7436 15.7275L20.7519 19.1563M23.6186 15.7207L20.7519 19.1563M23.6353 22.6396C23.6329 23.4282 22.9931 24.0705 22.2017 24.0726C22.2 24.0726 22.1983 24.0727 22.1965 24.0727L22.1944 24.0727L22.1773 24.0726L15.2834 24.056L15.2846 23.556L15.2834 24.056C14.4897 24.054 13.8474 23.4091 13.8494 22.615C13.8513 21.8211 14.4964 21.179 15.2903 21.1809L15.2903 21.1809L18.719 21.1892L5.53639 8.0066C4.975 7.44521 4.975 6.53505 5.53639 5.97367C6.09778 5.41228 7.00793 5.41228 7.56932 5.97367L20.7519 19.1563M23.6353 22.6396C23.6353 22.6376 23.6353 22.6356 23.6353 22.6336L20.7519 19.1563M22.1964 24.0726C22.1957 24.0726 22.1951 24.0726 22.1944 24.0726L22.1964 24.0726Z" fill="#2BC155" stroke="#2BC155" />
														</svg>
													</span>
												</td>
												<td>
													<div class="font-w600">
														<span class="me-1">
															<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																<path d="M16 9.50011C15.9992 8.67201 15.216 8.00092 14.2501 8H9V11H14.2501C15.216 10.9993 15.9992 10.328 16 9.50011Z" fill="#FFAB2D" />
																<path d="M9 16H14.2501C15.2165 16 16 15.3285 16 14.5001C16 13.6715 15.2165 13 14.2501 13H9V16Z" fill="#FFAB2D" />
																<path d="M12 0C5.3726 0 0 5.3726 0 12C0 18.6274 5.3726 24 12 24C18.6274 24 24 18.6274 24 12C23.9924 5.37574 18.6243 0.00758581 12 0ZM18.0001 14.5713C17.9978 16.4641 16.4641 17.9978 14.5716 17.9999V18.8571C14.5716 19.3305 14.1876 19.7143 13.7144 19.7143C13.2409 19.7143 12.8572 19.3305 12.8572 18.8571V17.9999H11.1431V18.8571C11.1431 19.3305 10.7591 19.7143 10.2859 19.7143C9.8124 19.7143 9.42866 19.3305 9.42866 18.8571V17.9999H6.85733C6.38387 17.9999 6.00013 17.6161 6.00013 17.1429C6.00013 16.6695 6.38387 16.2857 6.85733 16.2857H7.71427V7.71427H6.85733C6.38387 7.71427 6.00013 7.33053 6.00013 6.85707C6.00013 6.38361 6.38387 5.99987 6.85733 5.99987H9.42866V5.14293C9.42866 4.66947 9.8124 4.28573 10.2859 4.28573C10.7593 4.28573 11.1431 4.66947 11.1431 5.14293V5.99987H12.8572V5.14293C12.8572 4.66947 13.2409 4.28573 13.7144 4.28573C14.1879 4.28573 14.5716 4.66947 14.5716 5.14293V5.99987C16.4571 5.99202 17.992 7.5139 18.0001 9.39937C18.0043 10.3978 17.5714 11.3481 16.8152 12C17.5643 12.6445 17.9967 13.5828 18.0001 14.5713Z" fill="#FFAB2D" />
															</svg>
														</span>
														Bitcoin
													</div>
												</td>
												<td class="font-w500">06:24:45 AM</td>
												<td class="font-w600 text-center">+$5,553</td>
												<td>
													<a class="btn-link text-success float-end" href="javascript:void(0);">Completed</a>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-xxl-4 col-lg-6 col-sm-6">
					<div class="card">
						<div class="card-header border-0">
							<h4 class="mb-0 text-black fs-20">Sell Order</h4>
							<div class="dropdown custom-dropdown mb-0">
								<div class="btn sharp btn-primary tp-btn" data-bs-toggle="dropdown">
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<rect x="0" y="0" width="24" height="24"></rect>
											<circle fill="#000000" cx="12" cy="5" r="2"></circle>
											<circle fill="#000000" cx="12" cy="12" r="2"></circle>
											<circle fill="#000000" cx="12" cy="19" r="2"></circle>
										</g>
									</svg>
								</div>
								<div class="dropdown-menu dropdown-menu-end">
									<a class="dropdown-item" href="javascript:void(0);">Details</a>
									<a class="dropdown-item text-danger" href="javascript:void(0);">Cancel</a>
								</div>
							</div>
						</div>
						<div class="card-body p-0">
							<select class="form-control custom-image-select image-select mt-3 mt-sm-0">
								<option data-thumbnail="public/assets/images/coin/eth.png">Ethereum</option>
								<option data-thumbnail="public/assets/images/coin/rip.png">Ripple</option>
								<option data-thumbnail="public/assets/images/coin/btc.png">Bitcoin</option>
								<option data-thumbnail="public/assets/images/avatar/1.jpg">Litecoin</option>
							</select>

							<div class="table-responsive">
								<table class="table text-center bg-secondary-hover card-table">
									<thead>
										<tr>
											<th class="text-left">Price</th>
											<th>Amount</th>
											<th class="text-right">Total</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td class="text-left">82.3</td>
											<td>0.15</td>
											<td class="text-right">$134,12</td>
										</tr>
										<tr>
											<td class="text-left">83.9</td>
											<td>0.18</td>
											<td class="text-right">$237,31</td>
										</tr>
										<tr>
											<td class="text-left">84.2</td>
											<td>0.25</td>
											<td class="text-right">$252,58</td>
										</tr>
										<tr>
											<td class="text-left">86.2</td>
											<td>0.35</td>
											<td class="text-right">$126,26</td>
										</tr>
										<tr>
											<td class="text-left">91.6</td>
											<td>0.75</td>
											<td class="text-right">$46,92</td>
										</tr>
										<tr>
											<td class="text-left">92.6</td>
											<td>0.21</td>
											<td class="text-right">$123,27</td>
										</tr>
										<tr>
											<td class="text-left">93.9</td>
											<td>0.55</td>
											<td class="text-right">$212,56</td>
										</tr>
										<tr>
											<td class="text-left">94.2</td>
											<td>0.18</td>
											<td class="text-right">$129,26</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
						<div class="card-footer border-0 pt-0 text-center">
							<a href="javascript:void(0);" class="btn-link">Show more <i class="fa fa-caret-right ms-2 scale-2"></i></a>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-xxl-4 col-lg-6 col-sm-6">
					<div class="card">
						<div class="card-header border-0">
							<h4 class="mb-0 text-black fs-20">Buy Order</h4>
							<div class="dropdown custom-dropdown mb-0">
								<div class="btn sharp btn-primary tp-btn" data-bs-toggle="dropdown">
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<rect x="0" y="0" width="24" height="24"></rect>
											<circle fill="#000000" cx="12" cy="5" r="2"></circle>
											<circle fill="#000000" cx="12" cy="12" r="2"></circle>
											<circle fill="#000000" cx="12" cy="19" r="2"></circle>
										</g>
									</svg>
								</div>
								<div class="dropdown-menu dropdown-menu-end">
									<a class="dropdown-item" href="javascript:void(0);">Details</a>
									<a class="dropdown-item text-danger" href="javascript:void(0);">Cancel</a>
								</div>
							</div>
						</div>
						<div class="card-body p-0">
							<select class="form-control custom-image-select image-select mt-3 mt-sm-0">
								<option data-thumbnail="public/assets/images/coin/rip.png">Ripple</option>
								<option data-thumbnail="public/assets/images/coin/eth.png">Ethereum</option>
								<option data-thumbnail="public/assets/images/coin/btc.png">Bitcoin</option>
								<option data-thumbnail="public/assets/images/coin/ltc.png">Litecoin</option>
							</select>
							<div class="table-responsive">
								<table class="table text-center bg-info-hover card-table">
									<thead>
										<tr>
											<th class="text-left">Price</th>
											<th>Amount</th>
											<th class="text-right">Total</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td class="text-left">83.9</td>
											<td>0.18</td>
											<td class="text-right">$237,31</td>
										</tr>
										<tr>
											<td class="text-left">82.3</td>
											<td>0.15</td>
											<td class="text-right">$134,12</td>
										</tr>
										<tr>
											<td class="text-left">84.2</td>
											<td>0.25</td>
											<td class="text-right">$252,58</td>
										</tr>
										<tr>
											<td class="text-left">91.6</td>
											<td>0.75</td>
											<td class="text-right">$46,92</td>
										</tr>
										<tr>
											<td class="text-left">94.2</td>
											<td>0.18</td>
											<td class="text-right">$129,26</td>
										</tr>
										<tr>
											<td class="text-left">86.2</td>
											<td>0.35</td>
											<td class="text-right">$126,26</td>
										</tr>
										<tr>
											<td class="text-left">93.9</td>
											<td>0.55</td>
											<td class="text-right">$212,56</td>
										</tr>
										<tr>
											<td class="text-left">92.6</td>
											<td>0.21</td>
											<td class="text-right">$123,27</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
						<div class="card-footer border-0 pt-0 text-center">
							<a href="javascript:void(0);" class="btn-link">Show more <i class="fa fa-caret-right ms-2 scale-2"></i></a>
						</div>
					</div>
				</div>
				<div class="col-xl-6 col-xxl-8 col-lg-12">
					<div class="card">
						<div class="card-header border-0 pb-0 d-block d-md-flex">
							<div class="mb-2">
								<h4 class="fs-20 text-black">Quick Trade</h4>
								<p class="mb-0 fs-13">Lorem ipsum dolor sit amet, consectetur</p>
							</div>
							<select class="form-control custom-image-select style-1 image-select mt-3 mt-sm-0 mb-2">
								<option data-thumbnail="public/assets/images/coin/btc.png">561,511 Btc</option>
								<option data-thumbnail="public/assets/images/coin/eth.png">758,155 Eth</option>
								<option data-thumbnail="public/assets/images/coin/ltc.png">345,781 Ltc</option>
							</select>
						</div>
						<div class="card-body">
							<div class="basic-form">
								<form>
									<div class="form-group">
										<div class="input-group input-group-lg">
											<div class="input-group-prepend">
												<span class="input-group-text bg-transparent border rounded-0">Amount BTC</span>
											</div>
											<input type="number" class="form-control rounded-0" placeholder="0,000000">
										</div>
									</div>
									<div class="form-group">
										<div class="input-group input-group-lg">
											<div class="input-group-prepend">
												<span class="input-group-text bg-transparent border  rounded-0">Price BPL</span>
											</div>
											<input type="number" class="form-control rounded-0" placeholder="0,000000">
										</div>
									</div>
									<div class="form-group">
										<div class="input-group input-group-lg">
											<div class="input-group-prepend">
												<span class="input-group-text bg-transparent border rounded-0">Fee (1%)</span>
											</div>
											<input type="number" class="form-control rounded-0" placeholder="0,000000">
										</div>
									</div>
									<div class="form-group">
										<div class="input-group input-group-lg">
											<div class="input-group-prepend">
												<span class="input-group-text bg-transparent border rounded-0">Total BPL</span>
											</div>
											<input type="number" class="form-control rounded-0" placeholder="0,000000">
										</div>
									</div>
								</form>
							</div>
						</div>
						<div class="card-footer border-0 pt-0">
							<div class="row align-items-center">
								<div class="col-md-5">
									<p class="mb-0 fs-13">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut</p>
								</div>
								<div class="col-md-7 text-start mt-3 mt-sm-0 text-sm-end">
									<a href="javascript:void(0);" class="btn btn-success rounded-0 mb-2">
										BUY
										<svg class="ms-4 scale3" width="16" height="16" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M16.9638 11.5104L16.9721 14.9391L3.78954 1.7565C3.22815 1.19511 2.31799 1.19511 1.75661 1.7565C1.19522 2.31789 1.19522 3.22805 1.75661 3.78943L14.9392 16.972L11.5105 16.9637L11.5105 16.9637C10.7166 16.9619 10.0715 17.6039 10.0696 18.3978C10.0677 19.1919 10.7099 19.8369 11.5036 19.8388L11.5049 19.3388L11.5036 19.8388L18.3976 19.8554L18.4146 19.8555L18.4159 19.8555C18.418 19.8555 18.42 19.8555 18.422 19.8555C19.2131 19.8533 19.8528 19.2114 19.8555 18.4231C19.8556 18.4196 19.8556 18.4158 19.8556 18.4117L19.8389 11.5035L19.8389 11.5035C19.8369 10.7097 19.1919 10.0676 18.3979 10.0695C17.604 10.0713 16.9619 10.7164 16.9638 11.5103L16.9638 11.5104Z" fill="white" stroke="white"></path>
										</svg>
									</a>
									<a href="javascript:void(0);" class="btn ms-3 btn-danger rounded-0 mb-2">
										SELL
										<svg class="ms-4 scale5" width="16" height="16" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M5.35182 13.4965L5.35182 13.4965L5.33512 6.58823C5.33508 6.5844 5.3351 6.58084 5.33514 6.57759M5.35182 13.4965L5.83514 6.58306L5.33514 6.58221C5.33517 6.56908 5.33572 6.55882 5.33597 6.5545L5.33606 6.55298C5.33585 6.55628 5.33533 6.56514 5.33516 6.57648C5.33515 6.57684 5.33514 6.57721 5.33514 6.57759M5.35182 13.4965C5.35375 14.2903 5.99878 14.9324 6.79278 14.9305C7.58669 14.9287 8.22874 14.2836 8.22686 13.4897L8.22686 13.4896L8.21853 10.0609M5.35182 13.4965L8.21853 10.0609M5.33514 6.57759C5.33752 5.789 5.97736 5.14667 6.76872 5.14454C6.77041 5.14452 6.77217 5.14451 6.77397 5.14451L6.77603 5.1445L6.79319 5.14456L13.687 5.16121L13.6858 5.66121L13.687 5.16121C14.4807 5.16314 15.123 5.80809 15.1211 6.6022C15.1192 7.3961 14.4741 8.03814 13.6802 8.03626L13.6802 8.03626L10.2515 8.02798L23.4341 21.2106C23.9955 21.772 23.9955 22.6821 23.4341 23.2435C22.8727 23.8049 21.9625 23.8049 21.4011 23.2435L8.21853 10.0609M5.33514 6.57759C5.33513 6.57959 5.33514 6.58159 5.33514 6.5836L8.21853 10.0609M6.77407 5.14454C6.77472 5.14454 6.77537 5.14454 6.77603 5.14454L6.77407 5.14454Z" fill="white" stroke="white"></path>
										</svg>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-6 col-xxl-12">
					<div class="card">
						<div class="card-header d-block d-sm-flex border-0 pb-0">
							<div>
								<h4 class="fs-20 text-black">Quick Transfer</h4>
								<p class="mb-0 fs-13">Lorem ipsum dolor sit amet, consectetur</p>
							</div>
							<select class="form-control custom-image-select style-1 image-select mt-3 mt-sm-0">
								<option data-thumbnail="public/assets/images/coin/ltc.png">345,781 Ltc</option>
								<option data-thumbnail="public/assets/images/coin/btc.png">561,511 Btc</option>
								<option data-thumbnail="public/assets/images/coin/eth.png">758,155 Eth</option>
							</select>
						</div>
						<div class="card-body">
							<div class="basic-form">
								<form>
									<div class="form-group">
										<div class="input-group input-group-lg">
											<div class="input-group-prepend">
												<span class="input-group-text bg-transparent border rounded-0">Amount BTC</span>
											</div>
											<input type="number" class="form-control rounded-0" placeholder="0,000000">
										</div>
									</div>
								</form>
							</div>
							<div class="d-flex justify-content-between align-items-center">
								<h4 class="fs-20 text-black mb-0">Recent Contacts</h4>
								<a href="javascript:void(0);" class="btn btn-link">View more</a>
							</div>
							<div class="testimonial-one owl-right-nav owl-carousel owl-loaded owl-drag">
								<div class="items">
									<div>
										<img class="mb-3" src="public/assets/images/profile/10.jpg" alt="">
										<h5 class="text-black mb-0">Samuel</h5>
										<span class="fs-12">@sam224</span>
									</div>
								</div>
								<div class="items">
									<div>
										<img class="mb-3" src="public/assets/images/profile/11.jpg" alt="">
										<h5 class="text-black mb-0">Cindy</h5>
										<span class="fs-12">@cindyss</span>
									</div>
								</div>
								<div class="items">
									<div>
										<img class="mb-3" src="public/assets/images/profile/12.jpg" alt="">
										<h5 class="text-black mb-0">David</h5>
										<span class="fs-12">@davidxc</span>
									</div>
								</div>
								<div class="items">
									<div>
										<img class="mb-3" src="public/assets/images/profile/13.jpg" alt="">
										<h5 class="text-black mb-0">Martha </h5>
										<span class="fs-12">@marthaa</span>
									</div>
								</div>
								<div class="items">
									<div>
										<img class="mb-3" src="public/assets/images/profile/14.jpg" alt="">
										<h5 class="text-black mb-0">Olivia </h5>
										<span class="fs-12">@oliv62</span>
									</div>
								</div>
								<div class="items">
									<div>
										<img class="mb-3" src="public/assets/images/profile/15.jpg" alt="">
										<h5 class="text-black mb-0">Bella</h5>
										<span class="fs-12">@bellazz</span>
									</div>
								</div>
							</div>
						</div>
						<div class="card-footer border-0 pt-0">
							<div class="row align-items-center">
								<div class="col-md-7">
									<p class="mb-0 fs-14">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut</p>
								</div>
								<div class="col-md-5 text-right">
									<a href="javascript:void(0);" class="btn btn-primary d-block rounded-0 mt-3 mt-md-0">
										TRANSFER NOW
									</a>
								</div>
							</div>
						</div>
					</div>
				</div> -->
			</div>
		</div>
	</div>
	<!--**********************************
	Content body end
***********************************-->
	<?php require 'partials/_footer.php'; ?>
</body>

</html>