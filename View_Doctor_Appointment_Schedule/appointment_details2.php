
<?php 

$error_pid ="";
$error_sid ="";
$error_booking_date ="";
$error_booking_time ="";
$err_name ="";
$error_email ="";
$error_phone ="";

include("../users/connection.php");

session_start();
$email=$_SESSION['email'];

if(isset($_POST["submit"])){
  // print_r($_POST);die;

 $email = $_SESSION['email'];
$d_id=$_POST['id'];

$booking_date=$_POST['booking_date'];
$booking_time=$_POST['booking_time'];

$date = date("y/m/d") ;

// $_POST[".$date."];
$pid=$_POST['pid'];
$sid=$_POST['sid'];
$f_name =$_POST['f_name'];
$l_name =$_POST['l_name'];
$phone =$_POST['phone'];
// echo $sid;die;
echo $_GET['s_id'];die;

if( $phone ==""){

    
    $error_phone="Please enter this field";
    
}
   
	
else
	   { 
       echo $sid;die;
       $d_query="INSERT INTO appointment(booking_date,booking_time,permission,date,pid,sid)  VALUES('$booking_date','$booking_time','Pending','$date','$pid','$sid')" ;
                              print_r($d_query);die;
								$res = mysqli_query($con,$d_query);
                print_r($res);die;
								$update_msg="Your Appointment has been send succesfully!! ";
					echo"<script> alert ('Your Appointment Has Been Send Successfully! Wait For The Doctor's Approval')</script> ";
					header("location:appointment_details2.php");
				
							 }
	
	
}
// print_r($_POST);
	
								

?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <title>Registration Form</title>
    <link rel="stylesheet" href="../css/registration.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/
    font-awesome/5.15.2/css/all.min.css"/>
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

  <style>
    i{
      color: red;
      margin-right: 5px;
    }
    form .button input{
        width:146%;
        padding: 0px 50px;
    }
    body{
        margin-top:0px;
        padding:0px;
    }
  </style>

  </head>
  <body>
 
    <div class="container">
      <div class="title"> Booking Appointment Form</div>
      <div class="content">
        <form action="#" method="post">
          <div class="user-details">
            <div class="input-box">
              <span class="details">First Name</span>
              <input type="text" name="f_name" placeholder="Enter your first name"   /><small>
              

                <span style="color:red"> <?php 
              
             
              echo  $err_name; ?></span><br>
              </small>
                </div>
            <div class="input-box">
              <span class="details">Last Name</span>
              <input type="text" name="l_name"  placeholder="Enter your last name"  /><small>

                <span style="color:red"><?php echo $err_name; ?></span><br>
              </small>
            </div>
          

            <div class="input-box">
              <span class="details">Contact no:</span>
              <input type="number" name="phone"  placeholder="Enter your phone" />
              <small>
              
                <span style="color:red"><?php echo $error_phone; ?></span><br>
              </small>
            </div>

            <div class="input-box">
              <span class="details">Booking date</span>
              <input type="date" name="booking_date"  placeholder="Enter your booking date" />
              <small>

                <!-- <span style="color:red"><?php echo $error_dob; ?></span><br> -->
              </small>
            </div>

            <div class="input-box">
              <span class="details">Booking time</span>
             <select name="booking_time" id="b_time">
                 
                    <option value="9:00  AM To 9:30 AM">  9:00 AM To 9:30 AM </option> 
                    <option  value="9:30 AM To 10:00 AM"> 9:30 AM To 10:00 AM </option>
                    <option value="10:00 AM To 10:30 AM">10:00 AM To 10:30 AM</option> 
                    <option value="10:30 AM To 11:00 AM">10:30 AM To 11:00 AM</option> 
                    <option value="11:00 AM To 11:30 AM">11:00 AM To 11:30 AM</option>  
                    
                        
                    <option value="1:30 PM To 2:00 PM">1:30 PM To 2:00 PM  </option> 
                    <option value="2:00 PM To 2:30 PM">2:00 PM To 2:30 PM </option>
                    <option value="2:30 PM To 3:30 PM">2:30 PM To 3:00 PM</option>
                    <option value="3:00 PM To 3:30 PM">3:00 PM To 3:30 PM</option>
                    <option value="3:30 PM To 4:00 PM">3:30 PM To 4:00 PM</option>
                    
                    
                    <option value="6:00 PM To 6:30 PM">6:00 PM To 6:30 PM  </option> 
                    <option value="6:30 PM To 7:00 PM">6:30 PM To 7:00 PM </option>
                    <option value="7:00 PM To 7:30 PM">7:00 PM To 7:30 PM</option>
                    <option value="7:30 PM To 8:00 PM">7:30 PM To 8:00 PM</option>
                    <option value="8:00 PM To 8:30 PM">8:00 PM To 8:30 PM</option>
                    <option value="8:30 PM To 9:00 PM">8:30 PM To 9:00 PM</option>
             </select>
            </div>
     
            <div class="input-box">
                        <span class="details">Patient_id:
            <?php        
            $email=$_SESSION['email'];

                $edit_doctor_profile_query="select * from user where email='$email'" ;
                
                $edit_run_doctor_profile_query=mysqli_query($con,$edit_doctor_profile_query);
            
                            while($drow = mysqli_fetch_array($edit_run_doctor_profile_query))
                            
                                {
                                     echo   $drow['id'];
                                }
                     
                    
                    
                            
                            ?> 
                        <input type="number" name="p_id"  placeholder="Enter your id" />
                        <small>
                        
                            <span style="color:red"><?php echo $error_pid; ?></span><br>
                        </small>
                    </div>

         
                 <div class="input-box">
                      <span class="details">specialist_id:
                          <?php
                        if(isset($_GET['s_id'])){
                        error_reporting(0);
                        $d_id=mysqli_query($con,$_GET['s_id']);
                            $show_doctor_profile_query="select * from doctor inner join schedule on schedule.d_id=doctor.id  WHERE s_id='$_GET[s_id]'" ;
                            $show_run_doctor_profile_query=mysqli_query($con,$show_doctor_profile_query);
                             while  ( $row = mysqli_fetch_array($show_run_doctor_profile_query)){

                                 echo   $row['s_id'];
                                }
                        }
                        ?>
                        </span>
                        <input type="number" name="s_id"  placeholder="Enter speicalist id" />
                        <small>
                        
                            <span style="color:red"><?php echo $error_pid; ?></span><br>
                        </small>
                 </div>
        
        <div class="button">
            <input type="submit" value="submit" name="submit" style="    height: 45px;
                    margin: 35px 0;
                    display: flex;
                    justify-content: center;
                    position: relative;
                    bottom: -40px;
                    right: 200px;
            "/>
          </div>
          <?php echo $update_msg;?>
       
        </form>
      </div>
    
    
    
    <div class="homepage">
      <a href="../View_Doctor_Appointment_Schedule/doctor_schedule_list.php">Back to homepage</a>
    </div>
  </div>
    
  </body>
</html>









