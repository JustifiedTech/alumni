<?php 
session_start();
require_once('../inc/session.php');
$error= array();
$users_id=$_SESSION['users_id'];
if (isset($_POST['submit'])) 
{

$old_password=mysqli_real_escape_string($connect, $_POST['old']);
$new_password=mysqli_real_escape_string($connect, $_POST['new']);
$cnew_password=mysqli_real_escape_string($connect, $_POST['confirm']);
 
        if (empty($old_password))
              
              {
                    array_push($error, "Please enter your current password");
               }

        else if (empty($new_password))
            {
                array_push($error, "Please a new password");
            }
              else if (strlen($new_password)<6) 
          {
             array_push($error, "Password must contain at least 6 characters");
          }
        else if (empty($cnew_password))
            {
                array_push($error, "please re-enter password");
            }
        else if ($new_password !=$cnew_password)
            {
        array_push($error, "Password Mismatched");
            }

    else
        {
            $select=mysqli_query($connect, "
                SELECT password
                FROM users 
                WHERE users_id = '$users_id'
                ");
            $row=mysqli_num_rows($select);
              

            if ($row>0)
            {
              
                while ($fetch=mysqli_fetch_array($select)) 
                {
                    $db_password=$fetch['password'];
                    $old_password=md5(md5($old_password));
                    $new_password=md5(md5($new_password));
              
                          if ($db_password==$old_password) 
              
                                {
                                     mysqli_query($connect,
                                      "UPDATE users
                                        SET password = '$new_password'
                                            WHERE users_id= '".$_SESSION['users_id']."' 
                                                ");
                                     //$server->message("Password has been changed successfully.");

                                        echo '<script>alert(" Your password has been changed successfully ")</script>';
                                    }

                         else if ($db_password!=$old_password)
                            {
                                array_push($error, "Wrong Password ");
                            }

                }
                
            }
        }


}

?>
<?php include ('../inc/link.php');
    
 ?>
<title>Change Password</title>
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
             <div class="mt-3">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="changePassword">
                        <h2>Change Your Password Here</h2>
                        <hr class="light">
                         
                    
                        <form action="" method="POST">
                            <?php include ('../inc/error.php'); ?>
                            <div class="form-group">
                                <input type="password" name='old' id="old" class="form-control" placeholder="Enter Old Password.">
                              </div>
                            <div class="form-group">
                                <input type="password" name='new' id="new" class="form-control" placeholder="Enter New Password.">
                                       </div>
                            <div class="form-group">
                                <input type="password" name='confirm' id="confirm" class="form-control" placeholder="Confirm New Password.">
                                </div>
                            <hr class="light">
                            <input type="submit" name="submit" value="Change Password" class="btn btn-outline-success btn-xs">
                        </form>
                    </div>
                </div>
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
 

      