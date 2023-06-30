  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/style_header.css"> -->
    <title>Thương hiệu</title>
  </head>

  <body>
    <?php include '../admin/view_admin.php'; ?>
    <div class="content-wrapper" style="padding: 20px;">
      <?php
      if (isset($_SESSION["brand_success"])) {
        echo "<div class='alert alert-success' role='alert'>" . $_SESSION["brand_success"] . "</div>";
        unset($_SESSION["brand_success"]);
      }
      ?>
      <h3 align="center">Danh sách thương hiệu</h3>
      <a href="Brand_add.php" class="btn btn-success productadd">Thêm mới</a>
      <br>
      <table class="table" style="margin-top: 10px; background-color: #fff;">
        <thead class="table-dark">
          <tr>
            <th style="width: 10%">Mã thương hiệu</th>
            <th style="width: 20%">Tên thương hiệu</th>
            <th style="width: 30%">Ảnh</th>
            <th style="width: 10%">Trạng thái</th>
            <th style="width: 10%">Chức năng</th>
          </tr>
        </thead>
        <tbody>
          <?php
          //kết nối csdl
          require_once('../../controllers/connect.php');

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
              <td><img src='../../../public/image/brand/<?php echo $r["Anh"]; ?>' width=100></td>
              <td><?php echo $r['Status']; ?></td>
              <td>
                <a href="./brand_edit.php?mathuonghieu=<?php echo $r['MaThuongHieu']; ?>"> <button type="button" class="btn btn-primary">Sửa</button></a>
                <a onclick="return confirm('Bạn có muốn xóa không?');" href="../../models/admin/brand_delete_action.php?mathuonghieu=<?php echo $r['MaThuongHieu']; ?>" class="btn btn-danger">Xóa</a>
              </td>
            </tr>
          <?php
          }
          ?>
        </tbody>
      </table>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script>
      window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
          $(this).remove();
        });
      }, 4000);
    </script>

    <script>
      $(function() {
        $('#confirm-delete').on('show.bs.modal', function(e) {
          $(this).find('.btn-delete').attr('href', $(e.relatedTarget).data('href'));
        });
      });
    </script>

  </body>

  </html>