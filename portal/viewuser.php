<?php
require ('../inc/link.php');
session_start();
include('../inc/admin_session.php');
include('function.php');

if(isset($_GET['id']))
{

  $delete_id= $_GET['id'];
  // $delete= mysqli_query($connect, "DELETE FROM users WHERE users_id = '$delete_id'");
  //
  // if ($delete)
  echo "$delete_id";
  {
    echo "<script>alert('record deleted')</script>";
    header("location:viewuser.php");
  }

  }

if(isset($_GET['page']))
{

$page=$_GET['page'];
}
else
{
	$page=1;
}
$num_per_page=04;
echo $start_from = ($page-1)* 04;




$select= mysqli_query($connect, "SELECT * FROM USERS
	WHERE role ='user' LIMIT $start_from,$num_per_page")
	or die(mysqli_error($connect));
$row=mysqli_num_rows($select);
$fetchs=mysqli_fetch_all($select, MYSQLI_ASSOC);




 ?>

<title>View Users</title>
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
           <center><h1 class="h3 mb-4 text-primary-800"> CURRENT USERS </h1></center>

       <table class="table  table-striped table-bordered">
                  <tr>
                    <th>Name</th>
                    <th>Department</th>
                    <th>Expertise</th>
                    <th>Year of Graduation</th>
                    <th>Contact</th>
                    <th>View Details</th>
                    <th>Update Details</th>
                    <th>Delete</th>
                  </tr>

  <?php
  			if ($row>0) {


  foreach ($fetchs as $fetch): ?>

             <tr>
             <td><?php echo $fetch['first_name']; ?></td>
              <td><?php echo $fetch['department'] ?></td>
              <td><?php echo $fetch['expertise']; ?></td>
              <td><?php echo date('Y', strtotime($fetch['grad_year']));?></td>
              <td><?php echo $fetch['email']; ?></td>
              <td><a class="btn btn-primary" href="view_user.php?vid=<?php echo $fetch['users_id']; ?>">View Details</a></td>
              <td><a  class="btn btn-info" href="profile_update.php?uid=<?php echo $fetch['users_id']; ?>">Update Details</a></td>
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

  <!--  Modals-->



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
          <a class="btn btn-primary" href="viewuser.php?id=<?php echo $fetch['users_id']; ?>">Proceed</a>
        </div>
      </div>
    </div>
  </div>

  <?php include ('../inc/logoutmodal.php'); ?>
  <!--End of  modals-->
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
