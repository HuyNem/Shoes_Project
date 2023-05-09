<?php
session_start();
if (!isset($_SESSION["categories_edit_error"])) {
    $_SESSION["categories_edit_error"] = "";

    require("./controllers/connect.php");
    $tenthuonghieu = $_POST["tenthuonghieu"];
    $anhthuonghieu = $_FILES["anhthuonghieu"]["name"];
    $cstatus = $_POST["rdCstatus"];

    //kiểm tra xem đã có thương hiệu trong csdl chưa
    $sql = "select * from thuonghieu where TenThuongHieu='".$tenthuonghieu."'";

    $result=$conn->query($sql) or die($conn->error);
}
