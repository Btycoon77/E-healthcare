<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1" />
    <title>Welcome user</title>
     <!-- -----datatable link----- -->
     <!-- <link rel="stylesheet" href="../helper/bootstrap.min.css"> -->
     <link rel="stylesheet" href="../helper/fontawesome.min.css">
    <link
      href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,800&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="../helper/line_awesome.min.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

   
    <link rel="stylesheet" href="../css/admin.css">
    <style>
        .sidebar-menu a{
            font-size:14px;
        }
    </style>
</head>

<body>

    <!--Beginning of sidebar-->
   
<?php
     session_start();
     include "connection.php";

                 $email=$_SESSION['email'];
                 $doc_name = substr($email, 0, strpos($email, '@'));
?>   

<?php
        $edit_doctor_profile_query="select * from doctor join schedule on schedule.d_id=doctor.id join appointment on appointment.sid=schedule.s_id  join user on appointment.pid=user.id where user.email='$email'" ;
        $edit_run_doctor_profile_query= mysqli_query($con,$edit_doctor_profile_query);
        while($drow = mysqli_fetch_array($edit_run_doctor_profile_query))
            {}
?>
    <?php
        $queryPermission="WHERE permission='Pending' ";
        $show_number_pending_request_query = "select * from doctor join schedule on schedule.d_id=doctor.id join appointment on appointment.sid=schedule.s_id  join user on appointment.pid=user.id   where user.email='$email'  and  appointment.permission='Approved' ||  user.email='$email'  and  appointment.permission='Canceled' ";
        $run = mysqli_query($con, $show_number_pending_request_query);
        $count=mysqli_num_rows($run);
                

     ?>

     
<?php
 $queryPermission="WHERE permission='Deleted' ";
  $show_number_deleted_request_query = "select * from doctor join schedule on schedule.d_id=doctor.id join appointment on appointment.sid=schedule.s_id  join user on appointment.pid=user.id   where doctor.email='$d_email'  and appointment.permission='Deleted' 
                
				";
				   $run1 = mysqli_query($con, $show_number_deleted_request_query);
				   $count1=mysqli_num_rows($run1);
	

 
?>

    <input type="checkbox" id="nav-toggle" />
    <div class="sidebar">
        <div class="sidebar-brand">
            <h2>
                <span class="las la-clinic-medical"></span> <span style="font-size=24px!important">e-Healthcare</span>
            </h2>
        </div>
        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="#" class="active"><span class="las la-home"></span> <span>Home</span></a>
                </li>
                <li>
                    <a href="doctor_profile.php"><span class="las la-user"></span> <span>Profile</span></a>
                </li>
                <li>
                    <a href="doctor_profile.php" ><span class="las la-user-cog"></span> <span>Settings</span></a>
                </li>

                <li>
                    <a href="view_my_schedule.php" ><span class="las la-clipboard-list"></span> <span>My schedule</span></a>
                </li>

                <li>
                    <a href="view_consult_hour.php" ><span class="las la-business-time"></span> <span>Consulting hour</span></a>
                </li>

               
                <li>
                    <a href="user_appointment_request.php"><span class="las la-user-plus"></span>
                        <span> Appointment request
                            <?php
                                if($count >0){

                                }
                                echo '('.$count.')'

                            ?>
                        </span></a>
                </li>

                
                <li>
                    <a href="deleted_appointment_notification.php"><span class="las la-bell"></span>
                        <span>Notifications<?php
                            if($count1>0){

                            }
                            echo '('.$count1.')'
                        ?></span></a>
                </li>
                <li>
                    <a href="doctor_logout.php"><span class="las la-sign-out-alt"></span> <span>Logout</span></a>
                </li>
            </ul>
        </div>
    </div>

    <!-- ---------------------Dashboard content--------------------------- -->

    <div class="main-content">
        <header>
            <h2>
                <label for="nav-toggle">
                    <span class="las la-bars"></span>
                </label>
                Dashboard
            </h2>

            <div class="search-wrapper">
                <span class="las la-search"></span>
                <input type="search" placeholder="Search here" />
            </div>
            <div class="user-wrapper">
                <img src="../images/face-1.png" width="40px" height="40px" alt="" />
                <div>
                    <h4>Doctor</h4>
                    <small><?php echo $doc_name ?></small>
                </div>
            </div>
        </header>

        
    </div>

</body>

</html>