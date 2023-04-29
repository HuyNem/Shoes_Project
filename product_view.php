<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/style_header.css">
    <title>Sản phẩm</title>
</head>

<body>
    <?php include './views/header_admin.php'; ?>
    <div class="container">
        <h3>Danh sách sản phẩm</h3>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
            Thêm
        </button>
        <br>
        
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th>Mã sản phẩm</th>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Giá</th>
                    <th>Ảnh</th>
                    <th>Màu</th>
                    <th>Kích thước</th>
                </tr>
            </thead>
            <tbody>
                <?php
                //kết nối csdl
                require_once('ketnoi.php');

                //câu lệnh liệt kê
                $lietke_sql = "SELECT * FROM sinhvien ORDER BY masv, hoten";

                //thực thi câu lệnh
                $result = mysqli_query($conn, $lietke_sql);

                //duyệt qua result và in ra
                while ($r = mysqli_fetch_assoc($result)) { //đưa từng hàng vào trong $r
                ?>
                    <tr>
                        <td><?php echo $r['masv']; ?></td>
                        <td><?php echo $r['hoten']; ?></td>
                        <td><?php echo $r['lop']; ?></td>
                        <td>
                            <a href="sua.php?sid=<?php echo $r['id']; ?>"> <button type="button" class="btn btn-primary">Sửa</button></a>
                            <a onclick="return confirm('Bạn có muốn xóa không?');" href="xoa.php?sid=<?php echo $r['id']; ?>"><button type="button" class="btn btn-danger">Xóa</button></a>
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