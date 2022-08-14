<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1" />
    <title>Welcome Admin!!</title>
     <!-- -----datatable link----- -->
     <link
      rel="stylesheet"
      href="../helper/bootstrap.min.css"
    />
    <link
      rel="stylesheet"
      href="../helper/datatables.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,800&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="../helper/bootstrap.min.css">
    <link rel="stylesheet" href="../helper/line_awesome.min.css">
    <link rel="stylesheet" href="../helper/fontawesome.min.css">
    <link rel="stylesheet" href="../helper/datatable.min.css">


    <link rel="stylesheet" href="../css/table.css" />

    <link rel="stylesheet" href="../css/admin.css">

</head>

<body>

    <!--Beginning of sidebar-->

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
                    <a href="#" class="active"><span class="las la-home"></span> <span>Dashboard</span></a>
                </li>
                <li>
                    <a href="display_doctors.php"><span class="las la-stethoscope"></span> <span>Doctors</span></a>
                </li>
                <li>
                    <a href="display_users.php" ><span class="las la-user"></span> <span>Users</span></a>
                </li>
                <li>
                    <a href="add_doctor.php"><span class="las la-user-injured"></span>
                        <span>Add doctors</span></a>
                </li>
                <li>
                    <a href="display_appointments.php"><span class="las la-history"></span>
                        <span>Appointments</span></a>
                </li>
                <li>
                    <a href="display_reg_request.php"><span class="las la-bell"></span>
                        <span>Docotor Reg Request</span></a>
                </li>
                <li>
                    <a href="admin_logout.php"><span class="las la-sign-out-alt"></span> <span>Logout</span></a>
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
                    <h4>Admin</h4>
                    <small>B_Tycoon</small>
                </div>
            </div>
        </header>

        <main>
            <div class="cards">
                <div class="card-single">
                    <div>
                        <h1>
                            <?php
              include "connection.php";
              $sql = "select * from user";
              $result = mysqli_query($con,$sql);
              $user_count = mysqli_num_rows($result);
              echo $user_count;
              
              ?>
                        </h1>
                        <span>Users Management</span>
                    </div>
                    <div>
                        <span class="las la-users"></span>
                    </div>
                </div>

                <div class="card-single">
                    <div>
                        <h1>
                            <?php
              include "connection.php";
              $sql = "select * from doctor";
              $result = mysqli_query($con,$sql);
              $user_count = mysqli_num_rows($result);
              echo $user_count;
              
              ?>
                        </h1>
                        <span>management of doctors</span>
                    </div>
                    <div>
                        <span class="las la-stethoscope"></span>
                    </div>
                </div>

                <div class="card-single">
                    <div>
                        <h1>
                            <?php
              include "connection.php";
              $sql = "select * from appointment";
              $result = mysqli_query($con,$sql);
              $user_count = mysqli_num_rows($result);
              echo $user_count;
              
              ?>
                        </h1>
                        <span>Appointment management</span>
                    </div>
                    <div>
                        <span class="las la-wheelchair"></span>
                    </div>
                </div>

                <div class="card-single">
                    <div>
                        <h1>
                            <?php
              include "connection.php";
              $sql = "select * from comment";
              $result = mysqli_query($con,$sql);
              $user_count = mysqli_num_rows($result);
              echo $user_count;
              
              ?>
                        </h1>
                        <span>new queries</span>
                    </div>
                    <div>
                        <span class="lab la-wpforms"></span>
                    </div>
                </div>
            </div>
            <!-------------------list of users in table------------------>
        
                <div class=" p-30 ">
                    <div class="row">
                        <div class="col-md-12 main-datatable">
                        <div class="card_body">
                            <h4 class="card-title ms-2">&nbsp&nbsp Users</h4>
                            <div class="row d-flex">
                            <div class="col-sm-4 createSegment">
                                <a class="btn dim_button create_new">
                                <span class="glyphicon glyphicon-plus"></span> Create New</a
                                >
                            </div>

                            <!-- -------------search bar------------ -->

                            <div class="col-sm-8 add_flex">
                                <div class="form-group searchInput">
                                <label for="email">Search:</label>
                                <input
                                    type="search"
                                    class="form-control"
                                    id="filterbox"
                                    placeholder=" "
                                    />
                                </div>
                            </div>
                            </div>

                            <!-- ------------table starts--------------- -->
                            
                         <div class="overflow-x">
                            <table
                                
                                id="filtertable"
                                class="table cust-datatable dataTable no-footer">
                            
                                <thead>
                                <tr>
                                    <th style="min-width: 50px">ID</th>
                                    <th style="min-width: 150px">Name</th>
                                    <!-- <th style="min-width: 150px">Mode</th> -->
                                    <!-- <th style="min-width: 100px">Event</th> -->
                                    <th style="min-width: 100px">Date</th>
                                    <th style="min-width: 150px">Status</th>
                                    <th style="min-width: 150px">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php 
                                include("connection.php");
                            
                                    if (isset($_GET["id"])) {
                                        $sno = $_GET["id"];
                                        // echo $sno;
                                        $sql = "DELETE FROM user WHERE id = $sno";
                                        $result = mysqli_query($con, $sql);
                                    }

                                $query = "SELECT * 
                                            FROM user ";
                                    $result = mysqli_query($con, $query);
                                $sn =1;
                                if(mysqli_fetch_assoc($result)>0){

                                    while($row = mysqli_fetch_assoc($result)){
                                    
                                    ?>
                                    <!-- ---injecting html code---------- -->
                                    <tr>
                                    <td><?php echo $sn?></td>
                                    <td><?php echo "{$row['f_name']}" ;echo "&nbsp&nbsp";echo "{$row['l_name']}"  ?></td>
                                    <!-- <td><span class="mode mode_process">Success</span></td> -->
                                    <!-- <td>Journey</td> -->
                                    <td><?php 
                                    $strtoTime =strtotime($row['addedOn']);
                                    
                                    echo date('d-m-Y',$strtoTime)?></td>
                                    <td><span class="mode mode_on">Active</span></td>
                                    <td>
                                        <div class="btn-group">
                                        <a
                                        class="dropdown-toggle dropdown_icon"
                                        data-toggle="dropdown"
                                        >
                                        <i class="fa fa-pencil-square-o"></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                        <li>
                                            <a href="#" target="_blank"> Dummy Details </a>
                                        </li>
                                        <li>
                                            <a href="#" target="_blank"> Dummy Details </a>
                                        </li>
                                        <li>
                                            <a href="#" target="_blank"> Dummy Details </a>
                                        </li>
                                        </ul>
                                    </div>
                                    <span class="actionCust">
                                        <a href="#"><i class="fa fa-line-chart"></i></a>
                                    </span>
                                    <div class="btn-group">
                                        <a
                                        class="dropdown-toggle dropdown_icon"
                                        data-toggle="dropdown"
                                        >
                                        <i class="fa fa-ellipsis-h"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown_more">
                                        <li>
                                        <a href="#" target="_black">
                                            <i class="fa fa-clone"></i>Duplicate
                                        </a>
                                        </li>
                                        <li>
                                        <a href="?id=<?php echo $row['id']?>" target="_black">
                                            <i class="delete fa fa-trash"></i> Delete
                                        </a>
                                        </li>
                                        <li>
                                        <a href="#" target="_black">
                                            <i class="fa fa-list"></i>Activity</a
                                            >
                                        </li>
                                        </ul>
                                    </div>
                                    </td>
                                
                        
                        </tr>
                        <?php
                                $sn++;
                                }
                                }
                                
                                ?>
                                    
                        
                
                                </tbody>
                            </table>
                            <!-- ---------------table ends here------------ -->

                            </div>
                        </div>
                        </div>
                    </div>
                </div>
             <!-------------------list of users in table------------------>   

              <!-------------------list of docotors in table------------------>
        
             
                  
             <!-------------------list of doctors in table------------------>   
            
        </main>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.14/js/jquery.dataTables.min.js"></script>
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="../js/table.js"></script>
    <script src="../helper/jquery.min.js"></script>
    <script src="../helper/bootstrap.min.js"></script>
    <script src="../helper/datatable.min.js"></script>
    <script src="../helper/popper.min.js"></script>
   <!-- <script>
       $(document).ready(function(){
           $('.users').click(function(){
                $('#d-users').load('../html/display_users.php');
           });
       })
   </script> -->


    <script>
                      
      deletes = document.getElementsByClassName("delete");
      Array.from(deletes).forEach((element) => {
        element.addEventListener("click", (e) => {
          
      sno = e.target.id.substr(1, );
      if (confirm("Are you sure you want to delete ")) {
        window.location = `/ehealthcare/admin/admin_homepage.html?delete=${sno}`;
        console.log("yes");

      } else {
        console.log("no");
      }
    });

  });
                    </script>
</body>

</html>