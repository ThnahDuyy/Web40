<?php
include_once("config.php");

// Kiểm tra xem action và post_id có tồn tại không
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['post_id'])) {
  $post_id = $_GET['post_id'];
  // Thực hiện truy vấn để xóa feedback từ cơ sở dữ liệu
  $sql = "DELETE FROM tbl_feedback WHERE post_id='$post_id'";
  if (mysqli_query($conn, $sql)) {
    echo "<script>alert('Feedback deleted successfully.');</script>";
    // Chuyển hướng người dùng trở lại trang listfeedback.php sau khi xóa feedback
    echo "<script>window.location.href='listfeedback.php?id={$_GET['post_id']}';</script>";
  } else {
    echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
    // Nếu có lỗi xảy ra, cũng chuyển hướng người dùng trở lại trang listfeedback.php
    echo "<script>window.location.href='listfeedback.php?id={$_GET['post_id']}';</script>";
  }
} else {
  // Nếu không có action hoặc post_id, chuyển hướng người dùng trở lại trang listfeedback.php
  echo "<script>window.location.href='listfeedback.php?id={$_GET['post_id']}';</script>";
}
?>
