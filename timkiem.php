<?php
require_once './model/pdo.php';

// Kiểm tra xem người dùng đã gửi form tìm kiếm chưa
$search = isset($_POST['search']) ? $_POST['search'] : ''; // Nếu không có dữ liệu tìm kiếm, gán là chuỗi rỗng

// Chuẩn bị truy vấn tìm kiếm sản phẩm
$sql_pro = "SELECT sanpham.*, danhmuc.name AS tendanhmuc
            FROM sanpham
            INNER JOIN danhmuc
            ON sanpham.iddm = danhmuc.iddm
            WHERE sanpham.name LIKE :search";

// Tạo kết nối PDO
$conn = pdo_get_connection(); // Đảm bảo kết nối PDO được thực hiện đúng

// Chuẩn bị truy vấn
$stmt = $conn->prepare($sql_pro);

// Gán giá trị cho tham số :search từ $_POST['search']
$search_param = '%' . $search . '%';  // Thêm dấu '%' cho tìm kiếm
$stmt->bindParam(':search', $search_param, PDO::PARAM_STR);

// Thực thi truy vấn
$stmt->execute();

// Lấy kết quả
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Hiển thị kết quả
if ($rows) {
    echo "<ul class='product_list'>";
    foreach ($rows as $row) {
        echo "<li>
                <a href='index.php?timkiem&id=" . $row['id'] . "'>
                    <img src='img/" . $row['img'] . "' alt='Hình ảnh sản phẩm'>
                    <p class='title_product'>Tên sản phẩm: " . $row['name'] . "</p>
                    <p class='price_product'>Giá: " . number_format($row['price'], 0, ',', '.') . " VND</p>
                    <p class='description_product'>" . $row['mota'] . "</p>
                    <p style='text-align: center; color:#d1d1d1;'>Danh mục: " . $row['tendanhmuc'] . "</p>
                </a>
              </li>";
    }
    echo "</ul>";
} else {
    echo "Không tìm thấy sản phẩm nào.";
}
?>