<?php 
require ('../inc/link.php');
session_start();

include('../inc/admin_session.php');
include('function.php'); 

$users_id = $_SESSION['users_id'];

if(isset($_GET['did']))
{   

  

  $delete_id= $_GET['did'];

  $select= mysqli_query($connect, "SELECT * FROM USERS 
  WHERE users_id ='$delete_id'") 
  or die(mysqli_error($connect));
    $row=mysqli_num_rows($select);
  $f=mysqli_fetch_array($select);


    $mail=$f['email'];

    $delete= mysqli_query($connect, "DELETE FROM admin WHERE email = '$mail'");
    
  
  if ($delete) 

  {

   $delete1= mysqli_query($connect, "DELETE FROM users WHERE users_id = '$delete_id'");
    echo "<script>alert('Admin record deleted successfully')</script>";
     #header("location:viewadmin.php");
  }
    
  }


  $select= mysqli_query($connect, "SELECT * FROM USERS 
	WHERE role ='Admin'") 
	or die(mysqli_error($connect));
    $row=mysqli_num_rows($select);
  $fetchs=mysqli_fetch_all($select, MYSQLI_ASSOC);



    
 ?>

<title>System Admins</title>
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

          <?php if ($row<0) {
            
          }

          ?>
           <center><h1 class="h3 mb-4 text-primary-800"> SYSTEM ADMIN </h1></center>

       <table class="table  table-striped table-bordered">
                  <tr>
                    <th>Name</th>
                    <th>Expertise</th>
                    <th>Contact</th>
                    <th>View Details</th>
                    <th>Delete</ths>
                  </tr>

  <?php 
  			if ($row>0) {
  				

  foreach ($fetchs as $fetch): ?>

             <tr> 
             <td><?php echo $fetch['first_name']. " ". $fetch['last_name']; ?></td>
              <td><?php echo $fetch['expertise']; ?></td>
              <td><?php echo $fetch['email']; ?></td>
              <td><a class="btn btn-primary" href="view_user.php?vid=<?php echo $fetch['users_id']; ?>">View Details</a></td>
              <td>  <a class="btn btn-danger" href="#" data-toggle="modal" data-target="#deletemodal">Delete</a></td>
             </tr>

  <?php endforeach;

}

   ?>

   </table>
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



  <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete User Record</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Are you sure you want to delete this record?</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="viewadmin.php?did=<?php echo $fetch['users_id']; ?>">Yes</a>
        </div>
      </div>
    </div>
  </div>

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
 











