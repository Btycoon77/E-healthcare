<!DOCTYPE html>
<html lang="en">
<head>
    <title>Profile Card</title>
    <!--Google Font-->
    <link href="https://fonts.googleapis.com/css?family=Raleway:600|Work+Sans" rel="stylesheet">
    <!--Stylesheet-->
    <link rel="stylesheet" href="../css/profile.css">
    <style>
    .navigation{

        position: absolute;
        bottom: 4px;
        color: purple;
        font-size: 18px;
    }
        </style>
    

</head>
<body>
    
    <div class="card">
		<div class="info">
			<span class="name">
            <?php
                session_start();
                include("connection.php");
                // include '../translate.php';


                $email=$_SESSION['email'];
                // print_r($_SESSION);

                    $edit_fname_query="select * from doctor where email='$email'" ;
                    
                    $edit_run_fname_query=mysqli_query($con,$edit_fname_query);
                
                                while($row = mysqli_fetch_array($edit_run_fname_query))
                                {
                                                            
                                     echo $row['f_name'] ; 			

                                       
                                                            }

                ?>
            
            </span>
			<!-- <span class="prof">Designer</span> -->
			<div class="divider"></div>
			<p class="bio">
               
                <?php
                session_start();
                include("connection.php");
                // include '../translate.php';


                $email=$_SESSION['email'];
                // print_r($_SESSION);

                    $edit_fname_query="select * from doctor where email='$email'" ;
                    
                    $edit_run_fname_query=mysqli_query($con,$edit_fname_query);
                
                                while($row = mysqli_fetch_array($edit_run_fname_query))
                                {
                                                            echo"ID :  ";   echo $row['id'];  echo "  " ; echo  "<br />";   
                                        echo" Name : "; echo $row['f_name'] ; echo "  " ; echo $row ['l_name']; echo "  " ;echo "<a href=d_fl_name.php>edit</a><br />";				

                                        echo"Email Address :  ";   echo $row['email'];  echo "  " ; echo  "<a href=d_email.php>edit</a><br />" ;
                                        echo"Contact Number :  ";  echo $row['contact'] ; echo "  " ; echo  "<a href=d_contact.php>edit</a><br />";
                                        echo"Address :  "; 		   echo $row['address'] ; echo "  " ; echo "<a href=d_address.php>edit</a><br />";
                                        echo"Change Password :  "; echo "  " ; echo "<a href=d_pswd.php>edit</a><br />";
                                                            }

                ?>
            
             </p>
			<button>CONTACT ME</button>
            <div class="navigation"><a  style ="color:purple; position: relative;
            bottom: 4px;
            color: purple;
            font-size: 18px;" href="doctor_homepage.php">Back to homepage</a></div>
		</div>
		<div class="photo"></div>

	</div>
</body>
</html>