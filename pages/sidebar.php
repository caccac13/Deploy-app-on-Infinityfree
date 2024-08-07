<style>
    .logo {
        font-size: 24px;
        text-align: center;
        font-family: cursive;
        padding: 4px;
        margin-bottom: 20px;
    }

    .logo a {
        text-decoration: none;
        color: #fff;
    }

    .logo i {
        font-family: Brush Script MT, Brush Script Std, cursive;
        color: yellow;
        font-size: 32px;
    }

    .list-group {
        position: relative;
    }

    .list-group a {
        text-decoration: none;
        color: #fff;
        padding: 16px;
        display: block;
        transition: all ease 0.2s;
        margin: 2px;
        font-size: 18px;
    }

    .list-group .active {
        color: yellow;
    }

    .list-group a:hover {
        color: yellow;
        z-index: 1;

    }

    .list-group i {
        width: 40px;
        text-align: center;
    }

</style>
<div class="logo">
    <a href="index.php">Hung <i>DEV</i></a>
</div>
<ul class="list-group">
    <li><a href="?page=item"> <i class="fa-solid fa-boxes-stacked "></i> Products</a></li>
    <li><a href="?page=account"> <i class="fa-solid fa-user"></i> Account</a></li>
    <li><a href="?page=category"> <i class="fa-solid fa-list"></i> Category</a></li>
    <li><a href=""> <i class="fa-solid fa-hand-holding-dollar"></i> Revenue</a></li>
</ul>

