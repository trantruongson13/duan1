<div class="row mb">
    <div class="boxtrai mr">
        <div class="row mb">
            <div class="boxtitle"> SẢN PHẨM <strong><?= $tendm ?></strong></div>
            <div class="row boxcontent">
                <?php
                $i = 0;
                foreach ($dssp as $sp) {
                    extract($sp);
                    $linksp = "index.php?act=sanphamct&idsp=" . $id;
                    $img_src = $img_path . $img;

                    // Kiểm tra xem $price có phải là mảng không
                    if (is_array($price)) {
                        // Nếu $price là mảng, lấy giá trị đầu tiên hoặc xử lý phù hợp
                        $price = $price[0]; // Hoặc bạn có thể xử lý giá trị khác trong mảng
                    }

                    // Set the class for margin adjustment
                    if (($i % 3) == 2) {
                        $class = "";
                    } else {
                        $class = "mr";
                    }

                    // In ra thông tin sản phẩm
                    echo '<div class="boxsp ' . $class . '">
                        <div class="row img"><a href="' . $linksp . '"><img src="' . $img_src . '" alt=""></a></div>
                        <p>$' . number_format($price, 0, ',', '.') . '</p> <!-- Hiển thị giá với định dạng thích hợp -->
                        <a href="' . $linksp . '">' . $name . '</a>
                    </div>';
                    $i += 1;
                }
                ?>
            </div>
        </div>
    </div>
    <div class="boxphai">
        <?php include "boxright.php"; ?>
    </div>
</div>
