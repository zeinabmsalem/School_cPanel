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

    <title>Document</title>
</head>
<body>

<section class="home">
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
                                                                    margin-right: 6px;">
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

    <!-- Button Menu -->
    <div class="btns-menu">
        <div class="container text-center">
            <div class="row">
                <!-- Btn Students -->
                <div class="col-sm-6 col-md-6 col-lg-4">
                    <a href="student.php">
                        <div class="box">
                            <div class="logo-heading">
                                <!-- Image -->
                                <div class="logo">
                                    <img src="img/student.svg" alt="students" class="img-fluid">
                                </div>
                                <!-- Heading -->
                                <div class="title">
                                    <h3>Students</h3>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- Btn Bus -->
                <div class="col-sm-6 col-md-6 col-lg-4">
                    <a href="#">
                        <div class="box">
                            <div class="logo-heading">
                                <!-- Image -->
                                <div class="logo">
                                    <img src="img/bus.svg" alt="bus" class="img-fluid">
                                </div>
                                <!-- Heading -->
                                <div class="title">
                                    <h3>Bus</h3>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- Btn Trips -->
                <div class="col-sm-6 col-md-6 col-lg-4">
                    <a href="#">
                        <div class="box">
                            <div class="logo-heading">
                                <!-- Image -->
                                <div class="logo">
                                    <img src="img/trips.png" alt="trips" class="img-fluid">
                                </div>
                                <!-- Heading -->
                                <div class="title">
                                    <h3>Trips</h3>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- Btn Routes -->
                <div class="col-sm-6 col-md-6 col-lg-4">
                    <a href="routes.php">
                        <div class="box">
                            <div class="logo-heading">
                                <!-- Image -->
                                <div class="logo">
                                    <img src="img/routes.svg" alt="routes" class="img-fluid">
                                </div>
                                <!-- Heading -->
                                <div class="title">
                                    <h3>Routes</h3>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- Btn Reports -->
                <div class="col-sm-6 col-md-6 col-lg-4">
                    <a href="#">
                        <div class="box">
                            <div class="logo-heading">
                                <!-- Image -->
                                <div class="logo">
                                    <img src="img/reports.svg" alt="reports" class="img-fluid">
                                </div>
                                <!-- Heading -->
                                <div class="title">
                                    <h3>Reports</h3>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                
                <!--Btn Points-->
                
                <!-- Btn Reports -->
                <div class="col-sm-6 col-md-6 col-lg-4">
                    <a href="#">
                        <div class="box">
                            <div class="logo-heading">
                                <!-- Image -->
                                <div class="logo">
                                    <img src="img/reports.svg" alt="reports" class="img-fluid">
                                </div>
                                <!-- Heading -->
                                <div class="title">
                                    <h3>Reports</h3>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- Btn Settings -->
                <div class="col-sm-6 col-md-6 col-lg-4">
                    <a href="points.php">
                        <div class="box">
                            <div class="logo-heading">
                                <!-- Image -->
                                <div class="logo">
                                    <img src="img/setting.svg" alt="settings" class="img-fluid">
                                </div>
                                <!-- Heading -->
                                <div class="title">
                                    <h3>Points</h3>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- jQuery JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>