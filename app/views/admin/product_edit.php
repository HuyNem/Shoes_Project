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
        $PID = $_POST["pid"];
        $tensp = $_POST["tensp"];
        $soluong = $_POST["soluong"];
        $gia = $_POST["gia"];
        $anhsp = $_FILES["anhsp"]["name"];
        $mausp = $_POST["mausp"];
        $kichthuoc = $_POST["kichthuoc"];
        $mota = $_POST["mota"];
        $thuonghieu = $_POST["thuonghieu"];

        //kiem tra xem tensp da co chua
        $sql = "select * from sanpham where TenSP='" . $tensp . "'and PID<>" . $PID;
        $result = $conn->query($sql) or die($conn->error);

        if ($result->num_rows > 0) {
            $_SESSION["brand_edit_error"] = "Tên sản phẩm " . $tensp . " exist!";
            header("Location: product_edit.php");
        } else {
            // luu target folder cho image:
            $target_file = "../../../public/image/product/" . $anhsp;
            // luu query:
            $sql1 = "";
            if ($anhsp != "") {
                if (move_uploaded_file($_FILES["anhsp"]["tmp_name"], $target_file)) {
                    $sql1 = "UPDATE sanpham SET TenSP='" . $tensp . "', SoLuong='" . $soluong . "', Gia='" . $gia . "', AnhSP='" . $anhsp . "', IDMau='" . $mausp . "', IDKichThuoc='" . $kichthuoc . "', MaThuongHieu='" . $thuonghieu . "', MoTa='" . $mota . "' WHERE PID = " . $PID;
                }
            } else {
                $sql1 = "UPDATE sanpham SET TenSP='" . $tensp . "', SoLuong='" . $soluong . "', Gia='" . $gia . "', IDMau='" . $mausp . "', IDKichThuoc='" . $kichthuoc . "', MaThuongHieu='" . $thuonghieu . "', MoTa='" . $mota . "'  WHERE PID = " . $PID;
            }

            if ($conn->query($sql1) == TRUE) {
                $_SESSION["product_error"] = "Sửa thành công!";
                $_SESSION["product_edit_error"] = "";
                header("Location: product_view.php");
            } else {
                $_SESSION["product_error"] = $sql . " " . $conn->error;
                $_SESSION["product_edit_error"] = "";
                header("Location: product_edit.php");
            }
        }
    }
}


//lấy dữ liệu trong csdl đổ lên form
$PID = $_REQUEST["pid"];
require("../../controllers/connect.php");
$sql = "select * from sanpham where PID=" . $PID;
$result = $conn->query($sql) or die($conn->error);
if ($result->num_rows > 0) {
    $r = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa sản phẩm</title>
</head>

<body>
    <?php include '../admin/view_admin.php'; ?>
    <section class="content-wrapper" style="padding: 20px 100px 20px 100px;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3>Sửa sản phẩm</h3>
                        </div>
                        <form method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                <input type="hidden" name="pid" value="<?php echo $r['PID']; ?>" id="">
                                <!-- Tên sản phẩm -->
                                <div class="form-group">

                                    <label for="tensp">Tên sản phẩm: </label>
                                    <input type="text" class="form-control" id="tensp" name="tensp" value="<?php echo $r['TenSP']; ?>">
                                    <!-- Báo lỗi -->
                                    <?php
                                    echo (isset($error['tensp'])) ?
                                        '<span style="color: red;">' . $error['tensp'] . '</span>' : false;
                                    ?>

                                </div>

                                <!-- Số lượng -->
                                <div class="form-group">

                                    <label for="soluong">Số lượng:</label>
                                    <input type="number" class="form-control" id="soluong" name="soluong" value="<?php echo $r['SoLuong']; ?>">
                                    <?php
                                    echo (isset($error['soluong'])) ?
                                        '<span style="color: red;">' . $error['soluong'] . '</span>' : false;
                                    ?>

                                </div>

                                <!-- Giá -->
                                <div class="form-group">

                                    <label for="gia">Giá:</label>
                                    <input type="number" class="form-control" id="gia" name="gia" value="<?php echo $r['Gia']; ?>">
                                    <?php
                                    echo (isset($error['gia'])) ?
                                        '<span style="color: red;">' . $error['gia'] . '</span>' : false;
                                    ?>

                                </div>

                                <!-- Ảnh -->
                                <div class="form-group">

                                    <label for="anhsp">Ảnh sản phẩm:</label>
                                    <img class="rounded mx-auto d-block" src="../../../public/image/product/<?php echo $r['AnhSP']; ?>" style="padding-bottom: 10px; width: 300px;">
                                    <input class="form-control" type="file" id="anhsp" name="anhsp">

                                </div>

                                <!-- Màu sản phẩm -->
                                <div class="form-group">
                                    <label for="mausp">Màu sản phẩm: </label>
                                    <select class="form-select" aria-label="Default select example" id="mausp" name="mausp">
                                        <?php
                                        //lấy danh sách màu sản phẩm
                                        $sql = "SELECT * FROM mausp";
                                        $result = mysqli_query($conn, $sql);
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            //Nếu Mã thương hiệu bằng với mã thương hiệu của sản phẩm đang sửa, chọn thương hiệu đó
                                            $selected = "";
                                            if ($row['IDMau'] == $r['IDMau']) {
                                                $selected = "selected";
                                            }
                                        ?>
                                            <option name="idmau" value="<?php echo $row['IDMau']; ?>" <?php echo $selected; ?>><?php echo $row['tenmau']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>

                                <!-- Kích thước -->
                                <div class="form-group">
                                    <label for="kichthuoc">Kích thước: </label>
                                    <select class="form-select" aria-label="Default select example" id="kichthuoc" name="kichthuoc">
                                        <?php
                                        //lấy danh sách thương hiệu
                                        $sql = "SELECT * FROM kichthuocsp";
                                        $result = mysqli_query($conn, $sql);
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            //Nếu Mã thương hiệu bằng với mã thương hiệu của sản phẩm đang sửa, chọn thương hiệu đó
                                            $selected = "";
                                            if ($row['IDKichThuoc'] == $r['IDKichThuoc']) {
                                                $selected = "selected";
                                            }
                                        ?>
                                            <option name="idkichthuoc" value="<?php echo $row['IDKichThuoc']; ?>" <?php echo $selected; ?>><?php echo $row['kichthuoc']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>

                                <!-- Tên thương hiệu -->
                                <div class="form-group">
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
                                <div class="form-group">
                                    <label for="mota">Mô tả:</label>
                                    <textarea type="text" class="form-control" id="mota" name="mota"> <?php echo $r['MoTa']; ?></textarea>
                                    <?php
                                    echo (isset($error['mota'])) ?
                                        '<span style="color: red;">' . $error['mota'] . '</span>' : false;
                                    ?>
                                    
                                </div>
                            </div>
                            <div class="card-footer">
                                <input type="hidden" value="<?php echo $PID; ?>" name="pid">
                                <button type="submit" class="btn btn-primary">Sửa</button>
                                <a href="product_view.php" class="btn btn-danger">Hủy</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>