<?php

//kết nối csdl
require_once '../../controllers/connect.php';

//lấy dữ liệu id cần xóa
$mathuonghieu = $_GET['mathuonghieu'];

// Kiểm tra và xóa sản phẩm liên quan đến thương hiệu
$check_sql = "SELECT * FROM sanpham WHERE MaThuongHieu = '$mathuonghieu'";
$result = mysqli_query($conn, $check_sql);


if (mysqli_num_rows($result) > 0) {
    // Có sản phẩm liên quan, xóa hoặc cập nhật sản phẩm
    $update_sql = "UPDATE sanpham SET MaThuongHieu = NULL WHERE MaThuongHieu = '$mathuonghieu'";
    mysqli_query($conn, $update_sql);
}

// Xóa thương hiệu
$xoa_sql = "DELETE FROM thuonghieu WHERE MaThuongHieu = '$mathuonghieu'";
mysqli_query($conn, $xoa_sql);

header("Location: http://localhost/shoes_Project/app/views/admin/brand_view.php");

?>
