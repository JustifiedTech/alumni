<?php 
include 'function.php';

include('../inc/session.php');

if (isset($_POST['chat_message_id'])) 
{
		$select= mysqli_query($connect,
	 		"UPDATE chat_message
	 		SET status = '2'
	 	WHERE ChatMsg_id = '".$_POST['chat_message_id']."'
		");


}



?>