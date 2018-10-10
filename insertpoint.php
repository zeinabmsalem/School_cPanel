<?php

include("dbconn.php"); 

//$admin_id;
//$admin_type;
//$school_id;
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
$lat = $_GET['lat'];
$lng = $_GET['lng'];
$gda_code = $_GET['gda_code'];

$sql = "select id from points where gda_lat = $lat and gda_lng = $lng";

$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result)==1){
		
   // $row = mysqli_fetch_assoc($result);
		
    header("Location:routes.php");

}else {
    
    $sql = "insert into points (gda_code, gda_lat, gda_lng) values ('$gda_code', '$lat', '$lng')";
 
    if(mysqli_query($conn, $sql)=== TRUE){
       $lastpointid = mysqli_insert_id($conn);
    }
     //echo $lastpointid;
    
    $sql= "SELECT max(order_num) as order_num from route_point WHERE route_id = $routeid";
    
    $result = mysqli_query($conn, $sql);
    $row=mysqli_fetch_assoc($result);
    $ordernum = $row['order_num']+1;

    
    $sql = "insert into route_point (point_id, route_id, order_num) 
            values ($lastpointid, $routeid, $ordernum)";
    
    if(mysqli_query($conn, $sql) === TRUE){
		
       header("Location:routes.php");
    }else {
             echo "Error: Incorrect data please try again";
          }
    
}
       
?>


   