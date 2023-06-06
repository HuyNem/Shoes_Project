<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if ($_SESSION["login"] == FALSE) {
    //phải đăng nhập thì mới cho vào
    $_SESSION["login_error"] = "Please login!";
    header("Location: login_admin.php");
}
if (!isset($_SESSION["product_edit_error"]))
    $_SESSION["product_edit_error"] = "";

$PID = $_REQUEST["pid"];
require("./controllers/connect.php");
$sql = "select * from sanpham where PID=" . $PID;
$result = $conn->query($sql) or die($conn->error);
if ($result->num_rows > 0) {
    $r = $result->fetch_assoc();
}

?>

<header>
    <link rel="stylesheet" href="./css/style_product_edit.css">
</header>

<body>
    <?php include './views/header_admin.php'; ?>
    <div class="container">
        <div class="container w-50 mt-3">
            <div class="product-edit">
                <h3 style="text-align: center;">Sửa sản phẩm</h3>
                <form method="POST" enctype="multipart/form-data" action="product_edit_action.php">
                    <input type="hidden" name="pid" value="<?php echo $pid; ?>" id="">
                    <div class="row">
                        <!-- Tên sản phẩm -->
                        <div class="mb-3 mt-3">
                            <label for="tensp">Tên sản phẩm: </label>
                            <input type="text" class="form-control" id="tensp" name="tensp" value="<?php echo $r['TenSP']; ?>">
                        </div>

                        <!-- Số lượng -->
                        <div class="mb-3">
                            <label for="soluong">Số lượng:</label>
                            <input type="number" class="form-control" id="soluong" name="soluong" value="<?php echo $r['SoLuong']; ?>">
                        </div>

                        <!-- Giá -->
                        <div class="mb-3">
                            <label for="gia">Giá:</label>
                            <input type="number" class="form-control" id="gia" name="gia" value="<?php echo $r['Gia']; ?>">
                        </div>

                        <!-- Ảnh -->
                        <div class="mb-3">
                            <label for="anhsp">Ảnh sản phẩm:</label>
                            <img class="rounded mx-auto d-block" src="./image/product/<?php echo $r['AnhSP']; ?>" style="padding-bottom: 10px;">
                            <input class="form-control" type="file" id="anhsp" name="anhsp">
                        </div>

                        <script>
                            // Hiển thị ảnh mới khi người dùng chọn ảnh
                            document.getElementById('anhsp').addEventListener('change', function(event) {
                                var file = event.target.files[0];
                                var reader = new FileReader();
                                reader.onload = function(e) {
                                    document.getElementById('preview-image').src = e.target.result;
                                };
                                reader.readAsDataURL(file);
                            });
                        </script>


                        <!-- Màu sản phẩm -->
                        <div class="mb-3">
                            <label for="mausp">Màu sản phẩm</label>
                            <input type="text" class="form-control" id="mausp" name="mausp" value="<?php echo $r['MauSP']; ?>">
                        </div>

                        <!-- Kích thước -->
                        <div class="mb-3">
                            <label for="kichthuoc">Kích thước</label>
                            <input type="number" class="form-control" id="kichthuoc" name="kichthuoc" value="<?php echo $r['KichThuocSP']; ?>">
                        </div>

                        <!-- Tên thương hiệu -->
                        <div class="mb-3">
                            <label for="thuonghieu">Thương hiệu</label>
                            <select class="form-select" aria-label="Default select example" id="thuonghieu" name="thuonghieu">
                                <?php
                                //lấy danh sách thương hiệu
                                $sql = "SELECT * FROM thuonghieu";
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    //Nếu Mã thương hiệu bằng với mã thương hiệu của sản phẩm đang sửa, chọn thương hiệu đó
                                    $selected = "";
                                    if ($row['MaThuongHieu'] == $r['MaThuongHieu']) {
                                        $selected = "selected";
                                    }
                                ?>
                                    <option name="mathuonghieu" value="<?php echo $row['MaThuongHieu']; ?>" <?php echo $selected; ?>><?php echo $row['MaThuongHieu'], " ", $row['TenThuongHieu']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>

                        <!-- Mô tả -->
                        <div class="mb-3">
                            <label for="mota">Mô tả:</label>
                            <textarea type="text" class="form-control" id="mota" name="mota"> <?php echo $r['MoTa']; ?></textarea>
                        </div>
                    </div>

                    <input type="hidden" value="<?php echo $PID; ?>" name="pid">
                    <button type="submit" class="btn btn-primary">Sửa</button>
                    <a href="product_view.php" class="btn btn-danger">Hủy</a>
                </form>
            </div>
        </div>
    </div>
</body>