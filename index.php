<?php
session_start();

// Kiểm tra nếu người dùng chưa đăng nhập
if (!isset($_SESSION['username'])) {
  $_SESSION['msg'] = "You must log in first";
  header('location: login.php');
}

// Kiểm tra nếu người dùng đã đăng xuất
if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['username']);
  header("location: login.php");
}

// Mở kết nối đến cơ sở dữ liệu
include_once("config.php");

// Kiểm tra vai trò của người dùng và lưu vào biến $role
if (isset($_SESSION["username"])) {
  $us = $_SESSION["username"];
  $sqlString = "SELECT * FROM tbl_account WHERE email= '$us'";
  $result = mysqli_query($conn, $sqlString);
  $row2 = mysqli_fetch_array($result);
  $role = $row2["role"];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Feedback Management</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f0f0f0;
      margin: 0;
      padding: 0;
    }
    /* CSS cho logo */
    .logo {
      text-align: center;
      margin-bottom: 20px;
    }
    .logo img {
      width: 200px; /* Kích thước của logo */
      height: auto;
      cursor: pointer;
    }
    /* Header */
    .header {
      background-color: #333;
      color: #fff;
      padding: 20px;
      text-align: center;
    }
    /* Button */
    .button {
      background-color: royalblue;
      color: white;
      padding: 10px 20px;
      text-align: center;
      text-decoration: none;
      font-size: 14px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }
    .button:hover {
      background-color: #1e90ff;
    }
    /* Form */
    .search-container {
      display: flex;
      justify-content: center;
      margin-bottom: 20px;
    }
    .search-container input[type=text] {
      width: 300px;
      padding: 10px;
      border-radius: 5px;
      border: 1px solid #ccc;
      box-sizing: border-box;
      margin-right: 10px;
    }
    /* Table */
    .table-container {
      margin: 0 auto;
      max-width: 900px;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }
    th, td {
      padding: 12px 15px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }
    th {
      background-color: #333;
      color: #fff;
    }
    .out-of-date {
      color: red;
      font-style: italic;
    }
  </style>
</head>
<body>
<div class="logo">
  <a href="Home.php">
    <img src="HatchfulExport-All/FGW_logo_d.jpg" alt="Logo">
  </a>
</div>
<?php include_once "header.php" ?>
<div class="container">
  <div id="clock"></div>
  <br />
  <div class="search-container">
    <p><b>Search Feedback:</b></p>
    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Enter feedback...">
  </div>
  <form action=""></form>
  <div class="table-title">
    <table id="myTable">
      <thead>
      <tr>
        <th width="30%">Post Title</th>
        <th width="10%">Feedback</th>
        <th width="10%">Student</th>
        <th width="10%">Work</th>
        <th width="10%">Day Submitted</th>
        <th width="30%">Actions</th>
      </tr>
      </thead>
      <tbody id="myTable">
      <?php
      if (isset($_SESSION["username"])) {
        $us = $_SESSION["username"];
        $sqlString = "SELECT * FROM tbl_account WHERE email= '$us'";
        $result = mysqli_query($conn, $sqlString);
        $row2 = mysqli_fetch_array($result);
        $department = $row2["department_Id"];
        $account = $row2["account_Id"];
      }
      if (isset($role) && $role != 1) { // Kiểm tra nếu không phải là admin
        // Show all posts, regardless of department
        $sql = "SELECT tp.*, tc.categoryName, td.departmentName
                    FROM tbl_post tp, tbl_category tc, tbl_department td
                    WHERE tp.category_Id = tc.category_Id
                      AND tp.department_Id = td.department_Id";
      } else {
        $sql = "SELECT tp.*, tc.categoryName, td.departmentName
                    FROM tbl_post tp, tbl_category tc, tbl_department td
                    WHERE tp.category_Id = tc.category_Id
                      AND tp.department_Id = td.department_Id
                      AND tp.department_Id = '$department'";
      }
      $result = mysqli_query($conn, $sql);
      while ($row = mysqli_fetch_array($result)) {
        ?>
        <tr>
          <td>
            <?php echo $row["title"] ?>
          </td>
          <td>
            <?php
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $timestamp = time() + 7 * 60 * 60;
            if (strtotime($row["date_ending"]) >= $timestamp) {
              ?>
              <button class="button" onclick="window.location.href='feedback.php?id=<?php echo $row['post_Id']; ?>'">
                Add Feedback
              </button>
              <?php
            } else {
              echo "<span class='out-of-date'>Out of date</span>";
            }
            ?>
          </td>
          <td>
            <?php echo $row["categoryName"] ?>
          </td>
          <td>
            <?php echo $row["departmentName"] ?>
          </td>
          <td>
            <?php echo $row["date_ending"] ?>
          </td>
          <td>
            <?php
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $timestamp = time() + 7 * 60 * 60;
            if (strtotime($row["date_end_read"]) >= $timestamp) {
              ?>
              <button class="button"
                      onclick="window.location.href='listfeedback.php?id=<?php echo $row['post_Id']; ?>'">
                Comment
              </button>
              <button class="button"
                      onclick="window.location.href='sendMail.php?id=<?php echo $row['post_Id']; ?>'">
                Mail
              </button>
              <?php
            } else {
              echo "<span class='out-of-date'>Out of date comment</span>";
            }
            ?>
          </td>
        </tr>
        <?php
      }
      ?>
      </tbody>
    </table>
  </div>
</div>
<div class="footer">
 </div>
<?php include_once "footer.php" ?>
<script type="text/javascript" src="js/main.js"></script>
</body>
</html>
