<?php
session_start();
require("./controllers/connect.php");
$taikhoan = $_POST["taikhoan"];
$matkhau = $_POST["matkhau"];
//kiem tra xem co trong CSDL hay khong
$sql = "select * from admin where taikhoan='" . $taikhoan . "' and matkhau='" . $matkhau . "'";
$result = $conn->query($sql) or die($conn->error);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $_SESSION["taikhoan"] = $row["taikhoan"];
    $_SESSION["login_error"] = "";
    $_SESSION["login"] = TRUE;
    header("Location: homepage_admin.php");
} else {
    $_SESSION["login_error"] = "Username or Password incorrect! Please try again!";
    $_SESSION["login"] = FALSE;
    header("Location: login.php");
}
$conn->close();

?>
