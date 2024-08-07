<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $error = array();

        if (empty($_POST['username'])) {
            $error['username'] = 'Please enter username';
        } else {
            $pattern = "/^[a-zA-Z0-9_]{5,30}$/";
            if (!preg_match($pattern, $_POST['username'])) {
                $error['username'] = 'Username must be 6 characters or longer';
            } else {
                $username = $_POST['username'];
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
            header('location: pages/signin-handle.php?username=' . $username . '&password=' . $password . '&phone=' .$phone);
        }
    }
    ?>

    <div class="signin-form">
        <form action="" method="post">
            <h1>Signin</h1>
            <label for="username">Username</label><br>
            <input type="text" name="username" id="username" value="<?php if(isset($username)) echo $username?>" required><br>
            <?php if (isset($error['username'])) {
                echo '<span class="error">' . $error['username'] . '</span>';
            } ?>
            <br>
            <label for="password">Password</label><br>
            <input type="password" name="password" id="password" required><br>
            <?php if (isset($error['password'])) {
                echo '<span class="error">' . $error['password'] . '</span>';
            } ?>
            <br>
            <label for="phone">Phone</label><br>
            <input type="text" name="phone" id="phone" value="<?php if(isset($phone)) echo $phone?>" required><br>
            <?php if (isset($error['phone'])) {
                echo '<span class="error">' . $error['phone'] . '</span>';
            } ?>
            <br>
            <input type="submit" value="Signin">
            <p>Have an account? <a href="index.php?page=login">Login</a></p>
        </form>
    </div>
</body>

</html>
