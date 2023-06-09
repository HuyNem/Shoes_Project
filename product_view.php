<?php
session_start();
if (isset($_SESSION["taikhoan"])) {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>

    <body>
        <?php include './views/view_admin.php'; ?>
        <div class="content-wrapper" style="padding: 20px;">
            <h3 style="text-align: center;">Danh sách sản phẩm</h3>
            <a href="product_add.php" class="btn btn-success float-end" style="margin-bottom: 10px;">Thêm mới</a>
            <br>

            <table class="table" style="background-color: #fff;">
                <thead class="table-dark">
                    <tr>
                        <th>Mã sản phẩm</th>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Giá</th>
                        <th>Ảnh</th>
                        <th>Màu</th>
                        <th>Kích thước</th>
                        <th>Mã thương hiệu</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //kết nối csdl
                    require_once('./controllers/connect.php');

                    //câu lệnh liệt kê
                    $lietke_sql = "SELECT * FROM sanpham ORDER BY PID, TenSP";

                    //thực thi câu lệnh
                    $result = mysqli_query($conn, $lietke_sql);

                    //duyệt qua result và in ra
                    while ($r = mysqli_fetch_assoc($result)) { //đưa từng hàng vào trong $r
                    ?>
                        <tr>
                            <td><?php echo $r['PID']; ?></td>
                            <td><?php echo $r['TenSP']; ?></td>
                            <td><?php echo $r['SoLuong']; ?></td>
                            <td><?php echo $r['Gia']; ?></td>
                            <td><img src='./image/product/<?php echo $r["AnhSP"]; ?>' alt="" width=100px></td>
                            <td><?php echo $r['MauSP']; ?></td>
                            <td><?php echo $r['KichThuocSP']; ?></td>
                            <td><?php echo $r['MaThuongHieu']; ?></td>
                            <td>
                                <a href="product_edit.php?pid=<?php echo $r['PID']; ?>"> <button type="button" class="btn btn-primary">Sửa</button></a>
                                <a onclick="return confirm('Bạn có muốn xóa không?');" href="product_delete_action.php?pid=<?php echo $r['PID']; ?>"><button type="button" class="btn btn-danger">Xóa</button></a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </body>

    </html>
<?php
} else {
    header("Location: login_admin.php");
    exit();
}
?>