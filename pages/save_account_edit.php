<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Lấy dữ liệu từ biểu mẫu
    $usern = $_POST['usern'];
    $pass = $_POST['password'];
    $phone = $_POST['phone'];

    include_once '../db/db.php';

    // Sử dụng câu lệnh chuẩn bị để tránh SQL Injection
    $sql = "UPDATE `account` SET `password` = ?, `phone` = ? WHERE `username` = ?";
    $stmt = $conn->prepare($sql);
    
    // Kiểm tra lỗi khi chuẩn bị câu lệnh
    if ($stmt === false) {
        die('Prepare failed: ' . htmlspecialchars($conn->error));
    }
    
    // Liên kết tham số với câu lệnh chuẩn bị
    $stmt->bind_param("sss", md5($pass), $phone, $usern);
    
    // Thực thi câu lệnh
    if ($stmt->execute()) {
        echo "<script>
            alert('Record updated successfully');
            window.location.href = '../index.php?page=account';
        </script>";
    } else {
        echo "Error updating record: " . htmlspecialchars($stmt->error);
    }

    // Đóng câu lệnh và kết nối
    $stmt->close();
    $conn->close();
}
?>
