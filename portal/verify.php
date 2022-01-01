<?php 
include('../inc/link.php');
include('../inc/db_connect.php');
$error= array();
$display='';
if (isset($_POST['submit'])) 
{
    $user_type=($_POST['user_type']);
    $matric=($_POST['matric']);
    $role="user";
    
    if(empty($user_type))
        {
        array_push($error, "Please select membership category");
        }
    else if (empty($matric)) 
        {
            array_push($error, "Please provide your matriculation number");
        }

 if (count($error)==0) 
      {
            $select=mysqli_query($connect,"SELECT * FROM USERS WHERE matric_no ='$matric'") or die(mysqli_error($connect));
              $fetch=mysqli_fetch_array($select);
            
          if (mysqli_num_rows($select)>0)
            { 
              array_push($error, "User Details have been previously generated on  '".$fetch['registration_date']."' ");
            }


       else if ($user_type =='Alumni')
        {
           $select=mysqli_query($connect, "
            SELECT * 
            FROM alumni
            WHERE  matric_no ='$matric'");

           $row=mysqli_num_rows($select);
           $fetch=mysqli_fetch_array($select);

           if ($row>0)
           {
                $Firstname=$fetch['first_name'];
                $Othername=$fetch['other_name'];
                $Lastname=$fetch['last_name'];
                $email=$fetch['email'];
                $password=$fetch['password'];
                $Gender=$fetch['gender'];
                $Matric=$fetch['matric_no'];
                $faculty=$fetch['faculty'];
                $department=$fetch['department'];
                $course=$fetch['course'];
                $duration=$fetch['duration'];
                $admin=$fetch['yr_of_entry'];
                $grad=$fetch['yr_of_graduation'];
                            
                   

                      $insert= mysqli_query($connect, "INSERT INTO users (user_type, role, first_name, other_name, last_name, email, password, gender,  matric_no, faculty, department, course, prog_duration, admin_year, grad_year) VALUES('$user_type', '$role','$Firstname','$Othername','$Lastname', '$email','$password','$Gender','$Matric','$faculty', '$department', '$course', '$duration', '$admin', '$grad')")or die(mysqli_error($connect));



                       if ($insert) 
                         {
                            $display= '<div class="lead bg-transparent text- text-white" >
                            <p> Your login details are: </p>
                            <p>Username:'." ".$Matric.'</p>
                            <p>Password:'." ".$Lastname.'</p>
                                
                              </div>';

                          }

             }



             else   {
                        $display.= '<div class="lead bg-transparent text- text-white" >
                            <p> No records found for this Matric Number </p>
                            
                                
                              </div>';
                    }

                         
           }


           else if ($user_type =='Student')
        {
           $select=mysqli_query($connect, "
            SELECT * 
            FROM students
            WHERE  matric_no ='$matric'");

           $row=mysqli_num_rows($select);
           $fetch=mysqli_fetch_array($select);

           if ($row>0)
           {
                $Firstname=$fetch['first_name'];
                $Othername=$fetch['other_name'];
                $Lastname=$fetch['last_name'];
                $email=$fetch['email'];
                $password=$fetch['password'];
                $Gender=$fetch['gender'];
                $Matric=$fetch['matric_no'];
                $faculty=$fetch['faculty'];
                $department=$fetch['department'];
                $course=$fetch['course'];
                $duration=$fetch['duration'];
                $admin=$fetch['yr_of_entry'];
                $grad=$fetch['yr_of_graduation'];
                            
                   

                      $insert= mysqli_query($connect, "INSERT INTO users (user_type, role, first_name, other_name, last_name, email, password, gender,  matric_no, faculty, department, course, prog_duration, admin_year, grad_year) VALUES('$user_type', '$role','$Firstname','$Othername','$Lastname', '$email','$password','$Gender','$Matric','$faculty', '$department', '$course', '$duration', '$admin', '$grad')")or die(mysqli_error($connect));



                       if ($insert) 
                         {
                            $display= '<div class="lead bg-transparent text- text-white" >
                            <p> Your login details are: </p>
                            <p>Username:'." ".$Matric.'</p>
                            <p>Password:'." ".$Lastname.'</p>
                                
                              </div>';

                          }

             }



             else    {
                        $display.= '<div class="lead bg-transparent text- text-white" >
                            <p> No records found for this Matric Number </p>
                            
                                
                              </div>';
                    }

                         
           }
           
       
    
    }

  }
?>
<title>Generate Login Details</title>
</head>
<body class="register">


        <div class="container-fluid mt-3">
          <a href="index.php"><button class='btn btn-dark btn-sm'><i class="fa fa-home"></i> Home</button></a>
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="card bg-transparent">
                        <div class="card-header bg-dark display-6">
                        <h2 class="lead text-center text-light display-6"> Are you visiting for the first time?</h2>
                        <p class="text text-warning  text-center"> Supply your matriculation number to generate your login details </p>
                        <hr class="light">
                        </div>
                         
                      <form action="" method="POST">  
                            <div class="card-body">
                             <?php include ('../inc/error.php'); ?>

                        <div class="form-group">
                        <select name='user_type' class='form-control'required="yes" value="">
                        <option value="">Select category?</option> 
                        <option value="Alumni"> Alumni </option> 
                        <option value="Student">Student</option>
                        </select>
                        </div>
                              <div class="form-group">
                                <input type="text" name='matric' class="form-control" placeholder="Enter your matriculation number">
                              </div>
                                <?php echo $display; ?>
                        </div>
                            
                            <hr class="light">
                            <div class="card-footer">
                            <button type="submit" name="submit"  class="btn btn-info btn-xs"> <i class="fa fa-download"></i> Generate</button>
                            <a href="login.php"><button type="button" class="btn btn-info btn-xs"> <i class="fa fa-arrow-left"></i> Back to Login</button></a>

                        </div>
                        </form>
                    </div>
                </div>
            </div>
              
            <div class="display-6">
              



            </div>

        </div>
        


</body>
</html>


<script type="text/javascript">
  





</script>
       
