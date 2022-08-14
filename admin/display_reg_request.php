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
  <?php include "sidebar.php"  ?>
    <div class="container p-30" style ="width:fit-content; display: flex;
        position: relative;
        left: 140px;top:75px;
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
                    <th style="min-width: 150px">Name</th>
                    <th style="min-width: 150px">Specialism</th>
                    <th style="min-width: 100px">Status</th>
                    <th style="min-width: 100px">Date</th>
                    <th style="min-width: 150px">Approval</th>
                    <th style="min-width: 150px">Rejection</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  include("../admin/connection.php");
              
                  if(isset($_GET["id"]))
                  {
                 $d_id=$_GET['id'];
                 $denied_query = "UPDATE
                   doctor set permission='Approved' where id='$d_id' ";
                  $run = mysqli_query($con, $denied_query);
                  
                  }
                  $queryPermission="WHERE permission='Pending' ";
                 $show_pending_request_query = "SELECT * 
                 FROM doctor $queryPermission 
                 order by permission='Pending' desc";
                  $run = mysqli_query($con, $show_pending_request_query);
                 $sn =1;
                  while($row = mysqli_fetch_array($run))
                  {
                      
                      ?>
                    <!-- ---injecting html code---------- -->
                    <tr>
                      <td><?php echo $sn?></td>
                     
                      <td>
                       
                      <?php echo "{$row['f_name']}" ;echo "&nbsp&nbsp";echo "{$row['l_name']}"  ?>
                    </td>
                      
                      <td><?php echo $row['specialist']  ?></td>

                      <td><span class="mode mode_process"><?php echo $row['permission']?></span></td>

                      
                      
                      <td><?php 
                        echo $row['date'];
                     ?></td>

                      <td>
                            <a href="display_reg_request.php?id=<?php echo $row['id']?>">Approve</a>
                         
                    </td>
                     
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
                            <a href="#" target="_blank"> Update </a>
                          </li>
                          <li>
                            <a href="#" target="_blank"> Add </a>
                          </li>
                          <li>
                            <a href="#" target="_blank"> Edit </a>
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
                          <a href="req_delete.php?id=<?php echo $row['id']?>" target="_black">
                            <i class="delete fa fa-trash"></i> Reject
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
   
   
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
