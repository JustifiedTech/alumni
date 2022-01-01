<?php
include ('db_connect.php');
$status='';
function login()
{
if (isset($_SESSION['users_id']) || isset($_COOKIE['user']))

{

	return true;
	}
else 
{
	return false;
}

}

if (login())
{
	if((time() - $_SESSION['last_login']) > 600)
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


