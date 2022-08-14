
<?php 
include("connection.php");
// include "test.php";
$err_name='';
$error_email ="";
$error_pass ="";
// $error_qual ="";
// $error_regno ="";
$error_dob ="";
$error_address ="";
$error_phone ="";

if(isset($_POST["submit"])){
    // print_r($_POST);
// $d_id = $_POST['id'];
$d_f_name = $_POST['f_name'];
// echo $d_f_name;die;
$d_l_name = $_POST['l_name'];
$d_email = $_POST['email'];
// $d_specialist=($_POST['specialist']);
// $d_qualification=($_POST['qualification']);
$d_pswd = $_POST['password'];
$d_confirm_pswd =$_POST['c_password'];
$d_pswd_len=strlen($d_pswd);
$date = date("y/m/d") ;
// $doc_reg_no =$_POST['reg_no'];
$d_dob = $_POST['dob'];
$d_address =$_POST['address'];
$d_phone = $_POST['contact'];

$existSql ="SELECT * FROM user where email='$d_email'";
$result =mysqli_query($con,$existSql);
$number_of_existing_rows = mysqli_num_rows($result);
// $_POST[".$date."];
    // print_r($_POST);

  $phone_string = strval($d_phone);
  $phone_length = strlen($phone_string);

   if( $d_address=="" || $d_dob =="" || $d_email=="" ||$d_pswd=="" || $d_confirm_pswd== "" || $d_f_name =="" || $d_l_name =="" || $d_phone ==""){
     $error_phone =     $error_address = $error_dob = $err_name = $error_pass =$error_email="This field cannot be empty";
   }


   else if (!preg_match('/^[a-z A-Z]*$/',$d_f_name)){
    $err_name= "Invalid name";
  

     }

    
    else if (!preg_match('/^[a-z A-Z]*$/',$d_l_name)){
        $err_name ="Invalid name";
         }

         else if($phone_length !=10){
           $error_phone= "please enter valid length";
         }
   
         else if (!preg_match('/^[a-z A-Z]*$/',$d_address)){
          $error_address ="Invalid address";
           }
	
    else if(!filter_var($d_email,FILTER_VALIDATE_EMAIL)){
           $error_email ="please enter valid email";

       }

        //checking whetther username entered by user exists or not.

     
    else if($number_of_existing_rows>0){
        $error_email ="email already exists";
    }
     
       
	else if($d_pswd_len<=8)
	   {
	   $error_pass="Your password should be more than 8 characters long";
	   }
      
    else if($d_pswd != $d_confirm_pswd)
    {
       
        $error_pass ="password doesnot match";	
	}
  else{
  
    
$d_query="INSERT INTO `user` (`f_name`, `l_name`, `email`, `contact`, `address`, `DOB`, `pswd`, `addedOn`) VALUES ('$d_f_name', '$d_l_name', '$d_email', '$d_phone', '$d_address', '$d_dob', '$d_pswd', current_timestamp())" ;


   $a = mysqli_query($con,$d_query);
  
   if($a){
     $success_msg = "Registration was successfull";
   }
   $success_msg=" Registration was  successfull!!";
   header('location:login.php');
    
  }

  }

	 
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
    
        body{
            background: lightgrey;
        }
    
  </style>

  </head>
  <body>
 
    <div class="container">
      <div class="title"> User Registration Form</div>
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
              <span class="details">Email</span>
              <input type="email" name="email"  placeholder="Enter your email" />
              <small>

                <span style="color:red"><?php echo $error_email; ?></span><br>
              </small>
            </div>

            <div class="input-box">
              <span class="details">Contact no:</span>
              <input type="number" name="contact"  placeholder="Enter your phone" />
              <small>
              
                <span style="color:red"><?php echo $error_phone; ?></span><br>
              </small>
            </div>

            <div class="input-box">
              <span class="details">DOB</span>
              <input type="date" name="dob"  placeholder="Enter your DOB" />
              <small>

                <span style="color:red"><?php echo $error_dob; ?></span><br>
              </small>
            </div>

            <div class="input-box">
              <span class="details"> Address</span>
              <input type="text" name="address"  placeholder="Enter your permanent address" />
              <small>

                <span style="color:red"><?php echo $error_address; ?></span><br>
              </small>
            </div>
           
            <div class="input-box">
              <span class="details">Password</span>
              <input type="password" placeholder="Enter your password" name="password"  /><small>

                <span style="color:red"><?php echo $error_pass; ?></span><br>
              </small>
            </div>
            <div class="input-box">
              <span class="details">Confirm Password</span>
              <input type="password"  name="c_password" placeholder="Confirm your password"  /><small>

                <span style="color:red"><?php echo $error_pass; ?></span><br>
              </small>
            </div>
          </div>
          <div class="gender-details">
            <input type="radio" name="gender" id="dot-1" />
            <input type="radio" name="gender" id="dot-2" />
            <input type="radio" name="gender" id="dot-3" />
            <span class="gender-title">Gender</span>
            <div class="category">
              <label for="dot-1">
                <span class="dot one"></span>
                <span class="gender">Male</span>
              </label>
              <label for="dot-2">
                <span class="dot two"></span>
                <span class="gender">Female</span>
              </label>
              <label for="dot-3">
                <span class="dot three"></span>
                <span class="gender">others</span>
              </label>
            </div>
          </div>

         
         
        
          <div class="button">
            <input type="submit" value="Register" name="submit" />
          </div>
          <?php echo $success_msg;?>
       
        </form>
      </div>
    
    
    
    <div class="homepage">
      <a href="../index.php">Back to homepage</a>
    </div>
  </div>
    
  </body>
</html>









