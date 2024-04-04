<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contribution Management</title>
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
      width: 200px;
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
  <div class="header">
    <h2>Contribution Management</h2>
  </div>
  <div class="table-container">
    <table>
      <thead>
      <tr>
        <th>Full Name</th>
        <th>Article Title</th>
        <th>Academic Year</th>
        <th>Image</th>
        <th>Date Submitted</th>
      </tr>
      </thead>
      <tbody>
      <!-- Your PHP code to populate the table with contributions goes here -->
      </tbody>
    </table>
  </div>
</div>
<?php include_once "footer.php" ?>
</body>
</html>
