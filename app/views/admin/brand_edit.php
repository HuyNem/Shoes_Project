<?php
require("../../controllers/connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$error = array();

	//validate tên thương hiệu
	if (empty($_POST['tenthuonghieu'])) {
		$error['tenthuonghieu'] = "Tên thương hiệu không được để trống";
	}

	if (empty($error)) {
		$mathuonghieu = $_POST["mathuonghieu"];
		$tenthuonghieu = $_POST["tenthuonghieu"];
		$anhthuonghieu = $_FILES["anhthuonghieu"]["name"];
		$cstatus = $_POST["rdCstatus"];

		//kiem tra xem cname da co chua
		$sql = "select * from thuonghieu where TenThuongHieu='" . $tenthuonghieu . "'and MaThuongHieu<>" . $mathuonghieu;
		$result = $conn->query($sql) or die($conn->error);

		if ($result->num_rows > 0) {
			$_SESSION["brand_edit_error"] = "Brand Name " . $tenthuonghieu . " exist!";
			header("Location: brand_edit.php");
		} else {
			// luu target folder cho image:
			$target_file = "./image/brand/" . $anhthuonghieu;
			// luu query:
			$sql1 = "";
			if ($anhthuonghieu != "") {
				if (move_uploaded_file($_FILES["anhthuonghieu"]["tmp_name"], $target_file)) {
					$sql1 = "update thuonghieu set TenThuongHieu='" . $tenthuonghieu . "', Anh='" . $anhthuonghieu . "',Status='" . $cstatus . "' where MaThuongHieu = " . $mathuonghieu;
				}
			} else {
				$sql1 = "update thuonghieu set TenThuongHieu='" . $tenthuonghieu . "',Status='" . $cstatus . "' where MaThuongHieu = " . $mathuonghieu;
			}


			if ($conn->query($sql1) == TRUE) {
				$_SESSION["brand_error"] = "Edit success!";
				$_SESSION["brand_edit_error"] = "";
				header("Location: brand_view.php");
			} else {
				$_SESSION["brand_error"] = $sql . " " . $conn->error;
				$_SESSION["brand_edit_error"] = "";
				header("Location: brand_view.php");
			}
		}
		header("Location: brand_view.php");
		//echo $cname.$cimage.$cstatus;
		$conn->close();
	}
}


$mathuonghieu = $_GET['mathuonghieu'];
$sql = "SELECT * FROM thuonghieu WHERE MaThuongHieu=" . $mathuonghieu;
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
	<?php include '../admin/view_admin.php'; ?>
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
						<form method="POST">
							<div class="card-body">
								<div class="form-group">
									<label for="tenthuonghieu">Tên thương hiệu: </label>
									<input type="text" class="form-control" id="tenthuonghieu" name="tenthuonghieu" value="<?php echo $r['TenThuongHieu']; ?>">
								</div>

								<div class="form-group">
									<label for="anhthuonghieu">Ảnh thương hiệu: </label>
									<img class="rounded mx-auto d-block" src="../../../public/image/brand/<?php echo $r["Anh"]; ?>" width="200px" style="padding-bottom: 10px;">
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
								<a href="brand_view.php" class="btn btn-danger">Hủy</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>

</body>

</html>