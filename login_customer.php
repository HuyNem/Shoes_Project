<?php
  session_start();
  if (!isset($_SESSION["login_error"]))
      $_SESSION["login_error"] = "";
?>

<!doctype html>
<html lang="en">

<head>
  <title>Login</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
  <link rel="stylesheet" href="style.css">
</head>

<body>

  <div class="container" style="margin-top:5%;">
    <div class="row justify-content-center">
      <div class="col-md-5 border shadow-lg rounded bg-light" style="padding:2%;">
        <h2 class="text-center text-primary">Đăng nhập</h2>
        <small> 
          <p class="alert alert-danger font-weight-bold"><?php echo $_SESSION["login_error"]; ?></p>
        </small>
        <form method="POST" action="login_customer_action.php">
          <div class="row form-group" style="padding: 10px;">
            <div class="col input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="bi bi-person"></i></span>
              </div>
              <input type="text" class="form-control" name="taikhoan" placeholder="Tài khoản">
            </div>
          </div>
          <div class="row form-group" style="padding: 10px;">
            <div class="col input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="bi bi-lock"></i></span>
              </div>
              <input type="password" class="form-control" name="matkhau" placeholder="Mật khẩu">
            </div>
          </div>
          <div class="row justify-content-center" style="padding: 10px;">
            <button class="btn btn-primary col-10" name="login" value="Login">Đăng nhập</button>
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
                $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove(); 
            });
        }, 4000);
    </script> 
</body>
</html>