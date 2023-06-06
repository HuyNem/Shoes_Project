<?php
// session_start();
// if (!isset($_SESSION["register_error"]))
//   $_SESSION["register_error"] = "";
// else {
//   $_SESSION["register_success"] = "";
// }

//request form
if($_SERVER['REQUEST_METHOD']=='POST') {
  //khai báo bảng error để chứa lỗi ví dụ trong trường hoten thì có [phải nhập, có ít nhất 5 ký tự]
  $error = [];
  
  //validate hoten
  if(empty(trim($_POST['hoten']))) {
    $error['hoten']['required'] = "Họ tên không được để trống";
  } else {
    if(strlen($_POST['hoten'])<5) {
      $error['hoten']['min'] = "Họ tên phải lớn hơn 5 ký tự";
    }
  }

  //validate taikhoan
  if(empty(trim($_POST['taikhoan']))) {
    $error['taikhoan']['required'] = "Tài khoản không được để trống";
  } else {
    if(strlen($_POST['taikhoan'])<5) {
      $error['taikhoan']['min'] = "Tài khoản phải lớn hơn 5 ký tự";
    }
  }

  //validate matkhau
  if(empty(trim($_POST['matkhau']))) {
    $error['matkhau']['required'] = "Mật khẩu không được để trống";
  } else {
    if(strlen($_POST['matkhau'])<6) {
      $error['matkhau']['min'] = "Mật khẩu phải có ít nhất 6 ký tự";
    }
  }

  //validate email
  if(empty(trim($_POST['email']))) {
    $error['email']['required'] = "Email không được để trống";
  } else {
    if(!filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL)) {
      $error['email']['invalid'] = "Email không hợp lệ";
    }
  }

  //validate số điện thoại
  if(empty(trim($_POST['sodienthoai']))) {
    $error['sodienthoai']['required'] = "Số điện thoại không được để trống";
  }

  //validate địa chỉ
  if(empty(trim($_POST['diachi']))) {
    $error['diachi']['required'] = "Địa chỉ không được để trống";
  }


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
      <h1 class="text-center text-primary">Đăng ký</h1>
        <form method="post">
        <!-- <small> 
          <p class="alert alert-danger font-weight-bold"></p>
        </small> -->
          <div class="row form-group" style="padding: 10px;">
            <div class="col">
              <label for="hoten">Họ và tên: </label><br>
              <input type="text" class="form-control" id="hoten" name="hoten" placeholder="Họ và tên"
              value="<?php echo (!empty($_POST['hoten']))?$_POST['hoten']:false; ?>"
              >
              <!-- Báo lỗi -->
              <?php 
                echo (!empty($error['hoten']['required']))?
                '<span style="color: red;">'.$error['hoten']['required'].'</span>':false;
                echo (!empty($error['hoten']['min']))?
                '<span style="color: red;">'.$error['hoten']['min'].'</span>':false;
              ?>
            </div>
          </div>

          <div class="row form-group" style="padding: 10px;">
            <div class="col-md-6">
              <label for="taikhoan">Tài khoản: </label>
              <input type="input" class="form-control" id="taikhoan" name="taikhoan" placeholder="Tài khoản"
              value="<?php echo (!empty($_POST['taikhoan']))?$_POST['taikhoan']:false; ?>"
              >
              <?php 
                echo (!empty($error['taikhoan']['required']))?
                '<span style="color: red;">'.$error['taikhoan']['required'].'</span>':false;
                echo (!empty($error['taikhoan']['min']))?
                '<span style="color: red;">'.$error['taikhoan']['min'].'</span>':false;
              ?>
            </div>
            <div class="col-md-6">
              <label for="matkhau">Mật khẩu</label>
              <input type="password" class="form-control" id="matkhau" name="matkhau" placeholder="Mật khẩu "
              value="<?php echo (!empty($_POST['matkhau']))?$_POST['matkhau']:false; ?>"
              >
              <?php 
                echo (!empty($error['matkhau']['required']))?
                '<span style="color: red;">'.$error['matkhau']['required'].'</span>':false;
                echo (!empty($error['matkhau']['min']))?
                '<span style="color: red;">'.$error['matkhau']['min'].'</span>':false;
              ?>
            </div>
          </div>


          <div class="row form-group" style="padding: 10px;">
            <div class="col">
              <label for="email">Email</label>
              <input type="text" class="form-control" id="email" name="email" placeholder="Email"
              value="<?php echo (!empty($_POST['email']))?$_POST['email']:false; ?>"
              >
              <?php 
                echo (!empty($error['email']['required']))?
                '<span style="color: red;">'.$error['email']['required'].'</span>':false;
                echo (!empty($error['email']['invalid']))?
                '<span style="color: red;">'.$error['email']['invalid'].'</span>':false;
              ?>
            </div>
          </div>

          <div class="row form-group" style="padding: 10px;">
            <div class="col">
              <label for="sodienthoai">Số điện thoại</label>
              <input type="number" class="form-control" id="sodienthoai" name="sodienthoai" placeholder="Số điện thoại"
              value="<?php echo (!empty($_POST['sodienthoai']))?$_POST['sodienthoai']:false; ?>"
              >
              <?php 
                echo (!empty($error['sodienthoai']['required']))?
                '<span style="color: red;">'.$error['sodienthoai']['required'].'</span>':false;
              ?>
            </div>
          </div>

          <div class="row form-group" style="padding: 10px;">
            <div class="col">
              <label for="diachi">Địa chỉ</label>
              <input type="text" class="form-control" id="diachi" name="diachi" placeholder="Địa chỉ"
              value="<?php echo (!empty($_POST['diachi']))?$_POST['diachi']:false; ?>"
              >
              <?php 
                echo (!empty($error['diachi']['required']))?
                '<span style="color: red;">'.$error['diachi']['required'].'</span>':false;
              ?>
            </div>
          </div>

          <div class="row justify-content-center" style="padding: 10px;">
              <button type="submit" class="btn btn-primary col" name="register">Đăng ký</button>
          </div>

          <p align="center">Bạn đã có tài khoản? <a href="login_customer.php" class="text-primary" style="font-weight:600; text-decoration:none;">Đăng nhập</a></p>
        </form>
      </div>
    </div>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
  <!-- <script>
    window.setTimeout(function() {
      $(".alert").fadeTo(500, 0).slideUp(500, function() {
        $(this).remove();
      });
    }, 1000);
  </script> -->

</body>
</html>