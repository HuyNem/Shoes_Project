<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


if (!isset($_SESSION["product_edit_error"])) {
    $_SESSION["product_edit_error"] = "";
}

require("./controllers/connect.php");

$PID = $_POST["pid"];
$tensp = $_POST["tensp"];
$soluong = $_POST["soluong"];
$gia = $_POST["gia"];
$anhsp = $_FILES["anhsp"]["name"];
$mausp = $_POST["mausp"];
$kichthuoc = $_POST["kichthuoc"];
$thuonghieu = $_POST["thuonghieu"];
$mota = $_POST["mota"];

//kiem tra xem tensp da co chua
$sql = "select * from sanpham where TenSP='" . $tensp . "'and PID<>" . $PID;
$result = $conn->query($sql) or die($conn->error);

if ($result->num_rows > 0) {
    $_SESSION["brand_edit_error"] = "Tên sản phẩm " . $tensp . " exist!";
    header("Location: product_edit.php");
} else {
    // luu target folder cho image:
    $target_file = "./image/product/" . $anhsp;
    // luu query:
    $sql1 = "";
    if ($anhsp != "") {
        if (move_uploaded_file($_FILES["anhsp"]["tmp_name"], $target_file)) {
            $sql1 = "update sanpham set TenSP='" . $tensp . "', SoLuong='" . $soluong . "', Gia='" . $gia . "', AnhSP='" . $anhsp . "', MauSP='" . $mausp . "', KichThuocSP='" . $kichthuoc . "', MaThuongHieu='" . $thuonghieu . "', MoTa='".$mota."' where PID = " . $PID;
        }
    } else {
        $sql1 = "update sanpham set TenSP='" . $tensp . "', SoLuong='" . $soluong . "', Gia='" . $gia . "', MauSP='" . $mausp . "', KichThuocSP='" . $kichthuoc . "', MaThuongHieu='" . $thuonghieu . "', MoTa='".$mota."'  where PID = " . $PID;
    }


    if ($conn->query($sql1) == TRUE) {
        $_SESSION["product_error"] = "Sửa thành công!";
        $_SESSION["product_edit_error"] = "";
        header("Location: product_view.php");
    } else {
        $_SESSION["product_error"] = $sql . " " . $conn->error;
        $_SESSION["product_edit_error"] = "";
        header("Location: product_view.php");
    }
}
header("Location: product_view.php");
//echo $cname.$cimage.$cstatus;
$conn->close();
