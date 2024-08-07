<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>
    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
        font-family: Arial, Helvetica, sans-serif;
    }

    .main {
        /* background: linear-gradient(right, blue, violet); */
    }

    table,
    th,
    td {
        border: 1px solid black;
    }

    .side-bar {
        position: fixed;
        height: 100vh;
        color: #fff;
        width: 350px;
        background: linear-gradient(135deg, #3636d0, #9d60e5);

    }

    .content {
        margin-left: 350px;
        min-height: 100vh;
        background-color: #dedede;
    }
</style>

<body>
    <div class="main">
        <?php
        session_start();
        if (isset($_SESSION['username'])) {
        ?>
            <div class="side-bar">
                <?php
                include 'pages/sidebar.php';
                ?>
            </div>
            <div class="content">
                <div class="top">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-3">
                                <?php
                                if (isset($_SESSION['username'])) {
                                    include_once 'pages/total_item.php';
                                }
                                ?>
                            </div>
                            <div class="col-sm-3">
                                <?php
                                if (isset($_SESSION['username'])) {
                                    include_once 'pages/total_account.php';
                                }
                                ?>
                            </div>
                            <div class="col-sm-3">
                                <?php
                                if (isset($_SESSION['username'])) {
                                    include_once 'pages/total_income.php';
                                }
                                ?>
                            </div>
                            <div class="col-sm-3 d-flex justify-content-center align-items-center">
                                <?php
                                if (isset($_SESSION['username'])) {
                                    echo '<div><a href="pages/logout.php"><i style="font-size:60px;padding:12px;     color:red" title="Logout" class="fa-solid fa-right-from-bracket"></i></a></div>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid ">

                    <?php
                    if (isset($_REQUEST['page'])) {
                        if ($_REQUEST['page'] == 'item') {
                            include_once 'pages/item.php';
                        }
                        if ($_REQUEST['page'] == 'item_add') {
                            include_once 'pages/item_add.php';
                        }
                        if ($_REQUEST['page'] == 'save_item_add.php') {
                            include_once 'pages/save_item_add.php';
                        }
                        if ($_REQUEST['page'] == 'item_edit') {
                            include_once 'pages/item_edit.php';
                        }
                        if ($_REQUEST['page'] == 'item_delete') {
                            include_once 'pages/item_delete.php';
                        }
                        if ($_REQUEST['page'] == 'save_item_edit') {
                            include_once 'pages/save_item_edit.php';
                        }
                        if ($_REQUEST['page'] == 'account') {
                            include_once 'pages/account.php';
                        }
                        if ($_REQUEST['page'] == 'account_edit') {
                            include_once 'pages/account_edit.php';
                        }
                        if ($_REQUEST['page'] == 'account_delete') {
                            include_once 'pages/account_delete.php';
                        }
                        if ($_REQUEST['page'] == 'category') {
                            include_once 'pages/category.php';
                        }
                        if ($_REQUEST['page'] == 'category_edit') {
                            include_once 'pages/category_edit.php';
                        }
                        if ($_REQUEST['page'] == 'save_category_edit') {
                            include_once 'pages/save_category_edit.php';
                        }
                        if ($_REQUEST['page'] == 'category_delete') {
                            include_once 'pages/category_delete.php';
                        }
                        if ($_REQUEST['page'] == 'category_add') {
                            include_once 'pages/category_add.php';
                        }
                    } else {
                        include_once 'pages/item.php';
                    }
                    ?>
                </div>
            <?php } else {
            if (isset($_REQUEST['page'])) {
                if ($_REQUEST['page'] == 'signin') {
                    include_once 'pages/signin.php';
                }
                if ($_REQUEST['page'] == 'login') {
                    include_once 'pages/login.php';
                }
            } else {
                include_once 'pages/login.php';
            }
            }
            ?>
            </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</html>