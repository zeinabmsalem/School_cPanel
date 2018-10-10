<?php

include("dbconn.php"); 

$username = $_POST["username"]; 
$password = $_POST["password"]; 

$strId_sql = "select * from school_admin where BINARY  username ='".$username."' and BINARY password = '".$password."'" ;
echo $strId_sql;
$strId_result = mysqli_query($conn, $strId_sql);

if(mysqli_num_rows($strId_result)==1)
{
			session_start();
			ob_start();
			$row=mysqli_fetch_array($strId_result,MYSQLI_ASSOC);

		 	$_SESSION['admin_id']=  $row["id"];
                         
                        $_SESSION['school_id']=  $row["school_id"];
                        
                        $_SESSION['admin_type']=  $row["admin_type"];

			header("Location: home.php");
					
			exit;
}
else
{
        $message="invaild username or password";
	    header("Location: loginpage.php?message=".$message);
	    exit;
}

?>

