<?php
$catId = $_REQUEST['id'];
echo $catId;

include_once 'db/db.php';

$sql = "DELETE FROM `category` WHERE `categoryid` = ?";
$stmt = $conn->prepare($sql);

$stmt->bind_param("i", $catId);


if ($stmt->execute()) {
    echo "<script>
        alert('Record deleted successfully');
        window.location.href = 'index.php?page=category';
    </script>";
} else {
    echo "Error deleting record: " . htmlspecialchars($stmt->error);
}

$stmt->close();
$conn->close();
