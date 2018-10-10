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

</head>
<body>
    
              <form class="form-horizontal" role="form"  method="post" action="insertroute.php">
                                            <table id="simple-table" style="width:100%;">                                        
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label no-padding-right " for="form-field-1" style="text-align: left;">Route Name</label>
                                                        <div class="col-xs-12 col-sm-9">
                                                          <input type="text"  id="form-field-1" name="route_name" style="width:350px;height:40px" required/>
                                                                </div>
                                                            </div>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label no-padding-right " for="form-field-1" style="text-align: left;">Route Direction</label>
                                                            <div class="col-xs-12 col-sm-9">
                                                      <!--<input type="text"  id="form-field-1" name="route_direction" style="width:350px;height:40px"/>-->                                                                   <select name="route_direction" style="width:350px;height:40px" required>
                                                                    <option></option>
                                                                    <option value="1">to school</option>
                                                                    <option value="2">to home</option>
                                                                </select>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class=" form-group col-xs-7 col-md-8 col-md-offset-4 col-sm-8">
                                                                <button type="submit" class="btn btn-sm btn-success" name="add">
                                                                    Add Route
                                                                </button>
                                                                <div class="space-4"></div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>

                                            </table>

                                        </form>

 <!-- jQuery JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>