<style>
<?php

include '../style1.css';

?>

</style>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 
  <link rel="stylesheet" href="../helper/bootstrap.min.css">
  <link rel="stylesheet" href="../helper/fontawesome.min.css">
<title>delete_user_request</title>
</head>

<style>
h1{
font-size:50px;
padding-left:400px;
padding-top:60px;
}
img 
{ float: left;
width: 77px;
}

body {margin:0;
padding:0;
font-family:"Bahnschrift Light", "Bernard MT Condensed", "Berlin Sans FB Demi", "Bell MT";
width:100%;
height:100vh;
background-image:url(../pic/healthcare-banner.jpg);
background-size:cover;
}
</style>
<body>

<h1>Reject Patients Appointment request</h1>
<form  action = "user_appointment_request.php" method="POST">
<table class="table table-hover table-dark">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Status</th>
<th scope="col">Not Acceptable</th>
    </tr>
  </thead>

<?php
session_start();
include("connection.php");	

                      	
 if(isset($_GET["id"]))
				   {
				$id=$_GET['id'];
       $denied_query = "UPDATE
                   user set permission='Not Acceptable' where id='$id' ";
				   $run = mysqli_query($con, $denied_query);
				   
				   }
				   $queryPermission="WHERE  permission='Pending' ";
       $show_pending_request_query = "SELECT * 
                  FROM user $queryPermission ";
				   $run = mysqli_query($con, $show_pending_request_query);
				  
				   while($row = mysqli_fetch_array($run))
				   {

				 
                         header("Location:user_appointment_request.php");
                   
                     
				
					  }
					  ?>
                  
            
				</table> 
    
</form>

<h2 class="text-center"><a target="_blank" href="doctor_home_page.php">Back</a></h2> </p>
<script src="../helper/jquery.min.js"></script>
  <script src="../helper/popper.min.js"></script>
  <script src="../helper/bootstrap.min.js"></script>
</body>
</html>
