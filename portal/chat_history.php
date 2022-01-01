<?php
include ('../inc/link.php');

session_start();
include('../inc/session.php');
   
include('function.php');

echo fetch_user_chat_history($_SESSION['users_id'], $_POST['to_user_id'], $connect);


 ?>