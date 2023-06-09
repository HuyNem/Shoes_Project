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
		<title>brand add</title>
	</head>

	<body>
		<!-- Content Header (Page header) -->
		<?php include './views/view_admin.php'; ?>
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
							if (isset($_SESSION["Brand_add_error"])) {
								echo "<div class='alert alert-danger' role='alert'>" . $_SESSION["Brand_add_error"] . "</div>";
								unset($_SESSION["Brand_add_error"]);
							}
							?>
							<!-- /.card-header -->
							<!-- form start -->
							<form id="brand-form" method="POST" enctype="multipart/form-data" action="Brand_add_action.php">
								<div class="card-body">
									<div class="form-group">
										<label for="tenthuonghieu">Tên thương hiệu</label>
										<input type="text" class="form-control" id="tenthuonghieu" name="tenthuonghieu" placeholder="Tên thương hiệu">
									</div>

									<!-- <div class="form-group">
										<label for="anhthuonghieu">Ảnh thương hiệu</label>
										<div class="input-group">
											<div class="custom-file">
												<input type="file" class="custom-file-input" id="anhthuonghieu" name="anhthuonghieu">
												<label class="custom-file-label" for="anhthuonghieu">Chọn ảnh</label>
											</div>
										</div>
									</div> -->

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
									<a href="brand_view.php" class="btn btn-danger buttoncancel">Hủy</a>
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