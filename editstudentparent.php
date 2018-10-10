<?php

include("dbconn.php"); 

$admin_id;
$admin_type;
$school_id;
session_start();

$parentid = $_GET['parentid'];
$parentemail = $_GET['parentemail'];
$parentphone = $_GET['parentphone'];


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

    <!-- Table and Add Button -->
<section class="table">
    <!-- Button Add -->

    <!-- Table Content -->
    <div id="cd-table">

        <div class="cd-table-container">
            <div class="cd-table-wrapper">
                
                
     <form class="form-horizontal" role="form"  method="post" action="insertparent.php" enctype="multipart/form-data">
                                            <table id="simple-table" style="width:100%;">                                        
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label no-padding-right " for="form-field-1" style="text-align: left;">Parent Email</label>
                                                                <div class="col-xs-12 col-sm-9">
                                                                    <input type="text" id="form-field-1" name="parent_email" 
                                                                           style="width:350px;height:40px" value="<?php echo $parentemail; ?>"/>
                                                                </div>
                                                            </div>
                                                        </td>

                                                    </tr>
													
						    <tr>
                                                        <td>
                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label no-padding-right " 
                                                                       for="form-field-1" style="text-align: left;">Parent Phone</label>
                                                            <div class="col-xs-12 col-sm-9">
                                                              <input type="text"  id="form-field-1" name="parent_phone" 
                                                                     style="width:350px;height:40px" value="<?php echo $parentphone; ?>"/>
													  
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
							
                                                     <tr>
                                                        <td>
                                                            <div class="form-group">
                                                            <div class="col-xs-12 col-sm-9">
                                                              <input type="hidden"  id="form-field-1" name="parentid" 
                                                                     style="width:350px;height:40px" value="<?php echo $parentid; ?>"/>
													  
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <td>
                                                            <div class=" form-group col-xs-7 col-md-8 col-md-offset-4 col-sm-8">
                                                                <button type="submit" class="btn btn-sm btn-success" name="add">
                                                                    Save Parent
                                                                </button>
                                                                <div class="space-4"></div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>

                                            </table>

                                        </form>
                
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