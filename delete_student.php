<?php
include("config.php");
error_reporting(0);

if($_GET['ID'])
{  
    $row_id = $_GET['ID'];
    $sql = "DELETE FROM students WHERE ID = $row_id";
    mysqli_query($conn,$sql);
    header("Location: read_student.php");
}
else
{
    echo "Error : INVALID ID"; 
}
?>