<?php
include("config.php");

if(isset($_GET['ID']))
{
    $ID = $_GET['ID'];

    $sql = "SELECT * FROM students WHERE ID = '$ID'";
    $result = mysqli_query($conn,$sql);
    
if($result ->num_rows>0)
{
      if($row = mysqli_fetch_assoc($result))
      {
        $NAME = $row['NAME'];
        $ROLL_NO = $row['ROLL_NO'];
        $GENDER = $row['GENDER'];
        $ADDRESS = $row['ADDRESS'];
        $CITY = $row['CITY'];
        $MOBILE_NO = $row['MOBILE_NO'];
        $EMAIL = $row['EMAIL'];
        $STANDARD = $row['STANDARD'];
        $SECTION = $row['SECTION']; 
      }
}
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Student Registration Form</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
</head>

<body style="background-color:#012641;">
  <div class="row">
    <div class="col-auto col-lg-3"></div>
    <div class="col-12 col-lg-6 col-md-10 col-sm-10">
      <div class="container mt-5 mb-4c pb-2 rounded" style="background-color:#60b3D1;">
        <center> <h2>Student Registration Form</h2></center>

        <form class="form-family" action="update_student.php?ID=<?php echo $ID; ?>" method="POST">

          <div class="form-group">
            <label class="form-lable" for="student_name">Student Name</label>
            <input type="text" class="form-control" id="student_name" name="student_name" value="<?php echo $NAME; ?>"/>
            <p class="error-message text-danger" id="name-error"></p>
          </div>

          <div class="form-group mb-3">
            <label class="form-lable" for="roll_no">Roll No</label>
            <input type="text" class="form-control" id="roll_no" name="roll-no" value="<?php echo $ROLL_NO; ?>"/>
            <p class="error-message text-danger" id="rollno-error"></p>
          </div>

          <div class="form-group mb-3">
            <label class="form-lable">Gender</label>
            <input class="form-check-input ms-2" type="radio" id="gender_male" name="gender" value="male" <?php if($GENDER === 'male') echo 'checked'; ?>/>
            <label class="form-lable" for="gender_male">Male</label>
            <input class="form-check-input ms-2" type="radio" id="gender_female" name="gender" value="female" <?php if($GENDER === 'female') echo 'checked'; ?>/>
            <label class="form-lable" for="gender_female">Female</label>
            <input class="form-check-input ms-2" type="radio" id="gender_others" name="gender" value="others" <?php if($GENDER === 'others') echo 'checked'; ?>/>
            <label class="form-lable" for="gender_others">Others</label>
            <p class="error-message text-danger" id="gender-error"></p>
          </div>

          <div class="form-group mb-3">
            <label class="form-lable" for="address">Address</label>
            <textarea id="address" class="form-control" name="Address" value="<?php echo $ADDRESS; ?>"></textarea>
          </div>
          
          <div class="form-group mb-3">
            <label class="form-lable" for="city">City</label>
            <input type="text" class="form-control" id="city" name="city" value="<?php echo $CITY; ?>" />
          </div>

          <div class="form-group mb-3">
            <label class="form-lable" for="mobile-no">Mobile No</label>
            <input type="text" id="mobile-no" class="form-control" name="mobile-no" placeholder="1234567890" value="<?php echo $MOBILE_NO; ?>"  />
            <p class="error-message text-danger" id="mobile-error" ></p>
          </div>

          <div class="form-group mb-3">
            <label class="form-lable" for="email">Email</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="janu123@gmail.com" value="<?php echo $EMAIL; ?>" />
            <p class="error-message text-danger" id="email-error"></p>
          </div>

          <div class="form-group mb-3">
            <label class="form-lable" for="standard">Standard</label>
            <select class="form-select" aria-label="Default select example" id="standard" name="standard">
              <option value="">Select_Standard</option>
              <option value="1">1 st</option>
              <option value="2">2 nd</option>
              <option value="3">3 rd</option>
              <option value="4">4 th</option>
              <option value="5">5 th</option>
            </select>
            <p class="error-message text-danger" id="standard-error"></p>
          </div>

          <div class="form-group mb-3">
            <label class="form-lable" for="section">Section</label>
            <select class="form-select" aria-label="Default select example" id="section" name="section">
              <option value="">Select_Section</option>
              <option value="A">A</option>
              <option value="B">B</option>
              <option value="C">C</option>
              <option value="D">D</option>
              <option value="E">E</option>
            </select>
            <p class="error-message text-danger" id="section-error"></p>
          </div>

          <div class="form-group mb-3">
            <div class="d-grid gap-2 mb-2">
              <button type="submit" name="update" id="Save" class="btn btn-success">Save</button>
            </div>
            <div class="d-grid gap-2">
              <button type="reset" name="Reset" id="Reset" class="btn btn-danger">clear</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="col-auto col-lg-3"></div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  <script>
    document.querySelector("form").addEventListener("submit", function(event) {

      document.querySelectorAll(".error-message").forEach(el => el.textContent = "");

      const studentName = document.getElementById("student_name").value.trim();
      const rollNo = document.getElementById("roll_no").value.trim();
      const mobileNo = document.getElementById("mobile-no").value.trim();
      const email = document.getElementById("email").value.trim();
      const std = document.getElementById("standard").value.trim();
      const sec = document.getElementById("section").value.trim();
      const gender_male = document.getElementById("gender_male").checked;
      const gender_female = document.getElementById("gender_female").checked;
      const gender_others = document.getElementById("gender_others").checked;

      const namecheck = /^[a-zA-Z]{3,25}$/;
      const rollNocheck = /^\d{6}$/;
      const mobileNocheck = /^\d{10}$/;
      const emailcheck = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

      if (!namecheck.test(studentName)) {
        document.getElementById("name-error").textContent = "Student name must be alphabetic and between 3 to 25 characters";
        event.preventDefault();
      }

      if (!rollNocheck.test(rollNo)) {
        document.getElementById("rollno-error").textContent = "Roll No must be a numeric value of exactly 6 digits";
        event.preventDefault();
      }

      if (!gender_male && !gender_female && !gender_others) {
        document.getElementById("gender-error").textContent = "Select the gender";
        event.preventDefault();
      }

      if (!mobileNocheck.test(mobileNo)) {
        document.getElementById("mobile-error").textContent = "Mobile No must be a numeric value of exactly 10 digits";
        event.preventDefault();
      }

      if (!emailcheck.test(email)) {
        document.getElementById("email-error").textContent = "Email must be in a valid format";
        event.preventDefault();
      }

      if (std === "") {
        document.getElementById("standard-error").textContent = "Select the standard";
        event.preventDefault();
      }

      if (sec === "") {
        document.getElementById("section-error").textContent = "Select the section";
        event.preventDefault();
      }
    });



    document.getElementById("Reset").addEventListener("click",function()
    {
      document.getElementById("name-error").textContent ="";
      document.getElementById("rollno-error").textContent ="";
      document.getElementById("gender-error").textContent = "";
      document.getElementById("mobile-error").textContent ="";
      document.getElementById("email-error").textContent = "";
      document.getElementById("standard-error").textContent = "";
      document.getElementById("section-error").textContent = "";
    })

  </script>
</body>
</html>
