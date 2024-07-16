<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form_Data's</title>
    <style>
        a{
            text-decoration: none;
            color: black;
        }
        button
        {
            background-color: burlywood;
        }
    </style>
</head>
<body>
    
<h1>STUDENT DETAILS</h1>

<table border="1" cellpadding ="20">
    <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Roll No</th>
    <th>Gender</th>
    <th>Address</th>
    <th>City</th>
    <th>Mobile No</th>
    <th>Email</th>
    <th>Standard</th>
    <th>Section</th>
    <th>Update / Delete</th>
    </tr>

    <?php

    include("config.php");
    $sql = "SELECT * FROM students";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_assoc($result))
        {
            echo "<tr>";
            echo "<td id='ID'>" . $row['ID'] ."</td>";
            echo "<td>" . $row['NAME']."</td>";
            echo "<td>" . $row['ROLL_NO']."</td>";
            echo "<td>" . $row['GENDER']."</td>";
            echo "<td>" . $row['ADDRESS']."</td>";
            echo "<td>" . $row['CITY']."</td>";
            echo "<td>" . $row['MOBILE_NO']."</td>";
            echo "<td>" . $row['EMAIL']."</td>";
            echo "<td>" . $row['STANDARD']."</td>";
            echo "<td>" . $row['SECTION'] ."</td>";
            echo "<td> 
            <button><a href='update_form.php?ID=".$row['ID']."'>update</a></button>
            <button onclick='delete1(".$row['ID'].")'><a>delete</a></button>
            </td>";
            echo "</tr>";
        }
    }
    ?>
</table>

</body>
</html>


<script>

    function delete1(Id)
    {
        
        var add = "delete_student.php?ID=";
        add = add + Id;
        if(confirm("Are you sure If You Want To Delete This record"))
        {
            console.log(add);
            window.location.href = add;
        }
    }

</script>

