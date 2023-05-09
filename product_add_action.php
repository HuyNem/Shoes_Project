<?php
    session_start();
    require("./controllers/connect.php");
    //khai báo biến
    $tensp = $_POST["tensp"];
    $soluong = $_POST["soluong"];
    $gia = $_POST["gia"];
    $anhsp = $_FILES["anhsp"]["name"];
    $mausp = $_POST["mausp"];
    $kichthuoc = $_POST["kichthuoc"];
    $mota = $_POST["mota"];
    $mathuonghieu = $_POST["thuonghieu"];

    $taget_file = "./image/product/$anhsp"; //đây là được dẫn cuối cùng mà bức ảnh được tải lên sẽ được lưu trữ lên server
    if(move_uploaded_file($_FILES["anhsp"]["tmp_name"],$taget_file)){
        $sql = "insert into sanpham(TenSP, SoLuong, Gia, AnhSP, MauSP, KichThuocSP, MoTa, MaThuongHieu) 
                values ('".$tensp."', '".$soluong."','".$gia."','".$anhsp."','".$mausp."','".$kichthuoc."','".$mota."','".$mathuonghieu."')";
        if($conn->query($sql) == TRUE) {
            $_SESSION["product_error"] = "Thêm mới thành công";
            $_SESSION["product_addedit_error"] = "";
            header("Location: product_view.php");
        } else {
            $_SESSION["product_error"] = $sql." ".$conn->error;
            $_SESSION["product_addedit_error"] = "";
            header("Location: product_view.php");
        }
    }
    
$conn->close();

?>