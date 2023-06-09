<?php
session_start();
if (isset($_SESSION["taikhoan"])) {
	if (!isset($_SESSION["brand_edit_error"]))
		$_SESSION["brand_edit_error"] = "";

	$mathuonghieu = $_REQUEST["mathuonghieu"];
	require("./controllers/connect.php");
	$sql = "select * from thuonghieu where MaThuongHieu=" . $mathuonghieu;
	$result = $conn->query($sql) or die($conn->error);
	if ($result->num_rows > 0) {
		$r = $result->fetch_assoc();
	}

?>

	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>brand add</title>
	</head>

	<body>
		<?php include './views/view_admin.php'; ?>
		<section class="content-wrapper" style="padding-top: 20px;">
			<div class="container-fluid">
				<div class="row">
					<!-- left column -->
					<div class="col-md-12"> <!-- style="margin: 50px auto;" -->
						<div class="card card-primary">
							<div class="card-header">
								<h3 class="card-title">Sửa thương hiệu</h3>
							</div>
							<!-- /.card-header -->
							<!-- form start -->
							<form method="POST" enctype="multipart/form-data" action="brand_edit_action.php">
								<div class="card-body">
									<div class="form-group">
										<label for="tenthuonghieu">Tên thương hiệu: </label>
										<input type="text" class="form-control" id="tenthuonghieu" name="tenthuonghieu" value="<?php echo $r['TenThuongHieu']; ?>">
									</div>

									<div class="form-group">
										<label for="anhthuonghieu">Ảnh thương hiệu: </label>
										<img class="rounded mx-auto d-block" src="./image/brand/<?php echo $r["Anh"]; ?>" width="200px" style="padding-bottom: 10px;">
										<input type="file" name="anhthuonghieu">
									</div>

									<div class="form-group">
										<label for="#">Trạng thái: </label>
										<div class="form-check">
											<input class="form-check-input" type="radio" name="rdCstatus" id="hien" value=1 <?php if ($r["Status"] == 1) echo " checked "; ?> checked>
											<label class="form-check-label" for="hien">
												Hiện
											</label>
										</div>
										<div class="form-check">
											<input class="form-check-input" type="radio" name="rdCstatus" id="an" <?php if ($r["Status"] == 0) echo " checked "; ?>>
											<label class="form-check-label" for="an">
												Ẩn
											</label>
										</div>
									</div>

									<input type="hidden" value="<?php echo $mathuonghieu; ?>" name="mathuonghieu">
									<button type="submit" class="btn btn-primary" value="Save">Sửa</button>
									<input type="Reset" class="btn btn-secondary" name="" id="">
									<a href="brand_view.php" class="btn btn-danger">Hủy</a>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>

	<?php
} else {
	header("Location: login_admin.php");
	exit();
}
	?>

	</body>

	</html>