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

        $student_name = $_POST['student_name'];
	$student_grade = $_POST['student_grade'];
	$parent_email = $_POST['parent_email'];
	$parent_phone = $_POST['parent_phone'];
        
        $student_image = isset($_FILES['student_image']['name']) ? $_FILES['student_image']['name']: '';
        if($student_image!=''){
           $target_dir = "upload/"; 
           $target_file = $target_dir . basename($_FILES["student_image"]["name"]);

        }
    
	$sql = "select parent.id from parent where parent.parent_email = '$parent_email' and parent.parent_phone = '$parent_phone' ";
        $result = mysqli_query($conn, $sql);
	
	
	if(mysqli_num_rows($result)==1){
		
	 $row = mysqli_fetch_assoc($result);
	 
	 $parent_id = $row['id'];
	
	 $sql = "insert into students (school_id, grade_id, student_name, parent_id, img_url) values ($school_id, $student_grade, '$student_name', $parent_id, '$target_file')";	
         echo $sql;
	
            if (mysqli_query($conn, $sql)) {
               header("Location:student.php");
            } else {
                echo "Error: Incorrect data please try again";
              }
        }else {
            
            $sql="insert into parent (school_id, parent_username, parent_email, parent_phone) values ($school_id, '$parent_email', '$parent_email', '$parent_phone')";
             echo $sql;
             
             if(mysqli_query($conn, $sql)=== TRUE){
              $lastparentid = mysqli_insert_id($conn);
             }
             
            echo $lastparentid;
            
            $sql="insert into students (school_id, grade_id, student_name, parent_id, img_url)
                    values ($school_id, $student_grade, '$student_name', $lastparentid, '$target_file')";
            
            echo $sql;
            
             if (mysqli_query($conn, $sql)) {
               header("Location:student.php");
            } else {
             // echo "Error: " . $sql . "<br>" . mysqli_error($conn);
             echo "Error: Incorrect data please try again";
           }
        }

}
?>


   