<?php include_once "header.php" ?>
<?php require_once "config.php"; ?>
<style>
  /* CSS styles */
  #clock {
    margin-bottom: 20px;
  }

  .search-container {
    display: flex;
    align-items: center;
    margin-bottom: 20px;
  }

  .search-container p {
    font-size: 18px;
  }

  .new-category-btn {
    background-color: royalblue;
    float: right;
    color: white;
    border: none;
    border-radius: 5px;
    padding: 10px 20px;
    font-size: 16px;
    cursor: pointer;
    margin-right: 10px;
    padding-bottom: 10px;
    margin: 0 0 20px;
  }

  .table-container {
    width: 100%;
  }

  .table {
    width: 100%;
    border-collapse: collapse;
  }

  .table-header th {
    text-align: center;
    padding: 8px;
    border: 1px solid #ddd;
  }

  .category-name,
  .manage-category {
    text-align: center;
    padding: 8px;
    border: 1px solid #ddd;
  }

  .manage-category {
    width: 30%;
  }

  .edit-category-btn,
  .delete-category-btn {
    padding: 5px 10px;
    margin-right: 5px;
    border-radius: 5px;
    cursor: pointer;
  }

  .edit-category-btn {
    background-color: #007bff;
    color: white;
  }
</style>
<div class="container">
  <div id="clock"></div>
  <br />
  <div class="search-container container">
    <p><b>Search Student:</b></p>
    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Enter student...">
  </div>

  <div class="main-function">
    <button onclick="window.location='sendMail.php'" class="new-category-btn btn btn-primary" type="button"
      data-toggle="tooltip" data-placement="top" title="Add category">
      <i class="fas fa-plus" aria-hidden="true"></i> Add New Student
    </button>
  </div>

  <div class="table-container">
    <table class="table table-bordered" id="myTable">
      <thead>
        <tr class="table-header">
          <th width="50%">Name</th>
          <th width="30%">Manage</th>
        </tr>
      </thead>
      <tbody>
        <?php
        include_once "config.php";

        if (isset($_GET["function"]) && $_GET["function"] == "del") {
          if (isset($_GET["id"])) {
            $id = $_GET["id"];
            $sq = "SELECT categoryName from tbl_category WHERE category_Id=?";
            $stmt = $conn->prepare($sq);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            $stmt->close();

            if ($result->num_rows > 0) {
              mysqli_query($conn, "DELETE FROM tbl_category WHERE category_Id='$id'");
              echo '<meta http-equiv="refresh" content="0;URL =categorylist.php"/>';
            }
          }
        }
        ?>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script>
          function deleteConfirm(categoryId) {
            Swal.fire({
              title: 'Are you sure?',
              text: "You won't be able to revert this!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
              if (result.isConfirmed) {
                window.location.href = `categorylist.php?function=del&id=${categoryId}`;
              }
            });
          }
        </script>

        <?php
        $sql = "SELECT * FROM tbl_category";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <tr>
              <td class="category-name">
                <?php echo $row["categoryName"] ?>
              </td>
              <td class="manage-category">
                <div class="text-center">
                  <button class="edit-category-btn btn btn-primary btn-sm" type="button"
                    onclick="window.location.href='editcategory.php?id=<?php echo $row['category_Id']; ?>'">
                    <i class="fas fa-edit"></i> Edit
                  </button>
                  <button class="delete-category-btn btn btn-danger btn-sm" type="button"
                    onclick="deleteConfirm(<?php echo $row['category_Id']; ?>)">
                    <span class="fas fa-trash"></span> Delete
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
