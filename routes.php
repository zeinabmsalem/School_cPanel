<?php

include("dbconn.php"); 

$admin_id;
$admin_type;
$school_id;
session_start();


if (empty($_SESSION['admin_id'] || $_SESSION['admin_type'] || $_SESSION['school_id']))
{
    header("Location:loginpage.php");
} else {
       $admin_id = $_SESSION['admin_id'];
       $admin_type = $_SESSION['admin_type'];
       $school_id = $_SESSION['school_id'];
}

?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- Style CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Table -->
    <script src="js/modernizr.js"></script>

<style>
    .button {
        background-color: #4CAF50; /* Green */
        border: none;
        color: white;
        padding: 15px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
    }

    .button4 {border-radius: 50%;}
    
</style>

</head>
<body>
 
 <section class="home">
    <!-- Header -->
    <div class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-4 text-left">
                    <!-- Title -->
                    <p>scs cp</p>
                </div>
                <div class="col-4 text-center">
                    <!-- Logo -->
                    <div class="img">
                        <img src="img/logo.png" alt="">
                    </div>
                </div>
                <div class="col-4 text-right">
                    <!-- Setting -->
                    <a href="#">
                        <img src="img/setting.svg" alt="" class="setting">
                    </a>
                    <!-- Logout -->
                    <a href="#">
                        <img src="img/logout.svg" alt="" class="logout">
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Side Menu -->
    <div class="side-menu">
        <div class="area"></div>
        <nav class="main-menu">
            <ul>
                <li class="active">
                    <a href="home.php">
                        <img src="img/home.svg" alt="home">
                        <span class="nav-text">
                            Home
                    </span>
                    </a>
                </li>
                <li class="has-subnav">
                    <a href="student.php">
                        <img src="img/student.svg" alt="studentes">
                        <span class="nav-text">
                            Students
                    </span>
                    </a>
                </li>
                <li class="has-subnav">
                    <a href="#">
                        <img src="img/bus.svg" alt="bus">
                        <span class="nav-text">
                            Bus
                    </span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="img/trips.png" alt="trips" style="width: auto;
                                                                    height: 40px;
                                                                    margin-left: 10px;
                                                                    margin-right: 6px">
                        <span class="nav-text">
                            Trips
                    </span>
                    </a>
                </li>
                <li class="has-subnav">
                    <a href="routes.php">
                        <img src="img/routes.svg" alt="routes">
                        <span class="nav-text">
                            Routes
                    </span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="img/reports.svg" alt="reports">
                        <span class="nav-text">
                            Reports
                    </span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="img/setting.svg" alt="settings">
                        <span class="nav-text">
                            Settings
                    </span>
                    </a>
                </li>
            </ul>

            <ul class="logout">
                <li>
                    <a href="#">
                        <img src="img/logout.svg" alt="">
                        <span class="nav-text">
                            Logout
                    </span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</section>

    
    <!--start of table-->
<section class="table">
    <!-- Button Add -->
    <div class="button-add">
        <a href="addroute.php" class="btn"></a>
    </div>
    <!-- Table Content -->
    <div id="cd-table">

        <div class="cd-table-container">
            <div class="cd-table-wrapper">

                                       <table class="table table-striped table-bordered">
                                           
                                          <!--<a href="addroute.php"><button type="button" class="btn btn-sm btn-success">Add Route +</button></a>-->
                                            <thead>
                                                <tr>

                                                    <th>Route ID</th>
                                                    <th>Route Name</th>
                                                    <th>Route Direction</th>
                                                    <th>School ID</th>
                                                    <th>Options</th>
                                                    


                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
                                                   $sql = "select school_route.id, school_route.direction_id, school_route.route_Name, school_route.school_id, rout_direction.route_direction_name
                                                          from school_route 
                                                          INNER JOIN rout_direction
                                                          on school_route.direction_id = rout_direction.id
                                                          where school_route.school_id = ". $school_id;
                                                 
                                                   
                                                 //   echo $sql;
                                                    
                                                    $result = mysqli_query($conn, $sql);

                                                    while($row = mysqli_fetch_assoc($result)) {
                                                        ?>

                                                        <tr>
                                                            <td>
                                                                <?php echo $row["id"]; ?>
                                                            </td>

                                                            <td>
                                                                <?php echo $row["route_Name"]; ?>
                                                            </td>
                                                            
                                                            
                                                            <td>
                                                                <?php echo $row["route_direction_name"]; ?>
                                                            </td>

                                                            <td>
                                                                <?php echo $row["school_id"]; ?>
                                                            </td>
                                                            
                                                            <td><a href="editroute.php?routeid=<?php echo $row["id"]; ?>"><button 
                                                                        type="button" class="btn btn-sm btn-success" >Edit Route</button></a>
                                                                  
<!--                                                                <a href="addpoint.php?routeid=<?php //echo $row["id"]; ?>"><button 
                                                                        type="button" class="btn btn-sm btn-success" >Add Point</button></a>-->
                                                                        
                                                                <a href="cloneroute.php?routeid=<?php echo $row["id"]; ?>&#38;routename='<?php echo $row["route_Name"]; ?>'&#38;direction_id=<?php echo $row["direction_id"]; ?>" onclick="return  confirm('Are you sure you want to clone Route ?')">
                                                                   <button type="submit" class="btn btn-sm btn-success" name="add">Clone Route in Reverse Direction</button></a>
                                                            </td>

                                                        </tr>
                                                        <?php
                                                    }
                                                ?>
                                            </tbody>
                                        </table>

    

            </div> <!-- cd-table-wrapper -->
        </div> <!-- cd-table-container -->

        <em class="cd-scroll-right"></em>
    </div> <!-- cd-table -->
</section>
        
 
 <!-- Footer -->
<div class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <!-- Img ICOSOL -->
                <div class="img">
                    <img src="img/Brand.png" alt="brand">
                </div>
            </div>
            <div class="col-6 text-right">
                <p class="copyright">
                    Copyright&copy;2018 by <span class="text-uppercase">icosol</span>
                </p>
            </div>
        </div>
    </div>
</div>

 <!-- jQuery JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>