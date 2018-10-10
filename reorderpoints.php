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
    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyA40FQ3bNtkaD5jf-Ir812aW8Czg4_GA58&libraries=drawing"></script>
    <!-- Style CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link href="css/bootstrapcss.css" rel="stylesheet">
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
    
</head>
<body>
    
    <div class="container">
        
          <table class="table table-striped table-bordered" id="tablelist">
                                          
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Point ID</th>
                                                    <th>Point GDA</th>

                                                </tr>
                                            </thead>

                                              <?php
                                                   
                                                  $sql = "select route_point.id, route_point.point_id, 
                                                           points.gda_code from route_point
                                                           INNER JOIN points
                                                           on points.id = route_point.point_id
                                                           where route_point.route_id = $routeid order by route_point.point_id";

                                                          $result = mysqli_query($conn, $sql);
                                                          $count=  mysqli_num_rows($result);
                                                          
                                                  ?>
                                                <tbody>
                                                            <?php 
                                                            if($count<1){}else
                                                            {
                                                                foreach ($result as $row) {
                                                                    ?>
                                                                    <tr id="<?php echo $row["id"]; ?>">
                                                                        <td><?php echo $row["id"]; ?></td>
                                                                        <td><?php echo $row["point_id"]; ?></td>
                                                                        <td><?php echo $row["gda_code"]; ?></td>
                                                                        <input type="hidden" value="<?php echo $row["id"]; ?>" id="item" name="item">
                                                                    </tr>
                                                                    <?php 
                                                                }
                                                            }
                                                            ?>
                                          </tbody>
                                        </table>
                                         <a href="editroute.php?routeid=<?php echo $routeid ; ?>"><button type="button" class="btn btn-sm btn-success">Reorder Points</button></a>
        
    </div>
    
     <!--jQuery JS--> 
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
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
          $.post("studentPosition.php",{value:parameters},function(result){
              alert(result);
          });
      }
  });
</script>
</body>
</html>
