<?php
    //Kết nối với cơ sở dữ liệu thông qua file connection.php.
    session_start();
    include_once('./controllers/connect.php');

    $taikhoan=$_POST["taikhoan"];
	$matkhau=md5($_POST["matkhau"]);

    //kiem tra xem co trong CSDL hay khong
    $sql="select * from khachhang where TaiKhoan='".$taikhoan."' and MatKhau='".$matkhau."'";
	$result = $conn->query($sql) or die($conn->error);

    if (empty($_POST["taikhoan"]) || empty($_POST["matkhau"])){
		$_SESSION["login_error"] = "Bạn chưa nhập tài khoản hoặc mật khẩu";
		$_SESSION["login"] = FALSE;
		header("Location: login_customer.php");
	}
	else if ($result->num_rows>0) {
		$row = $result->fetch_assoc();
		$_SESSION["HoTen"] = $row["HoTen"];
		$_SESSION["login_error"] = "";
		$_SESSION["login"]=TRUE;

		// them uid vao session:
		$_SESSION["CusID"] = $row["CusID"];
		header("Location: home.php");
	} else {
		$_SESSION["login_error"]="Tài khoản hoặc mật khẩu không chính xác, vui lòng nhập lại!";
		$_SESSION["login"] = FALSE;
		header("Location: login_customer.php");
	}
	$conn->close();

?>
