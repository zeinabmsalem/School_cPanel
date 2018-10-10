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

$routeid = $_GET['routeid'];

?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyA40FQ3bNtkaD5jf-Ir812aW8Czg4_GA58"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
     
      <!-- jQuery JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- Style CSS -->
    <link rel="stylesheet" href="css/style.css">
        <!-- Table -->
    <script src="js/modernizr.js"></script>

           <style>
           
        #map {
            height: 400px;
            width: 100%;
            background-color: grey;
         }
    input[type=text] {
                width: 200px;
                box-sizing: border-box;
                border: 2px solid #ccc;
                border-radius: 4px;
                font-size: 16px;
                background-color: white;
                background-position: 10px 10px; 
                background-repeat: no-repeat;
                padding: 12px 20px 12px 40px;
                -webkit-transition: width 0.4s ease-in-out;
                transition: width 0.4s ease-in-out;
                margin-left: 40px;
                margin-top: 30px;
            }
        input[type=text]:focus {
                width: 100%;
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

    
    <div id="map"></div>
    <script>
        
        var directionsService = new google.maps.DirectionsService();
        var directionsDisplay;
        var map;
        
        function initMap() {

            directionsDisplay = new google.maps.DirectionsRenderer();
            
            map = new google.maps.Map(document.getElementById('map'), {
                center: new google.maps.LatLng(26.820553, 30.802498000000014),
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                zoom: 5
            });
            directionsDisplay.setMap(map);

        }

        initMap();
  </script>
  
    
  <!-- Table and Add Button -->
<section class="table">
    <!-- Button Add -->

    <!-- Table Content -->
    <div id="cd-table">

        <div class="cd-table-container">
            <div class="cd-table-wrapper">
                
                
              <form class="form-horizontal" role="form" onsubmit="return ajaxdata();">
                                            <table id="simple-table" style="width:100%;">                                        
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label no-padding-right " for="form-field-1" style="text-align: left;">GDA Name</label>
                                                                <div class="col-xs-12 col-sm-9">
                                                                    <input type="text" name="search" id="search" style="width:350px;height:40px"/>
                                                                </div>
                                                            </div>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                       <td>
                                                         <div class=" form-group col-xs-7 col-md-8 col-md-offset-4 col-sm-8">
<!--                                                                <button type="submit" class="btn btn-sm btn-success" name="add">
                                                                    Add GDA
                                                                </button>-->
                                                         <input type="button" class="btn btn-sm btn-success" name="add" onclick="ajaxcall()" value="Add GDA">
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

<script>
    
	
	function ajaxdata(){
		return false;
	}
        function ajaxcall(){  
        var location=document.getElementById("search").value;
        var url="http://192.169.190.14:8080/ziplineservicelayer/getZiplineDetails?zipline="+location;
        alert(url);  
        
           $.ajax({
                  type: "GET",
                  async: true,
                  dataType:"json",
                  cache: true,
                  url: url,
                  cache: true,
                   success: function (data) {  
                      alert("success");
                      alert(data.errorCode);
                      if(data.errorCode==1000)
                      {
                       displaydata(data.lat, data.long, data.ziplineCode);
                       
                      } else
                            {alert("No Location for This Data Plz Try again!!");
                            }                 
                    },
                    error: function (jqXHR,status,error) {
                        console.log("failure");
                    alert("error: "+ status);
                  }
                  
             });
        }
        
        
    function displaydata (lat, long, ziplineCode){
        
        var routeid = <?php  echo $routeid ;  ?>;
        
        window.location.href = "insertpoint.php?lat=" + lat + "&lng=" + long + "&routeid=" + routeid + "&gda_code= " + ziplineCode;
    }
            
</script> 


</body>
</html>