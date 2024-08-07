<?php
$user = $_REQUEST['username'];

include_once 'db/db.php';

// Sử dụng câu lệnh chuẩn bị để tránh SQL Injection
$sql = "DELETE FROM `account` WHERE `username` = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $user);

if ($stmt->execute()) {
    echo "<script>
        alert('Account deleted successfully');
        window.location.href = 'index.php?page=account';
    </script>";
} else {
    echo "Error deleting record: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
