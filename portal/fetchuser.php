<?php
date_default_timezone_set('Africa/Lagos');
session_start();
include('function.php');

if (!isset($_SESSION['users_id']) || !isset($_COOKIE['user']))

{

	include('../inc/session.php');
	//header("location:session.php");

}

$users_id = $_SESSION['users_id'];
$username = $_SESSION['username'];
$select= mysqli_query($connect, "SELECT * FROM USERS
	WHERE users_id !='$users_id'
	")
	or die(mysqli_error($connect));





?>
</head>

<body>
<div>


						<?php

						if(mysqli_num_rows($select)> 0)
						{
						echo '<table class="table  table-striped" id="tabledata" width="100%" cellspacing="0">

										<tr>
									<th>Username</th>
									<th>Status</th>
									<th> Unread Message</th>
									<th>Action</th>
								</tr>';

					while($indv=mysqli_fetch_assoc($select))
					{
						$current_time =strtotime(date('Y-m-d H:i:s'). '-10 second');
						$current_time =date('Y-m-d H:i:s', $current_time);
						$user_last_activity=get_user_last_activity($indv['users_id'], $connect);

							if ($user_last_activity > $current_time)
							 	{
									$status='<label class="badge badge-success">Online</label>';
								}
						else
					{
								$status='<label class="badge badge-danger">Offline</label>';
							}
		if ($user_last_activity > $current_time){
							?>


			<tr>
				<td><?php echo $indv['last_name']." ".$indv['first_name']." (".$indv['user_type'].")".' '.fetch_type_status($indv['users_id'], $connect)?></td>
				<td><?php echo $status ?> </td>
						<td><?php echo count_unseen_message($indv['users_id'], $_SESSION['users_id'], $connect) ?> </td>
				<td><button type="button" class="btn btn-info btn-xs start_chat" data-touserid="<?php echo $indv['users_id']; ?>" data-tousername="<?php echo ucfirst(strtolower($indv['first_name'])) ?>"> Start Chat</button></td>
			</tr>

            <?php

}

		}
?>

		</table>
	</div>
<?php
}



			 ?>

  <?php include('../inc/scripts.php');?>

<link rel="stylesheet" href="../css/jquery-ui.css" />
<script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script>
<script type="text/javascript"src="../js/jquery-ui.min.js"></script>

<script type="text/javascript" src="../js/fontawesome.min.js"></script>
<script defer src="../js/all.js"></script>

 <script type="text/javascript">


	 	$(document).ready(function(){
	 		$('#data').DataTable({

	 			"pagingType": "full_numbers",
	 			"lengthMenu":[
	 				[10, 25, 50, -1],
	 				[10, 25, 50, "All"]
	 			],
	 			responsive:true,
	 			language:{
	 				search:"_INPUT_",
	 				searchPlaceholder: "Search Records",
	 			}

	 		});

	 	});
	 </script>
</body>
</html>
