<?php
session_start();
if (!isset($_SESSION["register_error"]))
  $_SESSION["register_error"] = "";
else {
  $_SESSION["register_success"] = "";
}
?>
<!doctype html>
<html lang="en">

<head>
  <title>Register</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

</head>

<body>

  <div class="container">
    <div class="row justify-content-center" style="margin-top:5%;">
      <div class="col-md-6 border shadow-lg rounded bg-light" style="padding:2%">
      <h1 class="text-center text-primary">Register</h1>
        <form action="register_customer_action.php" method="post">
        <small> 
          <p class="alert alert-danger font-weight-bold"><?php echo $_SESSION["login_error"]; ?></p>
        </small>
          <div class="row form-group" style="padding: 10px;">
            <div class="col">
              <label for="hoten">Họ và tên</label>
              <input type="text" class="form-control" id="hoten" name="hoten" placeholder="Họ và tên">
            </div>
          </div>

          <div class="row form-group" style="padding: 10px;">
            <div class="col-md-6">
              <label for="taikhoan">Tài khoản</label>
              <input type="input" class="form-control" id="taikhoan" name="taikhoan" placeholder="Tài khoản">
            </div>
            <div class="col-md-6">
              <label for="matkhau">Mật khẩu</label>
              <input type="password" class="form-control" id="matkhau" name="matkhau" placeholder="Mật khẩu ">
            </div>
          </div>


          <div class="row form-group" style="padding: 10px;">
            <div class="col">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Email">
            </div>
          </div>

          <div class="row form-group" style="padding: 10px;">
            <div class="col">
              <label for="sodienthoai">Số điện thoại</label>
              <input type="number" class="form-control" id="sodienthoai" name="sodienthoai" placeholder="Số điện thoại">
            </div>
          </div>

          <div class="row form-group" style="padding: 10px;">
            <div class="col">
              <label for="diachi">Địa chỉ</label>
              <input type="text" class="form-control" id="diachi" name="diachi" placeholder="Địa chỉ">
            </div>
          </div>

          <div class="row justify-content-center" style="padding: 10px;">
              <button class="btn btn-primary col" name="register">Đăng ký</button>
          </div>

          <p align="center">Bạn đã có tài khoản? <a href="login_customer.php" class="text-primary" style="font-weight:600; text-decoration:none;">Đăng nhập</a></p>
        </form>
      </div>
    </div>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
  <script>
    window.setTimeout(function() {
      $(".alert").fadeTo(500, 0).slideUp(500, function() {
        $(this).remove();
      });
    }, 1000);
  </script>

</body>
</html>