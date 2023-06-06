<?php 
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  } 
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <!-- Bootstrap icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="./css/style_header.css">
  <style>
    .product-image {
      width: 100%;
      height: 200px;
      object-fit: cover;
    }
  </style>
  <title>Document</title>
</head>

<body>
  <!-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid containerfluid">
      <a class="navbar-brand navbrand" href="#"> <strong> Sport<span style="color: #ff9100;">Shoes</span> </strong></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="#">Trang chủ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Sản phẩm</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Liên hệ</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Dropdown</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Link</a></li>
              <li><a class="dropdown-item" href="#">Another link</a></li>
              <li><a class="dropdown-item" href="#">A third link</a></li>
            </ul>
          </li>
        </ul>
      </div>
      <form class="d-flex">
        <?php
        if (!is_null($_SESSION["HoTen"]) && trim($_SESSION["HoTen"]) != "") {
        ?>
          <span class="navbar-text ms-auto">Chào mừng <?php echo $_SESSION["HoTen"]; ?>!</span>
          <a href="logout_cus.php" class="btn btn-outline-warning ms-3">Đăng xuất</a>
        <?php } else { ?>
          <a href="login_customer.php" class="btn btn-outline-warning ms-3">Đăng nhập</a>

        <?php } ?>
      </form>
    </div>
  </nav> -->

  <div class="container container">
    <H2>SPORT<span style="color: orangered;">SHOES</span></H2>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Trang chủ</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Sản phẩm</a>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Danh mục
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <li><a class="dropdown-item" href="#">Vans</a></li>
                <li><a class="dropdown-item" href="#">Adidas</a></li>
                <li><a class="dropdown-item" href="#">Balenciaga</a></li>
                <li><a class="dropdown-item" href="#">Bitis hunter</a></li>
              </ul>
            </li>

          </ul>

        </div>

        <form class="d-flex">
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Xin Chào <?php echo $_SESSION["HoTen"]; ?>
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <li><a class="dropdown-item" href="profile_cus.php">Thông tin cá nhân</a></li>
                <li><a class="dropdown-item" href="#">Đơn mua</a></li>
                <li><a class="dropdown-item" href="#">Đổi mật khẩu</a></li>
                <li><a class="dropdown-item" href="logout_cus.php">Đăng xuất</a></li>
              </ul>
            </li>
          </ul>
        </form>

      </div>
    </nav>

  </div>

</body>

</html>