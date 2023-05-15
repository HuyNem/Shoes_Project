<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}


if (!isset($_SESSION["brand_edit_error"])) {
	$_SESSION["brand_edit_error"] = "";
}

require("./controllers/connect.php");
//$mathuonghieu = $_REQUEST["mathuonghieu"];
$mathuonghieu = $_REQUEST["mathuonghieu"];
$tenthuonghieu = $_POST["tenthuonghieu"];
$anhthuonghieu = $_FILES["anhthuonghieu"]["name"];
$cstatus = $_POST["rdCstatus"];

//kiem tra xem cname da co chua
$sql = "select * from thuonghieu where TenThuongHieu='" . $tenthuonghieu . "'and MaThuongHieu<>" . $mathuonghieu;
$result = $conn->query($sql) or die($conn->error);

if ($result->num_rows > 0) {
	$_SESSION["brand_edit_error"] = "Brand Name " . $tenthuonghieu . " exist!";
	header("Location: brand_edit.php");
} else {
	// luu target folder cho image:
	$target_file = "./image/brand/" . $anhthuonghieu;
	// luu query:
	$sql1 = "";
	if ($anhthuonghieu != "") {
		if (move_uploaded_file($_FILES["anhthuonghieu"]["tmp_name"], $target_file)) {
			$sql1 = "update thuonghieu set TenThuongHieu='" . $tenthuonghieu . "', Anh='" . $anhthuonghieu . "',Status=" . $cstatus . " where MaThuongHieu = " . $mathuonghieu;
		} else {
			$sql1 = "update thuonghieu set TenThuongHieu='" . $tenthuonghieu . "',Status=" . $cstatus . " where MaThuongHieu = " . $mathuonghieu;
		}
		if ($conn->query($sql1) == TRUE) {
			$_SESSION["brand_error"] = "Edit success!";
			$_SESSION["brand_edit_error"] = "";
			header("Location: brand_view.php");
		} else {
			$_SESSION["brand_error"] = $sql . " " . $conn->error;
			$_SESSION["brand_edit_error"] = "";
			header("Location: brand_view.php");
		}
	}
}
//echo $cname.$cimage.$cstatus;
$conn->close();
