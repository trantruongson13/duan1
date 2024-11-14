
<div class="row mb ">
    <div class="boxtitle">Danh Mục</div>
    <div class="boxconten2 menudoc">
        <div class="mnu">
            <ul>
                <?php
                foreach ($dsdm as $dm) {
                    extract($dm);
                    $linkdm = "index.php?act=sanpham&iddm=" . $id;
                    echo '<li><a href="' . $linkdm . '">' . $name . '</a></li>';
                }

                ?>
            </ul>
        </div>

    </div>
    <div class="boxfooter searbox">
        <form action="#" method="post">
            <input type="text" name="" id="">
        </form>
    </div>
</div>
<div class="row">
    <div class="boxtitle">Sản Phẩm Hot</div>
    <div class="row boxconten">
        <?php
        foreach ($dstop10 as $sp) {
            extract($sp);
            $linksp = "index.php?act=sanphamct&idsp=" . $id;
            $img = $img_path . $img;
            echo '<div class="row mb10 top10">';
            echo '<a href="' . $linksp . '"><img src="../' . $img . '" alt=""></a>';
            echo '<a href="' . $linksp . '">' . $name . '</a>';
            echo '</div>';
        }
        ?>
    </div>
</div>