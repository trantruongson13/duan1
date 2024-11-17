<?php
function pdo_get_connection()
{
    $dburl = "mysql:host=localhost;dbname=duan1;charset=utf8";
    $username = 'root';
    $password = '';

    $conn = new PDO($dburl, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;
}
function pdo_execute($sql, ...$args)
{
    $conn = pdo_get_connection();
    $stmt = $conn->prepare($sql);
    $stmt->execute($args);
}
function pdo_query($sql, ...$args)
{
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($args);
        $rows = $stmt->fetchAll();
        return $rows;
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}


function pdo_query_one($sql, ...$args)
{
    $conn = pdo_get_connection();
    $stmt = $conn->prepare($sql);
    $stmt->execute($args);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result ? $result : false;
}

function pdo_query_value($sql, ...$args)
{
    $conn = pdo_get_connection();
    $stmt = $conn->prepare($sql);
    $stmt->execute($args);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return array_values($row)[0];
}
//kiểm tra pt get
function isGet()
{
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        return true;
    }
    return false;
}
//kiểm tra pt post
function isPost()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        return true;
    }
    return false;
}
// hàm filter lọc dữ liệu
function filter()
{
    $filterArr = [];
    if (isGet()) {
        //xử lý dữ liệu trc khi hiển thị ra
        //return $_get
        if (!empty($_GET)) {
            foreach ($_GET as $key => $value) {
                $key = strip_tags($key);
                if (is_array($value)) {
                    $filterArr[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_SCALAR);
                }
            }
        }
    }
}
?>