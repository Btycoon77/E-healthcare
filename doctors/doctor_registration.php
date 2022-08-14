
<?php 
include("connection.php");
// include "test.php";
$err_name='';
$error_email ="";
$error_pass ="";
$error_qual ="";
$error_regno ="";
$error_dob ="";
$error_address ="";

if(isset($_POST["submit"])){
    // print_r($_POST);
// $d_id = $_POST['id'];
$d_f_name = $_POST['f_name'];
// echo $d_f_name;die;
$d_l_name = $_POST['l_name'];
$d_email = $_POST['email'];
$d_specialist=($_POST['specialist']);
$d_qualification=($_POST['qualification']);
$d_pswd = $_POST['password'];
$d_confirm_pswd =$_POST['c_password'];
$d_pswd_len=strlen($d_pswd);
$date = date("y/m/d") ;
$doc_reg_no =$_POST['reg_no'];
$d_dob = $_POST['dob'];
$d_address =$_POST['address'];

$existSql ="SELECT * FROM doctor where email='$d_email'";
$result =mysqli_query($con,$existSql);
$number_of_existing_rows = mysqli_num_rows($result);
// $_POST[".$date."];

   if( $d_address=="" || $d_dob =="" || $d_specialist=="" || $d_qualification=="" || $d_email=="" ||$d_pswd=="" || $d_confirm_pswd== "" || $d_f_name =="" || $d_l_name ==""){
     $error_address = $error_dob =$error_regno = $error_qual= $err_name = $error_pass =$error_email="This field cannot be empty";
   }


   else if (!preg_match('/^[a-z A-Z]*$/',$d_f_name)){
    $err_name= "Invalid name";
  

     }

    
    else if (!preg_match('/^[a-z A-Z]*$/',$d_l_name)){
        $err_name ="Invalid name";
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
  

   
$d_query="INSERT INTO doctor(f_name,l_name,email,specialist,qualification,permission,pswd,date)     
VALUES('$d_f_name','$d_l_name','$d_email','$d_specialist','$d_qualification','Added','$d_pswd','$date')" ;
  mysqli_query($con,$d_query);
   $success_msg=" Registration was successfull!!";
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
    .container{
      margin-top:19%;
    }
    
        body{
            background: lightgrey;
        }
    
  </style>

  </head>
  <body>
   <?php include "sidebar.php";?>
    <div class="container">
      <div class="title">Registration Form</div>
      <div class="content">
        <form action="add_doctor.php" method="post">
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
              <span class="details">DOB</span>
              <input type="date" name="dob"  placeholder="Enter your DOB" />
              <small>

                <span style="color:red"><?php echo $error_dob; ?></span><br>
              </small>
            </div>

            <div class="input-box">
              <span class="details">Clinic/Hospital Address</span>
              <input type="text" name="address"  placeholder="Enter your clinic address" />
              <small>

                <span style="color:red"><?php echo $error_address; ?></span><br>
              </small>
            </div>

            <div class="input-box">
              <span class="details">Specialist</span>
              <select name="specialist" id="specialist">
                <option value="Orthopedic" >Orthopedic</option>
                <option value="Gynocologist" >Gynocologist</option>
                <option value="Dentist" >Dentist</option>
                <option value="Surgeon" >Surgeon</option>
                <option value="Cardiologist" >Cardiologist</option>
                <option value="medicine" >medicine</option>
                <option value="cardiac-electrophysiologist" >
                  cardiac-electrophysiologist
                </option>
              </select>
            </div>
            <div class="input-box">
              <span class="details">Qualification</span>
              <input
                type="text"
                name="qualification"
                id="qualification"
                placeholder="Enter your qualification"
                
              /> <small>

                <span style="color:red"><?php echo $error_qual; ?></span><br>
              </small>
            </div>

            <div class="input-box">
              <span class="details">Doctor Registration Number</span>
              <input type="number" placeholder="Enter your number" name="reg_no"  />
              <small>

                <span style="color:red"><?php echo $error_regno; ?></span><br>
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
          <a href="admin_homepage.php">Back to Homepage</a>
          <?php echo $success_msg;?>
       
        </form>
      </div>
    </div>
    
  </body>
</html>









