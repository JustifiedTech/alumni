<?php 

include('../inc/link.php'); 
session_start();
include('../inc/db_connect.php');


$fid=$_SESSION['password'];

if (!isset($_SESSION['password']))
{
  header('location:forgotpass.php');
}

$error=array();

if (isset($_POST['submit'])) 
{


$new_password=mysqli_real_escape_string($connect, $_POST['new']);
$cnew_password=mysqli_real_escape_string($connect, $_POST['confirm']);
 
        if (empty($new_password))
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
        else if ($new_password != $cnew_password)
            {
        array_push($error, "Password Mismatched");
            }

    else
        {
$new_password=md5(md5($new_password));
          
          if(isset($_GET['fid']))
            {

                $fid= $_GET['fid'];
                $update= mysqli_query($connect, "UPDATE users SET `password`= '$new_password' WHERE users_id = '$fid'");
                
                if ($update) 
                {
                  echo "<script>alert('Password reset successful')</script>";
                    session_unset();
                  header("location:login.php");

                }
                  
                }
        }


}

?>
<title>Reset Password</title>
</head>



<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

               <!-- Begin Page Content -->
        <div class="container-fluid padding">
             <div class="mt-3">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="changePassword">
                        <h2>Reset Password Here</h2>
                        <hr class="light">
                         
                    
                        <form action="" method="POST">
                            <?php include ('../inc/error.php'); ?>
                           
                            <div class="form-group">
                                <input type="password" name='new' id="new" class="form-control" placeholder="Enter New Password.">
                                       </div>
                            <div class="form-group">
                                <input type="password" name='confirm' id="confirm" class="form-control" placeholder="Confirm New Password.">
                                </div>
                            <hr class="light">
                            <input type="submit" name="submit" value="Reset Password" class="btn btn-outline-success btn-xs">
                        </form>
                    </div>
                </div>
            </div>
        </div>

        </div>
        <!-- /.container-fluid -->

     

   

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->

  <!-- Logout Modal-->
    <!--End of logout modal -->
  <!-- Bootstrap core JavaScript-->
  
</body>

</html>
 

      