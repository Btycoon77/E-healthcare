<?php
session_start();

include "connection.php";

$error_email="";
$error_password ="";
// print_r($_SERVER);die; 
if(isset($_GET)){
    if(isset($_GET['err'])){
        $err_msg ="Email and password cannot be empty ";
        // echo "Email and password cannot be empty";
        // print_r($_GET);
        
    }else if(isset($_GET['invalid_cred'])){

        $err_msg ="Invalid credentials";
    }
    else{

    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST["email"];
    $password = $_POST["password"];
    //    print_r($_POST);die;
    if($email =="" || $password==""){
        $err_msg = "This field cannot be empty";
        header('location:login.php?err=true');
    }
    // else if(!filter_var($email,'FILTER_VALIDATE_EMAIL')){
    //     $error_email ="Invalid email";
    // }
    
    else{
        $sql = "SELECT * FROM user WHERE email='$email' AND pswd ='$password'";
        // echo $sql;die;
        $result = mysqli_query($con, $sql);
        $num = mysqli_num_rows($result);
        // print_r($num);die;
        if ($num>0) {
            while ($row = mysqli_fetch_assoc($result)) {
                // if (password_verify($password,$row["password"])) {
                    // die('You are in');
                    $login = true;
                    $_SESSION['loggedin'] = true;
                    $_SESSION['email'] = $email;
                    header("location:view_user_homepage.php");
                // } 
            }
            
        }
        else {
            
            header('location:login.php?invalid_cred=true');
        }
    }


}
    

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- ===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <link
    rel="stylesheet"
    href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p"
    crossorigin="anonymous"
  />
    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="../css/login_reg.css">
    <!-- <link rel="stylesheet" href="../css/form.css"> -->
         
    <title>Login & Registration Form</title>
    <style>
        body{
            background: lightgrey;
        }
    </style>
</head>
<body>
    
    <div class="container">
        <div class="forms">
            <div class="form login">
                <span class="title">Login</span>

                <form action="#" method="post">
                    <div class="input-field">
                        <input type="email" class="email" name="email"  placeholder="Enter your email" >
                        <i class="uil uil-envelope icon"></i>
                        <span style='color:red'><?php echo "$error_email" ?></span><br>
                        
                    </div>
                    <div class="input-field">
                        <input type="password"name="password"  class="password" placeholder="Enter your password" >
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw"></i>
                        <span style='color:red'><?php echo "$error_password"?></span><br>  
                       
                    </div>

                    <div class="checkbox-text">
                        <div class="checkbox-content">
                            <input type="checkbox" id="logCheck">
                            <label for="logCheck" class="text">Remember me</label>
                        </div>
                        
                        <a href="#" class="text">Forgot password?</a>
                    </div>

                    <div class="input-field button">
                        <input type="submit" id="btn" value="Login Now">
                    </div>
                </form>

               
                <div class="login-signup text">
                  <a href="../index.php">Back to Homepage</a>
                </div>
                <?php echo "<text style='color:red'>$err_msg</text>"?>
            </div>

            <!-- Registration Form -->
            <div class="form signup">
                <span class="title">Registration</span>

                <form action="#">
                    <div class="input-field">
                        <input type="text" placeholder="Enter your name" required>
                        <i class="uil uil-user"></i>
                    </div>
                    <div class="input-field">
                        <input type="text" placeholder="Enter your email" required>
                        <i class="uil uil-envelope icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" class="password" placeholder="Create a password" required>
                        <i class="uil uil-lock icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" class="password" placeholder="Confirm a password" required>
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw"></i>
                    </div>

                    <div class="checkbox-text">
                        <div class="checkbox-content">
                            <input type="checkbox" id="sigCheck">
                            <label for="sigCheck" class="text">Remember me</label>
                        </div>
                        
                        <a href="#" class="text">Forgot password?</a>
                    </div>

                    <div class="input-field button">
                        <input type="submit" value="Login Now">
                    </div>
                </form>

                <div class="login-signup">
                    <span class="text">Not a member?
                        <a href="#" class="text login-link">Signup now</a>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <script>
        const container = document.querySelector(".container"),
      pwShowHide = document.querySelectorAll(".showHidePw"),
      pwFields = document.querySelectorAll(".password"),
      signUp = document.querySelector(".signup-link"),
      login = document.querySelector(".login-link");
    



    //   js code to show/hide password and change icon
    pwShowHide.forEach(eyeIcon =>{
        eyeIcon.addEventListener("click", ()=>{
            pwFields.forEach(pwField =>{
                if(pwField.type ==="password"){
                    pwField.type = "text";

                    pwShowHide.forEach(icon =>{
                        icon.classList.replace("uil-eye-slash", "uil-eye");
                    })
                }else{
                    pwField.type = "password";

                    pwShowHide.forEach(icon =>{
                        icon.classList.replace("uil-eye", "uil-eye-slash");
                    })
                }
            }) 
        })
    })


    // js code to appear signup and login form
    signUp.addEventListener("click", ( )=>{
        container.classList.add("active");
    });
    login.addEventListener("click", ( )=>{
        container.classList.remove("active");
    });

    </script>
    

</body>
</html>
