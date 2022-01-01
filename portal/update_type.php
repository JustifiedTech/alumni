<?php 
session_start();
require('../inc/session.php');
include ('function.php');
$typing =mysqli_query($connect,
	 "UPDATE login_details
	 	SET type_notice = '".$_POST['type_notice']."' 
	 	WHERE LoginDetails_id= '".$_SESSION['LoginDetails_id']."' 
	");


?>