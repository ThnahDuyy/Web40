<!DOCTYPE html>
<html>

<head>

  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
    }

    h3 {
      color: #333;
      text-align: center;
    }

    form {
      background-color: #fff;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.3);
      max-width: 500px;
      margin: 0 auto;
      margin-top: 100px;
    }

    label {
      display: block;
      margin-bottom: 10px;
      font-weight: bold;
      color: #555;
    }

    input[type='text'],
    input[type='email'],
    select,
    textarea {
      padding: 10px;
      width: 100%;
      border-radius: 5px;
      border: 1px solid #ccc;
      box-shadow: inset 0px 2px 5px rgba(0, 0, 0, 0.1);
      font-size: 16px;
      margin-bottom: 20px;
    }

    input[type='date'] {
      width: calc(100% - 22px);
    }

    input[type='file'] {
      margin-bottom: 20px;
    }

    .preview-image {
      max-width: 100%;
      margin-top: 10px;
    }

    .error-message {
      color: red;
    }
  </style>

  <script>
    function validateForm() {
      var fullname = document.getElementById('fullname').value;
      var gender = document.getElementById('gender').value;
      var department = document.getElementById('department').value;
      var birthdaytime = document.getElementById('birthdaytime').value;
      var address = document.getElementById('address').value;
      var phonenumber = document.getElementById('phonenumber').value;
      var email = document.getElementById('email').value;
      var errorMessages = '';

      if (fullname === '') {
        errorMessages += 'Please enter your full name.\n';
      }
      if (gender === '-- Choose Gender --') {
        errorMessages += 'Please select your gender.\n';
      }
      if (department === '-- Choose work --') {
        errorMessages += 'Please select your department.\n';
      }
      if (birthdaytime === '') {
        errorMessages += 'Please enter your date of birth.\n';
      }
      if (address === '') {
        errorMessages += 'Please enter your address.\n';
      }
      if (phonenumber === '') {
        errorMessages += 'Please enter your phone number.\n';
      }
      if (email === '') {
        errorMessages += 'Please enter your email.\n';
      }

      if (errorMessages !== '') {
        alert(errorMessages);
        return false;
      }

      return true;
    }
  </script>
</head>

<body>
  <?php include_once "header.php";
  include_once("config.php");

  if (isset($_POST["btnAdd"])) {
    $fullname = $_POST["fullname"];
    $gender = $_POST['gender'];
    $department = $_POST['department'];
    $birthdaytime = $_POST['birthdaytime'];
    $address = $_POST['address'];
    $phonenumber = $_POST['phonenumber'];
    $email = $_POST['email'];
    $err = "";

    $sqlstring = "INSERT INTO tbl_account (fullname, gender, department_Id, role, date_of_birth, address,phone,email,password) VALUES ('$fullname','$gender','$department','0','$birthdaytime','$address','$phonenumber','$email','e10adc3949ba59abbe56e057f20f883e')";
    if (mysqli_query($conn, $sqlstring)) {
      echo "<script>
      $(document).ready(function() {
      swal.fire({
        title: 'Susscess!',
        text: 'Add susscess',
        icon: 'susscess',
        button: 'OK',
      }).then(function() {
        window.location.href = 'stafflist.php';
      });
      });
      </script>";

    } else {
      echo "<script>
      $(document).ready(function() {
      swal.fire({
        title: 'Error!',
        text: 'Add Fail',
        icon: 'error',
        button: 'OK',
      });
      </script>";
    }
  }
  ?>

  <form action="" method="post" onsubmit="return validateForm()">
    <h3>Create Account</h3>
    <label for="fullname">Full Name:</label>
    <input type="text" id="fullname" name="fullname" required placeholder="Enter full name..." />
    <div class="form-group col-md-12">
      <label for="exampleSelect1" class="control-label">Gender</label>
      <select class="form-control" name="gender" id="gender">
        <option>-- Choose Gender --</option>
        <option>Male</option>
        <option>FeMale</option>
        <option>Other</option>
      </select>
    </div>
    <div class="form-group col-md-12">
      <label for="exampleSelect1" class="control-label">Work</label>
      <select class='form-control' name="work" id="department">
        <option>-- Choose work --</option>
        <?php
        $sqlstring = "SELECT * from tbl_department";
        $result = mysqli_query($conn, $sqlstring);
        while ($row = mysqli_fetch_array($result)) {
        ?>
          <option value="<?php echo $row["department_Id"]; ?>">
            <?php echo $row["departmentName"]; ?></option>
        <?php
        }
        ?>
      </select>
    </div>
    <div class="form-group col-md-12">
      <label for="birthdaytime">Date of birth:</label>
      <input type="date" id="birthdaytime" name="birthdaytime" />
    </div>
    <div class="form-group col-md-12">
      <label for="address">Address:</label>
      <input type="text" id="address" name="address" required placeholder="Enter address..." />
    </div>
    <div class="form-group col-md-12">
      <label for="phonenumber">Phone number:</label>
      <input type="text" id="phonenumber" name="phonenumber" required placeholder="Enter phone number..." />
    </div>
    <div class="form-group col-md-12">
      <label for="email">Email:</label>
      <input type="email" width="1000px" id="email" name="email" required placeholder="Enter email..." />
    </div>

    <br />
    <input type="submit" class="btn btn-primary" name="btnAdd" value="Add" />
    <input type="button" class="btn btn-secondary" value="Cancel" onclick="window.location='stafflist.php'" />
  </form>
</body>

</html>
<?php include_once "footer.php" ?>
