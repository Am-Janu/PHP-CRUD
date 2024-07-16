<?php

include("config.php");

if(isset($_POST['Save']))
{
    $ID;
    $NAME = $_POST['student_name'];
    $ROLL_NO = $_POST['roll-no'];
    $GENDER = $_POST['gender'];
    $ADDRESS = $_POST['Address'];
    $CITY = $_POST['city'];
    $MOBILE_NO = $_POST['mobile-no'];
    $EMAIL = $_POST['email'];
    $STANDARD = $_POST['standard'];
    $SECTION = $_POST['section'];


    $SQL = "INSERT INTO students (NAME, ROLL_NO, GENDER, ADDRESS, CITY, MOBILE_NO, EMAIL, STANDARD, SECTION)
    VALUES ('$NAME', '$ROLL_NO', '$GENDER', '$ADDRESS', '$CITY', '$MOBILE_NO', '$EMAIL', '$STANDARD', '$SECTION')";


    if(mysqli_query($conn,$SQL))
    {
        echo "Data Inserted Successfully...! <br>";
        header("Location: read_student.php");
    }
}
else
{
    echo "Form not Submited. Retry Again <br>";
}
?>


