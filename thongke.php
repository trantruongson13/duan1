<?php
// Giả định rằng bạn đã thực hiện các truy vấn và có các biến $total_products, $total_categories, $total_users, $total_comments
// Hàm này giả định là bạn đã thực hiện việc lấy dữ liệu thống kê từ cơ sở dữ liệu.
// Ví dụ: 
$total_products = get_total_products();
$total_categories = get_total_categories();
$total_users = get_total_users();
$total_comments = get_total_comments();
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thống kê</title>
    <!-- Thêm Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Thêm Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <div class="container mt-5">

        <div class="row">
            <div class="col-lg-6 col-md-6">
                <h3 class="text-center" style="color: #28a745;">Thông Tin Tổng Quát</h3>
                <ul class="list-group mb-4">
                    <li class="list-group-item list-group-item-primary">
                        <strong>Tổng số sản phẩm:</strong> <?php echo $total_products; ?>
                    </li>
                    <li class="list-group-item list-group-item-success">
                        <strong>Tổng số danh mục:</strong> <?php echo $total_categories; ?>
                    </li>
                    <li class="list-group-item list-group-item-warning">
                        <strong>Tổng số người dùng:</strong> <?php echo $total_users; ?>
                    </li>
                    <li class="list-group-item list-group-item-danger">
                        <strong>Tổng số bình luận:</strong> <?php echo $total_comments; ?>
                    </li>
                </ul>
            </div>

            <div class="col-lg-6 col-md-6">
                <h2 class="text-center" style="color: #17a2b8;">Biểu Đồ Thống Kê</h2>
                <canvas id="myChart" width="400" height="200"
                    style="border-radius: 8px; border: 1px solid #dee2e6;"></canvas>
            </div>
        </div>
    </div>

    <script>
        // Dữ liệu cho biểu đồ
        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar', // Bạn có thể thay đổi thành loại biểu đồ cần thiết
            data: {
                labels: ['Sản phẩm', 'Danh mục', 'Người dùng', 'Bình luận'],
                datasets: [{
                    label: 'Số lượng',
                    data: [<?php echo $total_products; ?>, <?php echo $total_categories; ?>, <?php echo $total_users; ?>, <?php echo $total_comments; ?>], // Dữ liệu từ các biến PHP
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>

</html>