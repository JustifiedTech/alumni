<?php
		include('../inc/db_connect.php');
		
if (isset($_POST['Submit']))
{
	$Firstname=$_POST['Fname'];
	$Lastname=$_POST['Lname'];
	$Othername=$_POST['Oname'];
	$dateofbirth=$_POST['DOB'];
	$email=$_POST['Mail'];
	$password=$_POST['Pass'];
	$c_password=$_POST['cPass'];
	$Faculty=$_POST['Faculty'];
	$phone_number=$_POST['Phone'];
	$Gender=$_POST['sex'];
	$Department=$_POST['Department'];
	$Marticulation=$_POST['Matric'];
	$Year_Admitted=$_POST['Ayear'];
	$Year_of_Grad=$_POST['Gyear'];
	$Duration=$_POST['Pyear'];
	$image=$_FILES['image']['name'];
	$temp_image=$_FILES['image']['tmp_name'];
	$checkbox=isset($_POST['check']);
	//echo $Lastname."<br>". $Firstname."<br>".$Othername."<br>".$dateofbirth."<br>".$email."<br>".$phone_number."<br>".$Faculty."<br>". $image;

	if (strlen($Firstname)<3)
	{
	$msg='Firstname must contain at least 3 character';
	}


	$query = mysqli_query($connect, "INSERT INTO users (first_name, other_name, last_name, dob, email, password, phone_number, gender, faculty, department, admin_year, grad_year, matric_no, prog_duration) VALUES('$Firstname','$Othername','$Lastname','$dateofbirth','$email','$password','$phone_number','$Gender','$Faculty','$Department','$Year_Admitted','$Year_of_Grad','$Marticulation','$Duration')");
	else if ($query == 1) {
		echo "<script alert='insertion successful'></script> ";
		header("location:");
	}else{

	}

}
?>