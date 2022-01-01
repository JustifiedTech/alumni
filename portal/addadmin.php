<?php include ('../inc/link.php');
session_start();
//include('../inc/db_connect.php');
include('../inc/admin_session.php');
 $error= array();
$Firstname='';$Lastname='';$Othername='';$email=''; $phone_number='';$Gender='';		
if (isset($_POST['add']))
{
	$Firstname= mysqli_real_escape_string($connect, $_POST['Fname']);
	$Lastname= mysqli_real_escape_string($connect, $_POST['Lname']);
	$Othername= mysqli_real_escape_string($connect, $_POST['Oname']);
	$email= mysqli_real_escape_string($connect, $_POST['mail']);
	
	$password= $Lastname;
	$role='Admin';
	$user_type= 'Admin';
	$Gender=mysqli_real_escape_string($connect, $_POST['gender']);
	
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
	

if ( count($error)==0)

	{

			$check=mysqli_query($connect, "SELECT * FROM  users 
			WHERE email = '$email'");
			$row=mysqli_num_rows($check);
			if ($row>0)

				{
					array_push($error, "email already exist");
				}

	else {


				$select=mysqli_query($connect, "SELECT * FROM  admin");
				$row1=mysqli_num_rows($select);

				if ($row1==3) 
				{
					array_push($error, "Maximum Number of Admins Reached");
				}
				else 
				{

					$select=mysqli_query($connect, "SELECT * FROM  admin 
					WHERE email = '$email'");
					$row=mysqli_num_rows($select);
					
					if ($row>0)

						{
							array_push($error, "Admin with same email already exist");
						}
					else 
					{		$name = $Lastname. " ".$Firstname. " ".$Othername;
							$pass= md5(md5($password));
								
								$insert = mysqli_query($connect, "INSERT INTO admin (email, name, password) VALUES('$email', '$name','$pass')")or die(mysqli_error($connect)); 


						if($insert) 
						{


							$pass= md5(md5($password));
									
							$put = mysqli_query($connect, "INSERT INTO users (email, first_name, last_name, other_name, password, gender, role, user_type) VALUES('$email', '$Firstname','$Lastname', '$Othername', '$pass', '$Gender', '$role', '$user_type')")or die(mysqli_error($connect)); 

							if ($put)
							 	{

										$Firstname='';$Lastname='';$Othername='';$email=''; $Gender='';

											echo "<script> alert('Admin details added succefully') </script>";
					


								}
						}

					


				
					}	

			}


		
			}
				
	}

}


 ?>

<title>Add Admin </title>
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
        		<div class="card-header bg-info text  text-center text-light"> ADD ADMIN</div>
        	 <form method="POST" enctype="multipart/form-data" action="" role="form"  class="">
       	 <?php include('../inc/error.php'); ?>
       	       	
    
	<div class="row" >
		<div class="col-lg-3 col-sm-5 offset-lg-1 offset-sm-1 " >
			<div class="form-group">
			<label> First Name:</label>
			<input type='text' name='Fname' placeholder="First Name" class='form-control' required="yes" value="<?php echo $Firstname;?>">
			</div>
			<div class="form-group">
			<label> Last Name:</label>
			<input type='text' name='Lname' placeholder="Last Name" class='form-control'required="yes" value="<?php echo $Lastname;?>">
			</div> 
			<div class="form-group">
			<label> Other Name:</label>
			<input type='text' name='Oname' placeholder="Other Name" class='form-control' value="<?php echo $Othername;?>">
			</div> 
			<div class="form-group">
			<label> Gender:</label> <br>
			<select name='gender' class='form-control' required="yes" value="">
				<option value="">--Please Select--</option> 
				<option value="Male"> Male </option> 
				<option value="Female"> Female </option>
			</select>
			</div>
			<div class="form-group">
			<label> Email:</label>
			<input type='email' name='mail' placeholder="email address" class='form-control' required="yes" value="<?php echo $email;?>">	
			</div>
						
	</div>
		 
		</div>
	<div class="row padding">
		<div class="col-md-4 offset-4 form-group">
		<input type='submit'value='Add Admin'name="add" class='btn btn-info btn-md'>
		&nbsp;
		<input type='reset'value='reset' name="clear" class='btn btn-secondary btn-sm'>
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

