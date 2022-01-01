<?php include ('link.php');
		
include('db_connect.php');

 ?>

<div class="container-fluid"> 
	
<div class="navbar navbar-light bg-dark">
<img class="logo rounded-circle" src="../img/fuwlogo.png">
	<h6 class="text text-light">ALUMNI ASSOCIATION OF THE FEDERAL UNIVERSITY WUKARI</h6>
<div class="navlink">
<a class="navbar-icon" href="verify.php"> <button class="btn
btn-primary btn-sm "> <i class="fa fa-link"></i> Register</button></a>
<a class="navbar-icon" href="login.php"> <button class="btn
btn-info btn-sm "> <i class="fa fa-sign-in-alt"></i> Login</button></a>

</div>
</div> 
<div class="jumbotron padding"> 
	 <div class="row"> 
	 	<div class="col-9"></div>
	 	<div class="col-3">
		<form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100" method="POST" action="search.php">
            <div class="input-group">
              <input type="text" name="search" class="form-control bg-light border-0 small" placeholder="Search for members" aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-dark" type="submit" name="submit" value="search">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>
	</div>
	</div>
	</div> 
</div> 
<nav class="navbar sticky-top navbar-expand-md navbar-light bg-light "> <div class="container-fluid">
		
		<button class="navbar-toggler toggler-example" type="button" data-toggle="collapse" data-target="#navbarResponsive">
			<div class="animated-icon"><span class="navbar-toggler-icon"></span></div>
		</button>
			<div class="collapse navbar-collapse navlink" id="navbarResponsive">
				
				<ul class="nav navbar-nav ml-auto">
					<li class="nav-item active" id="">
						<a class="nav-link text-info" href="index.php"> Alumni Home</a>
						
					</li>
					<li class="nav-item ">
						<a class="nav-link text-info" href="project.php"> Alumni Projects</a>
						
					</li>
					<li class="nav-item ">
						<a class="nav-link text-info" href="gallery.php">Gallery</a>
						
					</li>
					<li class="nav-item ">
						<a class="nav-link text-info" href="reunion.php"> Alumni Reunion</a>
						
					</li> 
					<li class="nav-item ">
						<a class="nav-link text-info" href="giving.php"> Givings</a>
						
					</li>
					<li class="nav-item ">
						<a class="nav-link text-info" href="news.php">News and Events</a>
						
					</li>
					<li class="nav-item ">
						<a class="nav-link text-info" href="about.php">About Us</a>
						
					</li>
						
					
				</ul>
			</div>
	</div>
		

	</nav>



	

	
