
<!DOCTYPE html>
<html lang="en">
  <head>
    
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
   
    <link rel="stylesheet" href="helper/bootstrap.min.css">
    <link rel="stylesheet" href="helper/fontawesome.css">
    <link rel="stylesheet" href="helper/datatable.min.css">
  
    <link
      href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,800&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="css/table.css" />
    <title>Get information</title>
  </head>
  <body>
   
    <div class="container p-30" >
   
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
                    <th style="min-width: 150px">Status</th>
                    <th style="min-width: 150px">Specialist</th>
                    <th style="min-width: 100px">Qualification</th>
                   
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  include("connection.php");
                  $query = "SELECT * 
                  FROM doctor inner join schedule on schedule.d_id=doctor.id  where permission='approved' AND specialist like'cardiologist%'";
                  $result = mysqli_query($con, $query);
                     
                  $sn =1;
                  if(mysqli_fetch_assoc($result)>0){

                    while($row = mysqli_fetch_assoc($result)){
                      
                      ?>
                    <!-- ---injecting html code---------- -->
                    <tr>
                      <td><?php echo $sn?></td>
                      <!-- <td>
                      echo  "<a href='Admin/detail.php?s_id={$row['s_id']}'>{$row['f_name']}{$row['l_name']}</a>";
                      </td> -->
                      <td><?php
                       echo "<a href ='admin/detail.php?s_id={$row['s_id']}'>
                       
                       {$row['f_name']}
                       {$row['l_name']}

                       </a>";
                        
                      ?></td>
                      <td><span class="mode mode_process">Approved</span></td>
                      <td><?php  echo  $row['specialist']  ;?></td>
                      <td><?php  echo  $row['qualification']  ;?></td>
                    
                      
                     
                    
                  
           
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

    <script src="helper/jquery.min.js"></script>
    <script src="helper/bootstrap.min.js"></script>
    <script src="helper/datatable.min.js"></script>
    <script src="js/table.js"></script>
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

