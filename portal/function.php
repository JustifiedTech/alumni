<?php

include('../inc/db_connect.php');



function get_user_last_activity($users_id, $connect)
{

	$select= mysqli_query($connect, " SELECT * 
				FROM login_details
				WHERE users_id ='$users_id'
				ORDER BY last_activity DESC 
				LIMIT 1 ");
	 
	if(mysqli_num_rows($select)>0) 
	{

	 		while ($indv=mysqli_fetch_assoc($select)) 
		{
			 return $indv['last_activity'];
		}
	}
	
}


function fetch_user_chat_history($from_user_id, $to_user_id, $connect)
{
	$select=mysqli_query($connect, "
		SELECT * FROM chat_message
		WHERE (from_user_id = '".$from_user_id."'
				AND to_user_id='".$to_user_id."')
				OR (from_user_id='".$to_user_id."' 
				AND to_user_id='".$from_user_id."')
				ORDER BY chat_time DESC 
				");
		$indv=mysqli_num_rows($select);
		$display= '<ul class ="list-unstyled">';
		while ($fetch=mysqli_fetch_assoc($select)) 
		{
			if($fetch['from_user_id']== $from_user_id) 
			{
				
					if($fetch['status'] == '2')
				{
					$chat_message='<em> You deleted this message </em>';
					
						$user_name='<b class="text-primary">Me</b>';
				}
				else 
				{
						$chat_message= $fetch['chat_message'];
						$user_name='<button type="button" class="badge badge-danger btn-xs remove_chat " id ="'.$fetch['ChatMsg_id'].'">X</button>&nbsp;<b class="text-primary">Me</b>';
				
							
				}

				$display.='<li style="width:100%; border-bottom:1px dotted #ccc; background:#234;">
						<p class="text-white" >'.$user_name.' <br> '.$chat_message.'
						<div align ="right">
							-<sub class="text text-danger"><em>'.date('M, d D h:i A', strtotime($fetch['chat_time'])).'</em></sub>
							</div>
							</p>

							</li>';	
				
				}
				else
				{
														
							if($fetch['status'] == '2')
							{
								$chat_message='<em> This message was deleted </em>';
								
							}
							else
							{
								$chat_message= $fetch['chat_message'];
							}

							$user_name='<b class="text-info">'.ucfirst(strtolower(get_user_name($fetch['from_user_id'], $connect))).'</b>';
							
						$display.='<li style=" width:100%; border-bottom:1px dotted #222; background:#ccc;">
							<p>'.$user_name.' <br> '.$chat_message.'
									<div align ="right">
										-<sub class="text text-danger"><em>'.date('M, d D h:i A', strtotime($fetch['chat_time'])).'</em></sub>
									</div>
							</p>

						</li>';	
				}

		/*	$display.='<li style="border-bottom:1px dotted #ccc;'.$background.'">
				<p>'.$user_name.' - '.$fetch['chat_message'].'
						<div align ="right">
							-<small class="text text-danger"><em>'.$fetch['chat_time'].'</em></small>
						</div>
				</p>

			</li>';	*/
		}
		$display.='</ul>';

							$select= mysqli_query($connect,
	 						"UPDATE chat_message
	 							SET status = '0'
	 						WHERE from_user_id = '".$to_user_id."'
							AND to_user_id='".$from_user_id."'
							AND status ='1'
				 
						");

		return $display;
}
function get_user_name($users_id, $connect)
		{
			$select=mysqli_query($connect, "SELECT first_name 
				FROM users
				WHERE users_id = '$users_id'");
			$row=mysqli_num_rows($select);

			if($row>0){

			while ($fetch=mysqli_fetch_array($select))
			{
				return $fetch['first_name'];
			}
		}
	}

function count_unseen_message($from_user_id, $to_user_id, $connect)

	{
		$display='';
		$select=mysqli_query($connect, "
					SELECT * FROM chat_message
					WHERE from_user_id = '$from_user_id'
					AND to_user_id='$to_user_id'
					AND status ='1'
				 ");
		$ind=mysqli_num_rows($select);
				
		if ($ind > 0) 

			{
				$display.= '<span class ="badge badge-danger">'.$ind.'</span>';

   
			}
					return $display;
		
	}

	function fetch_type_status($users_id, $connect)
	{
		$select = mysqli_query($connect, "
			SELECT type_notice
			FROM login_details
			WHERE users_id = '".$users_id."'
			ORDER BY last_activity DESC
			LIMIT 1 ");


		$row=mysqli_num_rows($select);
		$fetch=mysqli_fetch_all($select, MYSQLI_ASSOC);
		$display='';
		foreach ($fetch as $indv):

			if ($indv['type_notice'] == 'yes') 
			{
				$display.=' - <small><em><span class = "text-muted"> is typing... </span></em></small>';
			}


		endforeach;
		return $display;
	}

	function fetch_group_chat_history($connect)
	{
		
			$select=mysqli_query($connect, "
				SELECT * 
				FROM chat_message
				WHERE to_user_id = '0'
				ORDER BY chat_time DESC 
				");



		$indv=mysqli_num_rows($select);
		$display= '<ul class ="list-unstyled">';
		while ($fetch=mysqli_fetch_assoc($select)) 
		{
				if($fetch['from_user_id']== $_SESSION['users_id']) 
				{
				
					if($fetch['status'] == '2')
				{
					$chat_message='<em> You deleted this message </em>';
					
						$user_name='<b class="text-primary">Me</b>';
				}
				else 
				{
						$chat_message= $fetch['chat_message'];
						$user_name='<button type="button" class="badge badge-danger btn-xs remove_chat " id ="'.$fetch['ChatMsg_id'].'">X</button>&nbsp;<b class="text-primary">Me</b>';
				
							
				}

				$display.='<li style="width:100%; border-bottom:1px dotted #ccc; background:#234;">
						<p class="text-white" >'.$user_name.' <br> '.$chat_message.'
						<div align ="right">
							-<sub class="text text-danger"><em>'.date('M, d D h:i A', strtotime($fetch['chat_time'])).'</em></sub>
							</div>
							</p>

							</li>';	
				
				}
				else
				{
														
							if($fetch['status'] == '2')
							{
								$chat_message='<em> This message was deleted </em>';
								
							}
							else
							{
								$chat_message= $fetch['chat_message'];
							}

							$user_name='<b class="text-info">'.ucfirst(strtolower(get_user_name($fetch['from_user_id'], $connect))).'</b>';
							
						$display.='<li style=" width:100%; border-bottom:1px dotted #222; background:#ccc;">
							<p>'.$user_name.' <br> '.$chat_message.'
									<div align ="right">
										-<sub class="text text-danger"><em>'.date('M, d D h:i A', strtotime($fetch['chat_time'])).'</em></sub>
									</div>
							</p>

						</li>';	
				}

				/*$display.='<li style="border-bottom:1px dotted #ccc;">
					<p>'.$user_name.' - '.$fetch['chat_message'].'
							<div align ="right">
								-<small class="text text-danger"><em>'.$fetch['chat_time'].'</em></small>
							</div>
					</p>

				</li>';	*/
		}
		
		$display.='</ul>';
			return $display;
	}


?>