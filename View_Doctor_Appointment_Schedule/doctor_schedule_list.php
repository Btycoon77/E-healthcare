


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
                    
                    <th style="min-width: 150px">Status</th>
                    <th style="min-width: 150px">Specialist</th>
                   
                   
                  </tr>
                </thead>
                <tbody>
                 
                    <tr>
                      <td>1</td>
                    
                      <td><span class="mode mode_process">Approved</span></td>
                     
                      <td><a href="cardiologist.php">Cardiologist</a></td>
                    </tr>

                    <tr>
                      <td>2</td>
                    
                      <td><span class="mode mode_process">Approved</span></td>
                     
                      <td><a href="orthopedic.php">Orthopedic</a></td>
                    </tr>

                    <tr>
                      <td>3</td>
                    
                      <td><span class="mode mode_process">Approved</span></td>
                     
                      <td><a href="cardiac_electrophysiologist.php">Cardiac_electrophysiologist</a></td>
                    </tr>

                    <tr>
                      <td>4</td>
                    
                      <td><span class="mode mode_process">Approved</span></td>
                     
                      <td><a href="dentist.php">Dentist</a></td>
                    </tr>

                    <tr>
                      <td>5</td>
                    
                      <td><span class="mode mode_process">Approved</span></td>
                     
                      <td><a href="surgeon.php">Surgeon</a></td>
                    </tr>

                    <tr>
                      <td>6</td>
                    
                      <td><span class="mode mode_process">Approved</span></td>
                     
                      <td><a href="gynecologist.php">Gynecologist</a></td>
                    </tr>

                    <tr>
                      <td>7</td>
                    
                      <td><span class="mode mode_process">Approved</span></td>
                     
                      <td><a href="medicine.php">Medicine</a></td>
                    </tr>
                     
          
  
                </tbody>
              </table>
              <!-- ---------------table ends here------------ -->

            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container ">
  <ul class="pager font-weight-bold text-monospace">
    <li class="previous "><a href="../users/view_user_homepage.php">Previous</a></li>
    <li class="next"><a href="../users/view_users_appointment.php">Next</a></li>
  </ul>
  </div>

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.14/js/jquery.dataTables.min.js"></script>
    <script src="../js/table.js"></script>
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





