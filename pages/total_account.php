
<div class="box">
    <p><i class="fa-solid fa-user"></i></i></p>
    <?php
    include 'db/db.php';
    $sql = "SELECT COUNT(*) as total_item FROM account";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Lấy kết quả
        $row = $result->fetch_assoc();
        echo '<p>Account: ' . $row['total_item'] . '</p>';
        // echo "Total products: " . $row['total_products'];
    } else {
        echo "No products found.";
    }
    ?>
</div>