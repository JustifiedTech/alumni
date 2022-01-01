<?php
date_default_timezone_set('Africa/Lagos');
$hostname = "localhost";
$username = "root";
$password = "";
$database = "alumni_db";

$connect = new mysqli($hostname, $username, $password, $database);


if ($connect->connect_error){
	die("connection failed:". $connect->connect_error);

}
else{
	//echo "Connection Successful";

} 


?>