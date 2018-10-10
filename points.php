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
 
    <!--start of table-->
    <div class="container">
<!--                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel">

                                    <div class="x_content">-->
                                       <table class="table table-striped table-bordered">
                                           
                                           <a href="addpoint.php"><button type="button" class="button button4">+</button></a>
                                            <thead>
                                                <tr>

                                                    <th>Point ID</th>
                                                    <th>Point GDA</th>
                                                    <th>Point Latitude</th>
                                                    <th>Point Longitude</th>
                                                    <th>Options</th>
                                                    


                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
                                                   $sql = "select * from points";
                                                  
                                                    $result = mysqli_query($conn, $sql);

                                                    while($row = mysqli_fetch_assoc($result)) {
                                                        ?>

                                                        <tr>
                                                            <td>
                                                                <?php echo $row["id"]; ?>
                                                            </td>

                                                            <td>
                                                                <?php echo $row["gda_code"]; ?>
                                                            </td>
                                                            
                                                            
                                                            <td>
                                                                <?php echo $row["gda_lat"]; ?>
                                                            </td>

                                                            <td>
                                                                <?php echo $row["gda_lng"]; ?>
                                                            </td>
                                                            
                                                            <td><a href=""><button 
                                                                        type="button" class="btn btn-sm btn-success" >Point</button></a>
                                                                        
                                                            </td>

                                                        </tr>
                                                        <?php
                                                    }
                                                ?>
                                            </tbody>
                                        </table>

    </div>
        
    
 <!-- jQuery JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>