<style>/* Đặt nền và phông chữ mặc định */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f9;
    margin: 0;
    padding: 0;
}

/* Tiêu đề */
.frmtitle h1 {
    text-align: center;
    font-size: 28px;
    color: #4caf50;
    margin: 20px 0;
    text-transform: uppercase;
    font-weight: bold;
    background-color: #e8f5e9;
    padding: 10px 0;
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

/* Container chính */
.frmcontent {
    width: 50%;
    margin: 0 auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    margin-bottom: 40px;
}

/* Khoảng cách giữa các dòng */
.mb10 {
    margin-bottom: 20px;
}

/* Nhãn và input */
.mb10 label,
.mb10 input,
.mb10 textarea,
.mb10 select {
    display: block;
    width: 100%;
    font-size: 16px;
    margin-bottom: 10px;
}

/* Ô input và textarea */
.mb10 input[type="text"],
.mb10 input[type="file"],
.mb10 select,
.mb10 textarea {
    padding: 10px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
    width: 100%;
}

/* Hình ảnh sản phẩm */
.mb10 img {
    margin-top: 10px;
    max-height: 80px;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
}

/* Nút bấm */
.mb10 input[type="submit"],
.mb10 input[type="reset"],
.mb10 input[type="button"] {
    background-color: #4caf50;
    color: white;
    border: none;
    border-radius: 5px;
    padding: 10px 20px;
    font-size: 16px;
    cursor: pointer;
    transition: all 0.3s ease;
    margin-right: 10px;
}

.mb10 input[type="submit"]:hover,
.mb10 input[type="reset"]:hover,
.mb10 input[type="button"]:hover {
    background-color: #45a049;
    transform: translateY(-3px);
}

/* Đường dẫn danh sách */
.mb10 a input[type="button"] {
    background-color: #333;
    color: white;
    text-decoration: none;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    transition: all 0.3s ease;
}

.mb10 a input[type="button"]:hover {
    background-color: #555;
}

/* Thông báo */
.mb10 .thongbao {
    color: red;
    font-size: 16px;
    margin-top: 10px;
}
</style>
<div class="row">
            <div class="row frmtitle">
                <h1>CẬP NHẬT SẢN PHẨM</h1>
            </div>
            <div class="row frmcontent">
            <form action="index.php?act=updatesp" method="post" enctype="multipart/form-data">
                    <div class="row mb10">
                        <select name="iddm">
                           
                            <?php
                                foreach($listdanhmuc as $danhmuc){
                                    extract($danhmuc);
                                    if($iddm == $id) $s="selected"; else $s=""; 
                                    echo '<option value="'.$id.'" '.$s.'>'.$name.'</option>';
                                }
                            ?>
                        </select>
                    </div>
                    <?php
                        if(is_array($sanpham)){
                            extract($sanpham);
                        }
                        $hinhpath="../upload/".$img;
                        if(is_file($hinhpath)){
                            $hinh= "<img src='".$hinhpath."' height='80'>";
                        }else{
                            $hinh= "no photo";
                        }
                    ?>
                    <div class="row mb10">
                        Tên sản phẩm <br>   
                        <input type="text" name="tensp" value="<?=$name?>">
                    </div>
                    <div class="row mb10">
                        Giá <br>
                        <input type="text" name="giasp"value="<?=$price?>">
                    </div>
                    <div class="row mb10">
                        Hình <br>
                        <input type="file" name="hinh" id="">
                        <?=$hinh?>
                    </div>
                    <div class="row mb10">
                        Mô tả <br>
                        <textarea name="mota"cols="30" rows="10"><?=$mota?></textarea>
                    </div>
                    <div class="row mb10">
                        <input type="hidden" name="id" value="<?=$id?>">
                        <input type="submit" name="capnhat" value="CẬP NHẬT">
                        <a href="index.php?act=listsp"><input type="button" value="DANH SÁCH"></a>
                    </div>  
                    <?php
                        if(isset($thongbao)&&($thongbao != "")) echo $thongbao;
                    ?>       
                </form>
            </div>
        </div>