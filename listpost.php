<?php include_once "header.php"; ?>
<style>
  /* Add this CSS to your existing stylesheet or create a new one */

  .search-container {
    display: flex;
    align-items: center;
    margin-bottom: 20px;
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

  .add-post-container {
    float: right;
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
</style>
<script>
  function deletePost(postId) {
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
        // Redirect to delete action
        window.location.href = `listpost.php?function=del&id=${postId}`;
      }
    });
  }
</script>
<div class="logo">
    <a href="Home.php">
      <img src="HatchfulExport-All/FGW_logo_d.jpg" alt="Logo">
    </a>

<?php
if(isset($_GET['function']) && $_GET['function'] === 'del' && isset($_GET['id'])) {
    $postId = $_GET['id'];

    // Thực hiện truy vấn xoá bài đăng từ cơ sở dữ liệu
    $sql = "DELETE FROM tbl_post WHERE post_Id = $postId";

    if(mysqli_query($conn, $sql)){
        // Xoá thành công, chuyển hướng trở lại trang danh sách bài đăng
        echo "<script>
                Swal.fire({
                  title: 'Success!',
                  text: 'Post deleted successfully',
                  icon: 'success',
                  confirmButtonColor: '#3085d6',
                  confirmButtonText: 'OK'
                }).then((result) => {
                  if (result.isConfirmed) {
                    window.location.href = 'listpost.php';
                  }
                });
              </script>";
    } else{
        // Nếu có lỗi xảy ra trong quá trình xoá
        echo "<script>
                Swal.fire({
                  title: 'Error!',
                  text: 'Failed to delete post',
                  icon: 'error',
                  confirmButtonColor: '#3085d6',
                  confirmButtonText: 'OK'
                }).then((result) => {
                  if (result.isConfirmed) {
                    window.location.href = 'listpost.php';
                  }
                });
              </script>";
    }
}
?>
<div class="container">
  <div id="clock"></div>
  <br />
  <div class="search-container">
    <p class="timkiemnhanvien"><b>Search Post:</b></p>
    <br /><br />
    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Enter post..." />
    <i class="" aria-hidden="true"></i>
  </div>
  <div class="add-post-container">
    <button onclick="window.location='CreateFeedback.php'" class="btn add-new" type="button" data-toggle="tooltip" data-placement="top" title="Add Post">
      <i class="fas fa-user-plus" aria-hidden="true"></i>Add Post
    </button>
  </div>

  <div class="table-title">
    <div class="row"></div>
  </div>

  <table class="table table-bordered" id="myTable">
    <thead>
      <tr class="ex">
        <th width="25%">Title</th>
        <th>Department</th>
        <th>Student</th>
        <th>Create Date</th>
        <th>End Date</th>
        <th>End Comment</th>
        <th>Manage</th>
      </tr>
    </thead>

    <tbody>
      <?php
      include_once("config.php");
      $sql = "SELECT tbl_post.*, tbl_category.categoryName, tbl_department.departmentName
              FROM tbl_post
              INNER JOIN tbl_category ON tbl_post.category_Id = tbl_category.category_Id
              INNER JOIN tbl_department ON tbl_department.department_Id = tbl_post.department_Id ";
      $result = mysqli_query($conn, $sql);

      while ($row = mysqli_fetch_array($result)) {
      ?>
        <tr>
          <td><?php echo $row["title"] ?></td>
          <td><?php echo $row["departmentName"] ?></td>
          <td><?php echo $row["categoryName"] ?></td>
          <td><?php echo $row["date_create"] ?></td>
          <td><?php echo $row["date_ending"] ?></td>
          <td><?php echo $row["date_end_read"] ?></td>

          <td>
            <div class="text-center">
              <button class="btn btn-primary btn-sm edit" type="button" onclick="window.location.href='editpost.php?id=<?php echo $row['post_Id']; ?>'">
                <i class="fas fa-edit"></i> Edit
              </button>
              <button class="btn btn-danger btn-sm" onclick="deletePost(<?php echo $row['post_Id']; ?>)">
      <i class="fas fa-trash"></i> Delete
    </button>
            </div>
          </td>
        </tr>
      <?php
      }
      ?>
    </tbody>
  </table>
</div>

<?php include_once "footer.php"; ?>


<script type="text/javascript" src="js/main.js"></script>
