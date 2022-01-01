	<?php 
		require('../inc/link.php');
		session_start();
		include('../inc/db_connect.php');
		$error=array();

		$email=''; $matric=''; $date=''; 

if (isset($_POST['verify'])) 

{
				$matric = $_POST['matric'];
				$email = $_POST['mail'];
				$date = $_POST['dob'];

		if (empty($matric))
			{
				array_push($error, "Please enter your registered matric number");
				}
				else if (empty($email))
				{
			array_push($error, "Please your registered email");
						}

	 	else if (!filter_var($email, FILTER_VALIDATE_EMAIL))
				{
			array_push($error, "Invalid email entered, Please provide a valid email");
				}
				else if (empty($date))
				{
				array_push($error, "Please provide your date of birth");
						}

if (count($error)==0)
	{

				$select = mysqli_query($connect, "SELECT * FROM users 
			    WHERE matric_no = '$matric'");
			        $row=mysqli_num_rows($select);
			    $fetch= mysqli_fetch_array($select);

			    if($row=1) 
			    {

			  		 	$e=$fetch['email'];
						$dob=$fetch['dob'];
						$fid=$fetch['users_id'];


					if ($email!==$e) 
						{
						  array_push($error, "email does not match the registered email");	
						}

						else if ($email==$e) 
						{
							if ($date!==$dob)
								{
									array_push($error, "Wrong date of birth entered");	
								}

								else if ($date==$dob)
								{

									$_SESSION['password']=$fid;
									header('location:forgot.php?fid='.$fid);
								}

						}

					 
				}

				else if ($row<0)
				{
					array_push($error, "Record for this matriculation number not found");
				}




	}


}
	?>

	<title> FUWukari_Alumni/forgotpassword</title>
</head>

<body class="register">
	
<div class ='container-fluid' style=" color: white;">
		<div class='col-md-4 offset-md-4'>
			<div class="" style="width: 100%; margin: 10px auto 0px; color: white; background:#024;/*#5F9EA0*/; text-align: center; border: 1px solid #B0C4DE; border-bottom: none; border-radius: 10px 10px 0px 0px; padding:10px;"><h3 align="center"> <i>Recover your password</i> </h3><br>
			</div>
			<div class = 'jumbotron' style='margin-top: 20px; padding-top: 20px; background:#0244;' >
				                      
                      <form method="POST" enctype="multipart/form-data" action="" role="form" >
                      	<div class="" >
                      	<?php include('../inc/error.php'); ?>
                      	</div>
                      <div class="form-group">
					  						
					    <input type='text' name='matric' placeholder="Valid Matric no." class='form-control' value="<?php echo $matric; ?>">
										</div> 
										
							<div class="form-group">
					  						
					    <input type='email' name='mail' placeholder="your registerd email" class='form-control'value='<?php echo $email; ?>'>
						</div>			
							<div class="form-group">
					    			<input type='date' name='dob' placeholder="Your date of birth" class='form-control'value="<?php echo $date;?>">
						</div> 
						 <div align="center">
		<input type='submit' value='Verify' name='verify' class='btn btn-success'>
		<input type='reset' value='Clear' name="Clear" class='btn btn-danger'>
	</div> <br>
	<div align="center" >
		<a href="login.php" class=' btn btn-info'> Back to login</a>
	</div> <br> 
	

                      </form>
          
                  </div>
              </div>
          </div>
 <!--script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script-->
</body>


</html>