<?php
date_default_timezone_set('Africa/Lagos');
include ('../inc/link.php');
 

include('../inc/db_connect.php');




if (isset($_POST["submit"])) 
{
	

	 	if (!empty($_POST["search"]))
		 {
		 	$replace = str_replace(" ", "+", $_POST["search"]);
				header("location:searche.php?search=" . $replace);

		
		}

						
	 

	}


 ?>
</head>

<body>


	<div class="container-fluid">
		<div class="row padding"> 
	 	<div class="col-9"></div>
	 	<div class="col-3">
		<form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100" method="POST">
            <div class="input-group">
              <input type="text" name="search" class="form-control bg-light border-0 small" placeholder="Search for members" aria-label="Search" value="<?php if(isset($_GET["search"])) echo $_GET["search"];?>">
              <div class="input-group-append">
                <button class="btn btn-dark" type="submit" name="submit" value="search">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>
	</div>
	</div>


		<div class="row padding">
			<div class="col-10">
				<div class="table-responsive">
						

									<?php 
									if (isset($_GET["search"])) 
									{
									
										$search='';
										$search_key=explode(" ", $_GET["search"]);
										foreach ($search_key as $indv) 
										{
													$search.=" first_name LIKE '%".mysqli_real_escape_string($connect, $indv)."%' OR  last_name LIKE '%".mysqli_real_escape_string($connect, $indv)."%' OR  other_name LIKE '%".mysqli_real_escape_string($connect, $indv)."%' OR  faculty LIKE '%".mysqli_real_escape_string($connect, $indv)."%' OR  department LIKE '%".mysqli_real_escape_string($connect, $indv)."%' OR  grad_year LIKE '%".mysqli_real_escape_string($connect, $indv)."%' OR  expertise LIKE '%".mysqli_real_escape_string($connect, $indv)."%' OR ";
										}

										$search= substr($search, 0, -4);
									
										$select = mysqli_query($connect,  "SELECT * FROM users WHERE " .$search); 

											$row=mysqli_num_rows($select);



										if ($row>0) 

										{


										echo '<table class="table  table-striped table-bordered" id="" width="100%" cellspacing="0">
										
									<tr>
										<th>Name</th>
										<th>Department</th>
										<th>Expertise</th>
										<th>Year of Graduation</th>
										<th>Contact</th>
									</tr>';


											while ($fetch=mysqli_fetch_array($select))
											{
													echo "<tr>
														<td>".$fetch['first_name']. " "
															.$fetch['last_name']. " "
															.$fetch['other_name']."</td>
														<td>". $fetch['department']."</td>
														<td>".$fetch['expertise']."</td>
														<td>".date('Y', strtotime($fetch['grad_year']))."</td>
														<td>".$fetch['phone_number']." ". $fetch['email']."</td>
															</tr>";		
											}	
										}	
										else
										{
											echo "<tr>

												<label> No records found</label>


											</tr>";
										}


									}






									?>
					
				</div>
				
			</div>
			
		</div>

	</div>
	




</body>
</html>