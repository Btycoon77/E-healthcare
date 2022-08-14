<!DOCTYPE html>
<html lang="en">

<head>
    <title>Profile Card</title>
    <!--Google Font-->
    <link href="https://fonts.googleapis.com/css?family=Raleway:600|Work+Sans" rel="stylesheet">
    <!--Stylesheet-->
    <link rel="stylesheet" href="../css/profile.css">
    <link rel="stylesheet" href="../css/registration.css">
</head>
<style>
form .user-details .input-box {
   
    margin-bottom: 15px;
    width: 100%;
    margin-top: 238px;
}
.button{
    background-color: #f79f08;
    color: white;
    font-family: 'Work Sans', sans-serif;
    border: none;
    font-size: 20px;
    padding: 13px 25px;
    position: absolute;
    bottom: 30px;
    left: 160px;
}
</style>

<?php
session_start();
include("connection.php");
if(isset($_POST['submit'])){
$email = $_SESSION['email'];
$address=$_POST['address'];
$select_address_query="select address from user where email='$email' ";
	$run_address_query=mysqli_query($con,$select_address_query);
	
	if(mysqli_num_rows($run_address_query)>0)
	{
	$check_row= mysqli_fetch_assoc($run_address_query);
	
	$edit_address_query="update user set address='$address' where email='$email' ";
	
	
	$edit_run_address_query=mysqli_query($con,$edit_address_query);
	if(isset($edit_run_address_query))
	{
	$update_msg="updated ";
		echo"	<script> alert ('Are You Sure ? You Want To Change Your Address')</script> ";
	echo "<script> window.location='profile.php' </script>";
	}
	else
	{
	$error_msg="not updated";
	}
	
	}
		else
	{
	$error_msg="user not found";
	}
}

// include '../translate.php';
?>

<body>
    <div class="card">
        <div class="info">
            <span class="name">
            <?php
                // include '../translate.php';


                $email=$_SESSION['email'];
                // print_r($_SESSION);

                    $edit_fname_query="select * from user where email='$email'" ;
                    
                    $edit_run_fname_query=mysqli_query($con,$edit_fname_query);
                
                                while($row = mysqli_fetch_array($edit_run_fname_query))
                                {   
                                        echo $row['f_name']; 
                                                            }

                ?>
            </span>
            <!-- <span class="prof">Designer</span> -->
            <div class="divider"></div>
            <form action="#" method="post">
                <div class="user-details">
                <div class="input-box">
                        <span class="details">Previous Address</span>
                        <input type="text" name="add" placeholder="Please enter address" />
                        <span class="details">New Address</span>
                        <input type="text" name="address" placeholder="Please enter address" />
                    
                    </div>

                   

                </div>

                <input type="submit" class="button" value="Save" name="submit">
            </form>
            <!-- <button >Save</button> -->
            <div class="navigation"><a  style ="color:purple; position: absolute;
            bottom: 4px;
            color: purple;
            left:127px;
            font-size: 16px;" href="view_user_homepage.php">Back to homepage</a></div>
        </div>
        <div class="photo"></div>
    </div>
</body>

</html>