<?php header('Access-Control-Allow-Headers'); ?>
<?php header('Access-Control-Allow-Origin: *'); ?>
<?php header('Content-Type:charset=utf8'); ?>

<?php

include("dbconn.php"); 

$admin_id;
$admin_type;
$school_id;
session_start();


if (empty($_SESSION['admin_id'] && $_SESSION['admin_type'] && $_SESSION['school_id']))
{
    header("Location:loginpage.php");
} else {
       $admin_id = $_SESSION['admin_id'];
       $admin_type = $_SESSION['admin_type'];
       $school_id = $_SESSION['school_id'];
}

?>
 
<?php
//http://stackoverflow.com/questions/18382740/cors-not-working-php
if (isset($_SERVER['HTTP_ORIGIN'])) {
    header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Max-Age: 86400');    // cache for 1 day
}

// Access-Control headers are received during OPTIONS requests
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS");         

    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
        header("Access-Control-Allow-Headers:        {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

    exit(0);
}
?>
<!DOCTYPE html>
    <head>
        <meta charset="UTF-8">

        <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyA40FQ3bNtkaD5jf-Ir812aW8Czg4_GA58"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        
        <script src="js/jquery-3.3.1.min.js"></script>
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <!-- Bootstrap JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
       
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
  
  
  <form class="form-horizontal" role="form"  method="post">
                                            <table id="simple-table" style="width:100%;">                                        
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="form-group">
<!--                                                                <label class="col-sm-3 control-label no-padding-right " for="form-field-1" style="text-align: left;">Route Name</label>-->
                                                                <div class="col-xs-12 col-sm-9">
                                                                    <input type="text" name="search" id="search" style="width:350px;height:40px"/>
                                                                </div>
                                                            </div>
                                                        </td>

                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            <div class="form-group col-xs-7 col-md-8 col-md-offset-4 col-sm-8">
                                                                <input type="button" class="btn btn-sm btn-success" name="add" onclick="ajaxcall()" value="Add GDA">
                                                                
                                                                <!--<input type="button" value="Submit" onclick="ajaxcall()">-->
                                                                <div class="space-4"></div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>

                                            </table>

                                        </form>

  
<script>  
     
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
                        displaydata(data.lat, data.long);
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
        
        
    function displaydata(lat, long){
      
   }


</script> 


</body>
</html>