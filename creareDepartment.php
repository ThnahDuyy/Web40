<!DOCTYPE html>
<html>
<head>
  <title>Add Work</title>

  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f5f5f5;
      margin: 0;
      padding: 0;
    }

    .container {
      max-width: 600px;
      margin: 50px auto;
      padding: 20px;
      background-color: #fff;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
      text-align: center;
      color: #333;
    }

    label {
      display: block;
      margin-bottom: 10px;
      color: #333;
      font-size: 16px;
      font-weight: bold;
    }

    input[type='text'],
    input[type='submit'],
    input[type='button'] {
      width: calc(100% - 22px);
      padding: 10px;
      margin-bottom: 20px;
      border-radius: 5px;
      border: 1px solid #ccc;
      font-size: 16px;
      outline: none;
      box-sizing: border-box;
    }


  </style>
</head>
<body>
<?php include('header.php'); ?>
<div class="container">
  <form method="post" action="">
    <h1>Add work</h1>
    <label for="departmentName">Work Name:</label>
    <input type="text" name="departmentName" required placeholder="Enter name of work...">
    <input type="submit" class="btn btn-primary" name="submit" value="Add work">
    <input type="button" class="btn btn-secondary" value="Cancel" onclick="window.location='department.php'" />
  </form>
</div>

<?php
// Check if the form was submitted
if (isset($_POST['submit'])) {
  // Get the category name from the form
  $department_name = $_POST['departmentName'];

  // Include the database configuration file
  require_once "config.php";

  // Prepare the INSERT statement
  $sql = "INSERT INTO tbl_department (departmentName) VALUES ('$department_name')";

  if (mysqli_query($conn, $sql)) {
    echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>";
    echo "<script>
      Swal.fire({
        title: 'Success!',
        text: 'Work added successfully!',
        icon: 'success',
        confirmButtonText: 'OK'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = 'department.php';
        }
      });
    </script>";
  } else {
    echo "Error: " . mysqli_error($conn);
  }

  // Close the database connection
  mysqli_close($conn);
}
?>
<?php include('footer.php');?>
</body>
</html>
