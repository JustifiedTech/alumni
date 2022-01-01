 <?php 
require('../inc/link.php');
session_start();
include('../inc/admin_session.php');
$error= array();

if(isset($_SESSION['users_id']))
{

$users_id=$_SESSION['users_id'];
  $select = mysqli_query($connect, "SELECT * FROM users 
    WHERE users_id = '$users_id'");
        $row=mysqli_num_rows($select);
    $fetch= mysqli_fetch_assoc($select);
  
  
if ($row>0)
{
     
 
$f=$fetch['first_name'];
$l=$fetch['last_name'];
$o=$fetch['other_name'];
$im=$fetch['passport'];
$e=$fetch['email'];
$exp=$fetch['expertise'];
$q=$fetch['qualification'];
$dob=$fetch['dob']; 
$p=$fetch['phone_number'];
$g=$fetch['gender'];
$address=$fetch['address'];



}

  }	
if (isset($_POST['update']))
{
	$Firstname= mysqli_real_escape_string($connect, $_POST['Fname']);
	$Lastname= mysqli_real_escape_string($connect, $_POST['Lname']);
	$Othername= mysqli_real_escape_string($connect, $_POST['Oname']);
	$dateofbirth= mysqli_real_escape_string($connect, $_POST['dob']);
	$email= mysqli_real_escape_string($connect, $_POST['mail']);
	$phone=mysqli_real_escape_string($connect, $_POST['phone']);
	$Gender=mysqli_real_escape_string($connect, $_POST['gender']);
	$image=mysqli_real_escape_string($connect, $_FILES['image']['name']);
	$address=$_POST['address'];
	$expertise=$_POST['expertise'];
	$qualify=$_POST['qualify'];
	$tmp_image= $_FILES['image']['tmp_name'];
	$size_image=mysqli_real_escape_string($connect, $_FILES['image']['size']);
		


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
	else
	{
		
					$img_ext=explode('.', $image);
					$image_ext=$img_ext['1'];
					$image = (rand(1,1000).rand(1,1000). time().".".$image_ext);

				if($image_ext=='jpg'|| $image_ext=='png' || $image_ext=='jpeg' || $image_ext=='PNG' || $image_ext=='JPG' || $image_ext=='JPEG'){	
					
									
									}
				else 
					{
						array_push($error, "The file you're uploading is not an image file");
					}
 	}

if ($size_image>1000000){
	array_push($error, "Image is greater than 1MB");
}

if (count($error)==0){
				
			$update = mysqli_query($connect, "UPDATE users SET 
				`first_name`='$Firstname', `other_name`='$Othername', `last_name`='$Lastname', `dob`='$dateofbirth', `email`='$email', `phone_number`='$phone', `gender`='$Gender', `qualification`='$qualify', `address`='$address', `passport`='$image', `expertise`='$expertise' WHERE `users_id` = '$users_id' ");
	 

	 	if ($update == TRUE) {

				 		move_uploaded_file($tmp_image, '../uploads/'.$image);
				 			
				 			echo "<script>alert('Records updated succesfully ')</script>";

				 			header("location:profile.php");

	 			 	}
	 			 	else
	 			 		{
	 						echo "<script>alert(' Update was not succesful')</script>";
	 					}
	
	}
	
 	}

?>
<title>Alumni Dashboad</title>
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
        		<div style="background:#024;" class="card-header text  text-center text-white"> UPDATE PROFILE</div>
        	 <form method="POST" enctype="multipart/form-data" action="" role="form"  class="padding">
       	 <?php include('../inc/error.php'); ?>
       	       	
    
	<div class="row" >
		<div class="col-lg-4 col-sm-5 offset-1 " >
			<div class="form-group">
			<label> First Name:</label>
			<input type='text' name='Fname' placeholder="First Name" class='form-control' required="yes" value="<?php echo $f; ?>">
			</div>
			<div class="form-group">
			<label> Last Name:</label>
			<input type='text' name='Lname' placeholder="Last Name" class='form-control'required="yes" value="<?php echo $l;?>">
			</div> 
			<div class="form-group">
			<label> Other Name:</label>
			<input type='text' name='Oname' required="yes" placeholder="Other Name" class='form-control' value="<?php echo $o;?> ">
			</div> 
			<div class="form-group">
			<label> Gender:</label> <br>
			<select name='gender' class='form-control' required="yes" value="<?php echo $g;?>">
				<option value="">--Please Select--</option> 
				<option value="Male"> Male </option> 
				<option value="Female"> Female </option>
			</select>
			</div>
			<div class="form-group">
			<label> Email:</label>
			<input type='email' name='mail' placeholder="email address" class='form-control' required="yes" value="<?php echo $e;?>">	
			</div>
			<div class="form-group">
			<label> Address:</label>
			<input type='text' name='address' placeholder=" Residential address" class='form-control' required="yes" value="<?php echo $address;?>">	
			</div>
	</div>
	<div class="col-lg-4 col-sm-5 ">
		<div class="form-group">
			<label> Phone Number:</label>
			<input type='phone' name='phone' placeholder="phone number" class='form-control' required="yes" value="<?php echo $p;?>">	
			</div>
				<div class="form-group">
			<label> Date of Birth:</label>
			<input type='date' name='dob' placeholder="phone number" class='form-control' required="yes" value="<?php echo $dob;?>">	
			</div>
			<div class="form-group">
				<label> Current Qualification:</label>
				<input type='text' name='qualify' placeholder="Current level in education" class='form-control' required="yes" value="<?php echo $q;?>">	
				</div>
			 	<div class="form-group">
				<label> Expertise:</label>
				<input type='text' name='expertise' placeholder="Area of specialization" class='form-control' required="yes" value="<?php echo $exp;?>">	
				</div>
				<div class="input-group">
					<label> Profile Picture <i class="lead text text-danger text-xs">(Not more than 1MB)</i>  </label>
					    <input type='file' name='image' value ="<?php echo $image; ?>" >
					   	</div>
													
		</div>
				 
		</div>
	<div class="row padding">
		<div class="col-md-4 offset-4 form-group">
		<input  style="background:#024;" type='submit' value='Update'name="update" class='btn btn-sm text text-white'>
		&nbsp;
		<input type='reset' value='reset' name="clear" class='btn btn-secondary btn-md'>
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

</html>
 
