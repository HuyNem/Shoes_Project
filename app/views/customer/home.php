<?php
session_start();

require_once('../../controllers/connect.php');
//đoạn mã tìm kiếm
if (isset($_GET['voi_tu_khoa'])) {

  $keyword = $_GET['voi_tu_khoa'];

  // Chuyển từ khóa tìm kiếm thành dạng phù hợp cho truy vấn SQL
  $keyword = "%" . $keyword . "%";

  $searchQuery = "SELECT * FROM sanpham WHERE TenSP LIKE ?";


  if (!empty($searchQuery)) {
    // Chuẩn bị truy vấn SQL với sử dụng Prepared Statements
    $stmt = mysqli_prepare($conn, $searchQuery);
    mysqli_stmt_bind_param($stmt, "s", $keyword);
    mysqli_stmt_execute($stmt);

    // Lấy kết quả tìm kiếm
    $r = mysqli_stmt_get_result($stmt);
    $products = mysqli_fetch_all($r, MYSQLI_ASSOC);

    // Đóng Prepared Statements
    mysqli_stmt_close($stmt);
  }
}

if(isset($_GET['trang'])) {
  $page = $_GET['trang'];
} else {
  $page = '';
}
if($page == '' || $page ==1) {
  $begin = 0;
} else {
  $begin = ($page*12)-12;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css'>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css'>
  <link rel="stylesheet" href="../../../public/css/style_home.css">

  <title>Trang chủ</title>

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
      max-width: 300px;
      /* Adjust the max-width as needed */
    }
  </style>

</head>

<body>
  <?php include 'header.php'; ?>


  <!-- SLIDER -->
  <div class="container">
    <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel" style="padding: 30px 10px;">
      <div class="carousel-inner">
        <div class="carousel-item active" data-bs-interval="10000">
          <img src="../../../public/image/slide/slide2.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item" data-bs-interval="2000">
          <img src="../../../public/image/slide/slide3.jpg" class="d-block w-100" alt="...">
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
      <div class="row justify-content-end text-center">
        <div class="col-md-8 col-lg-6">
          <div class="header">
            <form class="form-inline justify-content-end" method="get">
              <div class="form-group flex-grow-1">
                <div class="input-group">
                  <input type="search" class="form-control" placeholder="Tìm kiếm..." name="voi_tu_khoa">
                  <div class="input-group-prepend">
                    <button type="submit" class="btn btn-danger">
                      <i class="fa fa-search"></i>
                    </button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

      <div class="row">

        <?php
        if (!empty($products)) {
          foreach ($products as $product) {
        ?>
            <div class="col-md-6 col-lg-4 col-xl-3">
              <div id="product-1" class="single-product product">
                <div class="part-1">
                  <img src='../../../public/image/product/<?php echo $product["AnhSP"]; ?>' style="border-top-left-radius: 15px; border-top-right-radius: 15px;" class="img-fluid" alt="Laptop" />
                  <ul>
                    <li><a href="addCart.asp?pid=<?php echo $product['PID']; ?>"><i class="fas fa-shopping-cart"></i></a></li>
                    <li><a href="#"><i class="fas fa-heart"></i></a></li>
                    <li><a href="#"><i class="fas fa-plus"></i></a></li>
                    <li><a href="product_details.php?pid=<?php echo $product['PID']; ?>"><i class="fas fa-expand"></i></a></li>
                  </ul>
                </div>
                <div class="part-2">
                  <h3 class="product-title"><?php echo $product['TenSP']; ?></h3>
                  <h4 class="product-old-price">$79.99</h4>
                  <h4 class="product-price"><?php echo $product['Gia']; ?></h4>
                </div>
              </div>
            </div>

        <?php
          }
        }
        ?>
        <?php
        if (empty($products)) {
          //kết nối csdl
          require_once('../../controllers/connect.php');

          //câu lệnh liệt kê
          $lietke_sql = "SELECT * FROM sanpham ORDER BY PID, TenSP LIMIT $begin,12";

          //thực thi câu lệnh
          $result = mysqli_query($conn, $lietke_sql);

          //duyệt qua result và in ra
          while ($r = mysqli_fetch_assoc($result)) { //đưa từng hàng vào trong $r
        ?>
            <!-- Single Product -->
            <div class="col-md-6 col-lg-4 col-xl-3">
              <div id="product-1" class="single-product product">
                <div class="part-1">
                  <img src='../../../public/image/product/<?php echo $r["AnhSP"]; ?>' style="border-top-left-radius: 15px; border-top-right-radius: 15px;" class="img-fluid" alt="Laptop" />
                  <ul>
                    <li><a href="#"><i class="fas fa-shopping-cart"></i></a></li>
                    <li><a href="#"><i class="fas fa-heart"></i></a></li>
                    <li><a href="#"><i class="fas fa-plus"></i></a></li>
                    <li><a href="product_details.php?pid=<?php echo $r['PID']; ?>"><i class="fas fa-expand"></i></a></li>
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
        }
        ?>
      </div>
      <?php
  // Kết nối CSDL
  require_once('../../controllers/connect.php');

  // Câu truy vấn
  $sql_trang = "SELECT * FROM sanpham";

  // Thực thi truy vấn
  $result = mysqli_query($conn, $sql_trang);

  // Kiểm tra và lấy số lượng dòng
  if ($result) {
    $row_count = mysqli_num_rows($result);
    $trang = ceil($row_count / 12);
  } else {
    echo "Lỗi trong quá trình truy vấn.";
  }

  // Đóng kết nối
  mysqli_close($conn);
  ?>

  <div class="clearfix">
    <div class="col-md-9">
      <ul class="pagination">
        <?php
        for ($i = 1; $i <= $trang; $i++) {
        ?>
          <li class="page-item"><a class="page-link" href="home.php?trang=<?php echo $i ?>"><?php echo $i ?></a></li>
        <?php
        }
        ?>
      </ul>
    </div>
  </div>
    </div>
  </section>


  <?php include 'footer.php'; ?>


</body>

</html>