<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="./css/style_header.css">
  <title>Document</title>
</head>

<body>
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="container-fluid containerfluid">
      <a class="navbar-brand navbrand" href="#">Sport<span>Shoes</span></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Quản lý sản phẩn</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="product_view.php">Danh sách sản phẩm</a></li>
              <li><a class="dropdown-item" href="Brand_view.php">Danh sách thương hiệu</a></li>
            </ul>
          </li>
        </ul>

      </div>
      <form class="d-flex">
        <span class="navbar-text ms-auto">Chào mừng <?php echo $_SESSION["taikhoan"]; ?></span>
        <a href="logout_admin.php" class="btn btn-outline-warning ms-3">Đăng xuất</a>
      </form>
    </div>
  </nav>

</body>

</html>