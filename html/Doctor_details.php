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
 if(isset($_GET['id'])){
 include("../admin/connection.php");
 $d_id=mysqli_query($con,$_GET['id']);
 	$show_doctor_profile_query="select * from doctor  WHERE id='$_GET[id]'" ;
	   $show_run_doctor_profile_query=mysqli_query($con,$show_doctor_profile_query);
	     $row = mysqli_fetch_array($show_run_doctor_profile_query);
			?>

			<div class="card">
			<div class="info">
				<span class="name"><?php echo $row['f_name'];
				echo $row['l_name'];
				?></span>
	
			<span class="prof"><?php echo $row['specialist']?></span>
	
			<div class="divider"></div>
	
			<p class="bio">
			<h3>Email/Gmail Address :     <?php   echo $row['email'] . "<br />";?></br></h3>
			<h3> Contact Number :   <?php  echo   $row['contact'] . "<br />";?></br></h3>
			<h3> Clinic Address :   <?php  echo  $row['address'] . "<br />";?></br></h3>
			<h3> Qualification :    <?php  echo  $row['qualification'] . "<br />";?></br></h3>
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