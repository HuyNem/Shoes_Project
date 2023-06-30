<?php
session_start();

if (isset($_SESSION["HoTen"]) && isset($_SESSION["CusID"])) {
    // Kiểm tra nếu có thông báo từ trang profile_cus_action.php
    if (isset($_SESSION["update_success"])) {
        echo "<script>alert('Cập nhật thông tin cá nhân thành công.');</script>";
        unset($_SESSION["update_success"]);
    } elseif (isset($_SESSION["update_error"])) {
        echo "<script>alert('Đã xảy ra lỗi khi cập nhật thông tin cá nhân: " . $_SESSION["update_error"] . "');</script>";
        unset($_SESSION["update_error"]);
    }
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Thông tin cá nhân</title>
    </head>

    <body>
        <?php include 'header.php'; ?>

        <?php
        $idCus = $_SESSION["CusID"];

        //kết nối csdl
        require_once('../../controllers/connect.php');

        //câu lệnh lấy dữ liệu từ bảng khách hàng
        $lietke_sql = "SELECT * FROM khachhang WHERE CusID = $idCus";

        //thực thi câu lệnh
        $result = mysqli_query($conn, $lietke_sql);

        //duyệt qua result và in ra
        $r = mysqli_fetch_assoc($result)
        ?>


        <form method="POST" enctype="multipart/form-data" action="../../models/customer/profile_cus_action.php">
            <div class="container rounded bg-white mt-5">
                <div class="row">
                    <div class="col-md-4 border-right">
                        <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                            <img class="rounded-circle mt-5" src='../../../public/image/customer/<?php echo $r["AnhCus"]; ?>' width="150">
                            <div style="padding-top: 20px;">
                            <label for="fileInput" class="btn btn-outline-dark">
                                Chọn ảnh
                                <input id="fileInput" type="file" class="d-none" name="anhcus">
                            </label>
                            </div>
                            <!-- <span class="font-weight-bold"><?php echo $r['HoTen']; ?></span> -->
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="p-3 py-5" style="border-left: 1px solid;">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div class="d-flex flex-row align-items-center back">
                                    <h6><i class="bi bi-arrow-left mr-1 mb-1"></i><a href="home.php">Trở lại trang chủ</a></h6>
                                </div>
                                <h4 class="text-right">Thông tin cá nhân</h4>
                            </div>
                            <div class="row mt-2">
                                <label for="">Họ và tên: </label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="hoten" value="<?php echo $r['HoTen']; ?>">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <label for="">Email: </label>
                                    <input type="text" class="form-control" name="email" value="<?php echo $r['Email']; ?>">
                                </div>

                                <div class="col-md-6">
                                    <label for="">Số điện thoại: </label>
                                    <input type="number" class="form-control" name="sodienthoai" value="<?php echo $r['SoDienThoai']; ?>">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="">Địa chỉ: </label>
                                <div class="col-md-12"><input type="text" class="form-control" name="diachi" value="<?php echo $r['DiaChi']; ?>">
                                </div>
                            </div>
                            <div class="mt-5 text-right">
                                <input type="hidden" value="<?php echo $idCus; ?>" name="cusid">
                                <button class="btn btn-primary profile-button" type="submit">Lưu thông tin</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </body>
<?php
} else {
    $_SESSION["login_error"] = "Bạn chưa đăng nhập!";
    header("Location: login_customer.php");
    exit();
}
?>

    </html>