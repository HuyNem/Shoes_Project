<?php
session_start();

// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//   //khai báo bảng error để chứa lỗi ví dụ trong trường hoten thì có [phải nhập, có ít nhất 5 ký tự]
//   $error = [];

//   //validate hoten
//   if (empty(trim($_POST['taikhoan']))) {
//     $error['taikhoan']['required'] = "Vui lòng nhập tài khoản *";
//   }

//   //validate taikhoan
//   if (empty(trim($_POST['matkhau']))) {
//     $error['matkhau']['required'] = "Vui lòng nhập mật khẩu *";
//   }
// }
?>

<!doctype html>
<html lang="en">

<head>
  <title>Login Customer</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
  <link rel="stylesheet" href="style.css">

</head>

<body class="hold-transition login-page">

  <div class="container" style="margin-top:5%;">
    <div class="row justify-content-center">
      <div class="col-md-4 border shadow-lg rounded bg-light" style="padding:2%;">
        <h2 class="text-center text-primary">Đăng nhập</h2>

        <?php
        if (isset($_SESSION["login_error"])) {
          echo "<div class='alert alert-danger' role='alert'>" . $_SESSION["login_error"] . "</div>";
          unset($_SESSION["login_error"]);
        }
        ?>


        <form method="POST" action="login_customer_action.php">
          <div class="row form-group" style="padding: 10px;">

            <?php
            // echo (!empty($error['taikhoan']['required'])) ?
            //   '<span style="color: red;">' . $error['taikhoan']['required'] . '</span>' : false;
            ?>

            <div class="col input-group">
              <input type="text" class="form-control" name="taikhoan" placeholder="Tài khoản">
            </div>
          </div>


          <div class="row form-group" style="padding: 10px;">
            <?php
            // echo (!empty($error['matkhau']['required'])) ?
            //   '<span style="color: red;">' . $error['matkhau']['required'] . '</span>' : false;
            ?>
            <div class="col input-group">
              <input type="password" class="form-control" name="matkhau" placeholder="Mật khẩu">
            </div>



          </div>
          <div class="row justify-content-end" style="padding: 10px;">
            <div class="col-8">
              <div class="form-check">
                <input type="checkbox" class="form-check-input" id="rememberPassword">
                <label class="form-check-label" for="rememberPassword">Nhớ mật khẩu</label>
              </div>
            </div>
            <div class="col-4">
              <button class="btn btn-primary" name="login" value="Login">Đăng nhập</button>
            </div>
          </div>
          <div class="row justify-content-center" style="padding: 10px;">
            <p align="center">Tôi chưa có tài khoản <a href="register_customer.php" class="text-primary" style="font-weight:600;text-decoration:none;">đăng ký tại đây</a></p>
          </div>
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