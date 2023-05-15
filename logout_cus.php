<?php
    // Xóa tất cả các biến session
    session_unset();

    // Chuyển hướng đến trang đăng nhập
    header("Location: login_customer.php");
exit();
?>