<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $error = array();

    if (empty($_POST['user'])) {
        $error['user'] = 'Please enter username';
    } else {
        $pattern = "/^[a-zA-Z0-9_]{5,30}$/";
        if (!preg_match($pattern, $_POST['user'])) {
            $error['user'] = 'Username must be 6 characters or longer';
        } else {
            $user = $_POST['user'];
        }
    }

    if (empty($_POST['password'])) {
        $error['password'] = 'Please enter password';
    } else {
        $pattern = "/^(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{6,30}$/";
        if (!preg_match($pattern, $_POST['password'])) {
            $error['password'] = 'Password must be 6 characters, one uppercase letter, one number, one special character';
        } else {
            $password = $_POST['password'];
        }
    }

    if (empty($_POST['phone'])) {
        $error['phone'] = 'Please enter phone number';
    } else {
        $pattern = "/^(0[3|5|7|8|9])+([0-9]{8})$/";
        if (!preg_match($pattern, $_POST['phone'])) {
            $error['phone'] = 'Invalid phone number';
        } else {
            $phone = $_POST['phone'];
        }
    }

    if (empty($error)) {
        echo '<script>window.location.href = "pages/add_account.php?username=' . $user . '&password=' . $password . '&phone=' . $phone . '";</script>';
        exit();
    }
}
?>
<h1>Account management</h1>
<div class="table-responsive">
    <table class="table">
        <tr>
            <th>Username</th>
            <th>Password</th>
            <th>Phone</th>
            <th>Action</th>
        </tr>
        <?php
        include_once("db/db.php");
        $sql = "SELECT * FROM `account`";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "
                <tr>
                  <td>" . $row['username'] . "</td>
                  <td>" . $row['password'] . "</td> 
                  <td>" . $row['phone'] . "</td>
                  <td><a style='padding:0 8px' href=\"?page=account_edit&id=" . $row['username'] . "\"><i class=\"fa-solid fa-pen\"></i></a>
                  <a style='color:red' href=\"#\" onclick=\"return confirmDelete('{$row['username']}');\"><i class=\"fa-solid fa-trash\" style='padding:0 8px'></i></a></td>
                </tr>
                ";
            }
        } else {
            echo "0 results";
        }
        ?>
    </table>
</div>
<script>
    function confirmDelete(username) {
        // Show confirmation dialog
        if (confirm("Bạn có chắc chắn muốn xóa tài khoản này không?")) {
            // If user clicks "OK", redirect to the delete URL
            window.location.href = "?page=account_delete&username=" + username;
        } else {
            // If user clicks "Cancel", do nothing
            console.log("Deletion cancelled");
        }
    }
</script>

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

<form method="post" action="">
    <h3>Add account</h3>
    <input type="hidden" name="action" value="add">
    <label style="width:100px" for="user">Username:</label>
    <input type="text" name="user" value="<?php if (isset($user)) echo $user ?>"><br>
    <?php
    if (isset($error['user'])) {
        echo '<span style="color: red;">' . $error['user'] . '</span>';
    }
    ?><br>
    <label style="width:100px" for="password">Password:</label>
    <input type="password" name="password"><br>
    <?php
    if (isset($error['password'])) {
        echo '<span style="color: red;">' . $error['password'] . '</span>';
    }
    ?><br>
    <label style="width:100px" for="phone">Phone:</label>
    <input type="text" name="phone" value="<?php if (isset($phone)) echo $phone ?>"><br>
    <?php
    if (isset($error['phone'])) {
        echo '<span style="color: red;">' . $error['phone'] . '</span>';
    }
    ?><br>
    <input type="submit" class="btn btn-primary" value="Add">
</form>