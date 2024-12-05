<?php

function viewcart($del)
{
    global $img_path;
    $tong = 0;
    $i = 0;

    if ($del == 1) {
        $xoasp_th = '<th>Thao tác</th>';
        $xoasp_td2 = '<td></td>';
    } else {
        $xoasp_th = '';
        $xoasp_td2 = '';
    }
    echo '
        <tr>
            <th>Hình ảnh</th>
            <th>Sản phẩm</th>
            <th>Đơn giá</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
            ' . $xoasp_th . '
        </tr>
    ';

    foreach ($_SESSION['mycart'] as $index => $cart) {
        $hinh = $img_path . $cart[2];
        $ttien = $cart[3] * $cart[4];
        $tong += $ttien;
        if ($del == 1) {
            $xoasp_td = '<td><a href="index.php?act=delcart&idcart=' . $index . '"><input type="button" value="Xóa"></a></td>';
        } else {
            $xoasp_td = '';
        }
        echo '
            <tr>
                <td><img src="' . $hinh . '" alt="" width="100"></td>
                <td>' . $cart[1] . '</td>
                <td>' . $cart[3] . ' VNĐ</td>
                <td>
                    <form action="index.php?act=updatecart" method="post" style="display:inline;">
                        <input type="hidden" name="idcart" value="' . $index . '">
                        <input type="number" name="quantity" value="' . $cart[4] . '" min="1" style="width: 60px;">
                        <input type="submit" value="Cập nhật">
                    </form>
                </td>
                <td>' . $ttien . ' VNĐ</td>
                ' . $xoasp_td . '
            </tr>';
    }

    echo '
        <tr>
            <td colspan="4" class="text-right">Tổng tiền:</td>
            <td>' . $tong . ' VNĐ</td>
            ' . $xoasp_td2 . '
        </tr>';
}


function bill_chi_tiet($listbill)
{
    global $img_path;
    $tong = 0;
    $i = 0;
    echo '
        <tr>
            <th>Hình ảnh</th>
            <th>Sản phẩm</th>
            <th>Đơn giá</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
        </tr>';

    foreach ($listbill as $cart) {
        $hinh = $img_path . $cart['img'];
        $tong += $cart['thanhtien'];
        echo '
                <tr>
                    <td><img src="' . $hinh . '" alt="" width="100"></td>
                    <td>' . $cart['name'] . '</td>
                    <td>' . $cart['price'] . ' VNĐ</td>
                    <td>' . $cart['soluong'] . '</td>
                    <td>' . $cart['thanhtien'] . ' VNĐ</td>
                </tr>';
        $i += 1;
    }
    echo '
                <tr>
                    <td colspan="4">Tổng đơn hàng</td>
                    <td>' . $tong . ' VNĐ</td>
                </tr>
            ';
}

function tongdonhang()
{
    $tong = 0;

    foreach ($_SESSION['mycart'] as $cart) {
        $ttien = $cart[3] * $cart[4];
        $tong += $ttien;
    }

    return $tong;
}

function insert_bill($iduser, $name, $email, $address, $tel, $pttt, $ngaydathang, $tongdonhang)
{
    $sql = "INSERT INTO bill (iduser,bill_name, bill_email, bill_address, bill_tel, bill_pttt, ngaydathang, total) 
            VALUES ('$iduser','$name', '$email', '$address', '$tel', '$pttt', '$ngaydathang', '$tongdonhang')";
    return pdo_execute_return_lastInsertId($sql);
}
function insert_cart($iduser, $idpro, $img, $name, $price, $soluong, $thanhtien, $idbill)
{
    $sql = "insert into cart(iduser, idpro, img, name, price, soluong, thanhtien, idbill)
    values('$iduser', '$idpro', '$img', '$name', '$price', '$soluong', '$thanhtien', '$idbill')";
    return pdo_execute($sql);
}

function loadone_bill($id)
{
    $sql = "SELECT * FROM bill WHERE id=" . intval($id); // Ép kiểu cho bảo mật
    $bill = pdo_query_one($sql);
    // print_r($bill);
    // die();
    if (empty($bill)) {
        return null;
    }
    return $bill;
}

function loadall_cart($idbill)
{
    $sql = "select * from cart where idbill=" . $idbill;
    $bill = pdo_query($sql);
    return $bill;
}
function loadall_cart_count($idbill)
{
    $sql = "select * from cart where idbill=" . $idbill;
    $bill = pdo_query($sql);
    return sizeof($bill);
}

function loadall_bill($kyw = "", $iduser = 0)
{
    $sql = "SELECT * FROM bill WHERE 1";
    if ($iduser > 0) $sql .= " AND iduser = " . intval($iduser);
    if ($kyw != "") $sql .= " AND id like '% " . intval($kyw) . "%'";
    $sql .= " ORDER BY id desc";
    $listbill = pdo_query($sql);
    return $listbill;
}

function get_ttdh($n)
{
    switch ($n) {
        case '0':
            $tt = 'Đơn hàng mới';
            break;
        case '1':
            $tt = 'Đang xử lý';
            break;
        case '2':
            $tt = 'Đang giao';
            break;
        case '3':
            $tt = 'Đã giao';
            break;
        default:
            $tt = 'Đã giao';
            break;
    }
    return $tt;
}

function deleteOrder($id)
{
    // Kết nối đến cơ sở dữ liệu
    $conn = new mysqli('localhost', 'username', 'password', 'duan1'); // Thay đổi thông tin kết nối cho phù hợp

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }
    // Chuẩn bị câu lệnh SQL để xóa đơn hàng
    $sql = "DELETE FROM bill WHERE id = ?";

    // Sử dụng prepared statements để tránh SQL injection
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id); // "i" nghĩa là tham số kiểu integer

    // Thực hiện câu lệnh
    if ($stmt->execute()) {
        echo json_encode(['message' => 'Hủy đơn hàng thành công!']);
    } else {
        echo json_encode(['message' => 'Hủy thất bại: ' . $stmt->error]);
    }

    // Đóng kết nối
    $stmt->close();
    $conn->close();
}

function updateOrderStatus($id, $status)
{
    // Kết nối đến cơ sở dữ liệu
    $conn = new mysqli('localhost', 'username', 'password', 'duan1'); // Thay đổi thông tin kết nối cho phù hợp

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }

    // Chuẩn bị câu lệnh SQL để cập nhật trạng thái đơn hàng
    $sql = "UPDATE bill SET bill_status = ? WHERE id = ?";

    // Sử dụng prepared statements để tránh SQL injection
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $status, $id); // "ii" nghĩa là hai tham số kiểu integer

    // Thực hiện câu lệnh
    if ($stmt->execute()) {
        echo json_encode(['message' => 'Cập nhật trạng thái thành công!']);
    } else {
        echo json_encode(['message' => 'Cập nhật thất bại: ' . $stmt->error]);
    }

    // Đóng kết nối
    $stmt->close();
    $conn->close();
}
