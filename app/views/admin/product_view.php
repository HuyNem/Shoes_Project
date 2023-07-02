<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php include '../admin/view_admin.php'; ?>
    <section class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Danh sách sản phẩm</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <a href="product_add.php" class="btn btn-success float-end" style="margin-bottom: 10px;">Thêm mới</a>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Tên</th>
                                        <th>Số lượng</th>
                                        <th>Giá</th>
                                        <th>Màu</th>
                                        <th>Kích thước</th>
                                        <th style="width: 13%;">Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    //kết nối csdl
                                    require_once('../../controllers/connect.php');

                                    //câu lệnh liệt kê
                                    $lietke_sql = "SELECT s.PID, s.TenSP, s.SoLuong, s.Gia, m.tenmau, k.kichthuoc 
                                                   FROM sanpham s INNER JOIN mausp m ON s.IDMau = m.IDMau
                                                   INNER JOIN kichthuocsp k ON s.IDKichThuoc = k.IDKichThuoc
                                                   ORDER BY PID, TenSP";

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
                                            <td><?php echo $r['tenmau']; ?></td>
                                            <td><?php echo $r['kichthuoc']; ?></td>
                                            <td>
                                                <a href="product_edit.php?pid=<?php echo $r['PID']; ?>"> <button type="button" class="btn btn-primary">Sửa</button></a>
                                                <a onclick="return confirm('Bạn có muốn xóa không?');" href="../../models/admin/product_delete_action.php?pid=<?php echo $r['PID']; ?>"><button type="button" class="btn btn-danger">Xóa</button></a>
                                            </td>
                                        </tr>

                                    <?php
                                    }
                                    ?>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>id</th>
                                        <th>Tên</th>
                                        <th>Số lượng</th>
                                        <th>Giá</th>
                                        <th>Màu</th>
                                        <th>Kích thước</th>
                                        <th>Chức năng</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>

</body>

</html>
<?php
?>