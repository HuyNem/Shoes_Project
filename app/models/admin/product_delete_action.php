<?php
    //lấy dữ liệu id cần xóa
    $pid = $_GET['pid'];
    
    //kết nối csdl
    require_once '../../controllers/connect.php';

    //câu lệnh sql
    $xoa_sql = "DELETE FROM sanpham WHERE PID = $pid";

    mysqli_query($conn, $xoa_sql);

    //khi xóa xong trở về trang liet ke luân
    header("location: http://localhost/shoes_Project/app/views/admin/product_view.php");
?>