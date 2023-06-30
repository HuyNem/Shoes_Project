<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $error = array();

    //validate tensp
    if (empty($_POST['tensp'])) {
        $error['tensp'] = "Tên sản phẩm không được để trống";
    }

    //validate soluong
    if (empty($_POST['soluong'])) {
        $error['soluong'] = "Số lượng không được để trống";
    }

    //validate gia
    if (empty($_POST['gia'])) {
        $error['gia'] = "Giá không được để trống";
    }

    //validate anh
    if (empty($_FILES['anhsp'])) {
        $error['anhsp'] = "Vui lòng chọn ảnh";
    }

    //validate mota
    if (empty($_POST['mota'])) {
        $error['mota'] = "Mô tả không được để trống";
    }

    //nếu mà điền đầy đủ thông tin
    if (empty($error)) {
        require("../../controllers/connect.php");
        //khai báo biến
        $tensp = $_POST["tensp"];
        $soluong = $_POST["soluong"];
        $gia = $_POST["gia"];
        $anhsp = $_FILES["anhsp"]["name"];
        $mausp = $_POST["mausp"];
        $kichthuoc = $_POST["kichthuoc"];
        $mota = $_POST["mota"];
        $mathuonghieu = $_POST["thuonghieu"];

        $taget_file = "../../../public/image/product/$anhsp"; //đây là được dẫn cuối cùng mà bức ảnh được tải lên sẽ được lưu trữ lên server
        if (move_uploaded_file($_FILES["anhsp"]["tmp_name"], $taget_file)) {
            $sql = "INSERT INTO sanpham(TenSP, SoLuong, Gia, AnhSP, IDMau, IDKichThuoc, MoTa, MaThuongHieu) 
                VALUES ('" . $tensp . "', '" . $soluong . "','" . $gia . "','" . $anhsp . "','" . $mausp . "','" . $kichthuoc . "','" . $mota . "','" . $mathuonghieu . "')";
            if ($conn->query($sql) == TRUE) {
                $_SESSION["product_success"] = "Thêm mới thành công";
                $_SESSION["product_addedit_success"] = "";
                header("Location: http://localhost/shoes_Project/app/views/admin/product_view.php");
            } else {
                $_SESSION["product_error"] = $sql . " " . $conn->error;
                $_SESSION["product_addedit_error"] = "";
                header("Location: product_view.php");
            }
        }
        $conn->close();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm</title>
</head>

<body>
    <!-- Content Header (Page header) -->
    <?php include '../admin/view_admin.php'; ?>
    <section class="content-wrapper" style="padding: 20px 100px 20px 100px;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Thêm sản phẩm</h3>
                        </div>

                        <?php
                        if (isset($_SESSION["Brand_add_error"])) {
                            echo "<div class='alert alert-danger' role='alert'>" . $_SESSION["Brand_add_error"] . "</div>";
                            unset($_SESSION["Brand_add_error"]);
                        }
                        ?>

                        <form method=POST enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="tensp">Tên sản phẩm: </label>
                                    <input type="text" class="form-control" id="tensp" name="tensp" value="<?php echo (!empty($_POST['tensp'])) ? $_POST['tensp'] : false; ?>">
                                    <!-- Báo lỗi -->
                                    <?php
                                    echo (isset($error['tensp'])) ?
                                        '<span style="color: red;">' . $error['tensp'] . '</span>' : false;
                                    ?>
                                </div>

                                <div class="form-group">
                                    <label for="soluong">Số lượng:</label>
                                    <input type="number" class="form-control" id="soluong" name="soluong" value="<?php echo (!empty($_POST['soluong'])) ? $_POST['soluong'] : false; ?>">
                                    <!-- Báo lỗi -->
                                    <?php
                                    echo (isset($error['soluong'])) ?
                                        '<span style="color: red;">' . $error['soluong'] . '</span>' : false;
                                    ?>
                                </div>

                                <div class="form-group">
                                    <label for="gia">Giá:</label>
                                    <input type="number" class="form-control" id="gia" name="gia" value="<?php echo (!empty($_POST['gia'])) ? $_POST['gia'] : false; ?>">
                                    <!-- Báo lỗi -->
                                    <?php
                                    echo (isset($error['gia'])) ?
                                        '<span style="color: red;">' . $error['gia'] . '</span>' : false;
                                    ?>
                                </div>

                                <div class="form-group">
                                    <label for="anhsp">Ảnh sản phẩm:</label>
                                    <input class="" type="file" id="anhsp" name="anhsp">
                                </div>
                                <?php
                                echo (isset($error['anhsp'])) ?
                                    '<span style="color: red;">' . $error['anhsp'] . '</span>' : false;
                                ?>
                                <div class="form-inline" style="margin: 20px 0px 20px 0px;">
                                    <div class="form-group" style="margin-right: 100px;">
                                        <label for="mausp" style="margin-right: 10px;">Màu sản phẩm: </label>
                                        <select class="form-select" aria-label="Default select example" id="mausp" name="mausp">
                                            <?php
                                            require_once('../../controllers/connect.php');
                                            $lietke_sql = "SELECT IDMau, tenmau FROM mausp";
                                            $result = mysqli_query($conn, $lietke_sql);

                                            while ($r = mysqli_fetch_assoc($result)) {
                                            ?>
                                                <option>
                                                    <?php
                                                        echo $r['IDMau'];
                                                        echo " ";
                                                        echo $r['tenmau']; 
                                                    ?>
                                                </option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="form-group" style="margin-right: 100px;">
                                        <label for="kichthuoc" style="margin-right: 10px;">Kích thước: </label>
                                        <select class="form-select" aria-label="Default select example" id="kichthuoc" name="kichthuoc">
                                            <?php
                                            require_once('../../controllers/connect.php');
                                            $lietke_sql = "SELECT IDKichThuoc, kichthuoc FROM kichthuocsp";
                                            $result = mysqli_query($conn, $lietke_sql);

                                            while ($r = mysqli_fetch_assoc($result)) {
                                            ?>
                                                <option>
                                                    <?php
                                                        echo $r['IDKichThuoc'];
                                                        echo " ";
                                                        echo $r['kichthuoc']; 
                                                    ?>
                                                </option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="thuonghieu" style="margin-right: 10px;">Thương hiệu: </label>
                                        <select class="form-select" aria-label="Default select example" id="thuonghieu" name="thuonghieu">
                                            <?php
                                            require_once('../../controllers/connect.php');
                                            $lietke_sql = "SELECT MaThuongHieu, TenThuongHieu FROM thuonghieu";
                                            $result = mysqli_query($conn, $lietke_sql);

                                            while ($r = mysqli_fetch_assoc($result)) {
                                            ?>
                                                <option>
                                                <?php
                                                    echo $r['MaThuongHieu'];
                                                    echo " ";
                                                    echo $r['TenThuongHieu']; 
                                                ?>
                                                </option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="mota">Mô tả:</label>
                                    <textarea type="text" class="form-control" id="mota" name="mota"> </textarea>
                                    <?php
                                    echo (isset($error['mota'])) ?
                                        '<span style="color: red;">' . $error['mota'] . '</span>' : false;
                                    ?>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Thêm</button>
                                <a href="product_view.php" class="btn btn-danger">Hủy</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 4000);
    </script>


</body>

</html>