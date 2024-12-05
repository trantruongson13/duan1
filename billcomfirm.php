<div class="row">
    <div class="row mb">
        <div class="boxtrai mr">
            <div class="row mb">
                <div class="boxtitle">Cảm ơn</div>
                <div class="row boxcontent" style="text-align: center;">
                    <h2>Cảm ơn quý khách đã đặt hàng</h2>
                </div>
            </div>

            <?php if (isset($bill) && is_array($bill)) : ?>
                <div class="row mb">
                    <div class="boxtitle">Thông tin đơn hàng</div>
                    <div class="row boxcontent" style="text-align: center;">
                        <li>Mã đơn hàng: <?= isset($bill['id']) ? $bill['id'] : 'Không có thông tin'; ?></li>
                        <li>Ngày đặt hàng: <?= ($bill['ngaydathang'] != '0000-00-00') ? $bill['ngaydathang'] : 'Chưa xác định'; ?></li>
                        <li>Tổng đơn hàng: <?= isset($bill['total']) ? $bill['total'] : 'Không có thông tin'; ?></li>
                        <?php
                        $methods = [1 => 'Tiền mặt', 2 => 'Chuyển khoản', 3 => 'Online'];
                        ?>
                        <li>Phương thức thanh toán: <?= isset($methods[$bill['bill_pttt']]) ? $methods[$bill['bill_pttt']] : 'Không rõ'; ?></li>


                    </div>
                </div>
                <div class="row mb">
                    <div class="boxtitle">Thông tin đặt hàng</div>
                    <div class="row boxcontent billform">
                        <table>
                            <tr>
                                <td>Khách hàng</td>
                                <td><?= isset($bill['bill_name']) ? $bill['bill_name'] : 'Không có thông tin'; ?></td>
                            </tr>
                            <tr>
                                <td>Địa chỉ</td>
                                <td><?= isset($bill['bill_address']) ? $bill['bill_address'] : 'Không có thông tin'; ?></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><?= isset($bill['bill_email']) ? $bill['bill_email'] : 'Không có thông tin'; ?></td>
                            </tr>
                            <tr>
                                <td>Số điện thoại</td>
                                <td><?= isset($bill['bill_tel']) ? $bill['bill_tel'] : 'Không có thông tin'; ?></td>
                            </tr>
                        </table>

                    </div>
                </div>
            <?php else : ?>
                <p>Không tìm thấy thông tin đơn hàng. Vui lòng kiểm tra lại!</p>
            <?php endif; ?>

            <div class="row mb">
                <div class="boxtitle">Chi tiết giỏ hàng</div>
                <div class="row boxcontent cart">
                    <table>
                        <?php
                        if (isset($billct)) {
                            bill_chi_tiet($billct);
                        } else {
                            echo "<tr><td>Không có sản phẩm nào trong giỏ hàng.</td></tr>";
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
        <div class="boxphai">
            <?php include './view/boxright.php' ?>
        </div>
    </div>
</div>