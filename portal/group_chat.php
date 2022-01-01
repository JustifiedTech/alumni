<?php 
 include ('../inc/link.php');
 session_start();
//include('../inc/session.php');
include('function.php');


if ($_POST['action'] == "insert_data")
{


	$from_user_id=$_SESSION['users_id'];
	$chat_message=$_POST['chat_message'];
	$status='1';

	$insert=mysqli_query($connect, "INSERT INTO chat_message (`from_user_id`, `chat_message`, `status`) VALUES('$from_user_id','$chat_message','$status')")or die(mysqli_error($connect));



	if ($insert == true) 

{
	echo fetch_group_chat_history($connect);
	

}

}


if ($_POST['action'] == "fetch_data")
{
	echo fetch_group_chat_history($connect);
}

 ?>