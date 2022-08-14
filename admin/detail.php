<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

 <link rel="stylesheet" href="../helper/bootstrap.min.css">
    <link rel="stylesheet" href="../helper/line_awesome.min.css">
    <link rel="stylesheet" href="../helper/fontawesome.min.css">
<title>detail</title>
</head>

<style>
h1{
font-size:50px;
text-align:center;
padding-top:30px;
color:#000066;
}
img 
{ float: left;
width: 77px;
}
li{
font-size:24px;
}
h3{
font-size:24px;}
p{
text-align:center;
font-size:26px;}

body {margin:0;
padding:0;
      font: 400 15px/1.8 Lato, sans-serif;
      color: #777;
width:100%;
height:100vh;
background-image:url(../pic/1.jpg);
	background-attachment:fixed;
background-size:cover;
}
</style>
<body class="container display-4">
 <h1  class=" text-center font-weight-bold text-white ">Doctor's Information</h1><br/>
 

<?php 
 if(isset($_GET['s_id'])){
 include("connection.php");
 $d_id=mysqli_query($con,$_GET['s_id']);
 	$show_doctor_profile_query="select * from doctor inner join schedule on schedule.d_id=doctor.id WHERE s_id='$_GET[s_id]'" ;
	   $show_run_doctor_profile_query=mysqli_query($con,$show_doctor_profile_query);
	      $row = mysqli_fetch_array($show_run_doctor_profile_query);

				?>
                        <!-- Grid -->
<div class="w3-row">

<!-- Blog entries -->
<div class="w3-col 18 s12">
  <!-- Blog entry -->
  <div class="w3-card-4 w3-margin w3-black">
    <div class="w3-container">
                     <h1  class=" text-center font-weight-bold text-warning">Personal Information</h1> <hr color="#333333" />
                             <h3 class="text-white ">ID :    <?php  echo  $row['id'] . "<br />";?></br></h3> 
                             <h3 class="text-white"> Name :  <?php  echo   $row['f_name']; echo  $row['l_name']. "<br />";?></br></h3>
                             <h3 class="text-white">Email/Gmail Address :     <?php   echo $row['email'] . "<br />";?></br></h3>
                             <h3 class="text-white"> Contact Number :   <?php  echo   $row['contact'] . "<br />";?></br></h3>
                             <h3 class="text-white"> Clinic Address :   <?php  echo  $row['address'] . "<br />";?></br></h3>
                             <h3 class="text-white"> Qualification :    <?php  echo  $row['qualification'] . "<br />";?></br></h3>
                             <h3 class="text-white"> BMDC Registration Number: <?php  echo  $row['bmdc_reg_num'] . "<br />";?></br></h3>
                              <h3 class="text-white"> Specialism :    <?php  echo  $row['specialist'] . "<br />". "<br />". "<br />";?></h3>
                       <h1 class=" text-center font-weight-bold  text-warning"> Visiting/Appointment Information</h1> <hr color="#333333" />
                          <p class="text-white  font-weight-bold">Schedule ID :    <?php  echo  $row['s_id'] . "<br />";?></p>
                                    <li>  <?php   echo $row['Day_Time1'] . "<br />";?></br></li>
                                    <li>  <?php   echo $row['Day_Time2'] . "<br />";?></br></li>
                                    <li>  <?php   echo $row['Day_Time3'] . "<br />";?></br></li>
                                     <li><?php   echo $row['Day_Time4'] . "<br />";?></br></li>
                                    <li>  <?php   echo $row['Day_Time5'] . "<br />";?></br></li>
                                     <li> <?php   echo $row['Day_Time6'] . "<br />";?></br></li>
                                     <li> <?php   echo $row['Day_Time7'] . "<br />";?></br></br></li>
                        <?php
                      
						
					
				   } 
		   ?>
               </div>
      </div>
    </div>
  </div>



  <script src="../js/table.js"></script>
    <script src="../helper/jquery.min.js"></script>
    <script src="../helper/bootstrap.min.js"></script>

</body>
</html>
