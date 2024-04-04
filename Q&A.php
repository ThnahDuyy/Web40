<?php include_once "header.php"; ?>
<?php include_once "config.php"; ?>
<style>
  /* CSS code */
  .container-fluid {
    padding: 20px;
  }

  .search-container {
    display: flex;
    align-items: center;
    margin-bottom: 20px;
  }

  .search-container p {
    margin-right: 10px;
    font-size: 18px;
  }

  .table-container {
    width: 100%;
  }

  .table {
    width: 100%;
    border-collapse: collapse;
  }

  .table th,
  .table td {
    text-align: center;
  }

  .table th {
    padding: 8px;
    border: 1px solid #ddd;
  }

  .table td {
    padding: 8px;
    border: 1px solid #ddd;
  }

  .logo {
    text-align: center;
    margin-bottom: 20px;
  }

  .logo img {
    width: 200px;
    height: auto;
    cursor: pointer;
  }

  .btn {
    color: white;
  }

  .add-new-container {
    float: right;
    margin-bottom: 10px;
  }
</style>
<div class="logo">
  <a href="Home.php">
    <img src="HatchfulExport-All/FGW_logo_d.jpg" alt="Logo">
  </a>
</div>
<div class="container">
  <div id="clock"></div>
  <br />
  <div class="search-container">
    <p><b>Search Student:</b></p>
    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Enter student name...">
  </div>

  <div class="main-function">
    <div class="add-new-container">
      <button onclick="window.location='CreateStaff.php'" class="btn add-new" type="button" data-toggle="tooltip" data-placement="top" title="Add Student">
        <i class="fas fa-user-plus" aria-hidden="true"></i>Add Student
      </button>
    </div>
    <div style="clear:both;"></div>
  </div>
  <div class="table-container">
    <table class="table table-bordered" id="myTable">
      <thead>
        <tr>
          <th>Full Name</th>
          <th>Gender</th>
          <th>Date of Birth</th>
          <th>Address</th>
          <th>Phone Number</th>
          <th>Email</th>
          <th>Manage</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * FROM tbl_account WHERE role = 1";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <tr>
              <td><?php echo $row["fullname"] ?></td>
              <td><?php echo $row["gender"] ?></td>
              <td><?php echo $row["date_of_birth"] ?></td>
              <td><?php echo $row["address"] ?></td>
              <td><?php echo $row["phone"] ?></td>
              <td><?php echo $row["email"] ?></td>
              <td>
                <div class="text-center">
                  <button class="btn btn-primary btn-sm edit" type="button" onclick="window.location.href='editstaff.php?id=<?php echo $row['account_Id']; ?>'">
                    <i class="fas fa-edit"></i>Edit
                  </button>
                  <a href="?function=del&id=<?php echo $row["account_Id"]; ?>" onclick="return deleteConfirm()" class="btn btn-danger btn-sm">
                    <span class="fas fa-trash"></span>Delete
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
</div>

<?php include_once "footer.php"; ?>
<script type="text/javascript" src="js/main.js"></script>
<script>
  function deleteConfirm() {
    return confirm("Are you sure you want to delete this record?");
  }
</script>
