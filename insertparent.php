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


if (isset($_POST['add'])) {

    $parent_email = $_POST['parent_email'];
    $parent_phone = $_POST['parent_phone'];
    $parentid = $_POST['parentid'];
   
   $sql="update parent set
           parent_email= '$parent_email', 
           parent_phone = '$parent_phone'
           where parent.id = $parentid ";
             echo $sql;
    
     if (mysqli_query($conn, $sql)) {
               header("Location:student.php");
            } else {
             // echo "Error: " . $sql . "<br>" . mysqli_error($conn);
             echo "Error: Incorrect data please try again";
           }
}


?>
