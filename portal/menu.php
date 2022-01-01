<?php
include('../inc/link.php');
session_start();

include('../inc/session.php');


if (isset($_COOKIE['user'])) {
	$users_id = $_COOKIE['user'];
	//$users_id=$_SESSION['users_id'];
	$select = mysqli_query($connect, "SELECT * FROM users 
	WHERE users_id = '$users_id'");
	$row = mysqli_num_rows($select);
	$fetch = mysqli_fetch_array($select);

	//print_r($fetch);
	if ($row > 0) {

		$first_name = $fetch['first_name'];
		$last_name = $fetch['last_name'];
		$image = $fetch['passport'];
		$email = $fetch['email'];
		$department = $fetch['department'];
		$expertise = $fetch['expertise'];
		$faculty = $fetch['faculty'];
		$course = $fetch['course'];
		$grad = date('Y', strtotime($fetch['grad_year']));
		$qualify = $fetch['qualification'];
	}


?>






	<title>Alumni Dashboad</title>
	</head>

	<body id="page-top">

		<!-- Page Wrapper -->
		<div id="wrapper">

			<!-- Sidebar -->
			<?php include('../inc/sidedash.php'); ?>
			<!-- End of Sidebar -->

			<!-- Content Wrapper -->
			<div id="content-wrapper" class="d-flex flex-column">

				<!-- Main Content -->
				<div id="content">

					<!-- Topbar -->
					<?php include('../inc/topdash.php'); ?>
					<!-- End of Topbar -->

					<!-- Begin Page Content -->
					<div class="container-fluid">
						<div class="row">
							<div style="background-color:#246;" class="col-md-4 offset-1 text-white">
								<div class="card text text-white" style="height:50%;">
									<img style="height:20rem;" class="card-img-top d-block w-100  img-responsive" src="../uploads/<?php echo $image ?>">
									<div class="card-body">
										<h5 class="card-title ">
											<?php echo $last_name . " " . $first_name ?> </h5>
										<i><b> Specialist in: </b></i>
										<p><?php echo $expertise; ?> </p>
									</div>
									<div class="card-footer">
										<i><b> Email Address:</b></i>
										<p class="card-text lead text-center">
											<?php echo $email; ?>
										</p>
									</div>
								</div>
							</div>
							<div class="col-md-4 offset-1">
								<div class="card" style="height">
									<div class="card-header text-center bg-dark text-white"> Education Details </div>
									<div class="card-body">
										<table class="table">
											<tr>
												<th>Faculty:</th>
												<td><?php echo $faculty; ?> </td>
											</tr>
											<tr>
												<th>Department:</th>
												<td><?php echo $department; ?> </td>
											</tr>
											<tr>
												<th>Course Read:</th>
												<td><?php echo $course; ?> </td>
											</tr>
											<tr>
												<th>Year of Graduation:</th>
												<td><?php echo $grad; ?> </td>
											</tr>
											<tr>
												<th>Current Qualification:</th>
												<td><?php echo $qualify; ?> </td>
											</tr>



										</table>


									</div>
									<div class="card-footer">
										<p class="lead"> </p>
									</div>
								</div>

							</div>
						</div>

					</div>
					<!-- /.container-fluid -->

				</div>
				<!-- End of Main Content -->

				<!-- Footer -->
				<?php include('../inc/dashfooter.php'); ?>
				<!-- End of Footer -->

			</div>
			<!-- End of Content Wrapper -->

		</div>
		<!-- End of Page Wrapper -->

		<!-- Scroll to Top Button-->
		<a class="scroll-to-top rounded" href="#page-top">
			<i class="fas fa-angle-up"></i>
		</a>

		<!-- Logout Modal-->
		<?php include('../inc/logoutmodal.php'); ?>
		<!--End of logout modal -->
		<!-- JavaScript-->
		<?php include('../inc/scripts.php'); ?>

	</body>

	</html>
<?php


} else {
	$users_id = $_SESSION['users_id'];
	$select = mysqli_query($connect, "SELECT * FROM users 
						WHERE users_id = '$users_id'");
	$num_row = mysqli_num_rows($select);
	$fetch = mysqli_fetch_array($select);

	//print_r($fetch);
	if ($num_row > 0) {

		$first_name = $fetch['first_name'];
		$last_name = $fetch['last_name'];
		$image = $fetch['passport'];
		$email = $fetch['email'];
		$department = $fetch['department'];
		$expertise = $fetch['expertise'];
		$faculty = $fetch['faculty'];
		$course = $fetch['course'];
		$grad = date('Y', strtotime($fetch['grad_year']));
		$qualify = $fetch['qualification'];
	}


?>






	<title>Alumni Dashboad</title>
	</head>

	<body id="page-top">

		<!-- Page Wrapper -->
		<div id="wrapper">

			<!-- Sidebar -->
			<?php include('../inc/sidedash.php'); ?>
			<!-- End of Sidebar -->

			<!-- Content Wrapper -->
			<div id="content-wrapper" class="d-flex flex-column">

				<!-- Main Content -->
				<div id="content">

					<!-- Topbar -->
					<?php include('../inc/topdash.php'); ?>
					<!-- End of Topbar -->

					<!-- Begin Page Content -->
					<div class="container-fluid">
						<div class="row">
							<div style="background-color:#246;" class="col-md-4 offset-1 text-white text-center">
								<div class="card text text-white" style="height:50%;">
									<img style="height:20rem;" class="card-img-top d-block w-100  img-responsive" src="../uploads/<?php echo $image ?>">
									<div class="card-body">
										<h5 class="card-title ">
											<?php echo $last_name . " " . $first_name ?> </h5>
										<i><b> Specialist in: </b></i>
										<p><?php echo $expertise; ?> </p>
									</div>
									<div class="card-footer">
										<i><b> Email Address:</b></i>
										<p class="card-text lead text-center">
											<?php echo $email; ?>
										</p>
									</div>
								</div>
							</div>
							<div class="col-md-4 offset-1">
								<div class="card" style="height">
									<div class="card-header text-center bg-dark text-white"> Education Details </div>
									<div class="card-body">
										<table class="table">
											<tr>
												<th>Faculty:</th>
												<td><?php echo $faculty; ?> </td>
											</tr>
											<tr>
												<th>Department:</th>
												<td><?php echo $department; ?> </td>
											</tr>
											<tr>
												<th>Course Read:</th>
												<td><?php echo $course; ?> </td>
											</tr>
											<tr>
												<th>Year of Graduation:</th>
												<td><?php echo $grad; ?> </td>
											</tr>
											<tr>
												<th>Current Qualification:</th>
												<td><?php echo $qualify; ?> </td>
											</tr>



										</table>


									</div>
									<div class="card-footer">
										<p class="lead"> </p>
									</div>
								</div>

							</div>
						</div>

					</div>

				</div>
				<!-- End of Main Content -->

				<!-- Footer -->
				<?php include('../inc/dashfooter.php'); ?>
				<!-- End of Footer -->

			</div>
			<!-- End of Content Wrapper -->

		</div>
		<!-- End of Page Wrapper -->

		<!-- Scroll to Top Button-->
		<a class="scroll-to-top rounded" href="#page-top">
			<i class="fas fa-angle-up"></i>
		</a>

		<!-- Logout Modal-->
		<?php include('../inc/logoutmodal.php'); ?>
		<!--End of logout modal -->
		<!-- Bootstrap core JavaScript-->
		<?php include('../inc/scripts.php'); ?>

	</body>

	</html>
<?php
}
?>
<script>
	$(document).ready(function()

		{
			update_last_activity();
			setInterval(function() {
				update_last_activity();
			}, 5000);


			function update_last_activity() {
				$.ajax({
					url: "lastActivity.php",

					success: function() {

					}
				})
			}


		});
</script>