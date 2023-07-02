<?php
session_start();

//request form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  //khai báo bảng error để chứa lỗi ví dụ trong trường hoten thì có [phải nhập, có ít nhất 5 ký tự]
  $error = array();

  //validate hoten
  if (empty(trim($_POST['hoten']))) {
    $error['hoten']['required'] = "Họ tên không được để trống";
  } else {
    if (strlen($_POST['hoten']) < 5) {
      $error['hoten']['min'] = "Họ tên phải lớn hơn 5 ký tự";
    }
  }

  //validate taikhoan
  if (empty(trim($_POST['taikhoan']))) {
    $error['taikhoan']['required'] = "Tài khoản không được để trống";
  } else {
    if (strlen($_POST['taikhoan']) < 5) {
      $error['taikhoan']['min'] = "Tài khoản phải lớn hơn 5 ký tự";
    }
  }

  //validate matkhau
  if (empty(trim($_POST['matkhau']))) {
    $error['matkhau']['required'] = "Mật khẩu không được để trống";
  } else {
    if (strlen($_POST['matkhau']) < 6) {
      $error['matkhau']['min'] = "Mật khẩu phải có ít nhất 6 ký tự";
    }
  }

  //validate email
  if (empty(trim($_POST['email']))) {
    $error['email']['required'] = "Email không được để trống";
  } else {
    if (!filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL)) {
      $error['email']['invalid'] = "Email không hợp lệ";
    }
  }

  //validate số điện thoại
  if (empty(trim($_POST['sodienthoai']))) {
    $error['sodienthoai']['required'] = "Số điện thoại không được để trống";
  }

  //validate địa chỉ
  if (empty(trim($_POST['diachi']))) {
    $error['diachi']['required'] = "Địa chỉ không được để trống";
  }

  if (empty($error)) {
    //lấy dữ liệu từ form
    $hoten = $_POST["hoten"];
    $taikhoan = $_POST["taikhoan"];
    $matkhau = md5($_POST["matkhau"]);
    $email = $_POST["email"];
    $sodienthoai = $_POST["sodienthoai"];
    $diachi = $_POST["diachi"];

    require("../../controllers/connect.php");
    //kiểm tra xem tài khoản đã tồn tại chưa
    $sql = "SELECT * FROM khachhang WHERE TaiKhoan = '" . $taikhoan . "'";
    //truy vấn trong csdl
    $result = $conn->query($sql) or die($conn->error);

    if ($result->num_rows > 0) {
      $_SESSION["register_error"] = "Tài khoản " . $taikhoan . " đã tồn tại!";
      header("location: register_customer.php");
    } else {
      $sql = "INSERT INTO khachhang(TaiKhoan, MatKhau, HoTen, Email, SoDienThoai, DiaChi)
              VALUES ('" . $taikhoan . "', '" . $matkhau . "','" . $hoten . "','" . $email . "','" . $sodienthoai . "','" . $diachi . "')";
              
      if ($conn->query($sql) == TRUE) {
        $_SESSION["register_success"] = "Tạo tài khoản thành công!";
        header("Location: register_customer.php");
      } else {
        $_SESSION["register_error"] = "Tạo tài khoản không thành công";
        header("Location: register_customer.php");
      }
      exit;
    }
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
  <!-- link -->
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="./plugins/fontawesome-free/css/all.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="./plugins/daterangepicker/daterangepicker.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="./plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="./plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="./plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="./plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="./plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="./plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
    <!-- BS Stepper -->
    <link rel="stylesheet" href="./plugins/bs-stepper/css/bs-stepper.min.css">
    <!-- dropzonejs -->
    <link rel="stylesheet" href="./plugins/dropzone/min/dropzone.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="./dist/css/adminlte.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<!-- /.link -->
</head>

<body>

  <div class="container">
    <div class="row justify-content-center" style="margin-top:5%;">
      <div class="col-md-6 border shadow-lg rounded bg-light" style="padding:2%">
        <h1 class="text-center text-primary">Đăng ký</h1>
        <?php
            if (isset($_SESSION["register_success"])) {
                echo "<div class='alert alert-success' role='alert'>" . $_SESSION["register_success"] . "</div>";
                unset($_SESSION["register_success"]);
            } else if (isset($_SESSION["register_error"])) {
                echo "<div class='alert alert-danger' role='alert'>" . $_SESSION["register_error"] . "</div>";
                unset($_SESSION["register_error"]);
            }
          ?>
        <form method="post">
          <!-- đoạn mã thông báo thêm thành công -->
          <div class="row form-group" style="padding: 10px;">
            <div class="col">
              <label for="hoten">Họ và tên: </label><br>
              <input type="text" class="form-control" id="hoten" name="hoten" placeholder="Họ và tên" value="<?php echo (!empty($_POST['hoten'])) ? $_POST['hoten'] : false; ?>">
              <!-- Báo lỗi -->
              <?php
              echo (!empty($error['hoten']['required'])) ?
                '<span style="color: red;">' . $error['hoten']['required'] . '</span>' : false;
              echo (!empty($error['hoten']['min'])) ?
                '<span style="color: red;">' . $error['hoten']['min'] . '</span>' : false;
              ?>
            </div>
          </div>

          <div class="row form-group" style="padding: 10px;">
            <div class="col-md-6">
              <label for="taikhoan">Tài khoản: </label>
              <input type="input" class="form-control" id="taikhoan" name="taikhoan" placeholder="Tài khoản" value="<?php echo (!empty($_POST['taikhoan'])) ? $_POST['taikhoan'] : false; ?>">
              <?php
              echo (!empty($error['taikhoan']['required'])) ?
                '<span style="color: red;">' . $error['taikhoan']['required'] . '</span>' : false;
              echo (!empty($error['taikhoan']['min'])) ?
                '<span style="color: red;">' . $error['taikhoan']['min'] . '</span>' : false;
              ?>
            </div>
            <div class="col-md-6">
              <label for="matkhau">Mật khẩu</label>
              <input type="password" class="form-control" id="matkhau" name="matkhau" placeholder="Mật khẩu " value="<?php echo (!empty($_POST['matkhau'])) ? $_POST['matkhau'] : false; ?>">
              <?php
              echo (!empty($error['matkhau']['required'])) ?
                '<span style="color: red;">' . $error['matkhau']['required'] . '</span>' : false;
              echo (!empty($error['matkhau']['min'])) ?
                '<span style="color: red;">' . $error['matkhau']['min'] . '</span>' : false;
              ?>
            </div>
          </div>


          <div class="row form-group" style="padding: 10px;">
            <div class="col">
              <label for="email">Email</label>
              <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo (!empty($_POST['email'])) ? $_POST['email'] : false; ?>">
              <?php
              echo (!empty($error['email']['required'])) ?
                '<span style="color: red;">' . $error['email']['required'] . '</span>' : false;
              echo (!empty($error['email']['invalid'])) ?
                '<span style="color: red;">' . $error['email']['invalid'] . '</span>' : false;
              ?>
            </div>
          </div>

          <div class="row form-group" style="padding: 10px;">
            <div class="col">
              <label for="sodienthoai">Số điện thoại</label>
              <input type="number" class="form-control" id="sodienthoai" name="sodienthoai" placeholder="Số điện thoại" value="<?php echo (!empty($_POST['sodienthoai'])) ? $_POST['sodienthoai'] : false; ?>">
              <?php
              echo (!empty($error['sodienthoai']['required'])) ?
                '<span style="color: red;">' . $error['sodienthoai']['required'] . '</span>' : false;
              ?>
            </div>
          </div>

          <div class="row form-group" style="padding: 10px;">
            <div class="col">
              <label for="diachi">Địa chỉ</label>
              <input type="text" class="form-control" id="diachi" name="diachi" placeholder="Địa chỉ" value="<?php echo (!empty($_POST['diachi'])) ? $_POST['diachi'] : false; ?>">
              <?php
              echo (!empty($error['diachi']['required'])) ?
                '<span style="color: red;">' . $error['diachi']['required'] . '</span>' : false;
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
  <script>
    window.setTimeout(function() {
      $(".alert").fadeTo(500, 0).slideUp(500, function() {
        $(this).remove();
      });
    }, 4000);
  </script>

</body>

</html>