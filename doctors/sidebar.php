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
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

    <link rel="stylesheet" href="../css/table.css" />
    <link rel="stylesheet" href="../css/admin.css">
</head>

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
                    <a href="admin_homepage.php" class="active"><span class="las la-home"></span> <span>Dashboard</span></a>
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
                    <small>Tycoon</small>
                </div>
            </div>
        </header>
    </div>


</html>