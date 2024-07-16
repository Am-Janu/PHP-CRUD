<?php
include("config.php");
if (isset($_POST['update']))
    {   
        $ID = $_GET['ID'];
        $NAME = $_POST['student_name'];
        $ROLL_NO = $_POST['roll-no'];
        $GENDER = $_POST['gender'];
        $ADDRESS = $_POST['Address'];
        $CITY = $_POST['city'];
        $MOBILE_NO = $_POST['mobile-no'];
        $EMAIL = $_POST['email'];
        $STANDARD = $_POST['standard'];
        $SECTION = $_POST['section']; 
    
        $SQL = "UPDATE students SET NAME = '$NAME' , ROLL_NO = '$ROLL_NO' , GENDER = '$GENDER' , ADDRESS = '$ADDRESS' , CITY = '$CITY' ,  MOBILE_NO = '$MOBILE_NO' , EMAIL = '$EMAIL' ,
          STANDARD = '$STANDARD' , SECTION = '$SECTION' WHERE ID = '$ID'";
    
        if(mysqli_query($conn,$SQL))
        {
            header("LOCATION: read_student.php");
        }
    
    }

?>