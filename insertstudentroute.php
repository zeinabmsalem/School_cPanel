<?php

include("dbconn.php"); 

$admin_id;
$admin_type;
$school_id;
session_start();

$studentid = $_GET['studentid'];

if (empty($_SESSION['admin_id'] || $_SESSION['admin_type'] || $_SESSION['school_id']))
{
    header("Location:loginpage.php");
} else {
       $admin_id = $_SESSION['admin_id'];
       $admin_type = $_SESSION['admin_type'];
       $school_id = $_SESSION['school_id'];
}

    if (isset($_POST['add'])) {

    $pickup_route = $_POST['pickup_route'];
    $pickup_point = $_POST['pickup_points'];
   
    $dropoff_route = $_POST['dropoff_route'];
    $dropoff_point = $_POST['dropoff_points'];
    
   // echo $pickup_route. "/ ". $pickup_point . "/ ". $dropoff_route. "/ ". $dropoff_point;
   
    $sql="insert into route_point_student (route_point_id, student_id) values ($pickup_point, $studentid)";
         mysqli_query($conn, $sql);
         
    $sql="insert into route_point_student (route_point_id, student_id) values ($dropoff_point, $studentid)"; 
       
          if (mysqli_query($conn, $sql)) {
               header("Location:student.php");
          } else {
                    echo "Error: Incorrect data please try again";
                 }
}


?>






