<?php
require_once('../../controllers/connect.php');
//đoạn mã tìm kiếm
if (isset($_GET['voi_tu_khoa'])) {

    $keyword = $_GET['voi_tu_khoa'];

    // Chuyển từ khóa tìm kiếm thành dạng phù hợp cho truy vấn SQL
    $keyword = "%" . $keyword . "%";

    $searchQuery = "SELECT *
                    FROM khachhang
                    WHERE HoTen LIKE ?";


    if (!empty($searchQuery)) {
        // Chuẩn bị truy vấn SQL với sử dụng Prepared Statements
        $stmt = mysqli_prepare($conn, $searchQuery);
        mysqli_stmt_bind_param($stmt, "s", $keyword);
        mysqli_stmt_execute($stmt);

        // Lấy kết quả tìm kiếm
        $r = mysqli_stmt_get_result($stmt);
        $customers = mysqli_fetch_all($r, MYSQLI_ASSOC);

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
    <title>Danh sách khách hàng</title>
</head>

<body>
    <?php include '../admin/view_admin.php'; ?>
    <section class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Danh sách khách hàng</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <div class="row" style="padding-bottom: 10px;">
                                <div class="">
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
                                        <th>Tài khoản</th>
                                        <th>Họ tên</th>
                                        <th>Email</th>
                                        <th>Số điện thoại</th>
                                        <th>Địa chỉ</th>
                                        <th>Ảnh</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    if (!empty($customers)) {
                                        foreach ($customers as $customer) {
                                    ?>
                                            <tr>
                                                <td><?php echo $customer['CusID']; ?></td>
                                                <td><?php echo $customer['TaiKhoan']; ?></td>
                                                <td><?php echo $customer['HoTen']; ?></td>
                                                <td><?php echo $customer['Email']; ?></td>
                                                <td><?php echo $customer['SoDienThoai']; ?></td>
                                                <td><?php echo $customer['DiaChi']; ?></td>
                                                <td><?php echo $customer['AnhCus']; ?></td>
                                            </tr>
                                    <?php
                                        }
                                    }
                                    ?>

                                    <?php
                                    if (empty($customers)) {
                                        //kết nối csdl
                                        require_once('../../controllers/connect.php');

                                        //câu lệnh liệt kê
                                        $lietke_sql = "SELECT *
                                                   FROM khachhang
                                                   ORDER BY CusID, HoTen DESC LIMIT $begin,3";

                                        //thực thi câu lệnh
                                        $result = mysqli_query($conn, $lietke_sql);

                                        //duyệt qua result và in ra
                                        while ($r = mysqli_fetch_assoc($result)) { //đưa từng hàng vào trong $r
                                    ?>

                                            <tr>
                                                <td><?php echo $r['CusID']; ?></td>
                                                <td><?php echo $r['TaiKhoan']; ?></td>
                                                <td><?php echo $r['HoTen']; ?></td>
                                                <td><?php echo $r['Email']; ?></td>
                                                <td><?php echo $r['SoDienThoai']; ?></td>
                                                <td><?php echo $r['DiaChi']; ?></td>
                                                <td><img class="" src='../../../public/image/customer/<?php echo $r["AnhCus"]; ?>' width="50"></td>
                                            </tr>

                                    <?php
                                        }
                                    }
                                    ?>

                                </tbody>

                            </table>
                        </div>
                        <!-- /.card-body -->
                        <?php
                        // Kết nối CSDL
                        require_once('../../controllers/connect.php');

                        // Câu truy vấn
                        $sql_trang = "SELECT * FROM khachhang";

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
                                    <li class="page-item"><a class="page-link" href="customer_list.php?trang=<?php echo $i ?>"><?php echo $i ?></a></li>
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