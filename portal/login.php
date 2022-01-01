<?php 
session_start();
include('../inc/link.php');	
include('../inc/db_connect.php');


$error=array();
$last_activity='';
$error1='';$error2=''; 

if(isset($_POST['Submit']))
{
$username=($_POST['username']);
$Password = mysqli_escape_string($connect, $_POST['Pass']);
$checkbox=isset($_POST['check']);

 if (empty($username))
	{
	$error1="<span class='alert alert-danger'> Enter your Matriculation Number or Email</span>";
}
if (empty($Password)) {
	$error2="<span class ='alert alert-danger'> Enter your password </span>";
}
else  {
			$check=mysqli_query($connect, "SELECT * FROM users WHERE matric_no ='$username' or email='$username'") or die(mysqli_error($connect));
			$numrow=mysqli_num_rows($check);
						
			if ($numrow >0)
					{
						while ($fetch=mysqli_fetch_array($check))
						{


						 	$db_password=$fetch['password'];
						 	$users_id=$fetch['users_id'];

						 	$role=$fetch ['role']; 


						 	$Password= md5(md5($Password));
				 			if($Password==$db_password) 
				 			{	

				 				$subinsert= mysqli_query($connect, "INSERT INTO login_details (users_id) VALUES('$users_id')")or die(mysqli_error($connect));
									$_SESSION['LoginDetails_id'] = mysqli_insert_id($connect);
									$_SESSION['role']=$role;
									$_SESSION['username']=$username;
									$_SESSION['users_id']=$users_id;
									$_SESSION['last_login']=time();

									if($checkbox!='')
									{
										setcookie('user', $users_id, time()+30);
									}

				 				header('location:menu.php');			
							}
							else{
									array_push($error, "Wrong Password and Username Combination");
								}
						}
					}
			
						
			if ($numrow==0)
			 	{
					array_push($error, "User does not exist");
				}
										 	
				 	
				
			}
}
?>

	
	<title> FUWukari_Alumni/Login</title>
</head>

<body class="login">
<div class="container-fluid padding">
		  <div class="d-none d-sm-inline-block div-inline mr-auto ml-md-3 my-2 my-md-0 mw-100">
            <p class=" text-white"> <img style="height:3em; width:4em;" class="left" src="../img/fuwlogo.png"> <span>ALUMNI ASSOCIATION OF FEDERAL UNIVERSITY WUKARI </span></p>
          </div>

          <a class="right mr-4" href="index.php"><button class='btn btn-dark btn-sm'><i class="fa fa-home"></i> Home</button></a>
</div>

	
<div class ='container-fluid padding text-default' >

<div class="">
<div class='card text-white bg-transparent col-md-4 offset-md-4'>
<form method="POST" enctype="multipart/form-data" action="login.php" >
			<div style="background:#0244;"class="card-header text-center"> <h2> LOGIN HERE </h2>
			</div>
			<div class = 'card-body' style="background:#024;" >
				                     
                      


<?php include('../inc/error.php'); ?>

                      <div class="form-group">
					  	<label> User Email or Matric Number:</label>
					    <input type='text' name='username' placeholder=" Valid Matric No. or Email" class='form-control' value="<?php $username;?>">
					    	<?php echo $error1; ?>
							</div>	
						<div class="form-group"> 			
						<label> Password:</label>
					    <input type='password' name='Pass' placeholder="Password" class='form-control' value="">
					    <?php echo $error2; ?>
						</div> 
						<div class="form-group"> 			
						<input type='checkbox' name='check' placeholder="Password"> Keep me logged in 
						</div>
					</div>
		<div class="card-footer">
		<div align="center">
	
	<button type='submit' name="Submit"  style="background:#024;" class='btn btn-md text-white'> <i class="fa fa-sign-in-alt"></i> Login</button>
	<input type='reset'value='Clear'name="Clear" class='btn btn-dark'>
	</div> <br>
	<div align="center" >
		<a href="verify.php" class='text-white left'>Register Here</a>
	</div> <br> 
	<div align="center" >

		<a href="forgotpass.php" class='btn btn-warning left'>Forgot your password?</a>
	</div>
	
</div> 
	     

       </form>
         </div>
     </div>


</div>
	
		
<!--script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script-->  
<?php include('../inc/scripts.php');?>

	
</body>

</html>