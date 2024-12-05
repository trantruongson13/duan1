<link rel="stylesheet" href="./css/viewcart-css.css">
<div class="row mb view-cart">
    <div class="boxtrai mr">
        <div class="row mb">
            <div class="boxtitle">Giỏ hàng</div>
            <div class="row boxcontent cart">
                <table>
                    <?php
                    viewcart(1)
                    ?>
                </table>
            </div>
        </div>
        <div class="row mb bill">
            <!-- <a href="index.php?act=bill">Đặt hàng</a>
            <a href="index.php?act=delcart">Xóa giỏ hàng</a> -->
            <?php if (!empty($_SESSION['mycart'])) : ?>
                <a href="index.php?act=bill">Đặt hàng</a>
                <a href="index.php?act=delcart">Xóa giỏ hàng</a>
            <?php else : ?>
                <script>
                    function alertCartEmpty() {
                        alert("Giỏ hàng của bạn đang trống. Vui lòng thêm sản phẩm trước khi đặt hàng.");
                        window.location.href = "index.php";
                    }
                </script>
                <a href="#" onclick="alertCartEmpty()">Đặt hàng</a>
            <?php endif; ?>
        </div>
    </div>
</div>