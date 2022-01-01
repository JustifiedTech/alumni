<?php 

session_start();
include('../inc/session.php');
$users_id=$_SESSION['users_id'];


include('function.php');



$to_user_id= $_POST['to_user_id'];
$from_user_id=$_SESSION['users_id'];
$chat_message=$_POST['chat_message'];
$status='1';



$insert=mysqli_query($connect, "INSERT INTO chat_message (to_user_id, from_user_id, chat_message, status) VALUES('$to_user_id','$from_user_id','$chat_message','$status')")or die(mysqli_error($connect));
	 
if ($insert == true) 

{
	echo fetch_user_chat_history($_SESSION['users_id'], $_POST['to_user_id'], $connect);
	

}
//$insert->close();
//$connect->close();

?>

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