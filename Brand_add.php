<?php
session_start();
if (isset($_SESSION["taikhoan"])) {
?>


	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="./css/brand_add_style.css">
		<title>brand add</title>
	</head>

	<body>
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1>General Form</h1>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active">General Form</li>
						</ol>
					</div>
				</div>
			</div><!-- /.container-fluid -->
		</section>

		<section class="content">
			<div class="container-fluid">
				<div class="row">
					<!-- left column -->
					<div class="col-md-6">
						<div class="card card-primary">
							<div class="card-header">
								<h3 class="card-title">Thêm thương hiệu</h3>
							</div>
							<!-- /.card-header -->
							<!-- form start -->
							<form method=POST enctype="multipart/form-data" action="Brand_add_action.php">
								<div class="card-body">
									<div class="form-group">
										<label for="tenthuonghieu">Tên thương hiệu</label>
										<input type="text" class="form-control" id="tenthuonghieu" name="tenthuonghieu" placeholder="Tên thương hiệu">
									</div>

									<div class="form-group">
										<label for="anhthuonghieu">Ảnh thương hiệu</label>
										<div class="input-group">
											<div class="custom-file">
												<input type="file" class="custom-file-input" id="anhthuonghieu" name="anhthuonghieu">
												<label class="custom-file-label" for="exampleInputFile">Chọn ảnh</label>
											</div>
										</div>
									</div>

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
									<button type="submit" class="btn btn-primary">Thêm</button>
									<input type="Reset" class="btn btn-secondary" name="" id="">
									<a href="brand_view.php" class="btn btn-danger">Hủy</a>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>

		<?php
	} else {
		header("Location: login_admin.php");
		exit();
	}
		?>
	</body>

	</html>