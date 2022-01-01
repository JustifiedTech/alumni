<?php 
 include ('../inc/link.php');
 session_start();
include('../inc/session.php');
include('function.php');


 ?>
 <title>Group Chat</title>
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
				<div class="col-md-3 col-sm-4">
					<input type="hidden" id="active_group_chat_window" value="no" />
					<button type="button" class="btn btn-warning btn-sm" name="group_chat" id="group_chat" >Group Chat</button>
				</div>
				


  	<div id="group_chat_dialog" title="Group chat Window">
		<div id="group_chat_history" style="height:200px; border:1px solid #ccc; overflow-y:scroll; margin-bottom:24px; padding:16px;">
			
		</div>		
		<div class="form-group">
			<textarea name="group_chat_message" id="group_chat_message" class="form-control">
				
			</textarea>
		</div>
		<div class="form-group" align="right">
			<button type="button" name="send_group_chat" id="send_group_chat" class="btn btn-info">send</button>
		</div>


	</div>
			
        </div>
        <!-- /.container-fluid -->

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
  <!-- Bootstrap core JavaScript-->
  <?php include('../inc/scripts.php');?>


 
</body>


  <?php include('../inc/scripts.php');?>


<link rel="stylesheet" href="../css/jquery-ui.css" />
<script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script>
<script type="text/javascript"src="../js/jquery-ui.min.js"></script>

<script type="text/javascript" src="../js/fontawesome.min.js"></script> 
<script defer src="../js/all.js"></script>
</html>
<script>
	$(document).ready(function()

	{	
			
			setInterval(function(){
				update_last_activity();
				 fetch_user();
				fetch_group_chat_history();
				   },5000);

		
		function update_last_activity() 
		{
			$.ajax( {
				url:"lastActivity.php",
				
				success:function()
				{

				}
			})
		}
		
		
			$('#group_chat_dialog').dialog({
				autoOpen:false,
				width:400
			});

			$('#group_chat').click(function(){
				$('#group_chat_dialog').dialog('open');
				$('#active_group_chat_window').val('yes');
				fetch_group_chat_history();

			});

			$('#send_group_chat').click(function(){
				var chat_message = $('#group_chat_message').val();
				var action = 'insert_data';
				if (chat_message != '')
				{
					$.ajax({
						url:"group_chat.php",
						method:"POST",
						data:{chat_message:chat_message, action:action},
						success:function(data){
							$('#group_chat_message').val('');
							$('#group_chat_history').html(data);
						}
					})
				} 
			});

			function fetch_group_chat_history()
			{
				var group_chat_dialog_active = $('#active_group_chat_window').val();
				var action ="fetch_data";
				if (group_chat_dialog_active == 'yes') 
				{
					$.ajax({
						url:"group_chat.php",
						method:"POST",
						data:{action:action},
						success:function(data)
						{
							$('#group_chat_history').html(data);
						}
					})
				}
			}


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
										fetch_group_chat_history();
									}
								})
							}


						});



		});




</script>