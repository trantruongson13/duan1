
        <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dự án mẫu</title>
    <link rel="stylesheet" href="../css/css.css">
    <link rel="stylesheet" href="../css/cs.css">
    <link rel="stylesheet" href="../css/sty.css">
    <!-- Thêm Font Awesome để sử dụng icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<style>
   /* Đặt nền và căn chỉnh header */
.header {
    background-color: #4CAF50; /* Màu nền cho header */
    color: white;
    display: flex;
    justify-content: space-between; /* Đẩy các phần tử về hai bên */
    align-items: center;
    padding: 15px 30px; /* Tăng khoảng cách nội dung header */
}

/* Tiêu đề trong header */
.header h1 {
    margin: 0;
    font-size: 1.8em;
}

/* Căn chỉnh cho menu */
.menu {
    background-color: #333; /* Đổi màu nền menu để tạo sự tương phản */
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
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.search-form button:hover {
    background-color: #45a049;
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

</style>

<body>
    <div class="boxcenter">
        <div class="row mb header">
            <h1>Siêu Thị Trực Tuyến</h1>
            <div class="header-icons">
                <!-- Icon Đăng nhập -->
                <a href="index.php?act=login" title="Đăng Nhập"><i class="fas fa-user"></i></a>
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
  
