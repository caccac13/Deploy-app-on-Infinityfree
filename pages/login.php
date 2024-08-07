<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            height: 100vh;
            background: linear-gradient(45deg, blue, violet);
        }

        form {
            width: 500px;
            margin: 8% auto;
            padding: 60px 80px;
            border-radius: 5px;
            background-color: #f1f1f1;
        }

        form h1 {
            text-align: center;
        }

        form input {
            width: 100%;
            padding: 12px;
            background: #ddd;
            border: none;
            border-radius: 20px;
            outline: none;
        }

        form input[type="submit"] {
            background-color: #000;
            color: #fff;
        }

        form p {
            margin-top: 20px;
            text-align: center;
        }

        .error {
            color: red;
        }
    </style>
</head>

<body>
    <?php
    $error = array();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (empty($_POST['username'])) {
            $error['username'] = 'Please enter username';
        } else {
            $username = $_POST['username'];
        }

        if (empty($_POST['password'])) {
            $error['password'] = 'Please enter password';
        } else {
            $password = $_POST['password'];
        }

        if (empty($error)) {
            header('location: pages/login-handle.php?username=' . $username . '&password=' . $password);
        }
    }
    ?>

    <div class="login-form">
        <form action="" method="post">
            <h1>Login</h1>
            <label for="username">Username</label><br>
            <input type="text" name="username" id="username" required><br>
            <?php if (isset($error['username'])) {
                echo '<span class="error">' . $error['username'] . '</span>';
            } ?>
            <br>
            <label for="password">Password</label><br>
            <input type="password" name="password" id="password" required><br>
            <?php
            if (isset($error['password'])) {
                echo '<span class="error">' . $error['password'] . '</span>';
            } ?>
            <br>
            <input type="submit" value="Login">
            <p>Don't have an account? <a href="index.php?page=signin">Sign Up</a></p>
        </form>
    </div>
</body>

</html>