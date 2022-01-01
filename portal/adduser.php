<?php include ('../inc/link.php');
session_start();

include('../inc/admin_session.php');
 $error= array();
$Firstname=''; $Lastname='';$Othername=''; $email='';$Gender=''; $Matric=''; $faculty=''; $department=''; $course=''; $entry=''; $grad=''; $duration=''; $user_type='';	

if (isset($_POST['submit']))
{
	$Firstname= ($_POST['Fname']);
	$Lastname= ($_POST['Lname']);
	$Othername= ($_POST['Oname']);
	$email= ($_POST['mail']);
	$Gender=($_POST['gender']);
	$Matric=($_POST['matric']);
	$faculty=($_POST['faculty']);
	$department= ($_POST['department']);
	$course=($_POST['course']);
	$entry=($_POST['entry']);
	$grad=($_POST['exit']);
	$duration=($_POST['duration']);
	$user_type=($_POST['user_type']);
	
	if (strlen($Firstname)<3)
	{
			array_push($error, "First name must contain more than 3 characters");
	}
   else if (strlen($Lastname)<3)
	{
			array_push($error, "Last name must contain more than 3 characters");
	}
	
	 else if (!filter_var($email, FILTER_VALIDATE_EMAIL))
	{
	array_push($error, "Invalid email entered, Please provide a valid email");
	}
	else if (empty($Gender))
	{
	array_push($error, "Please select gender");
	}
	else if (empty($faculty))
	{
	array_push($error, "Please select faculty");
	}
	
	else if (empty($Matric))
	{
	array_push($error, "Please Enter matriculation number");
	}
	else if (strlen($Matric)<11)
	{
	array_push($error, "Matric number cannot be less than 11 charaters");
	}
	else if (empty($department))
	{
	array_push($error, "Please enter department");
	}
	else if (empty($course))
	{
	array_push($error, "Please enter course ");
	}
	else if (empty($entry))
	{
	array_push($error, "Please select year of admission");
	}
	else if (empty($grad))
	{
	array_push($error, "Please select year of graduation");
	}
	else if (empty($duration))
	{
	array_push($error, "Please select duration of study");
	}
	else if (empty($user_type))
	{
	array_push($error, "Please select user type");
	}
	
	if (count($error)==0) 

	{
		if ($user_type =='Alumni')
		{

		
			$select= mysqli_query($connect, "
				SELECT * 
				FROM alumni
				WHERE matric_no = '$Matric'") 
				or die(mysqli_error($connect));
				$row=mysqli_num_rows($select);

				$select1= mysqli_query($connect, "
				SELECT * 
				FROM alumni
				WHERE email = '$email'") 
				or die(mysqli_error($connect));
				$row_mail=mysqli_num_rows($select1);

				if ($row > 0) 
				{
					array_push($error, "User with the same matric number already exist");
				}
				else  if ($row_mail) 
				{
					array_push($error, "This email address has been used previously");
				}
				
								
				else 
				{
					$password=$Lastname;
				 	$pass= md5(md5($password));
					
					$insert = mysqli_query($connect, "INSERT INTO alumni (first_name, last_name, other_name, gender, email, matric_no, password, faculty, department, course, duration, yr_of_entry, yr_of_graduation) VALUES('$Firstname', '$Lastname', '$Othername','$Gender', '$email','$Matric','$pass','$faculty','$department','$course','$duration','$entry','$grad')")or die(mysqli_error($connect)); 
					if ($insert==true) 
					{
						
						$Firstname=''; $Lastname='';$Othername=''; $email='';$Gender=''; $Matric=''; $faculty=''; $department=''; $course=''; $entry=''; $grad=''; $duration=''; $user_type='';

						echo "<script>alert('Alumni record succesfully Added')</script>";
					}
					else
					 {
					 	echo "<script>alert('Alumni record not added')</script>";
					}
				}
		}

		if ($user_type =='Student')
		{

			$select= mysqli_query($connect, "
				SELECT * 
				FROM students
				WHERE matric_no = '$Matric'") 
				or die(mysqli_error($connect));
				$row=mysqli_num_rows($select);

				$select1= mysqli_query($connect, "
				SELECT * 
				FROM students
				WHERE email = '$email'") 
				or die(mysqli_error($connect));
				$row_mail=mysqli_num_rows($select1);

				if ($row > 0) 
				{
					array_push($error, "User with the same matric number already exist");
				}
				else  if ($row_mail) 
				{
					array_push($error, "This email address has been used previously");
				}
				
				else 
				{
				 	$password=$Lastname;
				 	$pass= md5(md5($password));
					
					$insert = mysqli_query($connect, "INSERT INTO students (first_name,last_name, other_name, gender, email, matric_no, password, faculty, department,course, duration, yr_of_entry, yr_of_graduation) VALUES('$Firstname', '$Lastname', '$Othername','$Gender', '$email','$Matric','$pass','$faculty','$department','$course','$duration','$entry','$grad')")or die(mysqli_error($connect)); 
					if ($insert == True) 
					{
						
						$Firstname=''; $Lastname='';$Othername=''; $email='';$Gender=''; $Matric=''; $faculty=''; $department=''; $course=''; $entry=''; $grad=''; $duration=''; $user_type='';

						echo "<script>alert('Student record succesfully Added')</script>";
					}
					else
					 {
					 	echo "<script>alert('Student record not added')</script>";
					}
				}
		}
	}
}

 ?>

<title>Add user </title>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php  include ('../inc/sidedash.php');?>
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
        	<div class="card bg-light">
        		<div class="card-header bg-info text  text-center text-white"> ADD USER</div>
        	 <form method="POST" enctype="multipart/form-data" action="" role=""  class="">
       	 <?php include('../inc/error.php'); ?>
       	       	
    
	<div class="row" >
		<div class="col-lg-3 col-sm-5 offset-lg-1 offset-sm-1 " >
			<div class="form-group">
			<label> First Name:</label>
			<input type='text' name='Fname' placeholder="First Name" class='form-control' required="yes" value="<?php echo $Firstname; ?>">
			</div>
			<div class="form-group">
			<label> Last Name:</label>
			<input type='text' name='Lname' placeholder="Last Name" class='form-control'required="yes" value="<?php echo $Lastname;?>">
			</div> 
			<div class="form-group">
			<label> Other Name:</label>
			<input type='text' name='Oname' placeholder="Other Name" class='form-control' value="<?php echo $Othername;?> ">
			</div> 
			<div class="form-group">
			<label> Gender:</label> <br>
			<select name='gender' class='form-control' required="yes" value="<?php echo $Gender;?>">
				<option value="">--Please Select--</option> 
				<option value="Male"> Male </option> 
				<option value="Female"> Female </option>
			</select>
			</div>
			<div class="form-group">
			<label> Matriculation Number: </label>
			<input type='text' name='matric' placeholder="Matriculation number" class='form-control' required="yes" value="<?php echo $Matric;?>">
			</div>
			<div class="form-group">
			<label> Email:</label>
			<input type='email' name='mail' placeholder="email address" class='form-control' required="yes" value="<?php echo $email;?>">	
			</div>
				<div class="form-group">
			<label> Faculty:</label> <br>
			<select name='faculty' class='form-control' required="yes" value="<?php echo $faculty; ?>">
				<option value="">--Please Select--</option> 
				<option value="Pure and Applied Sciences">Pure and Applied Sciences</option> 
				<option value="Humanities and Social Sciences">Humanities and Social Sciences</option>
				<option value="Agriculture and Life Sciences">Agriculture and Life Sciences</option>
			</select>
			</div> 				
	</div>
	<div class="col-lg-3 col-sm-5 offset-lg-1 offset-sm-1">
		
											    					
				<div class="form-group">
				<label> Department:</label>
				<input type='text' name='department' placeholder="Department" class='form-control' value="<?php echo $department; ?>">
				</div>
				<div class="form-group">
				<label> Course:</label>
				<input type='text' name='course' placeholder="Course" class='form-control' value="<?php echo $course; ?>">
				</div>
					
				<div class="form-group">
				<label>Entry Year:</label>
				<input type='date' name='entry' placeholder="Year Admitted" class='form-control' value="<?php echo $entry; ?>">
				</div>
				<div class="form-group">
				<label>Graduation Year:</label>
				<input type='date' name='exit' placeholder="Graduation year" class='form-control' value="<?php echo $grad; ?>">
				</div>
				<div class="form-group">
				<label> Programme Duration:</label> <br>
				<select name='duration' class='form-control'required="yes" value="<?php echo $duration; ?>">
				<option value="">--Please Select--</option> 
				<option value="3 years">3 years</option> 
				<option value="4 years">4 years</option>
				<option value="5 years">5 years</option>
				</select>
				 </div>
				 <div class="form-group">
				<label> User type:</label> <br>
				<select name="user_type" class='form-control' required="yes" value="<?php echo $user_type; ?>">
				<option value="">--Please Select--</option> 
				<option value="Alumni"> Alumni </option> 
				<option value="Student">Student</option>
				</select>
				 </div>
		</div>
		 
		</div>
	<div class="row padding">
		<div class="col-md-4 offset-4 form-group">
		<input type='submit'value='Add user'name="submit" class='btn btn-info btn-sm'>
		&nbsp;
		<input type='reset' value='reset' name="clear" class='btn btn-secondary btn-sm'>
	</div> <br>
	</div>
</form> <!--- End of form --->
	
</div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <?php include('../inc/dashfooter.php');?>
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
  <?php include ('../inc/logoutmodal.php'); ?>
  <!--End of logout modal -->
  <!-- Bootstrap core JavaScript-->
  <?php include('../inc/scripts.php');?>

</body>
</html>
<script>
	$(document).ready(function()

	{	
			update_last_activity();
			setInterval(function(){
				update_last_activity();
				}, 5000);

	
		function update_last_activity() 
		{
			$.ajax({
				url:"lastActivity.php",
								
				success:function()
				{

				}
			})
		}
		
		
	});




</script>

