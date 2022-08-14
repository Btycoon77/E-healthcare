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
 include("connection.php");
 $id=mysqli_query($con,$_GET['id']);
 	$show_user_profile_query="select * from user  WHERE id='$_GET[id]'" ;
	   $show_run_user_profile_query=mysqli_query($con,$show_user_profile_query);
	      $row = mysqli_fetch_array($show_run_user_profile_query);

				?>

         <div class="card">
            <div class="info">
                <span class="name"><?php echo $row['f_name'];?></span>

                <!-- <span class="prof">Designer</span> -->
                <div class="divider"></div>
                
                <p class="bio">
                <h3>Email/Gmail Address :     <?php   echo $row['email'] . "<br />";?></br></h3>
                             <h3> Contact Number :   <?php  echo   $row['contact'] . "<br />";?></br></h3>
                             <h3>  Address :   <?php  echo  $row['address'] . "<br />";?></br></h3>
                         
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