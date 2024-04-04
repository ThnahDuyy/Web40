<?php include_once "header.php" ?>
<?php require_once "config.php"; ?>


<style>
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

    /* CSS cho các mục */
    .menu-item {
        text-align: center;
        margin-bottom: 20px;
        font-size: 24px;
    }



    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    .container-fluid {
      padding: 20px;
    }

    #clock {
      font-size: 18px;
      margin-bottom: 20px;
    }

    .search-container {
      display: flex;
      align-items: center;
    }

    .search-container p {
      margin-right: 10px;
      font-size: 18px;
    }

    .search-container input[type="text"] {
      padding: 10px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }

    .add-new {
      background-color: royalblue;
      float: right;
      color: white;
      border: none;
      border-radius: 5px;
      padding: 10px 20px;
      font-size: 16px;
      cursor: pointer;
      margin-right: 10px;
    }

    .add-new:hover {
      background-color: #0056b3;
    }

    table {
      border-collapse: collapse;
      width: 100%;
      margin-top: 20px;
    }

    th, td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: center;
    }

    th {
      background-color: #f2f2f2;
    }

    .edit, .delete {
      padding: 5px 10px;
      border-radius: 5px;
      cursor: pointer;
      font-size: 14px;
    }

    .edit {
      background-color: #007bff;
      color: white;
      border: 1px solid #007bff;
      margin-right: 5px;
    }

    .delete {
      background-color: #dc3545;
      color: white;
      border: 1px solid #dc3545;
    }

    .edit:hover, .delete:hover {
      opacity: 0.8;
    }

  </style>
<body><div class="logo">
    <a href="Home.php">
      <img src="HatchfulExport-All/FGW_logo_d.jpg" alt="Logo">
    </a></body>

<div class="container">



<script>
function deleteConfirm() {
  return Swal.fire({
    title: 'Do you want to delete?',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!'
  }).then((result) => {
    if (result.isConfirmed) {
      return true;
    } else {
      return false;
    }
  });
}

function deleteConfirmAndDelete(departmentId) {
  deleteConfirm().then((confirmed) => {
    if (confirmed) {
      // If the user confirms deletion, execute the deletion action
      window.location.href = `department.php?function=del&id=${departmentId}`;
    }
  });
}
</script>
  <div class="container">
  <div id="clock"></div>
  <div class="search-container container">
    <p><b>Search work:</b></p>
    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Enter work...">
  </div>
  <br />
<div class="main-function">
        <div class="add-new-container">
            <button onclick="window.location='creareDepartment.php'" class="btn add-new" type="button" data-toggle="tooltip" data-placement="top" title="Add work">
                <i class="fas fa-user-plus" aria-hidden="true"></i> Add work
            </button>
        </div>
        <div style="clear:both;"></div> <!-- Clear floating elements -->
    </div>
  <div class="table-title">
    <div class="row"></div>
  </div>
  <table class="table table-bordered" id="myTable">
    <thead>
      <tr class="ex">
        <th width="50%">Name</th>
        <th width="30%">Manage</th>
      </tr>
    </thead>
    <tbody>

      <?php
              require_once "config.php";
              if (isset($_GET["function"]) && $_GET["function"] == "del" && isset($_GET["id"])) {
                  $department_id = $_GET["id"];
                  $sql = "DELETE FROM tbl_department WHERE department_Id='$department_id'";
                  if (mysqli_query($conn, $sql)) {
                      echo "<script>window.location.href = 'department.php';</script>";
                      exit();
                  } else {
                      echo "Error: " . mysqli_error($conn);
                  }
              }
              ?>

      <?php
      $sql = "SELECT * FROM tbl_department";
      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
      ?>
          <tr>
            <td style="text-align: center"><?php echo $row["departmentName"] ?></td>
            <td>
              <div class="text-center">
                <button class="btn btn-primary btn-sm edit" type="button" onclick="window.location.href='editdepartment.php?id=<?php echo $row['department_Id']; ?>'">
                  <i class="fas fa-edit"></i> Edit
                </button>
               <a href="#" onclick="deleteConfirmAndDelete(<?php echo $row['department_Id']; ?>)" class="btn btn-danger btn-sm">
    <i class="fas fa-trash"></i> Delete
</a>
              </div>
            </td>
          </tr>
      <?php
        }
      }
      ?>
    </tbody>
  </table>
</div>

<?php include_once "footer.php" ?>
<script type="text/javascript" src="js/main.js"></script>

