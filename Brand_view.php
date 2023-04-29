<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/style_header.css">
    <title>Thương hiệu</title>
</head>

<body>
    <?php include './views/header_admin.php'; ?>
    <div class="container">
        <h3 align="center">Danh sách thương hiệu</h3>
        <a href="Brand_add.php" class="btn btn-success float-end">Thêm mới</a>
        <br>

        <table class="table" style="margin-top: 20px;">
            <thead class="table-dark">
                <tr>
                    <th>Mã thương hiệu</th>
                    <th>Tên thương hiệu</th>
                    <th>Ảnh</th>
                    <th>Trạng thái</th>
                    <th>Chức năng</th>
                </tr>
            </thead>
            <tbody>
                <?php
                //kết nối csdl
                require_once('./controllers/connect.php');

                //câu lệnh liệt kê
                $lietke_sql = "SELECT * FROM thuonghieu ORDER BY MaThuongHieu, TenThuongHieu";

                //thực thi câu lệnh
                $result = mysqli_query($conn, $lietke_sql);

                //duyệt qua result và in ra
                while ($r = mysqli_fetch_assoc($result)) { //đưa từng hàng vào trong $r
                ?>
                    <tr>
                        <td><?php echo $r['MaThuongHieu']; ?></td>
                        <td><?php echo $r['TenThuongHieu']; ?></td>
                        <td><img src='./image/<?php echo $r["Anh"]; ?>' width=200></td>
                        <td><?php echo $r['Status']; ?></td>
                        <td>
                            <a href="sua.php?sid=<?php echo $r['MaThuongHieu']; ?>"> <button type="button" class="btn btn-primary">Sửa</button></a>
                            <a onclick="return confirm('Bạn có muốn xóa không?');" href="xoa.php?sid=<?php echo $r['MaThuongHieu']; ?>"><button type="button" class="btn btn-danger">Xóa</button></a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>

    
    <!-- <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                
                <div class="modal-header">
                    <h4 class="modal-title">Thêm Thương Hiệu</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                
                <div class="modal-body">
                    <div class="form-group">
                        <lable for="tenthuonghieu">Tên thương hiệu</lable>
                        <input type="text" id="tenthuonghieu" class="form-control" name="tenthuonghieu">
                    </div>

                    <div class="form-group" style="margin-top: 10px;">
                        <lable for="anhthuonghieu">Ảnh thương hiệu</lable>
                        <input type="file" id="anhthuonghieu" class="form-control" name="anhthuonghieu">
                    </div>

                    <div class="form-group" style="margin-top: 10px;">
                        <input type=radio value=1 checked name=rdCstatus>Active
                        <input type=radio value=0 name=rdCstatus>Inactive
                    </div>
                </div>

                
                <div class="modal-footer">
                    <button type="them" class="btn btn-primary">Thêm</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div> -->
</body>

</html>