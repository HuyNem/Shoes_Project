<?php
    // Xóa tất cả các biến session
    session_start();
    session_unset();
    session_destroy();

    // Chuyển hướng đến trang đăng nhập
    header("Location: login_customer.php");
exit();
?>