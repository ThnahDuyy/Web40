<?php
include_once "header.php";
include_once("config.php");
?>
<style>
  /* Add this CSS to your existing stylesheet or create a new one */

.table-container {
  margin-top: 20px;
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

.table {
  width: 100%;
  border-collapse: collapse;
}

.table th,
.table td {
  padding: 8px;
  text-align: center;
}


.table tr:nth-child(even) {
  background-color: #f2f2f2;
}

.table tr:hover {
  background-color: #ddd;
}

.text-center {
  text-align: center;
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


</style>
<div class="logo">
    <a href="Home.php">
      <img src="HatchfulExport-All/FGW_logo_d.jpg" alt="Logo">
    </a>
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

function deleteConfirmAndDelete(staffId) {
  deleteConfirm().then((confirmed) => {
    if (confirmed) {
      // If the user confirms deletion, execute the deletion action
      window.location.href = `stafflist.php?function=del&id=${staffId}`;
    }
  });
}
</script>

<div class="container">
  <div id="clock"></div>
  <br />
  <div class="search-container container">
      <p class="timkiemnhanvien"><b>Search:</b></p>
  <br /><br />
  <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Enter User" />
  <i class="" aria-hidden="true"></i>
  </div>


<div class="main-function">
        <div class="add-new-container">
          <button onclick="window.location='CreateStaff.php'" class=" btn add-new" type="button" data-toggle="tooltip" data-placement="top" title="Add Account">
            <i class="fas fa-user-plus" aria-hidden="true"></i>Add User
          </button>
        </div>
        <div style="clear:both;"></div>
    </div>

  <div class="table-container">
    <table class="table table-bordered" id="myTable">
      <thead>
        <tr class="ex">
        <th width="15%">Full Name</th>
        <th width="7.5%">Gender</th>
        <th width="7.5%">Date of Birth</th>
        <th width="20%">Address</th>
        <th width="10%">Phone Number</th>
        <th width="20%">Email</th>
        <th width="20%">Manage</th>

        </tr>
      </thead>
      <tbody>
        <?php
          require_once "config.php";

          if (isset($_GET["function"]) && $_GET["function"] == "del" && isset($_GET["id"])) {
              $staff_id = $_GET["id"];
              $sql = "DELETE FROM tbl_account WHERE account_Id='$staff_id'";
              if (mysqli_query($conn, $sql)) {
                  echo "<script>window.location.href = 'stafflist.php';</script>";
                  exit();
              } else {
                  echo "Error: " . mysqli_error($conn);
              }
          }
          ?>

        <?php
        $sql = "SELECT * FROM tbl_account where role = 0";
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
                    <i class="fas fa-edit" ></i>Edit
                  </button>
                  <button class="btn btn-danger btn-sm" onclick="deleteConfirmAndDelete(<?php echo $row['account_Id']; ?>)">
                      <span class="fas fa-trash"></span>Delete
                  </button>

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

<?php include_once "footer.php" ?>
<script type="text/javascript" src="js/main.js"></script>
