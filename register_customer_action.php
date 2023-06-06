<?php
session_start();
// require("./controllers/connect.php");

//     $taikhoan=$_POST['taikhoan'];
//     $matkhau=md5($_POST['matkhau']);
//     $hoten=$_POST['hoten'];
//     $email= $_POST['email'];
//     $sodienthoai= $_POST['sodienthoai'];
//     $diachi = $_POST['diachi'];

//     $sql = "select * from khachhang where taikhoan='".$taikhoan."'";
//     $result = $conn->query($sql) or die($conn->error);

//     if ($result->num_rows > 0) {
// 		$_SESSION["register_error"]="Tài khoản ".$taikhoan." đã tồn tại! Nhập lại!";
// 		header("Location: register_customer.php");
// 	} else {
// 		$sql_insert = "insert into khachhang(TaiKhoan,MatKhau,HoTen,Email,SoDienThoai,DiaChi) values ('".$taikhoan."','".$matkhau."','".$hoten."','".$email."','".$sodienthoai."','".$diachi."')";
// 		if ($conn->query($sql_insert)==TRUE){
// 			$_SESSION["login_success"]="Đăng ký thành công!";
// 			header("Location: register_customer.php");
// 		} else {
// 			$_SESSION["register_error"] = "Đăng ký không thành công, vui lòng làm lại!";
// 			header("Location: register_customer.php");
// 		}
// 	}
// 	$conn->close();

	//request form
	if($_SERVER['REQUEST_METHOD']=='POST') {
		//khai báo bảng error để chứa lỗi ví dụ trong trường hoten thì có [phải nhập, có ít nhất 5 ký tự]
		$error = [];
		
		//validate hoten
		if(empty(trim($_POST['hoten']))) {
			$error['hoten']['required'] = "Họ tên không được để trống";
		} else {
			if(strlen($_POST['hoten'])<5) {
				$error['hoten']['min'] = "Họ tên phải lớn hơn 5 ký tự";
			}
		}

		//validate taikhoan
		if(empty(trim($_POST['taikhoan']))) {
			$error['taikhoan']['required'] = "Tài khoản không được để trống";
		} else {
			if(strlen($_POST['taikhoan'])<5) {
				$error['taikhoan']['min'] = "Tài khoản phải lớn hơn 5 ký tự";
			}
		}

		//validate matkhau
		if(empty(trim($_POST['matkhau']))) {
			$error['matkhau']['required'] = "Mật khẩu không được để trống";
		} else {
			if(strlen($_POST['matkhau'])<6) {
				$error['matkhau']['min'] = "Mật khẩu phải có ít nhất 6 ký tự";
			}
		}

		//validate email
		if(empty(trim($_POST['email']))) {
			$error['email']['required'] = "Email không được để trống";
		} else {
			if(!filter_var(trim($POST['email']), FILTER_VALIDATE_EMAIL)) {
				$error['email']['invalid'] = "Email không hợp lệ";
			}
		}

		//validate số điện thoại
		if(empty(trim($_POST['sodienthoai']))) {
			$error['sodienthoai']['required'] = "Số điện thoại không được để trống";
		}


	}
