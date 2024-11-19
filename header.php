<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dự án mẫu</title>
    <link rel="stylesheet" href="./css/css.css">
    <link rel="stylesheet" href="./css/cs.css">
    <link rel="stylesheet" href="./css/sty.css">
    <!-- Thêm Font Awesome để sử dụng icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<style>
    .header {
        background-color: #696969;
        color: white;
        display: flex;
        justify-content: center;
        gap: 80px;
        align-items: center;
        border: none;
    }

    .menu {
        background-color: #333;
        display: flex;
        align-items: center;
        padding: 10px 30px;
    }

    .menu ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        display: flex;
        gap: 20px;
    }

    .menu ul li a {
        color: white;
        text-decoration: none;
        padding: 10px 15px;
        font-size: 1em;
        font-weight: 500;
        border-radius: 4px;
        transition: background-color 0.3s;
    }

    .menu ul li a:hover {
        transform: scale(1.2);
        background-color: #555;
    }

    /* Căn chỉnh thanh tìm kiếm */
    .search-form {
        margin-left: auto;
        display: flex;
        gap: 5px;
        align-items: center;
    }

    .search-form input[type="text"] {
        padding: 8px;
        border: 1px solid #ddd;
        border-radius: 5px;
        width: 200px;
        font-size: 1em;
    }

    .search-form button {
        padding: 8px 12px;
        background-color: #483D8B;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    /* Căn chỉnh icon đăng nhập và giỏ hàng */
    .header-icons {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .header-icons a {
        color: white;
        font-size: 1.2em;
        text-decoration: none;
        transition: color 0.3s;
    }

    .header-icons a:hover {
        color: #ddd;
    }

    .img-logo img {
        border-radius: 50px;
    }
</style>
<body>
    <div class="boxcenter">
        <div class="row mb header">
            <div class="img-logo">
                <img href="index.php?act=dangky" src="./img/Vẽ tay Hình tròn Logo.png" height="60" alt="">
            </div>
            <div class="header-icons">
                <?php
                if (isset($_SESSION['user']) && ($_SESSION['user'] != "")) {
                    echo '<li><a href="index.php?act=getuserinfo">' . $_SESSION['user'] . '</a></li>';
                } else {
                ?>
                    <a href="index.php?act=dangky">Đăng ký</a>
                    <a href="index.php?act=dangnhapuser" value="login">Đăng nhập</a>
                <?php } ?>
                <!-- Icon Giỏ hàng -->
                <a href="index.php?act=giohang" title="Giỏ Hàng"><i class="fas fa-shopping-cart"></i></a>
            </div>
        </div>
        <div class="row mb menu">
            <ul>
                <li><a href="index.php">Trang Chủ</a></li>
                <li><a href="index.php?act=gioithieu">Giới Thiệu</a></li>
                <li><a href="index.php?act=lienhe">Liên Hệ</a></li>
                <li><a href="index.php?act=gopy">Góp ý</a></li>
                <li><a href="index.php?act=hoidap">Hỏi Đáp</a></li>
            </ul>
            <form action="index.php?act=timkiem" method="get" class="search-form">
                <input type="text" name="keyword" placeholder="Tìm kiếm sản phẩm..." required>
                <button type="submit">Tìm Kiếm</button>
            </form>
        </div>