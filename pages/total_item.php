<style>
    .box {
        border: 1px solid #ccc;
        font-size: 20px;
        display: flex;
        justify-content: space-around;
        padding: 40px 20px;
        margin: 20px 0;
        color: #fff;
        background: linear-gradient(135deg, #3636d0, #9d60e5);
        border-radius: 10px;
    }

    .box i {
        font-size: 40px;
    }
</style>
<div class="box">
    <p><i class="fa-solid fa-boxes-stacked"></i></p>
    <?php
    include 'db/db.php';
    $sql = "SELECT COUNT(*) as total_item FROM item";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Lấy kết quả
        $row = $result->fetch_assoc();
        echo '<p>Products: ' . $row['total_item'] . '</p>';
        // echo "Total products: " . $row['total_products'];
    } else {
        echo "No products found.";
    }
    ?>
</div>