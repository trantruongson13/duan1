<?php
function insert_danhmuc($tenloai){
    $sql = "insert into danhmuc(name) values ('$tenloai')";
    pdo_execute($sql);
}
// function delete_danhmuc($id){
//     $sql = "delete from danhmuc where id=" .$id;
//     pdo_execute($sql);
// }
// danh muc functions
function delete_danhmuc($id) {
    // First, delete related rows in sanpham table
    $sql = "DELETE FROM sanpham WHERE iddm = ?";
    pdo_execute($sql, $id);

    // Then, delete the row in danhmuc table
    $sql = "DELETE FROM danhmuc WHERE id = ?";
    pdo_execute($sql, $id);
}

function loadall_danhmuc(){
    $sql = "select * from danhmuc order by name";
            $listdanhmuc = pdo_query($sql);
            return $listdanhmuc;
}
function loadone_danhmuc($id){
    $sql = "select * from danhmuc where id=" .$id;
    $dm = pdo_query_one($sql);
    return $dm;
}
function update_danhmuc($id,$tenloai){
    $sql = "update danhmuc set name='" . $tenloai . "' where id=" . $id;
    pdo_execute($sql);
}
?>