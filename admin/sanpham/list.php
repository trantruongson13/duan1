<div class="row">
    <div class="row frmtitle mb">
        <h1>DANH SÁCH SẢN PHẨM</h1>
    </div>
    <div class="form-group">
        <a href="index.php?act=addsp"><input type="button" value="Nhập thêm"></a>
    </div>
    <div class="row frmcontent">
        <div class="row mb10  frmdsloai">
            <table>
                <tr>
                    <th></th>
                    <th>Mã sản phẩm</th>
                    <th>Tên sản phẩm</th>
                    <th>Hình</th>
                    <th>Giá</th>
                    <th>Lượt xem</th>
                    <th></th>
                </tr>
                <?php
                foreach ($listsanpham as $sanpham) {
                    extract($sanpham);
                    $suasp = "index.php?act=suasp&id=" . $id;
                    $xoasp = "index.php?act=xoasp&id=" . $id;
                    $hinhpath = "../upload/" . $img;
                    if (is_file($hinhpath)) {
                        $hinh = "<img src='" . $hinhpath . "' height='80'>";
                    } else {
                        $hinh = "no photo";
                    }

                    echo '<tr>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td>' . $id . '</td>
                                            <td>' . $name . '</td>
                                            <td>' . $hinh . '</td>
                                            <td>' . $price . '</td>
                                            <td>' . $luotxem . '</td>
                                            <td>
                                                <a href="' . $suasp . '"><input type="button" value="Sửa"></a>
                                                <a onclick="return confirm(\'Bạn có muốn xoá không?\')" href="' . $xoasp . '"><input type="button" value="Xóa"></a>
                                            </td>
                                        </tr>';
                }
                ?>
            </table>
        </div>


        </form>
    </div>
</div>