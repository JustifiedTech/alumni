
<?php
require ('../inc/link.php');
date_default_timezone_set('Africa/Lagos');
$hostname = "localhost";
$username = "root";
$password = "";
$database = "sconnect";

$db = new mysqli($hostname, $username, $password, $database);


if ($db->connect_error){
	die("connection failed:". $db->connect_error);

}
else{
	//echo "Connection Successful";

} 
if(isset($_GET['rid']))
{
 $rid = $_GET['rid'];

                            echo $rid;
  
//   $delete= mysqli_query($connect, "DELETE FROM users WHERE users_id = '$rid'");
  
//   if ($delete) 
//   {
//     echo "<script>alert('record fetched')</script>";
//     header("location:report.php");
//   }
    
  }


   $sql = $db->query("SELECT * FROM parcel");
   $i = 1; 
$num_row = $sql->num_rows;      
$fetch=mysqli_fetch_all($sql, MYSQLI_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="all,follow">
  <meta name="description" content="">
  <meta name="author" content="">

  
    <link rel="stylesheet" href="bootstrap.min.css" />
</head>
<body>
<div class="container-fluid">
           <center><h1 class="h3 mb-4 text-primary-800"> STATUS REPORT </h1></center>

       <table class="table  table-striped table-bordered">
                  <tr>
                    <th>A</th>
                    <th>B</th>
                    <th>C</th>
                    <th>D</th>
                    <th>E</th>
                    <th>F</th>
                    <th>G</th>
                    <th>Report</th>
                  </tr>

  <?php 
  			if ($num_row>0) {
  				

  foreach ($fetch as $row): 
   $e = $i++;?>

    <tr>
        <td><?php echo $e ?></td>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['phone']; ?></td>
        <td><?php echo $row['location']; ?></td>
        <td><?php echo $row['name2']; ?></td>
        <td><?php echo $row['datei']; ?></td>
        <td><?php echo $row['datex']; ?></td>
        <td>  <a class="btn btn-danger" href="#" data-toggle="modal" data-target="#reportmodal">Report</a></td>
    </tr>



   </table>

</div>



  <div class="modal fade" id="reportmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">User Report</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Report Action?</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="report.php?rid=<?php echo $row['sn']; ?>">Report</a>
        </div>
      </div>
    </div>
  </div>


<?php include('../inc/scripts.php');?>

</body>







































