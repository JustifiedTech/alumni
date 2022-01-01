<?php

require_once('../inc/header.php');

$select=mysqli_query($connect,"
	SELECT * FROM users 
	WHERE user_type = 'Alumni'
") or die(mysqli_error($connect));
		$row=mysqli_num_rows($select);



		$display='<div class="container-fluid padding">';
		$display.='<div class="row padding text-center text-white welcome">
					<div class="col-12"> 
					<h2 class"display-6">DISTINGUISHED ALUMNI</h2>
					';
		$display.='</div>'; 
		$display.=	'<hr class="">';
		$display.= '</div>';
		$display.='<div class"row padding">';

	if($row>0)
		{
			while ($fetch=mysqli_fetch_assoc($select)) 
		{
			
			
			$display.='<div class="well padding col-md-3" style="display:inline-block;">';
			$display.='<div class=" card">';
			$display.='<img class="card-img-top" style="height:15rem;" src="../uploads/'.$fetch['passport'].'">';
			$display.=	'<div class="card-body text-center">';
			$display.='<h6 class="card-title ">Name:'." ".$fetch['first_name']." ".$fetch['last_name'].'</h6>';
			$display.= '<p class="card-text center">Course:'." ".$fetch['department'].'</p>';
			$display.='<p class="card-text center">Class of:'." ".date('Y', strtotime($fetch['grad_year'])).'</p>
						';
			$display.='</div>';
			$display.='</div>';
			$display.='<div>';
			$display.='</div>';
			$display.='</div>';
			
		}
		echo $display;

	}

?>

	<title> Alumni Image Gallery</title>
</head>
<body>
		<div class="container-fluid" id="display" >
			


		</div>
	 <?php 
include ('../inc/footer.php');
?>
</body>
<?php include('../inc/scripts.php');?>
</html>