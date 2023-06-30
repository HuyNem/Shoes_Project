<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$error = array();

	//validate tên thương hiệu
	if (empty($_POST['tenthuonghieu'])) {
		$error['tenthuonghieu'] = "Tên thương hiệu không được để trống";
	}

	if (empty($error)) {
		require("../../controllers/connect.php");
		$tenthuonghieu = $_POST["tenthuonghieu"];
		$anhthuonghieu = $_FILES["anhthuonghieu"]["name"];
		$cstatus = $_POST["rdCstatus"];
		//kiem tra xem tenthuonghieu da co chua
		$sql = "select * from thuonghieu where TenThuongHieu ='" . $tenthuonghieu . "'";
		$result = $conn->query($sql) or die($conn->error);
		if ($result->num_rows > 0) {
			$_SESSION["Brand_add_error"] = "tên thương hiệu " . $tenthuonghieu . " đã tồn tại!";
			header("Location: Brand_add.php");
		} else {
			$target_file = "../../public/image/brand/$anhthuonghieu"; //nơi lưu trữ ảnh upload
			//nếu như upload ảnh
			if (move_uploaded_file($_FILES["anhthuonghieu"]["tmp_name"], $target_file)) {
				$sql = "insert into thuonghieu(TenThuongHieu,Anh,Status) values ('" . $tenthuonghieu . "','" . $anhthuonghieu . "'," . $cstatus . ")";
				if ($conn->query($sql) == TRUE) {
					$_SESSION["brand_success"] = "Thêm mới thương hiệu thành công!";
					header("Location: brand_view.php");
				} else {
					$_SESSION["brand_error"] = $sql . " " . $conn->error;
					header("Location: brand_view.php");
				}
			} else {
				$sql = "insert into thuonghieu(TenThuongHieu,Status) values ('" . $tenthuonghieu . "'," . $cstatus . ")";
				if ($conn->query($sql) == TRUE) {
					$_SESSION["brand_success"] = "Thêm mới thương hiệu thành công!";
					header("Location: brand_view.php");
				} else {
					$_SESSION["brand_error"] = $sql . " " . $conn->error;
					header("Location: brand_view.php");
				}
			}
		}
		//echo $cname.$cimage.$cstatus;
		$conn->close();
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Thêm thương hiệu</title>
</head>

<body>
	<!-- Content Header (Page header) -->
	<?php include '../admin/view_admin.php'; ?>
	<section class="content-wrapper" style="padding-top: 20px;">
		<div class="container-fluid">
			<div class="row">
				<!-- left column -->
				<div class="col-md-12"> <!-- style="margin: 50px auto;" -->
					<div class="card card-primary">
						<div class="card-header">
							<h3 class="card-title">Thêm thương hiệu</h3>
						</div>

						<?php
						if (isset($_SESSION["brand_success"])) {
							echo "<div class='alert alert-success' role='alert'>" . $_SESSION["brand_success"] . "</div>";
							unset($_SESSION["brand_success"]);
						} else if(isset($_SESSION["brand_error"])) {
							echo "<div class='alert alert-danger' role='alert'>" . $_SESSION["brand_error"] . "</div>";
							unset($_SESSION["brand_error"]);
						}
						?>
						<!-- /.card-header -->
						<!-- form start -->
						<form method="POST">
							<div class="card-body">
								<div class="form-group">
									<label for="tenthuonghieu">Tên thương hiệu</label>
									<input type="text" class="form-control" id="tenthuonghieu" name="tenthuonghieu" placeholder="Tên thương hiệu">
									<!-- Báo lỗi -->
									<?php
									echo (isset($error['tenthuonghieu'])) ?
										'<span style="color: red;">' . $error['tenthuonghieu'] . '</span>' : false;
									?>
								</div>

								<input type="file" name="anhthuonghieu">

								<div class="form-group">
									<label for="">Trạng thái: </label>
									<div class="form-check">
										<input class="form-check-input" type="radio" id="hien" name="rdCstatus" value=1 checked>
										<label class="form-check-label" for="hien">Hiện</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" id="an" name="rdCstatus" value=0>
										<label class="form-check-label" for="an">Ẩn</label>
									</div>
								</div>
							</div>

							<div class="card-footer">
								<button type="submit" class="btn btn-primary buttonadd">Thêm</button>
								<input type="Reset" class="btn btn-secondary" name="" id="">
								<a href="./brand_view.php" class="btn btn-danger buttoncancel">Hủy</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>

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