<?php

include("dbconn.php"); 

//$admin_id;
//$admin_type;
//$school_id;
session_start();

//$_SESSION['admin_id'];
//$_SESSION['type'];
//$_SESSION['school_id'];

if (empty($_SESSION['admin_id'] || $_SESSION['admin_type'] || $_SESSION['school_id']))
{
    header("Location:loginpage.php");
} else {
       $admin_id = $_SESSION['admin_id'];
       $admin_type = $_SESSION['admin_type'];
       $school_id = $_SESSION['school_id'];
}



if (isset($_POST['add'])) {

    $route_name = $_POST['route_name'];
    $route_direction = $_POST['route_direction'];
   
    $sql = "insert into school_route (school_id, direction_id, bus_id, route_Name, qr_code, qr_img_url) values ($school_id, $route_direction, 1, '$route_name', ' ', ' ')";
    
    if (mysqli_query($conn, $sql)) {
        $last_id = mysqli_insert_id($conn);
        echo $last_id;
            header("Location:routes.php");
    } else {
       // echo "Error: " . $sql . "<br>" . mysqli_error($conn);
          echo "Error: Incorrect data please try again";
    }
}
?>


   