

<ul class=" navbar-nav bg-gradient  sidebar sidebar-dark accordion bg-dash" id="accordionSidebar" style="background:#024;">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="menu.php">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fa fa-tachometer-alt fa-fw"></i>
         <img src="" class="d-block w-100 img-rounded-circle">
        </div>
        <div class="sidebar-brand-text mx-3">ALUMNI DASHBORD</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">
    <?php
    if ( $_SESSION['role']==='Admin'  or $_SESSION['role']==='Super_Admin') { 
          
    ?>
      <!-- Nav Item - Dashboard -->
                    <li class="nav-item active">
                            <a class="nav-link" href="#">
                                <i class="fas fa-fw fa-user-o"></i>
                                <span>ADMIN</span></a>
                    </li>
    <?php
    }
            ?>
    
           
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMainMenu" aria-expanded="true" aria-controls="collapseMainMenu">
        <i class="fas fa-fw fa-user"></i>
          <span>Profile Menu</span>
        </a>
        <div id="collapseMainMenu" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Profile</h6>
            <a class="collapse-item" href="menu.php">My Profile</a>
              <?php
    if ( $_SESSION['role']==='Admin'  or $_SESSION['role']==='Super_Admin') { 
          
    ?>
            <a class="collapse-item" href="edit_profile.php">Edit Profile</a>
              <?php
    }
            ?>
              
                      <?php
    if ( $_SESSION['role']==='user') { 
          
    ?>
            <a class="collapse-item" href="update_profile.php">Edit Profile</a>
              <?php
    }
            ?>
              <a class="collapse-item" href="profile.php">Profile Details</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Chat Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseChatMenu" aria-expanded="true" aria-controls="collapseChatMenu">
          <i class="fas fa-fw fa-envelope"></i>
          <span>Chat Menu</span>
        </a>
        <div id="collapseChatMenu" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header"></h6>
            <a class="collapse-item" href="allusers.php">All Users</a>
            <a class="collapse-item" href="activeusers.php">Active Users</a>
            <a class="collapse-item" href="group.php    ">Group chat</a>
            
          </div>
        </div>
      </li>
 <?php
   
      if ( $_SESSION['role']==='Admin'  or $_SESSION['role']==='Super_Admin') { 
          
    ?>

      <!-- Nav Item - Admin Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePanel" aria-expanded="true" aria-controls="collapsePanel">
            <i class="fa fa-bar-chart-alt fa-fw"></i>
          <span>Admin Panel</span>
        </a>
        <div id="collapsePanel" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header"></h6>
            <a class="collapse-item" href="adduser.php">Add User</a>
              <a class="collapse-item" href="viewuser.php">View Users</a>
              <?php
   
      if ( $_SESSION['role']==='Super_Admin') { ?>
              
            <a class="collapse-item" href="addadmin.php">Add Admin</a>
            
            <a class="collapse-item" href="viewadmin.php">View Admin</a>
              <?php
      }
         ?>  
          </div>
        </div>
      </li>
    <?php
    }
?>
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Addons
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-wrench"></i>
          <span>Settings</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header"></h6>
            <a class="collapse-item" href="setting.php">Change Password</a>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
           
          </div>
        </div>
      </li>
      
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
