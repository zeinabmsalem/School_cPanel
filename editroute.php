<?php

include("dbconn.php"); 

$routeid = $_GET['routeid'];


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
    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyA40FQ3bNtkaD5jf-Ir812aW8Czg4_GA58&libraries=drawing"></script>
   <style>
           
        #map {
            height: 400px;
            width: 100%;
            background-color: grey;
        }
        
        .button {
        background-color: #4CAF50; 
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
    
    <link href="css/bootstrapcss.css" rel="stylesheet">
    
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
   
    
  <?php

     $sql = "select route_point.id, route_point.point_id, route_point.order_num, points.gda_lat, points.gda_lng, points.gda_code from route_point
                INNER JOIN points
                on points.id = route_point.point_id
                where route_point.route_id = $routeid order by route_point.order_num";

     $result = mysqli_query($conn, $sql);

?>
  
          <div class="container">
                                    <div id="map"></div>
                                           <script>

                                               var directionsService;
                                               var directionsDisplay;
                                               var map;
                                               var waypoints = [];
                                               var infoWindow;
                                               var i;
                                               var locations = [<?php
                                       if (mysqli_num_rows($result) > 0) {
                                           while ($row = mysqli_fetch_assoc($result)) {
                                               $name = $row['gda_code'];

                                               echo "[" . $row['gda_lat'] . "," . $row['gda_lng'] . ",'" . "$name" . "'],";
                                           }
                                       }
                                       ?>];

                                               function initMap() {
                                                   directionsService = new google.maps.DirectionsService();
                                                   directionsDisplay = new google.maps.DirectionsRenderer();
                                                   map = new google.maps.Map(document.getElementById('map'), {
                                                       center: new google.maps.LatLng(26.820553, 30.802498000000014),
                                                       mapTypeId: google.maps.MapTypeId.ROADMAP,
                                                       zoom: 5
                                                   });

                                                   directionsDisplay.setMap(map);
                                                   directionsDisplay.setOptions({suppressMarkers: true});
                                                   ////////////////////////////////////////////////////////////////

                                                   var request = {travelMode: google.maps.TravelMode.DRIVING};



                                                   for (i = 0; i < locations.length; i++) {

                                                       var origin = new google.maps.LatLng(locations[0][0], locations[0][1]);
                                                       var destination = new 
                                                       google.maps.LatLng(locations[locations.length - 1][0], locations[locations.length - 1][1]);

                                                       var myCenter = new google.maps.LatLng(locations[i][0], locations[i][1]);
                                                       var marker = new google.maps.Marker({
                                                           position: myCenter,
                                                           map: map,
                                                       });

                                                       infoWindow = new google.maps.InfoWindow();

                                                       infoWindow.setContent(locations[i][2]);
                                                       infoWindow.open(map, marker);

                                                       calculateRoute();

                                                   }
                                                   //end for loop
                                                   //////////////////////////////////////////////////////////////    
                                                   function windowinfo(marker, message) {

                                                       google.maps.event.addListener(marker, 'click', (function (marker, i) {
                                                           return function () {
                                                               infoWindow.setContent(message);
                                                               infoWindow.open(map, marker);
                                                           }
                                                       })(marker, i));

                                                   }
                                                   //////////////////////////////////////////////////////////////
                                                   function calculateRoute() {
                                                       if (i == 0)
                                                           request.origin = marker.getPosition();
                                                       else if (i == locations.length - 1)
                                                           request.destination = marker.getPosition();
                                                       else {
                                                           if (!request.waypoints)
                                                               request.waypoints = [];
                                                           request.waypoints.push({
                                                               location: marker.getPosition(),
                                                               stopover: true
                                                           });
                                                       }


                                                       directionsService.route(request, function (result, status) {
                                                           if (status == 'OK') {
                                                               directionsDisplay.setDirections(result);
                                                           }
                                                       });

                                                   }

                                               }


                                               initMap();
                                           </script>


    <!--////////////////////////////////////////////////////////////end of map-->
    
                                       <?php
                                       
                                          $sql = "select route_point.id, route_point.point_id, route_point.order_num, points.gda_lat, points.gda_lng, points.gda_code from route_point
                                          INNER JOIN points
                                          on points.id = route_point.point_id
                            where route_point.route_id = $routeid order by route_point.order_num";
                                        
                                                    $result = mysqli_query($conn, $sql);
                                                    $count=  mysqli_num_rows($result);
                                       
                                       ?>
                    
                
                                       <table class="table table-striped table-bordered" id="tablelist">
                                           <a href="addpoint.php?routeid=<?php echo $routeid; ?>"><button type="button" class="btn btn-sm btn-success">Add Point</button></a>
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Point ID</th>
                                                    <th>Point Latitude</th>
                                                    <th>Point Longitude</th>
                                                    <th>Point GDA</th>
                                                    <th>Point Order</th>

                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php 
                                                if($count<1){}else
                                                {
                                                    foreach ($result as $row) {
                                                        ?>
                                                        <tr id="<?php echo $row["id"]; ?>">
                                                            <td><?php echo $row["id"]; ?></td>
                                                            <td><?php echo $row["point_id"]; ?></td>
                                                            <td><?php echo $row["gda_lat"]; ?></td>
                                                            <td><?php echo $row["gda_lng"]; ?></td>
                                                            <td><?php echo $row["gda_code"]; ?></td>
                                                            <td><?php echo $row["order_num"]; ?></td>
                                                            <input type="hidden" value="<?php echo $row["id"]; ?>" id="item" name="item">
                                                        </tr>
                                                        <?php 
                                                    }
                                                }
                                                ?>
                                            </tbody>
    
                                        </table>

                                         <!--<a href="reorderpoints.php?routeid="><button type="button" class="btn btn-sm btn-success">Reorder Points</button></a>-->
    <a><button type="button" class="btn btn-sm btn-success" onclick="window.location.href = 'editroute.php?routeid=<?php echo $routeid ; ?>'">Save_Reordered_Points</button></a>

  </div> 
    

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

<!--jQuery JS--> 
<!--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>-->
<!--<!-- Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/jquery-ui.min_1.js"></script>

<script>
  var $sortable = $( "#tablelist > tbody" );
  $sortable.sortable({
      stop: function ( event, ui ) {
          var parameters = $sortable.sortable( "toArray" );
          $.post("pointPosition.php",{value:parameters},function(result){
              alert(result);
          });
      }
  });
</script>
</body>
</html>