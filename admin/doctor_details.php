<!DOCTYPE html>
<html lang="en">
<head>
    <title>Profile Card</title>
    <!--Google Font-->
    <link href="https://fonts.googleapis.com/css?family=Raleway:600|Work+Sans" rel="stylesheet">
    <!--Stylesheet-->
    <link rel="stylesheet" href="../css/profile.css">
</head>

<body>
<?php 
 if(isset($_GET['s_id'])){
 include("connection.php");
 $d_id=mysqli_query($con,$_GET['s_id']);
 	$show_doctor_profile_query="select * from doctor inner join schedule on schedule.d_id=doctor.id WHERE s_id='$_GET[s_id]'" ;
	   $show_run_doctor_profile_query=mysqli_query($con,$show_doctor_profile_query);
	      $row = mysqli_fetch_array($show_run_doctor_profile_query);

				?>

    <div class="card">
		<div class="info">
			<span class="name"><?php echo $row['f_name']?></span>

			<span class="prof"><?php echo $row['specialist']?></span>

			<div class="divider"></div>

			<p class="bio">
            <h3 >Email/Gmail Address :     <?php   echo $row['email'] . "<br />";?></br></h3>
                             <h3 class="text-white"> Contact Number :   <?php  echo   $row['contact'] . "<br />";?></br></h3>
                             <h3 class="text-white"> Clinic Address :   <?php  echo  $row['address'] . "<br />";?></br></h3>
                             <h3 class="text-white"> Qualification :    <?php  echo  $row['qualification'] . "<br />";?></br></h3>
                             <h3 class="text-white"> Doctor Registration Number: <?php  echo  $row['registration_number'] . "<br />";?></br></h3>
             </p>
             <div class="divider"></div>
             <p class="bio">
             <h1> Visiting/Appointment Information</h1> 
             <li>  <?php   echo $row['Day_Time1'] . "<br />";?></br></li>
                                    <li>  <?php   echo $row['Day_Time2'] . "<br />";?></br></li>
                                    <li>  <?php   echo $row['Day_Time3'] . "<br />";?></br></li>
                                     <li><?php   echo $row['Day_Time4'] . "<br />";?></br></li>
                                    <li>  <?php   echo $row['Day_Time5'] . "<br />";?></br></li>
                                     <li> <?php   echo $row['Day_Time6'] . "<br />";?></br></li>
                                     <li> <?php   echo $row['Day_Time7'] . "<br />";?></br></br></li>
             </p>
			<button>CONTACT ME</button>
		</div>
		<div class="photo"></div>
	</div>
    <?php
 }
 ?>
</body>
</html>