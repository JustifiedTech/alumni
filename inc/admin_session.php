<?php
include ('db_connect.php');
$status='';
function admin()
{
 if ($_SESSION['role']==='Admin'  || $_SESSION['role']==='Super_Admin')

{
	return true;
	}
else
{
	return false;
}
}
if (admin())
{
	if((time() - $_SESSION['last_login'])>600)
	{
		header("location:logout.php");
	}
	else
	{
		$_SESSION['last_login']=time();
	}


}
else
{

	header('location:login.php');
}
//if (isset($_SESSION['users_id'])){
		//header('location:dashboard.php');
//}


?>
