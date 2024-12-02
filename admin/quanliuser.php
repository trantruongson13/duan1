<?php
// Trong file ../admin/quanliuser.php

// include "../model/pdo.php"; // Kết nối với cơ sở dữ liệu
$listuser = loadall_user(); // Lấy tất cả người dùng


// Xử lý xóa người dùng
if (isset($_GET['act']) && $_GET['act'] === 'deleteusers') {
    if (isset($_GET['id']) && ($_GET['id'] > 0)) {
        delete_users($_GET['id']); // Gọi hàm xóa người dùng
    }
    // Sau khi thực hiện xóa, hãy tải lại danh sách người dùng
    $listuser = loadall_user();
}
?>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Email</th>
            <th>Pass</th>
            <th>Hành Động</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($listuser as $users): ?>
            <tr>
                <td><?php echo $users['id'] !== null ? $users['id'] : ''; ?></td>
                <td><?php echo $users['name'] !== null ? $users['name'] : ''; ?></td>
                <td><?php echo $users['email'] !== null ? $users['email'] : ''; ?></td>
                <td><?php echo $users['pass'] !== null ? $users['pass'] : ''; ?></td>
                <td>
                    <a href="index.php?act=deleteusers&id=<?php echo $users['id']; ?>"
                        onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Xóa</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>