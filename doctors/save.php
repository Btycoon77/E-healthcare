<?php

$d_f_name = $_POST['f_name'];
// echo $d_f_name;die;
$d_l_name = $_POST['l_name'];
$d_email = $_POST['email'];
$d_specialist=($_POST['specialist']);
$d_qualification=($_POST['qualification']);
$d_pswd = md5($_POST['password']);
$d_confirm_pswd =$_POST['c_password'];
$d_pswd_len=strlen($d_pswd);
$date = date("y/m/d") ;
$doc_reg_no =$_POST['reg_no'];
$d_dob = $_POST['dob'];
$d_address =$_POST['address']; 

$d_query="INSERT INTO doctor(f_name,l_name,email,specialist,qualification,permission,pswd,date)     
  VALUES('$d_f_name','$d_l_name','$d_email','$d_specialist','$d_qualification','Added','$d_pswd','$date')" ;
    mysqli_query($con,$d_query);
     $success_msg=" Registration was successfull!!";
     ?>