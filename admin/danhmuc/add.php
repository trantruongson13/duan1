
<div class="row">
    <div class="row formtitle">
        <h1>Thêm Danh Mục Mới</h1>
    </div>
    <div class="row formconten ">
        <form action="index.php?act=adddm" method="post">
            <div class="row mb10">
                <p> Mã loại danh mục</p> <br>
                <input type="text" name="maloai" disabled>
            </div>
            <div class="row m10">
                <p> Tên loại danh mục</p><br>
                <input type="text" name="tenloai">
            </div>
            <div class="row m10">
                <input type="submit" name="themmoi" value="Thêm mới">
                 <a href="index.php?act=listdm"> <input type="button" value="Danh sách"></a>
            </div>
            <?php
            if (isset($thongbao) && ($thongbao !=""))
                echo $thongbao;
            ?>
        </form>
    </div>
</div>