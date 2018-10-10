 <select>
    <option>choose direction</option>
    <option value="1">to school</option>
    <option value="2">to home</option>
</select>

///////////////////////////////////////////////////////

                                            <tbody>
                                                <?php
                                                   
                                                    
                                                    $result = mysqli_query($conn, $sql);

                                                    while($row = mysqli_fetch_assoc($result)) {
                                                        ?>

                                                     <tr>
                                                            <td>
                                                                <?php echo $row["id"]; ?>
                                                            </td>
                                                          
                                                            <td>
                                                                <?php echo $row["gda_lat"]; ?>
                                                            </td>
                                                            
                                                            <td>
                                                                <?php echo $row["gda_lng"]; ?>
                                                            </td>
                                                              <td>
                                                                <?php echo $row["gda_code"]; ?>
                                                            </td>

                                                     </tr>
                                                        <?php
                                                    }
                                                ?>
                                            
                                            </tbody>
//////////////////////////////////////////////////////////////////////////////

            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            $extensions_arr = array("jpg","jpeg","png","gif");
            
             if( in_array($imageFileType,$extensions_arr) ){
                move_uploaded_file($_FILES['student_image']['tmp_name'],$target_dir.$name);
             }
             
/////////////////////////////////////////////////////////////////////////////////////////

$link = mysqli_connect('127.0.0.1', 'my_user', 'my_pass', 'my_db');
mysqli_query($link, "INSERT INTO mytable (1, 2, 3, 'blah')");
$id = mysqli_insert_id($link);
See mysqli_insert_id().

///////////////////////////////////////////////////////////////////////////

 <style>
        
        label{
            display: inline-block;
            width: 140px;
            text-align: right;
        }
        
    </style>
          