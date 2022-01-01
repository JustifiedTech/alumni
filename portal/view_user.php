<?php
include ('../inc/link.php');
session_start();

include('../inc/admin_session.php');


$users_id=$_SESSION['users_id'];

if(isset($_GET['vid']))
{

  $view_id= $_GET['vid'];
  $select = mysqli_query($connect, "SELECT * FROM users 
    WHERE users_id = '".$_GET['vid']."'");
        $row=mysqli_num_rows($select);
    $fetch= mysqli_fetch_assoc($select);
  
  
if ($row>0)
{
     
 
$first=$fetch['first_name'];
$last=$fetch['last_name'];
$other_name =$fetch['other_name'];
$img=$fetch['passport'];
$email=$fetch['email'];
$department=$fetch['department'];
$expertise=$fetch['expertise'];
$faculty=$fetch['faculty'];
$course=$fetch['course'];
$grad=date('Y', strtotime($fetch['grad_year']));
$qualify=$fetch['qualification'];
$usertype=$fetch['user_type'];
$dob=$fetch['dob']; 
$phone=$fetch['phone_number'];
$gender=$fetch['gender'];
$matric=$fetch['matric_no'];
$admin=date('Y', strtotime($fetch['admin_year']));
$address=$fetch['address'];
$duration =$fetch['prog_duration'];


}

  }

 ?>
<title> User Profile Details</title>
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
             <div class="card">

            <div class="row">
            	<div class="col-md-2">
            		<fieldset style="border: .05rem dotted blue;">
            			<legend class="Lead text text-danger"> Profile Image</legend>
            		<img style="height:15rem;" class="" src="../uploads/<?php echo $img; ?>">
            	</fieldset>
            	</div>
            	<div class="col-md-9 offset-1">

            		<fieldset style="border: .05rem dotted blue; ">
            			<legend class="text text-danger text-center	">Personal Details</legend>
            			<table class="table table-condensed table-responsive table-responsive table-bordered table-striped">
            			<tr class="">
            				<th bgcolor="#024" class="text-white">Name:</th> <td class="text-lg"><?php echo $last." ".$first." ".$other_name; ?></td>
            			</tr>

            			<tr>
            				<th bgcolor="#024" class="text-white">Sex:</th> <td class="text-lg"><?php echo $gender; ?></td>
            			</tr>
            			<tr>
            				<th bgcolor="#024" class="text-white">Data of Birth:</th> <td class="text-lg"><?php echo $dob; ?></td>
            			</tr>
            			<tr>
            				<th bgcolor="#024" class="text-white">Email:</th> <td class="text-lg"><?php echo $email; ?></td>
            			</tr>
            			<tr>
            				<th bgcolor="#024" class="text-white">Phone Number:</th> <td class="text-lg"><?php echo $phone; ?></td>
            			</tr>
            			<tr>
            				<th bgcolor="#024" class="text-white">Address:</th> <td class="text-lg"><?php echo $address; ?></td>
            			</tr>
            			
            		</table>
            		</fieldset>
            		           		
            		</div>
            	        
                </div>

                <div class="row padding">
                	<div class="col-md-10 offset-1">
                		<fieldset class="" style="border: .05rem dotted blue; ">
            			<legend class="text text-danger text-center	">Educational Details</legend>
            			<table class="table table-condensed table-responsive table-responsive table-bordered table-striped">
            			<tr class="">
            				<th bgcolor="#024" class="text-white">Faculty:</th> <td class="text-lg"><?php echo $faculty ?></td> 
            				<th bgcolor="#024" class="text-white">Department:</th> <td class="text-lg"><?php echo $department; ?></td>

            			</tr>

            			<tr>
            				<th bgcolor="#024" class="text-white">Matric Number:</th> <td class="text-lg"><?php echo $matric; ?></td>
            			</tr>
            			<tr>
            				<th bgcolor="#024" class="text-white">Course:</th> <td class="text-lg"><?php echo $course; ?></td>
            			</tr>
            			<tr>
            				<th bgcolor="#024" class="text-white">Admission Year:</th> <td class="text-lg"><?php echo $admin; ?></td>
            			</tr>
            			<tr>
            				<th bgcolor="#024" class="text-white">Graduation Year:</th> <td class="text-lg"><?php echo $grad; ?></td>
            			</tr>
            			<tr>
            				<th bgcolor="#024" class="text-white">Duration:</th> <td class="text-lg"><?php echo $duration; ?></td>
            			</tr>
            			<tr>
            				<th bgcolor="#024" class="text-white">Qualification:</th> <td class="text-lg"><?php echo $qualify; ?></td>
            			</tr>
            			<tr>
            				<th bgcolor="#024" class="text-white">Area of Specialization:</th> <td class="text-lg"><?php echo $expertise; ?></td>
            			</tr>
            			
            		</table>
            		</fieldset>

                	</div>
                </div>
            </div>
        </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
	</div>
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

</html>
 

