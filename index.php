<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>

    <link rel="stylesheet" href="css/index2.css" />
    <!-- <link rel="stylesheet" type="text/css" href="testimonial/style.css">
    <link rel="stylesheet" href="testimonial/style2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.8/swiper-bundle.min.css"/> -->

    <!-- ----font awesome cdn link--------- -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"/>
  </head>
  <body>
     <!-- -------------------start of navabar------------- -->
      <nav>
        <div class="logo">
          <img src="images/logo1.png" alt="logo" />
          <span>e-Healthcare</span>
        </div>
        <ul>
          <li><a href="index.php">Home</a></li>

          <li>
            <a href="#">Doctors<i style="margin-left: 5px;" class="fas fa-caret-down"></i></a>

            <div class="dropdown-menu">
              <ul>
                <li><a class="dropdown-item" href="cardiologist.php">Cardiologist</a></li>
                <li><a class="dropdown-item" href="medicine.php">Medicine</a></li>
                <li><a class="dropdown-item" href="orthopedic.php">Orthopedic</a></li>
                <li><a class="dropdown-item" href="surgeon.php">Surgeon</a></li>
                <li><a class="dropdown-item" href="gynecologist.php">Gynecologist</a></li>
                <li><a class="dropdown-item" href="orthopedic.php">Orthopedic</a></li>
                <li>
                  <a class="dropdown-item" href="cardiac_electrophysiologist.php"
                    >Cardiac electrophysiologist</a
                  >
                </li>
              </ul>
            </div>
          </li>
          <li><a href="contactpage.php">Contact us</a></li>

          <li>
            <a href="#">Login <i  style="margin-left: 5px;"  class="fas fa-caret-down"></i></a>

            <div class="dropdown-menu">
              <ul>
                <li><a class="dropdown-item" href="users/login.php">User</a></li>
                <li><a class="dropdown-item" href="doctors/doctor_login.php">Doctor</a></li>

                <li>
                  <a class="dropdown-item" href="admin/admin_login.php"
                    >Admin</a
                  >
                </li>
              </ul>
            </div>
          </li>
          
        </ul>
      <!-- ----------------searchbar-------------- -->
        <div class="nav-middle flex-div">
            <div class="search-box flex-div">
              <input type="text" name="" placeholder="Search" id="" />
              <img class="search-icon" src="images/search.png" alt="search" />
            </div>
            <img class="mic-icon" src="images/voice-search.png" alt="mic" />
          </div>
      </nav>
   <!-- -------------------------end of navbar---------------- -->
   
      <div class="content">
        <div class="vid-parent">
          <video src="videos/d.mp4" playsinline autoplay muted loop></video>
          <div class="vid-overlay"></div>
        </div>
        <div class="vid-content">

            <h1 class="slide-left">
                Welcome to <br>
                e-Healthcare
            </h1>
            <p class="slide-left">
                Our highly specialized experts are deeply experienced in treating rare and complex condtions.If you are not registered, please feel free to register.
            </p>
            <div class="links slide-left">
                <a href="users/registration.php" class="btn">Sign up</a>
                <a href="contactpage.php">Contact us</a>
            </div>
        </div>
    </div>


    <!-- -----------footer------------- -->


    <!-- -----------end of footer-------------- -->
     
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.8/swiper-bundle.min.js"></script>
  <script src="testimonial/scripts.js"></script> -->
  </body>
</html>
