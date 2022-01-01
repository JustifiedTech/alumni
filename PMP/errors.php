

<?php
$error= array();
	if (count($error) > 0) {	
?>
	<div class="alert alert-success" style="width: 100%; margin-top: 5px;">
<?php
	foreach ($error as $errors) {
	echo $errors.","."<br>";
	}
?>
	</div>
<?php
}
?>
