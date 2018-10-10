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


  $studentid = $_GET['studentid'];
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
        
        label{
            display: inline-block;
            width: 140px;
            text-align: right;
        }
        
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
    
              <form class="form-horizontal" role="form"  method="post" action="insertstudentroute.php?studentid=<?php echo $studentid ; ?>" enctype="multipart/form-data">
                                          <table id="simple-table" style="width:100%;">                                        
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label no-padding-right " for="form-field-1">Pickup Route</label>
                                                              <div class="col-xs-12 col-sm-9">
                                                                <?php  
                                                                
                                                                $sql = "select * from school_route 
                                                                        where school_id = $school_id
                                                                        and direction_id = 1" ;
                                                                
                                                                $result = mysqli_query($conn, $sql);
                                                                 ?>
                                                               
                                                                  <select id="pickup_route" name="pickup_route" style="width:350px;height:40px" required>
                                                                      <option></option>
                                                                    <?php while($row = mysqli_fetch_assoc($result)) {
                                                                     ?>
                                                                    <option value="<?php echo $row['id'] ; ?>"><?php echo $row['route_Name'] ; ?></option>
                                                                    <?php
                                                            
                                                                    }
                                                                ?>

                                                                </select>
                                                                  
                                                              </div>
                                                            
                                                        </div>
                                                    </td>

                                                          <td>
                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label no-padding-right " for="form-field-1">Pickup Points</label>
                                                                <div class="col-xs-12 col-sm-9">
 
                                                       <select id="pickup_points" required name="pickup_points" style="width:350px;height:40px" disabled>
                                                                        
                                                                         <option></option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </td>

                                                    </tr>
													
						    <tr>
                                                        <td>
                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label no-padding-right " 
                                                                       for="form-field-1">DropOff Route</label>
                                                            <div class="col-xs-12 col-sm-9">
                                                                
                                                                 <?php  
                                                                
                                                                     $sql = "select * from school_route 
                                                                        where school_id = $school_id
                                                                        and direction_id = 2" ;
                                                                     
                                                                     $result = mysqli_query($conn, $sql);
                                                                 ?>
                                                                
								<select id="dropoff_route" name="dropoff_route" style="width:350px;height:40px" required>
                                                                    <option></option>
                                                                    <?php while($row = mysqli_fetch_assoc($result)) {
                                                                     ?>
                                                                    <option value="<?php echo $row['id'] ; ?>"><?php echo $row['route_Name'] ; ?></option>
                                                                    <?php
                                                            
                                                                    }
                                                                ?>
                                                                </select>					  
                                                                </div>
                                                            </div>
                                                        </td>
                                                        
                                                        <td>
                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label no-padding-right " 
                                                                       for="form-field-1">DropOff Points</label>
                                                            <div class="col-xs-12 col-sm-9">

                                                                <select id="dropoff_points" name="dropoff_points" disabled style="width:350px;height:40px" required>
                                                                   
                                                                    <option></option>
                                                                </select>					  
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
																			
                                                    <tr>
                                                        <td>
                                                            <div class=" form-group col-xs-7 col-md-8 col-md-offset-4 col-sm-8">
                                                                 <button type="submit" class="btn btn-sm btn-success" name="add">
                                                                   Save
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
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>

 $(document).ready(function (){
	 
	$('#pickup_route').change(function (){
		
		var routeid = $('#pickup_route').val();

	        $.ajax({
                          type: "GET",
			  url: "ajaxdata.php",
			  data: {'routeid': routeid},
			  success: function (data) {
                              
                              alert(data);
                             
                          $('select[name="pickup_points"]').prop("disabled", false);
                          $('select[name="pickup_points"]').html(data);
							
                           }
			});
	
    }); 
	 
 });
 
  
</script>


<script>

 $(document).ready(function (){
	 
	$('#dropoff_route').change(function (){
		
		var routeid = $('#dropoff_route').val();

	        $.ajax({
                          type: "GET",
			  url: "ajaxdata.php",
			  data: {'routeid': routeid},
			  success: function (data) {
                              
                              alert(data);
                             
                          $('select[name="dropoff_points"]').prop("disabled", false);
                          $('select[name="dropoff_points"]').html(data);
							
                           }
			});
	
    }); 
	 
 });
 
  
</script>
</body>
</html>

