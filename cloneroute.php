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
   $routename = $_GET['routename'];
   $route_direction = $_GET['direction_id'];

   $sql = "SELECT bus.id from bus where school_id = $school_id";
   $result = mysqli_query($conn, $sql);
   $row=mysqli_fetch_assoc($result);
   $bus_id = $row['id'];
   
   if($route_direction == 1){

   	$sql = "insert into school_route (school_id, direction_id, bus_id, route_Name, qr_code, qr_img_url)  values ($school_id, 2, $bus_id, $routename, ' ', ' ')";
       

   }else {

   		$sql = "insert into school_route (school_id, direction_id, bus_id, route_Name, qr_code, qr_img_url) values ($school_id, 1, $bus_id, $routename, ' ', ' ')";
   }
   
    if(mysqli_query($conn, $sql)=== TRUE){
       $lastroutetid = mysqli_insert_id($conn);
      // echo $lastroutetid;
    }
   

   	$sql = "select point_id, order_num from route_point where route_id = $routeid";

    $result = mysqli_query($conn, $sql);

    while ($row=mysqli_fetch_assoc($result)) {
    	$point_id = $row['point_id']; 
      $order_num = $row['order_num'];

    	$sql = "insert into route_point (point_id, route_id, order_num)
    	        values ($point_id, $lastroutetid, $order_num)";

    	mysqli_query($conn, $sql);
    }

        header("Location:routes.php");

   //  }else {

   //       echo "Error: Incorrect data please try again";
   // }

    
    

?>


   