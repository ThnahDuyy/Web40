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
    textarea {
      padding: 10px;
      width: 100%;
      border-radius: 5px;
      border: 1px solid #ccc;
      box-shadow: inset 0px 2px 5px rgba(0, 0, 0, 0.1);
      font-size: 16px;
      margin-bottom: 20px;
    }

    input[type='file'] {
      margin-bottom: 20px;
    }
    input[type='email'] {
    pointer-events: none;
    background-color: #f2f2f2;
}


    .preview-image {
      max-width: 100%;
      margin-top: 10px;
    }
  </style>
</head>

<body>
  <?php
  include_once "header.php";
  include_once("config.php");
  function bind_Department_List($conn, $selectedValue)
  {
    $sqlString = "SELECT * from tbl_department";
    $result = mysqli_query($conn, $sqlString);
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
      if ($row['department_Id'] == $selectedValue) {
        echo "<option value ='" . $row['department_Id'] . "' selected>" . $row['departmentName'] . "</option>";
      } else {
        echo "<option value='" . $row['department_Id'] . "'>" . $row['departmentName'] . "</option>";
      }
    }
  }
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sqlString = "SELECT * from tbl_account where account_Id='$id'";

    $result = mysqli_query($conn, $sqlString);
    $row = mysqli_fetch_array($result);

  ?>

    <form action="" method="post">
      <h3>Edite Account</h3>
      <div class="form-group col-md-12">
        <label for="fullname">Full Name:</label>
        <input type="text" id="fullname" name="fullname" value="<?php echo $row['fullname'] ?>" required />
      </div>
      <div class="form-group col-md-12">
        <label for="exampleSelect1" >Article Title:	</label>
        <input type="text" id="gender" name="gender" value="<?php echo $row['gender'] ?>" required />

        </select>
      </div>
      <div class="form-group col-md-12">
        <label for="exampleSelect1" class="control-label">Role:</label>
        <select class="form-control" name="role">
          <?php
          if ($row['role'] == '1') {
          ?>
            <option value="1" selected>Admin</option>
            <option value="0">Student</option>
          <?php
          } elseif ($row['role'] == '0') {
          ?>
            <option value="1">Admin</option>
            <option value="0" selected>Student</option>
          <?php
          } else {
          ?>
            <option value="1">Admin</option>
            <option value="0">Student</option>
          <?php
          }
          ?>
        </select>
      </div>
      <div class="form-group col-md-12">
        <label for="exampleSelect1" class="control-label">Work:</label>
        <select class='form-control' name="department">
          <option>-- Choose Work --</option>
          <?php bind_Department_List($conn, $row['department_Id']); ?>
        </select>
      </div>
      <div class="form-group col-md-12">
        <label for="Submission Date">Submission Date	:</label>
        <input type="date" id="Submission Date" name="Submission Date" value="<?php echo $row['date_of_birth'] ?>" />
      </div>
      <div class="form-group col-md-12">
        <label for="address">Address:</label>
        <input type="text" id="address" name="address" value="<?php echo $row['address'] ?>" required />
      </div>
      <div class="form-group col-md-12">
        <label for="phonenumber">Phone number:</label>
        <input type="text" id="phonenumber" name="phonenumber" value="<?php echo $row['phone'] ?>" required />
      </div>
      <div class="form-group col-md-12">
        <label for="email">Email:</label>
        <input type="email" width="1000px" id="email" name="email" value="<?php echo $row['email'] ?>" readonly />
      </div>

      <br />
      <input type="submit" class="btn btn-primary" name="btnUpdate" value="Update" />
      <input type="button" class="btn btn-secondary" value="Cancel" onclick="window.location='stafflist.php'" />
    </form>
  <?php
    if (isset($_POST["btnUpdate"])) {
      $fullname = $_POST["fullname"];
      $gender = $_POST['gender'];
      $role = $_POST['role'];
      $department = $_POST['department'];
      $birthdaytime = $_POST['birthdaytime'];
      $address = $_POST['address'];
      $phonenumber = $_POST['phonenumber'];
      $email = $_POST['email'];
      $err = "";

      $sqlstring = "UPDATE tbl_account SET
      fullname='$fullname',
      gender = '$gender',
      role = '$role',
      department_Id='$department',
      date_of_birth = '$birthdaytime',
      address = '$address',
      phone = '$phonenumber',
      email = '$email'
      where account_Id ='$id'";
      if (mysqli_query($conn, $sqlstring)) {
        echo "<script>
        $(document).ready(function() {
        swal.fire({
          title: 'Success!',
          text: 'Update Success',
          icon: 'success',
          button: 'OK',
        }).then(function() {
            window.location.href = 'stafflist.php';
        });
        });
    </script>";

      }
    }
  }
  ?>
</body>
<?php include_once "footer.php" ?>

</html>
