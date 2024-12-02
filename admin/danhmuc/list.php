</head>

<body>
    <div class="row">
        <div class="row formtitle">
            <h1>Danh Sách Danh Mục</h1>
        </div>
    </div>
    <div class="row mb10">
        <div class="form-group">
            <a href="index.php?act=adddm"><input type="button" value="Nhập thêm"></a>
        </div>
        <table>
            <tr>
                <th></th>
                <th>Mã danh mục</th>
                <th>Tên danh mục</th>
                <th>Sửa & Xóa</th>
            </tr>
            <?php
            foreach ($listdanhmuc as $dmuc) {
                extract($dmuc);
                $suadm = "index.php?act=suadm&id=" . $id;
                $xoadm = "index.php?act=xoadm&id=" . $id;
                echo '<tr>
                        <td><input type="checkbox" name=""id=""></td>
                        <td>' . $id . '</td>
                        <td>' . $name . '</td>
                        <td><a href="' . $suadm . '"><input type="button" value= "SỬA"></a> 
                        <a onclick="return confirm(\'Bạn có muốn xoá không?\')" href="' . $xoadm . '"><input type="button" value="XÓA"></a></td>
                    </tr>';
            }
            ?>
        </table>
    </div>