<?php
session_start();

require('../inc/session.php');
$LastActivity =mysqli_query($connect,
	 "UPDATE login_details
	 	SET last_activity = now()
	 	WHERE LoginDetails_id= '".$_SESSION['LoginDetails_id']."'
	");


?>
