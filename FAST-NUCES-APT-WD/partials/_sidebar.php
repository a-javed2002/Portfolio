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
				<span>Home</span>
			</a>
		</li><!-- End Dashboard Nav -->


		<li class="nav-item">
			<a class="nav-link collapsed" data-bs-target="#organization-nav" data-bs-toggle="collapse" href="#">
				<i class="bi bi-layout-text-window-reverse"></i><span>Classes</span><i class="bi bi-chevron-down ms-auto"></i>
			</a>
			<ul id="organization-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
				<li>
					<a href="dashboard.php">
						<i class="bi bi-circle"></i><span>SEE ALL</span>
					</a>
				</li>
				<?php
				require 'partials/_connection.php';
				$c_id = $_SESSION['userId'];
				if ($_SESSION['userRoleId'] == 2) {
					$query = "SELECT * FROM `class` 
					WHERE  class.teacher_id_fk=$c_id
					ORDER BY class.class_id DESC LIMIT 5";
				}
				else{
					$query = "SELECT * FROM `class` 
					INNER JOIN class_students on class_students.class_id_fk=class.class_id 
					WHERE  class_students.student_id_fk=$c_id
					ORDER BY class.class_id DESC LIMIT 5";
				}
				$result = mysqli_query($con, $query);
				$row = mysqli_num_rows($result);
				while ($data = mysqli_fetch_assoc($result)) {
				?>
					<li>
						<a href="class.php?id=<?php echo $data['class_id'] ?>">
							<i class="bi bi-circle"></i><span><?php echo $data['class_name'] ?></span>
						</a>
					</li>
				<?php
				}
				?>
			</ul>
		</li><!-- End Tables Nav -->

		<li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#rough-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-layout-text-window-reverse"></i><span>Rough</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="rough-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a asp-controller="Roles" asp-action="index">
                            <i class="bi bi-circle"></i><span>Role</span>
                        </a>
                    </li>
                    <li>
                        <a asp-controller="Users" asp-action="index">
                            <i class="bi bi-circle"></i><span>User</span>
                        </a>
                    </li>
                    <li>
                        <a asp-controller="Classes" asp-action="index">
                            <i class="bi bi-circle"></i><span>Class</span>
                        </a>
                    </li>
                    <li>
                        <a asp-controller="ClassStudents" asp-action="index">
                            <i class="bi bi-circle"></i><span>Class Students</span>
                        </a>
                    </li>
                    <li>
                        <a asp-controller="Invites" asp-action="index">
                            <i class="bi bi-circle"></i><span>Invite</span>
                        </a>
                    </li>
                    <li>
                        <a asp-controller="Tasks" asp-action="index">
                            <i class="bi bi-circle"></i><span>Task</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Tables Nav -->


	</ul>

</aside><!-- End Sidebar-->