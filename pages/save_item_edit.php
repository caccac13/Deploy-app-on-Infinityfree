<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $itemid = $_REQUEST['itemid'];
    $itemname = $_REQUEST['itemname'];
    $description = $_REQUEST['description'];
    $unit = $_REQUEST['unit'];
    $price = $_REQUEST['price'];
    $img = $_REQUEST['fileUpload'];
    $status_default = 1;
    $categoryid = $_REQUEST['category'];

    include_once '../db/db.php';

    $sql = "UPDATE `item` SET `itemname`=?, `description`=?, `unit`=?, `price`=?, `image`=?, `status`=?, `categoryid`=? WHERE `itemid`=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssiis", $itemname, $description, $unit, $price, $img, $status_default, $categoryid, $itemid);

    if ($stmt->execute()) {
        echo "<script>
           alert('Record updated successfully');
           window.location.href = '../?page=item';
       </script>";
    } else {    
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
