<?php

$catId = $_POST['categoryid'];
$catName = $_POST['categoryname'];
$catDes = $_POST['description'];

include_once '../db/db.php';
// echo $catId;
$sql = "UPDATE `category` SET `categoryname` = ?, `description` = ? WHERE `categoryid` = ?";
$stmt = $conn->prepare($sql);

$stmt->bind_param("ssi", $catName, $catDes, $catId);

if ($stmt->execute()) {
    echo "<script>
            alert('Record updated successfully');
            window.location.href = '../index.php?page=category';
        </script>";
} else {
    echo "Error updating record: " . htmlspecialchars($stmt->error);
}

// Đóng câu lệnh và kết nối
$stmt->close();
$conn->close();
