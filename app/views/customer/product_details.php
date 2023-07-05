<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $error = array();

    //validate tên thương hiệu
    if (empty($_POST['noidung'])) {
        $error['noidung'] = "Nội dung không được để trống";
    }

    if (empty($error)) {
        require("../../controllers/connect.php");
        $cusID =  $_SESSION["CusID"];
        $PID = $_REQUEST["pid"];
        $ngayBinhLuan = date("Y-m-d");
        $noidung =  $_POST["noidung"];
        $sql = "INSERT INTO binhluan(CusID,PID,NgayBinhLuan,NoiDung,Status) VALUES ('" . $cusID . "'," . $PID . ",'" .$ngayBinhLuan. "','" . $noidung . "', 1)";
        if ($conn->query($sql) == TRUE) {
            header("Refresh:0");
            exit;
        }
    }
}

require("../../controllers/connect.php");
$PID = $_REQUEST["pid"];
$sql = "SELECT * FROM sanpham WHERE PID=" . $PID;
$result = $conn->query($sql) or die($conn->error);
if ($result->num_rows > 0) {
    $r = $result->fetch_assoc();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../public/css/product_detail.css">
    <title>Chi tiết sản phẩm</title>
</head>

<body>
    <?php include 'header.php'; ?>
    <div class="container mt-5 mb-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="images p-3">
                                <div class="text-center p-4"> <img id="main-image" src="../../../public/image/product/<?php echo $r['AnhSP']; ?>" width="350" /> </div>
                                <div class="thumbnail text-center">
                                    <?php
                                    $thumbnailQuery = "SELECT tenanh FROM anhsp WHERE PID=" . $PID;
                                    $thumbnailResult = $conn->query($thumbnailQuery) or die($conn->error);
                                    if ($thumbnailResult->num_rows > 0) {
                                        while ($thumbnail = $thumbnailResult->fetch_assoc()) {
                                            echo '<img onclick="change_image(this)" src="../../../public/image/product/' . $thumbnail['tenanh'] . '" width="100">';
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="product p-4">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <a href="home.php">
                                            <i class="fa fa-long-arrow-left"></i>
                                            <span class="ml-1">Back</span>
                                        </a>
                                    </div>
                                    <i class="fa fa-shopping-cart text-muted"></i>
                                </div>
                                <div class="mt-4 mb-3"> <span class="text-uppercase text-muted brand">Orianz</span>
                                    <h5 class="text-uppercase"><?php echo $r['TenSP']; ?></h5>
                                    <div class="price d-flex flex-row align-items-center"> <span class="act-price"><?php echo $r['Gia']; ?></span>
                                        <div class="ml-2"> <small class="dis-price">$59</small> <span>40% OFF</span> </div>
                                    </div>
                                </div>
                                <p class="about"><?php echo $r['MoTa']; ?></p>

                                <div class="sizes mt-5">
                                    <h6 class="text-uppercase">Màu sắc</h6>
                                    <label class="radio">
                                        <input type="radio" name="mausac" value="Den" checked> <span>Đen</span>
                                    </label>
                                    <label class="radio">
                                        <input type="radio" name="mausac" value="Trang"> <span>Trắng</span>
                                    </label> <label class="radio">
                                        <input type="radio" name="mausac" value="Do"> <span>Đỏ</span>
                                    </label>
                                    <label class="radio">
                                        <input type="radio" name="mausac" value="Vang"> <span>Vàng</span>
                                    </label> <label class="radio">
                                        <input type="radio" name="mausac" value="Xanh"> <span>Xanh</span> </label>
                                </div>

                                <div class="sizes mt-5">
                                    <h6 class="text-uppercase">Size</h6>
                                    <label class="radio">
                                        <input type="radio" name="size" value="37" checked> <span>37</span>
                                    </label>
                                    <label class="radio">
                                        <input type="radio" name="size" value="38"> <span>38</span>
                                    </label> <label class="radio">
                                        <input type="radio" name="size" value="39"> <span>39</span>
                                    </label>
                                    <label class="radio">
                                        <input type="radio" name="size" value="40"> <span>40</span>
                                    </label> <label class="radio">
                                        <input type="radio" name="size" value="41"> <span>41</span> </label>
                                </div>
                                <div class="cart mt-4 align-items-center"> <button class="btn btn-danger text-uppercase mr-2 px-4">Add to cart</button> <i class="fa fa-heart text-muted"></i> <i class="fa fa-share-alt text-muted"></i> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <h3>Đánh giá sản phẩm</h3>

        <!-- Mỗi bình luận sẽ được hiển thị dưới dạng phần tử comment-item -->
        <?php

        //câu lệnh liệt kê
        $lietke_sql = "SELECT bl.NoiDung, bl.NgayBinhLuan, kh.AnhCus, kh.HoTen FROM binhluan bl
        INNER JOIN khachhang kh ON bl.CusID = kh.CusID
        INNER JOIN sanpham sp ON bl.PID = sp.PID
        WHERE sp.PID = $PID
        ORDER BY NgayBinhLuan";

        //thực thi câu lệnh
        $result = mysqli_query($conn, $lietke_sql);

        //duyệt qua result và in ra
        while ($r = mysqli_fetch_assoc($result)) { //đưa từng hàng vào trong $r
        ?>
            <div class="comment-list mt-4">
                <div class="comment-item">
                    <div class="user-info">
                        <img src="../../../public/image/customer/<?php echo $r['AnhCus']; ?>" alt="User Avatar" width="50" height="50" style="border-radius: 50%;">
                        <span class="user-name" style="padding-right: 10px;"><?php echo $r['HoTen']; ?></span>
                        <span class="date" style="border-left: 1px solid; padding-left: 10px;"><?php echo $r['NgayBinhLuan']; ?></span>
                    </div>
                    <p class="comment-content"><?php echo $r['NoiDung']; ?></p>
                </div>
                <hr>
            <?php
        }
            ?>
            <!-- Thêm các phần tử comment-item khác tại đây -->
            </div>
    </div>

    <?php
    if (isset($_SESSION["HoTen"]) && trim($_SESSION["HoTen"]) != "") {

        // Lấy thông tin ảnh và tên từ bảng khachhang dựa trên CusID trong session
        $cusID = $_SESSION["CusID"];
        $query = "SELECT AnhCus FROM khachhang WHERE CusID = $cusID";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $anhCus = $row["AnhCus"];

            // Hiển thị ảnh và tên người dùng
    ?>
            <div class="container mt-5">
                <h3>Đánh giá của bạn</h3>
                <div class="comment-form mt-4">
                    <form method="post">
                        <div class="user-info">
                            <img src="../../../public/image/customer/<?php echo $anhCus; ?>" alt="User Avatar" width="50" height="50">
                            <span class="user-name"><?php echo $_SESSION["HoTen"]; ?></span>
                        </div>
                        <textarea class="form-control mt-3" rows="3" placeholder="Nhập đánh giá của bạn" name="noidung"></textarea>
                        <!-- Báo lỗi -->
                        <?php
                        echo (isset($error['noidung'])) ?
                            '<span style="color: red;">' . $error['noidung'] . '</span>' : false;
                        ?>
                        <br>
                        <button class="btn btn-primary mt-3">Gửi đánh giá</button>
                    </form>
                </div>
            </div>
    <?php
        }
    }
    ?>

    <br>
    <br>
    <br>



    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script>
        function change_image(image) {

            var container = document.getElementById("main-image");

            container.src = image.src;
        }

        document.addEventListener("DOMContentLoaded", function(event) {

        });
    </script>
</body>

</html>