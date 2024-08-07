<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // echo '<pre>';
    // print_r($_GET);
    $itemname = $_GET['itemname'];
    $description = $_GET['description'];
    $unit = $_GET['unit'];
    $price = $_GET['price'];
    $img = $_GET['fileUpload'];
    $status_default = 1;
    $categoryid = $_GET['category'];


    include_once '../db/db.php';
    $sql = "INSERT INTO `item`(`itemname`, `description`, `unit`, `price`, `image`, `status`, `categoryid`)
    VALUES (?,?,?,?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssss", $itemname, $description, $unit, $price, $img, $status_default, $categoryid);
    if ($stmt->execute()) {
        echo "New record created successfully";
        header('location: ../?page=item');
    } else {
        echo "Error: ". $sql. "<br>". $conn->error;
    }
    $stmt->close();
    $conn->close();
   

}
