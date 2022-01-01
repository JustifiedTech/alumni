<?php

date_default_timezone_set('Africa/Lagos');
include('../inc/db_connect.php');
//include('../phpclasses/pagination.php');
//include('../inc/session.php');
$username=$_SESSION['username'];

$select = mysqli_query($connect, "SELECT * FROM users 
	WHERE matric_no ='$username' or email ='$username'");

$num_row=mysqli_num_rows($select);
$fetch= mysqli_fetch_array($select);
$first_name=$fetch['first_name'];
$last_name=$fetch['last_name'];
$image=$fetch['passport'];
$user_type=$fetch['user_type'];
//print_r($fetch);
if ($num_row>=1)
{
//$_SESSION['users_id']=$fetch['users_id'];

}
?>





<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar notice -->
          <div class="d-none d-sm-inline-block div-inline mr-auto ml-md-3 my-2 my-md-0 mw-100">
            <p class=" text-info"> <img style="height:3em; width:4em;" class="left" src="../img/fuwlogo.png"> <span>ALUMNI ASSOCIATION OF FEDERAL UNIVERSITY WUKARI </span></p>
          </div>
         <div class="topbar-divider d-none d-sm-block"></div>
          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item -  Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-info fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <div class="div-inline mr-auto w-100 navbar-search">
                   <p class="text text-info"> Welcome! Dear <?php echo $user_type; ?></p>
                </div>
              </div>
            </li>

            <div class="d-none d-sm-inline-block div-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 ">
            <p class="text text-danger"> Welcome! Dear <?php echo $user_type; ?></p>
          </div>

            <!-- Nav Item - Messages -->
           
            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo ucfirst($first_name). " ". $last_name;?></span>
               <img style="height:50px;" class=" rounded-circle circle-sm" src="../uploads/<?php echo $image ?>">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="profile.php">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="setting.php">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  change password
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>