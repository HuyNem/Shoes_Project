
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/style_header.css"> -->
    <title>Document</title>
</head>

<body>
    <div class="container">
        <h3 align="center">Danh sách thương hiệu</h3>
        <a href="Brand_add.php" class="btn btn-success productadd">Thêm mới</a>
        <br>

        <table class="table" style="margin-top: 10px; background-color: #fff;">
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
                        <td><img src='./image/brand/<?php echo $r["Anh"]; ?>' width=100></td>
                        <td><?php echo $r['Status']; ?></td>
                        <td>
                            <a href="brand_edit.php?mathuonghieu=<?php echo $r['MaThuongHieu']; ?>"> <button type="button" class="btn btn-primary">Sửa</button></a>
                            <a onclick="return confirm('Bạn có muốn xóa không?');" href="brand_delete_action.php?mathuonghieu=<?php echo $r['MaThuongHieu']; ?>"><button type="button" class="btn btn-danger">Xóa</button></a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>

    <script>
  $(document).ready(function() {
    // Xử lý sự kiện click cho button "Quản trị thương hiệu"
    $(".productadd").click(function(event) {
      event.preventDefault(); // Ngăn chặn hành vi mặc định của link

      // Gửi yêu cầu AJAX để tải nội dung của trang quản trị thương hiệu
      $.ajax({
        url: "brand_add.php",
        method: "GET",
        success: function(response) {
          // Thay đổi nội dung của phần Content Wrapper bằng nội dung của trang quản trị thương hiệu
          $(".content-wrapper").html(response);
        },
        error: function() {
          // Xử lý lỗi (nếu có)
          alert("Đã xảy ra lỗi khi tải trang quản trị thương hiệu");
        }
      });
    });
  });
  </script>

</body>

</html>