<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdn.datatables.net/1.10.14/css/jquery.dataTables.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,800&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="../css/table.css" />

    <link rel="stylesheet" href="../helper/bootstrap.min.css">
    <link rel="stylesheet" href="../helper/line_awesome.min.css">
    <link rel="stylesheet" href="../helper/fontawesome.min.css">
    <link rel="stylesheet" href="../helper/datatable.min.css">

    <title>Get information</title>
    <style>
      .sidebar{
        z-index: 0;
      }
      .container{
        width:fit-content;
        display: flex;
        position: absoulute;
        left: 140px;
        top:76px;
      }
    </style>
  </head>
  <body>
  <?php include "sidebar.php";?>
    <div class="container p-30" style ="width:fit-content; display: flex;
        position: relative;
        left: 140px;top:76px;
    ">
      <div class="row">
        <div class="col-md-12 main-datatable">
          <div class="card_body">
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
                style="width: 100%"
                id="filtertable"
                class="table cust-datatable dataTable no-footer"
              >
                <thead>
                  <tr>
                    <th style="min-width: 50px">ID</th>
                    <th style="min-width: 150px">Doctor Name</th>
                    <th style="min-width: 150px">Mode</th>
                    <th style="min-width: 100px">Appointment Date</th>
                    <th style="min-width: 100px">Appointment time</th>
                    <th style="min-width: 150px">Patient Name</th>
                    <th style="min-width: 150px">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  include("connection.php");
              
                  session_start();

                  $edit_doctor_profile_query="select user.id,schedule.s_id,doctor.f_name as dfname,doctor.l_name as dlname,user.f_name as ufname,user.l_name as ulname, doctor.specialist,appointment.booking_date,appointment.booking_time
                  from doctor join schedule on schedule.d_id=doctor.id join appointment on appointment.sid=schedule.s_id  join user on appointment.pid=user.id where  appointment.permission='Approved'";
                  
                  $edit_run_doctor_profile_query=mysqli_query($con,$edit_doctor_profile_query);
               
                  $sn =1;
                  if(mysqli_fetch_assoc($edit_run_doctor_profile_query)>0){

                    while($row = mysqli_fetch_assoc($edit_run_doctor_profile_query)){
                      
                      ?>
                    <!-- ---injecting html code---------- -->
                    <tr>
                      <td><?php echo $sn?></td>
                    
                      <td>
                        <?php echo "{$row['dfname']}" ;echo "&nbsp&nbsp";echo "{$row['dlname']}"  ?>
                    </td>
                      <td><span class="mode mode_process">Success</span></td>
                      <td><?php 
                      echo $row['booking_date'];
                      
                    ?></td>
                     <td><?php 
                      echo $row['booking_time'];
                      
                    ?></td>
                      <td>
                        <?php echo "{$row['ufname']}" ;echo "&nbsp&nbsp";echo "{$row['ulname']}"  ?>
                    </td>
                     
                    
                      <td>
                        <div class="btn-group">
                          <a
                          class="dropdown-toggle dropdown_icon"
                          data-toggle="dropdown"
                        >
                          <i class="fa fa-pencil-square-o"></i>
                        </a>
                        <!-- <ul class="dropdown-menu">
                          <li>
                            <a href="#" target="_blank"> Dummy Details </a>
                          </li>
                          <li>
                            <a href="#" target="_blank"> Dummy Details </a>
                          </li>
                          <li>
                            <a href="#" target="_blank"> Dummy Details </a>
                          </li>
                        </ul> -->
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

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.14/js/jquery.dataTables.min.js"></script>
    <script src="../js/table.js"></script>
    <!-- <script src="../js/table.js"></script> -->
    <script src="../helper/jquery.min.js"></script>
    <script src="../helper/bootstrap.min.js"></script>
    <script src="../helper/datatable.min.js"></script>
    <script src="../helper/popper.min.js"></script>
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
