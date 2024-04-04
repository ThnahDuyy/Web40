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
        <th width="30%">Title</th>
        <th width="10%">Category</th>
        <th width="10%">Department</th>
        <th width="10%">Date Submitted</th>
        <th width="30%">Action</th>
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
