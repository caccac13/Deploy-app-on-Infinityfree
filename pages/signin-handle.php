<?php
$user = $_REQUEST['username'];
$pass = $_REQUEST['password'];
$phone = $_REQUEST['phone'];


include_once "../db/db.php";

$sql = "INSERT INTO `account`(`username`, `password`, `phone`) VALUES (?,?,?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $user, md5($pass), $phone);

if ($stmt->execute()) {
    echo "Success!";
    header("location: ../index.php?page=login");
} else {
    echo "Fail!";
}

$stmt->close();
$conn->close();
