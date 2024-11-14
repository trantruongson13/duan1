<style>
    /* Căn chỉnh chung cho trang giỏ hàng */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    padding: 20px;
}

/* Bao quanh giỏ hàng */
.boxcenter {
    background-color: #fff;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    margin: 0 auto;
    max-width: 1200px;
}

/* Tiêu đề của giỏ hàng */
h1 {
    text-align: center;
    font-size: 2.5em;
    margin-bottom: 20px;
    color: #333;
}

/* Bảng giỏ hàng */
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

table th, table td {
    padding: 15px;
    text-align: center;
    border: 1px solid #ddd;
}

table th {
    background-color: #f4f4f4;
    font-weight: bold;
}

table td img {
    max-width: 100px;
    max-height: 100px;
    object-fit: cover;
}

input[type="number"] {
    width: 50px;
    padding: 5px;
    text-align: center;
    border: 1px solid #ddd;
    border-radius: 5px;
}

button {
    padding: 10px 20px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

button:hover {
    background-color: #45a049;
}

/* Cột "Tổng tiền" */
.total-price {
    font-size: 1.5em;
    font-weight: bold;
    color: #333;
    margin-top: 20px;
    text-align: right;
}

/* Các liên kết (xóa sản phẩm) */
a {
    color: #d9534f;
    text-decoration: none;
    font-weight: bold;
    transition: color 0.3s;
}

a:hover {
    color: #c9302c;
}

/* Các nút điều hướng giỏ hàng */
.row.mb {
    margin-top: 20px;
    display: flex;
    justify-content: space-between;
}

/* Thanh tìm kiếm sản phẩm */
.search-form input[type="text"] {
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    width: 250px;
}

.search-form button {
    padding: 10px 20px;
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

/* Điều chỉnh kích thước nút cập nhật giỏ hàng */
.update-cart-btn {
    padding: 10px 20px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.update-cart-btn:hover {
    background-color: #0056b3;
}

/* Các phần tử thông báo giỏ hàng trống */
.empty-cart-message {
    text-align: center;
    font-size: 1.2em;
    color: #888;
    margin-top: 40px;
}

.empty-cart-message a {
    color: #4CAF50;
    text-decoration: underline;
    font-weight: bold;
}

/* Footer giỏ hàng */
footer {
    text-align: center;
    margin-top: 40px;
    font-size: 1em;
    color: #333;
}

</style>
<?php
session_start();

// Kiểm tra nếu giỏ hàng đã có sản phẩm
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

// Kiểm tra nếu có yêu cầu xóa sản phẩm
if (isset($_GET['action']) && $_GET['action'] == 'remove' && isset($_GET['id'])) {
    $id_to_remove = $_GET['id'];
    unset($_SESSION['cart'][$id_to_remove]); // Xóa sản phẩm khỏi giỏ
}

// Kiểm tra nếu có yêu cầu thay đổi số lượng
if (isset($_POST['update'])) {
    foreach ($_POST['quantity'] as $id => $quantity) {
        if ($quantity > 0) {
            $_SESSION['cart'][$id]['quantity'] = $quantity; // Cập nhật số lượng sản phẩm
        }
    }
}

// Tính tổng tiền giỏ hàng
$total = 0;
foreach ($_SESSION['cart'] as $item) {
    $total += $item['price'] * $item['quantity'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ Hàng</title>
    <link rel="stylesheet" href="../css/css.css">
    <link rel="stylesheet" href="../css/cs.css">
    <link rel="stylesheet" href="../css/sty.css">
</head>
<body>

<div class="boxcenter">
    <div class="row mb">
        <h1>Giỏ Hàng</h1>

        <!-- Nếu giỏ hàng trống -->
        <?php if (empty($_SESSION['cart'])): ?>
            <p>Giỏ hàng của bạn hiện tại chưa có sản phẩm.</p>
        <?php else: ?>
            <form action="giohang.php" method="POST">
                <table>
                    <thead>
                        <tr>
                            <th>Ảnh</th>
                            <th>Tên Sản Phẩm</th>
                            <th>Số Lượng</th>
                            <th>Giá</th>
                            <th>Tổng</th>
                            <th>Hành Động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($_SESSION['cart'] as $id => $item): ?>
                            <tr>
                                <td><img src="<?= $item['img'] ?>" alt="" width="50"></td>
                                <td><?= $item['name'] ?></td>
                                <td><input type="number" name="quantity[<?= $id ?>]" value="<?= $item['quantity'] ?>" min="1"></td>
                                <td><?= number_format($item['price'], 0, ',', '.') ?> VNĐ</td>
                                <td><?= number_format($item['price'] * $item['quantity'], 0, ',', '.') ?> VNĐ</td>
                                <td><a href="giohang.php?action=remove&id=<?= $id ?>">Xóa</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <div class="row mb">
                    <button type="submit" name="update">Cập nhật giỏ hàng</button>
                </div>

                <div class="row mb">
                    <p><strong>Tổng Tiền:</strong> <?= number_format($total, 0, ',', '.') ?> VNĐ</p>
                </div>
            </form>
        <?php endif; ?>

        <div class="row mb">
            <a href="index.php" class="button">Tiếp Tục Mua Sắm</a>
            <a href="checkout.php" class="button">Thanh Toán</a>
        </div>
    </div>
</div>

</body>
</html>
