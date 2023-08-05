<?php
function PageName()
{
	return substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], "/") + 1);
}

$current = PageName();


?>

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

	<ul class="sidebar-nav" id="sidebar-nav">

		<li class="nav-item">
			<a class="nav-link " href="index.php">
				<i class="bi bi-grid"></i>
				<span>Dashboard</span>
			</a>
		</li><!-- End Dashboard Nav -->

		<?php
		if ($current == "index.php" || $current == "project.php" || $current = "organization.php") {
		?>
			<li class="nav-item">
				<a class="nav-link collapsed" data-bs-target="#organization-nav" data-bs-toggle="collapse" href="#">
					<i class="bi bi-layout-text-window-reverse"></i><span>Organizations</span><i class="bi bi-chevron-down ms-auto"></i>
				</a>
				<ul id="organization-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
					<li>
						<a href="organization.php">
							<i class="bi bi-circle"></i><span>SEE ALL</span>
						</a>
					</li>
					<?php
					require 'partials/_connection.php';
					$c_id = $_SESSION['userId'];
					$query = "SELECT * FROM `project_users` 
					INNER JOIN project on `project_users`.`project_id_fk`=`project`.`project_id` 
					INNER JOIN organization on `project`.`organization_id_fk`=`organization`.`organization_id` 
					WHERE project_users.user_id_fk=$c_id OR project.user_id_fk=$c_id OR organization.user_id_fk=$c_id 
					ORDER BY organization_id DESC LIMIT 5";
					$result = mysqli_query($con, $query);
					$row = mysqli_num_rows($result);
					while ($data = mysqli_fetch_assoc($result)) {
					?>
						<li>
							<a href="projects.php?id=<?php echo $data['organization_id'] ?>">
								<i class="bi bi-circle"></i><span><?php echo $data['organization_name'] ?></span>
							</a>
						</li>
					<?php
					}
					?>
				</ul>
			</li><!-- End Tables Nav -->
		<?php
		}
		?>

		<?php
		if ($current == "project.php" || $current == "organization.php" || $current == "project_detail.php") {
		?>
			<li class="nav-item">
				<a class="nav-link collapsed" data-bs-target="#project-nav" data-bs-toggle="collapse" href="#">
					<i class="bi bi-layout-text-window-reverse"></i><span>Projects</span><i class="bi bi-chevron-down ms-auto"></i>
				</a>
				<ul id="project-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
					<li>
						<a href="projects.php">
							<i class="bi bi-circle"></i><span>SEE ALL</span>
						</a>
					</li>
					<?php
					require 'partials/_connection.php';
					$query = "SELECT * FROM `project_users` INNER JOIN project on `project_users`.`project_id_fk`=`project`.`project_id` INNER JOIN organization on `project`.`organization_id_fk`=`organization`.`organization_id` WHERE project_users.user_id_fk=$c_id OR project.user_id_fk=$c_id OR organization.user_id_fk=$c_id ORDER BY project_id DESC LIMIT 5";
					$result = mysqli_query($con, $query);
					$row = mysqli_num_rows($result);
					while ($data = mysqli_fetch_assoc($result)) {
						$first_letter = substr($data['project_name'], 0, 1); // Get the first letter of the project name
						$color = substr(md5($first_letter), 0, 6); // Generate a unique color for the first letter
					?>
						<li>
							<a href="project_detail.php?id=<?php echo $data['project_id'] ?>">
								<div class="project-circle" style="background-color: #<?php echo $color ?>">
									<!-- <span><?php echo $first_letter ?></span> -->
								</div>
								<span><?php echo $data['project_name'] ?></span>
							</a>
						</li>
					<?php
					}
					?>
				</ul>
			</li><!-- End Tables Nav -->
		<?php
		}
		?>

		<?php
		if ($current == "project_detail.php?id=") {
		?>
			<li class="nav-item">
				<a class="nav-link collapsed" data-bs-target="#Operations-nav" data-bs-toggle="collapse" href="#">
					<i class="bi bi-layout-text-window-reverse"></i><span>Operations</span><i class="bi bi-chevron-down ms-auto"></i>
				</a>
				<ul id="Operations-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
					<li>
						<a href="#">
							<i class="bi bi-circle"></i><span>work items</span>
						</a>
					</li>
					<li>
						<a href="boards">
							<i class="bi bi-circle"></i><span>work items</span>
						</a>
					</li>
					<li>
						<a href="boards">
							<i class="bi bi-circle"></i><span>back logs</span>
						</a>
					</li>
				</ul>
			</li><!-- End Tables Nav -->
		<?php
		}
		?>
		<li class="nav-item">
			<a class="nav-link collapsed" href="board.php?id=<?php echo $_SESSION['userId']; ?>">
				<i class="bi bi-layout-text-window-reverse"></i><span>Boards</span>
			</a>
		</li>

		<?php
		if (strtolower($_SESSION['userRole']) != "user") {
		?>
			<li class="nav-item">
				<a class="nav-link collapsed" href="backlogs.php">
					<i class="bi bi-layout-text-window-reverse"></i><span>Backlogs</span>
				</a>
			</li>
		<?php
		}
		?>

	</ul>

</aside><!-- End Sidebar-->