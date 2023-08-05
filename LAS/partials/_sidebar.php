<?php
function PageName()
{
	return substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], "/") + 1);
}

$current = PageName();

$arr=['user.php','component.php','role.php','flag.php','status.php'];
if (strtolower($_SESSION['userRole'])!='admin') {
	for ($i=0; $i < count($arr); $i++) { 
		if ($current==$arr[$i]) {
			echo '<script>window.location.href="page_error_500.php"</script>';
		}
	}
}
?>

<!--**********************************
	Sidebar start
***********************************-->
<div class="deznav">
	<div class="deznav-scroll">
		<ul class="metismenu" id="menu">
			<li><a href="index.php" class="ai-icon" aria-expanded="false" <?php if ($current == "index.php") echo 'style="background-color: #6418c3;color: #ffffff;"' ?>>
					<i class="flaticon-dashboard-1" <?php if ($current == "index.php") echo 'style="color: #ffffff;"' ?>></i>
					<span class="nav-text">Dashboard</span>
				</a>
			</li>
			<?php
			if (strtolower($_SESSION['userRole']) == "admin") {
			?>
				<li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false" <?php if ($current == "component.php" || $current == "role.php" || $current == "flag.php" || $current == "user.php" || $current == "status.php") echo 'style="background-color: #6418c3;color: white;"' ?>>
						<i class="flaticon-statistics" <?php if ($current == "component.php" || $current == "role.php" || $current == "user.php" || $current == "flag.php" || $current == "status.php") echo 'style="color: white;"' ?>></i>
						<span class="nav-text">Employee</span>
					</a>
					<ul aria-expanded="false">
						<li><a href="role.php" <?php if ($current == "role.php") echo 'style="color: #6418c3;"' ?>>Roles</a></li>
						<li><a href="user.php" <?php if ($current == "user.php") echo 'style="color: #6418c3;"' ?>>Users</a></li>
					<li><a href="component.php" <?php if ($current == "component.php") echo 'style="color: #6418c3;"' ?>>Component</a></li>
						<li><a href="status.php" <?php if ($current == "status.php") echo 'style="color: #6418c3;"' ?>>Status</a></li>
						<li><a href="flag.php" <?php if ($current == "flag.php") echo 'style="color: #6418c3;"' ?>>Flag</a></li>
						<!-- <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Summary</a>
							<ul aria-expanded="false">
								<li><a href="email_compose.html">Product</a></li>
								<li><a href="email_inbox.html">Employee</a></li>
							</ul>
						</li> -->
					</ul>
				</li>
			<?php } ?>
			<li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false" <?php if ($current == "product.php" || $current == "test.php" || $current == "performed.php") echo 'style="background-color: #6418c3;color: white;"' ?>>
					<i class="flaticon-statistics" <?php if ($current == "component.php" || $current == "product.php" || $current == "test.php" || $current == "performed.php") echo 'color: white;"' ?>></i>
					<span class="nav-text">Product</span>
				</a>
				<ul aria-expanded="false">
					<li><a href="product.php" <?php if ($current == "product.php") echo 'style="color: #6418c3;"' ?>>Products</a></li>
					<li><a href="performed.php" <?php if ($current == "performed.php") echo 'style="color: #6418c3;"' ?>>Performed</a></li>
					<li><a href="test.php" <?php if ($current == "test.php") echo 'style="color: #6418c3;"' ?>>Test</a></li>
				</ul>
			</li>
		</ul>

		<?php
		if (strtolower($_SESSION['userRole'])=='admin') {
			?>
		<div class="add-menu-sidebar">
			<p>Generate Report</p>
			<a href="report.php">
				<svg width="24" height="12" viewBox="0 0 24 12" fill="none">
					<path d="M23.725 5.14889C23.7248 5.14861 23.7245 5.14828 23.7242 5.148L18.8256 0.272997C18.4586 -0.0922062 17.865 -0.0908471 17.4997 0.276184C17.1345 0.643169 17.1359 1.23675 17.5028 1.602L20.7918 4.875H0.9375C0.419719 4.875 0 5.29472 0 5.8125C0 6.33028 0.419719 6.75 0.9375 6.75H20.7917L17.5029 10.023C17.1359 10.3882 17.1345 10.9818 17.4998 11.3488C17.865 11.7159 18.4587 11.7172 18.8256 11.352L23.7242 6.477C23.7245 6.47672 23.7248 6.47639 23.7251 6.47611C24.0923 6.10964 24.0911 5.51414 23.725 5.14889Z" fill="white" />
				</svg>
			</a>
		</div>
			<?php
		}
		?>
		<div class="copyright">
			<p><strong>Chrev - Lab Automation System Admin Dashboard</strong> © 2022 All Rights Reserved</p>
			<p>Made with <i class="fa fa-heart"></i> Dedication</p>
		</div>
	</div>
</div>
<!--**********************************
	Sidebar end
***********************************-->