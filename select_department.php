<?php
// Kết nối tới cơ sở dữ liệu
include_once('config.php');

// Lấy dữ liệu từ bảng tbl_department
$sql = "SELECT * FROM tbl_department";
$result = mysqli_query($conn, $sql);

// Kiểm tra nếu có dữ liệu trả về từ truy vấn
if (mysqli_num_rows($result) > 0) {
    // Bắt đầu tạo select box
    echo '<select name="department" class="input100">';
    while ($row = mysqli_fetch_assoc($result)) {
        // Hiển thị tùy chọn cho từng phòng ban
        echo '<option value="' . $row['department_Id'] . '">' . $row['departmentName'] . '</option>';
    }
    // Kết thúc select box
    echo '</select>';
} else {
    // Nếu không có dữ liệu, bạn có thể hiển thị một thông báo hoặc xử lý khác tùy ý
    echo "No departments found";
}

// Giải phóng bộ nhớ
mysqli_free_result($result);

// Đóng kết nối
?>
