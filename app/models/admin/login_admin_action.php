<?php
session_start();
require("../../controllers/connect.php");
$taikhoan = $_POST["taikhoan"];
$matkhau = $_POST["matkhau"];
//kiem tra xem co trong CSDL hay khong
$sql = "select * from admin where taikhoan='" . $taikhoan . "' and matkhau='" . $matkhau . "'";
$result = $conn->query($sql) or die($conn->error);
if (empty($_POST["taikhoan"]) || empty($_POST["matkhau"])){
    $_SESSION["login_error"] = "Bạn chưa nhập tài khoản hoặc mật khẩu";
    $_SESSION["login"] = FALSE;
    header("Location: ../../views/admin/login_admin.php");
}
else if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $_SESSION["taikhoan"] = $row["taikhoan"];
    $_SESSION["login_error"] = "";
    $_SESSION["login"] = TRUE;
    header("Location: ../../views/admin/view_admin.php");
} else {
    $_SESSION["login_error"] = "Tài khoản hoặc mật khẩu không chính xác!";
    $_SESSION["login"] = FALSE;
    header("Location: ../../views/admin/login_admin.php");
}
$conn->close();

?>
