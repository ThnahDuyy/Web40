<?php
session_start();
include_once("config.php");

// Kiểm tra xem người dùng đã đăng nhập chưa
if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
    exit(); // Dừng script nếu chưa đăng nhập
}

// Xử lý dữ liệu từ form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $feedback_content = $_POST["feedback_content"];
    $post_id = $_POST["post_id"];

    // Thêm feedback vào cơ sở dữ liệu
    $sql = "INSERT INTO tbl_feedback (post_id, feedback_content) VALUES ('$post_id', '$feedback_content')";
    mysqli_query($conn, $sql);

    // Chuyển hướng về trang hiển thị danh sách feedback
    header("Location: listfeedback.php?id=$post_id");
    exit(); // Dừng script sau khi chuyển hướng
}
?>
