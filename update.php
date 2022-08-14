<?php
include 'header.php';
include 'conn.php';

$id =$_GET['id'];
$sql ="select * from student where id =".$id;
$update ="update student set name =".$name." ,age ='$age'  where id=    ".$id;
$res = mysqli_query($conn,$sql);

if($row = mysqli_num_rows($res)>0){
    while($row = mysqli_fetch_assoc($res)){
        ?>
         <form method ="post" action ="update.php?id=<?php
           echo $id;
           ?>">
           <div class="form-group">
             <label for="name-input">Tell us your name*</label>
             <input id="name-input" type="text" placeholder="First name" required="">
             <input type="text" placeholder="Last name" required="">
           </div>
           <div class="form-group">
             <label for="email-input">Enter your email</label>
             <input id="email-input" type="text" placeholder="Eg. example@gmail.com" required="">
           </div>
           <div class="form-group">
             <label for="phone-input">Enter phone number</label>
             <input id="phone-input" type="text" placeholder="Eg. _1800 000000" required="">
           </div>
           <div class="form-group">
             <label for="message-textarea">Message</label>
             <input class="textarea" id="message-textarea" placeholder="Write us a message"></input>
           </div>
           <a class="btn">Send message</button>
         </form>
  <?php  }
}
else{
    die();
}
?>
?>