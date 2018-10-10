<?php

include("dbconn.php"); 


if(!empty($_GET['routeid'])){

   $routeid = $_GET['routeid'];
}

 $sql = "select route_point.id,  
         points.gda_code from route_point
         INNER JOIN points
         on points.id = route_point.point_id
         where route_point.route_id = $routeid";
                                                        
//echo $sql;
     $result = mysqli_query($conn, $sql);

     if(mysqli_num_rows($result)>0){

     	 echo '<option value="">Select point</option>';

     	 while($row = mysqli_fetch_assoc($result)){ 
            echo '<option value="'.$row['id'].'">'.$row['gda_code'].'</option>';
        }


     }


