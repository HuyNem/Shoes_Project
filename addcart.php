<?php
// Lấy IDProduct
$idProduct = $_GET["idproduct"];

// Do something...
if (!is_null($idProduct) && $idProduct !== "") {
    // Kết nối đến cơ sở dữ liệu
    $connDB = new mysqli("servername", "username", "password", "database");
    
    // Chuẩn bị và thực thi truy vấn
    $stmt = $connDB->prepare("SELECT * FROM SANPHAM WHERE masp=?");
    $stmt->bind_param("s", $idProduct);
    $stmt->execute();
    
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        // ID tồn tại
        // Kiểm tra tồn tại của session
        session_start();
        
        if (isset($_SESSION["mycarts"]) && !empty($_SESSION["mycarts"])) {
            // Session tồn tại
            $currentCarts = $_SESSION["mycarts"];
            
            if (array_key_exists($idProduct, $currentCarts)) {
                // Khóa đã tồn tại
                $value = intval($currentCarts[$idProduct]) + 1;
                $currentCarts[$idProduct] = $value;
            } else {
                // Khóa chưa tồn tại
                $currentCarts[$idProduct] = 1;
            }
            
            // Lưu giá trị session mới
            $_SESSION["mycarts"] = $currentCarts;
        } else {
            $quantity = 1;
            
            $mycarts = array();
            $mycarts[$idProduct] = $quantity;
            
            // Tạo session cho giỏ hàng của tôi
            $_SESSION["mycarts"] = $mycarts;
            
            echo "Session created!";
        }
        
        $_SESSION["Success"] = "The Product has been added to your cart.";
    } else {
        $_SESSION["Error"] = "The Product does not exist, please try again.";
    }
    
    $stmt->close();
    $connDB->close();
    
    header("Location: products.php");
    exit;
}
?>
