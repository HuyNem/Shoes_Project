<?php
    //lấy dữ liệu id cần xóa
    $mathuonghieu = $_GET['mathuonghieu'];
    
    //kết nối csdl
    require_once './controllers/connect.php';

    //câu lệnh sql
    $xoa_sql = "DELETE FROM thuonghieu WHERE MaThuongHieu = $mathuonghieu";

    mysqli_query($conn, $xoa_sql);

    //khi xóa xong trở về trang liet ke luân
    header("location: brand_view.php");
?>