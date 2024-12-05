<link rel="stylesheet" href="./css/bill-css.css">
<div class="row mb" id="bill">
    <div class="boxtrai mr">
        <form action="index.php?act=billcomfirm" method="post">
            <div class="row mb">
                <div class="boxtitle">Thông tin đặt hàng</div>
                <div class="row boxcontent billform">
                    <table>

                        <?php
                        if (isset($_SESSION['user'])) {
                            $name = $_SESSION['user']['name'];
                            $address = $_SESSION['user']['address'];
                            $tel = $_SESSION['user']['tel'];
                            $email = $_SESSION['user']['email'];
                        } else {
                            $name = "error";
                            $address = "error";
                            $email = "error";
                            $tel = "error";
                        }
                        ?>

                        <tr>
                            <td>Họ tên</td>
                            <td><input type="text" name="name" value="<?= $name ?>" class="input-bill"></td>
                        </tr>
                        <tr>
                            <td>Địa chỉ</td>
                            <td><input type="text" name="address" value="<?= $address ?>" class="input-bill"></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><input type="text" name="email" value="<?= $email ?>" class="input-bill"></td>
                        </tr>
                        <tr>
                            <td>Số điện thoại</td>
                            <td><input type="text" name="tel" value="<?= $tel ?>" class="input-bill"></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="row mb">
                <div class="boxtitle">Phương thức thanh toán</div>
                <div class="row boxcontent">
                    <table>
                        <tr>
                            <td><input type="radio" name="pttt" checked>Trả tiền khi nhận hàng</td>
                            <td><input type="radio" name="pttt">Chuyển khoản ngân hàng</td>
                            <td><input type="radio" name="pttt">Thanh toán online</td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="row mb">
                <div class="boxtitle">Thông tin giỏ hàng</div>
                <div class="row boxcontent cart">
                    <table>
                        <?php viewcart(0) ?>
                    </table>
                </div>
            </div>

            <div class="row mb bill">
                <input type="submit" value="Mua hàng" class="dat-hang" name="dongydathang">
            </div>
        </form>

    </div>
</div>