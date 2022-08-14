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
  </head>
  <body>
    <?php include "sidebar.php"  ?>
    <div class="container p-30" style ="width:fit-content; display: flex;
        position: relative;
        left: 140px;top:75px; ">
   
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
                    <th style="min-width: 150px">Name</th>
                    <th style="min-width: 150px">Mode</th>
                    <th style="min-width: 100px">Event</th>
                    <th style="min-width: 100px">Date</th>
                    <th style="min-width: 150px">Status</th>
                    <th style="min-width: 150px">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  include("../admin/connection.php");
              
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
                      <td><span class="mode mode_process">Success</span></td>
                      <td>Journey</td>
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
