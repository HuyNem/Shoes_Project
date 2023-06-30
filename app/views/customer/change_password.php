<?php
include_once('../../controllers/connect.php');
if (isset($_POST['doimatkhau'])) {
  $email = $_POST['email'];
  $matkhau_cu = md5($_POST['matkhaucu']);
  $matkhau_moi = md5($_POST['matkhaumoi']);
  $sql = "SELECT * FROM khachhang WHERE Email='" . $email . "' AND MatKhau='" . $matkhau_cu . "' LIMIT 1";

  // thực hiện truy vấn
  $row = mysqli_query($conn, $sql);
  $count = mysqli_num_rows($row);

  if ($count > 0) {
    // cập nhật mật khẩu
    $sql_update = mysqli_query($conn, "UPDATE khachhang SET MatKhau='" . $matkhau_moi . "'");
    echo '<p style="color:green">Mật khẩu đã được thay đổi</p>';
  } else {
    echo '<p style="color:red">Email hoặc Mật khẩu cũ không đúng, vui lòng nhập lại</p>';
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
  <link rel="stylesheet" href="style.css">
  <style>
    label {
      padding-bottom: 10px;
    }
  </style>
  <title>Document</title>
</head>

<body>

  <div class="container" style="margin-top:5%;">
    <div class="row justify-content-center">

      <div class="col-md-5 border shadow-lg rounded bg-light" style="padding:2%;">
        <div class="d-flex flex-row align-items-center back">
          <h6><i class="bi bi-arrow-left mr-1 mb-1"></i><a href="home.php">Trở lại trang chủ</a></h6>
        </div>
        <h2 class="text-center text-primary">Đổi mật khẩu</h2>
        <small>
        </small>
        <form method="POST" autocomplete="off">
          <div class="row form-group" style="padding: 10px;">
            <label for="email">Email:</label>
            <div class="col input-group">
              <input type="text" id="email" class="form-control" name="email" placeholder="Email">
            </div>
          </div>
          <div class="row form-group" style="padding: 10px;">
            <label for="matkhaucu">Mật khẩu cũ:</label>
            <div class="col input-group">
              <input type="password" id="matkhaucu" class="form-control" name="matkhaucu" placeholder="Mật khẩu cũ">
            </div>
          </div>
          <div class="row form-group" style="padding: 10px;">
            <label for="matkhaumoi">Mật khẩu mới:</label>
            <div class="col input-group">
              <input type="password" id="matkhaumoi" class="form-control" name="matkhaumoi" placeholder="Mật khẩu mới">
            </div>
          </div>
          <!-- <div class="row form-group" style="padding: 10px;">
          <label for="xacnhanmatkhau">Xác nhận mật khẩu:</label>
            <div class="col input-group">
              <input type="text" id="xacnhanmatkhau" class="form-control" name="xacnhanmatkhau" placeholder="Xác nhận mật khẩu">
            </div>
          </div> -->
          <div class="row justify-content-end" style="padding: 10px;">
            <div class="col-auto">
              <input type="submit" class="btn btn-primary" value="Đổi mật khẩu" name="doimatkhau">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

</body>

</html>