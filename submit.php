<?php
// Thông tin kết nối cơ sở dữ liệu
$servername = "database-1.ct24eqwgwgba.ap-southeast-1.rds.amazonaws.com"; // Tên host của MySQL container
$username = "admin";
$password = "thienthuan";
$dbname = "tht";

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Lấy dữ liệu từ form
$name = $_POST['name'];
$age = $_POST['age'];

// Chuẩn bị và thực hiện câu lệnh SQL
$sql = "INSERT INTO users (name, age) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("si", $name, $age);

if ($stmt->execute()) {
    echo "Đăng ký thành công!";
} else {
    echo "Lỗi: " . $stmt->error;
}

// Đóng kết nối
$stmt->close();
$conn->close();
?>