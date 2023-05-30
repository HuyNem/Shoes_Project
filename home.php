<?php
session_start();
if (isset($_SESSION["HoTen"])) {
?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css'>
    <link rel="stylesheet" href="./css/style_home.css">

    <title>Home page</title>

    <style>
    /* Add this CSS code */
    .row {
      display: flex;
      flex-wrap: wrap;
    }

    .col-md-6,
    .col-lg-4,
    .col-xl-3 {
      display: flex;
      flex-direction: column;
      align-items: center;
      margin-bottom: 20px;
    }

    .single-product.product {
      width: 100%;
      height: 100%;
      max-width: 300px; /* Adjust the max-width as needed */
    }
  </style>

  </head>

  <body>
    <?php include './views/header.php'; ?>


    <!-- SLIDER -->
    <div class="container">
      <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel" style="padding: 30px 10px;">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active" data-bs-interval="10000">
            <img src="./image/slide/shoes1.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>First slide label</h5>
              <p>Some representative placeholder content for the first slide.</p>
            </div>
          </div>
          <div class="carousel-item" data-bs-interval="2000">
            <img src="./image/slide/shoes2.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Second slide label</h5>
              <p>Some representative placeholder content for the second slide.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="./image/slide/shoes3.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Third slide label</h5>
              <p>Some representative placeholder content for the third slide.</p>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>

    <!-- LIST PRODUCT -->

    <section class="section-products">
      <div class="container">
        <div class="row justify-content-center text-center">
          <div class="col-md-8 col-lg-6">
            <div class="header">
              <h3>Featured Product</h3>
              <h2>Popular Products</h2>
            </div>
          </div>
        </div>

        <div class="row">
          <?php
          //kết nối csdl
          require_once('./controllers/connect.php');

          //câu lệnh liệt kê
          $lietke_sql = "SELECT * FROM sanpham ORDER BY PID, TenSP";

          //thực thi câu lệnh
          $result = mysqli_query($conn, $lietke_sql);

          //duyệt qua result và in ra
          while ($r = mysqli_fetch_assoc($result)) { //đưa từng hàng vào trong $r
          ?>
            <!-- Single Product -->
            <div class="col-md-6 col-lg-4 col-xl-3">
              <div id="product-1" class="single-product product">
                <div class="part-1">
                  <img src='./image/product/<?php echo $r["AnhSP"]; ?>' style="border-top-left-radius: 15px; border-top-right-radius: 15px;" class="img-fluid" alt="Laptop" />
                  <ul>
                    <li><a href="#"><i class="fas fa-shopping-cart"></i></a></li>
                    <li><a href="#"><i class="fas fa-heart"></i></a></li>
                    <li><a href="#"><i class="fas fa-plus"></i></a></li>
                    <li><a href="#"><i class="fas fa-expand"></i></a></li>
                  </ul>
                </div>
                <div class="part-2">
                  <h3 class="product-title"><?php echo $r['TenSP']; ?></h3>
                  <h4 class="product-old-price">$79.99</h4>
                  <h4 class="product-price"><?php echo $r['Gia']; ?></h4>
                </div>
              </div>
            </div>
          <?php
          }
          ?>
        </div>
      </div>
    </section>
  <?php
} else {
  header("Location: login_customer.php");
  exit();
}
  ?>
  </body>

  </html>