<?php
$usern = $_REQUEST['id'];
include 'db/db.php';

// Sử dụng câu lệnh chuẩn bị để tránh SQL Injection
$sql = "SELECT * FROM `account` WHERE `username` = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $usern);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
?>
        <style>
            form {
                border: 3px solid #9d60e5;
                display: inline-block;
                padding: 20px;
                margin: 10px;
                background-color: #fff;
                border-radius: 10px;
                width: 400px;
            }

            input {
                max-width: 100%;
                width: 100%;
                outline: none;
                border-radius: 5px;
                background-color: #e5e5e5;
                border: none;
                padding: 10px;
            }
        </style>
        <h2>Edit account</h2>
        <form method="post" action="pages/save_account_edit.php">
            <label style="width:150px" for="usern">Username:</label>
            <input type="text" name="usern" value="<?php echo htmlspecialchars($usern); ?>" required readonly><br><br>
            <label style="width:150px" for="password">Password:</label>
            <input type="text" name="password" value="<?php echo htmlspecialchars($row['password']); ?>" required><br><br>
            <label style="width:150px" for="phone">Phone:</label>
            <input type="text" name="phone" value="<?php echo htmlspecialchars($row['phone']); ?>" required><br><br>
            <input type="submit" class="btn btn-primary" value="Ok">
        </form>
<?php
    }
} else {
    echo "0 results";
}

$stmt->close();
$conn->close();
?>