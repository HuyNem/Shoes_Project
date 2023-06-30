<?php
session_start();
require("./controllers/connect.php");
$tenthuonghieu = $_POST["tenthuonghieu"];
$anhthuonghieu = $_FILES["anhthuonghieu"]["name"];
$cstatus = $_POST["rdCstatus"];
//kiem tra xem tenthuonghieu da co chua
$sql = "select * from thuonghieu where TenThuongHieu ='".$tenthuonghieu."'";
$result=$conn->query($sql) or die($conn->error);
if ($result->num_rows>0){
    $_SESSION["Brand_add_error"]="tên thương hiệu ".$tenthuonghieu." đã tồn tại!";
    header("Location: Brand_add.php");
} else {
    $target_file="./image/brand/$anhthuonghieu";
    if (move_uploaded_file($_FILES["anhthuonghieu"]["tmp_name"],$target_file)){
        $sql = "insert into thuonghieu(TenThuongHieu,Anh,Status) values ('".$tenthuonghieu."','".$anhthuonghieu."',".$cstatus.")";
        if ($conn->query($sql)==TRUE){
            $_SESSION["brand_success"]="Thêm mới thương hiệu thành công!";
            $_SESSION["brand_add_success"] = "";
            header("Location: Brand_view.php");
        } else {
            $_SESSION["brand_error"]=$sql." ".$conn->error;
            $_SESSION["brand_add_error"] = "";
            header("Location: Brand_view.php");
        }
    }
    else {
        $sql = "insert into thuonghieu(TenThuongHieu,Status) values ('".$tenthuonghieu."',".$cstatus.")";
        if ($conn->query($sql)==TRUE){
            $_SESSION["brand_success"]="Thêm mới thương hiệu thành công!";
            $_SESSION["brand_add_success"] = "";
            header("Location: Brand_view.php");
        } else {
            $_SESSION["brand_error"]=$sql." ".$conn->error;
            $_SESSION["brand_add_error"] = "";
            header("Location: Brand_view.php");
        }
    }
}
//echo $cname.$cimage.$cstatus;
$conn->close();

?>

