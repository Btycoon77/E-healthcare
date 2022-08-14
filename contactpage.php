<?php
include "admin/connection.php";

$err_email ="";
$err_name ="";
$err_message ="";

if(isset($_POST['submit'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];
  // print_r($_POST);

  if($email =="" || $message =="" || $name ==""){
    $err_message = $err_email =$err_name ="The field cannot be empty";
  }

  if (!preg_match('/^[a-z A-Z]*$/',$name)){
    $err_name= "Invalid name";
  }
  else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
     $err_email =" Invalid email";
  }
  else{
    $sql = "INSERT INTO comment(name,email,message) VALUES('$name','$email','$message')";
    $result = mysqli_query($con,$sql);
    // echo "succesfull";
    if($result){
      $success_msg ="&nbsp&nbspYour message was succesfully sent";
    }
  }
  
}

?>

<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Responsive Contact Us Form  </title>
    <link rel="stylesheet" href="css/contact.css">
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="container">
    <div class="content">
      <div class="left-side">
        <div class="address details">
          <i class="fas fa-map-marker-alt"></i>
          <div class="topic">Address</div>
          <div class="text-one">Kirtipur</div>
          <div class="text-two">Kathmandu</div>
        </div>
        <div class="phone details">
          <i class="fas fa-phone-alt"></i>
          <div class="topic">Phone</div>
          <div class="text-one">+977 9869068956</div>
          <div class="text-two">+977 9840135234</div>
        </div>
        <div class="email details">
          <i class="fas fa-envelope"></i>
          <div class="topic">Email</div>
          <div class="text-one">btycoon77@gmail.com</div>
          <div class="text-two">ehealthcare@gmail.com</div>
        </div>
      </div>
      <div class="right-side">
        <div class="topic-text">Send us a message</div>
        <p>If you have any work from me or any types of quries related to your heatlh,please feel free to  send us message from here. It's our  pleasure to help you.</p>
      <form action="#" method="post">
        <div class="input-box">
          <input type="text" placeholder="Enter your name" name="name">
        </div><small>
              

              <span style="color:red"> <?php 
            
           
            echo  $err_name; ?></span><br>
            </small>
        <div class="input-box">
          <input type="text" placeholder="Enter your email" name="email">
        </div><small>
              

              <span style="color:red"> <?php 
            
           
            echo  $err_email; ?></span><br>
            </small>
        <div class="input-box ">
          <textarea name="message" id="message" cols="30" rows="50" placeholder="Your message">

          </textarea>
          
        </div><small>
              

              <span style="color:red"> <?php 
            
           
            echo  $err_message; ?></span><br>
            </small>
        <div class="button">
          <input type="submit" name ="submit" value="Send Now" >
        </div>
        <?php
         echo $success_msg;
        ?>
      </form>
    </div>
    </div>
  
  <a href="index.php">Back to Homepage</a>
</div>
</body>
</html>
