<?php
session_start();
require("./controllers/connect.php");

    $taikhoan=$_POST['taikhoan'];
    $matkhau=md5($_POST['matkhau']);
    $hoten=$_POST['hoten'];
    $email= $_POST['email'];
    $sodienthoai= $_POST['sodienthoai'];
    $diachi = $_POST['diachi'];

    $sql = "select * from khachhang where taikhoan='".$taikhoan."'";
    $result = $conn->query($sql) or die($conn->error);

    if ($result->num_rows > 0) {
		$_SESSION["register_error"]="Tài khoản ".$taikhoan." đã tồn tại! Nhập lại!";
		header("Location: register_customer.php");
	} else {
		$sql_insert = "insert into khachhang(TaiKhoan,MatKhau,HoTen,Email,SoDienThoai,DiaChi) values ('".$taikhoan."','".$matkhau."','".$hoten."','".$email."','".$sodienthoai."','".$diachi."')";
		if ($conn->query($sql_insert)==TRUE){
			$_SESSION["login_success"]="Đăng ký thành công!";
			header("Location: login_customer.php");
		} else {
			$_SESSION["register_error"] = "Đăng ký không thành công, vui lòng làm lại!";
			header("Location: register_customer.php");
		}
	}
	$conn->close();
   
?>