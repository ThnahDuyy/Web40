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

    th,
    td {
      padding: 12px 15px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    th {
      background-color: #333;
      color: #fff;
    }

    .button {
      background-color: royalblue;
      color: white;
      padding: 8px 12px;
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
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <!-- Your PHP code to populate the table with contributions goes here -->
          <?php
          // Sample PHP code to populate the table with contributions
          // Replace this with your actual PHP code to fetch data from database and populate the table
          for ($i = 0; $i < 5; $i++) {
            echo "<tr>";
            echo "<td>Full Name</td>";
            echo "<td>Article Title</td>";
            echo "<td>Academic Year</td>";
            echo "<td>Image</td>";
            echo "<td>Date Submitted</td>";
            echo "<td><button class='button'>Add</button> <button class='button' onclick='deleteRow(this)'>Delete</button></td>"; // Buttons to add new item and delete row
            echo "</tr>";
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
  <?php include_once "footer.php" ?>
  <script>
    // Function to delete row
    function deleteRow(btn) {
      var row = btn.parentNode.parentNode;
      row.parentNode.removeChild(row);
    }
  </script>
</body>

</html>
