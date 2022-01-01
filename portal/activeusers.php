<?php
session_start();
include('../inc/session.php');
include('function.php');

 include('../inc/link.php');

 ?>
 <title>Chat Message</title>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php  include ('../inc/sidedash.php');?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php include('../inc/topdash.php'); ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

        	<div class="" >

				<h3 class="lead text-dark">  User Status: <small> <em><i class="badge badge-success">Online</i></em></small> <span class="right">Hi- <?php echo $_SESSION['username'];?></span> </h3>

		</div>

		<hr class="light">

				<div class="table-responsive">
				<div class="" id="users_details"> </div>

				<div class="card shadow mb-4" id="users_chat"> </div>
				</div>

        </div>
        <!-- container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <?php include('../inc/dashfooter.php');?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <?php include ('../inc/logoutmodal.php'); ?>
  <!--End of logout modal -->

  <?php include('../inc/scripts.php');?>


</body>




	<link rel="stylesheet" href="../css/jquery-ui.css" />
<script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script>
<script type="text/javascript"src="../js/jquery-ui.min.js"></script>

<script type="text/javascript" src="../js/fontawesome.min.js"></script>
<script defer src="../js/all.js"></script>
</html>
<script>
	$(document).ready(function()

	{
			fetch_user();
			setInterval(function(){
				update_last_activity();
				 fetch_user();
				 update_chat_history_data();
				   },5000);

		function fetch_user()
		{
			$.ajax({
				url:"fetchuser.php",
				method:"POST",
				success:function(data){
					$('#users_details').html(data);
				}
			})
		}
		function update_last_activity()
		{
			$.ajax( {
				url:"lastActivity.php",

				success:function()
				{

				}
			})
		}
		function make_chat_box(to_user_id, to_user_name)
		{
			var chat_modal= '<div id="user_dialog_'+to_user_id+'" class="user_dialog" title="Active with'+" "+''+to_user_name+'">';

			chat_modal+='<div style="height:200px; border: 1px solid #ccc; margin-bottom:24px; overflow-y:scroll; padding:16px;" class="chat_history" data-touserid="'+to_user_id+'" id="chat_history_'+to_user_id+'">';
			chat_modal+= fetch_user_chat_history(to_user_id);
			chat_modal+='</div>';
			chat_modal+='<div class="form-group">';
			chat_modal+= '<textarea name="chat_message_'+to_user_id+'" id="chat_message_'+to_user_id+'" class="form-control chat_message"></textarea>';
			chat_modal+='</div><div class"form-group" align="right">';
			chat_modal+= '<button type="button" name="send_chat" id="'+to_user_id+'" class="send_chat btn btn-info" >Send</button></div></div>';
			$('#users_chat').html(chat_modal);
		}
		$(document).on('click', '.start_chat', function(){
			var to_user_id =$(this).data('touserid');
			var to_user_name =$(this).data('tousername');
			make_chat_box(to_user_id, to_user_name);
			$("#user_dialog_"+to_user_id).dialog({
				autoOpen:false,
				width:400
			});
			$('#user_dialog_'+to_user_id).dialog('open');
		});
		$(document).on('click', '.send_chat', function(){
			var to_user_id =$(this).attr('id');
			var chat_message =$('#chat_message_'+to_user_id).val();
			$.ajax({
				url:"insertchat.php",
				method:"POST",
				data:{to_user_id:to_user_id, chat_message:chat_message},
				success:function(data)
				{
					$('#chat_message_'+to_user_id).val('');
					$('#chat_history_'+to_user_id).html(data);
				}
			})

			});
		function fetch_user_chat_history(to_user_id)
			{
				$.ajax({
					url:"chat_history.php",
					method:"POST",
					data:{to_user_id:to_user_id},
					success:function(data){
						$('#chat_history_'+to_user_id).html(data);
					}
				})
			}
				function update_chat_history_data()
					{
						$('.chat_history').each(function(){
							var to_user_id = $(this).data('touserid');
							fetch_user_chat_history(to_user_id);

						});
					}

					$(document).on('click', '.ui-button-icon', function(){
						$('.user_dialog').dialog('destroy').remove();
					});

						$(document).on('focus', '.chat_message', function(){
							var type_notice = 'yes';
							$.ajax({
								url:"update_type.php",
								method:"POST",
								data:{type_notice:type_notice},
								success:function()
								{

								}
							})


					});

						$(document).on('blur', '.chat_message', function(){
							var type_notice = 'no';
							$.ajax({
								url:"update_type.php",
								method:"POST",
								data:{type_notice:type_notice},
								success:function()
								{

								}
							})


					});

						$(document).on('click', '.remove_chat', function(){
							var chat_message_id =$(this).attr('id');
							if (confirm("Really want to delete this message?"))
							{
								$.ajax({
									url:"remove.php",
									method:"POST",
									data:{chat_message_id:chat_message_id},
									success:function(data)
									{
										update_chat_history_data();
									}
								})
							}


						});



		});




</script>
