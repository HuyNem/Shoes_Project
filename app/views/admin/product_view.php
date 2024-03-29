<?php
require_once('../../controllers/connect.php');
//đoạn mã tìm kiếm
if (isset($_GET['voi_tu_khoa'])) {

    $keyword = $_GET['voi_tu_khoa'];

    // Chuyển từ khóa tìm kiếm thành dạng phù hợp cho truy vấn SQL
    $keyword = "%" . $keyword . "%";

    $searchQuery = "SELECT s.PID, s.TenSP, s.SoLuong, s.Gia, m.tenmau, k.kichthuoc 
                    FROM sanpham s
                    INNER JOIN mausp m ON s.IDMau = m.IDMau
                    INNER JOIN kichthuocsp k ON s.IDKichThuoc = k.IDKichThuoc
                    WHERE s.TenSP LIKE ?";


    if (!empty($searchQuery)) {
        // Chuẩn bị truy vấn SQL với sử dụng Prepared Statements
        $stmt = mysqli_prepare($conn, $searchQuery);
        mysqli_stmt_bind_param($stmt, "s", $keyword);
        mysqli_stmt_execute($stmt);

        // Lấy kết quả tìm kiếm
        $r = mysqli_stmt_get_result($stmt);
        $products = mysqli_fetch_all($r, MYSQLI_ASSOC);

        // Đóng Prepared Statements
        mysqli_stmt_close($stmt);
    }
}

if(isset($_GET['trang'])) {
    $page = $_GET['trang'];
} else {
    $page = '';
}
if($page == '' || $page ==1) {
    $begin = 0;
} else {
    $begin = ($page*3)-3;
}
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

                            <div class="row" style="padding-bottom: 10px;">
                                <div class="col-sm-12 col-md-6">
                                    <div class="dt-buttons btn-group flex-wrap">
                                        <a href="product_add.php" class="btn btn-success" style="margin-bottom: 10px;">Thêm mới</a>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 d-flex justify-content-end">
                                    <form class="form-inline" method="get">
                                        <label>Tìm kiếm:
                                            <input type="search" class="form-control form-control-sm" placeholder="" name="voi_tu_khoa">
                                        </label>
                                    </form>
                                </div>
                            </div>

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
                                    if (!empty($products)) {
                                        foreach ($products as $product) {
                                    ?>
                                            <tr>
                                                <td><?php echo $product['PID']; ?></td>
                                                <td><?php echo $product['TenSP']; ?></td>
                                                <td><?php echo $product['SoLuong']; ?></td>
                                                <td><?php echo $product['Gia']; ?></td>
                                                <td><?php echo $product['tenmau']; ?></td>
                                                <td><?php echo $product['kichthuoc']; ?></td>
                                                <td>
                                                    <a href="product_edit.php?pid=<?php echo $product['PID']; ?>"> <button type="button" class="btn btn-primary">Sửa</button></a>
                                                    <a onclick="return confirm('Bạn có muốn xóa không?');" href="../../models/admin/product_delete_action.php?pid=<?php echo $product['PID']; ?>"><button type="button" class="btn btn-danger">Xóa</button></a>
                                                </td>
                                            </tr>
                                    <?php
                                        }
                                    }
                                    ?>

                                    <?php
                                    if (empty($products)) {
                                        //kết nối csdl
                                        require_once('../../controllers/connect.php');

                                        //câu lệnh liệt kê
                                        $lietke_sql = "SELECT s.PID, s.TenSP, s.SoLuong, s.Gia, m.tenmau, k.kichthuoc 
                                                   FROM sanpham s INNER JOIN mausp m ON s.IDMau = m.IDMau
                                                   INNER JOIN kichthuocsp k ON s.IDKichThuoc = k.IDKichThuoc
                                                   ORDER BY PID, TenSP DESC LIMIT $begin,3";

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
                        <?php
                        // Kết nối CSDL
                        require_once('../../controllers/connect.php');

                        // Câu truy vấn
                        $sql_trang = "SELECT * FROM sanpham";

                        // Thực thi truy vấn
                        $result = mysqli_query($conn, $sql_trang);

                        // Kiểm tra và lấy số lượng dòng
                        if ($result) {
                            $row_count = mysqli_num_rows($result);
                            $trang = ceil($row_count/3);
                        } else {
                            echo "Lỗi trong quá trình truy vấn.";
                        }

                        // Đóng kết nối
                        mysqli_close($conn);
                        ?>

                        <div class="clearfix">
                            <div class="col-md-9">
                                <ul class="pagination">
                                    <?php
                                        for($i=1; $i<=$trang; $i++) {
                                    ?>
                                    <li class="page-item"><a class="page-link" href="product_view.php?trang=<?php echo $i ?>"><?php echo $i ?></a></li>
                                    <?php
                                        }
                                    ?>
                                </ul>
                            </div>
                        </div>
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